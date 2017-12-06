<?php

    $_POST('');
    $_POST('');


    $connect = mysqli_connect("localhost", "root", "", "mentor");


    mysqli_query($connect, "INSERT INTO `mentors_data`(`id`, `mentorName`, `maxCount`, `mentoree1`, `mentoree2`, `mentoree3`) VALUES ('','','','','','')")

?>
