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
$me01=GetMemID();
if($me01=="") {
	$me01=session_id();
}
$Cart=CartBuy($me01);


// ===========================================================================
// 接收參數宣告
// ===========================================================================
$ChgProductInfo=$_POST['ChgProductInfo'];
$odt01=$_POST['odt01'];
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

if( $action=="ChgCartNum" ) {
	$aChgProductInfo=StringToArray($ChgProductInfo,",");
	$sSQL="update orderdetailtemp set odt02='".$aChgProductInfo[1]."' where odt01='".$aChgProductInfo[0]."' and me01='".$me01."'";
	GetRs($sSQL);
}
if( $action=="DelCart" ) {
	$sSQL="delete from orderdetailtemp where me01='".$me01."' and odt01='".$odt01."'";
	GetRs($sSQL);
	//jsAlert("已從清單中移除!");
}


?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

function GetCartData($me01) {
	$sSQL="select odt01, odt02, odt03, orderdetailtemp.pi01, orderdetailtemp.pi13 as Color, orderdetailtemp.pi14 as Size, productinfo.pi02, productinfo.pi04, productinfo.pi13, productinfo.pi14, productinfo.pi16, pi27 from orderdetailtemp, productinfo where me01='".$me01."' and productinfo.pi01 = orderdetailtemp.pi01 order by orderdetailtemp.lasttime desc";
	$result=GetRs($sSQL);
	$aCartData=array();
	$CountCost=0;
	while( $row=mysql_fetch_array($result)){
		//$aCartData['odt01'][]=$row['odt01'];
		//$aCartData['odt02'][]=$row['odt02'];
		//$aCartData['odt03'][]=$row['odt03'];
		//$aCartData['pi01'][]=$row['pi01'];
		//$aCartData['pi02'][]=$row['pi02'];
		//$aCartData['pi04'][]=$row['pi04'];
		//$aCartData['pi13'][]=$row['pi13'];
		//$aCartData['pi14'][]=$row['pi14'];
		//$aCartData['pi16'][]=$row['pi16'];
		//$aCartData['pi27'][]=$row['pi27'];
		//$aProductColor=StringToArray($row['pi13'],",");
		//$aProductSize=StringToArray($row['pi14'],",");
		$CountCost+=$row['odt02']*$row['pi04'];
		$aProductNum=array();
		$aProductChgNum=array();//數量加上商品編號,下拉式選單submit時要用
		for( $i=1; $i<=$row['pi27']; $i++) {
			$aProductNum[$i-1]=$i;
			$aProductChgNum[$i-1]=$row['odt01'].",".$i;
		}
?>
		<tr class="txt13_313131">
			<td height="100" align="center" valign="middle" style="border-bottom:#97866d 1px dotted">
			<table border="0" align="center" cellpadding="5" cellspacing="0">
				<tr>
					<td align="center" valign="middle" bgcolor="#C9BC9C"><a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>"><img src="upload/productinfo/<?php echo $row['pi16'];?>" alt="" width="80" height="80" border="0" align="middle" /></a></td>
					<td width="180" align="left" valign="middle"><a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>" class="item_txt_a"><?php echo $row['pi02'];?></a></td>
					</tr>
			</table></td>
			<td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><a href="#;return;" name="<?php echo $row['odt01']; ?>" class="btn_bg" onclick="DelCart(this);">下次再買</a></td>
			<td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><label for="select2"></label>
				<?php RwListBox( "CartNum", "", $aProductChgNum, $aProductNum,  $row['odt01'].",".$row['odt02'], "", "", "ChgCartNum(this);", "", "");?>
				<!-- <select name="select2" class="top_txt5a4f3f" id="select2">
					<option>1</option>
				</select> -->
			</td>
			<td align="center" valign="middle" style="border-bottom:#97866d 1px dotted">
				<?php echo $row['pi04'];?></td>
			<td align="center" valign="middle" style="border-bottom:#97866d 1px dotted">
				<?php echo GetColorName($row['Color']);?>
				<!-- <?php RwListBox( "SubProperty", "", $aProductColor, $aProductColor,  $row['Color'], "", "", "ChgSubProperty(this);", "", "");?> --></td>
			<td align="center" valign="middle" style="border-bottom:#97866d 1px dotted">
				<?php echo GetSizeName($row['Size']);?>
				<!-- <?php RwListBox( "SubProperty", "", $aProductSize, $aProductSize,  $row['Size'], "", "", "ChgSubProperty(this);", "", "");?> --></td>
			<td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><?php echo $row['odt02']*$row['pi04'];?></td>
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
	//return $aCartData;
}

function CartJscript() {
?>
<script language="javascript">

function ChgCartNum(sel){
	document.getElementById("ChgProductInfo").value=sel.value;
	document.getElementById("action").value="ChgCartNum";
	document.CartForm.submit();
}

function DelCart(sel) {
	document.getElementById("odt01").value=sel.name;
	document.getElementById("action").value="DelCart";
	document.CartForm.submit();
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
<form id="CartForm" name="CartForm" method="post" action="cart_01.php" >
<input type="hidden" name="ChgProductInfo" id="ChgProductInfo">
<input type="hidden" name="odt01" id="odt01">
<input type="hidden" name="action" id="action">
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
                  <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                          <td height="220" align="center" valign="middle">
													<table width="100%" border="0" cellspacing="0" cellpadding="2">
                            <tr class="title_5a4f3f">
                              <td align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 商品名稱</td>
                              <td width="12%" align="center" valign="middle" style="border-bottom:#97866d 1px solid">&nbsp;</td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 數量</td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid">金額</td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 樣式 </td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid">尺寸</td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 小計 </td>
                            </tr>
														<?php GetCartData($me01); ?>
                            <!-- <tr class="txt13_313131">
                              <td height="100" align="center" valign="middle" style="border-bottom:#97866d 1px dotted">
															<table border="0" align="center" cellpadding="5" cellspacing="0">
                                <tr>
                                  <td align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="images/item_pic01.jpg" alt="" width="80" height="80" border="0" align="middle" /></a></td>
                                  <td width="180" align="left" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>
                                  </tr>
                              </table></td>
                              <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><a href="shop.html" class="btn_bg">下次再買</a></td>
                              <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><label for="select2"></label>
                                <select name="select2" class="top_txt5a4f3f" id="select2">
                                  <option>1</option>
                                </select></td>
                              <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted">1999</td>
                              <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted">瀝灰</td>
                              <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><select name="select" class="top_txt5a4f3f" id="select3">
                                <option>s</option>
                              </select></td>
                              <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted">1999</td>
                            </tr>
                            <tr class="txt13_313131">
                              <td height="100" align="center" valign="middle"><table border="0" align="center" cellpadding="5" cellspacing="0">
                                <tr>
                                  <td align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="images/item_pic01.jpg" alt="" width="80" height="80" border="0" align="middle" /></a></td>
                                  <td width="180" align="left" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>
                                  </tr>
                              </table></td>
                              <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><a href="shop.html" class="btn_bg">下次再買</a></td>
                              <td align="center" valign="middle"><span style="border-bottom:#97866d 1px dotted">
                                <select name="select6" class="top_txt5a4f3f" id="select5">
                                  <option>1</option>
                                  </select>
                              </span></td>
                              <td align="center" valign="middle">1999</td>
                              <td align="center" valign="middle">瀝灰</td>
                              <td align="center" valign="middle"><span style="border-bottom:#97866d 1px dotted">
                                <select name="select5" class="top_txt5a4f3f" id="select4">
                                  <option>s</option>
                                </select>
                              </span></td>
                              <td align="center" valign="middle">1999</td>
                            </tr>
                            <tr>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">&nbsp;</td>
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
                              <td align="right" valign="bottom" bgcolor="#D3C1A9" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">1999</td>
                            </tr> -->
                          </table>
													<!-- <table width="100%" border="0" cellspacing="0" cellpadding="2">
                            <tr class="title_5a4f3f">
                              <td align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 商品名稱</td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 數量</td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid">金額</td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 樣式 </td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid">尺寸</td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 小計 </td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid">&nbsp;</td>
                              </tr>
                            <tr class="txt13_313131">
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
                              <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><a href="member_log.html" class="btn_bg">取　消</a></td>
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
                              <td align="center" valign="middle"><a href="member_log.html" class="btn_bg">取　消</a></td>
                              </tr>
                            <tr>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">&nbsp;</td>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">&nbsp;</td>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">&nbsp;</td>
                              <td align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">&nbsp;</td>
                              <td colspan="2" align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">商品金額總計</td>
                              <td align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">1999</td>
                              </tr>
                            <tr>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f">&nbsp;</td>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f">&nbsp;</td>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f">&nbsp;</td>
                              <td align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f">&nbsp;</td>
                              <td colspan="2" align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f">物流費</td>
                              <td align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f">0</td>
                              </tr>
                            <tr>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid">&nbsp;</td>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid">&nbsp;</td>
                              <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid">&nbsp;</td>
                              <td align="right" valign="bottom" bgcolor="#D3C1A9" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">&nbsp;</td>
                              <td colspan="2" align="right" valign="bottom" bgcolor="#D3C1A9" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">訂單金額總計</td>
                              <td align="right" valign="bottom" bgcolor="#D3C1A9" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">1999</td>
                              </tr>
                            </table> --></td>
                        </tr>
                        <tr>
                          <td height="50" align="right" valign="middle"><table border="0" cellspacing="5" cellpadding="0">
                            <tr>
						<?php
										if($Cart!=0){
						?>
										
                              <td><a href="cart_02.php?pay=ATM" class="btn_bg">線上ATM</a></td>
                              <td><a href="cart_02.php?pay=Creditcard" class="btn_bg">信用卡付款</a></td>

						<?php
										}
						?>
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
</form>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
<?php

CartJscript();

?>
</body>
<!-- InstanceEnd --></html>
