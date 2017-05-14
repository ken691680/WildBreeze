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
if( $_GET['pay'] != "") {
	$aBuyerInfo['pay']=$_GET['pay'];
} else {
	$aBuyerInfo['pay']=$_POST['pay'];
}
$aBuyerInfo['me01']=$_POST['me01'];
$aBuyerInfo['me02']=$_POST['me02'];
$aBuyerInfo['me03']=$_POST['me03'];
$aBuyerInfo['me04']=$_POST['me04'];
$aBuyerInfo['me05']=$_POST['me05'];
$aBuyerInfo['me06']=$_POST['me06_apply'];
$aBuyerInfo['me07']=$_POST['me07_apply'];
$aBuyerInfo['me08']=$_POST['me08_apply'];
$aBuyerInfo['me09']=$_POST['me09_apply'];
$aBuyerInfo['oh19']=$_POST['oh19'];
$aBuyerInfo['oh20']=$_POST['oh20'];
$aBuyerInfo['oh21']=$_POST['oh21'];
$aBuyerInfo['oh22']=$_POST['me06'];
$aBuyerInfo['oh23']=$_POST['me07'];
$aBuyerInfo['oh24']=$_POST['me08'];
$aBuyerInfo['oh25']=$_POST['me09'];
$Action=$_POST['Action'];
$ApplyMember=$_POST['ApplyMember'];
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



if( $Action=="Buy" ) {
	Buy( $me01, $Action, $aBuyerInfo, $ApplyMember);
}	else{
			if( $Cart==0 ) {
				jsHref("index.php");
			}
}

$aMemData=GetMemData();
$aCitys=GetCity();
$aTownships[0]="請選擇";
//$aTownships[1]="請選擇";


?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

function Buy( $me01, $Action, $aBuyerInfo, $ApplyMember) {
	if( $ApplyMember=="true" ) {
		//檢查帳號是否存在
		$sSQL="select * from member where me01='".$aBuyerInfo['me01']."'";
		$result=GetRs($sSQL);
		if( mysql_num_rows($result)!=0 ) {
			jsAlert("該電子信箱已註冊過會員!");
			return;
		}
		//帳號不存在,註冊會員
		$sSQL="insert into member ( me01, me02, me03, me04, me05, me06, me07, me08, me09, me10, jointime) value ( '".$aBuyerInfo['me01']."', '".$aBuyerInfo['me02']."', '".$aBuyerInfo['me03']."', '".$aBuyerInfo['me04']."', '".$aBuyerInfo['me05']."', '".$aBuyerInfo['me06']."', '".$aBuyerInfo['me07']."', '".$aBuyerInfo['me08']."', '".$aBuyerInfo['me09']."', '是', now())";
		GetRs($sSQL);
		//更改購物車me01
		$sSQL="update orderdetailtemp set me01='".$aBuyerInfo['me01']."' where me01='".$me01."'";
		GetRs($sSQL);
		$me01=$aBuyerInfo['me01'];
		$_SESSION['MemID']=$aBuyerInfo['me01'];
	}
	//寫入單頭資料表
	$oh01=GetDateTimeCE().GetMicroTime();
	$sSQL="insert into orderheader ( oh01, oh02, oh03, oh04, oh06, oh19, oh20, oh21, oh22, oh23, oh24, oh25, me01, lasttime) value ( '".$oh01."', '處理中訂單', now(), '".$aBuyerInfo['pay']."', '', '".$aBuyerInfo['oh19']."', '".$aBuyerInfo['oh20']."', '".$aBuyerInfo['oh21']."', '".$aBuyerInfo['oh22']."', '".$aBuyerInfo['oh23']."', '".$aBuyerInfo['oh24']."', '".$aBuyerInfo['oh25']."',  '".$me01."', now())";
	GetRs($sSQL);

	//撈出購物車資料並寫入單身資料表
	$sSQL="select productinfo.pi01, productinfo.pi02, productinfo.pi04, orderdetailtemp.odt02, orderdetailtemp.pi13, orderdetailtemp.pi14, productinfo.pi04 from orderdetailtemp, productinfo where me01='".$me01."' and orderdetailtemp.pi01=productinfo.pi01";
	$result=GetRs($sSQL);
	while( $row=mysql_fetch_array($result) ) {
		$od03=$row['odt02']*$row['pi04'];
		$od01=GetDateTimeCE().GetMicroTime();
		$sSQL="insert into orderdetail ( od01, od02, od03, pi01, pi02, pi04, pi13, pi14, oh01, me01, lasttime) value ( '".$od01."', '".$row['odt02']."', '".$od03."', '".$row['pi01']."', '".$row['pi02']."', '".$row['pi04']."', '".$row['pi13']."', '".$row['pi14']."', '".$oh01."', '".$me01."', now())";
		GetRs($sSQL);

		$oh06=$oh06+$row['odt02']*$row['pi04'];

		$sSQL="delete from orderdetailtemp where me01='".$me01."'";
		GetRs($sSQL);
		jsHref("cart_03.php?oh01=".$oh01);
	}
	$sSQL="update orderheader set oh06='".$oh06."' where oh01='".$oh01."'";
	GetRs($sSQL);
}

