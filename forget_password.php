<?php 
session_start();
include_once "dbconnect.php"; //connects to the database
if (isset($_POST['regemail'])){
  $regemail = $_POST['regemail'];
  $query="SELECT * FROM `user` WHERE UserEmail='$regemail'";
  $result   = mysql_select_db(DBNAME) or die(mysql_error());
  // $count = mysql_num_rows($result);
  // If the count is equal to one, we will send message other wise display an error message.
  if($count==1)
  {
    $rows=mysql_fetch_array($result);
    $pass  =  $rows['userPass'];//FETCHING PASS
    //echo "your pass is ::".($pass)."";
    $to = $rows['userEmail'];
    //echo "your email is ::".$email;
    //Details for sending E-mail
    $from = "Friendzone";
    $url = "localhost/friendzone";
    $body  =  "friendzone password recovery Script
    -----------------------------------------------
    Url : $url;
    email Details is : $to;
    Here is your password  : $pass;
    Sincerely,
    Coding Cyber";
    $from = "osaighesolomon@gmail.com";
    $subject = "FRiendzone Password recovered";
    $headers1 = "From: $from\n";
    $headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
    $headers1 .= "X-Priority: 1\r\n";
    $headers1 .= "X-MSMail-Priority: High\r\n";
    $headers1 .= "X-Mailer: Just My Server\r\n";
    $sentmail = mail ( $to, $subject, $body, $headers1 );
  } else {
  if ($_POST ['regemail'] != "") {
      $fmsg = "Not found your email in our database";
    }
    }
  //If the message is sent successfully, display sucess message otherwise display an error message.
  if($sentmail==1)
  {
    $smsg = "Your Password Has Been Sent To Your Email Address.";
  }
    else
    {
    if($_POST['regemail']!="")
    $nmsg = "Cannot send password to your e-mail address.Problem with sending mail...";
  }
}
?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Friendzone | Forget Password</title>
    <!-- code for favicon -->
    <link rel="shortcut icon" href="images/friendzone.png" type="image/x-icon" />

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/solomonproject.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   <!--  <style type="text/css">
      body {
        background: url(images/bodyimg1.jpg) transparent repeat fixed;
      }
    </style> -->
  </head>
  <body>
    <div>
      <div>
        <div class="col-sm-6 col-md-4 col-md-offset-4">
          <!-- FORGOT PASSWORD FORM -->
          <div class="text-center" style="padding:50px 0">
            <div class="account-wall">
              <img src="images/forgot-password.png" class="thumbnail-login" alt="forgot password">
              <div class="breadcrumb">Forgot Password</div>
              <!-- Main Form -->
              <div class="login-form-1">
                <form id="forgot-password-form" class="text-left" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                  <div class="etc-login-form">
                    <p>When you fill in your registered email address, you will be sent instructions on how to reset your password.</p>
                  </div>
                  <div class="login-form-main-message"></div>
                  <div class="main-login-form">
                    <div class="login-group">
                      <div class="form-group">
                        <label for="fp_email" class="sr-only">Email address</label>
                        <input type="text" class="form-control" id="fp_email" name="regemail" placeholder="email address" required>
                      </div>
                    </div>
                    <button type="submit"class="btn btn btn-primary login-button"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <div class="etc-login-form">
                    <p>already have an account? <a href="login.php">login here</a></p>
                    <p>new user? <a href="register.php">create new account</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- end of forgot password form -->
          <footer class="nabar-fixed-bottom">
            <div class="foot-text text-center footer">
              Copyright &copy;2016 Designed by Solomon's labs.
            </div>
          </footer>
        </div>
      </div>
    </div>
    <script src="js/loginandsignup.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>