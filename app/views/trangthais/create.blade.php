@extends('admin.newmain')

@section('title')
Thêm mới
@stop

@section('content')
<h1>Trạng Thái Đơn Hàng <small>Thêm mới</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('trangthais')}}"><i class="icon-dashboard"></i> Trạng Thái Đơn Hàng</a></li>
              <li class="active"><i class="icon-file-alt"></i>Thêm mới</li>
            </ol>

<div class="col-lg-6">
{{ Form::open(array('route' => 'trangthais.store')) }}
	
            {{ Form::label('trangthai', 'Trạng thái:') }}
            {{ Form::text('trangthai') }}
            </br>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
	
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
</div>
@stop


