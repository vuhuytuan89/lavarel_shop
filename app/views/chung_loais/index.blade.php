@extends('admin.newmain')

@section('title')
Chủng loại sản phẩm
@stop

@section('content')
 <h1>Chủng Loại Sản Phẩm <small>Tất cả chủng loại</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('admin')}}"><i class="icon-dashboard"></i> Trang Chủ</a></li>
              <li class="active"><i class="icon-file-alt"></i>Tất cả chủng loại</li>
            </ol>

<p>{{ link_to_route('chung_loais.create', 'Thêm mới') }}</p>

@if ($chung_loais->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>    
                                <th>ID</th>
				<th>Tên chủng loại</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($chung_loais as $chung_loai)
				<tr>     <td>{{{ $chung_loai->id }}}</td>   
					<td>{{{ $chung_loai->tenchungloai }}}</td>
                    <td>{{ link_to_route('chung_loais.edit', 'Edit', array($chung_loai->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('chung_loais.destroy', $chung_loai->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Chưa có chủng loại nào được thêm
@endif

@stop
