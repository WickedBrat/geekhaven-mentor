<?php

    session_start();
    $userid=$_SESSION['userid'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $maxcount = $_POST['maxcount'];

    $connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net", "b061db06849ed7", "e5239436", "heroku_fbd4d972ab0bf1a");

    $ret = mysqli_query($connect, "UPDATE `google_users_mentors` SET `max_count`=$maxcount WHERE google_id=$userid");

    include("header.php");
    if ($ret) {
        echo "<center>Congratulations! mentee count updated</center>";
        
    } else {
        echo "<center>Oops! Try again</center>";
    }
    include("mfooter.php");
    
?>
