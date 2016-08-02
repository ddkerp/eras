<?php
include_once("connopen.inc");

function getMonthYrArray()
{
$arrYrMon = array();
$startMon = date("n",mktime(0,0,0,date("m") - 6,1,date("Y")));
$startYr = date("Y",mktime(0,0,0,date("m") - 6,1,date("Y")));

//$currentYr = date("Y");
$tmp = 1;
$yr = $startYr;
$mon = $startMon;
for ($i = 0;$i < 12;$i++)
	{
		$arrYrMon[$yr][$mon] = 0;
		$strDate = date("d-n-Y",mktime(0,0,0,$mon + 1,$tmp ,$yr));
		$arrDate = explode("-",$strDate);			
		
		$dt = $arrDate[0];
		$mon = $arrDate[1];
		$yr = $arrDate[2];
		
//		echo ("tmp $tmp dt $dt mon $mon yr $yr  <br>");
	}

return($arrYrMon);

}

function getQuotePostalCode($PostalCodeString)
{
$PostalCodeExpArr	= explode(",",$PostalCodeString);
$Arrcount = count($PostalCodeExpArr);
for($i=0;$i<$Arrcount;$i++)
{
	$PostalExpArr[] = "'".$PostalCodeExpArr[$i]."'";
}
$PostalImpString    = implode(",",$PostalExpArr);

return $PostalImpString;
}



function getWeekYrArray($totWeeks = 17)
{
$dayofWk = date("w"); 
$intAdjustVal = 56 + $dayofWk -1;
$arrYrWk = array();

$dt = date("d",mktime(0,0,0,date("n"),date("d")-($intAdjustVal) ,date("Y")));
$mon = date("m",mktime(0,0,0,date("n"),date("d")-($intAdjustVal) ,date("Y")));
$yr = date("Y",mktime(0,0,0,date("n"),date("d")-($intAdjustVal) ,date("Y")));
$wk = date("W",mktime(0,0,0,date("n"),date("d")-($intAdjustVal) ,date("Y")));


//$currentYr = date("Y");
$tmp = $dt;
for ($i = 0;$i < 17;$i++)
	{
//		$arrWk[$i] = $wk;
//		$arrYr[$i] = $yr;
		$arrYrWk[$yr][$wk] = 0;

//advancing one week
		$tmp = $dt + 7;
		$strDate = date("d-W-m-Y",mktime(0,0,0,$mon,$tmp ,$yr));
		$arrDate = explode("-",$strDate);			
		
		$dt = $arrDate[0];
		$wk = $arrDate[1];
		$mon = $arrDate[2];
		$yr = $arrDate[3];
		
//		echo ("tmp $tmp dt $dt mon $mon yr $yr  <br>");
	}

return $arrYrWk;
}


function html2rgb($color)
{
    if ($color[0] == '#')
        $color = substr($color, 1);

    if (strlen($color) == 6)
        list($r, $g, $b) = array($color[0].$color[1],
                                 $color[2].$color[3],
                                 $color[4].$color[5]);
    elseif (strlen($color) == 3)
        list($r, $g, $b) = array($color[0], $color[1], $color[2]);
    else
        return false;

    $r = hexdec($r); $g = hexdec($g); $b = hexdec($b);

    return array($r, $g, $b);
}


function createMonthCombo($format = "small",$onChangeEvent = false)
{
		if ($format == "small")
		{
			$month = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
		}
		elseif ($format == "big")
		{
			$month = array("January","February","March","April","May","June",
							"July","August","September","October","November","December");
		}
	
	$i = 0;
	$currentMonth = (date("n") - 1);
	
	if ($onChangeEvent)
	{
		$strCombo = "<select name = selMon id = selMon onchange = 'displayWorkload()'>";
	}
	else
	{
		$strCombo = "<select name = selMon id = selMon>";
	}
	for ($i = 0;$i < 12 ;$i ++)
		{
		if ($i == $currentMonth)
			{
				$strCombo .= "<option value = '" .($i + 1). "'  SELECTED>" . $month[$i]. "</option>";
			}
		else
			{
				$strCombo .= "<option value = '" .($i + 1). "' >" . $month[$i]. "</option>";
			}
		}
	$strCombo .= "</select>";
	
	return $strCombo;
}


