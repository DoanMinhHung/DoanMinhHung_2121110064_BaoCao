@extends('layouts.admin')
@section('title','TRANG QUẢN TRỊ')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Brand</h1>
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
        <h3 class="card-title">THƯƠNG HIỆU</h3>
        <div class="card-tools">
          <a href="{{ route('brand.create') }}" class="btn bg-success"><i class="fa-solid fa-plus"></i> Thêm </a>
          <a href="{{ route('brand.trash') }}" class="btn bg-danger"><i class="fa-solid fa-trash"></i> Thùng rác </a>
        </div>
      </div>
      <div class="card-body">
        <table class="table">
          <thead class=" bg-success">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Slug</th>
              <th scope="col">Image</th>
              <th scope="col">Created_at</th>
              <th scope="col">Chức năng</th>
              <th scope="col">ID</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list as $item )
            <tr>
              {{-- <th scope="row">{{ $item->id }}</th> --}}
              <td>
                <input type="checkbox">
              </td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->slug }}</td>
              <td><img width="50px" height="50px" src="{{ asset('images/brand/'.$item->image) }}" alt=""></td>
              <td>{{ $item->created_at }}</td>
              <td>
                <a href="{{ route('brand.status',['id'=>$item->id]) }}" class="btn text-primary">
                  @if($item->status==1)
                   <i class='fa-solid fa-toggle-on'></i>
                   @else
                    <i class='fa-solid fa-toggle-off'></i>
                  @endif
                  
                  </a>
                <a href="{{ route('brand.show',['brand'=>$item->id]) }}" class="btn btn-sm bg-success"><i class="fa-solid fa-eye" ></i></a>
                {{-- <a href="{{ route('brand.update',['brand'=>$item->id]) }}" class="btn bg-success"><i class="fa-regular fa-pen-to-square"></i></a>
                <a href="{{ route('brand.update',['brand'=>$item->id]) }}" class="btn bg-danger"><i class="fa-solid fa-trash"></i> --}}
                </a>
                <a href="{{ route('brand.edit', ['brand' => $item->id]) }}" {{-- đường dẫn khi nhấp vào edit có tham số truyền vào nên phải có ->id  --}}
                  class="btn btn-sm btn-info">

                  <i class="fa-solid fa-edit"></i>
              </a>
              <a href="{{ route('brand.delete', ['brand' =>$item->id]) }}"
                class="btn btn-sm btn-danger">
                <i class="fa-solid fa-trash"></i>
            </a>
                {{-- <form class="d-inline" action="{{ route('brand.destroy',['brand'=>$item->id]) }}" method="post">
                  @method('DELETE')
                  <button class="btn bg-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                </form> --}}
              </td>
              <td>{{ $item->id }}</td>

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