@include('frontend.header')
<?php use App\AccessoriesModel; ?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		<h2 style="text-align: center;font-size: 28px;font-weight: bold;">Danh sách sản phẩm</h2>
		
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 table-responsive">
@if(count($cart))
 <table class="table table-condensed " style="margin-top: 50px;">
     <tr class="info">
    <th class="col-xs-1">stt</th>
    <th class="col-xs-1">Hình ảnh</th>
    <th class="col-xs-2">Tên Linh kiện</th>
    <th class="col-xs-2">Giá</th>
    <th class="col-xs-1">Sô lượng</th>
    <th class="col-xs-3 col-sm-2 col-md-1 col-lg-1" style="text-align: center;">Action</th>
    <th class="col-xs-1">Tổng tiền</th>
     
  </tr>
 
  <form method="POST" action="">
  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
  @foreach($cart as $item)
  <input type="hidden" name="txtid"  value="">
   <tr class="active">
    <td class="col-xs-1">1</td>
    <td class="col-xs-1">
    	<div class="thumbcartdetail" style="background-image: url( /upload/Imagegoc/{!! $item['options']['image']  !!});"></div></td>
    <td class="col-xs-2">{!! $item['name']  !!}</td>
    <td class="col-xs-2">{!! $item['price']  !!}</td>
    <td class="col-xs-1">
      
      <input class="qty inputqty" type="number" name="txtsoluong" value="{!! $item['qty']  !!}"> </td>
    <td class="col-xs-3 col-sm-2 col-md-1 col-lg-1">
    	<a href="#" class="cartupdate" id="{!! $item['rowId']  !!}"><div class="col-xs-6"><span style="font-size: 30px;" class="glyphicon glyphicon-pencil"></span></div></a>
    	<a href="{!! url('xoasanpham',['id'=>$item['rowId']])  !!}"><div class="col-xs-6"><span style="font-size: 30px;" class="glyphicon glyphicon-trash"></span></div></a>
    </td>
    <td class="col-xs-2">{!! number_format($item['price']*$item['qty'],0,",",".")  !!}</td>
  </tr>
  @endforeach
  </form>
  </table>
  </div>
  <div class="row" >
  	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  	<div class="col-xs-5 col-sm-3 col-md-3 col-lg-3  tth3" style="float: right;"><h3>Tổng tiền:	{!! $total !!}</h3>
  	</div>
  	</div>
  	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" style="float: right;">
  		<a href="{!! url('home') !!}" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left"></span>Tiếp tục mua hàng</a>
  		<a href="{!! url('/checkout') !!}" class="btn btn-warning">Thanh toán<span class="glyphicon glyphicon-chevron-right"></span></a>
  	</div>
  	</div>
  </div>
@endif
	</div>
</div>
<div class="row">

</div>
@include('frontend.footter')