@extends('admin.master')

@section('title', 'Quản lý linh kiện')


@section('content')


    <div class="col-xs-12 col-sm-8  col-md-10" style="text-align: center;margin-bottom: 20px;background-color: #00CD66;">
      <h3 style="font-weight: bold;font-size: 30px;">Quản lý linh kiện</h3>

    </div>
    <div id="tableaddcate" class="col-xs-12 col-sm-8 col-md-10">
      <div class="table-responsive">
  <table class="table table-bordered " id="lksearch">
    <thead>
        @include('block.error')
     <tr>
    <th class="col-xs-1">stt</th>
    <th class="col-xs-1">id</th>
    <th class="col-xs-2">Tên linh kiện</th>
    <th class="col-xs-1">nguồn gốc</th>
    <th class="col-xs-1">Số lượng</th>
    <th class="col-xs-1">Đơn giá nhập vào</th>
    <th class="col-xs-1">Đơn giá bán ra</th>
    <th class="col-xs-1">Mô Tả</th>
    <th class="col-xs-1">Ghi chú</th>
    <th class="col-xs-1">Loại linh kiện</th>
    <th  class="col-xs-2" style="">
      <button style="width: 200px;height: 40px;background-color: #FF0033  ;float: right; " type="button" class="btn "   data-toggle="modal" data-target="#listadd"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Thêm mới
</button></th>
    <!-- <th style="text-align: center;">Hình ảnh</th> -->
  </tr>
  </thead>
  <tbody>
  <?php $i=1;?>
   
   @foreach ($linhkien as $value) 
   
  
   <tr>
    <td class="col-xs-1"><?php echo $i++; ?></td>
    <td class="col-xs-1">{{ $value->id }}</td>
    <td class="col-xs-2">{{ $value->accessories_name }}</td>
    <td class="col-xs-1">{{ $value->origin }}</td>
    <td class="col-xs-1">{{ $value->amount }}</td>
    <td class="col-xs-1">{{ $value->input_unit_price }}</td>
    <td class="col-xs-1">{{ $value->sale_unit_price }}</td>
    <td class="col-xs-1">{{ $value->description }}</td>
    <td class="col-xs-1">
      @if($value->status==0)
      <?php echo "Mới"; ?>
      @else
      <?php echo "Cũ"; ?>
      @endif

    </td>
    <td class="col-xs-1">{{ $value->cate_accessories_id }}</td>
    <td class="col-xs-2 xoasuacate">
      <div style="width: 300px;height: 50px; float: right;margin-right: -90px;">
      <button style="width: 100px;height: 40px;margin-right: 10px;" type="button" class="btn btn-primary" data-accessories_name="{{ $value->accessories_name }}" data-origin="{{ $value->origin }}"  data-amount="{{$value->amount}}" data-input_unit_price="{{$value->input_unit_price}}"  data-sale_unit_price="{{$value->sale_unit_price}}" data-description="{{$value->description}}" data-status="{{$value->status}}" data-image="{{ $value->image }}" data-cate_accessories_id="{{$value->cate_accessories_id}}" data-id="{{$value->id}}" data-toggle="modal" data-target="#listedit" onclick="sualinhkien(this)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Cập nhật</button>

      <button style="width: 100px;height: 40px;margin-right: 10px;" type="button" class="btn btn-danger"  data-id="{{$value->id}}" data-toggle="modal" data-target="#listdel" onclick="xoalinhkien(this)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Xóa</button>
      
    </div>
    </td>
   
  </tr>
  
  @endforeach
  </tbody>
  </table>
  <!-- ​<p id="demo"></p>-->
</div>
    </div> 

    <!-- Modal add -->
<div class="modal fade" id="listadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #CD853F">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: right;font-size: 30px;width: 30px;height: 30px;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thêm mới</h4>


      </div>
      <div class="modal-body" style="background-color: #EEEED1">
        <!-- http://mblinhkien.com/loailinkien -->
        <form action="{{ Request::root() }}/linhkien/add" method="POST" id="listaddform" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">


          <div class="form-group">
        <label for="exampleInputEmail1">Loại Linh Kiện</label> 
       <select class="form-control" name="sltcateadd">
          <option value="0">--Chọn--</option>
         
         <?php
            $parent_id = $catedata->unique(function ($va)
            {
                return $va->parent_id;
            })

          ?>
            @foreach ($catedata as $value) 
            <?php $a = $parent_id->first(function ($key, $v) use ($value) {
                if($value->id == $v->parent_id)
                    return $value;
                return null;
            });
               ?>
                
                 @if(is_null($a));
                 <option value="{{$value->id}}">{{$value->cate_name}}</option>
                @endif
               
          @endforeach
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Tên Linh kiên</label>
          <input type="text" class="form-control"  name="txtaccessories_nameadd" placeholder="Tên Linh Kiện" required>
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Nguồn gốc</label>
          <input type="text" class="form-control"  name="txtoriginadd" placeholder="nguồn gốc">
        </div>

        <div class="form-group">
            <label for="text"><b>Số Lượng</b></label>
    <input type="number" class="form-control" placeholder="Số lượng" name="txtamountadd" required>
        </div>
        <div class="form-group">
            <label for="text"><b>Giá nhập vào</b></label>
    <input type="number" class="form-control" placeholder="Giá nhập vào" name="txtinput_unit_priceadd" required>
        </div>
        <div class="form-group">
            <label for="text"><b>Giá bán ra</b></label>
    <input type="number" class="form-control" placeholder="Giá bán ra" name="txtsale_unit_priceadd" required>
        </div>
        <div class="form-group">
            <label ><b>Mô tả</b></label>
    <textarea class="form-control" name="txtdescriptionadd" >

