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
$dc01=GetDateTimeCE().GetMicroTime();
$dc02=$_POST["dc02"];
$dc03=$_POST["dc03"];

uLog("dc01 == " . $dc01);
uLog("dc02 == " . $dc02);
uLog("dc03 == " . $dc03);

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
$sSQL="insert into datacode (dc01, dc02, dc03, ma01, lasttime) values ('".$dc01."', '".$dc02."', '".$dc03."', '".GetManID()."', now());";
$rSQLExec=GetRs($sSQL);

echo '{success:true}';

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

?>
<?php //**************************************************************************** ?>