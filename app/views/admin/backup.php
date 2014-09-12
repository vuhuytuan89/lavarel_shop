@extends('admin.main')

@section('title')
Trang Chủ Admin
@stop

@section('content')
  <div id="mainNav">
        <h1>Danh Mục</h1>
        <ul>
             <li><a href="{{asset('admin')}}">Trang Chủ</a></li>
            <li><a href="#">Cập Nhật &raquo;</a>
                <ul >
                    <li><a href="#">Sản Phẩm</a></li>
                    <li><a href="#">Giá</a></li>
                     <li><a href="{{asset('hangs')}}">Hãng</a></li>
					<li><a href="#">Loại Sản Phẩm</a></li>
					<li><a href="{{asset('chung_loais')}}">Chủng Loại SP</a></li>
      
                </ul>
            </li>
            <li>  <li><a href="{{asset('nhap/xem-hoadon')}}">Hóa Đơn Nhập </a>
              
            </li>
            <li><a href="#">Thống Kê &raquo;</a>
                <ul >
                    <li><a href="#">Doanh Thu</a></li>
                    <li><a href="#">X</a></li>
                    <li><a href="#">Y</a></li>
                    <li><a href="#">Z</a></li>
                    <li><a href="#">K</a></li>
                </ul>
            </li>
            <li><a href="#">Quản Ký Thành Viên</a></li>
        </ul>
    </div><!--End Main Nav-->

    <div id="content">
     <h2>Xin chào bạn đến với trang Admin của shop</h2>
        <div class="dieukhoan">
        <ol>
            <li><label>Điều khoản sử dụng</label>
            <ol>
            <li>Admin có thể cập nhật các thông tin về sản phẩm.</li>
            <li>Admin có thể cập nhật đơn hàng</li>
            <li>Admin có thể quản lý tài khoản của người dùng</li>
            </ol>
                </li>
        </ol>
        </div>
     </div>
@stop