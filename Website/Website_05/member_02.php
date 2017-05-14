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
ChkLogin();
// ===========================================================================
// 接收參數宣告
// ===========================================================================

// ===========================================================================
// 表單參數宣告
// ===========================================================================
$aMem['me02']=$_POST['me02'];
$aMem['newme02']=$_POST['newme02'];
$aMem['me03']=$_POST['me03'];
$aMem['me04']=$_POST['me04'];
$aMem['me05']=$_POST['me05'];
$aMem['me06']=$_POST['me06'];
$aMem['me07']=$_POST['me07'];
$aMem['me08']=$_POST['me08'];
$aMem['me09']=$_POST['me09'];
$aMem['me10']=$_POST['me10'];
$action=$_POST['action'];
// ===========================================================================
// 資料列表參數宣告
// ===========================================================================

?>
<?php //**************************************************************************** ?>

<?php //*********************************程式邏輯演算********************************* ?>
<?php
if($action==ModifyMember) {
	UpdateMember($aMem);
}
$aMember=GetMemData();

$aCitys=GetCity();
$aTownships=GetTownships($aMember['me06']);


?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php

function UpdateMember($aMem) {
	if( $aMem['me02']!="" ) {
		$sSQL="select * from member where me01='".GetMemID()."' and me02='".$aMem['me02']."'";
		$result=GetRs($sSQL);
		if( mysql_num_rows($result)!=0 ) {
			$me02SQL="me02='".$aMem['newme02']."',";
		} else {
			jsAlert("密碼錯誤!請重新輸入");
			return;
		}
	}
	$sSQL="update member set ".$me02SQL." me03='".$aMem['me03']."', me04='".$aMem['me04']."', me05='".$aMem['me05']."', me06='".$aMem['me06']."', me07='".$aMem['me07']."', me08='".$aMem['me08']."', me09='".$aMem['me09']."', me10='".$aMem['me10']."'where me01='".GetMemID()."'";
	GetRs($sSQL);
	jsAlert("更改資料成功!");
}

function GetMemData() {
	$sSQL="select * from member where me01='".GetMemID()."'";
	$result=GetRs($sSQL);
	$aMember=array();
	while($row=mysql_fetch_array($result)) {
		$aMember['me01']=$row['me01'];
		$aMember['me03']=$row['me03'];
		$aMember['me04']=$row['me04'];
		$aMember['me05']=$row['me05'];
		$aMember['me06']=$row['me06'];
		$aMember['me07']=$row['me07'];
		$aMember['me08']=$row['me08'];
		$aMember['me09']=$row['me09'];
		$aMember['me10']=$row['me10'];
	}
	return $aMember;
}

