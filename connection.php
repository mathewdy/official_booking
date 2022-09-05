<?php

$conn = new mysqli('localhost', 'root' , '' , 'booking_system');

if($conn == false) {
    echo "error" . $conn->error;
}


?>