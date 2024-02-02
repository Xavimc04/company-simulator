<?php

namespace App\Livewire\Sections\Authorized\Market;
use Livewire\Component;
use App\Models\CartProduct; 
use App\Models\Product;
use App\Models\Company; 

class ShoppingCart extends Component {
    protected $items = []; 

    public function render() {
        $this->items = CartProduct::where('user_id', auth()->user()->id)->get();

        return view('livewire.sections.authorized.market.shopping-cart');
    }
}
