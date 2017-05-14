<?php //*********************************模組檔案引入********************************* ?>
<?php include("../../Module/pMwm.php"); ?>
<?php //**************************************************************************** ?>

<?php //*********************************前置變數定義********************************* ?>
<?php
// ===========================================================================
// 初始化參數宣告
// ===========================================================================
ErrorReporting(E_ERROR | E_WARNING | E_PARSE);                    //錯誤回報控制 0關掉 E_ALL全部回報
ChkLogin();                               //檢查是否登入

// ===========================================================================
// 接收參數宣告
// ===========================================================================
$SourceId=$_GET["SourceId"];
$TargetId=$_GET["TargetId"];

uLog("SourceId == " . $SourceId);
uLog("TargetId == " . $TargetId);

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
//取出階層資料
$sSourceLevel="";
$sTargetLevel="";

$sSQL="select (select pr03 from property where pr01='".$SourceId."') as SourceLevel, (select pr03 from property where pr01='".$TargetId."') as TargetLevel;";
$rRs=GetRs($sSQL);

while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
	$sSourceLevel=$row["SourceLevel"];
	$sTargetLevel=$row["TargetLevel"];
}
mysql_free_result($rRs);

uLog("sSourceLevel == [".$sSourceLevel."]");
uLog("sTargetLevel == [".$sTargetLevel."]");

