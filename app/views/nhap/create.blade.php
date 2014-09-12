@extends('admin.newmain')

@section('title')
Hóa đơn nhập
@stop

@section('content')
<h1>Hóa Đơn Nhập<small> Thêm hóa đơn nhập</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('nhap/xem-hoadon')}}"><i class="icon-dashboard"></i> Hóa Đơn Nhập</a></li>
              <li class="active"><i class="icon-file-alt"></i> Thêm hóa đơn nhập</li>
            </ol>

<script>
$(function() {
$( "#ngaynhap" ).datepicker();
 $("#ngaynhap").datepicker("option","dateFormat","yy-mm-dd");
});
</script>

    <p><a href="{{asset('sanpham/xem-sanpham')}}">Thêm sản phẩm mới vào hóa đơn</a></p>
    @if ($errors->any())
    <div class='alert alert-danger'>
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
    </div>
@endif
      <form action="{{asset('nhap/them-hoahon')}}" method='post' name='hoadon'>
    <table  class="table table-striped table-bordered" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
            </tr>
        </thead>
        
        <tbody>
            
            @foreach(Session::get('sanphams') as $sp)
            <tr>
                <td>{{$sp['id_sp']}}</td>
                <td>{{$sp['tensp']}}</td>
                <td><input type='text' name="soluong{{$sp['id_sp']}}" id="soluong{{$sp['id_sp']}}"  value="{{$sp['quantity']}}" class='form-control' /></td>
                <td><input type='text' name="dongia{{$sp['id_sp']}}" id="dongia{{$sp['id_sp']}}"  value="{{$sp['gia']}}" class='form-control'  /></td>
                <td><a href="<?php echo asset("nhap/xoa-sanpham/{$sp['id_sp']}"); ?>">Delete</a></td>
            </tr>
            
            @endforeach
            <tr>
                <td colspan="2"><b>Ngày nhập</b></td>
                 <td colspan="2"><input type="text" name="ngaynhap" id="ngaynhap" class="form-control" /></td>
            </tr>
        </tbody>
    </table>
           
           
        <?php $data=Session::get('sanphams');
              if(!empty($data))  {
         ?>
          <div>
               <button type='button' class='btn btn-info'  onclick="document.hoadon.action='<?php echo asset("nhap/them-hoadon"); ?>';   this.form.submit();   "
                  >Submit</button>
              <button type='button' class='btn btn-info'  onclick="document.hoadon.action='<?php echo asset("nhap/capnhat-hoadon"); ?>';   this.form.submit();   "
                  >Update</button>
          </div>
              <?php  }else{ ?>   
              
          <div class='alert alert-warning'>
              Vui lòng chọn sản phẩm
          </div>
              <?php   }?>  
                  
             
    </form>
    
@stop