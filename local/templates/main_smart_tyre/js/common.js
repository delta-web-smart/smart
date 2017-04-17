$(function() {
    $(".top-category li").on("click", function(e) {
        e.preventDefault();
        $currentClass = $(this).attr("class");
        $(".top-category li").removeClass("active");
        $(this).addClass("active");
        $(".catalog.main_page").hide();
        $(".catalog.main_page."+$currentClass).show();
    });
});