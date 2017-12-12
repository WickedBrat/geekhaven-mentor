<?php
session_start();
  if (isset($_SESSION['access_token'])) {  
    
    session_start();
    $userid=$_SESSION['userid'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $maxcount = $_POST['maxcount'];

    $connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net", "b061db06849ed7", "e5239436", "heroku_fbd4d972ab0bf1a");

    if ($maxcount>=3 && $maxcount<=6) {
        $ret = mysqli_query($connect, "UPDATE `google_users_mentors` SET `max_count`=$maxcount WHERE google_id=$userid");
        
            include("header.php");
            if ($ret) {
                echo "<center>Portal Closed for now</center>";
                
            } else {
                echo "<center>Oops! Try again</center>";
            }
            include("mfooter.php");
    } else {
        include("header.php");
        echo "<center>Try entering something realistic :p</center>";
        include("mfooter.php");
    }
    

} else {
    include("headerl.php");
    echo '<div align="center">';
    echo '<h3>Login with Gmail to continue</h3>';
    echo '<div>Please click login button to connect to Google.</div>';
    echo '<a class="login" href="' . $authUrl . '"><img src="https://developers.google.com/+/images/branding/sign-in-buttons/Red-signin_Google_base_44dp.png" /></a>';
    echo '</div>';
    include("footerm.php");
  }
?>
