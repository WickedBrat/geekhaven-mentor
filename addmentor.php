<?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $maxcount = $_POST['maxcount'];

    $connect = mysqli_connect("127.0.0.1", "root", "", "mentors");

    $ret = mysqli_query($connect, "INSERT INTO `mentorreg`(`id`, `mentorName`, `email`, `maxCount`) VALUES ('','$name','$email',$maxcount)");

    include("header.php");
    if ($ret) {
        echo "<center>Congratulations mentor added</center>";
    } else {
        echo "<center>Oops! Try again</center>";
    }
    include("mfooter.php");
    
?>
