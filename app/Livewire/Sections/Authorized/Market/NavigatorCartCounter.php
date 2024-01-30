<?php

namespace App\Livewire\Sections\Authorized\Market;
use Livewire\Component;
use App\Models\CartProduct;

class NavigatorCartCounter extends Component {
    public $counter = 0;

    public function render() {
        $products_amount = CartProduct::where('user_id', auth()->user()->id)->pluck('amount')->toArray();

        $this->counter = array_sum($products_amount);
        
        return view('livewire.sections.authorized.market.navigator-cart-counter');
    }
}
