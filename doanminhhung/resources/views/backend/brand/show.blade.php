

@extends('layouts.admin')
@section('title','CHI TIẾT SẢN PHẨM')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chi Tiết Sản Phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-brand"><a href="#">Home</a></li>
              <li class="breadcrumb-brand active">Chi Tiết Sản Phẩm</li>
            </ol>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="">
            <a class=" btn btn-sm btn-primary"  href="{{ route('brand.index') }}"><i class="fas fa-undo-alt"></i>Quay về danh sách</a>
            <a class=" btn btn-sm btn-danger" href=""> <i class="fa fa-trash"></i>Xóa</a>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Chi Tiết Sản Phẩm</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
   <table class="table table-bordered">
    <thead>
        <tr class="bg-success">
            <th class=" text-danger">Tên Trường</th>
            <th class=" text-danger">Giá Trị</th>
        </tr>
    </thead>
        <tr>

            <td class="fw-bold text-danger">ID</td>
            <td>{{ $brand->id }}</td>
        </tr>
        <tr>
        <td class="fw-bold text-danger">Tên Thương Hiệu</td>
            <td>{{ $brand->name }}</td>
        </tr>
        <td class="fw-bold text-danger">Slug Thương Hiệu </td>
            <td>{{ $brand->slug }}</td>
        </tr>
        <td class="fw-bold text-danger">Thứ Tự</td>
            <td>{{ $brand->sort_order }}</td> 
        </tr>
        <td class="fw-bold text-danger">Hình Ảnh</td>
          <td>
              <img width="50px" height="50px" src="{{ asset('images/brand/'.$brand->image) }}" alt="{{ $brand->image }}">
          </td>
        </tr>
        <td class="fw-bold text-danger">Từ Khóa SEO</td>
            <td>{{ $brand->metakey }}</td>
        </tr>
        <td class="fw-bold text-danger">Mô Tả SEO</td>
            <td>{{ $brand->metadesc }}</td>
        </tr>
        <td class="fw-bold text-danger">Ngày Tạo</td>
            <td>{{ $brand->created_at }}</td>
        </tr>
        <td class="fw-bold text-danger">Người Tạo</td>
            <td>{{ $brand->created_by }}</td>
        </tr>
        <td class="fw-bold text-danger">Ngày Chỉnh sửa</td>
            <td>{{ $brand->updated_at }}</td>
        </tr>
        <td class="fw-bold text-danger">Người Chỉnh sửa</td>
            <td>{{ $brand->updated_by }}</td>
        </tr>
        <td class="fw-bold text-danger">Trạng Thái</td>
            <td>{{ $brand->status }}</td>
        </tr>
</table>
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection;
