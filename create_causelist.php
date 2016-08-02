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
$msg = $_REQUEST['msg']; 
//	$loginUserName = $_SESSION['loginUserName'];
include_once("connopen.inc");

?>

<html>
<head>
<title>.:: ERAS ::.</title>

<?php include_once ("cssscriptlink.inc"); ?>

<?php if($_POST['submit']=='Save')
{
/*Date Coversion */
 $originalDate = $_POST['theDate1'];
 $date = date("Y-m-d", strtotime($originalDate));
 /*End Date Coversion */
 
 /*Next Dates of Hearing Coversion 
echo $originalDate1 = $_POST['hearing'];
    echo $hear = date("Y-m-d", strtotime($originalDate1));*/
 /*End Dates of Hearing Coversion */


	$case_typ=$_POST['ct'];
	$c_no=$_POST['cn'];
	$c_year=$_POST['cy'];
	$cort_hal=$_POST['ch'];
	$judge=$_POST['jud'];
	$item_n=$_POST['it_no'];
	$pag_no=$_POST['p_no'];
	//$inchar=$_POST['inc'];
	//$advo=$_POST['adv'];
	$client=$_POST['cl_nam'];
	$hear=$_POST['hearing'];
	$rmk=$_POST['remark'];
	//$date=$_POST['theDate1'];
	$coun=$_POST['counsil'];
	
$result = mysql_query("SELECT * FROM pix_lawyer WHERE case_no='$c_no' AND case_Type='$case_typ' AND year='$c_year'") or die(mysql_error());
$count=mysql_num_rows($result);
while($data = mysql_fetch_array($result)){
echo $advo=$data['H_C'];
}
if($count==1)
{
///////////
/*if(mail($to,$subject,$message,$headers)){*/
mysql_query("INSERT INTO `pix_causelist` (`casetype`,`caseno`,`c_year`,`c_hall`,`judg`,`item_no`,`pag_no`,`advocate`,`cli_nam`,`next_hearing`,`remarks`,`user_date`, `counsi`) VALUES('$case_typ','$c_no','$c_year','$cort_hal','$judge','$item_n','$pag_no','$advo','$client','$hear','$rmk','$date','$coun') ") or die(mysql_error()); 
/*$last_id=mysql_insert_id();
mysql_query("INSERT INTO `a_data` (`sid`, `pamount`) VALUES('$last_id','$pamount') ") or die(mysql_error());*/
$successmsg='<b style="color:green;margin-left:10px">Record Added Sucessful</b>';
/*} */
}else{
$successmsg='<b style="color:red;margin-left:10px">Case Type/No. not found.Please "Add Case" in the software</b>';
}
}
 
?>
   
	
	<link type="text/css" rel="stylesheet" href="css/calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="css/calendar.js?random=20060118"></script>
	<script language="javascript">
