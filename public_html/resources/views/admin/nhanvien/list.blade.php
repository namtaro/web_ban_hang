@extends('admin.master')

@section('title', 'Quản lý nhân viên')


@section('content')


    <div class="col-xs-12 col-sm-8  col-md-10 label label-danger" style="text-align: center;margin-bottom: 20px;">
      <h3 style="font-weight: bold;font-size: 30px;">Quản lý nhân viên</h3>

    </div>
    <div id="tableaddcate" class="col-xs-12 col-sm-8 col-md-10 ">
      <div class="table-responsive">
  <table class="table table-bordered   table-hover table-striped"  id="nvsearch">
    <thead>
     <tr class="danger">
    <th class="col-xs-1">stt</th>
    <th class="col-xs-1">id</th>
    <th class="col-xs-2">Tên</th>
    <th class="col-xs-1">Email</th>
    <th class="col-xs-1">Giới tính</th>
    <th class="col-xs-1">Ngày sinh</th>
    <th class="col-xs-1">Địa chỉ</th>
    <th class="col-xs-1">SDT</th>
    <th class="col-xs-1">level</th>
    <th  class="col-xs-2" style="">
      @if(Auth::user()->id==1)
      <button style="width: 200px;height: 40px;background-color: #FF0033  ;float: right; " type="button" class="btn " data-toggle="modal" data-target="#listadd"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới
      </button>
      @else
      <button style="width: 200px;height: 40px;background-color: #FF0033  ;float: right; " type="button" class="btn " data-toggle="modal" data-target="#listadd" disabled="disabled"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới
      </button>

      @endif
    </th>

    
  </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
   
   @foreach ($listuser as $value) 
   
    
   <tr>
    <td class="col-xs-1"><?php echo $i++; ?></td>
    <td class="col-xs-1">{{ $value->id }}</td>
    <td class="col-xs-2">{{ $value->name }}</td>
    <td class="col-xs-1">{{ $value->email }}</td>
    <td class="col-xs-1">
      @if($value->sex==0)
      <?php echo "Nam"; ?>
      @else
      <?php echo "Nữ"; ?>
      @endif
    </td>
    <td class="col-xs-1">{{ $value->birthday }}</td>
    <td class="col-xs-1">{{ $value->address }}</td>
    <td class="col-xs-1">{{ $value->phone }}</td>
    <td class="col-xs-1">
      @if($value->level==1)
      @if($value->id==1)
      Giám đốc
      @else
      Quản trị viên
      @endif
      @else
      Nhân Viên
      @endif
    </td>
    <td class="col-xs-2 xoasuacate">
      <div style="width: 300px;height: 50px; float: right;margin-right: -90px;">
        @if(Auth::user()->id==1)

        <button style="width: 100px;height: 40px;margin-right: 10px;" type="button" class="btn btn-primary" data-name="{{ $value->name }}" data-email="{{ $value->email }}" data-sex="{{$value->sex}}"  data-birthday="{{$value->birthday}}" data-address="{{$value->address}}" data-phone="{{$value->phone}}" data-password="{{ $value->password }}" data-level="{{$value->level}}" data-id="{{$value->id}}" data-toggle="modal" data-target="#listedit" onclick="capnhatpersonnel(this)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Cập nhật</button>
        @else
        <button style="width: 100px;height: 40px;margin-right: 10px;" type="button" class="btn btn-primary" data-name="{{ $value->name }}" data-email="{{ $value->email }}" data-sex="{{$value->sex}}"  data-birthday="{{$value->birthday}}" data-address="{{$value->address}}" data-phone="{{$value->phone}}" data-password="{{ $value->password }}" data-level="{{$value->level}}" data-id="{{$value->id}}" data-toggle="modal" data-target="#listedit" onclick="capnhatpersonnel(this)" disabled="disabled"><span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span> Cập nhật</button>
        @endif

      @if(Auth::user()->id==1)
      @if($value->id==1)
      <button style="width: 100px;height: 40px;margin-right: 10px;" type="button" class="btn btn-danger"  data-id="{{$value->id}}" data-toggle="modal" data-target="#listdel" onclick="xoapersonnel(this)" disabled="disabled"><span class="glyphicon glyphicon-trash" aria-hidden="true" ></span> Xóa</button>
      @else
      <button style="width: 100px;height: 40px;margin-right: 10px;" type="button" class="btn btn-danger"  data-id="{{$value->id}}" data-toggle="modal" data-target="#listdel" onclick="xoapersonnel(this)" ><span class="glyphicon glyphicon-trash" aria-hidden="true" ></span> Xóa</button>
      @endif
      @else
      <button style="width: 100px;height: 40px;margin-right: 10px;" type="button" class="btn btn-danger"  data-id="{{$value->id}}" data-toggle="modal" data-target="#listdel" onclick="xoapersonnel(this)" disabled="disabled" ><span class="glyphicon glyphicon-trash" aria-hidden="true" ></span> Xóa</button>
      @endif
      
    </div>
    </td>
    
  </tr>
  
  @endforeach
  </tbody>
  </table>
  <!-- ​<p id="demo"></p>
