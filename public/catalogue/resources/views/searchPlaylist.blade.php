
@extends('templateUser')
@section('contentMediaPage')


<!-------------------------------------------->

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Search all playlists</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Accueil</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Playlists</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-------------------------------------------->

<div class="page-single ">

	<div class="container" style="min-height:200px;">
        @foreach($playlists as $playlist)
        <div id={{$playlist->title}}>
            <div class=" movie-items">
                <div class="container">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-6">
                                <h1 style="color:white;text-align:center;margin-bottom:1rem;">{{$playlist->title}}</h1>
                            </div>
                            <div class="col-md-6">
                                <form action="../user/playlistAbonn" method="post">
                                    @csrf
                                    <input class="btn" type="hidden" name="id_playlist" value="{{$playlist->id_playlist}}" >

                                    <input class="btn" type="submit" value="S'abonner" style="  background-color: #4CAF50;border: none;color: white;text-decoration: none;margin: 4px 2px;cursor: pointer;">
                                </form>
                            </div>
                        </div>
                        <div  class="slick-multiItemSlider">
                            @foreach($Media as $media)
                                @if($media->id_playlist==$playlist->id_playlist)
                                    <div class="movie-item">
                                        <div class="mv-img">
                                            <a href="#"><img src="{{$media->avatar}}" alt="" width="285" height="437"></a>
                                        </div>
                                        <div class="title-in">
                                            <div class="cate">
                                                <span class="blue"><a href="#">Sci-fi</a></span>
                                            </div>
                                            <h6><a href="#">{{$media->name}}</a></h6>
                                            <p><i class="ion-android-star"></i><span>{{$media->rating}}</span> /10</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
	</div>
</div>



@endsection