function GetCity() {
	$sSQL="select * from citys group by ci01";
	$result=GetRs($sSQL);
	$aCitys=array();
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
<form id="MemberModifyForm" name="MemberModifyForm" action="member_02.php" method="post">
<input type="hidden" id="action" name="action" value="ModifyMember">
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
              <td align="center" valign="top"><table width="900" border="0" align="center" cellpadding="5" cellspacing="0">
                <tr>
                  <td height="5" colspan="2"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
                <tr>
                  <td width="220" align="left" valign="top"><table width="220" border="0" cellspacing="0" cellpadding="0">
                    <tr valign="bottom">
                      <td width="15" height="15" align="right"><img src="images/log_bg_01.png" alt="" width="15" height="15" /></td>
                      <td style="background:url(images/log_bg_02.png) repeat-x bottom">&nbsp;</td>
                      <td width="15" align="left"><img src="images/log_bg_03.png" alt="" width="15" height="15" /></td>
                    </tr>
                    <tr>
                      <td align="right" style="background:url(images/log_bg_04.png) no-repeat right top">&nbsp;</td>
                      <td width="190" style="background:url(images/log_bg_05.png) repeat-x"><table width="190" border="0" align="left" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="30" align="left" valign="top" style="border-bottom:#97866d 1px solid"><img src="images/title-06.png" alt="" width="140" height="21" vspace="2" /></td>
                        </tr>
                        <tr>
                          <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>
                        </tr>
                        <tr>
                          <td align="left" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="30" align="left" valign="middle"><a href="member_01_1.php" class="title_5a4f3f_a">訂單查詢</a></td>
                            </tr>
                            <tr>
                              <td height="30" align="left" valign="middle"><a href="member_03_1.php" class="title_5a4f3f_a">活動查詢</a></td>
                            </tr>
                            <tr>
                              <td height="30" align="left" valign="middle" class="title_5a4f3f">修改資料</td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>
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
                  <td align="right" valign="top"><table width="660" border="0" align="right" cellpadding="0" cellspacing="0">
                    <tr valign="bottom">
                      <td height="5" colspan="3" align="right"><img src="images/li.png" width="1" height="1" /></td>
                      </tr>
                    <tr valign="bottom">
                      <td width="9" align="right"><img src="images/line-02.png" alt="" width="9" height="40" /></td>
                      <td width="640" align="left" valign="middle" class="titleB" style="background:url(images/line.png) bottom repeat-x"><img src="images/titlebar.png" alt="" width="10" height="15" align="absmiddle" />修改資料</td>
                      <td width="11" align="left"><img src="images/line-03.png" alt="" width="11" height="40" /></td>
                    </tr>
                    <tr>
                      <td align="right" style="background:url(images/line-04.png) repeat-y right">&nbsp;</td>
                      <td align="left" valign="top" bgcolor="#CDBFA2" class="txt13_313131"><table width="640" border="0" cellpadding="0" cellspacing="5">
                        <tr>
                          <td width="100" align="center" valign="middle" class="title_5a4f3f">中文全名</td>
                          <td align="left" valign="middle" class="top_txt5a4f3f"><input name="me03" type="text" class="top_txt5a4f3f" id="me03"  style="width:120px" value="<?php echo $aMember['me03'];?>"/></td>
                          <td width="370" align="left" valign="middle" class="top_txt5a4f3f"><input type="radio" name="me04" id="radio" value="先生" checked/>
                            <label for="radio"></label>
先生
<input type="radio" name="me04" id="radio2" value="小姐" <?php if( $aMember['me04']=="小姐" )echo "checked";?>/>
<label for="radio2"></label>
小姐</td>
                          </tr>
                        <tr>
                          <td width="100" align="center" valign="middle" class="title_5a4f3f">電子郵件</td>
                          <td align="left" valign="middle" class="top_txt5a4f3f"><?php echo $aMember['me01'];?></td>
                          <td align="left" valign="middle" class="top_txt5a4f3f">如需更改請洽客服人員</td>
                        </tr>
												<tr>
                          <td width="100" align="center" valign="middle" class="title_5a4f3f">密碼</td>
                          <td align="left" valign="middle" class="top_txt5a4f3f"><input name="me02" type="password" class="top_txt5a4f3f" id="me02"  style="width:120px"/></td>
                          <td align="left" valign="middle" class="top_txt5a4f3f">&nbsp;</td>
                        </tr> 
                        <tr>
                          <td width="100" align="center" valign="middle" class="title_5a4f3f">設定新密碼</td>
                          <td align="left" valign="middle" class="top_txt5a4f3f"><input name="newme02" type="password" class="top_txt5a4f3f" id="newme02"  style="width:120px"/></td>
                          <td align="left" valign="middle" class="top_txt5a4f3f">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="100" align="center" valign="middle" class="title_5a4f3f">確認新密碼</td>
                          <td align="left" valign="middle" class="top_txt5a4f3f"><input name="chknewme02" type="password" class="top_txt5a4f3f" id="chknewme02"  style="width:120px"/></td>
                          <td align="left" valign="middle" class="top_txt5a4f3f">&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="100" align="center" valign="middle" class="title_5a4f3f">手機號碼</td>
                          <td align="left" valign="middle" class="top_txt5a4f3f"><input name="me05" type="text" class="top_txt5a4f3f" id="me05"  style="width:120px" value="<?php echo $aMember['me05'];?>"/></td>
                          <td align="left" valign="middle" class="top_txt5a4f3f">如：0912345678</td>
                        </tr>
                        <tr>
                          <td align="center" valign="middle" class="title_5a4f3f">聯絡地址</td>
                          <td colspan="2" align="left" valign="middle" class="top_txt5a4f3f"><label for="select"></label>
													<input type="text" size="3" readonly value="<?php echo $aMember['me08'];?>" id="me08" name="me08" class="top_txt5a4f3f"><?php RwListBox( "me06", "", $aCitys, $aCitys,  $aMember['me06'], "", "", "ChangeAdministrativeRegion2(this);", "", "");?><?php RwListBox( "me07", "", $aTownships, $aTownships,  $aMember['me07'], "", "", "ChangeAdministrativeRegion3(this);", "", "");?>
                            <!-- <select name="select" class="top_txt5a4f3f" id="select" style="width:100px; height:20px">
                              <option>郵遞區號</option>
                              </select>  -->                           <input name="me09" type="text" class="top_txt5a4f3f" id="me09"  style="width:250px" value="<?php echo $aMember['me09'];?>"/></td>
                          </tr>
                        <tr>
                          <td align="center" valign="middle" class="title_5a4f3f">電 子 報</td>
                          <td colspan="2" align="left" valign="middle" class="top_txt5a4f3f"><input type="checkbox" name="me10" id="me10" value="是" <?php if( $aMember['me10']=="是" ){echo "checked"; } ?>/>
                            <label for="checkbox">我願意收到野遊風電子報</label></td>
                          </tr>
                        <tr>
                          <td height="10" colspan="3" align="center" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid"><img src="images/li.png" alt="" width="1" height="1" /></td>
                        </tr>
                        <tr>
                          <td height="30" colspan="3" align="center" valign="bottom"><table width="100" border="0" cellpadding="0" cellspacing="0" class="btn_bg">
                            <tr>
                              <td align="center" valign="middle" class="btn_bg"><a href="#;return false;" class="btn_bg" onclick="DoSubmit()">確認送出</a></td>
                            </tr>
                          </table></td>
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
                      <td height="20" colspan="3" align="right"><img src="images/li.png" alt="" width="1" height="1" /></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="15" colspan="2"><img src="images/li.png" alt="" width="1" height="1" /></td>
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

function DoSubmit() {

	if (document.getElementById("me03").value=="") {
		alert("請輸入您的中文全名！");
		document.getElementById('me02').focus();
		return;
	}
	if (document.getElementById("me02").value != "") {

		if (document.getElementById("newme02").value=="") {
			alert("請輸入新密碼！");
			document.getElementById('newme02').focus();
			return;
		}

		if( document.getElementById("newme02").value != document.getElementById("chknewme02").value) {
			alert("請確認密碼!");
			return;
		}
	}

	document.MemberModifyForm.submit();
}
</script>
</body>
<!-- InstanceEnd --></html>
