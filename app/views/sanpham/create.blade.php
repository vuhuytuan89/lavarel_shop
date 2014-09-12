@extends('admin.newmain')

@section('title')
Thêm sản phẩm
@stop

@section('content')
<h1>Sản Phẩm <small>Thêm mới sản phẩm</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('sanpham/xem-sanpham')}}"><i class="icon-dashboard"></i>Sản Phẩm</a></li>
              <li class="active"><i class="icon-file-alt"></i>Thêm mới sản phẩm</li>
            </ol>
<div class='col-lg-6'>
    <form id='form-make' class='well' enctype="multipart/form-data" action="{{asset('sanpham/them-sanpham')}}" method='post'>
       @if ($errors->any())
<div class='alert alert-danger'>
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
</div>   
@endif

    @if(Session::has('errorImage'))
    <div class='alert alert-danger'>
        <ul>
            <li>{{Session::get('errorImage')}}</li>
        </ul>    
        </div>  
    {{Session::forget('errorImage')}}
    @endif
        
        
        <div>
            <label>Tên sản phẩm</label>
            <input type='text' name='tensp' id='tensp' placeholder="Nhập tên sản phẩm" class='form-control' />
        </div>
        
       <div>
            <label>Đơn vị tính</label>
            <input type='text' name='donvitinh' id='donvitinh' placeholder="Nhập đơn vị tính" class='form-control' />
        </div>
        
       <div>
            <label>Hình ảnh</label> </br>
            <input type='file' name='hinhanh' id='hinhanh' placeholder="Chọn hình ảnh"  />
        </div>
        </br>
       <div>
            <label>Chi tiết</label>
            <textarea name='chitietsp' id='chitietsp' cols="40" rows="10" class="form-control"></textarea>
        </div>
        
         <div>
            <label>Khuyến Mãi</label></br>
            Có <input type='radio' name='khuyenmai' id='khuyenmai' value="1"  />
            Không <input type='radio' name='khuyenmai' id='khuyenmai' value="0" checked="checked" />
        </div>
        
        <div>
            <label>Loại sản phẩm</label>
            <select name='id_loai' id='id_loai' class="form-control" multiple="">
               @foreach($loais as $loai)
               <option value="{{$loai->id}}">{{$loai->tenloai}}</option>
               @endforeach
            </select>
        </div>
        </br>
        <div>
            <input type='submit' class='btn btn-info' value="Submit" />
            <a href='{{asset("sanpham/xem-sanpham")}}' >Quay về</a>
        </div>
    </form>
    
</div>
@stop
