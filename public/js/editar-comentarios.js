(function($) {
    "use strict";

    var form = $(".comentario .editar-form");
    form.hide();

    $(".edit_button").on("click", function(e) {
        var p = $(this).closest(".panel-footer").prev().find("p");
        var formToggle = $(this).closest(".panel-footer").prev().find(".editar-form");

        p.toggle();
        formToggle.toggle();
    });
})(jQuery);