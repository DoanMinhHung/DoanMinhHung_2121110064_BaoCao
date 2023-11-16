@extends('layouts.admin')
@section('title', $title??'Danh sách danh mục')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>THÙNG RÁC CHỦ ĐỀ</h1>
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
              <a href="{{ route('topic.index') }}" class="btn btn-sm btn-primary"><i class=""></i>Quay về danh sách</a>
            </div>
          </div>
        </div>
        </div>
        <div class="card-body">
          @includeIf('backend.message')
          <table class="table table-bordered table-striped ">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">CHỦ ĐỀ</th>
                  <th scope="col">SLUG</th>
                  <th scope="col">NGÀY TẠO</th>
                  <th scope="col">CHỨC NĂNG</th>
                  <th scope="col">ID</th>
                </tr>
            @foreach ($list as $row)
                <tr>
                  <td><input type="checkbox" name="checkId[]" value="{{ $row->id }}"></td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->slug }}</td>
                  <td>{{ $row->created_at }}</td>
                  <td>
                    <a href="{{ route('topic.show',['topic' => $row ->id]) }}" class="btn btn-sm btn-success"><i class="far fa-eye"></i></a>
                    <a href="{{ route('topic.restore',['topic' => $row ->id]) }}" class="btn btn-sm btn-primary "><i class="fas fa-undo"></i></a>
                    <form action="{{ route('topic.destroy',['topic' => $row ->id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>
                  <td>{{ $row->id }}</td>
                </tr>
            @endforeach
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