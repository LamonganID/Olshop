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

protected $listeners = ['deleteProduct' => 'deleteProduct', 'productDeleted' => 'refreshProducts'];

    
    public function mount()
    {
        $this->products = Products::with('category')->orderBy('created_at', 'desc')->get();
    }

    public function deleteProduct($id): void
    {
        $product = Products::find($id);
        $product->delete();
        $this->refreshProducts();
    }

    public function refreshProducts()
    {
        $this->products = Products::with('category')->orderBy('created_at', 'desc')->get();
    }

    public function edit($id)
    {
        return redirect()->route('products.edit', ['id' => $id]);
    }

    public function confirmDelete($id)
    {
        $this->deleteProduct($id);
    }

    public function render()

    {
        return view('livewire.admin.product.index');
    }
}
