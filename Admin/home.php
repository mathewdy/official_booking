<?php
session_start();

if(isset($_SESSION['admin'])){
    header("localhost:index.php?action=login");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../output.css">
    <title>Home</title>
</head>
<body class="bg-slate-500">
    <a href="admin_logout.php">Logout</a>
    <h2 class="text-2xl text-center"><?php echo $_SESSION['admin']?></h2>
    <a href="promos.php">Promo</a>
    <table class="table-auto border border-1 mx-auto w-2/3 my-24 ">
        <thead class="bg-gray-300 shadw-md">
            <tr>
                <th class="border border-1">Song</th>
                <th class="border border-1">Artist</th>
                <th class="border border-1">Year</th>
            </tr>
        </thead>
     
    
</body>
</html>