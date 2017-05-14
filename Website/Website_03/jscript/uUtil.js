//以下為 JavaScript 第一版模組 Made By Casper 2004/07/31
//將需要存取 EndUser 端電腦的程式留存在此，其它不需要存取 EndUser 端電腦的程式移到第二版
//######################################## 專案相關路徑 ########################################
/**
* init the variable member to start the javascript
* 
* var a = new Init();
* alert(a.DebugWinPath);
* 
* @access	public
*/
function Init() {
	this.DebugWinPath="c:\\DebugWin.Cache\\"; //取得Debug Win實體路徑
	this.IsDeploy=false;                      //Deploy到遠端為true，Local端開發為false
}

/**
* return debug windows location
* 
* alert(GetDebugWinDir());
* 
* @return	string
* @access	public
*/
function GetDebugWinDir() {
	var oInit = new Init();
	return oInit.DebugWinPath;
}

/**
* to get the project is deploy or not
* 
* alert(GetDeploy());
* 
* @return	boolean
* @access	public
*/
function GetDeploy() {
	var oInit = new Init();
	return oInit.IsDeploy;
}

//############################################################################################

//######################################## 變數相關函數 ########################################
/**
* determine the activeX object is exist or not
* 
* alert(IsActiveXObjectExist("Scripting.FileSystemObject"));
* 
* @param	string	sObjName
* @return	boolean
* @access	public
*/
function IsActiveXObjectExist(sObjName) {
	try	{
		oObj = new ActiveXObject(sObjName);	
		return true;
	}	catch (er) {
		return false;
	}
}

//############################################################################################

//######################################## IO相關函數 ########################################
/**
* determine the folder is exist or not
* 
* FolderExist("c:\\xxxx");
* 
* @param	string	sUrl
* @return	boolean
* @access	public
*/
function FolderExist(sUrl) {
	hd=sUrl;
	fso=new ActiveXObject("Scripting.FileSystemObject");
	if (fso.FolderExists(hd))	{
		return true;
	} else {
		return false;
	}
}

/**
* create the file in the point place
* 
* FileCreate("c:\\abc.txt","test");
* 
* @param	string	sUrl
* @param	string	sContent
* @access	public
*/
function FileCreate(sUrl,sContent) {
	fso = new ActiveXObject("Scripting.FileSystemObject");
	fileName=sUrl;
	fid=fso.CreateTextFile(fileName);
	fid.Write(sContent);
	fid.Close();
}

//###########################################################################################

//######################################## Debug Win相關函數 ########################################
/**
* determine the debug folder is exist or not
* 
* IsDebugWinExist();
* 
* @return	boolean
* @access	public
*/
function IsDebugWinExist() {
	if (FolderExist("C:\\DebugWin.Cache")) {
		return true;
	} else {
		return false;
	}
}

/**
* process the log variable
* 
* LogVariableProcess("test");
* 
* @param	object	oObj
* @return	string
* @access	public
*/
function LogVariableProcess(oObj) {
	var s=""
	sType=GetVariableType(oObj);
	if (sType == "jsNumber") {
		return GetStr(oObj);
	} else if (sType == "jsString") {
		return oObj;
	} else if (sType == "jsBoolean") {
		return GetStr(oObj);
	} else if (sType == "jsUndefined") {
		return "jsUndefined";
	} else if (sType == "jsFunction") {
		return "jsFunction";
	} else if (sType == "jsNull") {
		return "jsNull";
	} else if (sType == "jsArray") {
		s = s + "Array Length == " + GetUnidimensionalArrayLength(oObj) + "\n";
		for (var i=0; i < GetUnidimensionalArrayLength(aVal); i++) {
			s = s + "Array(" + i + ") == " + oObj[i] + "\n";
		}
		return s;
	} else if (sType == "jsObject") {
		return "jsObject";
	}
}

/**
* 將輸入的值傳到Debug Window視窗
* 
* Log("test");
* 
* @param	object	oObj
* @access	public
*/
function Log(oObj) {
	if (GetDeploy() == false)	{
		if (IsDebugWinExist()) {
			sRndName=GetInt(GetRnd()*10000);
			sFileName=sRndName+".log";
			FileCreate(GetDebugWinDir()+sFileName,LogVariableProcess(oObj));
		}
	}
}

//##################################################################################################

//以下為 JavaScript 第二版模組 Made By Casper 2005/01/31
//以下程式為不需要存取 EndUser 端電腦的程式
//修改變數型態取得模式 Casper Modify 2005/01/31
//######################################## 變數相關函數 ########################################
/**
* 取得變數型態
* 
* var o1=Array(1, 2, 3);
* alert(GetType(o1));
* 
* @param o
* @return	string
*/
function GetType(o) {
	var sResult="";
	var sType=typeof(o);
	switch (sType) {
		case 'number':
			sResult="number";
			break;
		case 'string':
			sResult="string";
			break;
		case 'boolean':
			sResult="boolean";
			break;
		case 'undefined':
			sResult="undefined";
			break;
		case 'object':
			sResult="object";
			break;
		case 'function':
			sResult="function";
			break;
		default:
			sResult="unknow";
			break;
	}
	return sResult;
}

