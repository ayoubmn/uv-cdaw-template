@extends('templateUser')

<!-------------------------------------------->

<div class="hero user-hero">
	<div class="container">
                <div id="favori">
					<h1 style="color:white;text-align:center;margin-bottom:1rem;">Favorites</h1>
					
						<div class=" movie-items">
							<div class="container">
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