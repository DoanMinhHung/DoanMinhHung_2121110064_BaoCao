<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title ='Danh sách sản phẩm';                                                                                                             #$title...
        $list = Post::where('status','<>','0')->get();                                                                                       #orwhere la them 1 dieu kien nua {get lay nhieu mau tin} ['tenbien' => $list,'tieude' => $title]  ,compact($list)
        return view('backend.post.index',compact('list','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $title ='Tạo';
        $list = Post ::where('status','<>','1')->orderBy('created_at','desc')->get();  

        $html = '';
        foreach($list as $item)
        {
            $html .= "<option value =''" . $item->id ."'>" .$item ->type . "</option>";
        }
        return view("backend.post.create", compact( 'title','html'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post ->title = $request->title;
        $post ->slug = Str::of($request->title)->slug('-');;
        $post ->detail = $request->detail;
        $post ->topic_id = $request->topic_id;
        //$post ->image = $request->image;
        $post ->type = $request->type;
        $post->metakey = $request->metakey;
        $post->metadesc=$request->metadesc;
        $post->created_at=date('Y-m-d H:i:s');
        $post->created_by= 1;
        $post->updated_by= Auth::id();
        $post->updated_at= date('Y-m-d H:i:s');
        $post->status=2;
        
        $file = $request->file('image');
        if($file!= NULL)
        {
            var_dump('file');
             $extention = $file ->getClientOriginalExtension();
             if(in_array($extention, ['png', 'jpg']))
             {
                $fileName = $post ->slug. '.'.$extention;
                $file->move(public_path('images/post'),$fileName);
                $post->image = $fileName;
                //$brand ->image = $request->image;
             }
        }


        $post->save();
        return redirect()->route('post.index')->with('message',['type' => 'success', 'mgs' => 'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        {
            $row = Post::find($id);                                                                                           //$row1=Category::where([['id','=',$id],['status','!=',0]])..
            if($row == NULL)
            {
                return redirect()->route('post.index')->with('message',['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
            }
            $title = "Chi tiết mãu tin";
            return view('backend.post.show',compact('row','title'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Post::find($id);                                                                                           //$row1=brand::where([['id','=',$id],['status','!=',0]])..
        if($row == NULL)
        {
            return redirect()->route('post.index')->with('message',['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }
        $list = Post ::where('status','<>','0')->orderBy('created_at','desc')->get();  


        $title = "Cập nhập mẫu tin";
        return view('backend.post.edit',compact('row','title',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Post::find($id);                                                                                           //$row1=brand::where([['id','=',$id],['status','!=',0]])..
        if($row == NULL)
        {
            return redirect()->route('post.index')->with('message',['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }

        $row ->title = $request->title;
        $row ->slug = Str::of($request->title)->slug('-');;
        $row ->detail = $request->detail;
        //$row ->level = $request->level;
        //$row ->image = $request->image;
        $row ->type = $request->type;
        $row->metakey = $request->metakey;
        $row->metadesc=$request->metadesc;
        $row->created_at=date('Y-m-d H:i:s');
        $row->created_by= 1;
        $row->updated_by= Auth::id();
        $row->updated_at= date('Y-m-d H:i:s');
        $row->status=2;
        
        $file = $request->file('image');
        if($file!= NULL)
        {
            var_dump('file');
             $extention = $file ->getClientOriginalExtension();
             if(in_array($extention, ['png', 'jpg']))
             {
                $fileName = $row ->slug. '.'.$extention;
                $file->move(public_path('images/post'),$fileName);
                $row->image = $fileName;
                //$brand ->image = $request->image;
             }
        }
        $row->save();
        return redirect()->route('post.index')->with('message',['type' => 'success', 'mgs' => 'Cập nhập thành công']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $row = Post::find($id);
        if($row == NULL)
        {
            return redirect()->route('post.index')->with('message',['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }
        $row->delete();
            return redirect()->route('post.index')->with('message', ['type' => 'success', 'mgs' => 'Xóa sản phẩm thành công']);

    }
    public function trash()
    {                                                                                                        
        $list = Post::where('status','=','0')->orderBy('created_at','asc')->get();                                                                                   #orwhere la them 1 dieu kien nua {get lay nhieu mau tin} ['tenbien' => $list,'tieude' => $title]  ,compact($list)
        return view('backend.post.trash',compact('list'));
    }
    public function status($id)
    {
        $row = Post::find($id);
        if($row == NULL)
        {
            return redirect()->route('post.index')->with('message',['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }

        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by= 1;
        $row->status=($row ->status == 1)? 2 : 1;

        $row ->save();
        return redirect()->route('post.index')->with('message', ['type' => 'success', 'mgs' => 'Thay đổi trạng thái thành công']);
    }

    public function delete($id)
    {
        $row = Post::find($id);
        if($row == NULL)
        {
            return redirect()->route('post.index')->with('message',['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }

        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by= 1;
        $row->status=0;

        $row ->save();
        return redirect()->route('post.index')->with('message', ['type' => 'success', 'mgs' => 'Xoá vào thùng rác thành công']);
    }
    

    public function restore($id)
    {
    $row = Post::find($id);
        if($row == NULL)
        {
            return redirect()->route('post.index')->with('message',['type' => 'danger', 'mgs' => 'Mẫu tin không tồn tại']);
        }

        $row->updated_at = date('Y-m-d H:i:s');
        $row->updated_by= 1;
        $row->status=($row ->status == 1)? 2 : 1;

        $row ->save();
        return redirect()->route('post.index')->with('message', ['type' => 'success', 'mgs' => 'Khôi phục thành công']);
    }
}