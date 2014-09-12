@extends('admin.newmain')

@section('title')
Thêm mới
@stop

@section('content')
<h1>Hình thức vận chuyển <small>Thêm mới</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('vanchuyens')}}"><i class="icon-dashboard"></i> Hình thức vận chuyển</a></li>
              <li class="active"><i class="icon-file-alt"></i>Thêm</li>
            </ol>
<div class='col-lg-6'>
{{ Form::open(array('route' => 'vanchuyens.store')) }}
	
            {{ Form::label('hinhthuc', 'Hình thức') }}
            </br>
            {{ Form::text('hinhthuc') }}
            </br>
            {{ Form::label('gia', 'Giá') }}
            </br>
            {{ Form::input('number', 'gia') }}
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


