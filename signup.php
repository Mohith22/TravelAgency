<?php
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("TravelAgency", $connection); // Selecting Database from Server
 // Fetching variables of the form which travels in URL

$username = $_POST['username'];
$password = $_POST['password'];
if($username!='' ||$password!='' ){
//Insert Query of SQL
$query = mysql_query("insert into Users(UserName, Password) values ('$username', '$password')");
echo "successful";
}
else
{
  echo "Enter All The Details";
}

?>