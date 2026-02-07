<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminCountryController;
use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\AdminInquiryController;
use App\Http\Controllers\AdminTestimonialController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/services', [HomeController::class, 'services']);
Route::get('/countries', [HomeController::class, 'countries']);
Route::get('/blogs', [HomeController::class, 'blogs']);
Route::get('/ramadan', [HomeController::class, 'ramadan'])->name('ramadan');
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/inquiry', [InquiryController::class, 'store']); // This one might have been lost
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Admin Routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/team', [AdminController::class, 'teamIndex'])->name('admin.team.index');
    Route::post('/team', [AdminController::class, 'storeTeam'])->name('admin.team.store');
    Route::get('/team/{id}/edit', [AdminController::class, 'editTeam'])->name('admin.team.edit');
    Route::post('/team/{id}', [AdminController::class, 'updateTeam'])->name('admin.team.update');
    Route::delete('/team/{id}', [AdminController::class, 'deleteTeam'])->name('admin.team.delete');

    // Settings Routes
    Route::get('/settings', [AdminSettingsController::class, 'index'])->name('admin.settings.index');
    Route::post('/settings', [AdminSettingsController::class, 'update'])->name('admin.settings.update');
    Route::post('/settings/image', [AdminSettingsController::class, 'updateImage'])->name('admin.settings.updateImage');

    // Homepage Settings Routes
    Route::get('/settings/homepage', [AdminSettingsController::class, 'homepage'])->name('admin.settings.homepage');
    Route::put('/settings/homepage', [AdminSettingsController::class, 'updateHomepage'])->name('admin.settings.updateHomepage');

    // Services Routes
    Route::resource('services', AdminServiceController::class, ['as' => 'admin']);

    // Blogs Routes
    Route::resource('blogs', \App\Http\Controllers\AdminBlogController::class, ['as' => 'admin']);

    // Countries Routes
    Route::resource('countries', AdminCountryController::class, ['as' => 'admin']);
    Route::post('/countries/{country}/toggle', [AdminCountryController::class, 'toggleActive'])->name('admin.countries.toggle');

    // Reviews Routes (Full CRUD + Approve/Reject)
    Route::resource('reviews', AdminReviewController::class, ['as' => 'admin']);
    Route::post('/reviews/{review}/approve', [AdminReviewController::class, 'approve'])->name('admin.reviews.approve');
    Route::post('/reviews/{review}/reject', [AdminReviewController::class, 'reject'])->name('admin.reviews.reject');
    Route::post('/reviews/{review}/toggle-featured', [AdminReviewController::class, 'toggleFeatured'])->name('admin.reviews.toggle-featured');

    // Inquiries Routes
    Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('admin.inquiries.index');
    Route::get('/inquiries/{inquiry}', [AdminInquiryController::class, 'show'])->name('admin.inquiries.show');
    Route::delete('/inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('admin.inquiries.destroy');

    // Packages Routes
    Route::get('/packages', [\App\Http\Controllers\AdminPackageController::class, 'index'])->name('admin.packages.index');
    Route::get('/packages/create', [\App\Http\Controllers\AdminPackageController::class, 'create'])->name('admin.packages.create');
    Route::post('/packages', [\App\Http\Controllers\AdminPackageController::class, 'store'])->name('admin.packages.store');
    Route::get('/packages/{id}/edit', [\App\Http\Controllers\AdminPackageController::class, 'edit'])->name('admin.packages.edit');
    Route::put('/packages/{id}', [\App\Http\Controllers\AdminPackageController::class, 'update'])->name('admin.packages.update');
    Route::delete('/packages/{id}', [\App\Http\Controllers\AdminPackageController::class, 'destroy'])->name('admin.packages.destroy');
});

