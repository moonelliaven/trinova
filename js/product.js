// ==================== FILTER KATEGORI ====================
const filterBtns   = document.querySelectorAll('#filter-kategori .card, #filter-kategori .active-1');
const productCards = document.querySelectorAll('.card-sect-5 .card-2');

filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {

        // Reset semua tombol
        filterBtns.forEach(b => b.classList.remove('active-1'));

        // Aktifkan tombol yang diklik
        btn.classList.add('active-1');

        const filter = btn.getAttribute('data-filter');

        productCards.forEach(card => {
            const category = card.getAttribute('data-category');

            if (filter === 'all' || category === filter) {
                card.style.display   = 'flex';
                card.style.opacity   = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                    card.style.opacity    = '1';
                    card.style.transform  = 'translateY(0)';
                }, 10);
            } else {
                card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                card.style.opacity    = '0';
                card.style.transform  = 'translateY(10px)';
                setTimeout(() => { card.style.display = 'none'; }, 300);
            }
        });
    });
});