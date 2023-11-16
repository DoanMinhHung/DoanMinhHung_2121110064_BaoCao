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
                        <h1>Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-product"><a href="#">Home</a></li>
                            <li class="breadcrumb-product active">Blank Page</li>
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
                    <h3 class="card-title">SẢN PHẨM</h3>

                    <div class="card-tools">
                        <a href="{{ route('product.create') }}" class="btn bg-success"><i
                                class="fa-solid fa-plus"></i>Thêm</a>
                        <a href="{{ route('product.trash') }}" class="btn btn-md bg-danger"><i class="fa-solid fa-trash"></i> Thùng Rác
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" id="myTable">
                        <thead class=" bg-success">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Giá khuyến mãi</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $product)
                                <tr>
                                    {{-- <th scope="row">{{ $product->id }}</th> --}}
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <img width="50px" height="50px"
                                            src="{{ asset('images/product/' . $product->image) }}" alt="">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->price_sale }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                      <a href="{{ route('product.status',['product'=>$product->id]) }}" class="btn text-primary">
                                        @if($product->status==1)
                                         <i class='fa-solid fa-toggle-on'></i>
                                         @else
                                          <i class='fa-solid fa-toggle-off'></i>
                                        @endif
                                        
                                        </a>
                                        <a href="{{ route('product.show', ['product' => $product->id]) }}"
                                            class="btn btn-sm bg-info"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('product.edit', ['product' => $product->id]) }}"
                                            class="btn btn-sm bg-success"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="{{ route('product.delete', ['product' => $product->id]) }}"
                                            class="btn btn-sm bg-danger"><i class="fa-solid fa-trash"></i>
                                        </a>
                                        {{-- <form class="d-inline" action="{{ route('product.destroy',['product'=>$product->id]) }}" method="post">
                  @method('DELETE')
                  <button class="btn bg-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                </form>
              </td> --}}            </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
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

@endsection
