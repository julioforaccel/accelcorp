<?php

$logo = $_REQUEST['logo'];

$photo = $_REQUEST['email-photo'];

$firstname = $_REQUEST['firstname'];
$middlename = $_REQUEST['middlename'];
$lastname = $_REQUEST['lastname'];

$title = $_REQUEST['title'];

$mobilenumber = $_REQUEST['mobilenumber'];
$officenumber = $_REQUEST['officenumber'];

$email = $_REQUEST['email'];

$address = $_REQUEST['address'];

$tagline = $_REQUEST['tagline'];

$social = $_REQUEST['social'];

$disclaimer = $_REQUEST['disclaimer'];


$Record = "\r\n" . $logo . "|" . $photo .  "|" . $firstname .  "|" . $middlename .  "|" . $lastname .  "|" . $title .  "|" . $officenumber .  "|" . $mobilenumber .  "|" . $email .  "|" . $address .  "|" . $tagline .  "|" . $social .  "|" . $disclaimer;


$filename = ("employees/".$firstname."-".$lastname.".txt"); 
$fp = fopen($filename, "w"); 
$write = fputs($fp, $Record);
fclose($fp); 

?> 

<body style="font-family:helvetica;font-size:12px;">

<p style="font-family:helvetica;font-size:20px;"><b>Your signature has been created.</b></p>
<hr>
<p style="font-family:helvetica;font-size:15px;"><b>Install your email signature in your email client.</b></p>

<p style="font-family:helvetica;font-size:12px;">
<b>STEP 1 - Copy your signature</b><br>
- Click the "View Your Signature" found at the bottom of this page<br>
- Select All (Command + A) or (Control + A) on a mac or PC<br>
- Copy (Command + C) or (Control + C) on a mac or PC<br></p>

<p style="font-family:helvetica;font-size:12px;">
<b>STEP 2 - Paste your signature into your email client</b><br></p>

<p style="font-family:helvetica;font-size:12px;">
- If you use Outlook:<br>
1 Start by creating a new email message<br>
2 From the top menu bar, select "Signature" (if you already have a signature installed, click the "Signatures" option from the pulldown menu to add additional signatures)<br>
3 Click "New" (the "+" symbol towards the bottom)<br>
4 Give your signature a name and click "OK"<br>
5 Paste your email signature into the text box<br>
6 Click "OK"<br>
7 You are done<br></p>



<p style="font-family:helvetica;font-size:12px;">
- If you use Gmail:<br>
1 Click the settings gear in your Gmail toolbox (top right)<br>
2 Select "settings" from the pull down menu<br>
3 Scroll down to the signature section of the page<br>
4 Paste in your signature (Command + V) or (Control + V) on a mac or PC<br>
5 Select "Save Changes" at the bottom of the page<br></p>

<p style="font-family:helvetica;font-size:12px;">
- If you use Apple Mail, follow the instructions in the following link:<br>
<a href="http://macs.about.com/od/appleconsumersoftware/qt/Add-A-Signature-To-Your-Email-Messages-In-Apple-Mail.htm" target="_blank">Apple Mail Signature</a><br></p>


<?php

echo "<br><br><a href='http://www1.accellion.com/signature/viewsig.php?id=";
echo "$firstname";
echo "-";
echo "$lastname";
echo "' target='_blank'>";
echo "View Your Signature";
echo "</a>";
 
?> 

</body>