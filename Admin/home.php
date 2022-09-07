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
    <title>Document</title>
</head>
<body class="bg-slate-500">
    <a href="admin_logout.php">Logout</a>
    <h2 class="text-2xl text-center"><?php echo $_SESSION['admin']?></h2>

    <table class="table-auto border border-1 mx-auto w-2/3 my-24 ">
        <thead class="bg-gray-300 shadw-md">
            <tr>
                <th class="border border-1">Song</th>
                <th class="border border-1">Artist</th>
                <th class="border border-1">Year</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
            <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
            <td>Malcolm Lockyer</td>
            <td>1961</td>
            </tr>
            <tr>
            <td>Witchy Woman</td>
            <td>The Eagles</td>
            <td>1972</td>
            </tr>
            <tr>
            <td>Shining Star</td>
            <td>Earth, Wind, and Fire</td>
            <td>1975</td>
            </tr>
        </tbody>
    </table>
    
</body>
</html>