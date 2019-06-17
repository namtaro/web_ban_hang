@extends('admin.master')

@section('title', 'Trang chủ')


@section('content')
<div id="noidungadmin" class="col-xs-12 col-sm-8 col-md-10">
        <div id="bodytopadmin">
          
         <h3>Trang chủ</h3>
        
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12 bodyadmin  ">
            <!-- <img  src="{!! asset('../public/tmt_admin/template/image/linhkien.png') !!}" alt="..." class="img-circle"> -->
            <a style="text-align: center;"  href="{!! route('getdhdagiao')!!}">
            <span style="font-size: 200px;" class="glyphicon glyphicon-plane"></span>

            <br>
          <p style="text-align: center;">  Đơn hàng đã giao</p>
          </a>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 bodyadmin  ">
            <!-- <img  src="{!! asset('../public/tmt_admin/template/image/linhkien.png') !!}" alt="..." class="img-circle"> -->
            <a style="text-align: center;"  href="{!! route('getdhchuaduyet')!!}">
            <span style="font-size: 200px;" class="glyphicon glyphicon-indent-right"></span>

            <br>
          <p style="text-align: center;">  Đơn hàng chưa duyệt</p>
          </a>
        </div>
         <div class="col-md-4 col-sm-6 col-xs-12 bodyadmin  ">
            <!-- <img  src="{!! asset('../public/tmt_admin/template/image/linhkien.png') !!}" alt="..." class="img-circle"> -->
            <a style="text-align: center;"  href="{!! route('getdoanhthu')!!}">
            <span style="font-size: 200px;" class="glyphicon glyphicon-stats"></span>

            <br>
          <p style="text-align: center;">Doanh thu</p>
          </a>
        </div>
    </div>
    </div>
  </div>
  @endsection