@extends('admin.master')

@section('title', 'Quản lý đơn hàng')


@section('content')


<div class="col-xs-12 col-sm-8  col-md-10 label label-info" style="text-align: center;margin-bottom: 20px;">
      <h3 style="font-size: 30px;font-weight: bold;">Danh sách đơn hàng</h3>

    </div>
    <div id="tableaddcate" class="col-xs-12 col-sm-8 col-md-10">
      <div class="table-responsive">
  <table class="table table-bordered   table-hover table-striped " id="dhsearch">
    <thead>
     <tr class="success"> 
    <th class="col-xs-1">stt</th>
    <th class="col-xs-1">id</th>
    <th class="col-xs-2">Tên khách hàng</th>
    <th class="col-xs-1">Ngày đặt</th>
    <th class="col-xs-1">Email</th>
    <th class="col-xs-1">Địa chỉ</th>
    <th class="col-xs-1">Trang thái</th>
    <th class="col-xs-2">Nhân viên duyệt</th>
    <th  class="col-xs-2" style="text-align: center;">
      Chỉnh Sửa
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
    <td class="col-xs-1">{{ $value->sale_date }}</td>
    <td class="col-xs-1">{{ $value->email }}</td>
    <td class="col-xs-1">{{ $value->address }}</td>
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
    
    <td class="col-xs-2 xoasuacate">
      <div style="width: 300px;height: 50px; float: right;margin-right: -90px;">
      <a href="{!! route('getchitiethd',$value->id) !!}" style="width: 100px;height: 40px;margin-right: 10px;" type="button" class="btn btn-info" ><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Chi tiết</a>

      <a href="{!! route('getchitiethddel',$value->id) !!}" style="width: 100px;height: 40px;margin-right: 10px;"  class="btn btn-danger" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa!')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa</a>
      
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