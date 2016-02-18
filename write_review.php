<?php
include(verify.php);
//if user has provided all the review inputs, then process the review input else show the review form.
if(!empty($_POST['rating']) && !empty($_POST['reviewe'])){
	$rating = $_POST['rating'];
	$review = $_POST['review'];
}
?>

<form action="" method="post">
Rating <input type='radio' name='rating' value="1"> 1
<input type='radio' name='rating' value="2"> 2
<input type='radio' name='rating' value="3"> 3
<input type='radio' name='rating' value="4"> 4
<input type='radio' name='rating' value="5"> 5 <br>
Review<br><textarea cols="40" rows="5" name="review"></textarea><br>
<input type='submit' value='Go'>
</form>