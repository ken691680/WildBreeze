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
$data=Array();
$sSQL="select * from events where (1=1);";
$rRs=GetRs($sSQL);

$ev04="";
$ev05="";
$ev06="";

while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
	if (Trim($row["ev04"])=="") {
		$ev04="";
	} else {
		$ev04="<img src='../upload/events/".$row["ev04"]."'>";
	}
	if (Trim($row["ev05"])=="") {
		$ev05="";
	} else {
		$ev05="<img src='../upload/events/".$row["ev05"]."'>";
	}
	if (Trim($row["ev06"])=="") {
		$ev06="";
	} else {
		$ev06="<img src='../upload/events/".$row["ev06"]."'>";
	}

	$data=UnidimensionalArrayAppend($data, Array($row["ev01"], $row["ev02"], $row["ev03"], $ev04, $ev05, $ev06, Left($row["ev07"], 10), $row["ev08"], $row["ev09"], $row["ev10"], $row["ev11"], $row["ev12"], $row["ev13"], $row["ev14"], $row["ev15"], $row["ev16"], Left($row["ev17"], 10), Left($row["ev18"], 10), $row["ma01"], Left($row["lasttime"], 10)));
}
mysql_free_result($rRs);

echo json_encode($data);

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

?>
<?php //**************************************************************************** ?>