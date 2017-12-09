<?php




$connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net", "b061db06849ed7", "e5239436", "heroku_fbd4d972ab0bf1a");

$ret = mysqli_query($connect, "SELECT * FROM `google_users_mentors`");

while ($data = mysqli_fetch_array($ret)) {
 
    echo $data['google_name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data['max_count'].'<br>';
}
/*

//Load composer's autoloader
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                                // Enable SMTP authentication
//$mail->Username = 'postmaster@mentor-portal.herokuapp.com';   // SMTP username
//$mail->Password = '18a547fe72108889db8bbd4548839ba5';                           // SMTP password
$mail->Username = 'harshsrivastav123@gmail.com';
$mail->Password = 'yesyouarethebest';
$mail->SMTPSecure = 'sll';                            // Enable encryption, only 'tls' is accepted
$mail->Port       = 465;  
$mail->From = 'postmaster@mentor-portal.herokuapp.com';
$mail->FromName = 'Mailer';
$mail->addAddress('iec2016076@iiita.ac.in');                 // Add a recipient

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

$mail->Subject = 'Hello';
$mail->Body    = 'Testing some mail awesomness';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
*/

require 'autoload.php';
use Mailgun\Mailgun;

$mgClient = new Mailgun('key-f10958c006491d77a5a2cac4088c9cdd');
$domain = "sandboxb083e1bab15b43d0bb728852ca071822.mailgun.org";

$result = $mgClient->sendMessage($domain, array(
    'from'    => 'Excited User mailgun@sandboxb083e1bab15b43d0bb728852ca071822.mailgun.org',
    'to'      => 'Baz harshsrivastav123@gmail.com@gmail.com',
    'subject' => 'Hello',
    'text'    => 'Testing some Mailgun awesomness!'
));
/*
SMTP Hostname
smtp.mailgun.org
Default SMTP Login
postmaster@sandboxb083e1bab15b43d0bb728852ca071822.mailgun.org
API Base URL
https://api.mailgun.net/v3/sandboxb083e1bab15b43d0bb728852ca071822.mailgun.org
*/
?>