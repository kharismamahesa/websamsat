document.addEventListener("DOMContentLoaded", function () {
    // Inject CSS dynamically
    if (!document.getElementById('gallery-lightbox-styles')) {
        const style = document.createElement('style');
        style.id = 'gallery-lightbox-styles';
        style.textContent = `
            .lightbox-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(15, 23, 42, 0.95);
                backdrop-filter: blur(10px);
                z-index: 10000;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                opacity: 0;
                transition: opacity 0.3s ease;
                font-family: system-ui, -apple-system, sans-serif;
            }
            .lightbox-overlay.show {
                opacity: 1;
            }
            .lightbox-container {
                position: relative;
                max-width: 90vw;
                max-height: 75vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .lightbox-img {
                max-width: 100%;
                max-height: 75vh;
                object-fit: contain;
                border-radius: 12px;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
                transform: scale(0.95);
                transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            }
            .lightbox-overlay.show .lightbox-img {
                transform: scale(1);
            }
            .lightbox-btn {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                background: rgba(255, 255, 255, 0.1);
                border: 1px solid rgba(255, 255, 255, 0.2);
                color: #fff;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.2s ease;
                z-index: 10010;
            }
            .lightbox-btn:hover {
                background: #007bff;
                border-color: #007bff;
                transform: translateY(-50%) scale(1.1);
                box-shadow: 0 0 15px rgba(0, 123, 255, 0.5);
            }
            .lightbox-prev {
                left: -70px;
            }
            .lightbox-next {
                right: -70px;
            }
            .lightbox-close {
                position: absolute;
                top: -60px;
                right: 0;
                background: rgba(255, 255, 255, 0.1);
                border: 1px solid rgba(255, 255, 255, 0.2);
                color: #fff;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: all 0.2s ease;
            }
            .lightbox-close:hover {
                background: #ef4444;
                border-color: #ef4444;
                transform: scale(1.1);
            }
            .lightbox-caption-container {
                margin-top: 20px;
                text-align: center;
                max-width: 600px;
                color: #fff;
                padding: 0 15px;
            }
            .lightbox-caption {
                font-weight: 600;
                font-size: 1.1rem;
                margin-bottom: 5px;
                text-shadow: 0 2px 4px rgba(0,0,0,0.5);
            }
            .lightbox-counter {
                font-size: 0.85rem;
                color: #94a3b8;
                letter-spacing: 0.05em;
            }
            .lightbox-thumbs {
                display: flex;
                gap: 10px;
                margin-top: 20px;
                justify-content: center;
                max-width: 90vw;
                overflow-x: auto;
                padding-bottom: 5px;
            }
            .lightbox-thumb {
                width: 60px;
                height: 60px;
                object-fit: cover;
                border-radius: 8px;
                cursor: pointer;
                opacity: 0.5;
                border: 2px solid transparent;
                transition: all 0.2s ease;
            }
            .lightbox-thumb:hover, .lightbox-thumb.active {
                opacity: 1;
                border-color: #007bff;
                transform: translateY(-2px);
            }
            @media (max-width: 991.98px) {
                .lightbox-prev {
                    left: 10px;
                    top: auto;
                    bottom: -75px;
                    transform: none;
                }
                .lightbox-next {
                    right: 10px;
                    top: auto;
                    bottom: -75px;
                    transform: none;
                }
                .lightbox-prev:hover {
                    transform: scale(1.1);
                }
                .lightbox-next:hover {
                    transform: scale(1.1);
                }
                .lightbox-close {
                    top: 20px;
                    right: 20px;
                    position: fixed;
                }
                .lightbox-container {
                    max-height: 60vh;
                }
                .lightbox-img {
                    max-height: 60vh;
                }
                .lightbox-caption-container {
                    margin-top: 90px;
                }
            }
        `;
        document.head.appendChild(style);
    }

    // Inject HTML dynamically if not present
    let lightbox = document.getElementById('gallery-lightbox');
    if (!lightbox) {
        lightbox = document.createElement('div');
        lightbox.id = 'gallery-lightbox';
        lightbox.className = 'lightbox-overlay';
        lightbox.innerHTML = `
            <div class="lightbox-container">
                <button class="lightbox-btn lightbox-prev" aria-label="Sebelumnya">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </button>
                <img class="lightbox-img" src="" alt="Lightbox Image">
                <button class="lightbox-btn lightbox-next" aria-label="Selanjutnya">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
                <button class="lightbox-close" aria-label="Tutup">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="lightbox-caption-container">
                <p class="lightbox-caption"></p>
                <span class="lightbox-counter"></span>
            </div>
            <div class="lightbox-thumbs"></div>
        `;
        document.body.appendChild(lightbox);
    }

    const lightboxImg = lightbox.querySelector('.lightbox-img');
    const lightboxCaption = lightbox.querySelector('.lightbox-caption');
    const lightboxCounter = lightbox.querySelector('.lightbox-counter');
    const lightboxPrev = lightbox.querySelector('.lightbox-prev');
    const lightboxNext = lightbox.querySelector('.lightbox-next');
    const lightboxClose = lightbox.querySelector('.lightbox-close');
    const lightboxThumbs = lightbox.querySelector('.lightbox-thumbs');

    let currentPhotos = [];
    let currentIndex = 0;
    let currentKeterangan = '';

    function openLightbox(photos, index, keterangan) {
        currentPhotos = photos;
        currentIndex = index;
        currentKeterangan = keterangan;

        // Render thumbnails
        lightboxThumbs.innerHTML = '';
        if (photos.length > 1) {
            photos.forEach((photoUrl, idx) => {
                const thumb = document.createElement('img');
                thumb.src = photoUrl;
                thumb.classList.add('lightbox-thumb');
                if (idx === index) thumb.classList.add('active');
                thumb.alt = `Thumbnail ${idx + 1}`;
                thumb.addEventListener('click', () => {
                    changeImage(idx);
                });
                lightboxThumbs.appendChild(thumb);
            });
            lightboxPrev.style.display = 'flex';
            lightboxNext.style.display = 'flex';
        } else {
            lightboxPrev.style.display = 'none';
            lightboxNext.style.display = 'none';
        }

        updateLightboxContent();

        lightbox.style.display = 'flex';
        // Force reflow
        lightbox.offsetHeight;
        lightbox.classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('show');
        setTimeout(() => {
            lightbox.style.display = 'none';
            document.body.style.overflow = '';
        }, 300);
    }

    function updateLightboxContent() {
        if (currentPhotos[currentIndex]) {
            lightboxImg.src = currentPhotos[currentIndex];
            lightboxCaption.textContent = currentKeterangan || '';
            lightboxCounter.textContent = `Foto ${currentIndex + 1} dari ${currentPhotos.length}`;

            // Update active thumbnail
            const thumbs = lightboxThumbs.querySelectorAll('.lightbox-thumb');
            thumbs.forEach((thumb, idx) => {
                if (idx === currentIndex) {
                    thumb.classList.add('active');
                    thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                } else {
                    thumb.classList.remove('active');
                }
            });
        }
    }

    function changeImage(index) {
        currentIndex = (index + currentPhotos.length) % currentPhotos.length;
        updateLightboxContent();
    }

    // Set up delegation to support elements loaded/rendered later
    document.addEventListener('click', function (e) {
        const galleryItem = e.target.closest('.gallery-item');
        if (galleryItem) {
            try {
                const photos = JSON.parse(galleryItem.getAttribute('data-photos'));
                const keterangan = galleryItem.getAttribute('data-keterangan');
                if (photos && photos.length > 0) {
                    openLightbox(photos, 0, keterangan);
                }
            } catch (err) {
                console.error("Failed to parse gallery photos", err);
            }
        }
    });

    // Event listeners
    lightboxPrev.addEventListener('click', (e) => {
        e.stopPropagation();
        changeImage(currentIndex - 1);
    });

    lightboxNext.addEventListener('click', (e) => {
        e.stopPropagation();
        changeImage(currentIndex + 1);
    });

    lightboxClose.addEventListener('click', (e) => {
        e.stopPropagation();
        closeLightbox();
    });

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox || e.target.classList.contains('lightbox-container')) {
            closeLightbox();
        }
    });

    document.addEventListener('keydown', (e) => {
        if (lightbox.classList.contains('show')) {
            if (e.key === 'ArrowLeft') changeImage(currentIndex - 1);
            if (e.key === 'ArrowRight') changeImage(currentIndex + 1);
            if (e.key === 'Escape') closeLightbox();
        }
    });

    // Toggle header class on scroll
    const header = document.querySelector('.header');
    if (header) {
        const toggleHeaderScrolled = () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        };
        window.addEventListener('load', toggleHeaderScrolled);
        document.addEventListener('scroll', toggleHeaderScrolled);
    }
});
