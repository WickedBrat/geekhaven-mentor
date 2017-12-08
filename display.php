<?php


  $mysqli = mysqli_connect("us-cdbr-iron-east-05.cleardb.net", "b061db06849ed7", "e5239436", "heroku_fbd4d972ab0bf1a");

  $d = $connect->query("SELECT * FROM `google_users_mentors`");
  while($maxc = mysqli_fetch_array($d)){
    echo $maxc['google_name']."<br>";
  }
    

?>