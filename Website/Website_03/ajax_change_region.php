<?php //*********************************模組檔案引入********************************* ?>
<?php include("Module/pUwm.php"); ?>
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
$me06=uniDecode(Trim($_GET["me06"]),'utf-8'); 
$me07=uniDecode(Trim($_GET["me07"]),'utf-8'); 
//uLog($_GET["sSrhme10"]);//接收欲編輯的資料
//$sSrhme10=uniDecode($_GET["sSrhme10"],'utf-8');
$action=$_GET['action'];
$ci01=$_GET['ci01'];
$ci02=$_GET['ci02'];
//$ci01=uniDecode($ci01,'utf-8');
$ci02=uniDecode($ci02,'utf-8');
uLog($me06);
uLog($me07);
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
if($action=="GetMe07"){
	echo "document.getElementById('me07').options.length = 0;\n";
	echo "obj.options[obj.options.length] = new Option('請選擇','');\n";
	$sSQLCountry="select * from citys where ci01='".$me06."'";
	$iLoopForCountry=0;
	$rRs=GetRs($sSQLCountry);
	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		echo "obj.options[obj.options.length] = new Option('".Trim($row["ci02"])."','".(Trim($row["ci02"]))."');\n";

		$iLoopForCountry++;
	}
	mysql_free_result($rRs);
	return;
}
if( $action == "GetMe08" ){
	$sSQL="select * from citys where ci02='".$me07."'";
	$result=GetRs($sSQL);
	while($row=mysql_fetch_array($result)){
		$me08=$row['ci03'];
	}
	uLog($me08);
	echo "document.getElementById(\"me08\").value=".$me08;
}

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php
function uniDecode($str,$charcode){
	$text = preg_replace_callback("/%u[0-9A-Za-z]{4}/",toUtf8,$str);
	return mb_convert_encoding($text, $charcode, 'utf-8');
}

function toUtf8($ar){
	foreach($ar as $val){
		$val = intval(substr($val,2),16);
		if($val < 0x7F){        // 0000-007F
			$c .= chr($val);
		}elseif($val < 0x800) { // 0080-0800
			$c .= chr(0xC0 | ($val / 64));
			$c .= chr(0x80 | ($val % 64));
		}else{                // 0800-FFFF
			$c .= chr(0xE0 | (($val / 64) / 64));
			$c .= chr(0x80 | (($val / 64) % 64));
			$c .= chr(0x80 | ($val % 64));
		}
	}
	return $c;
}
?>
<?php //**************************************************************************** ?>
