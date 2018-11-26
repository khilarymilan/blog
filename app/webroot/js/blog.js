function scrollTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

 $(function() {
    $('.hamburger').click( function() {
        $(this).css({'display': 'none'});
        $(".close").css({'display': 'block'});
        $(".js-nav").attr('class', 'nav is-active');
    });
    $('.close').click( function() {
        $(this).css({'display': 'none'});
        $(".hamburger").css({'display': 'block'});
        $(".is-active").attr('class', 'nav js-nav');
    });

    $('.form-file').click( function() {
        $('#image').change(function() {
            var filename = $('#image').val().replace(/C:\\fakepath\\/i, '');
            $('#image-name').text(filename);

        });
    });

});