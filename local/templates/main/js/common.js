$(function() {
    $(".top-category li").on("click", function(e) {
        e.preventDefault();
        $currentClass = $(this).attr("class");
        $(".top-category li").removeClass("active");
        $(this).addClass("active");
        $(".catalog.tabs").hide();
        $(".catalog.tabs."+$currentClass).show();
    });
});