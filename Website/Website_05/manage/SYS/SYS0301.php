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
$hdnOp=$_POST["hdnOp"];                   //表單固定參數
$_SESSION["sSQLFile"]="SYS/SYS0301.sql";  //SQL檔路徑

// ===========================================================================
// 接收參數宣告
// ===========================================================================
$FixDirectory=GetPathProject()."upload".GetLinking()."news".GetLinking();     //實體目錄位置
uLog("FixDirectory == [".$FixDirectory."]");
$_SESSION["NowPhysicalPath"]=$FixDirectory;

$ne01=GetDateTimeCE().GetMicroTime();
$ne02=$_POST["ne02"];
$ne03=$_POST["ne03"];
$ne04=$_POST["ne04"];
$ne05=$_POST["ne05"];
$ne06=$_POST["ne06"];

uLog("ne01 == " . $ne01);
uLog("ne02 == " . $ne02);
uLog("ne03 == " . $ne03);
uLog("ne04 == " . $ne04);
uLog("ne05 == " . $ne05);
uLog("ne06 == " . $ne06);

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
$sUserfileName=iconv("UTF-8", "big5", $_FILES['ne04']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$sne04="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['ne04']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$sne04=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
		} else {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

$sSQL="insert into news (ne01, ne02, ne03, ne04, ne05, ma01, lasttime, ne06) values ('".$ne01."', '".$ne02."', '".$ne03."', '".$sne04."', '".$ne05."', '".GetManID()."', now(), '".$ne06."');";
$rSQLExec=GetRs($sSQL);

echo '{success:true}';

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

?>
<?php //**************************************************************************** ?>