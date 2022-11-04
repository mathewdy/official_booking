<?php
session_start();



if(isset($_SESSION['user_id'])){
    // $userid = $_SESSION['user_id']; 
    header("localhost:index.php?action=login");
}

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
<form action="#" method="POST" enctype="multipart/form-data">
        <label>Insert Proof Of payment</label>
        
        <label>Email</label>
        <input type="email" name="email">
        <br>
        <input type="file" name="bill">
        <label>Your name</label>
        <input type="text" name="person_name">
        <br>
       
        <input type="submit" name="submit"> 
    </form>
    
</body>
</html>





<?php
include('../connection.php');
    // require 'PHPmailer/PHPMailerAutoload.php';
    // $mail = new PHPMailer;

    // $mail->isSMTP();
    // $mail->Host ='smtp.gmail.com';
    // $mail->SMTPAuth = true;
    // $mail->Port = 587;
    // $mail->SMTPAuth=true;
    // $mail->SMTPSecure='tls';

    // $mail->Username='anthonyyuvega09@gmail.com';
    // $mail->Password='dhwzfnnwtoimheqi';
    // // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   

    // $mail->SetFrom('anthonyyuvega09@gmail.con');
    // $mail->addAddress($email);

    // $mail->isHTML(true);
    // $mail->Subject = "OTP";
    // $mail->Body = "This is a test";

    // $mail->send();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMialer\PHPMailer\Exception;

    require 'PHPmailer/src/Exception.php';
    require 'PHPmailer/src/PHPMailer.php';
    require 'PHPmailer/src/SMTP.php';

    if(isset($_POST['submit']))
    {
        $fileName = $_FILES['bill']['name'];
        $personName = $_POST['person_name'];
        $mail = new PHPMailer;
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'anthonyyuvega09@gmail.com';
        $mail->Password = 'dhwzfnnwtoimheqi';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('anthonyyuvega09@gmail.com', 'Anthony');
        $mail->addAddress($_POST['email']);
        $mail->Subject = 'This is a test';
        $mail->Body = $personName;
        $mail->addStringAttachment($fileName , '../Admin/Proof_Payment');

        $mail->isHTML(true);

        // $mail->Subject = $_FILES['bill']['name'];
        // $mail->Body = $_POST['person_name'];

        $mail->send();

        echo "
        <script>
        alert('Sent Successfully);
        </script>";
    }
?>
<?php
include('../connection.php');

if(isset($_POST['submit']))
{
    $user_id = $_SESSION['user_id'];
    $fileName = $_FILES['bill']['name'];
    $personName = $_POST['person_name'];



    $img_types = array('img/jpg','img/png','img/jpeg');
    $validate_img_extension = in_array($_FILES['bill']['type'],$img_types);


    if($validate_img_extension)
    {
        if(file_exists("Proof_Payment/".$_FILES['bill']['name']))
        {
            $store = $_FILES['bill']['name'];
            echo "Image already exist".$store;

        }
        else
        {
            $sql = "INSERT INTO payments_tbl(user_id , proof_of_payment, person_name) VALUES('$user_id' ,'$fileName' ,'$personName')";
            $query_run = mysqli_query($conn, $sql);
            header("location:promos.php?uploadsuccess");
        }
        if($query_run){
            move_uploaded_file($_FILES['bill']['tmp_name'], "../Admin/Proof_Payment/".$_FILES['bill']['name']);
            echo "<script>alert('Photo Added')</script>";
            header("location: index.php");
        }
        else{
            echo "Error".$sql."<br>".$conn->error;
        }


        
    }

}

?>