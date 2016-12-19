<?php
 ob_start();
 session_start();
 
 include_once 'dbconnect.php';

// if($_SESSION['user']){
//   header("Location: home.php");
//  }

 $error = false;
 $title = 'Friendzone | Signup';

 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $regusername = trim($_POST['regusername']);
  $regusername = strip_tags($regusername);
  $regusername = htmlspecialchars($regusername);
  
  $regpass = trim($_POST['regpass']);
  $regpass = strip_tags($regpass);
  $regpass = htmlspecialchars($regpass);
  
  $regcpass = trim($_POST['regcpass']);
  $regcpass = strip_tags($regcpass);
  $regcpass = htmlspecialchars($regcpass);
  
  $regemail = trim($_POST['regemail']);
  $regemail = strip_tags($regemail);
  $regemail = htmlspecialchars($regemail);
  
  $regfullname = trim($_POST['regfullname']);
  $regfullname = strip_tags($regfullname);
  $regfullname = htmlspecialchars($regfullname);
  
  $reggender = trim($_POST['reggender']);
  $reggender = strip_tags($reggender);
  $reggender = htmlspecialchars($reggender);
  
  // basic username validation
  if (empty($regusername)) {
   $error = true;
   $regusernameError = "Please enter your username.";
  } else if (strlen($regusername) < 3) {
   $error = true;
   $regusernameError = "userame must have at least 3 characters.";
  }
  
   // password validation
  if (empty($regpass)){
   $error = true;
   $regpassError = "Please enter password.";
  } else if(strlen($regpass) < 6) {
   $error = true;
   $regpassError = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $regpass);
   // echo $password;

  
   // password validation
  if ($regpass != $regcpass){
   $error = true;
   $regcpassError = "Password and Confirm Password doesn't match.";
  }
  // password encrypt using SHA256();
  // $password = hash('sha256', $regcpass);
  
  
  //basic email validation
  function db_query($query){ 
    $connection = db_connect();
    $result = mysqli_query($connection,$query);
  if (empty($regemail))
   {
   $error = true;
   $regemailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT userEmail FROM users WHERE userEmail='$regemail'";
   $result = db_query($query);
   $count = db_query_num_rows($result);
   if($count!=0){
    $error = true;
    $regemailError = "Provided Email is already in use.";
   }
  }
  return $result;
}
  
    // basic name validation
  if (empty($regfullname)) {
   $error = true;
   $regfullnameError = "Please enter your full name.";
  } else if (strlen($regfullname) < 3) {
   $error = true;
   $regfullError = "full name must have at least 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$regfullname)) {
   $error = true;
   $regfullnameError = "full name must contain alphabets and space.";
  }
  
    // basic gender validation
  if (empty($reggender)) {
   $error = true;
   $reggenderError = "Please select gender.";
  }
  

    $result = db_query("INSERT INTO users(userUsername,userPass,userEmail,userFullname,userGender) VALUES('$regusername','$password','$regemail','$regfullname','$reggender')");
    
   if ($result === true) {
    $errMSG = "success! you may login now";

    // header("Location: login.php");
    // echo $errTyp;
    // echo $errMSG;
   }
    else {
    $errMSG = "Something went wrong, try again later..."; 
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
    <title><?php echo $title; ?></title>
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
          <!-- REGISTRATION FORM -->
          <div class="text-center" style="padding:50px 0">
            <div class="account-wall">
              <img src="images/sign-up-icon.jpg" class="thumbnail-login" alt="sign up">
              <div class="breadcrumb">Signup To Friendzone</div>
              <div class="btn-success"><a href="login.php"><?php ?></a></div>
                <!-- Main Form -->
                <div class="login-form-1">
                  <form method="post" id="register-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" class="text-left">
                    <div class="login-form-main-message"></div>
                    <div class="main-login-form">
                      <div class="login-group">
                        <div class="form-group">
                          <label for="reg_username" class="sr-only">Username</label>
                          <input type="text" class="form-control" id="regusername" name="regusername" placeholder="username" maxlength="50" >
						            </div>
                        <div class="form-group">
                          <label for="reg_password" class="sr-only">Password</label>
                          <input type="password" class="form-control" id="regpassword" name="regpass" placeholder="password" required class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="reg_password_confirm" class="sr-only">Password Confirm</label>
                          <input type="password" class="form-control" id="regpasswordconfirm" name="regcpass" placeholder="confirm password" required class="form-control">
                        </div>
                        
                        <div class="form-group">
                          <label for="reg_email" class="sr-only">Email</label>
                          <input type="text" class="form-control" id="regemail" name="regemail" placeholder="email" required>
                        </div>
                        <div class="form-group">
                          <label for="reg_fullname" class="sr-only">Full Name</label>
                          <input type="text" class="form-control" id="regfullname" name="regfullname" placeholder="full name" required>
                        </div>
                        
                        <div class="form-group login-group-checkbox">
                          <input type="radio" class="" name="reggender" value="male" id="male" placeholder="username" >
                          <label for="male">Male</label>
                          
                          <input type="radio" class="" value="female" name="reggender" id="female" placeholder="username" >
                          <label for="female">Female</label>
                        </div>
                        
                        <div class="form-group login-group-checkbox">
                          <input type="checkbox" class="" id="reg_agree" name="reg_agree">
                          <label for="reg_agree">i agree with <a href="#">terms and conditions</a></label>
                        </div>
                      </div>
                      <button type="submit" name="btn-signup" class="btn btn btn-primary login-button"><i class="fa fa-chevron-right"></i></button>
                    </div>
                  </form>
                <div class="etc-login-form">
                  <p>already have an account? <a href="login.php">login here</a></p>
                </div>
                </div>
              </div>
            </div>
            <!-- end:Main Form -->
          <footer class="nabar-fixed-bottom">
            <div class="foot-text text-center footer">
              Copyright &copy;2016 Designed by Solomon's labs.
            </div>
          </footer>
        </div>
      <!--end of registration form -->         
    </div>
    <script src="js/loginandsignup.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>