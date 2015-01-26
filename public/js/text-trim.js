(function($) {
    var textos = $(".noticia-texto");
    var ultimas = $(".ultimas h4");
    var titulos = $(".noticia-header")

    textos.each(function() {
        if ($(this).text().length > 140) {
            $(this).text($(this).text().substr(0,137)+"...");
        }
    });

    ultimas.each(function() {
        if ($(this).text().length > 130) {
            $(this).text($(this).text().substr(0,127)+"...");
        }
    });

    titulos.each(function() {
        if ($(this).text().length > 70) {
            $(this).text($(this).text().substr(0,67)+"...");
        }
    })
})(jQuery);

