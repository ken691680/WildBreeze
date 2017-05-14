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
ErrorReporting(E_ERROR | E_WARNING | E_PARSE);                    //錯誤回報控制 0關掉 E_ALL全部回報
$action=$_POST["action"];
uLog($action);
// ===========================================================================
// 接收參數宣告
// ===========================================================================
$me01=$_POST['me01'];
$me02=$_POST['me02'];
$me03=$_POST['me03'];
$me04=$_POST['me04'];

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
$sMsg="";
		uLog("debug line 1");
switch ($action) {
case 'chgpwd':
	uLog("switch Insert");
	//uLog($_POST['code']);
	$img = new Securimage();
	$valid = $img->check($_POST['code']);
  if($valid == true) {
				uLog("debug line 2");
		$sSQL="select * from member where me01='".$me01."'";
		$rSQLExec=GetRs($sSQL);
		uLog("debug line 3");
		if(mysql_num_rows($rSQLExec)==0){
			jsAlert("查無此帳號!");
		} else {
		$aMemdata=mysql_fetch_array($rSQLExec);
		//$aMemdata['me02']
		//################################ 開始發信 ################################
		$sTitle= "WildBreeze 野遊風戶外休閒用品館 密碼通知信";
		$msgBody ='
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>MSG</title>
		<style type="text/css">
		<!--
		body {	margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;}
		-->
		</style>
		</head>
		<body>
			

			您的帳號是：'.$me01.'<br>
			您的密碼是：'.$aMemdata['me02'].'<p>

			如果您有任何使用上的問題，請與我們聯絡<p>

			WildBreeze 野遊風戶外休閒用品館 <A HREF=http://'.GetServerHostName().'/'.GetPathProjectV().'>http://'.GetServerHostName().'/'.GetPathProjectV().'</A><br>
			WildBreeze 野遊風戶外休閒用品館 服務電話：(02)8512-1882		<br>
		</body>
		</html>
		';
		if( PostMail( $sTitle, $msgBody, $me01 ) ) {
			jsAlert("信件已寄出！");
			//$sMsg="您的信件已寄出！";
			//$sUrl="http://".GetServerHostName()."/".GetPathProjectV()."member_apply_ok.php?me03=".$me03;
			//header("location:".$sUrl);
		} else {
			//return;
		}
		//##########################################################################
}} else {
	jsAlert("驗證碼錯誤!");
}



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
<form id="frmUser" name="frmUser" action="member_pw.php" method="POST">
<input type="hidden"  id="action" name="action" value="chgpwd">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="1000" align="center" valign="top" style="background:url(images/bigbg.jpg) no-repeat top center"><table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr valign="bottom">
        <td width="30" height="100" colspan="3" align="right">&nbsp;</td>
      </tr>
      <tr valign="bottom">
        <td height="15" align="right"><img src="images/log_bg_01.png" alt="" width="15" height="15" /></td>
        <td style="background:url(images/log_bg_02.png) repeat-x bottom">&nbsp;</td>
        <td align="left"><img src="images/log_bg_03.png" alt="" width="15" height="15" /></td>
      </tr>
      <tr>
        <td align="right" style="background:url(images/log_bg_04.png) no-repeat right top">&nbsp;</td>
        <td height="200" valign="top" bgcolor="#FFFFFF" style="background:url(images/log_bg_05.png) repeat-x"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="30" align="left" valign="top"><img src="images/title-07.png" alt="" width="146" height="21" /></td>
          </tr>
          <tr>
            <td height="30" align="left" valign="middle" class="top_txt5a4f3f">　請輸入您原先的電子郵件信箱，<br />
              我們會寄一封信給您，裡面含有可重設密碼的連結。 </td>
          </tr>
          <tr>
            <td height="180" align="center" valign="middle"><table border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td width="100" align="center" valign="middle" class="title_5a4f3f">電子郵件</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><input name="me01" type="text" class="top_txt5a4f3f" id="me01"  style="width:220px"/>
              </tr>
              <tr>
                <td width="100" align="center" valign="middle" class="title_5a4f3f">認 證 碼</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><img id="siimage" src="LibSecurImage/securimage_show.php?sid=<?php echo md5(time()) ?>" border="1" width="64" height="25" align="absmiddle" /><!-- <img src="images/code.jpg" width="64" height="25" align="absmiddle" /> -->　                                <input name="code" type="text" class="top_txt5a4f3f" id="code"  style="width:100px"/></td>
              </tr>
              <tr>
                <td height="10" colspan="2" align="center" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid"><img src="images/li.png" alt="" width="1" height="1" /></td>
              </tr>
              <tr>
                <td height="30" colspan="2" align="center" valign="bottom"><table width="100" border="0" cellpadding="0" cellspacing="0" class="btn_bg">
                  <tr>
                    <td height="30" align="center" valign="middle" class="btn_bg"><!-- <a href="member_join_01.html" class="btn_bg"> --><a href="#" class="btn_bg" onclick="DoSubmit();" >確認送出</a></td>
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
</body>

</html>

<script language="javascript">
function DoSubmit() {
	sStatus=true;

	if (document.getElementById("me01").value=="" ) {
		alert("請輸入您的電子郵件！");
		document.getElementById('me01').focus();
		sStatus=false;
		return false;
	} else{
		var emailRegxp =/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
		if (emailRegxp.test(document.getElementById("me01").value) != true){
			alert('您的電子信箱格式錯誤！');
			document.getElementById('me01').focus();
			sStatus=false;
			return false;
		}
	}

	var code=document.getElementById("code").value;
	if(code==""){
		alert("請輸入認證碼！");
		document.getElementById('code').focus();
		sStatus=false;
		return false;
	}

	if (sStatus==true) {
		document.frmUser.submit();
	}

}

</script>