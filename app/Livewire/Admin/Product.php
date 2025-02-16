<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

#[Title('Product')]
class Product extends Component
{
    public $slug;
    public function render()
    {
        return view('livewire.admin.product');
    }

    public function valid(){
        
    }
}
