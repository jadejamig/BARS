<?php
  session_start();
  date_default_timezone_set("Asia/Manila");

  $mydate=getdate(date("U"));
  $day = $_GET['day'];
  $month = $_GET['month'];
  $year = $_SESSION['year'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>BARS</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/reservation_schedule.css" />
    <link rel="icon" href="img/bgy_logo.png">
  </head>
  <body>
    <!-- SIGN UP SECTIONS -->
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
      <div class="container">
        <div class="row back">
          <a href="javascript:history.back()">
            <i class="fas fa-angle-left"></i>
          </a>
          <a href="reservation.php" class="brrt"><b>Go back</b></a>
          
        </div>

        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="card-body">
                <p class="login-card-description"> Reservation - <?php echo "$month $day, $year" ?></p>
                <form action="insert_reservation.php?month=<?php echo $month;?>&day=<?php echo $day;?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="select_time">Select Time Schedule</label>
                        <select class="form-control p-0 pl-4" name="time_sched" id="select_time">
                            <option disabled selected hidden>Select time schedule</option>
                            <option value="9:00 am - 12:00 pm">9:00 am - 12:00 pm</option>
                            <option value="1:00 pm - 6:00 pm">1:00 pm - 6:00 pm</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="select_office">Select Concern</label>
                        <select class="form-control p-0 pl-4" name="concern" id="select_office">
                            <option disabled selected hidden>Select concern</option>
                            <option value="Barangay Clearance">Barangay Clearance</option>
                            <option value="Certificate of Indigency">Certificate of Indigency</option>
                            <option value="Proof of Residency">Proof of Residency</option>
                            <option value="Barangay Permit">Barangay Permit</option>
                            <option value="Community Certificate">Community Certificate</option>  
                            <option value="Medical Mission">Medical Mission</option>  
                            <option value="Barangay ID">Barangay ID</option>  
                            <option value="Building Permit">Building Permit</option>  
                            <option value="Census">Census</option>  
                        </select>
                        <?php
                          if (isset($_SESSION['reservationError'])){
                            $message = $_SESSION['reservationError'];
                            echo "<p style='color: red;'>$message</p>";
                            unset($_SESSION['reservationError']);
                          }
                        ?>
                    </div>
                    <input
                        name="submit_reservation"
                        id="submit_reservation"
                        class="btn btn-block login-btn mb-4 mt-5"
                        type="submit"
                        value="Submit reservation"
                    />
                </form>
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
