
      @include('frontend.header')
      
      @include('frontend.banner')

       
      <!-- test -->
  <div id="phangiua" class="container-fluid">
    <div class="row">
      <div class="col-xs-12">     
  <div id="slidebar" class="col-xs-12 col-sm-3 col-md-2 ">
    <section>
      <h3>  <span  style="margin-left: -15px; font-size: 20px;margin: 5px ;" class="glyphicon glyphicon glyphicon-tasks" aria-hidden="true"></span>Danh mục</h3>
      <ul class="nav tchover">
        <li role="presentation" >
          <a  href="{!! route('gethomelinhkien') !!}">
            
            <div class="row">
              <div class="col-md-9 text-left">Trang chủ</div>
              <div class="col-md-3"><i class="glyphicon glyphicon-home"></i></div>
            </div>
          </a>
        </li>
        @foreach ($datacate as $value)

        
         <li role="presentation" class="dropdown menume">


        @if($value->parent_id==0)
          <a  href="{!! route('getmenu',$value->id) !!}" 
          @foreach($datacate as $value1)
          @if($value->id==$value1->parent_id)
          data-toggle="dropdown"
          @endif
          @endforeach
           role="button" aria-haspopup="true" aria-expanded="false">
            <input type="hidden" name="txtid" value="{{ $value->id }}">
            <div class="row">
              <div class="col-md-9 text-left"> {{ $value->cate_name }}</div>
              <div class="col-md-3"> <i class="glyphicon glyphicon-chevron-right"></i></div>
            </div>
           
               
          </a>

          @endif
            
            <ul class="dropdown-menu menucon">
              @foreach($datacate as $parent)
              @if($value->id==$parent->parent_id  &&  !$parent->parent_id==0)
            <li  role="presentation" ><a href="{!! route('getmenu',$parent->id) !!}"> {{ $parent->cate_name }}</a></li>
            @endif
            @endforeach
          </ul>  
          
        </li>
        @endforeach
      </ul>
    </section>
  </div>
  <!-- test -->     
  @yield('content')
  </div>
</div>
</div>
         
@include('frontend.footter')