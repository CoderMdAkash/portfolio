// ==========================================
// Portfolio Website JavaScript
// AJAX handles Services & Projects (Portfolios)
// Includes instant fallback for file:// protocol
// ==========================================

const DEFAULT_SERVICES = [
  {
    "id": 1,
    "title": "Full-Stack Web Development",
    "icon": "fa-solid fa-code",
    "summary": "Custom web application development using Laravel, PHP, MySQL, and modern JavaScript frameworks.",
    "details": "We build scalable, secure, and fast enterprise web applications tailored to your business goals. From database schema design to RESTful APIs and modern frontend interfaces, everything is engineered for high performance.",
    "features": [
      "Custom RESTful APIs & MVC Architecture",
      "Secure Database Design & Query Optimization",
      "Admin Panel & Role-based Authentication",
      "Post-Launch Maintenance & Support"
    ],
    "price": "$299"
  },
  {
    "id": 2,
    "title": "UI/UX & Frontend Design",
    "icon": "fa-solid fa-laptop-code",
    "summary": "Creating highly dynamic, responsive, and pixel-perfect UI layouts using HTML5, Tailwind CSS, & Alpine.js.",
    "details": "Crafting visually stunning, modern, and user-centric interfaces. We ensure seamless micro-animations, glassmorphism design systems, and mobile-first responsiveness across all device viewports.",
    "features": [
      "Mobile-First Responsive Layouts",
      "Interactive Micro-Animations & Carousels",
      "W3C Valid & Accessibility Ready Code",
      "Figma to HTML/CSS Conversion"
    ],
    "price": "$199"
  },
  {
    "id": 3,
    "title": "E-Commerce Solutions",
    "icon": "fa-solid fa-cart-shopping",
    "summary": "Building powerful online shopping experiences with payment gateway integrations and inventory tools.",
    "details": "Complete digital storefront development equipped with dynamic product catalogs, multi-currency support, shopping cart flows, customer accounts, and secure checkout processing.",
    "features": [
      "Shopping Cart & Checkout Flow",
      "Stripe, PayPal & Local Payment Integration",
      "Order, Inventory & Product Management",
      "SEO Optimization for E-Commerce"
    ],
    "price": "$399"
  },
  {
    "id": 4,
    "title": "API Integration & Bug Fixing",
    "icon": "fa-solid fa-screwdriver-wrench",
    "summary": "Integrating 3rd party APIs, optimizing existing PHP/Laravel code, and troubleshooting site bugs.",
    "details": "Rapid troubleshooting, legacy codebase refactoring, security audits, and seamless third-party API integrations (Payment gateways, CRM, Social Login, Cloud Storage).",
    "features": [
      "Third-Party Service Integration",
      "Database Query & Speed Optimization",
      "Security Audits & Patch Updates",
      "Cross-Browser Compatibility Fixes"
    ],
    "price": "$149"
  }
];

const DEFAULT_PORTFOLIOS = [
  {
    "id": 1,
    "title": "Enterprise E-Commerce Platform",
    "category": "Web Application",
    "image": "images/portfolio/card-1.png",
    "short_description": "A high-performance online shop built with Laravel, Alpine.js & Tailwind CSS.",
    "full_description": "This project is a feature-rich e-commerce store supporting multi-currency transactions, customer order management, inventory management, dynamic product filters, and instant payment gateway integration. Fully optimized for speed and SEO performance.",
    "client": "RetailGlobal Corp",
    "duration": "2 Months",
    "tools": ["Laravel", "Tailwind CSS", "Alpine.js", "MySQL", "Stripe API"],
    "live_url": "#"
  },
  {
    "id": 2,
    "title": "SaaS Dashboard & Analytics Hub",
    "category": "Dashboard",
    "image": "images/portfolio/card-2.png",
    "short_description": "Interactive data visualization dashboard with real-time charts and reporting.",
    "full_description": "Designed and implemented an admin metrics panel for SaaS application metrics, tracking active subscribers, user retention, daily active users, and revenue benchmarks.",
    "client": "DataMetrics Inc",
    "duration": "1 Month",
    "tools": ["Chart.js", "Tailwind CSS", "Laravel REST API", "VueJS"],
    "live_url": "#"
  },
  {
    "id": 3,
    "title": "Healthcare Mobile Web App",
    "category": "Mobile UI/UX",
    "image": "images/portfolio/card-3.png",
    "short_description": "Patient portal for booking doctor appointments and viewing medical history.",
    "full_description": "A responsive healthcare application providing seamless doctor search, appointment scheduling, digital prescription downloads, and tele-consultation booking.",
    "client": "HealthCare Plus",
    "duration": "3 Weeks",
    "tools": ["HTML5", "CSS3", "JavaScript", "Swiper JS", "Bootstrap"],
    "live_url": "#"
  },
  {
    "id": 4,
    "title": "Corporate Real Estate Portal",
    "category": "Web Application",
    "image": "images/portfolio/card-4.png",
    "short_description": "Property listing website with interactive maps and filterable options.",
    "full_description": "Developed a real estate search engine enabling users to browse commercial and residential properties with virtual tours, location maps, and agent contact forms.",
    "client": "Prime Properties Ltd",
    "duration": "1.5 Months",
    "tools": ["Laravel", "Leaflet Maps API", "Tailwind CSS", "MySQL"],
    "live_url": "#"
  }
];

