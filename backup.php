<?php
session_start();
if (!isset($_SESSION['loginUserID']))
{
	header("location:index.php");
	exit();
}
	$loginUserId = $_SESSION['loginUserID'];
 	$authority = $_SESSION['authority'];

//	$loginUserName = $_SESSION['loginUserName'];
?>
<?php
$con=mysql_connect("localhost","root","");
	/*if($con){
		echo "success";
	}else{ echo "fail";}*/
	$con1=mysql_select_db('omras',$con);
	/*if($con1){
		echo "success";
	}else{ echo "fail";}*/
	?>
    
    
<html>
<head>
<title>.:: OMRAS ::.</title>

<?php include_once ("cssscriptlink.inc"); ?>
<style>

}
.td {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11.7px;
}
.SGPromotions
{
    BORDER-BOTTOM: #FFC300 1px solid;
    BORDER-LEFT: #FFC300 1px solid;
    BORDER-RIGHT: #FFC300 1px solid;
    BORDER-TOP: #FFC300 1px solid;
    PADDING-BOTTOM: 1px;
    PADDING-LEFT: 1px;
    PADDING-RIGHT: 1px;
    PADDING-TOP: 1px
}
div.pagination {
	padding: 3px;
	margin: 3px;
}

div.pagination a {
	padding: 2px 5px 2px 5px;
	margin: 2px;
	border: 1px solid #AAAADD;
	
	text-decoration: none; /* no underline */
	color: #000099;
}
div.pagination a:hover, div.pagination a:active {
	border: 1px solid #000099;

	color: #000;
}
div.pagination span.current {
	padding: 2px 5px 2px 5px;
	margin: 1px;
		border: 1px solid #000099;
		background-color: #000099;
		color: #FFF;
	}
	div.pagination span.disabled {
		padding: 2px 5px 2px 5px;
		margin: 1px;
		border: 1px solid #EEE;
			color: #DDD;
	}
	
</style>



<link rel="stylesheet" href="images/style.css" type="text/css">
<style type="text/css">
<!--
.style3 {font-size: 12px}
body {
	margin-top: 0px;
	background-repeat: repeat-x;
}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
   
<?php include_once("insideheader2.inc.php"); ?>
 
	
 
	      
		 			<!--  <br> -->
					<table width="877" border="0" align='center' cellpadding="0" cellspacing="0"   >
                <tr bgcolor="#FFFFFF">
                  <td align="center" bgcolor="#FFFFFF">~View Page~ Loged in::
                  <?php echo $authority?>
                  <?php $msg = $_REQUEST['msg']; ?></td>
                </tr>
                <tr bgcolor="#FFFFFF">
                  <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr bgcolor="#FFFFFF">
                  <td align="center" bgcolor="#FFFFFF"><iframe frameborder="0" name="con" src="phpMyAdmin/db_details_export.php?db=eras&token=c81b3d1ed69c58158f78b6f93ca7efb8&goto=db_details_structure.php" width="850" height="375"></iframe></td>
                </tr>
                <tr bgcolor="#FFFFFF">
                  <td align="center" bgcolor="#FFFFFF"><?php echo $msg?></td>
              </tr></table>
 
			  <table width="877" border="0" align='center' cellpadding="0" cellspacing="0"  class="SGPromotions" >
                <tr bgcolor="#FFFFFF">
             <td width="36" nowrap    bgcolor="#FFFFFF" ></td>
                  <!---<td width="112" bgcolor="#FFFFFF"><strong>Patient Relation </strong></td>
                  <td width="108" nowrap bgcolor="#FFFFFF"><strong>Street</strong></td>
                  <td width="89" nowrap bgcolor="#FFFFFF"><strong>Village</strong></td>
                  <td width="73" bgcolor="#FFFFFF"><strong>P.O</strong></td>
                  <td width="155" bgcolor="#FFFFFF"><strong>Admission Dates</strong></td>
                  <td width="78" bgcolor="#FFFFFF"><strong>Patient File </strong></td>
				  <td width="21" bgcolor="#FFFFFF"> </td>
				  <td width="30" bgcolor="#FFFFFF"> </td>--->
                </tr>
				
            		
	
	
	
	
	              </table>
			  
			 
			 
			  

			  <table border="0" cellpadding="0" cellspacing="0" width="850">
     <tbody><tr bgcolor="#000000"><td><img src="images/spacer.gif" border="0" height="1" width="745"></td>
	 </tr></tbody></table>      
 <!-- BLACK BORDER - END  -->
			
 <!-- BODY CONTENT- END   -->
<?php include("loginfooter.inc.php"); ?>
	




