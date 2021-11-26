
    @extends('templateadmin')
    @section('contentadmin')

    @if(empty($media))
        <div class="container" style="margin-top: 1rem;margin-bottom: 1rem;width:70%;">
            <form id="addMedia" method="POST" action="/catalogue/public/admin/addMedias">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"  placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="type">Type</label></br>
                    <label class="radio-inline"><input type="radio" name="type" value="Film" checked>Film&#32;</label>
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
                    <div class="form-check form-check-inline">
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
        <div class="container" style="margin-top: 1rem;margin-bottom: 1rem">
            <form id="addMedia" method="POST" action="/catalogue/public/admin/addMedias">
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


    <!-- Section-->

    @stop


