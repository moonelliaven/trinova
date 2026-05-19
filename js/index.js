
const slider = document.getElementById('slider');
const next = document.getElementById('next');
const prev = document.getElementById('prev');
const faqBoxes = document.querySelectorAll('.faq .box');
const projects = document.querySelectorAll('.project-card');

let currentIndex = 0;
const cardWidth = 360; // 340 + gap

next.addEventListener('click', () => {
    currentIndex++;
    
    if(currentIndex > 2){
        currentIndex = 0;
    }

    slider.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
});

prev.addEventListener('click', () => {
    currentIndex--;

    if(currentIndex < 0){
        currentIndex = 2;
    }

    slider.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
});
faqBoxes.forEach(box => {
    box.addEventListener('click', () => {

        // tutup semua box lain
        faqBoxes.forEach(item => {
            if (item !== box) {
                item.classList.remove('show');
                item.querySelector('.toggle-icon').src = '../img/logo/plus.png';
            }
        });

        // buka/tutup box yang diklik
        box.classList.toggle('show');

        const icon = box.querySelector('.toggle-icon');

        if (box.classList.contains('show')) {
            icon.src = '../img/logo/minus.png';
        } else {
            icon.src = '../img/logo/plus.png';
        }
    });
});

// projects onclick
projects.forEach(project => {
    project.addEventListener('click', () => {
        window.location.href = 'product.html';
    });
});