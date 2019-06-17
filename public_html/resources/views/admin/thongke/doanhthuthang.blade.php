@extends('admin.master')

@section('title', 'Danh thu')


@section('content')


<div class="col-xs-12 col-sm-8  col-md-10" style="text-align: center;margin-bottom: 20px;background-color: #00CD66;">
  
      <h3 style="font-size: 30px;font-weight: bold;">Doanh thu tháng {{$thang}}-{{$nam}}  </h3>
  
    </div>
    <div id="tableaddcate" class="col-xs-12 col-sm-8 col-md-10">
      <div class="table-responsive">
  <table class="table table-bordered " id="dhsearch">
    <thead>
     <tr>
    <th class="col-xs-1">stt</th>
    <th class="col-xs-5">Tên linh kiện</th>
    <th class="col-xs-2">Ngày đặt</th>
    <th class="col-xs-1">Số lượng</th>
    <th class="col-xs-1">giá</th>
    <th class="col-xs-1">Tổng tiền</th>
  </tr>
  </thead>
  <tbody>
  {{$i=1}}
   
   @foreach ($doanhthuthang as $va) 
   
  
   <tr>
    <td class="col-xs-1">{{$i++}}</td>
    <td class="col-xs-5">{{$va->accessories_name}}</td>
    <td class="col-xs-2">{{$va->sale_date}}</td>
    <td class="col-xs-1">{{$va->amount}}</td>
    <td class="col-xs-1">{{number_format($va->rate,0,",",".")}}</td>
    <td class="col-xs-1">{{number_format($va->total_money,0,",",".")}}</td>
    <td class="col-xs-1 xoasuacate">
      <div style="width: 200px;height: 50px; float: right;margin-right: -90px;">
      <a href="{!! route('getchitiethd',$va->bill_sale_id) !!}" style="width: 100px;height: 40px;margin-right: 10px;" type="button" class="btn btn-info" ><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Chi tiết</a>      
    </div>
    </td>
   
  </tr>
  
  @endforeach
  </tbody>
  </table>
  <!-- ​<p id="demo"></p>-->
  <h3 style="text-align: right;font-weight: bold;">Tổng doanh thu :<span style="color: red;">{{number_format($tongdthu,0,",",".")}}</span> vnd</h3>
</div>
    </div> 



@endsection