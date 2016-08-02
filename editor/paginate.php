<?php
session_start();
if (!isset($_SESSION['loginUserID']))
{
	header("location:index.php");
	exit();
}
$loginUserId = $_SESSION['loginUserID'];
$authority = $_SESSION['authority'];

$RowsPerPage = (isset($_SESSION['RowsPerPage']))?$_SESSION['RowsPerPage']:40;
$currentPage = (isset($_REQUEST['currentPage']))? $_REQUEST['currentPage']:1;
$targetPage = (isset($_REQUEST['targetPage']))?$_REQUEST['targetPage']:1;
$totalPage = (isset($_REQUEST['totalPage']))?$_REQUEST['totalPage']:1;

switch ($targetPage)
{
	case "pre":
	{	$targetPage = ($currentPage > 1)? $currentPage - 1 :$currentPage; 		
		break;
	}
	case "next":
	{	$targetPage = ($currentPage < $totalPage)? $currentPage+1 :$currentPage; 		
		break;
	}
}
?>
<html><head>
<title>Display Users</title>

<?php 
include_once("connopen.inc");
include_once("cssscriptlink.inc"); ?>
<style type="text/css">
<!--
.style1 {
	color: #0000FF;
	font-weight: bold;
	font-size: 16;
}
-->
</style>
</head>
<br>

<?php include_once("insideheader2.inc.php"); ?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width=90%>
	<tr>
		<td>
			<form name = "frmMain" id = "frmMain" action="javascript:;">

<!-- table contain form elemnts to get user detail -->

				

<table  bgcolor="0330A1" border="0" cellpadding="3" cellspacing="1" align="center" width="80%" > 
											<tr bgcolor="#ffffff">
															<?php $counn=$_POST['advoc'];
																 $datee=$_POST['theDate1'];
																 $heari=$_POST['hearing']; ?>
																	
                      								<td colspan="11"><div align="center" class="style1">Daily Cause List:&nbsp;<?php echo $counn; ?>&nbsp;:-&nbsp;<?php echo $datee;?>&nbsp;:-&nbsp;<?php echo $heari;?></div></td>
                    						</tr>
<tr class="thtitle">            
                 		<td width="6.5%" >S.no</td>
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
$totRec = 0;
$recordsPerPage = $RowsPerPage;
$startRec = 0;

$startRec = ($targetPage - 1) * $recordsPerPage;
$tbl_name="pix_causelist";	

 	$cno= trim($_REQUEST['txtcno']);
	/*Date Coversion */
 $date = $_REQUEST['theDate1'];
 /*$date = date("Y-m-d", strtotime($originalDate));
 End Date Coversion */
 /*Next Dates of Hearing Coversion */
	 $org_Date = $_POST['hearing'];
	 //$hearing = date("Y-m-d", strtotime($org_Date));
 /*End Dates of Hearing Coversion */
 	$advo=trim($_REQUEST['advoc']);
 	
	$sql = "SELECT * FROM $tbl_name where 1=1 ";  

	if($cno !='')
	{
		$sql.=" and caseno = $cno ";   
	}  
	if($date !='')
	{
		$sql .= " and  user_date LIKE '%" . $date . "%' " ; 
	}
	if($org_Date !='')
	{
		echo $sql .= " and  next_hearing LIKE '%" . $org_Date . "%' " ; 
	}
	if($advo =='G.Masilamani')
	{
		$sql .= " and  counsi LIKE '%" . $advo . "%' " ; 
	}
	if($advo =='G.M.Mani')
	{
		 $sql .= " and  `counsi`!='G.Masilamani'" ; 
	}
	/*if($LC !='')
	{
		$sql .= " and  LC_Counsel LIKE '%" . $LC . "%' " ; 
	}
	if($year !='')
	{
		$sql.=" and year = '$year' ";   
	} 
	if($scl !='')
	{
		$sql.=" and Senior_C LIKE '%" . $scl . "%'  " ; 
	} 
if($hc !='')
	{
		$sql.=" and H_C LIKE '%" . $hc . "%' " ;  
	} 
	if($sc !='')
	{
		$sql.=" and S_C LIKE '%" . $sc . "%' " ; 
	} 
	if($cty !='')
	{
		$sql.=" and case_Type = '$cty' ";   
	} */
 	 $sql.=" order by user_date LIMIT $startRec, $recordsPerPage ";


	$rs = mysql_query($sql,$connection);
	$numrows = mysql_num_rows($rs);

	if($numrows == 0)
	{
 		echo ("<tr class='thtitle'><td align=center colspan=10 style='color:red'> No data found </td></tr>");
		
	}
	
$i = $startRec+1;  

	while ($row = mysql_fetch_array($rs))
	{
		echo ("<tr class='initial' onMouseOver=this.className='highlight' onMouseOut=this.className='normal' >");
		
		echo ("<td width='7%'>" .$i. "</td>");
		
		echo("<td width='3%' ><a href=view_detail_cause.php?ide=".$row["id"]. ">" .$row["caseno"]."/".$row["c_year"]. "</a></td>");
 		echo ("<td width='4%'><a href=view_detail_cause.php?ide=".$row["id"].">" .$row["casetype"]. "</a></td>");
		echo ("<td width='5%'><a href=view_detail_cause.php?ide=".$row["id"].">" .$row["c_hall"]. "</a></td>");
 		echo ("<td width='7%'><a href=view_detail_cause.php?ide=".$row["id"].">" .$row["judg"]. "</a></td>");
     	echo ("<td width='7%'><a href=view_detail_cause.php?ide=".$row["id"].">" .$row["item_no"]. "</a></td>");
		echo ("<td width='7%'><a href=view_detail_cause.php?ide=".$row["id"].">" .$row["pag_no"]. "</a></td>");
     	echo ("<td width='7%'><a href=view_detail_cause.php?ide=".$row["id"].">" .$row["advocate"]. "</a></td>");
		echo ("<td width='7%'><a href=view_detail_cause.php?ide=".$row["id"].">" .$row["cli_nam"]. "</a></td>");
		echo ("<td width='7%'><a href=view_detail_cause.php?ide=".$row["id"].">" .$row["next_hearing"]. "</a></td>");
		echo ("<td width='7%'><a href=view_detail_cause.php?ide=".$row["id"].">" .$row["remarks"]. "</a></td>");

		echo ("</tr>");
	$i++;
	}
