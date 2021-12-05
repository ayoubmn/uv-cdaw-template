
@extends('templateUser')
@section('contentMediasAdmin')


<!-------------------------------------------->
<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Welcome Admin</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Admin</a></li>
						<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page-single">
    <div class="container" style="text-align:center;margin-bottom: 2rem;">
        <a href="/catalogue/public/admin/addMedias"><button  class="button" style="background-color: #4280bf;color: white;border: none;width: 40%;border-radius: 1rem;font-size: larger;">Ajouter un film <span class="ion-ios-arrow-right"></span></button></a>
	</div>
    <div class="container" style="text-align:center;margin-bottom: 2rem;">
        <a href="/catalogue/public/admin/usersManage"><button  class="button" style="background-color: #4280bf;color: white;border: none;width: 40%;border-radius: 1rem;font-size: larger;">Gerer les utilisateur<span class="ion-ios-arrow-right"></span></button></a>

	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="topbar-filter fw">
					<p>Found <span>{{$media->total()}}</span> in total</p>
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
				<div class="flex-wrap-movielist mv-grid-fw">
                @foreach($media as $mymedia)
                    <div class="movie-item-style-2 movie-item-style-1">
                        <img src="{{$mymedia->avatar}}" alt="">
                        <div class="hvr-inner" style="margin-top: 70px;margin-left: 50px;">
                            <a href="/catalogue/public/admin/deleteMedias/{{$mymedia->id}}" class="btn btn-danger " role="button" aria-pressed="true">Delete</a>
                        </div>
                        <div class="hvr-inner" style="background-color:#0097FC;margin-top: 140px;margin-left: 50px;">
                            <a href="/catalogue/public/admin/addMedias/{{$mymedia->id}}" class="btn btn-info " role="button" aria-pressed="true">Update</a>
                        </div>
                        <div class="mv-item-infor">
                            <h6><a href="#">{{$mymedia->name}}</a></h6>
                            <p class="rate"><i class="ion-android-star"></i><span>{{$mymedia->rating}}</span> /10</p>
                        </div>
                    </div>	
                @endforeach	
				</div>		
				<div class="topbar-filter">
					<div class="pagination2" style="display: contents;">
						<span>Page {{ $media->currentPage() }} of {!! $media->lastPage() !!}:</span>
						{!! $media->links() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection
