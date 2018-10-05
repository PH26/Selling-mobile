<style>
	.panel{
		border:2px solid #00e68a;
	}
	.panel-heading{
		background: #00e68a;
		border-radius: 0;
		font-weight: bold;
		color: white;
	}
	.panel-body{
		background: white;
	}
	.panel-body a{		
		color: black;
	}
	.panel-body a:hover{
		color: red;
	}
</style>
<div class="col-md-2 nav">
	<div class="panel">

	  	<div class="panel-heading">CATEGORIES</div>
	  	<div class="panel-body">
			<ul class="nav nav-pills nav-stacked">
				@foreach($categories as $category)
					<li role="presentation"><a href="{{route('category',$category->id)}}">{{ $category->name }}</a></li>
				@endforeach
			</ul>
	  	</div>
	</div>
</div>
