<?php
session_start();
if (!isset($_SESSION['loginUserID']))
{
	header("location:index.php");
	exit();
}
	$loginUserId = $_SESSION['loginUserID'];
 	$authority=$_SESSION['authority'];


	$RowsPerPage = (isset($_SESSION['RowsPerPage']))?$_SESSION['RowsPerPage']:10;

include_once("codeit.inc");
		
//curpage if set that is used or 1 assigned
//target post pre, next or pgno

$currentPage = (isset($_REQUEST['currentPage']))? $_REQUEST['currentPage']:1;
$targetPage = (isset($_REQUEST['targetPage']))?$_REQUEST['targetPage']:1;
$totalPage = (isset($_REQUEST['totalPage']))?$_REQUEST['totalPage']:1;
$msg = (isset($_REQUEST['msg']))?$_REQUEST['msg']:"";
$SortType		=	(isset($_REQUEST['sorttype']))?$_REQUEST['sorttype']:"NotSet";
$SortOrder		=	(isset($_REQUEST['sort']))?$_REQUEST['sort']:"Asc";
$DupType		=	(isset($_REQUEST['duptype']))?$_REQUEST['duptype']:"NotSet";

if(($DupType == 'NotSet') || ($DupType != $SortType ))
{
	$DupType = 	$SortType;
} 
elseif($DupType == $SortType)
{
   if($SortOrder == "Asc" )
	{
	$SortOrder = "DESC";
	}
	else
	{
	$SortOrder = "Asc";
	}
}
else
{
	$SortOrder = "Asc";	
}


if ($msg == "success")
	{
		$msg = "Updated  Successfully";
	}
if ($msg == "duplicate")
	{
		$msg = "<b style = 'color:red'> Duplicate Record Found </b>";
	}
switch ($targetPage)
{
case "pre":
	{	$targetPage = ($currentPage > 1)? $currentPage - 1 :$currentPage; 		
		break;
	}
case "next":
	{	$targetPage = ($currentPage < $totalPage)? $currentPage+1 :$currentPage; 		
		break;
	}

}

?>
<html><head>
<title>.::ERAS::.  USER LIST</title>

<?php include_once("cssscriptlink.inc"); ?>

<script language = "javascript">
var objForm;
var checkedItems = new Array();

function alertContents() 
 {
      if (http_request.readyState == 4) 
	  {
         if (http_request.status == 200) 
		 {
		 
//** the value posted by the server stored in result. based on that different messages displayed
			result = http_request.responseText;
		//alert (result);
			if (result.indexOf("Deleted") >= 0)
			{
			hideRows();					
			$("pStatus").innerHTML = "Deleted Successfully";			
            }
		    if (result.indexOf("Dependent")>=0)
		    {
		    $("pStatus").innerHTML = "<b style = 'color:red'>Dependent Record Found</b>";
		    }
			  
			} 
		 else 
		 {
            alert('There was a problem with the request.');
        }
    }
}

function hideRows()
{
allCheckBox = document.getElementsByName("chk");

    for(i =0; i < (checkedItems.length); i++)
    {
                checkVal = allCheckBox.item(checkedItems[i]).value;             
                tblRow = document.getElementById("tblr" + checkVal);
                tblRow.style.display="none";
                tblRow.style.display="";
                tblRow.style.display="none";
                allCheckBox.item(checkedItems[i]).checked = false;
    }
}

function deleteSel()
{
var i,allCheckBox;
var recordId = "";
var ans;
var urlData = "hdnProcess=D&";

if (getChecked())
{
//find which check box is selected
   allCheckBox = document.getElementsByName("chk");
	var j = 0;
    for(i =0; i < (allCheckBox.length); i++)
    {
        if (allCheckBox.item(i).checked)
            {
	            checkVal = allCheckBox.item(i).value;
                recordId += "id" + i + "=" +  checkVal + "&" ;
				checkedItems[j] = i;
				j++;   
			
             }
    }
}

//altest one row is selected
 if (recordId != "")
        {
        urlData += recordId.substring(0,recordId.length -1);
	        	document.getElementById("pStatus").innerHtml = "Processing..";
			    makePOSTRequest('userprocess.php', urlData);
        }
    }
function checkAll()
{
//based on the selection select / deselect all checkboxes
var state = document.getElementById("chkAll").checked;

allCheckBox = document.getElementsByName("chk");

    for(i =0; i < (allCheckBox.length); i++)
    {	allCheckBox.item(i).checked = state;		}

}

function getChecked()
{
//find out atleast single checkbox is selected

var counter = 0;
var ans = false;
	allCheckBox = document.getElementsByName("chk");
    for(i =0; i < (allCheckBox.length); i++)
    {
        if (allCheckBox.item(i).checked)
            {	counter++;		 }
	}
	if (counter != 0)
		{	ans = confirm("Do you want to delete the selected User");	}

return ans;
}

</script></head>

<!-- BODY & LEFT MENU -->

<?php include_once("insideheader.inc.php");  ?>

<br>

<div align="center"><h4 class='sectionTitle'>VIEW/EDIT/DELETE USER</h4></div>

<form name = "frmMain" id = "frmMain" action="javascript:;">

<!-- table contain form elemnts to get user detail -->

<table  bgcolor="0330A1" border="0" cellpadding="3" cellspacing="1" align=center width="800">
	<tr class="thead">
		<td colspan="2" align = center>User List</td>
		<td><p name = "pStatus" id = "pStatus" style= 'color:blue'><b><?php echo($msg); ?></b></p></td>
	</tr>
