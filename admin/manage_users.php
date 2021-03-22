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
    <link href="../assets/css/manage_users.css" rel="stylesheet" />
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
            <h2>Manage Users</h2>
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
              <a class="nav-link" href="#">Manage Reservations</a>
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
      <div class="row">
        <div class="col-11 heading-text">
          <h3><?php echo "$mydate[month] $mydate[year]"?></h3>
        </div>
      </div>
      <div class="row heading">
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th scope="col" class="day">User ID</th>
              <th scope="col" class="day">Complete name</th>
              <th scope="col" class="day">Email</th>
              <th scope="col" class="day" >Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

              $users = array(
                array("1", "Chrys Salazar", "salazarchrys@gmail.com"),
                array("2", "Chris Dotimas", "dotimaschris@gmail.com"),
                array("3", "James Erne", "ernejames@gmail.com"),
                array("4", "Jade Jamig", "jamigjade@gmail.com")
              );
              
              $userCount = count($users);

              for ($i=0; $i<$userCount; $i++){
                
                echo "<tr>";
                  for ($j=0; $j<4; $j++){
                    
                    if ($j != 3){
                      ?>
                        <td scope="col"  class="day day-num b"><?php echo $users[$i][$j]; ?></td>
                      <?php
                    }
                    else {
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
