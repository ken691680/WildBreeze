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
$_SESSION["sSQLFile"]="EPA/EPA0201.sql";  //SQL檔路徑
set_time_limit(3600); //casper add 2011/8/5

// ===========================================================================
// 接收參數宣告
// ===========================================================================
$PKey=$_GET["PKey"];                      //接收欲編輯的資料

$FixDirectory=GetPathProject()."upload".GetLinking()."epaper".GetLinking();     //實體目錄位置
uLog("FixDirectory == [".$FixDirectory."]");
$_SESSION["NowPhysicalPath"]=$FixDirectory;

$ep01="";
$ep02="";
$ep03="";
$epc01="";

$ep04="";
$ep05="";
$ep06="";

if ($hdnOp=="Insert" || $hdnOp=="Update" || $hdnOp=="Delete" || $hdnOp=="Select") { //使用者新、修、刪、查資料
	$ep01=$_POST["ep01"];
	$ep02=$_POST["ep02"];
	$ep03=$_POST["ep03"];
	$ep04=$_POST["ep04"];
	$ep05=$_POST["ep05"];
	$ep06=$_POST["ep06"];
	$epc01=$_POST["epc01"];
} else if ($PKey!="" && $hdnOp!="Reset") { //使用者編輯資料
	$aParme=Array($PKey);
	$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury01", $aParme);
	$rRs=GetRs($sSQL);
	$iRsRows=mysql_num_rows($rRs);
	if ($iRsRows>0) {
		$aRows=mysql_fetch_array($rRs, MYSQL_ASSOC);
		$ep01=$aRows["ep01"];
		$ep02=$aRows["ep02"];
		$ep03=$aRows["ep03"];
		$ep04=$aRows["ep04"];
		$ep05=$aRows["ep05"];
		$ep06=$aRows["ep06"];
		$epc01=$aRows["epc01"];
	}
}

uLog("ep01 == " . $ep01);
uLog("ep02 == " . $ep02);
uLog("ep03 == " . $ep03);
uLog("ep04 == " . $ep04);
uLog("ep05 == " . $ep05);
uLog("ep06 == " . $ep06);
uLog("epc01 == " . $epc01);

// ===========================================================================
// 表單參數宣告
// ===========================================================================
$aEpaperClass=GetEpaperClass();

if ($hdnOp=="Insert" || $hdnOp=="Update" || $hdnOp=="Delete" || $hdnOp=="Select") { //使用者新、修、刪、查資料
	$aFormField01=Array("ep01", "");
	$aFormField02=Array("ep02", "", "", 20, 200, "", "", "", "", false, "", "");
	$aFormField03=Array("ep03", "", "", 50, 200, "", "", "", "", false, "", "");
	$aFormField04=Array("epc01", "", $aEpaperClass[0], $aEpaperClass[1], "", "", "", "", "", false);

	$aFormField05=Array("ep04", "", "", 20, 200, "", "", "", "", false, "", "");
	$aFormField06=Array("ep05", "");
	$aFormField07=Array("ep06", "");

	$sItemDesc03="U 可上傳檔案格式為「.jpg檔案」";
} else if ($PKey!="" && $hdnOp!="Reset") { //使用者編輯資料
	$aFormField01=Array("ep01", $ep01);
	$aFormField02=Array("ep02", $ep02, "", 20, 200, "", "", "", "", false, "", "");
	$aFormField03=Array("ep03", "", "", 50, 200, "", "", "", "", false, "", "");
	$aFormField04=Array("epc01", "", $aEpaperClass[0], $aEpaperClass[1], $epc01, "", "", "", "", false);

	$aFormField05=Array("ep04", $ep04, "", 20, 200, "", "", "", "", false, "", "");
	$aFormField06=Array("ep05", $ep05);
	$aFormField07=Array("ep06", $ep06);

	if ($ep03!="") {
		$sItemDesc03="<a href='../../upload/epaper/".$ep03."' target='_blank'>".$ep03."</a><br>U 可上傳檔案格式為「.html和.jpg檔案」";
	} else {
		$sItemDesc03="U 可上傳檔案格式為「.jpg檔案」";
	}
} else {
	$aFormField01=Array("ep01", "");
	$aFormField02=Array("ep02", "", "", 20, 200, "", "", "", "", false, "", "");
	$aFormField03=Array("ep03", "", "", 50, 200, "", "", "", "", false, "", "");
	$aFormField04=Array("epc01", "", $aEpaperClass[0], $aEpaperClass[1], "", "", "", "", "", false);

	$aFormField05=Array("ep04", "", "", 20, 200, "", "", "", "", false, "", "");
	$aFormField06=Array("ep05", "");
	$aFormField07=Array("ep06", "");

	$sItemDesc03="U 可上傳檔案格式為「.jpg檔案」";
}

