@extends('admin.newmain')

@section('title')
    Chủng loại sản phẩm
@stop

@section('content')
<h1>Chủng Loại Sản Phẩm <small>Chi tiết chủng loại</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('chungloais')}}"><i class="icon-dashboard"></i> Chủng Loại Sản Phẩm</a></li>
              <li class="active"><i class="icon-file-alt"></i>Chi tiết chủng loại</li>
            </ol>

<p>{{ link_to_route('chung_loais.index', 'Xem tất cả ') }}</p>



<table class="table table-striped table-bordered">
	<thead>
		<tr>    <th>ID</th>
			<th>Tên chủng loại sản phẩm</th>
		</tr>
	</thead>

	<tbody>
                <tr>    <td>{{{ $chung_loai->id }}}</td>
			<td>{{{ $chung_loai->tenchungloai }}}</td>
                    <td>{{ link_to_route('chung_loais.edit', 'Edit', array($chung_loai->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('chung_loais.destroy', $chung_loai->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
