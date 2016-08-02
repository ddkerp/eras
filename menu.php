<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Menu</title>
<link rel="stylesheet" href="images/style.css" type="text/css">
<style>
body {
padding : 0;
margin : 0;
}

/*############################################################################*/
/*##### Navigation menu
/*############################################################################*/
#menu {
text-align : left;
margin : 0;
height : 25px;
padding-top : 0;
}

ul {
margin : 0;
padding : 0;
list-style : none;
z-Index:100000;
}

#nav {
padding: 0;
margin: 0;
list-style: none;
line-height : 25px;
}
#nav ul {
padding: 0;
margin: 0;
list-style: none;
line-height : 2.0em;
background : #000000;
}
#nav a {
display: block;
/*width: 5em;*/
text-decoration : none;
text-align: center;
font-weight : bold;
color : #ffffff;
}
#nav a:hover {
background : url('images/hmenu.jpg') repeat-x top left;
color : #ffc300;
}
#nav a.current {
background : url('images/cmenu.jpg') repeat-x top left;
}
#nav ul a {
/*width: 1em;*/
width: 250px;
padding-left: 5px;
text-decoration : none;
text-align: left;
font-weight : bold;
color : #1EA4F3;
}
#nav ul a:hover {
background : none;
text-decoration : none;
color : #ffc300;
}
#nav ul li {
width: 250px;
border : 1px solid #bbb;
color : #ffc300;
}
#nav li {
float: left;
/*width: 8em;*/
width: 98px;
}
#nav li ul {
position: absolute;
/*width: 10em;*/
width: 250px;
left: -999em;
}
#nav li:hover ul, #nav li.sfhover ul {
left: auto;
}
</style>
</head>

<body>
<div id="menu">
      <ul id="nav">



  

<li><a href="#">CASE</a>
          <ul>
          <li><a href="main.php" >SEARCH CASE</a></li><?php 
		  If($authority == "Management" ||$authority == "Superadmin" )
  {
  ?>
			<li><a  href="create_case.php" >ADD CASE</a></li>	
			<?php }?>
			<?php If($authority == "Superadmin" )	{?>
			<li><a  href="csv.php" >IMPORT (csv File)</a></li>
			<?php }?>
			
          </ul>
        </li>
        
 <li><a href="#">CAUSE LIST</a>
          <ul>
          <li><a href="search.php" >SEARCH CAUSE LIST </a></li><?php 
		  If($authority == "Management" ||$authority == "Superadmin" )
  {
  ?>
			<li><a  href="create_causelist.php" >ADD CAUSE LIST</a></li>	
			<?php }?>
			<?php If($authority == "Superadmin" )	{?>
			<li><a  href="csv.php" >IMPORT (csv File)</a></li>
			<?php }?>
			
          </ul>
        </li>


<?php   
 	$authority = $_SESSION['authority'];
 If($authority == "Management")
  {
  ?>
  <li><a href="#">ADMIN</a>
          <ul>
		  		
				<li>  <a href="useradd.php" >USER ADD</a></li> 
           		 <li><a href="userviewdel.php"> USER VIEW</a></li>
				 <li><a href="mkdir.php"> MAKE DIR</a></li>
				 
           </ul>
        </li>
		<?php } ?>
	<?php	
	$authority = $_SESSION['authority'];
 If($authority == "Management")
  {
  ?>
  <li><a href="backup.php">BACK UP</a>
         <!-- <ul>
		  		
				<li>  <a href="useradd.php" >USER ADD</a></li> 
           		 <li><a href="userviewdel.php"> USER VIEW</a></li>
				 
           </ul>-->
        </li><?php } ?>	
		
		<li><a href="index.php?param=logout">SIGN OUT</a></li>
</ul>
</div>
</body>
</html>
