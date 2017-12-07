<?php


$connect = mysqli_connect("127.0.0.1", "root", "", "mentors");

$ret = mysqli_query($connect, "SELECT * FROM `google_users_mentors`");

$retu = mysqli_query($connect, "SELECT * FROM `google_users`");

include("headerm.php");

echo "<center>Welcome ".$user->name."</center>";

if (isset($_POST['submit'])) {
    if(isset($_POST['optradio']))
    {
        echo "You have selected: ".$_POST['optradio'].". He has been sent a mail but Go ahead contact him!<br>";
        
    }
}


if ($selected == FALSE) {
    while ($data = mysqli_fetch_array($ret)) {
        
        echo "<label class='radio-inline'>";
        echo "<input type='radio' name='optradio' value='".$data['google_email']."'>".$data['google_name'];
        echo "</label>";
    }
    
    echo "<button type='submit' name='submit' class='btn btn-default'>Submit</button>";
    echo "</form>";
    
    
} else {
    echo "You've selected your mentor";
}



include("footerm.php");


?>