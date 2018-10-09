<style>
	header{
		position: fixed; /* Set the navbar to fixed position */
    	top: 0; 
   		z-index: 1000;
   		background: white;
   		padding-bottom: 0.5em;
   		border-bottom: 1px solid brown;
	}
	header img{
		margin-left: 2em;
		padding-top: 1em;
		width: 70%;
	}
	*{
		width: 100%;
		margin:0 auto;
		padding: 0;
		box-sizing: border-box;
	}
	.dropbtn {
	    background-color: #3498DB;
	    color: white;
	    margin-top: 2em;
	    padding: 0.95em;
	   	border: none;
	    cursor: pointer;
	    font-weight: bold;
	}

	/* Dropdown button on hover & focus */
	.dropbtn:hover, .dropbtn:focus {
	    background-color: #2980B9;
	}

	/* The container <div> - needed to position the dropdown content */
	.dropdown {
	    position: relative;
	    display: inline-block;
	}

	/* Dropdown Content (Hidden by Default) */
	.dropdown-content {
	    display: none;
	    position: absolute;
	    min-width: 160px;
	    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	    z-index: 1;
	    background: white;
	    border: 2px solid #2980B9;
	    border-top: none;
	}

	/* Links inside the dropdown */
	.dropdown-content a {
	    color: black;
	    width: 150px;
	    padding: 12px 15px;
	    text-decoration: none;
	    display: block;
	    border-bottom: 1px solid #e7e7e7;
	}

	/* Change color of dropdown links on hover */
	.dropdown-content a:hover {
		color: #2980B9;
		width: 155px;
		font-weight: bold;
	}

	/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
	.show {display:block;}

	form.example input[type=text] {
	    padding: 10px;
	    font-size: 17px;
	    border: 1px solid #e5e5e5;
	    float: left;
	    width: 80%;
	    margin-top: 1.7em;
	}

	form.example button {
	    float: left;
	    width: 20%;
	    padding: 10px;
	    background: #2196F3;
	    color: white;
	    font-size: 17px;
	    border: 1px solid grey;
	    border-left: none;
	    cursor: pointer;	    
	    margin-top: 1.7em;
	}

	form.example button:hover {
	    background: #0b7dda;
	}

	form.example::after {
	    content: "";
	    clear: both;
	    display: table;
	}
	.btn {
		color: white;
	    padding: 0.85em 1em;
	    font-weight: bold;
	    cursor: pointer;
	    display: inline-block;
	    margin-top: 2em;
	    background: #2196F3;
	    border-radius: 0;
	}
	.info:hover {
	    background: #2980b9;
	    color: white;
	}
	.fa-search{
		padding-bottom: 0.4em;
	}
</style>
<header>
	<div class="row">
		<div class="col-md-2">
			<a href="{{route('index')}}">
				<img src="{{asset('dist/img/sophia-logo.png')}}" alt="">
			</a>
		</div>
		<div class="col-md-2">
			<div class="dropdown">
				<button onclick="myFunction()" class="dropbtn">SẢN PHẨM 
					<i class="fa fa-caret-down" style="display: inline;padding-left: 0.5em;"></i>
				</button>
				<div id="myDropdown" class="dropdown-content">
					@foreach($categories as $category)
						@if(count($category->products)>0)
							<a href="{{route('category',$category->id)}}">{{ strtoupper($category->name) }}</a>
						@endif				
				@endforeach
			  	</div>
			</div>
		</div>
		<div class="col-md-4">
			<form class="example" action="">
			  <input type="text" placeholder="Tìm sản phẩm" name="search">
			  <button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
		<div class="col-md-4">
			@if(Auth::check())
				<div class="col-md-7">
					<a href="{{route('home')}}">
						<button class="btn" style="padding: 0.3em;">
							<i class="fa fa-user fa-2x col-md-2"></i>
							<p style="padding-top: 0.5em;">{{Auth::user()->name}}</p>
						</button>
					</a>
				</div>
			@else
				<div class="col-md-7">
					<a href="{{route('login')}}">
						<button class="btn info">ĐĂNG NHẬP</button>
					</a>
				</div>
			@endif		
			<div class="col-md-5 page">
				<a href="{{route('index')}}">
						<button class="btn" style="padding: 0.3em">
							<i class="fa fa-shopping-cart fa-2x col-md-2"></i>
							<p style="padding-top: 0.5em;">Giỏ hàng</p>
						</button>
					</a>
			</div>
		</div>
	</div>
</header>
<script>
	function myFunction() {
	    document.getElementById("myDropdown").classList.toggle("show");
	}
	// Close the dropdown menu if the user clicks outside of it
	window.onclick = function(event) {
	  if (!event.target.matches('.dropbtn')) {

	    var dropdowns = document.getElementsByClassName("dropdown-content");
	    var i;
	    for (i = 0; i < dropdowns.length; i++) {
	      var openDropdown = dropdowns[i];
	      if (openDropdown.classList.contains('show')) {
	        openDropdown.classList.remove('show');
	      }
	    }
	  }
	}
</script>