function GetMemData() {
	$sSQL="select * from member where me01='".GetMemID()."'";
	$result=GetRs($sSQL);
	$aMemData=array();
	while( $row=mysql_fetch_array($result) ) {
		$aMemData['me01']=$row['me01'];
		$aMemData['me03']=$row['me03'];
		$aMemData['me04']=$row['me04'];
		$aMemData['me05']=$row['me05'];
		$aMemData['me06']=$row['me06'];
		$aMemData['me07']=$row['me07'];
		$aMemData['me08']=$row['me08'];
		$aMemData['me09']=$row['me09'];
	}
	return $aMemData;
}

function GetCity() {
	$sSQL="select * from citys group by ci01";
	$result=GetRs($sSQL);
	$aCitys=array();
	$aCitys[0]="請選擇";
	while($row=mysql_fetch_array($result)) {
		$aCitys[]=$row['ci01'];
	}
	//uLog($aCitys);
	return $aCitys;
}

function GetTownships($me06) {
	$sSQL="select * from citys where ci01='".$me06."'";
	$result=GetRs($sSQL);
	$aTownships=array();
	while($row=mysql_fetch_array($result)) {
		$aTownships[]=$row['ci02'];
	}
	return $aTownships;
}

function GetCartData($me01) {
	$sSQL="select odt01, odt02, odt03, orderdetailtemp.pi01, orderdetailtemp.pi13 as Color, orderdetailtemp.pi14 as Size, productinfo.pi02, productinfo.pi04, productinfo.pi13, productinfo.pi14, productinfo.pi16, pi27 from orderdetailtemp, productinfo where me01='".$me01."' and productinfo.pi01 = orderdetailtemp.pi01 order by orderdetailtemp.lasttime desc";
	$result=GetRs($sSQL);
	while( $row=mysql_fetch_array($result) ) {
		$CountCost+=$row['odt02']*$row['pi04'];	
?>
	<tr class="txt13_313131">
		<td height="100" align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><table border="0" align="center" cellpadding="5" cellspacing="0">
			<tr>
				<td align="center" valign="middle" bgcolor="#C9BC9C"><a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>"><img src="upload/productinfo/<?php echo $row['pi16'];?>" alt="" width="80" height="80" border="0" align="middle" /></a></td>
				<td width="180" align="left" valign="middle"><a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>" class="item_txt_a"><?php echo $row['pi02'];?></a></td>
				</tr>
		</table></td>
		<td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><?php echo $row['odt02'];?></td>
		<td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><?php echo $row['pi04'];?></td>
		<td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><?php echo GetColorName($row['Color']);?></td>
		<td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><?php echo GetSizeName($row['Size']);?></td>
		<td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><?php echo $row['odt02']*$row['pi04'];?></td>
		<td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><a href="member_log.html" class="btn_bg">取　消</a></td>
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

function Jscript($aMemData) {
?>

<script language="javascript">

var ajax = new Array();
function ChangeAdministrativeRegion2(sel) {
	//alert(sel.value);
	//return;
	var index = ajax.length;
	ajax[index] = new sack();
	ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>ajax_change_region.php?me06='+escape(sel.value)+'&action=GetMe07';	// Specifying which file to get
	ajax[index].onCompletion = function(){ CreateChangeAdministrativeRegion2(index) };
	ajax[index].runAJAX();
}

function CreateChangeAdministrativeRegion2(index){
	var obj = document.getElementById('me07');
	eval(ajax[index].response);
}

function ChangeAdministrativeRegion3(sel) {
	var index = ajax.length;
	ajax[index] = new sack();
	ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>ajax_change_region.php?me07='+escape(sel.value)+'&action=GetMe08';	// Specifying which file to get
	ajax[index].onCompletion = function(){ CreateChangeAdministrativeRegion3(index) };
	ajax[index].runAJAX();
}

function CreateChangeAdministrativeRegion3(index){
	eval(ajax[index].response);
}

function GetMemData(sel) {
	if(sel.checked==true) {
		if("<?php echo IsLogin()?>"=="1") {
			//已登入
			document.getElementById("oh19").value="<?php echo $aMemData['me03'];?>";
			if( "<?php echo $aMemData['me04'];?>"=="小姐" ){
				document.getElementById("oh20_2").checked=true;
			} else {
				document.getElementById("oh20_1").checked=true;
			}
			document.getElementById("oh21").value="<?php echo $aMemData['me05'];?>";
			document.getElementById("me08").value="<?php echo $aMemData['me08'];?>";
			document.getElementById("me09").value="<?php echo $aMemData['me09'];?>";
//################################# 帶入會員地址(已登入) ####################################
		var prolength=document.getElementById("me06").options.length;
		for(var i=1;i<prolength;i++) {
			if(document.getElementById("me06").options[i].value=="<?php echo $aMemData['me06'];?>"){
				document.getElementById("me06").selectedIndex=i;
				break;
			}
		}
		var index = ajax.length;
		ajax[index] = new sack();
		ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>ajax_change_region.php?me06='+escape("<?php echo $aMemData['me06'];?>")+'&action=GetMe07';	// Specifying which file to get
		ajax[index].onCompletion = function(){ CreateChangeAdministrativeRegion2_2(index) };
		ajax[index].runAJAX();

//################################# 帶入會員地址(已登入) ###############################
		} else {
			//未登入
			document.getElementById("oh19").value=document.getElementById("me03").value;
			if( document.BuyForm.me04.value=="小姐" ){
				document.getElementById("oh20_2").checked=true;
			} else {
				document.getElementById("oh20_1").checked=true;
			}
			document.getElementById("oh21").value=document.getElementById("me05").value;
			document.getElementById("me08").value=document.getElementById("me08_apply").value;
			document.getElementById("me09").value=document.getElementById("me09_apply").value;
//################################# 帶入會員地址(未登入) ####################################
		var prolength=document.getElementById("me06").options.length;
		for(var i=1;i<prolength;i++) {
			if(document.getElementById("me06").options[i].value==document.getElementById("me06_apply").value){
				document.getElementById("me06").selectedIndex=i;
				break;
			}
		}
		var index = ajax.length;
		ajax[index] = new sack();
		ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>ajax_change_region.php?me06='+escape(document.getElementById("me06_apply").value)+'&action=GetMe07';	// Specifying which file to get
		ajax[index].onCompletion = function(){ CreateChangeAdministrativeRegion2_2(index) };
		ajax[index].runAJAX();

//################################## 帶入會員地址(未登入) #############################
		}
	} else {
		document.getElementById("oh19").value="";
		document.getElementById("oh21").value="";
		document.getElementById("me08").value="";
		document.getElementById("me09").value="";
	}
}

function CreateChangeAdministrativeRegion2_2(index){
	var obj = document.getElementById('me07');
	eval(ajax[index].response);
	var prolength=document.getElementById("me07").options.length;
	for(var i=1;i<prolength;i++) {
		if("<?php echo IsLogin();?>" == "1") {
			if(document.getElementById("me07").options[i].value=="<?php echo $aMemData['me07'];?>"){
				document.getElementById("me07").selectedIndex=i;
				break;
			}
		} else {
			if(document.getElementById("me07").options[i].value==document.getElementById("me07_apply").value){
				document.getElementById("me07").selectedIndex=i;
				break;
			}
		}
	}
}

//################################# 註冊地址下拉選單 ################################
function ChangeAdministrativeRegion5(sel) {
	//alert(sel.value);
	//return;
	var index = ajax.length;
	ajax[index] = new sack();
	ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>ajax_change_region2.php?me06='+escape(sel.value)+'&action=GetMe07';	// Specifying which file to get
	ajax[index].onCompletion = function(){ CreateChangeAdministrativeRegion5(index) };
	ajax[index].runAJAX();
}

function CreateChangeAdministrativeRegion5(index){
	var obj = document.getElementById('me07_apply');
	eval(ajax[index].response);
}

function ChangeAdministrativeRegion6(sel) {
	var index = ajax.length;
	ajax[index] = new sack();
	ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>ajax_change_region2.php?me07='+escape(sel.value)+'&action=GetMe08';	// Specifying which file to get
	ajax[index].onCompletion = function(){ CreateChangeAdministrativeRegion6(index) };
	ajax[index].runAJAX();
}

function CreateChangeAdministrativeRegion6(index){
	eval(ajax[index].response);
}
//###################################################################################

function Buy() {
	if( "<?php echo IsLogin(); ?>" != "1" ) {
		if( document.getElementById("Agree").checked != true ) {
			alert("請閱讀會員條款!");
			return;
		}
		if( document.getElementById("me01").value == "") {
			alert("請輸入電子信箱!");
			return;
		}
		if( document.getElementById("me03").value == "") {
			alert("請輸入中文全名!");
			return;
		}
		if( document.getElementById("me02").value != document.getElementById("chkme02").value ) {
			alert("請確認密碼!");
			return;
		}
		if( document.getElementById("me07_apply").value == "請選擇" ) {
			alert("請填寫地址!");
			return;
		}
		document.getElementById("ApplyMember").value="true";
	}
	if( document.getElementById("oh19").value == "" ) {
			alert("請輸入收件人中文全名!");
			return;
	}
	if( document.getElementById("oh21").value == "" ) {
			alert("請輸入收件人手機號碼!");
			return;
	}
	if( document.getElementById("me07").value == "請選擇" || document.getElementById("me09").value == "" ) {
			alert("請填寫收件人地址!");
			return;
	}
	document.getElementById("Action").value="Buy";
	document.BuyForm.submit();
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>jscript/ajax.js"></script>
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
<form id="BuyForm" name="BuyForm" action="cart_02.php" method="post">
<input type="hidden" id="Action" name="Action">
<input type="hidden" id="ApplyMember" name="ApplyMember">
<input type="hidden" id="pay" name="pay" value="<?php echo $aBuyerInfo['pay'];?>">
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
                          <td height="220" align="center" valign="middle">
													<table width="100%" border="0" cellspacing="0" cellpadding="2">
														<tr class="title_5a4f3f">
                              <td align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 商品名稱</td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 數量</td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid">金額</td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 樣式 </td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid">尺寸</td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 小計 </td>
                              <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid">&nbsp;</td>
                              </tr><?php GetCartData($me01); ?>
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
                              </tr> -->
                            <!-- <tr class="txt13_313131">
                              <td height="100" align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><table border="0" align="center" cellpadding="5" cellspacing="0">
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
									<?php 
										if( !IsLogin() ){
									?>
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
                          <td height="30" align="left" valign="top" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid"><img src="images/title_cart01.png" alt="" width="110" height="22" />　填寫以下資料即可成為會員</td>
                        </tr>
                        <tr>
                          <td height="220" align="center" valign="middle"><table border="0" cellspacing="5" cellpadding="0">
                            <tr>
                              <td width="100" align="center" valign="middle" class="title_5a4f3f">中文全名</td>
                              <td width="400" align="left" valign="middle" class="top_txt5a4f3f"><input name="me03" type="text" class="top_txt5a4f3f" id="me03"  style="width:120px"/>
                                <input type="radio" name="me04" id="radio5" value="先生" checked/>
                                <label for="radio5"></label>
                                先生
                                <input type="radio" name="me04" id="radio6" value="小姐" />
                                <label for="radio6"></label>
                                小姐</td>
                            </tr>
                            <!-- <tr>
                              <td align="center" valign="middle" class="title_5a4f3f">會員暱稱</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><input name="textfield11" type="text" class="top_txt5a4f3f" id="textfield12"  style="width:120px"/></td>
                            </tr> -->
                            <tr>
                              <td width="100" align="center" valign="middle" class="title_5a4f3f">電子郵件</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><input name="me01" type="text" class="top_txt5a4f3f" id="me01"  style="width:220px"/> 
                                ※此為會員帳號，請牢記</td>
                            </tr>
                            <tr>
                              <td width="100" align="center" valign="middle" class="title_5a4f3f">設定密碼</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><input name="me02" type="password" class="top_txt5a4f3f" id="me02"  style="width:120px"/></td>
                            </tr>
                            <tr>
                              <td width="100" align="center" valign="middle" class="title_5a4f3f">確認密碼</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><input name="chkme02" type="password" class="top_txt5a4f3f" id="chkme02"  style="width:120px"/></td>
                            </tr>
                            <tr>
                              <td align="center" valign="middle" class="title_5a4f3f">手機號碼</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><input name="me05" type="text" class="top_txt5a4f3f" id="me05"  style="width:120px"/> 
                                如：0912345678</td>
                            </tr>
                            <tr>
                              <td align="center" valign="middle" class="title_5a4f3f">聯絡地址</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><label for="select"></label>
                                <input type="text" size="3" value="" id="me08_apply" name="me08_apply" class="top_txt5a4f3f" readonly>
																<?php RwListBox( "me06_apply", "", $aCitys, $aCitys,  "", "", "", "ChangeAdministrativeRegion5(this);", "", "");?>
																<?php RwListBox( "me07_apply", "", $aTownships, $aTownships, "", "", "", "ChangeAdministrativeRegion6(this);", "", "");?>
																<input name="me09_apply" type="text" class="top_txt5a4f3f" id="me09_apply"  style="width:200px" value=""/></td>
                            </tr>
                            <!-- <tr>
                              <td width="100" align="center" valign="middle" class="title_5a4f3f">發票資料</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"> 統一編號
                                <input name="textfield11" type="text" class="top_txt5a4f3f" id="textfield20"  style="width:100px"/>
                                發票抬頭
                                <input name="textfield11" type="text" class="top_txt5a4f3f" id="textfield21"  style="width:100px"/></td>
                            </tr> -->
                            <tr>
                              <td align="center" valign="middle" class="title_5a4f3f">&nbsp;</td>
                              <td height="40" align="left" valign="middle" class="txt13_313131"><input type="checkbox" name="Agree" id="Agree" />
                                <label for="checkbox">我同意<a href="member_term.html" target="_blank" class="item_name">會員條款</a></label></td>
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
                  </table>
									<?php
										}
									?>
									</td>
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
                            <input name="checkbox2" type="checkbox" class="top_txt5a4f3f" id="checkbox2" onclick="GetMemData(this);"/>
                            <label for="checkbox2"></label>
                            同<?php if(IsLogin()) echo "會員資料";else echo "訂購人資訊"; {}?></td>
                          </tr>
                        <tr>
                          <td height="120" align="center" valign="middle"><table border="0" cellspacing="5" cellpadding="0">
                            <tr>
                              <td width="100" align="center" valign="middle" class="title_5a4f3f">中文全名</td>
                              <td width="400" align="left" valign="middle" class="top_txt5a4f3f"><input name="oh19" type="text" class="top_txt5a4f3f" id="oh19"  style="width:120px"/>
                                <input type="radio" name="oh20" id="oh20_1" value="先生" checked/>
                                <label for="radio7"></label>
                                先生
                                <input type="radio" name="oh20" id="oh20_2" value="小姐" />
                                <label for="radio8"></label>
                                小姐</td>
                              </tr>
                            <tr>
                              <td align="center" valign="middle" class="title_5a4f3f">手機號碼</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><input name="oh21" type="text" class="top_txt5a4f3f" id="oh21"  style="width:120px"/>
如：0912345678</td>
                              </tr>
                            <tr>
                              <td align="center" valign="middle" class="title_5a4f3f">送貨地址</td>
                              <td align="left" valign="middle" class="top_txt5a4f3f"><label for="select"></label>
                                <input type="text" size="3" value="" id="me08" name="me08" class="top_txt5a4f3f" readonly>
																<?php RwListBox( "me06", "", $aCitys, $aCitys,  "", "", "", "ChangeAdministrativeRegion2(this);", "", "");?>
																<?php RwListBox( "me07", "", $aTownships, $aTownships, "", "", "", "ChangeAdministrativeRegion3(this);", "", "");?>
																<input name="me09" type="text" class="top_txt5a4f3f" id="me09"  style="width:200px" value=""/><!-- <select name="select4" class="top_txt5a4f3f" id="select" style="width:100px; height:20px">
                                  <option>郵遞區號</option>
                                  </select>
                                <input name="textfield12" type="text" class="top_txt5a4f3f" id="textfield24"  style="width:250px"/> --></td>
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
                  <td height="40" colspan="3" align="left" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="btn_bg">
                    <tr valign="top">
                      <td width="150" align="left" class="btn_bg"><a href="cart_01.php" class="btn_bg">重新選擇付款方式</a></td>
                      <td height="30" align="center" class="btn_bg"><a href="#;return;" onclick="Buy();"><img src="images/pay_sent.jpg" width="100" height="30" border="0" /></a></td>
                      <td width="150" align="right" class="btn_bg">&nbsp;</td>
                    </tr>
                  </table></td>
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
<?php
Jscript($aMemData);
?>
</form>
</body>
<!-- InstanceEnd --></html>
