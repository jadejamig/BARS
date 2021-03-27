<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>BARS</title>
    
    <!-- Bootstrap core CSS -->
    <link href="about_css/about-bootstrap.min.css" rel="stylesheet" />

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <!-- Custom styles for this template -->
    <link href="about_css/about-style.min.css" rel="stylesheet" />
    <link rel="icon" href="img/bgy_logo.png">
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="img/bgy_logo.png" class="img-fluid" alt="logo" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="homepage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <?php
              if(isset($_SESSION['login'])){
                echo "<li class=\"nav-item\">
                  <a class=\"nav-link\" href=\"reservation.php\">Reservation</a>
                </li>
                <li class=\"nav-item\">
                  <a class=\"nav-link\" href=\"my_reservations.php\">My Reservations</a>
                </li>
                <li class=\"nav-item\">
                  <a class=\"nav-link\" href=\"log_out.php\">Sign out</a>
                </li>";
              }
              else{
                echo "<li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"login.php\">Login</a>
                      </li>
                      <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"sign_up.php\">Sign up</a>
                      </li>";
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>
    <h1 class="site-heading text-center text-white d-none d-lg-block">
      <span class="site-heading-upper text-primary mb-3"
        >Baranggay Offical Website</span
      >
      <span class="site-heading-lower">ABOUT MANLOT-OD</span>
    </h1>

    <section class="page-section">
      <div class="container">
        <div class="product-item">
          <div class="product-item-title d-flex">
            <div class="bg-faded p-5 d-flex ml-auto rounded">
              <h2 class="section-heading mb-0">
                <span class="section-heading-upper">Active Community</span>
                <span class="section-heading-lower"
                  >Outreach program and more</span
                >
              </h2>
            </div>
          </div>
          <img
            class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0"
            src="img/bg2.jpg"
            alt=""
          />
          <div class="product-item-description d-flex mr-auto">
            <div class="bg-faded p-5 rounded">
              <p class="mb-0">
                Manlot-od is a barangay of Masbate City. It is located at
                the center of the Philippine archipelago between latitudes
                11˚43’ north and 21˚35’ north, and between longitudes 123˚9’
                east and 124˚15’ east, and about 212.5 aerial miles or 362
                nautical miles from Manila. It is bounded on the northeast by
                Masbate Pass, on the southeast by Tugbo River and the
                Municipality of Mobo; on the southwest by the Municipality of
                Milagros; and on the northwest by a portion of Asid River and
                the municipalities of Milagros and Baleno.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="page-section">
      <div class="container">
        <div class="product-item">
          <div class="product-item-title d-flex">
            <div class="bg-faded p-5 d-flex mr-auto rounded">
              <h2 class="section-heading mb-0">
                <span class="section-heading-upper">POPULATION</span>
                <span class="section-heading-lower"
                  >DENSITY &amp; GROWTH RATE</span
                >
              </h2>
            </div>
          </div>
          <img
            class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0"
            src="img/bg1.jpg"
            alt=""
          />
          <div class="product-item-description d-flex ml-auto">
            <div class="bg-faded p-5 rounded">
              <p class="mb-0">
                Urban barangays have the highest population densities in the
                City with an average of39 persons per square kilometer. Rural
                barangays on other hand have an average population density of
                only 2 persons per square kilometer. The City’s growth rate has
                been increasing incensal years 2000, 2010 and 2015. From 1.57 in
                2000, the annual growth rate increased to 1.78 in 2010, and
                eventually reached 2.17 in 2015.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="page-section">
      <div class="container">
        <div class="product-item">
          <div class="product-item-title d-flex">
            <div class="bg-faded p-5 d-flex ml-auto rounded">
              <h2 class="section-heading mb-0">
                <span class="section-heading-upper">LABOR FORCE</span>
                <span class="section-heading-lower">JOBS AVAILABILITY</span>
              </h2>
            </div>
          </div>
          <img
            class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0"
            src="img/products-03.jpg"
            alt=""
          />
          <div class="product-item-description d-flex mr-auto">
            <div class="bg-faded p-5 rounded">
              <p class="mb-0">
                The City has a total of 61,771 members of labor force in which
                55.23% are employed and 44.77% are unemployed. Of the employed,
                70% are males and 30% are females.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer text-faded text-center py-5">
      <div class="container">
        <p class="m-0 small">Copyright &copy; Masbate 2020</p>
      </div>
    </footer>
  </body>
</html>
