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
$NowStopPage=$_GET["NowStopPage"];  //目前停留頁次
$EveryPageCount=10;                  //每頁筆數

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
MainPage($NowStopPage, $EveryPageCount);

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php
function GetTotalPage($iEveryPageCount) {
	$sResult="";
	$rsLP=GetRs("select ceiling((select count(*) from memberevaluate where mee04='否' and mee05='是' and (1=1))/".$iEveryPageCount.") as TotalCount;");

	while ($row = mysql_fetch_array($rsLP, MYSQL_ASSOC)) {
		$sResult=$row["TotalCount"];
	}
	mysql_free_result($rsLP);	

	return $sResult;
}

function PageList($iNowStopPage, $iEveryPageCount, $iTotalPage) {
	$iFirstPage=1; //最前頁
	$iLastPage=$iTotalPage;  //最後頁

	$iTopTenPage=0;  //上一頁
	$iDownTenPage=0; //下一頁

	if (($iNowStopPage-1)<=0) {
		$iTopTenPage=$iFirstPage;
	} else {
		$iTopTenPage=($iNowStopPage-1);
	}

	if (($iNowStopPage+1)>$iLastPage) {
		$iDownTenPage=$iLastPage;
	} else {
		$iDownTenPage=($iNowStopPage+1);
	}

	$iLoopStart=0; //迴圈起始頁
	$iLoopEnd=0;   //迴圈結束頁

	$iLoopStart=1;
	$iLoopEnd=$iLastPage;

	?>
	<td align="right"><a href="message.php?NowStopPage=<?php echo $iTopTenPage;?>"><img src="images/btn_prev.png" width="17" height="15" hspace="10" border="0" /></a></td>
	<!-- <a href="news.php?NowStopPage=<?php echo $iTopTenPage;?>"><img src="images/last_square.png" width="18" height="18" border="0" align="absmiddle" /></a>　 -->
                          <td><table border="0" cellpadding="0" cellspacing="0">
                            <tr>
	<?php
	for ($iLoo=$iLoopStart; $iLoo<=$iLoopEnd; $iLoo++) {
		uLog("iLoo == [".$iLoo."]");
		uLog("iLoopEnd == [".$iLoopEnd."]");
		//if ($iLoo==$iLoopEnd) {
		if ($iLoo==$iNowStopPage) {
			?><!-- <a href="news.php?NowStopPage=<?php echo $iLoo;?>" class="number_link"><?php echo LPad($iLoo, "0", 2);?></a>　 --><?php
			?><td width="30" height="20" align="center" valign="middle" class="pages_txt4c4c4c"><?php echo $iLoo;?></td><?php
		} else {
			?><!-- <a href="news.php?NowStopPage=<?php echo $iLoo;?>" class="number_link"><?php echo LPad($iLoo, "0", 2);?></a>｜ --><?php
			?><td width="30" height="20" align="center" valign="middle"><div class="bg_pages" style="height:20px; width:30px; background:url(images/btn_bg01.png) no-repeat center"><a href="message.php?NowStopPage=<?php echo $iLoo;?>" class="pages_4c4c4c_a"><?php echo $iLoo;?></a></div></td><?php
		}
	}
	?>
                              </tr>
                          </table></td>
	<!-- <a href="news.php?NowStopPage=<?php echo $iDownTenPage;?>"><img src="images/next_square.png" width="18" height="18" border="0" align="absmiddle" /></a> -->
	<td align="left"><a href="message.php?NowStopPage=<?php echo $iDownTenPage;?>"><img src="images/btn_next.png" width="18" height="15" hspace="10" border="0" /></a></td>
	<?php
}

