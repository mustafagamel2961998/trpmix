<?php

namespace App\View\Components\Admin\Dashboard\Layout;

use App\Models\Album;
use App\Models\Setting;
use App\Models\Singer;
use App\Models\Song;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Create a new component instance.
     */
    public $setting;
    public $lastAlbums;
    public $songs;

    public $songsCount;
    public $albumsCount;
    public $singersCount;
    public $usersCount;
    
    public function __construct(public $title)
    {
        $this->title = $title . ' - ' . config('app.name');
        $this->setting = Setting::query()->with('media')->first();
        $this->songs = Song::latest('id')->take(6)->get();
        $this->lastAlbums = Album::latest('id')->take(6)->get();
        $this->songsCount = Song::count();
        $this->albumsCount = Album::count();
        $this->singersCount = Singer::count();
        $this->usersCount = User::count();
    }
    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.dashboard.layout.layout');
    }
}
