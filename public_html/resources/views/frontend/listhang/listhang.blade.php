@include('frontend.header')

<div class="container">
	<div class="row">
		<div class=" col-md-12 col-lg-12">
			@foreach($linhkien as $value)
			<form method="POST" action="{{url('/cartdetail')}}">
        <input type="hidden" name="txtcartid" value="{{$value->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class=" col-md-9 col-lg-9">
		<div style="height: 350px;margin-top: 5px;" class="  col-md-5 col-lg-5">
		<div class="thumbdetail" style="background-image: url(  /upload/Imagegoc/{{$value->image}});"></div>
		</div>


		<div style="height: 350px;" class=" col-md-7 col-lg-7">
			<h2 style="text-align: center;font-weight: bold;" >{{$value->accessories_name}}</h2>
			<br>
			<h3>Thương hiệu:dell</h3>

			<h3 >
			Giá:<span style="font-weight: bold;">{{$value->sale_unit_price}} vnd</span>
			</h3>
			<label>Số lượng:<input style="width: 50px;" type="number" name="txtsoluong" value="1"></label>
			<br>
			<label>Made in:{{$value->origin}}</label>
			<br>
			<label>Trạng thái:
				@if($value->status==0)
				Mới
				@else
				Cũ
				@endif
			</label>
			<br>
			<button style="height: 50px;" type="submit" class="btn "><span class="glyphicon glyphicon-shopping-cart "></span>Thêm vào giỏ hàng</button>
		</div>

		<div style="" class="col-md-12 col-lg-12">
				<h3>Mô tả sản phẩm</h3>
				<p> 
					{{$value->description}}

</p>
			</div>
		</div>
	</form>
		@endforeach
		<div  style="background-color: #FFFFFF;height: 350px;" class="col-md-12 col-md-3 col-lg-3">
			<div class="col-md-12 col-lg-12">
			<h3>Tùy chọn giao hàng</h3>
			<div>giao hàng tiết kiệm 8000vnd</div>
			<div>giao hàng tiêu chuẩn 39000vnd</div>
			<div>thanh toán sau khi nhận hàng</div>
			</div>
			<div class="col-md-12 col-lg-12">
			<h3>Đổi trả và Bảo hành</h3>
			<div>14 ngày đổi trả dễ dàng</div>
			<div>Bằng Hóa đơn mua hàng 2 năm</div>
			</div>
		</div>

	</div>
			
		</div>
</div>

@include('frontend.footter')