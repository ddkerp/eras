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
//	$loginUserName = $_SESSION['loginUserName'];

$msg_id = $_REQUEST['msg'];
//echo "<pre>";print_r($msg[$msg_id]['text']);exit;

?>

<html>
<head>
<title>.:: ERAS  ::.</title>
<script type="text/javascript">
function removeFile(fileName){
if(confirm("Are you sure to delete file"+fileName)){
document.getElementById('Update_Patient').action="edit_case.php";
document.getElementById('Update_Patient').submit();
}

}
</script>
<?php $no = $_REQUEST['id'];

include_once("connopen.inc");
?>
<?php include_once ("cssscriptlink.inc"); ?>
</head>
   
<?php include_once("insideheader.inc.php"); ?>
 
	<?php
// file_exists('upload/'.$_POST['removefilename'])

if(!empty($_POST['removefilename'])){
unlink('upload/'.$_POST['removefilename']);
$query="UPDATE pix_lawyer SET `file`=' ' WHERE sno={$no}";
mysql_query($query);
}

// $msg = $_REQUEST['msg']; 
$sql = "select * from pix_lawyer where sno = '$no'";
$res = mysql_query($sql);

while($data = mysql_fetch_array($res)){
$sno = $data['sno'];
$cty =$data['case_Type'];
$cno = $data['case_no'];
$Pname=$data['Petitioner'];
$Rname=$data['Respondent'];
$year=$data['year'];
$Lc=$data['LC_Counsel'];
$Scl=$data['Senior_C'];
$Hc=$data['H_C'];
$Sc=$data['S_C'];
$DD=$data['Date_Disposal'];
$file1=$data['file'];
$vakal=$data['vakalat'];
$file_doc=$data['file_doc'];


}

?>
 
 <td border="0" bgcolor="#ffffff" valign="top" width="900"><!--begin Product Info module-->
	      
		 			<!--  <br> -->
 <table border="0" cellpadding="0" cellspacing="0" width="900">

			  <tr bgcolor="#ffffff">
			    <td colspan="3">			   	    </td>
      </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3"><div align="center">~Edit/Update Page~ </div></td>
      </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3"><div align="center" class="msg <?php echo  $msg[$msg_id]['type'];?>"><span><?php echo  $msg[$msg_id]['text'];?></span></div></td>
    </tr>
			  <tr bgcolor="#ffffff">
			  <td colspan="3"><form name='Update_Patient' id='Update_Patient' action="db_update.php" method="post" enctype="multipart/form-data">	    <table width="842" height="192" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td nowrap>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="162" nowrap>Case Type</td>
                    <td width="228"><input name="txtcty"  id="txtcty" size="15"  maxlength="250" value="<?php echo $cty; ?>" >                    </td>
                    <td width="6">&nbsp;</td>
                    <td width="139">Case Number </td>
                    <td width="307"><input name='txtcno'  id="txtcno" size="15" maxlength="250" value="<?php echo $cno; ?>" >
                       
                   
                              <strong>Year:</strong>
                    <input name="txtyrs" type="text" id="txtyrs" size="15" maxlength="250" value="<?php echo $year; ?>"></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>Petitioner/Appellant/Applicant</td>
                    <td><input name='txtPname'  id="txtPname" size="30" maxlength="250" value="<?php echo $Pname; ?>" >                                    </td>
                    <td>&nbsp;</td>
                    <td>Respondent/Defendant</td>
                    <td><input name="txtRname" type="text" id="txtRname" size="30" maxlength="250" value="<?php echo $Rname; ?>"></td>
                  </tr>
                  <tr>
                    <td height="20"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="20">L.C.Counsel</td>
                    <td><input name='txtLc'  id="txtLc" size="30" maxlength="250" value="<?php echo $Lc; ?>" ></td>
                    <td>&nbsp;</td>
                    <td>Senior Counsel </td>
                    <td><input name="txtsenior" type="text" id="txtsenior" size="30" maxlength="250" value="<?php echo $Scl; ?>"></td>
                  </tr>
                  <tr>
                    <td height="20">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="20">Advocate on Record before H.C </td>
                    <td><input name="txtHc" type="text" id="txtHc" size="30" maxlength="250" value="<?php echo $Hc; ?>"></td>
                    <td>&nbsp;</td>
                    <td>Advocate on Record before S.C </td>
                    <td><input name="txtSc" type="text" id="txtSc" size="30" maxlength="250" value="<?php echo $Sc; ?>"></td>
                  </tr>
                  <tr>
                    <td height="20"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="34">Date of Disposal</td>
                    <td><input name='txtDD'  id="txtDD" size="25" maxlength="250" value="<?php echo $DD; ?>" ></td>
                    <td>&nbsp;</td>
                    <td>Documents/Docket </td>
                    <td><?php if(!empty($file1)){
					//echo $file1; ?>
                      <input type="hidden" name="id" value="<?php echo $sno ?>"/>
						    <input type="hidden" id="removefilename"  name="removefilename" value="<?php echo $file1; ?>"/>
							<!--<input  type="file"  name="file" id="file" size="38" maxlength="300" value="">-->
						
						  <?php } ?><input type="hidden" name="id" value="<?php echo $sno ?>"/>
						  <input  type="file"  name="file" id="file" size="38" maxlength="300" value="">
						  <input type="hidden" name='saved_file' value="<?php echo $file1;?>" />
						  </td>
                  </tr>
                  <tr>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="20">Date of filling Vakalat</td>
                    <td><input name="vaka" type="text" id="vaka" size="25" maxlength="250" value="<?php echo $vakal; ?>"></td>
                    <td>&nbsp;</td>
					<td>Upload Doc </td>
                    <td>
						  <input  type="file"  name="file_doc" id="file_doc" size="38" maxlength="300" value="" accept=".doc,.docx" >
						  <input type="hidden" name='saved_file_doc' value="<?php echo $file_doc;?>" />
					</td>
                  </tr>
                  <tr>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="5"><div align="center">
                        <input name="Submit" id="butt_case_save" type="submit" class="butAll" value="SAVE">
                     <input name="usname" type="hidden" id="usname"  value="<?php echo $uname?>">
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
	


