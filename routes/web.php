<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Guest; 
use App\Http\Middleware\CanRegister; 
use App\Http\Middleware\isTeacher; 
use App\Http\Middleware\isStudent; 
use App\Http\Middleware\Authorized; 

// @ Shared
Route::view('/', 'web.sections.shared.landing');

// @ Unauthorized
Route::middleware([Guest::class])->group(function() {
    Route::view('/login', 'web.sections.guest.auth.login')->name('login'); 
    Route::view('/register', 'web.sections.guest.auth.register')->middleware(CanRegister::class); 
});

// @ Authorized
Route::middleware('auth')->group(function() {
    Route::middleware(isTeacher::class)->group(function() {
        Route::view('/teacher/dashboard', 'web.sections.authorized.teacher.dashboard'); 
        Route::view('/teacher/usuarios', 'web.sections.authorized.teacher.users'); 
    }); 

    Route::get('logout' , function() {
        Auth::logout(); 

        return redirect('/login'); 
    });
});
