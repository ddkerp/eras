

<html>
<head>
<title>.:: OMRAS ::.</title>
<?php include_once ("cssscriptlink.inc"); ?>


</head>
   
<?php include_once("insideheader.inc.php"); ?>
 
	 
 <td border="0" bgcolor="#ffffff" valign="top" width="900"><!--begin Product Info module-->
	      
		 			<!--  <br> -->
 <table border="0" cellpadding="0" cellspacing="0" width="900">

			  <tr bgcolor="#ffffff">
			  <td colspan="3">&nbsp; 			  </td>
			  </tr>
			
			<tr bgcolor="#ffffff">
			<td width="20"><img src="images/spacer.gif" border="0" height="1" width="20"></td>
              <td class="price" valign="middle" width="867"><?php

$con=mysql_connect("localhost","root","");
	/*if($con){
		echo "success";
	}else{ echo "fail";}*/
$con1=mysql_select_db('omras',$con);
	/*if($con1){
		echo "success";
	}else{ echo "fail";}*/

	

//if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "application/pdf") || ($_FILES["file"]["type"] == "image/pjpeg")))
//{


	if ($_FILES["file"]["error"] > 0)
	{		
		//echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
	}
	else
	{
	//echo "Upload: " . $_FILES["file"]["name"] . "<br />"; 
	$filename = $_FILES["file"]["name"];
	//echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

		if (file_exists("upload/" . $_FILES["file"]["name"]))
		{
			echo $_FILES["file"]["name"] . " already exists. ";
		}
		else	
		{
			move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
			// echo "Stored in: " . "upload/" . $_FILES["file"]["name"];

			$sql="INSERT INTO patient_history (p_no, p_name, p_village, p_w_h_f_g, p_po, p_street, p_admission, file)
			VALUES
			('$_POST[p_no]', '$_POST[p_name]', '$_POST[p_village]', '$_POST[p_w_h_f_g]', '$_POST[p_po]', '$_POST[p_street]', '$_POST[p_admission]', '$filename')";

			if (!mysql_query($sql,$con))
			{
				die('Error: ' . mysql_error());
			}
			else
			{
				echo "1 record added";
			}
		}
	}
//}
//else
//{
//	echo "Invalid file";
//}




mysql_close($con);

?></td>
              <td width="13" align="center">
			  
			  <!-- FORM --><!-- FORM END -->
&nbsp;</td>
	  </tr>
			  
			  <tr bgcolor="#ffffff">
			  <td colspan="3">&nbsp; 			  </td>
			  </tr>
			  
			  </tbody></table>
				
 <!-- BODY CONTENT- END   -->
	      
<!-- BLACK BORDER - START -->	  
      <table border="0" cellpadding="0" cellspacing="0" width="900">
     <tbody><tr bgcolor="#000000"><td><img src="images/spacer.gif" border="0" height="1" width="745"></td>
	 </tr></tbody></table>      
 <!-- BLACK BORDER - END  -->
				
 <!-- BODY CONTENT- END   -->
<?php include("loginfooter.inc.php"); ?>
	
</div>

</body>
</html>
