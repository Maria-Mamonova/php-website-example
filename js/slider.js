// Получаем необходимые элементы из DOM
const slider = document.querySelector('.slider');
const slides = document.querySelectorAll('.slide');
const prevBtn = document.querySelector('.prev');
const nextBtn = document.querySelector('.next');
const pagination = document.querySelector('.pagination');

let currentIndex = 1; // Индекс текущего слайда
let timer; // Переменная для хранения интервального таймера

// Функция установки высоты слайдов равной высоте слайдера
function setSlideHeight() {
    const sliderHeight = slider.clientHeight; // Получаем высоту слайдера
    slides.forEach(slide => {
        slide.style.height = `${sliderHeight}px`; // Устанавливаем высоту каждого слайда
    });
}

// Функция для перехода к определенному слайду
function goToSlide(index) {
    if (index < 0) {
        currentIndex = slides.length - 1; // Если индекс меньше 0, переходим к последнему слайду
    } else if (index >= slides.length) {
        currentIndex = 0; // Если индекс больше или равен количеству слайдов, переходим к первому слайду
    } else {
        currentIndex = index; // В противном случае переходим к указанному индексу
    }
    slider.style.transform = `translateY(-${currentIndex * 100}%)`; // Перемещаем слайдер
    updatePagination(); // Обновляем пагинацию
    clearInterval(timer); // Сбрасываем интервальный таймер
    timer = setInterval(nextSlide, 5000); // Запускаем таймер заново при ручном переключении слайдов
}

// Функция для перехода к следующему слайду
function nextSlide() {
    slides[currentIndex].style.opacity = 0; // Затемняем текущий слайд
    setTimeout(() => {
        slides[currentIndex].style.opacity = 1; // Возвращаем прозрачность текущему слайду
        goToSlide(currentIndex + 1); // Переходим к следующему слайду
    }, 100); // Добавляем задержку для анимации затемнения
}

// Функция для перехода к предыдущему слайду
function prevSlide() {
    slides[currentIndex].style.opacity = 0; // Затемняем текущий слайд
    setTimeout(() => {
        slides[currentIndex].style.opacity = 1; // Возвращаем прозрачность текущему слайду
        goToSlide(currentIndex - 1); // Переходим к предыдущему слайду
    }, 100); // Добавляем задержку для анимации затемнения
}

// Функция для обновления пагинации
function updatePagination() {
    pagination.innerHTML = ''; // Очищаем содержимое пагинации
    slides.forEach((slide, index) => {
        const dot = document.createElement('span'); // Создаем точку для пагинации
        dot.classList.add('dot'); // Добавляем класс для точки
        if (index === currentIndex) {
            dot.classList.add('active'); // Если текущий слайд, добавляем класс для активной точки
        }
        dot.addEventListener('click', () => {
            clearInterval(timer); // Сбрасываем интервальный таймер при клике на точку
            goToSlide(index); // Переходим к выбранному слайду
        });
        pagination.appendChild(dot); // Добавляем точку в пагинацию
    });
}

// Обработчик клика на кнопку "назад"
prevBtn.addEventListener('click', () => {
    clearInterval(timer); // Сбрасываем интервальный таймер
    prevSlide(); // Вызываем функцию для перехода к предыдущему слайду
});

// Обработчик клика на кнопку "вперед"
nextBtn.addEventListener('click', () => {
    clearInterval(timer); // Сбрасываем интервальный таймер
    nextSlide(); // Вызываем функцию для перехода к следующему слайду
});

// Обработчик нажатия клавиш на клавиатуре
document.addEventListener('keydown', (e) => {
    clearInterval(timer); // Сбрасываем интервальный таймер
    if (e.key === 'ArrowLeft') {
        prevSlide(); // Если нажата клавиша влево, переходим к предыдущему слайду
    } else if (e.key === 'ArrowRight') {
        nextSlide(); // Если нажата клавиша вправо, переходим к следующему слайду
    }
});

updatePagination(); // Обновляем пагинацию при загрузке страницы
setSlideHeight(); // Устанавливаем высоту слайдов при загрузке страницы

timer = setInterval(nextSlide, 5000); // Устанавливаем интервальный таймер для автоматического переключения слайдов