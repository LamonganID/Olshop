<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Products;
use App\Models\Categories; // Ensure Categories model is imported
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Symfony\Contracts\Service\Attribute\Required;

#[Layout('layouts.app')]
#[Title('Edit Product')]
class Edit extends Component
{
    #[Required('string|max:255|min:3')]
    public string $name;
    #[Required('string|max:255|min:5')]
    public string $size;
    #[Required('categories_id')]
    public string $categories_id;
    #[Required('numeric|5')]
    public $price;
    #[Required('numeric|5')]
    public $stock;
    #[Required('string|max:255|min:5')]
    public $description;
    #[Required('image|max:2048')]
    public $image;

    public $categories; // Declare the categories property

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048'
        ]);
    }

    public function mount($id)
    {
        $this->categories = Categories::all(); // Fetch all categories

        $product = Products::find($id);
        $this->name = $product->name;
        $this->size = $product->size;
        $this->categories_id = $product->categories_id;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->description = $product->description;
        $this->image = $product->image;
    }

    public function update($id)
    {
        $this->validate([
            'name' => 'required|string|max:255|min:3',
            'size' => 'required|string|max:255|min:5',
            'categories_id' => 'required',
            'price' => 'required|numeric|5',
            'stock' => 'required|numeric|5',
            'description' => 'required|string|max:255|min:5',
            'image' => 'required|image|max:2048'
        ]);

        $product = Products::find($id);
        $product->name = $this->name;
        $product->size = $this->size;
        $product->categories_id = $this->categories_id;
        $product->price = $this->price;
        $product->stock = $this->stock;
        $product->description = $this->description;
        $product->image = $this->image;
        $product->save();

        session()->flash('message', 'Product Updated Successfully.');
        return redirect()->route('products');
    }

    public function render()
    {
        return view('livewire.admin.product.edit', [
            'categories' => $this->categories, // Pass categories to the view
        ]);
    }
}
