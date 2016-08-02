<?php
session_start();
if (!isset($_SESSION['loginUserID']))
{
	header("location:index.php");
	exit();
}
	$loginUserId = $_SESSION['loginUserID'];
	//$username    =$_SESSION['username'];
 	$authority=$_SESSION['authority'];
	

?>
<?php
include_once("connopen.inc");








?>
<?php
function getTime()
    {
    $a = explode (' ',microtime());
    return(double) $a[0] + $a[1];
    }
$Start = getTime();
?> 
<html>
<head>
<title>.:: ERAS ::.</title>
<?php include_once ("cssscriptlink.inc"); ?>

<link type="text/css" rel="stylesheet" href="css/calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="css/calendar.js?random=20060118"></script>

</head>
   
<?php include_once("insideheader.inc.php"); ?>
 
	 
 
	      
		 			<!--  <br> -->
 <table border="0" cellpadding="0" cellspacing="0" width="900">

			  <tr bgcolor="#ffffff">
			    <td colspan="3"><div align="center">
	              ~Search Page~ Logged in::
                  <?php echo $authority?>
                  </div></td>
    </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3">&nbsp;</td>
   </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3"><!--<ul id="countrytabs" class="shadetabs">
<li><a href="#" rel="#default" class="selected">Basic Search </a></li>
<li><a href="main2.php" rel="countrycontainer">Search </a></li>-->
<!--<li><a href="main3.php" rel="countrycontainer">ICD  Search </a></li>


</ul>--></td>
    </tr>
			  <tr bgcolor="#ffffff">
			  <td colspan="3"></td>
			  </tr>
			
			<tr bgcolor="#ffffff">
			<td width="20"><img src="images/spacer.gif" border="0" height="1" width="20"></td>
              <td class="price" valign="middle" width="867"><form name="" method="post" action="paginate.php" enctype="multipart/form-data">
			  <table align="center" cellpadding="0" cellspacing="0" id="countrydivcontainer">
			 



  <tr>
    <td height="27" colspan="5">&nbsp;</td>
    </tr>
  <tr>
   
    <!-- <td width="72" height="27"> <strong> Case No</strong></td>
   <td width="206"><input name="txtcno" type="text" id="txtcno" size="30" maxlength="300" /></td>-->
    <td width="100">&nbsp;</td>
	<td width="50">&nbsp;</td>
    <td width="54" height="27"> <strong>Date</strong></td>
    <td width="168"><input name="theDate1" type="text" id="theDate1" size="10" maxlength="250" readonly />
                    <input name="button" type="button" onClick="displayCalendar(document.forms[0].theDate1,'yyyy-mm-dd',this)" value="Cal"></td>
	<td width="25">&nbsp;</td>
	<td width="200" height="27"> <strong>Next Date of Hearing</strong></td>
    <td width="168"><input name="hearing" type="text" id="hearing" size="10" maxlength="250" readonly />
                    <input name="button" type="button" onClick="displayCalendar(document.forms[0].hearing,'yyyy-mm-dd',this)" value="Cal"></td>
	<td width="25">&nbsp;</td>
    <td width="78"><strong>Counsel</strong></td>
    <td width="262"><select name="advoc">
							<option value=""></option>
							<option value="G.Masilamani">G.Masilamani</option>
							<option value="G.M.Mani">G.M.Mani</option>
					</select></td>

  </tr>
 
  <tr>
    <td colspan="4">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="10"><div align="center">
      <input name="Submit" type="submit" class="butAll" value="Search"  />
    </div></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5"></td>
  </tr>
  <tr>
    <td colspan="5"><?php
/*$End = getTime();
echo "Time taken = ".number_format(($End - $Start),2)." secs";
*/?> </td>
  </tr>
