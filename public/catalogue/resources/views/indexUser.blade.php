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

<!--end of preloading-->


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
				    <a href="index-2.html">
                        <div class="row">
                        <img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Netflix_2015_N_logo.svg/1200px-Netflix_2015_N_logo.svg.png" alt="" width="20" height="30">
                         <h6>NetFlex</h6>

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
                                @foreach($categories as $cat)
								<li><a href="#">{{$cat->name}}</a></li>
                                @endforeach
							</ul>
						</li>	
                        @auth
                        <li class="first"><a class="nav-link" href="#!">Favoris</a></li>
                        <li class="first"><a class="nav-link" href="#!">Playlists</a></li>
                        @endauth
                    </ul>
					<ul class="nav navbar-nav flex-child-menu menu-right">
                        @auth
                            <!-- Authentication -->
                        <h6 style="color:white;margin-right:0.5em;">
                            Welcome 
                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ Auth::user()->name }}
                            </x-jet-dropdown-link>
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
						<li class=""><a href="login/" id="login">LOG In</a></li>
						<li class="btn "><a href="register/" id='register'>sign up</a></li>

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
	    					<span class="orange"><a href="#">advanture</a></span>
	    				</div>
	    				<h1><a href="#">{{$Media->name}}<span>{{$Media->date}}</span></a></h1>
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
				 <a href="index-2.html"><img class="logo" src="images/logo1.png" alt=""></a>
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