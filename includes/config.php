<?php
ob_start();
session_start();

$timezone = date_default_timezone_set("Europe/Belgrade");

$con = mysqli_connect("localhost", "root", "", "rudigram");

if(!$con) {
   die("Connection failed: " . mysqli_connect_error());
}

?>