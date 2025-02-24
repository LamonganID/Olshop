<?php

namespace App\Livewire\Admin\Product;

use App\Models\Products;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Title('Edit Product')]
#[Layout('layouts.app')]

class Edit extends Component
{
    use WithFileUploads;
    public $product;

    protected $rules = [
        'product.name' => 'required|string|max:255',
        'product.category_id' => 'required|exists:categories,id',
        'product.price' => 'required|numeric',
        'product.stock' => 'required|integer',
        'product.description' => 'nullable|string',
    ];

    public function mount($id)
    {
        $this->product = Products::find($id);
    }

    public function updateProduct()
    {
        $this->validate();

        $this->product->save();

        session()->flash('message', 'Product updated successfully.');
        return redirect()->route('products');
    }

    public function render()
    {
        return view('livewire.admin.product.edit');
    }
}
