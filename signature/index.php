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

window.open(whichdoc,"newWindow","toolbar=no,location=no,directories=no, status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=no,width=750,height=750");
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

<body style="font-family:helvetica;font-size:12px;">



<p style="font-family:helvetica;font-size:15px;"><b>Create and install your custom "Accellion approved" email signature</b></p>

<p>To create your signature, use the signature generator below.</p>
<p>Please note that only your name and title are required fields; all the other elements that make up your signature are optional.</p>
<p>Below are examples.</p>
<p><img src="employees/images/required.jpg"> <img src="employees/images/everything.jpg"></p>
<hr>
<p><b>STEP 1</b><br>
To start, please fill out the form:</p>

<form action="http://www1.accellion.com/signature/createsig.php" method="post"> 
<table width="550" style="margin-left:20px;">
<tr>
        <td></br>Would you like to include an <b>Accellion Logo</b>?</br>


	<select name="logo" />
    <option value="">--Select--</option>
    <option value="Y">Yes</option>
	<option value="N">No</option>
	</select>
</td>

</tr>


<tr>
        <td></br>Would you like to include a photo of yourself? You will be able to upload a photo and crop it to fit your needs.</br>


<SCRIPT LANGUAGE="JavaScript">

function open_pop(){
window.open('employees/upload-crop/upload_crop_v3-n.php','mywin','left=20,top=20,width=750,height=750,toolbar=1,resizable=0');
}

</SCRIPT>

<input type="button" value = "Upload a Photo" onClick="open_pop()" /> <input type="text" id="email-photo" name="email-photo" value="no photo" readonly='readonly'>

</td> 
</tr> 


<tr> 
        <td></br>First Name (<font color="red">required</font>)</br>

<input type="text" name="firstname"></td> 
</tr> 

<tr> 
        <td></br>Middle Initial/Name (optional)</br>

<input type="text" name="middlename"></td> 
</tr> 

<tr> 
        <td></br>Last Name (<font color="red">required</font>)</br>

<input type="text" name="lastname"></td> 
</tr> 


<tr> 
        <td></br>Title (<font color="red">required</font>)</br>

<input type="text" name="title"></td> 
</tr> 

<tr> 
        <td></br>Cell Number (optional)</br>

<input type="text" name="mobilenumber"></td> 
</tr> 

<tr> 
        <td></br>Direct Office Number (optional)</br>

<input type="text" name="officenumber"></td> 
</tr> 



<tr> 
        <td></br>Email (optional)</br>

<input type="text" name="email"></td> 
</tr> 

<tr>
        <td></br>Address (optional)</br>

	<select name="address" />
    <option value="">--Select--</option>
    <option value="addressHQ">Headquarters</option>
	<option value="addressEMEA">EMEA</option>
	<option value="addressAPAC">APAC</option>
	<option value="addressSupport">Support Team Info</option>
	</select>
</td>


<tr>
        <td></br>Would you like to include the Accellion tagline? There are three text-formatted taglines, one banner image and one that includes a link to our overview video. Please choose one. (optional)</br>


	<select name="tagline" />
    <option value="">--Select--</option>
    <option value="tagline1">kiteworks - Work Wherever the Wind Takes You</option>
	<option value="tagline2">kiteworks - Next Generation Mobile Collaboration and File Sharing</option>
	<option value="tagline3">kiteworks - Work Wherever</option>
	<option value="tagline4">See kiteworks in action; watch the overview video</option>
	<option value="taglineimage">Banner Image</option>
	</select>
</td>

</tr>


<tr>
        <td></br>Would you like to include buttons to the Accellion social sites? (optional)</br>


	<select name="social" />
    <option value="">--Select--</option>
    <option value="Y">Yes</option>
	<option value="N">No</option>
	</select>
</td>

</tr>

<tr>
        <td></br>Would you like to include a standard disclaimer? (optional)</br>


	<select name="disclaimer" />
    <option value="">--Select--</option>
    <option value="Y">Yes</option>
	<option value="N">No</option>
	</select>
</td>

</tr>

<tr> 
        <td></br><input type="Submit" name="submit" value="Submit"></td> 
</tr> 

</table>
</form>


<br><br>







</body>

</html>
