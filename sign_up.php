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
    <link rel="stylesheet" href="assets/css/sign_up.css" />
  </head>
  <body>
    <!-- SIGN UP SECTIONS -->
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
      <div class="container">
        <div class="row back">
          <a href="javascript:history.back()">
            <i class="fas fa-angle-left"></i>
          </a>
          <a href="homepage.php" class="brrt"><b>Go back</b></a>
        </div>

        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-12">
              <div class="card-body">
                <p class="login-card-description">Create an account</p>
                <form action="register_check.php" method="post" enctype="multipart/form-data">
                  <div class="form-group row name mb-0">
                    <div class="col-6 pl-0">
                      <label for="firstName" class="sr-only">First name</label>
                      <input
                        type="text"
                        name="firstName"
                        id="firstName"
                        class="form-control"
                        placeholder="First name"
                        value="<?php echo isset($_SESSION["fName"]) ? $_SESSION["fName"] : ''; ?>"
                      />
                    </div>
                    <div class="col-6 pl-0">
                      <label for="lastName" class="sr-only">Last name</label>
                      <input
                        type="text"
                        name="lastName"
                        id="lastName"
                        class="form-control"
                        placeholder="Last name"
                        value="<?php echo isset($_SESSION["lName"]) ? $_SESSION["lName"] : ''; ?>"
                      />
                    </div>
                    <?php
                        if (isset($_SESSION['NameError'])){
                          $error = $_SESSION['NameError'];
                          echo "<p class=\"login-card-footer-error\">$error</p>";
                          unset($_SESSION['NameError']);
                        }
                     ?>
                  </div>
                  <div class="form-group mb-0">
                    <label for="email" class="sr-only">Email</label>
                    <input
                      type="email"
                      name="email"
                      id="email"
                      class="form-control"
                      placeholder="Email"
                      value="<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : ''; ?>"
                    />
                    <?php
                      if (isset($_SESSION['emailError'])){
                        $error = $_SESSION['emailError'];
                        echo "<p class=\"login-card-footer-error\">$error</p>";
                        unset($_SESSION['emailError']);
                      }
                    ?>
                  </div>
                  <div class="form-group mb-0">
                    <label for="address" class="sr-only">Address</label>
                    <input
                      type="text"
                      name="address"
                      id="address"
                      class="form-control"
                      placeholder="Address"
                      value="<?php echo isset($_SESSION["address"]) ? $_SESSION["address"] : ''; ?>"
                    />
                    <?php
                      if (isset($_SESSION['addressError'])){
                        $error = $_SESSION['addressError'];
                        echo "<p class=\"login-card-footer-error\">$error</p>";
                        unset($_SESSION['addressError']);
                      }
                    ?>
                  </div>
                  <div class="form-group mb-0">
                    <label for="username" class="sr-only">Username</label>
                    <input
                      type="text"
                      name="username"
                      id="username"
                      class="form-control"
                      placeholder="Username"
                      value="<?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : ''; ?>"
                    />
                    <?php
                      if (isset($_SESSION['usernameError'])){
                        $error = $_SESSION['usernameError'];
                        echo "<p class=\"login-card-footer-error\">$error</p>";
                        unset($_SESSION['usernameError']);
                      }
                    ?>
                  </div>
                  <div class="form-group mb-0">
                    <label for="password" class="sr-only">Password</label>
                    <input
                      type="password"
                      name="password"
                      id="password"
                      class="form-control"
                      placeholder="Password"
                    />
                  </div>
                  <?php
                      if (isset($_SESSION['passwordError'])){
                        $error = $_SESSION['passwordError'];
                        echo "<p class=\"login-card-footer-error\">$error</p>";
                        unset($_SESSION['passwordError']);
                      }
                    ?>
                  <div class="form-group mb-0">
                    <label for="confirmPassword" class="sr-only"
                      >Confirm password</label
                    >
                    <input
                      type="password"
                      name="confirmPassword"
                      id="confirmPassword"
                      class="form-control"
                      placeholder="Confirm password"
                    />
                  </div>
                  <div class="input-group mb-3">
                    <div class="custom-file">
                      <input
                        type="file"
                        name="file"
                        class="custom-file-input"
                        id="inputGroupFile01"
                        accept = ".jpeg, .jpg, .png"
                      />
                      <label class="custom-file-label" for="inputGroupFile01"
                        >Choose file</label
                      >
                    </div>
                  </div>
                  <?php
                      if (isset($_SESSION['fileError'])){
                        $error = $_SESSION['fileError'];
                        echo "<p class=\"login-card-footer-error\">$error</p>";
                        unset($_SESSION['fileError']);
                      }
                    ?>
                  <script>
                    $("#inputGroupFile01").on("change", function () {
                      //get the file name
                      var fileName = $(this).val();
                      var cleanFileName = fileName.replace(
                        "C:\\fakepath\\",
                        " "
                      );
                      //replace the "Choose a file" label
                      $(this).next(".custom-file-label").html(cleanFileName);
                    });
                  </script>
                  <input
                    name="register"
                    id="register"
                    class="btn btn-block login-btn mb-4"
                    type="submit"
                    value="Register"
                  />
                  <?php
                    if (isset($_SESSION['message'])){
                      $message = $_SESSION['message'];
                      echo "<p class=\"login-card-footer-error\">$message</p>";
                      unset($_SESSION['message']);
                    }
                  ?>
                </form>
                <p class="login-card-footer-text">
                  Already have an account?
                  <a href="login.php" class="text-reset">Login here</a>
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

<?php
  //Unsets variables so that if the pages get reloaded/reaccessed
  //the values would be back to empty

  //Unset field form variables
  unset($_SESSION['fName'],$_SESSION['lName'],$_SESSION['email'],$_SESSION['address'],$_SESSION['username']);

  //Unset error variables
  // unset($_SESSION['message']);
?>
