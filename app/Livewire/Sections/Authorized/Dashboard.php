<?php

namespace App\Livewire\Sections\Authorized;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Announcement;

class Dashboard extends Component {
    use WithPagination;

    protected $announcements = [];
    
    public $default_page = "Comunicados";

    public $pages = [
        "Comunicados", "Documentación"
    ]; 

    public function render() {
        $this->announcements = Announcement::where("status", "published")->orderBy('fixed', 'desc')->orderBy("updated_at", "desc")->paginate(5);

        return view('livewire.sections.authorized.dashboard');
    }
}
