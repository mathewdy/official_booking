<?php

include('../connection.php');

require_once 'vendor/autoload.php';
use Dompdf\Dompdf;



// $run = mysqli_query($conn, $sql);
// $rows



for($i=0; $i>=4; $i++){
    $html .= '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
</head>
<body>
    
</body>
</html>
';
}


if(isset($_GET['invoice'])){
    $id = $_GET['id_invoice'];

    $sql = "SELECT g.id, g.guest_id, g.first_name, g.last_name, g.birthday, g.contact_number , g.email g FROM guests as g WHERE g.user_id = '$id'";
    $Run = mysqli_query($conn , $sql);

    while($row=mysqli_fetch_array($Run)){
        

        $html.='
        <body>
        <div>
        <h2>Hello world </h2>
            <h2>'.$row['guest_id'].'</h2>
            <h2>'.$row['first_name'].'</h2>
            <h2>'.$row['middle_name'].'</h2>
            <h2>'.$row['last_name'].'</h2>
            <h2>'.$row['birthday'].'</h2>
            <h2>'.$row['contact_number'].'</h2>
            <h2>'.$row['email'].'</h2>
        </div>
        </body>
        
        
        ';

    }
}






// if(isset($_GET['invoice']))
// {
//     $invoice_id = $_GET['id_invoice'];





//     {
//         $sql = "SELECT * FROM guests";
//         $Run = mysqli_query($conn, $sql);
//         if(mysqli_num_rows($Run) > 0 ) {
//             $rows = mysqli_fetch_array($Run);
//             while(mysqli_fetch_array($Run));



//             $html.='
//                 <h2>'.$rows['last_name'].'</h2>
//             ';
//         }
//     }
// }

    





$dompdf = new Dompdf;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
ob_end_clean();
// $dompdf->stream('invoice.pdf');

$dompdf->stream("Placido del monte", Array("Attachment" =>0));
?>

