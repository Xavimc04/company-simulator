<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Guest; 

// @ Shared
Route::view('/', 'web.sections.shared.landing');

// @ Unauthorized
Route::middleware([Guest::class])->group(function() {
    Route::view('/login', 'web.sections.guest.auth.login'); 
    Route::view('/register', 'web.sections.guest.auth.register'); 
});

// @ Authorized
Route::name('teacher.')->group(function() {
    Route::post('/logout', function() {
        
    }); 
}); 