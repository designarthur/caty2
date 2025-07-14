<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing & Finance - Catdump: Transparent Costs & Flexible Options</title>
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
            background-image: url('https://placehold.co/1920x900/d4e4f0/1a73e8?text=Pricing+Finance+Hero');
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

        .pricing-model-card {
            background-color: #ffffff;
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 2.5rem;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }
        .pricing-model-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }
        .pricing-model-card .icon-large {
            font-size: 3.5rem;
            color: #1a73e8; /* Blue for pricing icons */
            margin-bottom: 1.5rem;
        }
        .pricing-model-card h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.75rem;
        }
        .pricing-model-card p {
            font-size: 1rem;
            line-height: 1.6;
            color: #4a5568;
        }
        .finance-option-card {
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
        }
        .finance-option-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }
        .finance-option-card .icon-large {
            font-size: 3.5rem;
            color: #34a853; /* Green for finance icons */
            margin-bottom: 1.5rem;
        }
        .finance-option-card h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.75rem;
        }
        .finance-option-card p {
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
                    Transparent Pricing & Flexible Finance <span class="text-blue-custom">for Every Project</span>
                </h1>
                <p class="text-xl md:text-2xl lg:text-3xl text-gray-700 mb-12 max-w-5xl mx-auto animate-on-scroll delay-300">
                    Understand how Catdump provides competitive, upfront pricing for all equipment rentals and explore our adaptable financing solutions to power your projects.
                </p>
                <a href="#payment-options" class="btn-primary inline-block animate-on-scroll delay-600">Explore Payment Options</a>
            </div>
        </section>

        <section id="pricing-model" class="container-box py-20 md:py-32">
            <div class="section-box-alt">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-20 animate-on-scroll">Our Transparent Pricing Model</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <div class="pricing-model-card animate-on-scroll delay-100">
                        <div class="icon-large">💰</div>
                        <h3>Competitive Marketplace</h3>
                        <p>Our platform leverages a vast network of vetted local suppliers who bid competitively on your rental requests, ensuring you always get the best possible price.</p>
                    </div>
                    <div class="pricing-model-card animate-on-scroll delay-200">
                        <div class="icon-large">🔍</div>
                        <h3>Upfront & Clear Quotes</h3>
                        <p>No hidden fees or surprises. Our quotes are comprehensive, detailing all costs, including delivery, pickup, rental duration, and any applicable taxes or environmental fees.</p>
                    </div>
                    <div class="pricing-model-card animate-on-scroll delay-300">
                        <div class="icon-large">⚡</div>
                        <h3>AI-Powered Pricing</h3>
                        <p>Our advanced AI analyzes real-time market data, equipment availability, and your specific project needs to provide instant, accurate, and fair pricing.</p>
                    </div>
                    <div class="pricing-model-card animate-on-scroll delay-400">
                        <div class="icon-large">⚖️</div>
                        <h3>Value for Money</h3>
                        <p>We focus on delivering not just low prices, but exceptional value. Our streamlined process and reliable partners ensure efficiency and peace of mind, saving you more than just money.</p>
                    </div>
                    <div class="pricing-model-card animate-on-scroll delay-500">
                        <div class="icon-large">🔄</div>
                        <h3>Flexible Adjustments</h3>
                        <p>Need to extend, swap, or relocate a rental? Our transparent policies for these adjustments ensure you always know the cost upfront, adapting to your project's evolution.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="payment-options" class="container-box py-20 md:py-32">
            <div class="section-box">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-20 animate-on-scroll">Flexible Payment & Financing Options</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <div class="finance-option-card animate-on-scroll delay-100">
                        <div class="icon-large">💳</div>
                        <h3>Major Credit Cards</h3>
                        <p>We accept all major credit cards, including Visa, MasterCard, American Express, and Discover, for quick and secure online payments through your dashboard.</p>
                    </div>
                    <div class="finance-option-card animate-on-scroll delay-200">
                        <div class="icon-large">🏦</div>
                        <h3>ACH Bank Transfers</h3>
                        <p>For larger transactions or corporate accounts, we offer secure Automated Clearing House (ACH) bank transfer options, providing a direct and efficient payment method.</p>
                    </div>
                    <div class="finance-option-card animate-on-scroll delay-300">
                        <div class="icon-large">📈</div>
                        <h3>Flexible Financing Plans</h3>
                        <p>Need financing for large-scale or long-term projects? We partner with leading financial institutions to offer tailored financing solutions that fit your budget and cash flow needs, allowing you to acquire equipment without upfront capital strain.</p>
                        <a href="#" class="text-blue-custom hover:underline font-medium mt-4 inline-block">Learn More About Financing &rarr;</a>
                    </div>
                    <div class="finance-option-card animate-on-scroll delay-400">
                        <div class="icon-large">🔒</div>
                        <h3>Secure Online Payments</h3>
                        <p>All online payments are processed through encrypted, industry-standard secure gateways, ensuring your financial information is protected with bank-level security at all times.</p>
                    </div>
                    <div class="finance-option-card animate-on-scroll delay-500">
                        <div class="icon-large">🧾</div>
                        <h3>Centralized Invoicing</h3>
                        <p>All your invoices are accessible through your personalized Catdump dashboard, making it easy to track payments, view past transactions, and manage your accounts efficiently.</p>
                    </div>
                </div>
                <div class="text-center mt-20 animate-on-scroll delay-600">
                    <a href="/Resources/Contact.php" class="btn-secondary inline-block">Questions about payments? Contact our team!</a>
                </div>
            </div>
        </section>

        <section class="container-box py-20 md:py-32" id="faq-section">
            <div class="section-box-alt">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-20 animate-on-scroll">Frequently Asked Questions About Pricing & Finance</h2>
                <div class="max-w-3xl mx-auto">
                    <div class="accordion-item animate-on-scroll delay-100">
                        <div class="accordion-header" data-accordion-toggle="faq-1">
                            How does Catdump ensure I get the best price?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-1" class="accordion-content">
                            <p>Our platform connects you with a broad network of vetted local suppliers. When you request a quote, these suppliers compete to offer you the best pricing. Our AI further optimizes this by considering real-time market data and availability, ensuring you receive the most competitive offer available.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-200">
                        <div class="accordion-header" data-accordion-toggle="faq-2">
                            Are there any hidden fees or charges?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-2" class="accordion-content">
                            <p>Absolutely not. Transparency is a core value at Catdump. All our quotes are comprehensive and clearly itemize every cost, including rental fees, delivery, pickup, fuel surcharges, and applicable taxes or environmental fees. What you see in your quote is what you pay.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-300">
                        <div class="accordion-header" data-accordion-toggle="faq-3">
                            How does the financing option work for large projects?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-3" class="accordion-content">
                            <p>For qualifying large-scale or long-term projects, we offer flexible financing solutions through our trusted lending partners. After receiving your quote, you can apply for financing directly through our platform. Our partners will assess your needs and offer customized payment plans to help manage your project budget effectively.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-400">
                        <div class="accordion-header" data-accordion-toggle="faq-4">
                            Can I get a custom quote for specialized equipment or long-term rentals?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-4" class="accordion-content">
                            <p>Yes, our AI system is designed to handle a wide range of requests, including specialized equipment and long-term rental needs. Simply provide detailed information through our AI chat, and we will generate a tailored quote. For highly complex or unique requirements, our sales team is also available to provide personalized assistance.</p>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-16 animate-on-scroll delay-600">
                    <a href="/Resources/FAQs.php" class="btn-secondary inline-block">View All FAQs</a>
                </div>
            </div>
        </section>

        <section class="container-box py-20 md:py-32">
            <div class="section-box text-center">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-10 animate-on-scroll">Ready for Transparent Pricing & Flexible Options?</h2>
                <p class="text-xl text-gray-700 mb-12 max-w-3xl mx-auto animate-on-scroll delay-100">
                    Get an instant, comprehensive quote and explore payment solutions that fit your project needs. Catdump simplifies your budgeting process.
                </p>
                <a href="/customer/dashboard.php" class="btn-primary inline-block shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition duration-300 animate-on-scroll delay-200">Get Your Free Quote Today!</a>
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
            const mobileResourcesDropdownButton = document.getElementById('mobile-resources-dropdown-button'); // New
            const mobileResourcesPanel = document.getElementById('mobile-resources-panel'); // New
            const mainHeader = document.getElementById('main-header');

            // Timeout variables for hover delays
            let servicesTimeout;
            let companyTimeout;
            let resourcesTimeout; // New
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