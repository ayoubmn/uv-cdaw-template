
    @extends('templateadmin')
    @section('contentadmin')

<div class="container">
    <form id="addFilm" method="POST" action="{{url('#')}}">
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
                <option>Action</option>
                <option>Comedy</option>
                <option>Horror</option>
            </select>
        </div>
        <div class="form-group">
            <label for="avater">Avatar</label>
            <input type="text" class="form-control" id="avatar" name="avatar" placeholder="Avatar">
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

    <!-- Section-->

    @stop
