<?php
session_start();
$CenterID		= $_SESSION['sno'];
include_once("connopen.inc");
include_once("modules/phpfunctions.inc");
$page = (isset($_REQUEST['page']))?(int) $_REQUEST['page']:0;
$action = (isset($_REQUEST['hdnProcess']))?$_REQUEST['hdnProcess']:"notset";
if (($action == "N") || ($action == "E"))
{
	$strCityName	= replaceQuotes($_REQUEST['txtCityName']);
	$strShortName	= replaceQuotes($_REQUEST['txtShortName']); 
	$strcpass		= replaceQuotes($_REQUEST['txtcpass']); 
	$strassigns		= replaceQuotes($_REQUEST['assigns']);
	$strname	= replaceQuotes($_REQUEST['txtname']);
	 
}

if ($action == "E")
{
$RID = $_REQUEST['hdnID'];

$sql = "select username  from sara_user  where username = '$strCityName' and userid <> $RID";
    $rs = mysql_query($sql,$connection);

    if (mysql_num_rows($rs) >= 1)
    {
        header("location:userviewdel.php?msg=duplicate&targetPage=".$page);
        exit();
    }

$query = "update sara_user  set username = '$strCityName',name = '$strShortName',assign ='$strassigns' where userid = " .$RID;

		//echo $query;
			$result = mysql_query($query,$connection) or die ("Err in query");

			header("location:userviewdel.php?msg=updated successfully&targetPage=".$page);	
}


if ($action == "D")
{
  
	$query = "";
    $IDArray = array();
    $IDDel = array();
//read all row id
//during each itration one row is deleted
         while(list($key, $value) = each($HTTP_POST_VARS))
        {
          if (substr($key,0,2) == "id")
		   {	
           $IDArray[] = (double) $value;
		   }			           
	     }
	     
	     for($i = 0;$i < count($IDArray); $i++)
	      	{           
	          $IDDel[] = $IDArray[$i];	
			}
	
		$del = implode(",",$IDDel);
		
        $query = "delete from sara_user where userid in ( $del )";
        //echo ($query);
          
          $result = mysql_query($query,$connection);
if ($result == 1)
{
   echo ("<p>Deleted</p>");
}
else
{
	echo ("<p>Dependent</p>");
}

}
if ($action == "N")
{
       
	$sql = "select username from sara_user where username = '" .$strCityName. "'";
	//echo $sql; 
	$rs = mysql_query($sql,$connection);
	if ((mysql_num_rows($rs)) != 0)
		{	echo ("<p>Exist</p>");	}
	else
		{	
		
			
	$sql = "insert into sara_user (username,password,name,assign) 
			values ('$strCityName','$strShortName','$strname','$strassigns')";
				
    $rs = mysql_query($sql,$connection);
    //$rs = 1;
	if ($rs)
		{	
		    echo ("<p>Added</p>");	
		}
	else
		{	echo ("<p>Error</p>");	}

		}			
}
?>