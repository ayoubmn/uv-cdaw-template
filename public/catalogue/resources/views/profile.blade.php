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

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />



    <!-- Core theme CSS (includes Bootstrap)
    <link href="css/index.css" rel="stylesheet" />-->
	<!-- CSS files -->
	<link rel="stylesheet" href="/catalogue/public/css/plugins.css">
	<link rel="stylesheet" href="/catalogue/public/css/style.css">


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
				    <a href="/catalogue/public/">
                        <div class="row">
                        <img class="logo" src="/catalogue/public/images/netflex_logo.png" alt="" width="100" height="50">

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
								<li><a href="/catalogue/public/category/{{$cat->name}}">{{$cat->name}}</a></li>
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


<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Profile de {{Auth::user()->prenom }} {{Auth::user()->nom }}</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Accueil</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Profil</li>
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
						<form action="/catalogue/public/user/updateAvatar" enctype="multipart/form-data" class="user" method="POST">
						<form method="POST" enctype="multipart/form-data" id="laravel-ajax-file-upload" action="javascript:void(0)" >
                		@csrf
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="file" name="file" placeholder="" id="file" src="/catalogue/public/images/upload.png">
										<span class="text-danger">{{ $errors->first('file') }}</span>
									</div>
								</div>
								<div class="col-md-12">
									<button type="submit" class="redbtn">enregistrer</button>
								</div>
							</div>     
						</form>
					</div>
					<div class="user-fav">
						<p>Détails du compte</p>
						<ul>
							<li  class="active"><a href="userprofile.html">Profil</a></li>
							<li><a href="userfavoritelist.html">Films préférés</a></li>
							<li><a href="userrate.html">Historique</a></li>
						</ul>
					</div>
					<div class="user-fav">
						<p>Autres</p>
						<ul>
							<li><a href="#">Changer le mot de passe</a></li>
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
					<form action="/catalogue/public/user/update" class="user" method="POST">
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
			</div>
		</div>
	</div>
</div>

<!--end of latest new v1 section-->
<!-- footer section-->
<footer class="ht-footer">
	<div class="container">
		<div class="flex-parent-ft">
			<div class="flex-child-ft item1">
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

<script src="/catalogue/public/js/jquery.js"></script>
<script src="/catalogue/public/js/plugins.js"></script>
<script src="/catalogue/public/js/plugins2.js"></script>
<script src="/catalogue/public/js/custom.js"></script>

<!-- profile script -->
<script src="/catalogue/public/js/profile.js"></script>
</body>

<!-- homev307:29-->
</html>