/**
* 判斷變數是否為 null 值
* 
* var a = null;
* alert(IsNull(a))
* 
* @param	o
* @return	boolean
*/
function IsNull(o) {
	var bResult=false;
	var iType=GetType(o);
	if (iType=="object")	{
		if (o==null)	{
			bResult=true;
		}
	}
	return bResult;
}

/**
* 判斷變數是否為陣列
* 
* var a = new Array();
* var b = 2;
* alert(IsArray(a))
* alert(IsArray(b))
* 
* @param	object	oObj
* @return	boolean
* @access	public
*/
function IsArray(o) {
	var bResult=false;
	var iType=GetType(o);
	if (iType=="object")	{
		if (o.constructor==window.Array)	{
			bResult=true;
		}
	}
	return bResult;
}

/**
* 判斷變數是否為浮點數
* 
* var a=-12563.01;
* alert(IsFloat(a));
* 
* @param o
* @return	boolean
*/
function IsFloat(o) {
	var bResult=false;
	var sType=GetType(o);
	var sTmp="";
	var iTmp=0;
	switch (sType) {
		case 'number':
			sTmp=SafeStr(o);
			iTmp=sTmp.indexOf(".");
			if (iTmp!=-1)	{
				bResult=true;
			}
			break;
		case 'string':
			iTmp=parseFloat(o);
			if (!isNaN(iTmp))	{
				bResult=true;
			}
			break;
	}
	return bResult;
}

/**
* 判斷變數是否為整數
* 
* var a=-12563.01;
* alert(IsInt(a));
* 
* @param o
* @return	boolean
*/
function IsInt(o) {
	//alert("o == " + o);
	var bResult=false;
	var sType=GetType(o);
	var sTmp="";
	var iTmp=0;
	switch (sType) {
		case 'number':
			sTmp=SafeStr(o);
			iTmp=sTmp.indexOf(".");
			if (iTmp==-1)	{
				bResult=true;
			}
			break;
		case 'string':
			iTmp=parseInt(o);
			//alert("iTmp == " + iTmp);
			if (!isNaN(iTmp))	{
				//bResult=true;
				sTmp=SafeStr(o);
				iTmp=sTmp.indexOf(".");
				if (iTmp==-1)	{
					bResult=true;
				}
			}
			break;
	}
	return bResult;
}

/**
* 判斷字串變數是否可轉為數字
* 
* var a = 1;
* alert(IsNumber(a))
* 
* @param s
* @return	boolean
*/
function IsNumber(s) {
	var bResult=false;
	if (IsInt(s))	{
		bResult=true;
	} else if (IsFloat(s)) {
		bResult=true;
	}
	return bResult;
}

/**
* 將變數型態轉為字串
* 
* var o1=123;
* alert(SafeStr(o1));
* 
* @param o
* @return	string
*/
function SafeStr(o) {
	var sResult="";
	var sType=GetType(o);
	var iArrLen=0;
	var iStrLen=0;
	switch (sType) {
		case 'number':
			sResult=o.toString();
			break;
		case 'string':
			sResult=o;
			break;
		case 'boolean':
			if (o==true)	{
				sResult="true";
			} else {
				sResult="false";
			}
			break;
		case 'undefined':
			sResult="";
			break;
		case 'object':
			if (IsNull(o)) {
				sResult="null";
			} else if (IsArray(o)) {
				iArrLen=o.length;
				for (i=0; i<iArrLen; i++)	{
					sResult=sResult+o[i]+",";
				}
				iStrLen=sResult.length;
				sResult=sResult.substring(0, iStrLen-1);
			} else {
				sResult="";
			}
			break;
		case 'function':
			sResult="";
			break;
		default:
			sResult="";
			break;
	}
	return sResult;
}

/**
* 將變數型態轉為字串
* 
* GetStr("abc");
* GetStr(123);
* GetStr(false);
* 
* @param o
* @return	string
*/
function GetStr(o) {
	return SafeStr(o);
}

