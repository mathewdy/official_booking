<?php
include('../connection.php');
session_start();
$email = $_SESSION['email'];
date_default_timezone_set('Asia/Manila');

if(empty($_SESSION['email'])){
    echo "<script>window.location.href='login.php' </script>";
}


print_r($email);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changepass</title>
</head>
<body>

<form action="change-pass.php" method="POST">

<label for=""> New-Password </label>
<input type="text" name="password">

<label for="">re-type New-Password </label>
<input type="text" name="new-password">

<input type="submit" name="submit" value="Changepass">

</form>
    
</body>
</html>

<?php
if(isset($_POST['submit'])){

    $pass = $_POST['password'];
    $new_pass = $_POST['new-password'];
    $dateUpdated = date("Y-m-d h:i:a");
    $new_password = password_hash($pass,PASSWORD_DEFAULT);

    if($pass == $new_pass){
        //hashing 
        

        $pass_update = "UPDATE `users` SET `password`='$new_password',`date_time_updated`='$dateUpdated' WHERE email = '$email'";
        $run_update = mysqli_query($conn, $pass_update);

        if($run_update){
            session_destroy();
            unset($_SESSION['email']);
            echo "<script>window.location.href='login.php'</script>";
        }

        else{

            $conn->error;
        }

    }

}
?>