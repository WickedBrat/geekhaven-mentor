<?php




$connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net", "b061db06849ed7", "e5239436", "heroku_fbd4d972ab0bf1a");

$ret = mysqli_query($connect, "SELECT * FROM `google_users_mentors`");

while ($data = mysqli_fetch_array($ret)) {
 
    echo $data['google_name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data['max_count'].'<br>';
}

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


?>