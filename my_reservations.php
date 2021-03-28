<?php
  session_start();

  unset($_SESSION['month']);
  
  if(!isset($_SESSION['login']) || $_SESSION['usertype'] != 0){
    header("location: 404_found.php");
  }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BARS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="assets/css/my_reservations.css" rel="stylesheet" />
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

    <!-- CALENDAR SECTION -->
    <div class="container-fluid padding calendar">
      <div class="row">
        <div class="col-11 heading-text">
          <h3>My Reservations</h3>
        </div>
      </div>
      <div class="row heading">
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th scope="col" class="day">Reservation ID</th>
              <th scope="col" class="day">Reservation Date</th>
              <th scope="col" class="day">Batch Time</th>
              <th scope="col" class="day">Concern</th>
              <th scope="col" class="day" >Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $user_id = $_SESSION['user_id'];

              include 'connection.php';

              $select = "SELECT * FROM reservations WHERE user_id = '$user_id'";
              $result = mysqli_query($conn,$select);

              if($result){
                while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                  echo "<td scope=\"col\"  class=\"day day-num b\">".$row['reservation_id']."</td>"; 
                  echo "<td scope=\"col\"  class=\"day day-num b\">".$row['reservation_date']."</td>";
                  echo "<td scope=\"col\"  class=\"day day-num b\">".$row['batch_time']."</td>";
                  echo "<td scope=\"col\"  class=\"day day-num b\">".$row['concern']."</td>";
                  
                  if($row['complete'] == 0){
                    echo "<td scope=\"col\"  class=\"day day-num btn-danger\"><a href='user_reservation_action.php?id=".$row['user_id']."&rid=".$row['reservation_id']."'>Remove</a></td>";
                  }
                  else{
                    echo "<td scope=\"col\"  class=\"\"></td>";
                  }
                  echo "</tr>";
                }
              }   
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
