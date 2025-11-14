<header 
    ref="elementRef"
    class="header animate-on-scroll fade-in visible"
>
    <nav class="header-nav">
        <div class="header-logo">
            <a href="#top">
                <img src="{{ asset('images/MLL - LOGO - WEB.png') }}" alt="MLL Melbourne Legal Lawyers" class="logo-img" />
            </a>
        </div>
        <button 
            class="hamburger-button" 
            type="button" 
            aria-expanded="false"
            aria-controls="primary-navigation"
            aria-label="Toggle navigation menu"
        >
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>
        <div class="header-right" id="primary-navigation">
            <div class="header-links">
                <a href="#about" class="nav-link">ABOUT US</a>
                <a href="#services" class="nav-link">OUR SERVICES</a>
                <a href="#client-promise" class="nav-link">CLIENT PROMISE</a>
            </div>
            <a href="tel:+61312345678" class="call-button">
                <span class="call-text">CALL US</span>
                <div class="call-icon-wrapper">
                    <img src="{{ asset('images/CALL ICON.png') }}" alt="Call" class="call-icon" />
                </div>
                <span class="call-number">+61 3 1234 5678</span>
            </a>
        </div>
    </nav>
</header>
<div class="mobile-nav-backdrop" role="presentation" style="display: none;"></div>

