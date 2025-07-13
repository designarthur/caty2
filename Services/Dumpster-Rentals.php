<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dumpster Rentals - Catdump: Easy & Affordable Waste Management</title>
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
            background-image: url('https://placehold.co/1920x900/d0d9e6/1a73e8?text=Dumpster+Rental+Hero');
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

        .dumpster-size-card {
            background-color: #ffffff;
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 2.5rem;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }
        .dumpster-size-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }
        .dumpster-size-card img {
            max-width: 100%;
            height: 180px; /* Consistent image height */
            object-fit: contain;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        .dumpster-size-card h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #1a73e8;
            margin-bottom: 0.75rem;
        }
        .dumpster-size-card .capacity {
            font-size: 1.1rem;
            font-weight: 500;
            color: #34a853;
            margin-bottom: 1rem;
        }
        .dumpster-size-card p {
            font-size: 1rem;
            line-height: 1.6;
            color: #4a5568;
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
                    <a href="#" class="flex items-center justify-center text-blue-custom font-bold" data-dropdown-toggle="mobile-services-dropdown">
                        Services
                        <svg data-dropdown-arrow="mobile-services-dropdown" class="w-6 h-6 ml-2 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <div id="mobile-services-dropdown" class="mobile-dropdown-content text-gray-700 flex flex-col items-center open">
                        <a href="#" class="font-bold text-blue-custom">Dumpster Rentals</a>
                        <a href="#">Temporary Toilets</a>
                        <a href="#">Storage Containers</a>
                        <a href="#">Junk Removal</a>
                        <a href="#">Relocation & Swap</a>
                    </div>
                </div>

                <div>
                    <a href="#" class="flex items-center justify-center text-gray-700 hover:text-blue-custom" data-dropdown-toggle="mobile-company-dropdown">
                        Company
                        <svg data-dropdown-arrow="mobile-company-dropdown" class="w-6 h-6 ml-2 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <div id="mobile-company-dropdown" class="mobile-dropdown-content text-gray-700 flex flex-col items-center">
                        <a href="#">About Us</a>
                        <a href="#">Careers</a>
                        <a href="#">Press/Media</a>
                        <a href="#">Sustainability</a>
                        <a href="#">Testimonials</a>
                    </div>
                </div>

                <div>
                    <a href="#" class="flex items-center justify-center text-gray-700 hover:text-blue-custom" data-dropdown-toggle="mobile-resources-dropdown">
                        Resources
                        <svg data-dropdown-arrow="mobile-resources-dropdown" class="w-6 h-6 ml-2 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <div id="mobile-resources-dropdown" class="mobile-dropdown-content text-gray-700 flex flex-col items-center">
                        <a href="#">Pricing & Finance</a>
                        <a href="#">Customer Resources</a>
                        <a href="#">Blog/News</a>
                        <a href="#">FAQs</a>
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
                    Seamless Dumpster Rentals for <span class="text-blue-custom">Every Project</span>
                </h1>
                <p class="text-xl md:text-2xl lg:text-3xl text-gray-700 mb-12 max-w-5xl mx-auto animate-on-scroll delay-300">
                    Effortlessly manage waste with the perfect dumpster size, delivered when and where you need it. Get the best local deals with transparent pricing and exceptional service.
                </p>
                <a href="#" class="btn-primary inline-block animate-on-scroll delay-600">Get Your Instant Quote!</a>
            </div>
        </section>

        <section class="container-box py-20 md:py-32">
            <div class="section-box">
                <div class="text-center mb-8 animate-on-scroll delay-100">
                    <span class="text-blue-custom text-lg font-semibold uppercase">Why Catdump for Dumpsters?</span>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mt-2">Your Smart Choice for Waste Management</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                    <div class="feature-card animate-on-scroll delay-200">
                        <div class="icon-wrapper">
                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h4>Extensive Size Selection</h4>
                        <p>From small home cleanouts to large demolition projects, we offer a full range of dumpster sizes (10, 20, 30, 40-yard) to perfectly match your waste disposal needs.</p>
                    </div>

                    <div class="feature-card animate-on-scroll delay-300">
                        <div class="icon-wrapper">
                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v18"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3c-1.381 0-2.75-.415-3.984-1.153C6.714 1.187 5.099 0 3 0c-2.099 0-3.714 1.187-5.016 1.847C-6.75 2.585-8.119 3-9.5 3"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21c1.381 0 2.75.415 3.984 1.153C17.286 22.813 18.901 24 21 24c2.099 0 3.714-1.187 5.016-1.847C26.75 21.415 28.119 21 29.5 21"></path></svg>
                        </div>
                        <h4>AI-Powered Smart Matching</h4>
                        <p>Our advanced AI analyzes your project details to recommend the ideal dumpster size and connects you with local providers offering the best prices and availability.</p>
                    </div>

                    <div class="feature-card animate-on-scroll delay-400">
                        <div class="icon-wrapper">
                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8l4-4 4 4V7m0 3a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h4>Transparent & Fair Pricing</h4>
                        <p>No hidden fees or surprises. Get upfront, competitive pricing from multiple vetted local suppliers, ensuring you always get excellent value for your waste management needs.</p>
                    </div>

                    <div class="feature-card animate-on-scroll delay-500">
                        <div class="icon-wrapper">
                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h4>Flexible Scheduling & Delivery</h4>
                        <p>Schedule delivery and pickup times that work for your project timeline. Our network ensures prompt and reliable service, keeping your site clean and efficient.</p>
                    </div>

                    <div class="feature-card animate-on-scroll delay-600">
                        <div class="icon-wrapper">
                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11.5V14m0-2.5V8a2.5 2.5 0 115 0v2.5M7 11.5h6m6 0h.01M17 12h.01"></path></svg>
                        </div>
                        <h4>Eco-Friendly Disposal Practices</h4>
                        <p>We partner with suppliers committed to responsible waste disposal, emphasizing recycling and diversion from landfills whenever possible to protect the environment.</p>
                    </div>

                    <div class="feature-card animate-on-scroll delay-700">
                        <div class="icon-wrapper">
                            <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2-1.343-2-3-2z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.105A9.763 9.763 0 0112 4c4.97 0 9 3.582 9 8z"></path></svg>
                        </div>
                        <h4>Dedicated Customer Support</h4>
                        <p>Our team is always ready to assist, from guiding you through the booking process to addressing any questions or concerns during your dumpster rental period.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-box py-20 md:py-32">
            <div class="section-box-alt">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-20 animate-on-scroll">Find the Perfect Dumpster Size for Your Project</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                    <div class="dumpster-size-card animate-on-scroll delay-100">
                        <img src="https://placehold.co/250x180/1a73e8/ffffff?text=10+Yard+Dumpster" alt="10 Yard Dumpster">
                        <h3>10 Yard Dumpster</h3>
                        <p class="capacity">Ideal for Small Projects</p>
                        <p>Perfect for garage cleanouts, small bathroom renovations, yard clean-ups, or minor debris removal. Holds approximately 3 pickup truck loads.</p>
                    </div>
                    <div class="dumpster-size-card animate-on-scroll delay-200">
                        <img src="https://placehold.co/250x180/34a853/ffffff?text=20+Yard+Dumpster" alt="20 Yard Dumpster">
                        <h3>20 Yard Dumpster</h3>
                        <p class="capacity">Great for Medium Projects</p>
                        <p>Suitable for roofing projects, medium-sized renovations, deck removal, or large garage cleanouts. Holds approximately 6 pickup truck loads.</p>
                    </div>
                    <div class="dumpster-size-card animate-on-scroll delay-300">
                        <img src="https://placehold.co/250x180/1a73e8/ffffff?text=30+Yard+Dumpster" alt="30 Yard Dumpster">
                        <h3>30 Yard Dumpster</h3>
                        <p class="capacity">Best for Major Renovations & Construction</p>
                        <p>Commonly used for large home additions, new home construction, commercial cleanouts, or major demolition debris. Holds approximately 9 pickup truck loads.</p>
                    </div>
                    <div class="dumpster-size-card animate-on-scroll delay-400">
                        <img src="https://placehold.co/250x180/34a853/ffffff?text=40+Yard+Dumpster" alt="40 Yard Dumpster">
                        <h3>40 Yard Dumpster</h3>
                        <p class="capacity">Designed for Large-Scale Projects</p>
                        <p>Our largest option for commercial construction, major demolition, large-scale cleanouts, or significant roofing tear-offs. Holds approximately 12 pickup truck loads.</p>
                    </div>
                </div>
                <div class="text-center mt-20 animate-on-scroll delay-500">
                    <a href="#" class="btn-secondary inline-block">Need help choosing a size? Talk to our AI!</a>
                </div>
            </div>
        </section>

        <section class="container-box py-20 md:py-32">
            <div class="section-box">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-20 animate-on-scroll">How Easy It Is to Rent Your Dumpster</h2>
                <div class="how-it-works-container">
                    <div class="how-it-works-row animate-on-scroll delay-100">
                        <div class="how-it-works-image-box">
                            <img src="https://placehold.co/300x200/e0e7ff/1a73e8?text=Chat+Dumpster+Needs" alt="Chat with AI for Dumpster">
                        </div>
                        <div class="how-it-works-content">
                            <p class="how-it-works-step-number">Step 1</p>
                            <h3 class="how-it-works-step-title">Tell Us Your Dumpster Needs</h3>
                            <p class="how-it-works-step-description">Simply chat with our AI about your project. Specify the type of debris, desired size, and rental duration. Our AI captures all details to get you the most accurate quotes.</p>
                            <a href="#" class="text-blue-custom hover:underline font-medium mt-4 inline-block">Start Your Quote &rarr;</a>
                        </div>
                    </div>

                    <div class="how-it-works-row animate-on-scroll delay-300">
                        <div class="how-it-works-image-box">
                            <img src="https://placehold.co/300x200/e0e7ff/34a853?text=Compare+Dumpster+Prices" alt="Compare Dumpster Prices">
                        </div>
                        <div class="how-it-works-content">
                            <p class="how-it-works-step-number">Step 2</p>
                            <h3 class="how-it-works-step-title">Compare Best Local Dumpster Offers</h3>
                            <p class="how-it-works-step-description">Receive multiple competitive quotes from vetted local dumpster providers directly on your dashboard. Compare prices, terms, and availability effortlessly.</p>
                            <a href="#" class="text-blue-custom hover:underline font-medium mt-4 inline-block">View Offers &rarr;</a>
                        </div>
                    </div>

                    <div class="how-it-works-row animate-on-scroll delay-500">
                        <div class="how-it-works-image-box">
                            <img src="https://placehold.co/300x200/e0e7ff/1a73e8?text=Book+Track+Dumpster" alt="Book & Track Dumpster">
                        </div>
                        <div class="how-it-works-content">
                            <p class="how-it-works-step-number">Step 3</p>
                            <h3 class="how-it-works-step-title">Book, Pay & Track Delivery</h3>
                            <p class="how-it-works-step-description">Confirm your chosen dumpster, pay securely via your dashboard, and track your delivery in real-time. We'll notify you every step until your dumpster is on site.</p>
                            <a href="#" class="text-blue-custom hover:underline font-medium mt-4 inline-block">Access Dashboard &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-box py-20 md:py-32" id="testimonials-section">
            <div class="section-box-alt">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-20 animate-on-scroll">What Our Customers Say About Our Dumpster Service</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                    <div class="testimonial-card animate-on-scroll delay-100">
                        <p class="testimonial-quote">"Renting a dumpster for our home renovation was a breeze with Catdump. Their AI helped us pick the perfect size, and the delivery was exactly on time. Highly efficient!"</p>
                        <p class="testimonial-author">- David M.</p>
                        <p class="testimonial-source">Homeowner, Major Renovation</p>
                    </div>
                    <div class="testimonial-card animate-on-scroll delay-200">
                        <p class="testimonial-quote">"We always need reliable dumpsters for our construction sites. Catdump's platform provides the best local prices instantly, saving us significant time and money on every project."</p>
                        <p class="testimonial-author">- Emily R.</p>
                        <p class="testimonial-source">Site Manager, ProBuild Contractors</p>
                    </div>
                    <div class="testimonial-card animate-on-scroll delay-300">
                        <p class="testimonial-quote">"The ability to track our dumpster delivery was fantastic. It allowed us to plan our crew's work perfectly. Catdump's service is top-notch for waste management."</p>
                        <p class="testimonial-author">- Chris P.</p>
                        <p class="testimonial-source">Property Developer, Urban Spaces LLC</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-box py-20 md:py-32" id="faq-section">
            <div class="section-box">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-20 animate-on-scroll">Common Questions About Dumpster Rentals</h2>
                <div class="max-w-3xl mx-auto">
                    <div class="accordion-item animate-on-scroll delay-100">
                        <div class="accordion-header" data-accordion-toggle="faq-1">
                            How do I choose the right dumpster size for my project?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-1" class="accordion-content">
                            <p>Our AI chat system is designed to help! Just tell us about your project (e.g., "bathroom demo," "full home cleanout," "new construction"), and it will suggest the ideal dumpster size. You can also refer to our "Dumpster Sizes & Uses" section above for a general guide on common project types and their matching dumpster capacities.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-200">
                        <div class="accordion-header" data-accordion-toggle="faq-2">
                            What items are prohibited from being placed in a dumpster?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-2" class="accordion-content">
                            <p>Generally, hazardous materials, chemicals, batteries, tires, paints, asbestos, and certain electronics (like TVs and computers) are prohibited. Specific restrictions can vary by local regulations and individual suppliers. Your quote details will clearly outline any prohibited items, and our support team can clarify further.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-300">
                        <div class="accordion-header" data-accordion-toggle="faq-3">
                            Do I need a permit to place a dumpster on my property?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-3" class="accordion-content">
                            <p>If you plan to place the dumpster on private property (like your driveway), a permit is usually not required. However, if you intend to place it on public property (like a street or sidewalk), a permit from your local municipality or homeowner's association may be necessary. We recommend checking with your local authorities.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-400">
                        <div class="accordion-header" data-accordion-toggle="faq-4">
                            How long can I keep the dumpster, and how does pickup work?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-4" class="accordion-content">
                            <p>Standard rental periods typically range from 7 to 14 days, but this can vary by supplier and your specific needs. You can request extensions through your Catdump dashboard. For pickup, simply notify us through the dashboard when your dumpster is full or your rental period is ending, and the supplier will arrange a timely removal.</p>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-16 animate-on-scroll delay-600">
                    <a href="#" class="btn-secondary inline-block">View All Dumpster FAQs</a>
                </div>
            </div>
        </section>

        <section class="container-box py-20 md:py-32">
            <div class="section-box-alt text-center">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-10 animate-on-scroll">Ready to Simplify Your Waste Management?</h2>
                <p class="text-xl text-gray-700 mb-12 max-w-3xl mx-auto animate-on-scroll delay-100">
                    Get the right dumpster for your project quickly and affordably. Catdump makes waste disposal easy, so you can focus on what matters most.
                </p>
                <a href="#" class="btn-primary inline-block shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition duration-300 animate-on-scroll delay-200">Get Your Free Dumpster Quote Today!</a>
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
        });
    </script>
</body>
</html>