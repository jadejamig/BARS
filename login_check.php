<?php

session_start();

if (isset($_POST['login'])){
  //check if username or password fields are empty
  if(empty($_POST['username']) or empty($_POST['password'])){
    $error = "You must complete both fields.";
    $_SESSION['error'] = $error;
    header("location: login.php");
  }
  
  else{
    //Define username, password and errors
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $error = "Invalid login credentials.";
    $verifyerror = "Your account is not verified.";

    //connect to database
    include 'connection.php';

    //Check username and password from database
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn,$query);

    //if account exists in database, initialize session variables
    //otherwise display error messages
    if(mysqli_num_rows($result) == 1){
      
      $row = mysqli_fetch_array($result);
      $_SESSION['login'] = true;
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['usertype'] = $row['user_admin'];
      $_SESSION['verified'] = $row['verified_user'];

      if($_SESSION['usertype'] == 1){
        header("location: admin/admin.php");
      }
      else if($_SESSION['verified'] == 0){
        $_SESSION['error'] = $verifyerror;
        header("location: login.php");
      }
      else{
        header("location: homepage.php");
      }
    }

    else{
      $_SESSION['error'] = $error;
      header("location: login.php");
    }
  }
}

?>