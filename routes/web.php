<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

// Public Assessment Frontend Routes (5 Main Pages)
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
Route::get('/service', [FrontendController::class, 'service'])->name('service');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

// Inner Detail Pages & Contact Action
Route::get('/portfolio-item/{id}', [FrontendController::class, 'portfolioDetails'])->name('portfolio.details');
Route::get('/blog/{slug}', [FrontendController::class, 'blogDetails'])->name('blog.details');
Route::post('/contact-submit', [FrontendController::class, 'submitContact'])->name('contact.submit');

// Admin Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Admin Dashboard Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // About & Hero Section
    Route::get('/about', [AboutController::class, 'edit'])->name('about.edit');
    Route::post('/about', [AboutController::class, 'update'])->name('about.update');

    // Resource Management CRUDs
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('testimonials', TestimonialController::class);

    // Contact Messages Inbox
    Route::get('/messages', [ContactMessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [ContactMessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');
});
