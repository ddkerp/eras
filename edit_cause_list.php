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
<script type="text/javascript">
function removeFile(fileName){
if(confirm("Are you sure to delete file"+fileName)){
document.getElementById('Update_Patient').action="edit_case.php";
document.getElementById('Update_Patient').submit();
}

}
</script>
<?php $no = $_REQUEST['idd'];

include_once("connopen.inc");
?>
<?php include_once ("cssscriptlink.inc"); ?>
<script type="text/javascript" src="script.js"></script>
    <link type="text/css" rel="stylesheet" href="css/calendar.css?random=20051112" media="screen"></LINK>
    <SCRIPT type="text/javascript" src="css/calendar.js?random=20060118"></script>

<link rel="stylesheet" href="img/CormsStyle.css">
<link href="img/complete.css" rel="stylesheet" type="text/css">
</head>
   
<?php include_once("insideheader.inc.php"); ?>
 
	<?php
// file_exists('upload/'.$_POST['removefilename'])

if(!empty($_POST['removefilename'])){
unlink('upload/'.$_POST['removefilename']);
$query="UPDATE pix_lawyer SET `file`=' ' WHERE sno={$no}";
mysql_query($query);
}


$sql = "select * from pix_causelist where id = '$no'";
$res = mysql_query($sql);

while($data = mysql_fetch_array($res)){
$sno = $data['id'];
$cty =$data['casetype'];
$cno = $data['caseno'];
$Pname=$data['c_year'];
$Rname=$data['c_hall'];
$year=$data['judg'];
$Lc=$data['item_no'];
$Scl=$data['pag_no'];
$Hc=$data['advocate'];
$Sc=$data['cli_nam'];
/*Next Dates of Hearing Coversion */
	 $DD = $data['next_hearing'];
  /*   $DD = date("d-m-Y", strtotime($org_Date));
 End Dates of Hearing Coversion */
$file1=$data['remarks'];
/*Date Coversion */
 $originalDate = $data['user_date'];
 $ddd = date("d-m-Y", strtotime($originalDate));
 /*End Date Coversion */
$counsel=$data['counsi'];


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
			    <td colspan="3">&nbsp;</td>
    </tr>
			  <tr bgcolor="#ffffff">
			  <td colspan="3"><form name='Update_Patient' id='Update_Patient' action="update_causelist.php" method="post" enctype="multipart/form-data">	    <table width="842" height="192" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td nowrap>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><strong>Date</strong></td>
                    <td><input name='dat'  id="dat" size="30" maxlength="250" readonly="" value="<?php echo $ddd; ?>" >                                    </td>
                    <td>&nbsp;</td>
                    <td><strong>Counsel</strong></td>
                    <td><input name="couse" type="text" id="couse" size="30" maxlength="250" readonly="" value="<?php echo $counsel; ?>"></td>
                  </tr>
                  <tr>
                    <td nowrap>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="162" nowrap><strong>Case Type</strong></td>
                    <td width="228"><input name="txtcty"  id="txtcty" size="15"  maxlength="250" readonly="" value="<?php echo $cty; ?>" >                    </td>
                    <td width="6">&nbsp;</td>
                    <td width="139"><strong>Case Number/Year </strong></td>
                    <td width="307"><input name='txtcno'  id="txtcno" size="15" maxlength="250" readonly="" value="<?php echo $cno; ?>" >
                       
                   
                              
                    <input name="txtyrs" type="text" id="txtyrs" size="15" maxlength="250" readonly="" value="<?php echo $Pname; ?>"></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><strong>Court Hall</strong></td>
                    <td><input name='txtPname'  id="txtPname" size="30" maxlength="250" value="<?php echo $Rname; ?>" >                                    </td>
                    <td>&nbsp;</td>
                    <td><strong>Judge</strong></td>
                    <td><input name="txtRname" type="text" id="txtRname" size="30" maxlength="250" value="<?php echo $year; ?>"></td>
                  </tr>
                  <tr>
                    <td height="20"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
				    <td width="145"><strong>Item No</strong></td>
                    <td width="277"><input name='txtLc'  id="txtLc" size="9" maxlength="250" value="<?php echo $Lc; ?>" >
					    <strong>Page No</strong>
					<input name="txtsenior" type="text" id="txtsenior" size="9" maxlength="250" value="<?php echo $Scl; ?>">
					</td>
                    <td>&nbsp;</td>
                    <td height="20"><strong>Incharge-Advocate</strong></td>
                    <td><input name="txtHc" type="text" id="txtHc" size="30" maxlength="250" value="<?php echo $Hc; ?>" readonly=""></td>
                  </tr>
                  <tr>
                    <td height="20">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><strong>Client Name</strong></td>
                    <td><input name="txtSc" type="text" id="txtSc" size="30" maxlength="250" value="<?php echo $Sc; ?>"></td>
                    <td>&nbsp;</td>
                    <td height="34"><strong>Next Date of Hearing</strong></td>
                    <td><input name='txtDD'  id="txtDD" size="20" maxlength="250" value="<?php echo $DD; ?>" >
					<input name="button" type="button" onClick="displayCalendar(document.forms[0].txtDD,'yyyy-mm-dd',this)" value="Cal"></td>
                  </tr>
                  <tr>
                    <td height="20"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="23" ><strong>Remarks</strong></td>
                    <td class="disc"><textarea name="remark" id="remark" rows="3" cols="26"><?php echo $file1;?></textarea></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td bgcolor="#FFFFFF">&nbsp;</td>
                    <td class="disc">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="5">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="5"><div align="center">
                        <input name="Submit" type="submit" class="butAll" value="SAVE">
                     <input name="usname" type="hidden" id="usname"  value="<?php echo $uname?>">
					 <input name="id" type="hidden" id="id"  value="<?php echo $sno?>">
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
	


