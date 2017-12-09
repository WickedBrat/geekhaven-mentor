<?php




$connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net", "b061db06849ed7", "e5239436", "heroku_fbd4d972ab0bf1a");

$ret = mysqli_query($connect, "SELECT * FROM `google_users_mentors`");

while ($data = mysqli_fetch_array($ret)) {
 
    echo $data['google_name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data['max_count'].'<br>';
}
/*
echo "Now starting to send mail<br><br>";
$to="iec2016076@iiita.ac.in";
$subject="Mentor Portal";
$message="This is test";
$headers = "From: harshsrivastav123@gmail.com \n";
$headers .= "MIME-Version:1.0 \n";
$headers .= "Content-type: text/html; charset=iso-8859-1 \n";

if (mail($to, $subject, $message,$headers)) {
    echo "Succesfully Sent!";
} else {
    echo "Failed";
}
*/
ini_set("SMTP", "smtp.mailgun.org");
ini_set("sendmail_from", "harshsrivastav123@gmail.com");

$message = "The mail message was sent with the following mail setting:\r\nSMTP = smtp.mailgun.org\r\nsmtp_port = 25\r\nsendmail_from = YourMail@address.com";

$headers = "From: harshsrivastav123@gmail.com";


mail("harshsrivastav123@gmail.com", "Testing", $message, $headers);
echo "Check your email now....<br/>";


/*


error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

set_include_path("." . PATH_SEPARATOR . ($UserDir = dirname($_SERVER['DOCUMENT_ROOT'])) . "/pear/php" . PATH_SEPARATOR . get_include_path());
require_once ".heroku/php/lib/php/Mail.php";

$host = "ssl://smtp.gmail.com";
$username = "harshsrivastav@gmail.com";
$password = "yesyouarethebest";
$port = "465";
$to = "iec2016076@iiita.ac.in";
$email_from = "harshsrivastav@gmail.com";
$email_subject = "Subject Line Here: " ;
$email_body = "whatever you like" ;
$email_address = "iec2016076@iiita.ac.in";

$headers = array ('From' => $email_from, 'To' => $to, 'Subject' => $email_subject, 'Reply-To' => $email_address);
$smtp = Mail::factory('smtp', array ('host' => $host, 'port' => $port, 'auth' => true, 'username' => $username, 'password' => $password));
$mail = $smtp->send($to, $headers, $email_body);


if (PEAR::isError($mail)) {
echo("<p>" . $mail->getMessage() . "</p>");
} else {
echo("<p>Message successfully sent!</p>");
}
*/
?>