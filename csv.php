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

$msg = $_REQUEST['msg']; 




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

</head>
   
<?php include_once("insideheader.inc.php"); ?>
 
	 
 
	      
		 			<!--  <br> -->
 <table border="0" cellpadding="0" cellspacing="0" width="900">

			  <tr bgcolor="#ffffff">
			    <td colspan="3"><div align="center">
	              ~Csv to Mysql~ Logged in::
                  <?php echo $authority?>
                  </div></td>
    </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3">&nbsp;</td>
   </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3">


</ul></td>
    </tr>
			  <tr bgcolor="#ffffff">
			  <td colspan="3"></td>
			  </tr>
			
			<tr bgcolor="#ffffff">
			<td width="20"><img src="images/spacer.gif" border="0" height="1" width="20"></td>
              <td class="price" valign="middle" width="867"><form action="php_csv_mysql_upload2.php" method="post" enctype="multipart/form-data" name="form1" >
			  <table align="center" cellpadding="0" cellspacing="0" >
			 



  <tr>
    <td height="27" colspan="2"><div align="center" class="date">
      <?php echo $msg;?>
    </div></td>
    </tr>
  <tr>
   
    <td height="27" colspan="2"><div align="center">
      <input name="fileCSV" type="file" id="fileCSV" size="40">  
    </div></td>
    </tr>
  
  <tr>
    <td width="126">&nbsp;</td>
    <td width="300">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input name="Submit" type="submit" class="butAll" value="Submit"  />
    </div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"></td>
  </tr>
  <tr>
    <td colspan="2"><?php
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
