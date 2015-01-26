(function($) {
    var textos = $(".noticia-texto");
    var ultimas = $(".ultimas h4");
    var titulos = $(".noticia-header")

    var limite = $(location).attr('href').indexOf("listar") > -1 ? 350 : 140;

    textos.each(function() {
        if ($(this).text().length > limite) {
            $(this).text($(this).text().substr(0,limite - 3)+"...");
        }
    });

    ultimas.each(function() {
        if ($(this).text().length > limite - 10) {
            $(this).text($(this).text().substr(0,limite - 13)+"...");
        }
    });

    titulos.each(function() {
        if ($(this).text().length > limite - 70) {
            $(this).text($(this).text().substr(0, limite - 73)+"...");
        }
    })
})(jQuery);