</div>
    </div> -->


<!-- Modal add -->
<div class="modal fade" id="listadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#228B22">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: right;font-size: 30px;width: 30px;height: 30px;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-plus"></span> Thêm mới</h4>
      </div>
      <div class="modal-body" style="background-color: #F8F8FF">
        <!-- http://mblinhkien.com/loailinkien -->
        <form action="{{ Request::root() }}/nhanvien/add" method="POST" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
          <label for="exampleInputEmail1">Tên nhân viên</label>
          <input type="text" class="form-control"  name="txtnameadd" placeholder="Tên nhân viên" required>
        </div>
        <div class="form-group">
            <label for="email"><b>Email</b></label>
    <input type="email" class="form-control" placeholder="Enter Email" name="txtemailadd" required>
        </div>
         <div class="form-group">
        <label >Giới Tính</label> 
       <select class="form-control" name="sltsexadd">
          <option value="0">Nam</option>
          <option value="1">Nữ</option>
        </select>
        </div>
        <div class="form-group">
            <label for="date"><b>Ngày sinh</b></label>
    <input type="date" class="form-control"  name="txtbirthdayadd" required>
        </div>
        <div class="form-group">
            <label ><b>Địa chỉ</b></label>
    <textarea class="form-control" name="txtaddressadd" >

</textarea>
        </div>
        <div class="form-group">
            <label for="text"><b>Số điện thoại</b></label>
    <input type="text" class="form-control" placeholder="Số điện thoại" name="txtphoneadd" required>
        </div>
        <div class="form-group">
            <label for="password"><b>Mật khẩu</b></label>
    <input type="password" class="form-control" placeholder="Mật khẩu" name="txtpasswordadd" required>
        </div>
         <div class="form-group">
        <label >Cấp</label> 
       <select class="form-control" name="sltleveladd">
          <option value="1">Quản trị viên</option>
          <option value="2">nhân viên</option>
        </select>
        </div>
      <button type="submit" class="btn btn-danger">Thêm</button>
      </form>

      </div>
    </div>
  </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="listedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#228B22">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: right;font-size: 30px;width: 30px;height: 30px;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-pencil"></span> Cập nhật</h4>
      </div>
      <div class="modal-body" style="background-color: #F8F8FF">
        <!-- http://mblinhkien.com/loailinkien -->
        <form action="{{ Request::root() }}/nhanvien/update" method="POST" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="txtidedit" id="idedit" value="">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên nhân viên</label>
          <input type="text" class="form-control" id="tennvedit"  name="txtnameedit" placeholder="Tên nhân viên" required>
        </div>
        <div class="form-group">
            <label for="email"><b>Email</b></label>
    <input type="email" class="form-control" id="emailnvedit" placeholder="Enter Email" name="txtemailedit" required>
        </div>
         <div class="form-group">
        <label >Giới Tính</label> 
       <select class="form-control" name="sltsexedit" id="gtnvedit">
          <option value="0">Nam</option>
          <option value="1">Nữ</option>
        </select>
        </div>
        <div class="form-group">
            <label for="date"><b>Ngày sinh</b></label>
    <input type="date" class="form-control" id="nsnvedit"  name="txtbirthdayedit" required>
        </div>
        <div class="form-group">
            <label ><b>Địa chỉ</b></label>
    <textarea class="form-control" id="dcnvedit" name="txtaddressedit" >

</textarea>
        </div>
        <div class="form-group">
            <label for="text"><b>Số điện thoại</b></label>
    <input type="text" class="form-control" id="phonenvedit" placeholder="Số điện thoại" name="txtphoneedit" required>
        </div>
        <!-- <div class="form-group">
            <label for="password"><b>Mật khẩu</b></label>
    <input type="password" class="form-control" id="mknvedit" placeholder="Mật khẩu" name="txtpasswordedit" required>
        </div>
        
 -->         <div class="form-group">
        <label >Cấp</label> 
       <select class="form-control" name="sltleveledit" id="capnvedit">
          <option value="1">Quản trị viên</option>
          <option value="2">nhân viên</option>
        </select>
        </div>
      <button type="submit" class="btn btn-danger">Cập nhật</button>
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
        <form action="{{ Request::root() }}/nhanvien/delete" method="POST" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="txtiddel" id="iddel" value="">
        <h4 style="text-align: center;color: red;">bạn có thật sự muốn xóa ?</h4>

      
      <button  style="float: left;width: 40%;" type="submit" class="btn btn-danger">Xóa</button>
      <button style="float: right;width: 40%;"  type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
      </form>

      </div>
    </div>
  </div>
</div>



@endsection