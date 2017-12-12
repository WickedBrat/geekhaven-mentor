<?php 

$userid = $_SESSION['userid'];
$useremail = $_SESSION['useremail'];
$usenam = $_SESSION['username'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (strpos($useremail) == '2016' || strpos($useremail) == '2015') {
    echo "<h1><center>No! You should not attempt to do this! I know you're a mentor. Go away!</center></h1>";
} 
else {
        $maile=$_POST['optradio'];
        $connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net", "b061db06849ed7", "e5239436", "heroku_fbd4d972ab0bf1a");

        $ret = mysqli_query($connect, "SELECT * FROM `google_users_mentors` WHERE `max_count`>=0 ");
        $retu = mysqli_query($connect, "SELECT * FROM `google_users`");

        include("headerm.php");


        require 'vendor/autoload.php';
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions    

        if (isset($_POST['submit'])) {
            if(isset($_POST['optradio']))
            {
                
                $d = $connect->query("SELECT max_count FROM `google_users_mentors` WHERE google_email='$maile'");
                $maxc = mysqli_fetch_array($d);
                $maxc['max_count'] = $maxc['max_count'] - 1;
                $max = $maxc['max_count'];
                try {
                    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'geekhaven@iiita.ac.in';                 // SMTP username
                    //$mail->Password = 'fofknwkqhdquubrm'; 
                    $mail->Password = 'g33kh@ven';                           // SMTP password
                    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465;                                    // TCP port to connect to
            
                    //Recipients
                    $mail->setFrom('geekhaven@iiita.ac.in', 'GeekHaven, IIITA');
                    $mail->addAddress($maile, 'Mentor');     // Add a recipient
            
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Mentee Allotted';
                    $mail->Body    = 'Greetings! Alloted mentee to you. His email is '.$useremail.' and his name is'.$usenam;
            
                    $mail->send();
                // echo "mail sent";
                } catch (Exception $e) {
                    echo "There is some error!<br>";
                }
                echo "You have selected: ".$_POST['optradio'].". He has been sent a mail but Go ahead contact him!<br>";
                $connect->query("UPDATE google_users_mentors SET max_count=$max WHERE google_email='$maile'");
                $connect->query("UPDATE google_users SET selected=1 WHERE google_id=$userid");
            }
        }

        $a = $connect->query("SELECT * FROM google_users WHERE google_id=$userid");
        $c = mysqli_fetch_array($a);

            if ($c['selected'] == 0) {
                while ($data = mysqli_fetch_array($ret)) {
                    
                    echo "<label class='radio-inline'>";
                    echo "<input type='radio' name='optradio' value='".$data['google_email']."'>".$data['google_name'];
                    echo "</label>";
                }
                
            echo "<button type='submit' name='submit' class='btn btn-default'>Submit</button>";
                echo "</form>";
            
            } else {
                echo "You've selected your mentor! Contact him!";
            }
            
        include("footerm.php");
    }



?>