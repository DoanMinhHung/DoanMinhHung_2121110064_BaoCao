<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = User::where('status','!=',0)->get();
        return view('backend.user.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->roles =1;
        $user->password = $request->password;
        $user->username = $request->username;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->email = $request->email;

        $files = $request->file('image');
        if($files != null){
            $extension = $files->getClientOriginalExtension();
                $filename = $user->slug .'.'.$extension;
                $user->image = $filename;
                $files->move(public_path('images/user'),$filename);
        }
        else{
            return redirect()->route('user.index')->with('message', ['type'=>'danger', 'msg'=>'Định dạng này không đúng']);
        }
        $user->created_by = 1;
        $user->updated_by =1;
        $user->status =  $request->status;
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('backend.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        $users = User::where('status','=','2')->get();
        $html='';
        foreach($users as $item){
            $html.='<option value="'.$item->id+1 .'">Sau: '.$item->name.'</option>';
        }
        return view('backend.user.edit',compact('html','user'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->slug = Str::slug($user->name, '-');
        $user->sort_order = $request->sort_order;
        $user->metakey = $request->metakey;
        $user->metadesc = $request->metades;
        $user->created_by = 1;
        $user->updated_by = 1;
        $image = $request->file('image');
        if (isset($image)) {
            $filename = $user->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/user '), $filename);
            $user->image = $filename;
        }
       
        $user->save();
           
        return redirect()->route('user.index')->with('message',['type' => 'succcess','msg' =>'Thành Công']);
        return redirect()->route('user.index');
         return redirect()->route('user.index')->with('message',['type' => 'succcess','msg' =>'Thành Công']);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Call to a member function delete() on null:: khai báo delete là ok

        $user = User::find($id);
        if($user == NULL)
        {
            return redirect()->route('user.trash')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
        }
       $user->delete();
       return redirect()->route('user.trash')->with('message',['type' => 'danger','msg' =>'xóa khỏi CSDL thành công!']);
    }
    
    public function trash()
    {
        $user = User::where('status',0)->get();
        return view('backend.user.trash', compact ('user')) ;
    }
    public function delete($id)
    {
        $user = User::find($id);
        if($user == NULL)
        {
            return redirect()->route('user.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       $user ->updated_by = 1;//đăng nhập
       $user ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $user ->status =0;
       $user->save();
       return redirect()->route('user.index')->with('message',['type' => 'danger','msg' =>'Xóa mẫu tin vào thùng rác thành công!']);
    }
  
    public function restore($id)
    {
        $user = User::find($id);
        if($user==null){
            return redirect()->route('user.index')->with('message',['type' => 'success','msg' =>'Mẫu tin không tồn tại']);
        }
        $user->status=2;
        $user->updated_by=1;
        $user->updated_at==date('Y-m-d H:i:s');
        $user->save();
        return redirect()->route('user.trash')->with('message',['type' => 'danger','msg' =>'Khôi phục thành công']);  
    }

    public function status($id)
    {
        $row = User::find($id);
        if($row == NULL)
        {
            return redirect()->route('user.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       
       $row ->status =($row->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $row->save();
       return redirect()->route('user.index')->with('message',['type' => 'danger','msg' =>'Thay đổi trạng thái thành công!']);
    }
}
