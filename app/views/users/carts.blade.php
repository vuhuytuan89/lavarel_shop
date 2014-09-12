@extends('users.main2')

@section('title')
Giỏ hàng
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
		<li class="active"> Giỏ Hàng</li>
    </ul>
	<h3>  Giỏ hàng[ <small>{{$total}} Sản phẩm </small>]<a href="{{asset('/')}}" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Tiếp tục mua sắm </a></h3>	
	<hr class="soft"/>
        
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
     @endif
        
     
     
     
     <form name="hoadon" id="hoadon" method="post">
      @if(Session::has('errorUpdate'))
        <div class='alert alert-danger'>
            {{{Session::get('errorUpdate')}}}
            {{Session::forget('errorUpdate')}}
        </div>
        @endif
        
          @if(Session::has('successcart'))
        <div class='alert alert-danger'>
            {{{Session::get('successcart')}}}
            {{Session::forget('successcart')}}
        </div>
        @endif
        
          @if(Session::has('errorcart'))
        <div class='alert alert-danger'>
            {{{Session::get('errorcart')}}}
            {{Session::forget('errorcart')}}
        </div>
        @endif
        
        @if(Session::has('error'))
        <div class='alert alert-warning'>
        <ul>
          <?php
            foreach(Session::get("error") as $error){
                echo "<li>".$error."</li>";
            }
                     
          ?>
        </ul>
        </div>
        @endif
     <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Sản phẩm</th>
                  <th>Tên Sản Phẩm</th>
                  <th>Số Lượng</th>
                    <th>Giá</th>
                  <th>Tổng giá</th>
                  <th>Cập nhật</th>
                  <th>Xóa</th>
				</tr>
              </thead>
              <tbody>
               @foreach(Session::get('giohang') as $sp)
               <tr>
                   <td><img src="<?php echo asset("uploads/{$sp['hinhanh']}"); ?>" width="60" /></td>
                   <td>{{$sp['tensp']}}</td>
                   <td><input type='number'  style="max-width:34px" name="soluong{{$sp['id_sp']}}" id="soluong{{$sp['id_sp']}}"  value="{{$sp['quantity']}}" class='form-control' /></td>
                   <td><input type='text' disabled=""  style="max-width:100px" name="dongia{{$sp['id_sp']}}" id="dongia{{$sp['id_sp']}}"  value="{{number_format($sp['gia'])}}" class='form-control'  /></td>
                   <td><?php echo number_format($sp['quantity']*$sp['gia']); ?></td>
                   <td>
                        <button type='button' class='btn btn-small btn-info'  onclick="document.hoadon.action='<?php echo asset("users/capnhat-giohang"); ?>';   this.form.submit();   "
                  >Update</button>
                   </td>
                   <td><a  class='btn btn-small btn-danger' href="<?php echo asset("users/xoa-sanpham/{$sp['id_sp']}"); ?>">Delete</a></td>
               </tr>
               @endforeach
               <tr>
                   <th colspan="3">
                       Chọn hình thức vận chuyển
                   </th>
                   <td colspan="4">
                       <?php $i=1; ?>
                       @foreach($vanchuyens as $vanchuyen)
                       <div><input type='radio' name='id_hinhthuc' value="{{{$vanchuyen->id}}}"
                                <?php if($i==1) echo "checked='checked'"; $i++; ?>   
                                   />{{{$vanchuyen->hinhthuc}}} - Giá: {{{$vanchuyen->gia}}}</div>
                       </br>
                       @endforeach
                       <p><b>Chú ý:</b></p>
                       <p>Khi các bạn <b>KHÔNG</b> chọn hình thức "<b>Thu tiền khi giao hàng</b>" thì phải chuyển khoản qua ngân hàng.</p>
                       <p>Đây là thông tin tài khoản ngân hàng của Lara Shop:</p>
                       <p>Ngân hàng Đông Á: 0102962959</p>
                       <p>Ngân hàng Techcombank: 10223059180018</p>
                       <p>Ngân hàng Vietcombank: 0381000383351</p>
                       <p>Tất cả các tài khoản trên đều có chủ khoản là Nguyễn Thành Nam chi nhánh Ninh Kiều, Tp Cần Thơ.</p>
                       <p>Lưu ý: Khi chuyển khoản, bạn cần phải điền vào mục ghi chú (hoặc nội dung nộp) mã đơn hàng và email của
                           bạn. Nếu bạn chuyển tiền qua ATM hoặc không có ghi chú, bạn hãy vào mục 
                           Liên hệ trên Laravel.com và thông báo đã chuyển khoản của bạn về cho chúng tôi. 
                           Đơn hàng của bạn sẽ không được xử lý nếu chúng tôi chưa nhận được thanh toán.</p>
                   </td>
               </tr>
               <tr>
                   <th colspan="3">
                       Ghi Chú
                   </th>
                   <td colspan="4">
                       <textarea cols="100"  rows="10" name='ghichu'  ></textarea>
                   </td>
               </tr>
               <tr>
                   <th colspan="3">Tổng Giá</th>
                   <td colspan="4"><?php
                    $totalprice=0;
                    foreach(Session::get('giohang') as $v){
                        $totalprice+=$v['quantity']*$v['gia'];
                    }
                    echo number_format($totalprice)." + [ Giá hình thức vận chuyễn đã chọn ]";
                   ?></td>    
               </tr>
               <?php if(Session::has('taikhoan') && Session::has('giohang')){ ?>
               <tr>
                   <td colspan="7">
                        <button type='button' class='btn btn-info'  onclick="document.hoadon.action='<?php echo asset("users/dat-hang"); ?>';   this.form.submit();   "
                  >Đặt Hàng</button>
                   </td>
               </tr>
               <?php }else{ ?>
               <tr>
         
                   <td colspan="7" class="alert alert-info">Bạn phải đăng nhập để mua hàng</td>
 
               </tr>
               <?php } ?>
            </tbody>
            </table>
		
     
     </form>
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
</div><!-- end span 9 -->

@stop


