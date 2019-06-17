<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{!! asset('../public/tmt_admin/template/css/bootstrap.min.css ')!!}" >
<!-- integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" -->

<!-- Optional theme -->
<link rel="stylesheet" href="{!! asset('../public/tmt_admin/template/css/bootstrap-theme.min.css') !!}" >
<!-- integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" -->
<link rel="stylesheet" href="{!! asset('../public/tmt_admin/template/css/style.css') !!}" >  </head>
  <body >
    <h2 style="text-align: center;font-size: 30px;font-weight: bold;"><span></span>Nhân viên đăng nhập</h2>
<form action="" method="POST" style="border:0px;" >
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <!-- <div class="imgcontainer">
    <img  src="{!! asset('../public/tmt_admin/template/image/logologin.png') !!}" alt="Avatar" class="avatar">
  </div> -->


  <div class="container col-xs-4" style="margin:0px 450px;">
    <label for="email"><b>Email</b></label>
    <input style="" type="email" placeholder="Enter Email" name="txtemail"  value="{{ old('txtemail') }}" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="txtpw" required>
        <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    <span style="float: right;" class="psw">Forgot <a href="#">password?</a></span>
    <button type="submit">Login</button>
    
  </div>
</form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{!! asset('../public/tmt_admin/template/js/bootstrap.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('../public/tmt_admin/template/js/script.js') !!}"></script>
  </body>
</html>