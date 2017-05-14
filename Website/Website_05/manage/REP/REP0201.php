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
$_SESSION["sSQLFile"]="REP/REP0201.sql";  //SQL檔路徑

// ===========================================================================
// 接收參數宣告
// ===========================================================================
$PKey=$_GET["PKey"];                      //接收欲編輯的資料

$ShowType="";
$YearStart_01="";
$MonthStart_01="";
$YearEnd_01="";
$MonthEnd_01="";
$YearStart_02="";
$SeasonStart_02="";
$YearEnd_02="";
$SeasonEnd_02="";
$YearStart_03="";
$YearEnd_03="";

if ($hdnOp=="Insert" || $hdnOp=="Update" || $hdnOp=="Delete" || $hdnOp=="Select") { //使用者新、修、刪、查資料
	$ShowType=$_POST["ShowType"];
	$YearStart_01=$_POST["YearStart_01"];
	$MonthStart_01=$_POST["MonthStart_01"];
	$YearEnd_01=$_POST["YearEnd_01"];
	$MonthEnd_01=$_POST["MonthEnd_01"];
	$YearStart_02=$_POST["YearStart_02"];
	$SeasonStart_02=$_POST["SeasonStart_02"];
	$YearEnd_02=$_POST["YearEnd_02"];
	$SeasonEnd_02=$_POST["SeasonEnd_02"];
	$YearStart_03=$_POST["YearStart_03"];
	$YearEnd_03=$_POST["YearEnd_03"];
} else if ($PKey!="" && $hdnOp!="Reset") { //使用者編輯資料
}

uLog("ShowType       == [".$ShowType      ."]");
uLog("YearStart_01   == [".$YearStart_01  ."]");
uLog("MonthStart_01  == [".$MonthStart_01 ."]");
uLog("YearEnd_01     == [".$YearEnd_01    ."]");
uLog("MonthEnd_01    == [".$MonthEnd_01   ."]");
uLog("YearStart_02   == [".$YearStart_02  ."]");
uLog("SeasonStart_02 == [".$SeasonStart_02."]");
uLog("YearEnd_02     == [".$YearEnd_02    ."]");
uLog("SeasonEnd_02   == [".$SeasonEnd_02  ."]");
uLog("YearStart_03   == [".$YearStart_03  ."]");
uLog("YearEnd_03     == [".$YearEnd_03    ."]");

// ===========================================================================
// 表單參數宣告
// ===========================================================================
$aFormField01_01=Array("ShowType", "", 0, Array("mon"), Array("月"), "", "", false);
$aFormField01_02=Array("YearStart_01", "", GetYearArray(), GetYearArray(), "", "", "", "", "", false);
$aFormField01_03=Array("MonthStart_01", "", GetMonthArray(), GetMonthArray(), "", "", "", "", "", false);
$aFormField01_04=Array("YearEnd_01", "", GetYearArray(), GetYearArray(), "", "", "", "", "", false);
$aFormField01_05=Array("MonthEnd_01", "", GetMonthArray(), GetMonthArray(), "", "", "", "", "", false);
$aFormField01=Array($aFormField01_01, $aFormField01_02, $aFormField01_03, $aFormField01_04, $aFormField01_05);

$aFormField02_01=Array("ShowType", "", 0, Array("sea"), Array("季"), "", "", false);
$aFormField02_02=Array("YearStart_02", "", GetYearArray(), GetYearArray(), "", "", "", "", "", false);
$aFormField02_03=Array("SeasonStart_02", "", GetSeasonArray(), GetSeasonArray(), "", "", "", "", "", false);
$aFormField02_04=Array("YearEnd_02", "", GetYearArray(), GetYearArray(), "", "", "", "", "", false);
$aFormField02_05=Array("SeasonEnd_02", "", GetSeasonArray(), GetSeasonArray(), "", "", "", "", "", false);
$aFormField02=Array($aFormField02_01, $aFormField02_02, $aFormField02_03, $aFormField02_04, $aFormField02_05);

$aFormField03_01=Array("ShowType", "", 0, Array("yea"), Array("年"), "", "", false);
$aFormField03_02=Array("YearStart_03", "", GetYearArray(), GetYearArray(), "", "", "", "", "", false);
$aFormField03_03=Array("YearEnd_03", "", GetYearArray(), GetYearArray(), "", "", "", "", "", false);
$aFormField03=Array($aFormField03_01, $aFormField03_02, $aFormField03_03);

