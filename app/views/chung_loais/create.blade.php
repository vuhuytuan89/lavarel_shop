@extends('admin.newmain')

@section('title')
Tạo mới chủng loại
@stop


@section('content')
 <h1>Chủng Loại Sản Phẩm <small>Thêm mới chủng loại</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('chungloais')}}"><i class="icon-dashboard"></i> Chủng Loại Sản Phẩm</a></li>
              <li class="active"><i class="icon-file-alt"></i>Thêm mới chủng loại</li>
            </ol>
 <div class='col-lg-6'>
<form action='{{asset("chung_loais")}}' method="POST" id="form-make" class="well">
    <div><label>Tên chủng lọai</label><input type="text" name="tenchungloai" id="tenchungloai" placeholder="Điền tên chủng loại" class="form-control" /></div>
    </br> <input type="submit" class="btn btn-lg btn-primary btn-block" value="Cập Nhật" />
</form>



@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

<script type="text/javascript">
    $("#form-make").validate({
        rules:{
            tenchungloai:{
                required:true,
                remote:{
                    url:"{{asset('check/chungloaisp')}}",
                    type:"POST"
                }
                
            }
        },
        messages:{
          tenchungloai:{  required:"Vui lòng nhập thông tin",
            remote:"Tên chủng loại này đã có"}
        }
    })
</script>
</div>
@stop


