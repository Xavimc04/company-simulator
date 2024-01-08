<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Guest; 
use App\Http\Middleware\CanRegister; 
use App\Http\Middleware\isTeacher; 
use App\Http\Middleware\isStudent; 
use App\Http\Middleware\isAdministrator; 
use App\Http\Middleware\isCompanyEmployee; 
use App\Http\Middleware\Authorized; 

// @ Shared
Route::view('/', 'web.sections.shared.landing');

// @ Unauthorized
Route::middleware([Guest::class])->group(function() {
    Route::view('/login', 'web.sections.guest.auth.login')->name('login'); 
    Route::view('/register', 'web.sections.guest.auth.register'); 
    Route::view('/recover-password', 'web.sections.guest.auth.recover')->name('recover'); 
    
    Route::get('/recover-password/{token}', function (string $token) {
        return view('web.sections.guest.auth.password-reset', ['token' => $token]);
    })->name('password.reset');
});

// @ Authorized
Route::middleware('auth')->group(function() {
    // @ Administrator
    Route::middleware(isAdministrator::class)->prefix('admin')->group(function() {
        Route::view('/dashboard', 'web.sections.authorized.administrator.dashboard'); 
        Route::view('/centers', 'web.sections.authorized.administrator.centers'); 
        Route::view('/users', 'web.sections.authorized.teacher.users'); 
        Route::view('/announcements', 'web.sections.authorized.administrator.announcements'); 
        Route::view('/documentation', 'web.sections.authorized.administrator.documentation'); 
    }); 


    // @ Teacher
    Route::middleware(isTeacher::class)->prefix('teachers')->group(function() {
        Route::view('/dashboard', 'web.sections.authorized.teacher.dashboard'); 
        Route::view('/users', 'web.sections.authorized.teacher.users'); 
        Route::view('/companies', 'web.sections.authorized.teacher.companies'); 
        Route::view('/invites', 'web.sections.authorized.teacher.links'); 
        Route::view('/wholesalers', 'web.sections.authorized.teacher.wholesalers'); 

        Route::get('/companies/{id}', [App\Http\Controllers\MainController::class, 'company']); 
    }); 

    // @ Student
    Route::middleware(isStudent::class)->group(function() {
        Route::view('/student/select', 'web.sections.authorized.student.main-selector');

        Route::middleware(isCompanyEmployee::class)->prefix('student/{company}')->group(function() {
            Route::view('/dashboard', 'web.sections.authorized.student.dashboard');
        });
    });

    // @ Shared
    Route::view('/profile', 'web.sections.authorized.profile'); 

    Route::get('logout' , function() {
        Auth::logout(); 

        return redirect('/login'); 
    });
});
