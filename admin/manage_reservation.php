<?php
  session_start();

  if(!isset($_SESSION['login']) || $_SESSION['usertype'] != 1){
    header("location: ../404_found.php");
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
    <link href="../assets/css/manage_reservation.css" rel="stylesheet" />
    <link rel="icon" href="../img/bgy_logo.png">
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="../img/bgy_logo.png" class="img-fluid" alt="logo" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <h2>Manage Reservations</h2>
          </li>
        </ul>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="admin.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manage_users.php">Manage Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manage_signup.php">Manage Sign up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manage_reservation.php">Manage Reservations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../log_out.php">Sign out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- SEARCH SECTION -->
    <div class="search-section container-fluid">
                <form class="form-inline" method="post">
                      <input
                        type="text"
                        name="searchkey"
                        class="form-control mb-2 mr-2"
                        placeholder="Search"
                      />
                      
                    <input
                      name="search"
                      class="btn btn-block login-btn mb-2"
                      type="submit"
                      value="Search"
                    />
                </form>
        </div>

    <!-- CALENDAR SECTION -->
    <div class="container-fluid padding calendar">
      <div class="row heading">
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th scope="col" class="day">Reservation ID</th>
              <th scope="col" class="day">User ID</th>
              <th scope="col" class="day">Complete Name</th>
              <th scope="col" class="day">Reservation Date</th>
              <th scope="col" class="day">Batch Time</th>
              <th scope="col" class="day">Concern</th>
              <th scope="col" class="day" colspan="2" >Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

              include '../connection.php';

              $query = "SELECT reservations.reservation_id as reservation_id, reservations.user_id as user_id, concat(user.first_name,' ',user.last_name) as complete_name
                        ,reservations.reservation_date as reservation_date,reservations.batch_time as batch_time,reservations.concern as concern 
                        FROM reservations, user 
                        WHERE reservations.user_id = user.user_id AND reservations.complete = 0
                        ORDER BY reservations.reservation_date ASC, reservations.batch_time ASC, reservations.time_reserved ASC";
              
              $result = mysqli_query($conn,$query);

              if($result){
                while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                  echo "<td scope=\"col\"  class=\"day day-num b\">".$row['reservation_id']."</td>";
                  echo "<td scope=\"col\"  class=\"day day-num b\">".$row['user_id']."</td>";
                  echo "<td scope=\"col\"  class=\"day day-num b\">".$row['complete_name']."</td>";
                  echo "<td scope=\"col\"  class=\"day day-num b\">".$row['reservation_date']."</td>";
                  echo "<td scope=\"col\"  class=\"day day-num b\">".$row['batch_time']."</td>";
                  echo "<td scope=\"col\"  class=\"day day-num b\">".$row['concern']."</td>";
                  echo "<td scope=\"col\"  class=\"day day-num btn-success\"><a href='reservation_action.php?id=".$row['user_id']."&rid=".$row['reservation_id']."&action=accept'>Confirm</a></td>";
                  echo "<td scope=\"col\"  class=\"day day-num btn-danger\"><a href='reservation_action.php?id=".$row['user_id']."&rid=".$row['reservation_id']."&action=remove'>Remove</a></td>";
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
