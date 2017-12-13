<?php

$connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net", "b061db06849ed7", "e5239436", "heroku_fbd4d972ab0bf1a");

$ret = mysqli_query($connect, "SELECT * FROM `google_users_mentors`");


?>
 <?php
/*
$connect->query("UPDATE `google_users` SET selected=0 WHERE google_name='Ayush Agrawal' ");
$connect->query("UPDATE `google_users` SET selected=0 WHERE google_name='Nayan Agarwal' ");
$connect->query("UPDATE `google_users_mentors` SET max_count=2 WHERE google_name='Siddhant Srivastav' ");
$connect->query("ALTER TABLE `google_users` DROP COLUMN mentor_name");
$connect->query("ALTER TABLE `google_users_mentors` ADD COLUMN full int(11) DEFAULT 0");
$connect->query("INSERT INTO `google_users_mentors`(`google_id`, `google_name`, `google_email`) VALUES (106872,'Jayanth Noonety','iec2016054@iiita.ac.in')");/*
$connect->query("INSERT INTO `google_users_mentors`(`google_id`, `google_name`, `google_email`) VALUES (106513,'Satyarth Agrahari','IEC2015018@iiita.ac.in')");
$connect->query("INSERT INTO `google_users_mentors`(`google_id`, `google_name`, `google_email`) VALUES (106514,'Saurabh Mishra','iit2015508@iiita.ac.in')");
$connect->query("INSERT INTO `google_users_mentors`(`google_id`, `google_name`, `google_email`) VALUES (106515,'Aseem Shrey','rit2015044@iiita.ac.in')");
$connect->query("INSERT INTO `google_users_mentors`(`google_id`, `google_name`, `google_email`) VALUES (106516,'Souvik Sen','iit2015505@iiita.ac.in')");
$connect->query("INSERT INTO `google_users_mentors`(`google_id`, `google_name`, `google_email`) VALUES (106517,'Somendra Agrawal','iec2015026@iiita.ac.in')");
$connect->query("INSERT INTO `google_users_mentors`(`google_id`, `google_name`, `google_email`) VALUES (106518,'Rajeev Dixit','iec2015013@iiita.ac.in')");
$connect->query("INSERT INTO `google_users_mentors`(`google_id`, `google_name`, `google_email`) VALUES (106519,'Rishabh Rai','iit2015047@iiita.ac.in')");
$connect->query("INSERT INTO `google_users_mentors`(`google_id`, `google_name`, `google_email`) VALUES (106520,'Abhishek Sharma','ihm2015005@iiita.ac.in')");
$connect->query("INSERT INTO `google_users_mentors`(`google_id`, `google_name`, `google_email`) VALUES (106521,'Ashutosh Chandra','irm2015001@iiita.ac.in')");
$connect->query("INSERT INTO `google_users_mentors`(`google_id`, `google_name`, `google_email`) VALUES (106522,'Praveen Pourush','iit2015027@iiita.ac.in')");
*/
echo "<br><br><br><br>";
$ret = mysqli_query($connect, "SELECT * FROM `google_users` where selected=1");

?>
<table>
<thead>
    <tr>
        <td>Mentee Name</td>
        <td>Mentor Email</td>
    </tr>
    <?php
        while ($data = mysqli_fetch_array($ret)) {   
            echo "<tr>";
                echo "<td>".$data['google_name']."</td>";
                $uo=$data['mentor_name'];
                $pooo = mysqli_query($connect, "SELECT * FROM `google_users_mentors` where google_email='$uo'");
                $data2 = mysqli_fetch_array($pooo);
                echo "<td>".$data2['google_name']."</td>";
            echo "</tr>";
            //echo $data['google_name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data['max_count'].'<br>';
        }
    ?>
</thead>
</table>
