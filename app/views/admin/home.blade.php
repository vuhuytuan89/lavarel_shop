@extends('admin.newmain')

@section('title')
Trang Chủ Admin
@stop

@section('content')
      <h1>Trang Chủ <small>Xin chào Admin!</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('admin')}}"><i class="icon-dashboard"></i> Trang Chủ</a></li>
          
            </ol>
        <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <label>Điều khoản sử dụng</label>
            <ol>
            <li>Admin có thể cập nhật các thông tin về sản phẩm.</li>
            <li>Admin có thể cập nhật đơn hàng</li>
            <li>Admin có thể quản lý tài khoản của người dùng</li>
            </ol>
         
            </div>
      <div class="row">
          <div class="col-lg-4">
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
                         
                          
                                  <th>Thời Gian <i class="fa fa-sort"></i></th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($logs as $log)
                              <tr>
                                  <td>{{{$log->hoatdong}}}</td>
                                  <td>{{{$log->tenbang}}}</td>
                                  <td>{{{$log->id_thanhphan}}}</td>
                      
                                  <td>{{{$log->created_at}}}</td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
                  <div class="text-right">
                  <a href="<?php echo asset('admin/logfile') ?>"> Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
          </div>
          
          <!-- tonkho -->
          <div class="col-lg-4">
              <div class="panel panel-primary">
                  <div class="panel-heading">
                      <h3 class="panel-title">Sản phẩm đã hết hàng</h3>
                  </div>
                  <div class="panel-body">
                      <table class="table table-bordered table-hover tablesorter">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Tên Sản Phẩm</th>
                                  <th>Số Lượng</th>
                         
                          
                                
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($tonkho as $tk)
                              <tr>
                                  <td>{{{$tk->id}}}</td>
                                  <td><a href="<?php echo asset("sanpham/chitiet-sanpham/{$tk->id}") ?>">{{{$tk->tensp}}}</a></td>
                                  <td>{{{$tk->soluong}}}</td>
                      
                                 
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
                  <div class="text-right">
                  <a href="<?php echo asset('nhap/xem-tonkho') ?>"> Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
          </div>
          <!-- end-->
      </div>
   
@stop