</table>
			<!--<div align="center"> <table style="width:100%;" cellpadding="0" cellspacing="0" >
               
                <tr>
                  <td style="width:10%;"  bgcolor="#AAAAAA"><div align="center"><strong>Case Type </strong></div></td>
                  <td style="width:10%;"  bgcolor="#AAAAAA"><div align="center"><strong>Case No. </strong></div></td>
                  <td style="width:10%;"  bgcolor="#AAAAAA"><div align="center"><strong>Court Hall</strong></div></td>
                  <td style="width:10%;"  bgcolor="#AAAAAA"><div align="center"><strong>Judge</strong></div></td>
                  <td style="width:10%;"  bgcolor="#AAAAAA"><div align="center"><strong>Item No</strong></div></td>
                  <td style="width:10%;"  bgcolor="#AAAAAA"><div align="center"><strong>Page No</strong></div></td>
                  <td style="width:10%;"  bgcolor="#AAAAAA"><div align="center"><strong>Incharge</strong></div></td>
                  <td style="width:25%;"  bgcolor="#AAAAAA"><div align="center"><strong>Next Date of Hearing</strong></div></td>
                  <td style="width:10%;"  bgcolor="#AAAAAA"><div align="center"><strong>Remarks</strong></div></td>
               </tr>-->
                <?php 
	
/*if(($_POST['txtcno'])&&($_POST['theDate1'])&&($_POST['advoc']))
{	
	$caseno=$_POST['txtcno'];
	$date=$_POST['theDate1'].' 23:59:59';
	$adv=$_POST['theDate1'];
	
	
	$sql1 = mysql_query("SELECT * FROM pix_causelist WHERE caseno=$caseno");
while ($row1=mysql_fetch_row($sql1))
	  {
	 $casetyp=$row1[01];
	 $caseno=$row1[02];
	 $caseyr=$row1[03];
	 $hall=$row1[04];
	 $jud=$row1[05];
	 $item_no=$row1[06];
	 $page_no=$row1[07];
	 $incharge=$row1[08];
	 $hearing=$row1[09];
	 $remark=$row1[10];
*/	 
?>
<!--<tr bgcolor="">
                  <td bgcolor="#C9EEF1"><div align="center">
                      <?php echo '<a href="upload/'.$pfile.'" target="self">'.$casetyp.'</a>';?>
                  </div></td>
                  <td bgcolor="#C9EEF1"><div align="center">
                      <?php echo '<a href="upload/'.$pfile.'" target="self">'.$caseno.'/'.$caseyr.'</a>';?>
                  </div></td>
                   <td bgcolor="#C9EEF1"><div align="center">
                      <?php echo '<a href="upload/'.$pfile.'" target="self">'.$hall.'</a>';?>
                  </div></td>
                   <td bgcolor="#C9EEF1"><div align="center">
                      <?php echo '<a href="upload/'.$pfile.'" target="self">'.$jud.'</a>';?>
                  </div></td>
                   <td bgcolor="#C9EEF1"><div align="center">
                      <?php echo '<a href="upload/'.$pfile.'" target="self">'.$item_no.'</a>';?>
                  </div></td>
                   <td bgcolor="#C9EEF1"><div align="center">
                      <?php echo '<a href="upload/'.$pfile.'" target="self">'.$page_no.'</a>';?>
                  </div></td>
                   <td bgcolor="#C9EEF1"><div align="center">
                      <?php echo '<a href="upload/'.$pfile.'" target="self">'.$incharge.'</a>';?>
                  </div></td>
                   <td bgcolor="#C9EEF1"><div align="center">
                      <?php echo '<a href="upload/'.$pfile.'" target="self">'.$page_no.'</a>';?>
                  </div></td>
                   <td bgcolor="#C9EEF1"><div align="center">
                      <?php echo '<a href="upload/'.$pfile.'" target="self">'.$remark.'</a>';?>
                  </div></td>
              </tr>-->
<?php
/*	  }
}	 */
?>
                
 
<!--              </table></div>		
-->              </form>
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
 <!-- BLACK BORDER - END  -->
 	
 <!-- BODY CONTENT- END   -->
<?php include("loginfooter.inc.php"); ?>
	
</div>
<script type="text/javascript">

var countries=new ddajaxtabs("countrytabs", "countrydivcontainer")
countries.setpersist(true)
countries.setselectedClassTarget("link") //"link" or "linkparent"
countries.init()

</script>
</body>
</html>
