<?php

    session_start();
    $userid=$_SESSION['userid'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $maxcount = $_POST['maxcount'];

    $connect = mysqli_connect("127.0.0.1", "b061db06849ed7", "e5239436", " heroku_fbd4d972ab0bf1a");

    $ret = mysqli_query($connect, "UPDATE `google_users_mentors` SET `max_count`=$maxcount WHERE google_id=$userid");

    include("header.php");
    if ($ret) {
        echo "<center>Congratulations! Mentoree count updated</center>";
        
    } else {
        echo "<center>Oops! Try again</center>";
    }
    include("mfooter.php");
    
?>
