<?php
  session_start();
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
    <link
      href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="assets/css/login.css" />
  </head>
  <body>
    <!-- Navigation -->
    <!-- LOGIN SECTIONS -->
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
      <div class="container">
        <div class="row back">
          <a href="javascript:history.back()">
            <i class="fas fa-angle-left"></i>
          </a>
          <!-- <a href="javascript:history.back()" class="brrt"><b>Go back</b></a> -->
          <a href="homepage.php" class="brrt"><b>Go back</b></a>
        </div>

        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-5 text-center">
              <img src="img/bgy_logo.png" alt="login" class="login-card-img" />
            </div>
            <div class="col-md-7">
              <div class="card-body">
                <p class="login-card-description">Sign into your account</p>
                <form action="login_check.php" method="post">
                  <div class="form-group">
                    <label for="username" class="sr-only">Username</label>
                    <input
                      type="username"
                      name="username"
                      id="username"
                      class="form-control"
                      placeholder="Username"
                    />
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input
                      type="password"
                      name="password"
                      id="password"
                      class="form-control"
                      placeholder="***********"
                    />
                    <?php
                      if (isset($_SESSION['error'])){
                        $error = $_SESSION['error'];
                        echo "<p class=\"login-card-footer-text-error\">$error</p>";
                        unset($_SESSION['error']);
                      }
                    ?>
                  </div>
                  <input
                    name="login"
                    id="login"
                    class="btn btn-block login-btn mb-4"
                    type="submit"
                    value="Login"
                  />
                </form>
                <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">
                  Don't have an account?
                  <a href="sign_up.php" class="text-reset">Register here</a>
                </p>
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





