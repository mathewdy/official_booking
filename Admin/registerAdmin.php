<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Register Admin </title>
</head>
<body class="bg-gray-300">
    <div class="container mx-auto p-2">
        <div class="max-w-sm  my-24 mx-auto bg-white px-5 py-10 rounded shadow-xl">
            <div class="text-center mb-8">
                <h1 class="font-bold text-2xl">Register Admin</h1>
            
            </div>
            <form action="#" method="POST">
                <div class="mt-5">
                    <label class="text-lg">Username</label>
                    <input type="text" name="admin" class="block w-full p-2 border rounded border-gray-500"  >

                </div>

                <div class="mt-5">
                    <label class="text-lg">Password</label>
                    <input type="password" name="password" class="block w-full p-2 border rounded border-gray-500">

                </div>

                <div class="mt-10">
                    <input type="submit" name="register" value="Register" class="py-3 bg-green-500 text-white w-full">
                </div>
            </form>
        </div>
    </div>


    <?php
    include('../connection.php');

    if(isset($_POST['register']))
    {
        // $Date = date_default_timezone_set('Asia/Manila');
        // $Date = date('Y-m-d H:i:s');
        $admin = mysqli_real_escape_string($conn , $_POST['admin']);
        $password = mysqli_real_escape_string($conn , $_POST['password']);
        $hash = password_hash($password, PASSWORD_BCRYPT);

        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/',  $admin) == true)
            {
                echo "Invalid Username";
                exit();
            }
            else{
                $Query = "INSERT INTO `admin` (admin , password ) VALUES ('$admin', '$hash')";

                if($sql = mysqli_query($conn , $Query))
                {
                    echo'<div class="bg-blue-200 text-2xl px-4 py-5"> Record inserted</div>';
                }
                else
                {
                    echo 'not inserted'.$sql."<br>".$conn->error;
                }
            }




    }

    ?>
</body>
</html>