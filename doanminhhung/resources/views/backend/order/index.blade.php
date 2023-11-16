@extends('layouts.admin')
@section('title','TRANG QUẢN TRỊ')
@section('header')
<link rel="stylesheet" href="{{ asset('datatables/jquery.dataTables.min.css') }}">
@endsection

@section('footer')
<script src="{{ asset('jquery/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('dataTables/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function(){
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
          <h1>Order</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-order"><a href="#">Home</a></li>
            <li class="breadcrumb-order active">Blank Page</li>
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
        <h3 class="card-title">ORDER</h3>

        <div class="card-tools">
          <a href="{{ route('order.create') }}" class="btn bg-success"><i class="fa-solid fa-plus"></i>Thêm</a>
          <a href="{{ route('order.trash') }}" class="btn bg-danger"><i class="fa-solid fa-trash"></i> Thùng rác </a>
        </div>
      </div>
      <div class="card-body">
        <table class="table" id="myTable">
          <thead class=" bg-success">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Created_at</th>
              <th scope="col">Chức năng</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list as $order )
            <tr>
              {{-- <th scope="row">{{ $order->id }}</th> --}}
              <td>
                <input type="checkbox">
              </td>
              <td>{{ $order->name }}</td>
              <td>{{ $order->email }}</td>
              <td>{{ $order->phone }}</td>
              <td>{{ $order->created_at }}</td>
              <td>
                  <a href="{{ route('order.status',['order'=>$order->id]) }}" class="btn text-primary">
                    @if($order->status==1)
                     <i class='fa-solid fa-toggle-on'></i>
                     @else
                      <i class='fa-solid fa-toggle-off'></i>
                    @endif
                    
                    </a>                                    
                      <a href="{{ route('order.show', ['order' => $order->id]) }}" class="btn btn-sm bg-info">
                          <i class="fa-solid fa-eye"></i>
                      </a>
                      <a href="{{ route('order.edit', ['order' => $order->id]) }}" class="btn btn-sm bg-success">
                          <i class="fa-solid fa-edit"></i>
                      </a>
                      <a href="{{ route('order.delete', ['order' => $order->id]) }}"class="btn btn-sm bg-danger">
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
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>

@endsection