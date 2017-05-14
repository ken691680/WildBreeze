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
$_SESSION["sSQLFile"]="PRO/PRO0401.sql";  //SQL檔路徑

// ===========================================================================
// 接收參數宣告
// ===========================================================================
$PKey=$_GET["PKey"];                      //接收欲編輯的資料

if (Trim($PKey)!="") {
	$_SESSION["PRO0401_PKey"]=$PKey;
}

$FixDirectory=GetPathProject()."upload".GetLinking()."productinfo".GetLinking();       //實體目錄位置
uLog("FixDirectory == [".$FixDirectory."]");
$_SESSION["NowPhysicalPath"]=$FixDirectory;

$pi01="";
$pi02="";
$pi03="";
$pi04="";
$pi05="";
$pi06="";
$pi07="";
$pi08="";
$pi09="";
$pi10="";
$pi11="";
$pi12="";
$pi13="";
$pi14="";
$pi15="";
$pi16="";
$pi17="";
$pi18="";
$pi19="";
$pi20="";
$pi21="";
$pi22="";
$pi23="";
$pi24="";
$pi25="";
$pi26="";
$pi27="";
$pr01="";
$pr01_gr01_01="";
$pr01_gr01_02="";
$pr01_gr01_03="";

$sMsg="";

if ($hdnOp=="Insert" || $hdnOp=="Update" || $hdnOp=="Delete" || $hdnOp=="Select") { //使用者新、修、刪、查資料
	$pi01=$_POST["pi01"];
	$pi02=$_POST["pi02"];
	$pi03=$_POST["pi03"];
	$pi04=$_POST["pi04"];
	$pi05=stripslashes($_POST["pi05"]);
	$pi06=$_POST["pi06"];
	$pi07=$_POST["pi07"];
	$pi08=$_POST["pi08"];
	$pi09=$_POST["pi09"];
	$pi10=$_POST["pi10"];
	$pi11=$_POST["pi11"];
	$pi12=$_POST["pi12"];
	$pi13=$_POST["pi13"];
	$pi14=$_POST["pi14"];
	$pi15=stripslashes($_POST["pi15"]);
	$pi16=$_POST["pi16"];
	$pi17=$_POST["pi17"];
	$pi18=$_POST["pi18"];
	$pi19=$_POST["pi19"];
	$pi20=$_POST["pi20"];
	$pi21=$_POST["pi21"];
	$pi22=$_POST["pi22"];
	$pi23=$_POST["pi23"];
	$pi24=$_POST["pi24"];
	$pi25=$_POST["pi25"];
	$pi26=$_POST["pi26"];
	$pi27=$_POST["pi27"];
	$pr01=$_POST["pr01"];
	$pr01_gr01_01=$_POST["pr01_gr01_01"];
	$pr01_gr01_02=$_POST["pr01_gr01_02"];
	$pr01_gr01_03=$_POST["pr01_gr01_03"];

	switch ($hdnOp) {
	case 'Update':
		uLog("switch Update");

		//圖片上傳-更新
		$sRndName=GetDateTimeCE().GetMicroTime();
		$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi16']['name']);
		uLog("sUserfileName == [".$sUserfileName."]");
		$spi16="";

		if (Trim($sUserfileName)!="") {
			if (FileExist($_SESSION["NowPhysicalPath"].$sRndName.$sUserfileName)){ //假如檔案重覆，則更新失敗
				$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
			} else { //假如檔名不重覆，上傳新檔
				//if (move_uploaded_file($_FILES['pi16']['tmp_name'], $_SESSION["NowPhysicalPath"].LCase($sUserfileName))) {
				if (move_uploaded_file($_FILES['pi16']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
					$spi16=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));

					$aParme=Array($spi16, $pi01);
					SQLExec($_SESSION["sSQLFile"], "exec04", $aParme);
				} else {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
				}
			}
		}

		//圖片上傳-更新
		$sRndName=GetDateTimeCE().GetMicroTime();
		$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi17']['name']);
		uLog("sUserfileName == [".$sUserfileName."]");
		$spi17="";

		if (Trim($sUserfileName)!="") {
			if (FileExist($_SESSION["NowPhysicalPath"].$sRndName.$sUserfileName)){ //假如檔案重覆，則更新失敗
				$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
			} else { //假如檔名不重覆，上傳新檔
				//if (move_uploaded_file($_FILES['pi17']['tmp_name'], $_SESSION["NowPhysicalPath"].LCase($sUserfileName))) {
				if (move_uploaded_file($_FILES['pi17']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
					$spi17=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));

					$aParme=Array($spi17, $pi01);
					SQLExec($_SESSION["sSQLFile"], "exec05", $aParme);
				} else {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
				}
			}
		}

		//圖片上傳-更新
		$sRndName=GetDateTimeCE().GetMicroTime();
		$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi18']['name']);
		uLog("sUserfileName == [".$sUserfileName."]");
		$spi18="";

		if (Trim($sUserfileName)!="") {
			if (FileExist($_SESSION["NowPhysicalPath"].$sRndName.$sUserfileName)){ //假如檔案重覆，則更新失敗
				$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
			} else { //假如檔名不重覆，上傳新檔
				//if (move_uploaded_file($_FILES['pi18']['tmp_name'], $_SESSION["NowPhysicalPath"].LCase($sUserfileName))) {
				if (move_uploaded_file($_FILES['pi18']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
					$spi18=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));

					$aParme=Array($spi18, $pi01);
					SQLExec($_SESSION["sSQLFile"], "exec06", $aParme);
				} else {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
				}
			}
		}

		//圖片上傳-更新
		$sRndName=GetDateTimeCE().GetMicroTime();
		$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi19']['name']);
		uLog("sUserfileName == [".$sUserfileName."]");
		$spi19="";

		if (Trim($sUserfileName)!="") {
			if (FileExist($_SESSION["NowPhysicalPath"].$sRndName.$sUserfileName)){ //假如檔案重覆，則更新失敗
				$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
			} else { //假如檔名不重覆，上傳新檔
				//if (move_uploaded_file($_FILES['pi19']['tmp_name'], $_SESSION["NowPhysicalPath"].LCase($sUserfileName))) {
				if (move_uploaded_file($_FILES['pi19']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
					$spi19=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));

					$aParme=Array($spi19, $pi01);
					SQLExec($_SESSION["sSQLFile"], "exec07", $aParme);
				} else {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
				}
			}
		}

		//圖片上傳-更新
		$sRndName=GetDateTimeCE().GetMicroTime();
		$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi20']['name']);
		uLog("sUserfileName == [".$sUserfileName."]");
		$spi20="";

		if (Trim($sUserfileName)!="") {
			if (FileExist($_SESSION["NowPhysicalPath"].$sRndName.$sUserfileName)){ //假如檔案重覆，則更新失敗
				$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
			} else { //假如檔名不重覆，上傳新檔
				//if (move_uploaded_file($_FILES['pi20']['tmp_name'], $_SESSION["NowPhysicalPath"].LCase($sUserfileName))) {
				if (move_uploaded_file($_FILES['pi20']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
					$spi20=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));

					$aParme=Array($spi20, $pi01);
					SQLExec($_SESSION["sSQLFile"], "exec08", $aParme);
				} else {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
				}
			}
		}

		//圖片上傳-更新
		$sRndName=GetDateTimeCE().GetMicroTime();
		$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi21']['name']);
		uLog("sUserfileName == [".$sUserfileName."]");
		$spi21="";

		if (Trim($sUserfileName)!="") {
			if (FileExist($_SESSION["NowPhysicalPath"].$sRndName.$sUserfileName)){ //假如檔案重覆，則更新失敗
				$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
			} else { //假如檔名不重覆，上傳新檔
				//if (move_uploaded_file($_FILES['pi21']['tmp_name'], $_SESSION["NowPhysicalPath"].LCase($sUserfileName))) {
				if (move_uploaded_file($_FILES['pi21']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
					$spi21=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));

					$aParme=Array($spi21, $pi01);
					SQLExec($_SESSION["sSQLFile"], "exec09", $aParme);
				} else {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
				}
			}
		}

		//圖片上傳-更新
		$sRndName=GetDateTimeCE().GetMicroTime();
		$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi22']['name']);
		uLog("sUserfileName == [".$sUserfileName."]");
		$spi22="";

		if (Trim($sUserfileName)!="") {
			if (FileExist($_SESSION["NowPhysicalPath"].$sRndName.$sUserfileName)){ //假如檔案重覆，則更新失敗
				$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
			} else { //假如檔名不重覆，上傳新檔
				//if (move_uploaded_file($_FILES['pi22']['tmp_name'], $_SESSION["NowPhysicalPath"].LCase($sUserfileName))) {
				if (move_uploaded_file($_FILES['pi22']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
					$spi22=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));

					$aParme=Array($spi22, $pi01);
					SQLExec($_SESSION["sSQLFile"], "exec10", $aParme);
				} else {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
				}
			}
		}

		//圖片上傳-更新
		$sRndName=GetDateTimeCE().GetMicroTime();
		$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi23']['name']);
		uLog("sUserfileName == [".$sUserfileName."]");
		$spi23="";

		if (Trim($sUserfileName)!="") {
			if (FileExist($_SESSION["NowPhysicalPath"].$sRndName.$sUserfileName)){ //假如檔案重覆，則更新失敗
				$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
			} else { //假如檔名不重覆，上傳新檔
				//if (move_uploaded_file($_FILES['pi23']['tmp_name'], $_SESSION["NowPhysicalPath"].LCase($sUserfileName))) {
				if (move_uploaded_file($_FILES['pi23']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
					$spi23=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));

					$aParme=Array($spi23, $pi01);
					SQLExec($_SESSION["sSQLFile"], "exec11", $aParme);
				} else {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
				}
			}
		}

		//圖片上傳-更新
		$sRndName=GetDateTimeCE().GetMicroTime();
		$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi24']['name']);
		uLog("sUserfileName == [".$sUserfileName."]");
		$spi24="";

		if (Trim($sUserfileName)!="") {
			if (FileExist($_SESSION["NowPhysicalPath"].$sRndName.$sUserfileName)){ //假如檔案重覆，則更新失敗
				$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
			} else { //假如檔名不重覆，上傳新檔
				//if (move_uploaded_file($_FILES['pi24']['tmp_name'], $_SESSION["NowPhysicalPath"].LCase($sUserfileName))) {
				if (move_uploaded_file($_FILES['pi24']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
					$spi24=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));

					$aParme=Array($spi24, $pi01);
					SQLExec($_SESSION["sSQLFile"], "exec12", $aParme);
				} else {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
				}
			}
		}

		//圖片上傳-更新
		$sRndName=GetDateTimeCE().GetMicroTime();
		$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi25']['name']);
		uLog("sUserfileName == [".$sUserfileName."]");
		$spi25="";

		if (Trim($sUserfileName)!="") {
			if (FileExist($_SESSION["NowPhysicalPath"].$sRndName.$sUserfileName)){ //假如檔案重覆，則更新失敗
				$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
			} else { //假如檔名不重覆，上傳新檔
				//if (move_uploaded_file($_FILES['pi25']['tmp_name'], $_SESSION["NowPhysicalPath"].LCase($sUserfileName))) {
				if (move_uploaded_file($_FILES['pi25']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
					$spi25=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));

					$aParme=Array($spi25, $pi01);
					SQLExec($_SESSION["sSQLFile"], "exec13", $aParme);
				} else {
					$sMsg=$sMsg."檔案[".$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
				}
			}
		}

		//商品規格-顏色
		$iPi13Length = GetUnidimensionalArrayLength($pi13);
		$sPi13 = "";
		for ($i = 0; $i < $iPi13Length; $i++) {
			$sPi13=$sPi13.$pi13[$i].", ";
		}

		//商品規格-尺寸
		$iPi14Length = GetUnidimensionalArrayLength($pi14);
		$sPi14 = "";
		for ($i = 0; $i < $iPi14Length; $i++) {
			$sPi14=$sPi14.$pi14[$i].", ";
		}

		if (Trim($pr01_gr01_03)!="") {
			$pr01=$pr01_gr01_03;
		} else if (Trim($pr01_gr01_02)!="") {
			$pr01=$pr01_gr01_02;
		} else if (Trim($pr01_gr01_01)!="") {
			$pr01=$pr01_gr01_01;
		}

		$aParme=Array($pi02, $pi03, $pi04, $pi05, $pi06, $pi07, $pi08, $pi09, $pi10, $pi11, $pi12, $sPi13, $sPi14, $pi15, $pi26, $pi27, $pi28, $pr01, GetManID(), $pi01);
		SQLExec($_SESSION["sSQLFile"], "exec02", $aParme);

		$sMsg="資料已更新成功！";
		break;
	case 'Delete':
		uLog("switch Delete");

		$aParme=Array($pi01);
		SQLExec($_SESSION["sSQLFile"], "exec03", $aParme);
		$sMsg="資料已刪除成功！";

		break;
	default:
		uLog("switch default");
		break;
	}
} else if ($PKey!="" && $hdnOp!="Reset") { //使用者編輯資料
}

