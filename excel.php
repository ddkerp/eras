<?php
include_once("connopen.inc");
	$case_no = trim($_REQUEST['cno']);
	$case_typ=trim($_REQUEST['typ']);
	$c_yer   =trim($_REQUEST['c_yr']);
	
    $sql = "SELECT casetype,user_date,caseno,c_year,c_hall,judg,item_no,pag_no,advocate,cli_nam,next_hearing,remarks FROM pix_causelist WHERE caseno='$case_no' AND casetype='$case_typ' AND c_year='$c_yer'";
    $rs = mysql_query($sql) or die (mysql_error());
   $k=1;
   $data="";
   $header="S.No\tDate\tCase No/Year\tCase Type\tCourt Hall\tJudge\tItem No\tPage No\tAdvocate\tClient Name\tNext Date of Hearing\tRemarks";
   while ($row = mysql_fetch_array($rs))
	{
   $line = $k."\t".$row['user_date']."\t".$row['caseno']."/".$row['c_year']."\t".$row['casetype']."\t".$row['c_hall']."\t".$row['judg']."\t".$row['item_no']."\t".$row['pag_no']."\t".$row['advocate']."\t".$row['cli_nam']."\t".$row['next_hearing']."\t".$row['remarks']."\t";
   $k++;
   $data .= trim( $line ) . "\n";
   }
    
   
    if ($data == "")
    {
        $data = "\n No Record Found!\n";                       
    }
   //echo $header;
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=reports.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    print "$header\n$data";
?>