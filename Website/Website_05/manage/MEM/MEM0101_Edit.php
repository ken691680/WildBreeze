<?php //*********************************模組檔案引入********************************* ?>
<?php include("../../Module/pMwm.php"); ?>
<?php include("../../LibSimpleHtmlDom/simple_html_dom.php"); ?>
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
$PKey=$_GET["PKey"];                      //接收欲編輯的資料

if (Trim($PKey)!="") {
	$_SESSION["MEM0101_PKey"]=$PKey;
}

$me01="";
$me02="";
$me03="";
$me04="";
$me05="";
$me06="";
$me07="";
$me08="";
$me09="";
$me10="";

$sMsg="";

if ($hdnOp=="Insert" || $hdnOp=="Update" || $hdnOp=="Delete" || $hdnOp=="Select") { //使用者新、修、刪、查資料
	$me01=$_POST["me01"];
	$me02=$_POST["me02"];
	$me03=$_POST["me03"];
	$me04=$_POST["me04"];
	$me05=$_POST["me05"];
	$me06=$_POST["me06"];
	$me07=$_POST["me07"];
	$me08=$_POST["me08"];
	$me09=$_POST["me09"];
	$me10=$_POST["me10"];

	switch ($hdnOp) {
	case 'Update':
		uLog("switch Update");

		$aParme=Array($me02, $me03, $me04, $me05, $me06, $me07, $me08, $me09, $me10, $me01);
		SQLExec($_SESSION["sSQLFile"], "exec02", $aParme);

		$sMsg="資料已更新成功！";
		break;
	case 'Delete':
		uLog("switch Delete");

		$aParme=Array($me01);
		SQLExec($_SESSION["sSQLFile"], "exec03", $aParme);
		$sMsg="資料已刪除成功！";

		break;
	default:
		uLog("switch default");
		break;
	}
} else if ($PKey!="" && $hdnOp!="Reset") { //使用者編輯資料
}

$aParme=Array($_SESSION["MEM0101_PKey"]);
$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury03", $aParme);
$rRs=GetRs($sSQL);
$iRsRows=mysql_num_rows($rRs);
if ($iRsRows>0) {
	$aRows=mysql_fetch_array($rRs, MYSQL_ASSOC);
	$me01=$aRows["me01"];
	$me02=$aRows["me02"];
	$me03=$aRows["me03"];
	$me04=$aRows["me04"];
	$me05=$aRows["me05"];
	$me06=$aRows["me06"];
	$me07=$aRows["me07"];
	$me08=$aRows["me08"];
	$me09=$aRows["me09"];
	$me10=$aRows["me10"];

}

uLog("me01 == [".$me01."]");
uLog("me02 == [".$me02."]");
uLog("me03 == [".$me03."]");
uLog("me04 == [".$me04."]");
uLog("me05 == [".$me05."]");
uLog("me06 == [".$me06."]");
uLog("me07 == [".$me07."]");
uLog("me08 == [".$me08."]");
uLog("me09 == [".$me09."]");
uLog("me10 == [".$me10."]");

// ===========================================================================
// 表單參數宣告
// ===========================================================================
$aFormField01=Array("me01", $me01, "", 60, 200, "", "", "", "", true, "", "");
$aFormField02=Array("me02", $me02, "", 60, 200, "", "", "", "", false, "", "");
$aFormField03=Array("me03", $me03, "", 60, 200, "", "", "", "", false, "", "");
$aFormField04=Array("me04", "", 0, Array("先生", "小姐"), Array("先生", "小姐"), $me04, "", false);
$aFormField05=Array("me05", $me05, "", 60, 200, "", "", "", "", false, "", "");

$aGetCity=GetCity();
$aGetCityII=GetCityII($me06);
uLog($aGetCityII);

$aFormField06_01=Array("me06", "", $aGetCity[0], $aGetCity[1], $me06, "", "", "aJax_ShowLevel(this, 'me07', '2');", "", false);
$aFormField06_02=Array("me07", "", $aGetCityII[0], $aGetCityII[1], $me07, "", "", "aJax_ShowLevelII(this, 'me08', '3');", "", false);
$aFormField06_03=Array("me08", $me08, "", 60, 200, "", "", "", "", false, "", "");
$aFormField06=Array($aFormField06_01, $aFormField06_02, $aFormField06_03);

$aFormField07=Array("me09", $me09, "", 60, 200, "", "", "", "", false, "", "");
$aFormField08=Array("me10", "", 0, Array("是", "否"), Array("是", "否"), $me10, "", false);

$sTitleBarF     ="會員專區管理";
$aTitleF        =Array("電子郵件", "密碼", "中文全名", "性別", "手機號碼", "縣市地區", "地址", "是否願意收到電子報");
$aWidthF        =Array("9%", "90%", "1%");
$aItemCodeF     =Array("I", "P", "I", "R", "I", "LLI", "I", "R");
$aItemParameterF=Array($aFormField01, $aFormField02, $aFormField03, $aFormField04, $aFormField05, $aFormField06, $aFormField07, $aFormField08);
$aDescriptionF  =Array("", "", "", "", "", "", "", "");

