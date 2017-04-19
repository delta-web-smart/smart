$(function() {
    var index = 0;
    $(".offer_block").hide();
    $(".size-list li").each(function(i) {
        if ($(this).hasClass('active')) {
            index = i;
        }
    });
    index -= 1;
    $(".offer_block[data-page="+index+"]").show();
    $(".size-list li").on("click", function(e) {
        e.preventDefault();
        var index = 0;
        $(".size-list li").removeClass('active');
        $(this).addClass("active");
        $(".offer_block").hide();
        $(".size-list li").each(function(i) {
            if ($(this).hasClass('active')) {
                index = i;
            }
        });
        index -= 1;
        if (index < 0) {
            $(".offer_block").show();
        } else {
            $(".offer_block[data-page="+index+"]").show();
        }
    });
});
