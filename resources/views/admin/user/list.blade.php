@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Quản lý user</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Danh sách user</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Username</th>
            <th>Option</th>
            <th style="width: 40px">Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
          <tr>
            <td></td>
            <td> {{$user->name}} </td>
            <td>
                @if ($user->block != true)
                    <form action=" {{ route('admin.blockUser',['user'=>$user]) }} " method="get">
                        @csrf
                        <button type="submit" class="btn btn-block btn-danger">Khóa</button>
                    </form>
                @else
                <form action=" {{ route('admin.unBlockUser',['user'=>$user]) }} " method="get">
                    @csrf
                    <button type="submit" class="btn btn-block btn-warning">Mở Khóa</button>                </form>
                @endif
            </td>
            <td>
                @if ($user->block == true)
                    <span class="badge bg-danger">Khóa</span>
                @else
                    <span class="badge bg-warning">Hoạt động</span>
                @endif
            </td>
          </tr>
          </tr>    
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <ul class="pagination pagination-sm m-0 float-right">
        <li class="page-item"><a class="page-link" href="#">«</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">»</a></li>
      </ul>
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
