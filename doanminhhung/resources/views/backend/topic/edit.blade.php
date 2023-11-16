@extends('layouts.admin')

@section('title', $title ?? 'Trang quản lý')
@section('content')

    <form action="{{ route('topic.update', ['topic' => $row->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>CẬP NHẬT CHỦ ĐỀ</h1>
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
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i>Lưu
                            </button>


                            <a href="{{ route('topic.index') }}" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>Xóa</a>
                            <a class="btn btn-sm btn-info" href="{{ route('topic.index') }}">
                                <i class="fas fa-arrow-circle-left"></i> QUAY VỀ DANH SÁCH
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">

                                <label for="name">Tên danh mục</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $row->name) }}"
                                    class="form-control">

                                @if ($errors->has('name'))
                                    <div class="text-danger">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif

                            </div>
                            <div class="mb-3">
                                <label for="metakey">Từ khóa</label>
                                <textarea name="metakey" id="metakey" class="form-control">{{ old('metakey', $row->metakey) }}</textarea>
                                @if ($errors->has('metakey'))
                                    <div class="text-danger">
                                        {{ $errors->first('metakey') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="metadesc">Mô tả</label>
                                <textarea name="metadesc" id="metadesc" class="form-control">{{ old('metadesc', $row->metadesc) }}</textarea>
                                @if ($errors->has('metadesc'))
                                    <div class="text-danger">
                                        {{ $errors->first('metadesc') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="parent_id">Chuyên mục cha</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0">Cấp cha</option>
                                    {!! $html_parent_id !!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sort_order">Sắp xếp</label>
                                <select name="sort_order" id="sort_order" class="form-control">
                                    <option value="0">Cấp cha</option>
                                    {!! $html_sort_order !!}
                                </select>
                            </div>

                            {{-- <div class="mb-3">
                                <label for="image">Hình đại diện</label>
                                <input name="image" id="image" type="file" class="form-control btn-sm">
                            </div> --}}
                        </div>
                    </div>
                </div>
        </div>
        <!-- /.card-body -->
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="fas fa-save"></i>Lưu
                    </button>

                    <a href="{{ route('topic.index') }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>Xóa</a>
                    <a class="btn btn-sm btn-info" href="{{ route('topic.index') }}">
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
