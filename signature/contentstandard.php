<?php 
$page = $_GET['id'];
$lines = file('employees/standardlp.txt'); 
foreach ($lines as $line_num => $line) { 
$line = explode ("|", trim($line));
}
?>