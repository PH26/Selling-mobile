<style>
	*{
		width: 100%;
		margin:0 auto;
		padding: 0;
	}
	header{
		background: #00e68a;
	}
	header img{
		height: 4em;
		width: 50%;
		margin-left: 3em;
	}
	header .page{
		font-weight: bold;
		padding: 1.2em 0;
		color: white;
	}
	header a{
		text-decoration: none;
		color: white;
	}
	header a:hover{
		text-decoration: none;
		color:black;
	}
	header .input-group{
		padding-top: 0.9em;
	}
</style>
<header>
	<div class="row fixed-bottom">

		<div class="col-md-3">
			<a href="{{route('index')}}"><img src="{{asset('dist/img/sophia.png')}}"></a>
		</div>

		<div class="col-md-3">
			<div class="col-md-3 page"><a href="{{route('index')}}">HOME</a></div>
			<div class="col-md-3 page"><a href="">ABOUT</a></div>
			<div class="col-md-3 page"><a href="">CONTACT</a></div>
		</div>

		<div class="col-md-3">
			<form action="#" method="GET">
                <div id="custom-search-input">
                    <div class="input-group col-md-10">
                        <input type="text" class="form-control input-sm" placeholder="Search..." />
                        <span class="input-group-btn">
                        <button class="btn btn-default btn-sm">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                        </span>                                                                
                    </div>
                </div>
            <form> 
		</div>

		<div class="col-md-3">
			@if(Auth::check())
				<div class="col-md-1 page">
					<a href="{{route('home')}}"><span class="glyphicon glyphicon-user"></span></a>
				</div>
				<div class="col-md-7 page">
					<a href="{{route('home')}}">{{Auth::user()->name}}</a>
				</div> 
			@else
				<div class="col-md-4 page"><a href="{{route('register')}}">REGISTER</a></div>
				<div class="col-md-4 page"><a href="{{route('login')}}">LOGIN</a></div>
			@endif		
			<div class="col-md-4 page"><a href="{{route('index')}}"><span class="fa fa-shopping-cart fa-2x"></span></a></div>
		</div>

	</div>
</header>