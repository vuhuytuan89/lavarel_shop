@extends('layouts.scaffold')

@section('main')

<h1>Edit Nguoi_dung</h1>
{{ Form::model($nguoi_dung, array('method' => 'PATCH', 'route' => array('nguoi_dungs.update', $nguoi_dung->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('nguoi_dungs.show', 'Cancel', $nguoi_dung->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
