<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Catdump: Your Global Partner in Equipment Rental Excellence</title>
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
            background-image: url('https://placehold.co/1920x900/d8e2ed/1a73e8?text=About+Us+Hero+Background');
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

        .value-card {
            background-color: #ffffff;
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 2.5rem;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }
        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }
        .value-card .icon-large {
            font-size: 3.5rem;
            color: #34a853; /* Green for values */
            margin-bottom: 1.5rem;
        }
        .value-card h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.75rem;
        }
        .value-card p {
            font-size: 1rem;
            line-height: 1.6;
            color: #4a5568;
        }
        .team-member-card {
            background-color: #ffffff;
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            border: 1px solid rgba(0, 0, 0, 0.05);
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .team-member-card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1.5rem;
            border: 4px solid #1a73e8;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .team-member-card h4 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }
        .team-member-card p {
            color: #718096;
            font-size: 1rem;
        }
    </style>
</head>
<body class="antialiased">

    <?php include '../includes/public_header.php'; ?>

    <main>
        <section id="hero-section" class="hero-background py-32 md:py-48 relative">
            <div class="hero-overlay"></div>
            <div class="container-box hero-content text-center">
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-extrabold leading-tight mb-8 animate-on-scroll">
                    About Catdump: Your Global Partner in <span class="text-blue-custom">Equipment Rental Excellence</span>
                </h1>
                <p class="text-xl md:text-2xl lg:text-3xl text-gray-700 mb-12 max-w-5xl mx-auto animate-on-scroll delay-300">
                    Discover our journey, mission, and the core values that drive us to revolutionize the equipment rental industry with innovation, transparency, and unparalleled service.
                </p>
                <a href="#our-story" class="btn-primary inline-block animate-on-scroll delay-600">Our Story</a>
            </div>
        </section>

        <section id="our-story" class="container-box py-20 md:py-32">
            <div class="section-box-alt flex flex-col lg:flex-row items-center justify-between gap-16">
                <div class="lg:w-1/2 animate-on-scroll delay-100">
                    <img src="https://placehold.co/600x400/1a73e8/ffffff?text=Catdump+Team" alt="Catdump Team Collaboration" class="rounded-2xl shadow-xl border border-gray-200">
                </div>
                <div class="lg:w-1/2 text-center lg:text-left animate-on-scroll delay-200">
                    <span class="text-blue-custom text-lg font-semibold uppercase">Our Journey</span>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mt-2 mb-8">Redefining Equipment Rentals with Innovation</h2>
                    <p class="text-lg text-gray-700 mb-6">
                        Catdump was founded with a singular vision: to transform the often-complex and time-consuming process of equipment rental into a seamless, transparent, and user-friendly experience. We saw an opportunity to leverage cutting-edge technology to connect customers with the best local deals on essential equipment, globally, starting from our base in the USA.
                    </p>
                    <p class="text-lg text-gray-700 mb-6">
                        From humble beginnings, we've grown into a leading marketplace, driven by our commitment to innovation and customer satisfaction. Our AI-powered platform and extensive network of vetted suppliers ensure that whether you need a dumpster, temporary toilet, or storage container, you get it quickly, affordably, and with total peace of mind.
                    </p>
                    <p class="text-lg text-gray-700 font-semibold text-blue-custom">
                        Our Mission: To empower projects of all sizes by providing instant, reliable, and cost-effective access to necessary equipment, everywhere.
                    </p>
                </div>
            </div>
        </section>

        <section class="container-box py-20 md:py-32">
            <div class="section-box">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-20 animate-on-scroll">The Core Values That Drive Us</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <div class="value-card animate-on-scroll delay-100">
                        <div class="icon-large">💡</div>
                        <h3>Innovation</h3>
                        <p>We embrace cutting-edge technology, like AI, to continuously improve our platform, streamline processes, and deliver smarter solutions for our customers.</p>
                    </div>
                    <div class="value-card animate-on-scroll delay-200">
                        <div class="icon-large">🤝</div>
                        <h3>Customer-Centricity</h3>
                        <p>Our customers are at the heart of everything we do. We are dedicated to providing unparalleled support, transparent processes, and tailored solutions to meet their unique needs.</p>
                    </div>
                    <div class="value-card animate-on-scroll delay-300">
                        <div class="icon-large">✨</div>
                        <h3>Transparency</h3>
                        <p>We believe in clear, upfront pricing and honest communication at every step. No hidden fees, no surprises – just straightforward service you can trust.</p>
                    </div>
                    <div class="value-card animate-on-scroll delay-400">
                        <div class="icon-large">✅</div>
                        <h3>Reliability</h3>
                        <p>We partner with only the most reliable local suppliers and strive for dependable service, ensuring equipment is delivered on time and in excellent condition.</p>
                    </div>
                    <div class="value-card animate-on-scroll delay-500">
                        <div class="icon-large">♻️</div>
                        <h3>Sustainability</h3>
                        <p>We are committed to promoting eco-friendly practices in waste management and equipment usage, contributing to a healthier planet for future generations.</p>
                    </div>
                    <div class="value-card animate-on-scroll delay-600">
                        <div class="icon-large">🌍</div>
                        <h3>Global Vision, Local Impact</h3>
                        <p>While our ambition is global, our focus remains on empowering local businesses and communities by providing accessible and efficient equipment rental solutions.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-box py-20 md:py-32">
            <div class="section-box-alt">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-20 animate-on-scroll">Meet Our Leadership</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <div class="team-member-card animate-on-scroll delay-100">
                        <img src="https://placehold.co/150x150/1a73e8/ffffff?text=CEO" alt="CEO Profile">
                        <h4>Jane Doe</h4>
                        <p class="text-blue-custom font-semibold">Chief Executive Officer</p>
                        <p class="text-gray-600 mt-2">Visionary leader driving Catdump's mission to revolutionize equipment rentals worldwide.</p>
                    </div>
                    <div class="team-member-card animate-on-scroll delay-200">
                        <img src="https://placehold.co/150x150/34a853/ffffff?text=CTO" alt="CTO Profile">
                        <h4>John Smith</h4>
                        <p class="text-green-custom font-semibold">Chief Technology Officer</p>
                        <p class="text-gray-600 mt-2">Architect of our cutting-edge AI and seamless digital platform, ensuring innovation at its core.</p>
                    </div>
                    <div class="team-member-card animate-on-scroll delay-300">
                        <img src="https://placehold.co/150x150/1a73e8/ffffff?text=COO" alt="COO Profile">
                        <h4>Emily White</h4>
                        <p class="text-blue-custom font-semibold">Chief Operations Officer</p>
                        <p class="text-gray-600 mt-2">Oversees all operational aspects, ensuring efficient logistics and unparalleled service delivery.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-box py-20 md:py-32" id="stats-section">
            <div class="section-box text-center">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-20 animate-on-scroll">Our Impact in Numbers</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">
                    <div class="animate-on-scroll delay-100">
                        <div class="icon-box mx-auto mb-6 bg-green-custom text-white">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-5xl font-extrabold text-blue-custom mb-3" data-target="10000">0</p>
                        <p class="text-xl text-gray-700">Rentals Completed</p>
                    </div>
                    <div class="animate-on-scroll delay-200">
                        <div class="icon-box mx-auto mb-6 bg-blue-custom text-white">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2-1.343-2-3-2z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.105A9.763 9.763 0 0112 4c4.97 0 9 3.582 9 8z"></path></svg>
                        </div>
                        <p class="text-5xl font-extrabold text-green-custom mb-3" data-target="500">0</p>
                        <p class="text-xl text-gray-700">Verified Suppliers</p>
                    </div>
                    <div class="animate-on-scroll delay-300">
                        <div class="icon-box mx-auto mb-6 bg-green-custom text-white">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <p class="text-5xl font-extrabold text-blue-custom mb-3" data-target="150">0</p>
                        <p class="text-xl text-gray-700">Cities Served</p>
                    </div>
                    <div class="animate-on-scroll delay-400">
                        <div class="icon-box mx-auto mb-6 bg-blue-custom text-white">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 100 4m-4 12a2 2 0 100-4m14-4a2 2 0 100-4m-4 4a2 2 0 100 4m-6-4a2 2 0 100 4m-2 2a2 2 0 100 4m0-12a2 2 0 100 4"></path></svg>
                        </div>
                        <p class="text-5xl font-extrabold text-green-custom mb-3" data-target="98">0%</p>
                        <p class="text-xl text-gray-700">Customer Satisfaction</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-box py-20 md:py-32">
            <div class="section-box-alt text-center">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-10 animate-on-scroll">Our Global Presence, Rooted in the USA</h2>
                <p class="text-xl text-gray-700 mb-8 max-w-3xl mx-auto animate-on-scroll delay-100">
                    While Catdump proudly serves clients worldwide, our headquarters remains firmly established in the United States, driving our global operations from the heart of innovation. We are based in USA and deal in equipment rentals all over the globe.
                </p>
                <div class="flex flex-col items-center animate-on-scroll delay-200">
                    <p class="text-2xl font-bold text-blue-custom mb-4">U.S. Headquarters Address:</p>
                    <address class="text-xl text-gray-700 not-italic">
                        9330 LBJ Freeway Suite 900<br>
                        Dallas, TX 75243<br>
                        USA
                    </address>
                    <div class="mt-12 w-full max-w-2xl h-80 bg-gray-300 rounded-xl shadow-lg flex items-center justify-center text-gray-500 text-lg">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.291703273105!2d-96.7369335848248!3d32.95420368092285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864c2075775f0a6d%3A0xc3f8f1d3c0a5b9e!2s9330%20LBJ%20Freeway%20Suite%20900%2C%20Dallas%2C%20TX%2075243%2C%20USA!5e0!3m2!1sen!2sae!4v1678234567890!5m2!1sen!2sae"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </section>


        <section class="container-box py-20 md:py-32">
            <div class="section-box text-center">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-10 animate-on-scroll">Join the Catdump Family!</h2>
                <p class="text-xl text-gray-700 mb-12 max-w-3xl mx-auto animate-on-scroll delay-100">
                    Whether you're looking for seamless equipment rentals or a rewarding career, we're building the future of the industry.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-6 animate-on-scroll delay-200">
                    <a href="#" class="btn-primary inline-block">Get Started Now!</a>
                    <a href="careers.html" class="btn-secondary inline-block">Explore Careers</a>
                </div>
            </div>
        </section>
    </main>

    <?php include '../includes/public_footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
            
            // Accordion functionality for FAQs and Quick Solutions
            document.querySelectorAll('.accordion-header').forEach(header => {
                header.addEventListener('click', () => {
                    const content = document.getElementById(header.dataset.accordionToggle);
                    const isActive = header.classList.contains('active');

                    // Close all open accordions first (within the same section to prevent unintended closing)
                    // This logic assumes you only want one accordion open at a time within its immediate parent group
                    const parentSection = header.closest('.faq-category-section') || header.closest('.section-box') || header.closest('.section-box-alt');
                    parentSection.querySelectorAll('.accordion-header.active').forEach(activeHeader => {
                        if (activeHeader !== header) { // Don't close the currently clicked one
                            activeHeader.classList.remove('active');
                            document.getElementById(activeHeader.dataset.accordionToggle).classList.remove('open');
                        }
                    });

                    // Toggle the clicked accordion
                    if (!isActive) {
                        header.classList.add('active');
                        content.classList.add('open');
                    }
                });
            });

            // Counter animation for stats section
            const counterObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        const endValue = parseFloat(target.dataset.target); // Use parseFloat for percentages
                        const duration = 2000;
                        let startTimestamp = null;

                        const step = (timestamp) => {
                            if (!startTimestamp) startTimestamp = timestamp;
                            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                            let currentValue;
                            let textSuffix = '';

                            if (target.dataset.target.includes('%')) {
                                currentValue = Math.floor(progress * endValue);
                                textSuffix = '%';
                            } else {
                                currentValue = Math.floor(progress * endValue);
                            }
                            target.textContent = currentValue.toLocaleString() + textSuffix;

                            if (progress < 1) {
                                window.requestAnimationFrame(step);
                            }
                        };
                        window.requestAnimationFrame(step);
                        observer.unobserve(target);
                    }
                });
            }, { threshold: 0.5 });

            document.querySelectorAll('[data-target]').forEach(counter => {
                counterObserver.observe(counter);
            });
        });
    </script>
</body>
</html>