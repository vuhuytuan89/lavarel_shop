<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets2/css/jquery-ui.css')}}" />
    <link href="{{asset('assets2/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="{{asset('assets2/css/sb-admin.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets2/font-awesome/css/font-awesome.min.css')}}">
      <!-- JavaScript -->
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script> 
    <script src="{{asset('assets2/js/bootstrap.js')}}"></script>
    
        <!-- Page Specific Plugins -->
    <script src="{{asset('assets2/js/tablesorter/jquery.tablesorter.js')}}"></script>
    <script src="{{asset('assets2/js/tablesorter/tables.js')}}"></script>
    

    
    
    <!-- sctip validate-->
    <script type='text/javascript' src="{{asset('assets2/js/jquery-date/jquery-ui.js')}}"></script>
    <script type='text/javascript' src="{{asset('assets2/js/jquery-validate/jquery.validate.js')}}"></script>
    <style>
        label.error{
      color:#e74c3c;
            }
    </style>
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{asset('admin')}}">Administration</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="{{asset('admin')}}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
            
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Sản Phẩm <b class="caret"></b></a>
              <ul class="dropdown-menu">
                   <li><a href="{{asset('sanpham/xem-sanpham')}}"><i class="fa fa-hand-o-right"></i>Tất Cả Sản Phẩm</a></li>
                   <li><a href="{{asset('loais')}}"><i class="fa fa-hand-o-right"></i> Loại Sản Phẩm</a></li>
                    <li><a href="{{asset('chung_loais')}}"><i class="fa fa-hand-o-right"></i> Chủng Loại Sản Phẩm</a></li>
             <li><a href="{{asset('hangs')}}"><i class="fa fa-hand-o-right"></i> Hãng Cung Cấp</a></li>
              </ul>
            </li>
            
            
            
            
            
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Giá Sản Phẩm <b class="caret"></b></a>
              <ul class="dropdown-menu">
                     <li><a href="{{asset('gia/xem-gia')}}"><i class="fa fa-hand-o-right"></i> Tất cả giá</a></li>
                     <li><a href="{{asset('gia/xem-giaad')}}"><i class="fa fa-hand-o-right"></i> Giá đang áp dụng</a></li>
    
              </ul>
            </li>
            
            
            
           
            
            <li><a href="{{asset('nguoi_dungs')}}"><i class="fa fa-hand-o-right"></i> Thành Viên</a></li>
           <li><a href="{{asset('nhap/xem-hoadon')}}"><i class="fa fa-hand-o-right"></i> Hóa Đơn Nhập</a></li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Đơn Đặt Hàng <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{asset('dat_hang/xemdon-dathang')}}">Đơn hàng chưa chuyển</a></li>
                <li><a href="{{asset('dat_hang/donhang-dachuyen')}}">Đơn hàng đã chuyển</a></li>
    
              </ul>
            </li>
            
            
                
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Kho Hàng <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{asset('nhap/xem-tongkho')}}">Tổng Kho</a></li>
                <li><a href="{{asset('nhap/xem-tonkho')}}">Tồn Kho</a></li>
    
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
             <li class="dropdown user-dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
                 <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="{{asset('users/doi-matkhau')}}"><i class="fa fa-gear"></i> Đổi mật khẩu</a></li>
                <li class="divider"></li>
                <li><a href="{{asset('users/thoat')}}"><i class="fa fa-power-off"></i> Thoát</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
       
            
            @yield('content')
          </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

  

  </body>
</html>