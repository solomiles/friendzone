<?php

 // this will avoid mysql_connect() deprecation error.
 // error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 // but I strongly suggest you to use PDO or MySQLi.
 
 // define('DBHOST', 'localhost');
 // define('DBUSER', 'root');
 // define('DBPASS', '');
 // define('DBNAME', 'friendzone');
 
 // $conn = mysql_connect(DBHOST,DBUSER,DBPASS);
 // $dbcon = mysql_select_db(DBNAME);
 
 // if ( !$conn ) {
 //  die("Connection failed : " . mysql_error());
 // }
 
 // if ( !$dbcon ) {
 //  die("Database Connection failed : " . mysql_error());
 // }
function db_connect()	{
$config = parse_ini_file('config.ini');
$connection = mysqli_connect('localhost',$config['dbuser'],$config['dbpass'],$config['dbname']);
	if ($connection === false) {
		# code...
		return mysqli_connect_error();
	}
	return $connection;
}
