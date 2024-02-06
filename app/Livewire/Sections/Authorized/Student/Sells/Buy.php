<?php

namespace App\Livewire\Sections\Authorized\Student\Sells;
use App\Models\Order; 
use App\Models\OrderProduct;  
use Livewire\WithPagination;
use Livewire\Component;

class Buy extends Component {
    protected $orders = []; 

    public function render() {
        $this->orders = Order::where('buyer_company_id', auth()->user()->current_company)->paginate(15); 
        
        return view('livewire.sections.authorized.student.sells.buy');
    }
}