$sTitleBarF     ="電子報管理";
$aTitleF        =Array("發報編號", "選擇分類", "標題", "選擇檔案", "連結網址", "點閱數", "開啟數");
$aWidthF        =Array("20%", "60%", "20%");
$aItemCodeF     =Array("H", "L", "I", $sItemDesc03, "I", "H", "H");
$aItemParameterF=Array($aFormField01, $aFormField04, $aFormField02, $aFormField03, $aFormField05, $aFormField06, $aFormField07);
$aDescriptionF  =Array("", "", "可供查詢欄位，重新輸入可再次查詢", "", "", "", "");

if ($hdnOp=="Insert" || $hdnOp=="Update" || $hdnOp=="Delete" || $hdnOp=="Select") { //使用者新、修、刪、查資料
	$bA=Array("DoSubmit('Insert')", "", "送出", "");
	$bI=Array("DoSubmit('Select')", "", "查詢", "");
	$bR=Array("DoSubmit('Reset')", "", "重填", "");
	$aButtonF       =Array($bA, $bI);
} else if ($PKey!="" && $hdnOp!="Reset") { //使用者編輯資料
	//$bU=Array("DoSubmit('Update')", "", "發送", "");
	$bD=Array("DoSubmit('Delete')", "", "刪除", "");
	$bR=Array("DoSubmit('Reset')", "", "重填", "");
	$aButtonF       =Array($bD);
} else {
	$bA=Array("DoSubmit('Insert')", "", "送出", "");
	$bI=Array("DoSubmit('Select')", "", "查詢", "");
	$bR=Array("DoSubmit('Reset')", "", "重填", "");
	$aButtonF       =Array($bA, $bI);
}

$aVisableF      =Array(false, true, true, true, true, false, false);

// ===========================================================================
// 資料列表參數宣告
// ===========================================================================
$sFileNameD         =$_SESSION["sSQLFile"];
$sFlagNameD         ="qury03";
$aParmeD            =Array($ep02);
$sOrderFieldNameD   =$_GET["OFN"];
$sOrderSequenceD    =$_GET["SOS"];
$sDefOrderFieldNameD="lasttime";
$bChangeSQLD        ="";
$iPageNumD          =$_GET["IPN"];
$iNowPageD          =$_GET["INP"];

$aTitleD            =Array("發送時間", "分類", "檔案名稱", "點閱數", "編輯資料");
$aWidthD            =Array("20%", "20%", "20%", "20%", "20%"); //當開啟Detail只能使用95%，如無開啟可使用100%
$aAlignD            =Array("center", "center", "center", "center", "center");

$aFieldD            =Array("lasttime", "epc02", "ep02", "ep05", "");

