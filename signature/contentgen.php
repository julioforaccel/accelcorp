<?php 
$page = $_GET['id'];
$lines = file('employees/'.$page.'.txt'); 
foreach ($lines as $line_num => $line) { 
$line = explode ("|", trim($line));
}
?>
