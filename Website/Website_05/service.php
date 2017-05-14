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

$aservice['code']=$_POST['code'];
$aservice['sr02']=$_POST['sr02'];
$aservice['sr05']=$_POST['sr05'];
$aservice['sr03']=$_POST['sr03'];
$aservice['sr06']=$_POST['sr06'];

uLog("aservice[sr03]==".$aservice['sr03']);
uLog("aservice[sr02]==".$aservice['sr02']);
// ===========================================================================
// 資料列表參數宣告
// ===========================================================================

?>
<?php //**************************************************************************** ?>

<?php //*********************************程式邏輯演算********************************* ?>
<?php


if($action=="service") {
	servicecode($aservice);
}

function servicecode($aservice) {
	$img = new Securimage();
	$valid = $img->check($aservice['code']);
	if($valid==true) {
		$sr01=GetDateTimeCE().GetMicroTime();
		$sSQL="INSERT INTO servicerecord(sr01,sr02,sr03,sr04,sr05,sr06,sr07,me01,lasttime) VALUES ('". $sr01."','".$aservice['sr02']."','".$aservice['sr03']."','否','".$aservice['sr05']."','".$aservice['sr06']."','','".GetMemID()."', now())";
		GetRs($sSQL);
		jsAlert("新增成功!");
	} else {
		jsAlert("驗證碼錯誤!請重新輸入!");
	}
	
}


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

<body onload="MM_preloadImages('images/btn_good_001.png')">



<form id="serviceForm" name="serviceForm" action="service.php" method="POST">
<input type="hidden"  id="action" name="action">



