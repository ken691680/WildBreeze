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
$FixDirectory=GetPathProject()."upload".GetLinking()."teacher".GetLinking();     //實體目錄位置
uLog("FixDirectory == [".$FixDirectory."]");
$_SESSION["NowPhysicalPath"]=$FixDirectory;

$te01=$_POST["te01"];
$te02=$_POST["te02"];
$te03=$_POST["te03"];
$te04=$_POST["te04"];
$te05=$_POST["te05"];
$te06=$_POST["te06"];
$te07=$_POST["te07"];
$te08=$_POST["te08"];

uLog("te01 == " . $te01);
uLog("te02 == " . $te02);
uLog("te03 == " . $te03);
uLog("te04 == " . $te04);
uLog("te05 == " . $te05);
uLog("te06 == " . $te06);
uLog("te07 == " . $te07);
uLog("te08 == " . $te08);

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
if (IsSnoExist($te01)) {
	echo '{success:false}';
} else {
	$sRndName=GetDateTimeCE().GetMicroTime();
	$sUserfileName=iconv("UTF-8", "big5", $_FILES['te08']['name']);
	uLog("sUserfileName == [".$sUserfileName."]");
	$ste08="";

	if (Trim($sUserfileName)!="") {
		if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
			$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
		} else { //假如檔名不重覆，上傳新檔
			if (move_uploaded_file($_FILES['te08']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
				$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
				$ste08=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
			} else {
				$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
			}
		}
	}

	$sSQL="insert into teacher (te01, te02, te03, te04, te05, te06, te07, te08, ma01, lasttime) values ('".$te01."', '".$te02."', '".$te03."', '".$te04."', '".$te05."', '".$te06."', '".$te07."', '".$ste08."', '".GetManID()."', now());";
	$rSQLExec=GetRs($sSQL);
	echo '{success:true}';
}

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php
function IsSnoExist($sSno) {
	$bResult=false;
	
	$sSQL="select * from teacher where te01='".$sSno."';";
	$rRs=GetRs($sSQL);
	$iRsRows=mysql_num_rows($rRs);
	if ($iRsRows>0) {
		$bResult=true;
	}
	mysql_free_result($rRs);

	return $bResult;
}

?>
<?php //**************************************************************************** ?>