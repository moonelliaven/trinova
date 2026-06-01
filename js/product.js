const filterButtons = document.querySelectorAll('.projects .card');
const projectCards = document.querySelectorAll('.card-2');
const text = document.querySelector('.none');

filterButtons.forEach(button => {
    button.addEventListener('click', () => {
        const filter = button.dataset.filter;

        filterButtons.forEach(btn => btn.classList.remove('active-1'));
        button.classList.add('active-1');

        projectCards.forEach(card => {
            const category = card.dataset.category;

            if (filter === 'all' || filter === category) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
                text.style.display = 'block';
            }
        });
    });
});