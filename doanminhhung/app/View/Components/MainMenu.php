<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class MainMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $arg = [
            ['status', '=', 1],
            ['type', '=', 'mainmenu'],
            ['table_id', '=', 0]
        ];
        $menus = Menu::where($arg)->get();
        return view('components.main-menu', compact('menus'));
    }
}
