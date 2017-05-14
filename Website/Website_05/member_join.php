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
$hdnOp=$_POST["hdnOp"];

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
switch ($hdnOp) {
case 'JoinMember':

	uLog("switch Insert");
	//jsAlert("aaa");
	$img = new Securimage();
	$valid = $img->check($_POST['code']);

  if($valid == true) {
		$sSQL="insert into member (me01, me02, me03, me04, me05, me06, me07, me08, me09, me10, jointime) values ('".$me01."', '".$me02."', '".$me03."', '".$me04."', '', '', '', '', '', '是', now());";
		$rSQLExec=GetRs($sSQL);

		//################################ 開始發信 ################################
		$sTitle= "WildBreeze 野遊風戶外休閒用品館 加入會員成功";
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
			'.$me03.' '.$me04.'您好，歡迎您成為WildBreeze 野遊風戶外休閒用品館的一員！<p>

			您註冊的帳號是：'.$me01.'<br>
			您註冊的密碼是：'.$me02.'<p>

			如果您有任何使用上的問題，請與我們聯絡<p>

			WildBreeze 野遊風戶外休閒用品館 <A HREF=http://'.GetServerHostName().'/'.GetPathProjectV().'>http://'.GetServerHostName().'/'.GetPathProjectV().'</A><br>
			WildBreeze 野遊風戶外休閒用品館 服務電話：(02)8512-1882		<br>
		</body>
		</html>
		';
		if( PostMail( $sTitle, $msgBody, $me01 ) ) {
			jsAlert("您的信件已寄出！");
			//$sMsg="您的信件已寄出！";
			//$sUrl="http://".GetServerHostName()."/".GetPathProjectV()."member_apply_ok.php?me03=".$me03;
			//header("location:".$sUrl);
		} else {
			jsAlert("您的信件失敗！");
			//jsalert("PostMail");
			//return;
		}
		//##########################################################################

		$sUrl="http://".GetServerHostName()."/".GetPathProjectV()."member_join_01.php";
		//header("location:".$sUrl);
		jsHref($sUrl);
  } else {
		$sMsg="驗證碼錯誤，請您重新輸入！";
  }

	break;
default:
	uLog("switch default");
	break;
}

