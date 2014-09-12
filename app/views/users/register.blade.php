@extends('users.main2')

@section('title')
Đăng Ký
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
		<li class="active">Đăng Ký</li>
    </ul>
	<h3> ĐĂNG KÝ</h3>	
	<hr class="soft"/>
	@if(Session::has('success'))
        <div class='alert alert-success'>
            {{{Session::get('success')}}}
            {{Session::forget('success')}}
        </div>
        @endif
        
        @if(Session::has('error'))
        <div class='alert alert-danger'>
            {{{Session::get('error')}}}
            {{Session::forget('error')}}
        </div>
        @endif
	<div class="row">
		<div class="span9" style="min-height:900px">
			<div class="well">
			<h5>Đăng ký thành viên</h5><br/>
      <form id='form-make' class='well' method="post" action="{{asset('users/dang-ky')}}">
          <div><label class='control-label'><b>Họ Tên</b></label><input type='text' name='tennd' placeholder="Nhập họ tên" class='form-control' id='tennd'/></div>
          <div><label class='control-label'><b>Tài Khoản</b></label><input type='text' name='username' placeholder="Nhập tên tài khoản" class='form-control' id='username'/></div>
          <div><label class='control-label'><b>Mật Khẩu</b></label><input type='password' name='password' placeholder="Nhập mật khẩu" class='form-control' id='password'/></div>
          <div><label class='control-label'><b>Nhập lại mật khẩu</b></label><input type='password' placeholder="Nhập lại mật khẩu" name='password_confirmation' class='form-control' id='password_confirmation'/></div>
          <div><label class='control-label'><b>Địa chỉ</b></label><input type='text' name='diachi' placeholder="Nhập địa chỉ" class='form-control' id='diachi'/></div>
          <div><label class='control-label'><b>Email</b></label><input type='email' name='email' placeholder="Nhập Email" class='form-control' id='email'/></div>
          <div><label class='control-label'><b>Điện thoại</b></label><input type='text' name='dienthoai' placeholder="Nhập số điện thoại " class='form-control' id='dienthoai'/></div>
    </br>
    <div><input type='submit' class='btn btn-primary btn-lg' value='Đăng Ký' /></div>
    

		</div>
		</div>
      

</form>
            
	</div>	
	
</div>
<script type="text/javascript">
    $("#form-make").validate({
        rules:{
            tennd:{required:true,
                    minlength:6
                 },
           username:{
               required:true,
               minlength:6,
               remote:{
                    url:"{{asset('users/check-username')}}",
                    type:"POST"
                }},
           password:{required:true, minlength:6},
           password_confirmation:{required:true, equalTo:"#password"},
           diachi:{required:true},
           email:{
               required:true,
               email:true,
               remote:{
                    url:"{{asset('users/check-email')}}",
                    type:"POST"
                }},
           dienthoai:{required:true, minlength:10, maxlength:12}
        },
        messages:{
            tennd:{
                required:"Vui lòng nhập họ tên",
                minlength:"Vui lòng nhập ít nhất 6 ký tự"
            },
            username:{
                required:"Vui lòng nhập tên tài khoản",
                minlength:"Nhập ít nhất 6 ký tự",
                remote:"Tên tài khoản đã được sử dụng"
               
            },
            password:{
                required:"Vui lòng nhập mật khẩu",
                minlength:"Mật khẩu phải có ít nhất 6 ký tự"
            },
            password_confirmation:{
                required:"Vui lòng nhập lại mật khẩu",
                equalTo:"Mật khẩu xác nhận không đúng"
            },
            diachi:{
                required:"Vui lòng nhập địa chỉ"
            },
            email:{
                required:"Vui lòng nhập email",
                email:"Không đúng định dạng email",
                remote:"Email đã được sử dụng"
               
            },
            dienthoai:{
                required:"Vui lòng nhập số điện thoại",
                minlength:"Nhập ít nhất 10 ký tự",
                maxlength:"Vượt quá 12 ký tự"
            }
        }
    })
</script>
@stop


