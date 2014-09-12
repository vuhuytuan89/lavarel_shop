@extends('admin.newmain')
@section('title')
Hoạt Động Gần Đây
@stop

@section('content')
<h1>Hoạt Động Gần Đây <small>Tất cả hoạt động</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('admin')}}"><i class="icon-dashboard"></i> Trang Chủ</a></li>
              <li class="active"><i class="icon-file-alt"></i>Hoạt Động Gần Đây</li>
            </ol>



   <div class="row">
          <div class="col-lg-12">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                      <h3 class="panel-title">Hoạt Động Gần Đây</h3>
                  </div>
                  <div class="panel-body">
                      <table class="table table-bordered table-hover tablesorter">
                          <thead>
                              <tr>
                                  <th>Hoạt Động</th>
                                  <th>Bảng Ảnh Hưởng</th>
                                  <th>ID </th>
                                  <th>Thông Tin </th>
                                  <th>Thông Tin trước Khi Sửa</th>
                                  <th>Thời Gian <i class="fa fa-sort"></i></th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($logs as $log)
                              <tr>
                                  <td>{{{$log->hoatdong}}}</td>
                                  <td>{{{$log->tenbang}}}</td>
                                  <td>{{{$log->id_thanhphan}}}</td>
                                  <td>{{{$log->ten_thanhphan}}}</td>
                                  <td>{{{$log->thongtin_cu}}}</td>
                                  <td>{{{$log->created_at}}}</td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
                  <div class="text-right">
                 {{$logs->links()}}
                  </div>
              </div>
          </div>
      </div>

@stop
