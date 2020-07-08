import Swal from "sweetalert2";

//* ===== Sweet Alert ==== //
const flashData = $(".flash-data").data("flashdata");
if (flashData == "Email berhasil terkirim!") {
    Swal.fire({
        text: flashData,
        icon: "success"
    });
}

if (flashData == "Data has been registered!") {
    Swal.fire({
        text: flashData,
        icon: "success"
    });
}

if (flashData == "Successfully Added!") {
    Swal.fire({
        text: flashData,
        icon: "success"
    });
}

if (flashData == "Successfully Updated!") {
    Swal.fire({
        text: flashData,
        icon: "success"
    });
}

if (flashData == "Successfully Published!") {
    Swal.fire({
        text: flashData,
        icon: "success"
    });
}

if (flashData == "Password has been changed!") {
    Swal.fire({
        text: flashData,
        icon: "success"
    });
}

if (flashData == "Wrong current Password!") {
    Swal.fire({
        text: flashData,
        icon: "error"
    });
}

$(".btn-delete").on("click", function(e) {
    e.preventDefault();

    let form = $(this).parents("form");

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#5F76E8",
        confirmButtonText: "Yes, delete it!"
    }).then(result => {
        if (result.value) {
            form.submit();
        }
    });
});
