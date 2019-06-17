@extends('admin.master')

@section('title', 'Quản lý khách hàng')


@section('content')


    <div class="col-xs-12 col-sm-8  col-md-10" style="text-align: center;margin-bottom: 20px;background-color: #c5a712;">
      <h3 style="font-weight: bold; font-size: 30px;">Quản lý khách hàng</h3>

    </div>
    <div id="tableaddcate" class="col-xs-12 col-sm-8 col-md-10">
      <div class="table-responsive">
  <table class="table table-bordered  table-hover table-striped" id="khsearch">
     <thead>
     <tr class="warning">
    <th class="col-xs-1">stt</th>
    <th class="col-xs-1">id</th>
    <th class="col-xs-2">Tên</th>
    <th class="col-xs-1">Email</th>
    <th class="col-xs-1">Địa chỉ</th>
    <th class="col-xs-1">SDT</th>
    <th  class="col-xs-2" style="">
      <button style="width: 200px;height: 40px;background-color: #FF0033  ;float: right; " type="button" class="btn " data-toggle="modal" data-target="#listadd"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới
</button></th>
    
  </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
   
   @foreach ($listcus as $value) 
   
  
   <tr>
    <td class="col-xs-1"><?php echo $i++; ?></td>
    <td class="col-xs-1">{{ $value->id }}</td>
    <td class="col-xs-2">{{ $value->cus_name }}</td>
    <td class="col-xs-1">{{ $value->email }}</td>
    <td class="col-xs-1">{{ $value->address }}</td>
    <td class="col-xs-1">{{ $value->phone }}</td>
    <td class="col-xs-2 xoasuacate">
      <div style="width: 300px;height: 50px; float: right;margin-right: -90px;">
      <button style="width: 100px;height: 40px;margin-right: 10px;" type="button" class="btn btn-primary" data-name="{{ $value->cus_name }}" data-email="{{ $value->email }}"  data-address="{{$value->address}}" data-phone="{{$value->phone}}"  data-id="{{$value->id}}" data-toggle="modal" data-target="#listedit" onclick="suakhachhang(this)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Cập nhật</button>

      <button style="width: 100px;height: 40px;margin-right: 10px;" type="button" class="btn btn-danger"  data-id="{{$value->id}}" data-toggle="modal" data-target="#listdel" onclick="xoapersonnel(this)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa</button>
      
    </div>
    </td>
    
  </tr>
  
  @endforeach
  </tbody>
  </table>
  <!-- ​<p id="demo"></p>
</div>
    </div> -->

<!-- Modal Edit -->
<div class="modal fade" id="listedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #9ACD32">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: right;font-size: 30px;width: 30px;height: 30px;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-pencil"></span> Cập nhật</h4>
      </div>
      <div class="modal-body" style="background-color: #EEEED1">
        <!-- http://mblinhkien.com/loailinkien -->
        <form action="{{ Request::root() }}/khachhang/update" method="POST" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="idedit" name="txtid" value="">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên Khách Hàng</label>
          <input type="text" class="form-control" id="nameedit"  name="txtnameedit" placeholder="Tên khách hàng" required>
        </div>
        <div class="form-group">
            <label for="email"><b>Email</b></label>
    <input type="email" class="form-control" id="emailedit" placeholder="Enter Email" name="txtemailedit" required>
        </div>
        <div class="form-group">
            <label ><b>Địa chỉ</b></label>
    <textarea class="form-control" id="addressedit" name="txtaddressedit" >

</textarea>
        </div>
        <div class="form-group">
            <label for="text"><b>Số điện thoại</b></label>
    <input type="number" class="form-control" id="phoneedit" placeholder="Số điện thoại" name="txtphoneedit" required>
        </div>
      <button type="submit" class="btn btn-success" >Sữa thông tin</button>
      </form>

      </div>
    </div>
  </div>
</div>

<!-- Modal add -->
<div class="modal fade" id="listadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #9ACD32">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: right;font-size: 30px;width: 30px;height: 30px;"><span aria-hidden="true">&times;</span></button>
        
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-plus"></span> Thêm mới</h4>
      </div>
      <div class="modal-body" style="background-color: #EEEED1">
        <!-- http://mblinhkien.com/loailinkien -->
        <form action="{{ Request::root() }}/khachhang/add" method="POST" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
          <label for="exampleInputEmail1">Tên Khách Hàng</label>
          <input type="text" class="form-control"  name="txtnameadd" placeholder="Tên khách hàng" required>
        </div>
        <div class="form-group">
            <label for="email"><b>Email</b></label>
    <input type="email" class="form-control" placeholder="Enter Email" name="txtemailadd" required>
        </div>
        <div class="form-group">
            <label ><b>Địa chỉ</b></label>
    <textarea class="form-control" name="txtaddressadd" >

</textarea>
        </div>
        <div class="form-group">
            <label for="text"><b>Số điện thoại</b></label>
    <input type="number" class="form-control" placeholder="Số điện thoại" name="txtphoneadd" required>
        </div>
        <div class="form-group">
            <label for="password"><b>Mật khẩu</b></label>
    <input type="password" class="form-control" placeholder="Mật khẩu" name="txtpasswordadd" required>
        </div>
      <button type="submit" class="btn btn-success">Thêm</button>
      </form>

      </div>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="listdel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #E8E8E8;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: right;font-size: 30px;width: 30px;height: 30px;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span style="font-size: 25px;color: red;" class="glyphicon glyphicon-warning-sign"></span>Thông báo</h4>
      </div>
      <div class="modal-body" style="height: 110px;">
        <!-- http://mblinhkien.com/loailinkien -->
        <form action="{{ Request::root() }}/khachhang/delete" method="POST" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="txtiddel" id="iddel" value="">
        <h4 style="text-align: center; color: red;"">bạn có thật sự muốn xóa ?</h4>

      
      <button  style="float: left;width: 40%;" type="submit" class="btn btn-danger">Xóa</button>
      <button style="float: right;width: 40%;"  type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
      </form>

      </div>
    </div>
  </div>
</div>

@endsection