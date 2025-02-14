<?php
use App\Livewire\Admin\Product;
use App\Livewire\Admin\ProductForm;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/products', Product::class)->name('admin.products');
    Route::get('/admin/product-form', ProductForm::class)->name('create');
});
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
