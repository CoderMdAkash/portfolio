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
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.hero-next',
                prevEl: '.hero-prev',
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
                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl transition-all cursor-pointer" onclick="openServiceModal(${s.id})">
                    <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-2xl mb-6">
                        <i class="${s.icon}"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">${s.title}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">${s.summary}</p>
                    <button onclick="event.stopPropagation(); openServiceModal(${s.id})" class="text-purple-600 font-bold text-sm hover:underline flex items-center gap-2">
                        View Details <i class="fa-solid fa-arrow-right text-xs"></i>
                    </button>
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
                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm space-y-6 cursor-pointer" onclick="openServiceModal(${s.id})">
                    <div class="flex justify-between items-center">
                        <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-2xl">
                            <i class="${s.icon}"></i>
                        </div>
                        <span class="text-xl font-bold text-purple-600">${s.price}</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">${s.title}</h3>
                    <p class="text-gray-600 text-sm">${s.summary}</p>
                    <button onclick="event.stopPropagation(); openServiceModal(${s.id})" class="btn-primary-custom text-xs py-3 w-full text-center justify-center">
                        View Full Details
                    </button>
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

// 6. Service Modal Handler
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
        modal.className = 'hidden fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4';
        modal.innerHTML = `
            <div class="bg-white rounded-3xl max-w-lg w-full p-8 space-y-6 shadow-2xl relative border border-purple-100">
                <button onclick="closeServiceModal()" class="absolute top-6 right-6 text-gray-400 hover:text-gray-900 text-xl cursor-pointer">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <div class="flex items-center gap-4 border-b border-gray-100 pb-4">
                    <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-2xl">
                        <i id="modal-service-icon" class="fa-solid fa-code"></i>
                    </div>
                    <div>
                        <span id="modal-service-price" class="text-xs font-bold px-3 py-1 bg-purple-100 text-purple-700 rounded-full">$299</span>
                        <h3 id="modal-service-title" class="text-2xl font-bold text-gray-900 mt-1">Service Title</h3>
                    </div>
                </div>
                <div class="space-y-2">
                    <h4 class="text-xs font-bold text-purple-600 uppercase tracking-wider">Service Overview</h4>
                    <p id="modal-service-details" class="text-gray-600 text-sm leading-relaxed">Description</p>
                </div>
                <div class="pt-4 flex gap-3">
                    <a href="contact.html" class="flex-1 btn-primary-custom justify-center py-3 text-sm font-bold text-center">
                        Order This Service <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                    <button onclick="closeServiceModal()" class="px-6 py-3 rounded-full border border-gray-200 font-semibold text-gray-700 hover:bg-gray-100 text-sm cursor-pointer">
                        Close
                    </button>
                </div>
            </div>
        `;
        document.body.appendChild(modal);
    }

    document.getElementById('modal-service-icon').className = service.icon;
    document.getElementById('modal-service-title').textContent = service.title;
    document.getElementById('modal-service-price').textContent = service.price;
    document.getElementById('modal-service-details').textContent = service.details || service.summary;

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
