//* Function Fetch Promise

function appendSelect(name) {
    const named = name.toLowerCase();
    const template = $(".select-lainnya");
    template.append(`
        <div class="row row-cols-1 mb-4">
            <div class="col">
                <label for="${named}">
                    <h6 class="text-sakura">${name}</h6>
                </label>
                <select class="custom-select" id="${named}" name="${named}" required>
                <option class="option-load"><span class="sr-only text-center">Loading...</span></option>
                </select>
            </div>
        </div>`);

    fetch(`http://api.localhost:8000/api_g9gxv/info/${named}`)
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error("Something went wrong");
            }
        })
        .then(responseJson => {
            const datas = responseJson.data;
            $(`.select-lainnya #${named}`).empty();

            datas.forEach(data => {
                $(`.select-lainnya #${named}`).append(`
                        <option value="${data.id}">${data.name}
                        </option>`);
            });
        });
}

function appendSelectSub(id) {
    const template = $(".select-lainnya");

    fetch(`http://api.localhost:8000/api_g9gxv/info/subcategory`)
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error("Something went wrong");
            }
        })
        .then(responseJson => {
            const datas = responseJson.data;
            $(`.select-lainnya .loading`).remove();
            template.append(`
            <div class="row row-cols-1 mb-4">
                <div class="col">
                    <label class="text-sakura"  for="subcategory">
                        <h6>SubCategory</h6>
                    </label>
                    <select class="custom-select" id="subcategory" name="subcategory" required>
                    </select>
                </div>
            </div>`);

            datas.forEach(data => {
                if (data.t_info_category_id === id && data.status === 1) {
                    $(`.select-lainnya #subcategory`).append(`
                        <option value="${data.id}">${data.subcategory_name}
                        </option>`);
                }
            });

            if (id === 1) {
                appendSelect("Pelajar");
                appendSelect("Continent");
                appendSelect("Country");
            } else {
                appendSelect("Course");
            }

            //* On Change Pelajar Select
            $(".select-lainnya #subcategory").on("change", function() {
                const setValue = parseInt($(this).val());

                $(".select-lainnya #pelajar").empty();
                $(".select-lainnya #pelajar").append(`
                <option class="option-load"><span class="sr-only text-center">Loading...</span></option>
                `);
                fetch(`http://api.localhost:8000/api_g9gxv/info/pelajar`)
                    .then(response => {
                        if (response.ok) {
                            return response.json();
                        } else {
                            throw new Error("Something went wrong");
                        }
                    })
                    .then(responseJson => {
                        const datas = responseJson.data;
                        $(".select-lainnya #pelajar .option-load").remove();

                        datas.forEach(data => {
                            if (data.subcategory === setValue)
                                $(".select-lainnya #pelajar").append(`
                                <option value="${data.id}">${data.name}
                                </option>`);
                        });
                    });
            });

            //* On Change Continent Select
            $(".select-lainnya #continent").on("change", function() {
                const setValue = parseInt($(this).val());

                $(".select-lainnya #country").empty();
                $(".select-lainnya #country").append(`
                <option class="option-load"><span class="sr-only text-center">Loading...</span></option>
                `);
                fetch(`http://api.localhost:8000/api_g9gxv/info/country`)
                    .then(response => {
                        if (response.ok) {
                            return response.json();
                        } else {
                            throw new Error("Something went wrong");
                        }
                    })
                    .then(responseJson => {
                        const datas = responseJson.data;
                        $(".select-lainnya #country .option-load").remove();

                        datas.forEach(data => {
                            if (data.benua_id === setValue)
                                $(".select-lainnya #country").append(`
                                <option value="${data.id}">${data.name}
                                </option>`);
                        });
                    });
            });
        });
}

//* On Change Category Select
$("#selectCategoryInfo").on("change", function() {
    const template = $(".select-lainnya");
    template.empty();
    const setValue = parseInt($(this).val());
    template.append(`
    <div class="text-center loading mb-4">
    <div class="spinner-border text-sakura" role="status">
      <span class="sr-only text-center">Loading...</span>
    </div>
    </div>`);

    appendSelectSub(setValue);
});