$sTitleBarF     ="首頁最新消息";
$aTitleF        =Array("月查詢", "季查詢", "年查詢");
$aWidthF        =Array("20%", "60%", "20%");

$aItemCodeF     =Array("RL &nbsp; L ～ L &nbsp; L", "RL &nbsp; L ～ L &nbsp; L", "RL ～ L");
$aItemParameterF=Array($aFormField01, $aFormField02, $aFormField03);
$aDescriptionF  =Array("", "", "");

$bI=Array("DoSubmit('Select')", "", "查詢", "");
$aButtonF       =Array($bI);

$aVisableF      =Array(true, true, true);

// ===========================================================================
// 資料列表參數宣告
// ===========================================================================

?>
<?php //**************************************************************************** ?>

<?php //*********************************程式邏輯演算********************************* ?>
<?php
uLog("hdnOp 1 ============================================ " . $hdnOp);
$sMsg="";
switch ($hdnOp) {
Case 'Select':
	uLog("switch Select");

	//父宣告
	$_SESSION["TitleTdName_REP0201"]=Array();
	$_SESSION["SQL_REP0201"]="";
	$_SESSION["Field_REP0201"]=Array();

	if (Trim($ShowType)=="mon") {
		//######################## 算出數字差 ########################
		$iDiff=DateDiff("m", $YearStart_01."-".$MonthStart_01."-01", $YearEnd_01."-".$MonthEnd_01."-01")+2;
		uLog("mon iDiff == [".$iDiff."]");
		//開始迴圈
		for ($x=0; $x<$iDiff; $x++) {
			//上方Title
			$_SESSION["TitleTdName_REP0201"]=UnidimensionalArrayAppend($_SESSION["TitleTdName_REP0201"], Replace(Left(DateAdd("m", $x, $YearStart_01."/".$MonthStart_01."/01"), 7), "/", "-"));
			//SQL Script
			$_SESSION["SQL_REP0201"]=$_SESSION["SQL_REP0201"]."(select count(*) from newsview where newsview.ne01=news.ne01 and left(lasttime, 7)='".Replace(Left(DateAdd("m", $x, $YearStart_01."/".$MonthStart_01."/01"), 7), "/", "-")."' group by left(lasttime, 7)) as '".Replace(Left(DateAdd("m", $x, $YearStart_01."/".$MonthStart_01."/01"), 7), "/", "-")."', ";
			//Field
			$_SESSION["Field_REP0201"]=UnidimensionalArrayAppend($_SESSION["Field_REP0201"], Replace(Left(DateAdd("m", $x, $YearStart_01."/".$MonthStart_01."/01"), 7), "/", "-"));
		}
		$_SESSION["SQL_REP0201"]="select ".$_SESSION["SQL_REP0201"]." ne02 as LeftTitleName from news where (1=1)";
	} else if (Trim($ShowType)=="sea") {
		//######################## 算出數字差 ########################
		$sSeasonMonthStartNow=0;
		$sSeasonMonthStart="";
		if ($SeasonStart_02=="第一季") {
			$sSeasonMonthStart="01";
			$sSeasonMonthStartNow=1;
		} else if ($SeasonStart_02=="第二季") {
			$sSeasonMonthStart="04";
			$sSeasonMonthStartNow=2;
		} else if ($SeasonStart_02=="第三季") {
			$sSeasonMonthStart="07";
			$sSeasonMonthStartNow=3;
		} else if ($SeasonStart_02=="第四季") {
			$sSeasonMonthStart="10";
			$sSeasonMonthStartNow=4;
		}
		$sSeasonMonthEnd="";
		if ($SeasonEnd_02=="第一季") {
			$sSeasonMonthEnd="03";
		} else if ($SeasonEnd_02=="第二季") {
			$sSeasonMonthEnd="06";
		} else if ($SeasonEnd_02=="第三季") {
			$sSeasonMonthEnd="09";
		} else if ($SeasonEnd_02=="第四季") {
			$sSeasonMonthEnd="12";
		}
		$iDiff=(DateDiff("m", $YearStart_02."-".$sSeasonMonthStart."-01", $YearEnd_02."-".$sSeasonMonthEnd."-01")+2)/3;
		uLog("sea iDiff == [".$iDiff."]");
		//開始迴圈
		$sLoopYear=$YearStart_02;
		for ($x=0; $x<$iDiff; $x++) {
			//上方Title
			if ($sSeasonMonthStartNow==1) {
				$_SESSION["TitleTdName_REP0201"]=UnidimensionalArrayAppend($_SESSION["TitleTdName_REP0201"], $sLoopYear."-第一季");
				$sSeasonMonthStartNow=2;
				//SQL Script
				$_SESSION["SQL_REP0201"]=$_SESSION["SQL_REP0201"]."(select count(*) from newsview where newsview.ne01=news.ne01 and left(lasttime, 4) in ('".$sLoopYear."-01', '".$sLoopYear."-02', '".$sLoopYear."-03')) as '".$sLoopYear."01', ";
				//Field
				$_SESSION["Field_REP0201"]=UnidimensionalArrayAppend($_SESSION["Field_REP0201"], $sLoopYear."01");
			} else if ($sSeasonMonthStartNow==2) {
				$_SESSION["TitleTdName_REP0201"]=UnidimensionalArrayAppend($_SESSION["TitleTdName_REP0201"], $sLoopYear."-第二季");
				$sSeasonMonthStartNow=3;
				//SQL Script
				$_SESSION["SQL_REP0201"]=$_SESSION["SQL_REP0201"]."(select count(*) from newsview where newsview.ne01=news.ne01 and left(lasttime, 4) in ('".$sLoopYear."-04', '".$sLoopYear."-05', '".$sLoopYear."-06')) as '".$sLoopYear."02', ";
				//Field
				$_SESSION["Field_REP0201"]=UnidimensionalArrayAppend($_SESSION["Field_REP0201"], $sLoopYear."02");
			} else if ($sSeasonMonthStartNow==3) {
				$_SESSION["TitleTdName_REP0201"]=UnidimensionalArrayAppend($_SESSION["TitleTdName_REP0201"], $sLoopYear."-第三季");
				$sSeasonMonthStartNow=4;
				//SQL Script
				$_SESSION["SQL_REP0201"]=$_SESSION["SQL_REP0201"]."(select count(*) from newsview where newsview.ne01=news.ne01 and left(lasttime, 4) in ('".$sLoopYear."-07', '".$sLoopYear."-08', '".$sLoopYear."-09')) as '".$sLoopYear."03', ";
				//Field
				$_SESSION["Field_REP0201"]=UnidimensionalArrayAppend($_SESSION["Field_REP0201"], $sLoopYear."03");
			} else if ($sSeasonMonthStartNow==4) {
				$_SESSION["TitleTdName_REP0201"]=UnidimensionalArrayAppend($_SESSION["TitleTdName_REP0201"], $sLoopYear."-第四季");
				$sSeasonMonthStartNow=1;
				//SQL Script
				$_SESSION["SQL_REP0201"]=$_SESSION["SQL_REP0201"]."(select count(*) from newsview where newsview.ne01=news.ne01 and left(lasttime, 4) in ('".$sLoopYear."-10', '".$sLoopYear."-11', '".$sLoopYear."-12')) as '".$sLoopYear."04', ";
				//Field
				$_SESSION["Field_REP0201"]=UnidimensionalArrayAppend($_SESSION["Field_REP0201"], $sLoopYear."04");
				$sLoopYear=SafeInt($sLoopYear)+1;
			}


		}
		$_SESSION["SQL_REP0201"]="select ".$_SESSION["SQL_REP0201"]." ne02 as LeftTitleName from news where (1=1)";
	} else if (Trim($ShowType)=="yea") {
		//######################## 算出數字差 ########################
		$iDiff=DateDiff("yyyy", $YearStart_03."-01-01", $YearEnd_03."-01-01")+1;
		uLog("yea iDiff == [".$iDiff."]");
		//開始迴圈
		for ($x=0; $x<$iDiff; $x++) {
			//上方Title
			$_SESSION["TitleTdName_REP0201"]=UnidimensionalArrayAppend($_SESSION["TitleTdName_REP0201"], Replace(Left(DateAdd("yyyy", $x, $YearStart_03."/01/01"), 4), "/", "-"));
			//SQL Script
			$_SESSION["SQL_REP0201"]=$_SESSION["SQL_REP0201"]."(select count(*) from newsview where newsview.ne01=news.ne01 and left(lasttime, 4)='".Replace(Left(DateAdd("yyyy", $x, $YearStart_03."/01/01"), 4), "/", "-")."' group by left(lasttime, 4)) as '".Replace(Left(DateAdd("yyyy", $x, $YearStart_03."/01/01"), 4), "/", "-")."', ";
			//Field
			$_SESSION["Field_REP0201"]=UnidimensionalArrayAppend($_SESSION["Field_REP0201"], Replace(Left(DateAdd("yyyy", $x, $YearStart_03."/01/01"), 4), "/", "-"));
		}
		$_SESSION["SQL_REP0201"]="select ".$_SESSION["SQL_REP0201"]." ne02 as LeftTitleName from news where (1=1)";
	}

	uLog($_SESSION["TitleTdName_REP0201"]);

	break;
default:
	uLog("switch default");
	break;
}

