<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Contact;

use App\Http\Requests\StoreContactRequest;

use App\Http\Requests\UpdateContactRequest;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {                       
        $title ='Danh sách sản phẩm';                                                                                                             #$title...
        $list = Contact::where('status','<>','0')->get();                                                                                       #orwhere la them 1 dieu kien nua {get lay nhieu mau tin} ['tenbien' => $list,'tieude' => $title]  ,compact($list)
        return view('backend.contact.index',compact('list','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Contact::where('status','<>','0')->orderBy('created_at','asc')->get();  
       
        $title ='Tạo';
        return view("backend.contact.create", compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category=new Contact();
        $category->user_id=1;
        $category->name=$request->name;
        $category->email=$request->email;
        $category->phone=$request->phone;
        $category->title=$request->title;
        $category->content=$request->title; 
        $category->replay_id=1;    
        
        $category->created_at=date('Y-m-n H:i:s');
        $category->updated_at=date('Y-m-n H:i:s');
        $category->updated_by=Auth::id();
        $category->status=1;

        $category->save();
        return redirect()->route('contact.index')->with('message',['type'=>'success','mgs'=>'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Contact::find($id);                                                                                           //$row1=Category::where([['id','=',$id],['status','!=',0]])..
        if($row == NULL)
        {
            return redirect()->route('contact.index')->with('message',['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }
        $title = "Chi tiết mãu tin";
        return view('backend.contact.show',compact('row','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Contact::find($id);                                                                                           //$row1=brand::where([['id','=',$id],['status','!=',0]])..
        if($row == NULL)
        {
            return redirect()->route('contact.index')->with('message',['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }
        $list = Contact ::where('status','<>','0')->orderBy('created_at','desc')->get();  
        $title = "Cập nhập mẫu tin";
        return view('backend.contact.edit',compact('row','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Contact::find($id);                                                                                           //$row1=brand::where([['id','=',$id],['status','!=',0]])..
        if($row == NULL)
        {
            return redirect()-> route('contact.index')->with('message',['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }
        
        $row->name=$request->name;
        $row->email=$request->email;
        $row->phone=$request->phone;
        $row->title=$request->title;
        // $row->detail=$request->title;     
        
        $row->created_at=date('Y-m-n H:i:s');
        $row->updated_at=date('Y-m-n H:i:s');
        $row->updated_by=Auth::id();
        $row->status=1;

        $row->save();
        return redirect()->route('contact.index')->with('message',['type' => 'success', 'mgs' => 'Cập nhập thành công']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $row = Contact::find($id);
        if($row == NULL)
        {
            return redirect()->route('contact.index')->with('message',['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }
        $row->delete();
            return redirect()->route('contact.index')->with('message', ['type' => 'success', 'mgs' => 'Xóa sản phẩm thành công']);

    }
    public function trash()
    {                                                                                                        
        $list = Contact::where('status','=','0')->orderBy('created_at','asc')->get();                                                                                   #orwhere la them 1 dieu kien nua {get lay nhieu mau tin} ['tenbien' => $list,'tieude' => $title]  ,compact($list)
        return view('backend.contact.trash',compact('list'));
    }

    public function status($id)
    {
        $row = Contact::find($id);
        if($row == NULL)
        {
            return redirect()->route('contact.index')->with('message',['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }

        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by= 1;
        $row->status=($row ->status == 1)? 2 : 1;

        $row ->save();
        return redirect()->route('contact.index')->with('message', ['type' => 'success', 'mgs' => 'Thay đổi trạng thái thành công']);
    }

    public function delete($id)
    {
        $row = Contact::find($id);
        if($row == NULL)
        {
            return redirect()->route('contact.index')->with('message',['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }

        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by= 1;
        $row->status=0;

        $row ->save();
        return redirect()->route('contact.index')->with('message', ['type' => 'success', 'mgs' => 'Xoá vào thùng rác thành công']);
    }
    

    public function restore($id)
    {
    $row = Contact::find($id);
        if($row == NULL)
        {
            return redirect()->route('contact.index')->with('message',['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }

        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by= 1;
        $row->status=($row ->status == 1)? 2 : 1;

        $row ->save();
        return redirect()->route('contact.index')->with('message', ['type' => 'success', 'mgs' => 'Khôi phục thành công']);
    }
}