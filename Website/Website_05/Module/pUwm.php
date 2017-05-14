<?php //*********************************模組檔案引入********************************* ?>
<?php 
include("./Module/pModule.php");          //引入總模組
?>
<?php //**************************************************************************** ?>

<?php //*********************************登入相關函數********************************* ?>
<?php

function jsAlert($sMsg) {
	echo '<script language="javascript">
			alert("'.$sMsg.'");
		 </script>';

}
function jsHref($sURL) {
	echo '<script language="javascript">
			location.href="'.$sURL.'";
		 </script>';
}
function jsBack() {
	echo '<script language="javascript">
			history.back();
		 </script>';
}

function GetMemID() {
	return $_SESSION["MemID"];
}

function GetMemPwd() {
	return $_SESSION["MemPwd"];
}

function GetMemName() {
	return $_SESSION["MemName"];
}

//session 登入為true，沒登入為false
function IsLogin() {
	$bResult=false;
	if (Trim(GetMemID())=="") {
		$bResult=false;
	} else {
		$bResult=true;
	}
	return $bResult;
}

function ChkLogin() {
	if (IsLogin()==false) {
		$sUrl="http://".GetServerHostName()."/".GetPathProjectV()."index.php";
		//uLog("sUrl == ".$sUrl);
		jsAlert("請先登入!");
		jsHref($sUrl);
		//header("location:".$sUrl);
	}
}

?>
<?php //**************************************************************************** ?>

<?php //*********************************共通頁面相關函數********************************* ?>
<?php
function HeadLink() {
	?><?php
	if (IsLogin()==false) {
		?><a href="member_login.php" class="top_txt5a4f3f_a">登入</a><?php
	} else {
		?><a href="logout.php" class="top_txt5a4f3f_a">登出</a><?php
	}
	?>│<a href="member_join.php" class="top_txt5a4f3f_a">加入會員</a>│<a href="qa.php" class="top_txt5a4f3f_a"><!-- <a href="qa.html" class="top_txt5a4f3f_a"> -->購物說明</a>│<a href="member_01_1.html" class="top_txt5a4f3f_a">訂單查詢</a>│<a href="http://www.facebook.com/pages/野遊風-戶外休閒用品館/114711665231623" target="_blank"><img src="images/icon_fb.png" width="14" height="14" border="0" align="middle" /></a><?php
}

function HeadMemberAndCart() {
	$me01=GetMemID();
	if($me01=="") {
		$me01=session_id();
	}
	$sSQL="select * from orderdetailtemp where me01='".$me01."'";
	$result=GetRs($sSQL);
	$CartNum=mysql_num_rows($result);
	?><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="top_txtc9bc9c"><?php
									if (IsLogin()==false) {
										?><div style="margin-right:5px; float:none"><div class="top_txt5a4f3f" style=" margin:auto; margin-right:10px; float:left">&nbsp;</div>
                  &nbsp;</div><?php
									} else {
										?><div style="margin-right:5px; float:none"><div class="top_txt5a4f3f" style=" margin:auto; margin-right:10px; float:left"><?php echo GetMemName();?></div>
                  您好，歡迎來到野遊風。</div><?php
									}
									?>
                  <!-- <div class="top_txt5a4f3f" style=" margin:auto; margin-right:10px; float:left">賴志明</div>
                  您好，歡迎來到野遊風。</div> --></td>
                <td align="right" valign="middle"><table width="185" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td rowspan="3" align="right" valign="middle"><img src="images/index-03.jpg" width="5" height="25" /></td>
                    <td colspan="2" valign="bottom" style="border-top:1px solid #5a4f3f"><div style="height:1px"></div></td>
                    <td rowspan="3" align="left" valign="middle"><img src="images/index-05.jpg" width="5" height="25" /></td>
                  </tr>
                  <tr>
                    <td width="55" align="center" bgcolor="#FFFFFF"><a href="cart_01.php"><img border="0" src="images/cart.jpg" width="21" height="18" /></a></td>
                    <td align="left" bgcolor="#FFFFFF" class="top_txt5a4f3f">購物清單：<?php echo $CartNum;?>個商品</td>
                  </tr>
                  <tr>
                    <td colspan="2" valign="top" style="border-bottom:1px solid #5a4f3f"><div style="height:1px"></div></td>
                  </tr>
                </table></td>
              </tr>
            </table><?php
}

?>
<?php //********************************************************************************** ?>

<?php //*********************************首頁相關函數********************************* ?>
<?php

?>
<?php //****************************************************************************** ?>

<?php //*********************************會員專區函數********************************* ?>
<?php

?>
<?php //****************************************************************************** ?>

