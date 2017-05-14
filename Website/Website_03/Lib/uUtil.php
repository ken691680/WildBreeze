<?php
/**
* 本模組供 PHP Version 4.2.2 使用
*
* 以下提供處理變數相關之功能
*
* @author    casper <lutherworker@yahoo.com.tw>
* @version   v2.0
* @access    public
* @copyright made by casper in 2005 all rights reserved
*/

/**
* 取得變數型態
* 
* 以下為變數型態值陳述
* "boolean" (since PHP 4)
* "integer"
* "double" (for historical reasons "double" is returned in case of a float, and not simply "float")
* "string"
* "array"
* "object"
* "resource" (since PHP 4)
* "NULL" (since PHP 4)
* "user function" (PHP 3 only, deprecated)
* "unknown type"
* 
* @param object  $sVar
* @return string $ok
* @access	public
*/
function GetVariableType($sVar) {
	return gettype($sVar);
}

/**
* 判斷是否為整數
* 
* $sVar="abc"; 
* IsInt($sVar) ==> false; 
* 
* @param object $sVar
* @return bool  $ok
* @access	public
*/
function IsInt($sVar) {
	return is_int($sVar);
}

/**
* 判斷是否為字串
* 
* $sVar="abc"; 
* IsStr($sVar) ==> true; 
* 
* @param object $sVar
* @return	bool  $ok
* @access	public
*/
function IsStr($sVar) {
	return is_string($sVar);
}

/**
* 判斷是否為布林
* 
* $sVar="abc"; 
* IsBool($sVar) ==> false; 
* 
* @param object $sVar
* @return bool  $ok
* @access	public
*/
function IsBool($sVar) {
	return is_bool($sVar);
}

/**
* 判斷是否為浮點數
* 
* $sVar="abc"; 
* IsFloat($sVar) ==> false; 
* 
* @param object $sVar
* @return bool  $ok
* @access	public
*/
function IsFloat($sVar) {
	return is_float($sVar);
}

/**
* 判斷是否為陣列
* 
* $sVar="abc"; 
* IsArray($sVar) ==> false; 
* 
* @param object $sVar
* @return	bool  $ok
* @access	public
*/
function IsArray($sVar) {
	return is_array($sVar);
}

/**
* 判斷是否為物件
* 
* $sVar="abc"; 
* IsObject($sVar) ==> false; 
* 
* @param object $sVar
* @return bool  $ok
* @access	public
*/
function IsObject($sVar) {
	return is_object($sVar);
}

/**
* 判斷是否為數字
* 
* $sVar="abc"; 
* IsNumeric($sVar) ==> false; 
* 
* @param object $sVar
* @return	bool  $ok
* @access	public
*/
function IsNumeric($sVar) {
	return is_numeric($sVar);
}

/**
* 判斷是否為 null
* 
* $sVar="abc"; 
* IsNull($sVar) ==> false; 
* 
* @param object $sVar
* @return	bool  $ok
* @access	public
*/
function IsNull($sVar) {
	return is_null($sVar);
}

/**
* 確認資料安全性，字串型態
* 
* $sVar=false; 
* SafeStr($sVar) ==> "false"; 
* 
* @param object  $o
* @return	string $ok
* @access	public
*/
function SafeStr($o) {
	$sResult="";
	$sType=GetVariableType($o);
	if ($sType=="boolean") {
		if ($o==true) {
			$sResult="true";
		} else {
			$sResult="false";
		}
	} else if ($sType=="integer") {
		$sResult=(string)$o;
	} else if ($sType=="double") {
		$sResult=(string)$o;
	} else if ($sType=="string") {
		$sResult=$o;
	} else if ($sType=="array") {
		$sResult="";
	} else if ($sType=="object") {
		$sResult="";
	} else if ($sType=="resource") {
		$sResult="";
	} else if ($sType=="NULL") {
		$sResult="";
	} else if ($sType=="user function") {
		$sResult="";
	} else if ($sType=="unknown type") {
		$sResult="";
	} else {
		$sResult="";
	}
	return $sResult;
}

/**
* 確認資料安全性，布林型態
* 
* $sVar=false; 
* SafeBoo($sVar) ==> false;
* 
* @param object  $o
* @return	string $ok
* @access	public
*/
function SafeBoo($o) {
	$bResult=false;
	$sType=GetVariableType($o);
	if ($sType=="boolean") {
		$bResult=$o;
	} else if ($sType=="integer") {
		if (SafeStr($o)=="1") {
			$bResult=true;
		} else {
			$bResult=false;
		}
	} else if ($sType=="double") {
		if (SafeStr($o)=="1") {
			$bResult=true;
		} else {
			$bResult=false;
		}
	} else if ($sType=="string") {
		if (SafeStr($o)=="1" || SafeStr($o)=="true") {
			$bResult=true;
		} else {
			$bResult=false;
		}
	} else if ($sType=="array") {
		$bResult=false;
	} else if ($sType=="object") {
		$bResult=false;
	} else if ($sType=="resource") {
		$bResult=false;
	} else if ($sType=="NULL") {
		$bResult=false;
	} else if ($sType=="user function") {
		$bResult=false;
	} else if ($sType=="unknown type") {
		$bResult=false;
	} else {
		$bResult=false;
	}
	return $bResult;
}

/**
* 確認資料安全性，整數型態
* 
* $sVar=false; 
* SafeInt($sVar) ==> 0;
* 
* @param object  $o
* @return	string $ok
* @access	public
*/
function SafeInt($o) {
	$iResult=0;
	$sType=GetVariableType($o);
	if ($sType=="boolean") {
		if ($o==true) {
			$iResult=1;
		} else {
			$iResult=0;
		}
	} else if ($sType=="integer") {
		$iResult=$o;
	} else if ($sType=="double") {
		$iResult=(int)$o;
	} else if ($sType=="string") {
		$iResult=(int)$o;
	} else if ($sType=="array") {
		$iResult=0;
	} else if ($sType=="object") {
		$iResult=0;
	} else if ($sType=="resource") {
		$iResult=0;
	} else if ($sType=="NULL") {
		$iResult=0;
	} else if ($sType=="user function") {
		$iResult=0;
	} else if ($sType=="unknown type") {
		$iResult=0;
	} else {
		$iResult=0;
	}
	return $iResult;
}

/**
* 確認資料安全性，浮點數型態
* 
* $sVar=false; 
* SafeInt($sVar) ==> 0;
* 
* @param object  $o
* @return	string $ok
* @access	public
*/
function SafeDou($o) {
	$dResult=0.0;
	$sType=GetVariableType($o);
	if ($sType=="boolean") {
		if ($o==true) {
			$dResult=1.0;
		} else {
			$dResult=0.0;
		}
	} else if ($sType=="integer") {
		$dResult=(double)$o;
	} else if ($sType=="double") {
		$dResult=$o;
	} else if ($sType=="string") {
		$dResult=(double)$o;
	} else if ($sType=="array") {
		$dResult=0.0;
	} else if ($sType=="object") {
		$dResult=0.0;
	} else if ($sType=="resource") {
		$dResult=0.0;
	} else if ($sType=="NULL") {
		$dResult=0.0;
	} else if ($sType=="user function") {
		$dResult=0.0;
	} else if ($sType=="unknown type") {
		$dResult=0.0;
	} else {
		$dResult=0;
	}
	return $dResult;
}

/**
* 本模組供 PHP Version 4.2.2 使用
*
* 以下提供處理字串相關之功能
*
* @author    casper <lutherworker@yahoo.com.tw>
* @version   v2.0
* @access    public
* @copyright made by casper in 2005 all rights reserved
*/

/**
* 將文字轉為小寫，中英混合無問題
* 
* $sVar="ABC"; 
* LCase($sVar) ==> "abc"; 
* 
* @param	string	$sStr
* @return	string	$ok
* @access	public
*/
function LCase($sStr) {
	/*
	$iLen=strlen($sStr);
	$sResult="";
	for ($tmp_i=0; $tmp_i<$iLen; $tmp_i++ ) {
		$ascii_str_a = substr($sStr, $tmp_i , 1);
		$ascii_str_b = substr($sStr, $tmp_i+1, 1);
		$ascii_value_a = ord($ascii_str_a);
		$ascii_value_b = ord($ascii_str_b);

		if ( $ascii_value_a > 127 ) {
			$sResult=$sResult.substr($sStr, $tmp_i , 2);
			$tmp_i++;
		} else {
			$sResult=$sResult.strtolower($ascii_str_a);
		}
	}
	return $sResult;
	*/
	return mb_strtolower($sStr, 'UTF-8');
}

/**
* 將文字轉為大寫，中英混合無問題
* 
* $sVar="abc"; 
* UCase($sVar) ==> "ABC"; 
* 
* @param	string	$sStr
* @return	string	$ok
* @access	public
*/
function UCase($sStr) {
	/*
	$iLen=strlen($sStr);
	$sResult="";
	for ($tmp_i=0; $tmp_i<$iLen; $tmp_i++ ) {
		$ascii_str_a = substr($sStr, $tmp_i , 1);
		$ascii_str_b = substr($sStr, $tmp_i+1, 1);
		$ascii_value_a = ord($ascii_str_a);
		$ascii_value_b = ord($ascii_str_b);

		if ( $ascii_value_a > 127 ) {
			$sResult=$sResult.substr($sStr, $tmp_i , 2);
			$tmp_i++;
		} else {
			$sResult=$sResult.strtoupper($ascii_str_a);
		}
	}
	return $sResult;
	*/
	return mb_strtoupper($sStr, 'UTF-8');
}

/**
* 取得文字長度，中英混合亦可判斷
* 
* Len("abc") ==> 3; 
* 
* @param	string  $sStr	
* @return	int     $ok
* @access	public
*/
function Len($sStr) {
	/*
	$iLen=strlen($sStr);
	$iResult=0;
	for ($tmp_i=0; $tmp_i<$iLen; $tmp_i++ ) {
		$ascii_str_a = substr($sStr, $tmp_i , 1);
		$ascii_str_b = substr($sStr, $tmp_i+1, 1);
		$ascii_value_a = ord($ascii_str_a);
		$ascii_value_b = ord($ascii_str_b);

		if ( $ascii_value_a > 127 ) {
			$tmp_i++;
		}
		$iResult=$iResult+1;
	}

		return $iResult;
	*/
	
	//Bug Fix For Utf-8
	return mb_strlen($sStr, 'UTF-8');
}

/**
* 置換指定字串
* 
* Replace("abcdefabc","abc","i love u") ==> "i love udefi love u";
* 
* @param	string	$sContent
* @param	string	$sTarget
* @param	string	$sReplace
* @return	string	$ok
* @access	public
*/
function Replace($sContent,$sTarget,$sReplace) {
	$sReplace = SafeStr($sReplace);
	//uLog("Replace sReplace == ".$sReplace);
	//uLog("Replace sContent == ".$sContent);
	//uLog("Replace sTarget == ".$sTarget);
	//$sContent=ereg_replace($sTarget,$sReplace,$sContent);
	$sContent=str_replace($sTarget,$sReplace,$sContent);
	//$sContent=mb_eregi_replace($sTarget,$sReplace,$sContent);
	//uLog("Replace sContent result == ".$sContent);
	return $sContent;
}

/**
* 在字串兩邊增加雙引號
* 
* StrAddQuote("abc") ==> "abc";
* 
* @param	string	$s	
* @return	string	$ok
* @access	public
*/
function StrAddQuote($s) {
	return "\"".$s."\"";
}

/**
* 在字串兩邊增加單引號
* 
* StrAddSingleQuote("abc") ==> 'abc';
* 
* @param	string	$s	
* @return	string	$ok
* @access	public
*/
function StrAddSingleQuote($s) {
	return "'".$s."'";
}

/**
* 指定欲傳回的字串數
* 
* Mid("01234567", 1, 2) ==> "01"
* 
* @param	string   $sStr
* @param	integer  $iStart
* @param	integer  $iStrLen
* @return	string   $ok
* @access	public
*/
function Mid($sStr, $iStart, $iStrLen){
	/*
	$iLen=strlen($sStr);
	$iResult=0;
	$sResult="";
	$iStrStart=0;
	$bInLoop=false;
	for ($tmp_i=0; $tmp_i<$iLen; $tmp_i++ ) {
		$iResult=$iResult+1;
		$ascii_str_a = substr($sStr, $tmp_i , 1);
		$ascii_str_b = substr($sStr, $tmp_i+1, 1);
		$ascii_value_a = ord($ascii_str_a);
		$ascii_value_b = ord($ascii_str_b);

		if ( $ascii_value_a > 127 ) {
			if ($iResult==$iStart) {
				$sResult=$sResult.substr($sStr, $tmp_i , 2);
				$iStrStart++;
				$bInLoop=true;
			} else {
				if ($bInLoop==false && $iStrStart<$iStrLen && $iStrStart>0) {
					$sResult=$sResult.substr($sStr, $tmp_i , 2);
					$iStrStart++;
				}
			}
			$tmp_i++;
		} else {
			if ($iResult==$iStart) {
				$sResult=$sResult.$ascii_str_a;
				$iStrStart++;
				$bInLoop=true;
			} else {
				if ($bInLoop==false && $iStrStart<$iStrLen && $iStrStart>0) {
					$sResult=$sResult.$ascii_str_a;
					$iStrStart++;
				}
			}
		}
		$bInLoop=false;
		
	}
	return $sResult;
	*/
	$iLen=Len($sStr);
	$iResult=0;
	$sResult="";
	$iStrStart=0;
	$bInLoop=false;

	for ($tmp_i=0; $tmp_i<$iLen; $tmp_i++ ) {
		$iResult++;

		if ($iResult==$iStart) {
			$sResult=$sResult.mb_substr($sStr, $tmp_i , $iStrLen, 'UTF-8');
			$iStrStart++;
			$bInLoop=true;
		}
	}
	return $sResult;
}

/**
* 將字串轉為字元陣列
* 
* StringToCharArray("我是abc") ==> Array("我","是","a","b","c");
* 
* @param	string  $sStr
* @return	array   $ok
* @access	public
*/
function StringToCharArray($sStr, $split_len=1) {
	/*
	$aResult=Array();
	$iLen=strlen($sStr);
	$iResult=0;
	for ($tmp_i=0; $tmp_i<$iLen; $tmp_i++ ) {
		$ascii_str_a = substr($sStr, $tmp_i , 1);
		$ascii_str_b = substr($sStr, $tmp_i+1, 1);
		$ascii_value_a = ord($ascii_str_a);
		$ascii_value_b = ord($ascii_str_b);

		if ( $ascii_value_a > 127 ) {
			$aResult=UnidimensionalArrayAppend($aResult,substr($sStr, $tmp_i , 2));
			$tmp_i++;
		} else {
			$aResult=UnidimensionalArrayAppend($aResult,$ascii_str_a);
		}
		$iResult=$iResult+1;
	}
	return $aResult;
	*/
	if (!preg_match('/^[0-9]+$/', $split_len) || $split_len < 1)
			return FALSE;

	$len = mb_strlen($sStr, 'UTF-8');
	if ($len <= $split_len)
			return array($sStr);

	preg_match_all('/.{'.$split_len.'}|[^\x00]{1,'.$split_len.'}$/us', $sStr, $ar);

	return $ar[0];

}

/**
* 將字元陣列合併為字串
* 
* CharArrayToString(Array("我","是","a","b","c")) ==> 我是abc
* 
* @param	array    $aChar
* @return	string   $sResult
* @access	public
*/
function CharArrayToString($aChar) {
	$iArrayLength = GetUnidimensionalArrayLength($aChar);
	$sResult = "";
	for ($i = 0; $i < $iArrayLength; $i++) {
		$sResult = $sResult.$aChar[$i];
	}
	return $sResult;
}

/**
* 將字串反轉
* 
* $sStr="i am abc";
* StrReverse($sStr) ==> "cba ma i";
* 
* @param	string  $sStr
* @return	string  $sResult
* @access	public
*/
function StrReverse($sStr) {
	$aTmp=StringToCharArray($sStr);
	$iArrayLength = GetUnidimensionalArrayLength($aTmp);
	$sResult = "";
	for ($i = 0; $i < $iArrayLength; $i++) {
		$sResult = $aTmp[$i].$sResult;
	}
	return $sResult;
}

/**
* 從字串右邊往左取指定字數
* 
* $sStr="i am abc";
* Right($sStr,3) ==> "abc";
* 
* @param	string   $sStr
* @param	integer  $iNum
* @return	string   $sResult
* @access	public
*/
function Right($sStr,$iNum) {
	$sTmp=StrReverse($sStr);
	$aTmp=StringToCharArray($sTmp);
	$iArrayLength = GetUnidimensionalArrayLength($aTmp);
	$sResult = "";
	if ($iNum>$iArrayLength) {
		uLog("Right iNum big more than string length.....");
		$sResult = $sStr;
	} else {
		for ($i = 0; $i < $iNum; $i++) {
			$sResult = $sResult.$aTmp[$i];
		}
		$sResult=StrReverse($sResult);
	}
	return $sResult;
}

/**
* 從字串左邊往右取指定字數
* 
* $sStr="i am abc";
* Left($sStr,3) ==> "i a";
* 
* @param	string   $sStr
* @param	integer  $iNum
* @return	string   $sResult
* @access	public
*/
function Left($sStr,$iNum) {
	$aTmp=StringToCharArray($sStr);
	$iArrayLength = GetUnidimensionalArrayLength($aTmp);
	$sResult = "";
	if ($iNum>$iArrayLength) {
		uLog("Left iNum big more than string length.....");
		$sResult = $sStr;
	} else {
		for ($i = 0; $i < $iNum; $i++) {
			$sResult = $sResult.$aTmp[$i];
		}
	}
	return $sResult;
}

/**
* 從字串左邊往右增加遮罩字數
* 
* $sStr="abc";
* LPad($sStr,"3", 5) ==> "33abc";
* 
* @param	string   $sStr
* @param	string   $sPadding
* @param	integer  $iNum
* @return	string   $sResult
* @access	public
*/
function LPad($sStr, $sPadding, $iNum) {
	$sResult="";

	$iLen=Len($sStr);
	$iDeff=0;
	if ($iLen<$iNum) {
		$iDeff=$iNum-$iLen;
		for ($i=1; $i<=$iDeff; $i++) {
			$sResult=$sResult.$sPadding;
		}
		$sResult=$sResult.$sStr;
	} else {
		$sResult=$sStr;
	}

	return $sResult;
}

/**
* 從字串右邊往左增加遮罩字數
* 
* $sStr="abc";
* RPad($sStr, "3", 5) ==> "abc33";
* 
* @param	string   $sStr
* @param	string   $sPadding
* @param	integer  $iNum
* @return	string   $sResult
* @access	public
*/
function RPad($sStr, $sPadding, $iNum) {
	$sResult="";

	$iLen=Len($sStr);
	$iDeff=0;
	if ($iLen<$iNum) {
		$iDeff=$iNum-$iLen;
		for ($i=1; $i<=$iDeff; $i++) {
			$sResult=$sResult.$sPadding;
		}
		$sResult=$sStr.$sResult;
	} else {
		$sResult=$sStr;
	}

	return $sResult;
}

/**
* 傳回字元的 Ascii Code ，與 ASP 相同模式
* 
* CharToAscii("C") ==> 67;
* 
* @param	string  $sStr
* @return	integer	$ok
* @access	public
*/
function CharToAscii($sStr) {
	$iResult=0;
	$s=Left($sStr, 1);
	$iLen=strlen($s);
	//echo "CharToAscii iLen == [".$iLen."]<br>";
	if ($iLen==1) {
		$iResult=ord($s);
	} else {
		$ascii_str_a = substr($s, 0, 1);
		$ascii_str_b = substr($s, 1, 1);
		$ascii_str_c = substr($s, 2, 1);
		$ascii_value_a = ord($ascii_str_a);
		$ascii_value_b = ord($ascii_str_b);
		$ascii_value_c = ord($ascii_str_c);
		//echo "CharToAscii ascii_value_a == [".$ascii_value_a."]<br>";
		//echo "CharToAscii ascii_value_b == [".$ascii_value_b."]<br>";
		//echo "CharToAscii ascii_value_c == [".$ascii_value_c."]<br>";
		//$sBin=DecToBin($ascii_value_a).DecToBin($ascii_value_b);
		//echo "CharToAscii DecToBin ascii_value_a == [".LPad(DecToBin($ascii_value_a), "0", 8)."]<br>";
		//echo "CharToAscii DecToBin ascii_value_b == [".LPad(DecToBin($ascii_value_b), "0", 8)."]<br>";
		//echo "CharToAscii DecToBin ascii_value_c == [".LPad(DecToBin($ascii_value_c), "0", 8)."]<br>";
		$sBin=LPad(DecToBin($ascii_value_a), "0", 8).LPad(DecToBin($ascii_value_b), "0", 8).LPad(DecToBin($ascii_value_c), "0", 8);
		//$iResult=BinToDec($sBin)-65536;
		$iResult=BinToDec($sBin);
	}
	return $iResult;
}

/**
* 將 Ascii Code 轉為字元
* 
* AsciiToChar(67) ==> C;
* 
* @param	integer  $iInt
* @return	string	 $ok
* @access	public
*/
function AsciiToChar($iInt) {
	$sResult="";
	$sResult01="";
	$sResult02="";
	$sBin="";
	$sBin01="";
	$sBin02="";

	if ($iInt<0) {
		$iInt=65536+$iInt;
	}

	if ($iInt>127) {
		$sBin=DecToBin($iInt);
		//echo "AsciiToChar sBin == [".$sBin."]<br>";
		$sBin01=Mid(LPad($sBin, "0", 16), 1, 8);
		$sBin02=Mid(LPad($sBin, "0", 16), 9, 8);
		$sBin03=Mid(LPad($sBin, "0", 16), 17, 8);
		//echo "AsciiToChar sBin01 == [".$sBin01."]<br>";
		//echo "AsciiToChar sBin02 == [".$sBin02."]<br>";
		//echo "AsciiToChar sBin03 == [".$sBin03."]<br>";
		$sResult01=chr(BinToDec($sBin01));
		$sResult02=chr(BinToDec($sBin02));
		$sResult03=chr(BinToDec($sBin03));
		$sResult=$sResult01.$sResult02.$sResult03;
	} else {
		$sResult=chr($iInt);
	}

	return $sResult;
}