document.addEventListener('DOMContentLoaded', function () {
    startLiveClock();
    setupMobileMenu();
    initHeroSlider();
    initTestimonialSlider();
    loadServicesData();
    loadPortfoliosData();
});

// 1. System Live Clock
function startLiveClock() {
    let clockElement = document.getElementById('live-datetime');
    if (!clockElement) return;

    function updateClock() {
        let now = new Date();
        clockElement.innerText = now.toLocaleString();
    }
    updateClock();
    setInterval(updateClock, 1000);
}

// 2. Mobile Menu Handler
function setupMobileMenu() {
    let menuBtn = document.getElementById('mobile-menu-btn');
    let mobileMenu = document.getElementById('mobile-menu');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    }
}

// 3. Hero Banner Swiper Slider Initializer
function initHeroSlider() {
    let sliderEl = document.querySelector('.heroBannerSlider');
    if (sliderEl && typeof Swiper !== 'undefined') {
        new Swiper('.heroBannerSlider', {
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.hero-next',
                prevEl: '.hero-prev',
            },
        });
    }
}

// 3b. Testimonial Swiper Slider Initializer
function initTestimonialSlider() {
    let sliderEl = document.querySelector('.testimonialSlider');
    if (sliderEl && typeof Swiper !== 'undefined') {
        new Swiper('.testimonialSlider', {
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
            },
            slidesPerView: 1,
            spaceBetween: 24,
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 24,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                }
            },
            navigation: {
                nextEl: '.testimonial-next',
                prevEl: '.testimonial-prev',
            },
        });
    }
}

// 3. Helper Function to Fetch JSON with Instant Fallback
async function fetchJson(fileName) {
    let paths = ['data/' + fileName, './data/' + fileName, '../data/' + fileName, '/data/' + fileName];
    for (let i = 0; i < paths.length; i++) {
        try {
            let res = await fetch(paths[i]);
            if (res.ok) {
                let data = await res.json();
                if (data && data.length > 0) return data;
            }
        } catch (e) {
            // Next path
        }
    }
    // Fallback if fetch fails or is blocked by file://
    if (fileName === 'services.json') return DEFAULT_SERVICES;
    if (fileName === 'portfolios.json') return DEFAULT_PORTFOLIOS;
    return null;
}

