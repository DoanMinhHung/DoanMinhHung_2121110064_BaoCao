<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Link;
use Illuminate\Support\Str;

class MenuController extends Controller
{ 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list =  Menu::where('status','!=',0)->get();
        return view('backend.menu.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menu = Menu::all();
        return view('backend.menu.create',compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->link = "index.php/menu/";
        $menu->table_id = 1;
        $menu->type = $request->type;
        // $menu->created_by = 1;
        // $menu->updated_by =1;
        $menu ->updated_by = 1;//đăng nhập
       $menu ->updated_at =date('Y-m-d H:i:s');
        $menu->status =  $request->status;
        $menu->save();
        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu = Menu::find($id);
        return view('backend.menu.show',compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::find($id);
        $menus = Menu::where('status','=','2')->get();
        $html='';
        foreach($menus as $item){
            $html.='<option value="'.$item->id+1 .'">Sau: '.$item->name.'</option>';
        }
        return view('backend.menu.edit',compact('html','menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::find($id);
        $menu->name = $request->name;
        // $menu->sort_order=  $request->sort_order ?? 0;
        $menu->table_id = 1;
        $menu->link = 1;
        $menu->type = 1;
        // $menu->postion = $request->rank;
        $menu->save();
        return redirect()->route('menu.index')->with('success', 'cập nhật menu thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('menu.trash');
    }
    public function trash()
    {
        $menus = Menu::where('status',0)->get();
        return view('backend.menu.trash', compact ('menus')) ;
    }
    public function delete($id)
    {
        $menu = Menu::find($id);
        if($menu == NULL)
        {
            return redirect()->route('menu.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       $menu ->updated_by = 1;//đăng nhập
       $menu ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $menu ->status =0;
       $menu->save();
       return redirect()->route('menu.index')->with('message',['type' => 'danger','msg' =>'Xóa mẫu tin vào thùng rác thành công!']);
    }
    // {
    //     $menu = menu::find($id);
    //     $menu->status = 0;
    //     $menu->save();
    //     return redirect()->route('menu.index');    
    // }
   
    public function restore($id)
    {
        $menu = Menu::find($id);
        if($menu==null){
            return redirect()->route('menu.index')->with('message',['type' => 'success','msg' =>'Mẫu tin không tồn tại']);
        }
        $menu->status=2;
        $menu->updated_by=1;
        $menu->updated_at==date('Y-m-d H:i:s');
        $menu->save();
        return redirect()->route('menu.trash')->with('message',['type' => 'danger','msg' =>'Khôi phục thành công']);  
    }

    public function status($id)
    {
        $menu = Menu::find($id);
        if($menu == NULL)
        {
            return redirect()->route('menu.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       $menu ->updated_by = 1;//đăng nhập
       $menu ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $menu ->status =($menu->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $menu->save();
       return redirect()->route('menu.index')->with('message',['type' => 'danger','msg' =>'Thay đổi trạng thái thành công!']);
    }
}
