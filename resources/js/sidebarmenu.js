$(document).ready(function() {
    let scroll_pos = 0;
    $(document).scroll(function() {
        scroll_pos = $(this).scrollTop();
        if (scroll_pos > 70) {
            $(".topbar").css("background-color", "#1A1A1A");
        } else {
            $(".topbar").css("background", "transparent");
        }
    });
});

$(function() {
    const current = location.pathname;
    $(".sidebarnav li a").each(function() {
        const $this = $(this);
        // if the current path is like this link, make it active
        if ($this.attr("href").indexOf(current) !== -1) {
            $this.addClass("active");
            $this.closest(".collapse").addClass("show");
            $this
                .closest(".sidebar-item")
                .children(".sidebar-link")
                .removeClass("collapsed");
            $this
                .closest(".sidebar-item")
                .children(".sidebar-link")
                .addClass("active");
            $this
                .closest(".sidebar-item")
                .children(".collapse")
                .addClass("show");
        }
    });
});
