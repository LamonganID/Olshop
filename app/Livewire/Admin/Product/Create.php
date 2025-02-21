<?php

namespace App\Livewire\Admin\Product;

use App\Models\Products;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

#[Title('Create Product')]
class Create extends Component
{
    use WithFileUploads;
    public $name;
    public $category_id;
    public $price;
    public $stock;
    public $description;

    protected $rules = [
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'description' => 'nullable|string',
    ];

    public function createProduct()
    {
        $this->validate();

        Products::create([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'stock' => $this->stock,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Product created successfully.');
        return redirect()->route('products');
    }

    public function render()
    {
        return view('livewire.admin.product.create');
    }
}
