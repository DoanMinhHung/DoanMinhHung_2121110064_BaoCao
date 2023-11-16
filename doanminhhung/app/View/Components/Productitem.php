<?php


namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductItem extends Component
{
    private $row_product=null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($productitem)
    {
        $this->row_product=$productitem;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View|Closure|string
    {
        $product=$this->row_product;
        return view('components.productitem',compact('product'));
    }
}