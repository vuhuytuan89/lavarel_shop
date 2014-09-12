@extends('admin.newmain')

@section('title')
Loại sản phẩm
@stop
@section('content')
<h1>Loại Sản Phẩm <small>Thêm loại sản phẩm</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('loais')}}"><i class="icon-dashboard"></i> Loại Sản Phẩm </a></li>
              <li class="active"><i class="icon-file-alt"></i>Thêm loại sản phẩm</li>
            </ol>
<div class='col-lg-6'>
{{ Form::open(array('class'=>'well','id'=>'form-make','route' => 'loais.store')) }}
	@if ($errors->any())
        <div class='alert alert-danger'>
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
        </div>    
        @endif
        
            <div><label>Tên loại</label>
                <input type='text' name='tenloai' id='tenloai' placeholder="Nhập tên loại sản phẩm" class='form-control' />
            </div>
        
         
            <div><label>Chủng loại</label>
            <select name='id_chungloai' id='id_chungloai' class='form-control'>
            @foreach($chungloai as $value)
            <option value="{{$value->id}}">{{$value->tenchungloai}}</option>
            @endforeach
            </select>
            </div>    
                
     
          
            
            <div><label>Hãng</label>
            <select name='id_hang' id='id_hang' class='form-control'>
            @foreach($hang as $value)
            <option value="{{$value->id}}">{{$value->tenhang}}</option>
            @endforeach
            </select>
            </div>   
        </br>
        <div >{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}</div>
	
{{ Form::close() }}

</div>

@stop


