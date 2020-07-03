import $ from "jquery";

function appendResult(data) {
    const category = data.category.toLowerCase();
    const title = data.title.toLowerCase();

    $(".append-info").append(`
    <div class="col mb-4">
        <div class="card card-info">
            <div class="row">
                <div class="col-xl-12 col-l-12 col-md-12 col-12">
                    <a
                        href="/info/${category}/${title}">
                        <img src="/storage/info/img/${data.thumbnail_path}"
                            class="card-img-top" alt="...">
                    </a>
                </div>
                <div class="col-xl-12 col-l-12 col-md-12 col-12">
                    <div class="card-body">
                        <a
                            href="/info/${category}/${title}">
                            <h6 class="card-title">${title}</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    `);
}

$("#btnFilter-info").on("click", _ => {
    const pelajarValue = $("#select-pelajar option:selected").val();
    const benuaValue = $("#select-benua option:selected").val();
    const negaraValue = $("#select-negara option:selected").val();
    const keahlianValue = $("#select-keahlian option:selected").val();
    const subkeahlianValue = $("#select-subkeahlian option:selected").val();
    $(".info-article").empty();
    $(".info-article").append(`
        <div class="text-center loading">
        <div class="spinner-border text-purple" role="status">
          <span class="sr-only text-center">Loading...</span>
        </div>
        </div>`);

    fetch(`http://api.localhost:8000/api/info/artikel`)
        .then(response => {
            return response.json();
        })
        .then(responseJson => {
            const datas = responseJson.data;
            $(`.info-article .loading`).remove();
            $(".info-article").append(`
            <div class="article-item">
                <div class="col-xl-12 col-l-12 col-sm-12 col-12">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 append-info">`);

            /* Beasiswa Filter Logic */
            if (
                !(pelajarValue === "undefined") &&
                !(benuaValue === "undefined") &&
                !(negaraValue === "undefined")
            ) {
                datas.forEach(data => {
                    if (
                        data.pelajar === pelajarValue &&
                        data.country === negaraValue
                    ) {
                        appendResult(data);
                    }
                });
            } else if (
                !(benuaValue === "undefined") &&
                !(negaraValue === "undefined")
            ) {
                datas.forEach(data => {
                    if (data.country === negaraValue) {
                        appendResult(data);
                    }
                });
            } else if (
                !(pelajarValue === "undefined") &&
                !(benuaValue === "undefined")
            ) {
                datas.forEach(data => {
                    if (data.pelajar === pelajarValue) {
                        appendResult(data);
                    }
                });
            } else if (
                !(pelajarValue === "undefined") &&
                !(negaraValue === "undefined")
            ) {
                datas.forEach(data => {
                    if (
                        data.pelajar === pelajarValue &&
                        data.country === negaraValue
                    ) {
                        appendResult(data);
                    }
                });
            } else if (!(benuaValue === "undefined")) {
                $(".append-info").append(`
                <p class="text-center">
                <h6 class="text-center red"><i>Silahkan pilih negara atau <a class="text-purple" href="javascript:window.location.href=window.location.href">kembali</a></i></h6>
                </p>
                `);
            } else if (!(negaraValue === "undefined")) {
                datas.forEach(data => {
                    if (data.country === negaraValue) {
                        appendResult(data);
                    }
                });
            } else if (!(pelajarValue === "undefined")) {
                console.log(pelajarValue);
                datas.forEach(data => {
                    if (data.pelajar === pelajarValue) {
                        appendResult(data);
                    }
                });
            } else {
                $(".append-info").append(`
                <p class="text-center">
                <h6 class="text-center red"><i>Data not found. Please select a filter or <a class="text-purple" href="javascript:window.location.href=window.location.href">back</a></i></h6>
                </p>
                `);
            }

            /* Pelatihan Filter Logic */
            if (
                !(keahlianValue === "undefined") &&
                !(subkeahlianValue === "undefined")
            ) {
                console.log(keahlianValue);
                console.log(subkeahlianValue);
                datas.forEach(data => {
                    if (
                        data.course === subkeahlianValue &&
                        data.subcategory === keahlianValue
                    ) {
                        appendResult(data);
                    }
                });
            } else if (!(keahlianValue === "undefined")) {
                datas.forEach(data => {
                    if (data.subcategory === keahlianValue) {
                        appendResult(data);
                    }
                });
            } else if (!(subkeahlianValue === "undefined")) {
                datas.forEach(data => {
                    if (data.course === subkeahlianValue) {
                        appendResult(data);
                    }
                });
            } else {
                $(".append-info").append(`
                <p class="text-center">
                <h6 class="text-center red"><i>Sorry, data not found. Please select a filter or <a class="text-purple" href="javascript:window.location.href=window.location.href">back</a></i></h6>
                </p>
                `);
            }

            if ($(".append-info").children().length < 1) {
                $(".append-info").append(`
            <p class="text-center">
            <h6 class="text-center red"><i>Sorry, data is empty. Please select a filter again or <a class="text-purple" href="javascript:window.location.href=window.location.href">back</a></i></h6>
            </p>
            `);
            }
        });
});
