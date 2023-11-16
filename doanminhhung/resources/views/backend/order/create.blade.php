@extends('layouts.admin')
@section('title', 'ĐƠN HÀNG')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-danger">
                            <strong>
                                ORDER
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
          <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong>
                            THÊM ORDER
                        </strong>
                    </h3>

                    <div class="card-tools">
                        <button type="submit" class="btn bg-success"><i class="fa-regular fa-floppy-disk"></i> Lưu Thêm
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div>
                                {{-- <label for="" class="form-label">Tên thương hiệu</label> --}}
                                <label for="" class="text-dark">Tên order</label>
                                <input type="text" name="name" list="name" placeholder="Nhập vào tên order" class="form-control">
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
                                {{-- <label for="" class="form-label">Metakey</label> --}}
                                <label for="" class="text-dark">Note</label>
                                <textarea class="form-control" name="note" id="" cols="30" rows="5" placeholder="Từ khóa"></textarea>
                                @if($errors->any())
                                <span class="text-danger">{{ $errors->first('note') }}</span>
                                @endif
                            </div>
                            <div>
                              {{-- <label for="" class="form-label">Metadesc</label> --}}
                              <label for="" class="text-dark">Email</label>
                              <textarea name="email" class="form-control" id="" cols="30" rows="5" placeholder="Nhập email"></textarea>
                              @if($errors->any())
                              <span class="text-danger">{{ $errors->first('email') }}</span>
                              @endif
                            </div>
                            <div>
                                <label for="" class="form-label">Số điện thoại</label>
                                <textarea name="phone" class="form-control" id="" cols="30" rows="5" placeholder="Nhập số điện thoại"></textarea>
                                @if($errors->any())
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            
                        </div>
                        <div class="col-4">
                            <div>
                                <label for="" class="form-label">Địa chỉ</label>
                                <textarea name="address" class="form-control" id="" cols="30" rows="5" placeholder="Nhập địa chỉ"></textarea>
                                @if($errors->any())
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            <div>
                                <label for="" class="text-dark">Người sử dụng</label>                               
                                <select class="form-control" name="user_id" id="">
                                    <option>Chọn người sử dụng</option>
                                    @foreach ($order as $item )
                                    <option value="{{ $item->id+1 }}">sau: {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                {{-- <label for="" class="form-label">Vị trí</label> --}}
                                <label for="" class="text-dark">Vị trí</label>
                                <select name="sort_order" class="form-control">
                                    <option>Chọn vị trí </option>
                                    @foreach ($order as $item )
                                    <option value="{{ $item->id+1 }}">sau: {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                              {{-- <label for="" class="form-label">Trạng thái</label> --}}
                              <label for="" class="text-dark">Trạng thái</label>
                              <select name="status" class="form-control">
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