function createYearCombo($yrsBefore = 1, $yrsAfter = 1)
{
	$currentYr = date("Y");
	$strCombo = "<select name = selYr id = selYr>";
	$i = 0;

	for ($i = ($currentYr - $yrsBefore); $i <= ($currentYr + $yrsAfter); $i++)
		{
		if ($i == $currentYr)
			{
				$strCombo .= "<option value = '" .$i. "'  SELECTED>" . $i. "</option>";
			}
		else
			{
				$strCombo .= "<option value = '" .$i. "' >" . $i. "</option>";
			}
		}
	$strCombo .= "</select>";
	
	return $strCombo;
}

function createWeekCombo()
{
	$currentWk = date("W");
	$strCombo = "<select name = selWk id = selWk>";
	$i = 0;

	for ($i = 1 ; $i <= 52; $i++)
		{
		if ($i == $currentWk)
			{
				$strCombo .= "<option value = '" .$i. "'  SELECTED>" . $i. "</option>";
			}
		else
			{
				$strCombo .= "<option value = '" .$i. "' >" . $i. "</option>";
			}
		}
	$strCombo .= "</select>";
	
	return $strCombo;
}
		
function formatID($num = 0)
{
	$str=(string) $num;  //converting to string
	$len=strlen($str);  //length of the string

	if ($len > 12)
		{	return ("<b>Invalid data. Contains more than 12 digits</b>");}
	
	if($len!=12)      //adding zeroes if the number is not a 12 digit number,say 10 or 11 digit number
	{		$zero=str_pad($str, 12, "0", STR_PAD_LEFT);		}
	else	
	{		$zero=$str;										}

	$t3="";
	
	for($i=0;$i<12;$i=$i+3)
	{
		$t1=substr($zero,$i,3);
		$t2=str_pad($t1, 4, " ", STR_PAD_RIGHT);
		$t3=$t3.$t2;
	}
return (rtrim($t3," "));
}

function changeDateFormat($date,$format)
{
	
	$date = (string) $date;
	$date = str_replace("/","-",$date);
		if ($date == '00-00-0000' || $date == '0000-00-00')
			return ("Not set");
			
	
	if ($format == "dmy")
	{
		list($y,$m,$d)=explode('-',$date);
		$arr=array($d,$m,$y);
	}
	elseif ($format == "ymd")
	{
		list($d,$m,$y)=explode('-',$date);
		$arr=array($y,$m,$d);
	}
	elseif ($format == "mdy")
	{
	  list($y,$m,$d)=explode('-',$date);
	  $arr=array($m,$d,$y);
	}	
	return(implode('-',$arr));

}

//This function receives a week no, month & yr
//returns start & end date of that week

function startEndDates($y,$m,$wk)
{ 

//find out any date that falls on the week
$found = false;
$i = 1;
$totDays = date("t",mktime(0,0,0,$m,1,$y));

	do
	{
	if (date("W",mktime(0,0,0,$m,$i,$y)) == $wk)
		{
			$found = true;
			
		}
	else
		{	$i = $i + 7;	}
		
	
	}
	
	while ($found == false);

	
	$TimeStamp=mktime(0,0,0,$m,$i,$y); 
  
//calculate first & last date of the wk 0 mon, 7 sun  	
     $DateArray[0] = date('Y-m-d',mktime(0,0,0,date('m',$TimeStamp),date 
('d',$TimeStamp)-date('w',$TimeStamp)+1,date('Y',$TimeStamp))); 

     $DateArray[1] = date('Y-m-d',mktime(0,0,0,date('m',$TimeStamp),date 
('d',$TimeStamp)-date('w',$TimeStamp)+7,date('Y',$TimeStamp))); 
   
    
        
    return $DateArray; 
} 

//accept wk no & yr & return first & last day of the week
function findWeekPeriod($week, $year)
{
	$aPeriod = array();
	$x = 0;

for ($i = 6; $i >=0; $i--)
{
	$aPeriod[] = date("Y-m-d", mktime(0, 0, 0, 1, 1 + $week*7 + $x - $i, $year));
}

	return $aPeriod;
}

