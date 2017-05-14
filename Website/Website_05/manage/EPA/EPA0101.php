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
$_SESSION["sSQLFile"]="EPA/EPA0101.sql";  //SQL檔路徑

// ===========================================================================
// 接收參數宣告
// ===========================================================================
$PKey=$_GET["PKey"];                      //接收欲編輯的資料

$epc01="";
$epc02="";

if ($hdnOp=="Insert" || $hdnOp=="Update" || $hdnOp=="Delete" || $hdnOp=="Select") { //使用者新、修、刪、查資料
	$epc01=$_POST["epc01"];
	$epc02=$_POST["epc02"];
} else if ($PKey!="" && $hdnOp!="Reset") { //使用者編輯資料
	$aParme=Array($PKey);
	$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury01", $aParme);
	$rRs=GetRs($sSQL);
	$iRsRows=mysql_num_rows($rRs);
	if ($iRsRows>0) {
		$aRows=mysql_fetch_array($rRs, MYSQL_ASSOC);
		$epc01=$aRows["epc01"];
		$epc02=$aRows["epc02"];
	}
}

uLog("epc01 == " . $epc01);
uLog("epc02 == " . $epc02);

// ===========================================================================
// 表單參數宣告
// ===========================================================================
if ($hdnOp=="Insert" || $hdnOp=="Update" || $hdnOp=="Delete" || $hdnOp=="Select") { //使用者新、修、刪、查資料
	$aFormField01=Array("epc01", "");
	$aFormField02=Array("epc02", "", "", 20, 200, "", "", "", "", false, "", "");
} else if ($PKey!="" && $hdnOp!="Reset") { //使用者編輯資料
	$aFormField01=Array("epc01", $epc01);
	$aFormField02=Array("epc02", $epc02, "", 20, 200, "", "", "", "", false, "", "");
} else {
	$aFormField01=Array("epc01", "");
	$aFormField02=Array("epc02", "", "", 20, 200, "", "", "", "", false, "", "");
}

$sTitleBarF     ="電子報類型管理";
$aTitleF        =Array("類別編號", "電子報類型");
$aWidthF        =Array("20%", "60%", "20%");
//$aItemCodeF     =Array("H", "I（限１０個中文字）");
$aItemCodeF     =Array("H", "I（限２０個中文字）");
$aItemParameterF=Array($aFormField01, $aFormField02);
$aDescriptionF  =Array("", "可供查詢欄位，重新輸入可再次查詢");

if ($hdnOp=="Insert" || $hdnOp=="Update" || $hdnOp=="Delete" || $hdnOp=="Select") { //使用者新、修、刪、查資料
	$bA=Array("DoSubmit('Insert')", "", "新增", "");
	$bI=Array("DoSubmit('Select')", "", "查詢", "");
	$bR=Array("DoSubmit('Reset')", "", "重填", "");
	$aButtonF       =Array($bA, $bI);
} else if ($PKey!="" && $hdnOp!="Reset") { //使用者編輯資料
	$bU=Array("DoSubmit('Update')", "", "更新", "");
	$bD=Array("DoSubmit('Delete')", "", "刪除", "");
	$bR=Array("DoSubmit('Reset')", "", "重填", "");
	$aButtonF       =Array($bU, $bD);
} else {
	$bA=Array("DoSubmit('Insert')", "", "新增", "");
	$bI=Array("DoSubmit('Select')", "", "查詢", "");
	$bR=Array("DoSubmit('Reset')", "", "重填", "");
	$aButtonF       =Array($bA, $bI);
}

$aVisableF      =Array(false, true);

// ===========================================================================
// 資料列表參數宣告
// ===========================================================================
$sFileNameD         =$_SESSION["sSQLFile"];
$sFlagNameD         ="qury03";
$aParmeD            =Array($epc02);
$sOrderFieldNameD   =$_GET["OFN"];
$sOrderSequenceD    =$_GET["SOS"];
$sDefOrderFieldNameD="lasttime";
$bChangeSQLD        ="";
$iPageNumD          =$_GET["IPN"];
$iNowPageD          =$_GET["INP"];

$aTitleD            =Array("類型", "編輯資料");
$aWidthD            =Array("80%", "20%"); //當開啟Detail只能使用95%，如無開啟可使用100%
$aAlignD            =Array("center", "center");

$aFieldD            =Array("epc02", "");

$aCalCodeD          =Array("", "Edit");
$aCalFieldD         =Array(Array(), Array("epc01"));

$bOpenDetailD=false;
$sDetailTitleD="";
$aDetailTitleListD=Array();
$aDetailFieldListD=Array();

?>
<?php //**************************************************************************** ?>

<?php //*********************************程式邏輯演算********************************* ?>
<?php
uLog("hdnOp 1 ============================================ " . $hdnOp);
$sMsg="";
switch ($hdnOp) {
case 'Insert':
	uLog("switch Insert");

	$epc01=GetDateTimeCE().GetMicroTime();
	//$aParme=Array(GetDateTimeCE().GetMicroTime(), $epc02, GetManID());
	$aParme=Array($epc01, $epc02, GetManID());
	SQLExec($_SESSION["sSQLFile"], "exec01", $aParme);

	$aParme=Array("是");
	$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury04", $aParme);
	$rRs=GetRs($sSQL);

	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$aParme=Array($row["me01"], $epc01, "訂閱");
		SQLExec($_SESSION["sSQLFile"], "exec04", $aParme);
	}
	mysql_free_result($rRs);

	$sMsg="資料已新增成功！";
	break;
case 'Update':
	uLog("switch Update");
	$aParme=Array($epc02, GetManID(), $epc01);
	SQLExec($_SESSION["sSQLFile"], "exec02", $aParme);
	$sMsg="資料已更新成功！";
	break;
case 'Delete':
	uLog("switch Delete");
	$aParme=Array($epc01);
	SQLExec($_SESSION["sSQLFile"], "exec03", $aParme);
	$sMsg="資料已刪除成功！";
	break;
Case 'Select':
	uLog("switch Select");
	$bChangeSQLD=true;
	break;
default:
	uLog("switch default");
	break;
}

HtmlManTopII();
//HtmlManMenuII();
HtmlManAPNameII("EPA0101 - 電子報管理 -＞ 電子報類別管理");
HtmlManContentTopII();

RwForm("", "", "frmUser", "", True);
FormList($sTitleBarF, $aTitleF, $aWidthF, $aItemCodeF, $aItemParameterF, $aDescriptionF, $aButtonF, $aVisableF);
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
			if (fucCheckLength(document.frmUser.epc02.value)>20) {
				alert("標題文字超過20個中文");
				sStatus=false;
				return false;
			}
		}
		if(sOpCode=="Update") {
			document.frmUser.hdnOp.value = "Update";
			if (fucCheckLength(document.frmUser.epc02.value)>20) {
				alert("標題文字超過20個中文");
				sStatus=false;
				return false;
			}
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