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
$_SESSION["sSQLFile"]="PAY/PAY0101.sql";  //SQL檔路徑

// ===========================================================================
// 接收參數宣告
// ===========================================================================
$PKey=$_GET["PKey"];                      //接收欲編輯的資料

// ===========================================================================
// 表單參數宣告
// ===========================================================================

// ===========================================================================
// 資料列表參數宣告
// ===========================================================================
$sFileNameD         =$_SESSION["sSQLFile"];
$sFlagNameD         ="qury01";
$aParmeD            =Array();
$sOrderFieldNameD   =$_GET["OFN"];
$sOrderSequenceD    =$_GET["SOS"];
$sDefOrderFieldNameD="lasttime";
$bChangeSQLD        ="";
$iPageNumD          =$_GET["IPN"];
$iNowPageD          =$_GET["INP"];

$aTitleD            =Array("訂單編號", "訂單狀態", "訂購時間", "付款方式", "付款狀態", "訂單總金額", "退貨狀態", "會員帳號", "操作");
$aWidthD            =Array("11%", "11%", "11%", "10%", "10%", "10%", "10%", "11%", "10%"); //當開啟Detail只能使用95%，如無開啟可使用100%
$aAlignD            =Array("center", "center", "center", "center", "center", "center", "center", "center", "center");

$aFieldD            =Array("", "oh02", "oh03", "oh04", "oh05", "oh06", "oh26", "me01", "");

$aCalCodeD          =Array("OrderView", "", "", "", "", "", "", "", "Edit_PAY0101");
$aCalFieldD         =Array(Array("oh01"), Array(), Array(), Array(), Array(), Array(), Array(), Array(), Array("oh01"));

if ($_GET["INP"]==""){
	$bChangeSQLD        =true;
} else {
	$bChangeSQLD        ="";
}

$bOpenDetailD=true;
$sDetailTitleD="訂單總資料項";
$aDetailTitleListD=Array("訂單單頭編號", "處理進度狀態", "訂購時間", "付款方式", "付款狀態", "訂單總金額", "中文全名", "性別", "手機號碼", "縣市", "鄉鎮市區", "郵遞區號", "地址", "會員暱稱", "電子郵件", "密碼", "統一編號", "發票抬頭", "中文全名", "性別", "手機號碼", "送貨地址-縣市", "送貨地址-鄉鎮市區", "送貨地址-郵遞區號", "送貨地址-地址", "退貨狀態", "退貨原因", "會員帳號", "最後更新時間");
$aDetailFieldListD=Array("oh01", "oh02", "oh03", "oh04", "oh05", "oh06", "oh07", "oh08", "oh09", "oh10", "oh11", "oh12", "oh13", "oh14", "oh15", "oh16", "oh17", "oh18", "oh19", "oh20", "oh21", "oh22", "oh23", "oh24", "oh25", "oh26", "oh27", "me01", "lasttime");

?>
<?php //**************************************************************************** ?>

<?php //*********************************程式邏輯演算********************************* ?>
<?php
HtmlManTopII();
HtmlManAPNameII("PAY0101 - 結帳系統 -＞ <A HREF=\"PAY0101.php\">訂單管理</A>");
HtmlManContentTopII();

RwForm("", "", "frmUser", "", True);
DataList($sFileNameD, $sFlagNameD, $aParmeD, $sOrderFieldNameD, $sOrderSequenceD, $sDefOrderFieldNameD, $bChangeSQLD, $iPageNumD, $iNowPageD, $aTitleD, $aWidthD, $aAlignD, $aFieldD, $aCalCodeD, $aCalFieldD, $bOpenDetailD, $sDetailTitleD, $aDetailTitleListD, $aDetailFieldListD);
RwForm("", "", "", "", False);

HtmlManContentDownII();
JScript($sMsg);
HtmlManDownII();
?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php
function JScript($sErr) {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	function DoSubmit(sOpCode) {
		//  輸入檢核開始
		//  ....

		sStatus = true;
		if(sOpCode=="Insert") {
			document.frmUser.hdnOp.value = "Insert";
		}
		if(sOpCode=="Update") {
			document.frmUser.hdnOp.value = "Update";
		}
		if(sOpCode=="Delete") {
			document.frmUser.hdnOp.value = "Delete";
		}
		if(sOpCode=="Select") {
			document.frmUser.hdnOp.value = "Select";
		}
		if(sOpCode=="Reset") {
			document.frmUser.reset();
		}

		document.frmUser.hdnOp.value=sOpCode;
		if (sStatus==true) {
			document.frmUser.submit();
		}
		return true;
	}

	AlertErr("<?php echo $sErr?>");
	function AlertErr(sMsg) {
		if (sMsg!="") {
			alert(sMsg);
		}
	}
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //**************************************************************************** ?>