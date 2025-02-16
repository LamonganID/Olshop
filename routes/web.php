<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Product;
use App\Livewire\Admin\product\Index;


Route::view('/', 'welcome');

Route::get('admin/product', Product::class)->name('product');
Route::get('admin/product/index', Index::class)->name('product.index');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
