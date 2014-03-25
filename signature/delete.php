<?php 
$page = $_GET['id'];
$myFile = ($page.'.txt');
unlink($myFile);
print "The file has been deleted<br>"; 
include ('view-all.php'); 
?>