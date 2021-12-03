<!DOCTYPE html>

<html lang="en" class="no-js">

<!-- homev307:29-->
<head>
	<!-- Basic need -->
	<title>NetFlex</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />



    <!-- Core theme CSS (includes Bootstrap)
    <link href="css/index.css" rel="stylesheet" />-->
	<!-- CSS files -->
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/style.css">


</head>
<body>
<!--preloading-->
<div id="preloader">
    <img class="logo" src="images/netflex_logo.png" alt="" width="100" height="50">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>
<!--login form popup-->
<div class="login-wrapper" id="login-content">
    <div class="login-content">
		@include('auth/login') 
    </div>
</div>
<!--end of login form popup-->
<!--signup form popup-->
<div class="login-wrapper"  id="signup-content">
    <div class="login-content">
		@include('auth/register') 

    </div>
</div>
<!--end of signup form popup-->

<!-- BEGIN | Header -->
<header class="ht-header">
	<div class="container">
		<nav id="mainNav" class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
				    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle navigation</span>
					    <div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
				    </div>
				    <a href="#">
                        <div class="row">
                        <img class="logo" src="images/netflex_logo.png" alt="" width="100" height="50">

                        </div>
                    </a>
			    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
							Category <i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu level1">
                                @foreach($cat_name as $cat)
								<li><a href="category/{{$cat->name}}">{{$cat->name}}</a></li>
                                @endforeach
							</ul>
						</li>	
                        @auth
                        <li class="first"><a class="nav-link" href="#!">Favoris</a></li>
                        <li class="first"><a class="nav-link" href="/catalogue/public/user/playlist">Playlists</a></li>
                        @endauth
                    </ul>
					<ul class="nav navbar-nav flex-child-menu menu-right">
                        @auth
                            <!-- Authentication -->
                        <h6 style="color:white;margin-right:0.5em;">
                            Welcome 
                            <a href="user/profile">
                                {{ Auth::user()->nom }}
							</a>
                        </h6>
                        <li class="btn ">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
						            logout
                                </x-jet-dropdown-link>
                            </form>
                        </li>
                        @else
						<!--<li class=""><a href="login/" id="login">LOG In</a></li>
						<li class="btn "><a href="register/" id='register'>sign up</a></li>-->
						<li class="loginLink"><a href="#">LOG In</a></li>
						<li class="btn signupLink"><a href="#">sign up</a></li>

                        @endauth
					</ul>
				</div>
			<!-- /.navbar-collapse -->
	    </nav>
	</div>
</header>
<!-- END | Header -->

<div class="sliderv2 movie-items slider sliderv3">
	<div class="container">
		<div class="row">
	    	<div class="slider-single-item">
                @foreach($Medias as $Media)
	    		<div class="movie-item">
	    			<div class="title-in">
	    				<div class="cate">
                		@foreach($categories as $cat)
							@if( $cat->id_media == $Media->id )
								<span style="background-color:{{$cat->color}};"><a href="#">{{$cat->nom_cat}}</a></span>
							@endif
						@endforeach
	    				</div>
	    				<h1><a href="#">{{$Media->name}}&#32;<span>{{$Media->date}}</span></a></h1>
						<div class="social-btn">
							<a href="{{$Media->url}}" class="parent-btn"><i class="ion-play"></i> Watch Trailer</a>
                            @auth
							<a href="#" class="parent-btn"><i class="ion-heart"></i> Add to Favorite</a>
                            @endauth
							<div class="hover-bnt">
								<a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>share</a>
								<div class="hvr-item">
									<a href="#" class="hvr-grow"><i class="ion-social-facebook"></i></a>
									<a href="#" class="hvr-grow"><i class="ion-social-twitter"></i></a>
									<a href="#" class="hvr-grow"><i class="ion-social-googleplus"></i></a>
									<a href="#" class="hvr-grow"><i class="ion-social-youtube"></i></a>
								</div>
							</div>		
						</div>
	    				<div class="mv-details">
	    					<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
	    					<ul class="mv-infor">
	    						<li>  Run Time: {{$Media->duree}} </li>
	    						<li>  {{$Media->realisateur}} </li>
	    					</ul>
	    				</div>
	    				
	    			</div>		
	    		</div>
                @endforeach
	    	</div>
	    </div>
	</div>
</div>

<!--
<div style="padding: 70px 0;background-color: #020d18;">
    <div class="container px-4 px-lg-5 mt-5" >
        <div  class="movie-items" style="display:flex;flex-direction: row;flex-wrap: wrap;  gap: 3rem;">
            @foreach($Medias as $Media)
            <div class="item col card card-body">
                <div class="slide-it">
                    <div class="movie-item">
                        <div class="mv-img">
                            <img src="{{$Media->avatar}}" alt="" width="285" height="384">
                        </div>
                        <div class="hvr-inner">
                            <a  href="{{$Media->url}}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                        </div>
                        <div class="title-in">
                            <h6><a href="#">{{$Media->name}}</a></h6>
                            <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
-->




