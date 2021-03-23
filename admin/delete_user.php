<?php
    include '../connection.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql_del = "DELETE FROM user 
                        WHERE user_id = '$id' ";

        $result = mysqli_query($conn,$sql_del);
    
        if($result){
             header("location: manage_users.php");
         }
         else{
             echo "Error while deleting this account.";
         }
    }

?>