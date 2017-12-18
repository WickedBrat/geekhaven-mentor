<?php 

$userid = $_SESSION['userid'];
$useremail = $_SESSION['useremail'];
$usenam = $_SESSION['username'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_SESSION['access_token'])) {
    if (strpos($useremail,'2016') == true || strpos($useremail,'2015') == true) {
        echo "<h1><center>No! You should not attempt to do this! I know you're a mentor. Go away!</center></h1>";
    } 
    else {
            $maile=$_POST['optradio'];
            $connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net", "b061db06849ed7", "e5239436", "heroku_fbd4d972ab0bf1a");
    
            $ret = mysqli_query($connect, "SELECT * FROM `google_users_mentors` WHERE `max_count`>0 ");
            $retu = mysqli_query($connect, "SELECT * FROM `google_users`");
    
            $k = $connect->query("SELECT full FROM `google_users_mentors` WHERE google_email='$maile'");
            $po = mysqli_fetch_array($k);
            $f = $po['full'];


            include("headerm.php");
    
    
            require 'vendor/autoload.php';
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions    
    
            if (isset($_POST['submit'])) {
                if ($f == 0) {
                    
                if(isset($_POST['optradio']))
                {
                    $connect->query("UPDATE `google_users` SET mentor_name='$maile' WHERE google_id=$userid ");
                    $d = $connect->query("SELECT max_count FROM `google_users_mentors` WHERE google_email='$maile'");
                    $maxc = mysqli_fetch_array($d);
                    $maxc['max_count'] = $maxc['max_count'] - 1;
                    $max = $maxc['max_count'];
                    if ($max) {
                        $connect->query("UPDATE `google_users_mentors` SET full=1 WHERE google_email=$maile ");
                    }                     
                    try {
                        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = 'geekhaven@iiita.ac.in';                 // SMTP username
                        //$mail->Password = 'fofknwkqhdquubrm'; 
                        $mail->Password = '';                           // SMTP password
                        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 465;                                    // TCP port to connect to
                
                        //Recipients
                        $mail->setFrom('geekhaven@iiita.ac.in', 'GeekHaven, IIITA');
                        $mail->addAddress($maile, 'Mentor');     // Add a recipient
                
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Mentee Allotted';
                        $mail->Body    = 'Greetings! Alloted mentee to you. His/Her email is '.$useremail.' and his name is '.$usenam;
                
                        $mail->send();
                    // echo "mail sent";
                    } catch (Exception $e) {
                        echo "<center>There is some error!<br></center>";
                    }
                    echo "<center>You have selected: ".$_POST['optradio'].". He has been sent a mail but Go ahead contact him!</center><br>";
                    $connect->query("UPDATE google_users_mentors SET max_count=$max WHERE google_email='$maile'");
                    $connect->query("UPDATE google_users SET selected=1 WHERE google_id=$userid");
                }
                } else {
                    echo "Unfortunately the mentor was selected by someone else";
                }
                
            }
    
            $a = $connect->query("SELECT * FROM google_users WHERE google_id=$userid");
            $c = mysqli_fetch_array($a);
    
                if ($c['selected'] == 0) {
                        echo "<div class='container'>";
                        echo "<center>I've had my fun. Here is the list. Huryy up!</center>";
                        //echo "<center><div class='col-lg-5 col-md-5 col-sm-5 text-center'><form><input type='text' name='answer' placeholder='Enter the answer.'><button class='btn btn-primary' onclick='check(this.form)'>Submit</button></form></div></center>";
                        //echo "<center>Remember use no spaces or capital letters if you want to go further. And be fast to stop the page!</center></div>";
                        echo "<div class='container' id='p2'>";
                        echo "<form action='' method='POST' class='form'>";
                    while ($data = mysqli_fetch_array($ret)) {

                        echo "<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>";
                        echo "<label class='radio-inline'>";
                        echo "<input type='radio' name='optradio' value='".$data['google_email']."'>".$data['google_name'];
                        echo "</label>";
                        echo "</div>";
                    }
                    
                echo "<button type='submit' name='submit' class='btn btn-default'>Submit</button>";
                    echo "</form>";
                
                } else {
                    echo "<center>You've selected your mentor! Contact him!</center>";
                }
                
            include("footerm.php");
        }
    
} else {
    session_start();
    $authUrl=$_SESSION['authURL'];
    include("headerl.php");
    echo '<div align="center">';
    echo '<h3>Login with Gmail to continue</h3>';
    echo '<div>Please click login button to connect to Google.</div>';
    echo '<a class="login" href="' . $authUrl . '"><img src="https://developers.google.com/+/images/branding/sign-in-buttons/Red-signin_Google_base_44dp.png" /></a>';
    echo '</div>';
    include("footerm.php");
}

?>
