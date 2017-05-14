<?php //*********************************模組檔案引入********************************* ?>
<?php include("Module/pUwm.php"); ?>
<?php //**************************************************************************** ?>

<?php //*********************************前置變數定義********************************* ?>
<?php
// ===========================================================================
// 初始化參數宣告
// ===========================================================================
ErrorReporting(E_ERROR | E_WARNING | E_PARSE);                    //錯誤回報控制 0關掉 E_ALL全部回報
$me01=GetMemID();
if($me01=="") {
	$me01=session_id();
}
// ===========================================================================
// 接收參數宣告
// ===========================================================================
if( isset($_GET['pi01']) ) {
	$pi01=$_GET['pi01'];
} else {
	$pi01=$_POST['pi01'];
}
$IsBuyNow=$_POST['IsBuyNow'];
$aCart['ColorSize']=$_POST['ColorSize'];
$aCart['odt02']=$_POST['odt02'];
$action=$_POST['action'];
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

if( $action == "AddCart" ){
	AddCart( $pi01, $aCart, $me01, $IsBuyNow);
}

$aProduct=GetProductData($pi01);
$aColor=$aProduct['Color'];
$aColor_Id=$aProduct['Color_Id'];
$aSize=$aProduct['Size'];
$aSize_Id=$aProduct['Size_Id'];
$aColorSize=array();
$aColorSize_Id=array();
$aProsuctNum=array();
$i=0;
uLog($aColor);
uLog($aSize);

if( is_array($aColor) ) {
	foreach( $aColor as $v ) {
		foreach( $aSize as $v2 ) {
			$aColorSize[$i]=$v."-".$v2;
			$i++;
		}
	}
}

if( is_array($aColor_Id) ) {
	foreach( $aColor_Id as $v ) {
		foreach( $aSize_Id as $v2 ) {
			$aColorSize_Id[$i]=$v."-".$v2;
			$i++;
		}
	}
}


if( $aProduct['pi27']==0 ){
	$aProduct['pi27']="補貨中";
	$aProsuctNum[0]="缺貨中";
} else {
	for( $i=1; $i<=$aProduct['pi27']; $i++) {
		$aProsuctNum[$i-1]=$i;
	}
}




//$aColorSize="";

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

function AddCart( $pi01, $aCart, $me01, $IsBuyNow) {
	$aColorSize=StringToArray($aCart['ColorSize'],"-");
	$sSQL="select * from orderdetailtemp where pi01='".$pi01."' and me01='".$me01."' and pi13='".$aColorSize[0]."' and pi14='".$aColorSize[1]."'";
	$result=GetRs($sSQL);
	if( mysql_num_rows($result)!=0 ) {
		if( $IsBuyNow=="true" ) {
			jsHref("cart_02.php");//已在購物車內,直接跳到結帳畫面
			return;
		} else {
			jsAlert("商品已在購物車內!");
			return;
		}
	}
	$odt01=GetDateTimeCE().GetMicroTime();
	if($aCart['odt02']=="缺貨中"){
		jsAlert("此商品缺貨中!");
		jsHref("#");
	}	else{
				$sSQL="insert into orderdetailtemp ( odt01, odt02, odt03, pi01, pi02, pi04, pi13, pi14, me01, lasttime) value ( '".$odt01."', '".$aCart['odt02']."', '".$odt03."', '".$pi01."', '".$pi02."', '".$pi04."', '".$aColorSize[0]."', '".$aColorSize[1]."', '".$me01."', now())";
				GetRs($sSQL);
				if( $IsBuyNow=="true" ) {
						jsHref("cart_02.php");//已在購物車內,直接跳到結帳畫面
				}
				jsAlert("已新增至購物車!");
				jsHref("cart_01.php");
	}
}

function DelRight( $sStr) {
	if( Right( $sStr, 1) == " " ) {
		$sStr=Left( $sStr, (Len($sStr) - 1) );
	}
	if( Right( $sStr, 1) == "," ) {
		$sStr=Left( $sStr, (Len($sStr) - 1) );
	}
	return $sStr;
}

