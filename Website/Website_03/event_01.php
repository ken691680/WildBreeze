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
$ev01=$_GET["ev01"];

$er02=$_POST['er02'];
$er03=$_POST['er03'];
$er04=$_POST['er04'];
$er05=$_POST['er05'];

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
case 'OnlineRegister':
	uLog("switch Insert");
	
	$sSQL="insert into eventsregistration (er01, er02, er03, er04, er05, me01, ev01, lasttime) values ('".GetDateTimeCE().GetMicroTime()."', '".$er02."', '".$er03."', '".$er04."', '".$er05."', '".GetMemID()."', '".$ev01."', now());";
	$rSQLExec=GetRs($sSQL);

	$sMsg="感謝您的報名！";

	break;
default:
	uLog("switch default");
	break;
}

MainPage($ev01, $sMsg);

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php
function MainPage($ev01, $sMsg) {
	$ev02="";
	$ev03="";
	$ev04="";
	$ev05="";
	$ev06="";
	$ev07="";
	$ev08="";
	$ev09="";
	$ev10="";
	$ev11="";
	$ev12="";
	$ev13="";
	$ev14="";
	$ev15="";
	$ev16="";
	$ev17="";
	$ev18="";
	$lasttime="";

	$TheYear="";
	$TheMonth="";
	$TheDay="";

	$sSQLCountry="select *, year( ev07 ) AS TheYear, month( ev07 ) AS TheMonth, day( ev07 ) AS TheDay from events where ev01='".$ev01."' and now()>=ev17 and now()<=ev18 and (1=1);";
	uLog("sSQLCountry == [".$sSQLCountry."]");

	$rRs=GetRs($sSQLCountry);
	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$ev02=Trim($row["ev02"]);
		$ev03=Trim($row["ev03"]);
		$ev04=Trim($row["ev04"]);
		$ev05=Trim($row["ev05"]);
		$ev06=Trim($row["ev06"]);
		$ev07=Trim($row["ev07"]);
		$ev08=Trim($row["ev08"]);
		$ev09=Trim($row["ev09"]);
		$ev10=Trim($row["ev10"]);
		$ev11=Trim($row["ev11"]);
		$ev12=Trim($row["ev12"]);
		$ev13=Trim($row["ev13"]);
		$ev14=Trim($row["ev14"]);
		$ev15=Trim($row["ev15"]);
		$ev16=Trim($row["ev16"]);
		$ev17=Trim($row["ev17"]);
		$ev18=Trim($row["ev18"]);
		$lasttime=Left(Trim($row["lasttime"]), 10);

		$TheYear=Trim($row["TheYear"]);
		$TheMonth=Trim($row["TheMonth"]);
		$TheDay=Trim($row["TheDay"]);
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
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<script language="javascript">
$(document).ready(function() {
	$("a#pic01").fancybox({
		'overlayShow'	: false,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic'
	});
	
	$("a#pic02").fancybox({
		'overlayShow'	: false,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic'
	});
	$("a#pic03").fancybox({
		'overlayShow'	: false,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic'
	});

});
</script>

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
              <td height="15" align="center" valign="middle"><img src="images/li.png" alt="" width="1" height="1" /></td>
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
                      <td height="25" colspan="3" align="left" valign="top"><span class="top_txt5a4f3f"><a href="index.php" class="top_txt5a4f3f_a">首頁</a> &gt; </span><span class="root_red">活動訊息</span></td>
                      </tr>
                    <tr valign="bottom">
                      <td width="9" align="right"><img src="images/line-02.png" alt="" width="9" height="40" /></td>
                      <td align="left" valign="middle" class="titleB" style="background:url(images/line.png) bottom repeat-x"><img src="images/titlebar.png" alt="" width="10" height="15" align="absmiddle" /><!-- 2010年11、12月份野遊風活動　泰雅勇士的姻親路－巴福越嶺 --><?php echo $ev02;?></td>
                      <td width="11" align="left"><img src="images/line-03.png" alt="" width="11" height="40" /></td>
                    </tr>
                    <tr>
                      <td rowspan="2" align="right" style="background:url(images/line-04.png) repeat-y right">&nbsp;</td>
                      <td align="center" valign="top" bgcolor="#CDBFA2"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                        <tr>
                          <td align="center" valign="top" class="top_txt5a4f3f"><table width="500" border="0" cellspacing="2" cellpadding="0">
                            <tr>
                              <td width="110" height="26" align="center" valign="middle" bgcolor="#60412F" class="title_white">活動日期</td>
                              <td align="left" valign="middle" bgcolor="#CDBFA2" class="top_txt60412F">　<?php echo $TheYear;?>年<?php echo $TheMonth;?>月<?php echo $TheDay;?>日 </td>
                            </tr>
                            <tr>
                              <td height="26" align="center" valign="middle" bgcolor="#60412F" class="title_white">交　　通</td>
                              <td align="left" valign="middle" bgcolor="#CDBFA2" class="top_txt60412F"> 　<!-- 中巴 --><?php echo $ev08;?> </td>
                            </tr>
                            <tr>
                              <td height="26" align="center" valign="middle" bgcolor="#60412F" class="title_white">名　　額</td>
                              <td align="left" valign="middle" bgcolor="#CDBFA2" class="top_txt60412F">　<!-- 18 --><?php echo $ev09;?>人</td>
                            </tr>
                            <tr>
                              <td height="26" align="center" valign="middle" bgcolor="#60412F" class="title_white">費　　用</td>
                              <td align="left" valign="middle" bgcolor="#CDBFA2" class="top_txt60412F"> 　<!-- 850（含車資、嚮導、保險；不含拉拉山門票100元） --><?php echo $ev10;?> </td>
                            </tr>
                          </table></td>
                          </tr>
                        <tr>
                          <td align="center" valign="top"><table width="500" border="0" cellspacing="0" cellpadding="5">
                            <tr>
                              <td align="center" valign="bottom" style="border-top:1px dotted #97866d"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td align="left"><!-- <img src="upload/event01_01.jpg" alt="" width="150" height="113" border="0" /> --><?php
																	if (Trim($ev04)=="") {
																		?>&nbsp;<?php
																	} else {
																		?><a href="upload/events/<?php echo $ev04;?>" id="pic01"><img src="upload/events/<?php echo $ev04;?>" alt="" width="150" height="113" border="0" /></a><?php
																	}
																	?></td>
                                  <td><!-- <img src="upload/event01_02.jpg" alt="" width="150" height="113" border="0" /> --><?php
																	if (Trim($ev05)=="") {
																		?>&nbsp;<?php
																	} else {
																		?><a href="upload/events/<?php echo $ev05;?>" id="pic02"><img src="upload/events/<?php echo $ev05;?>" alt="" width="150" height="113" border="0" /></a><?php
																	}
																	?></td>
                                  <td align="right"><!-- <img src="upload/event01_03.jpg" alt="" width="150" height="113" border="0" /> --><?php
																	if (Trim($ev06)=="") {
																		?>&nbsp;<?php
																	} else {
																		?><a href="upload/events/<?php echo $ev06;?>" id="pic03"><img src="upload/events/<?php echo $ev06;?>" alt="" width="150" height="113"  border="0" /></a><?php
																	}
																	?></td>
                                  </tr>
                              </table></td>
                              </tr>
                            <tr>
                              <td align="left"><span class="title_5a4f3f">景點介紹 ：</span><br /> <span class="top_txt5a4f3f"><!-- 巴福越嶺古道的「巴」指桃園復興鄉巴陵村，「福」指烏來福山村。二、三百年前由泰雅族的大嵙崁群所踏踩出來的，泰雅族人由由巴陵西南方翻越過2,000多公尺的達觀山區，遷移至福山、烏來一帶，為泰雅族人因交流及通婚需要所開發的社路，故又稱姻親路古道。直至1913年日軍佔領巴壟(今上巴陵)，為連繫桃園廳與台北廳的山區，及為製造樟腦開採木材的經濟考量和控制此間泰雅族群的軍事考量，乃於民國初年依循原始山徑，修築由福山到巴陵的山地警備道路，並命名為「拉拉山角板山越嶺道」，即福巴越嶺古道（或稱巴福越嶺古道）。而步道上現存的人文遺址包括有比亞桑日警駐在所、拉拉山日警駐在所、檜山日警駐在所、扎孔日警駐在所等。<br />
                                經開墾後現長約17公里，由上巴陵約1,700公尺下降至烏來福山村400公尺，費時約莫8小時。沿途林木蓊鬱，雲霧瀰漫、煙雨濛濛，步道旁有100多棵巨木群，樹幹上長滿碩大的菇類，因是天然原始林，無法接近巨木群，只能遠觀。森林涵養了豐富的野生動植物，紅檜、扁柏、藍崁馬蘭、蕈類、地衣、地錢等形成了森林的高低層次。在「巴福越嶺」古道的開端，有一個小小的指示牌標明著「往福山17公里」。此處海拔約1500公尺，整齊平坦沿緩坡而下，林蔭大樹紛立兩旁、紅檜林延綿不斷，更深遠處則有闊葉林、雜木林、冷杉、鐵杉、臺灣杉等的原始林相；林間輕裝行走十分舒服。<br />
                                <br /> --><?php echo $ev03;?><br />
                              </span><span class="title_5a4f3f">行程及路線說明：</span><br />
                                <span class="top_txt5a4f3f"><!-- 05:50古亭野遊風集合出發 <br />
                                06:20三重野遊風集合出發
                                <br />
                                09:30抵上巴陵停車場，整裝步行3K柏油路
                                <br />
                                10:40拉拉山生態教育館，休息10分鐘
                                <br />
                                11:20進入拉拉山神木區至廣場，用餐40分鐘
                                <br />
                                12:05福巴越嶺古道17K
                                <br />
                                12:10 叉路口，取左續行往福巴越嶺國家步道入口 <br />
                                12:25 叉路口，左轉為舊路已崩坍，取右上續行<br />
                                12:45 福巴越嶺古道15K<br />
                                12:50 叉路口，取直續行
                                <br />
                                13:05 叉路口，左上往拉拉山約60分鐘，取直續行
                                <br />
                                13:30 福巴越嶺古道13K
                                <br />
                                15:35 福巴越嶺古道9K
                                <br />
                                15:40 叉路口，左上往檜木基石，取直續行
                                <br />
                                15:55 福巴越嶺古道6K
                                <br />
                                17:15 叉路口，右下往茶墾山及模故山
                                <br />
                                17:30 福巴越嶺古道1K
                                <br />
                                17:50福山吊橋
                                <br />
                                19:10捷運古亭站3號出口
                                <br />
                                19:40野遊風三重店
                                <br />
                                以上時程包含每個景點休息、拍照及午餐時間，全程暫估9小時，實際狀況則以考量全體山友體能狀況而定。 --><?php echo $ev11;?></span></td>
                            </tr>
                            <tr>
                              <td height="50" align="center" class="top_txt5a4f3f" style="border-top:1px dotted #97866d"><a name="app" id="app"></a>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr valign="bottom">
                                  <td width="15" height="15" align="right"><img src="images/log_bg_01.png" alt="" width="15" height="15" /></td>
                                  <td style="background:url(images/log_bg_02.png) repeat-x bottom">&nbsp;</td>
                                  <td width="15" align="left"><img src="images/log_bg_03.png" alt="" width="15" height="15" /></td>
                                </tr>
                                <tr>
                                  <td align="right" style="background:url(images/log_bg_04.png) no-repeat right top">&nbsp;</td>
                                  <td height="105" style="background:url(images/log_bg_05.png) repeat-x"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td height="30" align="left" valign="top"><img src="images/title-11.png" alt="" width="153" height="21" /></td>
                                    </tr>
                                    <tr>
                                      <td height="75" align="center" valign="middle"><FORM METHOD="POST" ACTION="event_01.php?ev01=<?php echo $ev01;?>" name="frmUser" id="frmUser"><INPUT TYPE="hidden" NAME="hdnOp" value="OnlineRegister"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                                        <!-- <tr>
                                          <td height="50" align="left" valign="middle" class="item_title">請與我們聯繫報名。</td>
                                        </tr> -->
                                        <tr>
                                          <td height="30" align="left" valign="middle"><!-- 報名電話：02-8512-1882 --><?php echo $ev12;?></td>
                                        </tr>
                                        <tr>
                                          <td height="30" align="left" valign="middle">銀行代號：<!-- 週一至週五 9:30~18:30（例假日及中午12:00~13:30暫不提供電話服務） --><?php echo $ev14;?></td>
                                        </tr>
                                        <tr>
                                          <td height="30" align="left" valign="middle">匯款帳號：<!-- www.wildbreeze.com.tw --><?php echo $ev15;?></td>
                                        </tr>
                                        <tr>
                                          <td height="30" align="left" valign="middle">戶名：<!-- www.wildbreeze.com.tw --><?php echo $ev16;?></td>
                                        </tr>
																				<?php
																				if (Trim($ev13)=="是") {
																					?>
																					<tr>
																						<td height="50" align="left" valign="middle" class="item_title">線上報名</td>
																					</tr>
																					<tr>
																						<td height="30" align="left" valign="middle">姓名：<INPUT TYPE="text" NAME="er02" id="er02"></td>
																					</tr>
																					<tr>
																						<td height="30" align="left" valign="middle">信箱：<INPUT TYPE="text" NAME="er03" id="er03"></td>
																					</tr>
																					<tr>
																						<td height="30" align="left" valign="middle">手機：<INPUT TYPE="text" NAME="er04" id="er04"></td>
																					</tr>
																					<tr>
																						<td height="30" align="left" valign="middle">帳號後五碼：<INPUT TYPE="text" NAME="er05" id="er05"></td>
																					</tr>
																					<?php
																					if (IsLogin()==false) {
																						?><tr>
																						<td height="30" align="left" valign="middle"><INPUT TYPE="button" value="線上報名" onclick="javascript:alert('請您先登入會員！');"></td>
																						</tr><?php
																					} else {
																						?><tr>
																						<td height="30" align="left" valign="middle"><INPUT TYPE="button" value="線上報名" onclick="DoSubmit();"></td>
																						</tr><?php
																					}
																				}
																				?>
                                        <!-- <tr>
                                          <td height="30" align="left" valign="middle" class="root_red">請於活動時間一週前與我們聯繫報名。</td>
                                        </tr> -->
                                      </table></FORM></td>
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
                          </table></td>
                          </tr>
                      </table></td>
                      <td rowspan="2" align="left" style="background:url(images/line-05.png) left repeat-y">&nbsp;</td>
                    </tr>
                    <tr valign="top">
                      <td height="10" bgcolor="#CDBFA2"><img src="images/li.png" alt="" width="1" height="1" /></td>
                      </tr>
                    <tr valign="top">
                      <td width="9" align="right"><img src="images/line_2.png" alt="" width="9" height="35" align="right" /></td>
                      <td align="right" valign="middle" style="background:url(images/line_2-02.png) repeat-x top"><a href="event.php" class="top_txtc9bc9c">回列表</a></td>
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

<SCRIPT LANGUAGE="JavaScript">
<!--
function DoSubmit() {
	sStatus = true;

	if (document.getElementById("er02").value=="") {
		alert("請輸入您的姓名！");
		document.getElementById('er02').focus();
		sStatus=false;
		return false;
	}
	if (document.getElementById("er03").value=="") {
		alert("請輸入您的信箱！");
		document.getElementById('er03').focus();
		sStatus=false;
		return false;
	}
	if (document.getElementById("er04").value=="") {
		alert("請輸入您的手機！");
		document.getElementById('er04').focus();
		sStatus=false;
		return false;
	}
	if (document.getElementById("er05").value=="") {
		alert("請輸入您的帳號後五碼！");
		document.getElementById('er05').focus();
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