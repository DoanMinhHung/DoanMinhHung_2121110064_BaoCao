
@extends('layouts.admin')

@section('title','trang quan tri')

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
        <form action="{{ route('menu.update',['menu'=>$menu->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="text-danger"> Cập nhập menu</h1>
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
                                    <a class="btn btn-sm btn-info" href="{{ route('menu.index') }}">
                                        <i class="fas fa-undo-alt"></i> Quay về
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 ">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Tên thương hiệu</strong></label>
                                        <input name="name" value="{{$menu->name}}" type="text" class="form-control"
                                            placeholder="Nhập tên danh mục" value="">
    
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Từ khóa</label>
                                        <textarea name="metakey" class="form-control" rows="3" placeholder="Nhập tên danh mục">{{$menu->metakey}}"</textarea>
    
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Từ khóa</label>
                                        <textarea name="metades" class="form-control" rows="3" placeholder="Nhập tên danh mục">{{$menu->metadesc}}"</textarea>
    
                                    </div>
                                </div>
                                {{-- <div class="col-md-4 ">
    
                                        <div class="mb-3">
                                            <label class="form-label"><strong>Hình đại diện</strong></label>
                                            <input value="{{$menu->image}}" name="image" type="file" class="form-control" >
                                        </div>
                                    </div> --}}
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Trạng thái</strong></label>
                                        <select name="status" class="form-control">
                                            <option value="1">Xuất bản</option>
                                            <option value="2">Chưa xuất bản</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>vị trí</strong></label>
                                        <select name="sort_order" class="form-control">
                                            {!!$html!!}
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
                                    <a class="btn btn-sm btn-info" href="{{ route('menu.index') }}">
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