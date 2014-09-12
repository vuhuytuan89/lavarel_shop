@extends('admin.newmain')

@section('title')
Chỉnh sửa loại sản phẩm
@stop

@section('content')
<h1>Loại Sản Phẩm <small>Chỉnh sửa loại sản phẩm</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('loais')}}"><i class="icon-dashboard"></i> Loại Sản Phẩm </a></li>
              <li class="active"><i class="icon-file-alt"></i>Chỉnh sửaloại sản phẩm</li>
            </ol>
<div class='col-lg-6'>
{{ Form::model($loai, array('class'=>'well','id'=>'form-make','method' => 'PATCH', 'route' => array('loais.update', $loai->id))) }}
	
            @if ($errors->any())
        <div class='alert alert-danger'>
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
        </div>   
        @endif
            <div><label>Tên loại</label>
                <input type='text' name='tenloai' value="{{$loai->tenloai}}" id='tenloai' placeholder="Nhập tên loại sản phẩm" class='form-control' />
            </div>
       
                <div><label>Chủng loại</label>
            <select name='id_chungloai' id='id_chungloai' class='form-control'>
            @foreach($chungloai as $value)
            <option value="{{$value->id}}"
                    <?php if($value->id == $loai->id_chungloai) echo "selected='selected'"; ?>
                    >{{$value->tenchungloai}}</option>
            @endforeach
            </select>
            </div>  
        
            
                 <div><label>Hãng</label>
            <select name='id_hang' id='id_hang' class='form-control'>
            @foreach($hang as $value)
            <option value="{{$value->id}}"  <?php if($value->id == $loai->id_hang) echo "selected='selected'"; ?>>{{$value->tenhang}}</option>
            @endforeach
            </select>
            </div>  
     
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('loais.show', 'Cancel', $loai->id, array('class' => 'btn')) }}
	
{{ Form::close() }}


</div>
@stop