/**
* 將變數型態轉為整數數字
* 
* var o1=123;
* alert(SafeInt(o1));
* 
* @param o
* @return	number
*/
function SafeInt(o) {
	var iResult=0;
	var sType=GetType(o);
	var iArrLen=0;
	var iStrLen=0;
	//alert("sType == " + sType);
	switch (sType) {
		case 'number':
			if (IsInt(o))	{
				iResult=o;
			} else if (IsFloat(o)) {
				iResult=parseInt(SafeStr(o));
			}
			break;
		case 'string':
			if (IsInt(o))	{
				aResult=StringToCharArray(o);
				iLen=GetUnidimensionalArrayLength(aResult);
				iCountZero=0;
				sTmp="";
				for (i=0; i<iLen; i++) {
					if (iCountZero==i) {
						if (aResult[i]=="0") {
							iCountZero++;
						} else {
							sTmp=sTmp+aResult[i];
						}
					} else {
						sTmp=sTmp+aResult[i];
					}
				}
				//alert("sTmp result == " + sTmp);
				o=sTmp;
				//alert("is int");
				iResult=parseInt(o);
			} else if (IsFloat(o)) {
				//alert("is float");
				iResult=parseInt(o);
			}
			break;
		case 'boolean':
			if (o==true)	{
				iResult=1;
			} else {
				iResult=0;
			}
			break;
		case 'undefined':
			iResult=0;
			break;
		case 'object':
			if (IsNull(o)) {
				iResult=0;
			} else if (IsArray(o)) {
				iResult=0;
			} else {
				iResult=0;
			}
			break;
		case 'function':
			iResult=0;
			break;
		default:
			iResult=0;
			break;
	}
	return iResult;
}

/**
* 將變數型態轉為整數數字
* 
* GetInt("abc");
* GetInt(123);
* GetInt(false);
* 
* @param o
* @return	number
*/
function GetInt(o) {
	return SafeInt(o);
}

/**
* 將變數型態轉為浮點數數字
* 
* var o1=123;
* alert(SafeDou(o1));
* 
* @param o
* @return	number
*/
function SafeDou(o) {
	var iResult=0;
	var sType=GetType(o);
	var iArrLen=0;
	var iStrLen=0;
	switch (sType) {
		case 'number':
			if (IsInt(o))	{
				iResult=parseFloat(SafeStr(o));
			} else if (IsFloat(o)) {
				iResult=o;
			}
			break;
		case 'string':
			if (IsInt(o))	{
				iResult=parseFloat(o);
			} else if (IsFloat(o)) {
				iResult=parseFloat(o);
			}
			break;
		case 'boolean':
			if (o==true)	{
				iResult=parseFloat(1);
			} else {
				iResult=parseFloat(0);
			}
			break;
		case 'undefined':
			iResult=parseFloat(0);
			break;
		case 'object':
			if (IsNull(o)) {
				iResult=parseFloat(0);
			} else if (IsArray(o)) {
				iResult=parseFloat(0);
			} else {
				iResult=parseFloat(0);
			}
			break;
		case 'function':
			iResult=parseFloat(0);
			break;
		default:
			iResult=parseFloat(0);
			break;
	}
	return iResult;
}

/**
* 將變數型態轉為浮點數數字
* 
* GetDou("abc");
* GetDou(123);
* GetDou(false);
* 
* @param o
* @return	number
*/
function GetDou(o) {
	return SafeDou(o);
}

//##############################################################################################

//######################################## 數學相關函數 ########################################
/**
* 取得亂數值
* 
* alert(GetRnd());
* 
* @return	number
* @access	public
*/
function GetRnd() {
	return Math.random();
}

/**
* 取得 x 的 y 次方值 Returns base to the exponent power
* 
* alert(Pow(2, 4));
* 
* @param x
* @param y
* @return	number
*/
function Pow(x, y) {
	return Math.pow(x, y);
}

//##############################################################################################

//######################################## 伺服器相關函數 ########################################
/**
* 取得瀏覽器的名稱
* 
* Log(GetBrowserSoftware());
* 
* @return	string
*/
function GetBrowserSoftware() {
	return navigator.appName;
}

/**
* 取得系統名稱
* 
* Log(GetOSName());
* 
* @return	string
* @access	public
*/
function GetOSName() {
	var OSName="Unknown OS";
	if (navigator.appVersion.indexOf("Win")!=-1) {OSName="Windows";}
	if (navigator.appVersion.indexOf("Mac")!=-1) {OSName="MacOS";}
	if (navigator.appVersion.indexOf("X11")!=-1) {OSName="UNIX";}
	if (navigator.appVersion.indexOf("Linux")!=-1) {OSName="Linux";}
	return OSName;
}

/**
* 取得 Domain 名稱
* 
* Log(GetHostName());
* 
* @return	string
* @access	public
*/
function GetHostName() {
	return location.hostname;
}

//################################################################################################

//######################################## 字串相關函數 ########################################
/**
* 取得字串長度，中英混合無問題
* 
* Len("測試test"); == 6
* 
* @param s
* @return	number
*/
function Len(s) {
	var iResult=0;
	var iType=GetType(s);
	if (iType=="string")	{
		iResult=s.length;
	}
	return iResult;
}

