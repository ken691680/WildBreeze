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
$_SESSION["sSQLFile"]="PRO/PRO0401.sql";  //SQL檔路徑

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

$aTitleD            =Array("商品類別", "商品名稱", "原價", "優惠價", "上架時間", "下架時間", "庫存量", "補貨底數", "操作");
$aWidthD            =Array("11%", "11%", "11%", "11%", "11%", "11%", "11%", "11%", "11%"); //當開啟Detail只能使用95%，如無開啟可使用100%
$aAlignD            =Array("center", "center", "center", "center", "center", "center", "center", "center", "center");

$aFieldD            =Array("", "pi02", "pi03", "pi04", "pi08", "pi09", "pi27", "pi26", "");

$aCalCodeD          =Array("ProductClass", "", "", "", "", "", "", "", "Edit_PRO0401");
$aCalFieldD         =Array(Array("pr01", "pr02", "pr03", "pr04"), Array(), Array(), Array(), Array(), Array(), Array(), Array(), Array("pi01"));

if ($_GET["INP"]==""){
	$bChangeSQLD        =true;
} else {
	$bChangeSQLD        ="";
}

$bOpenDetailD=false;
$sDetailTitleD="";
$aDetailTitleListD=Array();
$aDetailFieldListD=Array();

?>
<?php //**************************************************************************** ?>

<?php //*********************************程式邏輯演算********************************* ?>
<?php
HtmlManTopII();
HtmlManAPNameII("PRO0401 - 商品管理 -＞ <A HREF=\"PRO0401.php\">商品資料維護</A>");
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