<?php //*********************************任務專區函數********************************* ?>
<?php

?>
<?php //****************************************************************************** ?>

<?php //*********************************道具專區函數********************************* ?>
<?php

?>
<?php //****************************************************************************** ?>

<?php //*********************************相簿相關函數********************************* ?>
<?php

?>
<?php //****************************************************************************** ?>

<?php //*********************************Ext Js 共用欄位函數********************************* ?>
<?php

?>
<?php //************************************************************************************* ?>

<?php //*********************************David 專用函數********************************* ?>
<?php

//熱門商品
function HotProductList() {
?>
<table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="30" align="right" valign="bottom" style="background:url(images/title.png) no-repeat left bottom"><a href="shop_hot.php" class="top_txt5a4f3f_a">更多熱門商品&gt;&gt;</a></td>
                    </tr>
                    <tr>
                      <td height="190" align="center" valign="bottom" bgcolor="#F1ECE6"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="180" align="center" valign="middle"><img src="images/image.jpg" alt="" width="160" height="180" />
													</td>
<?php
	$sSQL="select * from productinfo where pi07='是' and pi08<now() and pi09>now() order by lasttime desc limit 0,3";
	$result=GetRs($sSQL);
	while( $row=mysql_fetch_array($result)){

	//}
													?>
                          <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>"><img src="upload/productinfo/<?php echo $row['pi16'];?>" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>
                            </tr>
                            <tr>
                              <td height="30" align="center" valign="bottom"><a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>" class="item_txt_a"><?php echo $row['pi02'];?><!-- OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套 --></a></td>
                            </tr>
                          </table></td>
									<?php
	}
										?>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top" bgcolor="#FFFFFF"><img src="images/item_bg.jpg" alt="" width="660" height="10" /></td>
                    </tr>
                  </table>


<?php
}

//促銷商品
function OnSellProsuct() {
?>
	<table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="50" align="right" valign="bottom" style="background:url(images/title-02.png) no-repeat left bottom"><a href="shop_promotions.php" class="top_txt5a4f3f_a">更多促銷商品&gt;&gt;</a></td>
                    </tr>
                    <tr>
                      <td height="190" align="center" valign="bottom" bgcolor="#F1ECE6"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="180" align="center" valign="middle"><img src="images/image.jpg" alt="" width="160" height="180" /></td>
<?php
	$sSQL="select * from productinfo where pi28='是' and pi08<now() and pi09>now() order by lasttime desc limit 0,3";
	$result=GetRs($sSQL);
	while($row=mysql_fetch_array($result)) {

?>
                          <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>"><img src="upload/productinfo/<?php echo $row['pi16'];?>" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>
                            </tr>
                            <tr>
                              <td height="30" align="center" valign="bottom"><a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>" class="item_txt_a"><?php echo $row['pi02'];?><!-- OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套 --></a></td>
                            </tr>
                          </table></td>
<?php
	}
?>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top" bgcolor="#FFFFFF"><img src="images/item_bg.jpg" alt="" width="660" height="10" /></td>
                    </tr>
                  </table>

<?php
}

//最新商品
function NewProduct() {
?>

<table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="50" align="right" valign="bottom" style="background:url(images/title-03.png) no-repeat left bottom"><a href="shop_new.php" class="top_txt5a4f3f_a">更多最新商品&gt;&gt;</a></td>
                    </tr>
                    <tr>
                      <td height="190" align="center" valign="bottom" bgcolor="#F1ECE6"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="180" align="center" valign="middle"><img src="images/image.jpg" alt="" width="160" height="180" /></td>
<?php
	$sSQL="select * from productinfo where pi08<now() and pi09>now() order by lasttime desc limit 0,3";
	$result=GetRs($sSQL);
	while($row=mysql_fetch_array($result)) {
?>
                          <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>"><img src="upload/productinfo/<?php echo $row['pi16'];?>" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>
                            </tr>
                            <tr>
                              <td height="30" align="center" valign="bottom"><a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>" class="item_txt_a"><?php echo $row['pi02'];?></a></td>
                            </tr>
                          </table></td>
<?php
	}
?>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top" bgcolor="#FFFFFF"><img src="images/item_bg.jpg" alt="" width="660" height="10" /></td>
                    </tr>
                  </table>

<?php
}

