<?php
/*
------------------------------------------------------------------------------------------------
Author : Saravanan

Created Date : 23 July 2008

Purpose : Area add.

------------------------------------------------------------------------------------------------
*/

session_start();
if (!isset($_SESSION['loginUserID']))
{
	header("location:index.php");
	exit();
}
	$loginUserId = $_SESSION['loginUserID'];
 	$authority=$_SESSION['authority'];
?>
<html><head>
<title>.::ERAS::.   Add USER</title>

<?php include_once("cssscriptlink.inc"); ?>

<script language = "javascript">
var objForm;

//create new object use validate.js
var objVal = new objValidateClient();
var objCheck = new objValidateClient();
function get(obj)
{
	if (validate())
	{

//***Required fields are filled. Collecting all values in single string 
// namely poststr

 var poststr = "hdnProcess=" + encodeURI('N') +
	"&txtCityName=" + encodeURI( objForm.txtCityName.value ) +
	"&txtShortName="	+ encodeURI( objForm.txtShortName.value)+
	"&txtcpass="	+ encodeURI( objForm.txtcpass.value)+ 
	"&txtname="	+ encodeURI( objForm.txtname.value)+ 
	"&assigns="	+ encodeURI( objForm.assigns.value);
//alert(poststr);
//*** Calling the ajax engine
    makePOSTRequest('userprocess.php', poststr);
    }
}

function validate()
{
//City Name
if (!objCheck.mExists(objForm.txtCityName))
	{	
		alert ("User Name can\'t be null");
		objForm.txtCityName.focus();	
		return false;
	}
//City Short Name
if (!objCheck.mExists(objForm.txtShortName))
	{	
		alert ("Password  can\'t be null");
		objForm.txtShortName.focus();	
		return false;
	}
	
	if (!objCheck.mExists(objForm.txtcpass))
	{	
		alert ("conform pass can\'t be null");
		objForm.txtcpass.focus();	
		return false;
	}
	
	if (objForm.txtShortName.value != objForm.txtcpass.value)
	{	alert ("Password doesn't match");
		objForm.txtcpass.value="";
		objForm.txtShortName.value="";
		objForm.txtShortName.focus();
		return false;
	}
	
	
  	return true;

}

function alertContents() 
 {
      if (http_request.readyState == 4) 
	  {
         if (http_request.status == 200) 
		 {
		 
// the value posted by the server stored in result. based on that different messages displayed

            result = http_request.responseText;
 //           alert(result);
        if (result.indexOf("Exist") >= 0)
	        {
	           $("pStatus").innerHTML = "<b style = 'color:red'>User Name is already exist</b>";
			   objForm.txtCityName.focus();
			}	
		if (result.indexOf("Added") >= 0)
           	{
		        $("pStatus").innerHTML = "<b style = 'color:blue'>New User added</b>";
		        if(objForm.popup.value != "")
				{
					window.opener.location.reload();
					self.close();
				}
				objForm.reset();
				objForm.txtCityName.focus();
				
			}
		if (result.indexOf("Error") >= 0)
           	{
		        $("pStatus").innerHTML = "<b style = 'color:red'>Status:There is an error</b>";
				objForm.txtCityName.focus();
			}
		} 
		 else 
		{
            alert('There was a problem with the request.');
        }
    }
}

</script>

</head>

<!-- BODY & LEFT MENU -->

<?php 
include_once("insideheader.inc.php"); 

?>
<br>
<div align="center"><h4 class='sectionTitle'>ADD NEW USER</h4></div>
 <div align="center"></div>
 <br>
 
 
<table align="center" border="0" cellpadding="0" cellspacing="0" width="800">
<tr><td>
<form name = "frmMain" id = "frmMain" action="javascript:;">
<!--<input type="hidden" name="popup" id="popup" value="">-->
<!-- table contain form elemnts to get user detail -->

<table  bgcolor="0330A1" border="0" cellpadding="3" cellspacing="1" align=center width=100%>

<tr class="thead">
<td height=20></td>
<td><p name = "pStatus" id = "pStatus" style= 'color:blue'><b></b></p></td>
</tr>

<tr class="initial" >
	<td align = left width=25%>USER NAME*	</td>
	<td>
		<input type=text Name=txtCityName id=txtCityName maxlength=250 size=30 class="txtAll"></td>
</tr>

<tr class="initial" >
	<td align = left>PASSWORD *</td>
	<td>
	   <input type=password name=txtShortName id=txtShortName size=30 maxlength=250 class="txtAll"></td>
</tr>

<tr class="initial" >
	<td align = left>CONFIRM PASSWORD*	</td>
	<td>
	   <input type=password name=txtcpass id=txtcpass size=30 maxlength=250 class="txtAll"></td>
</tr>

<tr class="initial" >
	<td align = left>NAME*	</td>
	<td>
	   <input type=text name=txtname id=txtname size=30 maxlength=250 class="txtAll"></td>
</tr>

<tr class="initial" >
	<td align = left>ASSIGN*</td>
	<td>
    	<select name="assigns" class="txtAll">
        	<option value="Management">Management</option>
        	<option value="MRD">Junior</option>
        	<option value="Ward">Senior</option>
        </select>
    	Fields marked with * are required</td>
</tr>

<tr class="thead">
<td colspan = 2 align =center>
<input type = submit value = "Add" onclick= "javascript:get(this.parentNode);" class = "butAll">
</td></tr>
</table><br>


</form>
</td></tr>
</table>


<!-- ****************** BODY CONTENT END *********************** -->

<!-- BODY FOOTER --> 
<?php// include_once ("bodyfooternew.inc"); ?>
<?php include("loginfooter.inc.php"); ?>

<script language = "javascript">
	objForm = document.getElementById("frmMain");
	objForm.txtCityName.focus();
</script>
