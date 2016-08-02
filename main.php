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
<link rel="stylesheet" type="text/css" href="ajaxtab/ajaxtabs.css" />

<script type="text/javascript" src="ajaxtab/ajaxtabs.js">

/***********************************************
* Ajax Tabs Content script v2.2- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
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
			    <td colspan="3"><ul id="countrytabs" class="shadetabs">
<!--<li><a href="#" rel="#default" class="selected">Basic Search </a></li>-->
<li><a href="main2.php" rel="countrycontainer">Search </a></li>
<!--<li><a href="main3.php" rel="countrycontainer">ICD  Search </a></li>-->


</ul></td>
    </tr>
			  <tr bgcolor="#ffffff">
			  <td colspan="3"></td>
			  </tr>
			
			<tr bgcolor="#ffffff">
			<td width="20"><img src="images/spacer.gif" border="0" height="1" width="20"></td>
              <td class="price" valign="middle" width="867"><form action="pagination.php" method="post" >
			  <table align="center" cellpadding="0" cellspacing="0" id="countrydivcontainer">
			 



  <tr>
    <td height="27" colspan="5">&nbsp;</td>
    </tr>
  <tr>
   
    <td width="126" height="27"> <strong> Case No</strong></td>
    <td width="300"><input name="txtcno" type="text" id="txtcno" size="50" maxlength="300" /></td>
    <td width="11">&nbsp;</td>
    <td width="93"><strong>Petitioner</strong></td>
    <td width="300"><input name="txtpname" type="text" id="txtpname" size="50" maxlength="250" /></td>
  </tr>
  
  <tr>
    <td colspan="4">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5"><div align="center">
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
$End = getTime();
echo "Time taken = ".number_format(($End - $Start),2)." secs";
?> </td>
  </tr>
</table>
              </form>
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
