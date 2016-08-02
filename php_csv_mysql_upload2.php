<?php ob_start();?>
<html>  
<head>  
<title>::.ERASV2::.</title>  
</head>  
 <body>  
<?php  
 $loginUserId = $_SESSION['loginUserID'];
$authority = $_SESSION['authority'];
	copy($_FILES["fileCSV"]["tmp_name"],"shotdev/".$_FILES["fileCSV"]["name"]); // Copy/Upload CSV  
      
    $objConnect = mysql_connect("localhost","root","") or die(mysql_error()); // Conect to MySQL  
    $objDB = mysql_select_db("pix_eras");  
      
    $objCSV = fopen("shotdev/".$_FILES["fileCSV"]["name"], "r");  
    while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {  
    $strSQL = "INSERT INTO pix_lawyer ";  
    $strSQL .="(case_Type,case_no,Petitioner,Respondent,year,LC_Counsel,Date_Disposal,file,file1) ";  
    $strSQL .="VALUES ";  
    $strSQL .="('".$objArr[0]."','".$objArr[1]."','".$objArr[2]."' ";  
    $strSQL .=",'".$objArr[3]."','".$objArr[4]."','".$objArr[5]."','".$objArr[6]."','".$objArr[7]."','".$objArr[7]."') ";  
	
    $objQuery = mysql_query($strSQL);  
    }  
    fclose($objCSV);  
     
   $msg = "Import completed.";  
   
header("Location:csv.php?msg=".$msg); exit;

mysql_close($con);
?>  
 </body>  
 </html>  