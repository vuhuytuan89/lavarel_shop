@extends('users.main2')

@section('title')
Sản Phẩm
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
		<li><a href="{{asset('/')}}">Trang Chủ</a> <span class="divider">/</span></li>
		<li class="active">Tìm kiếm</li>
    </ul>
	<h3> Tìm kiếm sản phẩm<small class="pull-right">  </small></h3>	
	<hr class="soft"/>
        <?php if(empty($sps)) echo "Không tìm thấy sản phẩm này"; else { ?>
        <div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>
</br>
<div class="tab-content">
	<div class="tab-pane" id="listView">
              @foreach($sps as $sp)
                                <div class="row">	  
					<div class="span2">
						<img src="<?php echo asset("uploads/{$sp->hinhanh}") ?>" alt="" style='width: 160px; height: 175px;'/>
					</div>
					<div class="span4">
						<h3>{{{$sp->tensp}}}</h3>				
						<hr class="soft"/>
						<h5>{{{$sp->tensp}}} </h5>
						<p>
						{{{$sp->chitietsp}}}
						</p>
						<a class="btn btn-small pull-right" href="<?php echo asset("users/chitiet-sanpham/{$sp->id}"); ?>">Chi tiết</a>
						<br class="clr"/>
					</div>
					<div class="span3 alignR">
					<form class="form-horizontal qtyFrm">
					<h3>{{number_format($sp->gia)}}</h3>
					
					<div class="btn-group">
					  <a href="<?php echo asset("users/them-giohang/{$sp->id}"); ?>" class="btn btn-large btn-primary"> Mua <i class=" icon-shopping-cart"></i></a>
					  
					 </div>
						</form>
					</div>
                            </div>
                            <hr class="soft"/>
                            @endforeach
            
		
	</div>

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
                    @foreach($sps as $sp)
                                    <li class="span3">
                                            
					  <div class="thumbnail">
						<a href="<?php echo asset("users/chitiet-sanpham/{$sp->id}"); ?>">
                                                <img src="<?php echo asset("uploads/{$sp->hinhanh}") ?>" alt="" style='width: 160px; height: 175px;'/></a>
						<div class="caption">
						  <h5>{{{$sp->tensp}}}</h5>
						  <p> 
							<?php echo substr($sp->chitietsp, 0, 20)."..."; ?>
						  </p>
						  <h4 style="text-align:center"><a class="btn" href="<?php echo asset("users/chitiet-sanpham/{$sp->id}"); ?>"> <i class="icon-zoom-in"></i></a> 
                                                      <a class="btn" href="<?php echo asset("users/them-giohang/{$sp->id}"); ?>">Mua <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">{{number_format($sp->gia)}}</a></h4>
						</div>
					  </div>
					</li>
                                    @endforeach
			
		  </ul>
	<hr class="soft"/>
	</div>
</div>
        <?php } ?>



</div>

@stop


