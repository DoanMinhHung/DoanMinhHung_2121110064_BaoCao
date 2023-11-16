<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Str;
use App\Models\Link;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list =  Category::where('status','!=',0)->get();
        return view('backend.category.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        
        return view('backend.category.create',compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->parent_id = $request->parent_id;
        $files = $request->file('image');
        if($files != null){
            $extension = $files->getClientOriginalExtension();
                $filename = $category->slug .'.'.$extension;
                $category->image = $filename;
                $files->move(public_path('images/category'),$filename);
        }
        $category->sort_order = $request->sort_order;
        $category->metakey = $request->metakey;
        $category->metadesc = $request->metadesc;
        // $category->created_by = 1;
        // $category->updated_by =1;
        $category ->updated_by = 1;//đăng nhập
        $category ->updated_at =date('Y-m-d H:i:s');
        $category->status =  $request->status;
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('backend.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        $categorys = Category::where('status','=','1')->get();
        $html='';
        foreach($categorys as $item){
            $html.='<option value="'.$item->id+1 .'">Sau: '.$item->name.'</option>';
        }
        return view('backend.category.edit',compact('html','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $files = $request->file('image');
        if($files != null){
            $extension = $files->getClientOriginalExtension();
                $filename = $category->slug .'.'.$extension;
                $category->image = $filename;
                $files->move(public_path('images/category'),$filename);
        }
        $category->sort_order = $request->sort_order;
        $category->metakey = $request->metakey;
        $category->metadesc = $request->metades;
        // $category->created_by = 1;
        // $category->updated_by =1;
        $category->updated_by = 1;
        $category ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
        $category->status =  $request->status;
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.trash');
    }
    public function trash()
    {
        $categorys = Category::where('status',0)->get();
        return view('backend.category.trash', compact ('categorys')) ;
    }
    public function delete($id)
    {
        $category = Category::find($id);
        if($category == NULL)
        {
            return redirect()->route('category.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       $category ->updated_by = 1;//đăng nhập
       $category ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $category ->status =0;
       $category->save();
       return redirect()->route('category.index')->with('message',['type' => 'danger','msg' =>'Xóa mẫu tin vào thùng rác thành công!']);
    }
    // {
    //     $category = category::find($id);
    //     $category->status = 0;
    //     $category->save();
    //     return redirect()->route('category.index');    
    // }
   
    public function restore($id)
    {
        $category = Category::find($id);
        $category->status = 2;
        $category->save();
        return redirect()->route('category.trash');
    }

    public function status($id)
    {
        $category = Category::find($id);
        if($category == NULL)
        {
            return redirect()->route('category.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       $category ->updated_by = 1;//đăng nhập
       $category ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $category ->status =($category->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $category->save();
       return redirect()->route('category.index')->with('message',['type' => 'danger','msg' =>'Thay đổi trạng thái thành công!']);
    }
}