echo ("</table>");
 
		
 $sql1 = "SELECT count(id) FROM $tbl_name where 1=1 "; 


if($cno !='')
{
	$sql1.=" and caseno = $cno ";   
}  
if($date !='')
{
	 $sql1 .= " and  user_date LIKE '%" . $date . "%' " ; 
}
if($advo =='1')
	{
		$sql .= " and  counsi LIKE '%" . $advo . "%' " ; 
	}
if($advo =='2')
	{
		echo $sql .= " and  `counsi`!='1'" ; 
	}
/*if($advo !='')
{
	$sql1 .= " and  advocate LIKE '%" . $advo . "%' " ; 
}
if($LC !='')
{
	$sql1 .= " and  LC_Counsel LIKE '%" . $LC . "%' " ; 
}
if($year !='')
{
	$sql1.=" and year = '$year' ";   
}  
if($cty !='')
{
	$sql1.=" and case_Type = '$cty' ";   
} 
if($scl !='')
	{
		$sql.=" and Senior_C LIKE '%" . $scl . "%' " ; 
	} 
if($hc !='')
	{
		$sql.=" and H_C LIKE '%" . $hc . "%' " ;  
	} 
	if($sc !='')
	{
		$sql.=" and S_C LIKE '%" . $sc . "%' " ; 
	} 
*/
 $rs = mysql_query($sql1,$connection);

$row = mysql_fetch_array($rs);

 $totRec = $row[0];
if (($totRec % $recordsPerPage) != 0) 
{	
	$totalPage = (int)($totRec / $recordsPerPage) + 1;	
} 
else 
{	
	$totalPage = (int) ($totRec / $recordsPerPage);		
}

$currentPage = $targetPage;

$previous = "";
$next = "";
$cbo = "";

/*$cbo = "<select align = center name = cboPgNo id = cboPgNo onchange = 'chgPg()'>";
for ($i = 1; $i <= $totalPage; $i++)
{
	$cbo	.=  "<option value = " .$i. ">" .$i. "</option>";	
} 

$cbo .= "</select>";*/

if ($currentPage == 1)
{
	$previous = "Previous"; 		
}
else
{ 
	$previous = "<a href =" .$_SERVER['PHP_SELF']. "?currentPage=" .$currentPage."&targetPage=pre&totalPage=" . $totalPage. "&txtcno=" .$cno ."&txtct=" .$cty .
		"&txtpname=" .$Pname .
		"&txtrname=" .$Rname .
		"&txtyrs=" .$year .
		"&txtScl=" .$scl .
		"&txtHc=" .$hc .
		"&txtSc=" .$sc .
		"&txtLc=" .$LC .
		"> << Previous </a> "; 		
}

if($numrows == 0)
$currentPage = 0;	

if ($currentPage == $totalPage)
{
	$next = "Next"; 
}	
else
{	
	$next = "<a class=usual href =" .$_SERVER['PHP_SELF']. "?currentPage=" .$currentPage."&targetPage=next&totalPage=" . $totalPage. "&txtcno=" .$cno ."&txtct=" .$cty .
		"&txtpname=" .$Pname .
		"&txtrname=" .$Rname .
		"&txtyrs=" .$year .
		"&txtScl=" .$scl .
		"&txtHc=" .$hc .
		"&txtSc=" .$sc .
		"&txtLc=" .$LC .
		">Next >></a> "; 
}
?>		
	
<table id = 'tblNavi' bgcolor="0330A1" border="0" cellpadding="3" cellspacing="1" align=center width = 80%>
<tr class="thead">

<td align = left width = 30%><?php //echo $previous?></td>
<td align = center ><?php //echo("Goto page " .$cbo ); ?><?php //echo $totRec;?><a href="excel_all.php?dat=<?php echo $_POST['theDate1']; ?>&coun=<?php echo $_POST['advoc']; ?>&h_date=<?php echo $org_Date; ?>">Export</a>
</td>
<!--<td align = center ><?php //echo("Goto page " .$cbo ); ?>Total <?php //echo $totRec;?> Records Found.</td>-->
<td align = right width = 30%><?php //echo $next?></td></tr>

 
</table>

</form>
</td></tr>
</table>

			  <table border="0" cellpadding="0" cellspacing="0" width="850">
     <tbody><tr bgcolor="#000000"><td><img src="images/spacer.gif" border="0" height="1" width="745"></td>
	 </tr></tbody></table>      
 <!-- BLACK BORDER - END  -->
			
 <!-- BODY CONTENT- END   -->
<?php include("loginfooter.inc.php"); ?>

<script language = "javascript">
	objForm = document.getElementById("frmMain");
	objForm.cboPgNo.value = <?php echo($currentPage); echo ("; \n");?>
	
function chgPg()
{
	var jumpTo = objForm.cboPgNo.value;
	url = "<?php echo ($_SERVER['PHP_SELF']. "?currentPage=" .$currentPage."&totalPage=" . $totalPage ); ?>" 		
	url += "&targetPage=" + jumpTo;
	location.href = url;				
}	
</script>