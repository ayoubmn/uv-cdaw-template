<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Netflex</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />


    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/index.css" rel="stylesheet" />

    <?php 
        $str = file_get_contents("data.json"); 
        $json = json_decode($str,true);

    ?>

</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">NetFlex</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Category</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Action</a></li>
                            <li><a class="dropdown-item" href="#!">Comedy</a></li>
                            <li><a class="dropdown-item" href="#!">Horror</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#!">Favoris</a></li>
                </ul>
                <!-- Search form -->
                <div class="input-group ps-5">
                    <div id="navbar-search-autocomplete" class="form-outline">
                        <input type="search" id="form1" class="form-control" />
                        <label class="form-label" for="form1">Search</label>
                    </div>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>

                <!--login form-->
                <form class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        <a href="login.php" style="text-decoration:none;">Login/Signup</a>
                    </button>
                </form>
            </div>
        </div>
    </nav>


    <!-- Header-->
    <header class="bg-dark py-5">
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
                    <!--/.Controls-->

                    <!--Controls
                    <div class="controls-top">
                        <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i
                                class="fa fa-chevron-left"></i></a>
                        <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
                                class="fa fa-chevron-right"></i></a>
                    </div>
                    -->



                    <!--
                    <ol class="carousel-indicators">
                        <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                        <li data-target="#multi-item-example" data-slide-to="1"></li>
                        <li data-target="#multi-item-example" data-slide-to="2"></li>
                    </ol>
                    -->

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
    </header>

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
                <a href="" style="text-decoration:none;">
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
<!--
                <div class="col mb-5">
                    <div class="card movie_card">
                        <img src="https://static.posters.cz/image/750/affiches-et-posters/captain-marvel-epic-i71851.jpg"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Captain Marvel</h5>
                            <span class="movie_info">2019</span>
                            <span class="movie_info float-right"><i class="fas fa-star"></i> 9 /
                                10</span>
                        </div>
                    </div>
                </div>
-->

            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; CDAW 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>