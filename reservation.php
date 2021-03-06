<?php
  session_start();
  date_default_timezone_set("Asia/Manila");

  if(!isset($_SESSION['login']) || $_SESSION['usertype'] != 0){
    header("location: 404_found.php");
  }
  
  if (!isset($_SESSION['month']) || !isset($_SESSION['year']) ){
    $_SESSION['month'] = date('n');
    $_SESSION['year'] = date('Y');
  }
  
  if (isset($_POST['next'])){
    if ($_SESSION['month'] != 12){
      $_SESSION['month'] = $_SESSION['month'] + 1;
    }
  }

  elseif (isset($_POST['back'])){
    if ($_SESSION['month'] != 1){
      $_SESSION['month'] = $_SESSION['month'] - 1;
    }
  }
  

  $mydate=getdate(date("U"));
  $month = $_SESSION['month'];
  $year =  $_SESSION['year'];
  $number_of_days = cal_days_in_month(CAL_GREGORIAN, $month , $year);
  $first_day_name = strtolower(date('D', strtotime("1-$month-$year")));
  $day_reference = array("sun"=>0, "mon"=>1, "tue"=>2, "wed"=>3, "thu"=>4, "fri"=>5, "sat"=>6);
  $month_reference = array(1=>"January", 2=>"February", 3=>"March", 4=>"April", 5=>"May", 6=>"June", 7=>"July",
                           8=>"August", 9=>"September", 10=>"October", 11=>"November", 12=>"December");
  $calendar_start = $day_reference[$first_day_name]; 

  $day_today = date('j');
  $month_today = date('m');
  $year_today = date('Y');
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
    <link rel="icon" href="img/bgy_logo.png">
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
          <div class="col-4 toggle-month-left ">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                  <button name="back" class="btn next-btn bg-transparent" type="submit" value="">
                    <i class="fas fa-angle-left"></i>
                  </button>
                </form>
          </div>
          <div class="col-4 text-center heading-text pr-4">
              <h3> <?php echo "$month_reference[$month] $year"?></h3>
          </div>
          <div class="col-4 toggle-month-right">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                  <button name="next" class="btn next-btn bg-transparent" type="submit" value="">
                    <i class="fas fa-angle-right"></i>
                  </button>
                </form>
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
            for ($i=0; $i<6; $i++){
              echo "<tr>";
                for ($j=0; $j<7; $j++){

                      if ($i==0 && $j==$calendar_start){
                        $start = true;
                      }

                      if ($start){

                          if ($day_count > $number_of_days){
                            break;
                          }
                          if( $month > $month_today){
                            ?>
                              <td scope="col"  class="day day-num"><a href="reservation_schedule.php?month=<?php echo $month_reference[$month];?>&day=<?php echo $day_count ?>"><?php echo $day_count?></a></td>
                            <?php
                          }
                          else if ($day_count > $day_today && $month == $month_today) {
                            ?>
                              <td scope="col"  class="day day-num"><a href="reservation_schedule.php?month=<?php echo $month_reference[$month];?>&day=<?php echo $day_count ?>"><?php echo $day_count?></a></td>
                            <?php
                          }
                          else {
                            ?>
                                <td scope="col"  class="day day-num bg-light"><a><?php echo $day_count?></a></td>
                            <?php
                          }
                          $day_count += 1;
                      }
                      else{
                          ?>
                            <td scope="col"  class=""></td>
                          <?php
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

