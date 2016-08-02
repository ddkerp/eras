<?php
/****************************************************************/
/*Project Name  : TTOMS											*/
/*Module Name	: Admin		     								*/
/*Code Name		: dateTime.php									*/
/*Database Used : etc											*/
/*Tables Used	: None											*/
/*Calling codes	: None											*/
/*Code Function : Date for all files							*/
/*Created Date  : 18/12/2006									*/
/****************************************************************/
/*Developer 	: Suresh kumar.R								*/
/****************************************************************/
/*Last Modified :												*/
/*Modification  :												*/
/*					 											*/
/****************************************************************/
$SU_010506_curDate = Date("Y-m-d", mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y')));
$SU_010506_curTime = Date("H:i:s", mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y')));
$SU_010506_curDate_show = Date("d-m-Y", mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y')));
?>