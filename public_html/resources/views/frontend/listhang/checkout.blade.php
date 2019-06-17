@include('frontend.header')
<?php use App\AccessoriesModel; ?>
<form method="POST" action="{{ url('checkout') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @if(Auth::guard('CustomerModel')->check())
    <div class="container">
<div class="row">
  <div class="col-xs-12">
  <h2 style="text-align: center;font-size: 28px;font-weight: bold;">Thông tin khách hàng</h2>  
  <input type="hidden" name="txtgetidkh" value="{!! Auth::guard('CustomerModel')->user()->id !!}">  
<div class="col-xs-6">
  <div class="form-group">
          <label for="exampleInputEmail1">Tên khách hàng</label>
          <input type="text" class="form-control"  name="txttenkhach" id="tenkh" placeholder="Tên khách hàng" value="{!! Auth::guard('CustomerModel')->user()->cus_name !!}" disabled="disabled" required>
  </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control"  name="txtemailkh1" id="emailkh" placeholder="nguyenvana@gmail.com" value="{!! Auth::guard('CustomerModel')->user()->email !!}" disabled="disabled" required>
          <input type="hidden" name="txtemailkhget" value="{!! Auth::guard('CustomerModel')->user()->email !!}">
  </div>
 
  <p style="color: red; font-size: 14px">(*) Thông tin quý khách phải nhập đầy đủ</p>
   
</div>
<div class="col-xs-6">
  <div class="form-group">
          <label for="exampleInputEmail1">Số điện thoại</label>
          <input type="number" class="form-control"  name="txtsdtkh" id="sdtkh" placeholder="Số điện thoại" value="{!! Auth::guard('CustomerModel')->user()->phone !!}" disabled="disabled" required>
  </div>
   <div class="form-group">
            <label ><b>Địa chỉ</b></label>
    <textarea class="form-control" name="txtdiachikh" id="diachikh" disabled="disabled"  >
      {!! Auth::guard('CustomerModel')->user()->address !!}
    </textarea>
  </div>
</div>

  </div>
  <div class="col-xs-12">
  <div class="col-xs-4"></div>
  <div class="col-xs-4">
<button style="text-align: center;" type="button" class="btn btn-info" data-toggle="modal" data-target="#suathongtin">Chỉnh sửa thông tin</button>
</div>
<div class="col-xs-4"></div>
</div>
</div>
</div>
    @else
<div class="container">
<div class="row">
  <div class="col-xs-12">
  <h2 style="text-align: center;font-size: 28px;font-weight: bold;">Thông tin khách hàng</h2> 
  @include('block.error')   
<div class="col-xs-6">
  <div class="form-group">
          <label for="exampleInputEmail1">Tên khách hàng</label>
          <input type="text" class="form-control"  name="txttenkhach" id="tenkh" placeholder="Tên khách hàng" value="{{ old('txttenkhach') }}"  required>
  </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control"  name="txtemailkhget" id="emailkh" placeholder="nguyenvana@gmail.com"  value="{{ old('txtemailkhget') }}" required>
  </div>
  <div class="form-group">
            <label ><b>Địa chỉ</b></label>
    <textarea class="form-control" name="txtdiachikh" id="diachikh" value="{{ old('txtdiachikh') }}"   >
    </textarea>
  </div>
  <p style="color: red; font-size: 14px">(*) Thông tin quý khách phải nhập đầy đủ</p>
   
</div>
<div class="col-xs-6">
  <div class="form-group">
          <label for="exampleInputEmail1">Số điện thoại</label>
          <input type="number" class="form-control"  name="txtsdtkh" id="sdtkh" placeholder="Số điện thoại" value="{{ old('txtsdtkh') }}"   required>
  </div>
  <div class="form-group">
            <label ><b>Ghi chú</b></label>
    <textarea class="form-control" name="txtghichukh" id="ghichukh"  value="{{ old('txtghichukh') }}"  >
    </textarea>
  </div>
