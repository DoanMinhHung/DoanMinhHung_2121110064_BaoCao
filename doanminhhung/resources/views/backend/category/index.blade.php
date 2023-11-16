@extends('layouts.admin')

@section('title', 'TRANG QUẢN TRỊ')

@section('header')
    <link rel="stylesheet" href="{{ asset('datatables/jquery.dataTables.min.css') }}">
@endsection

@section('footer')
    <script src="{{ asset('jquery/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('dataTables/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category</h1>
                    </div>
                    <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Bảng điều khiển</a>
                                </li>
                                <li class="breadcrumb-item active">Tất cả danh mục</li>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">TẤT CẢ DANH MỤC</h3>

                    <div class="card-tools">
                        <a href="{{ route('category.create') }}" class="btn bg-success"><i class="fa-solid fa-plus"></i>
                            Thêm </a>
                        <a href="{{ route('category.trash') }}" class="btn bg-danger"><i class="fa-solid fa-trash"></i>
                            Thùng rác </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('message'))
                        @php
                            
                            $arrmessage = session('message');
                            
                        @endphp
                        <div class="alert alert-success" role="alert">
                            <strong> Thông Báo </strong> {{ $arrmessage['msg'] }}

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <table class="table" id="myTable">
                        <thead class=" bg-success">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Image</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $category)
                                <tr>
                                    {{-- <th scope="row">{{ $category->id }}</th> --}}
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td class="text-center">
                                        <img width="50px" height="50px"
                                            src="{{ asset('images/category/' . $category->image) }}"
                                            alt="{{ $category->image }}">
                                    </td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <a href="{{ route('category.status',['category'=>$category->id]) }}" class="btn text-primary">
                                          @if($category->status==1)
                                           <i class='fa-solid fa-toggle-on'></i>
                                           @else
                                            <i class='fa-solid fa-toggle-off'></i>
                                          @endif
                                          
                                          </a>

                                        <a href="{{ route('category.show', ['category' => $category->id]) }}"
                                            class="btn btn-sm bg-success">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('category.edit', ['category' => $category->id]) }}"
                                            class="btn btn-sm bg-info">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <a
                                            href="{{ route('category.delete', ['category' => $category->id]) }}" class="btn btn-sm bg-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

@endsection
