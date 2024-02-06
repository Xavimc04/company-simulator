<?php

namespace App\Livewire\Sections\Authorized\Student\Sells;
use App\Models\Order; 
use App\Models\OrderProduct; 
use Livewire\Component;
use Livewire\WithPagination;

class Sells extends Component {
    protected $orders = []; 

    public function render() {
        $this->orders = Order::where('seller_company_id', auth()->user()->current_company)->paginate(15); 
        
        return view('livewire.sections.authorized.student.sells.sells');
    }
}
