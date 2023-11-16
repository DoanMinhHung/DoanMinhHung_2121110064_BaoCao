@extends('layouts.admin')
@section('title', 'SẢN PHẨM')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-danger">
                            <strong>
                                PRODUCT
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
          <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong>
                            THÊM SẢN PHẨM
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
                                <label for="" class="text-dark">Tên sản phẩm</label>
                                <input type="text" name="name" list="name" placeholder="Nhập vào tên thương hiệu" class="form-control">
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
                                <label for="" class="text-dark">Giá</label>
                                <input type="number" name="price" list="price" placeholder="Nhập giá" class="form-control">
                            </div>
                            <div>
                                <label for="" class="text-dark">Giá khuyến mãi</label>
                                <input type="number" name="price_sale" list="price_sale" placeholder="Nhập giá" class="form-control">
                            </div>
                            
                            <div>
                                {{-- <label for="" class="form-label">Metakey</label> --}}
                                <label for="" class="text-dark">Metakey</label>
                                <textarea class="form-control" name="metakey" id="" cols="30" rows="5" placeholder="Từ khóa"></textarea>
                                @if($errors->any())
                                <span class="text-danger">{{ $errors->first('metakey') }}</span>
                                @endif
                            </div>
                            <div>
                              {{-- <label for="" class="form-label">Metadesc</label> --}}
                              <label for="" class="text-dark">Metadesc</label>
                              <textarea name="metadesc" class="form-control" id="" cols="30" rows="5" placeholder="Nhập mô tả thương hiệu"></textarea>
                              @if($errors->any())
                              <span class="text-danger">{{ $errors->first('metadesc') }}</span>
                              @endif
                          </div>
                          <div>
                            {{-- <label for="" class="form-label">Metakey</label> --}}
                            <label for="" class="text-dark">Chi tiết sản phẩm</label>
                            <textarea class="form-control" name="detail" id="" cols="30" rows="5" placeholder="Từ khóa"></textarea>
                            @if($errors->any())
                            <span class="text-danger">{{ $errors->first('detail') }}</span>
                            @endif
                        </div>
                        </div>
                        <div class="col-4">
                            <div>
                                {{-- <label for="" class="form-label">Vị trí</label> --}}
                                <label for="" class="text-dark">Vị trí</label>
                                <select name="sort_order" class="form-control">
                                    <option>Chọn vị trí </option>
                                    @foreach ($product as $item )
                                    <option value="{{ $item->id+1 }}">sau: {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="" class="text-dark">Danh mục</label>
                                <select class="form-control" name="category_id" id="">
                                    <option>Chọn danh mục</option>
                                    {!! $html1 !!}
                                </select>
                            </div>
                            <div>
                                <label for="" class="text-dark">Thương hiệu</label>                               
                                <select class="form-control" name="brand_id" id="">
                                    <option>Chọn thương hiệu</option>
                                    {!! $html2 !!}
                                </select>
                            </div>
                            <div>
                                <label for="" class="text-dark">Số lượng</label>
                                <input type="number" name="qty" list="qty" placeholder="Nhập số lượng" class="form-control">
                            </div>
                            <div>
                              {{-- <label for="" class="form-label">Hình</label> --}}
                              <label for="" class="text-dark">Hình</label>
                              <img src="public/images/product/son.jpg" alt="" srcset="">
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
