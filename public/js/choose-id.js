(function($) {
    "use strict";

    $(".form-group").hide();

    $(".form-inline").on("submit", function(e) {
        var id = $(this).find("#id").val();

        if (id == 0) {
            e.preventDefault();
            $(this).find(".form-group").toggleClass("form-group-show").toggle();
            $(this).toggleClass("form-inline-show");
        }
    });
})(jQuery);

