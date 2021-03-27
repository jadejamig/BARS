<?php
    session_start();
    date_default_timezone_set("Asia/Manila");

    $day = $_GET['day'];
    $month = $_GET['month'];
    $month_num = $_SESSION['month'];
    $year = $_SESSION['year'];
    $emptyError = "Please do not leave empty field.";
    $insertError = "There was an error in inserting reservation.";
    $reserveError = "Current reservation time schedule already exists.";

    if(empty($_POST['time_sched']) || empty($_POST['concern'])){
        $_SESSION['reservationError'] = $emptyError;

        header("location: reservation_schedule.php?month=$month&day=$day");
    }
    else{

        include 'connection.php';

        $combinedDate = "$year/$month_num/$day";
        $formattedDate = date("Y-m-d",strtotime($combinedDate));
        $batchTime = $_POST['time_sched'];
        $concern = $_POST['concern'];
        $userid = $_SESSION['user_id'];
        $time_reserved = date("H:i:s");

        $check = "SELECT * FROM reservations WHERE user_id = '$userid' AND reservation_date = '$formattedDate' AND batch_time = '$batchTime'";
        $result = mysqli_query($conn,$check);

        if(mysqli_num_rows($result) == 0){
            $insert = "INSERT INTO reservations(user_id,reservation_date,batch_time,time_reserved,concern,complete)
                    VALUES ('$userid','$formattedDate','$batchTime','$time_reserved','$concern',0)";
            $result = mysqli_query($conn,$insert);

            if($result){
                header('location: reserve_success.php');
            }
            else{
                echo mysqli_error($conn);
                // $_SESSION['reservationError'] = $insertError;
                // header("location: reservation_schedule.php?month=$month&day=$day");

            }
        }
        else{
            $_SESSION['reservationError'] = $reserveError;
            header("location: reservation_schedule.php?month=$month&day=$day");
        }        


        
    }

?>