<?php
    $conn = mysqli_connect("localhost", "root", "", "booking_details");
    if(!$conn){
        echo "Database connection error".mysqli_connect_error();
    }

?>