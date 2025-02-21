<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use function Livewire\Volt\rules;

#[Title('Create Product')]
class Create extends Component
{
    use WithFileUploads;
    public $product;
    public $categories;
    public $price;
    public $stock;

    public function rules(){

    }
    
    public function render()
    {
        return view('livewire.admin.product.create');
    }
}