/**
* 回傳尋找字串的位置，找不到為 0，可中英混合
* 
* $sStr="abc"; 
* $sTarget1="a";
* $sTarget2="d";
* InStr($sStr,$sTarget1) ==> 1; 
* InStr($sStr,$sTarget2) ==> 0;
* 
* @param	string  $sStr
* @param	string  $sTarget
* @return	int	    $ok
* @access	public
*/
function InStr($sStr, $sTarget) {
	/*
	$iResult=0;
	$aTmpStr=Array();
	$iTarLen=Len($sTarget);
	$sEquals="";
	$iTmpCount=0;

	//$iLen=strlen($sStr);
	$iLen=mb_strlen($sStr);
	for ($tmp_i=0; $tmp_i<$iLen; $tmp_i++ ) {

		//$ascii_str_a = substr($sStr, $tmp_i , 1);
		//$ascii_str_b = substr($sStr, $tmp_i+1, 1);

		$ascii_str_a = mb_substr($sStr, $tmp_i , 1, 'UTF-8');
		$ascii_str_b = mb_substr($sStr, $tmp_i+1, 1, 'UTF-8');
		echo "ascii_str_a == [".$ascii_str_a."]<br>";
		echo "ascii_str_a == [".$ascii_str_b."]<br>";
		$ascii_value_a = ord($ascii_str_a);
		$ascii_value_b = ord($ascii_str_b);
		echo "ascii_value_a == [".$ascii_value_a."]<br>";
		echo "ascii_value_b == [".$ascii_value_b."]<br>";

		if ( $ascii_value_a > 127 ) {
			$aTmpStr=UnidimensionalArrayAppend($aTmpStr, mb_substr($sStr, $tmp_i , 2, 'UTF-8'));
			$tmp_i++;
		} else {
			$aTmpStr=UnidimensionalArrayAppend($aTmpStr, $ascii_str_a);
		}
		if (GetUnidimensionalArrayLength($aTmpStr)>$iTarLen) {
			unset($aTmpStr[0]);
			$aTmpStr=array_values($aTmpStr);
		}
		$iTmpCount++;
		//uLog("####################### function InStr #######################");
		print_r($aTmpStr);
		//uLog("####################### function InStr #######################");
		$sEquals=CharArrayToString($aTmpStr);
		if ($sEquals==$sTarget) {
			if ($iResult==0) {
				$iResult=$iTmpCount-$iTarLen+1;
			}
		}
	}

	return $iResult;
	*/

	$iResult=0;
	$iLoopInStr=0;
	$aTmp=StringToCharArray($sStr);
	$sTmp="";
	$iStr=Len($sStr);
	//echo "[InStr] sStr == [".$sStr."]<br>";
	$iStrTar=Len($sTarget);
	//echo "[InStr] iStr == [".$iStr."]<br>";
	for ($tmp_i=0; $tmp_i<$iStr; $tmp_i++ ) {
		$iLoopInStr++;
		//echo "[InStr] Mid sStr == [".$sStr."] tmp_i == [".$tmp_i."] iStrTar == [".$iStrTar."]<br>";
		//$sTmp=Mid($sStr, $tmp_i, $iStrTar);
		$sTmp=Mid($sStr, $iLoopInStr, $iStrTar);
		//echo "[InStr] aTmp[".$tmp_i."] == [".$aTmp[$tmp_i]."]<br>";
		//echo "[InStr] sTmp == [".$sTmp."]<br>";
		if ($sTmp==$sTarget) {
			//echo "[InStr] iLoopInStr == [".$iLoopInStr."]<br>";
			$iResult=$iLoopInStr;
			break;
		}
	}
	return $iResult;
}

/**
* 回傳指定的切割字串陣列，切割值請輸入一個字元，字串可中英混合
* 
* StringToArray("select * from bbTable"," "); 
* array[0] = "select"; 
* array[1] = "*"; 
* array[2] = "from"; 
* array[3] = "bbtable"; 
* 
* @param	string	$sStr
* @param	string	$sSep
* @return	array	  $ok
* @access	public
*/
function StringToArray($sStr, $sSep) {
	$aResult=Array();

	$aTmp=StringToCharArray($sStr);
	$sTmp="";
	$iLen=GetUnidimensionalArrayLength($aTmp);
	$iMark=-1;
	for ($i=0; $i<$iLen; $i++) {
		if ($aTmp[$i]==$sSep) {
			if ($iMark==-1) {
				for ($j=0; $j<$i; $j++) {
					$sTmp=$sTmp.$aTmp[$j];
				}
				//uLog("sTmp 1 == [".$sTmp."]");
				$aResult=UnidimensionalArrayAppend($aResult, $sTmp);

				$sTmp="";
				$iMark=$i;
			} else {
				$iMark++;
				for ($j=$iMark; $j<$i; $j++) {
					$sTmp=$sTmp.$aTmp[$j];
				}
				//uLog("sTmp 2 == [".$sTmp."]");
				$aResult=UnidimensionalArrayAppend($aResult, $sTmp);
				$sTmp="";
				$iMark=$i;
			}
		}
	}

	$iMark++;
	for ($j=$iMark; $j<$i; $j++) {
		$sTmp=$sTmp.$aTmp[$j];
	}
	//uLog("sTmp 3 == [".$sTmp."]");
	$aResult=UnidimensionalArrayAppend($aResult, $sTmp);

	//$sArray = explode($sSep,$sStr);
	//return $sArray;

	return $aResult;
}

/**
* 本模組供 PHP Version 4.2.2 使用
*
* 以下提供處理陣列相關之功能
*
* @author    casper <lutherworker@yahoo.com.tw>
* @version   v2.0
* @access    public
* @copyright made by casper in 2005 all rights reserved
*/

/**
* 回傳陣列的長度
* 
* $aVar=Array(1,2); 
* GetUnidimensionalArrayLength($aVar) ==> 2; 
* 
* @param	string	$aVal
* @return	integer $iCountArray
* @access	public
*/
function GetUnidimensionalArrayLength($aVal) {
	$iCountArray=count($aVal);
	return $iCountArray;
}

/**
* 在陣列後附加值
* 
* $vArray=Array(1,2); 
* $sStr=3; 
* UnidimensionalArrayAppend($vArray,$sStr) ==> Array(1,2,3); 
* 
* @param	array   $vArray
* @param	string	$sStr
* @return	array   $vArray
* @access	public
*/
function UnidimensionalArrayAppend($vArray,$sStr) {
	$vArray[] = $sStr;
	return $vArray;
}

/**
* 判斷陣列中是否存在指定的值
* 
* $vArray=Array(1,2); 
* $sStr=3; 
* UnidimensionalArrayIndexOf($vArray,$sStr) ==> false; 
* 
* @param	array    $aArray
* @param	string	 $sValue
* @return	boolean  $bResult
* @access	public
*/
function UnidimensionalArrayIndexOf($aArray,$sValue) {
	$iArrayLength = GetUnidimensionalArrayLength($aArray);
	$bResult = false;
	for ($i = 0; $i < $iArrayLength; $i++) {
		if ($aArray[$i] == $sValue) {
			$bResult = true;
		}
	}
	return $bResult;
}

/**
* 在陣列中移走指定的值
* 
* $vArray=Array(1,2,3,3,4); 
* $sStr=3; 
* UnidimensionalArrayRemove($vArray,$sStr) ==> Array(1,2,4); 
* 
* @param	array   $aArray
* @param	string	$sValue
* @return	array   $aResult
* @access	public
*/
function UnidimensionalArrayRemove($aArray,$sValue) {
	$iArrayLength = GetUnidimensionalArrayLength($aArray);
	$aResult = Array();
	for ($i = 0; $i < $iArrayLength; $i++) {
		if ($aArray[$i] != $sValue) {
			$aResult = UnidimensionalArrayAppend($aResult,$aArray[$i]);
		}
	}
	return $aResult;
}

/**
* 本模組供 PHP Version 4.2.2 使用
*
* 以下提供處理郵件發送相關之功能
*
* @author    casper <lutherworker@yahoo.com.tw>
* @version   v2.0
* @access    public
* @copyright made by casper in 2005 all rights reserved
*/

/**
* 發送郵件到指定位置，傳回發送成功或失敗，此郵件發送依賴 PHP.ini 裏指定的發送位置，這裏並不需要指定
* 
* $iBodyFormat=0;(內容格式 0:Html, 1:Text)
* $sSubject="標題測試";
* $sBody="<font color=red><b>內容測試</b></font>";
* $sFrom="<c92309@cins.com.tw>";(寄件人)
* $sRecipient="cgicity@saturn.seed.net.tw";(收件人)
* $sCC="";(副本)
* $sBCC="lutherworker@yahoo.com.tw";(密件副本)
* $result=SendMail($iBodyFormat,$sSubject,$sBody,$sFrom,$sRecipient,$sCC,$sBCC);
* ulog::Log("mail result == ".$result);
* 
* @param	int     $iBodyFormat
* @param	string  $sSubject
* @param	string  $sBody
* @param	string  $sFrom
* @param	string  $sRecipient
* @param	string  $sCC
* @param	string  $sBCC
* @return	boolean	$bResult
* @access	public
*/
function SendMail($iBodyFormat,$sSubject,$sBody,$sFrom,$sRecipient,$sCC,$sBCC) {
	$bResult=false;
	$sResult="";
	$sHeaders="From:$sFrom\r\n";
	if ($iBodyFormat==0) {
		//$sHeaders=$sHeaders."Content-type: text/html; charset=big5\r\n";
		$sHeaders=$sHeaders."Content-type: text/html; charset=utf-8\r\n";
	}
	if (trim($sCC)!="") {
		$sHeaders=$sHeaders."Cc: $sCC\r\n";
	}
	if (trim($sBCC)!="") {
		$sHeaders=$sHeaders."Bcc: $sBCC\r\n";
	}
	//ulog::Log("mail sHeaders == ".$sHeaders);
	$bResult=mail($sRecipient, $sSubject, $sBody, $sHeaders);
//		$sResult=mail($sRecipient, $sSubject, $sBody, $sHeaders);
//		$bResult=mail($sRecipient, $sSubject, $sBody);
	return $bResult;
}

/**
* 發送郵件到指定位置，傳回發送成功或失敗，此郵件發送依賴參數裏指定的發送位置，本身即可收HTML Code
* 
* $to = "lutherworker@gmail.com";
* $nameto = "Who To";
* $from = "lutherworker@jobdone.us";
* $namefrom = "Who From";
* $subject = "Hello World Again!中文測試";
* $message = "World, Hello!<font color='red'>中文測試</font>";
* authSendEmail($from, $namefrom, $to, $nameto, $subject, $message, "jobdone.com", "1000", "lutherworker@jobdone.com", "xxyyxx");
* 
* @param	string  $from
* @param	string  $namefrom
* @param	string  $to
* @param	string  $nameto
* @param	string  $subject
* @param	string  $message
* @param	string  $smtpServer
* @param	string  $port
* @param	string  $username
* @param	string  $password
* @return	string	$output
* @access	public
*/
function AuthSendEmail($from, $namefrom, $to, $nameto, $subject, $message, $smtpServer, $port, $username, $password)
{
	//SMTP + SERVER DETAILS
	/* * * * CONFIGURATION START * * * */
	//$smtpServer = "mail.jobdone.us";
	//$port = "2626";
	$timeout = "300";
	//$username = "lutherworker@jobdone.us";
	//$password = "11160814";
	$localhost = "localhost";
	$newLine = "\r\n";
	/* * * * CONFIGURATION END * * * * */

	//Connect to the host on the specified port
	$smtpConnect = fsockopen($smtpServer, $port, $errno, $errstr, $timeout);
	$smtpResponse = fgets($smtpConnect, 515);
	if(empty($smtpConnect)) 
	{
		$output = "Failed to connect: $smtpResponse";
		return $output;
	}
	else
	{
		$logArray['connection'] = "Connected: $smtpResponse";
	}

	//Request Auth Login
	fputs($smtpConnect,"AUTH LOGIN" . $newLine);
	$smtpResponse = fgets($smtpConnect, 515);
	$logArray['authrequest'] = "$smtpResponse";

	//Send username
	fputs($smtpConnect, base64_encode($username) . $newLine);
	$smtpResponse = fgets($smtpConnect, 515);
	$logArray['authusername'] = "$smtpResponse";

	//Send password
	fputs($smtpConnect, base64_encode($password) . $newLine);
	$smtpResponse = fgets($smtpConnect, 515);
	$logArray['authpassword'] = "$smtpResponse";

	//Say Hello to SMTP
	fputs($smtpConnect, "HELO $localhost" . $newLine);
	$smtpResponse = fgets($smtpConnect, 515);
	$logArray['heloresponse'] = "$smtpResponse";

	//Email From
	fputs($smtpConnect, "MAIL FROM: $from" . $newLine);
	$smtpResponse = fgets($smtpConnect, 515);
	$logArray['mailfromresponse'] = "$smtpResponse";

	//Email To
	fputs($smtpConnect, "RCPT TO: $to" . $newLine);
	$smtpResponse = fgets($smtpConnect, 515);
	$logArray['mailtoresponse'] = "$smtpResponse";

	//The Email
	fputs($smtpConnect, "DATA" . $newLine);
	$smtpResponse = fgets($smtpConnect, 515);
	$logArray['data1response'] = "$smtpResponse";

	//Construct Headers
	$headers = "MIME-Version: 1.0" . $newLine;
	$headers .= "Content-type: text/html; charset=utf-8" . $newLine;
	$headers .= "To: $nameto <$to>" . $newLine;
	$headers .= "From: $namefrom <$from>" . $newLine;

	fputs($smtpConnect, "To: $to\nFrom: $from\nSubject: $subject\n$headers\n\n$message\n.\n");
	$smtpResponse = fgets($smtpConnect, 515);
	$logArray['data2response'] = "$smtpResponse";

	// Say Bye to SMTP
	fputs($smtpConnect,"QUIT" . $newLine); 
	$smtpResponse = fgets($smtpConnect, 515);
	$logArray['quitresponse'] = "$smtpResponse"; 
}

/**
* 本模組供 PHP Version 4.2.2 使用
*
* 以下提供處理檔案輸出入相關之功能
*
* @author    casper <lutherworker@yahoo.com.tw>
* @version   v2.0
* @access    public
* @copyright made by casper in 2005 all rights reserved
*/

/**
* 判斷是否為檔案
* 
* $sFile="D:\Project\PHP\Website_01\Demo01.txt";
* echo "IsFile == ".IsFile($sFile)."<br>";
* 
* @param	string	 $sFile
* @return	boolean	 $ok
* @access	public
*/
function IsFile($sFile) {
	if (is_file($sFile)) {
		return true; /* return 1 have file*/
	} else {
		return false;
	}
}

/**
* 判斷是否為資料夾
* 
* $sFile="D:\Project\PHP\Website_01\Demo01.txt";
* echo "IsFolder == ".IsFolder($sFile)."<br>";
* 
* @param	string	 $sFile
* @return	boolean	 $ok
* @access	public
*/
function IsFolder($sFile) {
	if (is_dir($sFile)) {
		return true; /* return 1 have file*/
	} else {
		return false;
	}
}

/**
* 判斷檔案是否存在
* 
* $sFile="D:\Project\PHP\Website_01\Demo01.txt";
* echo "FileExist == ".FileExist($sFile)."<br>";
* 
* @param	string	$sFile
* @return	boolean	$ok
* @access	public
*/
function FileExist($sFile) {
	if (IsFile($sFile)) {
		if (file_exists($sFile)) {
			return true; /* return 1 have file*/
		} else {
			return false;
		}
	} else {
		return false;
	}
}

/**
* 判斷資料夾是否存在
* 
* $sFile="D:\Project\PHP\Website_01\";
* echo "FolderExist == ".FolderExist($sFile)."<br>";
* 
* @param	string	$sFile
* @return	boolean	$ok
* @access	public
*/
function FolderExist($sFile) {
	if (IsFolder($sFile)) {
		if (file_exists($sFile)) {
			return true; /* return 1 have file*/
		} else {
			return false;
		}
	} else {
		return false;
	}
}

/**
* 建立檔案，如檔案已存在，則將覆寫為新的內容
* 
* $sFileC="D:\Project\PHP\Website_01\Demo02.txt";
* $sContent="test 測試";
* echo "FileCreate == ".FileCreate($sFileC,$sContent)."<br>";
* 
* @param	string	$sFile
* @param	string	$sContent
* @access	public
*/
function FileCreate($sFile,$sContent) {
	$fpc = fopen($sFile,"w+");

	//fwrite($fpc, stripslashes($sContent));
  //fwrite($fpc, utf8_encode($sContent));
	//fwrite($fpc, big5_encode($sContent));
	//記事本 (notepad) 儲存 utf-8 編碼文件時，會加上 BOM 檔頭
  fwrite($fpc, "\xEF\xBB\xBF".$sContent);
  //fwrite($fpc, $sContent);
	//fwrite($fpc, utf8_decode($sContent));
	//fwrite($fpc, iconv('big5', 'utf-8', $sContent));
	//fwrite($fpc, iconv( "UTF-8", "big5" , $sContent));

	fclose($fpc);
	unset($fpc);
}

/**
* 建立資料夾，如果資料夾存在就不會建立
* 
* $sFolder="D:\Project\PHP\Website_01\DemoF01"; //不能使用此方式
* $sFolder="D:/Project/PHP/Website_01/DemoF01"; //能使用此方式，注意斜線
* ulog::Log("FolderCreate == ".FolderCreate($sFolder));
* 
* @param	string	$sFolder
* @return	boolean	$bResult
* @access	public
*/
function FolderCreate($sFolder) {
	$bResult=false;
	if (FolderExist($sFolder)) {
		uLog("[FolderCreate] this folder is exist, can`t create. [".$sFolder."]");
		$bResult=false;
	} else {
		$bResult=mkdir($sFolder);
		//$bResult=true;
	}
	return $bResult;
}

/**
* 刪除指定資料夾，如果資料夾不存在，就不會進行刪除動作
* 
* $sFolder="D:\Project\PHP\Website_01\DemoF01";
* $sFolder="D:/Project/PHP/Website_01/DemoF01"; //能使用此方式，注意斜線
* ulog::Log("FolderDelete == ".FolderDelete($sFolder));
* 
* @param	string	$sFolder
* @return	boolean	$bResult
* @access	public
*/
function FolderDelete($sFolder) {
	$bResult=false;
	if (FolderExist($sFolder)) {
		rmdir($sFolder);
		$bResult=true;
	} else {
		uLog("[FolderDelete] this folder is not exist, can`t remove. [".$sFolder."]");
		$bResult=false;
	}
	return $bResult;
}

/**
* 刪除指定檔案，如果檔案不存在，就不會進行刪除動作
* 
* $sFile="D:\Project\PHP\Website_01\Demo10.txt"; //盡量不要使用此方式
* $sFile="D:/Project/PHP/Website_05/Demo03.txt"; //PHP 5 可用
* ulog::Log("FileDelete == ".FileDelete($sFile));
* 
* @param	string	$sFile
* @return	boolean	$bResult
* @access	public
*/
function FileDelete($sFile) {
	//uLog("{@FileDelete@} ################## FileDelete Start ##################");

	//uLog("{@FileDelete@} sFile == [".$sFile."]");
	$bResult=false;
	if (FileExist($sFile)) {
		//uLog("{@FileDelete@} File Exist");
		$bResult=unlink($sFile);
		//uLog("{@FileDelete@} run unlink");
		//uLog("{@FileDelete@} bResult == [".$bResult."]");
		//$bResult=true;
	} else {
		//uLog("{@FileDelete@} File Not Exist");
		uLog("[FileDelete] this file is not exist, can`t remove. [".$sFile."]");
		$bResult=false;
	}
	//uLog("{@FileDelete@} ################## FileDelete End   ##################");
	return $bResult;
}

/**
* 列出指定檔案夾裏的所有檔案，傳回陣列
* 
* $sFolder="D:/Temp/20050309";
* echo "uLog == [".uLog(FileList($sFolder))."]<br>";
* 
* @param	string	$sFolder
* @return	array   $aResult
* @access	public
*/
function FileList($sFolder) {
	$aResult=Array();
	if (IsWindows()) {
		$sLink="\\";
	} else {
		$sLink="//";
	}
	if (FolderExist($sFolder)) {
		$oDir=dir($sFolder);
		while (false !== ($entry = $oDir->read())) {
			if (is_dir($sFolder.$sLink.$entry)!=true) {
				if (is_file($sFolder.$sLink.$entry)==true) {
					$aResult=UnidimensionalArrayAppend($aResult,$entry);
				}
			}
		}
		$oDir->close();
	} else {
		uLog("[FileList] this folder is not exist, this function can`t work [".$sFolder."]");
	}
	return $aResult;
}