function GetProductData($pi01) {
	$sSQL="select * from productinfo where pi01='".$pi01."'";
	$result=GetRs($sSQL);
	$aProduct=array();
	while($row=mysql_fetch_array($result)) {
		$aProduct['pi01']=$row['pi01'];
		$aProduct['pi02']=$row['pi02'];
		$aProduct['pi03']=$row['pi03'];
		$aProduct['pi04']=$row['pi04'];
		$aProduct['pi05']=$row['pi05'];
		$aProduct['pi06']=$row['pi06'];
		$aProduct['pi07']=$row['pi07'];
		$aProduct['pi08']=$row['pi08'];
		$aProduct['pi09']=$row['pi09'];
		$aProduct['pi10']=$row['pi10'];
		$aProduct['pi11']=$row['pi11'];
		$aProduct['pi12']=$row['pi12'];
		$row['pi13']=DelRight($row['pi13']);
		uLog("pi13 == ".$row['pi13']);
		$row['pi14']=DelRight($row['pi14']);
		uLog("pi14 == ".$row['pi14']);
		$aProduct['pi13']=StringToArray($row['pi13'],",");
		$aProduct['pi14']=StringToArray($row['pi14'],",");
		$aProduct['Color_Id']=$aProduct['pi13'];
		$aProduct['Size_Id']=$aProduct['pi14'];
		foreach( $aProduct['pi13'] as $v ) {
			$sSQL_1="select dc02 from datacode where dc01='".Replace($v," ","")."' and dc03='顏色'";
			$result_1=GetRs($sSQL_1);
			while( $row_1=mysql_fetch_array($result_1) ) {
				$aProduct['Color'][]=$row_1['dc02'];
			}
		}
		foreach( $aProduct['pi14'] as $v ) {
			$sSQL_2="select dc02 from datacode where dc01='".Replace($v," ","")."' and dc03='尺寸'";
			$result_2=GetRs($sSQL_2);
			while( $row_2=mysql_fetch_array($result_2) ) {
				$aProduct['Size'][]=$row_2['dc02'];
				uLog($row_2['dc02']);
			}
		}
		$aProduct['pi15']=$row['pi15'];
		$aProduct['pi16']=$row['pi16'];
		$aProduct['pi17']=$row['pi17'];
		$aProduct['pi18']=$row['pi18'];
		$aProduct['pi19']=$row['pi19'];
		$aProduct['pi20']=$row['pi20'];
		$aProduct['pi21']=$row['pi21'];
		$aProduct['pi22']=$row['pi22'];
		$aProduct['pi23']=$row['pi23'];
		$aProduct['pi24']=$row['pi24'];
		$aProduct['pi25']=$row['pi25'];
		$aProduct['pi26']=$row['pi26'];
		$aProduct['pi27']=$row['pi27'];
		$aProduct['pi28']=$row['pi28'];
		$aProduct['pr01']=$row['pr01'];
	}
	return $aProduct;
}

