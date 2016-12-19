<?php  
/** 
 * Created by osaighe solomon. 
 * User: friendzone 
 * Date: 17/11/2016 
 * Time: 3:46 PM 
 */  
  
session_start();//session is a way to store information (in variables) to be used across multiple pages.  
session_destroy();  
header("Location: login.php");//use for the redirection to some page  
?>