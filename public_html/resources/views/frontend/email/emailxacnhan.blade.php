<h3 ><b>-------------------------------------------------------------Đơn hàng của bạn-------------------------------------------------------------</b></h3>
<style type="text/css">
	th{
		width: 50px;
	}

</style>
<table border="1" >
	<tr style="background-color: blue;">
		<th style="color: #ffffff;" width="200px" colspan="12">Tên sản phẩm</th>
		<th style="color: #ffffff;" width="200px" colspan="12">Số lượng</th>
		<th style="color: #ffffff;" width="200px" colspan="12">Giá</th>
		<th style="color: #ffffff;" width="200px" colspan="12">Tổng tiền</th>
	</tr>
	@foreach($billdetail1 as $value)
	<tr>
		<td style="text-align: center;" colspan="12" >
			{{ $value->accessories_name  }}
		</td>
		<td style="text-align: center;"  colspan="12">
			{{ $value->amount }}
		</td>
		<td style="text-align: center;" colspan="12">{{ $value->sale_unit_price }}</td>
		<td style="text-align: center;" colspan="12">{{ $value->sale_unit_price*$value->amount }}</td>
	</tr>
	@endforeach
	<tr>
		<th colspan="36">Tổng tiền</th>
		<th colspan="12">{!! $data["tongcong"] !!}</th>
	</tr>
</table>