MainPage($sMsg);

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php
function MainPage($sMsg) {
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/tp.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>WildBreeze</title>
<!-- InstanceEndEditable -->
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(images/bg.jpg);
	background-repeat: repeat-x;
	background-position: center top;
}
</style>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!-- InstanceParam name="top" type="boolean" value="true" -->
<!-- InstanceParam name="copyright" type="boolean" value="true" -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript" src="switchmenu.js"></script> 
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top" style="background:url(images/bg.jpg) repeat-x top center"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      
      <tr>
        <td align="center"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="300" rowspan="2" align="left" valign="bottom"><a href="index.php"><img src="images/index.png" alt="" width="300" height="70" border="0" /></a></td>
            <td align="right" valign="middle" class="top_txt5a4f3f"><?php HeadLink();?></td>
          </tr>
          <tr>
            <td align="right" valign="middle"><?php HeadMemberAndCart();?></td>
          </tr>
          <tr>
            <td colspan="2" align="center" valign="bottom"><object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="900" height="55">
              <param name="movie" value="swf/menu.swf" />
              <param name="quality" value="high" />
              <param name="wmode" value="transparent" />
              <param name="swfversion" value="6.0.65.0" />
              <!-- 此 param 標籤會提示使用 Flash Player 6.0 r65 和更新版本的使用者下載最新版本的 Flash Player。如果您不想讓使用者看到這項提示，請將其刪除。 -->
              <param name="expressinstall" value="Scripts/expressInstall.swf" />
              <!-- 下一個物件標籤僅供非 IE 瀏覽器使用。因此，請使用 IECC 將其自 IE 隱藏。 -->
              <!--[if !IE]>-->
              <object type="application/x-shockwave-flash" data="swf/menu.swf" width="900" height="55">
                <!--<![endif]-->
                <param name="quality" value="high" />
                <param name="wmode" value="transparent" />
                <param name="swfversion" value="6.0.65.0" />
                <param name="expressinstall" value="Scripts/expressInstall.swf" />
                <!-- 瀏覽器會為使用 Flash Player 6.0 和更早版本的使用者顯示下列替代內容。 -->
                <div>
                  <h4>這個頁面上的內容需要較新版本的 Adobe Flash Player。</h4>
                  <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="取得 Adobe Flash Player" width="112" height="33" /></a></p>
                </div>
                <!--[if !IE]>-->
              </object>
              <!--<![endif]-->
            </object></td>
          </tr>
        </table></td>
      </tr>
      
      <tr>
        <td align="center" valign="top"><!-- InstanceBeginEditable name="content" -->
          <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center" valign="middle"><table width="900" border="0" align="center" cellpadding="5" cellspacing="0">
                <tr>
                  <td height="5"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
                <tr>
                  <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr valign="bottom">
                      <td width="15" height="15" align="right"><img src="images/log_bg_01.png" alt="" width="15" height="15" /></td>
                      <td style="background:url(images/log_bg_02.png) repeat-x bottom">&nbsp;</td>
                      <td width="15" align="left"><img src="images/log_bg_03.png" alt="" width="15" height="15" /></td>
                      </tr>
                    <tr>
                      <td align="right" style="background:url(images/log_bg_04.png) no-repeat right top">&nbsp;</td>
                      <td height="200" valign="top" bgcolor="#FFFFFF" style="background:url(images/log_bg_05.png) repeat-x"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="30" align="left" valign="top"><img src="images/title-05.png" alt="" width="117" height="21" /></td>
                          </tr>
                        <tr>
                          <td height="30" align="left" valign="middle" class="top_txt5a4f3f">　請填寫以下資料，即可成為野遊風會員！</td>
                          </tr>
                        <tr>
                          <td height="220" align="center" valign="middle">
													<FORM METHOD="POST" ACTION="member_join.php" name="frmUser" id="frmUser">
													<INPUT TYPE="hidden" NAME="hdnOp" value="JoinMember">
                          <table border="0" cellspacing="5" cellpadding="0">
                            <tr>
                              <td width="100" align="center" valign="middle" class="title_5a4f3f">中文全名</td>
                              <td width="400" align="left" valign="middle" class="top_txt5a4f3f"><input name="me03" type="text" class="top_txt5a4f3f" id="me03"  style="width:120px"/>
                                <input type="radio" name="me04" id="me04" value="先生" checked />
                                <label for="radio"></label>
                                先生
                                <input type="radio" name="me04" id="me04" value="小姐" />
                                <label for="radio2"></label>
                                小姐</td>
                              </tr>
                            <tr>
                              <td width="100" align="center" valign="middle" class="title_5a4f3f">電子郵件</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><input name="me01" type="text" class="top_txt5a4f3f" id="me01"  style="width:220px"/>
