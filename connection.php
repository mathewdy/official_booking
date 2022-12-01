<?php

$conn = new mysqli('localhost', 'u805558110_melendez' , 'melendezDJ!@#123' , 'u805558110_mathew');

if($conn == false) {
    echo "error" . $conn->error;
}


?>