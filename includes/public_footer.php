<footer class="bg-gray-900 text-gray-300 py-20">
    <div class="container-box grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-12 text-center md:text-left">
        <div class="col-span-1 md:col-span-2 lg:col-span-1 flex flex-col items-center md:items-start">
            <div class="flex items-center mb-5">
                <img src="/assets/images/logo.png" alt="Catdump Logo" class="h-16 w-16 mr-4 rounded-full shadow-md">
                <div class="text-5xl font-extrabold text-blue-custom">Catdump</div>
            </div>
            <p class="leading-relaxed text-gray-400">Your premier marketplace for fast, easy, and affordable equipment rentals. We connect you with the best local deals for dumpsters, temporary toilets, storage, and heavy machinery, ensuring your projects run smoothly and efficiently.</p>
        </div>

        <div>
            <h3 class="text-xl font-bold text-white mb-6">Quick Links</h3>
            <ul class="space-y-4">
                <li><a href="/index.php" class="hover:text-blue-custom transition duration-200">Home</a></li>
                <li><a href="/How-it-works.php" class="hover:text-blue-custom transition duration-200">How It Works</a></li>
                <li><a href="/Services/Dumpster-Rentals.php" class="hover:text-blue-custom transition duration-200">Equipment Rentals</a></li>
                <li><a href="/Resources/Blog.php" class="hover:text-blue-custom transition duration-200">Blog/News</a></li>
                <li><a href="/Resources/Customer-Resources.php" class="hover:text-blue-custom transition duration-200">Customer Resources</a></li>
                <li><a href="/Resources/Pricing-Finance.php" class="hover:text-blue-custom transition duration-200">Pricing & Finance</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-xl font-bold text-white mb-6">Company</h3>
            <ul class="space-y-4">
                <li><a href="/Company/About-Us.php" class="hover:text-blue-custom transition duration-200">About Us</a></li>
                <li><a href="/Company/Sustainability.php" class="hover:text-blue-custom transition duration-200">Sustainability</a></li>
                <li><a href="/Company/Testimonials.php" class="hover:text-blue-custom transition duration-200">Testimonials</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-xl font-bold text-white mb-6">Services</h3>
            <ul class="space-y-4">
                <li><a href="/Services/Dumpster-Rentals.php" class="hover:text-blue-custom transition duration-200">Dumpster Rentals</a></li>
                <li><a href="/Services/Temporary-Toilets.php" class="hover:text-blue-custom transition duration-200">Temporary Toilets</a></li>
                <li><a href="/Services/Storage-Containers.php" class="hover:text-blue-custom transition duration-200">Storage Containers</a></li>
                <li><a href="/Services/Junk-Removal.php" class="hover:text-blue-custom transition duration-200">Junk Removal</a></li>
                <li><a href="/Services/Relocation-Swap.php" class="hover:text-blue-custom transition duration-200">Relocation & Swap</a></li>
            </ul>
        </div>
    </div>
    <div class="container-box text-center mt-20 pt-10 border-t border-gray-800">
        <p class="text-gray-400">&copy; 2025 Catdump. All rights reserved.</p>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation on scroll elements
        const animateOnScrollElements = document.querySelectorAll('.animate-on-scroll');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const delay = parseFloat(getComputedStyle(entry.target).transitionDelay || 0);
                    if (delay > 0) {
                        setTimeout(() => {
                            entry.target.classList.add('is-visible');
                        }, delay * 1000);
                    } else {
                        entry.target.classList.add('is-visible');
                    }
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        animateOnScrollElements.forEach(element => {
            observer.observe(element);
        });

        // Hero section parallax effect (if present on the page)
        const heroSection = document.getElementById('hero-section');
        if (heroSection) {
            window.addEventListener('scroll', () => {
                const scrollPosition = window.pageYOffset;
                heroSection.style.backgroundPositionY = -scrollPosition * 0.3 + 'px';
            });
        }

        // Accordion functionality (if present on the page)
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