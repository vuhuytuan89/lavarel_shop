@extends('admin.newmain')

@section('title')
Chỉnh sửa hãng
@stop

@section('content')
 <h1>Hãng Cung Cấp <small>Chỉnh sửa hãng cung cấp</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('hangs')}}"><i class="icon-dashboard"></i> Tất cả hãng cung cấp</a></li>
              <li class="active"><i class="icon-file-alt"></i>Chỉnh sửa hãng Cung Cấp</li>
            </ol>
 <div class='col-lg-6'>
{{ Form::model($hang, array('class'=>'well','id'=>'form-make','method' => 'PATCH', 'route' => array('hangs.update', $hang->id))) }}
            @if ($errors->any())
            <div class='alert alert-danger'>
                    <ul>
                            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                    </ul>
            </div>    
            @endif 


         <div><label>Tên Hãng</label><input type='text' value='{{$hang->tenhang}}' name='tenhang' id='tenhang' placeholder="Nhập tên hãng" class='form-control' /></div>
   
          <div><label>Địa chỉ</label><input type='text' value='{{$hang->diachi}}' name='diachi' id='diachi' placeholder="Nhập địa chỉ" class='form-control' /></div>    
  
             <div><label>Điện thoại</label><input type='text' value='{{$hang->dienthoai}}' name='dienthoai' id='dienthoai' placeholder="Nhập số điện thoại" class='form-control' /></div>   
      
           <div><label>Email</label><input type='email' value='{{$hang->email}}' name='email' id='email' placeholder="Nhập Email" class='form-control' /></div>
     
           <div>	{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('hangs.show', 'Cancel', $hang->id, array('class' => 'btn')) }}
           </div>             
	
{{ Form::close() }}


</div>
@stop
