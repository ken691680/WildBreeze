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

// ===========================================================================
// 接收參數宣告
// ===========================================================================
$ne01=$_GET["ne01"];

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
MainPage($ne01);

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php
function MainPage($ne01) {
	$ne02="";
	$ne03="";
	$ne04="";
	$ne05="";
	$ne06="";
	$lasttime="";

	$sSQLCountry="select * from news where ne01='".$ne01."' and now()>=ne05 and now()<=ne06 and (1=1);";
	uLog("sSQLCountry == [".$sSQLCountry."]");

	$rRs=GetRs($sSQLCountry);
	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$ne02=Trim($row["ne02"]);
		$ne03=Trim($row["ne03"]);
		$ne04=Trim($row["ne04"]);
		$ne05=Trim($row["ne05"]);
		$ne06=Trim($row["ne06"]);
		$lasttime=Left(Trim($row["lasttime"]), 10);
	}
	mysql_free_result($rRs);
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
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
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

<body onload="MM_preloadImages('images/btn_good_001.png')">
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
                  <td align="center" valign="middle" bgcolor="#FFFFFF"><img src="images/banner_news.jpg" alt="" width="890" height="130" /></td>
                </tr>
                <tr>
                  <td height="15"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="center" valign="top"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="220" align="left" valign="top"><table width="220" border="0" align="left" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="center" valign="top"><a href="message.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','images/btn_good_001.png',1)"><img src="images/btn_good_01.png" alt="" name="Image8" width="220" height="60" border="0" id="Image8" /></a></td>
                    </tr>
                    <tr>
                      <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>
                    </tr>
                    <tr>
                      <td align="center" valign="middle"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="right" valign="bottom"><img src="images/ad.png" alt="" width="10" height="10" /></td>
                          <td valign="bottom" style="background:url(images/ad-10.png) repeat-x bottom">&nbsp;</td>
                          <td align="left" valign="bottom"><img src="images/ad-11.png" alt="" width="10" height="10" /></td>
                        </tr>
                        <tr>
                          <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>
                          <td width="200" bgcolor="#cabda1"><a href="#" target="_blank"><img src="images/ad_pic01.jpg" alt="" width="200" height="135" border="0" /></a></td>
                          <td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>
                          <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>
                          <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>
                    </tr>
                    <tr>
                      <td align="center" valign="middle"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="right" valign="bottom"><img src="images/ad.png" alt="" width="10" height="10" /></td>
                          <td valign="bottom" style="background:url(images/ad-10.png) repeat-x bottom">&nbsp;</td>
                          <td align="left" valign="bottom"><img src="images/ad-11.png" alt="" width="10" height="10" /></td>
                          </tr>
                        <tr>
                          <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>
                          <td width="200" bgcolor="#cabda1"><a href="#" target="_blank"><img src="images/ad_pic01.jpg" alt="" width="200" height="135" border="0" /></a></td>
                          <td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>
                          </tr>
                        <tr>
                          <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>
                          <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>
                          <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>
                    </tr>
                    </table></td>
                  <td align="right" valign="top"><table width="660" border="0" align="right" cellpadding="0" cellspacing="0">
                    <tr valign="bottom">
                      <td height="25" colspan="3" align="left" valign="top"><span class="top_txt5a4f3f"><a href="index.php" class="top_txt5a4f3f_a">首頁</a> &gt; </span><span class="root_red">最新消息</span></td>
                    </tr>
                    <tr valign="bottom">
                      <td width="9" align="right"><img src="images/line-02.png" alt="" width="9" height="40" /></td>
                      <td align="left" valign="middle" class="titleB" style="background:url(images/line.png) bottom repeat-x"><img src="images/titlebar.png" width="10" height="15" align="absmiddle" /> <!-- 慶祝Wild Breeze網站正式上線，凡加入會員即可享受獨享好禮！ --><?php echo $ne02;?></td>
                      <td width="11" align="left"><img src="images/line-03.png" alt="" width="11" height="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" style="background:url(images/line-04.png) repeat-y right">&nbsp;</td>
                      <td align="left" valign="top" bgcolor="#CDBFA2" class="txt13_313131"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                        <tr>
                          <td align="left" valign="top"><?php
													if (Trim($ne04)=="") {
														?>&nbsp;<?php
													} else {
														?><img src="upload/news/<?php echo $ne04;?>" width="300" /><?php
													}
													?><!-- <img src="images/news_pic01.jpg" width="300" height="200" /> --></td>
                          <td align="left" valign="top"><?php echo $ne03;?><!-- 台北的亞馬遜--哈盆古道原住民文化體驗
~~登山新手絕佳的山野體驗！
                            <br />
                            爬山老手新鮮的獵人嘗試！
一個不容錯過的難得經驗，想要、就趕快來！
                            <br />
< 獵人體驗真有趣 >
    一趟豐富充實的原住民傳統文化之旅，搭配簡短的行程規劃，還有獵人嚮導一路與您說說笑笑，從動植物生態講解到原住民傳統器具使用，都有詳盡且有趣的介紹。中午獵人還會教您如何烹煮山產野菜，在溪邊享用一頓豐盛的原住民風味佳餚。
    獵人的幽默，獵人的智慧，獵人的談笑風生，更能引領您融入大自然，進而忘卻行走的辛勞。讓登山健行不再只是埋頭苦行，而是一場生態與人文的饗宴。
    野遊風戶外休閒專業團隊將帶您遠離塵囂，走入山林，投向大自然的懷抱。為喜愛戶外活動的您量身打造一趟原始卻易親近的台北亞馬遜之旅—哈盆古道原住民文化體驗一日健行。 --></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="25" align="right" valign="bottom" style="border-top:1px solid #97866d"><a href="news.php" class="top_txt5a4f3f_a">回列表</a></td>
                            </tr>
                          </table></td>
                          </tr>
                      </table></td>
                      <td align="left" style="background:url(images/line-05.png) left repeat-y">&nbsp;</td>
                    </tr>
                    <tr valign="top">
                      <td align="right"><img src="images/line-06.png" alt="" width="9" height="10" align="right" /></td>
                      <td style="background:url(images/line-07.png) repeat-x top">&nbsp;</td>
                      <td align="left"><img src="images/line-08.png" alt="" width="11" height="10" /></td>
                    </tr>
                    <tr valign="top">
                      <td height="20" colspan="3" align="right"><img src="images/li.png" alt="" width="1" height="1" /></td>
                    </tr>
                  </table></td>
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
</body>
<!-- InstanceEnd --></html>
	<?php
}

?>
<?php //**************************************************************************** ?>