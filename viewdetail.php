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
$msg_id = $_REQUEST['msg'];
//	$loginUserName = $_SESSION['loginUserName'];
?>

<html>
<head>
<title>.:: ERAS  ::.</title>
<style type="text/css">

.nap td
{

border-collapse:collapse;

border:1px solid black;
}
</style>


<?php $no = $_REQUEST['id'];
// $msg = $_REQUEST['msg']; 
include_once("connopen.inc");

//text editor//
if($_POST['save']){
$id=@$_POST['id'];
$text=$_POST['elm1'];
if($id){
mysql_query("UPDATE pix_lawyer SET text='$text' WHERE sno='$id'") or die(mysql_error());
}else{
//mysql_query("INSERT INTO `editor` (`text`) VALUES('$text') ") or die(mysql_error());
}
}
//end text editor//

?>
<?php include_once ("cssscriptlink.inc"); ?>
</head>
   
<?php include_once("insideheader.inc.php"); ?>
 
	<?php

$sql = "select * from pix_lawyer where sno = '$no'";
$res = mysql_query($sql);

while($data = mysql_fetch_array($res)){


$sno = $data['sno'];
$cty =$data['case_Type'];
$cno = $data['case_no'];
$Pname=$data['Petitioner'];
$Rname=$data['Respondent'];
$year=$data['year'];
$LC=$data['LC_Counsel'];
$Scl=$data['Senior_C'];
$Hc=$data['H_C'];
$Sc=$data['S_C'];
$DD=$data['Date_Disposal'];
$file=$data['file'];
$dd=$data['time'];
$vaka=$data['vakalat'];
$file_doc=$data['file_doc'];

list($a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15) = split('[|]',$dd);
$dd1=$data['file1'];

//$usrname =$data['uname'];
//list($f1=$file1);

}
?>
 
 
	      
		 			<!--  <br> -->
		 			<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr bgcolor="#ffffff">
                        <td colspan="3"></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td colspan="3"><div align="center"><span class="form">~View Case~</span></div></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td colspan="3"><div align="center" class="msg <?php echo  $msg[$msg_id]['type'];?>"><span><?php echo  $msg[$msg_id]['text'];?></span></div></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td colspan="3"></td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td colspan="3">
						<form name="Update_Patient" id="Update_Patient" action="edit_case.php?id=<?php echo $sno;?>" method="post" >
                            <table width="840" height="384" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td bgcolor="#FFFFFF">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF">&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td bgcolor="#FFFFFF">Case Type</td>
                                <td class="disc"><?php echo  $cty;?></td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF">Case No/Yr</td>
                                <td class="disc"><?php echo $cno;?>
                                <strong>/<?php echo $year;?>                                </strong></td>
                              </tr>
                              <tr>
                                <td height="24" bgcolor="#FFFFFF">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF">&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="193" bgcolor="#FFFFFF">Petitioner/Appellant/Applicant</td>
                                <td width="200" class="disc"><?php echo $Pname;?></td>
                                <td width="6">&nbsp;</td>
                                <td width="198" bgcolor="#FFFFFF">Respondent/Defendant</td>
                                <td width="243" class="disc"><?php echo $Rname; ?></td>
                              </tr>
                              <tr>
                                <td nowrap="nowrap" >&nbsp;</td>
                                <td></td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF">&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="23" >L.C.Counsel</td>
                                <td class="disc"><?php echo $LC;?></td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF">Senior Counsel </td>
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
                                <td height="23" >Adv.on Record before H.C </td>
                                <td class="disc"><?php echo $Hc;?></td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF">Adv. on Record before S.C </td>
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
                                <td height="23" >Date of Disposal </td>
                                <td class="disc"><?php echo $DD;?></td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF">
                                Client Docket:</td>
                                <td class="disc">
								   <?php if($file !=''){
									?>
									<table width="88" border="0">
										<tr>
											<td width="53">
												<a href="http://localhost/ERASv2/upload/<?php echo $cty;?>/<?php echo $file;?>"  target=" _blank content" />     <?php echo $file?>
												</a>
											</td>
											<td width="25">
												<?php if($authority == "Management"){ ?>
													<a id="fileDocket" href="delete.php?nam=<?php echo $file; ?>&id=<?php echo $sno; ?>" >
														<img src="images/Delete.jpg" alt="Delete this file" width="10" height="11" border="0" title="Delete this file">
													</a>
												<?php } ?>
											</td>
										</tr>
									</table>
									 <?php } ?>
								 </td>
                              </tr>
                              <tr>
                                <td  >&nbsp;</td>
                                <td class="disc">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF"></td>
                                <td class="disc">&nbsp;</td>
                              </tr>
                              <tr>
                                <td height="23" >Date of filling Vakalat </td>
                                <td class="disc"><?php echo $vaka;?></td>
                                <td>&nbsp;</td>
                                <td>Client Documents</td>
                                <td bgcolor="#FFFFFF"><a href="edit.php?id=<?php echo $sno; ?>"><img src="images/doc.png" alt="Client Documents" width="40" height="40" border="0" title="Client Documents"></a></td>
                                <td class="disc">&nbsp;</td>
                              </tr>
							   <tr>
                                <td  >&nbsp;</td>
                                <td class="disc">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF">
                                Client Docs:</td>
                                <td class="disc">
									 <?php if($file_doc !=''){
									?>
									<table width="88" border="0">
										<tr>
											<td width="53">
												<a href="http://localhost/ERASv2/upload/<?php echo $cty;?>/<?php echo $file_doc;?>"  target=" _blank content" />     <?php echo $file_doc?>
												</a>
											</td>
											<td width="25">
												<?php if($authority == "Management"){ ?>
													<a id="fileDoc" href="delete.php?file_doc=<?php echo $file_doc; ?>&id=<?php echo $sno; ?>" >
														<img src="images/Delete.jpg" alt="Delete this file" width="10" height="11" border="0" title="Delete this file">
													</a>
												<?php } ?>
											</td>
										</tr>
									</table>
									 <?php } ?>
								</td>
                              </tr>
                              <tr>
                                <td  >&nbsp;</td>
                                <td class="disc">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF"></td>
                                <td class="disc">&nbsp;</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="disc">&nbsp;</td>
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
                                    <?php if($authority == "Management"){ ?><a href="history.php?cno=<?php echo $cno; ?>&typ=<?php echo $cty; ?>&c_yr=<?php echo $year; ?>"><img src="images/hearing.png" width="150" align="absmiddle"/></a>

									<input name="Submit" type='submit' class="butAll" value='EDIT' />
                                    <input type="text" name="id" value="<?php echo $sno; ?>" style="display:none" />
                                    <?php } ?>
                                    <label>
                                    <input name="CANCEL" type="button" class="butAll" value="BACK" onClick="history.go(-1)" />
                                    </label>
                                </div></td>
								
								<!--<td width="253" class="disc">  echo $street; ?></td>-->
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
                    </table><table border="0" cellpadding="0" cellspacing="0" width="900">
     <tbody><tr bgcolor="#000000"><td><img src="images/spacer.gif" border="0" height="1" width="745"></td>
	 </tr></tbody></table>      
<p id="confirmBox"></p>

<?php include("loginfooter.inc.php"); ?>
	


