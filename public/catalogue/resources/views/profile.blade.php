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
	<meta name="csrf-token" content="{{ csrf_token() }}">




    <!-- Core theme CSS (includes Bootstrap)
    <link href="css/index.css" rel="stylesheet" />-->
	<!-- CSS files -->
	<link rel="stylesheet" href="../css/plugins.css">
	<link rel="stylesheet" href="../css/style.css">


</head>
<body>


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
				    <a href="../">
                        <div class="row">
                        <img class="logo" src="../images/netflex_logo.png" alt="" width="100" height="50">

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
                                @foreach($categories as $cat)
								<li><a href="../category/{{$cat->name}}">{{$cat->name}}</a></li>
                                @endforeach
							</ul>
						</li>	
                        @auth
                        <li class="first"><a class="nav-link" href="../user/favori">Favoris</a></li>
                        <li class="first"><a class="nav-link" href="../user/playlist">Playlists</a></li>
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

<!--preloading-->
<div id="preloader">
    <img class="logo" src="../images/netflex_logo.png" alt="" width="100" height="50">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Profile de {{Auth::user()->prenom }} {{Auth::user()->nom }}</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Accueil</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Profile</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="user-information">
					<div class="user-img">
						<a href="#"><img src="{{Auth::user()->profile_photo_path }}" class="profile-pic"  alt=""><br></a>
						<form action="../user/updateAvatar" enctype="multipart/form-data" class="user" method="POST">
						<form method="POST" enctype="multipart/form-data" id="laravel-ajax-file-upload" action="javascript:void(0)" >
                		@csrf
							<div class="row">
								<div class="col-md-12">
									<div class="">
										<label for="file" class="custom-file-upload">
											<img src="../images/upload.png" class="profile-pic"  width="60rem" height="60rem">
										</label>
										<input type="file" name="file" style="display:none;" id="file" >
										<span class="text-danger">{{ $errors->first('file') }}</span>
									</div>
								</div>
								<div class="col-md-12">
									<button type="submit" id="avatarUpload" class="redbtn" >enregistrer</button>
								</div>
							</div>     
						</form>
					</div>
					<div class="user-fav">
						<p>Détails du compte</p>
						<ul>
							<li  class="active"><a href="userprofile.html">Profile</a></li>
							<li><a href="userfavoritelist.html">Films préférés</a></li>
							<li><a href="#history">Historique</a></li>
						</ul>
					</div>
					<div class="user-fav">
						<p>Autres</p>
						<ul>
							<li>                            
								<form method="POST" action="{{ route('logout') }}">
                                @csrf
									<x-jet-dropdown-link href="{{ route('logout') }}"
											onclick="event.preventDefault();
													this.closest('form').submit();">
										Se déconnecter
									</x-jet-dropdown-link>
                            	</form>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro" action="#">
					<form action="../user/update" class="user" method="POST">
                		@csrf
						<h4>01. Détails du profil</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Nom</label>
								<input type="text" name="nom" placeholder="{{Auth::user()->nom}} ">
							</div>
							<div class="col-md-6 form-it">
								<label>Prenom</label>
								<input type="text" name="prenom" placeholder="{{Auth::user()->prenom}}">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Email</label>
								<input type="text" name="email" placeholder="{{Auth::user()->email}}">
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<input class="submit" type="submit" value="enregistrer">
							</div>
						</div>	
					</form>
					<!--
					<form action="#" class="password">
						<h4>02. Changer le mot de passe</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>ancien mot de passe</label>
								<input type="text" placeholder="**********">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>nouveau mot de passe</label>
								<input type="text" placeholder="***************">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>confirmer le mot de passe</label>
								<input type="text" placeholder="*************** ">
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<input class="submit" type="submit" value="changer">
							</div>
						</div>	
					</form>
-->
				</div>
				<!-- History -->
				<div class="form-style-1 user-pro" action="#" id="history">
					<h4>02. Historique</h4>
					<div>
						<div class=" movie-items" style="padding: 30px 0;background-color: #0b1a2a;">
							<div class="container" style="max-width: -webkit-fill-available;">
								<div class="row">
									<div  class="slick-multiItemSlider">
										@foreach($medias as $media)
												<div class="movie-item" style="max-width:193px;">
													<div class="mv-img">
														<a href="#"><img src="{{$media->avatar}}" alt="" width="193" height="297"></a>
													</div>
													<div class="title-in">
														<h6><a href="#">{{$media->name}}</a></h6>
														<p><i class="ion-android-star"></i><span>{{$media->rating}}</span> /10</p>
													</div>
												</div>
										@endforeach
									</div>
								</div>	
							</div>
						</div>
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
				 <a href="#"><img class="logo" src="../images/netflex_logo.png" alt="" width="200" height="10"></a>
				 <p>ayoubmn<br>abdou</p>
				<h4>CDAW 2021</h4>
			</div>
		</div>
	</div>

</footer>
<!-- end of footer section-->

<script src="../js/jquery.js"></script>
<script src="../js/plugins.js"></script>
<script src="../js/plugins2.js"></script>
<script src="../js/custom.js"></script>

<!-- profile script -->
<script src="../js/profile.js"></script>
</body>

<!-- homev307:29-->
</html>