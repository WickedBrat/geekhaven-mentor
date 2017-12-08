<?php




$connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net", "b061db06849ed7", "e5239436", "heroku_fbd4d972ab0bf1a");

$ret = mysqli_query($connect, "SELECT * FROM `google_users_mentors`");

var_dump(mysqli_fetch_array($ret));

echo "<br><br><br><br><br>";
while ($data = mysqli_fetch_array($ret)) {
    
    echo "<label class='radio-inline'>";
    echo "<input type='radio' name='optradio' value='".$data['google_email']."'>".$data['google_name'];
    echo "</label>";
}

?>