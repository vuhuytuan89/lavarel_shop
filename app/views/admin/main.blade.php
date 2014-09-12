<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('title')</title>
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery-ui.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}" />

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" />

<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script> 
<script type='text/javascript' src="{{asset('assets/js/jquery-date/jquery-ui.js')}}"></script>
<script type='text/javascript' src="{{asset('assets/js/jquery-validate/jquery.validate.js')}}"></script>


</head>

<body>
<div id="page-wrap" class='group'>
<div id="banner">
    <object width="1000" height="165">
    <embed src="{{asset('assets/images/banner.swf')}}" width="1000" height="165" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" menu="false" wmode="transparent"></embed>
    </object>
</div>
  <div id="top-bar" class='group' >
        <ul id="menu-page-menu" >
            <li><a href="{{asset('admin')}}">Trang Chủ</a></li>
            <li><a href="#">Cập Nhật &raquo;</a>
                <ul id="menu-page-menu">
                    <li><a href="{{asset('sanpham/xem-sanpham')}}">Sản Phẩm</a></li>
                    <li><a href="{{asset('gia/xem-gia')}}">Giá</a></li>
                    <li><a href="{{asset('hangs')}}">Hãng</a></li>
                    <li><a href="{{asset('loais')}}">Loại Sản Phẩm</a></li>
                    <li><a href="{{asset('chung_loais')}}">Chủng Loại SP</a></li>
      
                </ul>
            </li>
            <li><a href="{{asset('nhap/xem-hoadon')}}">Hóa Đơn Nhập </a>
              
            </li>
            <li><a href="#">Thống Kê &raquo;</a>
                <ul id="menu-page-menu">
                    <li><a href="#">Doanh Thu</a></li>
                    <li><a href="#">X</a></li>
                    <li><a href="#">Y</a></li>
                    <li><a href="#">Z</a></li>
                    <li><a href="#">K</a></li>
                </ul>
            </li>
            <li><a href="{{asset('nguoi_dungs')}}">Quản Lý Thành Viên</a></li>
			
        </ul>
	
        <div id="searchBox">
            <!--insert search box-->
            <label>Xin chào Admin</label>  <a href="{{asset('users/thoat')}}">Thoát</a>
        </div><!--search box-->
              
    </div><!--top bar-->

<div id="main-content">
  
    

        @yield('content')
    
 </div><!--End #maincontainer-->

</div><!--End page-wrap-->
<div id="footer">
			<div id="footerNav">
				<p class="copyright">Trang web bán hàng trực tuyến</p>
				<ul>
					<li><a href="#">Trang Chủ</a></li>
					<li><a href="#">Sản Phẩm</a></li>
					<li><a href="#">Tài Khoản</a></li>
					<li><a href="#">Thống Kê</a></li>
					<li><a href="#">Quản Lý Thành Viên</a></li>
				</ul>
			</div><!--End #footNav-->	
			
		</div><!--End #footer-->
</body>
</html>