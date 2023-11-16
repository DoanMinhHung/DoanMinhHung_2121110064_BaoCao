<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Slider;


class SlideShow extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $slider = Slider::where([['status',1]])->get();
        // print_r($slider);
        return view('components.slide-show',compact('slider'));
    }
}
