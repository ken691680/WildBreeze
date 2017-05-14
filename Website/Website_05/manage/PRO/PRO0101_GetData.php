<?php //*********************************模組檔案引入********************************* ?>
<?php include("../../Module/pMwm.php"); ?>
<?php //**************************************************************************** ?>

<?php //*********************************前置變數定義********************************* ?>
<?php
// ===========================================================================
// 初始化參數宣告
// ===========================================================================
ErrorReporting(E_ERROR | E_WARNING | E_PARSE);                    //錯誤回報控制 0關掉 E_ALL全部回報
//ChkLogin();                               //檢查是否登入

// ===========================================================================
// 接收參數宣告
// ===========================================================================
$pr01=$_GET["pr01"];

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
///*
$sContentToDownload="";
$sSQLLang="";
$aSQLLangField=Array();

//處理第一行語系部份
$aLangArray=Array("pr01", "pr02", "pr03", "pr04", "pr05", "ma01", "lasttime");
$sSQL="SHOW COLUMNS FROM property;";
$rRs=GetRs($sSQL);

while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
	if (UnidimensionalArrayIndexOf($aLangArray, Trim($row["Field"]))==false) {
		$sSQLLang=$sSQLLang.Trim($row["Field"]).",";
		$aSQLLangField=UnidimensionalArrayAppend($aSQLLangField, Trim($row["Field"]));
	}
}
mysql_free_result($rRs);

//處理資料內容
$sSQL="select ".$sSQLLang." pr01, pr02, pr03, pr04, pr05 from property where pr01='".$pr01."';";
uLog("sSQL == [".$sSQL."]");
$rRs=GetRs($sSQL);
$iSQLLangField=GetUnidimensionalArrayLength($aSQLLangField);

while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
	for ($i = 0; $i < $iSQLLangField; $i++) {
		$sContentToDownload=$sContentToDownload.$aSQLLangField[$i].":'".Replace(Trim($row[$aSQLLangField[$i]]), "'", "\'")."',";
	}
	$sContentToDownload=$sContentToDownload."pr04:'".Trim($row["pr04"])."',";
	$sContentToDownload=$sContentToDownload."pr05:'".Trim($row["pr05"])."',";
	break;
}
mysql_free_result($rRs);

uLog("sContentToDownload == [".$sContentToDownload."]");

//顯示資料
if ($sContentToDownload!="") {
	$sContentToDownload=Left($sContentToDownload, Len($sContentToDownload)-1);
	//echo "{success:true,".$sContentToDownload."}";
} else {
	//echo "{success:true}";
}
//*/

//echo "{success:true,CheckBoxData:'[{boxLabel:'项目1',name:'item',readOnly:true,inputValue:'1'},{boxLabel:'项目6',name:'item',readOnly:true,inputValue:'6'}]'}";
echo "[{boxLabel:'项目1',name:'item',readOnly:true,inputValue:'1'},{boxLabel:'项目6',name:'item',readOnly:true,inputValue:'6'}]";

//uLog("###################### Code Start ######################");
//uLog("###################### Code End   ######################");

//echo "{success:true,msg:'登陆成功!',msg2:'登陆成功2!'}";

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

?>
<?php //**************************************************************************** ?>