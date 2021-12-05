
@extends('templateUser')
@section('contentMediaByCategory')


<!-------------------------------------------->

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
                <div class="container" >
                    <h1>{{$cat_name[0]->name}}</h1>
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
					<p><span>{{$Medias->total()}}</span>élements au totale</p>
				</div>
				<div class="flex-wrap-movielist ">
					@foreach($Medias as $media)
						<div class="movie-item-style-2 movie-item-style-1">
                        <div class="mv-img">
                            <img src="{{$media->avatar}}" alt="">
                        </div>
                        <div class="hvr-inner">
                            <a  href="../medias/{{$media->id}}">Voir plus <i class="ion-android-arrow-dropright"></i> </a>
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
											name="category" multiple="" class="ui fluid dropdown">
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
</div>



@endsection
