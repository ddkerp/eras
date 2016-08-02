<?php
session_start();
if (!isset($_SESSION['loginUserID']))
{
	header("location:login.php");
	exit();
}
	$loginUserId 	= $_SESSION['loginUserID'];
	$loginUserName 	= $_SESSION['loginUserName'];
include_once("connopen.inc");

?>
<html><head>
<title>.::ERAS::. Edit USER</title>

<?php include_once("cssscriptlink.inc"); ?>

<script language = "javascript">
var objForm;

function validate()
{
//City Name
if (!objCheck.mExists(objForm.txtCityName))
	{	
		alert ("City can\'t be null");
		objForm.txtCityName.focus();	
		return false;
	}
//City Short Name
if (!objCheck.mExists(objForm.txtShortName))
	{	
		alert ("Short Name can\'t be null");
		objForm.txtShortName.focus();	
		return false;
	}
	
	//City Short Name
if (!objCheck.mExists(objForm.assigns))
	{	
		alert ("Short Name can\'t be null");
		objForm.txtassign.focus();	
		return false;
	}
  	return true;
}
</script>
</head>

<!-- BODY & LEFT MENU -->
<?php // include_once("innerheadernew.inc"); 
include_once("insideheader.inc.php"); 
include_once("codeit.inc");
$arrayQueryString = extractUrl($_SERVER['QUERY_STRING']);


if (count($arrayQueryString) != 3)
	{
		echo("Missing parameter");
		exit();
	}
$param = $arrayQueryString['param'];
$ID = $arrayQueryString['ID'];
$page = $arrayQueryString['page'];

//echo $param;
if($param == "Edit")
{
 echo("<br><div align='center'><h4 class='sectionTitle'>EDIT User</h4></div>");
}  
else 
{
 echo("<br><div align='center'><h4 class='sectionTitle'>VIEW User</h4></div>");
}
?>
<!-- ****************** BODY CONTENT START *********************** -->



<form  name = "frmMain" id = "frmMain" action="userprocess.php" method=post Onsubmit ="return validate(this);">

<input type=hidden name="hdnProcess" id="hdnProcess" value="">
<input type=hidden name="hdnID" id="hdnID" value="">
<input type=hidden name="page"  id="page" value="">

		
<!-- City -->
<table bgcolor="0330A1"  border="0" cellpadding="3" cellspacing="1" align=center width = 800 >
<tbody>
<tr class="thead"><td class = "thTitle" >Users</td><td> <p name = "pStatus" id = "pStatus" style= 'color:blue'><b></b></p></td></tr>


<tr class="initial" onMouseOver="this.className='highlight'" onMouseOut="this.className='normal'" >
	<td align = right width=25%>User Name</td>
	<td>
		<input type=text Name=txtCityName id=txtCityName maxlength=250 size=30 class="txtAll">*
	</td>
</tr>

<tr class="initial" onMouseOver="this.className='highlight'" onMouseOut="this.className='normal'">
	<td align = right>password </td>
	<td>
	   <input type=text readonly name=txtShortName id=txtShortName size=30 maxlength=250 class="txtAll">*
	</td>
</tr>

<tr class="initial" onMouseOver="this.className='highlight'" onMouseOut="this.className='normal'">
	<td align = right>name </td>
	<td>
	   <input type=text name=txtname id=txtname size=30 maxlength=250 class="txtAll">*
	</td>
</tr>
<!-- 
<tr class="initial" onMouseOver="this.className='highlight'" onMouseOut="this.className='normal'">
	<td align = right>Assigns </td>
	<td>
    <select name="assigns">
    	<option value="Admin">Admin</option>
        <option value="Doctor">Doctor</option>
        <option value="Reception">Reception</option>
    </select>
	  
	</td>
</tr>
-->
<tr class="initial" onMouseOver="this.className='highlight'" onMouseOut="this.className='normal'">
	<td align = right>Assigns </td>
	<td>
    
    
	   <input type=text name=assigns id=assigns size=30 maxlength=250 class="txtAll">*
	</td>
</tr>

</tbody></table>
<br>
<table bgcolor="0330A1"  border="0" cellpadding="3" cellspacing="1" align=center width = "800">
<tbody>

<tr class="thead"><td align = center>
<?php 
if($param == "Edit")
	echo "<input type = submit value = Update class = butAll>";
	echo "<input type=button value='Cancel' onclick='history.back();' class = butAll> ";
?>
</td></tr>
</tbody></table><br>
</form>


<br>

<!-- BODY FOOTER --> 

<?php include("loginfooter.inc.php"); ?>
<script language = "Javascript">
	objForm = document.getElementById("frmMain");
	objForm.txtCityName.focus();

<?php
$query = "select * from sara_user  where userid = " .$ID;
$result = mysql_query($query,$connection);
 	  
$row = mysql_fetch_array($result);
$userid = $row['userid'];

?>
objForm.txtCityName.value		= '<?php echo $row['username']?>';
objForm.txtShortName.value		= '<?php echo $row['password']?>';
objForm.txtname.value			= '<?php echo $row['name']?>';
objForm.assigns.value			= '<?php echo $row['assign']?>';

objForm.hdnProcess.value  = "E";
objForm.hdnID.value  = <?php echo $ID?>;
objForm.page.value  = <?php echo $page?>;
</script>
