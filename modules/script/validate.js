	function objValidateClient()
{
      this.mExists = mExists;
      this.mEquality = mEquality;
}

function mExists(varVariant)
{
var varValue = varVariant.value;
    if ((varValue == "") || (varValue == null) || (varValue == 0) || (varValue == false))
        { return false;}
    else
        {return true;}
}

function mEquality(varFirst, varSecond)
{
if (eval(varFirst) == eval(varSecond))
	{	return true;	}
else
	{	return false;	}
}
function checkEmail(emailid)
{
 var checkTLD=1;
var knownDomsPat=/^(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum)$/;
var emailPat=/^(.+)@(.+)$/;
var specialChars="\\(\\)><@,;:\\\\\\\"\\.\\[\\]";
var validChars="\[^\\s" + specialChars + "\]";
var quotedUser="(\"[^\"]*\")";
var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;
var atom=validChars + '+';
var word="(" + atom + "|" + quotedUser + ")";
var userPat=new RegExp("^" + word + "(\\." + word + ")*$");
var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$");
var matchArray=emailid.value.match(emailPat);

if (matchArray==null) {
alert("Email address seems incorrect (check @ and .'s)");
return false;
}
var user=matchArray[1];
var domain=matchArray[2];

// Start by checking that only basic ASCII characters are in the strings (0-127).

for (i=0; i<user.length; i++) {
if (user.charCodeAt(i)>127) {
alert("Email Error : Ths username contains invalid characters.");
return false;
   }
}
for (i=0; i<domain.length; i++) {
if (domain.charCodeAt(i)>127) {
alert("Email Error : The domain name contains invalid characters.");
return false;
   }
}

// See if "user" is valid

if (user.match(userPat)==null) {

// user is not valid

alert("Email Error : The username doesn't seem to be valid.");
return false;
}

/* if the e-mail address is at an IP address (as opposed to a symbolic
host name) make sure the IP address is valid. */

var IPArray=domain.match(ipDomainPat);
if (IPArray!=null) {

// this is an IP address

for (var i=1;i<=4;i++) {
if (IPArray[i]>255) {
alert("Email Error : Destination IP address is invalid!");
return false;
   }
}
return true;
}

// Domain is symbolic name.  Check if it's valid.

var atomPat=new RegExp("^" + atom + "$");
var domArr=domain.split(".");
var len=domArr.length;
for (i=0;i<len;i++) {
if (domArr[i].search(atomPat)==-1) {
alert("Email Error : The domain name does not seem to be valid.");
return false;
   }
}


if (checkTLD && domArr[domArr.length-1].length!=2 &&
domArr[domArr.length-1].search(knownDomsPat)==-1) {
alert("Email Error : The address must end in a well-known domain or two letter " + "country.");
return false;
}

// Make sure there's a host name preceding the domain.

if (len<2) {
alert("Email Error : This address is missing a hostname!");
return false;
}

// If we've gotten this far, everything's valid!
return true;

}
//Date Validation
function isInteger(s){
	var i;
    for (i = 0; i < s.length; i++){   
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function stripCharsInBag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){   
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function daysInFebruary (year){
	// February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );
}
function DaysArray(n) {
	for (var i = 1; i <= n; i++) {
		this[i] = 31
		if (i==4 || i==6 || i==9 || i==11) {this[i] = 30}
		if (i==2) {this[i] = 29}
   } 
   return this
}
function isDate(dtStr){
  // Declaring valid date character, minimum year and maximum year
var dtCh= "-";
var minYear=1900;
var maxYear=2100;
	var daysInMonth = DaysArray(12);
	var pos1=dtStr.indexOf(dtCh);
	var pos2=dtStr.indexOf(dtCh,pos1+1);
	var strDay=dtStr.substring(0,pos1);
	var strMonth=dtStr.substring(pos1+1,pos2);
	var strYear=dtStr.substring(pos2+1);
	strYr=strYear;
	if (strDay.charAt(0)=="0" && strDay.length>1) strDay=strDay.substring(1)
	if (strMonth.charAt(0)=="0" && strMonth.length>1) strMonth=strMonth.substring(1)
	for (var i = 1; i <= 3; i++) {
		if (strYr.charAt(0)=="0" && strYr.length>1) strYr=strYr.substring(1)
	}
	month=parseInt(strMonth);
	day=parseInt(strDay);
	year=parseInt(strYr);
	if (pos1==-1 || pos2==-1){
		alert("The date format should be : dd-mm-yyyy");
		return false;
	}
	if (strMonth.length<1 || month<1 || month>12){
		alert("Please enter a valid month");
		return false;
	}
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
		alert("Please enter a valid day");
		return false;
	}
	if (strYear.length != 4 || year==0 || year<minYear || year>maxYear){
		alert("Please enter a valid 4 digit year between "+minYear+" and "+maxYear);
		return false;
	}
	if (dtStr.indexOf(dtCh,pos2+1)!=-1 || isInteger(stripCharsInBag(dtStr, dtCh))==false){
		alert("Please enter a valid date");
		return false;
	}
return true;
}
	
	
function combotext_onkeydown(e,oText,oSelect){  
  
  keyCode = e.keyCode;  
  
  if (keyCode == 40 || keyCode == 38) {  
    oSelect.style.display = 'block';  
    oSelect.focus();  
    comboselect_onchange(oSelect, oText);  
  }  
  else if (keyCode == 13) {  
    e.cancelBubble = true;  
    if (e.returnValue) e.returnValue = false;  
    if (e.stopPropagation) e.stopPropagation();  
    comboselect_onchange(oSelect, oText);  
    oSelect.style.display='none';  
    oText.focus();  
    return false;  
  }  
  else if(keyCode == 9) return true;  
  else { //alert(keyCode);  
  
    oSelect.style.display = 'block';  
  
    var c = String.fromCharCode(keyCode);  
    c = c.toUpperCase();   
    toFind = oText.value.toUpperCase() + c;  
	
    for (i=0; i < oSelect.options.length; i++)
	{  
    
		  nextOptionText = oSelect.options[i].text.toUpperCase();  
		  if (nextOptionText.indexOf(toFind,0)>=0)
		  {
	  	  		oSelect.options[i].selected = true;
	  			break;
	  	  }
  
   }  
  }  
}  
  
  
function comboselect_onchange(oSelect,oText) {  
  if(oSelect.selectedIndex != -1)  
    oText.value = oSelect.options[oSelect.selectedIndex].text;  
}  
  
function comboselect_onkeyup(keyCode,oSelect,oText){  
  if (keyCode == 13) {  
    comboselect_onchange(oSelect, oText);  
    oSelect.style.display='none';  
    oText.focus();  
  }  
} 

