@extends('layouts.scaffold')

@section('main')

<h1>Show Nguoi_dung</h1>

<p>{{ link_to_route('nguoi_dungs.index', 'Return to all nguoi_dungs') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Tennd</th>
				<th>Taikhoan</th>
				<th>Matkhau</th>
				<th>Diachi</th>
				<th>Email</th>
				<th>Dienthoai</th>
				<th>Quyen</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $nguoi_dung->tennd }}}</td>
					<td>{{{ $nguoi_dung->taikhoan }}}</td>
					<td>{{{ $nguoi_dung->matkhau }}}</td>
					<td>{{{ $nguoi_dung->diachi }}}</td>
					<td>{{{ $nguoi_dung->email }}}</td>
					<td>{{{ $nguoi_dung->dienthoai }}}</td>
					<td>{{{ $nguoi_dung->quyen }}}</td>
                    <td>{{ link_to_route('nguoi_dungs.edit', 'Edit', array($nguoi_dung->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('nguoi_dungs.destroy', $nguoi_dung->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