/**
* 列出指定檔案夾裏的所有檔案夾，傳回陣列，不含目前目錄【.】及上一層目錄【..】
* 
* $sFolder="D:/Temp/20050309";
* echo "uLog == [".uLog(FolderList($sFolder))."]<br>";
* 
* @param	string	$sFolder
* @return	array   $aResult
* @access	public
*/
function FolderList($sFolder) {
	$aResult=Array();
	if (IsWindows()) {
		$sLink="\\";
	} else {
		$sLink="//";
	}
	if (FolderExist($sFolder)) {
		$oDir=dir($sFolder);
		while (false !== ($entry = $oDir->read())) {
			if (is_dir($sFolder.$sLink.$entry)==true) {
				if (is_file($sFolder.$sLink.$entry)!=true) {
					if ($entry!="." && $entry!="..") {
						$aResult=UnidimensionalArrayAppend($aResult,$entry);
					}
				}
			}
		}
		$oDir->close();
	} else {
		uLog("[FolderList] this folder is not exist, this function can`t work [".$sFolder."]");
	}
	return $aResult;
}

/**
* 讀取文字檔內容
* 
* $sFile="D:/Temp/20050309/PER0201.sql";
* echo "uLog == [".uLog(GetFileContent($sFile))."]<br>";
* 
* @param	string	$sFile
* @return	string	$ok
* @access	public
*/
function GetFileContent($sFile) {
	$sContent = "";
	if (FileExist($sFile)) {
		$fHandle = fopen($sFile,"r");
		$sContent = fread($fHandle, filesize($sFile));
		fclose($fHandle);
		return $sContent;
	} else {
		return;
	}
}

/**
* 複制來源檔案到目的檔案
* 
* $sFile="D:/Temp/20050309/PER0201.sql";
* $sDestinationFile="D:/Temp/20050823/PER0301.sql";
* FileCopy($sFile, $sDestinationFile);
* 
* @param	string	$sSourceFile
* @param	string	$sDestinationFile
* @return	boolean	$bResult
* @access	public
*/
function FileCopy($sSourceFile,$sDestinationFile) {
	$bResult=false;
	if (FileExist($sSourceFile)) {
		$bResult=copy($sSourceFile,$sDestinationFile);
		if ($bResult==false) {
			uLog("[FileCopy] this distination file can`t be overwriting, can`t copy. [".$sDestinationFile."]");
			//echo("[FileCopy] this distination file can`t be overwriting, can`t copy. [".$sSourceFile."] [".$sDestinationFile."] [".$php_errormsg."]");
		}
	} else {
		uLog("[FileCopy] this source file is not exist, can`t copy. [".$sSourceFile."]");
		//echo("[FileCopy] this source file is not exist, can`t copy. [".$sSourceFile."]");
		$bResult=false;
	}
	return $bResult;
}

/**
* 複制來源資料夾檔案到目的資料夾
* 
* $sSouPath="D:/Project/ASP";
* $sDisPath="D:/Temp/20050918/Tmp";
* FolderCopy($sSouPath, $sDisPath);
* 
* @param	string	$sSouPath
* @param	string	$sDisPath
* @access	public
*/
function FolderCopy($sSouPath, $sDisPath) {
	//$aWaitProcessName;
	$aWaitProcess=Array(); //全路徑
	$aWaitProcessTmp=Array();
	$aFinishProcess=Array(); //全路徑
	$aDisFinishProcess=Array(); //目的地全路徑
	$bSearchStatus=true;
	if (FolderExist($sSouPath)) {
		if (FolderExist($sDisPath)) {
			$aWaitProcessName=FolderList($sSouPath);
			$iTmp=GetUnidimensionalArrayLength($aWaitProcessName);
			for ($i=0; $i<$iTmp; $i++) {
				$aWaitProcess=UnidimensionalArrayAppend($aWaitProcess, $sSouPath."/".$aWaitProcessName[$i]);
			}
			$iStop=0;
			while ($bSearchStatus) {
				//uLog("FolderCopy while count == ".$iStop);

				//開始處理路徑，並加到新路徑
				$iTmp=GetUnidimensionalArrayLength($aWaitProcess);
				for ($i=0; $i<$iTmp; $i++) {
					$aWaitProcessName=FolderList($aWaitProcess[$i]);
					/*
					uLog("################ aWaitProcessName 1 ################");
					uLog($aWaitProcessName);
					uLog("################ aWaitProcessName 1 ################");
					uLog("################ aWaitProcess 1 ################");
					uLog($aWaitProcess);
					uLog("################ aWaitProcess 1 ################");
					uLog("################ aFinishProcess 1 ################");
					uLog($aFinishProcess);
					uLog("################ aFinishProcess 1 ################");
					*/
					$iTmpII=GetUnidimensionalArrayLength($aWaitProcessName);
					for ($j=0; $j<$iTmpII; $j++) {
						$aWaitProcess=UnidimensionalArrayAppend($aWaitProcess, $aWaitProcess[$i]."/".$aWaitProcessName[$j]);
						//$aFinishProcess=UnidimensionalArrayAppend($aFinishProcess, $aWaitProcess[$i]); //此路徑處理結束
						//$aWaitProcessTmp=UnidimensionalArrayAppend($aWaitProcessTmp, $aWaitProcess[$i]); //此路徑處理結束
						/*
						uLog("################ aWaitProcessName 2 ################");
						uLog($aWaitProcessName);
						uLog("################ aWaitProcessName 2 ################");
						uLog("################ aWaitProcess 2 ################");
						uLog($aWaitProcess);
						uLog("################ aWaitProcess 2 ################");
						uLog("################ aFinishProcess 2 ################");
						uLog($aFinishProcess);
						uLog("################ aFinishProcess 2 ################");
						*/
					}
					//$aWaitProcess=UnidimensionalArrayAppend($aWaitProcess, "/".$aWaitProcessName[$i]);
					$aFinishProcess=UnidimensionalArrayAppend($aFinishProcess, $aWaitProcess[$i]); //此路徑處理結束
					$aWaitProcessTmp=UnidimensionalArrayAppend($aWaitProcessTmp, $aWaitProcess[$i]); //此路徑處理結束
				}
				//開始移除舊路徑
				$iTmp=GetUnidimensionalArrayLength($aWaitProcessTmp);
				/*
				uLog("################ aWaitProcessTmp 1 ################");
				uLog($aWaitProcessTmp);
				uLog("################ aWaitProcessTmp 1 ################");
				uLog("################ aWaitProcess 3 ################");
				uLog($aWaitProcess);
				uLog("################ aWaitProcess 3 ################");
				uLog("################ aFinishProcess 3 ################");
				uLog($aFinishProcess);
				uLog("################ aFinishProcess 3 ################");
				*/
				for ($i=0; $i<$iTmp; $i++) {
					//uLog("移除重覆陣列 == ".$aWaitProcessTmp[$i]);
					$aWaitProcess=UnidimensionalArrayRemove($aWaitProcess, $aWaitProcessTmp[$i]);
					//$aWaitProcessTmp=UnidimensionalArrayRemove($aWaitProcessTmp, $aWaitProcessTmp[$i]);
				}
				/*
				uLog("################ aWaitProcessTmp 2 ################");
				uLog($aWaitProcessTmp);
				uLog("################ aWaitProcessTmp 2 ################");
				uLog("################ aWaitProcess 4 ################");
				uLog($aWaitProcess);
				uLog("################ aWaitProcess 4 ################");
				uLog("################ aFinishProcess 4 ################");
				uLog($aFinishProcess);
				uLog("################ aFinishProcess 4 ################");
				*/
				$iStop++;
				//if (GetUnidimensionalArrayLength($aWaitProcess)==0 || $iStop==20){
				if (GetUnidimensionalArrayLength($aWaitProcess)==0){
					$bSearchStatus=false;
				}
			}
			/*
			uLog("####################### FolderCopy while count end 1 #######################");
			uLog($aFinishProcess);
			uLog("####################### FolderCopy while count end 2 #######################");
			*/
			$aFinishProcess=UnidimensionalArrayAppend($aFinishProcess, $sSouPath); //加入最後路徑
			$iTmp=GetUnidimensionalArrayLength($aFinishProcess);
			for ($i=0; $i<$iTmp; $i++) {
				$sTmpDisPath=Replace($aFinishProcess[$i], $sSouPath, $sDisPath);
				//uLog("建立資料夾[".$i."] == ".$sTmpDisPath);
				FolderCreate($sTmpDisPath);
				$aSouFilePath=FileList($aFinishProcess[$i]);
				$iTmpSouFile=GetUnidimensionalArrayLength($aSouFilePath);
				/*
				uLog("######################### aSouFilePath #########################");
				uLog($aSouFilePath);
				uLog("######################### aSouFilePath #########################");
				*/
				for ($k=0; $k<$iTmpSouFile; $k++) {
					FileCopy($aFinishProcess[$i]."/".$aSouFilePath[$k], $sTmpDisPath."/".$aSouFilePath[$k]);
				}

			}
			
		} else {
			uLog("[FolderCopy] distination folder is not exist, this function can`t work [".$sDisPath."]");
		}
	} else {
		uLog("[FolderCopy] source folder is not exist, this function can`t work [".$sSouPath."]");
	}
}

/**
* 本模組供 PHP Version 4.2.2 使用
*
* 以下提供處理數學函數相關之功能
*
* @author    casper <lutherworker@yahoo.com.tw>
* @version   v2.0
* @access    public
* @copyright made by casper in 2005 all rights reserved
*/

/**
* 取得亂數，傳回整數
* 
* it will return the random integer
* 
* @param	int	$iMin
* @param	int	$iMax
* @return	int	$ok
* @access	public
*/
function GetRnd($iMin,$iMax) {
	return rand($iMin,$iMax);
}

/**
* 二進位轉十進位
* 
* it will return the decimal
* 
* @param	string	$sNum 
* @return	int	    $ok
* @access	public
*/
function BinToDec($sNum) {
	return bindec($sNum);
}

/**
* 十進位轉二進位
* 
* it will return the binary
* 
* @param	int	    $iNum
* @return	string	$ok
* @access	public
*/
function DecToBin($iNum) {
	return decbin($iNum);
}

/**
* 十進位轉十六進位
* 
* it will return the hexadecimal 
* 
* @param	int	    $iNum
* @return	string	$ok
* @access	public
*/
function DecToHex($iNum) {
	return dechex($iNum);
}

/**
* 本模組供 PHP Version 4.2.2 使用
*
* 以下提供處理伺服器相關之功能
*
* @author    casper <lutherworker@yahoo.com.tw>
* @version   v2.0
* @access    public
* @copyright made by casper in 2005 all rights reserved
*/

/**
* 取得伺服器電腦名稱
* 
* it will return the server computer name server
* 
* @return	string	$ok
* @access	public
*/
function GetComputerName() {
	$sResult="";
	$sResult=$_ENV["COMPUTERNAME"];
	
	$bStatus=false;
	if ($sResult=="") {
		$bStatus=false;
	} else {
		$bStatus=true;
	}
	if ($bStatus==false) {
		$sResult=$_ENV["HOST"];
		$bStatus=true;
	}

	return $sResult;
}

/**
* 取得作業系統名稱
* 
* it will return the operation system name
* 
* @return	string	$ok
* @access	public
*/
function GetOSName() {
	$sResult="";
	//$sResult=$_SERVER["OS"];
	//$sResult=$_ENV["OS"];
	$sResult=getenv("OS");
	//echo "sResult == [".$sResult."]";

	$bStatus=false;
	if ($sResult=="") {
		$bStatus=false;
	} else {
		$bStatus=true;
	}
	if ($bStatus==false) {
		//$sResult=$_ENV["OSTYPE"];
		$sResult=getenv("OSTYPE");
		if ($sResult=="") {
			$bStatus=false;
		} else {
			$bStatus=true;
		}
		//$bStatus=true;
	}
	if ($bStatus==false) {
		$sResult=getenv("OS");
		if ($sResult=="") {
			$bStatus=false;
		} else {
			$bStatus=true;
		}
	}
	return $sResult;
}

/**
* 取得網路主機名稱
* 
* ex
* GetServerHostName() ==> localhost
* 
* @return	string	$ok
* @access	public
*/
function GetServerHostName() {
	//echo $_SERVER["HTTP_HOST"];
	return $_SERVER["HTTP_HOST"];
}

/**
* 取得網站伺服器軟體名稱
* 
* GetServerSoftware() ==> Microsoft-IIS/5.0
* 
* @return	string	$ok
* @access	public
*/
function GetServerSoftware() {
	return $_SERVER["SERVER_SOFTWARE"];
}

/**
* 取得使用者瀏覽器軟體名稱
* 
* GetBrowserSoftware() ==> Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; .NET CLR 1.1.4322)
* 
* @return	string	$ok
* @access	public
*/
function GetBrowserSoftware() {
	return $_SERVER["HTTP_USER_AGENT"];
}

/**
* 判斷執行環境作業系統是否為為微軟作業系統
* 
* it will return the true(1) or false
* 
* @return	boolean	$ok
* @access	public
*/
function IsWindows() {
	$sOS=UCase(GetOSName());
	//echo "IsWindows [".$sOS."]<br>";

	$iNow=InStr($sOS, "WINDOWS");
	//$iNow=InStr($sOS, "W");
	//echo "IsWindows iNow == [".$iNow."]<br>";

	if ($iNow=="0") {
		return false;
	} else {
		return true;
	}
}

/**
* 取得客戶端主機 IP 或名稱
* 
* it will return the client host name
* 
* @return	string	$ok
* @access	public
*/
function GetClientHostName() {
	$sResult="";
	$sResult=$_SERVER["REMOTE_HOST"];
	
	$bStatus=false;
	if ($sResult=="") {
		$bStatus=false;
	} else {
		$bStatus=true;
	}
	if ($bStatus==false) {
		$sResult=$_SERVER["REMOTE_ADDR"];
		$bStatus=true;
	}

	return $sResult;
}

/**
* 取得客戶所在電腦的 IP 位置
* 
* it will return the users ip
* 
* @return	string	$ok
* @access	public
*/
function GetEndUserIP() {
	$sResult="";
	$sResult=$_SERVER["REMOTE_ADDR"];
	
	$bStatus=false;
	if ($sResult=="") {
		$bStatus=false;
	} else {
		$bStatus=true;
	}
	if ($bStatus==false) {
		$sResult=$_ENV["REMOTEHOST"];
		$bStatus=true;
	}
	return $sResult;
}

/**
* 取得目前執行程式在主機網址下的相對位置
* 
* GetCurrFileNameV() == > /PHPLib_05/Lib/uUtil.php
* 
* @return	string	$ok
* @access	public
*/
function GetCurrFileNameV() {
	$sResult="";
	//$sResult=$_ENV["PATH_INFO"];
	
	$bStatus=false;
	if ($sResult=="") {
		$bStatus=false;
	} else {
		$bStatus=true;
	}
	if ($bStatus==false) {
		$sResult=$_SERVER["PHP_SELF"];
		$bStatus=true;
	}

	return $sResult;
}

/**
* 取得目前執行程式在主機下的實際路徑位置
* 
* GetCurrFileName() ==> D:\Project\PHP\Website_05\Lib\uUtil.php
* 
* @return	string	$ok
* @access	public
*/
function GetCurrFileName() {
	$sResult="";
	//$sResult=$_ENV["PATH_TRANSLATED"];
	
	$bStatus=false;
	if ($sResult=="") {
		$bStatus=false;
	} else {
		$bStatus=true;
	}
	if ($bStatus==false) {
		$sResult=$_SERVER["SCRIPT_FILENAME"]; //For PHP 5.0.4
		//$sResult=$_SERVER["ORIG_PATH_TRANSLATED"]; //For PHP 4.2.2
		$bStatus=true;
	}
	return $sResult;
}

/**
* 取得目前執行程式的名稱，包含副檔名
* 
* GetCurrFileNameNoExt() ==> uUtil.php
* 
* @return	string	$sFileName
* @access	public
*/
function GetCurrFileNameNoExt() {
	if (IsWindows()) {
		//$aPath=StringToArray(GetCurrFileName(),"\\");
		if (GetDeploy()) {
			$aPath=StringToArray(GetCurrFileName(),"/");
		} else {
			$aPath=StringToArray(GetCurrFileName(),"\\");
		}
		//$aPath=StringToArray(GetCurrFileName(),"/");
	} else {
		$aPath=StringToArray(GetCurrFileName(),"/");
	}
	
	$iPath=GetUnidimensionalArrayLength($aPath);
	$sFileName=$aPath[$iPath-1];
	return $sFileName;
}

/**
* 本模組供 PHP Version 4.2.2 使用
*
* 以下提供處理 Debug Win 相關之功能
*
* @author    casper <lutherworker@yahoo.com.tw>
* @version   v2.0
* @access    public
* @copyright made by casper in 2005 all rights reserved
*/

/**
* 判斷是否有安裝 Debug Win 軟體所產生的資料夾
* 
* IsDebugWinExist() ==> true or false;
* 
* @return	boolean $ok
* @access	public
*/
function IsDebugWinExist() {
	//$sFPath="C:\\DebugWin.Cache\\";
	$sFPath="C:/DebugWin.Cache/";
	//echo "IsDebugWinExist IsWindows() == [".IsWindows()."]<br>";
	if (IsWindows()) {
		if (FolderExist($sFPath)) {
			//echo "IsDebugWinExist 1<br>";
			return true;
		} else {
			//echo "IsDebugWinExist 2<br>";
			return false;
		}
		//echo "IsDebugWinExist 3<br>";
	} else {
		//echo "IsDebugWinExist 4<br>";
		return false;
	}
}

/**
* 處理傳送到 Debug Win 的變數
* 
* $oObj = "this is string type";
* LogVariableProcess($oObj);
* 
* @param	object  $oObj
* @return	string  $sResult
* @access	public
*/
function LogVariableProcess($oObj) {
	$sResult = "";
	$sType = GetVariableType($oObj);
	if ($sType == "boolean") {
		$sResult = SafeStr($oObj);
	}
	if ($sType == "integer") {
		$sResult = SafeStr($oObj);
	}
	if ($sType == "double") {
		$sResult = SafeStr($oObj);
	}
	if ($sType == "string") {
		$sResult = $oObj;
	}
	if ($sType == "array") {
		$iArrayLength = GetUnidimensionalArrayLength($oObj);
		$sResult = $sResult."Array Length == ".$iArrayLength."\n";
		for ($i = 0; $i < $iArrayLength; $i++) {
			$sResult = $sResult."Array(".$i.") == ".$oObj[$i]."\n";
		}
	}
	if ($sType == "object") {
		$sResult = "this is an object variable.....";
	}
	if ($sType == "resource") {
		$sResult = "this is an resource variable.....";
	}
	if ($sType == "NULL") {
		$sResult = "this is an NULL variable.....";
	}
	if ($sType == "unknown type") {
		$sResult = "unknown this type.....";
	}
	return $sResult;
}

/**
* 將訊息丟到 Debug Win 裏面
* 
* $aVar=Array(1,2); 
* uLog($aVar) ==> show array status; 
* 
* @param	object  $oMsg  object type
* @access	public
*/
function uLog($oMsg) {
	//echo "uLog IsDebugWinExist() == [".IsDebugWinExist()."]<br>"; 
	//echo "uLog IsDebugWinExist() true == [".true."]<br>"; 
	//echo "uLog IsDebugWinExist() false == [".false."]<br>"; 
	if (IsDebugWinExist()) {
		//echo "uLog DebugWinExist";
		$sRndName = GetRnd(1,10000);
		//$sFName = "C:\\DebugWin.Cache\\".$sRndName.".log";
		$sFName = "C:/DebugWin.Cache/".$sRndName.".log";
		$sMsg = LogVariableProcess($oMsg);
		FileCreate($sFName,$sMsg);
	}
}

/**
* 本模組供 PHP Version 4.2.2 使用
*
* 以下提供處理資料庫連結相關之功能
* 本模組尚須引用延伸 DLL ，包含有「libmysqli.dll」「libmysql.dll」「php_mysql.dll」「php_mysqli.dll」方能使用
*
* @author    casper <lutherworker@yahoo.com.tw>
* @version   v2.0
* @access    public
* @copyright made by casper in 2005 all rights reserved
*/

/**
* 資料庫型態， iDB_Oracle 為 1 ，請用此來指定資料庫型態
*/
define("iDB_Oracle", 1);

/**
* 資料庫型態， iDB_MsSQL 為 2 ，請用此來指定資料庫型態
*/
define("iDB_MsSQL", 2);

/**
* 資料庫型態， iDB_MySQL 為 3 ，請用此來指定資料庫型態
*/
define("iDB_MySQL", 3);

/**
* 資料庫型態， iDB_Sybase 為 4 ，請用此來指定資料庫型態
*/
define("iDB_Sybase", 4);

/**
* 建立資料庫連線，用於 MySQL 3.23.58
* 
* $sServerName="localhost";
* $sDbName="aeo";
* $sUID="root";
* $sPWD="1116";
* $aDb=CreateDbMySQL($sServerName, $sDbName, $sUID, $sPWD);
* 
* @param	string    $sServerName
* @param	string    $sDbName
* @param	string    $sUID
* @param	string    $sPWD
* @param	string    $sPort
* @return	resource  $db
* @access	public
*/
function CreateDbMySQL($sServerName, $sDbName, $sUID, $sPWD) {
	$db=mysql_connect($sServerName, $sUID, $sPWD) ; //連結資料庫
	//$db=mysql_connect($sServerName.":3306", $sUID, $sPWD, "aeo") ; //連結資料庫
	mysql_select_db($sDbName, $db) ;	//連結資料表
	return $db;
}

