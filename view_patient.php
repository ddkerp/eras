<?php
session_start();
if (!isset($_SESSION['loginUserID']))
{
	header("location:index.php");
	exit();
}
	$loginUserId = $_SESSION['loginUserID'];
 	$authority = $_SESSION['authority'];
  //$loginUsername = $_SESSION['loginUsername'];
//	$loginUserName = $_SESSION['loginUserName'];
?>
<?php

include_once("connopen.inc");
	?>
    
    
<html>
<head>
<title>.:: ERAS ::.</title>

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
	color:#000099;
}
div.pagination a:hover, div.pagination a:active {
	border: 1px solid #000099;

	color: #000;
}
div.pagination span.current {
	padding: 2px 5px 2px 5px;
	margin: 1px;
		border: 1px solid #000099;
		
		color: #000000 ;
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
                  <td align="center" bgcolor="#FFFFFF">~View Page~ Logged in::
                  <?php echo $authority?>
                  <?php $msg = $_REQUEST['msg']; ?></td>
                </tr>
                <tr bgcolor="#FFFFFF">
                  <td align="center" bgcolor="#FFFFFF"><?php echo $msg?></td>
              </tr></table>
 
			  <table width="877" border="0" align='center' cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" >
                <tr bgcolor="#FFFFFF">
            
                  <td width="66" bgcolor="#FFFFFF"><strong>Case No</strong></td>
                  <td width="55" bgcolor="#FFFFFF"><strong>Case Type</strong></td>
                  <td width="106" bgcolor="#FFFFFF"><strong>Petitioner</strong></td>
                  <td width="102" nowrap bgcolor="#FFFFFF"><strong>Respondent</strong></td>
                  <td width="78" nowrap bgcolor="#FFFFFF"><strong>L.C.Counsel </strong></td>
                                 
				  <td width="113" bgcolor="#FFFFFF"><strong>Senior Counsel</strong></td>
				  <td width="125" bgcolor="#FFFFFF"><strong>Advacate on Record before H.C </strong></td>
                  <td width="177" bgcolor="#FFFFFF"><strong>Advacate on Record before S.C </strong></td>
                  <td width="55" bgcolor="#FFFFFF"><div align="center"><strong>Date of Disposal</strong></div></td>
                </tr>
				
               <?php
	

	$tbl_name="pix_lawyer";		//your table name
	
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(sno) as num FROM $tbl_name ";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "view_patient.php"; 	//your file name  (the name of this file)
	$limit = 15; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
	
	
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	//echo "<pre>";
	//print_r($_REQUEST);
	/* Get data. */
	
	$cno= trim($_REQUEST['txtcno']);
	$cty= trim($_REQUEST['txtct']);
	$Pname=trim($_REQUEST['txtpname']);
	$Rname=trim($_REQUEST['txtrname']);
	$year=trim($_REQUEST['txtyrs']);
	$LC=trim($_REQUEST['txtLc']);
	$oo=trim($_REQUEST['r1']);
	//$d="5";
	
	if($cno != ''){
		$sql = "select * from $tbl_name where case_no = '$cno'";
		}
		
	else if($Pname != '' && $cty == ''){
	
	if ($oo =='1'){
     $sql = "select * from $tbl_name where Petitioner REGEXP  '^$Pname'  ";
   }else if($oo == '2') {
      //$oo = "2";
   
		$sql = "select * from $tbl_name where Petitioner REGEXP  '$Pname'  ";
		}
		else
		{
		$sql = "select * from $tbl_name where Petitioner LIKE '%" . $Pname . "%'";
		}
	}
	else if($Rname != ''){
		$sql = "select * from $tbl_name where Respondent LIKE '%" . $Rname . "%'";
	}
	else if($year != ''){
		$sql = "select * from $tbl_name where year = '$year'";
	}
	else if($cty != '' && $Pname == ''){
		$sql = "select * from $tbl_name where case_Type = '$cty'";
	}
	else if($year != ''){
		$sql = "select * from $tbl_name where year = '$year'";
	}
	else if($LC != ''){
		$sql = "select * from $tbl_name where LC_Counsel = '$LC'";
	}
	else if($Pname != '' && $Rname != ''){
		$sql = "select * from $tbl_name where Petitioner = '$Pname' and Respondent = '$Rname'";
	}
		
	else{
		$sql = "SELECT * FROM $tbl_name LIMIT $start, $limit";
	
	}
	
	//$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\"><< previous</a>";
		else
			$pagination.= "<span class=\"disabled\"><< previous</span>";	
		
		//pages	
		if ($lastpage < 7+ ($adjacents * 9))	//not enough pages to bother breaking it up I WILL CHANGE THE ADJECENT 2 TO 9
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next>></a>";
		else
			$pagination.= "<span class=\"disabled\">next>></span>";
		$pagination.= "</div>\n";		
	}
?>
	<?php
			$i = 1;
	$result = mysql_query($sql);
	
	$numrows = mysql_num_rows($result);
	
	if($numrows == 0)
{
 echo ("<tr class='thtitle'><td align=center colspan=10 style='color:red'> No data found </td></tr>");
}
	while($row = mysql_fetch_array($result))
		{
				?>
		
		         
               		<tr>
					<td><img src="images/spacer.gif" border="0" height="10"></td>
					</tr>	
               
                <tr >
	
			
                  
			
                 
                 <td ><a href="viewdetail.php?id=<?php echo $row['sno']; ?>"><?php echo $row['case_no']; ?></a>/<?php echo $row['year']; ?></td>
                  <td ><?php echo $row['case_Type']; ?></td>
                  <td ><font color="#000066"><?php echo $row['Petitioner']; ?></font></td>
                  <td ><?php echo $row['Respondent']; ?></td>
                
                  <td bgcolor="#FFFFFF"><?php echo $row['LC_Counsel']; ?></td>
                   <td width="113"><?php echo $row['Senior_C']; ?></td>
				    <td width="125"><?php echo $row['H_C']; ?></td>
                    <td width="177"><?php echo $row['S_C']; ?></td>
                    <td width="55"><?php echo $row['Date_Disposal']; ?></td>
                </tr>
                                  
              
                <?php
			$i++;
		}
	?>
  </table>
			  
			 
			  <div align="center"><?php echo $pagination?>
			  
  </div>
			  <table border="0" cellpadding="0" cellspacing="0" width="850">
     <tbody><tr bgcolor="#000000"><td><img src="images/spacer.gif" border="0" height="1" width="745"></td>
	 </tr></tbody></table>      
 <!-- BLACK BORDER - END  -->
			
 <!-- BODY CONTENT- END   -->
<?php include("loginfooter.inc.php"); ?>
	




