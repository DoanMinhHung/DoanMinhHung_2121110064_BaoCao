<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {

        return view('frontend.Login');
    }
    public function loginpost(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (password_verify($request->password, $user->password)) {
                return redirect()->route('site.index')->with('success', '');
            } else {
                return redirect()->route('site.login')->with('error', 'Mật khẩu không đúng');
            }
        } else {
            return redirect()->route('site.login')->with('error', 'Người dùng không tồn tại hoặc tài khoản bị khoá');

        }
    }
    public function register(){
        return view('frontend.register');
    }
    public function registerpost(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->roles = 0;
        $user->created_by = 1;
        $user->save();
        return redirect()->route('site.login')->with('success', 'Đăng ký thành công');
    }
}