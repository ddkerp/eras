<?php
$intNo = 4;

$char_set = 'M6bnaNo7KdlHqcYm3OGLXfZJrpPR4We&h8F1S5sQgVI2TExjU0ytD9=wzBviCkuA';

function encrypt_data($strText) 
{

global $char_set;
global $intNo;
$input = $strText;
$output = "";
$char_code = 0;
$alpha_length = 0;


//get algorithm from pull down select
$algorithm = $intNo;


$alpha_length = strlen($char_set) - $algorithm;
$space = 0;

//begin for loop to cycle through input
for ($loop=0; $loop< strlen($input); $loop++) 
{

//search char_set string for character and set char_code variable...
$char_code = strpos($char_set, substr($input,$loop,1),0);

//actual text encoding algorithm goes here
if (($char_code + $algorithm) > strlen($char_set))
{
$space = strlen($char_set) - $char_code;
$char_code = $algorithm - $space;
}
else
{
$char_code += $algorithm;
}

//set output variable in accordance to char_set
$output .= substr($char_set,$char_code,1);
}
//dump contents of output variable into textarea
return $output;
}


function decrypt_data($strText) 
{
global $char_set;
global $intNo;
$input = $strText;
$output = "";
$char_code = 0;
$alpha_length = 0;

//get algorithm from pull down select

$algorithm = $intNo;

$alpha_length = strlen($char_set) - $algorithm;
$space = 0 ;

//begin for loop to cycle through input
for ($loop=0; $loop < strlen($input); $loop++) {


//search char_set string for character and set char_code variable...
$char_code = strpos($char_set , substr($input,$loop,1),0);

//oppisite of encrypt algorithm goes here
if ( ($char_code - $algorithm)  < 0)
{
$space = $algorithm - $char_code;
$char_code = strlen($char_set) - $space;
}
else
{
$char_code -= $algorithm;
}

//set output variable in accordance to char_set
$output .= substr($char_set,$char_code,1);
}
//dump contents of output variable into textarea
return $output;
}


function extractUrl($strText)
{
/* get the query string
decrypt it, store var & value in array
return the array
*/
	if (strlen($strText) == 0)
		{
			return 0;
		}
	$arrQueryString = array();
	$strQueryString = decrypt_data($strText);
	//echo("decrypted data" .$strQueryString); 
	
	$strArray = explode("&",$strQueryString);
	
	for ($i = 0; $i < count($strArray); $i++)
		{
			$strVariable = substr($strArray[$i],0,strpos($strArray[$i],"="));		
			$strValue = substr($strArray[$i],strpos($strArray[$i],"=")+1);
			
			$arrQueryString[$strVariable] = $strValue;
		}
	
	
	return $arrQueryString;
}


	
?>