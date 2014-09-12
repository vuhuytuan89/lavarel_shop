@extends('admin.main')

@section('title')
Sửa giá
@stop

@section('content')
<script>
$(function() {
$( "#ngay" ).datepicker();
 $("#ngay").datepicker("option","dateFormat","yy-mm-dd");
});
</script>

<div id='content2'>
    <h2>Chỉnh sửa giá sản phẩm</h2>
    <form action='{{asset("gia/sua-gia/{$gia->id}/{$gia->id_sanpham}")}}' method="post" id="form-make" class="well" >
           @if ($errors->any())
<div class='alert alert-danger'>
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
</div>   
@endif
        <div>
            <label>Ngày tạo</label>
            <input type="text" name="ngay" value="{{$gia->ngay}}" id="ngay" class="form-control" />
        </div>
        
       <div>
            <label>Chọn sản phẩm</label>
            <select name="id_sanpham" id='id_sanpham' class="form-control" multiple="">
                @foreach($sanphams as $sanpham)
                <option value="{{$sanpham->id}}" <?php if($sanpham->id==$gia->id_sanpham) echo "selected='selected'"; ?>>{{$sanpham->tensp}}</option>
                @endforeach
            </select>
        </div>
        
        <div>
            <label>Giá</label>
            <input type="text" name="gia" value="{{$gia->gia}}" id="gia" class="form-control" />
        </div></br>
        <div>
            <input type="submit" class="btn btn-info" value="Submit" />
            <a href="{{asset('gia/xem-gia')}}" >Quay về</a>
        </div>
    </form>
</div>
@stop