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
$FixDirectory=GetPathProject()."upload".GetLinking()."productinfo".GetLinking();     //實體目錄位置
uLog("FixDirectory == [".$FixDirectory."]");
$_SESSION["NowPhysicalPath"]=$FixDirectory;

$pi01=GetDateTimeCE().GetMicroTime();
$pi02=$_POST["pi02"];
$pi03=$_POST["pi03"];
$pi04=$_POST["pi04"];
$pi05=$_POST["pi05"];
$pi06=$_POST["pi06"];
$pi07=$_POST["pi07"];
$pi08=$_POST["pi08"];
$pi09=$_POST["pi09"];
$pi10=$_POST["pi10"];
$pi11=$_POST["pi11"];
$pi12=$_POST["pi12"];
$pi13=$_POST["pi13"];
$pi14=$_POST["pi14"];
$pi15=$_POST["pi15"];
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
$pi28=$_POST["pi28"];
$pr01L01_h=$_POST["pr01L01_h"];
$pr01L02_h=$_POST["pr01L02_h"];
$pr01L03_h=$_POST["pr01L03_h"];

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
uLog("pi28 == [".$pi28."]");
uLog("pr01L01_h == [".$pr01L01_h."]");
uLog("pr01L02_h == [".$pr01L02_h."]");
uLog("pr01L03_h == [".$pr01L03_h."]");

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
//上傳圖片1
$sRndName=GetDateTimeCE().GetMicroTime();
$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi16']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$spi16="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['pi16']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$spi16=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
		} else {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

//上傳圖片2
$sRndName=GetDateTimeCE().GetMicroTime();
$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi17']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$spi17="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['pi17']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$spi17=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
		} else {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

//上傳圖片3
$sRndName=GetDateTimeCE().GetMicroTime();
$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi18']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$spi18="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['pi18']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$spi18=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
		} else {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

//上傳圖片4
$sRndName=GetDateTimeCE().GetMicroTime();
$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi19']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$spi19="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['pi19']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$spi19=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
		} else {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

//上傳圖片5
$sRndName=GetDateTimeCE().GetMicroTime();
$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi20']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$spi20="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['pi20']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$spi20=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
		} else {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

//上傳圖片6
$sRndName=GetDateTimeCE().GetMicroTime();
$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi21']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$spi21="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['pi21']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$spi21=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
		} else {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

//上傳圖片7
$sRndName=GetDateTimeCE().GetMicroTime();
$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi22']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$spi22="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['pi22']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$spi22=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
		} else {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

//上傳圖片8
$sRndName=GetDateTimeCE().GetMicroTime();
$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi23']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$spi23="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['pi23']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$spi23=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
		} else {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

//上傳圖片9
$sRndName=GetDateTimeCE().GetMicroTime();
$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi24']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$spi24="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['pi24']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$spi24=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
		} else {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

//上傳圖片10
$sRndName=GetDateTimeCE().GetMicroTime();
$sUserfileName=iconv("UTF-8", "big5", $_FILES['pi25']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$spi25="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['pi25']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$spi25=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
		} else {
			//$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

$pr01="";
if (Trim($pr01L03_h)!="") {
	$pr01=$pr01L03_h;
} else if (Trim($pr01L02_h)!="") {
	$pr01=$pr01L02_h;
} else if (Trim($pr01L01_h)!="") {
	$pr01=$pr01L01_h;
}

$ipi13Length = GetUnidimensionalArrayLength($pi13);
$spi13 = "";
for ($i = 0; $i < $ipi13Length; $i++) {
	$spi13=$spi13.$pi13[$i].", ";
}

$ipi14Length = GetUnidimensionalArrayLength($pi14);
$spi14 = "";
for ($i = 0; $i < $ipi14Length; $i++) {
	$spi14=$spi14.$pi14[$i].", ";
}

$sSQL="insert into productinfo (pi01, pi02, pi03, pi04, pi05, pi06, pi07, pi08, pi09, pi10, pi11, pi12, pi13, pi14, pi15, pi16, pi17, pi18, pi19, pi20, pi21, pi22, pi23, pi24, pi25, pi26, pi27, pi28, pr01, ma01, lasttime) values ('".$pi01."', '".$pi02."', '".$pi03."', '".$pi04."', '".$pi05."', '".$pi06."', '".$pi07."', '".$pi08."', '".$pi09."', '".$pi10."', '".$pi11."', '".$pi12."', '".$spi13."', '".$spi14."', '".$pi15."', '".$spi16."', '".$spi17."', '".$spi18."', '".$spi19."', '".$spi20."', '".$spi21."', '".$spi22."', '".$spi23."', '".$spi24."', '".$spi25."', '".$pi26."', '".$pi27."', '".$pi28."', '".$pr01."', '".GetManID()."', now());";
uLog("sSQL == [".$sSQL."]");
$rSQLExec=GetRs($sSQL);

echo '{success:true}';

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

?>
<?php //**************************************************************************** ?>