function AddCartJscript() {
?>
<script language="javascript">

function AddCart() { 
	document.AddCartForm.submit();
}

function BuyNow() {
	document.getElementById("IsBuyNow").value="true";
	document.AddCartForm.submit();
}

</script>
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
<form id="AddCartForm" name="AddCartForm" action="shop_intro.php" method="post">
<input type="hidden" id="action" name="action" value="AddCart">
<input type="hidden" id="IsBuyNow" name="IsBuyNow" value="false">
<input type="hidden" id="pi01" name="pi01" value="<?php echo $pi01; ?>">
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
                      <td width="200" align="left" bgcolor="#C9BDA2"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                        <tr>
                          <td align="left" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">服飾區</td>
                          </tr>
                        <tr>
                          <td align="left" valign="middle" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                    </table>--></td>
                   </tr>
                <tr>
                  <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>
                  </tr>
                <tr>
                  <td align="center" valign="middle">
									<?php CommendProduct();?>
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
              <td align="right" valign="top"><table width="660" border="0" cellspacing="0" cellpadding="0">
                <tr valign="bottom">
                  <td height="10" colspan="3" align="right"><img src="images/li.png" alt="" width="1" height="1" /></td>
                  </tr>
                <tr valign="bottom">
                  <td width="15" height="15" align="right"><img src="images/log_bg_01.png" alt="" width="15" height="15" /></td>
                  <td style="background:url(images/log_bg_02.png) repeat-x bottom">&nbsp;</td>
                  <td width="15" align="left"><img src="images/log_bg_03.png" alt="" width="15" height="15" /></td>
                </tr>
                <tr>
                  <td align="right" bgcolor="#FFFFFF" style="background:url(images/log_bg_04.png) repeat-y right top">&nbsp;</td>
                  <td align="center" valign="top" bgcolor="#FFFFFF" style="background:url(images/log_bg_05.png) repeat-x"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td rowspan="6" align="center" valign="middle"><img src="upload/productinfo/<?php echo $aProduct['pi16']?>" alt="" width="280" height="280" /></td>
                      <td colspan="2" align="left" class="item_title"><!-- THE NORTH FACE
                        DIEZ JACKET 800FP 男羽絨外套 --><?php echo $aProduct['pi02']?></td>
                    </tr>
                    <tr>
                      <td width="70" align="right" class="title_5a4f3f">立即購買 :</td>
                      <td width="200" align="left" class="price_redB">$<?php echo $aProduct['pi03']?></td>
                    </tr>
                    <tr>
                      <td align="right" class="title_5a4f3f">庫存狀況 :</td>
                      <td width="200" align="left" class="top_txt5a4f3f"><?php echo $aProduct['pi27'] ?></td>
                    </tr>
                    <tr>
                      <td align="right" class="title_5a4f3f">顏色尺寸 :</td>
                      <td width="200" align="left" class="top_txt5a4f3f"><label for="select2"></label>
                        <?php RwListBox( "ColorSize", "", $aColorSize_Id, $aColorSize,  "", "", "", "", "", "");?><!-- <select name="select3" class="top_txtc9bc9c" id="select2" style="background:#5a4f3f">
                          <option>瀝灰-S</option>
                        </select> --></td>
                    </tr>
                    <tr>
                      <td align="right" class="title_5a4f3f">購買數量 :</td>
                      <td width="200" align="left" class="top_txt5a4f3f"><?php RwListBox( "odt02", "", $aProsuctNum, $aProsuctNum,  "", "", "", "", "", "");?><!-- <select name="select3" class="top_txtc9bc9c" id="select3" style="background:#5a4f3f">
                        <option>缺貨中</option>
                      </select> --></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="right" valign="top" class="title_5a4f3f" style="border-top:#97866d 1px dotted"><table border="0" cellspacing="5" cellpadding="0">
                        <tr>
                          <td bgcolor="#4D4234"><a href="#;return;" class="btn_bg" onclick="BuyNow();">立即結帳</a></td>
                          <td bgcolor="#4D4234"><a href="#;return;" class="btn_bg" onclick="AddCart();">放入購物車</a></td>
                          <td width="105" align="right" valign="top" class="top_txt60412F">分享：<a href="#" onclick="javascript:void(window.open('http://www.facebook.com/share.php?u='.concat(encodeURIComponent(location.href))));" target="_blank"><img src="images/icon_fb.png" alt="" width="14" height="14" border="0" align="middle" /></a></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td colspan="3" align="center" valign="middle">
												<?php
													for ($i=17;$i<26;$i++) {
														$s="pi".$i;
														if( $aProduct[$s] != "" ) {
															echo '<br /><img src="upload/productinfo/'.$aProduct[$s].'" width="600" height="720" /><br />';
														}
													}
												?>
												<!-- <img src="upload/item_pic004.jpg" width="600" height="720" /><br />
                        <br />
                        <img src="upload/item_pic005.jpg" width="600" height="864" /><br />
                        <br />
												<img src="upload/item_pic002.jpg" width="600" height="363" /> --></td>
                    </tr>
                    <tr>
                      <td colspan="3" align="center" valign="middle"><table width="600" border="0" cellspacing="10" cellpadding="0">
                        <tr valign="top">
                          <td width="50%" align="left"><img src="images/more_01.png" alt="" width="11" height="11" align="middle" /><span class="member_name"> 商品規格</span>
                            <br />
                            <span class="title_5a4f3f">材質：</span><span class="top_txt5a4f3f"><?php echo $aProduct['pi10']?><!-- 10D 25g/m ²PERTEX SYNCRO-100%尼龍布 --></span><br />
                            <span class="title_5a4f3f">填充物：</span><span class="top_txt5a4f3f"><!-- 800 FP 天然鵝絨  --><?php echo $aProduct['pi11']?></span><br />
                            <span class="title_5a4f3f">重量：</span><span class="top_txt5a4f3f"><!-- 308g --><?php echo $aProduct['pi12']?></span><br />
                            <span class="title_5a4f3f">顏色：</span><span class="top_txt5a4f3f"><!-- 瀝灰、黑色 --><?php echo $aProduct['pi13']?></span></td>
                          <td width="50%" align="left" class="top_txt5a4f3f"><img src="images/more_01.png" alt="" width="11" height="11" align="middle" /><span class="member_name"> 注意事項</span><br />
                            <?php echo $aProduct['pi15']?></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                  <td align="left" bgcolor="#FFFFFF" style="background:url(images/log_bg_06.png) repeat-y left top">&nbsp;</td>
                </tr>
                <tr valign="top">
                  <td height="15" align="right"><img src="images/log_bg_07.png" alt="" width="15" height="15" /></td>
                  <td style="background:url(images/log_bg_08.png) top repeat-x">&nbsp;</td>
                  <td align="left"><img src="images/log_bg_09.png" alt="" width="15" height="15" /></td>
                </tr>
              </table>
                <table width="660" border="0" align="right" cellpadding="0" cellspacing="0">
                <tr>                  </tr>
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
</form>
<?php
AddCartJscript();
?>
</body>
<!-- InstanceEnd --></html>
