import $ from "jquery";

//* ===== Function Search Materi ==== //
function searchMateri(link) {
    $(link).on("keypress", function(e) {
        const searchvalue = $(this)
            .val()
            .toLowerCase();
        if (e.which === 13) {
            $(".materi-article").empty();
            $(".materi-article").append(`
                <div class="text-center loading">
                <div class="spinner-border text-purple" role="status">
                  <span class="sr-only text-center">Loading...</span>
                </div>
                </div>`);

            if (searchvalue) {
                fetch(
                    `https://api.kreatip.id/api_g9gxv/materi/artikel/${searchvalue}`
                )
                    .then(response => {
                        return response.json();
                    })
                    .then(responseJson => {
                        const datas = responseJson.data;
                        $(`.materi-article .loading`).remove();
                        $(".materi-article").append(`
                            <div class="row baris-search row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">
                            </div>`);

                        datas.forEach(data => {
                            const stripmapel = data.mapel.toLowerCase();
                            const strip = data.course.toLowerCase();

                            const title = data.title.split(" ");
                            const jumlah = title.length;
                            let titik = "";
                            jumlah > 11 ? (titik = "...") : "";
                            const first_part = title.splice(0, 11).join(" ");

                            const course = strip.replace(" ", "-");
                            const mapel = stripmapel
                                .replace(/\s+/g, "-")
                                .trim();

                            $(`.materi-article .baris-search`).append(`
                            <div class="col mb-4">
                                <div class="card card-msearch">
                                    <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 p-0">
                                        <a
                                            href="/materi/${course}/${mapel}">
                                            <img src="/storage/materi/img/${data.thumbnail_path}"
                                                class="card-img-top" alt="...">
                                        </a>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 p-0">
                                        <div class="card-body">
                                            <a
                                                href="/materi/${course}/${mapel}">
                                                <h6 class="card-title">${first_part}${titik}</h6>
                                            </a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            `);
                        });
                        if (
                            $(".materi-article .baris-search").children()
                                .length < 1
                        ) {
                            $(".materi-article .baris-search").append(`
                        <p class="text-center">
                        <h6 class="text-center red"><i>Sorry, data not found.</i></h6>
                        </p>
                        `);
                        }
                    });
            } else {
                $(".materi-article").append(`
                <h3 class="red text-center"><i>Type something please...</i></h3>
                `);
            }
        }
    });
}

searchMateri("#search-materi");
searchMateri("#search-materi2");