$aParme=Array($_SESSION["PRO0401_PKey"]);
$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury03", $aParme);
$rRs=GetRs($sSQL);
$iRsRows=mysql_num_rows($rRs);
if ($iRsRows>0) {
	$aRows=mysql_fetch_array($rRs, MYSQL_ASSOC);
	$pi01=$aRows["pi01"];
	$pi02=$aRows["pi02"];
	$pi03=$aRows["pi03"];
	$pi04=$aRows["pi04"];
	$pi05=$aRows["pi05"];
	$pi06=$aRows["pi06"];
	$pi07=$aRows["pi07"];
	$pi08=$aRows["pi08"];
	$pi09=$aRows["pi09"];
	$pi10=$aRows["pi10"];
	$pi11=$aRows["pi11"];
	$pi12=$aRows["pi12"];
	$pi13=$aRows["pi13"];
	$pi14=$aRows["pi14"];
	$pi15=$aRows["pi15"];
	$pi16=$aRows["pi16"];
	$pi17=$aRows["pi17"];
	$pi18=$aRows["pi18"];
	$pi19=$aRows["pi19"];
	$pi20=$aRows["pi20"];
	$pi21=$aRows["pi21"];
	$pi22=$aRows["pi22"];
	$pi23=$aRows["pi23"];
	$pi24=$aRows["pi24"];
	$pi25=$aRows["pi25"];
	$pi26=$aRows["pi26"];
	$pi27=$aRows["pi27"];
	$pr01=$aRows["pr01"];

	//商品規格-顏色
	$aPi13=Array();
	$aPi1301=StringToArray($pi13, ",");
	$iArrayLengthPi1301=GetUnidimensionalArrayLength($aPi1301);
	for ($i=0; $i<$iArrayLengthPi1301; $i++) {
		if (Trim($aPi1301[$i])!="") {
			$aPi13=UnidimensionalArrayAppend($aPi13, Trim($aPi1301[$i]));
		}
	}

	//商品規格-尺寸
	$aPi14=Array();
	$aPi1401=StringToArray($pi14, ",");
	$iArrayLengthPi1401=GetUnidimensionalArrayLength($aPi1401);
	for ($i=0; $i<$iArrayLengthPi1401; $i++) {
		if (Trim($aPi1401[$i])!="") {
			$aPi14=UnidimensionalArrayAppend($aPi14, Trim($aPi1401[$i]));
		}
	}

}

