<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Blog;
use App\Models\Certification;
use App\Models\ContactMessage;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Faq;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Super Admin User
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Md Akash Mia',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // 2. About Info for Md Akash Mia (Updated with 3+ Yrs Exp, 10+ Projects, akash.jpg & resume.pdf)
        About::updateOrCreate(
            ['id' => 1],
            [
                'name' => 'Md Akash Mia',
                'title' => 'Web Developer, Web Designer & Freelancer',
                'location' => 'Dhaka, Bangladesh',
                'bio' => "Hello! I am Md Akash Mia, a passionate Web Developer, Web Designer, and Freelancer. I specialize in building responsive, high-performance web applications using HTML, CSS, JavaScript, Tailwind CSS, Bootstrap, PHP, Laravel, MySQL, and Server Management.",
                'mission' => 'To craft clean, user-friendly, and modern web solutions that empower clients and businesses to succeed online.',
                'vision' => 'To become a top-tier full-stack web developer and global freelance technology expert delivering world-class digital products.',
                'exp_years' => 3,
                'completed_projects' => 10,
                'happy_clients' => 10,
                'email' => 'akash904069@gmail.com',
                'phone' => '+880 1700-000000',
                'cv_link' => 'images/resume.pdf',
                'image' => 'images/akash.jpg',
            ]
        );

        // 3. Services Offered by Md Akash Mia
        $services = [
            [
                'title' => 'Web Design & Frontend Development',
                'description' => 'Creating modern, 100% mobile responsive frontend interfaces using HTML5, CSS3, JavaScript, Tailwind CSS, and Bootstrap.',
                'icon' => 'fa-solid fa-wand-magic-sparkles',
                'order' => 1,
            ],
            [
                'title' => 'Web Application Development',
                'description' => 'Engineering robust backend applications, dynamic portals, and custom web systems using PHP & Laravel Framework.',
                'icon' => 'fa-solid fa-code',
                'order' => 2,
            ],
            [
                'title' => 'Database Design & Management',
                'description' => 'Designing relational database schemas, optimizing MySQL database queries, and managing data integrity.',
                'icon' => 'fa-solid fa-database',
                'order' => 3,
            ],
            [
                'title' => 'Server & Cloud Deployment',
                'description' => 'Setting up web servers (Laragon, Apache, Nginx), domain configuration, SSL setup, and cPanel hosting administration.',
                'icon' => 'fa-solid fa-server',
                'order' => 4,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['title' => $service['title']], $service);
        }

        // 4. Skills & Technologies of Md Akash Mia
        $skills = [
            ['name' => 'HTML5 / CSS3', 'category' => 'Frontend', 'percentage' => 98, 'icon' => 'fa-brands fa-html5', 'order' => 1],
            ['name' => 'JavaScript (JS)', 'category' => 'Frontend', 'percentage' => 92, 'icon' => 'fa-brands fa-js', 'order' => 2],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'percentage' => 95, 'icon' => 'fa-brands fa-css3-alt', 'order' => 3],
            ['name' => 'Bootstrap Framework', 'category' => 'Frontend', 'percentage' => 94, 'icon' => 'fa-brands fa-bootstrap', 'order' => 4],
            ['name' => 'PHP & Laravel', 'category' => 'Backend', 'percentage' => 90, 'icon' => 'fa-brands fa-laravel', 'order' => 5],
            ['name' => 'MySQL Database', 'category' => 'Database', 'percentage' => 92, 'icon' => 'fa-solid fa-database', 'order' => 6],
            ['name' => 'Server & Hosting', 'category' => 'DevOps', 'percentage' => 88, 'icon' => 'fa-solid fa-server', 'order' => 7],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(['name' => $skill['name']], $skill);
        }

        // 5. Portfolios Projects
        $portfolios = [
            [
                'title' => 'E-Commerce Online Store Portal',
                'category' => 'Web Development',
                'image' => 'assets/frontend/images/portfolio-1.png',
                'short_description' => 'Full-stack e-commerce web platform with product filter, cart system, and payment gateway.',
                'full_description' => 'Developed custom e-commerce solution with Laravel backend, MySQL database, and responsive Tailwind CSS frontend.',
                'client_name' => 'Retail Client',
                'project_url' => 'https://example.com',
                'is_featured' => true,
            ],
            [
                'title' => 'Corporate Agency Business Website',
                'category' => 'Web Design',
                'image' => 'assets/frontend/images/portfolio-2.png',
                'short_description' => 'Modern, mobile responsive agency web application built with Bootstrap and JavaScript.',
                'full_description' => 'Designed complete corporate identity layout featuring service grids, client reviews, interactive map embed, and contact form.',
                'client_name' => 'Agency Partner',
                'project_url' => 'https://example.com',
                'is_featured' => true,
            ],
            [
                'title' => 'Custom Management & Admin Dashboard',
                'category' => 'Laravel Application',
                'image' => 'assets/frontend/images/portfolio-3.png',
                'short_description' => 'Data management portal with role-based auth, metrics dashboard, and report generators.',
                'full_description' => 'Built admin dashboard using TailAdmin, Laravel Blade templates, and MySQL database optimization.',
                'client_name' => 'Enterprise Client',
                'project_url' => 'https://example.com',
                'is_featured' => true,
            ],
        ];

        foreach ($portfolios as $item) {
            Portfolio::updateOrCreate(['title' => $item['title']], $item);
        }

        // 6. Education Information
        $educations = [
            [
                'degree' => 'Diploma in Web Development & Engineering',
                'institution' => 'National Skill Development Authority (NSDA)',
                'year' => '2021 - 2024',
                'result' => 'A+ (Passed with Excellence)',
                'description' => 'Focused on HTML5, CSS3, JavaScript, Responsive Frameworks, PHP, Laravel, and MySQL database management.',
            ],
            [
                'degree' => 'Higher Secondary Certificate (HSC)',
                'institution' => 'Dhaka City College',
                'year' => '2019 - 2021',
                'result' => 'GPA 5.00 / 5.00',
                'description' => 'Completed Science background with computer studies and mathematics.',
            ],
        ];

        foreach ($educations as $edu) {
            Education::updateOrCreate(['degree' => $edu['degree']], $edu);
        }

        // 7. Working Experience
        $experiences = [
            [
                'designation' => 'Lead Full-Stack Web Developer & Freelancer',
                'company' => 'Self-Employed / Freelance',
                'duration' => '3+ Years Experience',
                'description' => 'Building custom web applications, responsive websites, and server deployments for global and local clients.',
            ],
            [
                'designation' => 'Frontend Web Designer',
                'company' => 'Creative Tech Studio',
                'duration' => '2021 - 2023',
                'description' => 'Created responsive mobile-friendly UI templates using Tailwind CSS, Bootstrap, and vanilla JavaScript.',
            ],
        ];

        foreach ($experiences as $exp) {
            Experience::updateOrCreate(['designation' => $exp['designation']], $exp);
        }

        // 8. Training Certifications
        $certifications = [
            [
                'title' => 'Certified Web Developer & Designer',
                'institution' => 'NSDA Professional Certification',
                'year' => '2024',
                'details' => 'Official certification for professional web design and development using HTML, CSS, JavaScript, Tailwind, Bootstrap, PHP, and Laravel.',
                'credential_url' => 'images/resume.pdf',
            ],
            [
                'title' => 'Professional Database & Server Administration',
                'institution' => 'Database & Cloud Institute',
                'year' => '2023',
                'details' => 'Specialized training in MySQL database optimization, server setup, SSL security, and web hosting management.',
                'credential_url' => 'images/resume.pdf',
            ],
        ];

        foreach ($certifications as $cert) {
            Certification::updateOrCreate(['title' => $cert['title']], $cert);
        }

        // 9. FAQs
        $faqs = [
            [
                'question' => 'What services does Md Akash Mia offer?',
                'answer' => 'I offer full-stack web development, responsive web design (Tailwind/Bootstrap), custom Laravel application engineering, MySQL database design, and web server setup.',
                'order' => 1,
            ],
            [
                'question' => 'What technologies do you use for website building?',
                'answer' => 'I work with HTML5, CSS3, JavaScript, Tailwind CSS, Bootstrap, PHP, Laravel, MySQL databases, and server tools like Laragon, cPanel, and Apache/Nginx.',
                'order' => 2,
            ],
            [
                'question' => 'Are your website designs fully mobile friendly?',
                'answer' => 'Yes, 100%! All websites I design are fully responsive across mobile phones, tablets, laptops, and desktop monitors.',
                'order' => 3,
            ],
            [
                'question' => 'How can I contact Md Akash Mia for a project?',
                'answer' => 'You can email me directly at akash904069@gmail.com or fill out the contact form on the Contact page to request a quote.',
                'order' => 4,
            ],
            [
                'question' => 'Do you provide backend admin panel for content updates?',
                'answer' => 'Yes! The website includes a custom TailAdmin dashboard where you can manage portfolio projects, services, skills, client feedback, and messages.',
                'order' => 5,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(['question' => $faq['question']], $faq);
        }

        // 10. Testimonials
        $testimonials = [
            [
                'client_name' => 'Tanvir Hasan',
                'designation' => 'Managing Director',
                'company' => 'TechVision BD',
                'photo' => 'assets/frontend/images/client-1.png',
                'comment' => 'Md Akash Mia delivered our web application on time with fantastic design and clean code. Highly recommended freelancer!',
                'rating' => 5,
            ],
            [
                'client_name' => 'Sophia Martinez',
                'designation' => 'Project Manager',
                'company' => 'Global Commerce',
                'photo' => 'assets/frontend/images/client-2.png',
                'comment' => 'Akash is an outstanding web developer. His expertise in HTML, CSS, JavaScript, and Laravel made our project a huge success.',
                'rating' => 5,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['client_name' => $t['client_name']], $t);
        }

        // 11. Blogs
        $blogs = [
            [
                'title' => 'Modern Web Development with HTML, Tailwind CSS & Laravel',
                'slug' => Str::slug('Modern Web Development with HTML Tailwind CSS Laravel'),
                'image' => 'assets/frontend/images/blog-1.png',
                'excerpt' => 'A guide by Md Akash Mia on building clean, mobile-responsive web applications.',
                'content' => 'Combining utility-first CSS frameworks like Tailwind CSS with powerful PHP frameworks like Laravel speeds up development while ensuring maximum security and performance...',
                'category' => 'Development',
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Database Optimization & MySQL Best Practices',
                'slug' => Str::slug('Database Optimization & MySQL Best Practices'),
                'image' => 'assets/frontend/images/blog-2.png',
                'excerpt' => 'How proper database indexing and schema design improve web server load times.',
                'content' => 'Relational database architecture is critical for scalable applications. Efficient MySQL schema design and query optimization ensure instantaneous data retrieval...',
                'category' => 'Database',
                'published_at' => now()->subDays(10),
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::updateOrCreate(['slug' => $blog['slug']], $blog);
        }
    }
}
