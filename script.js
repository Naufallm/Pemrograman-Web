
const slider = document.querySelector('.slider');
const slides = document.querySelectorAll('.slide');
const navItems = document.querySelectorAll('.slider-nav-item');
let currentSlide = 0;

function goToSlide(n) {
    slider.style.transform = `translateX(-${n * 100}%)`;
    navItems.forEach((item, index) => {
        item.classList.toggle('active', index === n);
    });
    currentSlide = n;
}

function nextSlide() {
    goToSlide((currentSlide + 1) % slides.length);
}

navItems.forEach((item, index) => {
    item.addEventListener('click', () => goToSlide(index));
});

setInterval(nextSlide, 5000); // Change slide every 5 seconds
