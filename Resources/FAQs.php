<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - Catdump: Your Questions Answered</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            color: #2d3748;
            overflow-x: hidden;
            line-height: 1.6;
        }

        .container-box {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1.5rem;
        }
        .section-box {
            background-color: #ffffff;
            border-radius: 1.5rem;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            padding: 4rem;
            margin-bottom: 3.5rem;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        .section-box-alt {
            background-color: #eef2f6;
            border-radius: 1.5rem;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            padding: 4rem;
            margin-bottom: 3.5rem;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        .btn-primary {
            background-color: #1a73e8;
            color: white;
            padding: 1.2rem 3.5rem;
            border-radius: 0.75rem;
            font-weight: 800;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(26, 115, 232, 0.4);
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }
        .btn-primary:hover {
            background-color: #155bb5;
            transform: translateY(-7px);
            box-shadow: 0 15px 35px rgba(26, 115, 232, 0.6);
        }
        .btn-secondary {
            background-color: transparent;
            color: #1a73e8;
            padding: 1.2rem 3.5rem;
            border-radius: 0.75rem;
            font-weight: 700;
            transition: all 0.3s ease;
            border: 2px solid #1a73e8;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }
        .btn-secondary:hover {
            background-color: #1a73e8;
            color: white;
            transform: translateY(-7px);
            box-shadow: 0 8px 20px rgba(26, 115, 232, 0.2);
        }
        .icon-box {
            background-color: #34a853;
            color: white;
            border-radius: 50%;
            padding: 1.8rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        .text-blue-custom {
            color: #1a73e8;
        }
        .text-green-custom {
            color: #34a853;
        }

        .hero-background {
            background-image: url('https://placehold.co/1920x900/d8eaf0/1a73e8?text=FAQs+Hero+Background');
            background-size: cover;
            background-position: center;
            position: relative;
            z-index: 0;
            padding-top: 10rem;
            padding-bottom: 10rem;
        }
        .hero-overlay {
            background: linear-gradient(to right, rgba(248, 249, 250, 0.9), rgba(248, 249, 250, 0.6));
            position: absolute;
            inset: 0;
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            color: #2d3748;
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(40px) scale(0.95);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .animate-on-scroll.is-visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .delay-100 { transition-delay: 0.1s; animation-delay: 0.1s; }
        .delay-200 { transition-delay: 0.2s; animation-delay: 0.2s; }
        .delay-300 { transition-delay: 0.3s; animation-delay: 0.3s; }
        .delay-400 { transition-delay: 0.4s; animation-delay: 0.4s; }
        .delay-500 { transition-delay: 0.5s; animation-delay: 0.5s; }
        .delay-600 { transition-delay: 0.6s; animation-delay: 0.6s; }
        .delay-700 { transition-delay: 0.7s; animation-delay: 0.7s; }
        .delay-800 { transition-delay: 0.8s; animation-delay: 0.8s; }
        .delay-900 { transition-delay: 0.9s; animation-delay: 0.9s; }
        .delay-1000 { transition-delay: 1s; animation-delay: 1s; }

        .card-hover-effect {
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            background-color: #ffffff;
            color: #2d3748;
            border: 1px solid rgba(0, 0, 0, 0.08);
            transform-style: preserve-3d;
        }
        .card-hover-effect:hover {
            transform: translateY(-10px) scale(1.04) rotateX(2deg) rotateY(2deg);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
            background-color: #f8f9fa;
            border-color: #1a73e8;
        }
        .card-hover-effect .icon-box {
            background-color: #34a853;
            color: white;
        }

        .testimonial-card {
            background-color: #ffffff;
            border-radius: 1rem;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        .testimonial-quote {
            font-size: 1.25rem;
            font-style: italic;
            color: #4a5568;
            margin-bottom: 1.5rem;
        }
        .testimonial-author {
            font-weight: 600;
            color: #1a73e8;
        }
        .testimonial-source {
            color: #718096;
            font-size: 0.9rem;
        }

        .mobile-nav-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.95);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        .mobile-nav-overlay.open {
            opacity: 1;
            visibility: visible;
        }
        .mobile-nav-content {
            background-color: #ffffff;
            padding: 3rem;
            border-radius: 1.5rem;
            text-align: center;
            transform: translateY(-50px);
            opacity: 0;
            transition: transform 0.5s ease, opacity 0.5s ease;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        .mobile-nav-overlay.open .mobile-nav-content {
            transform: translateY(0);
            opacity: 1;
        }
        .mobile-nav-content a {
            color: #2d3748;
            transition: color 0.3s ease;
            font-size: 2rem;
            font-weight: 600;
        }
        .mobile-nav-content a:hover {
            color: #1a73e8;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #ffffff;
            min-width: 180px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 0.5rem;
            overflow: hidden;
            top: calc(100% + 10px);
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
        }

        .dropdown-content a {
            color: #2d3748;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
            font-weight: 500;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .dropdown-content a:hover {
            background-color: #eef2f6;
            color: #1a73e8;
        }

        .dropdown:hover .dropdown-content {
            display: block;
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        .mobile-dropdown-content {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }
        .mobile-dropdown-content.open {
            max-height: 300px;
            opacity: 1;
        }
        .mobile-dropdown-content a {
            padding: 0.75rem 0;
            color: #4a5568;
            font-size: 1.5rem;
        }
        .mobile-dropdown-content a:hover {
            color: #1a73e8;
        }

        .header-scrolled {
            background-color: rgba(255, 255, 255, 0.98);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .header-logo-text {
            font-size: 2.5rem;
            line-height: 1;
            display: flex;
            align-items: center;
        }
        .header-logo-text img {
            height: 3.5rem;
            width: 3.5rem;
            margin-right: 0.75rem;
        }

        .how-it-works-container {
            display: flex;
            flex-direction: column;
            gap: 3rem;
        }

        .how-it-works-row {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem;
            margin-bottom: 4rem; /* Added spacing between rows */
        }

        .how-it-works-image-box {
            background-color: #f8f9fa;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 200px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .how-it-works-image-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .how-it-works-image-box img {
            max-width: 90%;
            height: auto;
            border-radius: 0.5rem;
        }

        .how-it-works-content {
            flex: 1;
            text-align: center;
        }

        .how-it-works-step-number {
            font-size: 1.2rem;
            font-weight: 600;
            color: #1a73e8;
            margin-bottom: 0.5rem;
        }

        .how-it-works-step-title {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 1rem;
        }

        .how-it-works-step-description {
            color: #4a5568;
            font-size: 1.05rem;
            line-height: 1.7;
        }

        @media (min-width: 768px) {
            .how-it-works-row {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
            .how-it-works-row:nth-child(even) {
                flex-direction: row-reverse;
            }
            .how-it-works-content {
                text-align: left;
            }
            .how-it-works-image-box {
                width: 50%;
            }
        }

        .accordion-item {
            border-bottom: 1px solid #e2e8f0;
        }
        .accordion-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 1rem;
            cursor: pointer;
            font-weight: 600;
            font-size: 1.25rem;
            color: #2d3748;
            transition: background-color 0.2s ease;
        }
        .accordion-header:hover {
            background-color: #f0f4f8;
        }
        .accordion-header svg {
            transition: transform 0.3s ease;
        }
        .accordion-header.active svg {
            transform: rotate(180deg);
        }
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out, padding 0.3s ease-out;
            padding: 0 1rem;
            color: #4a5568;
        }
        .accordion-content.open {
            max-height: 200px; /* Adjust as needed */
            padding-bottom: 1.5rem;
        }

        .feature-card .icon-wrapper {
            background-color: #eef2f6;
            border-radius: 50%;
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }
        .feature-card .icon {
            font-size: 2rem;
            color: #1a73e8;
        }

        .category-button {
            background-color: #ffffff;
            color: #1a73e8;
            font-weight: 600;
            padding: 0.8rem 1.8rem;
            border-radius: 0.75rem;
            border: 2px solid #1a73e8;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(26, 115, 232, 0.1);
        }
        .category-button:hover, .category-button.active {
            background-color: #1a73e8;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(26, 115, 232, 0.3);
        }
        .faq-category-section {
            display: none; /* Hidden by default */
        }
        .faq-category-section.active {
            display: block; /* Shown when active */
        }
    </style>
</head>
<body class="antialiased">

   <?php include '../includes/public_header.php'; ?>


    <div id="mobile-nav-overlay" class="mobile-nav-overlay">
        <div class="mobile-nav-content">
            <button id="close-mobile-menu" class="absolute top-6 right-6 p-3 rounded-md text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-custom">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <nav class="flex flex-col space-y-8">
                <a href="catdumphome.html" class="text-gray-700 hover:text-blue-custom">Home</a>
                <a href="how-it-works.html" class="text-gray-700 hover:text-blue-custom">How It Works</a>
                
                <div>
                    <a href="#" class="flex items-center justify-center text-gray-700 hover:text-blue-custom" data-dropdown-toggle="mobile-services-dropdown">
                        Services
                        <svg data-dropdown-arrow="mobile-services-dropdown" class="w-6 h-6 ml-2 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <div id="mobile-services-dropdown" class="mobile-dropdown-content text-gray-700 flex flex-col items-center">
                        <a href="dumpster-rentals.html">Dumpster Rentals</a>
                        <a href="temporary-toilets.html">Temporary Toilets</a>
                        <a href="storage-containers.html">Storage Containers</a>
                        <a href="junk-removal.html">Junk Removal</a>
                        <a href="relocation-swap.html">Relocation & Swap</a>
                    </div>
                </div>

                <div>
                    <a href="#" class="flex items-center justify-center text-gray-700 hover:text-blue-custom" data-dropdown-toggle="mobile-company-dropdown">
                        Company
                        <svg data-dropdown-arrow="mobile-company-dropdown" class="w-6 h-6 ml-2 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <div id="mobile-company-dropdown" class="mobile-dropdown-content text-gray-700 flex flex-col items-center">
                        <a href="about-us.html">About Us</a>
                        <a href="#">Careers</a>
                        <a href="#">Press/Media</a>
                        <a href="sustainability.html">Sustainability</a>
                        <a href="testimonials.html">Testimonials</a>
                    </div>
                </div>

                <div>
                    <a href="#" class="flex items-center justify-center text-blue-custom font-bold" data-dropdown-toggle="mobile-resources-dropdown">
                        Resources
                        <svg data-dropdown-arrow="mobile-resources-dropdown" class="w-6 h-6 ml-2 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <div id="mobile-resources-dropdown" class="mobile-dropdown-content text-gray-700 flex flex-col items-center open">
                        <a href="pricing-finance.html">Pricing & Finance</a>
                        <a href="customer-resources.html">Customer Resources</a>
                        <a href="blog-news.html">Blog/News</a>
                        <a href="#" class="font-bold text-blue-custom">FAQs</a>
                        <a href="#">Support Center</a>
                        <a href="#">Contact</a>
                    </div>
                </div>
                <a href="#" class="btn-primary py-2.5 px-5 text-base shadow-md hover:shadow-lg transition duration-300">Customer Portal</a>
            </nav>
        </div>
    </div>

    <main>
        <section id="hero-section" class="hero-background py-32 md:py-48 relative">
            <div class="hero-overlay"></div>
            <div class="container-box hero-content text-center">
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-extrabold leading-tight mb-8 animate-on-scroll">
                    Your Questions Answered: <span class="text-blue-custom">Catdump's Comprehensive FAQs</span>
                </h1>
                <p class="text-xl md:text-2xl lg:text-3xl text-gray-700 mb-12 max-w-5xl mx-auto animate-on-scroll delay-300">
                    Find quick and clear answers to frequently asked questions about our equipment rentals, services, pricing, and how our platform works.
                </p>
                <a href="#faq-content-section" class="btn-primary inline-block animate-on-scroll delay-600">Browse All Questions</a>
            </div>
        </section>

        <section class="container-box py-20 md:py-32">
            <div class="section-box-alt">
                <div class="mb-12 animate-on-scroll delay-100">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 text-center mb-8">Find Your Answer Instantly</h2>
                    <div class="flex justify-center mb-8">
                        <input type="text" id="faq-search" placeholder="Search FAQs..." class="p-3 border border-gray-300 rounded-lg w-full max-w-lg focus:outline-none focus:ring-2 focus:ring-blue-custom transition duration-200">
                    </div>
                    <div class="flex flex-wrap justify-center gap-4">
                        <button class="category-button active" data-filter="all">All Questions</button>
                        <button class="category-button" data-filter="general">General</button>
                        <button class="category-button" data-filter="dumpster-rentals">Dumpster Rentals</button>
                        <button class="category-button" data-filter="temporary-toilets">Temporary Toilets</button>
                        <button class="category-button" data-filter="storage-containers">Storage Containers</button>
                        <button class="category-button" data-filter="junk-removal">Junk Removal</button>
                        <button class="category-button" data-filter="pricing-billing">Pricing & Billing</button>
                        <button class="category-button" data-filter="account-support">Account & Support</button>
                        <button class="category-button" data-filter="relocation-swap">Relocation & Swap</button>
                    </div>
                </div>

                <div id="faq-content-section" class="max-w-3xl mx-auto">
                    <div class="faq-category-section active" data-category="general all">
                        <h3 class="text-3xl font-bold text-gray-800 mb-8 mt-12 animate-on-scroll delay-200">General Questions</h3>
                        <div class="accordion-item animate-on-scroll delay-300">
                            <div class="accordion-header" data-accordion-toggle="gen-faq-1">
                                What is Catdump and how does it work?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="gen-faq-1" class="accordion-content">
                                <p>Catdump is your premier online marketplace for equipment rentals. We use advanced AI to connect you with a network of vetted local suppliers, providing instant, transparent quotes for dumpsters, temporary toilets, storage containers, and junk removal. Our platform streamlines the entire process, from booking to tracking, ensuring efficiency and the best prices.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-400">
                            <div class="accordion-header" data-accordion-toggle="gen-faq-2">
                                How does Catdump's AI technology benefit me as a customer?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="gen-faq-2" class="accordion-content">
                                <p>Our AI technology simplifies and speeds up your rental process. It accurately interprets your needs from conversational input, instantly compares real-time pricing from multiple local suppliers, and recommends the best fit. This means less time spent searching, faster confirmed bookings, and guaranteed competitive rates, all tailored to your specific project needs.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-500">
                            <div class="accordion-header" data-accordion-toggle="gen-faq-3">
                                What makes Catdump different from traditional rental companies?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="gen-faq-3" class="accordion-content">
                                <p>Unlike traditional companies, Catdump operates as a marketplace. This allows us to provide instant, competitive quotes from multiple vetted local suppliers, rather than a single fixed price. Our AI-driven process, transparent dashboard management, and comprehensive service offerings (beyond just rentals, like junk removal) set us apart in efficiency, cost-effectiveness, and convenience. We bring the entire local market to your fingertips.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-600">
                            <div class="accordion-header" data-accordion-toggle="gen-faq-4">
                                What areas do you serve? Is Catdump a global service?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="gen-faq-4" class="accordion-content">
                                <p>Catdump is based in the USA, and our services for equipment rentals extend all over the globe through our growing network of local partners. To confirm service availability in your specific location, simply start a quote request with your address, and our system will match you with available suppliers in your area.</p>
                            </div>
                        </div>
                    </div>

                    <div class="faq-category-section" data-category="dumpster-rentals all">
                        <h3 class="text-3xl font-bold text-gray-800 mb-8 mt-12 animate-on-scroll delay-200">Dumpster Rentals</h3>
                        <div class="accordion-item animate-on-scroll delay-300">
                            <div class="accordion-header" data-accordion-toggle="dump-faq-1">
                                How do I choose the right dumpster size for my project?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="dump-faq-1" class="accordion-content">
                                <p>Our AI chat system is designed to help! Just tell us about your project (e.g., "small bathroom demo," "full home cleanout," "new construction"), and it will suggest the ideal dumpster size (10, 20, 30, or 40-yard). You can also refer to our "Dumpster Sizes & Uses" section on the Dumpster Rentals page for a general guide on common project types and their matching dumpster capacities.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-400">
                            <div class="accordion-header" data-accordion-toggle="dump-faq-2">
                                What are the weight limits, and what happens if I exceed them?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="dump-faq-2" class="accordion-content">
                                <p>Each dumpster size comes with an included tonnage limit, which will be clearly stated in your quote. If you exceed this limit, an overweight fee will be applied, typically calculated per ton. Our AI helps estimate weight, but it's important to be mindful, especially with heavy materials like concrete or dirt. All potential overage fees are transparently outlined before booking.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-500">
                            <div class="accordion-header" data-accordion-toggle="dump-faq-3">
                                What items are prohibited from being placed in a dumpster?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="dump-faq-3" class="accordion-content">
                                <p>Generally, hazardous materials, chemicals, batteries, tires, paints, oils, refrigerants, asbestos, and certain electronics (like TVs and computers) are prohibited. Specific restrictions can vary by local regulations and individual suppliers. Your quote details will clearly outline any prohibited items, and our support team can clarify further if you have specific materials in question.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-600">
                            <div class="accordion-header" data-accordion-toggle="dump-faq-4">
                                Do I need a permit to place a dumpster on my property?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="dump-faq-4" class="accordion-content">
                                <p>If you plan to place the dumpster on private property (like your driveway or a construction site), a permit is usually not required. However, if you intend to place it on public property (like a street, sidewalk, or alleyway), a permit from your local municipality or homeowner's association may be necessary. We strongly recommend checking with your local authorities beforehand, as permit requirements vary significantly by city and county. This responsibility rests with the customer.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-700">
                            <div class="accordion-header" data-accordion-toggle="dump-faq-5">
                                What if I fill the dumpster early or need it longer?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="dump-faq-5" class="accordion-content">
                                <p>If you fill your dumpster before your rental period ends, simply log into your dashboard and request an early pickup. If you need it longer, you can request an extension directly through your dashboard. Both options are designed for flexibility and will come with transparent pricing adjustments where applicable. Refer to our Relocation & Swap services for more details.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-800">
                            <div class="accordion-header" data-accordion-toggle="dump-faq-6">
                                Can I move the dumpster once it's placed?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="dump-faq-6" class="accordion-content">
                                <p>No, you should not attempt to move the dumpster yourself once it has been placed. Moving a heavy container without proper equipment is extremely dangerous and can cause injury, damage to the dumpster or your property, and may violate your rental agreement. If you need the dumpster relocated on your property, please request an on-site relocation service through your dashboard, and a professional crew will handle it safely. This service may incur an additional fee.</p>
                            </div>
                        </div>
                    </div>

                    <div class="faq-category-section" data-category="temporary-toilets all">
                        <h3 class="text-3xl font-bold text-gray-800 mb-8 mt-12 animate-on-scroll delay-200">Temporary Toilets</h3>
                        <div class="accordion-item animate-on-scroll delay-300">
                            <div class="accordion-header" data-accordion-toggle="toilet-faq-1">
                                How often are the portable toilets serviced?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="toilet-faq-1" class="accordion-content">
                                <p>Standard servicing for portable toilets on construction sites is typically once a week. For events, servicing frequency depends on the duration and expected attendance, often multiple times during multi-day events. The servicing schedule will be confirmed in your rental agreement. You can also request additional servicing through your Catdump dashboard for an extra fee.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-400">
                            <div class="accordion-header" data-accordion-toggle="toilet-faq-2">
                                How many portable toilets do I need for my event/site?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="toilet-faq-2" class="accordion-content">
                                <p>The number of units needed depends on factors like the number of attendees/workers, duration of the event/project, and presence of food/beverages. As a general rule, for events up to 4 hours, one toilet is recommended per 50-75 guests. For construction, one toilet per 10 workers per 40-hour work week. Our AI chat can provide recommendations based on industry standards, or our support team can help you calculate the optimal number for your specific needs.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-500">
                            <div class="accordion-header" data-accordion-toggle="toilet-faq-3">
                                Do you offer portable handwashing stations?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="toilet-faq-3" class="accordion-content">
                                <p>Yes, we do! Portable handwashing stations are highly recommended for enhanced hygiene, especially at events with food, or on construction sites. They typically include fresh water, soap dispensers, and paper towel dispensers. You can easily add these to your rental request through our platform, and our suppliers will include them in your quote.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-600">
                            <div class="accordion-header" data-accordion-toggle="toilet-faq-4">
                                Are there different types of portable toilets available?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="toilet-faq-4" class="accordion-content">
                                <p>Yes, we offer a range of options beyond standard units, including ADA-compliant accessible toilets, luxury flushing portable toilets, and restroom trailers with multiple stalls, sinks, and amenities like air conditioning. You can specify your preference when you request a quote, and our suppliers will provide options.</p>
                            </div>
                        </div>
                    </div>

                    <div class="faq-category-section" data-category="storage-containers all">
                        <h3 class="text-3xl font-bold text-gray-800 mb-8 mt-12 animate-on-scroll delay-200">Storage Containers</h3>
                        <div class="accordion-item animate-on-scroll delay-300">
                            <div class="accordion-header" data-accordion-toggle="storage-faq-1">
                                What sizes of storage containers are available?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="storage-faq-1" class="accordion-content">
                                <p>We typically offer 10ft, 20ft, and 40ft standard containers, which are the most common and versatile. We also have specialized options like office/storage combo units for job sites. Our AI chat can help you determine the best size based on your storage volume and project requirements.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-400">
                            <div class="accordion-header" data-accordion-toggle="storage-faq-2">
                                What kind of site preparation is needed for a storage container?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="storage-faq-2" class="accordion-content">
                                <p>Containers need to be placed on a relatively flat, stable surface that can support their considerable weight, especially when loaded. While a paved or concrete surface is ideal, a firm, level gravel area can also work. Ensure there is clear, unobstructed access for the delivery truck (which often requires significant overhead and turning space). Avoid placing on soft ground where it might sink or shift.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-500">
                            <div class="accordion-header" data-accordion-toggle="storage-faq-3">
                                How secure are the storage containers?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="storage-faq-3" class="accordion-content">
                                <p>Our containers are made from heavy-gauge steel and feature robust door mechanisms, often including a lockbox or multiple locking points, providing excellent security against unauthorized access and theft. While they are highly secure, we always recommend customers use a high-quality padlock for maximum protection of their valuables.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-600">
                            <div class="accordion-header" data-accordion-toggle="storage-faq-4">
                                Can the container be moved once it's delivered?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="storage-faq-4" class="accordion-content">
                                <p>You should not attempt to move the container yourself once it's been placed by the delivery crew. If you need the container relocated to a different spot on your property or job site, please request an on-site relocation service through your Catdump dashboard. A professional crew with the right equipment will handle it safely and efficiently. This service typically incurs an additional fee.</p>
                            </div>
                        </div>
                    </div>

                    <div class="faq-category-section" data-category="junk-removal all">
                        <h3 class="text-3xl font-bold text-gray-800 mb-8 mt-12 animate-on-scroll delay-200">Junk Removal</h3>
                        <div class="accordion-item animate-on-scroll delay-300">
                            <div class="accordion-header" data-accordion-toggle="junk-faq-1">
                                How accurate is the AI-powered junk removal quote?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="junk-faq-1" class="accordion-content">
                                <p>Our AI system is highly accurate, leveraging advanced image and video recognition to assess the volume and type of junk. Quotes are typically very precise. The more comprehensive and clear your photos/videos are, the more accurate the initial quote will be. In rare cases of significant discrepancies upon arrival, the crew will discuss any necessary adjustments with you before proceeding with the removal, ensuring full transparency.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-400">
                            <div class="accordion-header" data-accordion-toggle="junk-faq-2">
                                Do I need to sort or bag my junk before pickup?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="junk-faq-2" class="accordion-content">
                                <p>Generally, no. Our professional junk removal crews are equipped to handle mixed junk, so you don't need to sort or bag items beforehand. However, for certain materials like construction debris, separating them can sometimes make the process quicker. Just ensure the items are accessible for our team to safely remove them from your property.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-500">
                            <div class="accordion-header" data-accordion-toggle="junk-faq-3">
                                What happens to my junk after it's picked up?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="junk-faq-3" class="accordion-content">
                                <p>We partner with junk removal specialists committed to responsible and eco-friendly disposal. This means that after pickup, items are meticulously sorted: usable goods are donated to local charities, recyclable materials are sent to recycling facilities, and only items that cannot be repurposed or recycled are sent to landfills. Our goal is to minimize environmental impact wherever possible.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-600">
                            <div class="accordion-header" data-accordion-toggle="junk-faq-4">
                                Can you remove very large or heavy items like pianos or hot tubs?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="junk-faq-4" class="accordion-content">
                                <p>Yes, our junk removal partners are equipped to handle a wide range of items, including large and heavy objects like pianos, hot tubs, large appliances, and construction debris. Please ensure these items are clearly visible in the photos/videos you upload for your AI quote so that the appropriate crew and equipment can be dispatched.</p>
                            </div>
                        </div>
                    </div>

                    <div class="faq-category-section" data-category="relocation-swap all">
                        <h3 class="text-3xl font-bold text-gray-800 mb-8 mt-12 animate-on-scroll delay-200">Relocation & Swap</h3>
                        <div class="accordion-item animate-on-scroll delay-300">
                            <div class="accordion-header" data-accordion-toggle="relocate-faq-1">
                                What's the difference between "relocation" and "swap" services?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="relocate-faq-1" class="accordion-content">
                                <p>A "relocation" means moving the same rental unit (e.g., dumpster, storage container) from one spot to another on the same property or job site. A "swap" means exchanging your current rental unit for a different one, usually of a different size or type, typically at the same location. Both are easily requested via your dashboard, offering flexibility for changing project needs.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-400">
                            <div class="accordion-header" data-accordion-toggle="relocate-faq-2">
                                How do I request an extension, swap, or relocation, and what's the notice period?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="relocate-faq-2" class="accordion-content">
                                <p>You can initiate requests for extensions, swaps, or relocations directly through your personalized Catdump dashboard under your active rentals. For extensions, requests can often be made up to the last day of your rental. For swaps and relocations, we recommend providing at least 24-48 hours notice to allow our partners to schedule efficiently and ensure timely service. Emergency requests may be possible at an additional charge and subject to availability.</p>
                            </div>
                        </div>
                    </div>

                    <div class="faq-category-section" data-category="pricing-billing all">
                        <h3 class="text-3xl font-bold text-gray-800 mb-8 mt-12 animate-on-scroll delay-200">Pricing & Billing</h3>
                        <div class="accordion-item animate-on-scroll delay-300">
                            <div class="accordion-header" data-accordion-toggle="pricing-faq-1">
                                How is my equipment rental quote calculated?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="pricing-faq-1" class="accordion-content">
                                <p>Your quote is calculated based on several factors including the type and size of equipment, rental duration, delivery location, and specific project requirements (e.g., waste type for dumpsters). Our AI system processes these details and gathers competitive bids from local suppliers to present you with the best available price.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-400">
                            <div class="accordion-header" data-accordion-toggle="pricing-faq-2">
                                Are there any hidden fees in Catdump's pricing?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></path></svg>
                            </div>
                            <div id="pricing-faq-2" class="accordion-content">
                                <p>Absolutely not. Transparency is a core value at Catdump. All costs, including delivery fees, rental rates, and any potential surcharges (like overweight fees for dumpsters, if applicable), are clearly outlined in your detailed quote before you finalize your booking. We believe in honest, upfront pricing.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-500">
                            <div class="accordion-header" data-accordion-toggle="pricing-faq-3">
                                What payment methods do you accept, and when do I pay?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="pricing-faq-3" class="accordion-content">
                                <p>We accept all major credit cards (Visa, Mastercard, American Express, Discover) and offer convenient ACH bank transfers. Payment for your rental is typically due upfront when you confirm your booking through your dashboard. For long-term rentals or larger projects, installment plans may be available via our financing options. All payments are processed securely through our encrypted platform.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-600">
                            <div class="accordion-header" data-accordion-toggle="pricing-faq-4">
                                Can I get financing for my rental, and what's the process?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="pricing-faq-4" class="accordion-content">
                                <p>Yes, we offer flexible financing options for larger projects or businesses looking to manage cash flow. The process typically involves a quick online application, where you provide some basic financial information. Our financing partners will then review your application and provide terms and rates. You can learn more and apply directly from our "Pricing & Finance" page.</p>
                            </div>
                        </div>
                    </div>

                    <div class="faq-category-section" data-category="account-support all">
                        <h3 class="text-3xl font-bold text-gray-800 mb-8 mt-12 animate-on-scroll delay-200">Account & Support</h3>
                        <div class="accordion-item animate-on-scroll delay-300">
                            <div class="accordion-header" data-accordion-toggle="account-faq-1">
                                How do I manage my rentals and invoices?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="account-faq-1" class="accordion-content">
                                <p>Your personalized Catdump dashboard serves as a centralized hub for all your rental activities. From here, you can effortlessly track current orders, manage service schedules, view detailed invoices, and communicate directly with suppliers. You can also access your complete rental history and reorder previous services with a single click, providing total control at your fingertips.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-400">
                            <div class="accordion-header" data-accordion-toggle="account-faq-2">
                                Can I track my order delivery in real-time?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="account-faq-2" class="accordion-content">
                                <p>Yes, for partners who support live tracking, you will see real-time updates of your equipment's delivery status directly on your Catdump dashboard. If live tracking isn't available for a specific partner, the driver will contact you directly with timely notifications and updates regarding your delivery progress, ensuring you're always informed.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-500">
                            <div class="accordion-header" data-accordion-toggle="account-faq-3">
                                How do I contact customer support if I can't find my answer here?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="account-faq-3" class="accordion-content">
                                <p>If you can't find the answer to your question in our FAQs, our dedicated customer support team is ready to help. You can reach us via the contact form on our website, or for active rentals, you can communicate directly with us or your supplier through your personalized dashboard. We strive to respond promptly to all inquiries.</p>
                            </div>
                        </div>
                        <div class="accordion-item animate-on-scroll delay-600">
                            <div class="accordion-header" data-accordion-toggle="account-faq-4">
                                What should I do if there's an issue with my equipment or service?
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                            <div id="account-faq-4" class="accordion-content">
                                <p>If you encounter any problems with your rented equipment or the service provided by our partners, please report it immediately through your Catdump dashboard or by contacting our customer support. Provide as much detail as possible, and we will work swiftly with the supplier to resolve the issue to your satisfaction, ensuring minimal disruption to your project.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-box py-20 md:py-32">
            <div class="section-box text-center">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-10 animate-on-scroll">Still Can't Find Your Answer?</h2>
                <p class="text-xl text-gray-700 mb-12 max-w-3xl mx-auto animate-on-scroll delay-100">
                    Our dedicated support team is ready to provide personalized assistance and answer any remaining questions you might have.
                </p>
                <a href="#" class="btn-primary inline-block shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition duration-300 animate-on-scroll delay-200">Contact Our Support Team</a>
            </div>
        </section>
    </main>

   <?php include '../includes/public_footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeMobileMenuButton = document.getElementById('close-mobile-menu');
            const mobileNavOverlay = document.getElementById('mobile-nav-overlay');

            // Check if elements exist before adding event listeners
            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', () => {
                    mobileNavOverlay.classList.add('open');
                });
            }

            if (closeMobileMenuButton) {
                closeMobileMenuButton.addEventListener('click', () => {
                    mobileNavOverlay.classList.remove('open');
                });
            }

            if (mobileNavOverlay) {
                mobileNavOverlay.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', () => {
                        mobileNavOverlay.classList.remove('open');
                    });
                });
            }

            // Mobile dropdown toggles
            document.querySelectorAll('[data-dropdown-toggle]').forEach(toggle => {
                toggle.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = toggle.dataset.dropdownToggle;
                    const targetContent = document.getElementById(targetId);
                    const arrowIcon = toggle.querySelector('[data-dropdown-arrow]');

                    if (targetContent) {
                        const isOpen = targetContent.classList.contains('open');

                        // Close all other open dropdowns
                        document.querySelectorAll('.mobile-dropdown-content.open').forEach(openContent => {
                            if (openContent.id !== targetId) { // Only close others
                                openContent.classList.remove('open');
                                const openArrow = document.querySelector(`[data-dropdown-arrow="${openContent.id}"]`);
                                if (openArrow) openArrow.classList.remove('rotate-180');
                            }
                        });

                        // Toggle current dropdown
                        if (isOpen) {
                            targetContent.classList.remove('open');
                            if (arrowIcon) arrowIcon.classList.remove('rotate-180');
                        } else {
                            targetContent.classList.add('open');
                            if (arrowIcon) arrowIcon.classList.add('rotate-180');
                        }
                    }
                });
            });


            const animateOnScrollElements = document.querySelectorAll('.animate-on-scroll');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Apply delay if specified, otherwise add immediately
                        const delay = parseFloat(getComputedStyle(entry.target).transitionDelay || 0);
                        if (delay > 0) {
                            setTimeout(() => {
                                entry.target.classList.add('is-visible');
                            }, delay * 1000); // Convert seconds to milliseconds
                        } else {
                            entry.target.classList.add('is-visible');
                        }
                        observer.unobserve(entry.target); // Stop observing once visible
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

            animateOnScrollElements.forEach(element => {
                observer.observe(element);
            });

            const heroSection = document.getElementById('hero-section');
            if (heroSection) {
                window.addEventListener('scroll', () => {
                    const scrollPosition = window.pageYOffset;
                    heroSection.style.backgroundPositionY = -scrollPosition * 0.3 + 'px';
                });
            }
            
            const mainHeader = document.getElementById('main-header');
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 50) {
                    mainHeader.classList.add('header-scrolled');
                } else {
                    mainHeader.classList.remove('header-scrolled');
                }
            });

            // Accordion functionality for FAQs
            document.querySelectorAll('.accordion-header').forEach(header => {
                header.addEventListener('click', () => {
                    const content = document.getElementById(header.dataset.accordionToggle);
                    const isActive = header.classList.contains('active');

                    // Close all open accordions first
                    document.querySelectorAll('.accordion-header.active').forEach(activeHeader => {
                        activeHeader.classList.remove('active');
                        document.getElementById(activeHeader.dataset.accordionToggle).classList.remove('open');
                    });

                    // If the clicked accordion was not active, open it
                    if (!isActive) {
                        header.classList.add('active');
                        content.classList.add('open');
                    }
                });
            });

            // FAQ Category Filtering and Search
            const faqSearchInput = document.getElementById('faq-search');
            const categoryButtons = document.querySelectorAll('.category-button');
            const faqCategorySections = document.querySelectorAll('.faq-category-section');

            function filterFaqs() {
                const searchTerm = faqSearchInput.value.toLowerCase();
                const activeCategoryButton = document.querySelector('.category-button.active');
                const activeCategory = activeCategoryButton ? activeCategoryButton.dataset.filter : 'all';

                faqCategorySections.forEach(section => {
                    let sectionCategories = section.dataset.category.split(' '); // Split categories like "dumpster-rentals all"
                    
                    let categoryMatch = (activeCategory === 'all' || sectionCategories.includes(activeCategory));
                    let searchMatch = true; // Assume match until proven otherwise

                    if (searchTerm) {
                        searchMatch = false; // Assume no match initially for search
                        section.querySelectorAll('.accordion-item').forEach(item => {
                            const headerText = item.querySelector('.accordion-header').textContent.toLowerCase();
                            const contentText = item.querySelector('.accordion-content').textContent.toLowerCase();
                            if (headerText.includes(searchTerm) || contentText.includes(searchTerm)) {
                                searchMatch = true;
                            }
                        });
                    }

                    if (categoryMatch && searchMatch) {
                        section.classList.add('active');
                    } else {
                        section.classList.remove('active');
                    }
                });

                // Handle opening/closing individual FAQ items based on search
                faqCategorySections.forEach(section => {
                    if (section.classList.contains('active')) {
                        section.querySelectorAll('.accordion-item').forEach(item => {
                            const header = item.querySelector('.accordion-header');
                            const content = item.querySelector('.accordion-content');
                            const itemText = (header.textContent + content.textContent).toLowerCase();

                            if (searchTerm && itemText.includes(searchTerm)) {
                                header.classList.add('active');
                                content.classList.add('open');
                            } else {
                                // Only close if there's a search term and it doesn't match this item
                                // Or if search term is empty, revert to default closed state
                                if (searchTerm || header.classList.contains('active')) { // Check if it's currently open
                                    header.classList.remove('active');
                                    content.classList.remove('open');
                                }
                            }
                        });
                    }
                });
            }

            faqSearchInput.addEventListener('keyup', filterFaqs);

            categoryButtons.forEach(button => {
                button.addEventListener('click', () => {
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                    faqSearchInput.value = ''; // Clear search when category changes
                    filterFaqs();
                });
            });

            // Initial filter to ensure only 'General' is active and others are hidden
            filterFaqs();
        });
    </script>
</body>
</html>