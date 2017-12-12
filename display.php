<?php

$connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net", "b061db06849ed7", "e5239436", "heroku_fbd4d972ab0bf1a");

$ret = mysqli_query($connect, "SELECT * FROM `google_users_mentors`");


?>

<table>
    <thead>
        <tr>
            <td>Mentor Name</td>
            <td>Mentee Count</td>
            <td>Mentor Email</td>
        </tr>
        <?php
            while ($data = mysqli_fetch_array($ret)) {   
                echo "<tr>";
                    echo "<td>".$data['google_name']."</td>";
                    echo "<td>".$data['max_count']."</td>";
                    echo "<td>".$data['google_email']."</td>";
                echo "</tr>";
                //echo $data['google_name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data['max_count'].'<br>';
            }
        ?>
    </thead>
</table>

 <?php

$connect->query("UPDATE `google_users` SET selected=0 WHERE google_name='Siddhant Srivastav' ");/*
$connect->query("UPDATE `google_users_mentors` SET max_count=5 WHERE google_name='Siddhant Srivastav' ");
$connect->query("ALTER TABLE `google_users` DROP COLUMN mentor_name");
$connect->query("ALTER TABLE `google_users` ADD COLUMN mentor_name varchar(60)");
$connect->query("INSERT INTO `google_users_mentors`(`google_id`, `google_name`, `google_email`) VALUES (106512,'Affan Ahmad Fahmi','IIT2015002@iiita.ac.in')");
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
$ret = mysqli_query($connect, "SELECT * FROM `google_users`");

?>
<table>
<thead>
    <tr>
        <td>Mentee Name</td>
        <td>Selected or Not </td>
        <td>Mentor Email</td>
    </tr>
    <?php
        while ($data = mysqli_fetch_array($ret)) {   
            echo "<tr>";
                echo "<td>".$data['google_name']."</td>";
                echo "<td>".$data['selected']."</td>";
                echo "<td>".$data['mentor_name']."</td>";
            echo "</tr>";
            //echo $data['google_name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data['max_count'].'<br>';
        }
    ?>
</thead>
</table>

<?php
$result = $mysqli->query("SELECT COUNT(mentor_name) as usercount FROM google_users WHERE mentor_name!=NULL");
$user_count = $result->fetch_all()->usercount;

echo $user_count;
?>