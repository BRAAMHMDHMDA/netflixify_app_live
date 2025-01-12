<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\{
    HomeController,
    MovieController,
    CategoryController,
    SocialLoginController,
};

// ===================== Auth Routes =====================================
Route::group(['middleware' => 'guest:web'],function (){
    Route::view('login', 'website.auth.login')->name('login');
    Route::view('register', 'website.auth.register')->name('register');

    Route::get('/auth/{provider}/redirect', [SocialLoginController::class, 'redirect'])->name('auth.socialite.redirect');
    Route::get('/auth/{provider}/callback', [SocialLoginController::class, 'callback'])->name('auth.socialite.callback');
});

// ===================== Logout Route & Action =====================================
Route::group(['middleware' => 'auth:web'], function () {

    Route::post('logout', function (){

        Auth::guard('web')->logout();

        session()->forget('guard.web');
        session()->regenerateToken();

        return to_route('home');

    })->name('logout');
});

// ===================== Home Routes =====================================
Route::redirect('/', '/home');
Route::get('home', HomeController::class)->name('home');

// ===================== Movies Routes ===========================================================================================
Route::get('movies/wishlist', [MovieController::class, 'wishlist'])->name('wishlist')->middleware('auth:web');
Route::get('movies/{movie:slug}', [MovieController::class, 'show'])->name('movies.show');
Route::get('movies', [MovieController::class, 'index'])->name('movies.index');
Route::post('movies/{movie}/increment_views', [MovieController::class, 'increment_views'])->name('movies.increment-views');

// ===================== category Routes ===================================================================
Route::get('categories/{category:slug}/movies', CategoryController::class)->name('category');
