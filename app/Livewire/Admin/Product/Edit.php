<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\WithFileUploads; 
use App\Models\Products;
use App\Models\Categories; 
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Symfony\Contracts\Service\Attribute\Required;

#[Layout('layouts.app')]
#[Title('Edit Product')]
class Edit extends Component
{
    use WithFileUploads; 


    #[Required('string|max:255|min:3')]
    public string $name;
    #[Required('string|max:255')]
    public string $size;
    #[Required('categories_id')]
    public string $categories_id;
    #[Required('numeric|5')]
    public $price;
    #[Required('numeric|5')]
    public $stock;
    #[Required('string|max:9')]
    public $description;
    #[Required('image|max:2048')]
    public $image;

    public $categories;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048'
        ]);
    }

    public $productId;

    public function mount($id)
    {
        $this->productId = $id; 
        $this->categories = Categories::all();
    
        $product = Products::find($id);
        if (!$product) {
            return redirect()->route('products')->with('error', 'Product not found.');
        }
    
        $this->name = $product->name;
        $this->size = $product->size;
        $this->categories_id = $product->categories_id;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->description = $product->description;
        $this->image = $product->image;
    }
    
    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255|min:3',
            'size' => 'required|string|max:255|min:5',
            'categories_id' => 'required',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|numeric|min:1',
            'description' => 'required|string|max:255|min:5',
            'image' => 'nullable|image|max:2048'
        ]);
    
        $product = Products::find($this->productId);
        if (!$product) {
            return redirect()->route('products')->with('error', 'Product not found.');
        }
    
        $product->name = $this->name;
        $product->size = $this->size;
        $product->categories_id = $this->categories_id;
        $product->price = $this->price;
        $product->stock = $this->stock;
        $product->description = $this->description;
    
        if ($this->image) {
            $product->image = $this->image->store('products', 'public'); 
        }
    
        $product->save();
    
        session()->flash('message', 'Product Updated Successfully.');
        return redirect()->route('products');
    }
    
    public function render()
    {
        return view('livewire.admin.product.edit', [
            'categories' => $this->categories,
        ]);
    }
}
