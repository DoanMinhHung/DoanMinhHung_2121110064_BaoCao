@extends('layouts.admin')
@section('title', 'BÀI VIẾT')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-danger">
                            <strong>
                                POST
                            </strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Tất cả bài viết</li>
                        </ol>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong>
                            THÊM BÀI VIẾT
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
                              {{-- <label for="" class="form-label">Metadesc</label> --}}
                              <label for="" class="text-dark">Detail</label>
                              <textarea name="detail" class="form-control" id="" cols="30" rows="5" placeholder="Nhập chi tiết sản phẩm"></textarea>
                              @if($errors->any())
                              <span class="text-danger">{{ $errors->first('detail') }}</span>
                              @endif
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                {{-- <label for="" class="form-label">Metadesc</label> --}}
                                <label for="" class="text-dark">Type</label>
                                <textarea name="type" class="form-control" id="" cols="30" rows="5" placeholder="Nhập kiểu"></textarea>
                                @if($errors->any())
                                <span class="text-danger">{{ $errors->first('type') }}</span>
                                @endif
                              </div>
                            <div>
                            {{-- <label for="" class="form-label">Hình</label> --}}
                            <label for="" class="text-dark">Hình</label>
                            <img src="public/images/post/son.jpg" alt="" srcset="">
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