<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top" style="background:url(images/bg.jpg) repeat-x top center"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      
      <tr>
        <td align="center"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="300" rowspan="2" align="left" valign="bottom"><a href="index.php"><img src="images/index.png" alt="" width="300" height="70" border="0" /></a></td>
						<td align="right" valign="middle" class="top_txt5a4f3f"><?php HeadLink();?></td>
            <!-- <td align="right" valign="middle" class="top_txt5a4f3f"><a href="member_login.html" class="top_txt5a4f3f_a">登入</a>│<a href="member_join.html" class="top_txt5a4f3f_a">加入會員</a>│<a href="qa.html" class="top_txt5a4f3f_a">購物說明</a>│<a href="member_01_1.html" class="top_txt5a4f3f_a">訂單查詢</a>│<a href="http://www.facebook.com/pages/野遊風-戶外休閒用品館/114711665231623" target="_blank"><img src="images/icon_fb.png" width="14" height="14" border="0" align="middle" /></a></td> -->
          </tr>
          <tr>
					<td align="right" valign="middle"><?php HeadMemberAndCart();?></td>
            <!-- <td align="right" valign="middle"><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="top_txtc9bc9c"><div style="margin-right:5px; float:none">
                  <div class="top_txt5a4f3f" style=" margin:auto; margin-right:10px; float:left">賴志明</div>
                  您好，歡迎來到野遊風。</div></td>
                <td align="right" valign="middle"><table width="185" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td rowspan="3" align="right" valign="middle"><img src="images/index-03.jpg" width="5" height="25" /></td>
                    <td colspan="2" valign="bottom" style="border-top:1px solid #5a4f3f"><div style="height:1px"></div></td>
                    <td rowspan="3" align="left" valign="middle"><img src="images/index-05.jpg" width="5" height="25" /></td>
                  </tr>
                  <tr>
                    <td width="55" align="center" bgcolor="#FFFFFF"><img src="images/cart.jpg" width="21" height="18" /></td>
                    <td align="left" bgcolor="#FFFFFF" class="top_txt5a4f3f">購物清單：0個商品</td>
                  </tr>
                  <tr>
                    <td colspan="2" valign="top" style="border-bottom:1px solid #5a4f3f"><div style="height:1px"></div></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr> -->
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
                  <td align="center" valign="middle"><table width="900" border="0" align="right" cellpadding="0" cellspacing="0">
                    <tr valign="bottom">
                      <td width="660" align="right"><table width="900" border="0" align="center" cellpadding="5" cellspacing="0">
                        <tr>
                          <td height="5"><img src="images/li.png" alt="" width="1" height="1" /></td>
                          </tr>
                        <tr>
                          <td align="center" valign="middle" bgcolor="#FFFFFF"><img src="images/banner_service.jpg" alt="" width="890" height="130" /></td>
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
                            </table></td>
                          <td align="right" valign="top"><table width="660" border="0" align="right" cellpadding="0" cellspacing="0">
                            <tr valign="bottom">
                              <td width="660" height="25" colspan="3" align="left" valign="top"><span class="top_txt5a4f3f"><a href="index.php" class="top_txt5a4f3f_a">首頁</a> &gt; </span><span class="root_red">客服中心</span></td>
                            </tr>
                            <tr valign="bottom">
                              <td align="right"><img src="images/line-02.png" alt="" width="9" height="40" /></td>
                              <td align="left" valign="middle" class="titleB" style="background:url(images/line.png) bottom repeat-x"><img src="images/titlebar.png" alt="" width="10" height="15" align="absmiddle" /> 客服中心</td>
                              <td align="left"><img src="images/line-03.png" alt="" width="11" height="40" /></td>
                            </tr>
                            <tr>
                              <td align="right" style="background:url(images/line-04.png) repeat-y right">&nbsp;</td>
                              <td align="center" valign="top" bgcolor="#CDBFA2" class="txt13_313131"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr valign="bottom">
                                  <td width="15" height="15" align="right"><img src="images/log_bg_01.png" alt="" width="15" height="15" /></td>
                                  <td style="background:url(images/log_bg_02.png) repeat-x bottom">&nbsp;</td>
                                  <td width="15" align="left"><img src="images/log_bg_03.png" alt="" width="15" height="15" /></td>
                                </tr>
                                <tr>
                                  <td align="right" style="background:url(images/log_bg_04.png) no-repeat right top">&nbsp;</td>
                                  <td align="center" valign="middle" class="txt13_313131" style="background:url(images/log_bg_05.png) repeat-x"><table border="0" cellpadding="0" cellspacing="5">
                                    <tr>
                                      <td colspan="2" align="center" valign="middle"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td height="70" align="left" valign="middle" class="item_title">歡迎您與我們聯繫，我們將會盡快為您服務。</td>
                                        </tr>
                                        <tr>
                                          <td height="35" align="left" valign="middle"><img src="images/title-10.png" alt="" width="141" height="21" /></td>
                                        </tr>
                                        <tr>
                                          <td height="30" align="left" valign="middle"><span class="title_5a4f3f">客服電話：</span>02-8512-1882</td>
                                        </tr>
                                        <tr>
                                          <td height="30" align="left" valign="middle"><span class="title_5a4f3f">營業時間：</span>週一至週五 9:30~18:30（例假日及中午12:00~13:30暫不提供電話服務）</td>
                                        </tr>
                                        <tr>
                                          <td height="30" align="left" valign="middle"><span class="title_5a4f3f">地　　址：</span>新北市三重區重新路五段639號1F</td>
                                        </tr>
                                        <tr>
                                          <td height="30" align="left" valign="middle"><span class="title_5a4f3f">官方網站：</span>www.wildbreeze.com.tw</td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" align="center" valign="middle" class="title_5a4f3f" style="border-top:#97866d 1px dotted">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="100" align="center" valign="middle" class="title_5a4f3f">留言主旨</td>
                                      <td width="450" align="left" valign="middle" class="top_txt5a4f3f"><input name="sr02" type="text" class="sr02"  id="sr02"  style="width:200px"/></td>
                                    </tr>
                                    <tr>
                                      <td width="100" align="center" valign="middle" class="title_5a4f3f">留言類型</td>
                                      <td width="450" align="left" valign="middle" class="top_txt5a4f3f"><select name="sr05" class="top_txt5a4f3f" id="sr05" style="width:100px; height:20px">
                                        <option selected="selected" value="商品退換貨">商品退換貨</option>
                                        <option value="網友好評分享">網友好評分享</option>
                                      </select></td>
                                    </tr>
                                    <tr>
                                      <td width="100" align="center" valign="middle" class="title_5a4f3f">電子信箱</td>
                                      <td width="450" align="left" valign="middle" class="top_txt5a4f3f"><input name="sr06" type="text" class="sr06" id="sr06"  style="width:200px"/></td>
                                    </tr>
                                    <tr>
                                      <td width="100" align="center" valign="top" class="title_5a4f3f">留言內容</td>
                                      <td width="450" align="left" valign="top" class="sr03" ><label for="textarea7"></label>
                                        <textarea name="sr03" cols="45" rows="5" class="sr03" id="sr03" style="width:400px"></textarea></td>
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
                                          <td align="center" valign="middle" class="btn_bg"><a href="#;return;" class="btn_bg" onclick="serviceJscript();">確認送出</a></td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" align="center" valign="bottom">&nbsp;</td>
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
                              <td align="left" style="background:url(images/line-05.png) left repeat-y">&nbsp;</td>
                            </tr>
                            <tr valign="top">
                              <td align="right"><img src="images/line-06.png" alt="" width="9" height="10" align="right" /></td>
                              <td style="background:url(images/line-07.png) repeat-x top">&nbsp;</td>
                              <td align="left"><img src="images/line-08.png" alt="" width="11" height="10" /></td>
                            </tr>
                            <tr valign="top">
                              <td height="5" colspan="3"><img src="images/li.png" alt="" width="1" height="1" /></td>
                            </tr>
                            <tr valign="top">
                              <td colspan="3" align="left"><a href="<?php echo websitebanner("客服中心下方廣告","Url"); ?>" target="_blank"><img src="upload/websitebanner/<?php echo websitebanner("客服中心下方廣告","Pic"); ?>" alt="" width="660" height="110" border="0" /></a></td>
                            </tr>
                            <tr valign="top">
                              <td height="5" colspan="3"><img src="images/li.png" alt="" width="1" height="1" /></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
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
</body>
<!-- InstanceEnd --></html>

<SCRIPT LANGUAGE="JavaScript">
function serviceJscript(){
if (document.getElementById("sr06").value=="") {
		alert("請輸入您的電子郵件！");
		document.getElementById('sr06').focus();
		sStatus=false;
		return false;
	} else{
		var emailRegxp =/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
		if (emailRegxp.test(document.getElementById("sr06").value) != true){
			alert('您的電子信箱格式錯誤！');
			document.getElementById('sr06').focus();
			sStatus=false;
			return false;
		}
	document.getElementById("action").value="service";
	document.serviceForm.submit();
	}
}
	</SCRIPT>