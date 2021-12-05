
@extends('templateUser')
@section('formContentMediasAdmin')

<link rel="stylesheet" href="../css/form.css">

<!-------------------------------------------->
<div class="playlist-popup">
	<div class="form-popup" id="popupForm">
		<form action="../admin/addActor" class="form-container" method="POST" >
		@csrf
			<h6>Veuillez remplir le données</h6>
			</br>
			<input name="nom" id="nom" placeholder="nom" style="padding: 12px 20px;">
            <br/>
			<input name="prenom" id="prenom" placeholder="prenom"  style="padding: 12px 20px;">
			</br>			
			<button type="submit" formaction="../admin/addActor" class="btn">Ajouter</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>

		</form>

	</div>
</div>

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Profile de {{Auth::user()->prenom }} {{Auth::user()->nom }}</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Admin</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Ajouter</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
    @if(empty($media))
        <div class="container" style="margin-top: 1rem;margin-bottom: 1rem;width:70%;background-color:white;padding: 1rem;border-radius: 1rem;">
            <form id="addMedia" method="POST" action="../admin/addMedias">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"  placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="type">Type</label></br>
                    <label class="radio-inline"  style='margin-left:2rem;'><input type="radio" name="type" value="Film" checked>Film&#32;</label>
                    <label class="radio-inline"><input type="radio" name="type" value="Serie">Serie&#32;</label>
                    <label class="radio-inline"><input type="radio" name="type" value="Anime">Anime</label>

                </div>
                <div class="form-group">
                    <label for="url">Trailler</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Trailler">
                </div>
                <div class="form-group">
                    <label for="category">Category</label></br>
                    @foreach($categories as $cat)
                    <div class="form-check form-check-inline" style='margin-left:2rem;'>
                        <input class="form-check-input" name="category[]" type="checkbox" id={{$cat->name}} value={{$cat->name}}>
                        <label class="form-check-label" for={{$cat->name}}>{{$cat->name}}</label>
                    </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="avater">Avatar</label>
                    <input type="text" class="form-control" id="avatar" name="avatar" placeholder="Avatar">
                </div>
                <div class="form-group">
                    <label for="avater">Actors</label>
                    <div class="row item ">
                        <div class="multi-selector column">
                            <div class="select-field">
                                <!--<input type="text" name="" placeholder="Choose tasks" id="" class="input-selector">-->
                                <span class="down-arrow">&blacktriangledown; Choose actors</span>
                            </div>
                            <!---------List of checkboxes and options----------->
                            <div class="list">
                                @foreach($actors as $actor)
                                <label for="{{$actor->nom}}" class="task">
                                        <input type="checkbox" name="actor[]" id="{{$actor->nom}}" value="{{$actor->id}}">
                                        {{$actor->prenom}}&#32;&#32;{{$actor->nom}}
                                </label>
                                @endforeach
                            </div>
                            <!--<input type="button" onclick="multipleFunc()" value="Select multiple options">-->
                        </div>
                        <div class="column item">
                            <div class="" style="text-align:center;margin-bottom: 2rem;">
                               <button  type="button" onclick="openForm()" class="button" style="background-color: #4280bf;color: white;border: none;width: 40%;border-radius: 1rem;font-size: larger;">New Actor <span class="ion-ios-arrow-right"></span></button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="text" class="form-control" id="date" name="date" placeholder="Date">
                </div>
                <div class="form-group">
                    <label for="realisateur">Director</label>
                    <input type="text" class="form-control" id="realisateur" name="realisateur" placeholder="Director">
                </div>
                <div class="form-group">
                    <label for="duree">Duration</label>
                    <input type="text" class="form-control" id="duree" name="duree" placeholder="Duration">
                </div>
                <div class="form-group">
                    <label for="duree">saison number</label>
                    <input type="text" class="form-control" id="nbr_saison" name="nbr_saison" placeholder="Nombre de serie si c'est une serie">
                </div>
                <div class="form-group">
                    <label for="duree">Rating</label>
                    <input type="text" class="form-control" id="rating" name="rating" placeholder="rating">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <br/>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    @else
        <div class="container" style="margin-top: 1rem;margin-bottom: 1rem;width:70%;background-color:white;padding: 1rem;border-radius: 1rem;">
            <form id="addMedia" method="POST" action="../admin/addMedias">
                @csrf
                <div class="form-group" style="display: none;">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" id="id" name="id"  value={{$media->id}}>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"  value={{$media->name}}>
                </div>
                <div class="form-group">
                    <label for="url">Trailler</label>
                    <input type="text" class="form-control" id="url" name="url" value={{$media->url}}>
                </div>
                <div class="form-group">
                    <label for="category">Category</label></br>
                    @foreach($categories as $cat)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="category[]" type="checkbox" id={{$cat->name}} value={{$cat->name}}>
                        <label class="form-check-label" for={{$cat->name}}>{{$cat->name}}</label>
                    </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="avater">Avatar</label>
                    <input type="text" class="form-control" id="avatar" name="avatar" value={{$media->avatar}}>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="text" class="form-control" id="date" name="date" value={{$media->date}}>
                </div>
                <div class="form-group">
                    <label for="realisateur">Director</label>
                    <input type="text" class="form-control" id="realisateur" name="realisateur" value={{$media->realisateur}}>
                </div>
                <div class="form-group">
                    <label for="duree">Duration</label>
                    <input type="text" class="form-control" id="duree" name="duree" value={{$media->duree}}>
                </div>
                <div class="form-group">
                    <label for="duree">saison number</label>
                    <input type="text" class="form-control" id="nbr_saison" name="nbr_saison" value={{$media->nbr_saison}}>
                </div>
                <div class="form-group">
                    <label for="duree">Rating</label>
                    <input type="text" class="form-control" id="rating" name="rating" value={{$media->rating}}>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" >{{$media->description}}</textarea>
                </div>
                <br/>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    @endif
</div>

    <script>
     document.querySelector('.select-field').addEventListener('click',()=>{
         document.querySelector('.list').classList.toggle('show');
         document.querySelector('.down-arrow').classList.toggle('rotate180');

     });

	function openForm() {
	    document.getElementById("popupForm").style.display="block";

	}
	
	function closeForm() {
	    document.getElementById("popupForm").style.display="none";
	}
    </script>
@stop


