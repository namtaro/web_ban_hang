@extends('frontend.master')

@section('title', 'Trang chủ')


@section('content')
<div id="giua" class="col-xs-12 col-sm-9 col-md-10 col-lg-10 ">
    <article>
      @foreach ($linhkien as $value)
    <div class="boxgiua col-xs-12 col-sm-6 col-md-4 col-lg-3">
      <div class="ruotgiua col-xs-12">
        <form method="POST" action="{{url('/cart')}}">
        <input type="hidden" name="txtcartid" value="{{$value->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <img src="/upload/Imagegoc/{{ $value->image }}" alt="..." class="img-thumbnail">
        <h3 style="text-align: center;font-size: 15px;">{{ $value->accessories_name }}</h3>
        <h4 style="text-align: center;font-size: 15px;">Giá:{{ $value->sale_unit_price }}vnd</h4>
        <h4 style="text-align: center;font-size: 15px;">Xuất xứ:{{ $value->origin }}</h4>
        <div  style="text-align: center;">
        <a   href="{!! route('getdetaillinhkien',$value->id) !!}" class="btn chitiet chitietfr" >Chi tiết</a>
        <button type="submit"  href="#" class="btn chitietdat dathangfr" >Đặt hàng</button>
        </div>
      </form>
      </div>
    <!--   <div class="col-xs-2"></div> -->
    </div>
    @endforeach
    </div>

    <!-- phân trang -->
    <nav style="text-align: center;"  aria-label="Page navigation">
  <ul class="pagination">
    @if($linhkien->currentPage() != 1)
    <li>
      <a style="color: red" href="{!! $linhkien->url($linhkien->currentPage()-1) !!}" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    @endif
    @for($i=1;$i<=$linhkien->lastPage();$i++)
    <li class="{!! ($linhkien->currentPage() == $i) ? 'active' :'' !!}">
      <a href="{!! $linhkien->url($i) !!}">{!! $i !!}</a></li>
    @endfor
    @if($linhkien->currentPage()!=$linhkien->lastPage())
    <li>
      <a style="color: red" href="{!! $linhkien->url($linhkien->currentPage()+1) !!}" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
    @endif
  </ul>
</nav>
    <!-- end phân trang -->
  @endsection