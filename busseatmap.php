<?php
$busid=$_POST['busid'];
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("TravelAgency", $connection); // Selecting Database from Server
$result = mysql_query("SELECT Map FROM bus where BusId=$busid") or die('Unable to run query:');
$mp=mysql_fetch_array($result);
echo $mp[0];

//echo json_encode($emparr);
?>
