import $ from "jquery";

//* ===== Function List Materi via Select ===== /
function selectMateri(link, link2) {
    $(link).on("change", () => {
        $(`${link2} ul li`).remove();
        $(`${link2} ul`).append(`
            <div class="text-center loading">
            <div class="spinner-border text-purple" role="status">
              <span class="sr-only text-center">Loading...</span>
            </div>
            </div>`);

        const selvalue = $(link)
            .find(":selected")
            .val();

        fetch("http://api.localhost:8000/api_g9gxv/materi/artikel")
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error("Something went wrong");
                }
            })
            .then(responseJson => {
                const datas = responseJson.data;
                $(`${link2} .loading`).remove();
                datas.forEach(data => {
                    const stripmapel = data.mapel.toLowerCase();
                    const strip = data.course.toLowerCase();

                    const course = strip.replace(" ", "-");
                    const mapel = stripmapel.replace(/\s+/g, "-").trim();

                    if (selvalue === data.course) {
                        $(`${link2} ul`).append(`
                        <li>
                            <a href="/materi/${course}/${mapel}">
                                ${data.mapel}
                            </a>
                        </li>
                    `);
                    }
                });
                if ($(`${link2} ul`).children().length < 1) {
                    $(`${link2} ul`).append(`
                        <li>
                            <h6 class="text-center red"><i>Data is empty.</i></h6>
                        </li>`);
                }
            })
            .catch(error => {
                $(`${link2} .loading`).remove();
                $(`${link2} ul`).append(`
                <li>
                    <h6 class="text-center red"><i>${error}</i></h6>
                </li>`);
            });
    });
}

selectMateri("#select-course", "#list-materi");
selectMateri("#select-course2", "#list-materi2");
