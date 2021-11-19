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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
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
                        <a href="login.php" style="text-decoration:none;" >Login/Signup</a>
                    </button>
                </form>
            </div>
        </div>
    </nav>

        <section class="vh-100" style="background-color: #eee;">
            <div class="container h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                  <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                      <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
          
                          <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">S'inscrire</p>
          
                          <form class="mx-1 mx-md-4">
          
                            <div class="form-group mb-2">
                                <label for="name" class="control-label">Nom complet</label>
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="text" id="name" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="birthdayDate" class="control-label">Date de naissance</label>
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="date" id="birthdayDate" class="form-control" />
                                </div>
                            </div>
          
                            <div class="form-group mb-2">
                                <label for="email" class="control-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="email" id="email" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="password" class="control-label">Mot de passe</label>
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="password" id="password" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="passwordConfirm" class="control-label">Confirmer mot de passe</label>
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input type="password" id="passwordConfirm" class="form-control" />
                                </div>
                            </div>
          
                            <div class="form-check d-flex justify-content-center mb-5">
                              <input
                                class="form-check-input me-2"
                                type="checkbox"
                                value=""
                                id="form2Example3c"
                              />
                              <label class="form-check-label" for="form2Example3">
                                Je déclare avoir lu et accepté les <a href="#!">Conditions Générales d'Utilisation</a>
                              </label>
                            </div>
          
                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                              <button type="button" class="btn btn-primary btn-lg">Valider</button>
                            </div>
          
                          </form>
          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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