<?php
namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Products;
use App\Models\Categories;

class ProductForm extends Component
{
    use WithFileUploads;

    public $productId, $name, $slug, $description, $price, $stock, $image, $categories_id;
    public $isEdit = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'slug' => 'required|string|unique:products,slug',
        'description' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'nullable|image|max:2048',
        'categories_id' => 'required|exists:categories,id',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $this->isEdit = true;
            $product = Product::findOrFail($id);
            $this->productId = $product->id;
            $this->name = $product->name;
            $this->slug = $product->slug;
            $this->description = $product->description;
            $this->price = $product->price;
            $this->stock = $product->stock;
            $this->categories_id = $product->categories_id;
        }
    }

    public function save()
    {
        $this->validate();

        $imagePath = $this->image ? $this->image->store('products', 'public') : null;

        if ($this->isEdit) {
            $product = Product::findOrFail($this->productId);
            $product->update([
                'name' => $this->name,
                'slug' => $this->slug,
                'description' => $this->description,
                'price' => $this->price,
                'stock' => $this->stock,
                'image' => $imagePath ?: $product->image,
                'categories_id' => $this->categories_id,
            ]);
            session()->flash('message', 'Produk berhasil diperbarui!');
        } else {
            Products::create([
                'name' => $this->name,
                'slug' => $this->slug,
                'description' => $this->description,
                'price' => $this->price,
                'stock' => $this->stock,
                'image' => $imagePath,
                'categories_id' => $this->categories_id,
            ]);
            session()->flash('message', 'Produk berhasil ditambahkan!');
        }

        return redirect()->route('admin.products');
    }

    public function render()
    {
        return view('livewire.admin.product-form', [
            'categories' => Categories::all()
        ]);
    }
}
