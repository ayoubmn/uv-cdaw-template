
@extends('templateUser')
@section('contentMediaByCategory')


<!-------------------------------------------->

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
                <div class="container" id="playlistCreation">
                    <form action="/catalogue/public/user/playlist" method="post" class="form-inline" style="display: inline-block;min-width:50%;">
                    @csrf
                        <row style="">
                            <input type="text" name="title" placeholder="New playlist">
                            </br>
                            <input class="btn" type="submit" value="Create" style="  background-color: #4CAF50;border: none;color: white;padding: 16px 32px;text-decoration: none;margin: 4px 2px;cursor: pointer;">
                        </row>
                    </form>
                </div>
			</div>
		</div>
	</div>
</div>
<!-------------------------------------------->

<div class="page-single ">

	<div class="container" style="min-height:200px;">
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
</div>



@endsection
