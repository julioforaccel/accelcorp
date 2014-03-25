<?php 
$page = $_GET['id'];
$lines = file('pages/nosuchfile.txt'); 
foreach ($lines as $line_num => $line) { 
$line = explode ("|", trim($line));
}
?>