// 4. Load Services via AJAX (services.json)
async function loadServicesData() {
    let services = await fetchJson('services.json');
    if (!services) return;

    // Home Page Services Grid
    let homeGrid = document.getElementById('home-services-grid');
    if (homeGrid) {
        let html = '';
        for (let i = 0; i < services.length && i < 4; i++) {
            let s = services[i];
            html += `
                <div class="bg-white p-5 rounded-lg border border-gray-200 shadow-sm hover:border-purple-500 transition cursor-pointer space-y-3" onclick="openServiceModal(${s.id})">
                    <div class="flex justify-between items-start">
                        <h3 class="text-base font-bold text-gray-900">${s.title}</h3>
                        <span class="text-xs font-bold text-purple-600">${s.price}</span>
                    </div>
                    <p class="text-gray-600 text-xs leading-relaxed">${s.summary}</p>
                    <div class="pt-2 text-xs font-semibold text-purple-600 flex items-center gap-1">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </div>
                </div>
            `;
        }
        homeGrid.innerHTML = html;
    }

    // Services Page Grid
    let pageGrid = document.getElementById('services-page-grid');
    if (pageGrid) {
        let html = '';
        for (let i = 0; i < services.length; i++) {
            let s = services[i];
            html += `
                <div class="bg-white p-5 rounded-lg border border-gray-200 shadow-sm hover:border-purple-500 transition cursor-pointer space-y-3" onclick="openServiceModal(${s.id})">
                    <div class="flex justify-between items-start">
                        <h3 class="text-base font-bold text-gray-900">${s.title}</h3>
                        <span class="text-xs font-bold text-purple-600">${s.price}</span>
                    </div>
                    <p class="text-gray-600 text-xs leading-relaxed">${s.summary}</p>
                    <div class="pt-2 text-xs font-semibold text-purple-600 flex items-center gap-1">
                        <span>View Details</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </div>
                </div>
            `;
        }
        pageGrid.innerHTML = html;
    }
}

// 5. Load Portfolios (Projects) via AJAX (portfolios.json)
async function loadPortfoliosData() {
    let portfolios = await fetchJson('portfolios.json');
    if (!portfolios) return;

    // Home Page Portfolio Grid
    let homeGrid = document.getElementById('home-portfolio-grid');
    if (homeGrid) {
        let html = '';
        for (let i = 0; i < portfolios.length && i < 3; i++) {
            let p = portfolios[i];
            html += `
                <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all">
                    <img src="${p.image}" alt="${p.title}" class="w-full h-48 object-cover">
                    <div class="p-6 space-y-3">
                        <span class="text-xs font-semibold px-3 py-1 bg-purple-100 text-purple-700 rounded-full">${p.category}</span>
                        <h3 class="text-lg font-bold text-gray-900">
                            <a href="portfolio-details.html?id=${p.id}">${p.title}</a>
                        </h3>
                        <p class="text-gray-600 text-xs">${p.short_description}</p>
                    </div>
                </div>
            `;
        }
        homeGrid.innerHTML = html;
    }

    // Portfolio Showcase Page Grid
    let showcaseGrid = document.getElementById('portfolio-showcase-grid');
    if (showcaseGrid) {
        let html = '';
        for (let i = 0; i < portfolios.length; i++) {
            let p = portfolios[i];
            html += `
                <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm p-6 space-y-4">
                    <img src="${p.image}" class="w-full h-48 object-cover rounded-2xl">
                    <span class="text-xs font-semibold px-3 py-1 bg-purple-100 text-purple-700 rounded-full">${p.category}</span>
                    <h3 class="text-xl font-bold text-gray-900">${p.title}</h3>
                    <p class="text-gray-600 text-xs">${p.short_description}</p>
                    <a href="portfolio-details.html?id=${p.id}" class="btn-primary-custom text-xs py-2 px-4 inline-block">View Details</a>
                </div>
            `;
        }
        showcaseGrid.innerHTML = html;
    }

    // Portfolio Details Page Loader
    let titleEl = document.getElementById('proj-title');
    if (titleEl) {
        let urlParams = new URLSearchParams(window.location.search);
        let id = parseInt(urlParams.get('id')) || 1;

        let item = null;
        for (let i = 0; i < portfolios.length; i++) {
            if (portfolios[i].id === id) {
                item = portfolios[i];
                break;
            }
        }
        if (!item) item = portfolios[0];

        let catEl = document.getElementById('proj-category');
        let imgEl = document.getElementById('proj-image');
        let descEl = document.getElementById('proj-desc');

        titleEl.textContent = item.title;
        if (catEl) catEl.textContent = item.category;
        if (imgEl && item.image) imgEl.src = item.image;
        if (descEl) descEl.textContent = item.full_description || item.short_description;
    }
}

