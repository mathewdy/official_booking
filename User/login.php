<?php
include('../connection.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="POST">
        <label for="">Email</label>
        <input type="email" name="email">
        <label for="">Password</label>
        <input type="password" name="password">
        <input type ="submit" name="submit" value="Login" >
    </form>

    
<?php
if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT email, password FROM users WHERE email = '$email'";
    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){ 
                $_SESSION['email'] = $email;
                header("location: index.php");
                 die();

            } 
            else{
                echo '<script>alert("Incorrect credentials")</script>' ; 
            }


}

}




}




?>


</body>
</html>