$aCalCodeD          =Array("", "", "", "", "Edit");
$aCalFieldD         =Array(Array(), Array(), Array(), Array(), Array("ep01"));

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

	$ep01=GetDateTimeCE().GetMicroTime();

	$sUserfileName=iconv("UTF-8", "big5", $_FILES['ep03']['name']);
	uLog("sUserfileName == [".$sUserfileName."]");
	$sEp03="";

	if (Trim($sUserfileName)!="") {
		if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
			$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
		} else { //假如檔名不重覆，上傳新檔
			if (move_uploaded_file($_FILES['ep03']['tmp_name'], $_SESSION["NowPhysicalPath"].LCase($sUserfileName))) {
				$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
				$sEp03=LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
			} else {
				$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
			}
		}
	}

	//發送會員郵件
	require("../../phpMailer/class.phpmailer.php");

	//########################### Casper Add 2011/08/05 ###########################
	$aParme=Array("是");
	$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury04", $aParme);
	$rRs=GetRs($sSQL);

	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$mail = new PHPMailer();

		$mail->IsSMTP(); // send via SMTP
		$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
		$mail->Host = "smtp.gmail.com"; // SMTP servers
		$mail->Port = 465; // SMTP port
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = "epaper@kumotor.com"; // SMTP username
		$mail->Password = "djfos@81723"; // SMTP password
		$mail->CharSet = "utf-8"; // SMTP password
		 
		$mail->From = "service@jpooya.com";
		$mail->FromName = "野遊風電子報";

		$mail->AddAddress($row["me01"], $row["me04"]);

		$mail->WordWrap = 50; // set word wrap

		$msgBody ="<HTML><HEAD><TITLE>野遊風電子報</TITLE><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"></HEAD><BODY><CENTER><A HREF=\"http://".GetServerHostName()."/".GetPathProjectV()."goto_mail2.php?ep01=".$ep01."\"><img src=\"http://".GetServerHostName()."/".GetPathProjectV()."upload/epaper/".$sEp03."\"></A><img src=\"http://".GetServerHostName()."/".GetPathProjectV()."count_mail2.php?ep01=".$ep01."\" width='1' height='1'></CENTER></BODY></HTML>";

		// 電郵內容，以下為發送 HTML 格式的郵件
		$mail->IsHTML(true); // send as HTML
		$mail->Subject = $ep02;
		$mail->Body = $msgBody;

		if(!$mail->Send()) {
			$sMsg="發信錯誤";
		} else {
			//$sMsg=$sMsg."此電子報已發送！\\r\\n";
			$sMsg="此電子報已發送！\\r\\n";
		}
	}
	mysql_free_result($rRs);
	//#############################################################################

	//$mail = new PHPMailer();
	/*
	$mail->IsSMTP(); // send via SMTP
	$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
	$mail->Host = "smtp.gmail.com"; // SMTP servers
	$mail->Port = 465; // SMTP port
	$mail->SMTPAuth = true; // turn on SMTP authentication
	$mail->Username = "service@jpooya.com"; // SMTP username
	$mail->Password = "25118385"; // SMTP password
	$mail->CharSet = "utf-8"; // SMTP password
	*/
/*
$mail->IsSMTP(); // send via SMTP
$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
$mail->Host = "smtp.gmail.com"; // SMTP servers
$mail->Port = 465; // SMTP port
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "epaper@kumotor.com"; // SMTP username
$mail->Password = "djfos@81723"; // SMTP password
$mail->CharSet = "utf-8"; // SMTP password
	 
	$mail->From = "service@jpooya.com";
	$mail->FromName = "KuMotor電子報";

	$aParme=Array("會員");
	$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury04", $aParme);
	$rRs=GetRs($sSQL);
	

	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$mail->AddAddress($row["me01"], $row["me04"]);
	}
	mysql_free_result($rRs);


	//##################### casper test 2011/8/5 #####################
	//$mail->AddAddress("lutherworker@gmail.com", "小帥羊Gmail");
	//$mail->AddAddress("lutherworker09810987asasasasasasasasasasasasasasas@gmail.com", "小帥羊錯誤Gmail");
	//################################################################

	$mail->WordWrap = 50; // set word wrap

	//$msgBody =GetFileContent($_SESSION["NowPhysicalPath"].LCase($sUserfileName));
	$msgBody ="<HTML><HEAD><TITLE>KuMotor電子報</TITLE><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"></HEAD><BODY><CENTER><A HREF=\"http://".GetServerHostName()."/".GetPathProjectV()."goto_mail2.php?ep01=".$ep01."\"><img src=\"http://".GetServerHostName()."/".GetPathProjectV()."upload/epaper/".$sEp03."\"></A><img src=\"http://".GetServerHostName()."/".GetPathProjectV()."count_mail2.php?ep01=".$ep01."\" width='1' height='1'></CENTER></BODY></HTML>";

	// 電郵內容，以下為發送 HTML 格式的郵件
	$mail->IsHTML(true); // send as HTML
	$mail->Subject = $ep02;
	$mail->Body = $msgBody;
	//$mail->AltBody = "This is the text-only body";

	if(!$mail->Send()) {
		//echo "Message was not sent <p>";
		//echo "Mailer Error: " . $mail->ErrorInfo;
		//$sMsg=$sMsg."發信錯誤：[".$mail->ErrorInfo."]\\r\\n";
		$sMsg="發信錯誤";
	} else {
		$sMsg=$sMsg."此電子報已發送！\\r\\n";
	}
	*/

	$aParme=Array($ep01, $ep02, $sEp03, $epc01, GetManID(), $ep04, $ep05, $ep06);
	SQLExec($_SESSION["sSQLFile"], "exec01", $aParme);
	$sMsg=$sMsg."資料已新增成功！";
	break;
