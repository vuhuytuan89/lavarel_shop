@extends('admin.newmain')

@section('title')
Chỉnh sửa chủng loại
@stop

@section('content')
<h1>Chủng Loại Sản Phẩm <small>Chỉnh sửa chủng loại</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('chungloais')}}"><i class="icon-dashboard"></i> Chủng Loại Sản Phẩm</a></li>
              <li class="active"><i class="icon-file-alt"></i>Chỉnh sửa chủng loại</li>
            </ol>
<div class='col-lg-6'>
    @if ($errors->any())
<div class='alert alert-danger'></div>
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
{{ Form::model($chung_loai, array('class'=>'well','id'=>'form-make','method' => 'PATCH', 'route' => array('chung_loais.update', $chung_loai->id))) }}
	
            <div><label>Tên chủng loại</label><input type='text' name='tenchungloai' id='tenchungloai' placeholder="Nhập tên chủng loại" value='{{$chung_loai->tenchungloai}}' class='form-control' /></div>
          
      
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('chung_loais.show', 'Cancel', $chung_loai->id, array('class' => 'btn')) }}
	
{{ Form::close() }}


<script type="text/javascript">
    $("#form-make").validate({
        rules:{
            tenchungloai:{
                required:true
               
                
            }
        },
        messages:{
          tenchungloai:{  required:"Vui lòng nhập thông tin"
           }
        }
    })
</script>
</div>
@stop
