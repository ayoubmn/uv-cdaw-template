
@extends('templateUser')
@section('contentMediaPage')


<!-------------------------------------------->
<div class="hero mv-single-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- <h1> movie listing - list</h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Home</a></li>
					<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
				</ul> -->
			</div>
		</div>
	</div>
</div>
<!-------------------------------------------->
<div class="playlist-popup">
	<div class="form-popup" id="popupForm">
		<form action="/" class="form-container" method="POST" >
		@csrf
			<h6>Veuillez choisir une playlist</h6>
			</br>
			<select name="id_playlist" id="pet-select">
				@foreach($playlists as $playlist)
					test
					<option value="{{$playlist->id_playlist}}">{{$playlist->title}}</option>
				@endforeach
			</select>
			<input name="id_media" id="id_media" value="{{$Media->id}}" type="hidden">

			</br>			
			<button type="submit" formaction="/catalogue/public/user/addToPlaylist" class="btn">Ajouter</button>
		</form>
		<form action="/" class="form-container" method="GET">
		@csrf
			<button type="submit" formaction="/catalogue/public/user/playlist" class="btn">Crée une nouvelle</button>
			<button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
		</form>
	</div>
</div>

<div class="page-single movie-single movie_single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="movie-img sticky-sb">
					<img src="{{$Media->avatar}}" alt="">
					<div class="movie-btn">	
						<div class="btn-transform transform-vertical red">
							<div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Watch Trailer</a></div>
							<div><a href="{{$Media->url}}" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					<h1 class="bd-hd">{{$Media->name}} <span>{{$Media->date}}</span></h1>
					<div class="social-btn">
                        @auth
						<a href="#" class="parent-btn"><i class="ion-heart"></i> Add to Favorite</a>
						<a href="#" onclick="openForm()" class="parent-btn"><i class="ion-ios-list"></i> Add to a Playlist</a>

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
					<div class="movie-rate">
						<div class="rate">
							<i class="ion-android-star"></i>
							<p><span>{{$Media->rating}}</span> /10<br>
							</p>
						</div>
					</div>
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv">
								<li class="active"><a href="#overview">Overview</a></li>
							</ul>
						    <div class="tab-content">
						        <div id="overview" class="tab active">
						            <div class="row">
						            	<div class="col-md-8 col-sm-12 col-xs-12">
						            		<p>{{$Media->description}}</p>
											<div class="mvsingle-item ov-item">
												<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image11.jpg" ><img src="images/uploads/image1.jpg" alt=""></a>
												<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image21.jpg" ><img src="images/uploads/image2.jpg" alt=""></a>
												<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image31.jpg" ><img src="images/uploads/image3.jpg" alt=""></a>
												<div class="vd-it">
													<img class="vd-img" src="images/uploads/image4.jpg" alt="">
													<a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
												</div>
											</div>
											<div class="title-hd-sm">
												<h4>cast</h4>
												<a href="#" class="time">Full Cast & Crew  <i class="ion-ios-arrow-right"></i></a>
											</div>
											<!-- movie cast -->
											<div class="mvcast-item">	
												@foreach($actors as $actor)										
												<div class="cast-it">
													<div class="cast-left">
														<img src="images/uploads/cast1.jpg" alt="">
														<a href="#"> {{$actor->prenom}}&#32;&#32;{{$actor->nom}}</a>
													</div>
												</div>
												@endforeach

											</div>

											<!-- movie user review -->
											<div class="mv-user-review-item">
												<h3>Best Marvel movie in my opinion</h3>
												<div class="no-star">
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star last"></i>
												</div>
												<p class="time">
													17 December 2016 by <a href="#"> hawaiipierson</a>
												</p>
												<p>This is by far one of my favorite movies from the MCU. The introduction of new Characters both good and bad also makes the movie more exciting. giving the characters more of a back story can also help audiences relate more to different characters better, and it connects a bond between the audience and actors or characters. Having seen the movie three times does not bother me here as it is as thrilling and exciting every time I am watching it. In other words, the movie is by far better than previous movies (and I do love everything Marvel), the plotting is splendid (they really do out do themselves in each film, there are no problems watching it more than once.</p>
											</div>
						            	</div>
						            	<div class="col-md-4 col-xs-12 col-sm-12">
						            		<div class="sb-it">
						            			<h6>Director: </h6>
						            			<p><a href="#">{{$Media->realisateur}}</a></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Release Date:</h6>
						            			<p>{{$Media->date}}</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Run Time:</h6>
						            			<p>{{$Media->duree}}</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Categories</h6>
						            			<p class="tags">
                                                    @foreach($cat_name as $cat)
                                                        @if( $cat->id_media == $Media->id )
                                                            <span style="background-color:{{$cat->color}};"><a href="#">{{$cat->nom_cat}}</a></span>
                                                        @endif
                                                    @endforeach
						            			</p>
						            		</div>
						            		<div class="ads">
												<img src="images/uploads/ads1.png" alt="">
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
	</div>
</div>

<script>
	function openForm() {
	document.getElementById("popupForm").style.display="block";
	}
	
	function closeForm() {
	document.getElementById("popupForm").style.display="none";
	}
</script>

@endsection
