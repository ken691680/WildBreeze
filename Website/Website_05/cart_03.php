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
$oh01=$_GET['oh01'];
if($_GET['oh01']!=''){
	$_SESSION['oh01']=$_GET['oh01'];
}

$me01=GetMemID();
if($me01=="") {
	$me01=session_id();
}


// ===========================================================================
// 接收參數宣告
// ===========================================================================
$Action=$_POST['Action'];
//jsAlert($Action);	
$oh17=$_POST['oh17'];
$oh18=$_POST['oh18'];

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

$aBuyerData=GetBuyerData();

if( $oh01==0 ) {
	jsHref("index.php");
}

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php



if($Action=="Action"){
  $sSQL="update orderheader set oh17='".$oh17."',oh18='".$oh18."' where oh01='".$_SESSION['oh01']."'";
	$result=GetRs($sSQL);
		//jsAlert($_SESSION['oh01']);
	//uLog("{@test@}".$sSQL);
	jsAlert("購買成功!");
	jsHref("index.php");
}

function GetBuyerData() {
	$sSQL="select member.me01, member.me02, member.me03, member.me04, member.me05, member.me06, member.me07, member.me08, member.me09, orderheader.oh07, orderheader.oh08, oh19, oh20, orderheader.oh21, orderheader.oh22, orderheader.oh23, orderheader.oh24, orderheader.oh25 from member, orderheader where member.me01='".GetMemID()."' and member.me01=orderheader.me01";
	$result=GetRs($sSQL);
	$aBuyerData=array();
	while( $row=mysql_fetch_array($result) ) {
		$aBuyerData['me01']=$row['me01'];
		$aBuyerData['me02']=$row['me02'];
		$aBuyerData['me03']=$row['me03'];
		$aBuyerData['me04']=$row['me04'];
		$aBuyerData['me05']=$row['me05'];
		$aBuyerData['me06']=$row['me06'];
		$aBuyerData['me07']=$row['me07'];
		$aBuyerData['me08']=$row['me08'];
		$aBuyerData['me09']=$row['me09'];
		$aBuyerData['oh07']=$row['oh07'];
		$aBuyerData['oh19']=$row['oh19'];
		$aBuyerData['oh20']=$row['oh20'];
		$aBuyerData['oh21']=$row['oh21'];
		$aBuyerData['oh22']=$row['oh22'];
		$aBuyerData['oh23']=$row['oh23'];
		$aBuyerData['oh24']=$row['oh24'];
		$aBuyerData['oh25']=$row['oh25'];
	}
	return $aBuyerData;
}

