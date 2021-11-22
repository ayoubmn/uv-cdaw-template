
    @extends('templateadmin')
    @section('contentadmin')


        <div class="container">
            <br/>
            <a href="/jalon2/catalogue/public/admin/addMedias" style="text-decoration:none;"><button type="button" class="btn btn-primary btn-lg btn-block">Add a movie</button></a>
        </div>
    <!-- Section-->
    <section class="py-5">

        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($media as $media)
                    <div class="col mb-5">
                        <div class="card movie_card">
                            <img src={{$media->avatar}}
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$media->name}}</h5>
                                <span class="movie_info">{{$media->date}}</span>
                                <span class="movie_info float-right"><i class="fas fa-star"></i> 9 /
                                    10</span>
                                <div>

                                    <a href="/jalon2/catalogue/public/admin/deleteMedias/{{$media->id}}" class="btn btn-danger " role="button" aria-pressed="true">Delete</a>
                                    <a href="/jalon2/catalogue/public/admin/addMedias/{{$media->id}}" class="btn btn-info " role="button" aria-pressed="true">Update</a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    
    </section>
    @stop
