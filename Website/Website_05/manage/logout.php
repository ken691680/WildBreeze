<?php //*********************************模組檔案引入********************************* ?>
<?php include("../Module/pMwm.php"); ?>
<?php //**************************************************************************** ?>

<?php //*********************************前置變數定義********************************* ?>
<?php
// ===========================================================================
// 初始化參數宣告
// ===========================================================================
ErrorReporting(E_ERROR | E_WARNING | E_PARSE);   //錯誤回報控制 0關掉 E_ALL全部回報
$_SESSION["sSQLFile"]="Login.sql";        //SQL檔路徑

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
$_SESSION["ManID"]="";
$_SESSION["ManPwd"]="";
$sUrl="http://".GetServerHostName()."/".GetPathProjectV()."manage/index.php";
//header("location:".$sUrl);
AutoSubmit();
?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php
function AutoSubmit() {
	?>
	<HTML>
	<HEAD>
	<TITLE> New Document </TITLE>
	</HEAD>
	<BODY onload="frmUser.submit();">
	<FORM METHOD="POST" ACTION="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/index.php" Name="frmUser" target="_top">
	</FORM>
	</BODY>
	</HTML>
	<?php
}
?>
<?php //**************************************************************************** ?>