uLog("pi01 == [".$pi01."]");
uLog("pi02 == [".$pi02."]");
uLog("pi03 == [".$pi03."]");
uLog("pi04 == [".$pi04."]");
uLog("pi05 == [".$pi05."]");
uLog("pi06 == [".$pi06."]");
uLog("pi07 == [".$pi07."]");
uLog("pi08 == [".$pi08."]");
uLog("pi09 == [".$pi09."]");
uLog("pi10 == [".$pi10."]");
uLog("pi11 == [".$pi11."]");
uLog("pi12 == [".$pi12."]");
uLog("pi13 == [".$pi13."]");
uLog("pi14 == [".$pi14."]");
uLog("pi15 == [".$pi15."]");
uLog("pi16 == [".$pi16."]");
uLog("pi17 == [".$pi17."]");
uLog("pi18 == [".$pi18."]");
uLog("pi19 == [".$pi19."]");
uLog("pi20 == [".$pi20."]");
uLog("pi21 == [".$pi21."]");
uLog("pi22 == [".$pi22."]");
uLog("pi23 == [".$pi23."]");
uLog("pi24 == [".$pi24."]");
uLog("pi25 == [".$pi25."]");
uLog("pi26 == [".$pi26."]");
uLog("pi27 == [".$pi27."]");
uLog("pr01 == [".$pr01."]");

