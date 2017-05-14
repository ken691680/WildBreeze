<?php //*********************************模組檔案引入********************************* ?>
<?php 
/**
* 定義網站所有所須參數
*/
header("Content-Type:text/html; charset=utf-8");
ob_start();                                                        //開啟output_buffering
session_start();                                                   //啟用session

define("PsyPath", "D:/Project/Tommy/WildBreeze/Website/Website_03/");   //網站磁碟實際路徑
//define("PsyPath", "/home/jobdone/public_html/wildbreeze/");   //網站磁碟實際路徑

include(PsyPath."Lib/uUtil.php");
$sDbType=iDB_MySQL;                                                //資料庫類型
$iMaxRowCount=-1;                                                  //資料量存取限制

$bIsDeploy=false;                                                  //遠端或近端開發
//$bIsDeploy=true;                                                  //遠端或近端開發

$sTitle="野遊風後端管理系統";                                            //網頁標題
$sFrontEndTitle="野遊風戶外休閒用品館";                                            //網頁標題

$sRootR="D:/Project/Tommy/WildBreeze/Website/Website_03/";              //實際路徑
//$sRootR="/home/jobdone/public_html/wildbreeze/";              //實際路徑

$sRootV="WildBreeze_03/";                                               //網站路徑
//$sRootV="";                                               //網站路徑

$sPathDb="bin/db/";                                                //SQL檔路行
$sPathBin="bin/";                                                  //執行檔路徑
$sPathFlashV="flash/";                                             //Flash虛擬路徑
$sPathImagesV="images/";                                           //圖檔虛擬路徑
$sPathScriptsV="jscript/";                                         //Script虛擬路徑
$sPathCssV="css/";                                                 //CSS虛擬路徑
$sPathCss="css/";                                                  //CSS實際路徑
$sPathImages="images/";                                            //圖檔實際路徑
$sPathScripts="jscript/";                                          //Script實際路徑
putenv("TZ=Asia/Taipei");                                          //設定時區

?>
<?php //**************************************************************************** ?>

<?php //*********************************資料庫相關函數********************************* ?>
<?php
function GetConn() {
	$aDb=null;
	if (GetDeploy()) {
		$aDb=CreateDbMySQL("localhost", "jobdone_wildbreeze", "jobdone_wildbree", "E&af(8=Q.y}]");
	} else {
		$aDb=CreateDbMySQL("localhost", "wildbreeze", "root", "11160715");
	}
	return $aDb;
}

function GetRs($sSQL) {
	$co=GetConn();
	//uLog("GetRs sSQL == [".$sSQL."]");
	//uLog("GetRs Connection.....");
	$rs=CreateRs($co, $sSQL);
	//uLog("GetRs sSQL == [".$sSQL."]");
	return $rs;
}

function SQLQuryI($sFileName, $sFlagName, $aParme) {
	$sFile=$sFileName;
	$sResult="";
	$sPath01="";
	if (IsWindows()) {
		$sResult=$sFile;
	} else {
		//$sResult=$sPath01;
		$sResult=$sFile;
	}
	$sFile=GetBinPath()."db/".$sResult;
	//uLog("SQLQuryI sFile == [".$sFile."]");
	$SQLQury=SQLParseI($sFile, $sFlagName, $aParme, GetMaxRowCountNum(), GetDbType());
	return $SQLQury;
}

function SQLQuryII($sFileName, $sFlagName, $aParme, $iStart, $iEnd) {
	$sFile=$sFileName;
	$sResult="";
	$sPath01="";
	if (IsWindows()) {
		$sResult=$sFile;
	} else {
		//$sResult=$sPath01;
		$sResult=$sFile;
	}
	$sFile=GetBinPath()."db/".$sResult;
	//uLog("SQLQuryII sFile == [".$sFile."]");
	$SQLQury=SQLParseII($sFile, $sFlagName, $aParme, $iStart, $iEnd, GetDbType());
	return $SQLQury;
}

