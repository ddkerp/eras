
<HTML>
<HEAD>
<TITLE>
Menu Page
</TITLE>
</HEAD>

<BODY BGCOLOR='#f0f0f0' onLoad="getDetails();" >

<FORM action="view_patient.php" method="post">
 <TABLE align="center" cellpadding="0" cellspacing="0">
          <TR> 
            <TD width="126">Patient No</TD>
			<TD width="300"><input name="p_no" type="text" id="p_num" size="50" maxlength="250"></TD>
            
            <TD width="25">&nbsp;</TD>
            <TD>Patient Name</TD>
            <TD width="303"><input name="p_name" type="ext" id="p_name5" size="50" maxlength="250"></TD>
          </TR>
     
          </TR>
          <TR>
            <TD height="24">Patient W/H/F/G</TD>
            <TD><input name="p_w_h_f_g" type="text" id="p_w_h_f_g" size="50" maxlength="250"></TD>
            <TD>&nbsp;</TD>
            <TD>Village</TD>
            <TD><input name="p_village" type="text" id="p_village" size="50" maxlength="250"></TD>
          </TR>
          <TR> 
            <TD height="24">Street</TD>
            <TD><input name="p_street2" type="text" id="p_street2" size="50" maxlength="250"></TD>
            <TD>&nbsp;</TD>
            <TD>P.O</TD>
      <TD><input name="p_po" type="text" id="p_po" size="50" maxlength="250"></TD>
          </TR>
          <TR> 
            <TD colspan="3">&nbsp;</TD>
          </TR>
          <TR> 
            <TD colspan="5"><div align="center"></div></TD>
          </TR>
          <TR> 
            <TD colspan="5"><div align="center"> 
                <input name="Submit" type='submit' value='Search'>
              </div></TD>
          </TR>
  </TABLE>


</FORM>
</BODY>
</HTML>