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
    <title>Admin</title>
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
                                    <input type="text" class="form-control" name="admin" placeholder="Email" maxlength="25">
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" class="form-control" name="password" placeholder="Password" maxlength="25">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php
   

    if(isset($_POST['login'])){

        if(empty($_POST['admin']) || empty($_POST['password']))
        {
            echo '<script>alert("Both fields are empty")</script>';
        }
        else{
            $admin = mysqli_real_escape_string($conn, $_POST['admin']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $login = "SELECT * FROM admin WHERE admin = '$admin' AND password ='$password'" ;

            $Sql = mysqli_query($conn, $login);

            if($Sql->num_rows > 0)
            {
                $row = mysqli_fetch_assoc($Sql);
                $_SESSION['admin'] = $row['admin'];
                header('location: home.php');
                
            }

            else{
                // header('location:home.php');
                // echo "error" . $Sql ."<br>";
                echo "Error";

            }

        }


    }
?>