function ValidateForm(form){
ErrorText= "";
if ( form.counsil.selectedIndex == 0)
{
alert ( "Please Select Counsel" )  ; 
form.counsil.focus();
return false; 
}
if ( form.ct.selectedIndex == 0)
{
alert ( "Please Select Case Type" )  ; 
form.ct.focus();
return false; 
}
if ( form.cn.value=='')
{
alert ( "Please Enter Case No" )  ; 
form.cn.focus();
return false; 
}


if ( form.cy.value=='')
{
alert ( "Please Enter Case year" )  ; 
form.cy.focus();
return false; 
}

if ( form.theDate1.value=='')
{
alert ( "Please Select the date" )  ; 
form.theDate1.focus();
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

<script type="text/javascript" src="script.js"></script>
    <link type="text/css" rel="stylesheet" href="css/calendar.css?random=20051112" media="screen"></LINK>
    <SCRIPT type="text/javascript" src="css/calendar.js?random=20060118"></script>

<link rel="stylesheet" href="img/CormsStyle.css">
<link href="img/complete.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	color: #0000FF;
	font-weight: bold;
	font-size: 18px;
}
-->
</style>
</head>
   
<?php include_once("insideheader.inc.php"); ?>



	 
 <td border="0" bgcolor="#ffffff" valign="top" width="900"><!--begin Product Info module--></td>
	      
		 			<!--  <br> -->
 <table border="0" cellpadding="0" cellspacing="0" width="900">
			  
			  <tr bgcolor="#ffffff">
			    <td colspan="3"><div align="center">
	              ~Create Cause list~ Logged in::
                  <?php echo $authority?>
                  </div>		        </td>
    </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3" class="headerhome"><div align="center"><?php echo $successmsg?></div></td>
      </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3" class="headerhome">&nbsp;</td>
      </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3" class="headerhome"></td>
      </tr>
			  <tr bgcolor="#ffffff">
			    <td height="192" colspan="3"><form name="Create Patient" method="post" action="" enctype="multipart/form-data" onSubmit="return ValidateForm(this)">
			      <table width="842" height="147" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="30"><strong>Date</strong></td>
                      <td><input name="theDate1" type="text" id="theDate1" size="30" maxlength="20" readonly="readonly" >
                      <input name="button" type="button" onClick="displayCalendar(document.forms[0].theDate1,'dd-mm-yyyy',this)" value="Cal"></td>
                      <td width="29">&nbsp;</td>
                      <td height="31"><strong>Counsel</strong></td>
                      <td><select name="counsil">
					  				<option>Select the Counsil Name</option>
					  				<option value="G.Masilamani">G.Masilamani</option>
									<option value="G.M.Mani">G.M.Mani</option>
					  		</select></td>
                    </tr>
					<tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
					<tr>
                      <td width="151"><strong>Case Type</strong></td>
                      <td width="240"><?php
  $result = mysql_query("SELECT * FROM pix_floder order by floder ASC");
?> <select name="ct" id="ct" class="txtAll">
<option>Select the  case type</option>
<?php
while($row = mysql_fetch_array($result))
{?>
	         <option><?php echo $row['1'] ?></option>
          <?php } ?></select>        </td>
                      <td width="29">&nbsp;</td>
                      <td width="145"><strong>Case No</strong></td>
                      <td width="277"><input name='cn' type='text' id="cn" size="15" maxlength="250"/>
                        <strong>Year</strong>
                        <input name="cy" type="text" id="cy" size="15" maxlength="20"/></td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="31"><strong>Court Hall</strong></td>
                      <td><input name='ch' type='text' id="ch" size="40" maxlength="250"></td>
                      <td>&nbsp;</td>
                      <td><strong>Judge </strong></td>
                      <td><input name="jud" type="text" id="jud" size="40" maxlength="250">                      </td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
						<td width="145"><strong>Item No</strong></td>
                      <td width="277"><input name="it_no" type="text" id="it_no" size="14" maxlength="20">
                        <strong>Page No</strong>
                        <input name="p_no" type="text" id="p_no" size="14" maxlength="20"></td>
                      <!--<td height="30"><strong>Item No</strong></td>
                      <td></td>-->
                      <td>&nbsp;</td>
                      <!--<td><strong>Incharge-Advocate</strong></td>
                      <td><input name="adv" type="text" id="adv" size="40" maxlength="20"></td>-->
                      <td height="30"><strong>Client Name</strong></td>
                      <td><input name="cl_nam" type="text" id="cl_nam" size="40" maxlength="250"></td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
					  <td><strong>Next Date of Hearing</strong></td>		
                      <td><input name="hearing" type="text" id="hearing" size="30" maxlength="20">
					  <input name="button" type="button" onClick="displayCalendar(document.forms[0].hearing,'yyyy-mm-dd',this)" value="Cal"></td>
					  <td>&nbsp;</td>
					  <td height="30"><strong>Remarks</strong></td>
                      <td><textarea name="remark" id="remark" rows="3" cols="38"></textarea></td>
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
                                    <td><input name="submit" type='submit' class="butAll"  value='Save'></td>
									<td>
									<input name="usname" type="hidden" id="usname"  value="<?php echo $uname?>">
									</td>
                                  </tr>
                  </table>
				  
                                                       <div align="center"> <table bgcolor="0330A1" style="width:100%;" border="0" cellpadding="3" cellspacing="1" >
													   <tr bgcolor="#ffffff">
													   <?php if(($_POST['theDate1'])&&($_POST['counsil']))
															{	
															$coun=$_POST['counsil'];
															$datee=$_POST['theDate1'];
																	$sql2 = mysql_query("SELECT * FROM pix_causelist WHERE user_date LIKE '$date'");
																	while ($rrr=mysql_fetch_array($sql2))
	  																	{
																			 $datee=$rrr['user_date'];
	 																		 $counsii=$rrr['counsi'];
																		}
															}
														?>
                      <td colspan="10"><div align="center" class="style1">Daily Cause List <?php //echo $counsii; ?> </div> </td>
                    </tr>

               												
                <tr class="thtitle">
<!--              <td width="8%"  bgcolor="#AAAAAA" style="width:10%;"><div align="center"><strong>S.No</strong></div></td>-->
                  <td width="8%"  bgcolor="#AAAAAA" style="width:10%;"><div align="center"><strong>Case Type </strong></div></td>
                  <td width="8%"  bgcolor="#AAAAAA" style="width:10%;"><div align="center"><strong>Case No. </strong></div></td>
                  <td width="8%"  bgcolor="#AAAAAA" style="width:10%;"><div align="center"><strong>Court Hall</strong></div></td>
                  <td width="8%"  bgcolor="#AAAAAA" style="width:10%;"><div align="center"><strong>Judge</strong></div></td>
                  <td width="8%"  bgcolor="#AAAAAA" style="width:10%;"><div align="center"><strong>Item No</strong></div></td>
                  <td width="5%"  bgcolor="#AAAAAA" style="width:10%;"><div align="center"><strong>Page No</strong></div></td>
                  <td width="11%"  bgcolor="#AAAAAA" style="width:13%;"><div align="center"><strong>Incharge-Advocate</strong></div></td>
                  <td width="8%"  bgcolor="#AAAAAA" style="width:10%;"><div align="center"><strong>Client Name</strong></div></td>
                  <td width="21%"  bgcolor="#AAAAAA" style="width:25%;"><div align="center"><strong>Next Date of Hearing</strong></div></td>
                  <td width="15%"  bgcolor="#AAAAAA" style="width:10%;"><div align="center"><strong>Remarks</strong></div></td>
               </tr>
                <?php 
	
if(($_POST['ct'])&&($_POST['theDate1']))
{	
	$caseno=$_POST['cn'];
	//echo $date;
	
	$sql1 = mysql_query("SELECT * FROM pix_causelist WHERE user_date LIKE '$date'");
while ($rr=mysql_fetch_array($sql1))
	  {
	 $casetyp=$rr[01];
	 $caseno=$rr[02];
	 $caseyr=$rr[03];
	 $hall=$rr[04];
	 $jud=$rr[05];
	 $item_no=$rr[06];
	 $page_no=$rr[07];
	 //$in= $rr['incharg'];
	 $advoc=$rr['advocate'];
	 $client=$rr['cli_nam'];
	 $hearing=$rr['next_hearing'];
	 $remark=$rr['remarks'];
	 

echo ("<tr class='initial' onMouseOver=this.className='highlight' onMouseOut=this.className='normal' >");
		
		//echo ("<td width='7%'><div align='center'>" .$i. "</div></td>");
		
		echo("<td width='3%' ><div align='center'><strong>" .$casetyp. "</strong></div></td>");
 		echo ("<td width='4%'><div align='center'><strong>" .$caseno."/".$caseyr. "</strong></div></td>");
		echo ("<td width='5%'><div align='center'><strong>" .$hall. "</strong></div></td>");
 		echo ("<td width='7%'><div align='center'><strong>" .$jud. "</strong></div></td>");
     	echo ("<td width='7%'><div align='center'><strong>" .$item_no. "</strong></div></td>");
		echo ("<td width='7%'><div align='center'><strong>" .$page_no. "</strong></div></td>");
     	echo ("<td width='7%'><div align='center'><strong>" .$advoc. "</strong></div></td>");
     	echo ("<td width='7%'><div align='center'><strong>" .$client. "</strong></div></td>");
		echo ("<td width='7%'><div align='center'><strong>" .$hearing. "</strong></div></td>");
		echo ("<td width='7%'><div align='center'><strong><a href=viewdetail.php?id=".$row["sno"].">" .$remark. "</a></strong></div></td>");
		echo ("</tr>");
	$i++;

	  }
}	 
?>
                
 
              </table></div>
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
