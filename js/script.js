let s = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');

function showSlide(n) {
    slides.forEach(el => el.classList.remove('active'));
    dots.forEach(el => el.classList.remove('active'));
    s = (n + slides.length) % slides.length;
    slides[s].classList.add('active');
    dots[s].classList.add('active');
}

function next() { showSlide(s + 1); }
function prev() { showSlide(s - 1); }

setInterval(next, 5000);
document.querySelector('.prev')?.addEventListener('click', prev);
document.querySelector('.next')?.addEventListener('click', next);
dots.forEach((dot, i) => dot.addEventListener('click', () => showSlide(i)));

document.querySelectorAll('.add-to-cart').forEach(btn => 
    btn.addEventListener('click', () => console.log('Товар в корзине'))
);

document.querySelectorAll('.slide-btn').forEach(btn => 
    btn.addEventListener('click', () => console.log('Слайд-кнопка'))
);