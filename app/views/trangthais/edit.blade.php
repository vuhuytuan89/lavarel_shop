@extends('admin.newmain')

@section('title')
Chỉnh sửa trạng thái
@stop
@section('content')
<h1>Trạng Thái Đơn Hàng <small>Chỉnh sửa </small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('trangthais')}}"><i class="icon-dashboard"></i> Trạng Thái Đơn Hàng </a></li>
              <li class="active"><i class="icon-file-alt"></i>Chỉnh sửa</li>
            </ol>
<div class="col-lg-6">
{{ Form::model($trangthai, array('method' => 'PATCH', 'route' => array('trangthais.update', $trangthai->id))) }}
	
            {{ Form::label('trangthai', 'Trangthai:') }}
            {{ Form::text('trangthai') }}
      
            </br>
	
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('trangthais.show', 'Cancel', $trangthai->id, array('class' => 'btn')) }}
	
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
</div>
@stop
