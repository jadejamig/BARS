<?php

    if(isset($_GET['id']) && isset($_GET['rid'])){
        include 'connection.php';

        $id = $_GET['id'];
        $rid = $_GET['rid'];

        $query = "DELETE FROM reservations WHERE user_id = '$id' AND reservation_id = '$rid'";
        $result = mysqli_query($conn,$query);

        if($result){
            header("location: my_reservations.php");
            }
        else{
            echo "Error in deleting this reservation.";
            }   


    }



?>