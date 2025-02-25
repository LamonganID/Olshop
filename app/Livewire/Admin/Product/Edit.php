<?php

namespace App\Livewire\Admin\Product;

use App\Models\Products;
use App\Models\Categories;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Layout('layouts.app')]
#[Title('Edit Product')]

class Edit extends Component
{
    use WithFileUploads;
    public $product;
    public $categories;
    public $image;

    protected $rules = [
        'product.name' => 'required|string|max:255',
        'product.category_id' => 'required|exists:categories,id',
        'product.price' => 'required|numeric',
        'product.stock' => 'required|integer',
        'product.description' => 'nullable|string',
        'image' => 'nullable|image|max:1024', // 1MB Max
    ];

    public function mount($id)
    {
        $this->product = Products::find($id);
        $this->categories = Categories::all();
    }

    public function updateProduct()
    {
        $this->validate();

        if ($this->image) {
            $this->product->image = $this->image->store('images', 'public');
        }

        $this->product->save();

        session()->flash('message', 'Product updated successfully.');
        return redirect()->route('products');
    }

    public function render()
    {
        return view('livewire.admin.product.edit');
    }
}

