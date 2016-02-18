<?php
include('connect.php');
if(empty($_GET['id'])){
	header('Location:show_products.php');
}
$id = $_GET["id"];

$sql = "SELECT name, price, description,image FROM products WHERE id=$id";
$results = mysqli_query($link,$sql);
echo (!$results?die($sql."<br>".mysqli_error($link)):"");
$count = mysqli_num_rows($results);
if($count==0){
	header('Location:show_products.php');
}
$array = mysqli_fetch_array($results);
$name = $array[0];
$price = $array[1];
$description = $array[2];
$image = $array[3];
echo "<img src='$image'><br>$name<br>$price<br>$description<br>";
echo "<a href='write_review.php?id=$id'>Write a review</a><br>";

$sql="SELECT reviewerId,review,postedOn,rating FROM reviews WHERE id=$id ORDER BY postedOn DESC";
//die ($sql);
$results = mysqli_query($link,$sql);
echo (!$results?die($sql."<br>".mysqli_error($link)):"");
$count = mysqli_num_rows($results);
for($i=0;$i<$count;$i++){
	$array = mysqli_fetch_array($results);
	$reviewer = $array[0];
	$review = $array[1];
	$postedOn = $array[2];
	$rating = $array[3];
	//add a hyperlink to name such that it takes to details.php and it carries product id as a get variable
	echo "Rating: $rating<br>$review<br>Written by: $reviewer <br>$postedOn";
}


