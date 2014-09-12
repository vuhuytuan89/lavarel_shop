@extends('admin.newmain')

@section('title')
Thêm mới
@stop

@section('content')

  <h1>Hãng Cung Cấp <small>Thêm hãng cung cấp</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('hangs')}}"><i class="icon-dashboard"></i> Tất cả hãng cung cấp</a></li>
              <li class="active"><i class="icon-file-alt"></i>Thêm hãng Cung Cấp</li>
            </ol>

  <div class='col-lg-6'>
{{ Form::open(array('class'=>'well','id'=>'form-make','route' => 'hangs.store')) }}
	@if ($errors->any())
<div class='alert alert-danger'>
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
</div>   
@endif
         
            <div><label>Tên Hãng</label><input type='text' name='tenhang' id='tenhang' placeholder="Nhập tên hãng" class='form-control' /></div>
        
        
              <div><label>Địa chỉ</label><input type='text' name='diachi' id='diachi' placeholder="Nhập địa chỉ" class='form-control' /></div>
        
          
              <div><label>Điện thoại</label><input type='text' name='dienthoai' id='dienthoai' placeholder="Nhập số điện thoại" class='form-control' /></div>
       
      
              <div><label>Email</label><input type='email' name='email' id='email' placeholder="Nhập Email" class='form-control' /></div>
              
              </br>      <div>	{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}</div>
	
{{ Form::close() }}


  </div>

@stop


