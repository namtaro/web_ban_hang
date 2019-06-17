<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{!! asset('public/tmt_admin/template/css/bootstrap.min.css ')!!}" >
<!-- integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" -->

<!-- Optional theme -->
<link rel="stylesheet" href="{!! asset('public/tmt_admin/template/css/bootstrap-theme.min.css') !!}" >
<!-- integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" -->
<link rel="stylesheet" href="{!! asset('public/tmt_admin/template/css/style.css') !!}" >
  </head>
  <body  >
    <!-- menu -->
    <div class="container-fluid">
    <div class="row">
        <ul id="menu" class="nav nav-pills">
           <li role="presentation"><a class="mauchu" href="{!! url('home') !!}">Trang chủ</a></li>
            <li role="presentation"><a class="mauchu" href="#">Giới thiệu</a></li>
            <li role="presentation"><a class="mauchu" href="#">Trợ giúp</a></li>
            
        
        <div id="dangnhapdangky" >
          @if(Auth::guard('CustomerModel')->check())
          <a href="" style="color: #f5ebeb;" >hi!{!! Auth::guard('CustomerModel')->user()->cus_name !!}</a>
         | <a href="{{ route('getLogout_cus') }}" style="color: #ffed00;font-size: 16px;font-weight: bold;">Đăng xuất</a>
        

         @else
          <a class="hoverdangnhap" href="{{ route('getLogin_cus') }}" style="color: #ddd;font-size: 16px;font-weight: bold;" >Đăng nhập</a>
         | <a href="{{ route('getregister') }}" style="color: #ddd;font-size: 16px;font-weight: bold;">Đăng ký</a>
          @endif
        </div>
      </ul>   

    </div>
  </div>
  <!-- end menu -->

  <div class="container-fluid">
    <div class="row">
      <div id="duoimenu">
      <!-- <img id="logo" src="image/logo.jpg"> -->
      <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
      <h3 id="logo" class="iconfr" ><span class="glyphicon glyphicon-random" style="font-size: 35px;color: #e25411 ; margin-top: -5px;"></span> LKShop</h3>
    </div>
    <div class="col-xs-12 col-sm-8 col-md-5 col-lg-5">
       <form class="navbar-form navbar-left Search" method="get" action="{{route('getsearch')}}">
        <div class="form-group col-xs-7 ">
          <input type="text" class="form-control inputsearch" name="txtsearch" placeholder="Tìm sản phẩm" >
          
        </div>
        <button type="submit" class="btn btn-default col-xs-5" style="width: 100px;margin-top: 0px;">Tìm</button>
      </form>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-5">
      <div class="col-xs-8 col-sm-6 col-md-7 col-lg-7" style="height: 54px;
  background-color: #DCDCDC;">
      <h4  class="lieheh4"><span class="glyphicon glyphicon-earphone"  ></span>Liên hệ:09661811096</h4>
      </div>
      <a href="{!! url('cartdetail') !!}">
      <div  class="col-xs-4 col-sm-6 col-md-5 col-lg-5 col form-group" style="height: 54px;
  background-color: #DCDCDC;">
        <span class="glyphicon glyphicon-shopping-cart"><span class="badge" style="color: red;">{!! Cart::content()->count(); !!}</span></span>
        <h5 style="position: absolute; top: 25px;" >Giỏ Hàng</h5>
      </div>
      </a>
      </div>
      </div>
      </div>
    </div>