// ===========================================================================
// 表單參數宣告
// ===========================================================================
$aDataCodeColor=GetDataCode("顏色");
$aDataCodeSize=GetDataCode("尺寸");

$aFormField01=Array("pi01", $pi01);
$aFormField02=Array("pi02", $pi02, "", 60, 200, "", "", "", "", false, "", "");
$aFormField03=Array("pi03", $pi03, "", 60, 200, "", "", "", "", false, "", "");
$aFormField04=Array("pi04", $pi04, "", 60, 200, "", "", "", "", false, "", "");
$aFormField05=Array("pi05", "", $pi05, 8, 60, "", "", "", "", false);
$aFormField06=Array("pi06", "", 0, Array("是", "否"), Array("是", "否"), $pi06, "", false);
$aFormField07=Array("pi07", "", 0, Array("是", "否"), Array("是", "否"), $pi07, "", false);
$aFormField08=Array("pi08", Left($pi08, 10), "", 20, 200, "", "", "", "", false, "", "");
$aFormField09=Array("pi09", Left($pi09, 10), "", 20, 200, "", "", "", "", false, "", "");
$aFormField10=Array("pi10", $pi10, "", 60, 200, "", "", "", "", false, "", "");
$aFormField11=Array("pi11", $pi11, "", 60, 200, "", "", "", "", false, "", "");
$aFormField12=Array("pi12", $pi12, "", 60, 200, "", "", "", "", false, "", "");
$aFormField13=Array("pi13", "", 3, $aDataCodeColor[0], $aDataCodeColor[1], $aPi13, "", false);
$aFormField14=Array("pi14", "", 3, $aDataCodeSize[0], $aDataCodeSize[1], $aPi14, "", false);
$aFormField15=Array("pi15", "", $pi15, 8, 60, "", "", "", "", false);

