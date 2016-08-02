<?php
session_start();
if (!isset($_SESSION['loginUserID']))
{
	header("location:index.php");
	exit();
}
	$loginUserId = $_SESSION['loginUserID'];
 	$authority = $_SESSION['authority'];
	$uname= $_SESSION['loginUsername']  ;
$msg = $_REQUEST['msg']; 
//	$loginUserName = $_SESSION['loginUserName'];
include_once("connopen.inc");

?>

<html>
<head>
<title>.:: ERAS ::.</title>

<?php include_once ("cssscriptlink.inc"); ?>

<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- TinyMCE -->
<script type="text/javascript" src="jscripts/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		/*theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",*/
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
   
	
	

<link rel="stylesheet" href="img/CormsStyle.css">
<link href="img/complete.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	color: #0000FF;
	font-weight: bold;
	font-size: 18px;
}
-->
</style>
</head>
   
<?php include_once("insideheader.inc.php"); ?>


	 
 <td border="0" bgcolor="#ffffff" valign="top" width="900"><!--begin Product Info module--></td>
	      
		 			<!--  <br> -->
 <table border="0" cellpadding="0" cellspacing="0" width="900">
			  
			  <tr bgcolor="#ffffff">
			    <td colspan="3"><div align="center">
	              ~Word Document~ Logged in::
                  <?php echo $authority?>
                  </div>		        </td>
    </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3" class="headerhome"><div align="center"><?php echo $successmsg?></div></td>
      </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3" class="headerhome">&nbsp;</td>
      </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3" class="headerhome"></td>
      </tr>
			  <tr bgcolor="#ffffff">
			    <td height="192" colspan="3"><?php
mysql_connect("localhost", "root", "")or die("cannot connect");
mysql_select_db("pix_eras")or die("cannot select DB");
$id=@$_GET['id'];
$text='';
if($id){
$result = mysql_query("SELECT * FROM pix_lawyer WHERE sno='$id'") or die(mysql_error());
$row = mysql_fetch_array( $result );
$text=$row['text'];
}
?>
<form method="post" action="viewdetail.php?id=<?php echo $id; ?>">
<img src="images/doc.png" alt="Client Documents" width="40" height="40" border="0" title="Client Documents"><strong>Client Documents</strong><br></br>
<?php
if($id){
?>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<?php
}
?>
<textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 100%"><?php echo $text; ?></textarea><br />
<div align="center">
<input type="submit" name="save" class="butAll" value="Submit" />
<!--<input type="reset" name="reset" class="butAll" value="Reset" />-->
<input name="CANCEL" type="button" class="butAll" value="Back" onClick="history.go(-1)" />
</div>
</form>

<script type="text/javascript">
if (document.location.protocol == 'file:') {
	alert("The examples might not work properly on the local file system due to security settings in your browser. Please use a real webserver.");
}
</script>
    </td>
      </tr>
			  
			  
			
			
			  
			  <tr bgcolor="#ffffff">
			    <td colspan="3">&nbsp;</td>
      </tr>
			  <tr bgcolor="#ffffff">
			    <td colspan="3">&nbsp;</td>
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
