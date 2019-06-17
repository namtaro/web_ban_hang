@extends('admin.master')

@section('title', 'Doanh thu')


@section('content')
<div class="col-xs-12 col-sm-8  col-md-10" style="text-align: center;margin-bottom: 20px;background-color: #00CD66;">
      <h3 style="font-size: 30px;font-weight: bold;">Doanh thu</h3>

    </div>
<form action="{{ Request::root() }}/thongke/doanhthu" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group col-lg-3">
  <div class="col-lg-11" style="background-color: #DCDCDC;margin-bottom: 2px;">
    <h3 style="text-align: center;">Doanh thu theo tháng</h3>
  </div>
  <div class="form-group col-lg-11">
    <div class="col-xs-4"> 
    <label for="hovaten">Tháng:</label>
  </div>
  <div class="col-xs-8"> 
    <select name="txtslthang">
      @for($i=1;$i<13;$i++)
        <option value="{{$i}}">{{$i}}</option>
        @endfor
      </select>
    </div>
</div>
<div class="form-group col-lg-11">
    <div class="col-xs-4"> 
    <label for="hovaten">Năm:</label>
    </div>
    <div class="col-xs-8">
    <select name="txtslnam" >
      @foreach($nam as $va)
        <option value="{{$va->stayear}}">{{$va->stayear}}</option>
      @endforeach
      </select>
</div>
  </div>
<div class="form-group col-lg-11">
    <button type="submit" class="btn btn-default" style="color: red;" >Xem doanh thu</button>
  </div>

  </div>
</form>
  
 <div id="tableaddcate" class="col-xs-12 col-sm-8 col-md-10 col-lg-7">
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
    <th class="col-xs-1">Thời gian</th>
    
    <!-- <th style="text-align: center;">Hình ảnh</th> -->
  </tr>
  </thead>
  <tbody>
  
   
   
   
  {{$i=1}}
  @foreach($doanhthu as $va)
   <tr>
    <td class="col-xs-1">{{$i++}}</td>
    <td class="col-xs-5">{{$va->accessories_name}}</td>
    <td class="col-xs-2">{{$va->sale_date}}</td>
    <td class="col-xs-1">{{$va->amount}}</td>
    <td class="col-xs-1">{{number_format($va->rate,0,",",".")}}</td>
    <td class="col-xs-1">{{number_format($va->total_money,0,",",".")}}</td>
    <td class="col-xs-1" style="font-weight: bold;">{{$va->stamonth}}-{{$va->stayear}}</td>
    
   
  </tr>
  @endforeach
  
  </tbody>
  </table>
  <!-- ​<p id="demo"></p>-->
  <h3 style="text-align: right;font-weight: bold;">Doanh thu đạt được:<span style="color: red">{{number_format($tongdoanhthu,0,",",".")}}</span> vnd</h3>
</div>
    </div> 





@endsection