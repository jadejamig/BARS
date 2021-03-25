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
              <a class="nav-link" href="manage_reservation.php">Manage Reservations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../log_out.php">Sign out</a>
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
              <th scope="col" class="day">Email</th>
              <th scope="col" class="day" >Action</th>
            </tr>
          </thead>
          <tbody>
            <?php

            include '../connection.php';

            $query = "SELECT * from user WHERE verified_user = 1";
            $result = mysqli_query($conn,$query);

            while($row = mysqli_fetch_array($result)){
              echo "<tr>";
              echo "<td scope=\"col\"  class=\"day day-num b\">".$row['user_id']."</td>";
              echo "<td scope=\"col\"  class=\"day day-num b\">".$row['first_name']." ".$row['last_name']."</td>";
              echo "<td scope=\"col\"  class=\"day day-num b\">".$row['email']."</td>";
              echo "<td scope=\"col\"  class=\"day day-num btn-danger\">"."<a href='delete_user.php?id= " .$row['user_id']. "'>Delete</a>"."</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
