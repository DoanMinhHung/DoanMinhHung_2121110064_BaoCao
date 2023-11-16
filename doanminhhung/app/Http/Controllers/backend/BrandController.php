<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Symfony\Polyfill\Intl\Idn\Resources\unidata\Regex;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list =  Brand::where('status','!=',0)->get();
        return view('backend.brand.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brand = Brand::all();
        return view('backend.brand.create',compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $files = $request->file('image');
        if($files != null){
            $extension = $files->getClientOriginalExtension();
                $filename = $brand->slug .'.'.$extension;
                $brand->image = $filename;
                $files->move(public_path('images/brand'),$filename);
        }

        $brand->sort_order = $request->sort_order;
        $brand->metakey = $request->metakey;
        $brand->metadesc = $request->metadesc;
        // $brand->created_by = 1;
        // $brand->updated_by =1;
        $brand->updated_by = 1;
        $brand ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
        $brand->status =  $request->status;
        $brand->save();
        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        return view('backend.brand.show',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brands = Brand::where('status',1)->get();
        $html='';
        foreach($brands as $brand){
            $html.="<option value='".$brand->id."'>sau: ".$brand->name."</option>";
        }
        $brand = Brand::find($id);
        return view('backend.brand.edit',compact('brand','html'));
    }
    public function status(string $id)
    {
        $brand = Brand::find($id);
        $brand->status = $brand->status == 1 ? 2 : 1;
        $brand->save();
        return redirect()->route('brand.index');

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $files = $request->file('image');
        if($files != null){
            $extension = $files->getClientOriginalExtension();
                $filename = $brand->slug .'.'.$extension;
                $brand->image = $filename;
                $files->move(public_path('images/brand'),$filename);
        }
        $brand->sort_order = $request->sort_order;
        $brand->metakey = $request->metakey;
        $brand->metadesc = $request->metades;
        // $brand->created_by = 1;
        // $brand->updated_by =1;
        $brand->updated_by = 1;
        $brand ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
        $brand->status =  $request->status;
        $brand->save();
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($id)
    // {
    //     // Call to a member function delete() on null:: khai báo delete là ok

    //     $brand = Brand::find($id);
    //     if($brand == NULL)
    //     {
    //         return redirect()->route('brand.trash')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
    //     }
    //    if($brand->delete())
    //    {
    //         // có 2 điều kiện xóa: 
    //         $link = Link::where([['type','=',1],['table_id','=', $id]])->first();
    //         $link ->delete();
    //         print_r($link);
    //    }
    //    return redirect()->route('brand.trash')->with('message',['type' => 'danger','msg' =>'xóa khỏi CSDL thành công!']);
    // }
    public function trash()
    {
        $brands = Brand::where('status','=','0')->orderBy('created_at','desc')->get();
        return view('backend.brand.trash', compact ('brands')) ;
    }
    public function restore($id)
    {
        $brand = Brand::find($id);
        $brand->status = 2;
        $brand->save();
        return redirect()->route('brand.trash');
    }
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('brand.trash');
    }
    public function delete($id)
    {
        $brand = Brand::find($id);
        if($brand == NULL)
        {
            return redirect()->route('brand.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       $brand ->updated_by = 1;//đăng nhập
       $brand ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $brand ->status =0;
       $brand->save();
       return redirect()->route('brand.index')->with('message',['type' => 'danger','msg' =>'Xóa mẫu tin vào thùng rác thành công!']);
    }
    
}