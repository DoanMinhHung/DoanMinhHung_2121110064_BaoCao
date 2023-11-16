@extends('layouts.admin')
@section('title', 'KHÁCH HÀNG')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-danger">
                            <strong>
                                user
                            </strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Thêm thương hiệu</li>
                        </ol>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
          <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong>
                            THÊM KHÁCH HÀNG
                        </strong>
                    </h3>

                    <div class="card-tools">
                        <a href="{{ route('product.index') }}" class="btn bg-dark">
                            <i class="fa-solid fa-rotate-left"></i>
                            Quay về danh sách </a>
                        <button type="submit" class="btn bg-success"><i class="fa-regular fa-floppy-disk"></i> Lưu Thêm
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div>
                                {{-- <label for="" class="form-label">Tên thương hiệu</label> --}}
                                <label for="" class="text-dark">Tên khách hàng</label>
                                <input type="text" name="name" list="name" placeholder="Nhập vào tên khách hàng" class="form-control">
                                <datalist id="name">
                                  <option value="Simple">
                                  <option value="">
                                  <option value="Cocochanel">
                                  <option value="Dior">
                                  <option value="Black Rouge">
                                </datalist>
                                @if($errors->any())
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div>
                                {{-- <label for="" class="form-label">Tên thương hiệu</label> --}}
                                <label for="" class="text-dark">Tên-khách-hàng</label>
                                <input type="text" name="slug" list="slug" placeholder="Nhập-vào-tên-khách-hàng" class="form-control">
                                <datalist id="name">
                                  <option value="Simple">
                                  <option value="">
                                  <option value="Cocochanel">
                                  <option value="Dior">
                                  <option value="Black Rouge">
                                </datalist>
                                @if($errors->any())
                                <span class="text-danger">{{ $errors->first('slug') }}</span>
                                @endif
                            </div>
                            <div>
                                {{-- <label for="" class="form-label">Metakey</label> --}}
                                <label for="" class="text-dark">Tên</label>
                                <textarea class="form-control" name="username" id="" cols="30" rows="5" placeholder="Nhập tên"></textarea>
                                @if($errors->any())
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                            </div> 
                            <div>
                                {{-- <label for="" class="form-label">Metakey</label> --}}
                                <label for="" class="text-dark">Email</label>
                                <textarea class="form-control" name="email" id="" cols="30" rows="5" placeholder="Nhập email"></textarea>
                                @if($errors->any())
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div> 
                            <div>
                                {{-- <label for="" class="form-label">Metakey</label> --}}
                                <label for="" class="text-dark">Mật khẩu</label>
                                <textarea class="form-control" name="password" id="" cols="30" rows="5" placeholder="Nhập mật khẩu"></textarea>
                                @if($errors->any())
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>       
                            <div>
                                {{-- <label for="" class="form-label">Metakey</label> --}}
                                <label for="" class="text-dark">Số điện thoại</label>
                                <textarea class="form-control" name="phone" id="" cols="30" rows="5" placeholder="Nhập số điện thoại"></textarea>
                                @if($errors->any())
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>                
                        </div>
                        <div class="col-4">
                            <div>
                                {{-- <label for="" class="form-label">Metakey</label> --}}
                                <label for="" class="text-dark">Nhập địa chỉ</label>
                                <textarea class="form-control" name="address" id="" cols="30" rows="5" placeholder="Nhập địa chỉ"></textarea>
                                @if($errors->any())
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            <div>
                                {{-- <label for="" class="form-label">Trạng thái</label> --}}
                                <label for="" class="text-dark">id</label>
                                <select name="id" class="form-control">
                                    <option value="0">Chọn</option>
                                    <option value="1">Bật</option>
                                    <option value="2">Tắt</option>
                                </select>
                            </div>
                            <div>
                                {{-- <label for="" class="form-label">Trạng thái</label> --}}
                                <label for="" class="text-dark">Vai trò</label>
                                <select name="roles" class="form-control">
                                    <option value="1">Bật</option>
                                    <option value="2">Tắt</option>
                                </select>
                            </div>
                            <div>
                              {{-- <label for="" class="form-label">Hình</label> --}}
                              <label for="" class="text-dark">Hình</label>
                              <img src="public/images/user/son.jpg" alt="" srcset="">
                              <input type="file" class="form-control" name="image" id="">
                            </div>
                            <div>
                              {{-- <label for="" class="form-label">Trạng thái</label> --}}
                              <label for="" class="text-dark">Trạng thái</label>
                              <select name="status" class="form-control">
                                  <option value="0">Chọn trạng thái</option>
                                  <option value="1">Bật</option>
                                  <option value="2">Tắt</option>
                              </select>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </form>
        </section>
        <!-- /.content -->
    </div>

@endsection
