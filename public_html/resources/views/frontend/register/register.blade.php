 @include('frontend.header')
<h3 style="text-align: center;color: red;margin-bottom: 50px;">ĐĂNG KÝ</h3>



@include('block.error')
<form method="POST" action="{{ Request::root() }}/register" >
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="container">
    <div class="row">
      <div class="col-xs-6">
  <div class="form-group">
    <label for="hovaten">Họ và tên</label>
    <input type="text" class="form-control" id="hovaten" name="txtname" placeholder="Họ và tên" value="{{ old('txtname') }}" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="txtEmail" placeholder="Email" value="{{ old('txtEmail') }}" >
  </div>
  <div class="form-group">
    <label for="diachi">Địa chỉ</label>
    <input type="text" class="form-control" id="diachi" name="txtdiachi" placeholder="Địa chỉ" value="{{ old('txtdiachi') }}" required>
  </div>
  </div>
  <div class="col-xs-6">
    <div class="form-group">
    <label for="sdt">Số điện thoại</label>
    <input type="text" class="form-control" id="sdt" name="txtsdt" placeholder="Số điện thoại" value="{{ old('txtsdt') }}"   required>
  </div>
  <div class="form-group">
    <label for="txtpassword">Mật khẩu</label>
    <input type="password" class="form-control" id="txtpassword" name="txtpassword" placeholder="Mật khẩu" required>
  </div>
  <div class="form-group">
    <label for="retxtpassword">Nhập lại mật khẩu</label>
    <input type="password" class="form-control" id="retxtpassword" name="retxtpassword" placeholder="Nhập lại mật khẩu" required>
  </div>
  </div>
  <button type="submit" class="btn btn-default">Đăng ký</button>
  </div>
  </div>
</form>

@include('frontend.footter')