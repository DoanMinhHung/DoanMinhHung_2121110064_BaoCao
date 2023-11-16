@extends('layouts.site')

@section('content')
<div class="d-flex justify-content-center ho-effect">
<div class="form-tt">
    <h2>Đăng nhập</h2>
    <form action="{{ route('site.loginn') }}" method="post" name="dang-ky">
    
    <input type="text" name="username" placeholder="Nhập tên đăng ký" />
    <input type="password" name="password" placeholder="Nhập mật khẩu" />
    <input type="checkbox" id="checkbox" name="checkbox"><label class="checkbox-text">Nhớ đăng nhập lần sau</label>
    <input type="submit" name="submit" value="Đăng nhập" />
    <label class="psw-text">Quên mật khẩu?</label>
    <label class="psw-text"><a href="/dangky">Đăng ký</a></label>
    </form>
    
    </div>
</div>
@endsection