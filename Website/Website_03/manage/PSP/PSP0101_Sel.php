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
$sSQL="select * from picnicspot where (1=1);";
$rRs=GetRs($sSQL);

$ps14="";
$ps15="";
$ps16="";
$ps17="";
$ps18="";
$ps19="";
$ps20="";
$ps21="";
$ps22="";
$ps23="";

while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
	if (Trim($row["ps14"])=="") {
		$ps14="";
	} else {
		$ps14="<img src='../upload/picnicspot/".$row["ps14"]."' width='100' height='100'>";
	}
	if (Trim($row["ps15"])=="") {
		$ps15="";
	} else {
		$ps15="<img src='../upload/picnicspot/".$row["ps15"]."' width='100' height='100'>";
	}
	if (Trim($row["ps16"])=="") {
		$ps16="";
	} else {
		$ps16="<img src='../upload/picnicspot/".$row["ps16"]."' width='100' height='100'>";
	}

	if (Trim($row["ps17"])=="") {
		$ps17="";
	} else {
		$ps17="<img src='../upload/picnicspot/".$row["ps17"]."' width='100' height='100'>";
	}
	if (Trim($row["ps18"])=="") {
		$ps18="";
	} else {
		$ps18="<img src='../upload/picnicspot/".$row["ps18"]."' width='100' height='100'>";
	}
	if (Trim($row["ps19"])=="") {
		$ps19="";
	} else {
		$ps19="<img src='../upload/picnicspot/".$row["ps19"]."' width='100' height='100'>";
	}
	if (Trim($row["ps20"])=="") {
		$ps20="";
	} else {
		$ps20="<img src='../upload/picnicspot/".$row["ps20"]."' width='100' height='100'>";
	}
	if (Trim($row["ps21"])=="") {
		$ps21="";
	} else {
		$ps21="<img src='../upload/picnicspot/".$row["ps21"]."' width='100' height='100'>";
	}
	if (Trim($row["ps22"])=="") {
		$ps22="";
	} else {
		$ps22="<img src='../upload/picnicspot/".$row["ps22"]."' width='100' height='100'>";
	}
	if (Trim($row["ps23"])=="") {
		$ps23="";
	} else {
		$ps23="<img src='../upload/picnicspot/".$row["ps23"]."' width='100' height='100'>";
	}

	$data=UnidimensionalArrayAppend($data, Array($row["ps01"], $row["ps02"], $row["ps03"], $row["ps04"], $row["ps05"], $row["ps06"], $row["ps07"], $row["ps08"], $row["ps09"], $row["ps10"], $row["ps11"], $row["ps12"], $row["ps13"], $ps14, $ps15, $ps16, $ps17, $ps18, $ps19, $ps20, $ps21, $ps22, $ps23, $row["ps24"], $row["ma01"], Left($row["lasttime"], 10)));
}
mysql_free_result($rRs);

echo json_encode($data);

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

?>
<?php //**************************************************************************** ?>