function SQLQuryIII($sFileName, $sFlagName, $aParme, $iStart, $iEnd, $sOrderFieldName, $sOrderSequence) {
	//uLog("SQLQuryIII iStart == ".$iStart);
	//uLog("SQLQuryIII iEnd == ".$iEnd);
	$sFile=$sFileName;
	$sResult="";
	$sPath01="";
	if (IsWindows()) {
		$sResult=$sFile;
	} else {
		//$sResult=$sPath01;
		$sResult=$sFile;
	}
	$sFile=GetBinPath()."db/".$sResult;
	//uLog("SQLQuryIII sFile == [".$sFile."]");
	$SQLQury=SQLParseIV($sFile, $sFlagName, $aParme, $iStart, $iEnd, $sOrderFieldName, $sOrderSequence, GetDbType());
	//uLog("SQLQuryIII SQLQury == ".$SQLQury);
	return $SQLQury;
}

function SQLExec($sFileName, $sFlagName, $aParme) {
	$sFile=$sFileName;
	$sResult="";
	$sPath01="";
	if (IsWindows()) {
		$sResult=$sFile;
	} else {
		//$sResult=$sPath01;
		$sResult=$sFile;
	}
	$sFile=GetBinPath()."db/".$sResult;
	$sSQLExec=SQLFormat($sFile, $sFlagName, $aParme);
	//uLog("SQLExec sSQLExec == ".$sSQLExec);
	$rSQLExec=GetRs($sSQLExec);
}

?>
<?php //******************************************************************************** ?>

<?php //*********************************錯誤處理相關函數********************************* ?>
<?php
/*
||||||||||||||||||||||||||||||
||value ||constant          ||
||||||||||||||||||||||||||||||
||1     ||E_ERROR           ||
||2     ||E_WARNING         ||
||4     ||E_PARSE           ||
||8     ||E_NOTICE          ||
||16    ||E_CORE_ERROR      ||
||32    ||E_CORE_WARNING    ||
||64    ||E_COMPILE_ERROR   ||
||128   ||E_COMPILE_WARNING ||
||256   ||E_USER_ERROR      ||
||512   ||E_USER_WARNING    ||
||1024  ||E_USER_NOTICE     ||
||2047  ||E_ALL             ||
||2048  ||E_STRICT          ||
||||||||||||||||||||||||||||||
// Reporting E_NOTICE can be good too (to report uninitialized 
// variables or catch variable name misspellings ...)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Report all errors except E_NOTICE
// This is the default value set in php.ini
error_reporting(E_ALL ^ E_NOTICE);

// Report all PHP errors (bitwise 63 may be used in PHP 3)
error_reporting(E_ALL);
*/
function ErrorReporting($iInt) {
	if (GetDeploy()) {
		error_reporting(E_ERROR | E_WARNING | E_PARSE); //取消錯誤回報
	} else {
		error_reporting($iInt); //取消錯誤回報
		//error_reporting(0); //取消錯誤回報
	}
}

?>
<?php //********************************************************************************** ?>

