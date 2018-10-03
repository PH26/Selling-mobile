<style>
	header{
		border-bottom: 2px solid black;
	}
	header img{
		height: 8em;
	}
	header .cart{
		margin-top: 1em;
		margin-bottom: 1em;
		color: black;
	}
	header .seach{
		
	}
</style>
<header>
	<div class="row">
		<div class="col-md-4">
			<img src="{{asset('dist/img/logo.png')}}">
		</div>
		<div class="col-md-5">
			<img src="{{asset('dist/img/section6_banner.png')}}">
		</div>
		<div class="col-md-3">
			<div class="cart">			
            	<a href="#"><span class="fa fa-shopping-cart fa-3x"></span>Giỏ hàng của bạn</a>    
			</div>
			<div class="search">
                <form action="#" method="GET">
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            @csrf
                            <input type="text" class="form-control input-md" placeholder="Search..." />
                            <span class="input-group-btn">
                            <button class="btn btn-default btn-md" type="button">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                            </span>                                                                
                        </div>
                    </div>
                <form> 
			</div>	
		</div>
	</div>
</header>