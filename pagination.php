<?php
session_start();
if (!isset($_SESSION['loginUserID']))
{
	header("location:index.php");
	exit();
}
$loginUserId = $_SESSION['loginUserID'];
$authority = $_SESSION['authority'];

$RowsPerPage = (isset($_SESSION['RowsPerPage']))?$_SESSION['RowsPerPage']:15;
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
</head>
<br>

<?php include_once("insideheader2.inc.php"); ?>
<table align="center" border="0" cellpadding="0" cellspacing="0" width=90%>
	<tr>
		<td>
			<form name = "frmMain" id = "frmMain" action="javascript:;">

<!-- table contain form elemnts to get user detail -->

				

<table  bgcolor="0330A1" border="0" cellpadding="3" cellspacing="1" align="center" width="80%" > 
<tr class="thtitle">            
                 		<td width="6.5%" >S.no</td><td width="6.5%" >Case No/Year</td>
                  		<td width="6.5%" >Case Type</td>
                  		<td width="6.5%"  >Petitioner</td>
                  		<td width="6.5%"  >Respondent</td>
                  		<td width="6.5%" >L.C.Counsel </td>                                 
				  		<td width="6.5%" >Senior Counsel</td>
				  		<td width="6.5%" >Adv. on Record before H.C </td>
                  		<td width="6.5%" >Adv. on Record before S.C </td>
                  		<td width="6.5%" >Date of Disposal</td>
          			</tr>
<?php
$totRec = 0;
$recordsPerPage = $RowsPerPage;
$startRec = 0;

$startRec = ($targetPage - 1) * $recordsPerPage;
$tbl_name="pix_lawyer";	

 	$cno= trim($_REQUEST['txtcno']);
 	$cty= trim($_REQUEST['txtct']);
 	$Pname=trim($_REQUEST['txtpname']);
 	$Rname=trim($_REQUEST['txtrname']);
 	$year=trim($_REQUEST['txtyrs']);
 	$LC=trim($_REQUEST['txtLc']);
	$scl=trim($_REQUEST['txtScl']);
	$hc=trim($_REQUEST['txtHc']);
	$sc=trim($_REQUEST['txtSc']);
	$docstr= trim($_REQUEST['docstr']);
	
	$sql = "SELECT * FROM $tbl_name where 1=1 ";  

	if($cno !='')
	{
		$sql.=" and case_no = '$cno' ";   
	}  
	if($Pname !='')
	{
		$sql .= " and  Petitioner LIKE '%" . $Pname . "%' " ; 
	}
	if($Rname !='')
	{
		$sql .= " and  Respondent LIKE '%" . $Rname . "%' " ; 
	}
	if($LC !='')
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
	} 
	if($docstr !='')
	{
		$sql .= " and  file_doc_text LIKE '%" . $docstr . "%' " ; 
	}
 	 $sql.=" order by year LIMIT $startRec, $recordsPerPage ";


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
		
		echo("<td width='3%' ><a href=viewdetail.php?id=".$row["sno"]. ">" .$row["case_no"]."/".$row["year"]. "</a></td>");
 		echo ("<td width='4%'><a href=viewdetail.php?id=".$row["sno"].">" .$row["case_Type"]. "</a></td>");
		echo ("<td width='5%'><a href=viewdetail.php?id=".$row["sno"].">" .$row["Petitioner"]. "</a></td>");
 		echo ("<td width='7%'><a href=viewdetail.php?id=".$row["sno"].">" .$row["Respondent"]. "</a></td>");
     	echo ("<td width='7%'><a href=viewdetail.php?id=".$row["sno"].">" .$row["LC_Counsel"]. "</a></td>");
		echo ("<td width='7%'><a href=viewdetail.php?id=".$row["sno"].">" .$row["Senior_C"]. "</a></td>");
     	echo ("<td width='7%'><a href=viewdetail.php?id=".$row["sno"].">" .$row["H_C"]. "</a></td>");
		echo ("<td width='7%'><a href=viewdetail.php?id=".$row["sno"].">" .$row["S_C"]. "</a></td>");
		echo ("<td width='7%'><a href=viewdetail.php?id=".$row["sno"].">" .$row["Date_Disposal"]. "</a></td>");
		echo ("</tr>");
	$i++;
	}
echo ("</table>");
 
		
 $sql1 = "SELECT count(sno) FROM $tbl_name where 1=1 "; 


if($cno !='')
{
	$sql1.=" and case_no = '$cno' ";   
}  
if($Pname !='')
{
	 $sql1 .= " and  Petitioner LIKE '%" . $Pname . "%' " ; 
}
if($Rname !='')
{
	$sql1 .= " and  Respondent LIKE '%" . $Rname . "%' " ; 
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

$cbo = "<select align = center name = cboPgNo id = cboPgNo onchange = 'chgPg()'>";
for ($i = 1; $i <= $totalPage; $i++)
{
	$cbo	.=  "<option value = " .$i. ">" .$i. "</option>";	
} 

$cbo .= "</select>";

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

<td align = left width = 30%><?php echo $previous?></td>
<td align = center ><?php //echo("Goto page " .$cbo ); ?>Total <?php echo $totRec?> Records Found.</td>
<td align = right width = 30%><?php echo $next?></td></tr>

 
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