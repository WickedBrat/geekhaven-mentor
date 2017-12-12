<?php/*
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
}*/
?>
<?php 
  /*session_start();
  if (isset($_SESSION['access_token'])) {  */
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mentors- Geekhaven</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
        <!-- Custom fonts for this template -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    
        <!-- Custom styles for this template -->
        <link href="css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="mentor.php">GeekHaven Mentor Registration</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="mentor.php">Home</a>
            </li>
            <li class="nav-item">
              <?php $redirect_uri="https://mentor-portal.herokuapp.com"; echo "<a class='nav-link' href='".$redirect_uri."?logout'>Log Out</a>" ?>
            </li>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/about-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Geekhaven Mentor</h1>
              <span class="subheading">Portal is closed and will open soon for mentees.</span>
            </div>
          </div>
        </div>
      </div>
    </header>

<?php 
/*
   $connect = mysqli_connect("us-cdbr-iron-east-05.cleardb.net", "b061db06849ed7", "e5239436", "heroku_fbd4d972ab0bf1a");

  $ret = mysqli_query($connect, "SELECT * FROM `google_users_mentors` WHERE google_id=$user->id");

  $data = mysqli_fetch_array($ret);
  echo "<center>Your current mentee count is ".$data['max_count'].".</center>";
*/
?>

<!--


<div class="container">
        <form class="form-horizontal" action="addmentor.php" method="POST">
          <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php //echo "$user->name" ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php //echo "$user->email" ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="number">Number of mentees:</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="number" placeholder="Enter password" min="3" name="maxcount" max="6">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Submit</button>
            </div>
          </div>
        </form> 
    </div>
-->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">

              <li class="list-inline-item">
                <a href="https://www.facebook.com/geekhaveniiita/">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://github.com/GeekHaven">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; GeekHaven 2017</p>
            <p class="copyright text-muted">For queries contact <a href="https://www.fb.com/siddhant.srivastav.3">Siddhant Srivastav</a></p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
<?php/*
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
    }*/
?>