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
$ps01=$_GET["ps01"];
$psm02=$_POST['psm02'];
$psm03=$_POST['psm03'];

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
case 'InsertMessage':
	uLog("switch Insert");
	
	$sSQL="insert into picnicspotmessage (psm01, psm02, psm03, psm04, me01, lasttime, ps01) values ('".GetDateTimeCE().GetMicroTime()."', '".$psm02."', '".$psm03."', '否', '".GetMemID()."', now(), '".$ps01."');";
	$rSQLExec=GetRs($sSQL);

	$sMsg="已留言成功！";

	break;
default:
	uLog("switch default");
	break;
}

MainPage($ps01, $sMsg);

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php
function MainPage($ps01, $sMsg) {
	$ps02="";
	$ps03="";
	$ps04="";
	$ps05="";
	$ps06="";
	$ps07="";
	$ps08="";
	$ps09="";
	$ps10="";
	$ps11="";
	$ps12="";
	$ps13="";
	$ps14="";
	$ps15="";
	$ps16="";
	$ps17="";
	$ps18="";
	$ps19="";
	$ps20="";
	$ps21="";
	$ps22="";
	$ps23="";
	$ps24="";
	$lasttime="";

	$sSQLCountry="select * from picnicspot where ps01='".$ps01."' and (1=1);";
	uLog("sSQLCountry == [".$sSQLCountry."]");

	$rRs=GetRs($sSQLCountry);
	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$ps02=Trim($row["ps02"]);
		$ps03=Trim($row["ps03"]);
		$ps04=Trim($row["ps04"]);
		$ps05=Trim($row["ps05"]);
		$ps06=Trim($row["ps06"]);
		$ps07=Trim($row["ps07"]);
		$ps08=Trim($row["ps08"]);
		$ps09=Trim($row["ps09"]);
		$ps10=Trim($row["ps10"]);
		$ps11=Trim($row["ps11"]);
		$ps12=Trim($row["ps12"]);
		$ps13=Trim($row["ps13"]);
		$ps14=Trim($row["ps14"]);
		$ps15=Trim($row["ps15"]);
		$ps16=Trim($row["ps16"]);
		$ps17=Trim($row["ps17"]);
		$ps18=Trim($row["ps18"]);
		$ps19=Trim($row["ps19"]);
		$ps20=Trim($row["ps20"]);
		$ps21=Trim($row["ps21"]);
		$ps22=Trim($row["ps22"]);
		$ps23=Trim($row["ps23"]);
		$ps24=Trim($row["ps24"]);
		$lasttime=Left(Trim($row["lasttime"]), 10);
	}
	mysql_free_result($rRs);

	$sSQL="update picnicspot set ps24=".(SafeInt($ps24)+1)." where ps01='".$ps01."';";
	$rSQLExec=GetRs($sSQL);

	$ps24=(SafeInt($ps24)+1);
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
<script type="text/javascript" src="javascript/prototype.js"></script>
<script type="text/javascript" src="javascript/effects.js"></script>
<!-- <script type="text/javascript" src="javascript/lightwindow.js"></script>
<link rel="stylesheet" type="text/css" href="css/lightwindow.css" /> -->
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

<!-- ######################### using jquery start ######################### -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script src="galleria/galleria-1.2.4.min.js"></script>
<!-- ###################################################################### -->

</head>

