<?php
include('connect.php');
//.. tells php comiler to go one folder above and look for secret.php
include("../secret.php");
if(empty($_POST['email']) || empty($_POST['pwd'])){
	header("location:login.html");
}
$pwd = sha1($_POST['pwd']);
$email = $_POST['email'];
//status tracks the user-type, which is 1 for normal user and 2 for admin; 
$sql = "SELECT id, name, status FROM users WHERE email='$email' AND pwd='$pwd'";
//echo $sql;
$results = mysqli_query($link,$sql);
echo (!$results?die($sql."<br>".mysqli_error($link)):"");
$count = mysqli_num_rows($results);
if($count>0){
	$array = mysqli_fetch_array($results);
	$id = $array[0];
	$name = $array[1];
	$status = $array[2];
	//time() gets the current unix timestamp; 
	//what is unix timestamp? It is the time difference in seconds since 1st Jan 1970
	$time = time();
	/*
	1st parameter is the cookie variable name
	2nd parameter is the value that this cookie variable stores
	3rd parameter is the time till this cookie will last
	Note: if you do not specify the expiration time of a cookie then it is called non-persistent cookie; if you specify the expiration time then it is called persistent cookie; 
	*/
	//we need to add $status while creating hash so that if a user were to change the cookie valur for status then you can detect that. You do not want a user to change the value of status to 2 and become an admin. 
	$hash = sha1($email.$time.$id.$status.$secret);
	setcookie("email", $email,strtotime("+2 years"));
	setcookie("time", $time,strtotime("+2 years"));
	setcookie("id",$id,strtotime("+2 years"));
	setcookie("name",$name,strtotime("+2 years"));
	setcookie("status",$status,strtotime("+2 years"));
	setcookie("hash", $hash, strtotime("+2 years"));

	if(!empty($_COOKIE['prevLocation'])){
		$prevLocation = $_COOKIE['prevLocation'];
		//expire the previous locatin cookie
		setcookie('prevLocation',"",strtotime('-1 day'));
		header("location:$prevLocation");
	}
}
?>