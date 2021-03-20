<?php
    session_start();

    //Initilizing error messages variables
    $error = "Missing field.";
    $cpasserror = "Passwords do not match.";
    $emailerror = "Please enter a valid email.";
    $usernameerror = "Username already exist!";
    $valid = true;
    
    if(isset($_POST['register'])){

        //Check if fields are empty; if it is empty, display error
        if(empty($_POST['firstName']) OR empty($_POST['lastName'])){
            $_SESSION['NameError'] = $error;
            $valid = false;

            if (isset($_POST['firstName'])){
                $_SESSION['fName'] = $_POST['firstName'];
            }

            if(isset($_POST['lastName'])){
                $_SESSION['lName'] = $_POST['lastName'];
            }
        }
        else{
            $_SESSION['fName'] = $_POST['firstName'];
            $_SESSION['lName'] = $_POST['lastName'];
        }

        if(empty($_POST['email'])){
            $_SESSION['emailError'] = $error;
            $valid = false;
        }
        //Check if inputted email format is valid; if not display error
        else if(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)){
            $_SESSION['emailError'] = $emailerror;
            $valid = false;
        }
        else{
            $_SESSION['email'] = $_POST['email'];
        }
        
        if(empty($_POST['address'])){
            $_SESSION['addressError'] = $error;
            $valid = false;
        }
        else{
            $_SESSION['address'] = $_POST['address'];
        }

        if(empty($_POST['username'])){
            $_SESSION['usernameError'] = $error;
            $valid = false;
        }
        else{
            $_SESSION['username'] = $_POST['username'];
        }

        if(empty($_POST['password'])){
            $_SESSION['passwordError'] = $error;
            $valid = false;
        }
        //Check and compare inputted values from password field
        //and confirm password field; if not equal, display error
        else if($_POST['password'] != $_POST['confirmPassword']){
            $_SESSION['passwordError'] = $cpasserror;
            $valid = false;
        }

        if($_FILES['file']['size'] == 0){
            $_SESSION['fileError'] = $error;
            $valid = false;
        }
        
        if($valid){
            //Connect to database
            include 'connection.php';

            //Define user details
            $firstname = $_POST['firstName'];
            $lastname = $_POST['lastName'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $username = $_POST['username'];
            $password = sha1($_POST['password']);
            $infile = uniqid(mt_rand()). "-" .$_FILES['file']['name'];

            $path = "user img/".$infile;

            //PHP validation
            $query = "SELECT username FROM user WHERE username = '$username'";
            $result = mysqli_query($conn,$query);

            
            if(mysqli_num_rows($result) == 0){
                //Insert user details into database
                $query = "INSERT INTO user(username,first_name,last_name,email,address,password,verified_user,user_admin,id_file)
                VALUES ('$username','$firstname','$lastname','$email','$address','$password',0,0,'$infile')";

                $result = mysqli_query($conn,$query);

                //If sucess in inserting data into database, move uploaded files 
                //in the specified directory and alert user that registration was
                //successful
                if($result){
                    move_uploaded_file($_FILES['file']['tmp_name'],$path);
                    $_SESSION['success'] = "Please wait for the admin to verify your account.";
                    unset($_SESSION['fName'],$_SESSION['lName'],$_SESSION['email'],$_SESSION['address'],$_SESSION['username']);
                    header("location: sign_up_success.php");
                }
                else if(mysqli_errno($conn) == 1062){
                    $_SESSION['usernameError'] = $usernameerror;
                    header("location: sign_up.php");
                }
                else{
                    $_SESSION['message'] = "There have been an error in registration.";
                    header("location: sign_up.php");
                }
            }
            else{
                $_SESSION['usernameError'] = $usernameerror;
                header("location: sign_up.php");
            }
        }
        else{
            header("location: sign_up.php");
        }
    }

?>