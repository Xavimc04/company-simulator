<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sidebar extends Component {
    public $company; 

    public function __construct($company = null) {
        $this->company = $company; 
    }

    public function render(): View|Closure|string {
        return view('components.sidebar-component');
    }
}
