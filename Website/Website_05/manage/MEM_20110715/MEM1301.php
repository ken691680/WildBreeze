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
$_SESSION["sSQLFile"]="MEM/MEM0101.sql";  //SQL檔路徑

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
$sSQL="select * from contactserver where (1=1) order by lasttime desc;";
$rRs=GetRs($sSQL);

while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
	$data=UnidimensionalArrayAppend($data, Array($row["cs01"], $row["cs02"], $row["cs03"], $row["cs04"], $row["cs05"], $row["cs06"], $row["cs07"], $row["cs08"], $row["cs09"], $row["cs10"], $row["me01"], $row["lasttime"], $row["cs11"], $row["ma01"]));
}
mysql_free_result($rRs);

echo json_encode($data);

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

?>
<?php //**************************************************************************** ?>