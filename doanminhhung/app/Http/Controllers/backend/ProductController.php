<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list =  Product::where('status','!=',0)->get();
        return view('backend.product.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product =  Product::all();
        $category = Category::where('status','1')->get();
        $brand = Brand::where('status','1')->get();
        $html1=$html2="";
        foreach($category as $item){
            $html1.="<option value='$item->id'>$item->name</option>";
        }
        foreach($brand as $item){
            $html2.="<option value='$item->id'>$item->name</option>";
        }
        return view('backend.product.create',compact('product','html1','html2'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->category_id=$request->category_id;
        $product->brand_id= 1;
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->price = $request->price;
        $product->price_sale= $request->price_sale;
        $files = $request->file('image');
        if($files != null){
            $extension = $files->getClientOriginalExtension();
                $filename = $product->slug .'.'.$extension;
                $product->image = $filename;
                $files->move(public_path('images/product'),$filename);
        }
        $product->detail = $request->detail;
        $product->qty = $request->qty;
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metadesc;
        // $product->created_by = 1;
        // $product->updated_by =1;
        $product->updated_by = 1;
        $product ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
        $product->status =  $request->status;
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('backend.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorys = Category::where('status',1)->get();
        $html='';
        foreach($categorys as $category){
            $html.="<option value='".$category->id."'>sau: ".$category->name."</option>";
        }
        $category = Category::find($id);
        return view('backend.category.edit',compact('category','html'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $files = $request->file('image');
        if($files != null){
            $extension = $files->getClientOriginalExtension();
                $filename = $product->slug .'.'.$extension;
                $product->image = $filename;
                $files->move(public_path('images/product'),$filename);
        }
        // $product->sort_order = $request->sort_order;
        $product->metakey = $request->metakey;
        $product->metadesc = $request->metades;
        // $product->created_by = 1;
        // $product->updated_by =1;
        $product->updated_by = 1;
        $product ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
        $product->status =  $request->status;
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.trash');
    }
    public function trash()
    {
        $products = Product::where('status','=','0')->orderBy('created_at','desc')->get();
        return view('backend.product.trash', compact ('products')) ;
    }
    public function delete($id)
    {
        $product = Product::find($id);
        if($product == NULL)
        {
            return redirect()->route('product.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       $product ->updated_by = 1;//đăng nhập
       $product ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $product ->status =0;
       $product->save();
       return redirect()->route('product.index')->with('message',['type' => 'danger','msg' =>'Xóa mẫu tin vào thùng rác thành công!']);
    }
    public function status(string $id)
    {
        $product = Product::find($id);
        $product->status = $product->status == 1 ? 2 : 1;
        $product->save();
        return redirect()->route('product.index');

    }
    public function restore($id)
    {
        $brand = Product::find($id);
        $brand->status = 2;
        $brand->save();
        return redirect()->route('product.trash');
    }
    
}