import $ from "jquery";

//* ===== Change Country ==== //
$("#select-benua").on("change", function() {
    $("#select-negara").empty();
    $("#select-negara").append(`
    <option class="option-load"><span class="sr-only text-center">Please Wait...</span></option>
    `);
    const benua = $(this).val();
    fetch("https://api.kreatip.id/api_g9gxv/info/country")
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
                    <option value="${data.name}">${data.name}</option>
                    `);
                }
            });
        });
});

//* ===== Change Course ==== //
$("#select-keahlian").on("change", function() {
    $("#select-subkeahlian").empty();
    $("#select-subkeahlian").append(`
    <option class="option-load"><span class="sr-only text-center">Please Wait...</span></option>
    `);
    const keahlian = $(this).val();
    fetch("https://api.kreatip.id/api_g9gxv/info/course")
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
                    <option value="${data.name}">${data.name}</option>
                    `);
                }
            });
        });
});
