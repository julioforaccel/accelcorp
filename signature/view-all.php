<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script language="JavaScript1.1" src="dateDisplay.js" type="text/javascript"></script>
<SCRIPT LANGUAGE="JavaScript">
<!-- Original:  Ascii King (chicorama@usa.net) -->
<!-- Web Site:  http://www.geocities.com/enchantedforest/2120 -->

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
function ConvertBR(input) {
// Converts carriage returns 
// to <BR> for display in HTML

var output ="";
for (var i = 0; i < input.length; i++) {
if ((input.charCodeAt(i) == 13) && (input.charCodeAt(i + 1) == 10)) {
i++;
output +="";
} else {
output += input.charAt(i);
   }
}
return output;
}
//  End -->
</script>

<SCRIPT LANGUAGE="JavaScript">
<!--

function opendemoWindow(whichdoc){

window.open(whichdoc,"newWindow","toolbar=no,location=no,directories=no, status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=no,width=550,height=550");
}


//-->
</SCRIPT>


<script language="javascript" type="text/javascript">

    function GetValueFromChild(myVal)

    {

        document.getElementById('email-photo').value = myVal;

    }

</script>


</head>

<body>





<?php
    // read all txt file in the current directory
    if ($dh = opendir('./employees/')) {
        $files = array();
        while (($file = readdir($dh)) !== false) {
            if (substr($file, strlen($file) - 4) == '.txt') {
                array_push($files, $file);
            }
        }
        closedir($dh);
    }
    
    // Sort the files and display
    sort($files);
    echo "<table border=\"1\" cellpadding=\"2\" cellspacing=\"2\"><tr><td>Name</td><td>Actions</td></tr>\n";
    foreach ($files as $file) {
        $title = Title($file);
        echo "<tr>
		<td>$title</td>
		<td><!--<a href=\"delete.php?id=$title\">Delete</a>--!>Delete | <!--<a href=\"../editlanding.php?id=$title\">Edit</a>--!> Edit | <a href=\"viewsig.php?id=$title\" target=\"_blank\">View</a></td>
		</tr>\n";
    }
    echo "</table>\n";
    
    // Function to get a human readable title from the filename
    function Title($filename) {
        $title = substr($filename, 0, strlen($filename) - 4);
        $title = str_replace('+', ' ', $title);
        $title = ucwords($title);
        return $title;
    }
?>


<br><br><a href="createsig2.php">Create a New Signature</a>

</body>

</html>
