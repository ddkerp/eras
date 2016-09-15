<?php ob_start();?>
<html> 
<head>
<title>Successful</title>
 </head> 
<?php

include_once("connopen.inc");
require_once("bootstrap.php");

$filename = $_FILES["file"]["name"];
if($filename!='')
{
		if (file_exists("upload/$_POST[txtct]/" . $_FILES["file"]["name"]))
		{
	    	$msg= 6;
			 echo $_FILES["file"]["name"] . " already exists. ";
			 header("Location:create_case.php?msg=".$msg); exit;
		}
		else
		{
			move_uploaded_file($_FILES["file"]["tmp_name"],"upload/$_POST[txtct]/" . $_FILES["file"]["name"]);
		}
}	
if($_FILES["file_doc"]["name"]!=""){
	$fileisValid = validateFileExt ($_FILES["file_doc"],array("doc","docx"));
}
if($fileisValid){
	$file_doc = $_FILES["file_doc"]["name"];
	$file_doc_path = "upload/$_POST[txtct]/".$file_doc;
	if (file_exists($file_doc_path)){
		$msg= 7;
		 header("Location:create_case.php?msg=".$msg); exit;
	}else{
		move_uploaded_file($_FILES["file_doc"]["tmp_name"],$file_doc_path);
		$docObj = new DocxConversion($file_doc_path);
		$file_doc_text= mysql_real_escape_string(addslashes(trim($docObj->convertToText())));
	}
}	
	$sql="INSERT INTO pix_lawyer (
		case_Type, 
		case_no, 
		Petitioner, 
		Respondent, 
		year,
		LC_Counsel,
		Date_Disposal,
		Senior_C,
		H_C,
		S_C,
		file,
		uname,
		file1,
		time,
		vakalat,
		file_doc,
		file_doc_text)
	VALUES
	(
		'".$_POST[txtct]."', 
		'".$_POST[txtcno]."', 
		'".$_POST[txtPname]."', 
		'".$_POST[txtRname]."', 
		'".$_POST[txtyrs]."',
		'".$_POST[txtLc]."',
		'".$_POST[theDate2]."',
		'".$_POST[txtsenior]."',
		'".$_POST[txtHc]."',
		'".$_POST[txtSc]."',
		'".$filename."',
		'".$_POST[usname]."',
		'".$filename."',
		'".$_POST[usname]."',
		'".$_POST[vakalat]."',
		'".$file_doc."',
		'".$file_doc_text."'
	)";

	if (!mysql_query($sql))
	{
		unlink($file_doc_path);
		die('Error: ' . mysql_error());
	}
	else
	{
		$msg=5;
	  //echo "Record Added Sucessful";
	}
header("Location:create_case.php?msg=".$msg); exit;

mysql_close($con);

?>
<?php echo($msg);?>
</html>