var mySwiper = new Swiper ('.swiper-container', {
    loop: true,
    slidesPerView: 2,
    //spaceBetween: 10,
    autoplay:3000,
    speed: 2000,
    centeredSlides : true,
    pagination: '.swiper-pagination',
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    breakpoints: {
        767: {
            slidesPerView: 1,
            spaceBetween: 0
        }
    }
})