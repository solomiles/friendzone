<?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';
  $title = 'HOME | Friendzone';
 // if session is not set this will redirect to login page
 if($_SESSION['user']=="" ) {
  header("Location: login.php");
 }
 // select loggedin users detail
 // $res=mysql_query("SELECT * FROM users WHERE userUsername=".$_SESSION['user']);
 // $userRow=mysql_fetch_array($res);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="images/friendzone.png" type="image/x-icon" />
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"> -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="css/solomonproject.min.css" rel="stylesheet" type="text/css"> -->
    <!-- main css for friendzone -->
    <link rel="stylesheet" type="text/css" href="css/friendzone.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
  </head>
  <body>
  <div class="container">
  <?php include 'navigation/navigation.php' ?>

  <?php include 'sidebar/sidebar.php'; ?>
  <?php include 'user_wall.php'; ?>
    
  <?php include 'footer/footer.php'; ?>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- <script src="js/loginandsignup.js"></script> -->`
    <script>
     
    </script>

  </body>
</html>