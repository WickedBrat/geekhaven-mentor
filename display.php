<?php

$connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net", "b061db06849ed7", "e5239436", "heroku_fbd4d972ab0bf1a");

$ret = mysqli_query($connect, "SELECT * FROM `google_users_mentors`");

while ($data = mysqli_fetch_array($ret)) {
 
    echo $data['google_name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data['max_count'].'<br>';
}

$connect->query("UPDATE google_users_mentors SET `max_count`=4 WHERE google_name='Pradeep Gangwar'");

echo "<br><br><br><br>";
$ret = mysqli_query($connect, "SELECT * FROM `google_users`");

while ($data = mysqli_fetch_array($ret)) {
 
    echo $data['google_name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data['selected'].'<br>';
}


?>