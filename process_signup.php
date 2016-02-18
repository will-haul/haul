<?php
include('connect.php');
if(empty($_POST['user']) || empty($_POST['email'])  || empty($_POST['pwd'])){
	//header will redirect your page to signup.html
	header("location:signup.html");
}
$user = $_POST['user'];
$pwd = sha1($_POST['pwd']);
$email = $_POST['email'];


$sql = "INSERT INTO users(name,email,pwd) VALUES('$user','$email','$pwd')";
echo $sql;
$results = mysqli_query($link,$sql);
echo (!$results?die($sql."<br>".mysqli_error($link)):"worked");
?>