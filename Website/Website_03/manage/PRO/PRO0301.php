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
$pr03=$_GET["pr03"];
$pr04=$_GET["pr04"];

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
$sResult="";
$sFirstID="";

if ($pr03=="1") {
	$sSQL="select * from property where (pr03='1') and (1=1) order by pr01 desc;";
	$rRs=GetRs($sSQL);
	
	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$sResult=$sResult."['".$row["pr01"]."', '".Replace($row["pr02"], "'", "\'")."'],";
	}
	mysql_free_result($rRs);
} else if ($pr03=="2") {
	if (Trim($pr04)=="") {
		$sSQL="select * from property where (pr03='2') and pr04=(select pr01 from property where (pr03='1') and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc;";
	} else {
		$sSQL="select * from property where (pr03='2') and pr04='".$pr04."' and (1=1) order by pr01 desc;";
	}
	//$sSQL="select * from property where (pr03='2') and pr04=(select pr01 from property where (pr03='1') and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc;";
	$rRs=GetRs($sSQL);
	
	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$sResult=$sResult."['".$row["pr01"]."', '".Replace($row["pr02"], "'", "\'")."'],";
	}
	mysql_free_result($rRs);
} else if ($pr03=="3") {
	if (Trim($pr04)=="") {
		$sSQL="select * from property where (pr03='3') and pr04=(select pr01 from property where (pr03='2') and pr04=(select pr01 from property where (pr03='1') and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc;";
	} else {
		$sSQL="select * from property where (pr03='3') and pr04=(select pr01 from property where (pr03='2') and pr04='".$pr04."' and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc;";
	}
	uLog("sSQL 3 == [".$sSQL."]");
	//$sSQL="select * from property where (pr03='3') and pr04=(select pr01 from property where (pr03='2') and pr04=(select pr01 from property where (pr03='1') and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc;";
	$rRs=GetRs($sSQL);
	
	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$sResult=$sResult."['".$row["pr01"]."', '".Replace($row["pr02"], "'", "\'")."'],";
	}
	mysql_free_result($rRs);
} else if ($pr03=="4") {
	if (Trim($pr04)=="") {
		$sSQL="select * from property where (pr03='4') and pr04=(select pr01 from property where (pr03='3') and pr04=(select pr01 from property where (pr03='2') and pr04=(select pr01 from property where (pr03='1') and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc;";
	} else {
		$sSQL="select * from property where (pr03='4') and pr04=(select pr01 from property where (pr03='3') and pr04=(select pr01 from property where (pr03='2') and pr04='".$pr04."' and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc;";
	}
	//$sSQL="select * from property where (pr03='4') and pr04=(select pr01 from property where (pr03='3') and pr04=(select pr01 from property where (pr03='2') and pr04=(select pr01 from property where (pr03='1') and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc;";
	$rRs=GetRs($sSQL);
	
	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$sResult=$sResult."['".$row["pr01"]."', '".Replace($row["pr02"], "'", "\'")."'],";
	}
	mysql_free_result($rRs);
} else if ($pr03=="5") {
	if (Trim($pr04)=="") {
		$sSQL="select * from property where (pr03='5') and pr04=(select pr01 from property where (pr03='4') and pr04=(select pr01 from property where (pr03='3') and pr04=(select pr01 from property where (pr03='2') and pr04=(select pr01 from property where (pr03='1') and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc;";
	} else {
		$sSQL="select * from property where (pr03='5') and pr04=(select pr01 from property where (pr03='4') and pr04=(select pr01 from property where (pr03='3') and pr04=(select pr01 from property where (pr03='2') and pr04='".$pr04."' and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc;";
	}
	//$sSQL="select * from property where (pr03='5') and pr04=(select pr01 from property where (pr03='4') and pr04=(select pr01 from property where (pr03='3') and pr04=(select pr01 from property where (pr03='2') and pr04=(select pr01 from property where (pr03='1') and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc limit 1) and (1=1) order by pr01 desc;";
	$rRs=GetRs($sSQL);
	
	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$sResult=$sResult."['".$row["pr01"]."', '".Replace($row["pr02"], "'", "\'")."'],";
	}
	mysql_free_result($rRs);
}

if (Trim($sResult)!="") {
	$sResult="[".Left($sResult, Len($sResult)-1)."]";
} else {
	$sResult="[]";
}

echo $sResult;

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

?>
<?php //**************************************************************************** ?>