<?php
include('../connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/styles/bs-5/bootstrap/dist/css/bootstrap.css">
    <title>Login</title>
</head>
<body class="bg-dark-accent">
<div class="container pt-0">
        <div class="row vh-100 d-flex flex-row justify-content-between align-items-center">
            <div class="col-lg-6">
                <h1 class="display-1 text-whitesmoke">Let's go and book Today!</h1>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="card bg-bright-dark-accent" style="border: 1px solid #393E46; width: 30rem;">
                    <div class="card-body bg-bright-dark-accent" style="border:none;">
                        <form action="login.php" method="POST">
                            <div class="row p-4 gy-4">
                                <div class="col-lg-12">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-info-dark py-2 text-white w-100" name="submit" value="Login">
                                </div>
                                <div class="col-lg-12 gy-5 text-center">
                                    <a href="forgot-pass.php" class="h6 link text-whitesmoke w-100">Forgot Password?</a>
                                    <a href="registration.php" class="btn btn-pink text-white w-100 py-2 mt-2">Create New Account</a>
                                </div>
                                <div class="col-lg-12">
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<?php
if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT email, password, user_id , contact_number FROM users WHERE email = '$email'";
    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){ 
                //fetch mo muna yung user id, para ma sessidon papunta sa kabila 
                 $_SESSION['email'] = $email;
                 $_SESSION['user_id'] = $row['user_id'];
                 $_SESSION['contact_number'] = $row['contact_number'];
                 
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