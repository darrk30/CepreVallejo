let currentSlidePC = 0;
let currentSlideMobile = 0;

const slidesPC = document.querySelectorAll('#slider-pc .slide');
const slidesMobile = document.querySelectorAll('#slider-mobile .slide');
const totalSlidesPC = slidesPC.length;
const totalSlidesMobile = slidesMobile.length;

function updateSliderPC() {
    const sliderWidth = document.getElementById('slider-pc').clientWidth;
    const newTransformValue = `translateX(-${currentSlidePC * sliderWidth}px)`;
    document.querySelector('#slider-pc .slides').style.transform = newTransformValue;
}

function updateSliderMobile() {
    const sliderWidth = document.getElementById('slider-mobile').clientWidth;
    const newTransformValue = `translateX(-${currentSlideMobile * sliderWidth}px)`;
    document.querySelector('#slider-mobile .slides').style.transform = newTransformValue;
}

document.getElementById('next-pc').addEventListener('click', () => {
    currentSlidePC++;
    if (currentSlidePC >= totalSlidesPC) {
        currentSlidePC = 0;
    }
    updateSliderPC();
});

document.getElementById('prev-pc').addEventListener('click', () => {
    currentSlidePC--;
    if (currentSlidePC < 0) {
        currentSlidePC = totalSlidesPC - 1;
    }
    updateSliderPC();
});

document.getElementById('next-mobile').addEventListener('click', () => {
    currentSlideMobile++;
    if (currentSlideMobile >= totalSlidesMobile) {
        currentSlideMobile = 0;
    }
    updateSliderMobile();
});

document.getElementById('prev-mobile').addEventListener('click', () => {
    currentSlideMobile--;
    if (currentSlideMobile < 0) {
        currentSlideMobile = totalSlidesMobile - 1;
    }
    updateSliderMobile();
});

// Función para mostrar el slider adecuado
function handleResize() {
    if (window.innerWidth < 768) { // Cambia 768 a tu breakpoint deseado
        document.getElementById('slider-mobile').classList.remove('hidden');
        document.getElementById('slider-pc').classList.add('hidden');
        updateSliderMobile(); // Asegúrate de mostrar el slider móvil correctamente
    } else {
        document.getElementById('slider-pc').classList.remove('hidden');
        document.getElementById('slider-mobile').classList.add('hidden');
        updateSliderPC(); // Asegúrate de mostrar el slider de PC correctamente
    }
}

// Llama a handleResize al cargar y al redimensionar
window.addEventListener('resize', handleResize);
window.addEventListener('load', handleResize);

// Avanzar automáticamente en el slider móvil
setInterval(() => {
    if (window.innerWidth < 768) { // Cambia 768 a tu breakpoint deseado
        currentSlideMobile++;
        if (currentSlideMobile >= totalSlidesMobile) {
            currentSlideMobile = 0;
        }
        updateSliderMobile();
    } else {
        currentSlidePC++;
        if (currentSlidePC >= totalSlidesPC) {
            currentSlidePC = 0;
        }
        updateSliderPC();
    }
}, 6000); // Cambia el slide cada 6 segundos



//PAGINA DE CONOCENOS
