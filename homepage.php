<?php
  session_start();
  
  if(isset($_SESSION['usertype'])){
    if($_SESSION['usertype'] != 0){
      header("location: 404_found.php");
    }
  }

  if(isset($_SESSION['month'])){
    unset($_SESSION['month']);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>BARS</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway"/>
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

    <!--- Image Slider -->
    <div id="slides" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/outreach2.png" alt="" />
          <div class="carousel-caption">
            <!-- <h1 class="display-2">Outreach Programs</h1> -->
            <h3>OUTREACH PROGRAMS</h3>
            <button type="button" class="btn btn-outline-light btn-lg">
              Learn more
            </button>
            <!-- <button type="button" class="btn btn-primary btn-lg">
              Learn More
            </button> -->
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/outreach1.png" alt="" />
        </div>
        <div class="carousel-item">
          <img src="img/outreach3.png" alt="" />
        </div>
      </div>
    </div>

    <!--- Meet the team -->
    <div class="container-fluid padding">
      <div class="row welcome text-center">
        <div class="col-12">
          <h1 class="display-4">Barangay Officials</h1>
        </div>
      </div>
    </div>

    <!--- Cards -->
    <div class="container-fluid padding">
      <div class="row padding text-center row-card">
        <div class="col-md-4">
          <div class="card">
            <img
              src="img/brgy_official1.png"
              class="card-img-top"
              alt="team1"
            />
            <div class="card-body">
              <h5 class="card-title">Pascual, Leon Paulo A.</h5>
              <p class="card-text">Barangay Captain</p>
              <a href="#">
                <button class="btn btn-outline-secondary">See Profile</button>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img
              src="img/brgy_official2.png"
              class="card-img-top"
              alt="team1"
            />
            <div class="card-body">
              <h5 class="card-title">Balmores, John Paul M.</h5>
              <p class="card-text">Barangay Treasurer</p>
              <a href="#">
                <button class="btn btn-outline-secondary">See Profile</button>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img
              src="img/brgy_official3.png"
              class="card-img-top"
              alt="team1"
            />
            <div class="card-body">
              <h5 class="card-title">Valdez, Ferdinand C.</h5>
              <p class="card-text">Barangay Councillor</p>
              <a href="#">
                <button class="btn btn-outline-secondary">See Profile</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- SERVICES SECTION -->
    <div class="container-fluid padding">
      <div class="row text-center">
        <div class="col-xs-12 col-sm-6 services p-5">
          <i class="far fa-credit-card"></i>          
          <h3>Taxes & Fees</h3>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima porro, optio nam eum dolorum quae dolor officia, nobis distinctio nesciunt fugit deleniti enim. Necessitatibus eum rem quidem molestias adipisci enim.</p>
        </div>
        <div class="col-xs-12 col-sm-6 services p-5">
          <i class="far fa-handshake"></i>
          <h3>Social Services</h3>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima porro, optio nam eum dolorum quae dolor officia, nobis distinctio nesciunt fugit deleniti enim. Necessitatibus eum rem quidem molestias adipisci enim.</p>
        </div>
        <div class="col-xs-12 col-sm-6 services p-5">
          <i class="fas fa-balance-scale"></i>
          <h3>Legal Services</h3>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima porro, optio nam eum dolorum quae dolor officia, nobis distinctio nesciunt fugit deleniti enim. Necessitatibus eum rem quidem molestias adipisci enim.</p>

        </div>
        <div class="col-xs-12 col-sm-6 services p-5">
          <i class="fas fa-heartbeat"></i>
          <h3>Health Services</h3>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima porro, optio nam eum dolorum quae dolor officia, nobis distinctio nesciunt fugit deleniti enim. Necessitatibus eum rem quidem molestias adipisci enim.</p>
        </div>
      </div>
    </div>

    <!--- Footer -->
    <footer>
      <div class="container-fluid padding text-center">
        <div class="row">
          <div class="col-md-4">
            <img src="img/bgy_logo.png" class="img-fluid" alt="logo" />
          </div>
          <div class="col-md-4">
            <h5>OFFICIALS</h5>
            <p>Elected Officials</p>
            <p>Department / Offices</p>
            <br />
            <h5>SERVICE HOURS</h5>
            <p>Monday - Friday: 9am-5pm</p>
          </div>
          <div class="col-md-4">
            <h5>SERVICES</h5>
            <p>Taxes & Fees</p>
            <p>Social Services</p>
            <p>Legal Services</p>
          </div>
          <div class="col-md-4"></div>
        </div>
      </div>
    </footer>
  </body>
</html>