function MainPage($iNowStopPage, $iEveryPageCount) {
	if ($iNowStopPage=="") { //目前停留頁數
		$iNowStopPage=1;
	}

	$iStartRow=($iNowStopPage*$iEveryPageCount)-$iEveryPageCount; //起始筆數
	$iTotalPage=GetTotalPage($iEveryPageCount); //總頁數

	$iShowResult=0;

	$rsLP=GetRs("select count(*) as TotalCount from memberevaluate where mee04='否' and mee05='是' and (1=1);");

	while ($row = mysql_fetch_array($rsLP, MYSQL_ASSOC)) {
		$iShowResult=SafeInt($row["TotalCount"]);
	}
	mysql_free_result($rsLP);

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

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<script language="javascript">
$(document).ready(function() {
	$("a#pic01").fancybox({
		//'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'width'				: 700,
		'height'			: 280,
		//'autoScale'			: true,
		'autoScale'			: false,
		'type'				: 'iframe'
	});
});
</script>

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top" style="background:url(images/bg.jpg) repeat-x top center"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
      
      <tr>
        <td align="center"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="300" rowspan="2" align="left" valign="bottom"><a href="index.html"><img src="images/index.png" alt="" width="300" height="70" border="0" /></a></td>
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
                  <td align="center" valign="middle"><table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="220" align="left" valign="top"><table width="220" border="0" align="left" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" valign="middle"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td colspan="3" align="center" valign="bottom"><img src="images/mustbuy.png" alt="" width="220" height="35" /></td>
                            </tr>
                            <tr>
                              <td rowspan="3" align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>
                              <td width="200" align="center" bgcolor="#e2e2e2" style="border-bottom:#97866d 1px dotted"><table width="190" border="0" cellspacing="5" cellpadding="0">
                                <tr>
                                  <td colspan="2" align="left" valign="top" class="txtB_5a4f3f"><a href="#" class="txtB_5a4f3f">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>
                                </tr>
                                <tr>
                                  <td align="center" valign="middle"><div style="border:1px solid #5a4f3f"><a href="#"><img src="images/item_pic01.jpg" width="89" height="89" border="0" align="absmiddle" /></a></div></td>
                                  <td align="left" valign="top" class="top_txt5a4f3f">◆最高規格防風防水透氣GORE-TEX Paclite Shell布料 ...</td>
                                </tr>
                                <tr>
                                  <td height="25" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr valign="middle">
                                      <td align="left"><img src="images/more_01.png" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>
                                      <td align="right"><img src="images/cart_01.png" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>
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
                          <td height="25" colspan="3" align="left" valign="top"><span class="top_txt5a4f3f"><a href="index.php" class="top_txt5a4f3f_a">首頁</a> &gt; </span><span class="root_red">網友好評</span></td>
                        </tr>
                        <tr valign="bottom">
                          <td width="9" align="right"><img src="images/line-02.png" alt="" width="9" height="40" /></td>
                          <td align="left" valign="middle" class="titleB" style="background:url(images/line.png) bottom repeat-x"><img src="images/titlebar.png" alt="" width="10" height="15" align="absmiddle" />網友好評</td>
                          <td width="11" align="left"><img src="images/line-03.png" alt="" width="11" height="40" /></td>
                        </tr>
                        <tr>
                          <td align="right" style="background:url(images/line-04.png) repeat-y right">&nbsp;</td>
                          <td align="center" valign="top" bgcolor="#CDBFA2" class="txt13_313131"><table width="620" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="540" align="left" valign="middle" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid">　歡迎您不吝與我們分享對野遊風的心得感想！</td>
                              <td width="80" height="35" align="right" valign="top" style="border-bottom:#97866d 1px solid"><?php
															if (IsLogin()) {
																?><a href="message_01.php" id="pic01"><img src="images/message_01.jpg" alt="" width="80" height="25" border="0" /></a><?php
															} else {
																?><a href="#" onclick="javascript:alert('請登入會員！');" ><img src="images/message_01.jpg" alt="" width="80" height="25" border="0" /></a><?php
															}
															?><!-- <a href="message_01.php" id="pic01"><img src="images/message_01.jpg" alt="" width="80" height="25" border="0" /></a> --></td>
                              </tr>
												<?php
	if ($iShowResult>0) {
		uLog("iShowResult > 0 要顯示資料");

		//############################## 列出文章 Start ##############################
		$rsLP=GetRs("select *, (select me03 from member where member.me01=memberevaluate.me01) as me03 from memberevaluate where mee04='否' and mee05='是' and (1=1) order by lasttime desc limit ".$iStartRow.", ".$iEveryPageCount.";");
		//uLog("select * from memberevaluate where mee04='否' and mee05='是' and (1=1) order by lasttime desc limit ".$iStartRow.", ".$iEveryPageCount.";");

		while ($row = mysql_fetch_array($rsLP, MYSQL_ASSOC)) {
			?>
                            <tr>
                              <td colspan="2" align="left" class="top_txt5a4f3f" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr valign="bottom">
                                  <td width="20" rowspan="2" align="left" class="title_5a4f3f">&nbsp;</td>
                                  <td height="30" align="left" valign="bottom" class="title_5a4f3f">會員 <span class="member_name"><!-- 日 --><?php echo $row["me03"];?></span>說：</td>
                                  <td align="right" valign="bottom"><!-- 2011.02.24 --><?php echo Left($row["lasttime"], 10);?></td>
                                  <td width="20" rowspan="2" align="right">&nbsp;</td>
                                  </tr>
                                <tr>
                                  <td colspan="2" align="left" valign="top"><!-- 貴公司的產品蠻不錯的<br /> 
                                    
                                    不論材質跟價位上都比市面的好  <br />
                                    
                                    相遇貴公司是一個偶然的機緣  <br />
                                    
                                    難得遇到好品質及好價位的公司也算支持MIT <br />
                                    
                                    希望貴公司持續加油 --><?php echo nl2br($row["mee03"]);?></td>
                                  </tr>
                                </table></td>
                              </tr>
			<?php

		}
		mysql_free_result($rsLP);	
		//############################## 列出文章 End   ##############################
	} else {
		uLog("iShowResult <= 0 不顯示資料");

	}
												?>
                            <!-- <tr>
                              <td colspan="2" align="left" class="top_txt5a4f3f" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr valign="bottom">
                                  <td width="20" rowspan="2" align="left" class="title_5a4f3f">&nbsp;</td>
                                  <td height="30" align="left" valign="bottom" class="title_5a4f3f">會員 <span class="member_name">日</span>說：</td>
                                  <td align="right" valign="bottom">2011.02.24</td>
                                  <td width="20" rowspan="2" align="right">&nbsp;</td>
                                  </tr>
                                <tr>
                                  <td colspan="2" align="left" valign="top">貴公司的產品蠻不錯的<br /> 
                                    
                                    不論材質跟價位上都比市面的好  <br />
                                    
                                    相遇貴公司是一個偶然的機緣  <br />
                                    
                                    難得遇到好品質及好價位的公司也算支持MIT <br />
                                    
                                    希望貴公司持續加油</td>
                                  </tr>
                                </table></td>
                              </tr> -->
                            <!-- <tr>
                              <td colspan="2" align="left" class="top_txt5a4f3f" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr valign="bottom">
                                  <td width="20" rowspan="2" align="left" class="title_5a4f3f">&nbsp;</td>
                                  <td height="30" align="left" valign="bottom" class="title_5a4f3f">會員 <span class="member_name">古先生</span>說：</td>
                                  <td align="right" valign="bottom">2011.02.24</td>
                                  <td width="20" rowspan="2" align="right">&nbsp;</td>
                                  </tr>
                                <tr>
                                  <td colspan="2" align="left" valign="top">謝謝你們的敬業和快速的服務，今天就收到中獎的發票了，雖然中的錢不多，還是非常感謝！以後會繼續支持野遊風的產品，祝新的一年業績長紅。 </td>
                                  </tr>
                                </table></td>
                              </tr>
                            <tr>
                              <td colspan="2" align="left" class="top_txt5a4f3f" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr valign="bottom">
                                  <td width="20" rowspan="2" align="left" class="title_5a4f3f">&nbsp;</td>
                                  <td height="30" align="left" valign="bottom" class="title_5a4f3f">會員 <span class="member_name">王小姐</span>說：</td>
                                  <td align="right" valign="bottom">2011.02.24</td>
                                  <td width="20" rowspan="2" align="right">&nbsp;</td>
                                  </tr>
                                <tr>
                                  <td colspan="2" align="left" valign="top">謝謝你們的敬業和快速的服務，今天就收到中獎的發票了，雖然中的錢不多，還是非常感謝！以後會繼續支持野遊風的產品，祝新的一年業績長紅。 </td>
                                  </tr>
                                </table></td>
                              </tr>
                            <tr>
                              <td colspan="2" align="left" class="top_txt5a4f3f" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr valign="bottom">
                                  <td width="20" rowspan="2" align="left" class="title_5a4f3f">&nbsp;</td>
                                  <td height="30" align="left" valign="bottom" class="title_5a4f3f">會員 <span class="member_name">日</span>說：</td>
                                  <td align="right" valign="bottom">2011.02.24</td>
                                  <td width="20" rowspan="2" align="right">&nbsp;</td>
                                  </tr>
                                <tr>
                                  <td colspan="2" align="left" valign="top">貴公司的產品蠻不錯的<br />
                                    不論材質跟價位上都比市面的好 <br />
                                    相遇貴公司是一個偶然的機緣 <br />
                                    難得遇到好品質及好價位的公司也算支持MIT <br />
                                    希望貴公司持續加油</td>
                                  </tr>
                                </table></td>
                              </tr> -->
                            <!-- <tr>
                              <td colspan="2" align="left" class="top_txt5a4f3f" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr valign="bottom">
                                  <td width="20" rowspan="2" align="left" class="title_5a4f3f">&nbsp;</td>
                                  <td height="30" align="left" valign="bottom" class="title_5a4f3f">會員 <span class="member_name">古先生</span>說：</td>
                                  <td align="right" valign="bottom">2011.02.24</td>
                                  <td width="20" rowspan="2" align="right">&nbsp;</td>
                                  </tr>
                                <tr>
                                  <td colspan="2" align="left" valign="top">謝謝你們的敬業和快速的服務，今天就收到中獎的發票了，雖然中的錢不多，還是非常感謝！以後會繼續支持野遊風的產品，祝新的一年業績長紅。 </td>
                                  </tr>
                                </table></td>
                              </tr>
                            <tr>
                              <td colspan="2" align="left" class="top_txt5a4f3f" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr valign="bottom">
                                  <td width="20" rowspan="2" align="left" class="title_5a4f3f">&nbsp;</td>
                                  <td height="30" align="left" valign="bottom" class="title_5a4f3f">會員 <span class="member_name">王小姐</span>說：</td>
                                  <td align="right" valign="bottom">2011.02.24</td>
                                  <td width="20" rowspan="2" align="right">&nbsp;</td>
                                  </tr>
                                <tr>
                                  <td colspan="2" align="left" valign="top">謝謝你們的敬業和快速的服務，今天就收到中獎的發票了，雖然中的錢不多，還是非常感謝！以後會繼續支持野遊風的產品，祝新的一年業績長紅。 </td>
                                  </tr>
                                </table></td>
                              </tr>
                            <tr>
                              <td colspan="2" align="left" class="top_txt5a4f3f" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr valign="bottom">
                                  <td width="20" rowspan="2" align="left" class="title_5a4f3f">&nbsp;</td>
                                  <td height="30" align="left" valign="bottom" class="title_5a4f3f">會員 <span class="member_name">日</span>說：</td>
                                  <td align="right" valign="bottom">2011.02.24</td>
                                  <td width="20" rowspan="2" align="right">&nbsp;</td>
                                  </tr>
                                <tr>
                                  <td colspan="2" align="left" valign="top">貴公司的產品蠻不錯的<br />
                                    不論材質跟價位上都比市面的好 <br />
                                    相遇貴公司是一個偶然的機緣 <br />
                                    難得遇到好品質及好價位的公司也算支持MIT <br />
                                    希望貴公司持續加油</td>
                                  </tr>
                                </table></td>
                              </tr> -->
                            <!-- <tr>
                              <td colspan="2" align="left" class="top_txt5a4f3f" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr valign="bottom">
                                  <td width="20" rowspan="2" align="left" class="title_5a4f3f">&nbsp;</td>
                                  <td height="30" align="left" valign="bottom" class="title_5a4f3f">會員 <span class="member_name">古先生</span>說：</td>
                                  <td align="right" valign="bottom">2011.02.24</td>
                                  <td width="20" rowspan="2" align="right">&nbsp;</td>
                                  </tr>
                                <tr>
                                  <td colspan="2" align="left" valign="top">謝謝你們的敬業和快速的服務，今天就收到中獎的發票了，雖然中的錢不多，還是非常感謝！以後會繼續支持野遊風的產品，祝新的一年業績長紅。 </td>
                                  </tr>
                                </table></td>
                              </tr>
                            <tr>
                              <td colspan="2" align="left" class="top_txt5a4f3f" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr valign="bottom">
                                  <td width="20" rowspan="2" align="left" class="title_5a4f3f">&nbsp;</td>
                                  <td height="30" align="left" valign="bottom" class="title_5a4f3f">會員 <span class="member_name">王小姐</span>說：</td>
                                  <td align="right" valign="bottom">2011.02.24</td>
                                  <td width="20" rowspan="2" align="right">&nbsp;</td>
                                  </tr>
                                <tr>
                                  <td colspan="2" align="left" valign="top">謝謝你們的敬業和快速的服務，今天就收到中獎的發票了，雖然中的錢不多，還是非常感謝！以後會繼續支持野遊風的產品，祝新的一年業績長紅。 </td>
                                  </tr>
                                </table></td>
                              </tr> -->
                            <!-- <tr>
                              <td colspan="2" align="left" class="top_txt5a4f3f" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr valign="bottom">
                                  <td width="20" rowspan="2" align="left" class="title_5a4f3f">&nbsp;</td>
                                  <td height="30" align="left" valign="bottom" class="title_5a4f3f">會員 <span class="member_name">日</span>說：</td>
                                  <td align="right" valign="bottom">2011.02.24</td>
                                  <td width="20" rowspan="2" align="right">&nbsp;</td>
                                  </tr>
                                <tr>
                                  <td colspan="2" align="left" valign="top">貴公司的產品蠻不錯的<br />
                                    不論材質跟價位上都比市面的好 <br />
                                    相遇貴公司是一個偶然的機緣 <br />
                                    難得遇到好品質及好價位的公司也算支持MIT <br />
                                    希望貴公司持續加油</td>
                                  </tr>
                                </table></td>
                              </tr> -->
                            </table></td>
                          <td align="left" style="background:url(images/line-05.png) left repeat-y">&nbsp;</td>
                        </tr>
                        <tr valign="top">
                          <td align="right"><img src="images/line_2.png" alt="" width="9" height="35" align="right" /></td>
                          <td align="center" valign="middle" style="background:url(images/line_2-02.png) repeat-x top"><table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="5" colspan="3" align="right"><img src="images/li.png" alt="" width="1" height="1" /></td>
                            </tr>
                            <tr>
															<?php
															if ($iShowResult>0) {
																uLog("iShowResult > 0 要顯示資料");
																PageList($iNowStopPage, $iEveryPageCount, $iTotalPage);
															} else {
																uLog("iShowResult <= 0 不顯示資料");
																?>
																<td align="right">&nbsp;</td>
																<td>&nbsp;</td>
																<td align="left">&nbsp;</td>
																<?php
															}
															?>
                              <!-- <td align="right"><a href="#"><img src="images/btn_prev.png" alt="" width="17" height="15" hspace="10" border="0" /></a></td>
                              <td><table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="30" height="20" align="center" valign="middle" class="pages_txt4c4c4c">1</td>
                                  <td width="30" height="20" align="center" valign="middle"><div class="bg_pages" style="height:20px; width:30px; background:url(images/btn_bg01.png) no-repeat center"><a href="#" class="pages_4c4c4c_a">2</a></div></td>
                                  <td width="30" height="20" align="center" valign="middle"><div class="bg_pages" style="height:20px; width:30px; background:url(images/btn_bg01.png) no-repeat center"><a href="#" class="pages_4c4c4c_a">3</a></div></td>
                                  <td width="30" height="20" align="center" valign="middle"><div class="bg_pages" style="height:20px; width:30px; background:url(images/btn_bg01.png) no-repeat center"><a href="#" class="pages_4c4c4c_a">4</a></div></td>
                                  <td width="30" height="20" align="center" valign="middle"><div class="bg_pages" style="height:20px; width:30px; background:url(images/btn_bg01.png) no-repeat center"><a href="#" class="pages_4c4c4c_a">5</a></div></td>
                                </tr>
                              </table></td>
                              <td align="left"><a href="#"><img src="images/btn_next.png" alt="" width="18" height="15" hspace="10" border="0" /></a></td> -->
                            </tr>
                          </table></td>
                          <td align="left"><img src="images/line_2-03.png" alt="" width="11" height="35" /></td>
                        </tr>
                        <tr valign="top">
                          <td height="20" colspan="3" align="right"><img src="images/li.png" alt="" width="1" height="1" /></td>
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

	<?php
}

?>
<?php //**************************************************************************** ?>