<style>
	.slide{
		margin-top: 5em; 
	}
	.carousel-inner{
		height: 24em;
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
	        <li data-target="#carousel-id" data-slide-to="3" class=""></li>
	    </ol>
	    <div class="carousel-inner">
	        <div class="item active">
	            <img src="{{asset('dist/img/slides/pic5.png')}}">            
	        </div>
	        <div class="item">
	            <img src="{{asset('dist/img/slides/pic1.png')}}">	           
	        </div>
	        <div class="item"> 
	            <img src="{{asset('dist/img/slides/pic6.jpg')}}">
	        </div>
	        <div class="item"> 
	            <img src="{{asset('dist/img/slides/pic7.jpg')}}">
	        </div>
	    </div>
	</div>
</div>