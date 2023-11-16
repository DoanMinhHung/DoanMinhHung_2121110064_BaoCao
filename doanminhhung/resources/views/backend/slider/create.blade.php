@extends('layouts.admin')
@section('title', 'SLIDER')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-danger">
                            <strong>
                                SLIDER
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
          <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong>
                            SLIDEER
                        </strong>
                    </h3>

                    <div class="card-tools">
                        <a href="{{ route('product.index') }}" class="btn bg-dark">
                            <i class="fa-solid fa-rotate-left"></i>
                            Quay về danh sách </a>
                        <button type="submit" class="btn bg-success">
                            <i class="fa-regular fa-floppy-disk"></i> 
                                Lưu Thêm
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div>
                                <label for="" class="text-dark">Tên slider</label>
                                <input type="text" name="name" list="name" placeholder="Nhập vào tên slider" class="form-control">
                                
                                @if($errors->any())
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div>
                                <label for="" class="text-dark">link</label>
                                <input type="text" name="link" list="name" placeholder="link" class="form-control">
                                
                               
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                {{-- <label for="" class="form-label">Vị trí</label> --}}
                                <label for="" class="text-dark">Vị trí</label>
                                <select name="sort_order" class="form-control">
                                    <option>Sắp xếp </option>
                                    @foreach ($slider as $item )
                                    <option value="{{ $item->id+1 }}">sau: {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                {{-- <label for="" class="form-label">Vị trí</label> --}}
                                <label for="" class="text-dark">Vị trí</label>
                                <select name="position" class="form-control">
                                    <option>Chọn vị trí </option>
                                    <option value="header">header</option>
                                    <option value="footer">footer</option>
                                </select>
                            </div>
                            <div>
                              {{-- <label for="" class="form-label">Hình</label> --}}
                              <label for="" class="text-dark">Hình</label>
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
