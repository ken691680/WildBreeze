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
$pr01=$_POST["pr01"];
$pr02=Replace($_POST["pr02"], "'", "\'");
$pr03=$_POST["pr03"];
$pr04=$_POST["pr04"];
$pr05=$_POST["pr05"];

uLog("pr01 == " . $pr01);
uLog("pr02 == " . $pr02);
uLog("pr03 == " . $pr03);
uLog("pr04 == " . $pr04);
uLog("pr05 == " . $pr05);

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
/*
$aParme=Array($pr01);
SQLExec($_SESSION["sSQLFile"], "exec03", $aParme);
*/

$sSQL="delete from property where (pr01='".$pr01."') and (1=1);";
$rSQLExec=GetRs($sSQL);

echo '{success:true}';

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

?>
<?php //**************************************************************************** ?>