$(document).ready(function() {
    // bind click event to all internal page anchors
    $("a[href*=#top]").on("click", function(e) {
        var page = $(this).attr('href'); // Page cible
            var speed = 750; // Durée de l'animation (en ms)
            $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
            return false;
        });
    });
tinymce.init({ selector:'textarea' });