<?php

namespace App\Http\Controllers;

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
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // 1. Home Page Route (/)
    public function index()
    {
        $about = About::first() ?? new About();
        $services = Service::orderBy('order', 'asc')->take(4)->get();
        $portfolios = Portfolio::orderBy('created_at', 'desc')->take(3)->get();
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        $blogs = Blog::orderBy('created_at', 'desc')->take(3)->get();

        return view('frontend.index', compact(
            'about',
            'services',
            'portfolios',
            'testimonials',
            'blogs'
        ));
    }

    // 2. About Page Route (/about)
    public function about()
    {
        $about = About::first() ?? new About();
        $skills = Skill::orderBy('order', 'asc')->get();
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();

        return view('frontend.about', compact('about', 'skills', 'testimonials'));
    }

    // 3. Portfolio Page Route (/portfolio)
    public function portfolio()
    {
        $about = About::first() ?? new About();
        $portfolios = Portfolio::orderBy('created_at', 'desc')->get();
        $educations = Education::orderBy('id', 'asc')->get();
        $experiences = Experience::orderBy('id', 'desc')->get();
        $certifications = Certification::orderBy('id', 'asc')->get();
        $skills = Skill::orderBy('order', 'asc')->get();

        return view('frontend.portfolio', compact(
            'about',
            'portfolios',
            'educations',
            'experiences',
            'certifications',
            'skills'
        ));
    }

    // 4. Service Page Route (/service)
    public function service()
    {
        $services = Service::orderBy('order', 'asc')->get();
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        $faqs = Faq::orderBy('order', 'asc')->get();

        return view('frontend.service', compact('services', 'testimonials', 'faqs'));
    }

    // 5. Contact Page Route (/contact)
    public function contact()
    {
        $about = About::first() ?? new About();
        return view('frontend.contact', compact('about'));
    }

    public function portfolioDetails($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $relatedPortfolios = Portfolio::where('id', '!=', $id)->take(3)->get();

        return view('frontend.portfolio-details', compact('portfolio', 'relatedPortfolios'));
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $recentBlogs = Blog::where('id', '!=', $blog->id)->take(3)->get();

        return view('frontend.blog-details', compact('blog', 'recentBlogs'));
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:5',
        ]);

        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject ?? ('Inquiry from ' . $request->name),
            'message' => "Phone: " . ($request->phone ?? 'N/A') . "\nAddress: " . ($request->address ?? 'N/A') . "\n\n" . $request->message,
        ]);

        return back()->with('success', 'Thank you! Your message has been sent successfully.');
    }
}
