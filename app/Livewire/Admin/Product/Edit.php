<?php

namespace App\Livewire\Admin\Product;

use App\Models\Products;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Title('Edit Product')]

class Edit extends Component
{
    use WithFileUploads;
    public $product;
    public Index $Index;

    public function render($id)
    {
        return view('livewire.admin.product.edit');
    }
}
