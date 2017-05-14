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
$aEvent=GetNewEvent();
MainPage($aEvent);
uLog("a".$aEvent['ev02']);
?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

function GetNewEvent() {
	$sSQL="select * from events where ev13='是' and ev17<now() and ev18 > now() limit 0,1";
	$result=GetRs($sSQL);
	$aEvent=array();
	while($row=mysql_fetch_array($result)) {
		$aEvent['ev01']=$row['ev01'];
		$aEvent['ev02']=$row['ev02'];
		$aEvent['ev04']=$row['ev04'];
	}
	return $aEvent;
}

function MainPage($aEvent) {
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
              <td colspan="2" align="center" valign="middle"><table width="900" border="0" align="center" cellpadding="5" cellspacing="0">
                <tr>
                  <td height="5"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><img src="upload/websitebanner/<?php echo websitebanner("首頁上方廣告","Pic"); ?>"" alt="" width="890" height="270" /></td>
                </tr>
                <tr>
                  <td height="15"><img src="images/li.png" width="1" height="1" /></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td width="220" align="left" valign="top"><table width="220" border="0" align="left" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center" valign="top"><a href="message.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','images/btn_good_001.png',1)"><img src="images/btn_good_01.png" name="Image8" width="220" height="60" border="0" id="Image8" /></a></td>
                </tr>
                <tr>
                  <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
                <tr>
                  <td align="center" valign="middle"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="right" valign="bottom"><img src="images/ad.png" width="10" height="10" /></td>
                      <td valign="bottom" style="background:url(images/ad-10.png) repeat-x bottom">&nbsp;</td>
                      <td align="left" valign="bottom"><img src="images/ad-11.png" width="10" height="10" /></td>
                      </tr>
                    <tr>
                      <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>
                      <td width="200" bgcolor="#cabda1"><a href="#" target="_blank"><img src="images/ad_pic01.jpg" width="200" height="135" border="0" /></a></td>
                      <td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>
                      </tr>
                    <tr>
                      <td align="right" valign="top"><img src="images/ad-16.png" width="10" height="9" /></td>
                      <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>
                      <td align="left" valign="top"><img src="images/ad-18.png" width="10" height="9" /></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
                <tr>
                  <td align="center" valign="middle"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td colspan="3" align="center" valign="bottom"><img src="images/event.png" width="220" height="35" /></td>
                      </tr>
                    <tr>
                      <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>
                      <td width="200" bgcolor="#cabda1"><table width="200" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="20" align="left" valign="top" class="txtB_5a4f3f"><a href="event_01.php?ev01=<?php echo $aEvent['ev01'];?>" class="txtB_5a4f3f"><?php echo $aEvent['ev02'];?><!-- 2010年11、12月份野遊風活動－ --></a></td>
                          </tr>
                        <tr>
                          <td><a href="event_01.php?ev01=<?php echo $aEvent['ev01'];?>"><img src="upload/events/<?php echo $aEvent['ev04'];?>" width="200" height="151" border="0" /></a></td>
                          </tr>
                        <tr>
                          <td align="right" valign="top"><div style="width:40px; height:15px; margin:auto; float:right; background:#5a4f3f"><a href="event.php"><img src="images/more.png" alt="" width="40" height="15" border="0" /></a></div></td>
                          </tr>
                        </table></td>
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
                  <td align="center" valign="middle"><?php News(); ?>
									<!-- <table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td colspan="3" align="center" valign="bottom"><img src="images/news.png" width="220" height="35" /></td>
                      </tr>
                    <tr>
                      <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>
                      <td width="200" bgcolor="#cabda1">
											<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="20" align="left" valign="top" class="top_txt5a4f3f">‧</td>
                          <td height="22" align="left" valign="top" class="txtB_5a4f3f"><a href="news_01.html" class="news_txt5a4f3f_a">2010年11、12月份野遊風活動－</a></td>
                          </tr>
                        <tr>
                          <td height="20" align="left" valign="top" class="top_txt5a4f3f">‧</td>
                          <td height="22" align="left" valign="top" class="txtB_5a4f3f"><a href="news_01.html" class="news_txt5a4f3f_a">2010年11、12月份野遊風活動－</a></td>
                          </tr>
                        <tr>
                          <td height="20" align="left" valign="top" class="top_txt5a4f3f">‧</td>
                          <td height="22" align="left" valign="top" class="txtB_5a4f3f"><a href="news_01.html" class="news_txt5a4f3f_a">2010年11、12月份野遊風活動－</a></td>
                          </tr>
                        <tr>
                          <td height="20" align="left" valign="top" class="top_txt5a4f3f">‧</td>
                          <td height="22" align="left" valign="top" class="txtB_5a4f3f"><a href="news_01.html" class="news_txt5a4f3f_a">2010年11、12月份野遊風活動－</a></td>
                          </tr>
                        <tr>
                          <td height="20" align="left" valign="top" class="top_txt5a4f3f">‧</td>
                          <td height="22" align="left" valign="top" class="txtB_5a4f3f"><a href="news_01.html" class="news_txt5a4f3f_a">2010年11、12月份野遊風活動－</a></td>
                          </tr>
                        <tr>
                          <td colspan="2" align="right" valign="top"><div style="height:1px;  background:#5a4f3f"></div></td>
                          </tr>
                        <tr>
                          <td colspan="2" align="right" valign="top" class="top_txt5a4f3f"><div style="width:40px; height:15px; margin:auto; float:right; background:#5a4f3f"><a href="news.html"><img src="images/more.png" width="40" height="15" border="0" /></a></div></td>
                          </tr>
                        </table>
												</td>
                      <td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>
                      </tr>
                    <tr>
                      <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>
                      <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>
                      <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>
                      </tr>
                    </table> --></td>
                </tr>
                <tr>
                  <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
                <tr>
                  <td align="center" valign="middle"><?php Brands();?>
									<!-- <table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td colspan="3" align="center" valign="bottom"><img src="images/brand.png" width="220" height="35" /></td>
                      </tr>
                    <tr>
                      <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>
                      <td width="200" bgcolor="#cabda1"><table width="200" border="0" cellspacing="5" cellpadding="0">
                        <tr>
                          <td align="center" valign="top"><a href="#"><img src="images/brand_pic01.jpg" width="190" height="80" border="0" /></a></td>
                          </tr>
                        <tr>
                          <td height="85" align="center" valign="bottom"><a href="#"><img src="images/brand_pic02.jpg" width="190" height="80" border="0" /></a></td>
                          </tr>
                        </table></td>
                      <td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>
                      </tr>
                    <tr>
                      <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>
                      <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>
                      <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>
                      </tr>
                    </table> --></td>
                </tr>
              </table></td>
              <td align="right" valign="top"><table width="660" border="0" align="right" cellpadding="0" cellspacing="0">
                <tr>
                  <td><?php HotProductList();?>
									<!-- <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="30" align="right" valign="bottom" style="background:url(images/title.png) no-repeat left bottom"><a href="shop_hot.html" class="top_txt5a4f3f_a">更多熱門商品&gt;&gt;</a></td>
                    </tr>
                    <tr>
                      <td height="190" align="center" valign="bottom" bgcolor="#F1ECE6"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="180" align="center" valign="middle"><img src="images/image.jpg" alt="" width="160" height="180" /></td>
                          <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="shop_intro.html"><img src="images/item_pic01.jpg" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>
                            </tr>
                            <tr>
                              <td height="30" align="center" valign="bottom"><a href="shop_intro.html" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>
                            </tr>
                          </table></td>
                          <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="images/item_pic01.jpg" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>
                            </tr>
                            <tr>
                              <td height="30" align="center" valign="bottom"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>
                            </tr>
                          </table></td>
                          <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="images/item_pic01.jpg" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>
                            </tr>
                            <tr>
                              <td height="30" align="center" valign="bottom"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top" bgcolor="#FFFFFF"><img src="images/item_bg.jpg" alt="" width="660" height="10" /></td>
                    </tr>
                  </table> --></td>
                </tr>
                <tr>
                  <td><?php OnSellProsuct(); ?>
									<!-- <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="50" align="right" valign="bottom" style="background:url(images/title-02.png) no-repeat left bottom"><a href="#" class="top_txt5a4f3f_a">更多促銷商品&gt;&gt;</a></td>
                    </tr>
                    <tr>
                      <td height="190" align="center" valign="bottom" bgcolor="#F1ECE6"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="180" align="center" valign="middle"><img src="images/image.jpg" alt="" width="160" height="180" /></td>
                          <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="images/item_pic01.jpg" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>
                            </tr>
                            <tr>
                              <td height="30" align="center" valign="bottom"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>
                            </tr>
                          </table></td>
                          <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="images/item_pic01.jpg" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>
                            </tr>
                            <tr>
                              <td height="30" align="center" valign="bottom"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>
                            </tr>
                          </table></td>
                          <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="images/item_pic01.jpg" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>
                            </tr>
                            <tr>
                              <td height="30" align="center" valign="bottom"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top" bgcolor="#FFFFFF"><img src="images/item_bg.jpg" alt="" width="660" height="10" /></td>
                    </tr>
                  </table> --></td>
                </tr>
                <tr>
                  <td><?php NewProduct();?>
									<!-- <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="50" align="right" valign="bottom" style="background:url(images/title-03.png) no-repeat left bottom"><a href="#" class="top_txt5a4f3f_a">更多最新商品&gt;&gt;</a></td>
                    </tr>
                    <tr>
                      <td height="190" align="center" valign="bottom" bgcolor="#F1ECE6"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="180" align="center" valign="middle"><img src="images/image.jpg" alt="" width="160" height="180" /></td>
                          <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="images/item_pic01.jpg" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>
                            </tr>
                            <tr>
                              <td height="30" align="center" valign="bottom"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>
                            </tr>
                          </table></td>
                          <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="images/item_pic01.jpg" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>
                            </tr>
                            <tr>
                              <td height="30" align="center" valign="bottom"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>
                            </tr>
                          </table></td>
                          <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="images/item_pic01.jpg" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>
                            </tr>
                            <tr>
                              <td height="30" align="center" valign="bottom"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top" bgcolor="#FFFFFF"><img src="images/item_bg.jpg" alt="" width="660" height="10" /></td>
                    </tr>
                  </table> --></td>
                </tr>
                <tr>
                  <td><?php Picnicspot();?>
									<!-- <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="50" colspan="3" align="right" valign="bottom" style="background:url(images/spot.png) no-repeat left bottom"><a href="#" class="top_txt5a4f3f_a">更多精采勝地&gt;&gt;</a></td>
                    </tr>
                    <tr>
                      <td height="130" align="right" valign="bottom"><img src="images/spot_bg.png" alt="" width="10" height="130" /></td>
                      <td align="center" valign="bottom" style="background:url(images/spot_bg-02.png) repeat-x"><table width="640" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr valign="middle">
                          <td align="center"><table width="130" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="130" height="100" align="center" valign="middle" bgcolor="#FFFFFF"><a href="#"><img src="images/spot_pic01.jpg" alt="" width="120" height="90" border="0" align="absmiddle" /></a></td>
                            </tr>
                            <tr>
                              <td height="25" align="center" valign="middle"><a href="#" class="spot_txt_a">龍洞浮潛</a></td>
                            </tr>
                          </table></td>
                          <td align="center"><table width="130" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="130" height="100" align="center" valign="middle" bgcolor="#FFFFFF"><a href="#"><img src="images/spot_pic02.jpg" alt="" width="120" height="90" border="0" align="absmiddle" /></a></td>
                            </tr>
                            <tr>
                              <td height="25" align="center" valign="middle"><a href="#" class="spot_txt_a">巴福越嶺</a></td>
                            </tr>
                          </table></td>
                          <td align="center"><table width="130" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="130" height="100" align="center" valign="middle" bgcolor="#FFFFFF"><a href="#"><img src="images/spot_pic03.jpg" alt="" width="120" height="90" border="0" align="absmiddle" /></a></td>
                            </tr>
                            <tr>
                              <td height="25" align="center" valign="middle"><a href="#" class="spot_txt_a">苗栗鑽石林露營</a></td>
                            </tr>
                          </table></td>
                          <td align="center"><table width="130" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="130" height="100" align="center" valign="middle" bgcolor="#FFFFFF"><a href="#"><img src="images/spot_pic04.jpg" alt="" width="120" height="90" border="0" align="absmiddle" /></a></td>
                            </tr>
                            <tr>
                              <td height="25" align="center" valign="middle"><a href="#" class="spot_txt_a">蘇花古道連走朝陽步道 </a></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                      <td align="left" valign="bottom"><img src="images/spot_bg-03.png" alt="" width="10" height="130" /></td>
                    </tr>
                  </table> --></td>
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