<?php //*********************************模組檔案引入********************************* ?>
<?php include("Module/pUwm.php"); ?>
<?php //**************************************************************************** ?>

<?php //*********************************前置變數定義********************************* ?>
<?php
// ===========================================================================
// 初始化參數宣告
// ===========================================================================
ErrorReporting(E_ERROR | E_WARNING | E_PARSE);                    //錯誤回報控制 0關掉 E_ALL全部回報

// ===========================================================================
// 接收參數宣告
// ===========================================================================
$ep01=$_GET["ep01"];                      //接收欲編輯的資料

uLog("ep01 == [".$ep01."]");

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
if ($ep01!="") {
	$rsLP=GetRs("select * from epaper where ep01='".$ep01."';");

	$ep04="http://www.kumotor.com.tw/"; //停權編號    
	$ep05=0;

	while ($row = mysql_fetch_array($rsLP, MYSQL_ASSOC)) {
		$ep04=$row["ep04"];
		$ep05=SafeInt($row["ep05"]);
	}
	mysql_free_result($rsLP);

	uLog("ep04 == [".$ep04."]");
	uLog("ep05 == [".$ep05."]");
	$ep05++;

	$sSQLExec="update epaper set ep05=".$ep05." where ep01='".$ep01."';";
	uLog("sSQLExec == [".$sSQLExec."]");
	$rSQLExec=GetRs($sSQLExec);

	header("location:".$ep04);
}

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

?>
<?php //**************************************************************************** ?>
