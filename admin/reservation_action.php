<?php

    if(isset($_GET['id']) && isset($_GET['action']) && isset($_GET['rid'])){
        include '../connection.php';

        $id = $_GET['id'];
        $action = $_GET['action'];
        $rid = $_GET['rid'];

        if($action == 'accept'){
            $update = "UPDATE reservations SET complete = 1 WHERE user_id = '$id' AND reservation_id = '$rid'";
            $result = mysqli_query($conn,$update);

            if($result){
                header("location: manage_reservation.php");
            }
            else{
                echo "Error in updating this account.";
            }
        }
        else if($action == 'remove'){
            $query = "DELETE FROM reservations WHERE user_id = '$id' AND reservation_id = '$rid'";
            $result = mysqli_query($conn,$query);

            if($result){
                header("location: manage_reservation.php");
            }
            else{
                echo "Error in deleting this registration.";
            }
        }


    }



?>