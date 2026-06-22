document.addEventListener("DOMContentLoaded", function () {

    // 1. Inisialisasi Pustaka Animasi AOS (Animate on Scroll)
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        mirror: false
    });

    // 2. Efek Transisi Navbar saat Scroll Layar
    const navbar = document.querySelector('.dynamic-navbar');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // 3. Penanganan Pengiriman Form Kritik & Saran (Feedback)
    const feedbackForm = document.getElementById('feedbackForm');

    if (feedbackForm) {
        feedbackForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Mengambil data input
            const name = this.querySelector('input[type="text"]').value;
            const email = this.querySelector('input[type="email"]').value;
            const message = this.querySelector('textarea').value;

            // Simulasi pengiriman sukses (Nantinya digantikan fungsi AJAX/Form-POST CI)
            alert(`Terima kasih ${name}, kritik atau saran Anda telah berhasil terkirim secara aman ke sistem Samsat Perawang.`);

            // Reset input form setelah berhasil kirim
            feedbackForm.reset();
        });
    }

    // 4. Efek Smooth Scroll untuk Navigasi Internal Menu Berjalan Aman
    const links = document.querySelectorAll('.navbar-nav a[href^="#"], .btn-nav-group a[href^="#"], .hero-section a[href^="#"]');

    for (const link of links) {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const targetId = this.getAttribute("href");
            const targetSection = document.querySelector(targetId);

            if (targetSection) {
                // Menutup Hamburger Menu Otomatis pada Tampilan Mobile setelah klik tautan
                const navbarCollapse = document.getElementById('navbarNav');
                if (navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                    bsCollapse.hide();
                }

                // Kalkulasi offset tinggi agar tidak tertutup Sticky Navbar
                const navbarHeight = navbar.offsetHeight;
                const targetPosition = targetSection.getBoundingClientRect().top + window.pageYOffset - navbarHeight;

                window.scrollTo({
                    top: targetPosition,
                    behavior: "smooth"
                });
            }
        });
    }
});