$aFormField16=Array("pi16", "", "", 50, 200, "", "", "", "", false, "", "");
if ($pi16!="") {
	$sItemDesc16="<a href='../../upload/productinfo/".$pi16."' target='_blank' class=\"detail_link\">".$pi16."</a><br>U";
} else {
	$sItemDesc16="U";
}

$aFormField17=Array("pi17", "", "", 50, 200, "", "", "", "", false, "", "");
if ($pi17!="") {
	$sItemDesc17="<a href='../../upload/productinfo/".$pi17."' target='_blank' class=\"detail_link\">".$pi17."</a><br>U";
} else {
	$sItemDesc17="U";
}

$aFormField18=Array("pi18", "", "", 50, 200, "", "", "", "", false, "", "");
if ($pi18!="") {
	$sItemDesc18="<a href='../../upload/productinfo/".$pi18."' target='_blank' class=\"detail_link\">".$pi18."</a><br>U";
} else {
	$sItemDesc18="U";
}

$aFormField19=Array("pi19", "", "", 50, 200, "", "", "", "", false, "", "");
if ($pi19!="") {
	$sItemDesc19="<a href='../../upload/productinfo/".$pi19."' target='_blank' class=\"detail_link\">".$pi19."</a><br>U";
} else {
	$sItemDesc19="U";
}

