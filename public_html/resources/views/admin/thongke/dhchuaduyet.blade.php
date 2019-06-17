@extends('admin.master')

@section('title', 'Danh sách đơn hàng chưa duyệt')


@section('content')


<div class="col-xs-12 col-sm-8  col-md-10" style="text-align: center;margin-bottom: 20px;background-color: #00CD66;">
      <h3 style="font-size: 30px;font-weight: bold;">Danh sách đơn hàng chưa duyệt</h3>

    </div>
    <div id="tableaddcate" class="col-xs-12 col-sm-8 col-md-10">
      <div class="table-responsive">
  <table class="table table-bordered " id="dhsearch">
    <thead>
     <tr>
    <th class="col-xs-1">stt</th>
    <th class="col-xs-1">id</th>
    <th class="col-xs-2">Tên khách hàng</th>
    <th class="col-xs-2">Ngày đặt</th>
    <th class="col-xs-1">Email</th>
    <th class="col-xs-1">Địa chỉ</th>
    <th class="col-xs-1">Trang thái</th>
    <th class="col-xs-2">Nhân viên duyệt</th>
    <th  class="col-xs-1" style="">
      </th>
    <!-- <th style="text-align: center;">Hình ảnh</th> -->
  </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
   
   @foreach ($bill as $value) 
   
  
   <tr>
    <td class="col-xs-1"><?php echo $i++; ?></td>
    <td class="col-xs-1">{{ $value->id }}</td>
    <td class="col-xs-2">{{ $value->cus_name }}</td>
    <td class="col-xs-2">{{ $value->sale_date }}</td>
    <td class="col-xs-1">{{ $value->email }}</td>
    <td class="col-xs-2">{{ $value->address }}</td>
    <td class="col-xs-2">
      @if($value->status==0)
      chưa duyệt
      @else
      đã duyệt
      @endif
    </td>
    <td>
    @if($value->personnel_id!=NULL)
    @foreach($getnameper as $getname1)
    @if($value->personnel_id!=NULL && $value->id==$getname1->id )
    
    {{$getname1->name}}
    

    @endif
   @endforeach
   @else
   chưa duyệt
   @endif
    </td>
    
    <td class="col-xs-1 xoasuacate">
      <div style="width: 200px;height: 50px; float: right;margin-right: -90px;">
      <a href="{!! route('getchitiethd',$value->id) !!}" style="width: 100px;height: 40px;margin-right: 10px;" type="button" class="btn btn-info" ><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Chi tiết</a>      
    </div>
    </td>
   
  </tr>
  
  @endforeach
  </tbody>
  </table>
  <!-- ​<p id="demo"></p>-->
</div>
    </div> 



@endsection