function getHolidayList($country)
{
global $connection;
$holiday = array();
$query = "select Fr_Date,Occasion from calendar where Country = '" .$country. "'";
$result = mysql_query($query,$connection);
	while($row = mysql_fetch_assoc($result))
	{
		$dt = $row['Fr_Date'];
		$holiday[$dt] = $row['Occasion'];
	}	 

return $holiday;

}

function replaceQuotes($str)
{
   // $str1 = (string) $str;
    return(str_replace("'","`",$str));
}
/* Prevent from entering script / html tags
remove <, > symbols, ",' to `
add slashes 
*/
function processInput($str)
{
	//return (addslashes(htmlspecialchars($str)));
//	$str = htmlspecialchars($str);
	$str = preg_replace(array('/</', '/>/','/"/',"/'/"), array('', '','`','`'), $str);

	$str = str_replace("?","",$str);	
	$str = str_replace(";","",$str);	
	$str = str_replace("#","",$str);	
	
	$str = eregi_replace("http","",$str);	
	$str = eregi_replace("www","",$str);	
	$str = eregi_replace("script","",$str);	
//	$str = addslashes($str);
	return $str;

}

function getTotWeeks()
{
global $selMonth,$selYr;
$totDays = date("t",mktime(0,0,0,$selMonth,1,$selYr));
$firstWk = date("W",mktime(0,0,0,$selMonth,1,$selYr));
$lastWk= date("W",mktime(0,0,0,$selMonth,$totDays,$selYr));
$str = "";

	if ($firstWk == 52)
		{	
			$str = "<b>52</b><input type = checkbox name = 'chkWk[]' id = 'chkWk52' value = 52 onclick='selectWeek()'>";
			$firstWk = 1;
		}	

	for($i = $firstWk; $i <= $lastWk;$i++)
	{
		$str .= "";
		$str .= "<b>". $i . "</b><input type = checkbox name = chkWk[]" .$i. " id = chkWk" .$i. " value = " .$i. " onclick='selectWeek()' >";
		
	}	

	echo ($str);
}

//If You Pass the AreaID Get the Area Name
function getAreaName($AreaMastID)
{
  global $connection;
  $query = "select
                    AreaName 
			from
			        areamast
			where
			 		AreaMastID = $AreaMastID";		   
  $result = mysql_query($query,$connection);
  $count = mysql_num_rows($result);

if ($count == 0)
	{
		return "";
	
	}
  while ($row = mysql_fetch_array($result))
	{
 	  $AreaName = $row['AreaName'];
	}
return $AreaName;

} 

function dateDiff($dformat, $endDate, $beginDate)
    {
    $date_parts1=explode($dformat, $beginDate);
    $date_parts2=explode($dformat, $endDate);
    $start_date=gregoriantojd($date_parts1[0], $date_parts1[1], $date_parts1[2]);
    $end_date=gregoriantojd($date_parts2[0], $date_parts2[1], $date_parts2[2]);
    return $end_date - $start_date;
    }



function dateDiff2($dt1, $dt2, $split='yw') {
   $date1 = (strtotime($dt1) != -1) ? strtotime($dt1) : $dt1;
   $date2 = (strtotime($dt2) != -1) ? strtotime($dt2) : $dt2;
   $dtDiff = $date1 - $date2;
   $totalDays = intval($dtDiff/(24*60*60));
   $totalSecs = $dtDiff-($totalDays*24*60*60);
   $dif['h'] = $h = intval($totalSecs/(60*60));
   $dif['m'] = $m = intval(($totalSecs-($h*60*60))/60);
   $dif['s'] = $totalSecs-($h*60*60)-($m*60);
   // set up array as necessary
   switch($split) {
   case 'yw': # split years-weeks-days
     $dif['y'] = $y = intval($totalDays/365);
     $dif['w'] = $w = intval(($totalDays-($y*365))/7);
     $dif['d'] = $totalDays-($y*365)-($w*7);
     break;
   case 'y': # split years-days
     $dif['y'] = $y = intval($totalDays/365);
     $dif['d'] = $totalDays-($y*365);
     break;
   case 'w': # split weeks-days
     $dif['w'] = $w = intval($totalDays/7);
     $dif['d'] = $totalDays-($w*7);
     break;
   case 'd': # don't split -- total days
     $dif['d'] = $totalDays;
     break;
   default:
     die("Error in dateDiff(). Unrecognized \$split parameter. Valid values are 'yw', 'y', 'w', 'd'. Default is 'yw'.");
   }
   return $dif;
 }

