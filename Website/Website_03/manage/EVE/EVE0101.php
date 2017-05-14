<?php //*********************************模組檔案引入********************************* ?>
<?php include("../../Module/pMwm.php"); ?>
<?php //**************************************************************************** ?>

<?php //*********************************前置變數定義********************************* ?>
<?php
// ===========================================================================
// 初始化參數宣告
// ===========================================================================
ErrorReporting(E_ERROR | E_WARNING | E_PARSE);                    //錯誤回報控制 0關掉 E_ALL全部回報
ChkLogin();                               //檢查是否登入

// ===========================================================================
// 接收參數宣告
// ===========================================================================
$FixDirectory=GetPathProject()."upload".GetLinking()."events".GetLinking();     //實體目錄位置
uLog("FixDirectory == [".$FixDirectory."]");
$_SESSION["NowPhysicalPath"]=$FixDirectory;

$ev01=GetDateTimeCE().GetMicroTime();
$ev02=$_POST["ev02"];
$ev03=$_POST["ev03"];
$ev04=$_POST["ev04"];
$ev05=$_POST["ev05"];
$ev06=$_POST["ev06"];
$ev07=$_POST["ev07"];
$ev08=$_POST["ev08"];
$ev09=$_POST["ev09"];
$ev10=$_POST["ev10"];
$ev11=$_POST["ev11"];
$ev12=$_POST["ev12"];
$ev13=$_POST["ev13"];
$ev14=$_POST["ev14"];
$ev15=$_POST["ev15"];
$ev16=$_POST["ev16"];
$ev17=$_POST["ev17"];
$ev18=$_POST["ev18"];

uLog("ev01 == " . $ev01);
uLog("ev02 == " . $ev02);
uLog("ev03 == " . $ev03);
uLog("ev04 == " . $ev04);
uLog("ev05 == " . $ev05);
uLog("ev06 == " . $ev06);
uLog("ev07 == " . $ev07);
uLog("ev08 == " . $ev08);
uLog("ev09 == " . $ev09);
uLog("ev10 == " . $ev10);
uLog("ev11 == " . $ev11);
uLog("ev12 == " . $ev12);
uLog("ev13 == " . $ev13);
uLog("ev14 == " . $ev14);
uLog("ev15 == " . $ev15);
uLog("ev16 == " . $ev16);
uLog("ev17 == " . $ev17);
uLog("ev18 == " . $ev18);

// ===========================================================================
// 表單參數宣告
// ===========================================================================

// ===========================================================================
// 資料列表參數宣告
// ===========================================================================

?>
<?php //**************************************************************************** ?>

<?php //*********************************程式邏輯演算********************************* ?>
<?php
//上傳圖片
$sRndName=GetDateTimeCE().GetMicroTime();
$sUserfileName=iconv("UTF-8", "big5", $_FILES['ev04']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$sev04="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['ev04']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$sev04=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
		} else {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

//上傳圖片
$sRndName=GetDateTimeCE().GetMicroTime();
$sUserfileName=iconv("UTF-8", "big5", $_FILES['ev05']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$sev05="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['ev05']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$sev05=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
		} else {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

//上傳圖片
$sRndName=GetDateTimeCE().GetMicroTime();
$sUserfileName=iconv("UTF-8", "big5", $_FILES['ev06']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$sev06="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['ev06']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$sev06=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
		} else {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

$sSQL="insert into events (ev01, ev02, ev03, ev04, ev05, ev06, ev07, ev08, ev09, ev10, ev11, ev12, ev13, ev14, ev15, ev16, ev17, ev18, ma01, lasttime) values ('".$ev01."', '".$ev02."', '".$ev03."', '".$sev04."', '".$sev05."', '".$sev06."', '".$ev07."', '".$ev08."', '".$ev09."', '".$ev10."', '".$ev11."', '".$ev12."', '".$ev13."', '".$ev14."', '".$ev15."', '".$ev16."', '".$ev17."', '".$ev18."', '".GetManID()."', now());";
$rSQLExec=GetRs($sSQL);

echo '{success:true}';

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

?>
<?php //**************************************************************************** ?>