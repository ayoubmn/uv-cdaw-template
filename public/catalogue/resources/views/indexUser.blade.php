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
				    <a href="/">
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
							Categorie <i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu level1">
                                @foreach($cat_name as $cat)
								<li><a href="category/{{$cat->name}}">{{$cat->name}}</a></li>
                                @endforeach
							</ul>
						</li>	
                        @auth
                        <li class="first"><a class="nav-link" href="user/favori">Favoris</a></li>
                        <li class="first"><a class="nav-link" href="user/playlist">Playlists</a></li>
						@if(auth()->user()->role==1)
						<li class="first"><a class="nav-link" href="admin/listeMedias">Dashboard</a></li>
						@endif
                        @endauth
                    </ul>
					<ul class="nav navbar-nav flex-child-menu menu-right">
                        @auth
                            <!-- Authentication -->
                        <h6 style="color:white;margin-right:0.5em;">
                            Bienvenue 
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
						            se déconnecter
                                </x-jet-dropdown-link>
                            </form>
                        </li>
                        @else
						<!--<li class=""><a href="login/" id="login">LOG In</a></li>
						<li class="btn "><a href="register/" id='register'>sign up</a></li>-->
						<li class="loginLink"><a href="#">Connexion</a></li>
						<li class="btn signupLink"><a href="#">S'inscrire</a></li>

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
							<a href="{{$Media->url}}" class="parent-btn"><i class="ion-play"></i> Regarder la bande annonce</a>
                            @auth
							<a href="user/addFavori/{{$Media->id}}" class="parent-btn"><i class="ion-heart"></i> Ajouter au Favorite</a>
                            @endauth
							<div class="hover-bnt">
								<a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>partager</a>
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
	    						<li>  La durée: {{$Media->duree}} </li>
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


<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="topbar-filter">
					<p><span>{{$Medias->total()}}</span> élements au totale</p>
				</div>
				<div class="flex-wrap-movielist ">
					@foreach($Medias as $media)
						<div class="movie-item-style-2 movie-item-style-1">
                        <div class="mv-img">
                            <img src="{{$media->avatar}}" alt="">
                        </div>
                        <div class="hvr-inner">
                            <a  href="medias/{{$media->id}}"> Voir plus <i class="ion-android-arrow-dropright"></i> </a>
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
						<h4 class="sb-title">Recherche</h4>
						<form class="form-style-1" action="#" method="GET" role="search">
						@csrf
							<div class="row">
								<div class="col-md-12 form-it">
									<label>Titre</label>
									<input type="text" name="name" placeholder="Saisir des mots-clés">
								</div>
								<div class="col-md-12 form-it">
									<label>Genres & Subgenres</label>
									<div class="group-ip">
										<select
											name="category[]" multiple="" class="ui fluid dropdown">
											@foreach($cat_name as $cat)
											<li><a href="#">{{$cat->name}}</a></li>
											<option value="{{$cat->name}}">{{$cat->name}}</option>
											@endforeach
										</select>
									</div>	
								</div>

								<div class="col-md-12 ">
									<input class="submit" type="submit" value="Recherche">
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>


<!--end of latest new v1 section-->
<!-- footer section-->
<footer class="ht-footer">
	<div class="container">
		<div class="flex-parent-ft">
			<div class="flex-child-ft item1" style="margin-left: auto;margin-right: auto;text-align: center;">
				 <a href="#"><img class="logo" src="images/netflex_logo.png" alt="" width="200" height="10"></a>
				 <p>ayoubmn<br>abdou</p>
				<h4>CDAW 2021</h4>
			</div>
		</div>
	</div>

</footer>
<!-- end of footer section-->
<!-- end of footer section-->

<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<script src="js/plugins2.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- homev307:29-->
</html>