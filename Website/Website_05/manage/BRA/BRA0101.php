<?php //*********************************模組檔案引入********************************* ?>
<?php include("../../Module/pMwm.php"); ?>
<?php //**************************************************************************** ?>

<?php //*********************************前置變數定義********************************* ?>
<?php
// ===========================================================================
// 初始化參數宣告
// ===========================================================================
ErrorReporting(E_ERROR | E_WARNING | E_PARSE);     //錯誤回報控制 0關掉 E_ALL全部回報
ChkLogin();                                        //檢查是否登入
$hdnOp=$_POST["hdnOp"];                            //表單固定參數
$_SESSION["sSQLFile"]="BRA/BRA0101.sql";                  //SQL檔路徑

// ===========================================================================
// 接收參數宣告
// ===========================================================================
$PKey=$_GET["PKey"];                      //接收欲編輯的資料

$FixDirectory=GetPathProject()."upload".GetLinking()."brands".GetLinking();       //實體目錄位置
uLog("FixDirectory == [".$FixDirectory."]");
$_SESSION["NowPhysicalPath"]=$FixDirectory;

$br01="";
$br02="";
$br04="";
$br03="";

if ($hdnOp=="Insert" || $hdnOp=="Update" || $hdnOp=="Delete" || $hdnOp=="Select") { //使用者新、修、刪、查資料
	$br01=$_POST["br01"];
	$br02=$_POST["br02"];
	$br04=$_POST["br04"];
	$br03=$_POST["br03"];
} else if ($PKey!="" && $hdnOp!="Reset") { //使用者編輯資料
	$aParme=Array($PKey);
	$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury01", $aParme);
	$rRs=GetRs($sSQL);
	$iRsRows=mysql_num_rows($rRs);
	if ($iRsRows>0) {
		$aRows=mysql_fetch_array($rRs, MYSQL_ASSOC);
		$br01=$aRows["br01"];
		$br02=$aRows["br02"];
		$br04=$aRows["br04"];
		$br03=$aRows["br03"];
	}
}

uLog("br01 == [".$br01."]");
uLog("br02 == [".$br02."]");
uLog("br04 == [".$br04."]");
uLog("br03 == [".$br03."]");

// ===========================================================================
// 表單參數宣告
// ===========================================================================
if ($hdnOp=="Insert" || $hdnOp=="Update" || $hdnOp=="Delete" || $hdnOp=="Select") { //使用者新、修、刪、查資料
	$aFormField01=Array("br01", "");

	$aFormField02=Array("br02", "", "", 20, 200, "", "", "", "", false, "", "");
	$aFormField03=Array("br03", "", "", 50, 200, "", "", "", "", false, "", "");
	$sItemDesc03="U";

	$aFormField04=Array("br04", "", "", 20, 200, "", "", "", "", false, "", "");





} else if ($PKey!="" && $hdnOp!="Reset") { //使用者編輯資料
	$aFormField01=Array("br01", $br01);
	$aFormField02=Array("br02", $br02, "", 20, 200, "", "", "", "", false, "", "");

	$aFormField03=Array("br03", "", "", 50, 200, "", "", "", "", false, "", "");
	if ($br03!="") {
		$sItemDesc03="<a href='../upload/brands/".$br03."' target='_blank' class=\"detail_link\">".$br03."</a><br>U";
	} else {
		$sItemDesc03="U";
	}

	$aFormField04=Array("br04", $br04, "", 20, 200, "", "", "", "", false, "", "");

} else {
	$aFormField01=Array("br01", "");

	$aFormField02=Array("br02", "", "", 20, 200, "", "", "", "", false, "", "");
	$aFormField03=Array("br03", "", "", 50, 200, "", "", "", "", false, "", "");
	$sItemDesc03="U";

	$aFormField04=Array("br04", "", "", 20, 200, "", "", "", "", false, "", "");
}

$sTitleBarF     ="";
$aTitleF        =Array("品牌編號", "品牌名稱", "品牌圖片", "品牌網址");
$aWidthF        =Array("12%", "78%", "10%");
$aItemCodeF     =Array("H", "I", $sItemDesc03, "I");
$aItemParameterF=Array($aFormField01, $aFormField02, $aFormField03, $aFormField04);
$aDescriptionF  =Array("必填", "必填", "必填", "必填");