</textarea>
        </div>
       <div class="form-group">
        <label >Trạng thái</label> 
         <select class="form-control" name="txttrangthaiadd">
          <option value="0">Mới</option>
          <option value="1">Cũ</option>
        </select>
        </div>
         <div class="form-group">
        <label >Upload Image</label> 
        <input type="file" class="form-control"  name="txtfile"  >
        </div>
      <button type="submit" class="btn btn-warning">Thêm</button>
      </form>

      </div>
    </div>
  </div>
</div>

   <!-- Modal edit -->
<div class="modal fade" id="listedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #CD853F">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: right;font-size: 30px;width: 30px;height: 30px;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cập nhật</h4>
      </div>
      <div class="modal-body" style="background-color: #EEEED1">
        <!-- http://mblinhkien.com/loailinkien -->
        <form action="{{ Request::root() }}/linhkien/update" method="POST" enctype="multipart/form-data" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="txtidedit" id="idedit" value="">
        <input type="hidden" name="fimage" id="imageedit" value="">
          <div class="form-group">
        <label for="exampleInputEmail1">Loại Linh Kiện</label> 
       <select class="form-control" name="sltcateedit" id="loailkedit">
          <option value="0">--Chọn--</option>
            
         <?php
            $parent_id = $catedata->unique(function ($va)
            {
                return $va->parent_id;
            })

          ?>
            @foreach ($catedata as $value) 
            <?php $a = $parent_id->first(function ($key, $v) use ($value) {
                if($value->id == $v->parent_id)
                    return $value;
                return null;
            });
               ?>
                
                 @if(is_null($a));
                 <option value="{{$value->id}}">{{$value->cate_name}}</option>
                @endif
               
          @endforeach
        </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Tên Linh kiên</label>
          <input type="text" class="form-control"  name="txtaccessories_nameedit" id="tenlkedit" placeholder="Tên Linh Kiện" required>
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Nguồn gốc</label>
          <input type="text" class="form-control"  name="txtoriginedit" id="nglkedit" placeholder="nguồn gốc">
        </div>

        <div class="form-group">
            <label for="text"><b>Số Lượng</b></label>
    <input type="number" class="form-control" placeholder="Số lượng" name="txtamountedit" id="amountedit" required>
        </div>
        <div class="form-group">
            <label for="text"><b>Giá nhập vào</b></label>
    <input type="number" class="form-control" placeholder="Giá nhập vào" name="txtinput_unit_priceedit" id="gnvedit" required>
        </div>
        <div class="form-group">
            <label for="text"><b>Giá bán ra</b></label>
    <input type="number" class="form-control" placeholder="Giá bán ra" name="txtsale_unit_priceedit" id="gbredit" required>
        </div>
        <div class="form-group">
            <label ><b>Mô tả</b></label>
    <textarea class="form-control" name="txtdescriptionedit" id="mtedit"  >

</textarea>
        </div>
       <div class="form-group">
        <label >Trạng thái</label> 
        <select id="trangthaiedit" class="form-control" name="txttrangthaiedit">
          <option value="0">Mới</option>
          <option value="1">Cũ</option>
        </select>
        </div>
        <div class="form-group">
        <label >Upload Image</label> 
        <input type="file" class="form-control"  name="txtfileedit"  >
        </div>
      <button type="submit" class="btn btn-warning">Sửa</button>
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
        <h4 class="modal-title" id="myModalLabel"><span style="font-size: 25px;color: red;" class="glyphicon glyphicon-warning-sign"></span> Thông báo</h4>
      </div>
      <div class="modal-body" style="height: 110px;">
        <!-- http://mblinhkien.com/loailinkien -->
        <form action="{{ Request::root() }}/linhkien/delete" method="POST" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="txtiddel" id="iddel" value="">
        <h4 style="text-align: center; color: red;">bạn có thật sự muốn xóa ?</h4>

      
      <button  style="float: left;width: 40%;" type="submit" class="btn btn-danger">Xóa</button>
      <button style="float: right;width: 40%;"  type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
      </form>

      </div>
    </div>
  </div>
</div>




@endsection