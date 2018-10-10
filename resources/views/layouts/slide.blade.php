<style>
	.slide{
		margin-top: 7em;
		margin-bottom: 1em;
		width: 97%;
	}
	.carousel-inner{
		height: 23em;
		width: 94%;
		object-fit: cover;
	}
</style>
<div class="slide">
	<div id="carousel-id" class="carousel slide" data-ride="carousel"> <!-- Begin about-slide -->
	    <ol class="carousel-indicators">
	        <li data-target="#carousel-id" data-slide-to="0" class="active"></li>
	        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
	        <li data-target="#carousel-id" data-slide-to="2" class=""></li>
	    </ol>
	    <div class="carousel-inner">
	        <div class="item active">
	            <img src="{{asset('dist/img/slides/2.jpg')}}">            
	        </div>
	        <div class="item">
	            <img src="{{asset('dist/img/slides/3.jpg')}}">	           
	        </div>
	        <div class="item"> 
	            <img src="{{asset('dist/img/slides/1.png')}}">
	        </div>
	        </div>
	    </div>
	</div>
</div>