/**
 * Function to calculate date or time difference.
 * 
 * Function to calculate date or time difference. Returns an array or
 * false on error.
 *
 * @author       J de Silva                             <giddomains@gmail.com>
 * @copyright    Copyright &copy; 2005, J de Silva
 * @link         http://www.gidnetwork.com/b-16.html    Get the date / time difference with PHP
 * @param        string                                 $start
 * @param        string                                 $end
 * @return       array
 */
function get_time_difference( $start, $end )
{
    $uts['start']      =    strtotime($start);
    $uts['end']        =    strtotime($end);
    if( $uts['start']!==-1 && $uts['end']!==-1 )
    {
        if( $uts['end'] >= $uts['start'] )
        {
            $diff    =    $uts['end'] - $uts['start'];
        }
        else
        {
            $diff    =    $uts['start'] - $uts['end'];
        }
        
            if( $days=intval((floor($diff/86400))) )
                $diff = $diff % 86400;
            if( $hours=intval((floor($diff/3600))) )
                $diff = $diff % 3600;
            if( $minutes=intval((floor($diff/60))) )
                $diff = $diff % 60;
            $diff    =    intval( $diff );            
            return( array('days'=>$days));
     
	  }
        else
        {
            trigger_error( "Ending date/time is earlier than the start date/time", E_USER_WARNING );
        }
    }
/*
	else
    {
        trigger_error( "Invalid date/time data detected", E_USER_WARNING );
    }
    return( false );
}
*/
//this function checks that given date is the last date of the month / not
function isLastDateOfMonth($date)
{
//format = YYYY-mm-dd (MySql)
$arrDate = explode("-",$date);

$intTotalDays  = date("t",mktime(0,0,0,$arrDate[1],1,$arrDate[0]));

$dtLastDate = date("Y-m-d",mktime(0,0,0,$arrDate[1],$intTotalDays,$arrDate[0]));

if ($date == $dtLastDate)
	{
		return true;
	}
else
	{
		return false;
	}	


}


function count_days($start, $end)
{
   if( $start != '0000-00-00' and $end != '0000-00-00' )
   {
       $timestamp_start = strtotime($start);
       $timestamp_end = strtotime($end);
       if( $timestamp_start >= $timestamp_end ) return 0;
       $start_year = date("Y",$timestamp_start);
       $end_year = date("Y", $timestamp_end);
       $num_days_start = date("z",strtotime($start));
       $num_days_end = date("z", strtotime($end));
       $num_days = 0;
       $i = 0;
       if( $end_year > $start_year )
       {
          while( $i < ( $end_year - $start_year ) )
          {
             $num_days = $num_days + date("z", strtotime(($start_year + $i)."-12-31"));
             $i++;
          }
        }
        return ( $num_days_end + $num_days ) - $num_days_start;
   }
   else
   {
        return 0;
    }
}
//Get the Continent list and return continent string list 

function sanitize_output($buffer)
{
    $search = array(
        '/\>[^\S ]+/s', //strip whitespaces after tags, except space
        '/[^\S ]+\</s', //strip whitespaces before tags, except space
        '/(\s)+/s'  // shorten multiple whitespace sequences
        );
    $replace = array(
        '>',
        '<',
        '\\1'
        );
  $buffer = preg_replace($search, $replace, $buffer);
    return $buffer;
}

function isMonLastDate($date)
{
$arrDate = explode("-",$date);
$tot = date('t',mktime(0,0,0,$arrDate[1],1,$arrDate[0]));
$lastDate = date('Y-m-d',mktime(0,0,0,$arrDate[1],$tot,$arrDate[0]));
if ($date == $lastDate )
	{		return 's';	}
else
	{		return 'no';	}

}
?>