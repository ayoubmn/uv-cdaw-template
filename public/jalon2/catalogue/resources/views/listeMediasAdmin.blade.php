
    @extends('templateadmin')
    @section('contentadmin')
    <?php 
        $str = file_get_contents("data.json"); 
        $json = json_decode($str,true);

/*        if (isset($_GET['date'])) {

            $date=$_GET['date'];
        }*/
    ?>

        <div class="container">
            <button class="btn">
            <a href="/jalon2/catalogue/public/admin/addMedias" style="text-decoration:none;">Add a movie</a>
        </button>
        </div>
    <!-- Section-->
    <section class="py-5">

        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($media as $media)
                <a style="text-decoration:none;" onclick="#" >
                    <div class="col mb-5">
                        <div class="card movie_card">
                            <img src={{$media->avatar}}
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$media->name}}</h5>
                                <span class="movie_info">2019</span>
                                <span class="movie_info float-right"><i class="fas fa-star"></i> 9 /
                                    10</span>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    
    </section>
    @stop
