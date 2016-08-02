<?php
session_start();
if (isset($_SESSION['refPage']))
	{	$url = $_SESSION['refPage'];	}
else
	{  	$url = "index.php";				}

include_once("connopen.inc");
$msg = "";
//echo $url;
if (isset($_REQUEST['param']))
{

	$param = $_REQUEST['param'];
	if ($param == "logout")
		{
		
		
			unset($_SESSION['loginUserID']);
			unset($_SESSION['authority']);
			unset($_SESSION['refPage']);
			$msg = "Logout Successful";
		}
}
?>

<html>
<head>
<title>.::E-RAS::.</title>
<?php include_once ("cssscriptlink.inc"); ?>

<script language = "javascript">
var objForm;

function get(obj)
{
	if (validate())
	{
	var postStr = "strName=" + objForm.txtName.value +
				  "&strPass=" + objForm.txtPass.value;
	$('pStatus').innerHtml = "Processing..";
	makePOSTRequest('checklogin.php', postStr);
	}
}

function validate()
{
var strName = objForm.txtName;
var strPass = objForm.txtPass;
var objCheck = new objValidateClient();
if (!objCheck.mExists(strName))
		{
			alert ("User Name can\'t be null");
			objForm.txtName.focus();
			return false;
		}
	
if (!objCheck.mExists(strPass))
		{
			alert ("Password can\'t be null");
			objForm.txtPass.focus();
			return false;
		}	
return true;
}

function alertContents()
{
	if (http_request.readyState == 4)
		if (http_request.status == 200)
			{	
				var result = http_request.responseText;
					//$('pStatus').innerHTML =result;
					if (result.indexOf("User not exist") >= 0)
					{
					objForm.reset();
					$('pStatus').innerHTML = "<b style = 'color:red'>User does not exist</b>";
					objForm.txtName.focus();
					}					
				if (result.indexOf("Invalid pass") >= 0)
					{
					objForm.txtPass.value = "";
					$('pStatus').innerHTML = "<b style = 'color:red'>Invalid Password</b>";
					objForm.txtPass.focus();
					}
				
				if (result.indexOf("Success") >= 0)
					{
					var strLink = result.substr(8);
					
					$('pStatus').innerHTML = "<b style = 'color:blue'>Success</b>";
					if(strLink == 1)
					{
						document.location.href = "main.php";
					}
					else
					{	
						document.location.href = "main.php";
					}
				    }												
				}
		else
			{	alert ("Error");}
}
	
</script>
</head>
   
<?php include_once("loginheader_main.inc.php"); ?>
	 
 <td border="0" bgcolor="#ffffff" valign="top" width="900"><!--begin Product Info module-->
	      
		 			<!--  <br> -->
 <table border="0" cellpadding="0" cellspacing="0" width="900">

			  <tr bgcolor="#ffffff">
			  <td colspan="3">&nbsp; 			  </td>
			  </tr>
			
			<tr bgcolor="#ffffff">
			<td width="20"><img src="images/spacer.gif" border="0" height="1" width="20"></td>
                <td class="price" valign="middle" width="198">      
			  	
					<table border="0" cellpadding="0" cellspacing="0" width="198">                  
					
						<tr valign="middle"> <td>&nbsp;  </td>
						</tr>

						<tr valign="middle" >
						<td width="5" height="120">&nbsp;</td>
						<td width="188"> <img src="images/P116.JPG"> <!-- <img src="K2.JPG">  --> </td>
						</tr>

						<tr valign="middle" > <td>&nbsp;  </td>
						</tr>
					</table>			  </td>
			  <td align="center">
			  
			  <!-- FORM --> 


<form id="frmMain" name="frmMain" action="javascript:;">

<br>

<h4 style="WIDTH:400px;"><p id = pStatus name = pStatus align=center><b style='color:blue'></b></p></h4>



User Name

<input type="text" name="txtName" id="txtName" size="25" class="eleveninput"> *  
<br>
<br>

Password &nbsp;
<input name="txtPass" id="txtPass" class="eleveninput" size="25" type="password"> * 


<br><br>

<input class="formButton"  type="submit" value="SIGN IN" onclick = "javascript:get(this.parentNode);">


<h4 style="WIDTH:400px;">&nbsp;</h4>


			  <p>Fields marked with * are required.</p>
</form>

			  
			  <!-- FORM END -->
			  
			  &nbsp;</td>
			  </tr>
			  
			  <tr bgcolor="#ffffff">
			  <td colspan="3">&nbsp; 			  </td>
			  </tr>
			  
			  </tbody></table>
				
 <!-- BODY CONTENT- END   -->
	      
<!-- BLACK BORDER - START -->	  
      <table border="0" cellpadding="0" cellspacing="0" width="900">
     <tbody><tr bgcolor="#000000"><td><img src="images/spacer.gif" border="0" height="1" width="745"></td>
	 </tr></tbody></table>      
 <!-- BLACK BORDER - END  -->
				
 <!-- BODY CONTENT- END   -->
<?php include("loginfooter.inc.php"); ?>
	
</div>
</form>
</body></html>
<script language = "Javascript">
	objForm = document.getElementById('frmMain');
	objForm.txtName.focus();
</script>