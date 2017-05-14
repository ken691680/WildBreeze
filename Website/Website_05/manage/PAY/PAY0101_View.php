<?php //*********************************模組檔案引入********************************* ?>
<?php include("../../Module/pMwm.php"); ?>
<?php include("../../LibSimpleHtmlDom/simple_html_dom.php"); ?>
<?php //**************************************************************************** ?>

<?php //*********************************前置變數定義********************************* ?>
<?php
// ===========================================================================
// 初始化參數宣告
// ===========================================================================
ErrorReporting(E_ERROR | E_WARNING | E_PARSE);                    //錯誤回報控制 0關掉 E_ALL全部回報
ChkLogin();                               //檢查是否登入
$hdnOp=$_POST["hdnOp"];                   //表單固定參數
$_SESSION["sSQLFile"]="PAY/PAY0101.sql";  //SQL檔路徑

// ===========================================================================
// 接收參數宣告
// ===========================================================================
$oh01=$_GET["oh01"];                      //接收欲編輯的資料

if (Trim($oh01)!="") {
	$_SESSION["PAY0101_oh01"]=$oh01;
}

$oh01="";
$oh02="";
$oh03="";
$oh04="";
$oh05="";
$oh06="";
$oh07="";
$oh08="";
$oh09="";
$oh10="";
$oh11="";
$oh12="";
$oh13="";
$oh14="";
$oh15="";
$oh16="";
$oh17="";
$oh18="";
$oh19="";
$oh20="";
$oh21="";
$oh22="";
$oh23="";
$oh24="";
$oh25="";
$oh26="";
$oh27="";
$me01="";
$lasttime="";

$aParme=Array($_SESSION["PAY0101_oh01"]);
$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury03", $aParme);
$rRs=GetRs($sSQL);
$iRsRows=mysql_num_rows($rRs);
if ($iRsRows>0) {
	$aRows=mysql_fetch_array($rRs, MYSQL_ASSOC);
	$oh01=$aRows["oh01"];
	$oh02=$aRows["oh02"];
	$oh03=$aRows["oh03"];
	$oh04=$aRows["oh04"];
	$oh05=$aRows["oh05"];
	$oh06=$aRows["oh06"];
	$oh07=$aRows["oh07"];
	$oh08=$aRows["oh08"];
	$oh09=$aRows["oh09"];
	$oh10=$aRows["oh10"];
	$oh11=$aRows["oh11"];
	$oh12=$aRows["oh12"];
	$oh13=$aRows["oh13"];
	$oh14=$aRows["oh14"];
	$oh15=$aRows["oh15"];
	$oh16=$aRows["oh16"];
	$oh17=$aRows["oh17"];
	$oh18=$aRows["oh18"];
	$oh19=$aRows["oh19"];
	$oh20=$aRows["oh20"];
	$oh21=$aRows["oh21"];
	$oh22=$aRows["oh22"];
	$oh23=$aRows["oh23"];
	$oh24=$aRows["oh24"];
	$oh25=$aRows["oh25"];
	$oh26=$aRows["oh26"];
	$oh27=$aRows["oh27"];
	$me01=$aRows["me01"];
	$lasttime=$aRows["lasttime"];

}

uLog("oh01 == [".$oh01."]");
uLog("oh02 == [".$oh02."]");
uLog("oh03 == [".$oh03."]");
uLog("oh04 == [".$oh04."]");
uLog("oh05 == [".$oh05."]");
uLog("oh06 == [".$oh06."]");
uLog("oh07 == [".$oh07."]");
uLog("oh08 == [".$oh08."]");
uLog("oh09 == [".$oh09."]");
uLog("oh10 == [".$oh10."]");
uLog("oh11 == [".$oh11."]");
uLog("oh12 == [".$oh12."]");
uLog("oh13 == [".$oh13."]");
uLog("oh14 == [".$oh14."]");
uLog("oh15 == [".$oh15."]");
uLog("oh16 == [".$oh16."]");
uLog("oh17 == [".$oh17."]");
uLog("oh18 == [".$oh18."]");
uLog("oh19 == [".$oh19."]");
uLog("oh20 == [".$oh20."]");
uLog("oh21 == [".$oh21."]");
uLog("oh22 == [".$oh22."]");
uLog("oh23 == [".$oh23."]");
uLog("oh24 == [".$oh24."]");
uLog("oh25 == [".$oh25."]");
uLog("oh26 == [".$oh26."]");
uLog("oh27 == [".$oh27."]");
uLog("me01 == [".$me01."]");
uLog("lasttime == [".$lasttime."]");

