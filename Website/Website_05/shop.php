<?php //*********************************模組檔案引入********************************* ?>
<?php include("Module/pUwm.php"); ?>
<?php //**************************************************************************** ?>

<?php //*********************************前置變數定義********************************* ?>
<?php
// ===========================================================================
// 初始化參數宣告
// ===========================================================================
ErrorReporting(E_ERROR | E_WARNING | E_PARSE);                    //錯誤回報控制 0關掉 E_ALL全部回報
$local="熱門商品下方廣告";
$local2="最新商品下方廣告";


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







?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

?>
<?php //**************************************************************************** ?>
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
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
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
              <td width="220" align="left" valign="top"><table width="220" border="0" align="left" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center" valign="top"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="right" valign="bottom"><img src="images/ad.png" alt="" width="10" height="10" /></td>
                      <td height="21" valign="bottom" style="background:url(images/ad-10.png) repeat-x bottom">&nbsp;</td>
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
                  <td align="center" valign="top"><?php Property();?>
									<!-- <table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td colspan="3" align="center" valign="bottom"><img src="images/catalog.png" alt="" width="220" height="35" /></td>
                      </tr>
                    <tr>
                      <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>
                      <td width="200" align="center" bgcolor="#C9BDA2">
											<table width="100%" border="0" cellspacing="5" cellpadding="0">
                        <tr>
                          <td align="left" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">服飾區</td>
                          </tr>
                        <tr>
                          <td align="left" valign="middle" style="border-bottom:#97866d 1px dotted">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="25" align="left" valign="middle"><a href="shop_catalog.html" class="item_name">男款 Men</a></td>
                            </tr>
                            <tr>
                              <td height="25" align="left" valign="middle"><a href="#" class="item_name">女款 Women</a></td>
                              </tr>
                            <tr>
                              <td height="25" align="left" valign="middle"><a href="#" class="item_name">兒童款 Kid</a></td>
                            </tr>
                            </table></td>
                          </tr>
                        <tr>
                          <td align="left" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">裝備區</td>
                          </tr>
                        <tr>
                          <td align="left" valign="middle" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="25" align="left" valign="middle"><a href="#" class="item_name">水類</a></td>
                              </tr>
                            <tr>
                              <td height="25" align="left" valign="middle"><a href="#" class="item_name">攀岩類</a></td>
                              </tr>
                            <tr>
                              <td height="25" align="left" valign="middle"><a href="#" class="item_name">自行車類</a></td>
                              </tr>
                            <tr>
                              <td height="25" align="left" valign="middle"><a href="#" class="item_name">RV 裝備類</a></td>
                              </tr>
                            <tr>
                              <td height="25" align="left" valign="middle"><a href="#" class="item_name">旅遊類</a></td>
                              </tr>
                            <tr>
                              <td height="25" align="left" valign="middle"><a href="#" class="item_name">登山露營類</a></td>
                              </tr>
                            </table></td>
                          </tr>
                        <tr>
                          <td align="left" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">鞋襪區</td>
                          </tr>
                        <tr>
                          <td align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="25" align="left" valign="middle"><a href="#" class="item_name">鞋子類</a></td>
                              </tr>
                            <tr>
                              <td height="25" align="left" valign="middle"><a href="#" class="item_name">襪子類</a></td>
                              </tr>
                            </table></td>
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
                <tr>
                  <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>
                  </tr>
                <tr>
                  <td align="center" valign="middle"><?php CommendProduct();?>
									<!-- <table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td colspan="3" align="center" valign="bottom"><img src="images/mustbuy.png" alt="" width="220" height="35" /></td>
                      </tr>
                    <tr>
                      <td rowspan="3" align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>
                      <td width="200" align="center" bgcolor="#e2e2e2" style="border-bottom:#97866d 1px dotted"><table width="190" border="0" cellspacing="5" cellpadding="0">
                        <tr>
                          <td colspan="2" align="left" valign="top" class="txtB_5a4f3f"><a href="shop_intro.html" class="txtB_5a4f3f">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>
                          </tr>
                        <tr>
                          <td align="center" valign="middle"><div style="border:1px solid #5a4f3f"><a href="shop_intro.html"><img src="images/item_pic01.jpg" alt="" width="89" height="89" border="0" align="absmiddle" /></a></div></td>
                          <td align="left" valign="top" class="top_txt5a4f3f">◆最高規格防風防水透氣GORE-TEX Paclite Shell布料 ...</td>
                          </tr>
                        <tr>
                          <td height="25" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr valign="middle">
                              <td align="left"><img src="images/more_01.png" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="shop_intro.html" class="top_txt5a4f3f_a">詳細說明</a></td>
                              <td align="right"><img src="images/cart_01.png" alt="" width="17" height="16" /> <a href="cart_01.html" class="top_txt5a4f3f_a">放入購物車</a></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
                      <td rowspan="3" align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>
                      </tr>
                    <tr>
                      <td align="center" bgcolor="#e2e2e2" style="border-bottom:#97866d 1px dotted"><table width="190" border="0" cellspacing="5" cellpadding="0">
                        <tr>
                          <td colspan="2" align="left" valign="top" class="txtB_5a4f3f"><a href="#" class="txtB_5a4f3f">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>
                          </tr>
                        <tr>
                          <td align="center" valign="middle"><div style="border:1px solid #5a4f3f"><a href="#"><img src="images/item_pic01.jpg" alt="" width="89" height="89" border="0" align="absmiddle" /></a></div></td>
                          <td align="left" valign="top" class="top_txt5a4f3f">◆最高規格防風防水透氣GORE-TEX Paclite Shell布料 ...</td>
                          </tr>
                        <tr>
                          <td height="25" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr valign="middle">
                              <td align="left"><img src="images/more_01.png" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>
                              <td align="right"><img src="images/cart_01.png" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
                      </tr>
                    <tr>
                      <td align="center" bgcolor="#e2e2e2" style="border-bottom:#97866d 1px dotted"><table width="190" border="0" cellspacing="5" cellpadding="0">
                        <tr>
                          <td colspan="2" align="left" valign="top" class="txtB_5a4f3f"><a href="#" class="txtB_5a4f3f">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>
                          </tr>
                        <tr>
                          <td align="center" valign="middle"><div style="border:1px solid #5a4f3f"><a href="#"><img src="images/item_pic01.jpg" alt="" width="89" height="89" border="0" align="absmiddle" /></a></div></td>
                          <td align="left" valign="top" class="top_txt5a4f3f">◆最高規格防風防水透氣GORE-TEX Paclite Shell布料 ...</td>
                          </tr>
                        <tr>
                          <td height="25" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr valign="middle">
                              <td align="left"><img src="images/more_01.png" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>
                              <td align="right"><img src="images/cart_01.png" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
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
                </table></td>
              <td align="right" valign="top"><table width="660" border="0" align="right" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="10"><img src="images/li.png" width="1" height="1" /></td>
                  </tr>
                <tr>
                  <td><object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="660" height="230">
                    <param name="movie" value="swf/ad.swf" />
                    <param name="quality" value="high" />
                    <param name="wmode" value="transparent" />
                    <param name="swfversion" value="8.0.35.0" />
                    <!-- 此 param 標籤會提示使用 Flash Player 6.0 r65 和更新版本的使用者下載最新版本的 Flash Player。如果您不想讓使用者看到這項提示，請將其刪除。 -->
                    <param name="expressinstall" value="Scripts/expressInstall.swf" />
                    <!-- 下一個物件標籤僅供非 IE 瀏覽器使用。因此，請使用 IECC 將其自 IE 隱藏。 -->
                    <!--[if !IE]>-->
                    <object type="application/x-shockwave-flash" data="swf/ad.swf" width="660" height="230">
                      <!--<![endif]-->
                      <param name="quality" value="high" />
                      <param name="wmode" value="transparent" />
                      <param name="swfversion" value="8.0.35.0" />
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
                <tr>
                  <td height="20"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
                <tr>
                  <td>
									<?php HotProductList();?><!-- <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
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
                  <td height="15"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
                <tr>
                  <td><a href="<?php echo websitebanner($local,"Url"); ?>" target="_blank"> <img src="upload/websitebanner/<?php echo websitebanner($local,"Pic"); ?>" alt="" width="660" height="110" border="0" /></a></td>
                </tr>
                <tr>
                  <td>
									<?php OnSellProsuct(); ?><!-- <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
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
                  <td>
									<?php NewProduct();?><!-- <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
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
                  <td height="15"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
                <tr>
                  <td><a href="<?php echo websitebanner($local,"Url"); ?>" target="_blank" ><img src="upload/websitebanner/<?php echo websitebanner($local2,"Pic"); ?>" alt="" width="660" height="110" border="0" /></a></td>
                </tr>
                <tr>
                  <td height="15"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
                </table></td>
              </tr>
          </table>
          <script type="text/javascript">
swfobject.registerObject("FlashID2");
          </script>
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
