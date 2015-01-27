(function($) {
    "use strict";

    //hides form when page loads
    var form = $(".comentario .editar-form");
    form.hide();

    //toggles the form visibility on click
    $(".edit_button").on("click", function(e) {
        var p = $(this).closest(".panel-footer").prev().find("p");
        var formToggle = $(this).closest(".panel-footer").prev().find(".editar-form");

        p.toggle();
        formToggle.toggle();
    });
})(jQuery);