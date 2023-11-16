@extends('layouts.admin')
@section('title', 'TRANG QUẢN TRỊ')
@section('header')

@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">



                <div class="card-body">
                    <form action="{{ route('slider.update', ['slider' => $slider->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1 class="text-danger"> Cập nhập thương hiệu</h1>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item active">Blank Page</li>
                                        </ol>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>

                        <!-- Main content -->
                        <section class="content">

                            <!-- Default box -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button name="THEM" type="submit" class="btn btn-sm btn-primary">
                                                <i class="fas fa-save"></i> Lưu[Thêm]
                                            </button>
                                            <a class="btn btn-sm btn-info" href="{{ route('slider.index') }}">
                                                <i class="fas fa-undo-alt"></i> Quay về
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <div>
                                                <label for="" class="text-dark">Tên slider</label>
                                                <input value="{{ $slider->name }}" type="text" name="name"
                                                    list="name" placeholder="Nhập vào tên slider" class="form-control">

                                                @if ($errors->any())
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                            <div>
                                                <label for="" class="text-dark">link</label>
                                                <input value="{{ $slider->link }}" type="text" name="link"
                                                    list="name" placeholder="link" class="form-control">


                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                {{-- <label for="" class="form-label">Vị trí</label> --}}
                                                <label for="" class="text-dark">Vị trí</label>
                                                <select name="sort_order" class="form-control">
                                                    @foreach ($sliders as $item)
                                                        <option value="{{ $item->id + 1 }}">sau: {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                {{-- <label for="" class="form-label">Vị trí</label> --}}
                                                <label for="" class="text-dark">Vị trí</label>
                                                <select name="position" class="form-control">
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
                                                    <option value="1">Bật</option>
                                                    <option value="2">Tắt</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button name="THEM" type="submit" class="btn btn-sm btn-primary">
                                                <i class="fas fa-save"></i> Lưu[Thêm]
                                            </button>
                                            <a class="btn btn-sm btn-info" href="{{ route('slider.index') }}">
                                                <i class="fas fa-undo-alt"></i> Quay về danh sách
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-footer-->
                            </div>
                            <!-- /.card -->

                        </section>
                        <!-- /.content -->
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>

@endsection
