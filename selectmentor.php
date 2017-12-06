<?php


$connect = mysqli_connect("127.0.0.1", "root", "", "mentors");

$ret = mysqli_query($connect, "SELECT * FROM `mentorreg`");
include("headerm.php");



while ($data = mysqli_fetch_array($ret)) {
    
    echo "<label class='radio-inline'>";
    echo "<input type='radio' name='optradio' value='".$data['email']."'>".$data['mentorName'];
    echo "</label>";
}

echo "<button type='submit' name='submit' class='btn btn-default'>Submit</button>";
echo "</form>";



if (isset($_POST['submit'])) {
    if(isset($_POST['optradio']))
    {
    echo "You have selected :".$_POST['optradio']; 
    }
}
include("footerm.php");


?>