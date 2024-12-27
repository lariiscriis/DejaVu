let currentSlide = 0;

function slide(direction) {
    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slide');

    currentSlide += direction;

    if (currentSlide < 0) {
        currentSlide = slides.length - 1;
    } else if (currentSlide >= slides.length) {
        currentSlide = 0;
    }

    const slideWidth = slides[0].offsetWidth;
    slider.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
}