/**
* 建立資料集
* 
* $sSQL="select * from test";
* $rs=CreateRs($co, $sSQL);
* 
* @param	resource  $aDb
* @param	string    $sSQL
* @return	resource  $vCreateRs
* @access	public
*/
function CreateRs($aDb, $sSQL) {
	$vCreateRs=null;
	//uLog("CreateRs sSQL == [".$sSQL."]");
	if (empty($aDb)) {
		//uLog("CreateRs db empty");
		exit ;
	} else {
		//uLog("CreateRs db not empty");
		switch (GetDbType()) {
		case '3': //MySQL Server
			//uLog("CreateRs run.....");
			//mysql_query($aDb, 'set names "big5"');
			//$vCreateRs=mysql_query($aDb, $sSQL);
			//mysql_query('set names "big5"', $aDb);  //Beatrice Modify 2006/11/29
			//mysql_query('set names "utf8"', $aDb);  //Beatrice Modify 2006/11/29
			//mysql_query($aDb);  //Beatrice Modify 2006/11/29

			mysql_query("SET NAMES utf8",$aDb);
			mysql_query("SET CHARACTER_SET_CLIENT=utf8",$aDb);
			mysql_query("SET CHARACTER_SET_RESULTS=utf8",$aDb);
			mysql_query("SET time_zone = '+8:00'",$aDb);

			//echo "CreateRs sSQL == [".$sSQL."]<br>";
			$vCreateRs=mysql_query($sSQL, $aDb);
			break;
		}
	}
	return $vCreateRs ;
}

/**
* 本模組供 PHP Version 4.2.2 使用
*
* 以下提供處理取得設定參數相關之功能，以下為必設參數，日後之參數名不可與此重覆
* $sDbType=iDB_Oracle;
* $iMaxRowCount=-1;
* $bIsDeploy=false;
* $sTitle="測試網站";
* $sRootR="D:/Project/PHP/Website_01/";
* $sRootV="PHP01/";
* $sPathDb="bin/db/";
* $sPathBin="bin/";
* $sPathFlashV="flash/";
* $sPathImagesV="images/";
* $sPathScriptsV="scripts/";
* $sPathCssV="css/";
* $sPathCss="css/";
* $sPathImages="images/";
* $sPathScripts="scripts/";
*
* @author    casper <lutherworker@yahoo.com.tw>
* @version   v2.0
* @access    public
* @copyright made by casper in 2005 all rights reserved
*/

/**
* 傳回目前系統使用的資料庫型態
* 
* uLog("uconfig::GetDbType() == ".GetDbType()); ==> 2
* 
* @return	string  $sDbType
* @access	public
*/
function GetDbType() {
	global $sDbType;
	return $sDbType;
}

/**
* 傳回限制資料庫查詢大大筆數， -1 為不限制
* 
* uLog("uconfig::GetMaxRowCountNum() == ".GetMaxRowCountNum()); ==> -1
* 
* @return	string  $iMaxRowCount
* @access	public
*/
function GetMaxRowCountNum() {
	global $iMaxRowCount;
	return $iMaxRowCount;
}

/**
* 回傳目前是否在遠端系統，遠端系統為 true ，local 端為 false
* 
* uLog("GetDeploy() == ".GetDeploy()); ==> return true or false
* 
* @return	boolean  $bIsDeploy
* @access	public
*/
function GetDeploy() {
	global $bIsDeploy;
	return SafeBoo($bIsDeploy);
}

/**
* 取得網站標題
* 
* uLog("GetTitle() == ".GetTitle()); ==> CP TEST PROJECT
* 
* @return	string  $Title
* @access	public
*/
function GetTitle() {
	global $sTitle;
	return $sTitle;
}

/**
* 取得實際專案路徑
* 
* uLog("GetPathProject() == ".GetPathProject()); ==> D:\Project\PHP\Website_01\
* 
* @return	string  $sRootR
* @access	public
*/
function GetPathProject() {
	global $sRootR;
	return $sRootR;
}

/**
* 取得專案虛擬目錄
* 
* uLog("GetPathProjectV() == ".GetPathProjectV()); ==> APS01/
* 
* @return	string  $sValue
* @access	public
*/
function GetPathProjectV() {
	global $sRootV;
	return $sRootV;
}

/**
* 回傳 sql、db 檔等存放虛擬路徑
* 
* Log("GetDbPath() == ".GetDbPath()); ==> APS01/bin/db/
* 
* @return	string  $PathDb
* @access	public
*/
function GetDbPath() {
	global $sPathDb;
	$PathDb=GetPathProjectV().$sPathDb;
	return $PathDb;
}

/**
* 回傳 sql、db 檔等存放實際路徑
* 
* uLog("GetBinPath() == ".GetBinPath()); ==> D:\Project\PHP\Website_01\bin\
* 
* @return	string  $PathBin
* @access	public
*/
function GetBinPath() {
	global $sPathBin;
	$PathBin=GetPathProject().$sPathBin;
	return $PathBin;
}

/**
* 回傳 flash 虛擬路徑
* 
* uLog("GetFlashPathV() == ".GetFlashPathV()); ==> PHP01/flash/
* 
* @return	string  $PathFlashV
* @access	public
*/
function GetFlashPathV() {
	global $sPathFlashV;
	$PathFlashV=GetPathProjectV().$sPathFlashV;
	return $PathFlashV;
}

/**
* 回傳 images 虛擬路徑
* 
* uLog("GetImagePathV() == ".GetImagePathV()); ==> APS01/images/
* 
* @return	string  $PathImagesV
* @access	public
*/
function GetImagePathV() {
	global $sPathImagesV;
	$PathImagesV=GetPathProjectV().$sPathImagesV;
	return $PathImagesV;
}

/**
* 回傳 scripts 虛擬路徑
* 
* uLog("GetScriptsPathV() == ".GetScriptsPathV()); ==> APS01/scripts/
* 
* @return	string  $PathScriptsV
* @access	public
*/
function GetScriptsPathV() {
	global $sPathScriptsV;
	$PathScriptsV=GetPathProjectV().$sPathScriptsV;
	return $PathScriptsV;
}

/**
* 回傳 css 虛擬路徑
* 
* uLog("GetCssPathV() == ".GetCssPathV()); ==> PHP01/css/
* 
* @return	string  $PathCssV
* @access	public
*/
function GetCssPathV() {
	global $sPathCssV;
	$PathCssV=GetPathProjectV().$sPathCssV;
	return $PathCssV;
}

/**
* 回傳 css 實際路徑
* 
* uLog("GetCssPath() == ".GetCssPath()); ==> D:\Project\PHP\Website_01\css\
* 
* @return	string  $PathCss
* @access	public
*/
function GetCssPath() {
	global $sPathCss;
	$PathCss=GetPathProject().$sPathCss;
	return $PathCss;
}

/**
* 回傳 images 實際路徑
* 
* uLog("GetImagePath() == ".GetImagePath()); ==> D:\Project\PHP\Website_01\images\
* 
* @return	string  $PathImages
* @access	public
*/
function GetImagePath() {
	global $sPathImages;
	$PathImages=GetPathProject().$sPathImages;
	return $PathImages;
}

/**
* 回傳 script 實際路徑
* 
* uLog("GetScriptsPath() == ".GetScriptsPath()); ==> D:\Project\PHP\Website_01\scripts\
* 
* @return	string  $PathScripts
* @access	public
*/
function GetScriptsPath() {
	global $sPathScripts;
	$PathScripts=GetPathProject().$sPathScripts;
	return $PathScripts;
}

/**
* 本模組供 PHP Version 4.2.2 使用
*
* 以下提供處理 SQL 字串相關之功能
*
* @author    casper <lutherworker@yahoo.com.tw>
* @version   v2.0
* @access    public
* @copyright made by casper in 2005 all rights reserved
*/

/**
* 取得指定標記的 SQL 字串
* 
* $sFile="D:/Temp/20050309/PER0201.sql";
* $sCon=GetFileContent($sFile);
* $sFlagName="qury02";
* uLog("GetSQLPattern == ".GetSQLPattern($sCon, $sFlagName));
* 
* @param	string  $sContent
* @param	string  $sFlagName
* @return	string  $vGetSQLPattern
* @access	public
*/
function GetSQLPattern($sContent,$sFlagName) {
	$sBlockName="[".$sFlagName."]" ;
	$sNum01=InStr($sContent,$sBlockName) ;
	//uLog("GetSQLPattern sNum01 == ".$sNum01);
	if ($sNum01==0){
		$vGetSQLPattern="" ;
	}else{
		//uLog("GetSQLPattern Enter Else");
		$sNum03=Len($sContent) ; //求總長度
		//$sStr01=Mid($sContent, $sNum01) ;
		//$sStr01=Mid($sContent, $sNum01+1, ($sNum03-$sNum01)) ;
		$sStr01=Mid($sContent, $sNum01, ($sNum03-$sNum01)) ;
		//uLog("GetSQLPattern sStr01 == ".$sStr01);
		$sNum02=InStr($sStr01,"]") ;
		$sNum04=Len($sStr01) ;
		//$sStr02=Mid($sStr01,(int) $sNum02+1) ;
		$sStr02=Mid($sStr01, $sNum02+1, ($sNum04-$sNum02)) ;
		//uLog("GetSQLPattern sStr02 == ".$sStr02);
		//uLog("InStr(\$sStr02,\"[\") == ".InStr($sStr02,"["));
		if (InStr($sStr02,"[")==0){
			//uLog("GetSQLPattern 後面無字串");
			$vGetSQLPattern=$sStr02 ;
		}else{
			//uLog("GetSQLPattern 後面還有字串");
			$sNum05=InStr($sStr02,"[") ;
			//$sStr03=$ustr->Mid($sStr02, 1 ,(int) $sNum05-1) ;
			//$sStr03=Mid($sStr02, 1 ,(int) $sNum05-2) ;
			//$sStr03=Mid($sStr02, 1 ,$sNum05-1) ;
			$sStr03=Mid($sStr02, 1 ,$sNum05-2) ;
			//uLog("GetSQLPattern sStr03 == ".$sStr03);
			$vGetSQLPattern=$sStr03 ;
		}
	}
	return $vGetSQLPattern ;
}

/**
* 置換 SQL 字串的 Mark 值，可支援 in 語法
* 
* $sFile="D:/Temp/20050309/PER0201.sql";
* $sCon=GetFileContent($sFile);
* $sFlagName="qury02";
* $sPatt=GetSQLPattern($sCon, $sFlagName);
* uLog("GetSQLPattern == ".$sPatt);
* $sCon01=SQLFormatSharpRepStr($sPatt, "哈哈", 1);
* uLog("SQLFormatSharpRepStr == ".$sCon01);
* $sCon02=SQLFormatSharpRepStr($sPatt, Array("我", "是"), 9);
* uLog("SQLFormatSharpRepStr == ".$sCon02);
* 
* @param	string   $sSQLPattern
* @param	object   $sValue
* @param	integer  $iCount
* @return	string   $vSQLFormatSharpRepStr
* @access	public
*/
function SQLFormatSharpRepStr($sSQLPattern, $sValue, $iCount) {
	if (IsArray($sValue)) {
		$iLen=GetUnidimensionalArrayLength($sValue);
		for ($iNum=1; $iNum<4; $iNum++){
			if ($iNum==1){
				$sSharpFlag="%#".$iCount."S%" ;
				$sTmpValue="";
				if ($iLen==0) {
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%%")) ;
				} else {
					for ($i=0; $i<$iLen; $i++) {
						$sTmpValue=$sTmpValue.StrAddSingleQuote("%".$sValue[$i]."%").", ";
					}
					$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
					$sSQLPattern=Replace($sSQLPattern, $sSharpFlag, $sTmpValue) ;
				}

				//$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue."%")) ;
			}elseif ($iNum==2){
				$sSharpFlag="%#".$iCount."I%" ;
				$sTmpValue="";
				if ($iLen==0) {
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%%")) ;
				} else {
					for ($i=0; $i<$iLen; $i++) {
						$sTmpValue=$sTmpValue.StrAddSingleQuote("%".$sValue[$i]."%").", ";
					}
					$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
					$sSQLPattern=Replace($sSQLPattern, $sSharpFlag, $sTmpValue) ;
				}

				//$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue."%")) ;	
			}elseif ($iNum==3){
				$sSharpFlag="%#".$iCount."D%" ;
				$sTmpValue="";
				if ($iLen==0) {
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%%")) ;
				} else {
					for ($i=0; $i<$iLen; $i++) {
						$sTmpValue=$sTmpValue.StrAddSingleQuote("%".$sValue[$i]."%").", ";
					}
					$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
					$sSQLPattern=Replace($sSQLPattern, $sSharpFlag, $sTmpValue) ;
				}

				//$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue."%")) ;
			} 
			
			if ($iNum==1){
				$sSharpFlag="%#".$iCount."S" ;
				$sTmpValue="";
				if ($iLen==0) {
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%")) ;
				} else {
					for ($i=0; $i<$iLen; $i++) {
						$sTmpValue=$sTmpValue.StrAddSingleQuote("%".$sValue[$i]).", ";
					}
					$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
					$sSQLPattern=Replace($sSQLPattern, $sSharpFlag, $sTmpValue) ;
				}


				//$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue)) ;
			}elseif ($iNum==2){
				$sSharpFlag="%#".$iCount."I" ;
				$sTmpValue="";
				if ($iLen==0) {
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%")) ;
				} else {
					for ($i=0; $i<$iLen; $i++) {
						$sTmpValue=$sTmpValue.StrAddSingleQuote("%".$sValue[$i]).", ";
					}
					$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
					$sSQLPattern=Replace($sSQLPattern, $sSharpFlag, $sTmpValue) ;
				}

				//$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue)) ;
			}elseif ($iNum==3){
				$sSharpFlag="%#".$iCount."D" ;
				$sTmpValue="";
				if ($iLen==0) {
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%")) ;
				} else {
					for ($i=0; $i<$iLen; $i++) {
						$sTmpValue=$sTmpValue.StrAddSingleQuote("%".$sValue[$i]).", ";
					}
					$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
					$sSQLPattern=Replace($sSQLPattern, $sSharpFlag, $sTmpValue) ;
				}


				//$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue)) ;
			} 

			if ($iNum==1){
				$sSharpFlag="#".$iCount."S%" ;
				$sTmpValue="";
				if ($iLen==0) {
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%")) ;
				} else {
					for ($i=0; $i<$iLen; $i++) {
						$sTmpValue=$sTmpValue.StrAddSingleQuote($sValue[$i]."%").", ";
					}
					$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
					$sSQLPattern=Replace($sSQLPattern, $sSharpFlag, $sTmpValue) ;
				}


				//$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue."%")) ;
			}elseif ($iNum==2){
				$sSharpFlag="#".$iCount."I%" ;
				$sTmpValue="";
				if ($iLen==0) {
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%")) ;
				} else {
					for ($i=0; $i<$iLen; $i++) {
						$sTmpValue=$sTmpValue.StrAddSingleQuote($sValue[$i]."%").", ";
					}
					$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
					$sSQLPattern=Replace($sSQLPattern, $sSharpFlag, $sTmpValue) ;
				}



				//$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue."%")) ;
			}elseif ($iNum==3){
				$sSharpFlag="#".$iCount."D%" ;
				$sTmpValue="";
				if ($iLen==0) {
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%")) ;
				} else {
					for ($i=0; $i<$iLen; $i++) {
						$sTmpValue=$sTmpValue.StrAddSingleQuote($sValue[$i]."%").", ";
					}
					$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
					$sSQLPattern=Replace($sSQLPattern, $sSharpFlag, $sTmpValue) ;
				}

				//$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue."%")) ;
			} 

			if ($iNum==1){
				$sSharpFlag="#".$iCount."S" ;
				$sTmpValue="";
				if ($iLen==0) {
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("")) ;
				} else {
					for ($i=0; $i<$iLen; $i++) {
						$sTmpValue=$sTmpValue.StrAddSingleQuote($sValue[$i]).", ";
					}
					$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
					$sSQLPattern=Replace($sSQLPattern, $sSharpFlag, $sTmpValue) ;
				}

				//$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue)) ;
			}elseif ($iNum==2){
				$sSharpFlag="#".$iCount."I" ;
				$sTmpValue="";
				if ($iLen==0) {
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,"0") ;
				} else {
					for ($i=0; $i<$iLen; $i++) {
						$sTmpValue=$sTmpValue.$sValue[$i].", ";
					}
					$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
					$sSQLPattern=Replace($sSQLPattern, $sSharpFlag, $sTmpValue) ;
				}

				//if (trim($ustr->GetStr($sValue))==""){
				/*
				if (trim($sValue)==""){
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue)) ;
				}else{
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,$sValue) ;
				}
				*/
			}elseif ($iNum==3){
				$sSharpFlag="#".$iCount."D" ;
				$sTmpValue="";
				if ($iLen==0) {
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("")) ;
				} else {
					for ($i=0; $i<$iLen; $i++) {
						$sTmpValue=$sTmpValue.StrAddSingleQuote($sValue[$i]).", ";
					}
					$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
					$sSQLPattern=Replace($sSQLPattern, $sSharpFlag, $sTmpValue) ;
				}

				//$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue)) ;
			}
		}
	} else {
		for ($iNum=1; $iNum<4; $iNum++){
			if ($iNum==1){
				$sSharpFlag="%#".$iCount."S%" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue."%")) ;
			}elseif ($iNum==2){
				$sSharpFlag="%#".$iCount."I%" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue."%")) ;	
			}elseif ($iNum==3){
				$sSharpFlag="%#".$iCount."D%" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue."%")) ;
			} 
			
			if ($iNum==1){
				$sSharpFlag="%#".$iCount."S" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue)) ;
			}elseif ($iNum==2){
				$sSharpFlag="%#".$iCount."I" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue)) ;
			}elseif ($iNum==3){
				$sSharpFlag="%#".$iCount."D" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue)) ;
			} 

			if ($iNum==1){
				$sSharpFlag="#".$iCount."S%" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue."%")) ;
			}elseif ($iNum==2){
				$sSharpFlag="#".$iCount."I%" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue."%")) ;
			}elseif ($iNum==3){
				$sSharpFlag="#".$iCount."D%" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue."%")) ;
			} 

			if ($iNum==1){
				$sSharpFlag="#".$iCount."S" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue)) ;
			}elseif ($iNum==2){
				$sSharpFlag="#".$iCount."I" ;
				//if (trim($ustr->GetStr($sValue))==""){
				if (trim($sValue)==""){
					//$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue)) ;
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,"null") ;
				}else{
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,$sValue) ;
				}
			}elseif ($iNum==3){
				$sSharpFlag="#".$iCount."D" ;
				if (trim($sValue)==""){
					//$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue)) ;
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,"null") ;
				}else{
					$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue)) ;
				}
				//$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue)) ;
			}
		}
	}


	$vSQLFormatSharpRepStr=$sSQLPattern ;
	return $vSQLFormatSharpRepStr ;
}

/**
* 置換 SQL 字串的 Mark 值，可支援 in 語法
* 
* $sFile="D:/Temp/20050309/PER0201.sql";
* $sCon=GetFileContent($sFile);
* $sFlagName="qury02";
* $sPatt=GetSQLPattern($sCon, $sFlagName);
* uLog("GetSQLPattern == ".$sPatt);
* $aParme=Array("1", "2", "3", "4", "5", "6", "7", "8", Array("MOA001", "MOA002"), "10");
* $sPatt01=SQLFormatRepStr($sPatt, $aParme);
* uLog("SQLFormatRepStr == ".$sPatt01);
* 
* @param	string   $sSQLPattern
* @param	object   $aParme
* @return	string   $vSQLFormatRepStr
* @access	public
*/
function SQLFormatRepStr($sSQLPattern, $aParme) {
	$iLength=GetUnidimensionalArrayLength($aParme) ;
	$iCount=0 ;
	foreach ($aParme as $vParme){

		$sValue=$vParme ;
		$iCount++ ;

		$sSQLPattern=SQLFormatSharpRepStr($sSQLPattern, $sValue, $iCount) ;
	}
	$vSQLFormatRepStr=$sSQLPattern ;
	return $vSQLFormatRepStr ;
}

/**
* 置換 SQL 字串的 Mark 值，可支援 in 語法，主要以使用此 SQLFormat 為主
* 
* $sFile="D:/Temp/20050309/PER0201.sql";
* $sFlagName="qury02";
* $aParme=Array("1", "2", "3", "4", "5", "6", "7", "8", Array("MOA001", "MOA002"), "10");
* $sPatt01=SQLFormat($sFile, $sFlagName, $aParme);
* uLog("SQLFormat == ".$sPatt01);
* 
* @param	string   $sFileName
* @param	string   $sFlagName
* @param	object   $aParme
* @return	string   $vSQLFormat
* @access	public
*/
function SQLFormat($sFileName, $sFlagName, $aParme) {
	if (FileExist($sFileName)){
		$sContent=GetFileContent($sFileName) ;
		$sSQLPattern=GetSQLPattern($sContent, $sFlagName) ;
		$sSQLFormat=SQLFormatRepStr($sSQLPattern, $aParme) ;
		$vSQLFormat=$sSQLFormat ;
	}else{
		uLog("SQLFormat == ".$sFileName." is not exist in the location.");
	}
	return $vSQLFormat ;
}

function GetWhereLocation($sSQLPattern) {
	//uLog("############## GetWhereLocation S ##############");
	$aResult=Array();
	$iResult=0;
	$aSQLPattern=StringToArray($sSQLPattern, " ");
	$iSQLPattern=GetUnidimensionalArrayLength($aSQLPattern);
	for ($i=0; $i<$iSQLPattern; $i++) {
		$iResult=$iResult+Len($aSQLPattern[$i])+1;
		
		if (InStr($aSQLPattern[$i], "where")>0) {
			//$iTmpCut=InStr($sSQLPattern, "where");
			//uLog("GetWhereLocation iTmpCut == [".$iTmpCut."]");
			//uLog("GetWhereLocation iResult-5 == [".($iResult-5)."]");
			$aResult=UnidimensionalArrayAppend($aResult, $iResult-5);
		}
	}
	//uLog($aResult);
	//uLog("############## GetWhereLocation E ##############");
	return $aResult;
}