</table>

<table  bgcolor='0330A1' border='0' cellpadding='3' align='center' cellspacing='1' width="800"> 

<?php
$totRec = 0;
//$totPage = 0;
$recordsPerPage = $RowsPerPage;
$startRec = 0;

include_once ("connopen.inc");


$startRec = ($targetPage - 1) * $recordsPerPage;

//$sql = "Select 	City_ID as id,City_Name,City_ShortName	from city";
$sql = "Select 	userid as id,username,name,assign from sara_user ";

/*        if ($SortType == 'City')
	 	{
		  $SortType  = 'City_Name';
		}
 	
 	     if ($SortType == 'ShortName')
    	   { $SortType = 'City_ShortName';}
	
        	   	  if($SortType != "NotSet")
			 		{ $sql.=" ORDER BY ".$SortType.' '.$SortOrder; }
				  else
					{ $sql.=" ORDER BY City_Name Asc"; }
	 
*/						$sql.=" LIMIT $startRec, $recordsPerPage ";

					$rs = mysql_query($sql,$connection);
$numrows = mysql_num_rows($rs);
echo ("<tr class='thTitle'>
		<td width='20' ><input type = checkbox name = chkAll id = chkAll onclick ='checkAll()'></td>
		<td width='250'> 		User 		</td>
		<td width='250'> 		Name 		</td>
		<td width='250'> 		Assign 		</td>
		<td width='20'>Edit</td></tr>");

if($numrows == 0)
{
 echo ("<tr class='thtitle'><td align=center colspan=10 style='color:red'> No data found </td></tr>");
}

while ($row = mysql_fetch_array($rs))
{
    echo ("<tr id = tblr" .$row["id"]. " name = tblr" .$row["id"]. " class='initial' onMouseOver=this.className='highlight' onMouseOut=this.className='normal'>");
    echo ("<td align=center width=20><input type = checkbox id = chk name = chk value = " .$row["id"]. "></td>");
    $userid = $row["id"];
   
    $strUrl = "param=View&ID=" .$row["id"]."&page=$targetPage";
    $strUrl = encrypt_data($strUrl);
    
    echo ("<td width=20><A Href='useredit.php?$strUrl'class=nobdr>".$row["username"]."</td>");
    echo ("<td>" .$row["name"]. "</td>");
	echo ("<td>" .$row["assign"]. "</td>");
		
    $strUrl = "param=Edit&ID=" .$row["id"]."&page=$targetPage";
	$strUrl = encrypt_data($strUrl);
    
	echo("<td><A Href='useredit.php?$strUrl' class= nobdr><img src = 'images/write.gif' border = 0 alt = Edit title =Edit></a></td>");
    echo ("</tr> \n");
}

    echo ("</table>");

$sql = "select count(userid)as Rid from sara_user ";
$rs = mysql_query($sql,$connection);

$row = mysql_fetch_array($rs);
$totRec = $row[0];

if (($totRec % $recordsPerPage) != 0) 
	{	$totalPage = (int)($totRec / $recordsPerPage) + 1;	} 
else 
	{	$totalPage = (int) ($totRec / $recordsPerPage);		}

$currentPage = $targetPage;

$previous = "";
$next = "";
$cbo = "";

$cbo = "<select align = center name = cboPgNo id = cboPgNo onchange = 'chgPg()'>";
for ($i = 1; $i <= $totalPage; $i++)
	{	$cbo	.=  "<option value = " .$i. ">" .$i. "</option>";	} 

$cbo .= "</select>";

if ($currentPage == 1)
	{		$previous = "Previous"; 		}
else
	{		$previous = " <a href =" .$_SERVER['PHP_SELF']. "?currentPage=" .$currentPage."&sorttype=".$SortType."&targetPage=pre&totalPage=" . $totalPage. "> << Previous </a>"; 		}

if($numrows == 0)
$currentPage = 0;	

if ($currentPage == $totalPage)
	{		$next = "Next"; 		}	
else
	{		$next = "<a class=usual href =" .$_SERVER['PHP_SELF']. "?currentPage=" .$currentPage."&sorttype=".$SortType.
			"&targetPage=next&totalPage=" . $totalPage. ">Next >></a> "; 		}
?>		

<table id = 'tblNavi' bgcolor="0330A1" border="0" cellpadding="3" cellspacing="1" align=center width = 800>
<tr class="thead">

<td align = left width = 30%><?php echo $previous?></td>
<td align = center ><?php echo("Goto page " .$cbo ); ?></td>
<td align = right width = 30%><?php echo $next?></td></tr>

<tr class="thead">
<td colspan = 3 align = center><input type = button value = "Delete" onclick = "deleteSel()" class = "butAll">
&nbsp;&nbsp;</td>
</td></tr>
</table>

</form>




<!-- BODY FOOTER --> 
<?php include("loginfooter.inc.php"); ?>

<script language = "javascript">
	objForm = document.getElementById("frmMain");
	objForm.cboPgNo.value = <?php echo($currentPage); echo ("; \n");?>
	
function chgPg()
	{
	var jumpTo = objForm.cboPgNo.value;
	url = "<?php echo ($_SERVER['PHP_SELF']. "?currentPage=" .$currentPage."&sorttype=".$SortType. 
			"&totalPage=" . $totalPage ); ?>" 		
	url += "&targetPage=" + jumpTo;
	location.href = url;						
}	
</script>
  <script language = "javascript" src = "modules/script/sorttable.js"></script>