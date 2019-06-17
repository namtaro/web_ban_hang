@extends('frontend.master')

@section('title', 'Trang chủ')


@section('content')
<div class="col-xs-10">
  <h3 style="font-weight: bold;color: red;">Tìm Kiếm</h3>
  <p style="font-weight: bold;">Tìm thấy {{count($linhkien)}} sản phẩm.</p>
</div>
<div id="giua" class="col-xs-10 ">
    <article>
      @foreach ($linhkien as $value)
    <div class="boxgiua col-xs-12 col-sm-6 col-md-3">
      <div class="ruotgiua col-xs-12">
        <form method="POST" action="{{url('/cart')}}">
        <input type="hidden" name="txtcartid" value="{{$value->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <img src="/upload/Imagegoc/{{ $value->image }}" alt="..." class="img-thumbnail">
        <h3 style="text-align: center;font-size: 15px;">{{ $value->accessories_name }}</h3>
        <h4 style="text-align: center;font-size: 15px;">Giá:{{ $value->sale_unit_price }}vnd</h4>
        <h4 style="text-align: center;font-size: 15px;">Xuất xứ:{{ $value->origin }}</h4>
        <div  style="text-align: center;">
        <a  style="float: left;width: 100px;height: 40px;background-color: #FF0000;color: #FFFFFF;" href="{!! route('getdetaillinhkien',$value->id) !!}" class="btn chitiet" >Chi tiết</a>
        <button type="submit" style="float: left;width: 100px;height: 40px;background-color: #996600;color: #FFFFFF;margin:0px 0px !important" href="#" class="btn chitiet" >Đặt hàng</button>
        </div>
      </form>
      </div>
    <!--   <div class="col-xs-2"></div> -->
    </div>
    @endforeach
    </div>

  @endsection