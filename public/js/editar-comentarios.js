(function($) {
    "use strict";

    var group = $(".input-texto");
    var input = group.find("[type=text]");

    group.hide();
    input.val("");

    $(".editar-form").on("submit", function(e) {
        if (!(group.find(".form-control").val())) {
            e.preventDefault();

            var p = $(this).prev();

            p.hide();
            group.show();
            input.val(p.text());
        }
    });
})(jQuery);