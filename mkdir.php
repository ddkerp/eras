<?php
session_start();
if (!isset($_SESSION['loginUserID']))
{
	header("location:index.php");
	exit();
}
	$loginUserId = $_SESSION['loginUserID'];
 	$authority = $_SESSION['authority'];
$uname= $_SESSION['loginUsername']  ;
//	$loginUserName = $_SESSION['loginUserName'];
?>

<html>
<head>
<title>.:: ERAS  ::.</title>
<script language="javascript">
function ValidateForm(form){
ErrorText= "";
if ( form.txtfloder.value=='')
{
alert ( "Please Enter Floder Name" )  ; 
form.txtfloder.focus();
return false; 
}
if (ErrorText= "") { form.submit() }
} 
</script>


<?php
include_once("connopen.inc");
$msg = $_REQUEST['msg']; 

?>
<?php include_once ("cssscriptlink.inc"); ?>
</head>
   
<?php include_once("insideheader.inc.php"); ?>
 
	
 <td border="0" bgcolor="#ffffff" valign="top" width="900"><!--begin Product Info module-->
	      
		 			<!--  <br> -->
 <table border="0" cellpadding="0" cellspacing="0" width="900">

			  <tr bgcolor="#ffffff">
			    <td colspan="3">			   	    </td>
      </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3"><div align="center">~Directory ~ </div></td>
      </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3">&nbsp;</td>
    </tr>
			  <tr bgcolor="#ffffff">
			  <td colspan="3"><form name='frm' id='frm' action="dir.php" method="post" onSubmit="return ValidateForm(this)" >	    <table width="842" height="193" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="344" nowrap>&nbsp;</td>
                    <td width="161">&nbsp;</td>
                    <td width="337">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><div align="center"><?php echo $msg?></div></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="21"></td>
                    <td><strong>Enter the Directory Name: </strong></td>
                    <td><input name="txtfloder" type="text" id="txtfloder" size="10" maxlength="10"></td>
                  </tr>
                  <tr>
                    <td height="20">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="20"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="34">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3"><div align="center">
                        <input name="Submit" type="submit" class="butAll" value="SAVE">
                        <label>
                        <input name="CANCEL" type="Button" class="butAll" value="BACK" ONCLICK="history.go(-1)">
                        </label>
                    </div></td>
                  </tr>
                </table>
			
			  </form>			  </td>
			  </tr>
			
			<tr bgcolor="#ffffff">
			<td width="20"><img src="images/spacer.gif" border="0" height="1" width="20"></td>
              <td class="price" valign="middle" width="867">&nbsp;</td>
              <td width="13" align="center">
			  
			  <!-- FORM --><!-- FORM END -->
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

<?php include("loginfooter.inc.php"); ?>
	


