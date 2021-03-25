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
              <a class="nav-link" href="#">Sign out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

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
              <th scope="col" class="day">Concern</th>
              <th scope="col" class="day" colspan="2" >Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

              $users = array(
                array("1", "1", "Jose Dela Cruz", "March 13, 2021", "Barangay Clearance"),
                array("2", "2","Cecilia Tiago", "March 22, 2021", "Certificate of Indigency"),
                array("3", "3", "Bryan Reyes", "March 12, 2021", "Certificate of Residency"),
                array("4", "4", "Juan Hugo", "March 2, 2021", "Barangay Business Permit"),
                array("5", "5", "Albert Santos", "March 8, 2021", "Community Certificate"),
                array("6", "6", "Martin Sanchez", "March 15, 2021", "Medical Mission"),
                array("7", "7","Tina Moran", "TMarch 6, 2021", "Barangay Clearance")
              );

              $userCount = count($users);

              for ($i=0; $i<$userCount; $i++){

                echo "<tr>";
                  for ($j=0; $j<7; $j++){

                    if ($j < 5){
                      ?>
                        <td scope="col"  class="day day-num b"><?php echo $users[$i][$j]; ?></td>
                      <?php
                    }
                    elseif ($j == 5){
                      ?>
                        <td scope="col"  class="day day-num btn-success"><a href="#">Confirm</a></td>
                      <?php
                    }
                    elseif ($j == 6){
                      ?>
                        <td scope="col"  class="day day-num btn-danger"><a href="#">Delete</a></td>
                      <?php
                    }

                  }
                echo "</tr>";
              }

            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
