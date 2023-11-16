@extends('layouts.admin')
@section('content')
    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>create</h1>
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
                        <h3 class="card-title">Title</h3>

                        <div class="card-tools">
                            <button type="submit" class="btn btn-success"><i class="fa-solid fa-plus"></i>Lưu Thêm</button>
                            <a href="{{ route('category.create') }}" class="btn bg-danger"><i class="fa-solid fa-trash"></i>
                                Xóa </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div>
                                    <label for="" class="form-label">Tên danh mục</label>
                                    <input type="text" placeholder="VD: Laptop" class="form-control" name="name"
                                        id="">
                                    @if ($errors->any())
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div>
                                    <label for="" class="form-label">Metadesc</label>
                                    <textarea name="metadesc" id="" cols="30" rows="6" class="form-control"></textarea>
                                    @if ($errors->any())
                                        <span class="text-danger">{{ $errors->first('metadesc') }}</span>
                                    @endif
                                </div>
                                <div>
                                    <label for="" class="form-label">Metakey</label>
                                    <textarea name="metakey" id="" cols="30" rows="6" class="form-control"></textarea>
                                    @if ($errors->any())
                                        <span class="text-danger">{{ $errors->first('metakey') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-4">
                                <div>
                                    <label for="" class="text-dark">Hình</label>
                                    <input type="file" class="form-control" name="image" id="">
                                </div>
                                <div>
                                    <label for="" class="form-label">Cấp cha</label>
                                    <select name="parent_id" class="form-control">
                                        <option>Chọn vị trí </option>
                                        @foreach ($category as $item)
                                        <option value="{{ $item->id+1 }}" >Sau: {{ $item->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="" class="text-dark">Vị trí</label>
                                    <select name="sort_order" class="form-control">
                                        <option>Chọn vị trí </option>
                                        @foreach ($category as $item )
                                        <option value="{{ $item->id+1 }}">sau: {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
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

            </section>
            <!-- /.content -->
        </div>
    </form>
@endsection
