
@if (count($errors) > 0)
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
    <div class="alert alert-danger thongbao " >
        <ul>
            @foreach ($errors->all() as $error)
                <li><span class="glyphicon glyphicon-info-sign"></span> {{ $error }}</li>
            @endforeach
        </ul>
        </div>
        </div>
		</div>
	</div>
   
@endif
