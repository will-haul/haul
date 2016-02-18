<?php
//won't be part of the EXAM
//include('verify.php');
//uploadedFile name comes from name attribute for file input in upload.html
//basename($_FILES["uploadedFile"]["name"]) gives the file name that user has uploaded; 
//uploads is the folder we created

$userDefinedFileName = basename($_FILES["uploadedFile"]["name"]);
$folderForStoringFile = "uploads/";
$targetFile = $folderForStoringFile.$userDefinedFileName;

if(move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $targetFile)) {
    echo "The file $userDefinedFileName has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}
?>