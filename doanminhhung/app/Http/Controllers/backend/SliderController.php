<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSliderRequest;
use App\Models\Link;
use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider =  Slider::where('status','!=',0)->get();
        return view('backend.slider.index',compact('slider'));    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $slider = slider::where('status','=',1)->get();
        return view('backend.slider.create',compact('slider'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreSliderRequest $request)
    {

        $slider = new Slider();
        $slider->name = $request->input('name');
        $slug = $slider->name = Str::slug($slider->name, '-');
        $slider->link = $request->input('link');
        $slider->sort_order = $request->input('sort_order');
        $slider->position = $request->input('position');
        $slider->created_by = 1;
        $slider->updated_by = 1;
        $image = $request->file('image');
        if (isset($image)) {
            $filename = $slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/slider'), $filename);
            $slider->image = $filename;
        }
        $slider->save();
        return redirect()->route('slider.index')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $slider = Slider::find($id);
        return view('backend.slider.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::find($id);
        $sliders = Slider::where('status', '=', '1')->get();
       
        return view('backend.slider.edit', compact('sliders', 'slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, string $id)
    {
        $slider = Slider::find($id);
        $slider->name = $request->input('name');
        $slug = $slider->name = Str::slug($slider->name, '-');
        $slider->link = $request->input('link');
        $slider->sort_order = $request->input('sort_order');
        $slider->position = $request->input('position');
        $slider->created_by = 1;
        $slider->updated_by = 1;
        $image = $request->file('image');
        if (isset($image)) {
            $filename = $slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/slider'), $filename);
            $slider->image = $filename;
        }
        $slider->save();
        return redirect()->route('slider.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        if ($slider == NULL) {
            return redirect()->route('slider.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        if ($slider->delete()) {
            // có 2 điều kiện xóa: 
            $link = Link::where([['type', '=', 1], ['table_id', '=', $id]])->first();
            $link->delete();
            print_r($link);
        }
        return redirect()->route('slider.trash')->with('message', ['type' => 'danger', 'msg' => 'xóa khỏi CSDL thành công!']);
    }

    public function trash()
    {
        $slider = Slider::where('status', 0)->get();
        return view('backend.slider.trash', compact('slider'));
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        if ($slider == NULL) {
            return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $slider->updated_by = 1; //đăng nhập
        $slider->updated_at = date('Y-m-d H:i:s'); //ngày tạoo
        $slider->status = 0;
        $slider->save();
        return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa mẫu tin vào thùng rác thành công!']);
    }
    
    public function restore($id)
    {
        $slider = Slider::find($id);
        if ($slider == null) {
            return redirect()->route('slider.index')->with('message', ['type' => 'success', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $slider->status = 2;
        $slider->updated_by = 1;
        $slider->updated_at == date('Y-m-d H:i:s');
        $slider->save();
        return redirect()->route('slider.trash')->with('message', ['type' => 'danger', 'msg' => 'Khôi phục thành công']);
    }

    public function status($id)
    {
        $slider = Slider::find($id);
        if ($slider == NULL) {
            return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $slider->updated_by = 1; //đăng nhập
        $slider->updated_at = date('Y-m-d H:i:s'); //ngày tạoo
        $slider->status = ($slider->status == 1) ? 2 : 1; // trạng thái chưa xuất mã
        $slider->save();
        return redirect()->route('slider.index')->with('message', ['type' => 'danger', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}
