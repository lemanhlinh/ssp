$(document).ready(function(){
    $('.level1-menu-item').each(function() {
        $(this).find('.activated').parents('li').addClass('activated');
    });
    $('ul.nav > li > ul.sub-menu > .level1-menu-item').hover(function () {
        if ($('> ul.sub-menu',this).length > 0) {
            $('> i',this).removeClass('fa-arrow-circle-right').addClass('fa-arrow-circle-down');
            $('> ul.sub-menu',this).stop().slideDown('slow');
        }
    },function () {
        if ($('> ul.sub-menu',this).length > 0) {
            $('> i',this).removeClass('fa-arrow-circle-down').addClass('fa-arrow-circle-right');
            $('> ul.sub-menu',this).stop().slideUp('slow');
        }
    });
    $('.menu-item i').click(function(e){
        e.preventDefault();
        if ($(this).next().next('.sub-menu').is(':visible')) {
            $(this).removeClass('fa-arrow-circle-down').addClass('fa-arrow-circle-right');
        } else {
            $(this).removeClass('fa-arrow-circle-right').addClass('fa-arrow-circle-down');
        }
        $(this).next().next('.sub-menu').slideToggle();
    });
});