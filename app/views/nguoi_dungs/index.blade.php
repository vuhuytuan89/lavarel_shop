@extends('admin.newmain')

@section('title')
Quản lý người dùng
@stop

@section('content')
<h1>Thành Viên<small> Tất cả thành viên</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('admin')}}"><i class="icon-dashboard"></i> Trang Chủ</a></li>
              <li class="active"><i class="icon-file-alt"></i>Thành viên</li>
            </ol>



@if ($nguoi_dungs->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Tên người dùng</th>
				<th>Tên tài khoản</th>
				<th>Mật khẩu</th>
				<th>Địa chỉ</th>
				<th>Email</th>
				<th>Điện thoại</th>
				<th>Quyền</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($nguoi_dungs as $nguoi_dung)
				<tr>
					<td>{{{ $nguoi_dung->tennd }}}</td>
					<td>{{{ $nguoi_dung->taikhoan }}}</td>
					<td>{{{ $nguoi_dung->matkhau }}}</td>
					<td>{{{ $nguoi_dung->diachi }}}</td>
					<td>{{{ $nguoi_dung->email }}}</td>
					<td>{{{ $nguoi_dung->dienthoai }}}</td>
					<td>{{{ $nguoi_dung->quyen }}}</td>
                 <!--   <td>{{ link_to_route('nguoi_dungs.edit', 'Edit', array($nguoi_dung->id), array('class' => 'btn btn-info')) }}</td>-->
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('nguoi_dungs.destroy', $nguoi_dung->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>

@else
	There are no nguoi_dungs
@endif

@stop
