@extends('users.main2')

@section('title')
Đăng nhập
@stop

@section('sidebar')
<div id="sidebar" class="span3">
		<?php if(Session::has('giohang')){
                    $total=0;
                    $totalprice=0;
                    foreach(Session::get('giohang') as $v){
                        $total+=$v['quantity'];
                        $totalprice+=$v['gia']*$v['quantity'];
                    }
                 ?>
                 <div class="well well-small"><a id="myCart" href="{{asset('users/xem-giohang')}}">
                         <img src="{{asset('user/themes/images/ico-cart.png')}}" alt="cart">
                         {{$total}} Sản phẩm
                         <span class="badge badge-warning pull-right">{{number_format($totalprice)}}</span></a>
                     </div>
                     <?php }else{ ?>
		<div class="well well-small"><a id="myCart" href="{{asset('users/xem-giohang')}}">
                         <img src="{{asset('user/themes/images/ico-cart.png')}}" alt="cart">
                         0 Sản phẩm
                         <span class="badge badge-warning pull-right">0</span></a>
                     </div>
                     <?php } ?>
    
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
                    @foreach($chungloais as $chungloai)
                    <li class='subMenu'><a>{{{$chungloai->tenchungloai}}}</a>
                    <ul style='display:none'>
                        @foreach($loais as $loai)
                            @if($chungloai->id==$loai->id_chungloai)
                            <li><a href="<?php echo asset("users/loai-sanpham/{$loai->tenloai}/{$loai->id}") ?>"><i class="icon-chevron-right"></i>{{{$loai->tenloai}}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                      </li>
                    @endforeach
			
		</ul> 
		<br/>
             
		
	</div>
@stop










@section('products')
<div class="span9">
   <ul class="breadcrumb">
		<li><a href="{{asset('/')}}">Trang CHủ</a> <span class="divider">/</span></li>
		<li class="active"> Đăng nhập</li>
    </ul>
		
	<hr class="soft"/>
        @if(Session::has('errorlogin'))
        <div class='alert alert-danger'>
            {{{Session::get('errorlogin')}}}
            {{Session::forget('errorlogin')}}
        </div>
        @endif
        
     @if(!Session::has('taikhoan'))   
      <table class="table table-bordered">
		<tr><th> Bạn phải đăng nhập để mua hàng  </th></tr>
		 <tr> 
		 <td>
			<form class="form-horizontal" action='{{asset("users/dang-nhap")}}' method="post">
				<div class="control-group">
				  <label class="control-label" for="inputUsername">Tài khoản</label>
				  <div class="controls">
					<input type="text" name='username' id="inputUsername" placeholder="Tài khoản">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Mật Khẩu</label>
				  <div class="controls">
					<input type="password" id="inputPassword1" name='password' placeholder="Password">
				  </div>
				</div>
				<div class="control-group">
				  <div class="controls">
					<button type="submit" class="btn">Đăng Nhập</button> hoặc <a href="{{asset('users/dang-ky')}}" class="btn">Đăng Ký</a>
				  </div>
				</div>
				<div class="control-group">
					<div class="controls">
					  <a href="{{asset('users/quen-matkhau')}}" style="text-decoration:underline">Quên mật khẩu?</a>
					</div>
				</div>
			</form>
		  </td>
		  </tr>
	</table>	
     @else
     <p>Bạn đã đăng nhập thành công</p>
     @endif
        
</div><!-- end span 9 -->

@stop


