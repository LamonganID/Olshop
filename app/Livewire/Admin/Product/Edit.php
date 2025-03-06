<?php

namespace App\Livewire\Admin\Product;

use App\Models\Products;
use App\Models\Categories;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Str;

#[Layout('layouts.app')]
#[Title('Edit Product')]

class Edit extends Component
{
    use WithFileUploads;
    public $product;
    public $name;
    public $size;
    public $price;
    public $stock;
    public $description;
    public $categories_id;
    public $image;

    protected $rules = [
        'name' => 'required|string|max:255',
        'size' => 'nullable|string|max:255',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'nullable|string',
        'categories_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|max:2048', //max 2mb
    ];
    protected $messages = [
        'categories_id.exists' => 'The selected category is invalid.',
    ];
    public function mount(Products $product)
    {
        $this->product = $product;
        $this->name = $product->name;
        $this->size = $product->size;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->description = $product->description;
        $this->categories_id = $product->categories_id;
    }

    public function updatedCategoriesId()
    {
        $this->validateOnly('categories_id');
    }

    public function render()
    {
        return view('livewire.admin.product.edit');
    }
}