/**
* 將字串轉為大寫
* 
* UCase("abc");  ==> ABC
* 
* @param	string	sStr
* @return	string
*/
function UCase(sStr) {
	var sUCase = sStr.toUpperCase();
	return SafeStr(sUCase);
}

/**
* 將字串轉為小寫
* 
* UCase("ABC");  ==> abc
* 
* @param	string	sStr
* @return	string
* @access	public
*/
function LCase(sStr) {
	var sLCase = sStr.toLowerCase();
	return SafeStr(sLCase);
}

/**
* 將字串切割成陣列
* 
* sStr1="select * from abc";
* aStr = StringToArray(sStr1," ");
* Array Length == 4
* Array(0) == select
* Array(1) == *
* Array(2) == from
* Array(3) == abc
* 
* @param sStr
* @param sCut
* @return	object
*/
function StringToArray(sStr,sCut) {
	aVal = sStr.split(sCut);
	return aVal;
}

/**
* 去除字串右邊空白
* 
* IN: str - the string we want to RTrim
* RETVAL: An RTrimmed string!
* 
* @param str
* @return	string
*/
function RTrim(str) {
	// We don't want to trip JUST spaces, but also tabs,
	// line feeds, etc.  Add anything else you want to
	// "trim" here in Whitespace
	var whitespace = new String(" \t\n\r");
	var s = new String(str);

	if (whitespace.indexOf(s.charAt(s.length-1)) != -1) {
		// We have a string with trailing blank(s)...

		var i = s.length - 1;       // Get length of string

		// Iterate from the far right of string until we
		// don't have any more whitespace...
		while (i >= 0 && whitespace.indexOf(s.charAt(i)) != -1)
			i--;

		// Get the substring from the front of the string to
		// where the last non-whitespace character is...
		s = s.substring(0, i+1);
	}

	return s;
}

/**
* 去除字串左邊空白
* 
* IN: str - the string we want to LTrim
* RETVAL: An LTrimmed string!
* 
* @param	string	sStr
* @return	string
* @access	public
*/
function LTrim(str) {
	var whitespace = new String(" \t\n\r");
	var s = new String(str);

	if (whitespace.indexOf(s.charAt(0)) != -1) {
		// We have a string with leading blank(s)...

		var j=0, i = s.length;

		// Iterate from the far left of string until we
		// don't have any more whitespace...
		while (j < i && whitespace.indexOf(s.charAt(j)) != -1)
			j++;

		// Get the substring from the first non-whitespace
		// character to the end of the string...
		s = s.substring(j, i);
	}
	return s;
}

/**
* 從字串左邊開始取得指定字數
* 
* IN: str - the string we are LEFTing
* n - the number of characters we want to return
* RETVAL: n characters from the left side of the string
* 
* @param sStr
* @param n
* @return	string
*/
function Left(str, n) {
	if (n <= 0)     // Invalid bound, return blank string
		return "";
	else if (n > String(str).length)   // Invalid bound, return
		return str;                // entire string
	else // Valid bound, return appropriate substring
		return String(str).substring(0,n);
}

/**
* 從字串右邊開始取得指定字數
* 
* IN: str - the string we are RIGHTing
* n - the number of characters we want to return
* RETVAL: n characters from the right side of the string
* 
* @param sStr
* @param n
* @return	string
*/
function Right(str, n) {
	if (n <= 0)     // Invalid bound, return blank string
		return "";
	else if (n > String(str).length)   // Invalid bound, return
		return str;                     // entire string
	else { // Valid bound, return appropriate substring
		var iLen = String(str).length;
		return String(str).substring(iLen, iLen - n);
	}
}

/**
* 將某字串取代為指定字串
* 
* In JavaScript, a regular expression is written in the form of /pattern/modifiers where "pattern" is the regular 
* expression itself, and "modifiers" are a series of characters indicating various options. The "modifiers" part 
* is optional. This syntax is borrowed from Perl. JavaScript supports the following modifiers, a subset of those 
* supported by Perl:
* /g enables "global" matching. When using the replace() method, specify this modifier to replace all matches, 
* rather than only the first one. 
* /i makes the regex match case insensitive. 
* /s enables "single-line mode". In this mode, the dot matches newlines. 
* /m enables "multi-line mode". In this mode, the caret and dollar match before and after newlines in the subject 
* string. 
* sStr="i am a lover yet."
* sFindStr=" "
* sReplaceStr="-"
* sStr = Replace(sStr,sFindStr,sReplaceStr) ==> i-am-a-lover-yet.
* 
* @param	string	sStr
* @param	string	sFindStr
* @param	string	sReplaceStr
* @return	string
* @access	public
*/
function Replace(sStr,sFindStr,sReplaceStr) {
	var re = new RegExp(sFindStr,'gi');
	var sNewStr = sStr.replace(re,sReplaceStr);
	return sNewStr;
}

