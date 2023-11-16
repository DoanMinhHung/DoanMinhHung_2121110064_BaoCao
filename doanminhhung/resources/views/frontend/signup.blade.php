@extends('layouts.site')

@section('content')
<div class="d-flex justify-content-center ho-effect">
<div class="form-tt">
    <h2>Đăng Ký</h2>
    <form action="{{ route('site.signup') }}" method="post" name="dang-ky">
    
    <input type="text" name="username" placeholder="Nhập tên đăng ký" />
    <input type="password" name="password" placeholder="Nhập mật khẩu" />
    <input type="password" name="password" placeholder="Xác nhận lại mật khẩu" />
    <input type="checkbox" id="checkbox" name="checkbox"><label class="checkbox-text">Nhớ đăng nhập lần sau</label>
    <input type="submit" name="submit" value="Đăng Ký" />
    <label class="psw-text">Quay Lại Trang Đăng Nhập</label>
    </form>
    
    </div>
</div>
@endsection