$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh01);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh02);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh03);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh04);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh05);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh06);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh07);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh08);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh09);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh10);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh11);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh12);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh13);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh14);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh15);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh16);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh17);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh18);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh19);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh20);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh21);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh22);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh23);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh24);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh25);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh26);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $oh27);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $me01);
$aOrderData=UnidimensionalArrayAppend($aOrderData, $lasttime);

$aOrderTitle=Array("訂單單頭編號", "處理進度狀態", "訂購時間", "付款方式", "付款狀態", "訂單總金額", "中文全名", "性別", "手機號碼", "縣市", "鄉鎮市區", "郵遞區號", "地址", "會員暱稱", "電子郵件", "密碼", "統一編號", "發票抬頭", "中文全名", "性別", "手機號碼", "送貨地址-縣市", "送貨地址-鄉鎮市區", "送貨地址-郵遞區號", "送貨地址-地址", "退貨狀態", "退貨原因", "會員帳號", "最後更新時間");

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
HtmlManTopII();
HtmlManAPNameII("PAY0101 - 結帳系統 -＞ <A HREF=\"PAY0101.php\">訂單管理</A>");
HtmlManContentTopII();

DataView($aOrderTitle, $aOrderData, $oh01);

HtmlManContentDownII();
HtmlManDownII();

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php
function DataView($aOrderTitle, $aOrderData, $oh01) {
	?>
	<table width="100%" border="0" cellspacing="0" cellpadding="5" class="adminlist">
		<tr class='info_title'>
			<td colspan="2"><strong>訂單資料一覽</strong></td>
		</tr>
		<?php
		$iOrderTitleLen = GetUnidimensionalArrayLength($aOrderTitle);
		for ($i=0; $i<$iOrderTitleLen; $i++) {
			?>
			<tr class='info_content'>
				<td Width="12%"><?php echo $aOrderTitle[$i];?></td>
				<td Width="88%"><?php echo $aOrderData[$i];?></td>
			</tr>
			<?php
		}
		?>

	</table><p>

	<table width="100%" border="0" cellspacing="0" cellpadding="5" class="adminlist">
		<tr class='info_title'>
			<td colspan="11"><strong>訂單細項資料一覽</strong></td>
		</tr>

		<tr class='info_title'>
		<td><strong>訂單細項編號 </strong></td>
		<td><strong>數量         </strong></td>
		<td><strong>小計         </strong></td>
		<td><strong>商品編號     </strong></td>
		<td><strong>商品名稱     </strong></td>
		<td><strong>網站-優惠價  </strong></td>
		<td><strong>商品規格-顏色</strong></td>
		<td><strong>商品規格-尺寸</strong></td>
		<td><strong>訂單單頭編號 </strong></td>
		<td><strong>會員帳號     </strong></td>
		<td><strong>最後更新時間 </strong></td>
		</tr>

		<?php
		$aParme=Array($oh01);
		$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury02", $aParme);
		$rRs=GetRs($sSQL);

		while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
			?>
			<tr class='info_title'>
			<td><strong><?php echo $row["od01"];?></strong></td>
			<td><strong><?php echo $row["od02"];?></strong></td>
			<td><strong><?php echo $row["od03"];?></strong></td>
			<td><strong><?php echo $row["pi01"];?></strong></td>
			<td><strong><?php echo $row["pi02"];?></strong></td>
			<td><strong><?php echo $row["pi04"];?></strong></td>
			<td><strong><?php echo $row["pi13"];?></strong></td>
			<td><strong><?php echo $row["pi14"];?></strong></td>
			<td><strong><?php echo $row["oh01"];?></strong></td>
			<td><strong><?php echo $row["me01"];?></strong></td>
			<td><strong><?php echo $row["lasttime"];?></strong></td></tr>
			<?php
		}
		mysql_free_result($rRs);
		?>

	</table><p>
	<?php
}


?>
<?php //**************************************************************************** ?>