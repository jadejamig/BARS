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

    //connect to databe
    include 'connection.php';

    //Check username and password from database
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn,$query);

    //if account exists in database, initialize session variables
    //otherwise display error messages

    if(mysqli_num_rows($result) == 1){
      
      $row = mysqli_fetch_array($result);
      $_SESSION['login'] = true;
      $_SESSION['username'] = $row['username'];
      $_SESSION['usertype'] = $row['user_admin'];

      if($_SESSION['usertype'] == 1){
        //header("location: homepageadmin.php);
        header("location: admin/admin.php");
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