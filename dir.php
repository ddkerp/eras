<?php ob_start();?>
<html> 
<head>
<title>Successful</title>
 </head> 
<?php
include_once("connopen.inc");

echo $pa=ucfirst($_POST[txtfloder]);
$structure = './upload/'.$pa.'';
if (!mkdir($structure, 0, true)) {
    die('Failed to create folders...');
	$msg="$pa Already Created";

}
			$sql="INSERT INTO pix_floder (floder) VALUES ('$pa')";

			if (!mysql_query($sql))
			{
				die('Error: ' . mysql_error());
			}
			else
			{
				$msg="Folder created Successful";
              echo "Record Added Sucessful";
			}
header("Location:mkdir.php?msg=".$msg); exit;

mysql_close($con);

?>
<?php echo($msg);?>
</html>