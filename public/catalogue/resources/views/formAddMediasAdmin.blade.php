
    @extends('templateadmin')
    @section('contentadmin')

    @if(empty($media))
        <div class="container" style="margin-top: 1rem;margin-bottom: 1rem">
            <form id="addMedia" method="POST" action="/catalogue/public/admin/addMedias">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"  placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="url">Trailler</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Trailler">
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach($categories as $cat)
                            <option value={{$cat->id}}>{{$cat->name}}</option>
                        @endforeach
                    </select>
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
                    <label for="category_id">Category</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach($categories as $cat)
                            <option value={{$cat->id}}>{{$cat->name}}</option>
                        @endforeach
                    </select>
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


