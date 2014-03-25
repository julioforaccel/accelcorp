
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Signature</title>




</head>

<body bgcolor="#FFFFFF">


<?php 
$page = $_GET['id'];
if(!$page){
include('contentstandard.php');
} else {
 if(file_exists('employees/'.$page.'.txt')){
       include('contentgen.php');
 } else {
include('nocontent.php');
 } 
}
?>


<table width="600" border="0" cellpadding="0" cellspacing="0" margin="0">

<tr>
<td>




<table border="0" cellpadding="0" cellspacing="0" margin="0" width="600">
<tr style="vertical-align: bottom;">

<td>

<?php 
if($line[1] == "no photo") {
    // do this
include('employees/elements/no-email-profile-pic.txt');
}
else {
    // do this
include('employees/elements/email-profile-pic.txt');
}
?>

</td>

</tr>
<tr>
<td>
<?php 
if($line[9] == "addressHQ") {
    // do this
include('employees/elements/accellionHQ.txt');
}
else if($line[9] == "addressEMEA") {
    // do this
include('employees/elements/accellionEMEA.txt');
}
else if($line[9] == "addressAPAC") {
    // do this
include('employees/elements/accellionAPAC.txt');
}
else{
    // do this
include('employees/elements/blank.txt');
}
?>

<?php 
if($line[10] == "tagline1") {
    // do this
include('employees/elements/tagline1.txt');
}
else if($line[10] == "tagline2") {
    // do this
include('employees/elements/tagline2.txt');
}
else if($line[10] == "tagline3") {
    // do this
include('employees/elements/tagline3.txt');
}
else if($line[10] == "tagline4") {
    // do this
include('employees/elements/tagline4.txt');
}
else if($line[10] == "taglineimage") {
    // do this
include('employees/elements/taglineimage.txt');
}
else{
    // do this
include('employees/elements/blank.txt');
}
?>

<?php 
if($line[11] == "Y") {
    // do this
include('employees/elements/social.txt');
}
else if($line[11] == "N") {
    // do this
include('employees/elements/no-social.txt');
}
else{
    // do this
include('employees/elements/blank.txt');
}
?>

<?php 
if($line[12] == "Y") {
    // do this
include('employees/elements/email-disclaimer.txt');
}
else if($line[12] == "N") {
    // do this
include('employees/elements/no-email-disclaimer.txt');
}
else{
    // do this
include('employees/elements/blank.txt');
}
?>

</td>
</tr>
</table>







</body>

</html>