function GetCartData($oh01) {
	$sSQL="select (select pi16 from productinfo where productinfo.pi01=orderdetail.pi01) as pi16, od01, od02, od03, orderdetail.pi01, orderdetail.pi13 as Color, orderdetail.pi14 as Size, orderdetail.pi02, orderdetail.pi04 from orderdetail, orderheader where orderheader.oh01='".$oh01."' and orderheader.oh01= orderdetail.oh01 order by orderdetail.lasttime desc";
	//$sSQL="select odt01, odt02, odt03, orderdetailtemp.pi01, orderdetailtemp.pi13 as Color, orderdetailtemp.pi14 as Size, orderdetailtemp.pi02, orderdetailtemp.pi04 from orderdetailtemp, orderheader where oh01='".$oh01."' and orderheader.oh01= orderdetailtemp.oh01 order by orderdetailtemp.lasttime desc";
	$result=GetRs($sSQL);
	while( $row=mysql_fetch_array($result) ) {
		$CountCost+=$row['od02']*$row['pi04'];	
?>
	<tr class="txt13_313131">
		<td height="100" align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><table border="0" align="center" cellpadding="5" cellspacing="0">
			<tr>
				<td align="center" valign="middle" bgcolor="#C9BC9C"><a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>"><img src="upload/productinfo/<?php echo $row['pi16'];?>" alt="" width="80" height="80" border="0" align="middle" /></a></td>
				<td width="180" align="left" valign="middle"><a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>" class="item_txt_a"><?php echo $row['pi02'];?></a></td>
				</tr>
		</table></td>
		<td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><?php echo $row['od02'];?></td>
		<td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><?php echo $row['pi04'];?></td>
		<td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><?php echo GetColorName($row['Color']);?></td>
		<td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><?php echo GetSizeName($row['Size']);?></td>
		<td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><?php echo $row['od02']*$row['pi04'];?></td>
		<!-- <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><a href="member_log.html" class="btn_bg">取　消</a></td> -->
	</tr>
<?php
	}
?>
	<tr>
		<td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">&nbsp;</td>
		<td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">&nbsp;</td>
		<td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">&nbsp;</td>
		<td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">&nbsp;</td>
		<td colspan="2" align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">商品金額總計</td>
		<td align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid"><?php echo $CountCost;?></td>
	</tr>
	<tr>
		<td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f">&nbsp;</td>
		<td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f">&nbsp;</td>
		<td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f">&nbsp;</td>
		<td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f">&nbsp;</td>
		<td colspan="2" align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f">物流費</td>
		<td align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f">0</td>
	</tr>
	<tr>
		<td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid">&nbsp;</td>
		<td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid">&nbsp;</td>
		<td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid">&nbsp;</td>
		<td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid">&nbsp;</td>
		<td colspan="2" align="right" valign="bottom" bgcolor="#D3C1A9" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">訂單金額總計</td>
		<td align="right" valign="bottom" bgcolor="#D3C1A9" class="title_5a4f3f" style="border-bottom:#97866d 1px solid"><?php echo $CountCost;?></td>
	</tr>
<?php
}
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
<!--<form name="">-->
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
              <td align="center" valign="middle"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
                <tr valign="bottom">
                  <td height="5" colspan="3" align="right"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
                <tr valign="bottom">
                  <td width="9" align="right"><img src="images/line-02.png" alt="" width="9" height="40" /></td>
                  <td width="640" align="left" valign="middle" class="titleB" style="background:url(images/line.png) bottom repeat-x"><img src="images/titlebar.png" alt="" width="10" height="15" align="absmiddle" />購物車</td>
                  <td width="11" align="left"><img src="images/line-03.png" alt="" width="11" height="40" /></td>
                </tr>
                <tr>
                  <td rowspan="4" align="right" style="background:url(images/line-04.png) repeat-y right">&nbsp;</td>
                  <td align="left" valign="top" bgcolor="#CDBFA2" class="txt13_313131"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr valign="bottom">
                      <td width="15" height="15" align="right"><img src="images/log_bg_01.png" alt="" width="15" height="15" /></td>
                      <td style="background:url(images/log_bg_02.png) repeat-x bottom">&nbsp;</td>
                      <td width="15" align="left"><img src="images/log_bg_03.png" alt="" width="15" height="15" /></td>
                    </tr>
                    <tr>
                      <td align="right" style="background:url(images/log_bg_04.png) no-repeat right top">&nbsp;</td>
                      <td height="200" valign="top" bgcolor="#FFFFFF" style="background:url(images/log_bg_05.png) repeat-x"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="30" align="left" valign="top"><img src="images/title-09.png" alt="" width="149" height="21" /></td>
                        </tr>
                        <tr>
                          <td height="220" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                            <tr class="title_5a4f3f">
                              <td align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 商品名稱</td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 數量</td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid">金額</td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 樣式 </td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid">尺寸</td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 小計 </td>
                            </tr>
														<?php GetCartData($oh01);?>
                            <!-- <tr class="txt13_313131">
                              <td height="100" align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><table border="0" align="center" cellpadding="5" cellspacing="0">
                                <tr>
                                  <td align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="images/item_pic01.jpg" alt="" width="80" height="80" border="0" align="middle" /></a></td>
                                  <td width="180" align="left" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>
                                  </tr>
                              </table></td>
                              <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted">1</td>
                              <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted">1999</td>
                              <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted">瀝灰</td>
                              <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted">s</td>
                              <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted">1999</td>
                            </tr>
                            <tr class="txt13_313131">
                              <td height="100" align="center" valign="middle"><table border="0" align="center" cellpadding="5" cellspacing="0">
                                <tr>
                                  <td align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="images/item_pic01.jpg" alt="" width="80" height="80" border="0" align="middle" /></a></td>
                                  <td width="180" align="left" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>
                                  </tr>
                              </table></td>
                              <td align="center" valign="middle">1</td>
                              <td align="center" valign="middle">1999</td>
                              <td align="center" valign="middle">瀝灰</td>
                              <td align="center" valign="middle">s</td>
                              <td align="center" valign="middle">1999</td>
                            </tr>
                            <tr>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">&nbsp;</td>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">&nbsp;</td>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">&nbsp;</td>
                              <td colspan="2" align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">商品金額總計</td>
                              <td align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">1999</td>
                            </tr>
                            <tr>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f">&nbsp;</td>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f">&nbsp;</td>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f">&nbsp;</td>
                              <td colspan="2" align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f">物流費</td>
                              <td align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f">0</td>
                            </tr>
                            <tr>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid">&nbsp;</td>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid">&nbsp;</td>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid">&nbsp;</td>
                              <td colspan="2" align="right" valign="bottom" bgcolor="#D3C1A9" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">訂單金額總計</td>
                              <td align="right" valign="bottom" bgcolor="#D3C1A9" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">1999</td>
                            </tr> -->
                          </table></td>
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
                  <td rowspan="4" align="left" style="background:url(images/line-05.png) left repeat-y">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" valign="top" bgcolor="#CDBFA2" class="txt13_313131">
					<form id="BuyForm" name="BuyForm" action="cart_03.php" method="post">
					<input type="hidden" id="Action" name="Action">

									<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr valign="bottom">
                      <td width="15" height="15" align="right"><img src="images/log_bg_01.png" alt="" width="15" height="15" /></td>
                      <td style="background:url(images/log_bg_02.png) repeat-x bottom">&nbsp;</td>
                      <td width="15" align="left"><img src="images/log_bg_03.png" alt="" width="15" height="15" /></td>
                    </tr>
                    <tr>
                      <td align="right" style="background:url(images/log_bg_04.png) no-repeat right top">&nbsp;</td>
                      <td valign="top" bgcolor="#FFFFFF" style="background:url(images/log_bg_05.png) repeat-x"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="30" align="left" valign="top" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid"><img src="images/title_cart01.png" alt="" width="110" height="22" />　<!-- 填寫以下資料即可成為會員 --></td>
                        </tr>
                        <tr>
                          <td height="220" align="center" valign="middle"><table border="0" cellspacing="5" cellpadding="0">
                            <tr>
                              <td width="100" align="center" valign="middle" class="title_5a4f3f">中文全名</td>
                              <td width="350" align="left" valign="middle" class="top_txt5a4f3f"><?php echo $aBuyerData['me03']." ".$aBuyerData['me04'];?><!-- 王小白 先生 --></td>
                            </tr>
                            <!-- <tr>
                              <td align="center" valign="middle" class="title_5a4f3f">會員暱稱</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f">小白</td>
                            </tr> -->
                            <tr>
                              <td width="100" align="center" valign="middle" class="title_5a4f3f">電子郵件</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><?php echo $aBuyerData['me01'];?><!-- <input name="textfield11" type="text" class="top_txt5a4f3f" id="textfield13"  style="width:220px"/> --></td>
                            </tr>
                            <tr>
                              <td width="100" align="center" valign="middle" class="title_5a4f3f">設定密碼</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f">******</td>
                            </tr>
                            <tr>
                              <td width="100" align="center" valign="middle" class="title_5a4f3f">確認密碼</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f">******</td>
                            </tr>
                            <tr>
                              <td align="center" valign="middle" class="title_5a4f3f">手機號碼</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><?php echo $aBuyerData['me05'];?><!-- 0987654321 --></td>
                            </tr>
                            <tr>
                              <td align="center" valign="middle" class="title_5a4f3f">聯絡地址</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><label for="select"></label>
                                <?php echo $aBuyerData['me08']." ".$aBuyerData['me06'].$aBuyerData['me07'].$aBuyerData['me09'];?><!-- 110 台北市大安區信義路二段230號 --></td>
                            </tr>
                            <tr>
                              <td width="100" align="center" valign="middle" class="title_5a4f3f">發票資料</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"> 統一編號
                                <input name="oh17" id="oh17" type="text" class="top_txt5a4f3f" id="textfield20"  style="width:100px"/>
                                發票抬頭
                                <input name="oh18" id="oh18" type="text" class="top_txt5a4f3f" id="textfield21"  style="width:100px"/></td>
                            </tr>
                          </table></td>
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
                  <td align="left" valign="top" bgcolor="#CDBFA2" class="txt13_313131"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr valign="bottom">
                      <td width="15" height="15" align="right"><img src="images/log_bg_01.png" alt="" width="15" height="15" /></td>
                      <td style="background:url(images/log_bg_02.png) repeat-x bottom">&nbsp;</td>
                      <td width="15" align="left"><img src="images/log_bg_03.png" alt="" width="15" height="15" /></td>
                      </tr>
                    <tr>
                      <td align="right" style="background:url(images/log_bg_04.png) no-repeat right top">&nbsp;</td>
                      <td valign="top" bgcolor="#FFFFFF" style="background:url(images/log_bg_05.png) repeat-x"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="30" align="left" valign="top" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid"><img src="images/title_cart02.png" alt="" width="110" height="22" />　
                            <!-- <input name="checkbox2" type="checkbox" class="top_txt5a4f3f" id="checkbox2" />
                            <label for="checkbox2"></label>
                            同訂購人資訊 --></td>
                          </tr>
                        <tr>
                          <td height="120" align="center" valign="middle"><table border="0" cellspacing="5" cellpadding="0">
                            <tr>
                              <td width="100" align="center" valign="middle" class="title_5a4f3f">中文全名</td>
                              <td width="350" align="left" valign="middle" class="top_txt5a4f3f"><?php echo $aBuyerData['oh19']." ".$aBuyerData['oh20'];?><!-- 王小白 先生 --></td>
                              </tr>
                            <tr>
                              <td align="center" valign="middle" class="title_5a4f3f">手機號碼</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><?php echo $aBuyerData['oh21'];?><!-- 0987654321 --></td>
                              </tr>
                            <tr>
                              <td align="center" valign="middle" class="title_5a4f3f">送貨地址</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><label for="select"></label>
                                <?php echo $aBuyerData['oh24']." ".$aBuyerData['oh22'].$aBuyerData['oh23'].$aBuyerData['oh25'];?><!-- 110 台北市大安區信義路二段230號 --></td>
                              </tr>
                            </table></td>
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
                  <td align="left" valign="top" bgcolor="#CDBFA2" class="txt13_313131">&nbsp;</td>
                </tr>
                <tr valign="top">
                  <td align="right"><img src="images/line-06.png" alt="" width="9" height="10" align="right" /></td>
                  <td style="background:url(images/line-07.png) repeat-x top">&nbsp;</td>
                  <td align="left"><img src="images/line-08.png" alt="" width="11" height="10" /></td>
                </tr>
                <tr valign="top">
                  <td height="40" colspan="3" align="center" valign="middle"><a href="#" onclick="Buy();"><img src="images/pay_sent.jpg" alt="" width="100" height="30" border="0" /></a></td>
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
</form>
<?php 
Jscript();


function Jscript(){
?>
<script language="javascript">
//alert("aaaa");
function Buy(){

			document.getElementById("Action").value="Action";
	//alert(document.getElementById("Action").value);
		document.BuyForm.submit();

}
</script>
<?php
}

?>
<!--
<script type="text/javascript">

function Buy() {

		document.getElementById("Action").value="Action";
}-->	

swfobject.registerObject("FlashID");
</script>
</body>
<!-- InstanceEnd --></html>