function News() {
?>
<table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td colspan="3" align="center" valign="bottom"><img src="images/news.png" width="220" height="35" /></td>
                      </tr>
                    <tr>
                      <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>
                      <td width="200" bgcolor="#cabda1">
											<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
<?php 
	$sSQL="select * from news where ne05<now() and ne06>now() order by lasttime desc limit 0,5";
	$result=GetRs($sSQL);
	while( $row=mysql_fetch_array($result) ) {
?>
                        <tr>
                          <td height="20" align="left" valign="top" class="top_txt5a4f3f">‧</td>
                          <td height="22" align="left" valign="top" class="txtB_5a4f3f"><a href="news_01.php?ne01=<?php echo  $row['ne01'];?>" class="news_txt5a4f3f_a"><?php echo $row['ne02'];?></a></td>
                          </tr>
<?php
	}
?>
                        </table>
												</td>
                      <td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>
                      </tr>
                    <tr>
                      <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>
                      <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>
                      <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>
                      </tr>
                    </table>
<?php
}

function Picnicspot() {
?>
<table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="50" colspan="3" align="right" valign="bottom" style="background:url(images/spot.png) no-repeat left bottom"><a href="spot.php" class="top_txt5a4f3f_a">更多精采勝地&gt;&gt;</a></td>
                    </tr>
                    <tr>
                      <td height="130" align="right" valign="bottom"><img src="images/spot_bg.png" alt="" width="10" height="130" /></td>
                      <td align="center" valign="bottom" style="background:url(images/spot_bg-02.png) repeat-x"><table width="640" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr valign="middle">
<?php
		$sSQL="select * from picnicspot order by ps24 desc limit 0,4";
		$result=GetRs($sSQL);
		while( $row=mysql_fetch_array($result) ) {
?>
                          <td align="center"><table width="130" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="130" height="100" align="center" valign="middle" bgcolor="#FFFFFF"><a href="spot_01.php?ps01=<?php echo $row['ps01'];?>"><img src="upload/picnicspot/<?php echo $row['ps14'];?>" alt="" width="120" height="90" border="0" align="absmiddle" /></a></td>
                            </tr>
                            <tr>
                              <td height="25" align="center" valign="middle"><a href="#" class="spot_txt_a"><?php echo $row['ps02'];?><!-- 龍洞浮潛 --></a></td>
                            </tr>
                          </table></td>
<?php
		}
?>
                        </tr>
                      </table></td>
                      <td align="left" valign="bottom"><img src="images/spot_bg-03.png" alt="" width="10" height="130" /></td>
                    </tr>
                  </table>
<?php
}

function Brands() {
?>
<table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td colspan="3" align="center" valign="bottom"><img src="images/brand.png" width="220" height="35" /></td>
                      </tr>
                    <tr>
                      <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>
                      <td width="200" bgcolor="#cabda1"><table width="200" border="0" cellspacing="5" cellpadding="0">
<?php
										$sSQL="select * from brands limit 0,2";
										$result=GetRs($sSQL);
										while( $row=mysql_fetch_array($result) ) {
?>
                        <tr>
                          <td align="center" valign="top"><a href="<?php echo $row['br04'];?>"><img src="upload/brands/<?php echo $row['br03'];?>" width="190" height="80" border="0" /></a></td>
                          </tr>
<?php
										}
?>									
                        </table></td>
                      <td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>
                      </tr>
                    <tr>
                      <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>
                      <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>
                      <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>
                      </tr>
                    </table>

<?php
}

