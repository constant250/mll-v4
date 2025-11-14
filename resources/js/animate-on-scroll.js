document.addEventListener('DOMContentLoaded', function() {
    // Animation on scroll functionality
    const animateElements = document.querySelectorAll('.animate-on-scroll, .animate-stagger');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    animateElements.forEach(element => {
        observer.observe(element);
    });

    // For hero section, animate immediately on page load
    const heroElements = document.querySelectorAll('.hero-section .animate-on-scroll');
    setTimeout(() => {
        heroElements.forEach(element => {
            element.classList.add('visible');
        });
    }, 100);
});

