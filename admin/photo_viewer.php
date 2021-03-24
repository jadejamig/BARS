<?php
    if(isset($_GET['image'])){
        $image = $_GET['image'];

        echo "<img src='../user img/".$image."'>";
    }

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
        <link rel="stylesheet" href="../assets/css/photo_viewer.css" />
  </head>
  <body>
    <!-- Navigation -->
    <!-- LOGIN SECTIONS -->
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
      <div class="container">
        <div class="row back">
          <a href="manage_signup.php"><i class="fas fa-angle-left"></i></a>
          <a href="manage_signup.php" class="brrt"><b>Go back</b></a>
        </div>

        <div class="card login-card">
            <img src="../user img/cardsample.jpeg" alt="login" class="img-fluid" />
        </div>
      </div>
    </main>
  </body>

</html>





