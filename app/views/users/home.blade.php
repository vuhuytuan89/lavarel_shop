@extends('users.main2')

@section('title')
Trang Chủ
@stop

@section('slide')
<div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
		  <div class="item active">
		  <div class="container">
			<a href="register.html"><img style="width:100%" src="{{asset('user/themes/images/carousel/1.png')}}" alt="special offers"/></a>
			<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div>
		  <div class="item">
		  <div class="container">
			<a href="register.html"><img style="width:100%" src="{{asset('user/themes/images/carousel/2.png')}}" alt=""/></a>
				<div class="carousel-caption">
				  <h4>Second Thumbnail label</h4>
				  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				</div>
		  </div>
		  </div>
		 
		  
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	  </div> 
</div>
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
                            <li><a href="<?php echo asset("users/loai-sanpham/{$loai->tenloai}/{$loai->id}") ?>" ><i class="icon-chevron-right"></i>{{{$loai->tenloai}}}</a></li>
                            @endif 
                            
                        @endforeach
                    </ul>
                      </li>
                    @endforeach
			
		</ul> 
		<br/>
                @foreach($spHightViews as $spHightView)
                <div class='thumbnail'>
                    <img src="<?php echo asset("uploads/{$spHightView->hinhanh}"); ?> " style="width:160px; height:180px;"  />
                    <div class='caption'>
                        <h5>{{{$spHightView->tensp}}}</h5>
                        <h4 style='text-align: center'>
                                 <a class="btn" href="<?php echo asset("users/chitiet-sanpham/{$spHightView->id}"); ?>"> <i class="icon-zoom-in"></i></a>
                                    <a class="btn" href="<?php echo asset("users/them-giohang/{$spHightView->id}") ?>">Mua<i class="icon-shopping-cart"></i></a> 
                                    <a class="btn btn-primary" href="#">{{{number_format($spHightView->gia)}}}</a>
                        </h4>
                    </div>
                </div></br>
                @endforeach
		
	</div>
@stop

@section('products')
<div class="span9">		
			<div class="well well-small">
			<h4>Sản phẩm mới <small class="pull-right">200+ sản phẩm</small></h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
			<div class="carousel-inner">
                         <?php
                            $i=1;
                            $active=1;
                            foreach($sps as $sp){ ?>
                            <?php if($i%4==1){ ?>
                                 <div class="item <?php if($active==1) echo "active"; $active++; ?>">
                                  <ul class="thumbnails">
                            <?php }?>
                            <li class="span3">
				  <div class="thumbnail">
                                 <?php if($sp->khuyenmai==1) {?> <i class="tag"></i> <?php } ?>
					<a href="<?php echo asset("users/chitiet-sanpham/{$sp->id}"); ?>"><img src="<?php echo asset("uploads/{$sp->hinhanh}"); ?>" style="width:160px; height: 160px;" alt=""></a>
					<div class="caption">
					  <h5>{{{$sp->tensp}}}</h5>
					  <h4><a class="btn" href="<?php echo asset("users/chitiet-sanpham/{$sp->id}"); ?>">XEM</a> <span class="pull-right">{{{number_format($sp->gia)}}}</span></h4>
					</div>
				  </div>
				</li>
                                      
                             <?php if($i%4==0){ ?>     
                                      </ul>
                                      </div>
                             <?php } ?>         
                            <?php $i++;} ?>
                          
			  </div>
			 <a class="left carousel-control" href="#featured" data-slide="prev">&lsaquo;</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">&rsaquo;</a>
			  </div>
			  </div>
		</div>
		<h4>Tất cả sản phẩm </h4>
			  <ul class="thumbnails">
                              @foreach($allsp as $sp)
                                <li class="span3">
				  <div class="thumbnail">
                                        <?php if($sp->khuyenmai==1) {?> <i class="tag"></i> <?php } ?>
					<a  href="<?php echo asset("users/chitiet-sanpham/{$sp->id}"); ?>"><img src="<?php echo asset("uploads/{$sp->hinhanh}"); ?>" style="width:160px; height:175px;" alt=""/></a>
					<div class="caption">
					  <h5>{{{$sp->tensp}}}</h5>
					  <p> 
						<?php echo substr($sp->chitietsp, 0,20)."..."; ?> 
					  </p>
					 
					  <h4 style="text-align:center"><a class="btn" href="<?php echo asset("users/chitiet-sanpham/{$sp->id}"); ?>"> <i class="icon-zoom-in"></i></a> 
                                              <a class="btn" href="<?php echo asset("users/them-giohang/{$sp->id}") ?>">Mua <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">{{number_format($sp->gia)}}</a></h4>
					</div>
				  </div>
				</li>
                              @endforeach
				
			  </ul>	
                <?php echo $allsp->links(); ?>
		</div>
@stop