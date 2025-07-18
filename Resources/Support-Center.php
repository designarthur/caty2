<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Center - Catdump: We're Here to Help!</title>
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
            background-image: url('https://placehold.co/1920x900/e8f3f8/1a73e8?text=Support+Center+Hero');
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

        .support-option-card {
            background-color: #ffffff;
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 2.5rem;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
        .support-option-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }
        .support-option-card .icon-large {
            font-size: 3.5rem;
            color: #1a73e8; /* Blue for support icons */
            margin-bottom: 1.5rem;
        }
        .support-option-card h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.75rem;
        }
        .support-option-card p {
            font-size: 1rem;
            line-height: 1.6;
            color: #4a5568;
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
                    Catdump Support Center: <span class="text-blue-custom">We're Here to Help!</span>
                </h1>
                <p class="text-xl md:text-2xl lg:text-3xl text-gray-700 mb-12 max-w-5xl mx-auto animate-on-scroll delay-300">
                    Your quick guide to getting the assistance you need. Find answers, manage your rentals, or connect directly with our dedicated support team.
                </p>
                <a href="#support-options" class="btn-primary inline-block animate-on-scroll delay-600">Find Your Answer Now!</a>
            </div>
        </section>

        <section id="support-options" class="container-box py-20 md:py-32">
            <div class="section-box-alt">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-20 animate-on-scroll">Your Options for Quick Assistance</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <a href="/Resources/FAQs.php" class="support-option-card animate-on-scroll delay-100">
                        <div class="icon-large">❓</div>
                        <h3>Search Our FAQs</h3>
                        <p>Browse our extensive database of frequently asked questions to find immediate answers to common inquiries.</p>
                    </a>
                    <a href="/customer/dashboard.php" class="support-option-card animate-on-scroll delay-200">
                        <div class="icon-large">🖥️</div>
                        <h3>Access Customer Portal</h3>
                        <p>Manage your active rentals, view invoices, track orders, and communicate with suppliers directly through your dashboard.</p>
                    </a>
                    <a href="/Resources/Contact.php" class="support-option-card animate-on-scroll delay-300">
                        <div class="icon-large">📝</div>
                        <h3>Submit a Support Ticket</h3>
                        <p>For non-urgent issues or detailed inquiries, submit a ticket and our team will get back to you promptly via email.</p>
                    </a>
                    <a href="/Resources/Contact.php" class="support-option-card animate-on-scroll delay-400">
                        <div class="icon-large">💬</div>
                        <h3>Live Chat Support</h3>
                        <p>Connect with a support agent in real-time for immediate assistance during business hours. (Availability may vary)</p>
                    </a>
                    <a href="tel:[Your Phone Number]" class="support-option-card animate-on-scroll delay-500">
                        <div class="icon-large">📞</div>
                        <h3>Call Us</h3>
                        <p>For urgent matters or direct assistance, speak to a member of our support team over the phone.</p>
                        <p class="text-blue-custom font-semibold mt-2">[Your Phone Number]</p>
                    </a>
                    <a href="mailto:[Your Support Email]" class="support-option-card animate-on-scroll delay-600">
                        <div class="icon-large">📧</div>
                        <h3>Email Support</h3>
                        <p>Send us an email with your question or concern, and we'll reply as quickly as possible.</p>
                        <p class="text-blue-custom font-semibold mt-2">[Your Support Email]</p>
                    </a>
                </div>
            </div>
        </section>

        <section class="container-box py-20 md:py-32">
            <div class="section-box text-center">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-10 animate-on-scroll">Customer Service Hours</h2>
                <p class="text-xl text-gray-700 mb-8 max-w-3xl mx-auto animate-on-scroll delay-100">
                    Our dedicated support team is available to assist you during the following hours (all times in Eastern Standard Time):
                </p>
                <ul class="text-2xl font-semibold text-gray-800 space-y-4 animate-on-scroll delay-200">
                    <li>Monday - Friday: <span class="text-blue-custom">8:00 AM - 6:00 PM EST</span></li>
                    <li>Saturday: <span class="text-blue-custom">9:00 AM - 3:00 PM EST</span></li>
                    <li>Sunday: <span class="text-red-500">Closed</span></li>
                </ul>
                <p class="text-md text-gray-600 mt-8 animate-on-scroll delay-300">
                    Please note that response times may vary during peak periods or holidays. For urgent issues outside of these hours, please use the Support Ticket system.
                </p>
            </div>
        </section>

        <section class="container-box py-20 md:py-32">
            <div class="section-box-alt">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-20 animate-on-scroll">Quick Solutions for Common Issues</h2>
                <div class="max-w-3xl mx-auto">
                    <div class="accordion-item animate-on-scroll delay-100">
                        <div class="accordion-header" data-accordion-toggle="issue-1">
                            How do I extend my rental period?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="issue-1" class="accordion-content">
                            <p>You can easily extend your rental period directly from your <a href="/customer/dashboard.php" class="text-blue-custom underline">Customer Portal</a>. Navigate to your active rental, select the 'Extend Rental' option, and follow the prompts to choose new dates and confirm any updated pricing.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-200">
                        <div class="accordion-header" data-accordion-toggle="issue-2">
                            My dumpster is full, how do I schedule pickup?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="issue-2" class="accordion-content">
                            <p>To schedule a pickup for your full dumpster, simply log into your <a href="/customer/dashboard.php" class="text-blue-custom underline">Customer Portal</a>. Find your active dumpster rental and select 'Request Pickup'. Confirm the details, and our team will coordinate with the supplier for timely removal.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-300">
                        <div class="accordion-header" data-accordion-toggle="issue-3">
                            I'm having trouble logging into my account.
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="issue-3" class="accordion-content">
                            <p>If you're experiencing login issues, please try resetting your password using the 'Forgot Password' link on the login page. If the problem persists, or if you don't receive a reset email, please <a href="/Resources/Contact.php" class="text-blue-custom underline">submit a support ticket</a> or use our live chat for immediate assistance.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-400">
                        <div class="accordion-header" data-accordion-toggle="issue-4">
                            How do I get a quote for a new rental?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="issue-4" class="accordion-content">
                            <p>You can get an instant, transparent quote by using our AI-powered chat right on our <a href="/index.php" class="text-blue-custom underline">homepage</a>. Simply tell the AI your needs, and it will guide you through the quick quoting process.</p>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-16 animate-on-scroll delay-500">
                    <a href="/Resources/FAQs.php" class="btn-secondary inline-block">View All FAQs</a>
                </div>
            </div>
        </section>

        <section id="contact-form-section" class="container-box py-20 md:py-32">
            <div class="section-box text-center">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-10 animate-on-scroll">Can't Find What You Need? Send Us a Message!</h2>
                <p class="text-xl text-gray-700 mb-12 max-w-3xl mx-auto animate-on-scroll delay-100">
                    For specific inquiries or if you prefer written communication, please fill out the form below. Our team will get back to you as soon as possible.
                </p>
                <div class="max-w-2xl mx-auto animate-on-scroll delay-200">
                    <form class="space-y-6 text-left">
                        <div>
                            <label for="support-name" class="block text-lg font-medium text-gray-700 mb-2">Your Full Name</label>
                            <input type="text" id="support-name" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-custom transition duration-200" placeholder="Enter your full name" required>
                        </div>
                        <div>
                            <label for="support-email" class="block text-lg font-medium text-gray-700 mb-2">Your Email Address</label>
                            <input type="email" id="support-email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-custom transition duration-200" placeholder="Enter your email" required>
                        </div>
                        <div>
                            <label for="support-subject" class="block text-lg font-medium text-gray-700 mb-2">Subject</label>
                            <input type="text" id="support-subject" name="subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-custom transition duration-200" placeholder="Briefly describe your inquiry" required>
                        </div>
                        <div>
                            <label for="support-message" class="block text-lg font-medium text-gray-700 mb-2">Your Message</label>
                            <textarea id="support-message" name="message" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-custom transition duration-200" placeholder="Please provide details about your issue or question"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn-primary w-full md:w-auto">Send Message</button>
                        </div>
                        <p class="text-gray-600 text-sm mt-4 text-center">We aim to respond to all email inquiries within 24-48 business hours.</p>
                    </form>
                </div>
            </div>
        </section>
    </main>

   <?php include '../includes/public_footer.php'; ?>

    <script>
        // IIFE for header JS to ensure it runs immediately
        (function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeMobileMenuButton = document.getElementById('close-mobile-menu');
            const mobileMenuDrawer = document.getElementById('mobile-menu-drawer');
            const mobileServicesDropdownButton = document.getElementById('mobile-services-dropdown-button');
            const mobileServicesPanel = document.getElementById('mobile-services-panel');
            const mobileCompanyDropdownButton = document.getElementById('mobile-company-dropdown-button');
            const mobileCompanyPanel = document.getElementById('mobile-company-panel');
            const mobileResourcesDropdownButton = document.getElementById('mobile-resources-dropdown-button');
            const mobileResourcesPanel = document.getElementById('mobile-resources-panel');
            const mainHeader = document.getElementById('main-header');

            // Timeout variables for hover delays
            let servicesTimeout;
            let companyTimeout;
            let resourcesTimeout;
            const hoverDelay = 100; // Milliseconds to wait before hiding dropdown

            // Function to show a desktop flyout menu
            function showDesktopFlyout(button, menu) {
                clearTimeout(servicesTimeout);
                clearTimeout(companyTimeout);
                clearTimeout(resourcesTimeout); // Clear any pending hide for all menus
                
                // Hide all other menus
                document.querySelectorAll('.desktop-flyout-menu.visible').forEach(openMenu => {
                    openMenu.classList.remove('visible');
                });
                document.querySelectorAll('[aria-expanded="true"]').forEach(expandedButton => {
                    expandedButton.setAttribute('aria-expanded', 'false');
                    expandedButton.querySelector('svg')?.classList.remove('rotate-180');
                });

                menu.classList.add('visible');
                button.setAttribute('aria-expanded', 'true');
                button.querySelector('svg')?.classList.add('rotate-180');
            }

            // Function to hide a desktop flyout menu with a delay
            function hideDesktopFlyout(button, menu, timeoutRef) {
                // Use the passed timeoutRef to assign the timeout ID
                timeoutRef = setTimeout(() => {
                    menu.classList.remove('visible');
                    button.setAttribute('aria-expanded', 'false');
                    button.querySelector('svg')?.classList.remove('rotate-180');
                }, hoverDelay);
                return timeoutRef; // Return the new timeout ID
            }


            // --- Mobile Menu Drawer Logic ---
            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', () => {
                    mobileMenuDrawer.classList.remove('hidden');
                    document.body.style.overflow = 'hidden'; // Prevent scrolling body when drawer is open
                });
            }

            if (closeMobileMenuButton) {
                closeMobileMenuButton.addEventListener('click', () => {
                    mobileMenuDrawer.classList.add('hidden');
                    document.body.style.overflow = ''; // Restore body scrolling
                });
            }

            // Close mobile menu when a link is clicked inside it
            if (mobileMenuDrawer) {
                mobileMenuDrawer.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenuDrawer.classList.add('hidden');
                        document.body.style.overflow = '';
                    });
                });
            }

            // --- Mobile Services Dropdown (Accordion style) ---
            if (mobileServicesDropdownButton) {
                mobileServicesDropdownButton.addEventListener('click', () => {
                    const isExpanded = mobileServicesDropdownButton.getAttribute('aria-expanded') === 'true';
                    mobileServicesDropdownButton.setAttribute('aria-expanded', !isExpanded);
                    mobileServicesPanel.classList.toggle('hidden');
                    // Toggle the rotate class for the SVG icon
                    mobileServicesDropdownButton.querySelector('svg').classList.toggle('rotate-180', !isExpanded);

                    // Close other mobile dropdowns if open
                    if (mobileCompanyPanel && !mobileCompanyPanel.classList.contains('hidden') && mobileServicesDropdownButton.id !== mobileCompanyDropdownButton.id) {
                        mobileCompanyPanel.classList.add('hidden');
                        mobileCompanyDropdownButton.setAttribute('aria-expanded', 'false');
                        mobileCompanyDropdownButton.querySelector('svg').classList.remove('rotate-180');
                    }
                    if (mobileResourcesPanel && !mobileResourcesPanel.classList.contains('hidden') && mobileServicesDropdownButton.id !== mobileResourcesDropdownButton.id) {
                        mobileResourcesPanel.classList.add('hidden');
                        mobileResourcesDropdownButton.setAttribute('aria-expanded', 'false');
                        mobileResourcesDropdownButton.querySelector('svg').classList.remove('rotate-180');
                    }
                });
            }

            // --- Mobile Company Dropdown (Accordion style) ---
            if (mobileCompanyDropdownButton) {
                mobileCompanyDropdownButton.addEventListener('click', () => {
                    const isExpanded = mobileCompanyDropdownButton.getAttribute('aria-expanded') === 'true';
                    mobileCompanyDropdownButton.setAttribute('aria-expanded', !isExpanded);
                    mobileCompanyPanel.classList.toggle('hidden');
                    // Toggle the rotate class for the SVG icon
                    mobileCompanyDropdownButton.querySelector('svg').classList.toggle('rotate-180', !isExpanded);

                    // Close other mobile dropdowns if open
                    if (mobileServicesPanel && !mobileServicesPanel.classList.contains('hidden') && mobileCompanyDropdownButton.id !== mobileServicesDropdownButton.id) {
                        mobileServicesPanel.classList.add('hidden');
                        mobileServicesDropdownButton.setAttribute('aria-expanded', 'false');
                        mobileServicesDropdownButton.querySelector('svg').classList.remove('rotate-180');
                    }
                    if (mobileResourcesPanel && !mobileResourcesPanel.classList.contains('hidden') && mobileCompanyDropdownButton.id !== mobileResourcesDropdownButton.id) {
                        mobileResourcesPanel.classList.add('hidden');
                        mobileResourcesDropdownButton.setAttribute('aria-expanded', 'false');
                        mobileResourcesDropdownButton.querySelector('svg').classList.remove('rotate-180');
                    }
                });
            }

            // --- Mobile Resources Dropdown (Accordion style) ---
            if (mobileResourcesDropdownButton) {
                mobileResourcesDropdownButton.addEventListener('click', () => {
                    const isExpanded = mobileResourcesDropdownButton.getAttribute('aria-expanded') === 'true';
                    mobileResourcesDropdownButton.setAttribute('aria-expanded', !isExpanded);
                    mobileResourcesPanel.classList.toggle('hidden');
                    // Toggle the rotate class for the SVG icon
                    mobileResourcesDropdownButton.querySelector('svg').classList.toggle('rotate-180', !isExpanded);

                    // Close other mobile dropdowns if open
                    if (mobileServicesPanel && !mobileServicesPanel.classList.contains('hidden') && mobileResourcesDropdownButton.id !== mobileServicesDropdownButton.id) {
                        mobileServicesPanel.classList.add('hidden');
                        mobileServicesDropdownButton.setAttribute('aria-expanded', 'false');
                        mobileServicesDropdownButton.querySelector('svg').classList.remove('rotate-180');
                    }
                    if (mobileCompanyPanel && !mobileCompanyPanel.classList.contains('hidden') && mobileResourcesDropdownButton.id !== mobileCompanyDropdownButton.id) {
                        mobileCompanyPanel.classList.add('hidden');
                        mobileCompanyDropdownButton.setAttribute('aria-expanded', 'false');
                        mobileCompanyDropdownButton.querySelector('svg').classList.remove('rotate-180');
                    }
                });
            }


            // --- Desktop Services Flyout Menu (Hover to toggle with JS for smoothness) ---
            const servicesMenuDesktop = document.getElementById('services-menu-desktop');
            if (servicesMenuDesktop) {
                servicesMenuDesktop.addEventListener('mouseenter', () => showDesktopFlyout(servicesDropdownButton, servicesFlyoutMenu));
                servicesMenuDesktop.addEventListener('mouseleave', () => { servicesTimeout = hideDesktopFlyout(servicesDropdownButton, servicesFlyoutMenu, servicesTimeout); });
            }

            // --- Desktop Company Flyout Menu (Hover to toggle with JS for smoothness) ---
            const companyMenuDesktop = document.getElementById('company-menu-desktop');
            if (companyMenuDesktop) {
                companyMenuDesktop.addEventListener('mouseenter', () => showDesktopFlyout(companyDropdownButton, companyFlyoutMenu));
                companyMenuDesktop.addEventListener('mouseleave', () => { companyTimeout = hideDesktopFlyout(companyDropdownButton, companyFlyoutMenu, companyTimeout); });
            }

            // --- Desktop Resources Flyout Menu (Hover to toggle with JS for smoothness) ---
            const resourcesMenuDesktop = document.getElementById('resources-menu-desktop');
            if (resourcesMenuDesktop) {
                resourcesMenuDesktop.addEventListener('mouseenter', () => showDesktopFlyout(resourcesDropdownButton, resourcesFlyoutMenu));
                resourcesMenuDesktop.addEventListener('mouseleave', () => { resourcesTimeout = hideDesktopFlyout(resourcesDropdownButton, resourcesFlyoutMenu, resourcesTimeout); });
            }


            // --- Header Scroll Effect (Sticky header background change) ---
            if (mainHeader) {
                window.addEventListener('scroll', () => {
                    if (window.pageYOffset > 50) { // Adjust scroll threshold as needed
                        mainHeader.classList.add('header-scrolled');
                    } else {
                        mainHeader.classList.remove('header-scrolled');
                    }
                });
            }
        })(); // Immediately invoked function expression
    </script>
</body>
</html>