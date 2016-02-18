<?php
// ../secret.php has the variable $secret. 
//Because of .. php will look for secret.php outside the folder of verify.php
include("../secret.php");
if(empty($_COOKIE['id']) || empty($_COOKIE['status']) || empty($_COOKIE['email']) || empty($_COOKIE['time'])  || empty($_COOKIE['hash']) ){
	takeUserBack();
}
$id = $_COOKIE['id'];
$status = $_COOKIE['status'];
$name = $_COOKIE['name'];
$email = $_COOKIE['email'];
$time = $_COOKIE['time'];
$hashFromCookie = $_COOKIE['hash'];
$hashCalculated = sha1($email.$time.$id.$status.$secret);

//if hash calculated from using cookie information and secret does not match with the hash from the cookie, then you take the user back to login page;
if($hashCalculated != $hashFromCookie){
	//echo "cookie didn't match";
	takeUserBack();
}
function takeUserBack(){
	//the following gets the url of the file that includes verify.php. It will also grab get variables in the url;
	$url = $_SERVER["REQUEST_URI"];
	//we store the file that included verify.php in prevLocation cookie so that we can take the user back to this file after logging the user; 
	setcookie('prevLocation', $url, strtotime("+2 years"));
	header('location:login.html');
	exit;
}
echo "Welcome $name <a href='logout.php'>Logout </a>";
echo ($status==2?"Yo! Admin<br>":"");
/*
if($status ==2){
	echo "Yo! Admin<br>";
}
*/
?>