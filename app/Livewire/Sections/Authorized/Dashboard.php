<?php

namespace App\Livewire\Sections\Authorized;
use Livewire\Component; 
use App\Models\Announcement;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Dashboard extends Component { 
    use WithPagination;

    /* @ Announcements */
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

    /* @ Documentation */
    public $directory = "", $folders = [], $files = [];

    public function addDirectory($string) {
        $this->directory = $this->directory . '/' . $string;
    }

    public function setDirectory($string) {
        if(!$string) {
            $this->directory = "";
            return;
        }

        if($string == 'Inicio') {
            $this->directory = "";
            return;
        }

        $this->directory = $string;
    }

    public function render() {
        /* @ Announcements */
        $this->last_announcements = Announcement::where("status", "published")
        ->where('fixed', 0)
        ->orderBy("updated_at", "desc") 
        ->paginate(7);

        $this->fixed_announcements = Announcement::where("status", "published")
        ->where('fixed', 1)
        ->orderBy('level', 'desc')
        ->orderBy("updated_at", "desc")
        ->get();

        /* @ Documentation */
        $this->folders = Storage::directories("documentation/" . $this->directory);
        $this->files = Storage::files("documentation/" . $this->directory);

        return view('livewire.sections.authorized.dashboard');
    }
}
