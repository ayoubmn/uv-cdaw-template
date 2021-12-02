
@extends('templateUser')
@section('contentMediaPage')


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
        @foreach($playlists as $playlist)
        <div id={{$playlist->title}}>
            <div class=" movie-items">
                <div class="container">
                    <div class="row">
                        <h1 style="color:white;text-align:center;margin-bottom:1rem;">{{$playlist->title}}</h1>

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
