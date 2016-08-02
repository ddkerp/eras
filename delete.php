<?php ob_start();?>
<?php
include_once("connopen.inc");
$tblname='pix_lawyer';
// need to add security - identify the authenticated user session
if($_REQUEST["file_doc"]!=""){
	$id=$_REQUEST['id'];
	//$file_doc=$_REQUEST["file_doc"];
	$sql = "select * from pix_lawyer where sno = '".$id."'";
	$res = mysql_query($sql);
	while($data = mysql_fetch_array($res)){
		$sno = $data['sno'];
		$cty =$data['case_Type'];
		$file_doc =$data['file_doc'];
	}
	$sql="UPDATE pix_lawyer SET `file_doc` = '', file_doc_text = '' WHERE `sno` = '".$id."'";
	unlink("upload/$cty/$file_doc");
	$res = mysql_query($sql) or die(mysql_error());
	$msg_id = 4;
}else{
	 $id=$_REQUEST['id'];
	$nam=$_REQUEST['nam'];
	
	 $sql="UPDATE pix_lawyer SET `file1` = replace( `file1` , '$nam','') WHERE `sno` = '$id'";
	 $res = mysql_query($sql);
	 $msg_id = 4;
}
	
	header("Location:viewdetail.php?id=".$id."&msg=".	$msg_id); exit;
?>
	
