@extends('admin.newmain')

@section('title')
Hóa đơn nhập
@stop

@section('content')
<h1>Hóa Đơn Nhập<small> Tất cả hóa đơn nhập</small></h1>
            <ol class="breadcrumb">
              <li><a href="{{asset('admin')}}"><i class="icon-dashboard"></i> Trang chủ</a></li>
              <li class="active"><i class="icon-file-alt"></i>Hóa Đơn Nhập</li>
            </ol>
    <p><a href="{{asset('nhap/them-hoadon')}}" >Thêm hóa đơn</a></p>
    
    @if(Session::has('success'))
    <div class='alert alert-success'>
        {{{Session::get('success')}}}
        {{Session::forget('success')}}
    </div>
    @endif
    
    
    @if($hoadons->count())
    <table class="table table-bordered table-hover table-striped tablesorter">
        <thead>
            <tr>
                <th>ID <i class='fa fa-sort'></i> </th>
                <th>Ngày nhập <i class='fa fa-sort'></i>  </th>
                <th>Tổng giá <i class='fa fa-sort'></i> </th>
            </tr>
            
        </thead>
        
        <tbody>
            @foreach($hoadons as $hd)
            <tr>
                <td>{{$hd->id}}</td>
                 <td><?php
                    $date=new DateTime($hd->ngaynhap);
                    echo date_format($date, 'd-m-Y');
                 ?></td>
                  <td>{{number_format($hd->tonggia)}}</td>
                  <td><a href="<?php echo asset("nhap/chitiet-hoadon/{$hd->id}") ?>" class='btn btn-info'>Detail</a></td>
                  <td><a href="<?php echo asset("nhap/xoa-hoadon/{$hd->id}") ?>" class='btn btn-danger'>Delete</a></td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
    {{$hoadons->links()}}
    
    @else
        Chưa có hóa đơn nhập nào
    @endif
   
@stop