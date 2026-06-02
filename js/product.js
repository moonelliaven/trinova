// ==================== FILTER KATEGORI ====================
const filterCards   = document.querySelectorAll('.card-section .card, .card-section .active-1');
const productCards  = document.querySelectorAll('.card-2');

filterCards.forEach(btn => {
    btn.addEventListener('click', () => {
        // Hapus kelas aktif dari semua tombol filter
        filterCards.forEach(b => {
            b.classList.remove('active-1');
            b.style.backgroundColor = '';
            b.style.color = '';
        });

        // Beri kelas aktif ke tombol yang diklik
        btn.classList.add('active-1');

        const filter = btn.getAttribute('data-filter');

        productCards.forEach(card => {
            const category = card.getAttribute('data-category');

            if (filter === 'all' || category === filter) {
                // Tampilkan
                card.style.display  = 'flex';
                card.style.opacity  = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                    card.style.opacity    = '1';
                    card.style.transform  = 'translateY(0)';
                }, 10);
            } else {
                // Sembunyikan
                card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                card.style.opacity    = '0';
                card.style.transform  = 'translateY(20px)';
                setTimeout(() => {
                    card.style.display = 'none';
                }, 300);
            }
        });
    });
});