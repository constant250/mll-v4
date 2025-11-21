document.addEventListener('DOMContentLoaded', function() {
    const hamburgerButton = document.querySelector('.hamburger-button');
    const headerRight = document.querySelector('.header-right');
    const mobileBackdrop = document.querySelector('.mobile-nav-backdrop');
    const navLinks = document.querySelectorAll('.nav-link, .call-button');
    const header = document.querySelector('.header');
    
    let isMenuOpen = false;

    function toggleMenu() {
        isMenuOpen = !isMenuOpen;
        if (hamburgerButton) {
            hamburgerButton.classList.toggle('is-open', isMenuOpen);
            hamburgerButton.setAttribute('aria-expanded', isMenuOpen);
        }
        if (headerRight) {
            headerRight.classList.toggle('is-open', isMenuOpen);
        }
        if (mobileBackdrop) {
            if (isMenuOpen) {
                mobileBackdrop.style.display = 'block';
            } else {
                mobileBackdrop.style.display = 'none';
            }
        }
    }

    function closeMenu() {
        if (!isMenuOpen) return;
        isMenuOpen = false;
        if (hamburgerButton) {
            hamburgerButton.classList.remove('is-open');
            hamburgerButton.setAttribute('aria-expanded', 'false');
        }
        if (headerRight) {
            headerRight.classList.remove('is-open');
        }
        if (mobileBackdrop) {
            mobileBackdrop.style.display = 'none';
        }
    }

    if (hamburgerButton) {
        hamburgerButton.addEventListener('click', toggleMenu);
    }

    if (mobileBackdrop) {
        mobileBackdrop.addEventListener('click', closeMenu);
    }

    navLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    // Close menu on window resize (if desktop size)
    window.addEventListener('resize', () => {
        if (window.innerWidth > 1024 && isMenuOpen) {
            closeMenu();
        }
    });

    // Handle scroll for header
    let isScrolled = false;
    function handleScroll() {
        const scrolled = window.scrollY > 50;
        if (scrolled !== isScrolled) {
            isScrolled = scrolled;
            if (header) {
                header.classList.toggle('scrolled', isScrolled);
            }
        }
    }

    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Check initial state

    // Active section highlighting
    const sections = document.querySelectorAll('section[id]');
    const navLinksArray = document.querySelectorAll('.nav-link');

    function updateActiveSection() {
        let current = '';
        const scrollY = window.pageYOffset;

        sections.forEach(section => {
            const sectionHeight = section.offsetHeight;
            const sectionTop = section.offsetTop - 100;
            const sectionId = section.getAttribute('id');

            if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                current = sectionId;
            }
        });

        // console.log(current);

        navLinksArray.forEach(link => {
            link.classList.remove('active');
            const href = link.getAttribute('href');
            if (href && href.includes(`#${current}`)) {
                console.log(current);

                if(current) {
                    link.classList.remove('active');
                    link.classList.add('active');
                }
                // link.classList.add('active');
            }
        });
    }

    window.addEventListener('scroll', updateActiveSection);
});

