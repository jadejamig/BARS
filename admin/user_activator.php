<?php
    if(isset($_GET['user']) && isset($_GET['id'])){
        include '../connection.php';
        $id = $_GET['id'];
        $user = $_GET['user'];

        if ($user == 'accept'){
            $query = "UPDATE user SET verified_user = 1 WHERE user_id = '$id'";
            $result = mysqli_query($conn,$query);

            if($result){
                header("location: manage_signup.php");
            }
            else{
                echo "Error in updating this account.";
            }
        }
        else if($user == 'deny'){
            $query = "DELETE FROM user WHERE user_id = '$id' ";
            $result = mysqli_query($conn,$query);

            if($result){
                header("location: manage_signup.php");
            }
            else{
                echo "Error in deleting this registration.";
            }
        }
    }


?>