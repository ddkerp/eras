<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<?php include_once("connopen.inc");?>
</head>

<body>
<form action="view_patient.php" method="post" >
  <table align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="27" colspan="5">&nbsp;</td>
    </tr>
    <tr>
      <td width="196" height="27"><strong>Case Type </strong></td>
      <td width="322"><?php
  $result = mysql_query("SELECT * FROM pix_floder order by floder ASC");
?> <select name="txtct" id="txtct" class="txtAll">
<option value="">ALL</option>
<?php
while($row = mysql_fetch_array($result))
{?>
	         <option><?php echo $row['1'] ?></option>
          <?php } ?></td>
      <td width="11">&nbsp;</td>
      <td width="218"><strong>Case No </strong></td>
      <td width="303"><input name="txtcno" type="text" id="txtcno" size="15" maxlength="250" />
      <strong>Year
      <input name="txtyrs" type="text" id="txtyrs" size="15" maxlength="250" />
      </strong></td>
    </tr>
    <tr>
      <td height="32">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="32"><strong>Petitioner/Appellant/Applicant</strong></td>
      <td><input name="txtpname" type="text" id="txtpname" size="50" maxlength="250" /></td>
      <td>&nbsp;</td>
      <td><strong>Respondent/Defendant</strong></td>
      <td><input name="txtrname" type="text" id="txtrname" size="50" maxlength="250" /></td>
    </tr>
    <tr>
      <td height="32">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="32"><strong>L.C.Counsel</strong></td>
      <td><input name="txtLc" type="text" id="txtLc" size="50" maxlength="250" /></td>
      <td>&nbsp;</td>
      <td><strong>Senior Counsel </strong></td>
      <td><input name="txtScl" type="text" id="txtScl" size="50" maxlength="250" /></td>
    </tr>
    <tr>
      <td height="32">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="32"><strong>Advocate on Record before H.C </strong></td>
      <td><input name="txtHc" type="text" id="txtHc" size="50" maxlength="250" /></td>
      <td>&nbsp;</td>
      <td><strong>Advocate on Record before S.C </strong></td>
      <td><input name="txtSc" type="text" id="txtSc" size="50" maxlength="250" /></td>
    </tr>
	<tr>
      <td height="32"><strong>Document search </strong></td>
      <td><input name="docstr" type="text" id="txtHc" size="50" maxlength="250" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="32">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5"><div align="center"></div></td>
    </tr>
    <tr>
      <td colspan="5"><div align="center">
        <input name="Submit" type="submit" class="butAll" value="Search">
      </div></td>
    </tr>
    <tr>
      <td colspan="5"></td>
    </tr>
    <tr>
      <td colspan="5"><div align="center"></div></td>
    </tr>
  </table>
</form>
</body>
</html>
