<?php
    if(isset($_GET['image'])){
        $image = $_GET['image'];

        echo "<img src='../user img/".$image."'>";
    }

?>