<?php
/*
Author : Sara
Created Date : 29 May 2007
*/
session_start();
if (!isset($_SESSION['loginUserID']))
{
	header("location:login.php");
	exit();
}
	$loginUserId 	= $_SESSION['loginUserID'];
	$loginUserName 	= $_SESSION['loginUserName'];
	$CenterName 	= $_SESSION['CenterName'];
	$Webmaster		= $_SESSION['Webmaster'];

	$currentDate = date("Y-m-d");

	include_once("codeit.inc");
	include_once ("cssscriptlink.inc");
	include_once("ishahomeheader.inc.php");
	include_once("leftishahome.inc.php");
	include_once ("connopen.inc");
	include_once("modules/phpfunctions.inc");
?>

 <td border="0" bgcolor="#ffffff" valign="top" width="900"><!--begin Product Info module-->
 <table border="0" cellpadding="0" cellspacing="0" width="900" bgcolor="#ffffff">
			<tbody>
			<tr> <td> &nbsp; </td></tr>
			<tr bgcolor="#ffffff">
			<td width="20"><img src="home_files/spacer.gif" border="0" height="1" width="20"></td>
                <td class="price" valign="top" width="198"><strong>REPORTS</strong><br><br>      
					<table border="0" cellpadding="0" cellspacing="0" width="250">                  
						<tbody>

							<tr valign="top"><td width="198">
							<img src="images/nav_arrow_clear.gif" border="0" height="7" vspace="3" width="9">
							<a href="enrolment.php">Enrollment / Volunteers</a></td>
							</tr>
	
							<tr valign="top"> <td>&nbsp;  </td>   </tr>
							<tr valign="top">
								<td width="198">
									<img src="images/nav_arrow_clear.gif" border="0" height="7" vspace="3" width="9">
									<a href="donation_expenses_bar.php">Donation Expenses </a>
								</td>
							</tr>

							<tr valign="top"><td>&nbsp;  </td> </tr>
							<tr valign="top">
								<td width="198">
									<img src="images/nav_arrow_clear.gif" border="0" height="7" vspace="3" width="9">		
									<a href="generalreport.php"> Volunteers / Participants Details</a>
								</td>			
							</tr>
						
							<tr valign="top"> <td>&nbsp;  </td> </tr>
							<tr valign="top">
								<td width="198">
									<img src="images/nav_arrow_clear.gif" border="0" height="7" vspace="3" width="9">		
									<a href="monthlydetails.php"> # Monthly Reports   </a>
								</td>
							</tr>
						
						
							<tr valign="top"> <td>&nbsp;  </td>  </tr>
							<tr valign="top">
								<td width="198">
									<img src="images/nav_arrow_clear.gif" border="0" height="7" vspace="3" width="9">						
									<a href="sathsang.php"> # Sathsang Report  </a>
								</td>
							</tr>

							<tr valign="top"> <td>&nbsp;  </td>  </tr>
	
							<tr><td>&nbsp;</td></tr>
	
							<!-- Import -->
							<tr>
								<td width="100" class="price" valign="top" ><strong>IMPORT DATA </strong> 	</td>
							</tr>
						
							<tr valign="top"> <td>&nbsp;</td></tr>

							<tr valign="top">
								<td width="198">
									<img src="images/nav_arrow_clear.gif" border="0" height="7" vspace="3" width="9">
									<a href="cm_excel_class.php"> Import Class Report  </a>
								</td>
							</tr>
						
							<tr valign="top">  <td>&nbsp;  </td> </tr>
							
							<tr valign="top">
								<td width="198">
									<img src="images/nav_arrow_clear.gif" border="0" height="7" vspace="3" width="9">
									<a href="class_schedule.php"> Import Class Schedule </a>
								</td>
							</tr>
						
							<tr valign="top"> <td>&nbsp;  </td>		</tr>
							
							<tr valign="top">
								<td width="198">
									<img src="images/nav_arrow_clear.gif" border="0" height="7" vspace="3" width="9">
										<a href="cm_excel_monthly.php"> # Import Monthly Report  </a>
									</td>
							</tr>
						
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							
								<!-- TEMPLATE  -->
							<tr>
								<td width="100" class="price" valign="top" ><strong>TEMPLATE </strong> 	</td>
							</tr>
						
							<tr valign="top"> <td>&nbsp;</td></tr>

							<tr valign="top">
								<td width="198">
									<img src="images/nav_arrow_clear.gif" border="0" height="7" vspace="3" width="9">
									<a href="excel_template/CMCV1_Bgl_Kor_Jul08.xls"> Sample Class Report  </a>
								</td>
							</tr>
						
							<tr valign="top">  <td>&nbsp;  </td> </tr>
							
							<tr valign="top">
								<td width="198">
									<img src="images/nav_arrow_clear.gif" border="0" height="7" vspace="3" width="9">
									<a href="excel_template/class_schedule.xls"> Sample Class Schedule </a>
								</td>
							</tr>
												
							<tr> <td>&nbsp;</td> </tr>
						
							<tr> <td>&nbsp;</td></tr>
	
							<tr valign="top"> <td height="120">&nbsp;  </td>  </tr>
						 <!-- JUST TO INCREASE HEIGHT !-->
					   
					</tbody>
			</table>
	  </td>
			  
			  <td align="center" valign="top">
<b> 
<h4 class='sectionTitle' style="WIDTH:400px;"><p id = pStatus name = pStatus align=center><b style='color:#FFFFFF'>
<?php echo $loginUserName." | ".$CenterName."  ".(date("l d M y"));?> </b></p>

</h4> <br>
<div align='right' style padding-right: 20PX;>&nbsp;&nbsp;&nbsp;<h3><a href="class_report_full.php">More Details  </a></h2></div>

				<!-- CLASS REPORT STATUS START -->
<?php include("class_report_home.php"); ?>



				<!-- CLASS REPORT STATUS END -->
	<!-- BODY FOOTER --> 
<?php include("ishahomefooter.inc.php"); ?>
</html>




