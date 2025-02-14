<?php

namespace App\Livewire\Admin;

use Doctrine\Inflector\Rules\English\Rules;
use Livewire\Component;
use App\Models\Products;
use App\Models\Categories;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Rules('required')]

#[Title('Production') ]
class Product extends Component
{
    use WithPagination,WithFileUploads;

    public $name,$categories_id,$description,$price,$stock,$image;
    public $products_id;
    public $isEdit=false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'categories_id' => 'required|exists:categories,id',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|max:2048',
    ];

    public function render()
    {
        return view('livewire.admin.product', [
            'products'=>Products::latest()->paginate(5),
            'categories_id'=>Categories::all(),
        ]);
    }

    public function create(){
        $this->reset();
        $this->isEdit=false;
    }

    public function store(){
        $this->validate([
            'name' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ]);
        $imagePath=$this->image ? $this->image->store('products', 'public'):null;

        Products::create([
            'name'=>$this->name,
            'categories_id'=>$this->categories_id,
            'description'=>$this->description,
            'stock'=>$this->stock,
            'image'=>$imagePath,
            'price'=>$this->price
        ]);
        
        session()->flash('massage','Product berhasil di tambahkan');
        $this->resetInput();
    }

    public function edit($id){
        $products = Products::find($id);
        if (!$products) {
            session()->flash('error', 'Product not found.');
            return;
        }
        $this-> products_id = $products -> id;
        $this-> name = $products -> name;
        $this-> categories_id = $products -> categories_id;
        $this-> description = $products -> description;
        $this-> price = $products -> price;
        $this-> stock = $products -> stock;
        $this-> image = $products -> image;
        $this-> isEdit =true;
    }

    public function update(){
        $this->validate([
            'name' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $products = Products::findOrFail($this->products_id);
        $imagePath = $this->image ? $this->image->store('products', 'public') : $products->image;
        $products->update([
            'name' => $this-> name,
            'categories_id' => $this->categories_id,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'image' => $imagePath,
        ]);

        session()->flash('massage', 'Berhasil di Ubah');
        $this->resetInput();
    }

    public function delete($id){
        Products::destroy($id);
        session()->flash('massage', 'berhasil di hapus');
    }

    public function resetInput(){
        $this -> name = '';
        $this -> categories_id = '';
        $this -> description = '';
        $this -> price = '';
        $this -> stock = '';
        $this -> products_id = null;
        $this -> image = null ; 
    }
}
