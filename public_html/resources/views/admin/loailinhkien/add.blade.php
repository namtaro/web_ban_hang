@extends('admin.master')

@section('title', 'Loại linh kiện')


@section('content')



    <div class="col-xs-12 col-sm-8  col-md-10" style="text-align: center;margin-bottom: 20px;background-color: #00CC99;">
      <h3 style="font-weight: bold;font-size: 30px;">Quản lý loại linh kiện</h3>
    </div>
    <div id="tableaddcate" class="col-xs-12 col-sm-8 col-md-10">
      <div class="table-responsive">
  <table class="table table-hover table-striped " id="loaisearch">
    <thead>
     <tr class="danger">
    <th class="col-xs-2">stt</th>
    <th class="col-xs-2">id</th>
    <th class="col-xs-4">tên loại linh kiện</th>
    <th class="col-xs-2">id cha</th>
    <th  class="col-xs-1" style="">
      <button style="width: 200px;height: 40px;background-color: #FF0033  ;" type="button" class="btn " data-toggle="modal" data-target="#add"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới
</button></th>
    
  </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
   
   @foreach ($datacate as $value) 
   
  
   <tr>
    <td class="col-xs-2"><?php echo $i++; ?></td>
    <td class="col-xs-2">{{ $value->id }}</td>
    <td class="col-xs-2">{{ $value->cate_name }}</td>
    <td class="col-xs-2">{{ $value->parent_id }}</td>
    <td class="col-xs-1 xoasuacate">
      <div style="width: 220px;height: 50px;">
      <button style="width: 100px;height: 40px;margin-right: 10px;" type="button" class="btn btn-primary" data-mycate_name="{{ $value->cate_name }}" data-parent_id="{{ $value->parent_id }}" data-myid="{{$value->id}}" data-toggle="modal" data-target="#edit" onclick="capnhatcate(this)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Cập nhật</button>


      <a href="delete/{{$value->id}}" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xóa!')" class="btn btn-default" style="width: 100px;height: 40px; margin-top: 8px;color: red;"> <span class="glyphicon glyphicon glyphicon-trash" aria-hidden="true" ></span> Xóa</a>

    </td>
    
  </tr>
  
  @endforeach
  </tbody>
  </table>
  ​<!-- <p id="demo"></p>
</div>
    </div> -->




<!-- Modal add -->
<div class="modal fade " id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #ec5252">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: right;font-size: 30px;width: 30px;height: 30px;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thêm mới</h4>
      </div>
      <div class="modal-body" style="background-color: #FFFFE0">
        <!-- http://mblinhkien.com/loailinkien -->

        <form action="{{ Request::root() }}/loailinkien/add" method="POST" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
        <label for="exampleInputEmail1">Loại Linh Kiện</label> 
       <select class="form-control" name="sltcateadd">
          <option value="0">--Chọn--</option>
            @foreach ($datacate as $value) 
               @if($value->parent_id == 0)
              
               <option value="{{$value->id}}">{{$value->cate_name}}</option>
               @endif
          @endforeach
        </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tên Loại Linh Kiện</label>
          <input type="text" class="form-control"  name="txtLoaiadd" placeholder="Tên Loại Linh Kiện" required>
        </div>
      <button type="submit" class="btn btn-success" >Thêm</button>
      </form>

      </div>
    </div>
  </div>
</div>


<!-- Modal edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #ec5252">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: right;font-size: 30px;width: 30px;height: 30px;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cập nhật</h4>
      </div>
      <div class="modal-body" style="background-color: #FFFFE0">
        <!-- http://mblinhkien.com/loailinkien -->
        <form action="{{ Request::root() }}/loailinkien/update" method="POST" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="txtcateid" id="cate_id" value="">
       <!--  <input type="hidden" name="txtcatepaeantid" id="txtcatepaeantid" value=""> -->
        <div class="form-group">
        <label for="exampleInputEmail1">Loại Linh Kiện</label> 
       <select class="form-control" name="sltcateedit" id="parent_id">
          <option value="0">--Chọn--</option>
            @foreach ($datacate as $value) 
               @if($value->parent_id == 0)

              
               <option value="{{$value->id}}">{{$value->cate_name}}</option>
               @endif
          @endforeach
        </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tên Loại Linh Kiện</label>
          <input type="text" class="form-control" id="cate_name" name="txtLoaiedit" placeholder="Tên Loại Linh Kiện" required>
        </div>
      <button type="submit" class="btn btn-success">Sữa</button>
      </form>

      </div>
    </div>
  </div>
</div>

@endsection