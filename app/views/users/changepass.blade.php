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
		<li class="active">Đổi mật khẩu?</li>
    </ul>
	<h3> ĐỔI MẬT KHẨU ?</h3>	
	<hr class="soft"/>
	
	<div class="row">
		<div class="span9" style="min-height:900px">
			<div class="well">
			<h5>Đổi mật khẩu</h5><br/>
			
		
       <form id='form-make' class='well' action="{{asset('users/doi-matkhau')}}" method='post'>
     
        @if(Session::has('errorPass'))
        <div class='alert alert-warning'>
            {{{Session::get('errorPass')}}}
            {{Session::forget('errorPass')}}
        </div>
        @endif
        
         @if(Session::has('successPass'))
        <div class='alert alert-success'>
            {{{Session::get('successPass')}}}
            {{Session::forget('successPass')}}
        </div>
        @endif
        
          @if(Session::has('error_pass'))
        <div class="alert alert-danger">  {{Session::get('error_pass')}}</div>
        {{Session::forget('error_pass')}}
        @endif
        
    
        
        <div><label style='font-weight: bold;'>Mật khẩu hiện tại</label>
            <input type='password' name='pass' id='pass' class='form-control' placeholder="Vui lòng điền mật khẩu" />
        </div></br>        
        
        
        <div><label style='font-weight: bold;'>Mật khẩu mới</label>
            <input type='password' name='password' id='password' class='form-control' placeholder="Vui lòng điền mật khẩu mới" />
        </div></br>
        
        <div><label style='font-weight: bold;'>Xác nhận mật khẩu mới</label>
            <input type='password' name='password_confirmation' id='password_confirmation' class='form-control' placeholder="Vui lòng xác nhận mật khẩu mới" />
        </div></br>
        
        
        <div><input type='submit' class='btn  btn-lg btn-primary' value='Đổi Mật Khẩu' /></div>
    </form>
		</div>
		</div>
	</div>	
	
</div>
<script type='text/javascript'>
    $("#form-make").validate({
        rules:{
            pass:{
                required:true
                
            },
            password:{
                required:true,
                minlength:6
            },
            password_confirmation:{
         
                equalTo:"#password"
            }
        },
        messages:{
            pass:{
                required:"Vui lòng nhập mật khẩu cũ"
                
            },
             password:{
                required:"Vui lòng điền mật khẩu mới",
                minlength:"Mật khẩu phải có ít nhất 6 ký tự"
            },
            password_confirmation:{
      
                equalTo:"Mật khẩu xác nhận không đúng"
            }
        }
    })
</script>

@stop


