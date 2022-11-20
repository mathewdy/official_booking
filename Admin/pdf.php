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

    





$dompdf = new Dompdf;
ob_start();
require('invoice.php');
$html = ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
// $dompdf->stream('invoice.pdf');

$dompdf->stream("Flights", ['Attachment'=>false]);
?>

