<?php ob_start();?>
<?php
include_once("connopen.inc");
$tblname='pix_lawyer';
// need to add security - identify the authenticated user session

if($_REQUEST["id"]!=""){
	$id=mysql_real_escape_string(trim($_REQUEST['id']));
	$sql = "select * from pix_lawyer where sno = '".$id."'";
	$res = mysql_query($sql);
	while($data = mysql_fetch_array($res)){
		$sno = $data['sno'];
		$cty =$data['case_Type'];
		$file_doc =$data['file_doc'];
		$file =$data['file'];
	}
		
	
	if($_REQUEST["file_doc"]!=""){
		$id=$_REQUEST['id'];
		$sql="UPDATE pix_lawyer SET `file_doc` = '', file_doc_text = '' WHERE `sno` = '".$id."'";
		rename("upload/$cty/$file_doc", "upload/".$cty."/deleted_".$file_doc."_".time());
		$res = mysql_query($sql) or die(mysql_error());
		$msg_id = 4;
	}else{
		 $id=$_REQUEST['id'];
		 $sql="UPDATE pix_lawyer SET `file` = '', `file1` = replace( `file1` , '$file','') WHERE `sno` = '$id'";
		 rename("upload/$cty/$file", "upload/".$cty."/deleted_".$file."_".time());
		 $res = mysql_query($sql) or die(mysql_error());
		 $msg_id = 4;
	}
	
	header("Location:viewdetail.php?id=".$id."&msg=".	$msg_id); exit;
}
?>
	
