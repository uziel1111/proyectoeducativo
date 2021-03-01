AOS.init();
$(window).scroll(function(){
    $('nav').toggleClass('scrolled', $(this).scrollTop() > 100);
})
/*Efecto contador en los números*/
$('.counter').counterUp({
    delay: 4
});
