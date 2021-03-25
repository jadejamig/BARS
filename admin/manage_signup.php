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
    <link href="../assets/css/manage_signup.css" rel="stylesheet" />
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
            <h2>Manage Sign up</h2>
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
              <th scope="col" class="day">User ID</th>
              <th scope="col" class="day">Complete name</th>
              <th scope="col" class="day">Verification Photo</th>
              <th scope="col" class="day" colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

              include '../connection.php';

              $query = "SELECT * from user WHERE verified_user <> 1";
              $result = mysqli_query($conn,$query);

              if($result){
                while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                  echo "<td scope=\"col\"  class=\"day day-num b\">".$row['user_id']."</td>";
                  echo "<td scope=\"col\"  class=\"day day-num b\">".$row['first_name']." ".$row['last_name']."</td>";
                  echo "<td scope=\"col\" target=\"_blank\" class=\"day day-num text-info\"><a href='photo_viewer.php?image=".$row['id_file']."'>ID photo</a></td>";
                  echo "<td scope=\"col\"  class=\"day day-num btn-success text-white\"><a href='user_activator.php?user=accept&id=".$row['user_id']."'>Accept</a></td>";
                  echo "<td scope=\"col\"  class=\"day day-num btn-danger text-white\"><a href='user_activator.php?user=deny&id=".$row['user_id']."'>Decline</a></td>";
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

<!-- // $users = array(
              //   array("1", "Chrys Salazar", "../img/verification/chrys.jpeg"),
              //   array("2", "Chris Dotimas", "../img/verification/chris.jpeg"),
              //   array("3", "James Erne", "../img/verification/james.png"),
              //   array("4", "Jade Jamig", "../img/verification/jade.JPG")
              // );
              
              // $userCount = count($users);

              // for ($i=0; $i<$userCount; $i++){
                
              //   echo "<tr>";
              //     for ($j=0; $j<5; $j++){

              //       if ($j < 2){
              //         ?>
              //           <td scope="col"  class="day day-num "><?php echo $users[$i][$j]; ?></td>
              //         <?php
              //       }
              //       if ($j == 2){
              //         ?>
              //           <td scope="col" target="_blank" class="day day-num text-info"><a href="<?php echo $users[$i][$j]; ?>">ID photo</a></td>
              //         <?php
              //       }
              //       elseif ($j == 3) {
              //         ?>
              //           <td scope="col"  class="day day-num btn-success text-white"><a href="#">Accept</a></td>
              //         <?php
              //       }
              //       elseif ($j == 4) {
              //         ?>
              //           <td scope="col"  class="day day-num btn-danger text-white"><a href="#">Decline</a></td>
              //         <?php
              //       }
              //     }
              //   echo "</tr>";
              // } -->