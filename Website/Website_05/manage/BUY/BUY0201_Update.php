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
$sd01=$_POST["sd01"];
$sd02=$_POST["sd02"];
$sd03=$_POST["sd03"];
$sdc01_hh=$_POST["sdc01_hh"];

if( $sdc01_hh != "" ) {
	$sdc01SQL=", sdc01 = '".$sdc01_hh."'";
}

$sSQL="update shoppingdescription set sd02='".$sd02."', sd03='".$sd03."' ".$sdc01SQL." where sd01='".$sd01."'";
uLog($sSQL);
GetRs($sSQL);
echo '{success:true}';

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

?>
<?php //**************************************************************************** ?>