@extends('layouts.admin')

@section('title', 'Chủ đề bài viết')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>TẤT CẢ CHỦ ĐỀ</h1>
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
            <div class="col-6">
              <button class="submit btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
            </div>
            <div class="col text-right">
              <a href="{{ route('topic.create') }}" class="btn btn-sm btn-success"><i class="fa-solid fa-plus"></i>Thêm</a>
              <a href="{{ route('topic.trash') }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>Thùng Rác</a>
            </div>
          </div>
        </div>
          <div class="card-body">
            <table class="table table-bordered table-striped" id="dataTable">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">CHỦ ĐỀ</th>
                  <th scope="col">SLUG</th>
                  <th scope="col">NGÀY TẠO</th>
                  <th scope="col">CHỨC NĂNG</th>
                  <th scope="col">ID</th>
                </tr>
              </thead>
            <tbody>
              @foreach ($list as $row)
                  <tr>
                    <td><input type="checkbox" name="checkId[]" value="{{ $row->id }}"></td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->slug }}</td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                      <a href="{{ route('topic.status',['topic'=>$row->id]) }}" class="btn text-primary">
                        @if($row->status==1)
                         <i class='fa-solid fa-toggle-on'></i>
                         @else
                          <i class='fa-solid fa-toggle-off'></i>
                        @endif
                        </a>
                      <a href="{{ route('topic.show',['topic'=>$row->id]) }}" class="btn btn-sm bg-success"><i class="fa-solid fa-eye" ></i></a>
                      <a href="{{ route('topic.edit', ['topic' => $row->id]) }}" {{-- đường dẫn khi nhấp vào edit có tham số truyền vào nên phải có ->id  --}}
                        class="btn btn-sm btn-info">
      
                        <i class="fa-solid fa-edit"></i>
                    </a>
                      <a href="{{ route('topic.delete',['topic' => $row ->id]) }}" class="btn btn-sm btn-danger "><i class="fas fa-trash"></i></a>
                      </td>
                    <td>{{ $row->id }}</td>
                  </tr>
              @endforeach</tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection