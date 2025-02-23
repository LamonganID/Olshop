<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Products;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Products')]
#[Layout('layouts.app')]
class Index extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Products::with('category')->get();
    }

    public function deleteProduct($id)
    {
        $product = Products::find($id);
        $product->delete();
        $this->products = Products::with('category')->get();
    }

    public function render()
    {
        return view('livewire.admin.product.index');
    }
}