$aFormField20=Array("pi20", "", "", 50, 200, "", "", "", "", false, "", "");
if ($pi20!="") {
	$sItemDesc20="<a href='../../upload/productinfo/".$pi20."' target='_blank' class=\"detail_link\">".$pi20."</a><br>U";
} else {
	$sItemDesc20="U";
}

$aFormField21=Array("pi21", "", "", 50, 200, "", "", "", "", false, "", "");
if ($pi21!="") {
	$sItemDesc21="<a href='../../upload/productinfo/".$pi21."' target='_blank' class=\"detail_link\">".$pi21."</a><br>U";
} else {
	$sItemDesc21="U";
}

$aFormField22=Array("pi22", "", "", 50, 200, "", "", "", "", false, "", "");
if ($pi22!="") {
	$sItemDesc22="<a href='../../upload/productinfo/".$pi22."' target='_blank' class=\"detail_link\">".$pi22."</a><br>U";
} else {
	$sItemDesc22="U";
}

$aFormField23=Array("pi23", "", "", 50, 200, "", "", "", "", false, "", "");
if ($pi23!="") {
	$sItemDesc23="<a href='../../upload/productinfo/".$pi23."' target='_blank' class=\"detail_link\">".$pi23."</a><br>U";
} else {
	$sItemDesc23="U";
}

$aFormField24=Array("pi24", "", "", 50, 200, "", "", "", "", false, "", "");
if ($pi24!="") {
	$sItemDesc24="<a href='../../upload/productinfo/".$pi24."' target='_blank' class=\"detail_link\">".$pi24."</a><br>U";
} else {
	$sItemDesc24="U";
}

$aFormField25=Array("pi25", "", "", 50, 200, "", "", "", "", false, "", "");
if ($pi25!="") {
	$sItemDesc25="<a href='../../upload/productinfo/".$pi25."' target='_blank' class=\"detail_link\">".$pi25."</a><br>U";
} else {
	$sItemDesc25="U";
}

$aFormField26=Array("pi26", $pi26, "", 60, 200, "", "", "", "", false, "", "");
$aFormField27=Array("pi27", $pi27, "", 60, 200, "", "", "", "", false, "", "");

$aGetProductionClass=GetProductionClass("", "1", ""); //第一層，不帶資料
$aGetProductionChainG01=GetProductionChain($pi01);
$aGetProductionClassL02G01=GetProductionClass("", "2", $aGetProductionChainG01[0]);
$aGetProductionClassL03G01=GetProductionClass("", "3", $aGetProductionChainG01[1]);

$aFormField28_01=Array("pr01_gr01_01", "", $aGetProductionClass[0], $aGetProductionClass[1], $aGetProductionChainG01[0], "", "", "aJax_ShowLevel(this, 'pr01_gr01_02', '2');", "", false);
$aFormField28_02=Array("pr01_gr01_02", "", $aGetProductionClassL02G01[0], $aGetProductionClassL02G01[1], $aGetProductionChainG01[1], "", "", "aJax_ShowLevel(this, 'pr01_gr01_03', '3');", "", false);
$aFormField28_03=Array("pr01_gr01_03", "", $aGetProductionClassL03G01[0], $aGetProductionClassL03G01[1], $aGetProductionChainG01[2], "", "", "", "", false);
$aFormField28=Array($aFormField28_01, $aFormField28_02, $aFormField28_03);

