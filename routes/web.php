<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello',function(){
    return 'Bonjour le monde!';
});

 Route::get('/nico',function(){
     return view('nico');
 });

Route::get('/home',function(){
    return View::make('pages.home');
});


Route::resource('users', UserController::class);

Route::resource('roles', RoleController::class);



Route::get('/about',function(){
    return View::make('pages.about');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
