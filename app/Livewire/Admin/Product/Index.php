<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Create')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.product.index');
    }
}
