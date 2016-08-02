<?php
if (isset($_REQUEST['strName']) & isset($_REQUEST['strPass'])) 
{
include_once("connopen.inc");
include_once("modules/phpfunctions.inc");
	$strName = $_REQUEST['strName'];
	$strPass = $_REQUEST['strPass'];
//	$dt = date("Y-m-d");

	$query = "select * from sara_user where username = '" . $strName . "' " ;
	//echo $query;	
	$rs = mysql_query($query,$connection)or die("error in query checking");

	$num = mysql_num_rows($rs);
	if ($num == 0)
		{
			echo ("User not exist");
			exit();
		}
	else
		{
		$row = mysql_fetch_assoc($rs);
			if ($row['password'] == $strPass)
				{
				session_start();
	           	$uid = $row['userid'];
				$author = $row['assign'];
				$username = $row['username'];
	 			$_SESSION['loginUserID']	= $uid;
				$_SESSION['authority']	= $author;
			    $_SESSION['loginUsername'] = $username;
	

				echo ("Success:$loginUserID");	
		     	}
			else
				{
				echo ("Invalid pass");	
				}										
		}
	}               	  		  	    
?>