@extends('admin.newmain')
@section('title')
Vận chuyển
@stop

@section('content')

<h1>Hình thức vận chuyển <small>Thông tin</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('vanchuyens')}}"><i class="icon-dashboard"></i> Hình thức vận chuyển</a></li>
              <li class="active"><i class="icon-file-alt"></i>Thông tin</li>
            </ol>

<p>{{ link_to_route('vanchuyens.index', 'Xem tất cả') }}</p>

<table class="table table-striped table-bordered">
	<thead>
            <tr>    <th>id</th>
			<th>Hinhthuc</th>
				<th>Gia</th>
		</tr>
	</thead>

	<tbody>
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
	</tbody>
</table>

@stop
