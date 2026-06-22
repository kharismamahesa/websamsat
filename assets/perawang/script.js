/**
 * Script untuk Dashboard UPT Pengelolaan Pendapatan Perawang
 * Kompatibel dengan Vanilla JS (Tanpa JQuery/Framework tambahan)
 */

document.addEventListener("DOMContentLoaded", function () {

    // ==========================================
    // 1. ANIMATION SCROLL (FADE IN REGISTRATION)
    // ==========================================
    const fadeSections = document.querySelectorAll(".section-fade");

    const observerOptions = {
        root: null, // Menggunakan viewport browser
        threshold: 0.1, // Element terpicu jika 10% masuk layar
        rootMargin: "0px 0px -50px 0px" // Triger sedikit lebih cepat sebelum masuk penuh
    };

    const sectionObserver = new IntersectionObserver(function (entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                // Unobserve jika ingin animasi hanya berjalan satu kali saja saat scroll down
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    fadeSections.forEach(section => {
        sectionObserver.observe(section);
    });


    // ==========================================
    // 2. FORM VALIDATION & HANDLING ASPIRASI
    // ==========================================
    const formKritikSaran = document.getElementById("formKritikSaran");

    if (formKritikSaran) {
        formKritikSaran.addEventListener("submit", function (e) {
            e.preventDefault(); // Menahan reload halaman standar browser

            // Simulasi pengambilan data form
            const nama = this.querySelector('input[type="text"]').value;
            const email = this.querySelector('input[type="email"]').value;
            const pesan = this.querySelector('textarea').value;

            // Logik / Integrasi AJAX CodeIgniter bisa ditaruh di sini nantinya
            if (nama && email && pesan) {
                // Notifikasi mockup sukses modern
                alert(`Terima kasih ${nama}, kritik dan saran Anda berhasil dikirim!`);
                formKritikSaran.reset(); // Bersihkan form data
            }
        });
    }

    // ==========================================
    // 3. AUTO CLOSE NAVBAR ON MOBILE CLICK
    // ==========================================
    const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
    const navbarCollapse = document.getElementById("navbarNav");

    if (navbarCollapse) {
        const bsCollapse = new bootstrap.Collapse(navbarCollapse, { toggled: false });
        navLinks.forEach(link => {
            link.addEventListener("click", () => {
                // Hanya tutup jika hamburger menu dalam posisi terbuka/tampil (Mobile)
                if (window.getComputedStyle(document.querySelector('.navbar-toggler')).display !== 'none') {
                    bsCollapse.toggle();
                }
            });
        });
    }
});