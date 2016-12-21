<?php
  ob_start();
   session_start();
  include("../dbconnect.php");
    $title = ' PROFILE | Friendzone';
   // if session is not set this will redirect to login page
  // if($_SESSION['user']=="" ) {
  //   header("Location: login.php");
  
    $error = false;

 // if session is not set this will redirect to login page
 
function db_query($query){ 
   $connection = db_connect();
   $result = mysqli_query($connection,$query);
    
    // $image = mysqli_query($connection,$query);
    $id = $_SESSION['user'];

// $result = db_query("SELECT * FROM users WHERE userUsername = '$id'");

// $object = mysqli_fetch_array($result);


// $username=object['username'];
// $fname  =$object(['fullname']);
// $email  = $object['email'];
// $descrip  =$object['description'];
// $phone  =$object['phone'];


//  if(isset($_POST['upload'])) {
//   $regfullname = $_POST['fullname'];
//   $regemail  = $_POST['email'];
//   $description   = $_POST['description'];
//   $phone = $_POST['phone'];
// }
if( isset($_POST['btn-update']) ) {
  $id = $_SESSION['user'];


 $fullname = trim($_POST['fullname']);
  $fullname = strip_tags($fullname);
  $fullname = htmlspecialchars($fullname);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $description = trim($_POST['description']);
  $description = strip_tags($description);
  $description = htmlspecialchars($description);
  
  $phone = trim($_POST['phone']);
  $phone = strip_tags($phone);
  $phone = htmlspecialchars($phone);
  return $result;

          // $username = $object['username'];
          // $fname  = $object['fullname'];
          // $email  = $object['email'];
          // $descrip  = $object['description'];
          // $phone  = $object['phone'];
        

        $result = db_query("UPDATE users SET userFullname = '$fullname', userEmail = '$email', Description = '$description', Phone = '$phone'  WHERE userUsername = '$id'");
        // while($row = mysql_fetch_array($result)){
          
        // }
        if ($result == 1) {
          // $row=mysqli_fetch_array($result);
          // $fname = $row['userFullname'];
          

          $errMSG = "success!hsjbifodhojeofajlkrbesgusifbioej;woafsghulfduiihssfdg;oluidfi; ";
          echo $errMSG;

        }
    else {
    $errMSG = "Something went wrong, try again later..."; 
   }  exit(0);
  // if ($result == 1) {
  //   $row=mysqli_fetch_array($result);
  //     $success = '<p style="color:blue;text-align:center;"> Records saved!</p>';
  //    }
  //     else {
  //     $success = "Something went wrong, try again later..."; 
  //    } 


        // if ($result){
        //         $success = '<p style="color:blue;text-align:center;"> Records saved!</p>';
        // }
    // header("location:profiletest.php");
}

}
// $pics ="";

if(isset($_POST['Submit'])){
        $id = $_SESSION['user'];
        $name = $_FILES["image"] ["name"];
        $type = $_FILES["image"] ["type"];
        $size = $_FILES["image"] ["size"];
        $temp = $_FILES["image"] ["tmp_name"];
        $error = $_FILES["image"] ["error"];



       

        if ($error > 0){
            die("Error uploading file! Code $error.");
        }else{
            if($size > 10000000) //conditions for the file
            {
            die("Format is not allowed or file size is too big!");
            }
            else
            {
            move_uploaded_file($temp,"../images/users/".$name);

            $result =  db_query("UPDATE users SET Profilepic = '$name' WHERE userUsername = '$id'");
            }
            
        } if ($result == 1) {
          # code... 
          $row=mysqli_fetch_array($result);
          $_SESSION['image'] = $row['Profilepic'];
        }
          
      }
      
//    $result = db_query("SELECT Profilepic FROM users WHERE Profilepic = '$temp'");
// // echo $result;
//     if( $result == 1 ) {
//     $row=mysqli_fetch_array($result);
//     $pics = $row['Profilepic'];
//   } else {
//     $errMSG = 'error while fetching image';
//   } $image = db_query("SELECT userUsername, Profilepic FROM users WHERE userUsername='$id' AND Profilepic='$name'");
 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="../images/friendzone.png" type="image/x-icon" />
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"> -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="css/solomonproject.min.css" rel="stylesheet" type="text/css"> -->
    <!-- main css for friendzone -->
    <link rel="stylesheet" type="text/css" href="../css/friendzone.css">

    <!-- <link rel="stylesheet" type="text/css" href="../../footer/css/footer.css"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
  </head>
  <body>
  <div class="container">
  <?php include 'navigation.php' ?>

      <h1>Edit Profile</h1>
    <hr>
    <div class="row">
      <!-- left column -->
      <div class="col-md-3">
      <form  method="post" enctype='multipart/form-data'>
        <div class="text-center"><div class="profile-userpic">

          <img src="<?php echo $_SESSION['image']; ?>" class="avatar img-circle img-responsive" alt="profile picture"></div>
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control" name="image"><br>
          <button id="upload" type="submit" name="Submit" class="btn btn-info" value="Change profile picture">Change profile picture</button>
          </form>
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          Please edit your information below
        </div>
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form" name="upload" method="post">
          <div class="form-group">
            <label class="col-lg-3 control-label">Full Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="fullname" value="<?php echo (isset($fname)) ? $fname : ''; ?>" >
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="email" >
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Description:</label>
            <div class="col-lg-8">
            <textarea class="form-control" type="text" name="description" ><?php echo (isset($descrip)) ? $descrip : ''; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Phone no:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="phone" >
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <button type="submit" name="btn-update" class="btn btn-primary" value="Save Changes">SAVE</button>
              <span></span>
              <input type="reset" class="btn btn-warning" value="Cancel">
            </div>
          </div>
        </form>
      </div>
    </div>
  <hr>

    
  <?php include 'footer.php' ?>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="../js/bootstrap.min.js"></script> -->
    <script src="../js/bootstrap.js"></script>
    <!-- <script src="../js/loginandsignup.js"></script> -->
    <script src="../js/friendzone.js"></script>

  </body>
</html>
<?php ob_end_flush(); ?>
