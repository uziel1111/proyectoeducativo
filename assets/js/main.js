AOS.init();
$(window).scroll(function(){
    $('nav').toggleClass('scrolled', $(this).scrollTop() > 100);
})
