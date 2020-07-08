//* Materi Filter Article //
function tableArticle(input, table, url) {
    $(`#${input}`).on("keypress", function(e) {
        const searchValue = $(this).val();
        const tbody = $(`.${table} tbody`);
        if (e.which === 13) {
            tbody.empty();
            tbody.append(`
            <tr class="loading">
            <td colspan="6">
            <div class="text-center">
            <div class="spinner-border text-sakura" role="status">
              <span class="sr-only text-center">Loading...</span>
            </div>
            </div>
            </td>
            </tr>`);

            if (searchValue) {
                fetch(
                    `http://api.localhost:8000/api_g9gxv/${url}/artikel/${searchValue}`
                )
                    .then(response => {
                        return response.json();
                    })
                    .then(responseJson => {
                        const datas = responseJson.data;
                        $(`.${table} tbody .loading`).remove();

                        if (datas.length > 0) {
                            let i = 1;
                            if (url === "materi") {
                                datas.forEach(data => {
                                    tbody.append(`
                                    <tr>
                                        <th scope="row">${i}</th>
                                        <td>${data.title}</td>
                                        <td>${data.course}</td>
                                        <td>${data.creator}</td>
                                        <td>${data.created_at}</td>
                                        <td>
                                            <a href="/dash/${url}/article/${data.id}"
                                                class="btn btn-rounded btn-outline-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    `);
                                    i++;
                                });
                            } else {
                                datas.forEach(data => {
                                    tbody.append(`
                                    <tr>
                                        <th scope="row">${i}</th>
                                        <td>${data.title}</td>
                                        <td>${data.category}</td>
                                        <td>${data.creator}</td>
                                        <td>${data.created_at}</td>
                                        <td>
                                            <a href="/dash/${url}/article/${data.id}"
                                                class="btn btn-rounded btn-outline-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    `);
                                    i++;
                                });
                            }
                        } else {
                            tbody.append(`
                        <tr class="loading">
                        <td colspan="6">
                        <h6 class="text-sakura"><i>Sorry, Data not found.</i></h6>
                        </td>
                        </tr>`);
                        }
                    });
            } else {
                window.location = `/dash/${url}/article`;
            }
        }
    });
}

tableArticle("searchMateriByTitle", "materi-table", "materi");
tableArticle("searchTipsByTitle", "tips-table", "tips");
tableArticle("searchInfoByTitle", "info-table", "info");
