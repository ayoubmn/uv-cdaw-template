
@extends('templateUser')
@section('contentMediaByCategory')


<!-------------------------------------------->

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
                <div class="container" >
                    <h1>Mes favoris</h1>
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
			<div class="topbar-filter">
				<p><span>{{$medias->total()}}</span>élements au totale</p>
			</div>
			<div class="flex-wrap-movielist ">
				@foreach($medias as $media)
					<div class="movie-item-style-2 movie-item-style-1">
					<div class="mv-img">
						<img src="{{$media->avatar}}" alt="">
					</div>
					<div class="hvr-inner" style="margin-top: 70px;">
						<a  href="../user/removeFavori/{{$media->id}}">Supprimer <i class="ion-android-arrow-dropright"></i> </a>
					</div>
					<div class="hvr-inner" style="background-color:#0097FC;margin-top: 140px">
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
					<span>Page {!! $medias->currentPage() !!} of {!! $medias->lastPage() !!}:</span>
					{!! $medias->links() !!}
				</div>
			</div>

		</div>
	</div>
	</div>
</div>



@endsection
