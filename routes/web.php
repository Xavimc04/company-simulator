<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Guest; 
use App\Http\Middleware\CanRegister; 
use App\Http\Middleware\isTeacher; 
use App\Http\Middleware\isStudent; 
use App\Http\Middleware\isAdministrator; 
use App\Http\Middleware\Authorized; 

// @ Shared
Route::view('/', 'web.sections.shared.landing');

// @ Unauthorized
Route::middleware([Guest::class])->group(function() {
    Route::view('/login', 'web.sections.guest.auth.login')->name('login'); 
    Route::view('/register', 'web.sections.guest.auth.register'); 
});

// @ Authorized
Route::middleware('auth')->group(function() {
    // @ Administrator
    Route::middleware(isAdministrator::class)->group(function() {
        Route::view('/admin/dashboard', 'web.sections.authorized.administrator.dashboard'); 
        Route::view('/admin/centros', 'web.sections.authorized.administrator.centers'); 
        Route::view('/admin/usuarios', 'web.sections.authorized.teacher.users'); 
    }); 


    // @ Teacher
    Route::middleware(isTeacher::class)->group(function() {
        Route::view('/teacher/dashboard', 'web.sections.authorized.teacher.dashboard'); 
        Route::view('/teacher/usuarios', 'web.sections.authorized.teacher.users'); 
        Route::view('/teacher/empresas', 'web.sections.authorized.teacher.companies'); 
        Route::view('/teacher/invites', 'web.sections.authorized.teacher.links'); 

        Route::get('/teacher/empresas/{id}', [App\Http\Controllers\MainController::class, 'company']); 
    }); 

    // @ Shared
    Route::view('/profile', 'web.sections.authorized.profile'); 

    Route::get('logout' , function() {
        Auth::logout(); 

        return redirect('/login'); 
    });
});
