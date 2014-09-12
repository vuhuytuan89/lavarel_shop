@extends('admin.newmain')

@section('title')
Chỉnh sửa
@stop
@section('content')

<h1>Hình thức vận chuyển <small>Chỉnh sửa</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('vanchuyens')}}"><i class="icon-dashboard"></i> Hình thức vận chuyểnm </a></li>
              <li class="active"><i class="icon-file-alt"></i>Chỉnh sửa</li>
            </ol>
<div class='col-lg-6'>
{{ Form::model($vanchuyen, array('method' => 'PATCH', 'route' => array('vanchuyens.update', $vanchuyen->id))) }}
	
            {{ Form::label('hinhthuc', 'Hình thức') }}
            </br>
            {{ Form::text('hinhthuc') }}
            </br>
            {{ Form::label('gia', 'Giá') }}
            </br>
            {{ Form::input('number', 'gia') }}
            </br>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('vanchuyens.show', 'Cancel', $vanchuyen->id, array('class' => 'btn')) }}
	
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
</div>
@stop
