<?php
session_start();
include("connection.php");
include("function.php");

if($_SESSION['login'] != 'true'){
    header("location:index.php");
}
$id = $_SESSION['member_id'];   
$select = mysqli_query($dbc,"SELECT * FROM members WHERE member_id = '$id'");
$object = mysqli_fetch_array($select);


$username=$object['username'];
$first=$object['firstname'];
$last=$object['lastname'];
$pass=$object['password'];
$email=$object['email'];



 if(isset($_POST['insert'])) 
{
$firstname = $_POST['firstname'];
        $lastname  = $_POST['lastname'];
        $password   = $_POST['password'];
        $email = $_POST['email'];



        $sql = mysqli_query($dbc,"UPDATE members SET firstname = '$firstname', lastname = '$lastname', password = '$password', email = '$email',  WHERE member_id = '$id'") or die(mysqli_error($dbc));
        $result = mysqli_query($dbc,$sql);

        if ($result){
                $success = '<p style="color:blue;text-align:center;"> Records saved!</p>';
        }
    header("location:profiletest.php");


}
if(isset($_POST['Submit'])){
        $member_id=$_SESSION['member_id'];
        $name = $_FILES["image"] ["name"];
        $type = $_FILES["image"] ["type"];
        $size = $_FILES["image"] ["size"];
        $temp = $_FILES["image"] ["tmp_name"];
        $error = $_FILES["image"] ["error"];
        mysqli_query($dbc,"UPDATE members SET photo = '$name' WHERE member_id = '$member_id'") or die(mysqli_error($dbc));

        if ($error > 0){
            die("Error uploading file! Code $error.");
        }else{
            if($size > 10000000) //conditions for the file
            {
            die("Format is not allowed or file size is too big!");
            }
            else
            {
            move_uploaded_file($temp,"image/members/".$name);
            }
        } 
    }

?>







  <form name="" method="post" enctype='multipart/form-data'>
<input id="browse" type="file" name="image"> 
<input id="upload" type="submit" name="Submit" value="Change your primary picture" /> <br> <br> <br>
  </form>                                                      <form name="insert" method="post"><br>
<p>
Firstname:                                      <input type="text" name="firstname" id="inputtype"
value="<?php echo $first; ?>">



Lastname:
<input type="text" name="lastname" id="inputtype"
value="<?php echo $last; ?>">
</p> <br>
<p>
Change Password: <input type="text" name="password" id="inputtype"
value="<?php echo $pass; ?>">
</p> <br>
<p>

EmailAddress:<input type="text" name="email" id="inputtype"
value="<?php echo $email; ?>">
</p> <br>
<p>
</p>
<br> <br>
<p align="right"style="padding-right: 129px; width: 121px; height: 48px;">
<input type="submit" id="inputsubmit" name="insert" value="Save" id="save" width="10px">
</p> <br />
</form>
<div class="art-blockcontent-body">
<h2 class="art-postheader"></h2>
<div class="cleared"></div>
<div>
<form method='post' action='profiletest.php'></form>
</div>