<?php

namespace App\Livewire\Sections\Authorized;
use Livewire\Component; 
use App\Models\Announcement;
use Livewire\WithPagination;

class Dashboard extends Component { 
    use WithPagination;

    protected $last_announcements = [], $fixed_announcements = [];
    
    public $levels = [
        0 => "Baja", 
        1 => "Media",
        2 => "Alta",
    ];

    public $default_page = "Comunicados";

    public $pages = [
        "Comunicados", "Documentación"
    ]; 

    public function getLevelColor($level) {
        switch($level) {
            case 0:
                return "gray";
            case 1:
                return "orange";
            case 2:
                return "red";
        }
    }

    public function render() {
        $this->last_announcements = Announcement::where("status", "published")
        ->where('fixed', 0)
        ->orderBy("updated_at", "desc") 
        ->paginate(7);

        $this->fixed_announcements = Announcement::where("status", "published")
        ->where('fixed', 1)
        ->orderBy('level', 'desc')
        ->orderBy("updated_at", "desc")
        ->get();

        return view('livewire.sections.authorized.dashboard');
    }
}