function CommendProduct() {
?>
<table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td colspan="3" align="center" valign="bottom"><img src="images/mustbuy.png" alt="" width="220" height="35" /></td>
                      </tr>
                    <tr>
<?php
	$sSQL="select * from productinfo where pi07='是' and pi08<now() and pi09>now() order by lasttime desc limit 0,3";
	$result=GetRs($sSQL);
	$first=true;
	while( $row=mysql_fetch_array($result) ) {
		if( $first ){
			$first=false;
?>
											<td rowspan="3" align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>
                      <td width="200" align="center" bgcolor="#e2e2e2" style="border-bottom:#97866d 1px dotted">
											<table width="190" border="0" cellspacing="5" cellpadding="0">
                        <tr>
                          <td colspan="2" align="left" valign="top" class="txtB_5a4f3f"><a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>" class="txtB_5a4f3f"><?php echo $row['pi02'];?></a></td>
                          </tr>
                        <tr>
                          <td align="center" valign="middle"><div style="border:1px solid #5a4f3f"><a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>"><img src="upload/productinfo/<?php echo $row['pi16'];?>" alt="" width="89" height="89" border="0" align="absmiddle" /></a></div></td>
                          <td align="left" valign="top" class="top_txt5a4f3f"><?php echo Left($row['pi05'],30);?>...</td>
                          </tr>
                        <tr>
                          <td height="25" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr valign="middle">
                              <td align="left"><img src="images/more_01.png" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>" class="top_txt5a4f3f_a">詳細說明</a></td>
                              <td align="right"><img src="images/cart_01.png" alt="" width="17" height="16" /> <a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>" class="top_txt5a4f3f_a">放入購物車</a></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
                      <td rowspan="3" align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>
                      </tr>
	<?php
		} else {
	?>
                    <tr>
                      <td align="center" bgcolor="#e2e2e2" style="border-bottom:#97866d 1px dotted">
											<table width="190" border="0" cellspacing="5" cellpadding="0">
                        <tr>
                          <td colspan="2" align="left" valign="top" class="txtB_5a4f3f"><a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>" class="txtB_5a4f3f"><?php echo $row['pi02'];?></a></td>
                          </tr>
                        <tr>
                          <td align="center" valign="middle"><div style="border:1px solid #5a4f3f"><a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>"><img src="upload/productinfo/<?php echo $row['pi16'];?>" alt="" width="89" height="89" border="0" align="absmiddle" /></a></div></td>
                          <td align="left" valign="top" class="top_txt5a4f3f"><?php echo Left($row['pi05'],30);?>...</td>
                          </tr>
                        <tr>
                          <td height="25" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr valign="middle">
                              <td align="left"><img src="images/more_01.png" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>" class="top_txt5a4f3f_a">詳細說明</a></td>
                              <td align="right"><img src="images/cart_01.png" alt="" width="17" height="16" /> <a href="shop_intro.php?pi01=<?php echo $row['pi01'];?>" class="top_txt5a4f3f_a">放入購物車</a></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
                      </tr>
<?php
	}
}
?>
                    <tr>
                      <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>
                      <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>
                      <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>
                      </tr>
                    </table>

<?php
}

function Property() {
?>
<table width="220" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td colspan="3" align="center" valign="bottom"><img src="images/catalog.png" alt="" width="220" height="35" /></td>
                      </tr>
                    <tr>
                      <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>
                      <td width="200" align="center" bgcolor="#C9BDA2">
											<table width="100%" border="0" cellspacing="5" cellpadding="0">
<?php
	$sSQL="select *,(select pr02 from property as Tint where Tint.pr01=Tout.pr04) as BigClass from property as Tout where pr03='2' order by BigClass";
	$result=GetRs($sSQL);
	$aProperty=array();
	$BigClass="";
	while( $row=mysql_fetch_array($result) ) {
?>
<?php 
			if( $BigClass != $row['BigClass'] ) {	
											//$BigClass=$row['BigClass'];
?>
						<tr>
							<td align="left" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid"><?php echo $row['BigClass'];?></td>
						</tr>
						<tr>
							<td align="left" valign="middle" style="border-bottom:#97866d 1px dotted">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">						
												
<?php
			}
?>
            <tr>
							<td height="25" align="left" valign="middle"><a href="shop_catalog.php?pr01=<?php echo $row['pr01'];?>" class="item_name"><?php echo $row['pr02'];?></a></td>
						</tr>            
<?php
			if( $BigClass != $row['BigClass'] ) {	
											$BigClass=$row['BigClass'];
?>
							</table>
							</td>
					</tr>
<?php
			}
?>                   
<?php
	}
?>										
											</table>
											</td><td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>
                      </tr>
                    </tr>
                    <tr>
                      <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>
                      <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>
                      <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>
                    </tr>
                    </table>


<?php
	//}
}

function GetColorName($colorid) {
	$sSQL="select * from datacode where dc01='".$colorid."' and dc03='顏色'";
	$result=GetRs($sSQL);
	$row=mysql_fetch_array($result);
	return $row['dc02'];
}

function GetSizeName($sizeid) {
	$sSQL="select * from datacode where dc01='".$sizeid."' and dc03='尺寸'";
	$result=GetRs($sSQL);
	$row=mysql_fetch_array($result);
	return $row['dc02'];
}

########################add by Ian  ############################

function websitebanner ($local,$X){
	$sSQL="select * from websitebanner where wb07='".$local."' and wb05<now()
	 and wb06>now() order by rand() limit 0,1 ";
	$rRs=GetRs($sSQL);
	uLog(" ##################### ".$sSQL);
	while($row=mysql_fetch_array($rRs)){
		$wb03=$row['wb03'];
		$wb04=$row['wb04'];
	}
	if($X=="Pic"){
		return $wb03;
	}	else{
		return $wb04;
	}

}

function CartBuy ($me01){
	$sSQL="select * from orderdetailtemp where me01='".$me01."'";
	$result=GetRs($sSQL);
	$row=mysql_num_rows($result);
	return $row;
}

########################add by Ian  ############################

?>
<?php //************************************************************************************* ?>