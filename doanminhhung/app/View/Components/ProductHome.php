<?php


namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

class ProductHome extends Component
{
    private $row_cat = null;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cat)
    {
        $this->row_cat = $cat;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View|Closure|string
    {
        $category = $this->row_cat;
        //
        $listcatid = array();
        array_push($listcatid, $category->id);
        $list_category1 = Category::where([['parent_id', '=', $category->id], ['status', '=', 1]])->get();
        if (count($list_category1)) {
            foreach ($list_category1 as $category1) {
                array_push($listcatid, $category1->id);
                $list_category2 = Category::where([['parent_id', '=', $category1->id], ['status', '=', 1]])->get();
                if (count($list_category2)) {
                    foreach ($list_category2 as $category2) {
                        array_push($listcatid, $category2->id);
                        $list_category3=Category::where([['parent_id', '=', $category2->id], ['status', '=', 1]])->get();
                        if (count($list_category3))
                        {
                            foreach ($list_category3 as $category3)
                            {
                                array_push($listcatid, $category3->id);
                            }
                        }
                    }
                }
            }
        }
        $count=Product::where('status', 1)
        ->whereIn('category_id', $listcatid)->count();
        $limit=4;
        // $limit=($count<6)?3:$limit;
        // $limit=($count<3)?0:$limit;
        // print_r($listcatid);
        $list_product = Product::where('status', 1)
        ->whereIn('category_id', $listcatid)
        ->orderBy('created_at', 'DESC')
        ->limit($limit)
        ->get();

        return view('components.product-home', compact('category', 'list_product'));
    }
}