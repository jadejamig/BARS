<?php
  $mydate=getdate(date("U"));
  $month = (int)$mydate['mon'];
  $year =  (int)$mydate['year'];
  $number_of_days = cal_days_in_month(CAL_GREGORIAN, $month , $year);
  $first_day_name = strtolower(date('D', strtotime("1-$month-$year")));
  $day_reference = array("sun"=>0, "mon"=>1, "tue"=>2, "wed"=>3, "thu"=>4, "fri"=>5, "sat"=>6);
  $calendar_start = $day_reference[$first_day_name]; 

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
    <link href="assets/css/reservation.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Raleway"
    />
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
            <li class="nav-item">
              <a class="nav-link" href="reservation.php">Reservation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="my_reservations.php">My Reservations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sign_up.php">Sign up</a>
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
              <th scope="col" class="day">Sun</th>
              <th scope="col" class="day">Mon</th>
              <th scope="col" class="day">Tue</th>
              <th scope="col" class="day">Wed</th>
              <th scope="col" class="day">Thu</th>
              <th scope="col" class="day">Fri</th>
              <th scope="col" class="day">Sat</th>
            </tr>
          </thead>
          <?php 
            $start = false;
            $day_count = 1;
            for ($i=0; $i<5; $i++){
              echo "<tr>";
                for ($j=0; $j<7; $j++){

                      if ($i==0 && $j==$calendar_start){
                        $start = true;
                      }
                      if ($start){

                        if ($day_count > $number_of_days){
                          break;
                        }
                        ?>
                              <td scope="col"  class="day day-num"><a href="reservation_schedule.php?day=<?php echo $day_count ?>"><?php echo $day_count?></a></td>
                        <?php
                        // echo "<a href=\"#\"> <td scope=\"col\"  class=\"day day-num\">$day_count</td> </a>";
                        $day_count += 1;
                      }
                      else{
                        echo "<td scope=\"col\" class=\"day day-num\"></td>";
                      }
                      
                }
                echo "<tr>";
            }
          
          ?>
        </table>
      </div>
    </div>
  </body>
</html>
