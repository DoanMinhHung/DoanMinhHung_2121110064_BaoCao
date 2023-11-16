@extends('layouts.admin')

@section('title', $title ?? 'Trang quản lý')
@section('content')

    <form action="{{ route('contact.update', ['contact' => $row->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>CẬP NHẬT LIÊN HỆ</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->

                <div class="card-header">
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i>Lưu</button>



                            <a href="{{ route('contact.index') }}" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>Xóa</a>
                            <a class="btn btn-sm btn-info" href="{{ route('contact.index') }}">
                                <i class="fas fa-arrow-circle-left"></i> QUAY VỀ DANH SÁCH
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-7">
                        <div class="mb-3">
                          <label for="name">Họ và tên</label>
                          <input type="text" name="name" id="name" value="{{  old('name',$row->name) }}" class="form-control">
                          @if ($errors->has('name'))
                             <div class="text-danger">
                                {{ $errors->first('name') }}
                             </div>
                           @endif
                        </div>
                        <div class="mb-3">
                          <label for="email">Email</label>
                          <input type="email" name="email" id="email" value="{{  old('email',$row->email) }}" class="form-control">
                          @if ($errors->has('email'))
                             <div class="text-danger">
                                {{ $errors->first('email') }}
                             </div>
                           @endif
                        </div>
                        <div class="mb-3">
                          <label for="phone">Phone</label>
                          <input type="tel" name="phone" id="phone" placeholder="0912345678" pattern="[0-9]{4}[0-9]{3}[0-9]{3}" value="{{  old('phone',$row->phone) }}" class="form-control">
                          @if ($errors->has('phone'))
                             <div class="text-danger">
                                {{ $errors->first('phone') }}
                             </div>
                           @endif
                        </div>
                    </div>
                    <div class="col-md-5">
                      <div class="mb-3">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title" value="{{  old('title',$row->title) }}" class="form-control">
                        @if ($errors->has('title'))
                           <div class="text-danger">
                              {{ $errors->first('title') }}
                           </div>
                         @endif
                      </div>
                    </div>
                  </div>
                  </div>
        </div>
        <!-- /.card-body -->
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i>Lưu</button>



                    <a href="{{ route('contact.index') }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>Xóa</a>
                    <a class="btn btn-sm btn-info" href="{{ route('contact.index') }}">
                        <i class="fas fa-arrow-circle-left"></i> QUAY VỀ DANH SÁCH
                    </a>
                </div>
            </div>
        </div>

        <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        </section>
        <!-- /.content -->
        </div>
    </form>
@endsection