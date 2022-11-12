<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/styles/bs-5/bootstrap/dist/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <th>Guest ID</th>
            <th>Name</th>
            <th>Email</th>
        </thead>
        <tbody>
            <tr>
                <td><?= $rows['user_id']?></td>
                <td><?= $rows['first_name'] . ' '. $rows['middle_name'] . ' ' . $rows['last_name'] ?></td>
                <td><?= $rows['email']?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>