function GetRealWhereLocation($sSQLPattern, $aWhereLocation) {
	//uLog("{@GetRealWhereLocation@} ############################ Start ############################");

	$LeftBracket=0;
	$RightBracket=0;
	$bIsOutBreak=false;
	$aIsCheck=Array();
	$iResult=0;
	$aSQLPatternChar=StringToCharArray($sSQLPattern);

	$iLengthGGG = GetUnidimensionalArrayLength($aSQLPatternChar);
	for ($i = 0; $i < $iLengthGGG; $i++) {
		//uLog("{@GetRealWhereLocation@} aSQLPatternChar[".$i."] == [".$aSQLPatternChar[$i]."]");
	}

	//uLog($aSQLPatternChar);
	$iSQLPatternChar=GetUnidimensionalArrayLength($aSQLPatternChar);
	//uLog("{@GetRealWhereLocation@} iSQLPatternChar == [".$iSQLPatternChar."]");
	$iWhereLocation=GetUnidimensionalArrayLength($aWhereLocation);
	//uLog("{@GetRealWhereLocation@} iWhereLocation == [".$iWhereLocation."]");
	for ($i=0; $i<$iSQLPatternChar; $i++) {
		if (InStr($aSQLPatternChar[$i], "(")>0) {
			$LeftBracket++;
		}
		if (InStr($aSQLPatternChar[$i], ")")>0) {
			$RightBracket++;
		}
		//uLog("{@GetRealWhereLocation@} for loop LeftBracket == [".$LeftBracket."] RightBracket == [".$RightBracket."]");
		//未撰寫完成
		for ($k=0; $k<$iWhereLocation; $k++) {
			if (($i>$aWhereLocation[$k])) {
				//uLog("{@GetRealWhereLocation@} in loop LeftBracket == [".$LeftBracket."] RightBracket == [".$RightBracket."]");
				//uLog("{@GetRealWhereLocation@} first if i == [".$i."] WhereLocation == [".$aWhereLocation[$k]."]");
				$iIsCheck=GetUnidimensionalArrayLength($aIsCheck);
				//uLog("{@GetRealWhereLocation@} iIsCheck == [".$iIsCheck."]");
				if ($iIsCheck>0 && $k>($iIsCheck-1)) { //
					if ($LeftBracket==$RightBracket) {
						$iResult=$aWhereLocation[$k];
						$bIsOutBreak=true;
						$aIsCheck=UnidimensionalArrayAppend($aIsCheck, $aWhereLocation[$k]);
						break;
					} else {
						$aIsCheck=UnidimensionalArrayAppend($aIsCheck, $aWhereLocation[$k]);
					}
				} else { //第一次
					if ($iIsCheck==0) {
						if ($LeftBracket==$RightBracket) {
							//uLog("{@GetRealWhereLocation@} third if true LeftBracket == [".$LeftBracket."] RightBracket == [".$RightBracket."]");
							$iResult=$aWhereLocation[$k];
							$bIsOutBreak=true;
							$aIsCheck=UnidimensionalArrayAppend($aIsCheck, $aWhereLocation[$k]);
							break;
						} else {
							//uLog("{@GetRealWhereLocation@} third if false LeftBracket == [".$LeftBracket."] RightBracket == [".$RightBracket."]");
							$aIsCheck=UnidimensionalArrayAppend($aIsCheck, $aWhereLocation[$k]);
						}
					}
				}

			}
		}
		if ($bIsOutBreak) {
			break;
		}
	}
	//uLog("{@GetRealWhereLocation@} iResult == [".$iResult."]");
	//uLog("{@GetRealWhereLocation@} ############################ End   ############################");
	return $iResult;
}

/**
* 針對複雜型SQL設置，將SQL切成段落字串陣列，可處理包含或不包含括號；將 where 後之 SQL 字串捉出，並切割成一段一段的陣列
* 
* $sFile="D:/Temp/20050309/PER0201.sql";
* $sCon=GetFileContent($sFile);
* $sFlagName="qury02";
* $sPatt=GetSQLPattern($sCon, $sFlagName);
* $aPatt01=GetSQLParagraph($sPatt);
* uLog(" == GetSQLParagraph == ");
* uLog($aPatt01);
* uLog(" == GetSQLParagraph == ");
* 
* @param	string   $sSQLPattern
* @return	array    $sResult
* @access	public
*/
function GetSQLParagraph($sSQLPattern) {
	//uLog("{@GetSQLParagraph@} ###################### Start ######################");
	//uLog("{@GetSQLParagraph@} sSQLPattern == [".$sSQLPattern."]");

	//針對複雜型SQL設置，將SQL切成段落字串陣列，可處理包含或不包含括號
	$sResult=Array();
	//uLog("sContent == " . $sSQLPattern);
	//$iTmpCut=InStr($sSQLPattern, "where");
	//uLog("ori logic iTmpCut == " . InStr($sSQLPattern, "where"));
	$aWhereLocation=GetWhereLocation($sSQLPattern);

	$iLengthGGG = GetUnidimensionalArrayLength($aWhereLocation);
	for ($i = 0; $i < $iLengthGGG; $i++) {
		//uLog("{@GetSQLParagraph@} aWhereLocation[".$i."] == [".$aWhereLocation[$i]."]");
	}



	$iTmpCut=GetRealWhereLocation($sSQLPattern, $aWhereLocation);
	//uLog("{@GetSQLParagraph@} iTmpCut == " . $iTmpCut);
	$sTmpStr=Mid($sSQLPattern, $iTmpCut+5, Len($sSQLPattern)-$iTmpCut-5);
	//uLog("{@GetSQLParagraph@} sTmpStr == " . $sTmpStr);
	$bResult=true;
	$iTestCount=1;
	$sTmpStore="";
	$sTmpPrev="";
	while ($bResult) {
		//uLog("{@GetSQLParagraph@} ####################### iTestCount " . $iTestCount . " #######################");
		$sTArray=StringToCharArray($sTmpStr);
		//uLog($sTArray);

		$iTmpAnd=InStr($sTmpStr, " and ");
		$iTmpOr=InStr($sTmpStr, " or ");
		//uLog("{@GetSQLParagraph@} iTmpAnd == " . $iTmpAnd);
		//uLog("{@GetSQLParagraph@} iTmpOr == " . $iTmpOr);
		$iMin=min($iTmpAnd, $iTmpOr);
		//uLog("{@GetSQLParagraph@} iMin == " . $iMin);
		$iTmpResult=0;
		if ($iMin==0) {
			$iMax=max($iTmpAnd, $iTmpOr);
			if ($iMax==0) {
				$iTmpResult=0;
			} else {
				$iTmpResult=$iMax;
			}
		} else {
			$iTmpResult=$iMin;
		}
		//uLog("{@GetSQLParagraph@} iTmpResult == " . $iTmpResult." ===============================");
		if ($iTmpResult!=0) {
			$sTmpStore=Mid($sTmpStr, 1, $iTmpResult);
			//uLog("{@GetSQLParagraph@} sTmpStore 1 == " . $sTmpStore);
			//uLog("{@GetSQLParagraph@} sTmpPrev == " . $sTmpPrev);
			if ($sTmpPrev!="") {
				$sTmpStore=$sTmpPrev.$sTmpStore;
			}
			//uLog("{@GetSQLParagraph@} sTmpStore 2 == " . $sTmpStore);
			$cTmpArray=StringToCharArray($sTmpStore);
			$IsBalance=false;
			$iLeft=0;
			$iRight=0;
			for ($i=0; $i<GetUnidimensionalArrayLength($cTmpArray); $i++) {
				if ($cTmpArray[$i]=='(') {
					$iLeft++;
				} else if ($cTmpArray[$i]==')') {
					$iRight++;
				}
			}
			//uLog("{@GetSQLParagraph@} 判斷 sTmpStore2 iLeft == " . $iLeft);
			//uLog("{@GetSQLParagraph@} 判斷 sTmpStore2 iRight == " . $iRight);
			//uLog("{@GetSQLParagraph@} ++++++++++++++++++ 下一個 ++++++++++++++++++");
			if ($iLeft==$iRight) { //平衡
				//uLog("{@GetSQLParagraph@} balance");
				if ($iTmpResult==$iTmpAnd) {
					if ($sTmpPrev!="") {
						$sResult=UnidimensionalArrayAppend($sResult, $sTmpPrev.Mid($sTmpStr, 1, $iTmpResult+5));
					} else {
						$sResult=UnidimensionalArrayAppend($sResult, Mid($sTmpStr, 1, $iTmpResult+5));
					}
					//$sResult=uArray.UnidimensionalArrayAppend($sResult, uStr.Mid($sTmpStr, 1, $iTmpResult+5));
					$sTmpStr=Mid($sTmpStr, $iTmpResult+5, Len($sTmpStr)-($iTmpResult+4));
					$sTmpStore="";
					$sTmpPrev="";
					//uLog("{@GetSQLParagraph@} balance sTmpStr and == " . $sTmpStr);
				} else if ($iTmpResult==$iTmpOr) {
					if ($sTmpPrev!="") {
						$sResult=UnidimensionalArrayAppend($sResult, $sTmpPrev.Mid($sTmpStr, 1, $iTmpResult+4));
					} else {
						$sResult=UnidimensionalArrayAppend($sResult, Mid($sTmpStr, 1, $iTmpResult+4));
					}
					//$sResult=uArray.UnidimensionalArrayAppend($sResult, uStr.Mid($sTmpStr, 1, $iTmpResult+4));
					$sTmpStr=Mid($sTmpStr, $iTmpResult+4, Len($sTmpStr)-($iTmpResult+3));
					$sTmpStore="";
					$sTmpPrev="";
					//uLog("{@GetSQLParagraph@} balance sTmpStr or == " . $sTmpStr);
				}
			} else { //不平衡
				//uLog("{@GetSQLParagraph@} no balance");
				if ($iTmpResult==$iTmpAnd) {
					//uLog("{@GetSQLParagraph@} 不平衡 sTmpPrev 前 == " . $sTmpPrev);
					if ($sTmpPrev!="") {
						$sTmpPrev=$sTmpPrev.Mid($sTmpStr, 1, $iTmpResult+4);
					} else {
						$sTmpPrev=Mid($sTmpStr, 1, $iTmpResult+4);
					}
					//uLog("{@GetSQLParagraph@} 不平衡 sTmpPrev 後 == " . $sTmpPrev);
					//sTmpPrev=sTmpStore+uStr.Mid($sTmpStr, 1, $iTmpResult+5);
					$sTmpStr=Mid($sTmpStr, $iTmpResult+5, Len($sTmpStr)-($iTmpResult+4));
					//sTmpPrev=sTmpStore+" and ";
					$sTmpStore="";
					//uLog("{@GetSQLParagraph@} no balance sTmpStr and == " . $sTmpStr);
				} else if ($iTmpResult==$iTmpOr) {
					//uLog("{@GetSQLParagraph@} 不平衡 sTmpPrev 前 == " . $sTmpPrev);
					if ($sTmpPrev!="") {
						$sTmpPrev=$sTmpPrev.Mid($sTmpStr, 1, $iTmpResult+3);
					} else {
						$sTmpPrev=Mid($sTmpStr, 1, $iTmpResult+3);
					}
					//uLog("{@GetSQLParagraph@} 不平衡 sTmpPrev 後 == " . $sTmpPrev);
					//sTmpPrev=sTmpStore+uStr.Mid($sTmpStr, 1, $iTmpResult+4);
					$sTmpStr=Mid($sTmpStr, $iTmpResult+4, Len($sTmpStr)-($iTmpResult+3));
					//sTmpPrev=sTmpStore+" or ";
					$sTmpStore="";
					//uLog("{@GetSQLParagraph@} no balance sTmpStr or == " . $sTmpStr);
				}
			}
		}

		/*
		iTestCount=iTestCount+1;
		if (iTestCount>=100) {
			$bResult=false;
		}
		*/
		if ($iTmpAnd==0 && $iTmpOr==0) {
			$bResult=false;
		}
		//uLog("##########################################################");
	}
	//先找出 and 或 or 那個最先出現，判斷好了之後，再找出 and 或 or 是否在 ( 中
	//如果沒在 ( 中，則那一句即可加到陣列中
	//如在 ( 中，則找下一個 and 或 or
	/*
	uLog("#################### GetSQLParagraph Start ####################");
	uLog($sResult);
	uLog("#################### GetSQLParagraph End ####################");
	*/

	//uLog("{@GetSQLParagraph@} ###################### End   ######################");
	return $sResult;
}

/**
* 取出每一段落中指定的子句，取出的子句會視位置的不同而向前或向後捉 and 或 or
* 
* $sParagraph="((MA01=#1S) and (MA01=#2S) or (MA01=#3S)) and ";
* $sSharpFlag="#3S";
* $s=GetSQLParagraphInSide($sParagraph, $sSharpFlag);
* uLog("GetSQLParagraphInSide == ".$s);
* 
* @param	string   $sParagraph
* @param	string   $sSharpFlag
* @return	string   $sResult
* @access	public
*/
function GetSQLParagraphInSide($sParagraph, $sSharpFlag) {
	//uLog("{@GetSQLParagraphInSide@} ########################## Start ##########################");

	//取出段落中的子句
	$sResult="";
	$iTarget=InStr($sParagraph, $sSharpFlag);
	//uLog("{@GetSQLParagraphInSide@} iTarget == " . $iTarget);
	$sTmp=StringToArray($sParagraph, " ");
	$sTmpResult="";

	$iLengthGGG = GetUnidimensionalArrayLength($sTmp);
	for ($i = 0; $i < $iLengthGGG; $i++) {
		//uLog("{@GetSQLParagraphInSide@} sTmp[".$i."] == [".$sTmp[$i]."]");
	}

//    uCP.Log("###################### sTmp ######################");
//    uCP.Log(sTmp);
//    uCP.Log("##################################################");
	$iTargetArray=0;
	$iLen=GetUnidimensionalArrayLength($sTmp);
	for ($i=0; $i<$iLen; $i++) {
		if (InStr($sTmp[$i], $sSharpFlag)>0) {
			$iTargetArray=$i;
		}
	}
	//uLog("{@GetSQLParagraphInSide@} iTargetArray == " . $iTargetArray);
	$sTmpResult=$sTmp[$iTargetArray];
	//uLog("{@GetSQLParagraphInSide@} sTmpResult == " . $sTmpResult);
//    uCP.Log("iTargetArray == " + iTargetArray);
//    uCP.Log("sTmpResult 1 == " + sTmpResult);
	//往前加陣列
	for ($i=$iTargetArray-1; $i>=0; $i--) {
		$sTmpResult=$sTmp[$i]." ".$sTmpResult;
		//uLog("{@GetSQLParagraphInSide@} sTmpResult in for 往前加陣列 == " . $sTmpResult);
		if (InStr($sTmp[$i], "and")>0) {
			if (InStr($sTmp[$i], " and ")>0) {
				break;
			}
			if (InStr($sTmp[$i], " and")>0) {
				break;
			}
			if (InStr($sTmp[$i], "and ")>0) {
				break;
			}
			//break;
		}
		if (InStr($sTmp[$i], "or")>0) {
			if (InStr($sTmp[$i], " or ")>0) {
				break;
			}
			if (InStr($sTmp[$i], " or")>0) {
				break;
			}
			if (InStr($sTmp[$i], "or ")>0) {
				break;
			}
			//break;
		}
	}
//    uCP.Log("sTmpResult 2 == " + sTmpResult);
	//往後加陣列
	for ($i=$iTargetArray+1; $i<$iLen; $i++) {
		$sTmpResult=$sTmpResult." ".$sTmp[$i];
		//uLog("{@GetSQLParagraphInSide@} sTmpResult in for 往後加陣列 == " . $sTmpResult);
		if (InStr($sTmp[$i], "and")>0) {
			if (InStr($sTmp[$i], " and ")>0) {
				break;
			}
			if (InStr($sTmp[$i], " and")>0) {
				break;
			}
			if (InStr($sTmp[$i], "and ")>0) {
				break;
			}
			//break;
		}
		if (InStr($sTmp[$i], "or")>0) {
			if (InStr($sTmp[$i], " or ")>0) {
				break;
			}
			if (InStr($sTmp[$i], " or")>0) {
				break;
			}
			if (InStr($sTmp[$i], "or ")>0) {
				break;
			}
			//break;
		}
	}
//    uCP.Log("sTmpResult 3 == " + sTmpResult);
	//uLog("{@GetSQLParagraphInSide@} sTmpResult out for == " . $sTmpResult);
//    uCP.Log("sTmpResult 4 == " + sTmpResult);
	$cTmp=StringToCharArray($sTmpResult);
	$iLeft=0;
	$iRight=0;
	for ($i=0; $i<GetUnidimensionalArrayLength($cTmp); $i++) {
		if ($cTmp[$i]=='(') {
			$iLeft++;
		}
		if ($cTmp[$i]==')') {
			$iRight++;
		}
	}
  //uLog("{@GetSQLParagraphInSide@} ( == " . $iLeft);
	//uLog("{@GetSQLParagraphInSide@} ) == " . $iRight);
	$iTmpLeft=$iLeft;
	$cLocation=StringToCharArray($sTmpResult);

	$iLengthGGG = GetUnidimensionalArrayLength($cLocation);
	for ($i = 0; $i < $iLengthGGG; $i++) {
		//uLog("{@GetSQLParagraphInSide@} cLocation[".$i."] == [".$cLocation[$i]."]");
	}

//    uCP.Log("################# cLocation #################");
//    uCP.Log(cLocation);
//    uCP.Log("#############################################");
	$iTmp=0;
	if ($iLeft>$iRight) {
		for ($i=0; $i<GetUnidimensionalArrayLength($cLocation); $i++) {
			if ($cLocation[$i]=='(' && $iTmpLeft!=$iRight) {
				$iTmpLeft--;
//          uCP.Log("iTmpLeft--");
			}
			if ($iTmpLeft==$iRight) {
				if ($iTmp==0) {
					$iTmp++;
				} else {
					$sResult=$sResult.$cLocation[$i];
					//uLog("{@GetSQLParagraphInSide@} sResult 1 == [".$sResult."]");
				}
			}
		}
	}
	//uLog("{@GetSQLParagraphInSide@} sResult 2 == " . $sResult);
	$iTmpCount=0;
	if ($iLeft<$iRight) {
		$iTmpCount=0;
		for ($i=0; $i<GetUnidimensionalArrayLength($cLocation); $i++) {
			$sResult=$sResult.$cLocation[$i];
			if ($iLeft!=$iTmpCount && $cLocation[$i]==')') {
				$iTmpCount++;
			}
			if ($iLeft==$iTmpCount) {
				break;
			}
		}
	}
	if ($iLeft==$iRight) {
		$iTmpCount=0;
		for ($i=0; $i<GetUnidimensionalArrayLength($cLocation); $i++) {
			if ($cLocation[$i]=='(') {
				$iTmpCount++;
			}
			if ($iTmpCount!=0) {
				$sResult=$sResult.$cLocation[$i];
			}
		}
	}
	//uLog("{@GetSQLParagraphInSide@} sResult == " . $sResult);
	//uLog("{@GetSQLParagraphInSide@} ########################## End   ##########################");
	return $sResult;
}

/**
* 清除指定的 SQL 子句
* 
* $sFile="D:/Temp/20050309/PER0201.sql";
* $sCon=GetFileContent($sFile);
* $sFlagName="qury02";
* $sPatt=GetSQLPattern($sCon, $sFlagName);
* $sSharpFlag="#3S";
* $sStr=SQLParseCleanStr($sPatt, $sSharpFlag);
* uLog("SQLParseCleanStr == ".$sStr);
* 
* @param	string   $sSQLPattern
* @param	string   $sSharpFlag
* @return	string   $sResult
* @access	public
*/
//function SQLParseCleanStr($sSQLPattern, $sSharpFlag) { //casper cancel 2005/9/3
function SQLParseCleanStr($sSQLPattern, $sSharpFlag, $sTmp) { //casper add 2005/9/3
	$sResult="";
	//uLog("{@SQLParseCleanStr@} #############################################");
	//uLog("{@SQLParseCleanStr@} sSQLPattern == " . $sSQLPattern);
	//uLog("{@SQLParseCleanStr@} sSharpFlag == " . $sSharpFlag);
	//uLog("SQLParseCleanStr sTmp == " . $sTmp);
	
	//uLog("SQLParseCleanStr GetSQLParagraph 執行開始時間 == ".GetDateTimeCE());
	//$sTmp=GetSQLParagraph($sSQLPattern);
	//uLog("SQLParseCleanStr GetSQLParagraph 執行結束時間 == ".GetDateTimeCE());
	$sReplace="";
	//uLog("SQLParseCleanStr for loop 執行開始時間 == ".GetDateTimeCE());
	for ($i=0; $i<GetUnidimensionalArrayLength($sTmp); $i++) {
		//uLog("{@SQLParseCleanStr@} sTmp[".$i."] == " . $sTmp[$i]);
		//uLog("{@SQLParseCleanStr@} sSharpFlag[".$i."] == " . $sSharpFlag);
		if (InStr($sTmp[$i], $sSharpFlag)>0) {
			$sReplace=GetSQLParagraphInSide($sTmp[$i], $sSharpFlag);
			//uLog("{@SQLParseCleanStr@} GetSQLParagraphInSide sReplace == " . $sReplace);
		}
	}
	//uLog("SQLParseCleanStr for loop 執行結束時間 == ".GetDateTimeCE());

	if ($sReplace=="") {
		//uLog("sReplace  == empty");
		//uLog("{@SQLParseCleanStr@} sReplace  == empty");
		$sResult=$sSQLPattern;
	} else {
		//uLog("sReplace  == not empty");
		//uLog("sReplace add trim == " . Trim($sReplace));
		//uLog("{@SQLParseCleanStr@} sReplace sSQLPattern == " . $sSQLPattern);
		//uLog(StringToCharArray($sReplace));
		//uLog("{@SQLParseCleanStr@} Trim(sReplace) == [".Trim($sReplace)."]");
		$sResult=Replace($sSQLPattern, Trim($sReplace), "") ;
		//uLog("SQLParseCleanStr sSQLPattern == " . $sSQLPattern);
		//uLog("SQLParseCleanStr Trim(sReplace) == " . Trim($sReplace));
		//uLog("SQLParseCleanStr sResult == " . $sResult);
	}
	//uLog("{@SQLParseCleanStr@} final sResult == [".$sResult."]");
	//uLog("{@SQLParseCleanStr@} #############################################");
	return $sResult;
}