$sTitleBarF     ="商品資料維護";
$aTitleF        =Array("商品編號", "商品名稱", "網站-原價", "網站-優惠價", "商品說明", "是否為促銷商品", "是否為推薦商品", "上架時間", "下架時間", "商品規格-材質", "商品規格-填充物", "商品規格-重量", "商品規格-顏色", "商品規格-尺寸", "注意事項", "照片01", "照片02", "照片03", "照片04", "照片05", "照片06", "照片07", "照片08", "照片09", "照片10", "補貨底數", "庫存量", "商品類別編號");
$aWidthF        =Array("9%", "90%", "1%");
$aItemCodeF     =Array("H", "I", "I", "I", "M", "R", "R", "I <img src='../../images/calendar_month.png' width='16' height='16' align='top' id='calendar-trigger01'>", "I <img src='../../images/calendar_month.png' width='16' height='16' align='top' id='calendar-trigger02'>", "I", "I", "I", "C", "C", "M", $sItemDesc16, $sItemDesc17, $sItemDesc18, $sItemDesc19, $sItemDesc20, $sItemDesc21, $sItemDesc22, $sItemDesc23, $sItemDesc24, $sItemDesc25, "I", "I", "LLL");
$aItemParameterF=Array($aFormField01, $aFormField02, $aFormField03, $aFormField04, $aFormField05, $aFormField06, $aFormField07, $aFormField08, $aFormField09, $aFormField10, $aFormField11, $aFormField12, $aFormField13, $aFormField14, $aFormField15, $aFormField16, $aFormField17, $aFormField18, $aFormField19, $aFormField20, $aFormField21, $aFormField22, $aFormField23, $aFormField24, $aFormField25, $aFormField26, $aFormField27, $aFormField28);
$aDescriptionF  =Array("", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");

$bU=Array("DoSubmit('Update')", "", "更新", "");
$bD=Array("DoSubmit('Delete')", "", "刪除", "");
$aButtonF       =Array($bU, $bD);

$aVisableF      =Array(false, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true, true);

// ===========================================================================
// 資料列表參數宣告
// ===========================================================================

?>
<?php //**************************************************************************** ?>

<?php //*********************************程式邏輯演算********************************* ?>
<?php
HtmlManTopII();
HtmlManAPNameII("PRO0401 - 商品管理 -＞ <A HREF=\"PRO0401.php\">商品資料維護</A>");
HtmlManContentTopII();

RwForm("", "multipart/form-data", "frmUser", "", True);
FormList($sTitleBarF, $aTitleF, $aWidthF, $aItemCodeF, $aItemParameterF, $aDescriptionF, $aButtonF, $aVisableF);
JScriptCKEditor();
RwForm("", "", "", "", False);

HtmlManContentDownII();
JScript($sMsg);
HtmlManDownII();

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php
function GetDataCode($dc03) {
	$aResult=Array();

	$aValue=Array();
	$aName=Array();
	
	$aParme=Array($dc03);
	$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury04", $aParme);
	$rRs=GetRs($sSQL);

	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$aValue=UnidimensionalArrayAppend($aValue, $row["dc01"]);
		$aName=UnidimensionalArrayAppend($aName, $row["dc02"]);
	}
	mysql_free_result($rRs);

	$aResult=UnidimensionalArrayAppend($aResult, $aValue);
	$aResult=UnidimensionalArrayAppend($aResult, $aName);

	return $aResult;
}

function JScriptCKEditor() {
	?>
	<script type="text/javascript">
		CKEDITOR.replace( 'pi05',
		{
			language : 'zh',

			height : 300, 
			toolbar : 'Full',
			skin : 'office2003',
			uiColor : '#9AB8F3'
		});
		CKEDITOR.replace( 'pi15',
		{
			language : 'zh',

			height : 300, 
			toolbar : 'Full',
			skin : 'office2003',
			uiColor : '#9AB8F3'
		});
	</script>
	<?php
}

