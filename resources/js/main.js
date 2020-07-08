import $ from "jquery";
import tilt from "tilt.js";

//* ===== Scroll to Top ==== //
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
        // If page is scrolled more than 50px
        $("#return-to-top").fadeIn(200); // Fade in the arrow
    } else {
        $("#return-to-top").fadeOut(200); // Else fade out the arrow
    }
});
$("#return-to-top").click(function() {
    // When arrow is clicked
    $("body,html").animate(
        {
            scrollTop: 0 // Scroll to top of body
        },
        250
    );
});

//* ===== Nav Active Class ==== //
$(document).ready(function() {
    if (window.location.href.indexOf("materi") > -1) {
        $(".navbar").addClass("sticky-top");
        $(".logo-mobile").addClass("sticky-top");
        $(".navbar-search").addClass("sticky-top");
    }
});

//* ===== Show Search Input ===== //
$(".btn-search").on("click", function() {
    $(".navbar-search").slideToggle("150", function() {});
    $("body,html").animate(
        {
            scrollTop: 0 // Scroll to top of body
        },
        350
    );
});

// //* ===== Scroll Focus ==== //
// const listFocus = document.querySelector(".focus");
// if (listFocus) {
//     listFocus.scrollIntoView({ behavior: "smooth" });
// }

//* ===== Image Lightbox & Table Scrollable ==== //
function addEl(link) {
    $(`${link} img`).attr("data-imagebox", "");
    $(`${link} table`).wrap(`<div class="table-responsive"></div>`);
    $(`${link} table`).addClass(`table-hover`);
    $(`${link} table thead`).addClass(`thead-dark`);
}
addEl(".materi-article");
addEl(".tips-article");
addEl(".info-article");
$(".suggest-article img").removeAttr("data-imagebox");

//* ===== Image Hover animation on Login Page ==== //
$(".js-tilt").tilt({
    scale: 1.1
});

//* Input File Change Name *//
function imgText(link) {
    $(link).on("change", function() {
        //get the file name
        const fileName = this.files[0].name;
        //replace the "Choose a file" label
        $(this)
            .next(".custom-file-label")
            .html(fileName);
    });
}
imgText("#inputImgFile");
imgText("#imgthumb");