/**
* 置換 SQL 字串的 Mark 值，針對字串值專用
* 
* $sFile="D:/Temp/20050309/PER0201.sql";
* $sCon=GetFileContent($sFile);
* $sFlagName="qury02";
* $sPatt=GetSQLPattern($sCon, $sFlagName);
* $sValue="123";
* $iCount=2;
* $sStr=SQLParseSharpRepStr($sPatt, $sValue, $iCount);
* uLog("SQLParseSharpRepStr == ".$sStr);
* 
* @param	string   $sSQLPattern
* @param	string   $sValue
* @param	integer  $iCount
* @return	string   $sResult
* @access	public
*/
function SQLParseSharpRepStr($sSQLPattern, $sValue, $iCount, $aTmp) {
	$sResult="";
	//uLog("{@SQLParseSharpRepStr@} #############################################");
	//uLog("{@SQLParseSharpRepStr@} sSQLPattern == [".$sSQLPattern."]");
	//uLog("{@SQLParseSharpRepStr@} sValue == [".$sValue."]");
	//uLog("{@SQLParseSharpRepStr@} iCount == [".$iCount."]");
	//uLog("SQLParseSharpRepStr aTmp Start");
	//uLog($aTmp);
	//uLog("SQLParseSharpRepStr aTmp End");

	$sValue=Trim($sValue) ;
//    uCP.Log("sValue 1 == " + sValue);
  //echo "SQLParseSharpRepStr sValue 1 == " + sValue;
	$sSharpFlag="";
	$vSQLParseSharpRepStr="";
	for ($iNum=1 ; $iNum<=3; $iNum++){
		//uLog("SQLParseSharpRepStr iNum == [".$iNum."]");
		if ($sValue==""){
			//uLog("{@SQLParseSharpRepStr@} 數值為空");
//        uCP.Log("sValue 2 == " + sValue);
      //echo  "SQLParseSharpRepStr sValue 2 == " + sValue;
			if ($iNum==1){
				$sSharpFlag="%#".$iCount."S%" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}else if ($iNum==2){
				$sSharpFlag="%#".$iCount."I%" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}else if ($iNum==3){
				$sSharpFlag="%#".$iCount."D%" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}
			if ($iNum==1){
				$sSharpFlag="%#".$iCount."S" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}else if ($iNum==2){
				$sSharpFlag="%#".$iCount."I" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}else if ($iNum==3){
				$sSharpFlag="%#".$iCount."D" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}
			if ($iNum==1){
				$sSharpFlag="#".$iCount."S%" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}else if ($iNum==2){
				$sSharpFlag="#".$iCount."I%" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}else if ($iNum==3){
				$sSharpFlag="#".$iCount."D%" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}
			if ($iNum==1){
				//uLog("{@SQLParseSharpRepStr@} clear #S");
				$sSharpFlag="#".$iCount."S" ;
				//uLog("{@SQLParseSharpRepStr@} clear sSQLPattern == [".$sSQLPattern."]");
				//uLog("{@SQLParseSharpRepStr@} clear sSharpFlag == [".$sSharpFlag."]");
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
				//uLog("{@SQLParseSharpRepStr@} out sSQLPattern == [".$sSQLPattern."]");
			}else if ($iNum==2){
				$sSharpFlag="#".$iCount."I" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}else if ($iNum==3){
				$sSharpFlag="#".$iCount."D" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}
		}else{
			//uLog("{@SQLParseSharpRepStr@} 數值不為空");
      //uLog("sValue 3 == " + sValue);
			if ($iNum==1){
				$sSharpFlag="%#".$iCount."S%" ;
				//uLog("{@SQLParseSharpRepStr@} clear sSQLPattern == [".$sSQLPattern."]");
				//uLog("{@SQLParseSharpRepStr@} clear sSharpFlag == [".$sSharpFlag."]");
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue."%")) ;
			}else if ($iNum==2){
				$sSharpFlag="%#".$iCount."I%" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue."%")) ;
			}else if ($iNum==3){
				$sSharpFlag="%#".$iCount."D%" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue."%")) ;
			}
			if ($iNum==1){
				$sSharpFlag="%#".$iCount."S" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue)) ;
			}else if ($iNum==2){
				$sSharpFlag="%#".$iCount."I" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue)) ;
			}else if ($iNum==3){
				$sSharpFlag="%#".$iCount."D" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%".$sValue)) ;
			}
			if ($iNum==1){
				$sSharpFlag="#".$iCount."S%" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue."%")) ;
			}else if ($iNum==2){
				$sSharpFlag="#".$iCount."I%" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue."%")) ;
			}else if ($iNum==3){
				$sSharpFlag="#".$iCount."D%" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue."%")) ;
			}
			if ($iNum==1){
				$sSharpFlag="#".$iCount."S" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue)) ;
			}else if ($iNum==2){
				$sSharpFlag="#".$iCount."I" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,$sValue) ;
			}else if ($iNum==3){
				$sSharpFlag="#".$iCount."D" ;
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue)) ;
			}
		}
	}
	//uLog("{@SQLParseSharpRepStr@} final sSQLPattern == [".$sSQLPattern."]");
	//uLog("{@SQLParseSharpRepStr@} #############################################");
	$vSQLParseSharpRepStr=$sSQLPattern ;
	$sResult=$vSQLParseSharpRepStr ;

	return $sResult;
}

/**
* 置換 SQL 字串的 Mark 值，針對陣列值專用
* 
* $sFile="D:/Temp/20050309/PER0201.sql";
* $sCon=GetFileContent($sFile);
* $sFlagName="qury02";
* $sPatt=GetSQLPattern($sCon, $sFlagName);
* $sValue=Array("M1", "M2", "M5");
* $iCount=9;
* $sStr=SQLParseSharpRepStrArray($sPatt, $sValue, $iCount);
* uLog("SQLParseSharpRepStrArray == ".$sStr);
* 
* @param	string   $sSQLPattern
* @param	array    $sValue
* @param	integer  $iCount
* @return	string   $sResult
* @access	public
*/
function SQLParseSharpRepStrArray($sSQLPattern, $sValue, $iCount, $aTmp) {
	$sResult="";
	//uLog("SQLParseSharpRepStrArray sSQLPattern == [".$sSQLPattern."]");
	//uLog("SQLParseSharpRepStrArray sValue == [".$sValue."]");
	//uLog("SQLParseSharpRepStrArray iCount == [".$iCount."]");
	//uLog("SQLParseSharpRepStrArray aTmp == [".$aTmp."]");

//    sValue=uStr.Trim(sValue) ;
	$iLen=GetUnidimensionalArrayLength($sValue);
	$sTmpValue="";
  //uLog("$sValue 1 == " + $sValue);
	$sSharpFlag="";
	$vSQLParseSharpRepStr="";
	for ($iNum=1 ; $iNum<=3; $iNum++){
//      if ($sValue==""){
		if ($iLen==0){
//        uCP.Log("$sValue 2 == " + $sValue);
			if ($iNum==1){
				$sSharpFlag="%#".$iCount."S%" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}else if ($iNum==2){
				$sSharpFlag="%#".$iCount."I%" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}else if ($iNum==3){
				$sSharpFlag="%#".$iCount."D%" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}
			if ($iNum==1){
				$sSharpFlag="%#".$iCount."S" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}else if ($iNum==2){
				$sSharpFlag="%#".$iCount."I" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}else if ($iNum==3){
				$sSharpFlag="%#".$iCount."D" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}
			if ($iNum==1){
				$sSharpFlag="#".$iCount."S%" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}else if ($iNum==2){
				$sSharpFlag="#".$iCount."I%" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}else if ($iNum==3){
				$sSharpFlag="#".$iCount."D%" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}
			if ($iNum==1){
				$sSharpFlag="#".$iCount."S" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}else if ($iNum==2){
				$sSharpFlag="#".$iCount."I" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}else if ($iNum==3){
				$sSharpFlag="#".$iCount."D" ;
				$sSQLPattern=SQLParseCleanStr($sSQLPattern,$sSharpFlag,$aTmp) ;
			}
		}else{
//        uCP.Log("$sValue 3 == " + $sValue);
			if ($iNum==1){
				$sSharpFlag="%#".$iCount."S%" ;
				$sTmpValue="";
				for ($i=0; $i<$iLen; $i++) {
					$sTmpValue=$sTmpValue.StrAddSingleQuote("%".$sValue[$i]."%").", ";
				}
				$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,$sTmpValue) ;
//          $sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%"+$sValue+"%")) ;
			}else if ($iNum==2){
				$sSharpFlag="%#".$iCount."I%" ;
				$sTmpValue="";
				for ($i=0; $i<$iLen; $i++) {
					$sTmpValue=$sTmpValue.StrAddSingleQuote("%".$sValue[$i]."%").", ";
				}
				$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,$sTmpValue) ;
//          $sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%"+$sValue+"%")) ;
			}else if ($iNum==3){
				$sSharpFlag="%#".$iCount."D%" ;
				$sTmpValue="";
				for ($i=0; $i<$iLen; $i++) {
					$sTmpValue=$sTmpValue.StrAddSingleQuote("%".$sValue[$i]."%").", ";
				}
				$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,$sTmpValue) ;
//          $sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%"+$sValue+"%")) ;
			}
			if ($iNum==1){
				$sSharpFlag="%#".$iCount."S" ;
				$sTmpValue="";
				for ($i=0; $i<$iLen; $i++) {
					$sTmpValue=$sTmpValue.StrAddSingleQuote("%".$sValue[$i]).", ";
				}
				$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,$sTmpValue) ;
//          $sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%"+$sValue)) ;
			}else if ($iNum==2){
				$sSharpFlag="%#".$iCount."I" ;
				for ($i=0; $i<$iLen; $i++) {
					$sTmpValue=$sTmpValue.StrAddSingleQuote("%".$sValue[$i]).", ";
				}
				$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,$sTmpValue) ;
//          $sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%"+$sValue)) ;
			}else if ($iNum==3){
				$sSharpFlag="%#".$iCount."D" ;
				$sTmpValue="";
				for ($i=0; $i<$iLen; $i++) {
					$sTmpValue=$sTmpValue.StrAddSingleQuote("%".$sValue[$i]).", ";
				}
				$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,$sTmpValue) ;
//          $sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote("%"+$sValue)) ;
			}
			if ($iNum==1){
				$sSharpFlag="#".$iCount."S%" ;
				$sTmpValue="";
				for ($i=0; $i<$iLen; $i++) {
					$sTmpValue=$sTmpValue.StrAddSingleQuote($sValue[$i]."%").", ";
				}
				$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,$sTmpValue) ;
//          $sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue+"%")) ;
			}else if ($iNum==2){
				$sSharpFlag="#".$iCount."I%" ;
				$sTmpValue="";
				for ($i=0; $i<$iLen; $i++) {
					$sTmpValue=$sTmpValue.StrAddSingleQuote($sValue[$i]."%").", ";
				}
				$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,$sTmpValue) ;
//          $sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue+"%")) ;
			}else if ($iNum==3){
				$sSharpFlag="#".$iCount."D%" ;
				$sTmpValue="";
				for ($i=0; $i<$iLen; $i++) {
					$sTmpValue=$sTmpValue.StrAddSingleQuote($sValue[$i]."%").", ";
				}
				$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,$sTmpValue) ;
//          $sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue+"%")) ;
			}
			if ($iNum==1){
				$sSharpFlag="#".$iCount."S" ;
				$sTmpValue="";
				for ($i=0; $i<$iLen; $i++) {
					$sTmpValue=$sTmpValue.StrAddSingleQuote($sValue[$i]).", ";
				}
				$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,$sTmpValue) ;
//          $sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue)) ;
			}else if ($iNum==2){
				$sSharpFlag="#".$iCount."I" ;
				$sTmpValue="";
				for ($i=0; $i<$iLen; $i++) {
					$sTmpValue=$sTmpValue.$sValue[$i].", ";
				}
				$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,$sTmpValue) ;
//          $sSQLPattern=Replace($sSQLPattern,$sSharpFlag,$sValue) ;
			}else if ($iNum==3){
				$sSharpFlag="#".$iCount."D" ;
				$sTmpValue="";
				for ($i=0; $i<$iLen; $i++) {
					$sTmpValue=$sTmpValue.StrAddSingleQuote($sValue[$i]).", ";
				}
				$sTmpValue=Left($sTmpValue, Len($sTmpValue)-2);
				$sSQLPattern=Replace($sSQLPattern,$sSharpFlag,$sTmpValue) ;
//          $sSQLPattern=Replace($sSQLPattern,$sSharpFlag,StrAddSingleQuote($sValue)) ;
			}
		}
	}
	$vSQLParseSharpRepStr=$sSQLPattern ;
	$sResult=$vSQLParseSharpRepStr ;

	return $sResult;
}

/**
* 置換 SQL 字串的 Mark 值，可支援 in 語法
* 
* $sFile="D:/Temp/20050309/PER0201.sql";
* $sCon=GetFileContent($sFile);
* $sFlagName="qury02";
* $sPatt=GetSQLPattern($sCon, $sFlagName);
* $vParme=Array(1, 2, 3, "", 5, 6, 7, 8, "", "");
* $sStr=SQLParseRepStr($sPatt, $vParme);
* uLog("SQLParseSharpRepStrArray == ".$sStr);
* 
* @param	string   $sSQLPattern
* @param	object   $vParme
* @return	string   $sResult
* @access	public
*/
function SQLParseRepStr($sSQLPattern, $vParme) {
	//uLog("{@SQLParseRepStr@} ############################# Start #############################");
	
	//uLog("{@SQLParseRepStr@} sSQLPattern == [".$sSQLPattern."]");
	//uLog("SQLParseRepStr vParme Start ##############################");
	//uLog($vParme);
	//uLog("SQLParseRepStr vParme End   ##############################");
	$sResult="";
	$iLength=GetUnidimensionalArrayLength($vParme);
	//uLog("{@SQLParseRepStr@} iLength 1 == [".$iLength."]");
	$iCount=0 ;
	$sValue="";
	$sTmp=GetSQLParagraph($sSQLPattern); //casper add 2005/9/3
	//uLog("{@SQLParseRepStr@} sTmp == [".$sTmp."]");
	//uLog($sTmp);

	$iLengthGGG = GetUnidimensionalArrayLength($sTmp);
	for ($i = 0; $i < $iLengthGGG; $i++) {
		//uLog("{@SQLParseRepStr@} sTmp 1 [".$i."] == [".$sTmp[$i]."]");
	}
	
	$iLengthGGG = GetUnidimensionalArrayLength($vParme);
	for ($i = 0; $i < $iLengthGGG; $i++) {
		//uLog("{@SQLParseRepStr@} vParme 1 [".$i."] == [".$vParme[$i]."]");
	}

	//uLog("{@SQLParseRepStr@} iLength 2 == [".$iLength."]");

	for ($iLoop=0; $iLoop<$iLength; $iLoop++) {
		$iCount=$iCount+1 ;
		//uLog("{@SQLParseRepStr@} iCount == [".$iCount."]");
		//uLog("{@SQLParseRepStr@} iLoop 1 == [".$iLoop."]");

		if (IsArray($vParme[$iLoop])==false) {
			//uLog("{@SQLParseRepStr@} SQLParseRepStr if 1");
			//uLog("SQLParseRepStr SQLParseSharpRepStr 執行開始時間 [".$i."] == ".GetDateTimeCE());
			//$sSQLPattern=SQLParseSharpRepStr($sSQLPattern, $vParme[$i], $iCount); //casper cancel 2005/9/3
			//uLog("{@SQLParseRepStr@} if 1 sSQLPattern == [".$sSQLPattern."]");
			//uLog("{@SQLParseRepStr@} if 1 iCount == [".$iCount."]");
			//uLog("{@SQLParseRepStr@} if 1 sTmp == [".$sTmp."]");
			$sSQLPattern=SQLParseSharpRepStr($sSQLPattern, $vParme[$iLoop], $iCount, $sTmp); //casper add 2005/9/3
			//uLog("SQLParseRepStr SQLParseSharpRepStr 執行結束時間 [".$i."] == ".GetDateTimeCE());
		} else {
			//uLog("{@SQLParseRepStr@} SQLParseRepStr if 2");
			//uLog("SQLParseRepStr SQLParseSharpRepStrArray 執行開始時間 [".$i."] == ".GetDateTimeCE());
			//$sSQLPattern=SQLParseSharpRepStrArray($sSQLPattern, $vParme[$i], $iCount); //casper cancel 2005/9/3
			//uLog("{@SQLParseRepStr@} if 2 sSQLPattern == [".$sSQLPattern."]");
			//uLog("{@SQLParseRepStr@} if 2 iCount == [".$iCount."]");
			//uLog("{@SQLParseRepStr@} if 2 sTmp == [".$sTmp."]");
			$sSQLPattern=SQLParseSharpRepStrArray($sSQLPattern, $vParme[$iLoop], $iCount, $sTmp); //casper add 2005/9/3
			//uLog("SQLParseRepStr SQLParseSharpRepStrArray 執行結束時間 [".$i."] == ".GetDateTimeCE());
		}
		if (IsArray($vParme[$iLoop])) {
			//uLog("{@SQLParseRepStr@} SQLParseRepStr if 3");
			if (GetUnidimensionalArrayLength($vParme[$iLoop])==0) {
				//uLog("SQLParseRepStr if 4");
				//uLog("{@SQLParseRepStr@} sTmp 2 [".$iLoop."] sSQLPattern == [".$sSQLPattern."]");

				$sTmp=GetSQLParagraph($sSQLPattern); //casper add 2005/9/3

				$iLengthGGG = GetUnidimensionalArrayLength($sTmp);
				for ($i = 0; $i < $iLengthGGG; $i++) {
					//uLog("{@SQLParseRepStr@} sTmp 2 [".$i."] == [".$sTmp[$i]."]");
				}

			}
		} else {
			//uLog("SQLParseRepStr if 5");
			if (Trim($vParme[$iLoop])=="") {
				//uLog("SQLParseRepStr if 6");
				//uLog("{@SQLParseRepStr@} sTmp 3 [".$iLoop."] sSQLPattern == [".$sSQLPattern."]");
				$sTmp=GetSQLParagraph($sSQLPattern); //casper add 2005/9/3

				$iLengthGGG = GetUnidimensionalArrayLength($sTmp);
				for ($i = 0; $i < $iLengthGGG; $i++) {
					//uLog("{@SQLParseRepStr@} sTmp 3 [".$i."] == [".$sTmp[$i]."]");
				}

			}
		}

		//uLog("{@SQLParseRepStr@} i 2 == [".$iLoop."]");
	}
	//uLog("{@SQLParseRepStr@} ############################# End   #############################");
	$sResult=$sSQLPattern;
	return $sResult;
}

/**
* 指定的 SQL 字串捉取資料筆數， -1 不限制
* 
* $sFile="D:/Temp/20050309/PER0201.sql";
* $sCon=GetFileContent($sFile);
* $sFlagName="qury02";
* $sPatt=GetSQLPattern($sCon, $sFlagName);
* $iMaxRowCount=10;
* $sDbType=iDB_MySQL;
* $sStr=GetMaxRowCountI($sPatt, $iMaxRowCount, $sDbType);
* uLog("GetMaxRowCountI == ".$sStr);
* 
* @param	string   $sSQLPattern
* @param	integer  $iMaxRowCount
* @param	integer  $sDbType
* @return	string   $sResult
* @access	public
*/
function GetMaxRowCountI($sSQLPattern, $iMaxRowCount, $sDbType) {
	$sResult="";
	$vGetMaxRowCount="";
	$sMaxRowCount="";
	if ($iMaxRowCount==-1) {
		$vGetMaxRowCount=$sSQLPattern ;
	} else {
		switch ($sDbType) {
			case iDB_Oracle: //Oracle
				$sMaxRowCount="where (ROWNUM<=" . $iMaxRowCount . ") and ";
				$sResult=Replace($sSQLPattern, "where", $sMaxRowCount);
				break;
			case iDB_MsSQL: //MsSQL
				$sMaxRowCount="select top " . $iMaxRowCount . " ";
				$sResult=Replace($sSQLPattern, "select ", $sMaxRowCount);
				break;
			case iDB_MySQL: //MySQL
				$sResult=$sSQLPattern." limit ".$iMaxRowCount ;
				break;
			case iDB_Sybase: //Sybase
				$sMaxRowCount="SET ROWCOUNT " . $iMaxRowCount . " ";
				$sResult=$sMaxRowCount . $sSQLPattern;
				break;
			default: //非指定資料庫
				$sResult=$sSQLPattern;
				uLog("GetMaxRowCountI Exception : can not find the DB paremeter.....");
				break;
		}
		$vGetMaxRowCount=$sResult ;
	}
	$sResult=$vGetMaxRowCount ;
	return $sResult;
}

