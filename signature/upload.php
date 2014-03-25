<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  <title>Photo Image Uploader</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <meta name="generator" content="handmade" />
	<style type="text/css">
	<!--
		body {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 14px;
			background-color: #DDDDDD;
		}
		.cnt {
			text-align: center;
		}
		.cnt_welcome {
			font-size: 16px;
			font-weight: bold;
			text-align: center;
		}
		.cnt_powered {
			font-size: 14px;
			font-weight: bold;
			text-align: center;
		}
		.cnt_small {
			font-size: 12px;
			text-align: center;
			padding-top: 50px;
		}
		.head_line {
			background-color: #BBBBBB;
		}
		.main_table {
			border: solid 1px #9D9992;
			font-size: 13px;
		}
		h4 {
			font-size: 12px;
			color: #DD0000;
			text-align: center;
		}
		.button {
			border: 1px solid #55555;
			font-weight: bold;
		}
-->
</style>

<SCRIPT LANGUAGE="JavaScript">

function pops(emoticon){
textcontent=opener.document.getElementById("email-photo").value;
opener.document.getElementById("email-photo").value = textcontent + " " + emoticon;

}

</SCRIPT>


<script language="javascript" type="text/javascript">

    function SendValueToParent()

    {

        var myVal = document.getElementById('email-photo').value;

        window.opener.GetValueFromChild(myVal);

        window.close();

        return false;

    }

</script>




</head>

<body>
<?
include("configupload.php");

function path_options()
{
 global $upload_dirs;
  $option = "";
  foreach ($upload_dirs as $path => $pinfo)
  {
    $option .= '<option value="'.$path.'">'.$pinfo["name"].'</option>';
  }
 return $option;
}

function check_vals()
{
 global $upload_dirs, $err;
	if (!ini_get("file_uploads")) { $err .= "HTTP file uploading is blocked in php configuration file (php.ini). Please, contact to server administrator."; return 0; }
	$pos = strpos(ini_get("disable_functions"), "move_uploaded_file");
	if ($pos !== false) { $err .= "PHP function move_uploaded_file is blocked in php configuration file (php.ini). Please, contact to server administrator."; return 0; }
  if (!isset($_POST["path"]) || (strlen($_POST["path"]) == 0)) { $err .= "Please fill out path"; return 0; }
  if (!isset($upload_dirs[$_POST["path"]])) { $err .= "Incorrect path"; return 0; }
  if (!isset($_POST["pwd"]) || (strlen($_POST["pwd"]) == 0)) { $err .= "Please fill out password"; return 0; }
  elseif ($_POST["pwd"] != $upload_dirs[$_POST["path"]]["password"]) { $err .= "The upload password is incorrect"; return 0; }
  if (!isset($_FILES["userfile"])) { $err .= "Empty file"; return 0; }
  elseif (!is_uploaded_file($_FILES['userfile']['tmp_name'])) { $err .= "Empty file"; return 0; }
 return 1;
}

$err = ""; $status = 0;
if (isset($_POST["upload"])) {
  if (check_vals()) {
    if (filesize($_FILES["userfile"]["tmp_name"]) > $max_file_size) $err .= "Maximum file size limit: $max_file_size bytes";
    else {
      if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $upload_dirs[$_POST["path"]]["dir"].$_FILES["userfile"]["name"])) {
				$status = 1;
			}
      else $err .= "There are some errors!";
    }
  }
}

if (!$status) {
  if (strlen($err) > 0) echo "<h4>$err</h4>";
}
else {
  echo "<h4>&quot;<a href='#' onClick='pops('test')>".$_FILES['userfile']['name']."</a>&quot; was successfully uploaded.</h4>";







  echo "<input id='email-photo' type='text' value='";

  echo "".$_FILES['userfile']['name']."";

  echo "' readonly='readonly' size='60' />";

  echo "<input id='btn1' type='button' value='test' onclick='javascript:return SendValueToParent();' readonly='readonly'>";


}

?>







<p class="cnt_welcome">Upload Image.</p>

<form enctype="multipart/form-data" action="upload.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="<?=$max_file_size?>" />
<input type="hidden" name="pwd" value="images" />
</p>
<table class="main_table" align="center">
  <tr>
    <td colspan="2" class="head_line">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Upload file to:</td>
    <td align="left"><select name="path"><?=path_options()?></select></td>
  </tr>

  <tr>
    <td align="left">Choose file:</td>
    <td align="left"><input type="file" name="userfile" style="width: 222px;" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="upload" value="Upload" class="button" /></td>
  </tr>
</table>
</form>

<SCRIPT LANGUAGE='JavaScript'><input type='button' value='click' onClick='pops(".$_FILES['userfile']['name']."); window.close();'></SCRIPT>

</body>

</html>