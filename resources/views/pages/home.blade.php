@extends('layouts.app')

@section('seo')
    <x-seo 
        title="Melbourne Legal Lawyers | Legal Solutions That Put People First | Lara, VIC"
        description="Melbourne Legal Lawyers is a locally based law firm in Lara, VIC. We provide expert legal services in Family Law, Commercial Law, Immigration, and Wills & Estate planning. Fast consultation, Australian compliance, experienced team. Book your consultation today."
        keywords="Melbourne Legal Lawyers, law firm Lara, family law Lara, commercial law Geelong, immigration lawyer Victoria, wills and estate planning, legal services Victoria, Geelong lawyers, Lara lawyers, Melbourne legal services"
        :ogImage="asset('images/HEADER-IMAGE.jpg')"
        :twitterImage="asset('images/HEADER-IMAGE.jpg')"
    />
@endsection

@section('content')
<div id="top">
    <x-app-header />
    <div class="landing-page">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-background animate-on-scroll fade-in visible">
                <img src="{{ asset('images/HEADER-IMAGE.jpg') }}" alt="Professional lawyer" class="hero-image" />
            </div>
            <div class="hero-content animate-on-scroll fade-in-up visible">
                <h1 class="hero-title">
                    LEGAL SOLUTIONS THAT <br>PUT <span class="highlight">PEOPLE FIRST.</span>
                </h1>
                <a href="#contact" class="cta-button">BOOK A CONSULTATION TODAY!</a>
            </div>
        </section>

        <!-- Feature Highlights -->
        <section class="feature-highlights animate-stagger visible">
            <div class="feature-box">
                <img src="{{ asset('images/ICON-1.png') }}" alt="Fast consultation" class="feature-icon" />
                <p>Fast legal consultation <br>and response times</p>
            </div>
            <div class="feature-box">
                <img src="{{ asset('images/ICON-2.png') }}" alt="Australian compliance" class="feature-icon" />
                <p>Compliant with Australian legal requirements</p>
            </div>
            <div class="feature-box">
                <img src="{{ asset('images/ICON-3.png') }}" alt="Experienced team" class="feature-icon" />
                <p>Experienced team dedicated to client success</p>
            </div>
        </section>

        <!-- About Us Section -->
        <section id="about" class="about-section">
            <div class="about-container animate-on-scroll fade-in-up">
                <div class="about-content">
                    <img src="{{ asset('images/MLL - LOGO - WEB.png') }}" alt="MLL Melbourne Legal Lawyers" class="about-logo" />
                    <p class="about-text">
                        <b>Melbourne Legal Lawyers</b> is a locally based law firm committed to supporting individuals, families, and businesses through every stage of life's legal journey. Our approach is client-first – combining legal precision with practical understanding.
                    </p>
                    <p class="about-text">
                        We work closely with our clients to provide timely, clear, and cost-effective legal solutions.
                    </p>
                </div>
                <div class="about-image">
                    <img src="{{ asset('images/ABOUT-US-IMAGE.jpg') }}" alt="Our team" class="team-image" />
                </div>
            </div>
        </section>

        <!-- Our Services Section -->
        <section id="services" class="services-section">
            <h2 class="section-title animate-on-scroll fade-in-up">Our Services</h2>
            <div class="services-grid animate-stagger visible">
                <div class="service-card">
                    <div class="service-card-background">
                        <img src="{{ asset('images/S-1.jpg') }}" alt="" class="service-bg-image" />
                    </div>
                    <div class="service-card-content">
                        <div class="service-text-group">
                            <h3 class="service-title">Family Law</h3>
                            <p class="service-description">From parenting plans to property settlements, we handle sensitive family matters with empathy and skill.</p>
                        </div>
                        <a href="#contact" class="service-cta">Discuss your matter →</a>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-card-background">
                        <img src="{{ asset('images/S-2.jpg') }}" alt="" class="service-bg-image" />
                    </div>
                    <div class="service-card-content">
                        <div class="service-text-group">
                            <h3 class="service-title">Commercial Law</h3>
                            <p class="service-description">Supporting small businesses with contracts, disputes, leases, and structuring.</p>
                        </div>
                        <a href="#contact" class="service-cta">Get guidance →</a>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-card-background">
                        <img src="{{ asset('images/S-3.jpg') }}" alt="" class="service-bg-image" />
                    </div>
                    <div class="service-card-content">
                        <div class="service-text-group">
                            <h3 class="service-title">Immigration</h3>
                            <p class="service-description">Migration support for individuals, families, and businesses – we simplify the visa process.</p>
                        </div>
                        <a href="#contact" class="service-cta">Talk to an attorney →</a>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-card-background">
                        <img src="{{ asset('images/S-4.jpg') }}" alt="" class="service-bg-image" />
                    </div>
                    <div class="service-card-content">
                        <div class="service-text-group">
                            <h3 class="service-title">Wills & Estate</h3>
                            <p class="service-description">Protecting your future through smart estate planning and probate assistance.</p>
                        </div>
                        <a href="#contact" class="service-cta">Plan your future →</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Client Promise Section -->
        <section id="client-promise" class="client-promise-section">
            <div class="client-promise-container animate-on-scroll fade-in-up">
                <div class="client-promise-image">
                    <img src="{{ asset('images/LADY.png') }}" alt="Professional lawyer" class="lady-image" />
                </div>
                <div class="client-promise-content">
                    <h2 class="client-promise-title">Client Promise</h2>
                    <h3 class="client-promise-subtitle">Why Choose Melbourne Legal Lawyers?</h3>
                    <p class="client-promise-text">
                        We understand that legal matters can be complex and stressful. That's why we're committed to providing clear, practical advice that puts your needs first. Our local presence in Lara means we understand the community, while our expertise ensures you get the best possible outcome.
                    </p>
                    <ul class="client-promise-list">
                        <li>
                            <img src="{{ asset('images/CHECK-ICON.png') }}" alt="Check" class="check-icon" />
                            <span>Clear, upfront advice</span>
                        </li>
                        <li>
                            <img src="{{ asset('images/CHECK-ICON.png') }}" alt="Check" class="check-icon" />
                            <span>Local service with national knowledge</span>
                        </li>
                        <li>
                            <img src="{{ asset('images/CHECK-ICON.png') }}" alt="Check" class="check-icon" />
                            <span>Timely communication</span>
                        </li>
                        <li>
                            <img src="{{ asset('images/CHECK-ICON.png') }}" alt="Check" class="check-icon" />
                            <span>Transparent pricing</span>
                        </li>
                    </ul>
                    <p class="client-promise-cta-text">Need legal advice you can trust? <strong>Let's talk.</strong></p>
                    <div class="client-promise-contact">
                        <div class="client-promise-contact-left">
                            <a href="#contact" class="consultation-button">BOOK A CONSULTATION</a>
                        </div>
                        <div class="contact-info">
                            <a href="tel:+61312345678" class="contact-item">
                                <img src="{{ asset('images/CALL ICON.png') }}" alt="Phone" class="contact-icon" />
                                <span>+61 3 1234 5678</span>
                            </a>
                            <a href="mailto:info@melbournelegallawyers.com.au" class="contact-item">
                                <img src="{{ asset('images/MAIL-ICON.png') }}" alt="Email" class="contact-icon" />
                                <span>info@melbournelegallawyers.com.au</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Us Section -->
        <section id="contact" class="contact-section">
            <h2 class="section-title animate-on-scroll fade-in-up">Contact Us</h2>
            <div class="contact-container animate-on-scroll fade-in-up">
                <div class="contact-form-container">
                    <p class="contact-intro">
                        Ready to discuss your legal matter? We're here to help with clear, practical advice.
                    </p>
                    <form class="contact-form" method="POST" action="{{ route('contact.submit') }}" id="contactForm">
                        @csrf
                        <div class="form-group">
                            <input 
                                type="text" 
                                id="fullName" 
                                name="fullName" 
                                value="{{ old('fullName') }}"
                                placeholder="FULL NAME" 
                                required
                            />
                            @error('fullName')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                placeholder="EMAIL"
                                required
                            />
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input 
                                type="tel" 
                                id="phone" 
                                name="phone" 
                                value="{{ old('phone') }}"
                                placeholder="PHONE"
                                required
                            />
                            @error('phone')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select 
                                id="practiceArea" 
                                name="practiceArea"
                                required
                            >
                                <option value="" disabled selected>PRACTICE AREA</option>
                                <option value="Family Law" {{ old('practiceArea') == 'Family Law' ? 'selected' : '' }}>Family Law</option>
                                <option value="Commercial Law" {{ old('practiceArea') == 'Commercial Law' ? 'selected' : '' }}>Commercial Law</option>
                                <option value="Immigration" {{ old('practiceArea') == 'Immigration' ? 'selected' : '' }}>Immigration</option>
                                <option value="Wills & Estate" {{ old('practiceArea') == 'Wills & Estate' ? 'selected' : '' }}>Wills & Estate</option>
                            </select>
                            @error('practiceArea')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea 
                                id="description" 
                                name="description" 
                                placeholder="DESCRIPTION" 
                                rows="5"
                                required
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <button 
                            type="submit"
                            class="submit-button" 
                        >
                            BOOK A CONSULTATION
                        </button>
                    </form>
                </div>

                <div class="contact-info-container">
                    <h3 class="visit-title">Visit Our Office</h3>
                    <div class="office-address">
                        <p><b>Melbourne Legal Lawyers</b>
                            <br>
                            26 Hicks Street
                            <br>
                            Lara, VIC 3212
                            <br>
                            Hours: Mon-Fri 9am-5pm
                        </p>
                    </div>
                    <div class="office-contact">
                        <a href="tel:+61312345678" class="office-contact-item">
                            <img src="{{ asset('images/CALL ICON.png') }}" alt="Phone" class="office-contact-icon" />
                            <span>+61 3 1234 5678</span>
                        </a>
                        <a href="mailto:info@melbournelegallawyers.com.au" class="office-contact-item">
                            <img src="{{ asset('images/MAIL-ICON.png') }}" alt="Email" class="office-contact-icon" />
                            <span>info@melbournelegallawyers.com.au</span>
                        </a>
                    </div>
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3143.0640524709434!2d144.4132796505789!3d-38.02228619828556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad418b6e3c84fc1%3A0x84d02d6ff0753d4c!2s26%20Hicks%20St%2C%20Lara%20VIC%203212%2C%20Australia!5e0!3m2!1sen!2sph!4v1762295620640!5m2!1sen!2sph"
                            width="100%"
                            height="250"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                    </div>
                </div>
            </div>
        </section>

        <x-app-footer />
    </div>
</div>
@endsection

