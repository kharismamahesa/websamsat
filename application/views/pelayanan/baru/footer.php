    <!-- Footer Section -->
    <footer class="footer-custom text-center">
        <div class="container">
            <p class="mb-0 fw-medium text-secondary">
                &copy; <?= date('Y') ?> <strong>IT BAPENDA RIAU</strong>. Hak Cipta Dilindungi Undang-Undang.
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS Animation
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.querySelector('.custom-navbar').style.background = 'rgba(255, 255, 255, 0.98)';
                document.querySelector('.custom-navbar').style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.1)';
            } else {
                document.querySelector('.custom-navbar').style.background = 'rgba(255, 255, 255, 0.9)';
                document.querySelector('.custom-navbar').style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.05)';
            }
        });
    </script>
</body>
</html>