HtmlManTopII();
//HtmlManMenuII();
HtmlManAPNameII("REP0201 - 統計分析 -＞ 首頁最新消息");
HtmlManContentTopII();

RwForm("", "", "frmUser", "", True);
FormList($sTitleBarF, $aTitleF, $aWidthF, $aItemCodeF, $aItemParameterF, $aDescriptionF, $aButtonF, $aVisableF);
ReportDatalist($_SESSION["SQL_REP0201"], $_SESSION["TitleTdName_REP0201"], $_SESSION["Field_REP0201"]);
RwForm("", "", "", "", False);

HtmlManContentDownII();
JScript($sMsg);
HtmlManDownII();
?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php
function ReportDatalist($sSQLReportDatalist, $aTitleName, $aFieldName) {
	?>
	<table width="100%"  border="0" cellspacing=0 cellpadding=5 class='adminlist' style="table-layout:fixed;word-wrap: break-word;">
	<tr class='list_title'>
		<th align="center">&nbsp;</th>
		<?php
		$iTitleNameLen=GetUnidimensionalArrayLength($aTitleName);
		for ($i=0; $i<$iTitleNameLen; $i++) {
			?><th align="center"><?php echo $aTitleName[$i];?></th><?php
		}
		?>
	</tr>
	<?php
	if (Trim($sSQLReportDatalist)!="") {
		$rRs=GetRs($sSQLReportDatalist);

		while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
			?>
			<tr align="center" class='list_content'>
			<td align="center"><?php echo $row["LeftTitleName"];?></td>
			<?php
			$iFieldNameLen=GetUnidimensionalArrayLength($aFieldName);
			for ($i=0; $i<$iFieldNameLen; $i++) {
				?><td align="center"><?php echo SafeInt($row[$aTitleName[$i]]);?></td><?php
			}
			?>
			</tr>
			<?php
		}

		mysql_free_result($rRs);
	}
	?>
	</table>
	<?php
}

function GetYearArray() {
	$aResult=Array();
	$sYear=Left(GetDateCE(), 4);
	for ($i=2006; $i<=$sYear; $i++) {
		$aResult=UnidimensionalArrayAppend($aResult, $i);
	}
	return $aResult;
}

function GetMonthArray() {
	$aResult=Array();
	for ($i=1; $i<=12; $i++) {
		$aResult=UnidimensionalArrayAppend($aResult, LPad($i,"0", 2));
	}
	return $aResult;
}

function GetSeasonArray() {
	$aResult=Array();
	$aResult=UnidimensionalArrayAppend($aResult, "第一季");
	$aResult=UnidimensionalArrayAppend($aResult, "第二季");
	$aResult=UnidimensionalArrayAppend($aResult, "第三季");
	$aResult=UnidimensionalArrayAppend($aResult, "第四季");
	return $aResult;
}

function JScript($sErr) {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	function DoSubmit(sOpCode) {
		//  輸入檢核開始
		//  ....

		sStatus = true;
		if(sOpCode=="Select") {
			document.frmUser.hdnOp.value = "Select";
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