<body onload="MM_preloadImages('images/btn_good_001.png')">
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
              <td colspan="2" align="center" valign="middle"><table width="900" border="0" align="center" cellpadding="5" cellspacing="0">
                <tr>
                  <td height="5"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><img src="images/banner_spot.jpg" alt="" width="890" height="130" /></td>
                </tr>
                <tr>
                  <td height="15"><img src="images/li.png" width="1" height="1" /></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td width="220" align="left" valign="top"><table width="220" border="0" align="left" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="10"><a href="message.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','images/btn_good_001.png',1)"><img src="images/btn_good_01.png" alt="" name="Image8" width="220" height="60" border="0" id="Image" /></a></td>
                </tr>
                <tr>
                  <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
                <tr>
                  <td align="center" valign="top"><!-- <table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td colspan="3" align="center" valign="bottom"><img src="images/article.png" alt="" width="220" height="35" /></td>
                    </tr>
                    <tr>
                      <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>
                      <td width="200" align="center" bgcolor="#C9BDA2"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                        <tr>
                          <td align="left" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">文章分類一</td>
                        </tr>
                        <tr>
                          <td align="left" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">文章分類二</td>
                        </tr>
                        <tr>
                          <td align="left" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">文章分類三</td>
                        </tr>
                      </table></td>
                      <td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>
                      <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>
                      <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>
                    </tr>
                  </table> -->&nbsp;</td>
                </tr>
                <tr>
                  <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
                </table></td>
              <td align="right" valign="top"><table width="660" border="0" align="right" cellpadding="0" cellspacing="0">
                <tr valign="bottom">
                  <td height="25" colspan="3" align="left" valign="top"><span class="top_txt5a4f3f"><a href="index.php" class="top_txt5a4f3f_a">首頁</a> &gt; </span><span class="root_red">野遊勝地</span></td>
                </tr>
                <tr valign="bottom">
                  <td width="9" align="right"><img src="images/line-02.png" alt="" width="9" height="40" /></td>
                  <td align="left" valign="middle" style="background:url(images/line.png) bottom repeat-x"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr valign="middle">
                        <td align="left" class="titleB"><img src="images/titlebar.png" alt="" width="10" height="15" align="middle" /><a href="spot_01.php?ps01=<?php echo $ps01;?>" class="titleB"><!-- 巴福越嶺 --><?php echo $ps02;?></a></span></td>
                        <td align="right"><span class="top_txt5a4f3f"><span class="top_txtc9bc9c">觀看次數：<!-- 99999 --><?php echo $ps24;?> │ </span><a href="#message" class="top_txtc9bc9c">我要留言</a></span></td>
                      </tr>
                  </table></td>
                  <td width="11" align="left"><img src="images/line-03.png" alt="" width="11" height="40" /></td>
                </tr>
                <tr>
                  <td align="right" style="background:url(images/line-04.png) repeat-y right">&nbsp;</td>
                  <td align="center" valign="top" bgcolor="#CDBFA2"><table width="500" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                      <td align="left"><span class="title_5a4f3f">                        景點介紹 ：</span> <br />
                        <br />
                        <!-- <img src="upload/event01_01.jpg" width="480" height="360" /><br />
                        <br /> -->
                        <span class="top_txt5a4f3f"><!-- 巴福越嶺古道的「巴」指桃園復興鄉巴陵村，「福」指烏來福山村。二、三百年前由泰雅族的大嵙崁群所踏踩出來的，泰雅族人由由巴陵西南方翻越過2,000多公尺的達觀山區，遷移至福山、烏來一帶，為泰雅族人因交流及通婚需要所開發的社路，故又稱姻親路古道。直至1913年日軍佔領巴壟(今上巴陵)，為連繫桃園廳與台北廳的山區，及為製造樟腦開採木材的經濟考量和控制此間泰雅族群的軍事考量，乃於民國初年依循原始山徑，修築由福山到巴陵的山地警備道路，並命名為「拉拉山角板山越嶺道」，即福巴越嶺古道（或稱巴福越嶺古道）。而步道上現存的人文遺址包括有比亞桑日警駐在所、拉拉山日警駐在所、檜山日警駐在所、扎孔日警駐在所等。<br />
                        <br />
                        <img src="upload/event01_02.jpg" width="480" height="360" /><br />
  <br />
                        經開墾後現長約17公里，由上巴陵約1,700公尺下降至烏來福山村400公尺，費時約莫8小時。沿途林木蓊鬱，雲霧瀰漫、煙雨濛濛，步道旁有100多棵巨木群，樹幹上長滿碩大的菇類，因是天然原始林，無法接近巨木群，只能遠觀。森林涵養了豐富的野生動植物，紅檜、扁柏、藍崁馬蘭、蕈類、地衣、地錢等形成了森林的高低層次。在「巴福越嶺」古道的開端，有一個小小的指示牌標明著「往福山17公里」。此處海拔約1500公尺，整齊平坦沿緩坡而下，林蔭大樹紛立兩旁、紅檜林延綿不斷，更深遠處則有闊葉林、雜木林、冷杉、鐵杉、臺灣杉等的原始林相；林間輕裝行走十分舒服。 --><?php echo $ps03;?></span></td>
                    </tr>
                    <tr>
                      <td align="center"><table width="500" border="0" cellspacing="0" cellpadding="0">
                        <tr valign="bottom">
                          <td width="15" height="15" align="right"><img src="images/log_bg_01.png" alt="" width="15" height="15" /></td>
                          <td style="background:url(images/log_bg_02.png) repeat-x bottom">&nbsp;</td>
                          <td width="15" align="left"><img src="images/log_bg_03.png" alt="" width="15" height="15" /></td>
                        </tr>
                        <tr>
                          <td align="right" style="background:url(images/log_bg_04.png) no-repeat right top">&nbsp;</td>
                          <td valign="top" bgcolor="#FFFFFF" style="background:url(images/log_bg_05.png) repeat-x"><table width="440" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="30" align="left" valign="top"><span class="title_5a4f3f">景點精彩照片</span></td>
                            </tr>
                            <tr>
                              <td align="center" valign="middle"><!-- <table width="440" border="0" cellpadding="5" cellspacing="0">
                                <tr>
                                  <td align="center" valign="middle"><a href="#"><img src="images/btn_prev.png" width="17" height="15" border="0" /></a></td>
                                  <td width="85" height="85" align="center" valign="middle"><a href="upload/event01_01.jpg" class="lightwindow" rel="subject[巴福越嶺]" title="巴福越嶺" caption="巴福越嶺古道的「巴」指桃園復興鄉巴陵村，「福」指烏來福山村。"><img src="upload/event01_01.jpg" alt="" width="85" height="64" border="0" /></a></td>
                                  <td width="85" height="85" align="center" valign="middle"><a href="upload/event01_02.jpg" class="lightwindow" rel="subject[巴福越嶺]" title="巴福越嶺" caption="開墾後現長約17公里，由上巴陵約1,700公尺下降至烏來福山村400公尺，費時約莫8小時。"><img src="upload/event01_02.jpg" alt="" width="85" height="64" border="0" /></a></td>
                                  <td width="85" height="85" align="center" valign="middle"><a href="upload/event01_03.jpg" class="lightwindow" rel="subject[巴福越嶺]" title="巴福越嶺" caption="此處海拔約1500公尺，整齊平坦沿緩坡而下，林蔭大樹紛立兩旁、紅檜林延綿不斷，更深遠處則有闊葉林、雜木林、冷杉、鐵杉、臺灣杉等的原始林相；林間輕裝行走十分舒服。"><img src="upload/event01_03.jpg" alt="" width="85" height="64" border="0" /></a></td>
                                  <td width="85" height="85" align="center" valign="middle"><a href="upload/event02_01.jpg" class="lightwindow" rel="subject[巴福越嶺]" title="巴福越嶺" caption="此處海拔約1500公尺，整齊平坦沿緩坡而下，林蔭大樹紛立兩旁、紅檜林延綿不斷，更深遠處則有闊葉林、雜木林、冷杉、鐵杉、臺灣杉等的原始林相；林間輕裝行走十分舒服。"><img src="upload/event02_01.jpg" alt="" width="48" height="64" border="0" /></a></td>
                                  <td width="85" height="85" align="center" valign="middle"><a href="upload/event03_01.jpg" class="lightwindow" rel="subject[巴福越嶺]" title="巴福越嶺" caption="此處海拔約1500公尺，整齊平坦沿緩坡而下，林蔭大樹紛立兩旁、紅檜林延綿不斷，更深遠處則有闊葉林、雜木林、冷杉、鐵杉、臺灣杉等的原始林相；林間輕裝行走十分舒服。"><img src="upload/event03_01.jpg" alt="" width="85" height="64" border="0" /></a></td>
                                  <td align="center" valign="middle"><a href="#"><img src="images/btn_next.png" width="18" height="15" border="0" /></a></td>
                                </tr>
                              </table> -->
															<div id="gallery">
																	<?php
																	if (Trim($ps14)!="") {
																		?><img src="upload/picnicspot/<?php echo Trim($ps14);?>" alt="<?php echo Trim($ps04);?>" ><?php
																	}
																	if (Trim($ps15)!="") {
																		?><img src="upload/picnicspot/<?php echo Trim($ps15);?>" alt="<?php echo Trim($ps05);?>" ><?php
																	}
																	if (Trim($ps16)!="") {
																		?><img src="upload/picnicspot/<?php echo Trim($ps16);?>" alt="<?php echo Trim($ps06);?>" ><?php
																	}
																	if (Trim($ps17)!="") {
																		?><img src="upload/picnicspot/<?php echo Trim($ps17);?>" alt="<?php echo Trim($ps07);?>" ><?php
																	}
																	if (Trim($ps18)!="") {
																		?><img src="upload/picnicspot/<?php echo Trim($ps18);?>" alt="<?php echo Trim($ps08);?>" ><?php
																	}
																	if (Trim($ps19)!="") {
																		?><img src="upload/picnicspot/<?php echo Trim($ps19);?>" alt="<?php echo Trim($ps09);?>" ><?php
																	}
																	if (Trim($ps20)!="") {
																		?><img src="upload/picnicspot/<?php echo Trim($ps20);?>" alt="<?php echo Trim($ps10);?>" ><?php
																	}
																	if (Trim($ps21)!="") {
																		?><img src="upload/picnicspot/<?php echo Trim($ps21);?>" alt="<?php echo Trim($ps11);?>" ><?php
																	}
																	if (Trim($ps22)!="") {
																		?><img src="upload/picnicspot/<?php echo Trim($ps22);?>" alt="<?php echo Trim($ps12);?>" ><?php
																	}
																	if (Trim($ps23)!="") {
																		?><img src="upload/picnicspot/<?php echo Trim($ps23);?>" alt="<?php echo Trim($ps13);?>" ><?php
																	}
																	?>
															</div>
															<script>
																	Galleria.loadTheme('galleria/themes/classic/galleria.classic.min.js');
																	$("#gallery").galleria({
																			width: 500,
																			height: 300,
																			lightbox: true,
																			//image_crop: false,
																			imageCrop:true,
																			carousel: false
																			//imageCrop: true,
																			//showImagenav: false




																	});
															</script>

															</td>
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
                      <td align="center">&nbsp;</td>
                    </tr>
                  </table>                    <img src="images/li.png" alt="" width="1" height="1" /></td>
                  <td align="left" style="background:url(images/line-05.png) left repeat-y">&nbsp;</td>
                </tr>
                <tr valign="top">
                  <td align="right" style="background:url(images/line-04.png) repeat-y right"><img src="images/line003.png" alt="" width="9" height="6" align="right" /></td>
                  <td align="center" valign="middle" style="background:url(images/line004.png) repeat-x top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="6" align="left" valign="bottom"><img src="images/li.png" width="1" height="1" /><a name="message" id="message"></a></td>
                    </tr>
                    <tr>
                      <td height="50" align="left" valign="bottom" bgcolor="#CDBFA2"><img src="images/title-08.png" width="144" height="21" hspace="30" /></td>
                    </tr>

										<?php
										$sSQLCountry="select *, (select me03 from member where member.me01=picnicspotmessage.me01) as me03 from picnicspotmessage where ps01='".$ps01."' and psm04='否' and (1=1);";
										uLog("sSQLCountry == [".$sSQLCountry."]");

										$rRs=GetRs($sSQLCountry);
										while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
											/*
											$ps02=Trim($row["ps02"]);
											$ps03=Trim($row["ps03"]);
											$ps04=Trim($row["ps04"]);
											$ps05=Trim($row["ps05"]);
											$ps06=Trim($row["ps06"]);
											$ps07=Trim($row["ps07"]);
											$ps08=Trim($row["ps08"]);
											$ps09=Trim($row["ps09"]);
											$ps10=Trim($row["ps10"]);
											$ps11=Trim($row["ps11"]);
											$ps12=Trim($row["ps12"]);
											$ps13=Trim($row["ps13"]);
											$ps14=Trim($row["ps14"]);
											$ps15=Trim($row["ps15"]);
											$ps16=Trim($row["ps16"]);
											$ps17=Trim($row["ps17"]);
											$ps18=Trim($row["ps18"]);
											$ps19=Trim($row["ps19"]);
											$ps20=Trim($row["ps20"]);
											$ps21=Trim($row["ps21"]);
											$ps22=Trim($row["ps22"]);
											$ps23=Trim($row["ps23"]);
											$ps24=Trim($row["ps24"]);
											$lasttime=Left(Trim($row["lasttime"]), 10);
											*/
											?>
											<tr>
												<td height="150" align="center" valign="middle" bgcolor="#CDBFA2" style="border-bottom:#97866d 1px dotted"><table width="520" border="0" cellspacing="0" cellpadding="0">
													<tr>
														<td width="120" align="left" valign="top"><span class="member_name"><!-- 會員名稱 --><?php echo Trim($row["me03"]);?></span><br />
															<span class="top_txt5a4f3f">發表於
															<!-- 2011/02/25 --><?php echo Left(Trim($row["lasttime"]), 10);?></span></td>
														<td align="left" valign="top" class="txt13_313131"><?php echo Trim($row["psm02"]);?><br /><!-- 有同事掛病號…因為穿了一般的球鞋，腳踝扭傷，<br />
															還好我們帶了壯丁數名，大家一路護送她下山，<br />
															其實還滿配服我們這位同事的，雖然腳再痛，她還是忍下來了，超勇敢。 --><?php echo Trim(nl2br($row["psm03"]));?></td>
													</tr>
												</table></td>
											</tr>
											<?php
										}
										mysql_free_result($rRs);
										?>

                    <!-- <tr>
                      <td height="150" align="center" valign="middle" bgcolor="#CDBFA2" style="border-bottom:#97866d 1px dotted"><table width="520" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="120" align="left" valign="top"><span class="member_name">會員名稱</span><br />
                            <span class="top_txt5a4f3f">發表於
                            2011/02/25</span></td>
                          <td align="left" valign="top" class="txt13_313131">有同事掛病號…因為穿了一般的球鞋，腳踝扭傷，<br />
                            還好我們帶了壯丁數名，大家一路護送她下山，<br />
                            其實還滿配服我們這位同事的，雖然腳再痛，她還是忍下來了，超勇敢。</td>
                        </tr>
                      </table></td>
                    </tr>

                    <tr>
                      <td height="150" align="center" valign="middle" bgcolor="#CDBFA2" style="border-bottom:#97866d 1px dotted"><table width="520" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="120" align="left" valign="top"><span class="member_name">會員名稱</span><br />
                            <span class="top_txt5a4f3f">發表於
                            2011/02/25</span></td>
                          <td align="left" valign="top" class="txt13_313131">有同事掛病號…因為穿了一般的球鞋，腳踝扭傷，<br />
                            還好我們帶了壯丁數名，大家一路護送她下山，<br />
                            其實還滿配服我們這位同事的，雖然腳再痛，她還是忍下來了，超勇敢。</td>
                        </tr>
                      </table></td>
                    </tr>

                    <tr>
                      <td height="150" align="center" valign="middle" bgcolor="#CDBFA2" style="border-bottom:#97866d 1px dotted"><table width="520" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="120" align="left" valign="top"><span class="member_name">會員名稱</span><br />
                            <span class="top_txt5a4f3f">發表於
                            2011/02/25</span></td>
                          <td align="left" valign="top" class="txt13_313131">有同事掛病號…因為穿了一般的球鞋，腳踝扭傷，<br />
                            還好我們帶了壯丁數名，大家一路護送她下山，<br />
                            其實還滿配服我們這位同事的，雖然腳再痛，她還是忍下來了，超勇敢。</td>
                        </tr>
                      </table></td>
                    </tr> -->


                    <FORM METHOD="POST" ACTION="spot_01.php?ps01=<?php echo $ps01;?>" name="frmUser" id="frmUser"><INPUT TYPE="hidden" NAME="hdnOp" value="InsertMessage">
                    <tr>
                      <td height="150" align="center" valign="middle" bgcolor="#CDBFA2"><table border="0" cellpadding="0" cellspacing="5">
                        <tr>
                          <td width="100" align="center" valign="middle" class="title_5a4f3f">留言主旨</td>
                          <td align="left" valign="middle" class="top_txt5a4f3f"><input name="psm02" type="text" class="top_txt5a4f3f" id="psm02"  style="width:200px"/></td>
                          <td align="left" valign="middle" class="top_txt5a4f3f">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="100" align="center" valign="top" class="title_5a4f3f">留言內容</td>
                          <td align="left" valign="top" class="top_txt5a4f3f"><label for="textarea"></label>
                            <textarea name="psm03" cols="45" rows="5" class="top_txt5a4f3f" id="psm03" style="width:350px"></textarea></td>
                          <td align="left" valign="bottom" class="top_txt5a4f3f"><table width="100" border="0" cellpadding="0" cellspacing="0" class="btn_bg">
                            <tr>
                              <td align="center" valign="middle" class="btn_bg"><!-- <a href="service_01.html" class="btn_bg"> --><?php
															if (IsLogin()) {
																?><a href="#" class="btn_bg" onclick="DoSubmit();" >確認送出</a><?php
															} else {
																?><a href="#" class="btn_bg" onclick="javascript:alert('請登入會員！');" >確認送出</a><?php
															}
															?><!-- <a href="#" class="btn_bg" onclick="DoSubmit();" >確認送出</a> --></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                    </FORM>
                  </table></td>
                  <td align="left" style="background:url(images/line-05.png) left repeat-y"><img src="images/line002.png" alt="" width="11" height="6" /></td>
                </tr>
                <tr valign="top">
                  <td height="20" align="right" ><img src="images/line003.png" alt="" width="9" height="6" align="right" /></td>
                  <td height="20" align="right" style="background:url(images/line004.png) repeat-x top">&nbsp;</td>
                  <td height="20" align="left"><img src="images/line002.png" alt="" width="11" height="6" /></td>
                </tr>
                <tr valign="top">
                  <td height="20" colspan="3" align="right"><img src="images/li.png" alt="" width="1" height="1" /></td>
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
<!--
function DoSubmit() {
	sStatus = true;

	if (document.getElementById("psm02").value=="") {
		alert("請輸入您的留言主旨！");
		document.getElementById('psm02').focus();
		sStatus=false;
		return false;
	}

	if (document.getElementById("psm03").value=="") {
		alert("請輸入您的留言內容！");
		document.getElementById('psm03').focus();
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

	<?php
}

?>
<?php //**************************************************************************** ?>