/**
* 指定的 SQL 字串捉取資料筆數， -1 不限制
* 
* $sFile="D:/Temp/20050309/PER0201.sql";
* $sCon=GetFileContent($sFile);
* $sFlagName="qury02";
* $sPatt=GetSQLPattern($sCon, $sFlagName);
* $iStart=0;
* $iEnd=9;
* $sDbType=iDB_MySQL;
* $sStr=GetMaxRowCountII($sPatt, $iStart, $iEnd, $sDbType);
* uLog("GetMaxRowCountII == ".$sStr);
* 
* @param	string   $sSQLPattern
* @param	integer  $iStart
* @param	integer  $iEnd
* @param	integer  $sDbType
* @return	string   $sResult
* @access	public
*/
function GetMaxRowCountII($sSQLPattern, $iStart, $iEnd, $sDbType) {
	$sResult="";
	$vGetMaxRowCount="";
	$sMaxRowCount="";
	$iMaxRowCount=$iEnd-$iStart;
	if ($iMaxRowCount==-1) {
		switch ($sDbType) {
			case iDB_MySQL: //MySQL
				$sResult=$sSQLPattern." limit ".$iStart.", ".$iEnd;
				break;
			default: //非指定資料庫
				$sResult=$sSQLPattern;
				uLog("GetMaxRowCountII Exception : can not find the DB paremeter.....");
				break;
		}
		$vGetMaxRowCount=$sResult;
	} else {
		switch ($sDbType) {
			case iDB_Oracle: //Oracle
				$sMaxRowCount="where (ROWNUM<=" . $iMaxRowCount . ") and ";
				$sResult=Replace($sSQLPattern, "where", $sMaxRowCount);
				break;
			case iDB_MsSQL: //MsSQL
				$sMaxRowCount="select top " . $iMaxRowCount . " ";
				$sResult=Replace($sSQLPattern, "select ", $sMaxRowCount);
				break;
			case iDB_MySQL: //MySQL
				$sResult=$sSQLPattern." limit ".$iStart.", ".$iEnd;
				break;
			case iDB_Sybase: //Sybase
				$sMaxRowCount="SET ROWCOUNT " . $iMaxRowCount . " ";
				$sResult=$sMaxRowCount . $sSQLPattern;
				break;
			default: //非指定資料庫
				$sResult=$sSQLPattern;
				uLog("GetMaxRowCountII Exception : can not find the DB paremeter.....");
				break;
		}
		$vGetMaxRowCount=$sResult ;
	}
	$sResult=$vGetMaxRowCount ;
	return $sResult;
}

/**
* 將指定的值代入 SQL 字串，如為空字串會 Parse 掉，一般資料庫使用， Parse 會導致效能降低，最好盡量有值
* 
* $sFileName="D:/Temp/20050309/PER0201.sql";
* $sFlagName="qury02";
* $aParme=Array(1, 2, 3, "", 5, 6, 7, 8, "", "");
* $iMaxRowCount=10;
* $iDbType=iDB_MySQL;
* $sStr=SQLParseI($sFileName, $sFlagName, $aParme, $iMaxRowCount, $iDbType);
* uLog("SQLParseI == ".$sStr);
* 
* @param	string   $sFileName
* @param	string   $sFlagName
* @param	array    $aParme
* @param	integer  $iMaxRowCount
* @param	integer  $iDbType
* @return	string   $sResult
* @access	public
*/
function SQLParseI($sFileName, $sFlagName, $aParme, $iMaxRowCount, $iDbType) {
	$sResult="";

	$sContent="";
	$sSQLPattern="";
	$vSQLParse="";
	if (FileExist($sFileName)){
		$sContent=GetFileContent($sFileName) ;
		//echo "SQLParseI sContent == [".$sContent."]<br>";
		$sSQLPattern=GetSQLPattern($sContent,$sFlagName) ;
		//echo "SQLParseI sSQLPattern 1 == [".$sSQLPattern."]<br>";
		$sSQLPattern=GetMaxRowCountI($sSQLPattern, $iMaxRowCount, $iDbType) ;
		//echo "SQLParseI sSQLPattern 2 == [".$sSQLPattern."]<br>";
		//uLog("SQLParseI aParme");
		//uLog($aParme);
		$sSQLPattern=SQLParseRepStr($sSQLPattern,$aParme) ;
		//echo "SQLParseI sSQLPattern 3 == [".$sSQLPattern."]<br>";
		$vSQLParse=$sSQLPattern ;
	} else {
		$vSQLParse="" ;
		uLog("SQLParse Excetion : ".$sFileName." is not exist in the location.....");
	}
	$sResult=$vSQLParse ;

	return $sResult;
}

/**
* 將指定的值代入 SQL 字串，如為空字串會 Parse 掉， MySQL Server 使用， Parse 會導致效能降低，最好盡量有值
* 
* $sFileName="D:/Temp/20050309/PER0201.sql";
* $sFlagName="qury02";
* $aParme=Array(1, 2, 3, "", 5, 6, 7, 8, "", "");
* $iStart=0;
* $iEnd=9;
* $iDbType=iDB_MySQL;
* $sStr=SQLParseII($sFileName, $sFlagName, $aParme, $iStart, $iEnd, $iDbType);
* uLog("SQLParseII == ".$sStr);
* 
* @param	string   $sFileName
* @param	string   $sFlagName
* @param	array    $aParme
* @param	integer  $iStart
* @param	integer  $iEnd
* @param	integer  $iDbType
* @return	string   $sResult
* @access	public
*/
function SQLParseII($sFileName, $sFlagName, $aParme, $iStart, $iEnd, $iDbType) {
	$sResult="";

	$sContent="";
	$sSQLPattern="";
	$vSQLParse="";
	if (FileExist($sFileName)){
		//uLog("GetFileContent 執行開始時間 == ".GetDateTimeCE());
		$sContent=GetFileContent($sFileName) ;
		//uLog("GetFileContent 執行結束時間 == ".GetDateTimeCE());
		//uLog("GetSQLPattern 執行開始時間 == ".GetDateTimeCE());
		$sSQLPattern=GetSQLPattern($sContent,$sFlagName) ;
		//uLog("GetSQLPattern 執行結束時間 == ".GetDateTimeCE());
		//uLog("GetMaxRowCountII 執行開始時間 == ".GetDateTimeCE());
		$sSQLPattern=GetMaxRowCountII($sSQLPattern, $iStart, $iEnd, $iDbType) ;
		//uLog("GetMaxRowCountII 執行結束時間 == ".GetDateTimeCE());
		//uLog("SQLParseRepStr 執行開始時間 == ".GetDateTimeCE());
		$sSQLPattern=SQLParseRepStr($sSQLPattern,$aParme) ;
		//uLog("SQLParseRepStr 執行結束時間 == ".GetDateTimeCE());
		$vSQLParse=$sSQLPattern ;
	} else {
		$vSQLParse="" ;
		uLog("SQLParse Excetion : ".$sFileName." is not exist in the location.....");
	}
	$sResult=$vSQLParse ;

	return $sResult;
}

/**
* 將指定的值代入 SQL 字串，如為空字串會 Parse 掉，一般資料庫使用， Parse 會導致效能降低，最好盡量有值；增加指定 order 功能
* 
* $sFileName="D:/Temp/20050309/PER0201.sql";
* $sFlagName="qury02";
* $aParme=Array(1, 2, 3, "", 5, 6, 7, 8, "", "");
* $iMaxRowCount=10;
* $sOrderFieldName="FD01";
* $sOrderSequence="desc";
* $iDbType=iDB_MySQL;
* $sStr=SQLParseIII($sFileName, $sFlagName, $aParme, $iMaxRowCount, $sOrderFieldName, $sOrderSequence, $iDbType);
* uLog("SQLParseIII == ".$sStr);
* 
* @param	string   $sFileName
* @param	string   $sFlagName
* @param	array    $aParme
* @param	integer  $iMaxRowCount
* @param	string   $sOrderFieldName
* @param	string   $sOrderSequence
* @param	integer  $iDbType
* @return	string   $sResult
* @access	public
*/
function SQLParseIII($sFileName, $sFlagName, $aParme, $iMaxRowCount, $sOrderFieldName, $sOrderSequence, $iDbType) {
	$sResult="";

	$sContent="";
	$sSQLPattern="";
	$vSQLParse="";
	if (FileExist($sFileName)){
		$sContent=GetFileContent($sFileName) ;
		$sSQLPattern=GetSQLPattern($sContent,$sFlagName) ;
		$sSQLPattern=$sSQLPattern." order by ".$sOrderFieldName." ".$sOrderSequence; //casper add 2005/9/12
		$sSQLPattern=GetMaxRowCountI($sSQLPattern, $iMaxRowCount, $iDbType) ;
		$sSQLPattern=SQLParseRepStr($sSQLPattern,$aParme) ;
		$vSQLParse=$sSQLPattern ;
	} else {
		$vSQLParse="" ;
		uLog("SQLParse Excetion : ".$sFileName." is not exist in the location.....");
	}
	$sResult=$vSQLParse ;

	return $sResult;
}

/**
* 將指定的值代入 SQL 字串，如為空字串會 Parse 掉， MySQL Server 使用， Parse 會導致效能降低，最好盡量有值；增加指定 order 功能
* 
* $sFileName="D:/Temp/20050309/PER0201.sql";
* $sFlagName="qury02";
* $aParme=Array(1, 2, 3, "", 5, 6, 7, 8, "", "");
* $iStart=0;
* $iEnd=9;
* $sOrderFieldName="FD01";
* $sOrderSequence="desc";
* $iDbType=iDB_MySQL;
* $sStr=SQLParseIV($sFileName, $sFlagName, $aParme, $iStart, $iEnd, $sOrderFieldName, $sOrderSequence, $iDbType);
* uLog("SQLParseIV == ".$sStr);
* 
* @param	string   $sFileName
* @param	string   $sFlagName
* @param	array    $aParme
* @param	integer  $iStart
* @param	integer  $iEnd
* @param	integer  $iDbType
* @return	string   $sResult
* @access	public
*/
function SQLParseIV($sFileName, $sFlagName, $aParme, $iStart, $iEnd, $sOrderFieldName, $sOrderSequence, $iDbType) {
	$sResult="";

	$sContent="";
	$sSQLPattern="";
	$vSQLParse="";
	if (FileExist($sFileName)){
		$sContent=GetFileContent($sFileName) ;
		$sSQLPattern=GetSQLPattern($sContent,$sFlagName) ;
		$sSQLPattern=$sSQLPattern." order by ".$sOrderFieldName." ".$sOrderSequence; //casper add 2005/9/12
		$sSQLPattern=GetMaxRowCountII($sSQLPattern, $iStart, $iEnd, $iDbType) ;
		$sSQLPattern=SQLParseRepStr($sSQLPattern,$aParme) ;
		$vSQLParse=$sSQLPattern ;
	} else {
		$vSQLParse="" ;
		uLog("SQLParse Excetion : ".$sFileName." is not exist in the location.....");
	}
	$sResult=$vSQLParse ;

	return $sResult;
}

/**
* 本模組供 PHP Version 4.2.2 使用
*
* 以下提供處理時間相關之功能
*
* @author    casper <lutherworker@yahoo.com.tw>
* @version   v2.0
* @access    public
* @copyright made by casper in 2005 all rights reserved
*/

/**
* 取得目前的日期及時間，凌晨 12 點為 00
* 
* it will return the date and time, like 20041009182315
* 
* @return	string	$ok
* @access	public
*/
function GetDateTimeCE() {
	return date("YmdHis");
}

/**
* 取得目前日期
* 
* it will return the date of today, like 20041009
* 
* @return	string	$ok
* @access	public
*/
function GetDateCE() {
	return date("Ymd");
}

/**
* 取得目前時間
* 
* it will return the time of today, like 182315
* 
* @return	string	$ok
* @access	public
*/
function GetTimeCE() {
	return date("His");
}

/**
* 取得台灣日期及時間
* 
* it will return the date and time for taiwan, like 931009182315
* 
* @return	string	$ok
* @access	public
*/
function GetDateTimeTw() {
	$sResult="";
	$iYear=SafeInt(date("Y"));
	$iYear=$iYear-1911;
	$sResult=$iYear.date("m").date("d").GetTimeCE();
	return $sResult;
}

/**
* 取得台灣日期
* 
* it will return the date of today for taiwan, like 931009
* 
* @return	string	$ok
* @access	public
*/
function GetDateTw() {
	$sResult="";
	$iYear=SafeInt(date("Y"));
	$iYear=$iYear-1911;
	$sResult=$iYear.date("m").date("d");
	return $sResult;
}

/**
* 回傳日期間的差距
* 
* The intervals that we are going to allow are going to be "w", "d", "h", "n" and "s". 
* DateDiff("d","2004/7/1","2004/6/1") ==> -30
* DateDiff("d","2004/7/1","2004/7/1") ==> 0
* DateDiff("d","2004/7/1","2004/7/2") ==> 1
* 
* @param	string	$interval
* @param	string	$date1	begin day
* @param	string	$date2	end day
* @return	integer	$retval
* @access	public
*/
function DateDiff($interval, $datefrom, $dateto, $using_timestamps = false) {
	/*
		$interval can be:
		yyyy - Number of full years
		q - Number of full quarters
		m - Number of full months
		y - Difference between day numbers
			(eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
		d - Number of full days
		w - Number of full weekdays
		ww - Number of full weeks
		h - Number of full hours
		n - Number of full minutes
		s - Number of full seconds (default)
	*/
	
	if (!$using_timestamps) {
		$datefrom = strtotime($datefrom, 0);
		$dateto = strtotime($dateto, 0);
	}
	$difference = $dateto - $datefrom; // Difference in seconds
	 
	switch($interval) {
	 
		case 'yyyy': // Number of full years

			$years_difference = floor($difference / 31536000);
			if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) {
				$years_difference--;
			}
			if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom) {
				$years_difference++;
			}
			$datediff = $years_difference;
			break;

		case "q": // Number of full quarters

			$quarters_difference = floor($difference / 8035200);
			while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
				$months_difference++;
			}
			$quarters_difference--;
			$datediff = $quarters_difference;
			break;

		case "m": // Number of full months

			$months_difference = floor($difference / 2678400);
			while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
				$months_difference++;
			}
			$months_difference--;
			$datediff = $months_difference;
			break;

		case 'y': // Difference between day numbers

			$datediff = date("z", $dateto) - date("z", $datefrom);
			break;

		case "d": // Number of full days

			$datediff = floor($difference / 86400);
			break;

		case "w": // Number of full weekdays

			$days_difference = floor($difference / 86400);
			$weeks_difference = floor($days_difference / 7); // Complete weeks
			$first_day = date("w", $datefrom);
			$days_remainder = floor($days_difference % 7);
			$odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?
			if ($odd_days > 7) { // Sunday
				$days_remainder--;
			}
			if ($odd_days > 6) { // Saturday
				$days_remainder--;
			}
			$datediff = ($weeks_difference * 5) + $days_remainder;
			break;

		case "ww": // Number of full weeks

			$datediff = floor($difference / 604800);
			break;

		case "h": // Number of full hours

			$datediff = floor($difference / 3600);
			break;

		case "n": // Number of full minutes

			$datediff = floor($difference / 60);
			break;

		default: // Number of full seconds (default)

			$datediff = $difference;
			break;
	}    

	return $datediff;
}

/**
* 回傳日期間的差距，以天計算
* 
* GetBetweenDate("2004/7/1","2004/6/1") ==> -30
* GetBetweenDate("2004/7/1","2004/7/1") ==> 0
* GetBetweenDate("2004/7/1","2004/7/2") ==> 1
* 
* @param	string	$date1	begin day
* @param	string	$date2	end day
* @return	integer	$retval
* @access	public
*/
function GetBetweenDate($sDateBegin,$sDateEnd) {
	$iResult=DateDiff("d",$sDateBegin,$sDateEnd);
	return $iResult;
}

/**
* 回傳加減後的日期
* 
* DateAdd("d",1,"2004/6/1") ==> 2004/6/2 00:00:00
* Interval maybe the value of below
* yyyy year
* q Quarter
* m Month  
* y Day of year
* d Day
* w Weekday
* ww Week of year
* h Hour
* n Minute
* s Second
* 
* @param	string	$interval
* @param	integer	$number
* @param	string	$date
* @return	string	$ok
* @access	public
*/
function DateAdd ($interval, $number, $date) { 
	$date=strftime("%Y,%m,%d,%H,%M,%S", strtotime($date));
	$aTmpDate=StringToArray($date,",");
	$date=mktime($aTmpDate[3], $aTmpDate[4], $aTmpDate[5], $aTmpDate[1], $aTmpDate[2], $aTmpDate[0]);
	$date_time_array = getdate($date); 
	$hours = $date_time_array["hours"]; 
	$minutes = $date_time_array["minutes"]; 
	$seconds = $date_time_array["seconds"]; 
	$month = $date_time_array["mon"]; 
	$day = $date_time_array["mday"]; 
	$year = $date_time_array["year"]; 
	switch ($interval) { 
	case "yyyy": 
		$year +=$number; 
		break; 
	case "q": 
		$month +=($number*3); 
		break; 
	case "m":
		$month +=$number; 
		break; 
	case "y": 
	case "d": 
	case "w": 
		$day+=$number; 
		break; 
	case "ww": 
		$day+=($number*7); 
		break; 
	case "h": 
		$hours+=$number; 
		break; 
	case "n": 
		$minutes+=$number; 
		break; 
	case "s": 
		$seconds+=$number; 
		break; 
	}
	$timestamp = mktime($hours ,$minutes, $seconds,$month ,$day, $year); 
	$sDate=strftime("%Y,%m,%d,%H,%M,%S", $timestamp);
	$aTmpDateEnd=StringToArray($sDate,",");
	return $aTmpDateEnd[0]."/".$aTmpDateEnd[1]."/".$aTmpDateEnd[2]." ".$aTmpDateEnd[3].":".$aTmpDateEnd[4].":".$aTmpDateEnd[5];
}

/**
* 回傳加減後的日期，以天計算
* 
* GetDateCalculate(1,"2004/6/1") ==> 2004/6/2 00:00:00
* 
* @param	integer	$iDay
* @param	string	$sDate
* @return	string	$sNewDay
* @access	public
*/
function GetDateCalculate($iDay,$sDate) {
	$sNewDay=DateAdd("d",$iDay,$sDate);
	return $sNewDay;
}

/**
* 本模組供 PHP Version 4.2.2 使用
*
* 以下提供處理表單元件相關之功能
*
* @author    casper <lutherworker@yahoo.com.tw>
* @version   v2.0
* @access    public
* @copyright made by casper in 2005 all rights reserved
*/

/**
* 回傳按鈕
* 
* RwButton($sOnClick, $sName, $sCaption, "Button") ==> 	<input name="submit" type="button" value="cinfirm" onclick="update('add')" class="Button">
*
* @param String $sOnClick 
* @param String $sName    
* @param String $sCaption 
* @param String $sClass   
* @access	public
*/
function RwButton($sOnClick, $sName, $sCaption, $sClass){
	$s="" ;
	$s=$s."<input name=".StrAddQuote($sName) ;
	$s=$s." type=\"button\"" ;
	$s=$s." value=".StrAddQuote($sCaption) ;
	$s=$s." id=".StrAddQuote($sName) ;
	if ($sOnClick!=""){
		$s=$s." onclick=".StrAddQuote($sOnClick) ;
	}
	if ($sClass!=""){
		$s=$s." class=".StrAddQuote($sClass) ;
	}
	$s=$s.">" ;
	echo $s . chr(10);
}
	
/**
* 回傳隱藏欄位
* 
* RwHidden($sName, $sValue) ==> 	<input name="BB01" type="hidden" value="0">
* $sName ="BB01"
* $sValue="0"
* RwHidden($sName, $sValue) ==> 	<input name="BB01" type="hidden" value="0">
*
* @Param String $sName 
* @Param String $sValue
* @access	public
*/
function RwHidden($sName, $sValue) {
	$s="" ;
	$s=$s."<input id=".StrAddQuote($sName)." name=".StrAddQuote($sName) ;
	$s=$s." type=\"hidden"."\"" ;
	if ($sValue!=""){
		$s=$s." value=".StrAddQuote($sValue) ;
	}else{
		$s=$s." value=\"\"" ;
	}
	$s=$s."".">" ;
	echo $s . chr(10) ;
}
	
/**
*  回傳輸入欄位，單行
* 
* $sName     ="BB01"
* $sValue    ="0"
* $nSize     ="20" 欄位寬度
* $nMaxLength="10" 字數限制
* $sOnBlur   =""
* $sOnFocus  =""
* $sOnchange =""
* $sTabIndex =""
* $bReadOnly =false 是否可更改欄位內資料
* RwEdit($sName, $sValue, "<br>", $nSize, $nMaxLength, $sOnBlur, $sOnFocus, $sOnchange, $sTabIndex, $bReadOnly, $sClass,"") ==>
* <input type="text" name="BB01" size="20" maxlength="10" value="0"><br>
* 
* @param String $sValue     
* @param String $sName      
* @param String $sTail      
* @param String $nSize      
* @param String $nMaxLength 
* @param String $sOnBlur    
* @param String $sOnFocus   
* @param String $sOnchange  
* @param String $sTabIndex  
* @param bool   $bReadOnly  
* @param String $sClass     
* @param String $sOnKeyPress
*
* @access	public
*/
function RwEdit($sName, $sValue, $sTail, $nSize, $nMaxLength, $sOnBlur, $sOnFocus, $sOnChange, $sTabIndex, $bReadOnly, $sClass, $sOnKeyPress) {
	$sOnBlur=trim(SafeStr($sOnBlur)) ;
	$sOnFocus=trim(SafeStr($sOnFocus)) ;
	$sOnChange=trim(SafeStr($sOnChange)) ;
	$sOnKeyPress=trim(SafeStr($sOnKeyPress)) ;
	$s="" ;
	$s=$s."<input type=\"text\"" ;
	$s=$s." name=".StrAddQuote($sName) ;
	$s=$s." id=".StrAddQuote($sName) ;
	$s=$s." size=".StrAddQuote($nSize) ;
	$s=$s." maxlength=".StrAddQuote($nMaxLength) ;
	$s=$s." value=".StrAddQuote($sValue) ;
	if	($sOnBlur!=""){
		$s=$s." onblur=".StrAddQuote($sOnBlur) ;
	}
	if ($sOnFocus!=""){
		$s=$s." onfocus=".StrAddQuote($sOnFocus) ;
	}
	if ($sOnChange!=""){
		$s=$s." onchange=".StrAddQuote($sOnChange) ;
	}
	if ($sOnKeyPress!=""){
		$s=$s." onKeyPress=".StrAddQuote($sOnKeyPress) ;
	}
	if ($sTabIndex!=""){
		$s=$s. " tabindex=".StrAddQuote($sTabIndex) ;
	}
	if ($sClass!=""){
		$s=$s. " Class=".StrAddQuote($sClass) ;
	}
	if ($bReadOnly){
		$s=$s. " readonly" ;
	}
	$s=$s.">" ;
	$s=$s.$sTail ;
	echo $s  . chr(10) ;
}
	
