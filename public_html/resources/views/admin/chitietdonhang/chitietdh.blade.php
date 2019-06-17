@extends('admin.master')

@section('title', 'Thông tin đơn hàng')


@section('chitiet')
<div class="col-xs-12 col-sm-8  col-md-10 label label-primary" style="text-align: center;margin-bottom: 20px;">
      <h3 style="font-size: 30px;font-weight: bold;">Thông tin đơn hàng</h3>

    </div>
<div class="col-xs-12 col-sm-8  col-md-10">
	<div class="col-xs-12 col-sm-8 col-md-6 ">
		 <table class="table table-bordered ">
     <tr class="info">
    <th class="col-xs-6 col-sm-6 col-md-6">Thông tin khách hàng</th>
    <th class="col-xs-6 col-md-6 col-md-6"></th>
  </tr>
  @foreach( $bill as $value)
     <tr>
    <td class="col-xs-1">Tên khách hàng</td>
    <td class="col-xs-1">{{ $value->cus_name }}</td>
  </tr>
  <tr>
    <td class="col-xs-1">Ngày đặt hàng</td>
    <td class="col-xs-1">{{ $value->sale_date }}</td>
  </tr>
  <tr>
    <td class="col-xs-1">Số điện thoại</td>
    <td class="col-xs-1">{{ $value->phone }}</td>
  </tr>
  <tr>
    <td class="col-xs-1">Địa chỉ</td>
    <td class="col-xs-1">{{ $value->address }}</td>
  </tr>
  <tr>
    <td class="col-xs-1">Email</td>
    <td class="col-xs-1">{{ $value->email }}</td>
  </tr>
  <tr>
    <td class="col-xs-1">Ghi chú</td>
    <td class="col-xs-1">{{ $value->note}}</td>
  </tr>
 @endforeach
  </table>
	</div>

</div>

<div class="col-xs-10" style="float: right;">
  <div class="col-xs-12">
     <table class="table table-bordered ">
     <tr style="background-color: red;">
    <th style="text-align: center;" class="col-xs-2">STT</th>
    <th style="text-align: center;" class="col-xs-3">Ảnh</th>
    <th style="text-align: center;" class="col-xs-2">Tên Sản phẩm</th>
    <th style="text-align: center;" class="col-xs-2">Giá</th>
    <th style="text-align: center;" class="col-xs-1">Số lượng</th>
    <!-- <th style="text-align: center;" class="col-xs-1">Giá</th> -->
    <th style="text-align: center;" class="col-xs-2">Tổng tiền</th>
  </tr>
  <?php $i=1;?>
  @foreach( $billdetail as $value)
     <tr>
    <td style="text-align: center;" class="col-xs-2"><?php echo  $i++; ?></td>
    <td style="text-align: center;" class="col-xs-2">
      <div class="thumbcartdetail" style="background-image: url( /upload/Imagegoc/{{ $value->image }});"></div></td>
    </td>
    <td style="text-align: center;" class="col-xs-3">{{ $value->accessories_name }}</td>
    <td style="text-align: center;" class="col-xs-2">{{ number_format($value->sale_unit_price,0,",",".") }}</td>
    <td style="text-align: center;" class="col-xs-1">{{ $value->amount }}</td>
    <!-- <td style="text-align: center;" class="col-xs-1">{{ $value->rate }}</td> -->
    <td style="text-align: center;" class="col-xs-2">{{ number_format($value->total_money,0,",",".") }}</td>
  </tr>
 @endforeach
 <tr class="success">
    <th colspan="5" class="col-xs-10">Tổng tiền</th>
   @foreach( $bill as $value)
    <th class="col-xs-2"><h4 style="font-weight: bold; text-align: center;">{{ number_format($value->total,0,",",".") }}</h4></th>
    @endforeach
  </tr>
  </table>
  </div>

</div>
<div style="margin-bottom: 100px;" class="col-xs-10">
  <div style="float: right;" class="col-xs-4">Trạng thái giao hàng:
@foreach( $bill as $value)
  @if($value->status==0)
  
  <form method="POST" action="{{ Request::root() }}/chitietdh/xulydh" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="txtbill_sale_id" value="{{ $value->id }}">
    <input type="hidden" name="txtbill_sale_personnel_id" value="{!! Auth::user()->id !!}">
  <button type="submit" class="btn-primary">Xử lý</button>
</form>
@else
<button type="button" class="btn btn-success" disabled="disabled">Đã giao hàng</button>
@endif
@endforeach
</div>
</div>

@endsection