case 'Update':
	uLog("switch Update");

	$sUserfileName=iconv("UTF-8", "big5", $_FILES['ep03']['name']);
	uLog("sUserfileName == [".$sUserfileName."]");
	$sEp03="";

	if (Trim($sUserfileName)!="") {
		if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
			$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
		} else { //假如檔名不重覆，上傳新檔
			if (move_uploaded_file($_FILES['ep03']['tmp_name'], $_SESSION["NowPhysicalPath"].LCase($sUserfileName))) {
				$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
				$sEp03=LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));

				$aParme=Array($sEp03, $ep01);
				SQLExec($_SESSION["sSQLFile"], "exec04", $aParme);
			} else {
				$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
			}
		}
	}

	//發送會員郵件
	require("../../phpMailer/class.phpmailer.php");

	$mail = new PHPMailer();
	/*
	$mail->IsSMTP(); // send via SMTP
	$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
	$mail->Host = "smtp.gmail.com"; // SMTP servers
	$mail->Port = 465; // SMTP port
	$mail->SMTPAuth = true; // turn on SMTP authentication
	$mail->Username = "service@jpooya.com"; // SMTP username
	$mail->Password = "25118385"; // SMTP password
	$mail->CharSet = "utf-8"; // SMTP password
	*/

$mail->IsSMTP(); // send via SMTP
$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
$mail->Host = "smtp.gmail.com"; // SMTP servers
$mail->Port = 465; // SMTP port
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "epaper@kumotor.com"; // SMTP username
$mail->Password = "djfos@81723"; // SMTP password
$mail->CharSet = "utf-8"; // SMTP password
	 
	$mail->From = "service@jpooya.com";
	$mail->FromName = "KuMotor電子報";

	$aParme=Array("是");
	$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury04", $aParme);
	$rRs=GetRs($sSQL);

	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$mail->AddAddress($row["me01"], $row["me04"]);
	}
	mysql_free_result($rRs);

	$mail->WordWrap = 50; // set word wrap

	//$msgBody =GetFileContent($_SESSION["NowPhysicalPath"].LCase($sUserfileName));
	$msgBody ="<HTML><HEAD><TITLE>KuMotor電子報</TITLE><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"></HEAD><BODY><CENTER><A HREF=\"http://".GetServerHostName()."/".GetPathProjectV()."goto_mail2.php?ep01=".$ep01."\"><img src=\"http://".GetServerHostName()."/".GetPathProjectV()."upload/epaper/".$sEp03."\"></A><img src=\"http://".GetServerHostName()."/".GetPathProjectV()."count_mail2.php?ep01=".$ep01."\" width='1' height='1'></CENTER></BODY></HTML>";

	// 電郵內容，以下為發送 HTML 格式的郵件
	$mail->IsHTML(true); // send as HTML
	$mail->Subject = $ep02;
	$mail->Body = $msgBody;
	//$mail->AltBody = "This is the text-only body";

	if(!$mail->Send()) {
		//echo "Message was not sent <p>";
		//echo "Mailer Error: " . $mail->ErrorInfo;
		//$sMsg=$sMsg."發信錯誤：[".$mail->ErrorInfo."]\\r\\n";
		$sMsg="發信錯誤";
	} else {
		$sMsg=$sMsg."此電子報已發送！\\r\\n";
	}

	$aParme=Array($ep02, $epc01, GetManID(), $ep04, $ep05, $ep06, $ep01);
	SQLExec($_SESSION["sSQLFile"], "exec02", $aParme);
	$sMsg=$sMsg."資料已更新成功！";
	break;
case 'Delete':
	uLog("switch Delete");
	$aParme=Array($ep01);
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
HtmlManAPNameII("EPA0201 - 電子報管理 -＞ 電子報管理");
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

function GetEpaperClass() {
	$aResult=Array();

	$aValue=Array("");
	$aName=Array("請選擇");
	
	$aParme=Array();
	$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury02", $aParme);
	$rRs=GetRs($sSQL);

	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$aValue=UnidimensionalArrayAppend($aValue, $row["epc01"]);
		$aName=UnidimensionalArrayAppend($aName, $row["epc02"]);
	}
	mysql_free_result($rRs);

	$aResult=UnidimensionalArrayAppend($aResult, $aValue);
	$aResult=UnidimensionalArrayAppend($aResult, $aName);

	return $aResult;
}

?>
<?php //**************************************************************************** ?>