$bU=Array("DoSubmit('Update')", "", "更新", "");
$bD=Array("DoSubmit('Delete')", "", "刪除", "");
$aButtonF       =Array($bU, $bD);

$aVisableF      =Array(true, true, true, true, true, true, true, true);

// ===========================================================================
// 資料列表參數宣告
// ===========================================================================

?>
<?php //**************************************************************************** ?>

<?php //*********************************程式邏輯演算********************************* ?>
<?php
HtmlManTopII();
HtmlManAPNameII("MEM0101 - 會員管理 -＞ <A HREF=\"MEM0101.php\">會員資料維護</A>");
HtmlManContentTopII();

RwForm("", "multipart/form-data", "frmUser", "", True);
FormList($sTitleBarF, $aTitleF, $aWidthF, $aItemCodeF, $aItemParameterF, $aDescriptionF, $aButtonF, $aVisableF);
RwForm("", "", "", "", False);

HtmlManContentDownII();
JScript($sMsg);
HtmlManDownII();

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php
function GetCity() {
	$aResult=Array();

	$aValue=Array("");
	$aName=Array("請選擇");
	
	$aParme=Array();
	$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury07", $aParme);
	$rRs=GetRs($sSQL);

	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$aValue=UnidimensionalArrayAppend($aValue, $row["ci01"]);
		$aName=UnidimensionalArrayAppend($aName, $row["ci01"]);
	}
	mysql_free_result($rRs);

	$aResult=UnidimensionalArrayAppend($aResult, $aValue);
	$aResult=UnidimensionalArrayAppend($aResult, $aName);

	return $aResult;
}

function GetCityII($sCi01) {
	$aResult=Array();

	$aValue=Array("");
	$aName=Array("請選擇");
	
	$aParme=Array($sCi01);
	$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury10", $aParme);
	$rRs=GetRs($sSQL);

	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$aValue=UnidimensionalArrayAppend($aValue, $row["ci02"]);
		$aName=UnidimensionalArrayAppend($aName, $row["ci02"]);
		uLog("aValue == [".$row["ci02"]."]");
	}
	mysql_free_result($rRs);

	$aResult=UnidimensionalArrayAppend($aResult, $aValue);
	$aResult=UnidimensionalArrayAppend($aResult, $aName);

	return $aResult;
}

function JScript($sErr) {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	//######################## For aJax Code ########################
	function aJax_ShowLevel(sel, sChangID, sLevel)
	{
		var countryCode = sel.options[sel.selectedIndex].value;
		document.getElementById(sChangID).options.length = 0;	// Empty city select box

		var index = ajax.length;
		ajax[index] = new sack();

		ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/MEM/article_show_level.php?ci01='+escape(countryCode)+'&FrontID='+sChangID+'&Level='+sLevel;	// Specifying which file to get
		ajax[index].onCompletion = function(){ CreateLevel(index, sChangID) };	// Specify function that will be executed after file has been found
		ajax[index].runAJAX();		// Execute AJAX function
	}

	function CreateLevel(index, sChangID)
	{
		var obj = document.getElementById(sChangID);
		eval(ajax[index].response);	// Executing the response from Ajax as Javascript code
	}

	function aJax_ShowLevelII(sel, sChangID, sLevel)
	{
		var countryCode = sel.options[sel.selectedIndex].value;

		var index = ajax.length;
		ajax[index] = new sack();

		ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/MEM/article_show_levelII.php?ci02='+escape(countryCode)+'&FrontID='+sChangID+'&Level='+sLevel;	// Specifying which file to get
		ajax[index].onCompletion = function(){ CreateLevelII(index, sChangID) };	// Specify function that will be executed after file has been found
		ajax[index].runAJAX();		// Execute AJAX function
	}

	function CreateLevelII(index, sChangID)
	{
		eval(ajax[index].response);	// Executing the response from Ajax as Javascript code
	}
	//###############################################################


	function DoSubmit(sOpCode) {
		//  輸入檢核開始
		//  ....

		sStatus = true;
		if(sOpCode=="Update") {
			document.frmUser.hdnOp.value = "Update";
		}
		if(sOpCode=="Delete") {
			//document.frmUser.hdnOp.value = "Delete";
			var answer = confirm("確定刪除嗎？")
			if (answer) {
				document.frmUser.hdnOp.value = "Delete";
			} else {
				return false;
			}
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
			if (sMsg=="資料已刪除成功！")
			{
				location.href="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/MEM/MEM0101.php";
			}
			if (sMsg=="資料已更新成功！")
			{
				location.href="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/MEM/MEM0101_Edit.php?PKey=<?php echo $_SESSION["MEM0101_PKey"];?>";
			}
		}
	}
	//-->
	</SCRIPT>

	<?php
}

?>
<?php //**************************************************************************** ?>