<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin</title>
</head>
<br>
<br>
<body style="background: #222831;"> 
    <div class="container">

        <form action="" method="POST">
            <div class="row">
                
                <div class="row col-6">
                    
                    <div class="col">
                        <h2>
                            <div class="col-lg-6" style="color:white;">Let's go and book today!</div>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row col-6">
                <div class="col">
                    <input type="text" name="admin" class="form-control" placeholder="Username">
                </div>
        
            </div>

            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="login" value="login">
        </form>
       

    </div>

  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php
    session_start();
    include('../connection.php');

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
                echo "error".$Sql."<br>".$conn->error;

            }

        }


    }
?>