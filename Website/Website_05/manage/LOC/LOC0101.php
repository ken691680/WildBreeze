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
$FixDirectory=GetPathProject()."upload".GetLinking()."storelocations".GetLinking();     //實體目錄位置
uLog("FixDirectory == [".$FixDirectory."]");
$_SESSION["NowPhysicalPath"]=$FixDirectory;

$sl01=GetDateTimeCE().GetMicroTime();
$sl02=$_POST["sl02"];
$sl03=$_POST["sl03"];
$sl04=$_POST["sl04"];

uLog("sl01 == " . $sl01);
uLog("sl02 == " . $sl02);
uLog("sl03 == " . $sl03);
uLog("sl04 == " . $sl04);

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
$sUserfileName=iconv("UTF-8", "big5", $_FILES['sl04']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$ssl04="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['sl04']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$ssl04=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
		} else {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

$sSQL="insert into storelocations (sl01, sl02, sl03, sl04, ma01, lasttime) values ('".$sl01."', '".$sl02."', '".$sl03."', '".$ssl04."', '".GetManID()."', now());";
$rSQLExec=GetRs($sSQL);

echo '{success:true}';

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

?>
<?php //**************************************************************************** ?>