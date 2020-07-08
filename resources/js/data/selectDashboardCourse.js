$("#selectSubcategoryDashboard").on("change", function() {
    const setValue = $(this).val();
    $("#selectCourseDashboard").empty();
    $("#selectCourseDashboard").append(`
    <option class="option-load"><span class="sr-only text-center">Loading...</span></option>
    `);

    fetch("http://api.localhost:8000/api_g9gxv/materi/course")
        .then(response => {
            return response.json();
        })
        .then(responseJson => {
            const datas = responseJson.data;
            $(".option-load").remove();

            datas.forEach(data => {
                if (data.subcategory === setValue) {
                    $("#selectCourseDashboard").append(`
                    <option value="${data.id}">${data.course}</option>
                    `);
                }
            });
        });
});
