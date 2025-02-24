<?php

use App\Livewire\Admin\Product\Create;
use App\Livewire\Admin\Product\Edit;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Product\Index;
use App\Http\Controllers\Auth\LogoutController;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () { 
    // Product Management Routes
    Route::get('products', Index::class)->name('products');
    Route::get('products/create', Create::class)->name('products.create');
    Route::get('products/edit/{id}', Edit::class)->name('products.edit');
});

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