<?php //*********************************元件相關函數********************************* ?>
<?php
function ItemListBase($sCode, $aParameter) {
	switch ($sCode) {
	case "C":
		RwCheckBoxList(SafeStr($aParameter[0]), SafeStr($aParameter[1]), SafeInt($aParameter[2]), $aParameter[3], $aParameter[4], $aParameter[5], SafeStr($aParameter[6]), $aParameter[7]);
		break;
	case "H":
		RwHidden(SafeStr($aParameter[0]), SafeStr($aParameter[1]));
		break;
	case "I":
		RwEdit(SafeStr($aParameter[0]), SafeStr($aParameter[1]), SafeStr($aParameter[2]), SafeInt($aParameter[3]), SafeInt($aParameter[4]), SafeStr($aParameter[5]), SafeStr($aParameter[6]), SafeStr($aParameter[7]), SafeStr($aParameter[8]), $aParameter[9], SafeStr($aParameter[10]), SafeStr($aParameter[11]));
		break;
	case "L":
		RwListBox(SafeStr($aParameter[0]), SafeStr($aParameter[1]), $aParameter[2], $aParameter[3], SafeStr($aParameter[4]), SafeStr($aParameter[5]), SafeStr($aParameter[6]), SafeStr($aParameter[7]), SafeStr($aParameter[8]), $aParameter[9]);
		break;
	case "M":
		RwMemo(SafeStr($aParameter[0]), SafeStr($aParameter[1]), SafeStr($aParameter[2]), SafeInt($aParameter[3]), SafeInt($aParameter[4]), SafeStr($aParameter[5]), SafeStr($aParameter[6]), SafeStr($aParameter[7]), SafeStr($aParameter[8]), $aParameter[9]);
		break;
	case "P":
		RwPassword(SafeStr($aParameter[0]), SafeStr($aParameter[1]), SafeStr($aParameter[2]), SafeInt($aParameter[3]), SafeInt($aParameter[4]), SafeStr($aParameter[5]), SafeStr($aParameter[6]), SafeStr($aParameter[7]), SafeStr($aParameter[8]), $aParameter[9], SafeStr($aParameter[10]));
		break;
	case "R":
		RwRadioGroup(SafeStr($aParameter[0]), SafeStr($aParameter[1]), SafeInt($aParameter[2]), $aParameter[3], $aParameter[4], SafeStr($aParameter[5]), SafeStr($aParameter[6]), $aParameter[7]);
		break;
	case "U":
		RwEditUpload(SafeStr($aParameter[0]), SafeStr($aParameter[1]), SafeStr($aParameter[2]), SafeInt($aParameter[3]), SafeInt($aParameter[4]), SafeStr($aParameter[5]), SafeStr($aParameter[6]), SafeStr($aParameter[7]), SafeStr($aParameter[8]), $aParameter[9], SafeStr($aParameter[10]), SafeStr($aParameter[11]));
		break;
	case "B":
		RwButton(SafeStr($aParameter[0]), SafeStr($aParameter[1]), SafeStr($aParameter[2]), SafeStr($aParameter[3]));
		break;
	default:
		echo("&nbsp;");
		break;
	}
}

function ItemList($sCode, $aParameter) {
	$aCode=StringToCharArray($sCode);
	$aCodeLen=GetUnidimensionalArrayLength($aCode);
	$iCountItem=0;
	$iCountObj=0;
	$iAsc=0;
	
	/*
	uLog("####################### ItemList aCode #######################");
	uLog($aCode);
	uLog("##############################################################");
	*/

	for ($i=0; $i<$aCodeLen; $i++) {
		$iAsc=CharToAscii($aCode[$i]);
		//uLog("ItemList iAsc == " + $iAsc);
		if ($iAsc==66 || $iAsc==67 || $iAsc==72 || $iAsc==73 || $iAsc==76 || $iAsc==77 || $iAsc==80 || $iAsc==82 || $iAsc==85 || $iAsc==69 || $iAsc==83) {
			//Log("ItemList $iCountItem has counted");
			$iCountItem++;
		}
	}
	//Log("ItemList $iCountItem == " + $iCountItem);
	if ($iCountItem>1) {
		//Log("ItemList run true");
		for ($i=0; $i<$aCodeLen; $i++) {
			$iAsc=CharToAscii($aCode[$i]);
			if ($iAsc==66 || $iAsc==67 || $iAsc==72 || $iAsc==73 || $iAsc==76 || $iAsc==77 || $iAsc==80 || $iAsc==82 || $iAsc==85 || $iAsc==69 || $iAsc==83) {
				$aTmp=$aParameter[$iCountObj];
				/*
				uLog("####################### ItemList aTmp #######################");
				uLog("aCode[i] == [".SafeStr($aCode[$i])."]");
				uLog($aTmp);
				uLog("##############################################################");
				*/
				ItemListBase(SafeStr($aCode[$i]), $aTmp);
				$iCountObj++;
			} else {
				echo($aCode[$i]);
			}
		}
	} else {
		//Log("ItemList run false");
		for ($i=0; $i<$aCodeLen; $i++) {
			$iAsc=CharToAscii($aCode[$i]);
			if ($iAsc==66 || $iAsc==67 || $iAsc==72 || $iAsc==73 || $iAsc==76 || $iAsc==77 || $iAsc==80 || $iAsc==82 || $iAsc==85 || $iAsc==69 || $iAsc==83) {
				/*
				uLog("####################### ItemList aParameter #######################");
				uLog("aCode[i] == [".SafeStr($aCode[$i])."]");
				uLog($aParameter);
				uLog("##############################################################");
				*/
				ItemListBase(SafeStr($aCode[$i]), $aParameter);
			} else {
				echo($aCode[$i]);
			}
		}
	}
}

