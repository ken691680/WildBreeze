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
$FixDirectory=GetPathProject()."upload".GetLinking()."course".GetLinking();     //實體目錄位置
uLog("FixDirectory == [".$FixDirectory."]");
$_SESSION["NowPhysicalPath"]=$FixDirectory;

$co01=$_POST["co01"];
$co02=$_POST["co02"];
$co03=$_POST["co03"];
$co04=$_POST["co04"];
$co05=$_POST["co05"];
$co06=$_POST["co06"];
$co07=$_POST["co07"];
$co08=$_POST["co08"];
$co09=$_POST["co09"];
$pf01=$_POST["pf01"];
$cc01=$_POST["cc01"];
$te01=$_POST["te01"];

uLog("co01 == " . $co01);
uLog("co02 == " . $co02);
uLog("co03 == " . $co03);
uLog("co04 == " . $co04);
uLog("co05 == " . $co05);
uLog("co06 == " . $co06);
uLog("co07 == " . $co07);
uLog("co08 == " . $co08);
uLog("co09 == " . $co09);
uLog("pf01 == " . $pf01);
uLog("cc01 == " . $cc01);
uLog("te01 == " . $te01);

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
$sRndName=GetDateTimeCE().GetMicroTime();
$sUserfileName=iconv("UTF-8", "big5", $_FILES['co04']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$sco04="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['co04']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$sco04=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));

			$sSQL="update courses set co04='".$sco04."' where co01='".$co01."';";
			$rSQLExec=GetRs($sSQL);
		} else {
			$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

$sRndName=GetDateTimeCE().GetMicroTime();
$sUserfileName=iconv("UTF-8", "big5", $_FILES['co05']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$sco05="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['co05']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$sco05=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));

			$sSQL="update courses set co05='".$sco05."' where co01='".$co01."';";
			$rSQLExec=GetRs($sSQL);
		} else {
			$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

$sRndName=GetDateTimeCE().GetMicroTime();
$sUserfileName=iconv("UTF-8", "big5", $_FILES['co09']['name']);
uLog("sUserfileName == [".$sUserfileName."]");
$sco09="";

if (Trim($sUserfileName)!="") {
	if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
		$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
	} else { //假如檔名不重覆，上傳新檔
		if (move_uploaded_file($_FILES['co09']['tmp_name'], $_SESSION["NowPhysicalPath"].$sRndName.iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
			$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
			$sco09=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));

			$sSQL="update courses set co09='".$sco09."' where co01='".$co01."';";
			$rSQLExec=GetRs($sSQL);
		} else {
			$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
		}
	}
}

$sSQL="update courses set co02='".$co02."', co03='".GetTeacherName($te01)."', co06='".$co06."', co07='".$co07."', co08='".$co08."', pf01='".$pf01."', cc01='".$cc01."', te01='".$te01."', lasttime=now() where co01='".$co01."';";
$rSQLExec=GetRs($sSQL);
echo '{success:true}';


?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php
function GetTeacherName($te01) {
	$sResult="";
	
	$sSQL="select * from teacher where te01='".$te01."';";
	$rRs=GetRs($sSQL);

	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$sResult=$row["te02"];
	}
	mysql_free_result($rRs);

	return $sResult;
}

?>
<?php //**************************************************************************** ?>