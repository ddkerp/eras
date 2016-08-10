<?php
session_start();
if (!isset($_SESSION['loginUserID']))
{
	header("location:index.php");
	exit();
}

require_once("bootstrap.php");

$loginUserId = $_SESSION['loginUserID'];
$authority = $_SESSION['authority'];
$uname= $_SESSION['loginUsername']  ;
//$msg = $_REQUEST['msg']; 
$msg_id = $_REQUEST['msg'];
//	$loginUserName = $_SESSION['loginUserName'];
include_once("connopen.inc");

?>

<html>
<head>
<title>.:: ERAS ::.</title>

<?php include_once ("cssscriptlink.inc"); ?>
   
	
	<link type="text/css" rel="stylesheet" href="css/calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="css/calendar.js?random=20060118"></script>
	<script language="javascript">
function ValidateForm(form){
ErrorText= "";
if ( form.txtct.selectedIndex == 0)
{
alert ( "Please Select Case Type" )  ; 
form.txtct.focus();
return false; 
}
if ( form.txtcno.value=='')
{
alert ( "Please Enter Case No" )  ; 
form.txtcno.focus();
return false; 
}


if ( form.txtyrs.value=='')
{alert(form.txtyrs.value);
alert ( "Please Enter Case year" )  ; 
form.txtyrs.focus();
return false; 
}

if ( form.txtPname.value=='')
{
alert ( "Please Enter Petitioner" )  ; 
form.txtPname.focus();
return false; 
}

if ( form.txtRname.value=='')
{
alert ( "Please Enter Respondent" )  ; 
form.txtPname.focus();
return false; 
}
if (ErrorText= "") { form.submit() }
} 
</script>


</head>
   
<?php include_once("insideheader.inc.php"); ?>
 
	 
 <td border="0" bgcolor="#ffffff" valign="top" width="900"><!--begin Product Info module-->
	      
		 			<!--  <br> -->
 <table border="0" cellpadding="0" cellspacing="0" width="900">
			  
			  <tr bgcolor="#ffffff">
			    <td colspan="3"><div align="center">
	              ~Create Case~ Logged in::
                  <?php echo $authority?>
                  </div>		        </td>
    </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3" class="headerhome"><div align="center" class="msg <?php echo  $msg[$msg_id]['type'];?>"><span><?php echo  $msg[$msg_id]['text'];?></span></div></td>
      </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3" class="headerhome">&nbsp;</td>
      </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3" class="headerhome"></td>
      </tr>
			  <tr bgcolor="#ffffff">
			    <td height="192" colspan="3"><form name="Create Patient" method="post" action="db.php" enctype="multipart/form-data" onSubmit="return ValidateForm(this)">
			      <table width="842" height="147" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="151"><strong>Case Type</strong></td>
                      <td width="240"><?php
  $result = mysql_query("SELECT * FROM pix_floder order by floder ASC");
?> <select name="txtct" id="txtct" class="txtAll">
<option>Select the  case type</option>
<?php
while($row = mysql_fetch_array($result))
{?>
	         <option><?php echo $row['1'] ?></option>
          <?php } ?>
        </td>
                      <td width="29">&nbsp;</td>
                      <td width="145"><strong>Case No</strong></td>
                      <td width="277"><input name='txtcno' type='text' id="txtcno" size="15" maxlength="250">
                        <strong>Year</strong>
                        <input name="txtyrs" type="text" id="txtyrs" size="15" maxlength="20"></td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="31"><strong>Petitioner/Appellant/Applicant</strong></td>
                      <td><input name='txtPname' type='text' id="txtPname" size="40" maxlength="250"></td>
                      <td>&nbsp;</td>
                      <td><strong>Respondent/Defendant </strong></td>
                      <td><input name="txtRname" type="text" id="txtRname" size="40" maxlength="250">                      </td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="30"><strong>L.C.Counsel</strong></td>
                      <td><input name="txtLc" type="text" id="txtLc" size="40" maxlength="20"></td>
                      <td>&nbsp;</td>
                      <td><strong>Senior Counsel </strong></td>
                      <td><input name="txtsenior" type="text" id="txtsenior" size="40" maxlength="20"></td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="30"><strong>Advocate on Record before H.C </strong></td>
                      <td><input name="txtHc" type="text" id="txtHc" size="40" maxlength="20"></td>
                      <td>&nbsp;</td>
                      <td><strong>Advocate on Record before S.C </strong></td>
                      <td><input name="txtSc" type="text" id="txtSc" size="40" maxlength="20"></td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="30"><strong>Date Of Disposal </strong></td>
                      <td><input name="theDate2" type="text" id="theDate2" size="30" maxlength="20">
                      <input name="button" type="button" onClick="displayCalendar(document.forms[0].theDate2,'dd.mm.yyyy',this)" value="Cal"></td>
                      <td>&nbsp;</td>
                      <td><strong>Documents/Docket</strong></td>
                      <td><input name="file" type="file" id="file" size="25" maxlength="300"></td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
					<tr>
                      <td height="30"><strong>Date of Filling Vakalat  </strong></td>
                      <td><input name="vakalat" type="text" id="vakalat" size="30" maxlength="20">
					  <input name="button" type="button" onClick="displayCalendar(document.forms[0].vakalat,'dd.mm.yyyy',this)" value="Cal"></td>
                      <td>&nbsp;</td>
					  <td><strong>Upload Doc/Docx</strong></td>
                      <td><input name="file_doc" type="file" id="file_doc" size="25" maxlength="300"></td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
					<tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="34" colspan="3">&nbsp;</td>
                      <td height="34">&nbsp;</td>
                      <td height="34">&nbsp;</td>
                    </tr>
                  </table>
                                <table width="60" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td><input id="butt_case_create" name="Submit" type='submit' class="butAll"  value='Save'></td>
									<td>
									<input name="usname" type="hidden" id="usname"  value="<?php echo $uname?>">
									</td>
                                  </tr>
                                </table>
			    </form>			    </td>
      </tr>
			  
			  
			
			
			  
			  <tr bgcolor="#ffffff">
			    <td colspan="3">&nbsp;</td>
      </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3">&nbsp;</td>
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

</body>
</html>
