<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>admin:@yield('title')</title>

<!-- dùng để search -->
<link rel="stylesheet" type="text/css" href="{!! asset('public/tmt_admin/template/js/datatables/datatables.min.css') !!}"/>
 

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{!! asset('public/tmt_admin/template/css/bootstrap.min.css ')!!}" >
<!-- integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" -->

<!-- Optional theme -->
<link rel="stylesheet" href="{!! asset('public/tmt_admin/template/css/bootstrap-theme.min.css') !!}" >
<!-- integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" -->
<link rel="stylesheet" href="{!! asset('public/tmt_admin/template/css/style.css') !!}" >
  </head>
  <body style="background-color: #FFFFFF;">
    <!-- menu -->

    <div class="container-fluid">
    <div class="row menuadmin">
      <a href="{!!route('getadmin')!!}">
      <div class="col-xs-3 col-sm-5 col-md-3 col-lg-2">
        <span  class="iconadmin glyphicon glyphicon-user"><h3 class="logoadminh3">Admin</h3></span>
      </div>
      </a>
      <div class="col-xs-12 col-sm-7 col-md-5 col-lg-6  ">
       <!--  <ul style="float: left;"  class="">
           <li style="width: 25%;" class=""  role="presentation"><a class="mauchu" href="#">Quản Trị</a></li>
            <li style="width: 25%;" class=" " role="presentation"><a class="mauchu" href="#">Profile</a></li>
            <li style="width: 25%;" class="" role="presentation"><a class="mauchu" href="#">Messages</a></li>
            <li role="presentation" class="dropdown">
          <a class=" mauchu dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            Dropdown <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li  role="presentation" ><a href="#">Home</a></li>
            <li role="presentation"><a href="#">Profile</a></li>
            <li role="presentation"><a href="#">Messages</a></li>
          </ul>
        </li>
        
        
      </ul> -->
        
      </div>   
      
        <div id="dangnhapdangkyadmin" class="col-xs-12 col-sm-12 col-md-4 col-lg-4" >
          <div id="nameadmin" class="col-xs-9">
          <h4 style="text-align: right;color: #FFFFFF;">Hi! {!! Auth::user()->name !!}</h4>
        </div>
        <div id="logoutadmin" class="col-xs-3"><a href="{!! url('logout') !!}"><div>
          <span class="glyphicon glyphicon glyphicon-off" aria-hidden="true"></span>
        Logout</div></a>
        </div>
        </div> 
    </div>
  </div>

  <div  class="container-fluid">
    <div class="row">
      <div style="margin-top: 20px;" >
      <div id="slidebaradmin" class=" col-xs-12  col-sm-4 col-md-2 ">
        <ul  class="nav ">
        <li><a href="{!! route('getlistloai') !!}"><span></span>Loại Linh Kiện</a></li>
        <li><a href="{!! route('getlistlinhkien') !!}" ><span></span>Linh Kiện</a></li>
        <li><a href="{!! route('getlistkhachhang') !!}" ><span></span>Khách Hàng</a></li>
        <li><a href="{!! route('getlistnhanvien') !!}"><span></span>nhân viên</a></li>
        <li><a href="{!! route('gethd') !!}" ><span></span>chi tiết đơn hàng</a></li>
         
      </ul>
      </div>
      
       @yield('content')
       @yield('chitiet')

      <div class="container-fluid">
      <div class="row">
      <div id="footeradmin">
      <p>HỖ TRỢ THÔNG TIN:admin@gmail.com</p>
      </div>
      </div>
      </div>

    <script src="{!! asset('public/tmt_admin/template/js/jquery.min.js') !!}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{!! asset('public/tmt_admin/template/js/bootstrap.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('public/tmt_admin/template/js/script.js') !!}"></script>

<script type="text/javascript" src="{!! asset('public/tmt_admin/template/js/formValidation.min.js') !!}"></script>
<!-- Dùng để search -->
<script type="text/javascript" src="{!! asset('public/tmt_admin/template/js/datatables/datatables.min.js') !!}"></script>

  </body>
</html>