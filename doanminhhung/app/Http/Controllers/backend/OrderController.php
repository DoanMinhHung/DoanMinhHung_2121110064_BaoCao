<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;use Illuminate\Support\Str;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Order::where('status','!=',0)->get();
        return view('backend.order.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order = Order::all();
        return view('backend.order.create',compact('order'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->user_id = $request->user_id;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->note = $request->note;
        // $order->replay_id = $request->replay_id;
        // $order->title = $request->title;
        // $order->content = $request->content;
        $order->created_by = 1;
        $order->updated_by =1;
        $order->status =  $request->status;
        $order->save();
        return redirect()->route('order.index');
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('backend.order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $orders = Order::where('status','=','2')->get();
        $html='';
        foreach($orders as $item){
            $html.='<option value="'.$item->id+1 .'">Sau: '.$item->name.'</option>';
        }
        return view('backend.order.edit',compact('html','order'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        $order->user_id = 1;
        $order->name = $request->name;
        $order->email = 1;
        $order->phone = 1;
        $order->address = 1;
        $order->note = 1;
        $order->created_by = 1;
        $order->updated_by = 1;
        $image = $request->file('image');
        if (isset($image)) {
            $filename = $order->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/order '), $filename);
            $order->image = $filename;
        }
        // $order->save();
        // if ($order->save(){
        //     $link=Link::where([['table_id', '=', $id], ['type', '=', 'order']])->first();
        //     return redirect()->route('order.index')->with('message',['type' => 'succcess','msg' =>'Thành Công']);
        // })
        $order->save();
           
        return redirect()->route('order.index')->with('message',['type' => 'succcess','msg' =>'Thành Công']);
        return redirect()->route('order.index');
         return redirect()->route('order.index')->with('message',['type' => 'succcess','msg' =>'Thành Công']);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Call to a member function delete() on null:: khai báo delete là ok

        $order = Order::find($id);
        if($order == NULL)
        {
            return redirect()->route('order.trash')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
        }
       $order->delete();
       
       return redirect()->route('order.trash')->with('message',['type' => 'danger','msg' =>'xóa khỏi CSDL thành công!']);
    }
    // {
    //     $order = Order::find($id);
    //     $order->delete();
    //     $order->save();
    //     return redirect()->route('order.index');
    // }    
    public function trash()
    {
        $order = Order::where('status',0)->get();
        return view('backend.order.trash', compact ('order')) ;
    }
    public function delete($id)
    {
        $order = Order::find($id);
        if($order == NULL)
        {
            return redirect()->route('order.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       $order ->updated_by = 1;//đăng nhập
       $order ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $order ->status =0;
       $order->save();
       return redirect()->route('order.index')->with('message',['type' => 'danger','msg' =>'Xóa mẫu tin vào thùng rác thành công!']);
    }
    // {
    //     $order = Order::find($id);
    //     $order->status = 0;
    //     $order->save();
    //     return redirect()->route('order.index');    
    // }
   
    public function restore($id)
    {
        $order = Order::find($id);
        if($order==null){
            return redirect()->route('order.index')->with('message',['type' => 'success','msg' =>'Mẫu tin không tồn tại']);
        }
        $order->status=2;
        $order->updated_by=1;
        $order->updated_at==date('Y-m-d H:i:s');
        $order->save();
        return redirect()->route('order.trash')->with('message',['type' => 'danger','msg' =>'Khôi phục thành công']);  
    }

    public function status($id)
    {
        $row = Order::find($id);
        if($row == NULL)
        {
            return redirect()->route('order.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       
       $row ->status =($row->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $row->save();
       return redirect()->route('order.index')->with('message',['type' => 'danger','msg' =>'Thay đổi trạng thái thành công!']);
    }

}