/**
* 在文字左方加上指定數目遮罩
* 
* var sHour=MaskLeft(GetHour(), 2, "0");
* 
* @param sSource
* @param iTotal
* @param cPading
* @return	number
*/
function MaskLeft(sSource, iTotal, cPading) {
	var sResult="";
	var iSouLen=Len(GetStr(sSource));
//	alert("iSouLen == ["+iSouLen+"] iTotal == ["+iTotal+"]");
	var iTmp=0;
	if (iSouLen>=iTotal) {
//		alert("enter true");
		sResult=sSource;
	} else {
//		alert("enter false");
		iTmp=iTotal-iSouLen;
		for (i=1; i<=iTmp; i++) {
			sResult=GetStr(sResult)+GetStr(cPading);
//			alert("enter false for loop sResult == [" + sResult + "]");
		}
		sResult=sResult+sSource;
//		alert("enter false sResult == [" + sResult + "]");
	}
	return sResult;
}

/**
* 在文字右方加上指定數目遮罩
* 
* var sHour=MaskRight(GetHour(), 2, "0");
* 
* @param sSource
* @param iTotal
* @param cPading
* @return	number
*/
function MaskRight(sSource, iTotal, cPading) {
	var sResult="";
	var iSouLen=Len(GetStr(sSource));
	var iTmp=0;
	if (iSouLen>=iTotal) {
//		alert("enter true");
		sResult=sSource;
	} else {
//		alert("enter false");
		iTmp=iTotal-iSouLen;
		for (i=1; i<=iTmp; i++) {
			sResult=GetStr(sResult)+GetStr(cPading);
//			alert("enter false for loop sResult == [" + sResult + "]");
		}
		sResult=sSource+sResult;
//		alert("enter false sResult == [" + sResult + "]");
	}
	return sResult;
}

/**
* 將字元轉為 ASCII 碼
* 
* alert(CharToAscii(s));
* 
* @param s
* @return	number
*/
function CharToAscii(s) {
	var iCode=s.charCodeAt(0);
	return iCode;
}

/**
* 將 ASCII 碼轉為字元
* 
* alert(AsciiToChar(25105));
* 
* @param i
* @return	string
*/
function AsciiToChar(i) {
	var s=String.fromCharCode(i);
	return s;
}

/**
* 將字串全轉為陣列字元
* 
* aResult=StringToCharArray(s);
* alert(aResult);
* 
* @param s
* @return	object
*/
function StringToCharArray(s) {
	var iTmp=s.length;
	var sTmp="";
	var aResult=Array();
	for (i=0; i<iTmp; i++) {
		sTmp=s.charAt(i);
		aResult=UnidimensionalArrayAppend(aResult,sTmp)
	}
	return aResult;
}

/**
* 將字串前後空白去除
* 
* Trim("   abc   ");  ==> abc
* 
* @param sStr
* @return	string
*/
function Trim(str) {
	return RTrim(LTrim(str));
}

//##############################################################################################

//######################################## 陣列相關函數 ########################################
/**
* 取得陣列長度
* 
* var aVal = new Array(["a1"],["a2"],["a3"]);
* GetUnidimensionalArrayLength(aVal); ==> 3
* 
* @param aVal
* @return	number
*/
function GetUnidimensionalArrayLength(aVal) {
	var iNumber = aVal.length;
	return GetInt(iNumber);
}

/**
* 將值附加在陣列後
* 
* sStr1="select * from abc";
* aStr = StringToArray(sStr1," "); ==> length=4
* aStr = UnidimensionalArrayAppend(aStr,"where"); ==> length=5
* 
* @param vArray
* @param sStr
* @return	object
*/
function UnidimensionalArrayAppend(vArray,sStr) {
	iNumber=GetUnidimensionalArrayLength(vArray);
	vArray[iNumber]=sStr;
	return vArray; 
}

//##############################################################################################

//######################################## 表單資訊相關函數 ########################################
/**
* 列出表單元素名稱
* 
* var a=Event_FormElementList(test);
* alert(a);
* 
* @param oFormName
* @return	object
*/
function Event_FormElementNameList(oFormName) {
	var iFormLength=oFormName.length;
	var aContent=Array();
	for (i=0; i<iFormLength; i++) {
		aContent=UnidimensionalArrayAppend(aContent, oFormName[i].name);
	}
	return aContent;
}

/**
* 列出表單元素類型
* 
* var a=Event_FormElementTypeList(test);
* alert(a);
* 
* @param oFormName
* @return	object
*/
function Event_FormElementTypeList(oFormName) {
	var iFormLength=oFormName.length;
	var aContent=Array();
	for (i=0; i<iFormLength; i++) {
		aContent=UnidimensionalArrayAppend(aContent, oFormName[i].type);
	}
	return aContent;
}

