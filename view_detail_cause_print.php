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




<?php $no = $_REQUEST['ide'];
 $msg = $_REQUEST['msg']; 
include_once("connopen.inc");
?>

   
<?php //include_once("insideheader.inc.php"); ?>

	<?php

$sql = "select * from pix_causelist where id = '$no'";
$res = mysql_query($sql);

while($data = mysql_fetch_array($res)){

$couns=$data['counsi'];
$sno = $data['id'];
$cty =$data['casetype'];
$cno = $data['caseno'];
$Pname=$data['c_year'];
$Rname=$data['c_hall'];
$year=$data['judg'];
$LC=$data['item_no'];
$Scl=$data['pag_no'];
$Hc=$data['advocate'];
$Sc=$data['cli_nam'];
/*Next Dates of Hearing Coversion */
	 $DD = $data['next_hearing'];
   /*  $DD = date("d-m-Y", strtotime($org_Date));
 End Dates of Hearing Coversion */
$file1=$data['remarks'];
/*Date Coversion */
 $originalDate = $data['user_date'];
 $ddd = date("d-m-Y", strtotime($originalDate));
 /*End Date Coversion */


}
?>
 
<html>
	<head>
		<title>.::ERASv2::.</title>
		<link rel="stylesheet" href="images/style.css" type="text/css">
		<style type="text/css">
			.nap td
			{

			border-collapse:collapse;

			border:1px solid black;
			}
		</style>
		<?php include_once ("cssscriptlink.inc"); ?>
	</head>
	<body onload="window.print()" leftmargin="0" topmargin="0"  marginheight="0" marginwidth="0">
		<div align="center">
			<table width="900" border="0" cellpadding="0" cellspacing="0" bgcolor="#003366" height="50">
				<tbody>
					<tr>
						<td width="350">
							<!--begin local nav module-->
							<table bgcolor="#003366" border="0" cellpadding="0" cellspacing="0" >
								<tbody>
									<tr>
										<td valign="top"><img src="images/gmma.jpg" ></td>
									</tr>
								</tbody>
							</table>
						</td>
						<td align="center" bgcolor="#003366" width="655">
						<div align="right">
							<img src="images/gma.jpg" width="600" >
						</div>
						</td>
					</tr>
				</tbody>
			</table> 
			<table border="0" cellpadding="0" cellspacing="0" width="900">
				<tbody>
					<tr bgcolor="#000000">
						<td>
							<img src="images/spacer.gif" border="0" height="1" width="745">
						</td>
					</tr>
				</tbody>
			</table>      
 
	      
		 			<!--  <br> -->
		 			<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr bgcolor="#ffffff">
                        <td colspan="3"></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td colspan="3"><div align="center"><span class="form">~View Case~</span></div></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td colspan="3"><div align="center"><?php echo $msg;?></div></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td colspan="3"></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td colspan="3">
						<form name="Update_Patient" id="Update_Patient" action="edit_cause_list.php?idd=<?php echo $sno;?>" method="post" >
                            <table width="840" height="384" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td bgcolor="#FFFFFF">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF">&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="193" bgcolor="#FFFFFF"><strong>Date</strong></td>
                                <td width="200" class="disc"><?php echo $ddd;?></td>
                                <td width="6">&nbsp;</td>
                                <td width="198" bgcolor="#FFFFFF"><strong>Counsel</strong></td>
                                <td width="243" class="disc"><?php echo $couns; ?></td>
                              </tr>
                              <tr>
                                <td bgcolor="#FFFFFF">&nbsp;</td>
                                <td class="disc">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF">&nbsp;</td>
                                <td class="disc">&nbsp;</td>
                              </tr>
                              <tr>
                                <td bgcolor="#FFFFFF"><strong>Case Type</strong></td>
                                <td class="disc"><?php echo  $cty;?></td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF"><strong>Case No/Year</strong></td>
                                <td class="disc"><?php echo $cno;?>
                                <strong>/<?php echo $Pname;?>                                </strong></td>
                              </tr>
                              <tr>
                                <td height="24" bgcolor="#FFFFFF">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF">&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="193" bgcolor="#FFFFFF"><strong>Court Hall</strong></td>
                                <td width="200" class="disc"><?php echo $Rname;?></td>
                                <td width="6">&nbsp;</td>
                                <td width="198" bgcolor="#FFFFFF"><strong>Judge</strong></td>
                                <td width="243" class="disc"><?php echo $year; ?></td>
                              </tr>
                              <tr>
                                <td nowrap="nowrap" >&nbsp;</td>
                                <td></td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF">&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="23" ><strong>Item No</strong></td>
                                <td class="disc"><?php echo $LC;?></td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF"><strong>Page No </strong></td>
                                <td class="disc"><?php echo $Scl;?></td>
                              </tr>
                              <tr>
                                <td height="23" >&nbsp;</td>
                                <td class="disc">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF">&nbsp;</td>
                                <td class="disc">&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="23" ><strong>Incharge-Advocate</strong></td>
                                <td class="disc"><?php echo $Hc;?></td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF"><strong>Client Name</strong></td>
                                <td class="disc"><?php echo $Sc;?></td>
                              </tr>
                              <tr>
                                <td height="23" >&nbsp;</td>
                                <td class="disc">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF">&nbsp;</td>
                                <td class="disc">&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="23" ><strong>Next Date of Hearing</strong></td>
                                <td class="disc"><?php echo $DD;?></td>
                                <td>&nbsp;</td>
                                <td><strong>Remarks</strong></td>
                                <td class="disc"><?php echo $file1; ?></td>
                              </tr>
                              <tr>
                                <td  >&nbsp;</td>
                                <td class="disc">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF"></td>
                                <td class="disc">&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF"></td>
                                <td class="disc">&nbsp;</td>
                              </tr>
                              <tr>
                                <td colspan="5" >&nbsp;</td>
                              </tr>
                              <tr>
							 
                                <td colspan="5" ></td>
                              </tr>
                              <tr>
                                <td colspan="5"></td>
                              </tr>
                              <tr>
                                <td colspan="5"><div align="center">
                                 </td>
								
								<!--<td width="253" class="disc"> echo $street; ?></td>-->
						      </tr>
                          </table>
                        </form></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td>&nbsp;</td>
                        <td class="price" valign="middle">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td width="20"><img src="images/spacer.gif" border="0" height="1" width="20" /></td>
                        <td class="price" valign="middle" width="867">&nbsp;</td>
                        <td width="13" align="center">&nbsp;                          </td>
                      </tr>
                     <!-- <tr bgcolor="#ffffff">
                        <td colspan="3"><iframe id="content" name="content" frameborder="0" width="850" height="500"> </iframe></td>
                      </tr> 
                      <tr>
                        <td></tbody></td>
                      </tr>-->
                    </table>
					<table border="0" cellpadding="0" cellspacing="0" width="900">
						<tbody>
							<tr bgcolor="#000000">
								<td><img src="images/spacer.gif" border="0" height="1" width="745"></td>
							</tr>
						</tbody>
					</table>      

		</div>
	</body>
</html>
	


