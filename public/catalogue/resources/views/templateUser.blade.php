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
                            <a href="../user/profile">
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


    @yield('contentMediasAdmin')
    @yield('formContentMediasAdmin')

	@yield('contentMediaPage')

	@yield('contentPlaylist')

	@yield('contentMediaByCategory')

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
</body>

<!-- homev307:29-->
</html>