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
$ID=$_POST["me01"];
$Pwd=$_POST["me02"];
$KeepIdPwd=$_POST["KeepIdPwd"];

uLog("me01 == [".$me01."]");
uLog("me02 == [".$me02."]");
uLog("KeepIdPwd == [".$KeepIdPwd."]");

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
case 'LoginMember':
	uLog("switch Insert");
	
	$ID=Replace($ID, "--", "");
	$ID=Replace($ID, ";", "");
	$Pwd=Replace($Pwd, "--", "");
	$Pwd=Replace($Pwd, ";", "");
	uLog("ID == [".$ID."]");
	uLog("Pwd == [".$Pwd."]");

	$sSQL="select * from member where me01='".$ID."' and (1=1);";
	uLog("sSQL == " . $sSQL);
	$rRs=GetRs($sSQL);
	$iRsRows=mysql_num_rows($rRs);
	uLog("iRsRows == " . $iRsRows);
	if ($iRsRows>0) {
		$aRows=mysql_fetch_array($rRs, MYSQL_ASSOC);
		$sDBID=$aRows["me01"];
		$sDBPwd=$aRows["me02"];
		$sName=$aRows["me03"];

		uLog("sDBID == " . $sDBID);
		uLog("sDBPwd == " . $sDBPwd);
		if ($sDBID==$ID && $sDBPwd==$Pwd) {
			//轉移到其它頁面
			$_SESSION["MemID"]=$sDBID;
			$_SESSION["MemPwd"]=$sDBPwd;
			$_SESSION["MemName"]=$sName;
			
			uLog("id, pwd正確，準備寫入cookies");
			if ($KeepIdPwd=="on") {
				uLog("寫入cookies");
				setcookie("CookieId", $sDBID, time()+2592000);     //3600秒=1小時
				setcookie("CookiePwd", $sDBPwd, time()+2592000);   //3600秒=1小時
			}

			$sUrl="http://".GetServerHostName()."/".GetPathProjectV()."index.php";
			uLog("sUrl == ".$sUrl);
			header("location:".$sUrl);
		} else {
			$sMsg="帳號、密碼錯誤，請重新輸入！";
		}
	} else {
		$sMsg="帳號、密碼錯誤，請重新輸入！";
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
              <td align="center" valign="top"><table width="900" border="0" align="center" cellpadding="5" cellspacing="0">
                <tr>
                  <td height="5"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
                <tr valign="middle">
                  <td height="200" align="center"><table width="350" border="0" cellspacing="0" cellpadding="0">
                    <tr valign="bottom">
                      <td width="15" height="15" align="right"><img src="images/log_bg_01.png" width="15" height="15" /></td>
                      <td style="background:url(images/log_bg_02.png) repeat-x bottom">&nbsp;</td>
                      <td width="15" align="left"><img src="images/log_bg_03.png" width="15" height="15" /></td>
                      </tr>
                    <tr>
                      <td align="right" style="background:url(images/log_bg_04.png) no-repeat right top">&nbsp;</td>
                      <td height="105" style="background:url(images/log_bg_05.png) repeat-x"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="30" align="left" valign="top"><img src="images/title-04.png" width="124" height="21" /></td>
                          </tr>
                        <tr>
                          <td height="75" align="center" valign="bottom"><FORM METHOD="POST" ACTION="member_login.php" name="frmUser" id="frmUser"><INPUT TYPE="hidden" NAME="hdnOp" value="LoginMember">
                          <table border="0" cellpadding="0" cellspacing="3">
                            <tr>
															<?php
															$sInputId="";
															$sInputPwd="";
															uLog("HTTP_COOKIE_VARS['CookieId'] == [".$_COOKIE["CookieId"]."]");
															uLog("HTTP_COOKIE_VARS['CookiePwd'] == [".$_COOKIE["CookiePwd"]."]");
															if ($_COOKIE["CookieId"]!="") {
																$sInputId=$_COOKIE["CookieId"];
																$sInputPwd=$_COOKIE["CookiePwd"];
															}	
															?>
                              <td width="50" align="center" class="title_5a4f3f">帳號</td>
                              <td align="left"><label for="textfield"></label>
                                <input name="me01" type="text" class="top_txt5a4f3f" id="me01"  style="width:120px" value="<?php echo $sInputId;?>"/></td>
                              <td width="65" rowspan="2" align="right" valign="middle"><a href="#" onclick="DoSubmit();" ><img src="images/log.jpg" alt="" width="54" height="40" border="0" /></a></td>
                              </tr>
                            <tr>
                              <td align="center" class="title_5a4f3f">密碼</td>
                              <td align="left"><input name="me02" type="password" class="top_txt5a4f3f" id="me02"  style="width:120px" value="<?php echo $sInputPwd;?>"/></td>
                              </tr>
                            <tr>
                              <td align="right" class="title_5a4f3f">&nbsp;</td>
                              <td height="23" align="left" valign="bottom"><a href="member_pw.php" class="top_txt5a4f3f_a">忘記密碼</a>　
																<?php
																$sCheckStatus="";
																if ($_COOKIE["CookieId"]!="") {
																	$sCheckStatus="checked";
																}	
																?>
																<input name="KeepIdPwd" type="checkbox" class="top_txt5a4f3f" id="KeepIdPwd" <?php echo $sCheckStatus;?>/>
                                <span class="top_txt5a4f3f">記住我</span></td>
                              <td align="right" valign="middle">&nbsp;</td>
                              </tr>
                            </table>
                          </FORM></td>
                          </tr>
                        </table></td>
                      <td align="left" style="background:url(images/log_bg_06.png) no-repeat left top">&nbsp;</td>
                      </tr>
                    <tr valign="top">
                      <td height="15" align="right"><img src="images/log_bg_07.png" width="15" height="15" /></td>
                      <td style="background:url(images/log_bg_08.png) top repeat-x">&nbsp;</td>
                      <td align="left"><img src="images/log_bg_09.png" width="15" height="15" /></td>
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