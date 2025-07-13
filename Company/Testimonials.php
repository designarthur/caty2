<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonials - Catdump: Hear From Our Happy Customers</title>
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
            background-image: url('https://placehold.co/1920x900/e0e7f7/1a73e8?text=Testimonials+Hero');
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
        .featured-testimonial-card {
            background-color: #1a73e8; /* Blue background for featured */
            color: white;
            border-radius: 1.5rem;
            padding: 3rem;
            box-shadow: 0 15px 40px rgba(26, 115, 232, 0.3);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .featured-testimonial-card .testimonial-quote {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.5rem; /* Larger font for featured */
        }
        .featured-testimonial-card .testimonial-author {
            color: white;
            font-size: 1.1rem;
        }
        .featured-testimonial-card .testimonial-source {
            color: rgba(255, 255, 255, 0.7);
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

        .theme-card {
            background-color: #ffffff;
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 2.5rem;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }
        .theme-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }
        .theme-card .icon-large {
            font-size: 3.5rem;
            color: #1a73e8; /* Blue for themes */
            margin-bottom: 1.5rem;
        }
        .theme-card h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.75rem;
        }
        .theme-card p {
            font-size: 1rem;
            line-height: 1.6;
            color: #4a5568;
        }
        .customer-photo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
            border: 3px solid #eef2f6;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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
                    <a href="#" class="flex items-center justify-center text-blue-custom font-bold" data-dropdown-toggle="mobile-company-dropdown">
                        Company
                        <svg data-dropdown-arrow="mobile-company-dropdown" class="w-6 h-6 ml-2 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <div id="mobile-company-dropdown" class="mobile-dropdown-content text-gray-700 flex flex-col items-center open">
                        <a href="about-us.html">About Us</a>
                        <a href="#">Careers</a>
                        <a href="#">Press/Media</a>
                        <a href="sustainability.html">Sustainability</a>
                        <a href="#" class="font-bold text-blue-custom">Testimonials</a>
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
                    Hear From Our Happy Customers: <span class="text-blue-custom">Catdump Success Stories</span>
                </h1>
                <p class="text-xl md:text-2xl lg:text-3xl text-gray-700 mb-12 max-w-5xl mx-auto animate-on-scroll delay-300">
                    Don't just take our word for it. Explore real experiences from clients who've streamlined their projects and achieved excellence with Catdump's intuitive platform and reliable services.
                </p>
                <a href="#submit-testimonial" class="btn-primary inline-block animate-on-scroll delay-600">Submit Your Testimonial!</a>
            </div>
        </section>

        <section class="container-box py-20 md:py-32">
            <div class="section-box-alt">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-20 animate-on-scroll">Featured Stories That Inspire</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <div class="featured-testimonial-card animate-on-scroll delay-100">
                        <p class="testimonial-quote">"Catdump revolutionized how we approach equipment rentals. The AI system is unbelievably accurate for quotes, and being able to manage everything from one dashboard has saved us countless hours. Unparalleled service and transparency!"</p>
                        <div class="text-right">
                            <p class="testimonial-author">- Sarah L.</p>
                            <p class="testimonial-source">Construction Manager, Apex Builds</p>
                        </div>
                    </div>
                    <div class="featured-testimonial-card animate-on-scroll delay-200">
                        <p class="testimonial-quote">"As an event coordinator, finding reliable temporary toilets and knowing they'll be serviced on schedule is paramount. Catdump's platform made it effortless, and their commitment to cleanliness truly impressed our guests. A top-tier solution!"</p>
                        <div class="text-right">
                            <p class="testimonial-author">- Mark T.</p>
                            <p class="testimonial-source">Event Coordinator, Elite Events Solutions</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-box py-20 md:py-32">
            <div class="section-box">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-20 animate-on-scroll">All Customer Testimonials</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                    <div class="testimonial-card animate-on-scroll delay-100">
                        <img src="https://placehold.co/80x80/eef2f6/1a73e8?text=DL" alt="Customer Photo" class="customer-photo mx-auto">
                        <p class="testimonial-quote">"Renting a dumpster for our home renovation was a breeze with Catdump. Their AI helped us pick the perfect size, and the delivery was exactly on time. Highly efficient!"</p>
                        <p class="testimonial-author">- David M.</p>
                        <p class="testimonial-source">Homeowner, Dumpster Rental</p>
                    </div>
                    <div class="testimonial-card animate-on-scroll delay-200">
                        <img src="https://placehold.co/80x80/eef2f6/34a853?text=ER" alt="Customer Photo" class="customer-photo mx-auto">
                        <p class="testimonial-quote">"We always need reliable dumpsters for our construction sites. Catdump's platform provides the best local prices instantly, saving us significant time and money on every project."</p>
                        <p class="testimonial-author">- Emily R.</p>
                        <p class="testimonial-source">Site Manager, Dumpster Rental</p>
                    </div>
                    <div class="testimonial-card animate-on-scroll delay-300">
                        <img src="https://placehold.co/80x80/eef2f6/1a73e8?text=LK" alt="Customer Photo" class="customer-photo mx-auto">
                        <p class="testimonial-quote">"Catdump's portable toilets were a game-changer for our outdoor concerts. Clean, well-maintained, and delivered on time. Our attendees truly appreciated the quality!"</p>
                        <p class="testimonial-author">- Lisa K.</p>
                        <p class="testimonial-source">Event Organizer, Portable Toilet Rental</p>
                    </div>
                    <div class="testimonial-card animate-on-scroll delay-400">
                        <img src="https://placehold.co/80x80/eef2f6/34a853?text=RS" alt="Customer Photo" class="customer-photo mx-auto">
                        <p class="testimonial-quote">"For our construction site, reliable sanitation is crucial. Catdump's quick delivery and consistent servicing meant our crew always had clean facilities. Excellent service!"</p>
                        <p class="testimonial-author">- Robert S.</p>
                        <p class="testimonial-source">Construction Foreman, Portable Toilet Rental</p>
                    </div>
                    <div class="testimonial-card animate-on-scroll delay-500">
                        <img src="https://placehold.co/80x80/eef2f6/1a73e8?text=JD" alt="Customer Photo" class="customer-photo mx-auto">
                        <p class="testimonial-quote">"Getting a storage container for our renovation was incredibly easy. The unit was delivered quickly, very secure, and perfect for keeping our tools safe on site."</p>
                        <p class="testimonial-author">- John D.</p>
                        <p class="testimonial-source">Construction Foreman, Storage Container Rental</p>
                    </div>
                    <div class="testimonial-card animate-on-scroll delay-600">
                        <img src="https://placehold.co/80x80/eef2f6/34a853?text=SP" alt="Customer Photo" class="customer-photo mx-auto">
                        <p class="testimonial-quote">"We needed temporary storage during our office move. Catdump provided a secure container exactly when we needed it, and the process was so much simpler than other rental companies."</p>
                        <p class="testimonial-author">- Sarah P.</p>
                        <p class="testimonial-source">Office Manager, Storage Container Rental</p>
                    </div>
                    <div class="testimonial-card animate-on-scroll delay-700">
                        <img src="https://placehold.co/80x80/eef2f6/1a73e8?text=JR" alt="Customer Photo" class="customer-photo mx-auto">
                        <p class="testimonial-quote">"The AI quoting system for junk removal is genius! I snapped a few photos, got an instant price, and they picked up everything the next day. So simple and fair."</p>
                        <p class="testimonial-author">- Jessica R.</p>
                        <p class="testimonial-source">Homeowner, Junk Removal</p>
                    </div>
                    <div class="testimonial-card animate-on-scroll delay-800">
                        <img src="https://placehold.co/80x80/eef2f6/34a853?text=MT" alt="Customer Photo" class="customer-photo mx-auto">
                        <p class="testimonial-quote">"We had a pile of construction debris that needed to go. Catdump's service was fast, efficient, and their crew was incredibly professional. Highly recommend for any cleanup job."</p>
                        <p class="testimonial-author">- Mark T.</p>
                        <p class="testimonial-source">Contractor, Junk Removal</p>
                    </div>
                    <div class="testimonial-card animate-on-scroll delay-900">
                        <img src="https://placehold.co/80x80/eef2f6/1a73e8?text=AG" alt="Customer Photo" class="customer-photo mx-auto">
                        <p class="testimonial-quote">"Our renovation hit a snag, and we needed our dumpster for an extra week. Extending it through Catdump's dashboard was incredibly easy, literally a few clicks!"</p>
                        <p class="testimonial-author">- Alex G.</p>
                        <p class="testimonial-source">Homeowner, Rental Extension</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-box py-20 md:py-32">
            <div class="section-box-alt">
                <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-20 animate-on-scroll">Why Our Customers Consistently Choose Catdump</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <div class="theme-card animate-on-scroll delay-100">
                        <div class="icon-large">⚡</div>
                        <h3>Speed & Efficiency</h3>
                        <p>Customers consistently praise our platform for its ability to provide instant quotes and quick service, saving them valuable time on every project.</p>
                    </div>
                    <div class="theme-card animate-on-scroll delay-200">
                        <div class="icon-large">💰</div>
                        <h3>Transparent Pricing</h3>
                        <p>Our commitment to upfront, competitive pricing is a recurring theme, ensuring customers feel confident they're getting the best deal without hidden costs.</p>
                    </div>
                    <div class="theme-card animate-on-scroll delay-300">
                        <div class="icon-large">🤝</div>
                        <h3>Exceptional Support</h3>
                        <p>From AI chat assistance to dedicated customer service, clients appreciate the responsive and helpful support they receive throughout their rental journey.</p>
                    </div>
                    <div class="theme-card animate-on-scroll delay-400">
                        <div class="icon-large">✅</div>
                        <h3>Reliability You Can Trust</h3>
                        <p>Our vetted network of suppliers consistently delivers on time and provides well-maintained equipment, leading to dependable and smooth operations.</p>
                    </div>
                    <div class="theme-card animate-on-scroll delay-500">
                        <div class="icon-large">✨</div>
                        <h3>Unbeatable Ease of Use</h3>
                        <p>The intuitive platform, especially the AI-powered booking and dashboard management, makes the entire rental process incredibly simple and stress-free.</p>
                    </div>
                    <div class="theme-card animate-on-scroll delay-600">
                        <div class="icon-large">💡</div>
                        <h3>Solutions for Every Need</h3>
                        <p>Whether it's a specific dumpster size, flexible rental terms, or complex junk removal, customers value our comprehensive and adaptable service offerings.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="submit-testimonial" class="container-box py-20 md:py-32">
            <div class="section-box-alt text-center">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-10 animate-on-scroll">Share Your Catdump Experience!</h2>
                <p class="text-xl text-gray-700 mb-12 max-w-3xl mx-auto animate-on-scroll delay-100">
                    Did Catdump help you streamline your project or simplify your rental needs? We'd love to hear your success story! Your feedback helps us grow and inspires others.
                </p>
                <a href="#" class="btn-primary inline-block shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition duration-300 animate-on-scroll delay-200">Write Your Review Now!</a>
                <p class="text-gray-600 text-lg mt-8 animate-on-scroll delay-300">
                    (Alternatively, you can contact our support team to provide feedback.)
                </p>
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

            // Counter animation for stats section (if applicable)
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