<?php

$dbhost = "localhost";
$dbuser = "admin_tbinh";
$dbpass = "thanhbinh99##";
$dbname = "website";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
