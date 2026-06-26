<?php

use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HomepageSectionController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/media/{path}', function (string $path) {
    abort_unless(Storage::disk('public')->exists($path), 404);

    return response()->file(Storage::disk('public')->path($path));
})->where('path', '.*')->name('media.show');
Route::get('/content-image/{encoded}', function (string $encoded) {
    $url = base64_decode(strtr($encoded, '-_', '+/'), true);
    abort_unless($url && filter_var($url, FILTER_VALIDATE_URL), 404);

    $parts = parse_url($url);
    abort_unless(in_array($parts['scheme'] ?? '', ['http', 'https'], true), 404);
    abort_unless(filled($parts['host'] ?? null), 404);

    $ip = gethostbyname($parts['host']);
    abort_unless(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE), 404);

    $response = Http::withHeaders([
        'Accept' => 'image/avif,image/webp,image/apng,image/svg+xml,image/*,*/*;q=0.8',
        'User-Agent' => 'Mozilla/5.0 (compatible; TiwiContentImageProxy/1.0)',
    ])->timeout(12)->retry(1, 200)->get($url);

    abort_unless($response->ok(), 404);

    $contentType = strtolower((string) $response->header('Content-Type'));
    abort_unless(str_starts_with($contentType, 'image/'), 404);

    return response($response->body(), 200)
        ->header('Content-Type', $response->header('Content-Type'))
        ->header('Cache-Control', 'public, max-age=86400');
})->where('encoded', '[A-Za-z0-9_-]+')->name('content-image.proxy');
Route::get('/about-tiwi', [PublicController::class, 'about'])->name('about');
Route::get('/solutions', [PublicController::class, 'modules'])->name('modules.index');
Route::get('/solutions/{module:slug}', [PublicController::class, 'module'])->name('modules.show');
Route::get('/pricing', [PublicController::class, 'pricing'])->name('pricing');
Route::get('/blog', [PublicController::class, 'blog'])->name('blog.index');
Route::get('/blog/{post:slug}', [PublicController::class, 'post'])->name('blog.show');
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [LoginController::class, 'create'])->name('login');
    Route::post('/admin/login', [LoginController::class, 'store'])->name('login.store');
});

Route::post('/admin/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::get('homepage-content', [HomepageSectionController::class, 'index'])->name('homepage-content.index');
    Route::resource('modules', ModuleController::class)->except('show');
    Route::post('pages/bulk-action', [PageController::class, 'bulkAction'])->name('pages.bulk-action');
    Route::resource('pages', PageController::class)->except('show');
    Route::post('posts/bulk-action', [PostController::class, 'bulkAction'])->name('posts.bulk-action');
    Route::resource('posts', PostController::class);
    Route::resource('blog-posts', BlogPostController::class)->except('show');
    Route::resource('faqs', FaqController::class)->except('show');
    Route::resource('contact-messages', ContactMessageController::class)->only(['index', 'show', 'destroy']);
    Route::resource('homepage-sections', HomepageSectionController::class)->only(['index', 'edit', 'update']);
});

Route::get('/{slug}', [PublicController::class, 'publicPost'])
    ->where('slug', '^(?!admin$|media$|about-tiwi$|solutions$|pricing$|blog$|contact$)[A-Za-z0-9-]+$')
    ->name('posts.public.show');
