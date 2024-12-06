<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\jobLevelStats;
use App\Http\Controllers\jobPost;
use App\Http\Controllers\profilePhotoCropController;
use App\Http\Middleware\RedirectIfAuth;
use Illuminate\Support\Facades\Route;

Route::middleware([RedirectIfAuth::class])->group(function () {
    Route::get('/', [jobLevelStats::class, 'jobLevelStats']);

    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::get('/signup', function () {
        return view('signup');
    });

    Route::get('/forgot_password', function () {
        return view('forgot_password');
    });

    Route::get('/search', function () {
        return view('search');
    })->name('search');
    
    Route::get('/job_post/{id}', [jobPost::class, 'job_post']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('d/home', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('emailVerified');

    Route::get('d/jobs', [DashboardController::class, 'total_jobs'])->name('jobs')->middleware('emailVerified');

    Route::get('d/profile', [profilePhotoCropController::class, "profile"])->name('profile')->middleware('emailVerified');
    Route::post('d/profile', [profilePhotoCropController::class, "profilePhotoUpload"])->name("profilePhotoUpload");

    Route::get('d/post_a_job', function () {
        return view('post_a_job');
    })->middleware('emailVerified');

    Route::get('d/job_post/{id}', [DashboardController::class, 'job_post'])->middleware('emailVerified');

    Route::get('d/edit_job_post/{id}', [DashboardController::class, 'select_edit_job_post'])->middleware('emailVerified');

    Route::get('d/delete_job_post/{id}', [DashboardController::class, 'delete_job_post'])->middleware('emailVerified');

    Route::get('d/notifications', function () {
        return view('notifications');
    });

    Route::get('d/settings/acct/change_email_addr', function() {
        return view('settings/change_email_addr');
    })->name('settings')->middleware('emailVerified');

    Route::get('d/settings/acct/change_password', function() {
        return view('settings/change_password');
    })->name('settings')->middleware('emailVerified');

    Route::get('d/settings/acct/delete_acct', function() {
        return view('settings/delete_acct');
    })->name('settings')->middleware('emailVerified');

    Route::get('d/settings/jobs/change_job_posts_currency', function() {
        return view('settings/change_job_posts_currency');
    })->name('settings')->middleware('emailVerified');

    Route::get('d/faq', function () {
        return view('d_faq');
    })->name('faq')->middleware('emailVerified');

    Route::post('d/logout', [DashboardController::class, 'logout_user'])->name('logout')->middleware('emailVerified');
    Route::get('d/logout', function () {
        abort(405); // Method Not Allowed
    });

    Route::get('/email/verify/notice', function () {
        return view('email_verify_notice');
    })->name('emailVerifyNotice');
});

Route::get('password/reset/{token}', [AuthController::class, 'select_fptoken_info']);
Route::post('reset_password_pro/{token}', [AuthController::class, 'reset_user_password']);

Route::get('email/verify/{token}', [AuthController::class, 'select_token_info']);
Route::post('verify_email_pro/{token}', [AuthController::class, 'verify_user_email']);

Route::get('email/change/{token}', [AuthController::class, 'select_ceatoken_info']);
Route::post('change_email_addr_pro/{token}', [AuthController::class, 'change_email_addr']);

Route::get('acct/delete/{token}', [AuthController::class, 'select_datoken_info']);
Route::post('delete_acct_pro/{token}', [AuthController::class, 'delete_acct']);

Route::get('/about', function () {
    return view('pages/about');
});

Route::get('/terms_of_use', function () {
    return view('pages/terms_of_use');
});

Route::get('/privacy_policy', function () {
    return view('pages/privacy_policy');
});

Route::get('/faq', function () {
    return view('pages/faq');
});

Route::get('/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('/error', function () {
    abort(404);
});