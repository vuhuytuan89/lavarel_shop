@extends('admin.newmain')
@section('title')
Vận chuyển
@stop

@section('content')

<h1>Hình thức vận chuyển <small>Tất cả </small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('admin')}}"><i class="icon-dashboard"></i> Trang Chủ</a></li>
              <li class="active"><i class="icon-file-alt"></i>Hình thức vận chuyển</li>
            </ol>

<p>{{ link_to_route('vanchuyens.create', 'Thêm mới') }}</p>

@if ($vanchuyens->count())
	<table class="table table-striped table-bordered">
		<thead>
                    <tr>        <th>ID</th>
				<th>Hình Thức</th>
				<th>Giá</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($vanchuyens as $vanchuyen)
				<tr>    <td>{{{ $vanchuyen->id }}}</td>
					<td>{{{ $vanchuyen->hinhthuc }}}</td>
					<td>{{{ $vanchuyen->gia }}}</td>
                    <td>{{ link_to_route('vanchuyens.edit', 'Edit', array($vanchuyen->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('vanchuyens.destroy', $vanchuyen->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Chưa có thông tin
@endif

@stop