function GetProductionChain($sPro01) {
	$aResult=Array();

	$pro01="";
	$MainLevel03="";
	$MainLevel03Top="";
	$MainLevel03TopTop="";
	$MainLevel02="";
	$MainLevel02Top="";
	$MainLevel01="";
	
	$aParme=Array($sPro01);
	$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury05", $aParme);
	$rRs=GetRs($sSQL);

	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$pro01=$row["pi01"];
		$MainLevel03=$row["MainLevel03"];
		$MainLevel03Top=$row["MainLevel03Top"];
		$MainLevel03TopTop=$row["MainLevel03TopTop"];
		$MainLevel02=$row["MainLevel02"];
		$MainLevel02Top=$row["MainLevel02Top"];
		$MainLevel01=$row["MainLevel01"];
	}
	mysql_free_result($rRs);

	if (Trim($sPro01)!="") {
		if (Trim($MainLevel03)!="") {
			$aResult=UnidimensionalArrayAppend($aResult, $MainLevel03TopTop); //Level 01 pr01
			$aResult=UnidimensionalArrayAppend($aResult, $MainLevel03Top); //Level 02 pr01
			$aResult=UnidimensionalArrayAppend($aResult, $MainLevel03); //Level 03 pr01
			$aResult=UnidimensionalArrayAppend($aResult, $pro01); //Production pro01
			$aResult=UnidimensionalArrayAppend($aResult, $MainLevel03); //Production pr01
		} else if (Trim($MainLevel02)!="") {
			$aResult=UnidimensionalArrayAppend($aResult, $MainLevel02Top); //Level 01 pr01
			$aResult=UnidimensionalArrayAppend($aResult, $MainLevel02); //Level 02 pr01
			$aResult=UnidimensionalArrayAppend($aResult, ""); //Level 03 pr01
			$aResult=UnidimensionalArrayAppend($aResult, $pro01); //Production pro01
			$aResult=UnidimensionalArrayAppend($aResult, $MainLevel02); //Production pr01
		} else if (Trim($MainLevel01)!="") {
			$aResult=UnidimensionalArrayAppend($aResult, $MainLevel01); //Level 01 pr01
			$aResult=UnidimensionalArrayAppend($aResult, ""); //Level 02 pr01
			$aResult=UnidimensionalArrayAppend($aResult, ""); //Level 03 pr01
			$aResult=UnidimensionalArrayAppend($aResult, $pro01); //Production pro01
			$aResult=UnidimensionalArrayAppend($aResult, $MainLevel01); //Production pr01
		}
	} else {
		$aResult=UnidimensionalArrayAppend($aResult, ""); //Level 01 pr01
		$aResult=UnidimensionalArrayAppend($aResult, ""); //Level 02 pr01
		$aResult=UnidimensionalArrayAppend($aResult, ""); //Level 03 pr01
		$aResult=UnidimensionalArrayAppend($aResult, ""); //Production pro01
		$aResult=UnidimensionalArrayAppend($aResult, ""); //Production pr01
	}

	return $aResult;
}

function GetProductionClass($sPr01, $sPr03, $sPr04) {
	$aResult=Array();

	$aValue=Array("");
	$aName=Array("請選擇");
	
	$aParme=Array($sPr01, $sPr03, $sPr04);
	$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury06", $aParme);
	$rRs=GetRs($sSQL);

	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$aValue=UnidimensionalArrayAppend($aValue, $row["pr01"]);
		$aName=UnidimensionalArrayAppend($aName, $row["pr02"]);
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

		ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/PRO/article_show_level.php?pr01='+countryCode+'&FrontID='+sChangID+'&Level='+sLevel;	// Specifying which file to get
		ajax[index].onCompletion = function(){ CreateLevel(index, sChangID) };	// Specify function that will be executed after file has been found
		ajax[index].runAJAX();		// Execute AJAX function
	}

	function CreateLevel(index, sChangID)
	{
		var obj = document.getElementById(sChangID);
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
				location.href="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/PRO/PRO0401.php";
			}
			if (sMsg=="資料已更新成功！")
			{
				location.href="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/PRO/PRO0401_Edit.php?PKey=<?php echo $_SESSION["PRO0401_PKey"];?>";
			}
		}
	}
	//-->
	</SCRIPT>

	<script> 
	Calendar.setup({
		trigger    : "calendar-trigger01",
		inputField : "pi08",
		onSelect: function() {
			this.hide();
		}
	});

	Calendar.setup({
		trigger    : "calendar-trigger02",
		inputField : "pi09",
		onSelect: function() {
			this.hide();
		}
	});
	</script>  
	<?php
}

?>
<?php //**************************************************************************** ?>