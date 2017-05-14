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
//ChkLogin();

ErrorReporting(E_ERROR | E_WARNING | E_PARSE);                    //錯誤回報控制 0關掉 E_ALL全部回報
$action=$_POST["action"];
uLog($action);
// ===========================================================================
// 接收參數宣告
// ===========================================================================
$me01=GetMemID();

// ===========================================================================
// 表單參數宣告
// ===========================================================================

// ===========================================================================
// 資料列表參數宣告
// ===========================================================================

?>
<?php //**************************************************************************** ?>

<?php //*********************************程式邏輯演算********************************* ?>
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
                  <td align="center" valign="middle" bgcolor="#FFFFFF"><img src="images/banner_store.jpg" alt="" width="890" height="130" /></td>
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
                      <td height="25" colspan="3" align="left" valign="top"><span class="top_txt5a4f3f"><a href="#" class="top_txt5a4f3f_a">首頁</a> &gt; </span><span class="root_red">門市據點</span></td>
                      </tr>
                    <tr valign="bottom">
                      <td width="9" align="right"><img src="images/line-02.png" alt="" width="9" height="40" /></td>
                      <td align="left" valign="middle" class="titleB" style="background:url(images/line.png) bottom repeat-x"><img src="images/titlebar.png" alt="" width="10" height="15" align="absmiddle" /> 門市據點</td>
                      <td width="11" align="left"><img src="images/line-03.png" alt="" width="11" height="40" /></td>
                    </tr>
                    <tr>
                      <td rowspan="2" align="right" style="background:url(images/line-04.png) repeat-y right">&nbsp;</td>
                      <td align="center" valign="top" bgcolor="#CDBFA2"><table width="98%" border="0" cellspacing="0" cellpadding="10">
<?php
		$sSQL="select * from storelocations  ";
		$rSQLExec=GetRs($sSQL);

		while($row=mysql_fetch_array($rSQLExec)){

?>

                        <tr>
                          <td width="110" align="center" valign="middle" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid"><table border="0" cellspacing="0" cellpadding="1">
                            <tr>
                              <td width="90" height="90" align="center" valign="middle" bgcolor="#4D4234"><img src="upload/storelocations/<?php  echo $row['sl04']; ?>" alt="" width="90" height="90" /></td>
                            </tr>
                          </table></td>
                          <td align="left" valign="middle"style="border-bottom:#97866d 1px solid"><span class="title_5a4f3f"><?php  echo $row['sl02']; ?></span><br />
                            <span class="top_txt5a4f3f"><?php  echo $row['sl03']; ?></span></td>
                        </tr>
<?php
		}

?>

<!-- 
                        <tr>
                          <td width="110" height="100" align="center" valign="middle" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid"><table border="0" cellspacing="0" cellpadding="1">
                            <tr>
                              <td width="90" height="90" align="center" valign="middle" bgcolor="#4D4234"><img src="images/store_pic01.jpg" alt="" width="90" height="90" /></td>
                              </tr>
                            </table></td>
                          <td align="left" valign="middle"style="border-bottom:#97866d 1px solid"><span class="title_5a4f3f">野遊風-古亭店</span><br />
                            <span class="top_txt5a4f3f">營業時間：AM11:00~PM10:00<br />
                              TEL：(02)2365-7899　FAX：(02)2365-7160<br />
                              北市大安區羅斯福路二段93號1F、B1F<br />
                              (古亭捷運站3號出口直走3分鐘即抵達 第一銀行旁)</span></td>
                        </tr>
                        <tr>
                          <td align="center" valign="middle" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid"><table border="0" cellspacing="0" cellpadding="1">
                            <tr>
                              <td width="90" height="90" align="center" valign="middle" bgcolor="#4D4234"><img src="images/store_pic01.jpg" alt="" width="90" height="90" /></td>
                            </tr>
                          </table></td>
                          <td align="left" valign="middle"style="border-bottom:#97866d 1px solid"><span class="title_5a4f3f">野遊風-古亭店</span><br />
                            <span class="top_txt5a4f3f">營業時間：AM11:00~PM10:00<br />
                              TEL：(02)2365-7899　FAX：(02)2365-7160<br />
                              北市大安區羅斯福路二段93號1F、B1F<br />
                              (古亭捷運站3號出口直走3分鐘即抵達 第一銀行旁)</span></td>
                        </tr>
                        <tr>
                          <td height="100" align="center" valign="middle" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid"><table border="0" cellspacing="0" cellpadding="1">
                            <tr>
                              <td width="90" height="90" align="center" valign="middle" bgcolor="#4D4234"><img src="images/store_pic01.jpg" alt="" width="90" height="90" /></td>
                            </tr>
                          </table></td>
                          <td align="left" valign="middle"style="border-bottom:#97866d 1px solid"><span class="title_5a4f3f">野遊風-古亭店</span><br />
                            <span class="top_txt5a4f3f">營業時間：AM11:00~PM10:00<br />
                              TEL：(02)2365-7899　FAX：(02)2365-7160<br />
                              北市大安區羅斯福路二段93號1F、B1F<br />
                              (古亭捷運站3號出口直走3分鐘即抵達 第一銀行旁)</span></td>
                        </tr>
                        <tr>
                          <td width="110" height="100" align="center" valign="middle" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid"><table border="0" cellspacing="0" cellpadding="1">
                            <tr>
                              <td width="90" height="90" align="center" valign="middle" bgcolor="#4D4234"><img src="images/store_pic01.jpg" alt="" width="90" height="90" /></td>
                            </tr>
                          </table></td>
                          <td align="left" valign="middle"style="border-bottom:#97866d 1px solid"><span class="title_5a4f3f">野遊風-古亭店</span><br />
                            <span class="top_txt5a4f3f">營業時間：AM11:00~PM10:00<br />
                              TEL：(02)2365-7899　FAX：(02)2365-7160<br />
                              北市大安區羅斯福路二段93號1F、B1F<br />
                              (古亭捷運站3號出口直走3分鐘即抵達 第一銀行旁)</span></td>
                        </tr> -->


										
                        </table></td>
                      <td rowspan="2" align="left" style="background:url(images/line-05.png) left repeat-y">&nbsp;</td>
                    </tr>
                    <tr valign="top">
                      <td height="10" bgcolor="#CDBFA2"><img src="images/li.png" alt="" width="1" height="1" /></td>
                      </tr>
                    <tr valign="top">
                      <td width="9" align="right"><img src="images/line_2.png" alt="" width="9" height="35" align="right" /></td>
                      <td align="center" valign="middle" style="background:url(images/line_2-02.png) repeat-x top">&nbsp;</td>
                      <td align="left"><img src="images/line_2-03.png" alt="" width="11" height="35" /></td>
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
