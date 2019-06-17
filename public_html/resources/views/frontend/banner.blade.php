 <!-- image -->
    <div style="padding-bottom: 50px;"  class="container">
      <div  class="row">
    <div style="height: 400px;" id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active" ></li><!-- class="active" -->
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
 
   <div style="height: 400px;" class="carousel-inner " role="listbox">

      <?php $i=0; ?>
      @foreach ($banner as $image)
         
      @if($i==0)

    <div style="padding-left: 175px;"" class="item active ">
 <div class="thumb" style="background-image: url( /upload/Imagegoc/{{$image->image}});"></div>
      <div class="carousel-caption">
      </div>
    </div>
    @else
    <div style="padding-left: 175px;" class="item  ">
<div class="thumb" style="background-image: url(  /upload/Imagegoc/{{$image->image}});"></div>
      <div class="carousel-caption">
      </div>
    </div>
    @endif
    <?php $i++;?>
    @endforeach
  </div>
  

  <!-- Controls -->
  <a style="background-color: #0000BB;" class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a style="background-color: #0000BB;" class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

</div>
    <!-- endimage -->


