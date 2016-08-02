

<html>
<head>
<title>.:: OMRAS ::.</title>
<? include_once ("cssscriptlink.inc"); ?>


</head>
   
<? include_once("insideheader.inc.php"); ?>
 
	 
 <td border="0" bgcolor="#ffffff" valign="top" width="900"><!--begin Product Info module-->
	      
		 			<!--  <br> -->
 <table border="0" cellpadding="0" cellspacing="0" width="900">

			  <tr bgcolor="#ffffff">
			  <td colspan="3">&nbsp; 			  </td>
			  </tr>
			
			<tr bgcolor="#ffffff">
			<td width="20"><img src="images/spacer.gif" border="0" height="1" width="20"></td>
              <td class="price" valign="middle" width="867"><table bgcolor="0330A1" border="0" cellpadding="3" cellspacing="1" align=center width=50%>
                <tbody>
                  <tr class="thead">
                    <td>New User Detail</td>
                    <td>&nbsp;
                        <p name = "pStatus" id = "pStatus" style= 'color:blue'> <b></b></p></td>
                  </tr>
                  <!-- name -->
                  <tr class="initial" onMouseOver="this.className='highlight'" onMouseOut="this.className='normal'" >
                    <td align=right width=30%>User <u>N</u>ame: &nbsp;</td>
                    <td align=left width=70%>&nbsp;
                        <input accesskey = "n" type=text name = "txtName" id = "txtName" size = 30 maxlength = 32 class = "txtAll">
                      *</td>
                  </tr>
                  <!-- pass -->
                  <tr class="initial" onMouseOver="this.className='highlight'" onMouseOut="this.className='normal'" >
                    <td align=right width=30%>Pass<u>w</u>ord: &nbsp;</td>
                    <td align=left width=70%>&nbsp;
                        <input accesskey = "w" type=password name = "txtPass1" id = "txtPass1" size = 30 maxlength = 50 class = "txtAll">
                      *</td>
                  </tr>
                  <!-- Confirm pass -->
                  <tr class="initial" onMouseOver="this.className='highlight'" onMouseOut="this.className='normal'" >
                    <td align=right width=30%>Confirm Password: &nbsp;</td>
                    <td align=left width=70%>&nbsp;
                        <input  type=password name = "txtPass2" id = "txtPass2" size = 30 maxlength = 50 class = "txtAll">
                      *</td>
                  </tr>
                  <!-- Email ID -->
                  
                  <!-- Center name -->
                  <tr class="initial" onMouseOver="this.className='highlight'" onMouseOut="this.className='normal'" >
                    <td align=right width=30%>Assigns &nbsp;</td>
                    <td align=left width=70%>&nbsp;
                        <?=$strComCenter;?>
                    </td>
                  </tr>
                  
                  <tr class="thead">
                    <td colspan=2 align=center><input type=submit value="Add" onclick= "javascript:get(this.parentNode);" class = "butAll">
                        <input type=reset value="Clear" class = "butAll"></td>
                  </tr>
                </tbody>
                <br>
              </table>              </td>
			  <td width="13" align="center">
			  
			  <!-- FORM --><!-- FORM END -->
&nbsp;</td>
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
<? include("loginfooter.inc.php"); ?>
	
</div>

</body>
</html>
