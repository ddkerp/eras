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
require_once("bootstrap.php");
$id = $_POST['id'];
$cty = $_POST['txtcty'];
$cno=$_POST['txtcno'];
$Pname=$_POST['txtPname'];
$Rname=$_POST['txtRname'];
$year=$_POST['txtyrs'];
$Lc=$_POST['txtLc'];
$Scl=$_POST['txtsenior'];
$Hc=$_POST['txtHc'];
$Sc=$_POST['txtSc'];
$Dd=$_POST['txtDD'];
$uname =$_POST['usname'];
$vakal=$_POST['vaka'];


/** validation starts **/
if($_FILES["file_doc"]["name"]!=""){
	$fileisValid = validateFileExt ($_FILES["file_doc"],array("doc","docx"));
}


//if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "application/pdf") || ($_FILES["file"]["type"] == "image/pjpeg")))
//{
	//$sos = "NOW()";
	//$dt = date("Y-m-d");
	
	
//date_default_timezone_set ("Asia/Calcutta"); 
//echo date("d/m/y - H-i-s A", time()) ;
//$dt = date("d-m-y-H-i-s", time());
	
	
		
if($_FILES["file"]["name"]!=""){
	$file = $_FILES["file"]["name"];
	if (file_exists("upload/$cty/".$_FILES["file"]["name"]))
	{
		$msg = 3;
		header("Location:edit_case.php?id=".$_POST['id']."&msg=".$msg); exit;
	}else{
		move_uploaded_file($_FILES["file"]["tmp_name"],"upload/$cty/".$_FILES["file"]["name"] );
		$sql_file = "`file`='$file',
					`file1`=concat(file1,',$file'),";
	}
}
if($fileisValid){
	$file_doc = $_FILES["file_doc"]["name"];
	$file_doc_path = "upload/$cty/".$file_doc;
	if (file_exists($file_doc_path))
	{
		$msg = 3;
		header("Location:edit_case.php?id=".$_POST['id']."&msg=".$msg); exit;
	}else{
		move_uploaded_file($_FILES["file_doc"]["tmp_name"], $file_doc_path);
		$sql_file .= "`file_doc`='$file_doc',";
		$docObj = new DocxConversion($file_doc_path);
		$file_doc_text= $docObj->convertToText();
		if($file_doc_text != ""){
			$sql_file .= "`file_doc_text`='$file_doc_text',";
		}
		
	}
}
		


$sql  = "UPDATE pix_lawyer set";
$sql .= $sql_file;
$sql .= "`time`=CONCAT(COALESCE(time, ''), '|$uname'),
		`case_Type` = '$cty',
		`case_no` = '$cno',
		`Petitioner` = '$Pname',
		`Respondent` = '$Rname',
		`year` = '$year',
		`LC_Counsel` = '$Lc',
		`Date_Disposal` = '$Dd',
		`Senior_C` = '$Scl',
		`H_C` = '$Hc',
		`S_C` = '$Sc',
		`uname`='$uname',
		`vakalat`='$vakal'
		 where sno='$id'" ;
 //echo $sql;exit;
if (!mysql_query($sql))
{
	die('Error: ' . mysql_error());
}
else
{
	//echo "Record added";
	 $msg=1;
}
		
	
 //$msg="Update Successful";
header("Location:viewdetail.php?id=$id&msg=".$msg); exit;
	
mysql_close($con);
?>
</body>
</html>