//判斷是否移到自已以下
if (IsTargetInSource($SourceId, $sSourceLevel, $TargetId, $sTargetLevel)) {
	echo "{success:false,errorMessage:'請勿移動到自已本階及本階以下！'}";
} else {
	//判斷父階是否跟來源父階相同
	if (IsTargetIdIsSourceFatherId($SourceId, $sSourceLevel, $TargetId, $sTargetLevel)) {
		echo "{success:false,errorMessage:'父編號相同，請重新選擇！'}";
	} else {
		//判斷移動之上下層
		if (SafeInt($sSourceLevel)<SafeInt($sTargetLevel)) {
			//往下層移動
			uLog("往下層移動");
			$iCanMoveLevel=5-SafeInt($sTargetLevel);
			$iTotalLevel=GetSourceTotalLevel($sSourceLevel, $SourceId);
			uLog("iTotalLevel out == [".$iTotalLevel."]");
			if (SafeInt($iTotalLevel)<=$iCanMoveLevel) {
				uLog("未超階，可以移動");
				//更動來源到目的
				$sSQLUpdate="update property set pr04='".$TargetId."', pr03=".SafeStr(SafeInt($sTargetLevel)+1)." where pr01='".$SourceId."';";
				$rRs=GetRs($sSQLUpdate);
				//更動來源以下層級
				if (SafeStr($sTargetLevel)=="1") {
					$sSQLUpdate01="update property set pr03=".SafeStr(SafeInt($sTargetLevel)+2)." where pr04='".$SourceId."';";
					$rRs=GetRs($sSQLUpdate01);
					
					$sNewResult=GetInDetail("select pr01 from property where pr04='".$SourceId."'");
					if ($sNewResult!="") {
						$sSQLUpdate02="update property set pr03=".SafeStr(SafeInt($sTargetLevel)+3)." where pr04 in (".$sNewResult.");";
						$rRs=GetRs($sSQLUpdate02);
					}

					$sNewResult=GetInDetail("select pr01 from property where pr04 in (select pr01 from property where pr04='".$SourceId."')");
					if ($sNewResult!="") {
						$sSQLUpdate03="update property set pr03=".SafeStr(SafeInt($sTargetLevel)+4)." where pr04 in (".$sNewResult.");";
						$rRs=GetRs($sSQLUpdate03);
					}
				} else if (SafeStr($sTargetLevel)=="2") {
					$sSQLUpdate01="update property set pr03=".SafeStr(SafeInt($sTargetLevel)+2)." where pr04='".$SourceId."';";
					$rRs=GetRs($sSQLUpdate01);

					$sNewResult=GetInDetail("select pr01 from property where pr04='".$SourceId."'");
					if ($sNewResult!="") {
						$sSQLUpdate02="update property set pr03=".SafeStr(SafeInt($sTargetLevel)+3)." where pr04 in (".$sNewResult.");";
						$rRs=GetRs($sSQLUpdate02);
					}
				} else if (SafeStr($sTargetLevel)=="3") {
					$sSQLUpdate01="update property set pr03=".SafeStr(SafeInt($sTargetLevel)+2)." where pr04='".$SourceId."';";
					$rRs=GetRs($sSQLUpdate01);
				}
				echo '{success:true}';
			} else {
				uLog("已超階，不可以移動");
				echo "{success:false,errorMessage:'來源總階數共【".$iTotalLevel."】階，目的可接收的總階數【".$iCanMoveLevel."】階，已超階，不可以移動！'}";
			}
		} else {
			//往上層移動
			uLog("往上層移動");
			//更動來源到目的
			$sSQLUpdate="update property set pr04='".$TargetId."', pr03=".SafeStr(SafeInt($sTargetLevel)+1)." where pr01='".$SourceId."';";
			$rRs=GetRs($sSQLUpdate);
			//更動來源以下層級
			if (SafeStr($sTargetLevel)=="1") {
				$sSQLUpdate01="update property set pr03=".SafeStr(SafeInt($sTargetLevel)+2)." where pr04='".$SourceId."';";
				$rRs=GetRs($sSQLUpdate01);
				
				$sNewResult=GetInDetail("select pr01 from property where pr04='".$SourceId."'");
				if ($sNewResult!="") {
					$sSQLUpdate02="update property set pr03=".SafeStr(SafeInt($sTargetLevel)+3)." where pr04 in (".$sNewResult.");";
					$rRs=GetRs($sSQLUpdate02);
				}

				$sNewResult=GetInDetail("select pr01 from property where pr04 in (select pr01 from property where pr04='".$SourceId."')");
				if ($sNewResult!="") {
					$sSQLUpdate03="update property set pr03=".SafeStr(SafeInt($sTargetLevel)+4)." where pr04 in (".$sNewResult.");";
					$rRs=GetRs($sSQLUpdate03);
				}
			} else if (SafeStr($sTargetLevel)=="2") {
				$sSQLUpdate01="update property set pr03=".SafeStr(SafeInt($sTargetLevel)+2)." where pr04='".$SourceId."';";
				$rRs=GetRs($sSQLUpdate01);

				$sNewResult=GetInDetail("select pr01 from property where pr04='".$SourceId."'");
				if ($sNewResult!="") {
					$sSQLUpdate02="update property set pr03=".SafeStr(SafeInt($sTargetLevel)+3)." where pr04 in (".$sNewResult.");";
					$rRs=GetRs($sSQLUpdate02);
				}
			} else if (SafeStr($sTargetLevel)=="3") {
				$sSQLUpdate01="update property set pr03=".SafeStr(SafeInt($sTargetLevel)+2)." where pr04='".$SourceId."';";
				$rRs=GetRs($sSQLUpdate01);
			}
			echo '{success:true}';
		}
	}
}
//echo '{success:true}';

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php
function GetSourceTotalLevel($sSourceLevel, $SourceId) {
	$sSQL="";
	$iL02Count=0;
	$iL03Count=0;
	$iL04Count=0;
	$iL05Count=0;

	if ($sSourceLevel=="1") {
		$sSQL="select (select count(*) from property where pr03='2' and pr04='".$SourceId."') as L02Count, (select count(*) from property where pr03='3' and pr04 in (select pr01 from property where pr03='2' and pr04='".$SourceId."')) as L03Count, (select count(*) from property where pr03='4' and pr04 in (select pr01 from property where pr03='3' and pr04 in (select pr01 from property where pr03='2' and pr04='".$SourceId."'))) as L04Count, (select count(*) from property where pr03='5' and pr04 in (select pr01 from property where pr03='4' and pr04 in (select pr01 from property where pr03='3' and pr04 in (select pr01 from property where pr03='2' and pr04='".$SourceId."')))) as L05Count";
	} else if ($sSourceLevel=="2") {
		$sSQL="select (select count(*) from property where pr03='3' and pr04='".$SourceId."') as L03Count, (select count(*) from property where pr03='4' and pr04 in (select pr01 from property where pr03='2' and pr04='".$SourceId."')) as L04Count, (select count(*) from property where pr03='5' and pr04 in (select pr01 from property where pr03='3' and pr04 in (select pr01 from property where pr03='2' and pr04='".$SourceId."'))) as L05Count";
	} else if ($sSourceLevel=="3") {
		$sSQL="select (select count(*) from property where pr03='4' and pr04='".$SourceId."') as L04Count, (select count(*) from property where pr03='5' and pr04 in (select pr01 from property where pr03='2' and pr04='".$SourceId."')) as L05Count";
	} else if ($sSourceLevel=="4") {
		$sSQL="select (select count(*) from property where pr03='5' and pr04='".$SourceId."') as L05Count";
	}

	$rRs=GetRs($sSQL);

	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		if ($sSourceLevel=="1") {
			$iL02Count=SafeInt($row["L02Count"]);
			$iL03Count=SafeInt($row["L03Count"]);
			$iL04Count=SafeInt($row["L04Count"]);
			$iL05Count=SafeInt($row["L05Count"]);
		} else if ($sSourceLevel=="2") {
			$iL03Count=SafeInt($row["L03Count"]);
			$iL04Count=SafeInt($row["L04Count"]);
			$iL05Count=SafeInt($row["L05Count"]);
		} else if ($sSourceLevel=="3") {
			$iL04Count=SafeInt($row["L04Count"]);
			$iL05Count=SafeInt($row["L05Count"]);
		} else if ($sSourceLevel=="4") {
			$iL05Count=SafeInt($row["L05Count"]);
		}
	}
	mysql_free_result($rRs);

	$iTotalLevel=1; //含自已本身層數
	if ($iL02Count>0) {
		$iTotalLevel++;
	}
	if ($iL03Count>0) {
		$iTotalLevel++;
	} 
	if ($iL04Count>0) {
		$iTotalLevel++;
	} 
	if ($iL05Count>0) {
		$iTotalLevel++;
	}
	uLog("iTotalLevel == [".$iTotalLevel."]");

	return $iTotalLevel;
}

