@extends('layouts.scaffold')

@section('main')

<h1>Create Nguoi_dung</h1>

{{ Form::open(array('route' => 'nguoi_dungs.store')) }}
	<ul>
        <li>
            {{ Form::label('tennd', 'Tennd:') }}
            {{ Form::text('tennd') }}
        </li>

        <li>
            {{ Form::label('taikhoan', 'Taikhoan:') }}
            {{ Form::text('taikhoan') }}
        </li>

        <li>
            {{ Form::label('matkhau', 'Matkhau:') }}
            {{ Form::text('matkhau') }}
        </li>

        <li>
            {{ Form::label('diachi', 'Diachi:') }}
            {{ Form::text('diachi') }}
        </li>

        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email') }}
        </li>

        <li>
            {{ Form::label('dienthoai', 'Dienthoai:') }}
            {{ Form::text('dienthoai') }}
        </li>

        <li>
            {{ Form::label('quyen', 'Quyen:') }}
            {{ Form::input('number', 'quyen') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


