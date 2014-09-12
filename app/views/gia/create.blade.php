@extends('admin.newmain')

@section('title')
Thêm Giá
@stop

@section('content')
<h1>Danh Sách Giá <small>Thêm giá mới</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('gia/xem-gia')}}"><i class="icon-dashboard"></i> Danh Sách Giá</a></li>
              <li class="active"><i class="icon-file-alt"></i>Thêm giá mới</li>
            </ol>
<script>
$(function() {
$( "#ngay" ).datepicker();
 $("#ngay").datepicker("option","dateFormat","yy-mm-dd");
});
</script>

<div class='col-lg-6'>
  
    <form action='{{asset("gia/them-gia")}}' method="post" id="form-make" class="well" >
           @if ($errors->any())
<div class='alert alert-danger'>
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
</div>   
@endif
        <div>
            <label>Ngày tạo</label>
            <input type="text" name="ngay" id="ngay" class="form-control" />
        </div>
        
       <div>
            <label>Chọn sản phẩm</label>
            <select name="id_sanpham" id='id_sanpham' class="form-control" multiple="">
                @foreach($sanphams as $sanpham)
                <option value="{{$sanpham->id}}">{{$sanpham->tensp}}</option>
                @endforeach
            </select>
        </div>
        
        <div>
            <label>Giá</label>
            <input type="text" name="gia" id="gia" class="form-control" />
        </div></br>
        <div>
            <input type="submit" class="btn btn-info" value="Submit" />
            <a href="{{asset('gia/xem-gia')}}" >Quay về</a>
        </div>
    </form>
</div>
@stop