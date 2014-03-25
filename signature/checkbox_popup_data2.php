<html>
<head>
<title>ThaiCreate.Com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<script language="javascript">
function selValue()
{
var val = '';
for(i=1;i<=frmPopup.hdnLine.value;i++)
{
if(eval("frmPopup.Chk"+i+".checked")==true)
{
val = val + eval("frmPopup.Chk"+i+".value") + ',';
}
}
window.opener.document.getElementById("txtSel").value = val;
window.close();
}
</script>
<form id="frmPopup" action="" method="post" name="frmPopup">

<table width="318" border="1">
<tr>
<th width="87"> <div align="center">CustomerID </div></th>
<th width="152"> <div align="center">Name </div></th>
<th width="57"> <div align="center">Select </div></th>
</tr>

<tr>
<td><div align="center">2</div></td>
<td><input name="2" id="2" type="checkbox" value="2"></td>
<td align="center">2</td>
 
</tr>
</table>
<input name="hdnLine" type="hidden" value="2">
<br>
<input name="btnSelect" type="button" value="Select" onClick="JavaScript:selValue();">
</form>

</body>
</html>