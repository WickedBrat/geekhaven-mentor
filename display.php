<?php




$connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net", "b061db06849ed7", "e5239436", "heroku_fbd4d972ab0bf1a");

$ret = mysqli_query($connect, "SELECT * FROM `google_users_mentors`");

while ($data = mysqli_fetch_array($ret)) {
 
    echo $data['google_name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data['max_count'].'<br>';
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'autoload.php';

$mailgun = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
$mailgun->isSMTP();                                      // Set mailer to use SMTP
$mailgun->Host = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
$mailgun->SMTPAuth = true;                               // Enable SMTP authentication
$mailgun->Username = 'postmaster@mentor-portal.herokuapp.com';   // SMTP username
$mailgun->Password = '18a547fe72108889db8bbd4548839ba5';                           // SMTP password
$mailgun->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted

$mailgun->From = 'harshsrivastav123@gmail.com';
$mailgun->FromName = 'Mailer';
$mailgun->addAddress('iec2016076@iiita.ac.in');                 // Add a recipient

$mailgun->WordWrap = 50;                                 // Set word wrap to 50 characters

$mailgun->Subject = 'Hello';
$mailgun->Body    = 'Testing some Mailgun awesomness';

if(!$mailgun->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mailgun->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}


?>