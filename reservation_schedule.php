<?php
  $mydate=getdate(date("U"));
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
                <p class="login-card-description"> Reservation - <?php echo "$mydate[month] $_GET[day], $mydate[year]" ?></p>
                <form action="reservation_check.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="select_time">Select time schedule</label>
                        <select class="form-control p-0 pl-4" id="select_time">
                            <option selected>Select time</option>
                            <option value="1">9:00 am - 12:00 pm</option>
                            <option value="2">1:00 pm - 6:00 pm</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="select_office">Select office</label>
                        <select class="form-control p-0 pl-4" id="select_office">
                            <option selected>Select office</option>
                            <option value="1">Barangay Clearance</option>
                            <option value="2">Certificate of Indigency</option>
                            <option value="3">Proof of Residency</option>
                            <option value="4">Barangay Permit</option>
                            <option value="5">Community Certificate</option>  
                            <option value="5">Medical Mission</option>  
                            <option value="5">Barangay ID</option>  
                            <option value="5">Building Permit</option>  
                            <option value="5">Census</option>  
                        </select>
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
