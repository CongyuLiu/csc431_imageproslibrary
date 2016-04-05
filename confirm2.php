<!doctype html>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<html>
<head><title>confirm</title></head>
<body>

  


<?php
$code=$_POST['code'];
$account=$_POST['account'];
//$code='ysi';
//$account='ysi';

$valid=0;

$username = "imagepr2_admin";
$password = "1234";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");
  
$selected = mysql_select_db("imagepr2_mainDB",$dbhandle) 
  or die("Could not select examples");
  
  //$result = mysql_query("SELECT code, used FROM passcodes ORDER BY id");
//fetch tha data from the database			

  mysql_set_charset("utf8");
  


  
  $result = mysql_query("SELECT accountName, password FROM Users")
  or die("Could not select accountN");
//fetch tha data from the database

while ($row = mysql_fetch_array($result)) {
	//echo "$newvotes";
	if ($account==$row{'accountName'}) {
		if ($code==$row{'password'}){
		
		$valid=1;}
		else {
		$valid=0;
		
		} } else {
		$valid=-1;
		}
  }
  if ($valid==0){
  die("wrong password");}
  
   if ($valid==-1){
  die("wrong user name");}
  
  // die("login successfully");
  // Start the session
session_start();
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.";
?>


</body>
</html>
