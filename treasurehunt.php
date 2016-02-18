<?php
include('verify.php');
?>
Any time you want to password protect any file, you will include verify.php at the top. 
<br>
Purpose of verify.php is:
<ol>
<li> to grab cookies--name, email, time. </li>
<li>It gets the value for secret variable from secret.php. </li>
<li>It now combines the three cookies from step 1 and the secret from step 2 to calculate the hash </li>
<li> It compares the calculated hash with hash from cookie. If the both do not match then it sends the user back to login page 
Map to David John's locker