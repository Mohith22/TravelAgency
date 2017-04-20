<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="TravelAgency"; // Database name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 

$myusername=$_POST['username']; 
$mypassword=$_POST['password'];
if($username!='' ||$password!='' ){ 


$sql="SELECT * FROM Users WHERE UserName='$myusername' and Password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
echo $count;
echo mysql_error();
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php".
  session_start();
 $_SESSION['username'] = $myusername;

header("location:home.php");
}
else {
echo "Wrong Username or Password";
}
}

?>