//##################################################################################################

//######################################## 表單驗證相關函數 ########################################
/**
* 驗證台灣人民身份證字號，若有誤則回傳 false
* 
* alert(Verify_PersonalID("A122384060"));
* 
* @param sId
* @return	boolean
*/
function Verify_PersonalID(sId) {
	var LegalID = "0123456789"
	var fResult=true;
	if(sId.length<10)
		fResult=false;
	else{
		if((sId.charAt(0)=='A') || (sId.charAt(0)=='a')) value=10
		else if((sId.charAt(0)=='B') || (sId.charAt(0)=='b')) value=11
		else if((sId.charAt(0)=='C') || (sId.charAt(0)=='c')) value=12
		else if((sId.charAt(0)=='D') || (sId.charAt(0)=='d')) value=13
		else if((sId.charAt(0)=='E') || (sId.charAt(0)=='e')) value=14
		else if((sId.charAt(0)=='F') || (sId.charAt(0)=='f')) value=15
		else if((sId.charAt(0)=='G') || (sId.charAt(0)=='g')) value=16
		else if((sId.charAt(0)=='H') || (sId.charAt(0)=='h')) value=17
		else if((sId.charAt(0)=='J') || (sId.charAt(0)=='j')) value=18
		else if((sId.charAt(0)=='K') || (sId.charAt(0)=='k')) value=19
		else if((sId.charAt(0)=='L') || (sId.charAt(0)=='l')) value=20
		else if((sId.charAt(0)=='M') || (sId.charAt(0)=='m')) value=21
		else if((sId.charAt(0)=='N') || (sId.charAt(0)=='n')) value=22
		else if((sId.charAt(0)=='P') || (sId.charAt(0)=='p')) value=23
		else if((sId.charAt(0)=='Q') || (sId.charAt(0)=='q')) value=24
		else if((sId.charAt(0)=='R') || (sId.charAt(0)=='r')) value=25
		else if((sId.charAt(0)=='S') || (sId.charAt(0)=='s')) value=26
		else if((sId.charAt(0)=='T') || (sId.charAt(0)=='t')) value=27
		else if((sId.charAt(0)=='U') || (sId.charAt(0)=='u')) value=28
		else if((sId.charAt(0)=='V') || (sId.charAt(0)=='v')) value=29
		else if((sId.charAt(0)=='X') || (sId.charAt(0)=='x')) value=30
		else if((sId.charAt(0)=='Y') || (sId.charAt(0)=='y')) value=31
		else if((sId.charAt(0)=='W') || (sId.charAt(0)=='w')) value=32
		else if((sId.charAt(0)=='Z') || (sId.charAt(0)=='z')) value=33
		else if((sId.charAt(0)=='I') || (sId.charAt(0)=='i')) value=34
		else if((sId.charAt(0)=='O') || (sId.charAt(0)=='o')) value=35
		else fResult = false ;
	}
	if(fResult==true){
		value = Math.floor(value/10) + (value%10)*9 + parseInt(sId.charAt(1))*8 +
			parseInt(sId.charAt(2))*7 + parseInt(sId.charAt(3)) * 6 + parseInt(sId.charAt(4)) * 5 +
			parseInt(sId.charAt(5))*4 + parseInt(sId.charAt(6)) * 3+ parseInt(sId.charAt(7)) * 2+
			parseInt(sId.charAt(8)) + parseInt(sId.charAt(9)) ;
		value = value % 10 ;
		if(value!=0) fResult = false ;

		var i;
		var c;
		for (i = 1; i < sId.length; i++){
			c = sId.charAt(i);
			if (LegalID.indexOf(c) == -1) fResult = false;
		}
	}
	if(fResult == false)
		return false;
	else
		return true;
}

/**
* 驗證 E-Mail ，若有誤則回傳 false
* 
* alert(Verify_EMail("A122384060"));
* 
* @param sValue
* @return	boolean
*/
function Verify_EMail(sValue) {
	var sValue2 = sValue
	if ((sValue2 == "") || (sValue2.indexOf ('@', 0) == -1) || (sValue2.indexOf ('.', 0) == -1) || (sValue2.length < 6|| sValue2.indexOf ('.',0) == -1)) {
		return false;
	} else {
		return true;
	}
}

/**
* 驗證數字，若有誤則回傳 false
* 
* alert(Verify_CompanyID("11112222"));
* 
* @param sStr
* @return	boolean
*/
function Verify_Digital(sStr) {
	var Letters = "0123456789"; 
	for (i=0; i< sStr.length; i++) { 
		var CheckChar = sStr.charAt(i); 
		if (Letters.indexOf(CheckChar) == -1) { 
			//alert("電話號碼格式不正確！"); 
			//document.form.tell.focus(); 
			return false;
		} 
	} 
	return true
}

