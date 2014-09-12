@extends('users.main2')

@section('title')
Quên mật khẩu
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
		<li><a href="{{asset('/')}}">Trang chủ</a> <span class="divider">/</span></li>
		<li class="active">Quên mật khẩu?</li>
    </ul>
	<h3> QUÊN MẬT KHẨU ?</h3>	
	<hr class="soft"/>
	
	<div class="row">
		<div class="span9" style="min-height:900px">
			<div class="well">
			<h5>Lấy mật khẩu</h5><br/>
			
			Vui lòng điền địa chỉ Email của bạn. Hệ thống sẽ kiểm tra và gửi mật khẩu mới vào email của bạn.<br/><br/><br/>
       <form id='form-make' class='well' action="{{asset('users/quen-matkhau')}}" method='post'>
        @if(Session::has('error_mail'))
        <div class="alert alert-danger">    {{Session::get('error_mail')}}</div>
        {{Session::forget('error_mail')}}
        @endif
        
          @if(Session::has('error_pass'))
        <div class="alert alert-danger">  {{Session::get('error_pass')}}</div>
        {{Session::forget('error_pass')}}
        @endif
        
          @if(Session::has('success_pass'))
          <div class="alert alert-success"> {{Session::get('success_pass')}}<a href="{{asset('users/dang-nhap')}}">Đăng nhập ngay.</a></div>
        {{Session::forget('success_pass')}}
        @endif
        
        <div><label>Email</label><input type='email' name='email' id='email' class='form-control' placeholder="Vui lòng điền email" /></div>
        <p>Mật khẩu tạm thời sẽ gửi đến email của bạn.</p>
        </br>
        <div><input type='submit' class='btn  btn-lg btn-primary' value='Lấy Mật Khẩu' /></div>
    </form>
		</div>
		</div>
	</div>	
	
</div>
<script type='text/javascript'>
    $("#form-make").validate({
        rules:{
            email:{
                required:true,
                email:true
            }
        },
        messages:{
            email:{
                required:"Vui lòng nhập thông tin",
                email:"Vui lòng nhập đúng định dạng Email"
            }
        }
    })
</script>

@stop


