<?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';

 $title = "Login | friendzone";
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])) {
  header("location: home.php");
 }
 
 $error = false;
 
 if( isset($_POST['login']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $regusername = trim($_POST['regusername']);
  $regusername = strip_tags($regusername);
  $regusername = htmlspecialchars($regusername);
  
  $regpass = trim($_POST['regpass']);
  $regpass = strip_tags($regpass);
  $regpass = htmlspecialchars($regpass);
  // prevent sql injections / clear user invalid inputs
  function db_query($query){ 
    $connection = db_connect();
    $result = mysqli_query($connection,$query);

  if(empty($regusername)){
   $error = true;
   $regusernameError = "Please enter your username.";
  }
  
  if(empty($regpass)){
   $error = true;
   $regpassError = "Please enter your password.";
  }  
  return $result;
}
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $regpass); // password hashing using SHA256
  
   $result = db_query("SELECT userUsername, userPass FROM users WHERE userUsername='$regusername' AND userPass='$password'"); 
   // if uname/pass correct it returns must be 1 row
   
   if( $result == 1 ) {
    $row=mysqli_fetch_array($result);
    $_SESSION['user'] = $row['userUsername'];
    // if ($row->admin == 1) {
    //   header('string');
    // } else {
      header("location: home.php");
    // }
    // echo "login";
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
    // echo $errMSG;
   }
    
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
    <title><?php echo $title ?></title>
    <!-- code for favicon -->
    <link rel="shortcut icon" href="images/friendzone.png" type="image/x-icon" />

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/solomonproject.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- <style type="text/css">
      body {
        background: url(images/bodyimg1.jpg) transparent repeat fixed;
      }
    </style> -->
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
          <div class="text-center" style="padding:50px 0">
            <div class="account-wall">
              <img src="images/loginthumbnail.png" class="thumbnail-login" alt="login">
              <div class="breadcrumb">Login To Friendzone</div>
             <!-- Main Form -->
             <div class="btn-danger"><a href="login.php"><?php  ?></a></div>
              <div class="login-form-1">
                <form id="login-form" class="text-left" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform" >
                  <div class="login-form-main-message"></div>
                  <div class="main-login-form">
                    <div class="login-group">
                      <div class="form-group">
                        <label for="lg_username" class="sr-only">Username</label>
                        <input type="text" class="form-control" id="lgusername" name="regusername" placeholder="username" required>
                      </div>
                      <div class="form-group">
                        <label for="lg_password" class="sr-only">Password</label>
                        <input type="password" class="form-control" id="lgpassword" name="regpass" placeholder="password" required>
                      </div>
                      <div class="form-group login-group-checkbox">
                        <input type="checkbox" id="lgremember" name="lgremember">
                        <label for="lgremember">Remember</label>
                      </div>
                    </div>
                    <button type="submit" name="login" value="login" class="btn btn btn-primary login-button"><i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
                <div class="etc-login-form">
                  <p>forgot your password? <a href="forget_password.php">click here</a></p>
                  <p>new user? <a href="register.php">create new account</a></p>
                </div>
              </div>
            </div>
          </div>
          <footer class="nabar-fixed-bottom">
            <div class="foot-text text-center footer">
              Copyright &copy;2016 Designed by Solomon's labs.
            </div>
          </footer>
        </div>
      </div>
  <!-- end:Main Form -->
    </div>
    <script src="js/loginandsignup.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>