if ($hdnOp=="Insert" || $hdnOp=="Update" || $hdnOp=="Delete" || $hdnOp=="Select") { //使用者新、修、刪、查資料
	$bA=Array("DoSubmit('Insert')", "", "送出", "control_button");
	$bI=Array("DoSubmit('Select')", "", "查詢", "control_button");
	$bR=Array("DoSubmit('Reset')", "", "重填", "control_button");
	$aButtonF       =Array($bA, $bI, $bR);
} else if ($PKey!="" && $hdnOp!="Reset") { //使用者編輯資料
	$bU=Array("DoSubmit('Update')", "", "更新", "control_button");
	$bD=Array("DoSubmit('Delete')", "", "刪除", "control_button");
	$bR=Array("DoSubmit('Reset')", "", "重填", "control_button");
	$aButtonF       =Array($bU, $bD, $bR);
} else {
	$bA=Array("DoSubmit('Insert')", "", "送出", "control_button");
	$bI=Array("DoSubmit('Select')", "", "查詢", "control_button");
	$bR=Array("DoSubmit('Reset')", "", "重填", "control_button");
	$aButtonF       =Array($bA, $bI, $bR);
}

$aVisableF      =Array(false, true, true, true);

// ===========================================================================
// 資料列表參數宣告
// ===========================================================================
$sFileNameD         =$_SESSION["sSQLFile"];
$sFlagNameD         ="qury03";
$aParmeD            =Array($br02);
$sOrderFieldNameD   =$_GET["OFN"];
$sOrderSequenceD    =$_GET["SOS"];
$sDefOrderFieldNameD="br01";
$bChangeSQLD        ="";
$iPageNumD          =$_GET["IPN"];
$iNowPageD          =$_GET["INP"];

$aTitleD            =Array("品牌編號", "品牌名稱", "品牌網址", "操作");
$aWidthD            =Array("25%", "25%", "25%", "25%"); //當開啟Detail只能使用95%，如無開啟可使用100%
$aAlignD            =Array("center", "center", "center", "center");

$aFieldD            =Array("br01", "br02", "br04", "");

$aCalCodeD          =Array("", "", "", "Edit");
$aCalFieldD         =Array(Array(), Array(), Array(), Array("br01"));

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
	
	//圖片上傳-新增
	$sRndName=GetDateTimeCE().GetMicroTime();
	$sUserfileName=iconv("UTF-8", "big5", $_FILES['br03']['name']);
	uLog("sUserfileName == [".$sUserfileName."]");
	$sbr03="";

	if (Trim($sUserfileName)!="") {
		if (FileExist($_SESSION["NowPhysicalPath"].$sRndName.$sUserfileName)){ //假如檔案重覆，則更新失敗
			$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
		} else { //假如檔名不重覆，上傳新檔
			//if (move_uploaded_file($_FILES['br03']['tmp_name'], $_SESSION["NowPhysicalPath"].LCase($sUserfileName))) {
			if (move_uploaded_file($_FILES['br03']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
				$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
				$sbr03=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
			} else {
				$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
			}
		}
	}

	$aParme=Array(GetDateTimeCE().GetMicroTime(), $br02, $sbr03, $br04);
	SQLExec($_SESSION["sSQLFile"], "exec01", $aParme);
	$sMsg=$sMsg."資料已新增成功！";

	break;
case 'Update':
	uLog("switch Update");
	
	//圖片上傳-更新
	$sRndName=GetDateTimeCE().GetMicroTime();
	$sUserfileName=iconv("UTF-8", "big5", $_FILES['br03']['name']);
	uLog("sUserfileName == [".$sUserfileName."]");
	$sbr03="";

	if (Trim($sUserfileName)!="") {
		if (FileExist($_SESSION["NowPhysicalPath"].$sRndName.$sUserfileName)){ //假如檔案重覆，則更新失敗
			$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
		} else { //假如檔名不重覆，上傳新檔
			//if (move_uploaded_file($_FILES['br03']['tmp_name'], $_SESSION["NowPhysicalPath"].LCase($sUserfileName))) {
			if (move_uploaded_file($_FILES['br03']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
				$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
				$sbr03=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));

				$aParme=Array($sbr03, $br01);
				SQLExec($_SESSION["sSQLFile"], "exec05", $aParme);
			} else {
				$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
			}
		}
	}

	$aParme=Array($br02, $br04, $br01);
	SQLExec($_SESSION["sSQLFile"], "exec02", $aParme);
	$sMsg=$sMsg."資料已更新成功！";
	break;
case 'Delete':
	uLog("switch Delete");
	$aParme=Array($br01);
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
HtmlManAPNameII("BRA0101 - 經銷品牌 -＞ 經銷品牌管理");
HtmlManContentTopII();

RwForm("", "multipart/form-data", "frmUser", "", True);
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