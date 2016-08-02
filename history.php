<?php
session_start();
if (!isset($_SESSION['loginUserID']))
{
	header("location:index.php");
	exit();
}
$loginUserId = $_SESSION['loginUserID'];
$authority = $_SESSION['authority'];
?>

<html><head>
<title>View History</title>

<?php 
include_once("connopen.inc");
include_once("cssscriptlink.inc"); ?>
</head>
<br>

<?php include_once("insideheader2.inc.php"); ?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width=90%>
	<tr>
		<td>
			<form name = "frmMain" id = "frmMain" action="">

<!-- table contain form elemnts to get user detail -->

				

<table  bgcolor="0330A1" border="0" cellpadding="3" cellspacing="1" align="center" width="80%" > 
<tr class="thtitle">            
                 		<td width="6.5%" >S.no</td>
						<td width="6.5%" >Date</td>
						<td width="6.5%" >Case No/Year</td>
                  		<td width="6.5%" >Case Type</td>
                  		<td width="6.5%"  >Court Hall</td>
                  		<td width="6.5%"  >Judge</td>
                  		<td width="6.5%" >Item No </td>                                 
				  		<td width="6.5%" >Page No</td>
				  		<td width="6.5%" >Incharge-Advocate </td>
						<td width="6.5%" >Client Name</td>
                  		<td width="6.5%" >Next Date of Hearing</td>
                  		<td width="6.5%" >Remarks</td>
          			</tr>
<?php
/*$totRec = 0;
$recordsPerPage = $RowsPerPage;
$startRec = 0;

$startRec = ($targetPage - 1) * $recordsPerPage;*/
$tbl_name="pix_causelist";	

 	$case_no= trim($_REQUEST['cno']);
	$case_typ=trim($_REQUEST['typ']);
	$c_yer=trim($_REQUEST['c_yr']);
	
	$sql = "SELECT * FROM $tbl_name where caseno='$case_no' AND casetype='$case_typ' AND c_year='$c_yer'";  

	
 	$rs = mysql_query($sql,$connection)or die(mysql_error());
	$numrows = mysql_num_rows($rs);

	if($numrows == 0)
	{
 		echo ("<tr class='thtitle'><td align=center colspan=10 style='color:red'> No data found </td></tr>");
		
	}
	
$i = 1;  

	while ($row = mysql_fetch_array($rs))
	{
		echo ("<tr class='initial' onMouseOver=this.className='highlight' onMouseOut=this.className='normal' >");
		
		echo ("<td width='7%'>" .$i. "</td>");
		echo ("<td width='7%'>" .$row['user_date']. "</td>");
		echo("<td width='3%' >" .$row["caseno"]."/".$row["c_year"]. "</td>");
 		echo ("<td width='4%'>" .$row["casetype"]. "</td>");
		echo ("<td width='5%'>" .$row["c_hall"]. "</td>");
 		echo ("<td width='7%'>" .$row["judg"]. "</td>");
     	echo ("<td width='7%'>" .$row["item_no"]. "</td>");
		echo ("<td width='7%'>" .$row["pag_no"]. "</td>");
     	echo ("<td width='7%'>" .$row["advocate"]. "</td>");
     	echo ("<td width='7%'>" .$row["cli_nam"]. "</td>");
		echo ("<td width='7%'><strong>" .$row["next_hearing"]. "</strong></td>");
		echo ("<td width='7%'><a href=viewdetail.php?id=".$row["sno"].">" .$row["remarks"]. "</a></td>");
		echo ("</tr>");
	$i++;
	}
echo ("</table>");
?>
 
		
 

 
</table>

</form>
<a href="excel.php?cno=<?php echo $case_no; ?>&typ=<?php echo $case_typ; ?>&c_yr=<?php echo $c_yer; ?>">Export</a>
</td></tr>


			  <!-- BODY CONTENT- END   -->
<?php include("loginfooter.inc.php"); ?>

