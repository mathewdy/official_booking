<?php
include('../connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>hello world</h1>
<div id="paypal-button-container"></div>
    

<script src="https://www.paypal.com/sdk/js?client-id=AQXfZKGVELgJp5xNfCfDZAWZLrd_Ikf79I2M9Nt9Iqw5oTX7xyVnOBGp6oHsZbLQxFx2BymiPmWnAkvU"></script>
<script>
      paypal.Buttons().render('#paypal-button-container');
    </script>
</body>
</html>