@extends('admin.newmain')

@section('title')
Chi tiết hóa đơn nhập
@stop

@section('content')
<h1>Hóa Đơn Nhập<small> Chi tiết hóa đơn nhập</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('nhap/xem-hoadon')}}"><i class="icon-dashboard"></i> Hóa Đơn Nhập</a></li>
              <li class="active"><i class="icon-file-alt"></i> Chi tiết hóa đơn nhập</li>
            </ol>
    <p><a href="{{asset('nhap/xem-hoadon')}}" >Quay về</a></p>
    
   
    
    

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID hóa đơn nhập</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
            </tr>
            
        </thead>
        
        <tbody>
            @foreach($ctns as $ctn)
            <tr>
                <td>{{$ctn->id_phieunhap}}</td>
                <td>{{$ctn->tensp}}</td>
                <td>{{$ctn->soluong}}</td>
                <td>{{$ctn->dongia}}</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
  

@stop