<?php

function showerror()
{
die("Error " . mysql_errno() . " : " . mysql_error());
}


if ( $_SESSION['connection'] == '' )
{

$strServer="localhost"; // Server IP Address 'or' Name
$strDatabase="pix_eras"; // Database Name
$strUser="root"; // User ID
$strPwd=""; // Password

// (1) Open the database connection
if (!($connection = @ mysql_connect($strServer,$strUser,$strPwd)))
die("Could not connect");

// (2) Select the winestore database
if (!(@ mysql_select_db("$strDatabase", $connection)))
showerror();

$_SESSION['connection']= $connection ;

}
else
$connection = $_SESSION['connection'] ;


?>
