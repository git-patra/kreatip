import $ from "jquery";

//* ===== Change Country ==== //
$("#select-benua").on("change", function() {
    $("#select-negara").empty();
    $("#select-negara").append(`
    <option class="option-load"><span class="sr-only text-center">Loading...</span></option>
    `);
    const benua = $(this).val();
    fetch("http://api.localhost:8000/api/info/country")
        .then(response => {
            return response.json();
        })
        .then(responseJson => {
            const datas = responseJson.data;
            $(".option-load").remove();
            $("#select-negara").append(`
            <option value="undefined" selected disabled>Pilih Negara</option>
            `);

            datas.forEach(data => {
                if (data.benua === benua) {
                    $("#select-negara").append(`
                    <option value="${data.country}">${data.country}</option>
                    `);
                }
            });
        });
});

//* ===== Change Course ==== //
$("#select-keahlian").on("change", function() {
    $("#select-subkeahlian").empty();
    $("#select-subkeahlian").append(`
    <option class="option-load"><span class="sr-only text-center">Loading...</span></option>
    `);
    const keahlian = $(this).val();
    fetch("http://api.localhost:8000/api/info/course")
        .then(response => {
            return response.json();
        })
        .then(responseJson => {
            const datas = responseJson.data;
            $("#select-subkeahlian .option-load").remove();
            $("#select-subkeahlian").append(`
            <option value="undefined" selected disabled>Pilih Cabang keahlian</option>
            `);

            datas.forEach(data => {
                if (data.keahlian === keahlian) {
                    $("#select-subkeahlian").append(`
                    <option value="${data.course}">${data.course}</option>
                    `);
                }
            });
        });
});
