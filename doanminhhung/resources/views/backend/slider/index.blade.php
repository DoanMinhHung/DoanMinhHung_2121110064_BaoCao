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
                        <h1>SLIDER</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-slider"><a href="#">Home</a></li>
                            <li class="breadcrumb-slider active">Blank Page</li>
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
                    <h3 class="card-title"> Slider </h3>

                    <div class="card-tools">
                        <a href="{{ route('slider.create') }}" class="btn bg-success"><i
                                class="fa-solid fa-plus"></i>Thêm</a>
                        <a href="{{ route('slider.trash') }}" class="btn bg-danger"><i class="fa-solid fa-trash"></i> Thùng
                            rác
                        </a>
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
                    <table class="table " id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Hình</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Link</th>
                                <th scope="col">Position</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slider as $slider)
                                <tr>
                                    {{-- <th scope="row">{{ $slider->id }}</th> --}}
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <img width="50px" height="50px"
                                            src="{{ asset('images/slider/' . $slider->image) }}" alt="">
                                    </td>
                                    <td>{{ $slider->name }}</td>
                                    <td>{{ $slider->link }}</td>
                                    <td>{{ $slider->position }}</td>
                                    <td>{{ $slider->created_at }}</td>
                                    <td>
                                        @if ($slider->status == 1)
                                            <a href="{{ route('slider.status', ['slider' => $slider->id]) }}"
                                                class="btn bg-success">
                                                <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('slider.status', ['slider' => $slider->id]) }}"
                                                class="btn bg-danger">
                                                <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('slider.show', ['slider' => $slider->id]) }}"
                                            class="btn bg-info">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('slider.edit', ['slider' => $slider->id]) }}"
                                            class="btn bg-dark">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <a
                                            href="{{ route('slider.delete', ['slider' => $slider->id]) }}"class="btn bg-danger">
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
