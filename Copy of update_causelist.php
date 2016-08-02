<?php ob_start();?>
<html> 
<head>
<title>Successful</title>
</head> 
<body>
<?php
$loginUserId = $_SESSION['loginUserID'];
$authority = $_SESSION['authority'];
//$Uname = $_SESSION['loginUsername'];
//print_r($_REQUEST);
include_once("connopen.inc");

$idd = $_POST['id'];
$hall=$_POST['txtPname'];
$jud=$_POST['txtRname'];
$coun=$_POST['couse'];
$item=$_POST['txtLc'];
$page=$_POST['txtsenior'];
$advo=$_POST['txtHc'];
$client=$_POST['txtSc'];
/*Next Dates of Hearing Coversion */
	 $org_Date = $_POST['txtDD'];
echo $hearing = date("Y-m-d", strtotime($org_Date));
 /*End Dates of Hearing Coversion */
$remark =$_POST['remark'];



$sql="UPDATE pix_causelist set `c_hall` = '$hall',
`judg` = '$jud',
`item_no` = '$item',
`pag_no` = '$page',
`advocate` = '$advo',
`cli_nam` = '$client',
`next_hearing` = '$hearing',
`remarks`='$remark',
`counsi`='$coun'
 where id='$idd'" ;
	
	//$sql="UPDATE patient_history set time=(time,$dt) where sno='$id'" ;		


if (!mysql_query($sql))
			{
				die('Error: ' . mysql_error());
			}
			else
			{
				echo "Record added";
				 $msg="Update Successful";
			}
		
	
 //$msg="Update Successful";
header("Location:view_detail_cause.php?ide=$idd&msg=".$msg); exit;
	
mysql_close($con);
?>
</body>
</html>