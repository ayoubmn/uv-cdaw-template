
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
			@if(!empty($playlists))
			<select name="id_playlist" id="pet-select">
				@foreach($playlists as $playlist)
					test
					<option value="{{$playlist->id_playlist}}">{{$playlist->title}}</option>
				@endforeach
			</select>
			@endif
			<input name="id_media" id="id_media" value="{{$Media->id}}" type="hidden">

			</br>			
			<button type="submit" formaction="../user/addToPlaylist" class="btn">Ajouter</button>
		</form>
		<form action="/" class="form-container" method="GET">
		@csrf
			<button type="submit" formaction="../user/playlist" class="btn">Crée une nouvelle</button>
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
							<div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Regarde la bande-annonce</a></div>
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
						<a href="#" class="parent-btn"><i class="ion-heart"></i> Ajouter au Favoris</a>
						<a href="#" onclick="openForm()" class="parent-btn"><i class="ion-ios-list"></i> Ajouter a une Playlist</a>

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
								<li class="active"><a href="#overview">Détails</a></li>
								<li><a href="#reviews"> Avis</a></li>

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
											@if(!empty($actors))
											<div class="title-hd-sm">
												<h4>Les acteurs</h4>
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
											@endif
											<!-- movie add comment -->
											@auth
											<div class="title-hd-sm">
												<h4>Commentaire</h4>
											</div>
											<div class="mv-user-review-item">
												<form action="../user/addComment" method="post">
												@csrf
													<input type="hidden" value="{{$Media->id}}" name="media_id">
													<textarea class="comment" name="text" style="min-height:10rem;" placeholder="Tapez votre commentaire ici ." ></textarea>
													<br>
													<input class="btn" type="submit" value="Publier" style="  background-color: #4c6baf;border: none;color: white;padding: 8px 16px;text-decoration: none;margin: 4px 2px;cursor: pointer;">

												</form>
											</div>
											@endauth
						            	</div>
						            	<div class="col-md-4 col-xs-12 col-sm-12">
						            		<div class="sb-it">
						            			<h6>Realisateur: </h6>
						            			<p><a href="#">{{$Media->realisateur}}</a></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Date de sortie:</h6>
						            			<p>{{$Media->date}}</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Durée:</h6>
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
    							<div id="reviews" class="tab review">
						           <div class="row">

						            	<div class="topbar-filter">
											<p><span>{{$comments->total()}}</span> élements au totale</p>
										</div>
										@foreach($comments as $comment)
										<div class="mv-user-review-item">
											<div class="user-infor">
												<img src="{{$comment->profile_photo_path}}" alt="">
												<div>
													<h3>{{$comment->nom}}&#32;{{$comment->prenom}}</h3>
													<p class="time">
														{{$comment->created_at}}
													</p>
												</div>
											</div>
											<p>{{$comment->text}}</p>
										</div>
										@endforeach
										<div class="topbar-filter">
											<div class="pagination2" style="display: contents;">
												<span>Page {!! $comments->currentPage() !!} of {!! $comments->lastPage() !!}:</span>
												{!! $comments->links() !!}
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
