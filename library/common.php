<?php
function validateFileExt($file,$validext){
	$mimeType = array("doc"=>"application/msword", "docx"=>"application/vnd.openxmlformats-officedocument.wordprocessingml.document");
    $extension = end(explode(".", $file["name"]));
    if ($mimeType[$extension] == $file["type"] && in_array($extension, $validext))
    {
      return true;
	}else{
		$msg = 2;
		header("Location:edit_case.php?id=".$_POST['id']."&msg=".$msg); exit;
	}
	
}
?>