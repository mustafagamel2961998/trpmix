<?php

namespace App\View\Components\User\Layout;

use App\Models\Adwebsite;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Create a new component instance.
     */
    public $setting;
    public $adswebsite;
    public function __construct(public $title)
    {
        $this->title = $title . ' - ' . config('app.name');
        $this->setting = Setting::query()->with('media')->first();
        $this->adswebsite = Adwebsite::with('media')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.layout.layout');
    }
}
