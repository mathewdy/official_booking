<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Admin</title>
</head>
<body class="bg-gray-500">
    <div class="container mx-auto p-2">
        <div class="max-w-sm  my-24 mx-auto bg-white px-5 py-10 rounded shadow-xl">
            <div class="text-center mb-8">
                <h1 class="font-bold text-2xl">Login</h1>
            
            </div>
            <form action="#" method="POST">
                <div class="mt-5">
                    <label class="text-lg">Admin Username</label>
                    <input type="text" name="admin" class="block w-full p-2 border rounded border-gray-500" >

                </div>

                <div class="mt-5">
                    <label class="text-lg">Password</label>
                    <input type="password" name="password" class="block w-full p-2 border rounded border-gray-500">

                </div>

                <div class="mt-10">
                    <input type="submit" name="login" value="login" class="py-3 bg-green-500 text-white w-full">
                </div>
            </form>
        </div>
    </div>

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
            $login = "SELECT * FROM admin WHERE admin = '$admin'";

            $Sql = mysqli_query($conn, $login);

            if($Sql->num_rows > 0)
            {
                $row = mysqli_fetch_assoc($Sql);
                $_SESSION['admin'] = $row['admin'];

                if(!password_verify($password, $row['password'])){
                    echo "incorrect password";
                }
                else{
                    header('location:home.php');
                }
            }

        }


    }
    ?>
</body>
</html>