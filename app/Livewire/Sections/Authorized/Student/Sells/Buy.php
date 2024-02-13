<?php

namespace App\Livewire\Sections\Authorized\Student\Sells;
use App\Models\Order; 
use App\Models\OrderProduct;  
use Livewire\WithPagination;
use Livewire\Component;

class Buy extends Component {
    public $managing, $current_order;

    protected $orders = []; 
    
    public function manage($identifier) { 
        try {
            $this->managing = true;
            $this->current_order = Order::find($identifier);
        } catch (\Exception $e) {
            $this->managing = null;
        }
    }

    public function confirm() {
        try {
            $this->current_order->update(['status' => 'managed']);
            $this->managing = null;
        } catch (\Exception $e) {
            $this->managing = null;
        }
    }

    public function render() {
        $this->orders = Order::where('buyer_company_id', auth()->user()->current_company)->paginate(15); 
        
        return view('livewire.sections.authorized.student.sells.buy');
    }
}