/**
* 驗證公司統一編號，若有誤則回傳 false
* 
* alert(Verify_CompanyID("11112222"));
* 
* @param sStr
* @return	boolean
*/
function Verify_CompanyID(sStr) {
	var ID=sStr;
	var ID1=ID.charAt(0) ;
	var ID2=ID.charAt(1) ;
	var ID3=ID.charAt(2) ;
	var ID4=ID.charAt(3) ;
	var ID5=ID.charAt(4) ;
	var ID6=ID.charAt(5) ;
	var ID7=ID.charAt(6) ;
	var ID8=ID.charAt(7) ;
	//邏輯乘數宣告
	var LG1=1 ;
	var LG2=2 ;
	var LG3=1 ;
	var LG4=2 ;
	var LG5=1 ;
	var LG6=2 ;
	var LG7=4 ;
	var LG8=1 ;
	//乘積宣告
	var Resault01=ID1*LG1 ;
	var Resault02=ID2*LG2 ;
	var Resault03=ID3*LG3 ;
	var Resault04=ID4*LG4 ;
	var Resault05=ID5*LG5 ;
	var Resault06=ID6*LG6 ;
	var Resault07=ID7*LG7 ;
	var Resault08=ID8*LG8 ;
	//加總
	var fResault01=ReSum(Resault01) ;
	var fResault02=ReSum(Resault02) ;
	var fResault03=ReSum(Resault03) ;
	var fResault04=ReSum(Resault04) ;
	var fResault05=ReSum(Resault05) ;
	var fResault06=ReSum(Resault06) ;
	var fResault07=ReSum(Resault07) ;
	var fResault08=ReSum(Resault08) ;
	
	//驗證
	objConfirm=fResault01+fResault02+fResault03+fResault04+fResault05+fResault06+fResault07+fResault08
	if (objConfirm % 10 == 0){
		return true;
	}else{
		return false;
	}
}

/**
* 驗證公司統一編號之副程式
* 
* var fResault04=ReSum(Resault04) ;
* 
* @param objValue
* @return	number
*/
function ReSum(objValue) {
	var sobjValue=objValue.toString() ;
	var sString=sobjValue.length ;
	if (sString==2){
		objInt01=sobjValue.charAt(0) ;
		objInt02=sobjValue.charAt(1) ;
		reSumx=parseInt(objInt01)+parseInt(objInt02) ;
	}else{
		reSumx=objValue ;
	}
	return reSumx ;
}

//##################################################################################################

//######################################## 日期相關函數 ########################################
/**
* 取得西元年
* 
* alert("GetYear == "+GetYear());
* 
* @return	number
*/
function GetYear() {
	var dNow=new Date();
	var sYear=dNow.getYear();
	return sYear;
}

/**
* 取得月份
* 
* alert("GetMonth == "+GetMonth());
* 
* @return	number
*/
function GetMonth() {
	var dNow=new Date();
	var sMonth=dNow.getMonth(); //The value returned by getMonth is an integer between zero and 11
	return sMonth+1;
}

/**
* 取得日數
* 
* alert("GetDay == "+GetDay());
* 
* @return	number
*/
function GetDay() {
	var dNow=new Date();
	var sDay=dNow.getDate();
	return sDay;
}

/**
* 取得小時
* 
* alert("GetHour == "+GetHour());
* 
* @return	number
*/
function GetHour() {
	var dNow=new Date();
	var sHour=dNow.getHours(); //The value returned by getHours is an integer between zero and 23
	return sHour;
}

/**
* 取得分
* 
* alert("GetMinute == "+GetMinute());
* 
* @return	number
*/
function GetMinute() {
	var dNow=new Date();
	var sMinute=dNow.getMinutes(); //The value returned by getMinutes is an integer between zero and 59
	return sMinute;
}

/**
* 取得秒
* 
* alert("GetSecond == "+GetSecond());
* 
* @return	number
*/
function GetSecond() {
	var dNow=new Date();
	var sSecond=dNow.getSeconds(); //The value returned by getSeconds is an integer between zero and 59
	return sSecond;
}

/**
* 取得日期
* 
* alert("GetDate == "+GetDate());
* 
* @return	string
*/
function GetDate() {
	var sYear=GetYear();
	var sMonth=MaskLeft(GetMonth(), 2, "0");
	var sDay=MaskLeft(GetDay(), 2, "0");
	var sDate=GetStr(sYear)+GetStr(sMonth)+GetStr(sDay);
	return sDate;
}