function GetInDetail($sExecSQL) {
	$sResult="";

	$rRs=GetRs($sExecSQL);

	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$sResult=$sResult."'".$row["pr01"]."',";
	}
	mysql_free_result($rRs);

	if ($sResult!="") {
		$sResult=Left($sResult, Len($sResult)-1);
	}

	return $sResult;
}

function IsTargetInSource($SourceId, $sSourceLevel, $TargetId, $sTargetLevel) {
	$bResult=false; //false：不存在 true：存在
	
	//SQL設定
	$sSQL="";

	if (Trim($sSourceLevel)=="1") {
		$sSQL=$sSQL."(select pr01 from property where pr01='".$SourceId."') ";
		$sSQL=$sSQL."union ";
		$sSQL=$sSQL."(select pr01 from property where pr04='".$SourceId."') ";
		$sSQL=$sSQL."union ";
		$sSQL=$sSQL."(select pr01 from property where pr04 in (select pr01 from property where pr04='".$SourceId."')) ";
		$sSQL=$sSQL."union ";
		$sSQL=$sSQL."(select pr01 from property where pr04 in (select pr01 from property where pr04 in (select pr01 from property where pr04='".$SourceId."'))) ";
		$sSQL=$sSQL."union ";
		$sSQL=$sSQL."(select pr01 from property where pr04 in (select pr01 from property where pr04 in (select pr01 from property where pr04 in (select pr01 from property where pr04='".$SourceId."'))));";
	} else if (Trim($sSourceLevel)=="2") {
		$sSQL=$sSQL."(select pr01 from property where pr01='".$SourceId."') ";
		$sSQL=$sSQL."union ";
		$sSQL=$sSQL."(select pr01 from property where pr04='".$SourceId."') ";
		$sSQL=$sSQL."union ";
		$sSQL=$sSQL."(select pr01 from property where pr04 in (select pr01 from property where pr04='".$SourceId."')) ";
		$sSQL=$sSQL."union ";
		$sSQL=$sSQL."(select pr01 from property where pr04 in (select pr01 from property where pr04 in (select pr01 from property where pr04='".$SourceId."')));";
	} else if (Trim($sSourceLevel)=="3") {
		$sSQL=$sSQL."(select pr01 from property where pr01='".$SourceId."') ";
		$sSQL=$sSQL."union ";
		$sSQL=$sSQL."(select pr01 from property where pr04='".$SourceId."') ";
		$sSQL=$sSQL."union ";
		$sSQL=$sSQL."(select pr01 from property where pr04 in (select pr01 from property where pr04='".$SourceId."'));";
	} else if (Trim($sSourceLevel)=="4") {
		$sSQL=$sSQL."(select pr01 from property where pr01='".$SourceId."') ";
		$sSQL=$sSQL."union ";
		$sSQL=$sSQL."(select pr01 from property where pr04='".$SourceId."');";
	} else if (Trim($sSourceLevel)=="5") {
		$sSQL=$sSQL."select pr01 from property where pr01='".$SourceId."';";
	}


	//將來源編號匯入陣列
	$aBasicPr01=Array();
	$rRs=GetRs($sSQL);

	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$aBasicPr01=UnidimensionalArrayAppend($aBasicPr01, Trim($row["pr01"]));
	}
	mysql_free_result($rRs);

	//判斷陣列是否有目標編號
	if (UnidimensionalArrayIndexOf($aBasicPr01, $TargetId)) {
		$bResult=true;
	} else {
		$bResult=false;
	}

	return $bResult;
}

function IsTargetIdIsSourceFatherId($SourceId, $sSourceLevel, $TargetId, $sTargetLevel) {
	$bResult=false; //false：不存在 true：存在
	
	//SQL設定
	$sFatherId="";
	$sSQL="select * from property where pr01='".$SourceId."';";

	//將來源父編號
	$rRs=GetRs($sSQL);

	while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
		$sFatherId=Trim($row["pr04"]);
	}
	mysql_free_result($rRs);

	//判斷是否父編號是否等於目標編號
	if (Trim($sFatherId)==Trim($TargetId)) {
		$bResult=true;
	} else {
		$bResult=false;
	}

	return $bResult;
}

?>
<?php //**************************************************************************** ?>