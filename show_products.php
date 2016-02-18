<?php
include('connect.php');
$sql = "SELECT id, name, price FROM products";
$results = mysqli_query($link,$sql);
echo (!$results?die($sql."<br>".mysqli_error($link)):"");
$count = mysqli_num_rows($results);
echo "<table>";
for($i=0;$i<$count;$i++){
	$array = mysqli_fetch_array($results);
	$id = $array[0];
	$name = $array[1];
	$price = $array[2];
	//add a hyperlink to name such that it takes to details.php and it carries product id as a get variable
	echo "<tr><td><a href='details.php?id=$id'>$name</a><br>$price</td></tr>";
}
echo "</table>";

