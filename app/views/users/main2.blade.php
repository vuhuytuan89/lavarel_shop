<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Placed at the end of the document so the pages load faster ============================================= -->
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	
	<script src="{{asset('user/themes/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('user/themes/js/google-code-prettify/prettify.js')}}"></script>
	<script type='text/javascript' src="{{asset('assets/js/jquery-validate/jquery.validate.js')}}"></script>
        
        
	<script src="{{asset('user/themes/js/bootshop.js')}}"></script>
    <script src="{{asset('user/themes/js/jquery.lightbox-0.5.js')}}"></script>
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->
	
<!-- Bootstrap style --> 

    <link id="callCss" rel="stylesheet" href="{{asset('user/themes/bootshop/bootstrap.min.css')}}" media="screen"/>
    <link href="{{asset('user/themes/css/base.css')}}" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="{{asset('user/themes/css/bootstrap-responsive.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('user/themes/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="{{asset('user/themes/js/google-code-prettify/prettify.css')}}" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="{{asset('user/themes/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('user/themes/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('user/themes/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('user/themes/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('user/themes/images/ico/apple-touch-icon-57-precomposed.png')}}">
	<style type="text/css" id="enject">
            
            .pagination {
  display: inline-block;
  padding-left: 0;
  margin: 20px 0;
  border-radius: 4px;
}
.pagination > li {
  display: inline;
}
.pagination > li > a,
.pagination > li > span {
  position: relative;
  float: left;
  padding: 6px 12px;
  margin-left: -1px;
  line-height: 1.42857143;
  color: #428bca;
  text-decoration: none;
  background-color: #fff;
  border: 1px solid #ddd;
}
.pagination > li:first-child > a,
.pagination > li:first-child > span {
  margin-left: 0;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.pagination > li:last-child > a,
.pagination > li:last-child > span {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus {
  color: #2a6496;
  background-color: #eee;
  border-color: #ddd;
}
.pagination > .active > a,
.pagination > .active > span,
.pagination > .active > a:hover,
.pagination > .active > span:hover,
.pagination > .active > a:focus,
.pagination > .active > span:focus {
  z-index: 2;
  color: #fff;
  cursor: default;
  background-color: #428bca;
  border-color: #428bca;
}
.pagination > .disabled > span,
.pagination > .disabled > span:hover,
.pagination > .disabled > span:focus,
.pagination > .disabled > a,
.pagination > .disabled > a:hover,
.pagination > .disabled > a:focus {
  color: #999;
  cursor: not-allowed;
  background-color: #fff;
  border-color: #ddd;
}
.pagination-lg > li > a,
.pagination-lg > li > span {
  padding: 10px 16px;
  font-size: 18px;
}
.pagination-lg > li:first-child > a,
.pagination-lg > li:first-child > span {
  border-top-left-radius: 6px;
  border-bottom-left-radius: 6px;
}
.pagination-lg > li:last-child > a,
.pagination-lg > li:last-child > span {
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px;
}
label.error{
    color: red;
}
        </style>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong> <?php if(Session::has('taikhoan')) echo Session::get('taikhoan'); else  echo "Khách"; ?></strong>
          <?php if(Session::has('errorcart')){ ?>
   -<span style='color:red;'>{{{Session::get('errorcart')}}} {{Session::forget('errorcart')}}</span>
        <?php } ?>
   
    <?php if(Session::has('successcart')){ ?>
   -<span style='color:#3498db;'>{{{Session::get('successcart')}}} {{Session::forget('successcart')}}</span>
        <?php } ?>
        </div>
       
        <div class="span6">
	<div class="pull-right">
                <?php if(Session::has('giohang')){
                    $total=0;
                    $totalprice=0;
                    foreach(Session::get('giohang') as $v){
                        $total+=$v['quantity'];
                        $totalprice+=$v['gia']*$v['quantity'];
                    }
                 ?>
                 <span class="btn btn-mini">{{number_format($totalprice)}}</span>

		<a href="{{asset('users/xem-giohang')}}"><span class="btn btn-mini btn-primary">
                        <i class="icon-shopping-cart icon-white"></i> [ {{$total}} ] Sản phẩm trong giỏ hàng </span>
                </a> 
                <?php }else{ ?>
                     <span class="btn btn-mini">0</span>
	
		<a href="{{asset('users/xem-giohang')}}"><span class="btn btn-mini btn-primary">
                        <i class="icon-shopping-cart icon-white">
                            
                        </i> [ 0 ] Sản phẩm trong giỏ hàng </span> </a> 
                     
                <?php } ?>     
		</div>
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="{{asset('/')}}"><img src="{{asset('user/themes/images/logo.png')}}" alt="Larashop"/></a>
		<form class="form-inline navbar-search" method="post" action="{{asset('users/tim-sanpham')}}" >
		<input id="srchFld" class="srchTxt" name='key' type="text" />
		  <select class="srchTxt" name='id_loai'>
                      <?php $i=1; ?>
                      @foreach($chungloais as $chungloai)
                      <option id="{{{$loai->id}}}" value="{{{$chungloai->id}}}" <?php if($i==1) echo "selected='selected'"; $i++; ?> >{{{$chungloai->tenchungloai}}}</option>
                      @endforeach
			
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="special_offer.html">Liên Hệ</a></li>

	<?php if(Session::has('taikhoan')){ ?> <li class=""><a href="{{asset('users/doi-matkhau')}}">Đổi mật khẩu</a></li> <?php } ?>
            @if(!Session::has('taikhoan'))
	 <li class="">
	 <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Đăng Nhập</span></a>
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
         
            <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h3>Đăng Nhập</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" action='{{asset("users/dang-nhap")}}' method="post">
			  <div class="control-group">								
				<input type="text" id="inputEmail" name='username' placeholder="Username">
			  </div>
			  <div class="control-group">
				<input type="password" id="inputPassword" name='password' placeholder="Password">
			  </div>
			<p><a href='{{asset("users/dang-ky")}}'>Đăng Ký</a>|<a href="{{asset('users/quen-matkhau')}}">Quên mật khẩu?</a></p>
                            <button type="submit" class="btn btn-success">Đăng Nhập</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
			</form>		
			
		  </div>
	</div>
	</li>
        @else
        <li class=''>
            <a role="button" data-toggle="modal" style="padding-right:0" href="{{asset('users/thoat')}}"><span  class="btn btn-large btn-success" >Đăng Xuất</span></a>
        </li>
        @endif
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->

<!-- slider======================================================================================================-->
@yield('slide')

<!--end slide==========================================================================================-->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	@yield('sidebar')
<!-- Sidebar end=============================================== -->
		@yield('products')
		</div>
	</div>
</div><!-- end body-->
<!-- Footer ================================================================== -->
	<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>ACCOUNT</h5>
				<a href="login.html">YOUR ACCOUNT</a>
				<a href="login.html">PERSONAL INFORMATION</a> 
				<a href="login.html">ADDRESSES</a> 
				<a href="login.html">DISCOUNT</a>  
				<a href="login.html">ORDER HISTORY</a>
			 </div>
			<div class="span3">
				<h5>INFORMATION</h5>
				<a href="contact.html">CONTACT</a>  
				<a href="register.html">REGISTRATION</a>  
				<a href="legal_notice.html">LEGAL NOTICE</a>  
				<a href="tac.html">TERMS AND CONDITIONS</a> 
				<a href="faq.html">FAQ</a>
			 </div>
			<div class="span3">
				<h5>OUR OFFERS</h5>
				<a href="#">NEW PRODUCTS</a> 
				<a href="#">TOP SELLERS</a>  
				<a href="special_offer.html">SPECIAL OFFERS</a>  
				<a href="#">MANUFACTURERS</a> 
				<a href="#">SUPPLIERS</a> 
			 </div>
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
				<a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
			 </div> 
		 </div>
		<p class="pull-right">&copy; LaraShop</p>
	</div><!-- Container End -->
	</div>

	
	<!-- Themes switcher section ============================================================================================= -->

</body>
</html>