/**
* 取得時間
* 
* alert("GetTime == "+GetTime());
* 
* @return	string
*/
function GetTime() {
	var sHour=MaskLeft(GetHour(), 2, "0");
	var sMinute=MaskLeft(GetMinute(), 2, "0");
	var sSecond=MaskLeft(GetSecond(), 2, "0");
	var sTime=GetStr(sHour)+GetStr(sMinute)+GetStr(sSecond);
	return sTime;
}

/**
* 取得日期時間
* 
* alert("GetDateTime == "+GetDateTime());
* 
* @return	string
*/
function GetDateTime() {
	var sDate=GetDate();
	var sTime=GetTime();
	var sDateTime=GetStr(sDate)+GetStr(sTime);
	return sDateTime;
}

/**
* 日期加減，可使用「yyyy」、「q」、「m」、「y」、「d」、「w」、「ww」、「h」、「n」、「s」、「ms」
* 
* DateAdd("q", 1, "20050201101010");
* DateAdd("q", 1, "20050201");
* DateAdd("q", 1, "20050201101010222");
* 
* @param sInterval
* @param iNumber
* @param sDateTime
* @return	string
*/
function DateAdd(sInterval, iNumber, sDateTime) {
	var sResult="";
//	alert("sDateTime == "+sDateTime);
	var iDate=Len(GetStr(sDateTime));
//	alert("iDate == "+iDate);
	var sTmpDate="";
	if (iDate>14) {
		sTmpDate=Left(sDateTime, 14);
//		alert("iDate > 14 sTmpDate == "+sTmpDate);
	} else {
		sTmpDate=MaskRight(sDateTime, 14, "0");
//		alert("iDate <= 14 sTmpDate == "+sTmpDate);
	}

	var sTmpDateYear=Left(sTmpDate, 4);
	var sTmpDateMonth=Right(Left(sTmpDate, 6), 2);
	var sTmpDateDay=Right(Left(sTmpDate, 8), 2);
	var sTmpDateHour=Right(Left(sTmpDate, 10), 2);
	var sTmpDateMinute=Right(Left(sTmpDate, 12), 2);
	var sTmpDateSecond=Right(Left(sTmpDate, 14), 2);


//	alert("Year == ["+sTmpDateYear+"] Month == ["+sTmpDateMonth+"] Day == ["+sTmpDateDay+"]");
//	alert("H == ["+sTmpDateHour+"] M == ["+sTmpDateMinute+"] S == ["+sTmpDateSecond+"]");
	var dDateTime = new Date(sTmpDateYear, GetInt(sTmpDateMonth)-1, sTmpDateDay, sTmpDateHour, sTmpDateMinute, sTmpDateSecond);
//	alert("dDateTime 1 == "+dDateTime);
//	alert(GetMonth());
	switch (sInterval) {
		case "yyyy": {// year
			dDateTime.setFullYear(dDateTime.getFullYear() + iNumber);
			break;
		}
		case "q": {		// quarter
			dDateTime.setMonth(dDateTime.getMonth() + (iNumber*3));
			break;
		}
		case "m": {		// month
			dDateTime.setMonth(dDateTime.getMonth() + iNumber);
			break;
		}
		case "y":		// day of year
		case "d":		// day
		case "w": {		// weekday
			dDateTime.setDate(dDateTime.getDate() + iNumber);
			break;
		}
		case "ww": {	// week of year
			dDateTime.setDate(dDateTime.getDate() + (iNumber*7));
			break;
		}
		case "h": {		// hour
			dDateTime.setHours(dDateTime.getHours() + iNumber);
			break;
		}
		case "n": {		// minute
			dDateTime.setMinutes(dDateTime.getMinutes() + iNumber);
			break;
		}
		case "s": {		// second
			dDateTime.setSeconds(dDateTime.getSeconds() + iNumber);
			break;
		}
		case "ms": {		// second
			dDateTime.setMilliseconds(dDateTime.getMilliseconds() + iNumber);
			break;
		}
		default: {
			break;
		}
	}
	var sYear=GetStr(dDateTime.getYear());
	if (Len(sYear)==2)	{
		sYear="19"+sYear;
	}
	var sMonth=MaskLeft(GetStr(dDateTime.getMonth()+1), 2, "0");
	var sDay=MaskLeft(GetStr(dDateTime.getDate()), 2, "0");
	var sHour=MaskLeft(GetStr(dDateTime.getHours()), 2, "0");
	var sMinute=MaskLeft(GetStr(dDateTime.getMinutes()), 2, "0");
	var sSecond=MaskLeft(GetStr(dDateTime.getSeconds()), 2, "0");
	sResult=sYear+sMonth+sDay+sHour+sMinute+sSecond;
//	alert("dDateTime 2 == "+dDateTime);
//	alert("sResult == "+sResult);
	return sResult;
}

//##############################################################################################

//######################################## 其它相關函數 ########################################

//##############################################################################################