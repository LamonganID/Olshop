<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
#[Layout('layouts.app')]
#[Title('Create Product')]
class Create extends Component
{
    use WithFileUploads;
    public $name;
    public $categories_id;
    public $price;
    public $stock;
    public $description;

    protected $rules = [
        'name' => 'required|string|max:255',
        'categories_id' => 'required|exists:categories,id',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'nullable|string',
    ];

    public function createProduct()
    {
        $this->validate();

        Products::create([
            'slug' => Str::slug($this->name),
            'name' => $this->name,
            'categories_id' => $this->categories_id,
            'price' => $this->price,
            'stock' => $this->stock,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Product created successfully.');
        return redirect()->route('products');
    }

    public function render()
    {
        $categories = Categories::all();
        return view('livewire.admin.product.create', compact('categories'));
    }
}
