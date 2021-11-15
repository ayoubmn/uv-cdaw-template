
    @extends('template')
    @section('content')
    <?php 
        $str = file_get_contents("data.json"); 
        $json = json_decode($str,true);

    ?>
    <!-- Header-->
    <div class="bg-dark py-5">
        <div class="container px-4 px-lg-12 ">
            <div class="text-center text-white">
                <!--Carousel Wrapper-->
                <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
                    <!--Controls-->
                    <div class="controls-top d-none d-md-block d-lg-block">
                        <a class="carousel-control-prev" style="width:10%;" href="#multi-item-example" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" style="width:10%;" href="#multi-item-example" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">

                        <!--First slide-->
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card movie_card">
                                        <img src="<?php print_r($json[0]["pic"]);?>"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <a href="<?php print_r($json[0]["link"]);?>">
                                                <i class="fas fa-play play_button" data-toggle="tooltip"
                                                data-placement="bottom" title="Play Trailer">
                                                </i>
                                            </a>
                                            <h5 class="card-title"><?php print_r($json[0]["title"]);?></h5>
                                            <span class="movie_info"><?php print_r($json[0]["date"]);?></span>
                                            <span class="movie_info float-right"><i class="fas fa-star"></i> 9 /
                                                10</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 clearfix d-none d-md-block">
                                    <div class="card movie_card">
                                        <img src="<?php print_r($json[1]["pic"]);?>"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <a href="<?php print_r($json[1]["link"]);?>">
                                                <i class="fas fa-play play_button" data-toggle="tooltip"
                                                data-placement="bottom" title="Play Trailer">
                                                </i>
                                            </a>
                                            <h5 class="card-title"><?php print_r($json[1]["title"]);?></h5>
                                            <span class="movie_info"><?php print_r($json[1]["date"]);?></span>
                                            <span class="movie_info float-right"><i class="fas fa-star"></i> 9 /
                                                10</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 clearfix d-none d-md-block">
                                    <div class="card movie_card">
                                        <img src="<?php print_r($json[2]["pic"]);?>"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <a href="<?php print_r($json[2]["link"]);?>">
                                                <i class="fas fa-play play_button" data-toggle="tooltip"
                                                data-placement="bottom" title="Play Trailer">
                                                </i>
                                            </a>
                                            <h5 class="card-title"><?php print_r($json[2]["title"]);?></h5>
                                            <span class="movie_info"><?php print_r($json[2]["date"]);?></span>
                                            <span class="movie_info float-right"><i class="fas fa-star"></i> 9 /
                                                10</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 clearfix d-none d-md-block">
                                    <div class="card movie_card">
                                        <img src="<?php print_r($json[3]["pic"]);?>"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <a href="<?php print_r($json[3]["link"]);?>">
                                                <i class="fas fa-play play_button" data-toggle="tooltip"
                                                data-placement="bottom" title="Play Trailer">
                                                </i>
                                            </a>
                                            <h5 class="card-title"><?php print_r($json[3]["title"]);?></h5>
                                            <span class="movie_info"><?php print_r($json[3]["date"]);?></span>
                                            <span class="movie_info float-right"><i class="fas fa-star"></i> 9 /
                                                10</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/.First slide-->

                        <!--Second slide-->
                        <div class="carousel-item">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card movie_card">
                                        <img src="<?php print_r($json[4]["pic"]);?>"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <a href="<?php print_r($json[4]["link"]);?>">
                                                <i class="fas fa-play play_button" data-toggle="tooltip"
                                                data-placement="bottom" title="Play Trailer">
                                                </i>
                                            </a>
                                            <h5 class="card-title"><?php print_r($json[4]["title"]);?></h5>
                                            <span class="movie_info"><?php print_r($json[4]["date"]);?></span>
                                            <span class="movie_info float-right"><i class="fas fa-star"></i> 9 /
                                                10</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card movie_card">
                                        <img src="<?php print_r($json[5]["pic"]);?>"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <a href="<?php print_r($json[5]["link"]);?>">
                                                <i class="fas fa-play play_button" data-toggle="tooltip"
                                                data-placement="bottom" title="Play Trailer">
                                                </i>
                                            </a>
                                            <h5 class="card-title"><?php print_r($json[5]["title"]);?></h5>
                                            <span class="movie_info"><?php print_r($json[5]["date"]);?></span>
                                            <span class="movie_info float-right"><i class="fas fa-star"></i> 9 /
                                                10</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card movie_card">
                                        <img src="<?php print_r($json[6]["pic"]);?>"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <a href="<?php print_r($json[6]["link"]);?>">
                                                <i class="fas fa-play play_button" data-toggle="tooltip"
                                                data-placement="bottom" title="Play Trailer">
                                                </i>
                                            </a>
                                            <h5 class="card-title"><?php print_r($json[6]["title"]);?></h5>
                                            <span class="movie_info"><?php print_r($json[6]["date"]);?></span>
                                            <span class="movie_info float-right"><i class="fas fa-star"></i> 9 /
                                                10</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card movie_card">
                                        <img src="<?php print_r($json[7]["pic"]);?>"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <a href="<?php print_r($json[7]["link"]);?>">
                                                <i class="fas fa-play play_button" data-toggle="tooltip"
                                                data-placement="bottom" title="Play Trailer">
                                                </i>
                                            </a>
                                            <h5 class="card-title"><?php print_r($json[7]["title"]);?></h5>
                                            <span class="movie_info"><?php print_r($json[7]["date"]);?></span>
                                            <span class="movie_info float-right"><i class="fas fa-star"></i> 9 /
                                                10</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card movie_card">
                                        <img src="<?php print_r($json[8]["pic"]);?>"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <a href="<?php print_r($json[8]["link"]);?>">
                                                <i class="fas fa-play play_button" data-toggle="tooltip"
                                                data-placement="bottom" title="Play Trailer">
                                                </i>
                                            </a>
                                            <h5 class="card-title"><?php print_r($json[8]["title"]);?></h5>
                                            <span class="movie_info"><?php print_r($json[8]["date"]);?></span>
                                            <span class="movie_info float-right"><i class="fas fa-star"></i> 9 /
                                                10</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/.Second slide-->

                        <!--Third slide-->
                        <div class="carousel-item">

                        </div>
                        <!--/.Third slide-->

                    </div>
                    <!--/.Slides-->

                </div>
                <!--/.Carousel Wrapper-->
            </div>
        </div>
</div>
    <!-- Section-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <button type="button" class="btn btn-primary float-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-up" viewBox="0 0 16 16">
                            <path
                                d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707V12.5zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z">
                            </path>
                        </svg>
                        Sort by date
                    </button>
                </div>
            </div>
        </div>

        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach ($json as $key1 => $value1): ?>
                <a style="text-decoration:none;" onclick="sendElement('<?php print_r($json[$key1]['pic']) ?>','<?php print_r($json[$key1]['title'])?>','<?php print_r($json[$key1]['date'])?>','<?php print_r($json[$key1]['link'])?>')" >
                    <div class="col mb-5">
                        <div class="card movie_card">
                            <img src="<?php print_r($json[$key1]["pic"]);?>"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php print_r($json[$key1]["title"]);?></h5>
                                <span class="movie_info"><?php print_r($json[$key1]["date"]);?></span>
                                <span class="movie_info float-right"><i class="fas fa-star"></i> 9 /
                                    10</span>
                            </div>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    
    </section>
    @stop

