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
$sSQL="select * from datacode where dc03<>'付款方式' and (1=1);";
$rRs=GetRs($sSQL);

$wb03="";

while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
	$data=UnidimensionalArrayAppend($data, Array($row["dc01"], $row["dc02"], $row["dc03"], $row["ma01"], Left($row["lasttime"], 10)));
}
mysql_free_result($rRs);

echo json_encode($data);

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

?>
<?php //**************************************************************************** ?>