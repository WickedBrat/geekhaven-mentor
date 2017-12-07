<?php

$userid = $_SESSION['userid'];

$connect = mysqli_connect("127.0.0.1", "root", "", "id3910036_mentors");

$ret = mysqli_query($connect, "SELECT * FROM `google_users_mentors`");

$retu = mysqli_query($connect, "SELECT * FROM `google_users`");

include("headerm.php");


if (isset($_POST['submit'])) {
    if(isset($_POST['optradio']))
    {
        $mail=$_POST['optradio'];
        $d = $connect->query("SELECT max_count FROM `google_users_mentors` WHERE google_email='$mail'");
        $maxc = mysqli_fetch_array($d);
        $maxc['max_count'] = $maxc['max_count'] - 1;
        $max = $maxc['max_count'];
        echo "You have selected: ".$_POST['optradio'].". He has been sent a mail but Go ahead contact him!<br>";
        $connect->query("UPDATE google_users_mentors SET max_count=$max WHERE google_email='$mail'");
        $connect->query("UPDATE google_users SET selected=1 WHERE google_id=$userid");
    }
}
$a = $connect->query("SELECT * FROM google_users WHERE google_id=$userid");
$c = mysqli_fetch_array($a);


    if ($c['selected'] == 0) {
        while ($data = mysqli_fetch_array($ret)) {
            
            echo "<label class='radio-inline'>";
            echo "<input type='radio' name='optradio' value='".$data['google_email']."'>".$data['google_name'];
            echo "</label>";
        }
        
        echo "<button type='submit' name='submit' class='btn btn-default'>Submit</button>";
        echo "</form>";
    
    } else {
        echo "You've selected your mentor! Contact him!";
    }
    



include("footerm.php");


?>