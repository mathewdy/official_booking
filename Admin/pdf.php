<?php

include('../connection.php');

require_once 'vendor/autoload.php';
use Dompdf\Dompdf;



// $run = mysqli_query($conn, $sql);
// $rows

$id = $_GET['id_invoice'];
$sql = "SELECT * FROM users WHERE user_id = '$id'";
$query = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($query);







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
ob_start();
require('invoice.php');
$html = ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
// $dompdf->stream('invoice.pdf');

$dompdf->stream("Placido del monte", ['Attachment'=>false]);
?>