?>
<?php //****************************************************************************** ?>

<?php //*********************************其它輔助函數********************************* ?>
<?php
function GetMicroTime() {
	$sResult="";
	$sResult=floor(microtime()*1000);
	return $sResult;
}

function GetLinking() {
	$sResult="";
	if (IsWindows()) {
		//$sLinking="\\";
		$sLinking="/";
	} else {
		$sLinking="/";
	}
	$sResult=$sLinking;
	return $sResult;
}

function PostMail( $sTitle, $msgBody, $me03 ) {
	// 建立 PHPMailer 物件及設定 SMTP 登入資訊
	$mail = new PHPMailer();
	$mail->IsSMTP(); // send via SMTP
	$mail->Host = "mail.jobdone.us"; // SMTP servers
	$mail->Port = 2626; // SMTP port
	$mail->SMTPAuth = true; // turn on SMTP authentication
	$mail->Username = "service@kumotor.jobdone.us"; // SMTP username
	$mail->Password = "ur8IfCDQdE;S"; // SMTP password
	$mail->CharSet = "utf-8"; // SMTP password
	$mail->From = "service@wildbreeze.com";
	$mail->FromName = "WildBreeze 野遊風戶外休閒用品館";
	// 執行 $mail->AddAddress() 加入收件者，可以多個收件者
	$mail->AddAddress($me03);
	$mail->WordWrap = 50; // set word wrap
	// 電郵內容，以下為發送 HTML 格式的郵件
	$mail->IsHTML(true); // send as HTML
	//$mail->Subject = "MORYU 商務交易網 驗證信";
	$mail->Subject = $sTitle;
	$mail->Body = CreateMailBody($msgBody);
	if(!$mail->Send()) {
		//return false;
	} else {
		//return true;
	}
}

function CreateMailBody( $bodyMsg) {
	$allbody='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>無標題文件</title>
	<style type="text/css">
	body {
		font-family: "Arial Black", Gadget, sans-serif;
		font-size: 12px;
		line-height: 18px;
		text-transform: capitalize;
		color: #333;
		margin-left: 10px;
		margin-top: 10px;
		margin-right: 10px;
		margin-bottom: 10px;
	}
	A.mail_link:link {text-decoration:none;color:#8e0000;font-size:12px;font-family:Arial, Helvetica, sans-serif,新細明體;}
	A.mail_link:visited {text-decoration:none;color:#8e0000;font-size: 12px;font-family:Arial, Helvetica, sans-serif,新細明體;}
	A.mail_link:active {text-decoration:none;color:#8e0000;font-size: 12px;font-family:Arial, Helvetica, sans-serif,新細明體;}
	A.mail_link:hover {text-decoration:none;color:#000000;font-size: 12px;font-family:Arial, Helvetica, sans-serif,新細明體;}
	.mail_bottom{
		padding:4px;
		background-color:#8e0000;
		border:solid 1px #300;
		color:#FFF;
		font-size:12px;
		}
	</style>
	</head>

	<body>
			<div style="border:#900 1px solid;">
				<div style=" background-color:#900;padding:6px;font-size:16px; font-weight:bold;color:#FFFFFF">WildBreeze Business Trading Network</div>
				<div style="padding:20px;color:#3c3c3c"">
	'.$bodyMsg.'
				</div>
			
				</div>
			

			
			 
			</div>
	</body>
	</html>';
	return $allbody;
}

?>
<?php //****************************************************************************** ?>