<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="topbar-filter">
					<p>Found <span>{{$Medias->total()}}</span> in total</p>
					<label>Sort by:</label>
					<select>
						<option value="popularity">Popularity Descending</option>
						<option value="popularity">Popularity Ascending</option>
						<option value="rating">Rating Descending</option>
						<option value="rating">Rating Ascending</option>
						<option value="date">Release date Descending</option>
						<option value="date">Release date Ascending</option>
					</select>
				</div>
				<div class="flex-wrap-movielist ">
					@foreach($Medias as $media)
						<div class="movie-item-style-2 movie-item-style-1">
                        <div class="mv-img">
                            <img src="{{$media->avatar}}" alt="">
                        </div>
                        <div class="hvr-inner">
                            <a  href="/catalogue/public/medias/{{$media->id}}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                        </div>
							<div class="mv-item-infor">
								<h6><a href="#">{{$media->name}}</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>{{$media->rating}}</span> /10</p>
							</div>
						</div>	
					@endforeach	
				</div>			
				<div class="topbar-filter">
					<div class="pagination2" style="display: contents;">
						<span>Page {!! $Medias->currentPage() !!} of {!! $Medias->lastPage() !!}:</span>
						{!! $Medias->links() !!}
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="sidebar">
					<div class="searh-form">
						<h4 class="sb-title">Search for movie</h4>
						<form class="form-style-1" action="#" method="GET" role="search">
						@csrf
							<div class="row">
								<div class="col-md-12 form-it">
									<label>Movie name</label>
									<input type="text" name="name" placeholder="Enter keywords">
								</div>
								<div class="col-md-12 form-it">
									<label>Genres & Subgenres</label>
									<div class="group-ip">
										<select
											name="category" multiple="" class="ui fluid dropdown">
											@foreach($cat_name as $cat)
											<li><a href="#">{{$cat->name}}</a></li>
											<option value="{{$cat->name}}">{{$cat->name}}</option>
											@endforeach
										</select>
									</div>	
								</div>
								<!--
								<div class="col-md-12 form-it">
									<label>Rating Range</label>
									<select>
									  <option value="range">-- Select the rating range below --</option>
									  <option value="saab">-- Select the rating range below --</option>
									</select>
								</div>
								<div class="col-md-12 form-it">
									<label>Release Year</label>
									<div class="row">
										<div class="col-md-6">
											<select>
											  <option value="range">From</option>
											  <option value="number">10</option>
											</select>
										</div>
										<div class="col-md-6">
											<select>
											  <option value="range">To</option>
											  <option value="number">20</option>
											</select>
										</div>
									</div>
								</div>
								-->
								<div class="col-md-12 ">
									<input class="submit" type="submit" value="submit">
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!--
<div style="padding: 70px 0;background-color: #020d18;">
    <div class="container px-4 px-lg-5 mt-5" >
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($Medias as $Media)
                <div class="col card card-body">
                    <div class="slide-it">
                        <div class="movie-item">
                            <div class="mv-img">
                                <img src="images/uploads/mv-item1.jpg" alt="" width="185" height="284">
                            </div>
                            <div class="hvr-inner">
                                <a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                            </div>
                            <div class="title-in">
                                <h6><a href="#">Interstellar</a></h6>
                                <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>



<div class="movie-items">
	<div class="container">
		<div class=" ipad-width">
			<div class="col-md-8">
				<div class="title-hd">
					<h2>Watch now</h2>
					<a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
				</div>
            <div class="container-fluid">
                <div class="row row-cols-4">
                    @foreach($Medias as $Media)
                    <a style="text-decoration:none;">
                        <div class="col card card-body">
                            <div class="slide-it">
                                <div class="movie-item">
                                    <div class="mv-img">
                                        <img src="images/uploads/mv-item1.jpg" alt="" width="185" height="284">
                                    </div>
                                    <div class="hvr-inner">
                                        <a  href="moviesingle.html"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                    </div>
                                    <div class="title-in">
                                        <h6><a href="#">Interstellar</a></h6>
                                        <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>


			</div>

		</div>
	</div>
</div>

-->

<!--end of latest new v1 section-->
<!-- footer section-->
<footer class="ht-footer">
	<div class="container">
		<div class="flex-parent-ft">
			<div class="flex-child-ft item1">
				 <a href="index-2.html"><img class="logo" src="images/netflex_logo.png" alt="" width="200" height="10"></a>
				 <p>5th Avenue st, manhattan<br>
				New York, NY 10001</p>
				<p>Call us: <a href="#">(+01) 202 342 6789</a></p>
			</div>
			<div class="flex-child-ft item2">
				<h4>Resources</h4>
				<ul>
					<li><a href="#">About</a></li> 
					<li><a href="#">Blockbuster</a></li>
					<li><a href="#">Contact Us</a></li>
					<li><a href="#">Forums</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Help Center</a></li>
				</ul>
			</div>
			<div class="flex-child-ft item3">
				<h4>Legal</h4>
				<ul>
					<li><a href="#">Terms of Use</a></li> 
					<li><a href="#">Privacy Policy</a></li>	
					<li><a href="#">Security</a></li>
				</ul>
			</div>
			<div class="flex-child-ft item4">
				<h4>Account</h4>
				<ul>
					<li><a href="#">My Account</a></li> 
					<li><a href="#">Watchlist</a></li>	
					<li><a href="#">Collections</a></li>
					<li><a href="#">User Guide</a></li>
				</ul>
			</div>
			<div class="flex-child-ft item5">
				<h4>Newsletter</h4>
				<p>Subscribe to our newsletter system now <br> to get latest news from us.</p>
				<form action="#">
					<input type="text" placeholder="Enter your email...">
				</form>
				<a href="#" class="btn">Subscribe now <i class="ion-ios-arrow-forward"></i></a>
			</div>
		</div>
	</div>
	<div class="ft-copyright">
		<div class="ft-left">
			<p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
		</div>
		<div class="backtotop">
			<p><a href="#" id="back-to-top">Back to top  <i class="ion-ios-arrow-thin-up"></i></a></p>
		</div>
	</div>
</footer>
<!-- end of footer section-->

<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<script src="js/plugins2.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- homev307:29-->
</html>