// 6. Service Modal Handler (Ultra Simple Design)
async function openServiceModal(serviceId) {
    let services = await fetchJson('services.json');
    if (!services) return;

    let service = null;
    for (let i = 0; i < services.length; i++) {
        if (services[i].id === serviceId) {
            service = services[i];
            break;
        }
    }
    if (!service) return;

    let modal = document.getElementById('service-modal');
    if (!modal) {
        modal = document.createElement('div');
        modal.id = 'service-modal';
        modal.className = 'hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4';
        modal.innerHTML = `
            <div class="bg-white rounded-lg border border-gray-300 max-w-sm w-full p-5 shadow-lg relative">
                <button onclick="closeServiceModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-base focus:outline-none" aria-label="Close modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <div class="mb-3 border-b border-gray-100 pb-3">
                    <h3 id="modal-service-title" class="text-base font-bold text-gray-900">Service Title</h3>
                    <div id="modal-service-price" class="text-sm font-bold text-purple-600 mt-0.5">$299</div>
                </div>
                <div class="space-y-3 text-xs text-gray-600 mb-5">
                    <p id="modal-service-details" class="leading-relaxed">Description</p>
                    <div id="modal-service-features-wrap" class="hidden pt-2 border-t border-gray-100">
                        <div class="font-bold text-gray-800 mb-1">Key Features:</div>
                        <ul id="modal-service-features" class="space-y-1 pl-1"></ul>
                    </div>
                </div>
                <div class="flex gap-2">
                    <a href="contact.html" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white font-medium text-xs py-2 px-3 rounded text-center">
                        Order Now
                    </a>
                    <button onclick="closeServiceModal()" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium text-xs py-2 px-3 rounded cursor-pointer">
                        Close
                    </button>
                </div>
            </div>
        `;
        document.body.appendChild(modal);

        modal.addEventListener('click', function (e) {
            if (e.target === modal) closeServiceModal();
        });
    }

    document.getElementById('modal-service-title').textContent = service.title;
    document.getElementById('modal-service-price').textContent = service.price;
    document.getElementById('modal-service-details').textContent = service.details || service.summary;

    let featuresWrap = document.getElementById('modal-service-features-wrap');
    let featuresList = document.getElementById('modal-service-features');
    if (featuresWrap && featuresList) {
        if (service.features && service.features.length > 0) {
            featuresList.innerHTML = service.features.map(f => `<li class="flex items-center gap-1.5"><i class="fa-solid fa-check text-purple-600 text-[10px]"></i> <span>${f}</span></li>`).join('');
            featuresWrap.classList.remove('hidden');
        } else {
            featuresWrap.classList.add('hidden');
        }
    }

    modal.classList.remove('hidden');
}

function closeServiceModal() {
    let modal = document.getElementById('service-modal');
    if (modal) {
        modal.classList.add('hidden');
    }
}

// 7. Static FAQ Toggle function
function toggleFaq(index) {
    let content = document.getElementById('faq-content-' + index);
    let icon = document.getElementById('faq-icon-' + index);
    if (content && icon) {
        content.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }
}

// 8. Contact Form JavaScript Validation
document.addEventListener('submit', function (e) {
    if (e.target && e.target.id === 'ajax-contact-form') {
        e.preventDefault();
        let form = e.target;
        
        let name = form.querySelector('input[type="text"]');
        let email = form.querySelector('input[type="email"]');
        let phone = document.getElementById('contact-phone-input');
        let address = document.getElementById('contact-address-input');
        let message = form.querySelector('textarea');

        if (name && name.value.trim() === '') {
            alert('Please enter your name.');
            name.focus();
            return;
        }

        if (email && email.value.trim() === '') {
            alert('Please enter a valid email address.');
            email.focus();
            return;
        }

        if (phone && phone.value.trim() === '') {
            alert('Please enter your phone number.');
            phone.focus();
            return;
        }

        if (address && address.value.trim() === '') {
            alert('Please enter your address.');
            address.focus();
            return;
        }

        if (message && message.value.trim() === '') {
            alert('Please enter your message.');
            message.focus();
            return;
        }

        let alertBox = document.getElementById('contact-success-alert');
        if (alertBox) {
            alertBox.classList.remove('hidden');
            form.reset();
            setTimeout(function () {
                alertBox.classList.add('hidden');
            }, 5000);
        }
    }
});
