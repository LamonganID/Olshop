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
    public $size;
    public $categories_id;
    public $price;
    public $stock;
    public $description;
    public $image; // added image property

    protected $rules = [
        'name' => 'required|string|max:255',
        'size' => 'nullable|string|max:255',
        'categories_id' => 'required|exists:categories,id',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:1024', 
    ];

    public function createProduct()
    {
        $this->validate();

        $imagePath = $this->image ? $this->image->store('images', 'public') : null;

        Products::create([
            'slug' => Str::slug($this->name),
            'size' => $this->size,
            'name' => $this->name,
            'categories_id' => $this->categories_id,
            'price' => $this->price,
            'stock' => $this->stock,
            'description' => $this->description,
            'image' => $imagePath, 
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
