@extends('layouts.admin')
@section('title', 'MENU')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-danger">
                            <strong>
                                MENU
                            </strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Thêm menu</li>
                        </ol>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
          <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong>
                            THÊM MENU
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
                                <label for="" class="text-dark">Tên menu</label>
                                <input type="text" name="name" list="name" placeholder="Nhập vào tên menu" class="form-control">
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
                                <label for="" class="form-label">Type</label>
                                <textarea name="type" class="form-control" id="" cols="30" rows="5" placeholder="Nhập kiểu"></textarea>
                                @if($errors->any())
                                <span class="text-danger">{{ $errors->first('type') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <label for="" class="form-label">Kiểu menu</label>
                                <select name="type" class="form-control">
                                    <option>Chọn menu </option>
                                    @foreach ($menu as $item)
                                    <option value="{{ $item->id+1 }}" >Sau: {{ $item->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="" class="form-label">Cấp cha</label>
                                <select name="parent_id" class="form-control">
                                    <option>Chọn vị trí </option>
                                    @foreach ($menu as $item)
                                    <option value="{{ $item->id+1 }}" >Sau: {{ $item->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                              {{-- <label for="" class="form-label">Trạng thái</label> --}}
                              <label for="" class="text-dark">Trạng thái</label>
                              <select name="status" class="form-control">
                                    <option>Chọn trạng thái </option>
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