</div>
  </div>
</div>
</div>
@endif



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
    <th class="col-xs-1" style="text-align: center;">Action</th>
    <th class="col-xs-1">Tổng tiền</th>
     
  </tr>
 
  
  @foreach($cart as $item)
  <input type="hidden" name="txtid"  value="{!! $item['id']  !!}">
   <tr class="active">
    <td class="col-xs-1">1</td>
    <td class="col-xs-1">
      <div class="thumbcartdetail" style="background-image: url( /upload/Imagegoc/{!! $item['options']['image']  !!});"></div></td>
    <td class="col-xs-2">{!! $item['name']  !!}</td>
    <td class="col-xs-2">{!! $item['price']  !!}</td>
    <td class="col-xs-1">
     
       
      <input class="qty" type="number" name="txtsoluong" value="{!! $item['qty']  !!}"> </td>
    <td class="col-xs-1">
      <a href="#" class="cartupdate" id="{!! $item['rowId']  !!}"><div class="col-xs-6"><span style="font-size: 30px;" class="glyphicon glyphicon-pencil"></span></div></a>
      <a href="{!! url('xoasanpham',['id'=>$item['rowId']])  !!}"><div class="col-xs-6"><span style="font-size: 30px;" class="glyphicon glyphicon-trash"></span></div></a>
    </td>
    <td class="col-xs-1">{!! number_format($item['price']*$item['qty'],0,",",".")  !!}</td>
  </tr>
  @endforeach
  </form>
  </table>
</div>
  <div class="row" >
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
    <div class="col-xs-12 col-sm-6 col-md-4" style="float: right;"><h3>Tổng tiền:  {!! $total !!}</h3>
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="col-xs-5 col-sm-3 col-md-3 col-lg-3" style="float: left;">
      <a href="{!! url('home') !!}" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left"></span>Tiếp tục mua hàng</a>
    </div>
      <div class="col-xs-7 col-sm-9 col-md-9 col-lg-9" >
        <div class="col-xs-10 col-sm-5 col-md-4 col-lg-3" style="float: right;">
      <button type="submit" class="btn  btn-warning guidh" >Gửi đơn hàng<span class="glyphicon glyphicon-chevron-right"></span></button>
      </div>
      </div>
    </div>
    </div>
  </div>
@endif
  </div>
</div>
<div class="row">

</div>
</form>

 @if(Auth::guard('CustomerModel')->check())
<!-- Modal edit -->
<div class="modal fade" id="suathongtin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: right;font-size: 30px;width: 30px;height: 30px;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cập nhật thông tin</h4>
      </div>
      <div class="modal-body">
        <!-- http://mblinhkien.com/loailinkien -->
        <form action="{{ Request::root() }}/updatethongtin" method="POST" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="txtsuathongtin_id" id="suathongtin_id" value="{!! Auth::guard('CustomerModel')->user()->id !!}">
             <div class="form-group">
          <label for="exampleInputEmail1">Tên khách hàng</label>
          <input type="text" class="form-control"  name="txttenkhachtt" id="tenkh" placeholder="Tên khách hàng" value="{!! Auth::guard('CustomerModel')->user()->cus_name !!}"  required>
  </div>
    
  <div class="form-group">
          <label for="exampleInputEmail1">Số điện thoại</label>
          <input type="number" class="form-control"  name="txtsdtkhtt" id="sdtkh" placeholder="Số điện thoại" value="{!! Auth::guard('CustomerModel')->user()->phone !!}"  required>
  </div>
   <div class="form-group">
            <label ><b>Địa chỉ</b></label>
    <textarea class="form-control" name="txtdiachikhtt" id="diachikh"   >
      {!! Auth::guard('CustomerModel')->user()->address !!}
    </textarea>
  </div>
      <button type="submit" class="btn btn-default" >Cập nhật</button>
      </form>

      </div>
    </div>
  </div>
</div>

@endif
@include('frontend.footter')