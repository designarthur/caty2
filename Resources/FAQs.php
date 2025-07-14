<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - Catdump: Quick Answers to Common Questions</title>
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
            background-image: url('https://placehold.co/1920x900/d0e9ef/1a73e8?text=FAQs+Hero');
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

        .faq-category-card {
            background-color: #ffffff;
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 2.5rem;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }
        .faq-category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }
        .faq-category-card .icon-large {
            font-size: 3.5rem;
            color: #1a73e8; /* Blue for categories */
            margin-bottom: 1.5rem;
        }
        .faq-category-card h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.75rem;
        }
        .faq-category-card p {
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
                    FAQs: <span class="text-blue-custom">Quick Answers to Your Questions</span>
                </h1>
                <p class="text-xl md:text-2xl lg:text-3xl text-gray-700 mb-12 max-w-5xl mx-auto animate-on-scroll delay-300">
                    Find solutions to common queries about Catdump's services, pricing, account management, and more. Our comprehensive FAQ section is designed to provide instant clarity.
                </p>
                <a href="#faq-categories" class="btn-primary inline-block animate-on-scroll delay-600">Browse FAQs</a>
            </div>
        </section>

        <section id="faq-categories" class="container-box py-20 md:py-32">
            <div class="section-box-alt">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-20 animate-on-scroll">Browse FAQs by Category</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <div class="faq-category-card animate-on-scroll delay-100">
                        <div class="icon-large">📦</div>
                        <h3>Rental Services</h3>
                        <p>Questions about dumpster rentals, portable toilets, storage containers, junk removal, and relocation/swap services.</p>
                        <a href="#rental-services-faqs" class="text-blue-custom hover:underline font-medium mt-4 inline-block">View Questions &rarr;</a>
                    </div>
                    <div class="faq-category-card animate-on-scroll delay-200">
                        <div class="icon-large">💳</div>
                        <h3>Pricing & Payments</h3>
                        <p>Information on how we price services, payment methods, financing options, invoices, and understanding your bill.</p>
                        <a href="#pricing-payment-faqs" class="text-blue-custom hover:underline font-medium mt-4 inline-block">View Questions &rarr;</a>
                    </div>
                    <div class="faq-category-card animate-on-scroll delay-300">
                        <div class="icon-large">⚙️</div>
                        <h3>Account & Dashboard</h3>
                        <p>Help with creating/managing your account, using the customer dashboard, tracking orders, and updating your profile.</p>
                        <a href="#account-dashboard-faqs" class="text-blue-custom hover:underline font-medium mt-4 inline-block">View Questions &rarr;</a>
                    </div>
                    <div class="faq-category-card animate-on-scroll delay-400">
                        <div class="icon-large">🚚</div>
                        <h3>Delivery & Logistics</h3>
                        <p>Questions about delivery times, site accessibility, pickup procedures, and what to do if issues arise.</p>
                        <a href="#delivery-logistics-faqs" class="text-blue-custom hover:underline font-medium mt-4 inline-block">View Questions &rarr;</a>
                    </div>
                    <div class="faq-category-card animate-on-scroll delay-500">
                        <div class="icon-large">💚</div>
                        <h3>Sustainability</h3>
                        <p>Learn about our commitment to eco-friendly practices, waste diversion efforts, and how your rental contributes to a greener future.</p>
                        <a href="#sustainability-faqs" class="text-blue-custom hover:underline font-medium mt-4 inline-block">View Questions &rarr;</a>
                    </div>
                    <div class="faq-category-card animate-on-scroll delay-600">
                        <div class="icon-large">❓</div>
                        <h3>General Questions</h3>
                        <p>Answers to broader questions about Catdump as a company, our mission, values, and how to get in touch with us.</p>
                        <a href="#general-faqs" class="text-blue-custom hover:underline font-medium mt-4 inline-block">View Questions &rarr;</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="rental-services-faqs" class="container-box py-20 md:py-32">
            <div class="section-box">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-blue-custom mb-20 animate-on-scroll">Rental Services FAQs</h2>
                <div class="max-w-3xl mx-auto">
                    <div class="accordion-item animate-on-scroll delay-100">
                        <div class="accordion-header" data-accordion-toggle="faq-rental-1">
                            How do I choose the right dumpster size for my project?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-rental-1" class="accordion-content">
                            <p>Our AI chat system is designed to help! Just tell us about your project (e.g., "bathroom demo," "full home cleanout," "new construction"), and it will suggest the ideal dumpster size. You can also refer to our <a href="/Services/Dumpster-Rentals.php" class="text-blue-custom underline">Dumpster Rental page</a> for a general guide on common project types and their matching dumpster capacities.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-200">
                        <div class="accordion-header" data-accordion-toggle="faq-rental-2">
                            How many portable toilets do I need for my event/site?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-rental-2" class="accordion-content">
                            <p>The number of units needed depends on factors like the number of attendees/workers, duration of the event/project, and presence of food/beverages. Our AI chat can provide recommendations based on industry standards, or our support team can help you calculate the optimal number for your specific needs. Visit our <a href="/Services/Temporary-Toilets.php" class="text-blue-custom underline">Temporary Toilet page</a> for more details.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-300">
                        <div class="accordion-header" data-accordion-toggle="faq-rental-3">
                            What sizes of storage containers are available?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-rental-3" class="accordion-content">
                            <p>We typically offer 10ft, 20ft, and 40ft standard containers. We also have specialized options like office/storage combo units. Our AI chat can help you determine the best size based on your storage volume and project requirements. Learn more on our <a href="/Services/Storage-Containers.php" class="text-blue-custom underline">Storage Containers page</a>.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-400">
                        <div class="accordion-header" data-accordion-toggle="faq-rental-4">
                            How accurate is the AI-powered junk removal quote?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-rental-4" class="accordion-content">
                            <p>Our AI system is highly accurate, leveraging advanced image and video recognition to assess the volume and type of junk. Quotes are typically very precise. In rare cases of significant discrepancies upon arrival, the crew will discuss any adjustments with you before proceeding, ensuring full transparency. See more on our <a href="/Services/Junk-Removal.php" class="text-blue-custom underline">Junk Removal page</a>.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-500">
                        <div class="accordion-header" data-accordion-toggle="faq-rental-5">
                            What's the difference between "relocation" and "swap" services?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-rental-5" class="accordion-content">
                            <p>A "relocation" means moving the same rental unit (e.g., dumpster, storage container) from one spot to another on the same property or job site. A "swap" means exchanging your current rental unit for a different one, usually of a different size or type, typically at the same location. Both are easily requested via your dashboard. Details on our <a href="/Services/Relocation-&-Swap.php" class="text-blue-custom underline">Relocation & Swap page</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="pricing-payment-faqs" class="container-box py-20 md:py-32">
            <div class="section-box-alt">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-blue-custom mb-20 animate-on-scroll">Pricing & Payments FAQs</h2>
                <div class="max-w-3xl mx-auto">
                    <div class="accordion-item animate-on-scroll delay-100">
                        <div class="accordion-header" data-accordion-toggle="faq-pricing-1">
                            How does Catdump ensure I get the best price?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-pricing-1" class="accordion-content">
                            <p>Our platform connects you with a broad network of vetted local suppliers. When you request a quote, these suppliers compete to offer you the best pricing. Our AI further optimizes this by considering real-time market data and availability, ensuring you receive the most competitive offer available. More on our <a href="/Resources/Pricing-Finance.php" class="text-blue-custom underline">Pricing & Finance page</a>.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-200">
                        <div class="accordion-header" data-accordion-toggle="faq-pricing-2">
                            Are there any hidden fees or charges?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-pricing-2" class="accordion-content">
                            <p>Absolutely not. Transparency is a core value at Catdump. All our quotes are comprehensive and clearly itemize every cost, including rental fees, delivery, pickup, fuel surcharges, and applicable taxes or environmental fees. What you see in your quote is what you pay. Our <a href="/Resources/Pricing-Finance.php" class="text-blue-custom underline">Pricing & Finance page</a> has more details.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-300">
                        <div class="accordion-header" data-accordion-toggle="faq-pricing-3">
                            How does the financing option work for large projects?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-pricing-3" class="accordion-content">
                            <p>For qualifying large-scale or long-term projects, we offer flexible financing solutions through our trusted lending partners. After receiving your quote, you can apply for financing directly through our platform. Our partners will assess your needs and offer customized payment plans to help manage your project budget effectively. Find out more on our <a href="/Resources/Pricing-Finance.php" class="text-blue-custom underline">Pricing & Finance page</a>.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-400">
                        <div class="accordion-header" data-accordion-toggle="faq-pricing-4">
                            What payment methods do you accept?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-pricing-4" class="accordion-content">
                            <p>We accept all major credit cards (Visa, MasterCard, American Express, Discover) and ACH bank transfers for secure online payments. You can manage your payment methods and view invoices directly from your customer dashboard.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="account-dashboard-faqs" class="container-box py-20 md:py-32">
            <div class="section-box">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-blue-custom mb-20 animate-on-scroll">Account & Dashboard FAQs</h2>
                <div class="max-w-3xl mx-auto">
                    <div class="accordion-item animate-on-scroll delay-100">
                        <div class="accordion-header" data-accordion-toggle="faq-account-1">
                            How do I create a Catdump account?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-account-1" class="accordion-content">
                            <p>You can create an account by clicking "Sign Up" in the header or by proceeding with a quote. Your account will be automatically set up when you accept your first quote and provide your details, or you can create one directly on the <a href="/customer/login.php" class="text-blue-custom underline">login/signup page</a>.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-200">
                        <div class="accordion-header" data-accordion-toggle="faq-account-2">
                            Can I manage all my rentals from one place?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-account-2" class="accordion-content">
                            <p>Yes! Our <a href="/customer/dashboard.php" class="text-blue-custom underline">customer dashboard</a> provides a centralized hub where you can track active rentals, view past orders, manage invoices, schedule extensions or pickups, and communicate directly with suppliers.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-300">
                        <div class="accordion-header" data-accordion-toggle="faq-account-3">
                            How do I update my profile information or change my password?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-account-3" class="accordion-content">
                            <p>You can easily update your profile details and change your password by logging into your <a href="/customer/dashboard.php" class="text-blue-custom underline">customer dashboard</a> and navigating to the 'Profile' or 'Account Settings' section.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-400">
                        <div class="accordion-header" data-accordion-toggle="faq-account-4">
                            Is my personal and payment information secure?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-account-4" class="accordion-content">
                            <p>Absolutely. We use industry-standard encryption and security protocols to protect your personal and payment information. All transactions are processed through secure gateways, ensuring your data is safe. Please review our <a href="/PrivacyPolicy.html" class="text-blue-custom underline">Privacy Policy</a> for more details.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="delivery-logistics-faqs" class="container-box py-20 md:py-32">
            <div class="section-box-alt">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-blue-custom mb-20 animate-on-scroll">Delivery & Logistics FAQs</h2>
                <div class="max-w-3xl mx-auto">
                    <div class="accordion-item animate-on-scroll delay-100">
                        <div class="accordion-header" data-accordion-toggle="faq-delivery-1">
                            How quickly can equipment be delivered?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-delivery-1" class="accordion-content">
                            <p>Delivery times depend on equipment availability and your location. Many of our partners offer same-day or next-day delivery. You'll see estimated delivery times when you select your quote, and our AI chat can provide real-time availability based on your needs.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-200">
                        <div class="accordion-header" data-accordion-toggle="faq-delivery-2">
                            Can I track my equipment delivery?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-delivery-2" class="accordion-content">
                            <p>Yes, for partners who support live tracking, you will see real-time updates of your equipment's delivery status directly on your Catdump dashboard. If live tracking isn't available, the driver will contact you directly with timely notifications and updates.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-300">
                        <div class="accordion-header" data-accordion-toggle="faq-delivery-3">
                            What are the site requirements for delivery?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-delivery-3" class="accordion-content">
                            <p>Ensure there is clear, unobstructed access for the delivery vehicle to safely maneuver and place the equipment. The drop-off location should be level and able to support the weight of the equipment and its contents. Specific requirements may vary by equipment type (e.g., dumpster, storage container).</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-400">
                        <div class="accordion-header" data-accordion-toggle="faq-delivery-4">
                            How does pickup work after my rental period ends?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-delivery-4" class="accordion-content">
                            <p>Simply notify us through your dashboard when your rental period is complete or when the equipment is ready for pickup. Our supplier will then arrange a timely removal. Ensure the equipment is accessible and cleared of any obstructions for pickup.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="sustainability-faqs" class="container-box py-20 md:py-32">
            <div class="section-box">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-blue-custom mb-20 animate-on-scroll">Sustainability FAQs</h2>
                <div class="max-w-3xl mx-auto">
                    <div class="accordion-item animate-on-scroll delay-100">
                        <div class="accordion-header" data-accordion-toggle="faq-sustain-1">
                            How does Catdump contribute to sustainability?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-sustain-1" class="accordion-content">
                            <p>We promote sustainability by optimizing equipment utilization (reducing new manufacturing), facilitating waste diversion and recycling through our junk removal/dumpster services, optimizing logistics to reduce emissions, partnering with eco-friendly suppliers, and adopting a digital-first approach to minimize paper waste. Learn more on our <a href="/Company/Sustainability.php" class="text-blue-custom underline">Sustainability page</a>.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-200">
                        <div class="accordion-header" data-accordion-toggle="faq-sustain-2">
                            What is your waste diversion target for junk removal?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-sustain-2" class="accordion-content">
                            <p>Our goal is to achieve an 80% waste diversion rate for junk removal projects, meaning 80% of the collected waste is recycled or donated rather than sent to landfills. We continuously work with our partners to improve these figures. Details on our <a href="/Services/Junk-Removal.php" class="text-blue-custom underline">Junk Removal page</a>.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-300">
                        <div class="accordion-header" data-accordion-toggle="faq-sustain-3">
                            How can I contribute to sustainability through Catdump?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-sustain-3" class="accordion-content">
                            <p>You can contribute by choosing right-sized equipment, segregating waste for recycling whenever possible, and promptly scheduling pickups. These actions help optimize logistics and maximize waste diversion. Our <a href="/Company/Sustainability.php" class="text-blue-custom underline">Sustainability page</a> offers more tips.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="general-faqs" class="container-box py-20 md:py-32">
            <div class="section-box-alt">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-blue-custom mb-20 animate-on-scroll">General Questions</h2>
                <div class="max-w-3xl mx-auto">
                    <div class="accordion-item animate-on-scroll delay-100">
                        <div class="accordion-header" data-accordion-toggle="faq-general-1">
                            What types of equipment can I rent through Catdump?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-general-1" class="accordion-content">
                            <p>Catdump specializes in essential equipment for construction, demolition, and events, including a wide range of dumpster sizes, various types of portable toilets, secure on-site storage containers, and comprehensive junk removal services. We also offer flexible relocation and swap services for existing rentals. Explore all our <a href="/index.php#services-section" class="text-blue-custom underline">services</a>.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-200">
                        <div class="accordion-header" data-accordion-toggle="faq-general-2">
                            How does Catdump differ from traditional rental companies?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-general-2" class="accordion-content">
                            <p>Catdump is an AI-powered marketplace that connects you directly with a network of local suppliers, ensuring competitive pricing and instant quotes. Our digital platform streamlines the entire process, offering transparency, real-time tracking, and efficient management from your dashboard, unlike traditional, often manual rental processes. Learn more about <a href="/How-it-works.php" class="text-blue-custom underline">how we work</a>.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-300">
                        <div class="accordion-header" data-accordion-toggle="faq-general-3">
                            Is Catdump available in my area?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-general-3" class="accordion-content">
                            <p>Catdump serves a growing number of cities across the USA and is expanding globally. To check if we are available in your specific location, simply start a quote request with our AI assistant on the homepage, or contact our sales team. We're continuously adding new service areas.</p>
                        </div>
                    </div>
                    <div class="accordion-item animate-on-scroll delay-400">
                        <div class="accordion-header" data-accordion-toggle="faq-general-4">
                            How can I provide feedback or submit a testimonial?
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <div id="faq-general-4" class="accordion-content">
                            <p>We love hearing from our customers! You can submit a testimonial directly through our <a href="/Company/Testimonials.php" class="text-blue-custom underline">Testimonials page</a>, or provide feedback by contacting our support team via the <a href="/Resources/Contact.php" class="text-blue-custom underline">Contact Us page</a>. Your input helps us improve.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-box py-20 md:py-32">
            <div class="section-box text-center">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-10 animate-on-scroll">Still Have Questions? We're Here to Help!</h2>
                <p class="text-xl text-gray-700 mb-12 max-w-3xl mx-auto animate-on-scroll delay-100">
                    If you couldn't find the answer you were looking for in our FAQs, our dedicated support team is ready to provide personalized assistance.
                </p>
                <a href="/Resources/Contact.php" class="btn-primary inline-block shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition duration-300 animate-on-scroll delay-200">Contact Our Support Team</a>
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