/**
* 回傳密碼欄位
* 
* EX
* $sName     ="BB01"
* $sValue    ="0"
* $nSize     ="20" 欄位寬度
* $nMaxLength="10" 字數限制
* $sOnBlur   =""
* $sOnFocus  =""
* $sOnchange =""
* $sTabIndex =""
* $bReadOnly =false 是否可更改欄位內資料
* RwPassword($sName,$sValue,"<br>",$nSize,$nMaxLength,$sOnBlur,$sOnFocus,$sOnchange,$sTabIndex,$bReadOnly,"") ==>
* <input type="password" maxlength="10" size="20" name="BB01" value="0"><br>
* 
* @param String $sValue     
* @param String $sName      
* @param String $sTail      
* @param String $nSize      
* @param String $nMaxLength 
* @param String $sOnBlur    
* @param String $sOnFocus   
* @param String $sOnchange  
* @param String $sTabIndex  
* @param Boolean $bReadOnly 
* @param String $sClass     
*
* @access	public
*/
function RwPassword($sName, $sValue, $sTail, $nSize, $nMaxLength, $sOnBlur, $sOnFocus, $sOnChange, $sTabIndex, $bReadOnly, $sClass) {
	$sOnBlur=trim(SafeStr($sOnBlur)) ;
	$sOnFocus=trim(SafeStr($sOnFocus)) ;
	$sOnChange=trim(SafeStr($sOnChange)) ;
	$s="" ;
	$s=$s . "<input type=\"password\"" ;
	$s=$s . " name=" . StrAddQuote($sName) ;
	$s=$s . " id=" . StrAddQuote($sName) ;
	$s=$s . " size=" . StrAddQuote($nSize) ;
	$s=$s . " maxlength=" . StrAddQuote($nMaxLength) ;
	$s=$s . " value=" . StrAddQuote($sValue) ;
	if	($sOnBlur!=""){
		$s=$s . " onblur=".StrAddQuote($sOnBlur) ;
	}
	if	($sOnFocus!=""){
		$s=$s . " onfocus=".StrAddQuote($sOnFocus) ;
	} 
	if	($sOnChange!=""){
		$s=$s . " onchange=".StrAddQuote($sOnChange) ;
	}
	if	($sTabIndex!=""){
		$s=$s . " tabindex=".StrAddQuote($sTabIndex) ;
	}
	if	($sClass!=""){
		$s=$s . " Class=".StrAddQuote($sClass) ;
	}
	if	($bReadOnly){
		$s=$s . " readonly" ;
	} 
	$s=$s . ">" ;
	$s=$s . $sTail ;
	echo $s . Chr(10) ;
}
	
/**
*  回傳上傳欄位
* 
* EX
* $sName     ="BB01"
* $sValue    ="0"
* $nSize     ="20" 欄位寬度
* $nMaxLength="10" 字數限制
* $sOnBlur   =""
* $sOnFocus  =""
* $sOnchange =""
* $sTabIndex =""
* $bReadOnly =false 是否可更改欄位內資料
*  RwEditUpload($sName,$sValue,"<br>",$nSize,$nMaxLength,$sOnBlur,$sOnFocus,$sOnchange,$sTabIndex,$bReadOnly,"","")
* ==> <input type="file" maxlength="10" size="20" name="BB01" value="0"><br>
* 
* @param String $sValue     
* @param String $sName      
* @param String $sTail      
* @param String $nSize      
* @param String $nMaxLength 
* @param String $sOnBlur    
* @param String $sOnFocus   
* @param String $sOnchange  
* @param String $sTabIndex  
* @param Boolean $bReadOnly  
* @param String $sClass     
* @param String $sOnKeyPress
* @access	public
*/
function RwEditUpload($sName, $sValue, $sTail, $nSize, $nMaxLength, $sOnBlur, $sOnFocus, $sOnChange, $sTabIndex, $bReadOnly, $sClass, $sOnKeyPress) {
	$sOnBlur=trim(SafeStr($sOnBlur)) ;
	$sOnFocus=trim(SafeStr($sOnFocus)) ;
	$sOnChange=trim(SafeStr($sOnChange)) ;
	$sOnKeyPress=trim(SafeStr($sOnKeyPress)) ;
	$s="" ;
	$s=$s . "<input type=\"file\"" ;
	$s=$s . " name=".StrAddQuote($sName) ;
	$s=$s . " size=".StrAddQuote($nSize) ;
	$s=$s . " maxlength=".StrAddQuote($nMaxLength) ;
	$s=$s . " value=\"\"" ;
	if	($sOnBlur!="" ){
		$s=$s . " onblur=" . StrAddQuote($sOnBlur) ;
	}
	if	($sOnFocus!=""){
		$s=$s . " onfocus=" .StrAddQuote($sOnFocus) ;
	}
	if	($sOnChange!="" ){
		$s=$s . " onchange=" . StrAddQuote($sOnChange) ;
	}
	if	($sOnKeyPress!=""){
		$s=$s . " onKeyPress=" . StrAddQuote($sOnKeyPress) ;
	} 
	if	($sTabIndex!=""){
		$s=$s . " tabindex=" . StrAddQuote($sTabIndex) ;
	} 
	if	($sClass!=""){
		$s=$s . " Class=".StrAddQuote($sClass) ;
	}
	if	($bReadOnly){
		$s=$s . " readonly" ;
	} 
	$s=$s.">" ;
	$s=$s.$sTail ;
	echo $s . Chr(10) ;
}
	
/**
* 回傳文字欄位，多行
* 
* EX
* $sName ="BB01"
* $sClass=""
* $vValue="hello"
* $nRow  ="10"
* $nCol  ="20"
* RwMemo($sName, $sClass, $vValue, $nRow, $nCol, "", "", "", "", false) ==>
* <textarea name="BB01" rows="10" cols="20">hello</textarea>
* 
* @param String $sName  
* @param String $sClass 
* @param String $vValue 
* @param String $nRow   
* @param String $nCol   
* @param String $sOnBlur    
* @param String $sOnFocus   
* @param String $sOnchange  
* @param String $sTabIndex  
* @param Boolean $bReadOnly
*
* @access	public
*/
function RwMemo($sName, $sClass, $vValue, $nRow, $nCol, $sOnBlur, $sOnFocus, $sOnChange, $sTabIndex, $bReadOnly){
	$sOnBlur=trim(SafeStr($sOnBlur)) ;
	$sOnFocus=trim(SafeStr($sOnFocus)) ;
	$sOnChange=trim(SafeStr($sOnChange)) ;
	$sName=trim(SafeStr($sName)) ;
	$sClass=trim(SafeStr($sClass)) ;
	$s="" ;
	$s=$s . "<textarea" ;
	if	($sName!="" ){
		$s=$s . " name=" . StrAddQuote($sName) ;
	}
	if	($sClass!="" ){
		$s=$s . " class=" . StrAddQuote($sClass) ;
	}
	$s=$s . " rows=" . StrAddQuote($nRow) ;
	$s=$s . " cols=" . StrAddQuote($nCol) ;
	if	($sOnBlur!="" ){
		$s=$s . " onblur=" . StrAddQuote($sOnBlur) ;
	}
	if	($sOnFocus!="" ){
		$s=$s . " onfocus=" .StrAddQuote($sOnFocus) ;
	}
	if	($sOnChange!="" ){
		$s=$s . " onchange=" . StrAddQuote($sOnChange) ;
	}
	if	($sTabIndex!="" ){
		$s=$s . " tabindex=" . StrAddQuote($sTabIndex) ;
	}
	if	($bReadOnly){
		$s=$s . " readonly" ;
	} 
	$s=$s . ">" . Chr(10) ;
	echo $s ;
	echo (string) $vValue ;
	echo "</textarea>" ;
}
	
/**
* 回傳框架元件
* 
* EX
* RwFieldSet("Test",True,"")  ==> <FIELDSET><LEGEND>Test</LEGEND>
* RwFieldSet("",False,"<br>") ==> </FIELDSET><br>
* 
* @param String $sTitle  
* @param Boolean $bStatus 
* @param String $sTail   
*
* @access	public
*/
function RwFieldSet($sTitle,$bStatus,$sTail){
	$s="" ;
	if ($bStatus){
		$s=$s."<FIELDSET>" ;
		$s=$s."<LEGEND>".$sTitle."</LEGEND>" ;
	}else{
		$s=$s."</FIELDSET>".$sTail ;
	}
	echo ("$s") ;
}
	
/**
* 回傳選擇元件
* 
* EX
* RwListBox("Mon", "", Array("1","2"), Array("1月","2月"), "2", "", "", "", "", false);
*
* @param String $sName      
* @param String $sClass     
* @param Array $aValue    
* @param Array $aListName 
* @param String $sSelect    
* @param String $sOnBlur    
* @param String $sOnFocus   
* @param String $sOnchange  
* @param String $sTabIndex  
*
* @access	public
*/
function RwListBox($sName, $sClass, $aValue, $aListName, $sSelect, $sOnBlur, $sOnFocus, $sOnChange, $sTabIndex, $bReadOnly) {
	$s="" ;
	$s=$s."<SELECT" ;
	$s=$s." NAME=".StrAddQuote($sName) ;
	$s=$s." id=".StrAddQuote($sName) ;
	if	($sClass!=""){
		$s=$s." Class=".StrAddQuote($sClass) ;
	} 
	if	($sOnBlur!=""){
		$s=$s." onblur=".StrAddQuote($sOnBlur) ;
	}
	if	($sOnFocus!="" ){
		$s=$s." onfocus=".StrAddQuote($sOnFocus) ;
	}
	if	($sOnChange!=""){
		$s=$s." onchange=".StrAddQuote($sOnChange) ;
	}
	if	($sTabIndex!=""){
		$s=$s. " tabindex=".StrAddQuote($sTabIndex) ;
	}
	if	($bReadOnly){
		$s=$s. " disabled" ;
	} 
	$s=$s.">" ;
	If (IsArray($aValue)){
		If (IsArray($aListName)){
			$iCount=0 ;
			foreach($aValue as $oObjValue){
				$aValueV=$oObjValue ;
				$aListNameV=$aListName[$iCount] ;
				$iCount++ ;
				$s=$s."<OPTION" ;
				$s=$s." value=".StrAddQuote($aValueV) ;
				If (SafeStr($aValueV)==SafeStr($sSelect)){
					$s=$s." selected>".$aListNameV."</OPTION>".chr(10) ;
				}else{
					$s=$s.">".$aListNameV."</OPTION>".chr(10) ;
				}
			}			
		}else{
			//do nothing ;
		}
	}else{
		//do nothing ;		
	}
	$s=$s."</SELECT>" ;
	echo ($s) ;
}

/**
* 回傳表單元件
* 
* EX
* RwForm("","","","",True) ==> <FORM METHOD="POST" ACTION="" Name="">
* RwForm("abc.asp","","","",True) ==> <FORM METHOD="POST" ACTION="abc.asp" Name="">
* RwForm("abc.asp","","frmUser","",True) ==> <FORM METHOD="POST" ACTION="abc.asp" Name="frmUser">
* RwForm("abc.asp","","frmUser","GET",True) ==> <FORM METHOD="GET" ACTION="abc.asp" Name="frmUser">
* RwForm("abc.asp","multipart/form-data","frmUser","GET",True) ==> <FORM METHOD="GET" ACTION="abc.asp" Name="frmUser" Enctype="multipart/form-data">
* RwForm("","","","",False) ==> </FORM>
*
* @param String $sAction    
* @param String $sEnctype   
* @param String $sName      
* @param String $sMethod    
* @param Boolean $bFormPlace 
*
* @access	public
*/
function RwForm($sAction,$sEnctype,$sName,$sMethod,$bFormPlace){
	$s="" ;
	if ($bFormPlace){
		If (SafeStr($sMethod)==""){
			$sMethod="POST" ;
		}
		$s=$s."<FORM" ;
		$s=$s." METHOD=".StrAddQuote($sMethod) ;
		$s=$s." ACTION=".StrAddQuote($sAction) ;
		$s=$s." Name=".StrAddQuote($sName) ;
		if (SafeStr($sEnctype)!=""){
			$s=$s." Enctype=".StrAddQuote($sEnctype) ;
		}
		$s=$s.">".Chr(10) ;
	}else{
		$s="</FORM>".chr(10) ;
	}
	echo ("$s") ;
}

/**
* 判斷陣列中是否有該值的存在
* 
* EX
* $strs: Array 
* check if s exist
* it is private function, don`t use at any place
* 
* @param String $s   
* @param Array $strs 
*
* @access	public
*/
function IsStrInStrs($s, $strs){
	//$vIsStrInStrs=uform::IndexOf($s, $strs)!=-1 ; 
	$vIsStrInStrs=UnidimensionalArrayIndexOf($strs, $s); 
	return $vIsStrInStrs ;
}

/**
* 回傳多選元件
* 
* EX
* $strs: Array 
* return -1 if s not exist in strings object
* RwCheckBoxList("CB01", "", 2, Array("1", "2", "3"), Array("1月", "2月", "3月"), Array("1", "3"), "", false);
* 
* @param String $sName   
* @param String $sClassID
* @param Int $nColCount 
* @param Array $vValue  
* @param Array $vDisplay
* @param Array $vSelected
* @param String $sOnClick
*
* @access	public
*/
function RwCheckBoxList($sName, $sClassID, $nColCount, $vValue, $vDisplay, $vSelected, $sOnClick, $bReadOnly) {
	$arrValue=$vValue ;
	$arrDisplay=$vDisplay ;
	$arrSelected=$vSelected ;
	$cArrayValue=count($arrValue) ; //count array[arrValue]
	//uLog::Log("\$cArrayValue==".$cArrayValue) ;
	//uLog("cArrayValue == [".$cArrayValue."]") ;
	if (IsNull($arrValue)){
		exit ;
	} 
	if	($nColCount < 1){
		$nColCount=1 ;
	}
	if	($nColCount > $cArrayValue){
		$nColCount = $cArrayValue ;
	} 
	$sOnClick=trim(SafeStr($sOnClick)) ;
	$s="" ;
	
	echo "<table border=\"0\" cellSpacing=\"0\" cellPadding=\"0\" width=\"100%\"><tbody>" . chr(10) ;
	$n=1 ;
	$bNewRow=true ;
	for($i=0;$i<$cArrayValue;$i++){
		//uLog::Log("\$i==" . $i) ;
		if	($bNewRow){
			$bNewRow=False ;
			echo ("<tr>").chr(10) ;
		}
		$s="  <td" ;
		if	($sClassID!=""){
			$s=$s." class=" . StrAddQuote($sClassID) ;
		}
		$s=$s.">" ;
		$s=$s."<input type=\"checkbox\" name=" . StrAddQuote($sName."[]") ;
		if	($sOnClick!=""){
			$s=$s." onclick=" . StrAddQuote($sOnClick) ;
		}
		$s=$s." value=" . StrAddQuote($arrValue[$i]) ; 
		if	(IsStrInStrs($arrValue[$i], $arrSelected)){
			$s=$s." checked" ;
		} 
		if	($bReadOnly){
			$s=$s. " disabled" ;
		} 
		//uLog::Log("\$arrDisplay[\$i]==" . $arrDisplay[$i]) ;
		$s=$s.">" . "&nbsp;" . $arrDisplay[$i] ;
		$s=$s."</td>" ;
		echo  $s . Chr(10) ;
		if	(($n % $nColCount)==0){ 
				$bNewRow=True ;
				echo "</tr>" . Chr(10) ;
		}
		$n=$n+1 ;
	}
	//uLog("n 1 == [".$n."]");
	$n=$n-1 ;
	//uLog("n 2 == [".$n."]");
	if ($n%$cArrayValue!=0) {
		do {
			echo "  <td>&nbsp;</td>" . Chr(10) ;
			$n=$n+1 ;
		}
		while (($n % $nColCount)!=0) ;
	}

	echo "</tbody></table>" . Chr(10) ;
}

/**
* 檢查兩值是否相等
* 
* EX
* 若 GetStr($aValue)=GetStr($vValue) --> return " checked"
* 
* @param String $aValue 
* @param String $vValue 
*
* @access	public
*/
function RwGetCheckedStr($aValue, $vValue){
	$vRwGetCheckedStr="" ;
	if 	(trim($aValue)=="" && trim($vValue)!="") { //casper modify 2004/12/15
		//uLog::Log("Empty aValue Exit Function") ;
		//exit ;
		//Do nothing
	}else{
		if ((string)  $vValue==(string) $aValue){
			//uLog::Log("vValue==aValue") ;
			$vRwGetCheckedStr=" checked" ;
		}
	}
	
	return $vRwGetCheckedStr ;
}

/**
* 回傳單選元件
* 
* EX
* RwRadioGroup("EX03", "", 0, Array("0","1"), Array("否，第一筆資料將予匯入","是，第一筆資料不予匯入"), "1", "", false);
* 
* @param String $sName    
* @param String $sClassID 
* @param String $nColCount
* @param String $vValue   
* @param String $vDisplay 
* @param String $sSelected
* @param String $sOnClick 
* @access	public
*/
function RwRadioGroup($sName, $sClassID, $nColCount, $vValue, $vDisplay, $sSelected, $sOnClick, $bReadOnly) {
	$arrValue=$vValue ;
	$arrDisplay=$vDisplay ;
	$ArrayarrValue=count($arrValue) ;

	if	($nColCount<0){
		$nColCount=0 ;
	} 
	if (empty($arrValue)){
		exit ;
	} 
	if ($nColCount>1){
		$bTable=true ;
	}
	else{
		$bTable=false ;
	}
	if ($nColCount>$ArrayarrValue){
		$nColCount=$ArrayarrValue ;
	}
	$sOnClick=trim(SafeStr($sOnClick)) ;
	$s="" ;
	if ($bTable){
		echo "<table border=\"0\" cellSpacing=\"0\" cellPadding=\"0\" width=\"100%\"><tbody>" . chr(10) ;
	} 
	$n=1 ;
	$bNewRow=true ;

	for ($i=0; $i<$ArrayarrValue; $i++){
		$s="" ;
		if ($bTable){
			if	($bNewRow){
				$bNewRow=False ;
				echo "<tr>" . Chr(10) ;
			}
			$s=$s&"  <td" ;
			if	($sClassID!=""){
				$s=$s." class=" . StrAddQuote($sClassID) ;
			} 
			$s=$s.">" ;
		}
		$s=$s."<input type=\"radio\" name=" . StrAddQuote($sName) ;
		if	($sOnClick!=""){
			$s=$s." onclick=" . StrAddQuote($sOnClick) ;
		}
		if	($bReadOnly){
			$s=$s. " disabled" ;
		}
		//uLog::Log("\$sSelected==" . $sSelected) ;
		//uLog::Log("\$arrValue[\$i]==" . $arrValue[$i]) ;
		$s=$s . " value=" . StrAddQuote($arrValue[$i]) . RwGetCheckedStr($sSelected, $arrValue[$i]) . "> " . $arrDisplay[$i] ; 
		//uLog::Log("\$s==" . $s) ;
		if	($bTable){
			$s=$s."</td>" ;
		} 
		if ($nColCount==1){
			$s=$s."<br>" ;
		} 
		echo $s . chr(10) ;
		if ($bTable){
			if (($n % $nColCount)==0){
				$bNewRow=true ;
				echo "</tr>" . chr(10) ;
			}
		}
		$n=$n+1 ;
	}
	$n=$n-1 ;
	if ($bTable){
		do {
			echo "  <td>&nbsp;</td>" . Chr(10) ;
			$n=$n+1 ;
		}
		while (($n %  $nColCount)!=0) ;
		echo "</tbody></table>" . chr(10) ;
	}
}

//要加密時呼叫的函式
 function encrypt($word){
  $i = $word;
  $temp;
  //取出字串中所有字元並加密再存入字串中
  for ($j=0;$j<strlen($i);$j++){
   $temp = substr($i,$j,1);
   $temp = ord($temp)+1;
   $i=substr_replace($i,chr($temp),$j,1);
  }
  return $i;
 }
 
 //要解密時呼叫的函式
 function decrypt($word){ 
  $i = $word;
  $temp;
  //取出字串中所有字元進行解密再存入字串中
  for ($j=0;$j<strlen($i);$j++){
   $temp = substr($i,$j,1);
   $temp = ord($temp)-1;
   $i=substr_replace($i,chr($temp),$j,1);
  }
  return $i;
 } 

function checkRemoteFile($url)
{
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL,$url);
    // don't download content
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    if(curl_exec($ch)!==FALSE)
    {
        return true;
    }
    else
    {
        return false;
    }
}



?>