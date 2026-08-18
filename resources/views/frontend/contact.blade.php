@extends('layouts.frontend')

@section('title', 'Contact Us - Personal Portfolio')

@section('content')

<!-- 5a. Page Title Section -->
<section class="py-16 bg-gray-900 text-white border-b border-gray-800">
    <div class="max-w-[1320px] mx-auto px-4 text-center space-y-3">
        <span class="text-purple-400 font-bold text-xs uppercase tracking-widest">Get In Touch</span>
        <h1 class="text-4xl sm:text-5xl font-extrabold">Contact Me</h1>
        <p class="text-gray-400 text-sm max-w-xl mx-auto">Have a project inquiry or service order? Reach out directly via form, email, or view map location.</p>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-[1320px] mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- 5b. Direct Contact Information Section -->
            <div class="lg:col-span-5 space-y-8">
                <div>
                    <span class="text-purple-600 font-bold text-xs uppercase tracking-widest">Direct Contact Info</span>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">Let's start a conversation</h2>
                </div>

                <div class="space-y-6">
                    <div class="flex items-start gap-4 p-5 bg-gray-50 rounded-2xl border border-gray-100">
                        <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl shrink-0">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <div class="text-xs text-gray-400 font-semibold uppercase">Email Address</div>
                            <a href="mailto:{{ $about->email }}" class="font-bold text-gray-900 hover:text-purple-600 text-base">{{ $about->email }}</a>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 bg-gray-50 rounded-2xl border border-gray-100">
                        <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl shrink-0">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <div class="text-xs text-gray-400 font-semibold uppercase">Direct Phone</div>
                            <div class="font-bold text-gray-900 text-base">{{ $about->phone ?? '+44 123 456 789' }}</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-5 bg-gray-50 rounded-2xl border border-gray-100">
                        <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl shrink-0">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <div class="text-xs text-gray-400 font-semibold uppercase">Office Address</div>
                            <div class="font-bold text-gray-900 text-base">{{ $about->location }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5c & 5e. Contact Form Section (Name, Email, Phone, Address, Message + JS Validation) -->
            <div class="lg:col-span-7 bg-soft-white p-8 sm:p-10 rounded-3xl border border-gray-200 shadow-sm">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Send Me a Message</h3>

                <!-- Container for JavaScript Validation Error Messages -->
                <div id="js-form-errors" class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-sm hidden"></div>

                @if(session('success'))
                    <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm p-4 rounded-xl flex items-center gap-3">
                        <i class="fa-solid fa-circle-check text-emerald-600 text-xl"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <form id="contact-form" action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Full Name *</label>
                            <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-gray-300 text-sm outline-none focus:border-purple-600 bg-white" placeholder="John Doe">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Email Address *</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-gray-300 text-sm outline-none focus:border-purple-600 bg-white" placeholder="john@example.com">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Phone Number</label>
                            <input type="text" name="phone" class="w-full px-4 py-3 rounded-xl border border-gray-300 text-sm outline-none focus:border-purple-600 bg-white" placeholder="+123 456 7890">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Physical Address</label>
                            <input type="text" name="address" class="w-full px-4 py-3 rounded-xl border border-gray-300 text-sm outline-none focus:border-purple-600 bg-white" placeholder="London, UK">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Subject</label>
                        <input type="text" name="subject" class="w-full px-4 py-3 rounded-xl border border-gray-300 text-sm outline-none focus:border-purple-600 bg-white" placeholder="Service Order / Inquiry">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Your Message *</label>
                        <textarea name="message" rows="4" required class="w-full px-4 py-3 rounded-xl border border-gray-300 text-sm outline-none focus:border-purple-600 bg-white" placeholder="Describe your project requirement..."></textarea>
                    </div>

                    <button type="submit" class="w-full btn-primary-custom py-3.5 text-center">
                        Submit Message <i class="fa-solid fa-paper-plane ms-2"></i>
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>

<!-- 5d. Google Map API Section -->
<section class="py-16 bg-gray-50 border-t border-gray-100">
    <div class="max-w-[1320px] mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-10 space-y-2">
            <span class="text-purple-600 font-bold text-xs uppercase tracking-widest">Find Us</span>
            <h2 class="text-2xl font-bold text-gray-900">Google Map Location</h2>
        </div>

        <div class="w-full h-96 rounded-3xl overflow-hidden shadow-md border border-gray-200">
            <iframe 
                class="w-full h-full border-0"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158858.4734002875!2d-0.24168147572704207!3d51.52855824177435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C%20UK!5e0!3m2!1sen!2s!4v1680000000000!5m2!1sen!2s" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

@endsection
