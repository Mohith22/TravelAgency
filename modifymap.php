<?php
session_start();
$busid=$_POST['busid'];
$smap=$_POST['str'];
$seatnum = $_POST['seatnumber'];
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("TravelAgency", $connection); // Selecting Database from Server
$result = mysql_query("UPDATE bus SET Map='$smap' where BusId=$busid") or die('Unable to run query:');
//$mp=mysql_fetch_array($result);
//$abc=$_SESSION['id'];
mysql_query("INSERT INTO bookings(BusId,Seat) VALUES ($busid , '$seatnum' )");
echo mysql_error();
//echo json_encode($emparr);
?>