※此為會員帳號，請牢記</td>
                              </tr>
                            <tr>
                              <td width="100" align="center" valign="middle" class="title_5a4f3f">設定密碼</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><input name="me02" type="password" class="top_txt5a4f3f" id="me02"  style="width:120px"/></td>
                              </tr>
                            <tr>
                              <td width="100" align="center" valign="middle" class="title_5a4f3f">確認密碼</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><input name="me02Again" type="password" class="top_txt5a4f3f" id="me02Again"  style="width:120px"/></td>
                              </tr>
                            <tr>
                              <td width="100" align="center" valign="middle" class="title_5a4f3f">認 證 碼</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><img id="siimage" src="LibSecurImage/securimage_show.php?sid=<?php echo md5(time()) ?>" border="1" width="64" height="25" align="absmiddle" /><!-- <img src="images/code.jpg" width="64" height="25" align="absmiddle" /> -->　                                <input name="code" type="text" class="top_txt5a4f3f" id="code"  style="width:100px"/></td>
                              </tr>
                            <tr>
                              <td height="40" align="center" valign="bottom" class="txt13_313131">&nbsp;</td>
                              <td height="40" align="left" valign="middle" class="txt13_313131"><input type="checkbox" name="Agreement[]" id="Agreement[]" />
                                <label for="checkbox">我同意<a href="member_term.php" target="_blank" class="item_name">會員條款</a></label></td>
                              </tr>
                            <tr>
                              <td colspan="2" align="center" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid"><img src="images/li.png" width="1" height="1" /></td>
                              </tr>
                            <tr>
                              <td height="30" colspan="2" align="center" valign="bottom"><table width="100" border="0" cellpadding="0" cellspacing="0" class="btn_bg">
                                <tr>
                                  <td height="30" align="center" valign="middle" class="btn_bg"><!-- <a href="member_join_01.html" class="btn_bg"> --><a href="#" class="btn_bg" onclick="DoSubmit();" >確認送出</a></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table>
                          </FORM></td>
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
                <tr>
                  <td height="15"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
              </table></td>
            </tr>
            </table>
        <!-- InstanceEndEditable --></td>
      </tr>
      
      <tr>
        <td align="center"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="5" colspan="2" align="left" valign="middle"><img src="images/li.png" alt="" width="1" height="1" /></td>
          </tr>
          <tr>
            <td height="5" colspan="2" align="left" valign="middle" style="border-top:#5a4f3f 1px solid"><img src="images/li.png" alt="" width="1" height="1" /></td>
            </tr>
          <tr>
            <td align="left" valign="middle" class="top_txt5a4f3f">戶外玩家有限公司 版權所有 © 2010 Wild Breeze All Rights Reserved. 最佳瀏覽器IE7.0以上<br />
              服務電話：(02)8512-1882    傳真電話：(02)8512-2836    地址：台北縣三重市重新路五段639號1樓 </td>
            <td width="130" align="right" valign="middle"><img src="images/logo.png" width="130" height="50" /></td>
          </tr>
        </table></td>
      </tr>
      
    </table></td>
  </tr>
</table>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>

<SCRIPT LANGUAGE="JavaScript">
<!--
function DoSubmit() {
	sStatus = true;

	if (document.getElementById("me03").value=="") {
		alert("請輸入您的中文全名！");
		document.getElementById('me05').focus();
		sStatus=false;
		return false;
	}
	if (document.getElementById("me01").value=="") {
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
	if (document.getElementById("me02").value=="") {
		alert("請輸入您的密碼！");
		document.getElementById('me02').focus();
		sStatus=false;
		return false;
	}else{
		if(document.getElementById("me02").value.match(/[^0-9a-zA-Z]+/)||document.getElementById("me02").value.length<=3||document.getElementById("me02").value.length>=15){
				alert("密碼必須是3至15個不分大小寫、英文字母、或數字字元！");
				document.getElementById('me02').focus();
				sStatus=false;
				return false;
		}
	}
	if (document.getElementById("me02").value != document.getElementById("me02Again").value) {
		alert("請確認您的密碼是否正確！");
		document.getElementById('me02Again').focus();
		sStatus=false;
		return false;
	}



	var code=document.getElementById("code").value;
	if(code==""){
		alert("請輸入認證碼！");
		document.getElementById('code').focus();
		sStatus=false;
		return false;
	}

	if (document.getElementById("Agreement[]").checked==false) {
			alert("請同意會員條款！");
			sStatus=false;
			return false;
	}

	if (sStatus==true) {
		document.frmUser.submit();
	}

}

AlertErr("<?php echo $sMsg?>");
function AlertErr(sMsg) {
	if (sMsg!="") {
		alert(sMsg);
	}
}
//-->
</SCRIPT>

</body>
<!-- InstanceEnd --></html>
	<?php
}

?>
<?php //**************************************************************************** ?>