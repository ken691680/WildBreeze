<?php //*********************************模組檔案引入********************************* ?>
<?php include("../../Module/pMwm.php"); ?>
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
$sSQL="select * from property where pr03='1' order by lasttime desc";
$result=GetRs($sSQL);
//$sResult = "{rows:[";
$sResult = "{rows:[{\"text\":\"請選擇產品類別\",\"value\":\"0\"},";
while($row=mysql_fetch_array($result)) {
	$sResult = $sResult."{\"text\":\"".$row["pr02"]."\",\"value\":\"".$row["pr01"]."\"},";	
}
$sResult = Left($sResult, (Len($sResult)-1))."]}";
uLog($sResult );
echo $sResult;
?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

?>
<?php //**************************************************************************** ?>