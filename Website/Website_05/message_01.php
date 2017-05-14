
<?php //*********************************模組檔案引入********************************* ?>
<?php include("Module/pUwm.php"); ?>
<?php include("LibSecurImage/securimage.php"); ?>
<?php require("phpMailer/class.phpmailer.php"); ?>
<?php //**************************************************************************** ?>

<?php //*********************************前置變數定義********************************* ?>
<?php
// ===========================================================================
// 初始化參數宣告
// ===========================================================================
ChkLogin();

ErrorReporting(E_ERROR | E_WARNING | E_PARSE);                    //錯誤回報控制 0關掉 E_ALL全部回報
$action=$_POST["action"];
$amessage["mee02"]=$_POST["mee02"];
$amessage["mee03"]=$_POST["mee03"];

// ===========================================================================
// 接收參數宣告
// ===========================================================================
//$me01=GetMemID();

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


if($action=="message") {
	amessage($amessage);
}


function amessage($amessage) {
	
		$mee01=GetDateTimeCE().GetMicroTime();
		$sSQL="INSERT INTO memberevaluate(mee01,mee02,mee03,mee04,mee05,me01,lasttime) VALUES ('". $mee01."','".$amessage["mee02"]."','".$amessage["mee03"]."','否','是','".GetMemID()."', now())";
		GetRs($sSQL);
		jsAlert("新增成功!");
		jsHref("message.php");
	
}

function chicktrueJscript() {
?>

<script language="javascript">
function chicktruemessage() {
	if(document.getElementById("mee02").value=="" ) {
			alert("請輸入主旨");
		return false;
	} 

	if(document.getElementById("mee03").value=="") {
		alert("請輸入好評內容!");
		return;
	}
	document.getElementById("action").value="message";
	document.messageForm.submit();
}

</script>
<?php
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WildBreeze</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<form id="messageForm" name="messageForm" action="message_01.php" method="POST">
<input type="hidden"  id="action" name="action">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="1000" align="center" valign="top" style="background:url(images/bigbg.jpg) no-repeat top center"><table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr valign="bottom">
        <td height="100" colspan="3" align="right">&nbsp;</td>
        </tr>
      <tr valign="bottom">
        <td width="15" height="15" align="right"><img src="images/log_bg_01.png" alt="" width="15" height="15" /></td>
        <td style="background:url(images/log_bg_02.png) repeat-x bottom">&nbsp;</td>
        <td width="15" align="left"><img src="images/log_bg_03.png" alt="" width="15" height="15" /></td>
      </tr>
      <tr>
        <td align="right" style="background:url(images/log_bg_04.png) no-repeat right top">&nbsp;</td>
        <td height="200" valign="top" bgcolor="#FFFFFF" style="background:url(images/log_bg_05.png) repeat-x">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="30" align="left" valign="top"><img src="images/btn_good_02.png" alt="" width="169" height="21" /></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="top_txt5a4f3f">歡迎您不吝與我們分享對野遊風的心得感想！</td>
          </tr>
          <tr>
            <td height="180" align="center" valign="middle"><table border="0" cellpadding="0" cellspacing="5">
              <tr>
                <td width="100" align="center" valign="middle" class="title_5a4f3f">好評主旨</td>
                <td width="450" align="left" valign="middle" class="top_txt5a4f3f"><input name="mee02" type="text" class="top_txt5a4f3f" id="mee02"  style="width:200px"/></td>
              </tr>
              <tr>
                <td width="100" align="center" valign="top" class="title_5a4f3f">好評內容</td>
                <td width="450" align="left" valign="top" class="top_txt5a4f3f"><label for="textarea2"></label>
                  <textarea name="mee03" cols="45" rows="5" class="top_txt5a4f3f" id="mee03" style="width:400px"></textarea></td>
              </tr>
              <tr>
                <td height="10" colspan="2" align="center" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid"><img src="images/li.png" alt="" width="1" height="1" /></td>
              </tr>
              <tr>
                <td height="30" colspan="2" align="center" valign="bottom"><table width="100" border="0" cellpadding="0" cellspacing="0" class="btn_bg">
                  <tr>



                    <td   "align="center" valign="middle" class="btn_bg">
										
										<!-- <input type="button" name="chicktrue" value="確認送出" onclick="chicktruemessage();" /> -->
										
										<a href="#;return;" class="btn_bg" onclick="chicktruemessage();">確認送出</a></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td align="left" style="background:url(images/log_bg_06.png) no-repeat left top">&nbsp;</td>
      </tr>
      <tr valign="top">
        <td height="15" align="right"><img src="images/log_bg_07.png" alt="" width="15" height="15" /></td>
        <td style="background:url(images/log_bg_08.png) top repeat-x">&nbsp;</td>
        <td align="left"><img src="images/log_bg_09.png" alt="" width="15" height="15" /></td>
      </tr>
    </table></td>
  </tr>
</table>

</form>
<?php
chicktrueJscript();
?>
</body>

</html>
