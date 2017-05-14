<?php //*********************************模組檔案引入********************************* ?>
<?php include("pModule.php"); ?>
<?php //**************************************************************************** ?>

<?php //*********************************登入相關函數********************************* ?>
<?php
function GetManID() {
	return $_SESSION["ManID"];
}

function GetManPwd() {
	return $_SESSION["ManPwd"];
}

//session 登入為true，沒登入為false
function IsLogin() {
	$bResult=false;
	if (Trim(GetManID())=="") {
		$bResult=false;
	} else {
		$bResult=true;
	}
	return $bResult;
}

function ChkLogin() {
	if (IsLogin()==false) {
		$sUrl="http://".GetServerHostName()."/".GetPathProjectV()."manage/index.php";
		//uLog("sUrl == ".$sUrl);
		header("location:".$sUrl);
	}

	$sNowUrl="http://".GetServerHostName().GetCurrFileNameV(); //目前程式執行路徑
	if (Trim($_SESSION["sDLUrl"])!=$sNowUrl) {
		$_SESSION["sDLUrl"]="";
	}
}

?>
<?php //**************************************************************************** ?>

<?php //*********************************網頁共用相關函數********************************* ?>
<?php
function ManageHeadPanel($sMsg) {
	?>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo GetTitle();?></title>

		<!-- ######################################### Ext JS Script Code Start ######################################### -->
		<link rel="stylesheet" type="text/css" href="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/resources/css/ext-all.css" />
		<link rel="stylesheet" type="text/css" href="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/css/desktop.css" />
		<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/adapter/ext/ext-base.js"></script>
		<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/ext-all-debug.js"></script>
		<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/js/StartMenu.js"></script>
		<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/js/TaskBar.js"></script>
		<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/js/Desktop.js"></script>
		<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/js/App.js"></script>
		<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/js/Module.js"></script>

		<!-- ########################## 2011/3/6 update start ########################## -->
    <!-- <link rel="stylesheet" type="text/css" href="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>examples/shared/examples.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>examples/grid/grid-examples.css" /> -->
    <!-- <script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>ext-all.js"></script> -->
    <script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/ux/CheckColumn.js"></script>
		<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/shared/examples.js"></script>
		<!-- ########################## 2011/3/6 update end   ########################## -->

		<!-- ########################## 2011/4/5 update start ########################## -->
    <link rel="stylesheet" type="text/css" href="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/ux/css/MultiSelect.css"/>
    <script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/ux/MultiSelect.js"></script>
    <script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/ux/ItemSelector.js"></script>
		<!-- ########################## 2011/4/5 update end   ########################## -->

		<?php
		ExtJsSetup($sMsg);	
		?>
		<!-- <script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>examples/shared/examples.js"></script> -->
		<!-- ######################################### Ext JS Script Code End   ######################################### -->
		<!-- ######################################### ZunHong Script Code Start ######################################### -->
		<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>jscript/uUtil.js"></script>
		<!-- ######################################### ZunHong Script Code End   ######################################### -->

		<!-- ######################################### Ext JS Script Code Start ######################################### -->
    <script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/ux/ProgressBarPager.js"></script>
    <script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/ux/PanelResizer.js"></script>
    <script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/ux/PagingMemoryProxy.js"></script>
		<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/ux/SearchField.js"></script>
		<!-- ######################################### Ext JS Script Code End   ######################################### -->
	</head>
	<?php
}

function ManageBodyPanel() {
	?>
	<body scroll="no">

		<div id="x-desktop">
			<dl id="x-shortcuts">
				<!-- <dt id="grid-win-shortcut">
						<a href="#"><img src="images/s.gif" />
						<div>Grid Window</div></a>
				</dt> -->
				<!-- <dt id="acc-win-shortcut">
						<a href="#"><img src="images/s.gif" />
						<div>Accordion Window</div></a>
				</dt> -->
			</dl>
		</div>

		<div id="ux-taskbar">
			<div id="ux-taskbar-start"></div>
			<div id="ux-taskbuttons-panel"></div>
			<div class="x-clear"></div>
		</div>

	</body>
	</html>
	<?php
}

?>
<?php //********************************************************************************** ?>

<?php //*********************************Ext Js 共用函數********************************* ?>
<?php
function ExtJsSetup($sErr) {
	ExtJsInit();
	ExtJsAboutUsPanle(); //關於
	ExtJsSysInfoPanle(); //1.系統資訊管理
	ExtJsNewInfoPanle(); //2.最新消息
	ExtJsEveInfoPanle(); //3.活動訊息
	ExtJsPspInfoPanle(); //4.野遊勝地
	ExtJsBanInfoPanle(); //5.廣告管理
	ExtJsBuyInfoPanle(); //6.購物中心
	ExtJsProInfoPanle(); //7.商品管理
	ExtJsPayInfoPanle(); //8.結帳系統
	ExtJsMemInfoPanle(); //9.會員專區
	ExtJsSerInfoPanle(); //10.客服中心
	ExtJsGooInfoPanle(); //11.網友好評
	ExtJsEpaInfoPanle(); //12.電子報管理
	ExtJsRepInfoPanle(); //13.統計分析
	ExtJsLocInfoPanle(); //14.門市據點
	ExtJsBraInfoPanle(); //15.經銷品牌
	//ExtJsMemInfoPanle(); //會員管理
	ExtJsAlertPanel($sErr);
}

function ExtJsInit() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	/*!
	 * Ext JS Library 3.3.1
	 * Copyright(c) 2006-2010 Sencha Inc.
	 * licensing@sencha.com
	 * http://www.sencha.com/license
	 */

	// Sample desktop configuration
	MyDesktop = new Ext.app.App({

			init :function(){
					Ext.QuickTips.init();
			},

			getModules : function(){
					return [
							new MyDesktop.SysInfoMenuModule(),  //1.系統資訊管理
							new MyDesktop.NewInfoMenuModule(),  //2.最新消息
							new MyDesktop.EveInfoMenuModule(),  //3.活動訊息
							new MyDesktop.PspInfoMenuModule(),  //4.野遊勝地
							new MyDesktop.BanInfoMenuModule(),  //5.廣告管理
							new MyDesktop.BuyInfoMenuModule(),  //6.購物中心
							new MyDesktop.ProInfoMenuModule(),  //7.商品管理
							new MyDesktop.PayInfoMenuModule(),  //8.結帳系統
							new MyDesktop.MemInfoMenuModule(),  //9.會員專區
							new MyDesktop.SerInfoMenuModule(),  //10.客服中心
							new MyDesktop.GooInfoMenuModule(),  //11.網友好評
							new MyDesktop.EpaInfoMenuModule(),  //12.電子報管理
							new MyDesktop.RepInfoMenuModule(),  //13.統計分析
							new MyDesktop.LocInfoMenuModule(),  //14.門市據點
							new MyDesktop.BraInfoMenuModule(),  //15.經銷品牌
							//new MyDesktop.MemInfoMenuModule(),  //會員管理
							new MyDesktop.AboutUsModule()       //關於
					];
			},

			// config for the start menu
			getStartConfig : function(){
					return {
							title: '<?php echo GetTitle();?>',
							iconCls: 'user',
							width: 300, //此寬度是指白色部份
							height: 500,
							toolItems: [{
									text:'登出',
									iconCls:'logout',
									handler : function() { window.location = "logout.php"; },
									scope:this
							}]
					};
			}
	});
	//-->
	</SCRIPT>
	<?php
}

function ExtJsAboutUsPanle() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	MyDesktop.AboutUsModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '關於',
							iconCls:'bogus',
							handler : this.createWindow,
							scope: this,
							windowId:'AboutUs'
					}
			},

			createWindow : function(src){
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('AboutUs');
					if(!win){
							win = desktop.createWindow({
									id: 'AboutUs',
									title:src.text,
									width:640,
									//height:480,
									html : '<p>1966年，兩位熱愛登山的年輕登山家在美西舊金山北部的濱水區創立了一家小型的登山用品專賣店，並且為它取名為Wild Breeze，開始設計生產專業的登山服裝與裝備；由於品質精良與傑出的產品設計，Wild Breeze很快的成為知名的戶外服裝領導品牌。</p><p>Wild Breeze名字的由來是緣起於在北半球，山脊的北壁往往日照時間最短，是最寒冷、最多冰雪，對於登山者而言也是最具危險與挑戰性的區域，需要更好的技巧與最佳的裝備來克服；許多登山家皆以攀登山峰的北壁作為他們挑戰的終極目標。</p><p>1968年起Wild Breeze開始設計並生產高功能性的專業登山服裝與器材，到了1980年初期，極限運動中的滑雪板也開始加入Wild Breeze的設計商品線；而在80年代末期，Wild Breeze已成為全美唯一供應最完備高功能性戶外服裝、滑雪服、睡袋、背包與帳棚的品牌。</p><p>1996年春季，Wild Breeze率先以全系列高科技材質與創新結構的Tekware投入休閒運動服飾市場，帶給喜愛攀岩、健行、郊山、慢跑等戶外運動人仕最佳的功能性、舒適性選擇。</p><p>Wild Breeze創立至40餘年，始終以最高的技術、設計專業戶外服裝、背包、裝備與鞋子，在全球市場上，Wild Breeze永遠都是成功登頂者、世界性探險隊、極限運動選手、極地探險家的最愛。Wild Breeze不斷的追求設計與性能的極限，讓每一位生命中充滿理想、熱血的探險家與戶外愛好者，盡情的挑戰自我的極限；同時在廿一世紀一開始的今天，肯定也將帶給這一個充滿生機的台灣戶外運動市場無窮的希望與未來!</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true
							});
					}
					win.show();
			}
	});
	//-->
	</SCRIPT>
	<?php
}

function ExtJsAlertPanel($sErr) {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	<?php
	if (Trim($sErr)!="") {
		?>
		Ext.onReady(function(){
				Ext.MessageBox.show({
						title: '野遊風系統訊息',
						msg: '<?php echo $sErr;?>',
						buttons: Ext.MessageBox.OK,
						//animEl: "",
						//fn: "",
						//icon: "ext-mb-error"
						icon: "ext-mb-info"
						//icon: "ext-mb-question"
						//icon: "ext-mb-warning"
				});
		});
		<?php
	}
	?>
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //********************************************************************************* ?>

<?php //*********************************會員專區相關函數********************************* ?>
<?php
function ExtJsMemInfoPanle() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	MyDesktop.MemInfoMenuModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '會員專區',
							iconCls: 'bogus',
							handler: function() {return false;},
							menu: {
									items:[
											{
													text: '會員專區管理',
													iconCls:'bogus',
													handler : this.MEM0101,
													scope: this,
													windowId: 'MEM0101'
											}
									]
							}
					}
			},

			MEM0101 : function(src){
					//############################# 1.4. 管理員新增	SYS0101 Start #############################
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('MEM0101');
					if(!win){
							win = desktop.createWindow({
									id: 'MEM0101',
									title:src.text,
									width:1040,
									//height:650,
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true, 
									html:'<iframe title="會員專區管理" width="1024" height="400" src="MEM/MEM0101.php" frameborder="0" allowfullscreen scrolling="auto"></iframe>'
							});
					}
					win.show();
					//############################# 1.4. 管理員新增	SYS0101 End   #############################
			}

	});
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //************************************************************************************** ?>

<?php //*********************************結帳系統相關函數********************************* ?>
<?php
function ExtJsPayInfoPanle() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	MyDesktop.PayInfoMenuModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '結帳系統',
							iconCls: 'bogus',
							handler: function() {return false;},
							menu: {
									items:[
											{
													text: '訂單管理',
													iconCls:'bogus',
													handler : this.PAY0101,
													scope: this,
													windowId: 'PAY0101'
											}
									]
							}
					}
			},

			PAY0101 : function(src){
					//############################# 1.4. 管理員新增	SYS0101 Start #############################
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('PAY0101');
					if(!win){
							win = desktop.createWindow({
									id: 'PAY0101',
									title:src.text,
									width:1040,
									//height:650,
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true, 
									html:'<iframe title="訂單管理" width="1024" height="400" src="PAY/PAY0101.php" frameborder="0" allowfullscreen scrolling="auto"></iframe>'
							});
					}
					win.show();
					//############################# 1.4. 管理員新增	SYS0101 End   #############################
			}

	});
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //************************************************************************************** ?>

<?php //*********************************經銷品牌相關函數********************************* ?>
<?php
function ExtJsBraInfoPanle() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	MyDesktop.BraInfoMenuModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '經銷品牌',
							iconCls: 'bogus',
							handler: function() {return false;},
							menu: {
									items:[
											{
													text: '經銷品牌管理',
													iconCls:'bogus',
													handler : this.BRA0101,
													scope: this,
													windowId: 'BRA0101'
											}
									]
							}
					}
			},

			BRA0101 : function(src){
					//############################# 1.4. 管理員新增	SYS0101 Start #############################
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('BRA0101');
					if(!win){
							win = desktop.createWindow({
									id: 'BRA0101',
									title:src.text,
									width:1040,
									//height:650,
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true, 
									html:'<iframe title="經銷品牌管理" width="1024" height="400" src="BRA/BRA0101.php" frameborder="0" allowfullscreen scrolling="auto"></iframe>'
							});
					}
					win.show();
					//############################# 1.4. 管理員新增	SYS0101 End   #############################
			}

	});
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //************************************************************************************** ?>

<?php //*********************************統計分析相關函數********************************* ?>
<?php
function ExtJsRepInfoPanle() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	MyDesktop.RepInfoMenuModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '統計分析',
							iconCls: 'bogus',
							handler: function() {return false;},
							menu: {
									items:[
											{
													text: '首頁最新服飾',
													iconCls:'bogus',
													handler : this.REP0101,
													scope: this,
													windowId: 'REP0101'
											},{
													text: '首頁最新消息',
													iconCls:'bogus',
													handler : this.REP0201,
													scope: this,
													windowId: 'REP0201'
											},{
													text: '首頁熱門促銷',
													iconCls:'bogus',
													handler : this.REP0301,
													scope: this,
													windowId: 'REP0301'
											},{
													text: '會員人數',
													iconCls:'bogus',
													handler : this.REP0401,
													scope: this,
													windowId: 'REP0401'
											}/*,{
													text: '商品數量',
													iconCls:'bogus',
													handler : this.REP0501,
													scope: this,
													windowId: 'REP0501'
											}*/,{
													text: '購買數量',
													iconCls:'bogus',
													handler : this.REP0601,
													scope: this,
													windowId: 'REP0601'
											},{
													text: '退貨數量',
													iconCls:'bogus',
													handler : this.REP0701,
													scope: this,
													windowId: 'REP0701'
											}
									]
							}
					}
			},

			REP0101 : function(src){
					//############################# 1.4. 管理員新增	SYS0101 Start #############################
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('REP0101');
					if(!win){
							win = desktop.createWindow({
									id: 'REP0101',
									title:src.text,
									width:1040,
									//height:650,
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true, 
									html:'<iframe title="首頁最新服飾" width="1024" height="400" src="REP/REP0101.php" frameborder="0" allowfullscreen scrolling="auto"></iframe>'
							});
					}
					win.show();
					//############################# 1.4. 管理員新增	SYS0101 End   #############################
			},

			REP0201 : function(src){
					//############################# 1.5. 管理員維護	SYS0201 Start #############################
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('REP0201');
					if(!win){
							win = desktop.createWindow({
									id: 'REP0201',
									title:src.text,
									width:1040,
									//height:650,
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true, 
									html:'<iframe title="首頁最新消息" width="1024" height="400" src="REP/REP0201.php" frameborder="0" allowfullscreen scrolling="auto"></iframe>'
							});
					}

					win.show();
					//############################# 1.5. 管理員維護	SYS0201 End   #############################
			},

			REP0301 : function(src){
					//############################# 1.5. 管理員維護	SYS0201 Start #############################
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('REP0301');
					if(!win){
							win = desktop.createWindow({
									id: 'REP0301',
									title:src.text,
									width:1040,
									//height:650,
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true, 
									html:'<iframe title="首頁熱門促銷" width="1024" height="400" src="REP/REP0301.php" frameborder="0" allowfullscreen scrolling="auto"></iframe>'
							});
					}

					win.show();
					//############################# 1.5. 管理員維護	SYS0201 End   #############################
			},

			REP0401 : function(src){
					//############################# 1.5. 管理員維護	SYS0201 Start #############################
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('REP0401');
					if(!win){
							win = desktop.createWindow({
									id: 'REP0401',
									title:src.text,
									width:1040,
									//height:650,
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true, 
									html:'<iframe title="會員人數" width="1024" height="400" src="REP/REP0401.php" frameborder="0" allowfullscreen scrolling="auto"></iframe>'
							});
					}

					win.show();
					//############################# 1.5. 管理員維護	SYS0201 End   #############################
			},
			/*
			REP0501 : function(src){
					//############################# 1.5. 管理員維護	SYS0201 Start #############################
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('REP0501');
					if(!win){
							win = desktop.createWindow({
									id: 'REP0501',
									title:src.text,
									width:1040,
									//height:650,
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true, 
									html:'<iframe title="商品數量" width="1024" height="400" src="REP/REP0501.php" frameborder="0" allowfullscreen scrolling="auto"></iframe>'
							});
					}

					win.show();
					//############################# 1.5. 管理員維護	SYS0201 End   #############################
			},
			*/
			REP0601 : function(src){
					//############################# 1.5. 管理員維護	SYS0201 Start #############################
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('REP0601');
					if(!win){
							win = desktop.createWindow({
									id: 'REP0601',
									title:src.text,
									width:1040,
									//height:650,
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true, 
									html:'<iframe title="購買數量" width="1024" height="400" src="REP/REP0601.php" frameborder="0" allowfullscreen scrolling="auto"></iframe>'
							});
					}

					win.show();
					//############################# 1.5. 管理員維護	SYS0201 End   #############################
			},

			REP0701 : function(src){
					//############################# 1.5. 管理員維護	SYS0201 Start #############################
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('REP0701');
					if(!win){
							win = desktop.createWindow({
									id: 'REP0701',
									title:src.text,
									width:1040,
									//height:650,
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true, 
									html:'<iframe title="退貨數量" width="1024" height="400" src="REP/REP0701.php" frameborder="0" allowfullscreen scrolling="auto"></iframe>'
							});
					}

					win.show();
					//############################# 1.5. 管理員維護	SYS0201 End   #############################
			}

	});
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //************************************************************************************** ?>

<?php //*********************************電子報管理相關函數********************************* ?>
<?php
function ExtJsEpaInfoPanle() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	MyDesktop.EpaInfoMenuModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '電子報管理',
							iconCls: 'bogus',
							handler: function() {return false;},
							menu: {
									items:[
											{
													text: '電子報類型管理',
													iconCls:'bogus',
													handler : this.EPA0101,
													scope: this,
													windowId: 'EPA0101'
											},{
													text: '電子報發送管理',
													iconCls:'bogus',
													handler : this.EPA0201,
													scope: this,
													windowId: 'EPA0201'
											},{
													text: '電子報名單匯入',
													iconCls:'bogus',
													handler : this.EPA0301,
													scope: this,
													windowId: 'EPA0301'
											}
									]
							}
					}
			},

			EPA0101 : function(src){
					//############################# 1.4. 管理員新增	SYS0101 Start #############################
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('EPA0101');
					if(!win){
							win = desktop.createWindow({
									id: 'EPA0101',
									title:src.text,
									width:1040,
									//height:650,
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true, 
									html:'<iframe title="電子報類型管理" width="1024" height="400" src="EPA/EPA0101.php" frameborder="0" allowfullscreen scrolling="auto"></iframe>'
							});
					}
					win.show();
					//############################# 1.4. 管理員新增	SYS0101 End   #############################
			},

			EPA0201 : function(src){
					//############################# 1.5. 管理員維護	SYS0201 Start #############################
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('EPA0201');
					if(!win){
							win = desktop.createWindow({
									id: 'EPA0201',
									title:src.text,
									width:1040,
									//height:650,
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true, 
									html:'<iframe title="電子報發送管理" width="1024" height="400" src="EPA/EPA0201.php" frameborder="0" allowfullscreen scrolling="auto"></iframe>'
							});
					}

					win.show();
					//############################# 1.5. 管理員維護	SYS0201 End   #############################
			},

			EPA0301 : function(src){
					//############################# 1.5. 管理員維護	SYS0201 Start #############################
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('EPA0301');
					if(!win){
							win = desktop.createWindow({
									id: 'EPA0301',
									title:src.text,
									width:1040,
									//height:650,
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true, 
									html:'<iframe title="電子報名單匯入" width="1024" height="400" src="EPA/EPA0301.php" frameborder="0" allowfullscreen scrolling="auto"></iframe>'
							});
					}

					win.show();
					//############################# 1.5. 管理員維護	SYS0201 End   #############################
			}

	});
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //************************************************************************************** ?>

<?php //*********************************系統資訊管理相關函數********************************* ?>
<?php
function ExtJsSysInfoPanle() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	MyDesktop.SysInfoMenuModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '系統資訊管理',
							iconCls: 'bogus',
							handler: function() {return false;},
							menu: {
									items:[
											{
													text: '管理員新增',
													iconCls:'bogus',
													handler : this.SYS0101,
													scope: this,
													windowId: 'SYS0101'
											},{
													text: '管理員維護',
													iconCls:'bogus',
													handler : this.SYS0201,
													scope: this,
													windowId: 'SYS0201'
											}
									]
							}
					}
			},

			SYS0101 : function(src){
					//############################# 1.4. 管理員新增	SYS0101 Start #############################
					var formPanel = new Ext.form.FormPanel({
							labelWidth: 75, // label settings here cascade unless overridden
							url:'index.php',
							tag: 'winlogin',
							frame:true,
							bodyStyle:'padding:5px 5px 0',
							defaults: {width: 230},
							defaultType: 'textfield',

							items: [{
											fieldLabel: '登入帳號',
											name: 'ma01',
											allowBlank:true
									},{
											fieldLabel: '登入密碼',
											name: 'ma02',
											inputType: 'password',
											allowBlank:true
									},{
											fieldLabel: '姓名',
											name: 'ma03',
											allowBlank:true
									}
							],

							buttons: [{
									text: '新增',
									handler: function(){
											if (Trim(formPanel.getForm().findField("ma01").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '登入帳號請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ma02").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '登入密碼請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ma03").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '姓名請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}

											formPanel.getForm().submit({
													url:'SYS/SYS0101.php', 
													waitMsg:'資料寫入中...', 
													success: function(form, action){
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入成功！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-info"
															});
															formPanel.getForm().setValues({
																	'ma01': '', 
																	'ma02': '',
																	'ma03': ''
															});

															return false;
													},
													failure: function(form, action){
															//Ext.Msg.alert('failure','err');
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入失敗！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-error"
															});
															return false;
													}
											});

											//formPanel.form.submit();
											//win.hide();
									}
							},{
									text: '取消',
									handler: function(){
											win.close();
									}
							}]
					})

					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('SYS0101');
					if(!win){
							win = desktop.createWindow({
									id: 'SYS0101',
									title:src.text,
									width:350,
									//height:480,
									//html : '<p>尚未完成</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									items:formPanel
							});
					}
					win.show();
					//############################# 1.4. 管理員新增	SYS0101 End   #############################
			},

			SYS0201 : function(src){
					//############################# 1.5. 管理員維護	SYS0201 Start #############################
					Ext.override(Ext.PagingToolbar, {
							doRefresh: function(){
									delete this.store.lastParams;
									this.doLoad(this.cursor);    
							}
					});

					var store = new Ext.data.Store({
							autoLoad:true,
							proxy: new Ext.ux.data.PagingMemoryProxy([]),
							reader:new Ext.data.ArrayReader({},[        //读数组到一个元数据对象
									{name : 'ma01'}, 
									{name : 'ma02'}, 
									{name : 'ma03'}, 
									{name : 'lasttime'}
							])
					});

					Ext.Ajax.request({                            //读取后台传递于前台数据
							url: 'SYS/SYS0201.php',
							method:'get',
							success:function(response, opts){
									var obj= Ext.decode(response.responseText);//obj储存响应的数据
									store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
									store.load({params:{start:0,limit:10}});//按5条记录分布
							},
							failure: function(){Ext.Msg.alert("failure");}
					});

					// create the Grid
					//var grid = new Ext.grid.GridPanel({
					var grid = new Ext.grid.EditorGridPanel({
							store: store,
							trackMouseOver: true,
							//表示单击一次可以编辑，默认是2次
							clicksToEdit : 1,

							columns: [
									{id:'ma01', header: "登入帳號", width: 100, sortable: true, dataIndex: 'ma01'},
									{header: "登入密碼", width: 100, sortable: true, dataIndex: 'ma02',
											editor:new Ext.form.TextField({
													selectOnFocus:true,
													blur:function () {
															if (this.getValue()=="") {
																	Ext.Msg.alert("警告", "登入密碼請勿空白，謝謝您！", function(){
																			var a = grid.getSelectionModel().getSelectedCell();
																			grid.startEditing(a[0],a[1]);    
																	});
															} else if (this.getValue()!="") {
																	var a = grid.getSelectionModel().getSelectedCell();
																	var record=grid.getStore().getAt(a[0]);
																	var keyvalue=record.get("ma01");

																	Ext.Ajax.request({                            //读取后台传递于前台数据
																			url: 'SYS/SYS0201_Update.php?field=ma02&value=' + escape(this.getValue()) + "&key=" + keyvalue,
																			method:'get',
																			success:function(response, opts){},
																			failure: function(){Ext.Msg.alert("failure");}
																	});
															}
													}
											})
									},
									{header: "姓名", width: 100, sortable: true, dataIndex: 'ma03',
											editor:new Ext.form.TextField({
													selectOnFocus:true,
													blur:function () {
															if (this.getValue()=="") {
																	Ext.Msg.alert("警告", "姓名請勿空白，謝謝您！", function(){
																			var a = grid.getSelectionModel().getSelectedCell();
																			grid.startEditing(a[0],a[1]);    
																	});
															} else if (this.getValue()!="") {
																	var a = grid.getSelectionModel().getSelectedCell();
																	var record=grid.getStore().getAt(a[0]);
																	var keyvalue=record.get("ma01");

																	Ext.Ajax.request({                            //读取后台传递于前台数据
																			url: 'SYS/SYS0201_Update.php?field=ma03&value=' + escape(this.getValue()) + "&key=" + keyvalue,
																			method:'get',
																			success:function(response, opts){},
																			failure: function(){Ext.Msg.alert("failure");}
																	});
															}
													}
											})
									},
									{header: "最後更新時間", width: 150, sortable: true, dataIndex: 'lasttime'},
									{
											xtype: 'actioncolumn',
											width: 50,
											items: [{
													icon   : '../LibExt/examples/shared/icons/fam/delete.gif',  // Use a URL in the icon config
													tooltip: '刪除此筆資料',
													handler: function(grid, rowIndex, colIndex) {
															var rec = store.getAt(rowIndex);
															//alert("Sell " + rec.get('ma01'));
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'SYS/SYS0201_Delete.php?ma01=' + rec.get('ma01'),
																	method:'get',
																	success:function(response, opts){
																			Ext.Msg.alert("警告", "資料已刪除成功！", function(){
																			});
																			Ext.Ajax.request({                            //读取后台传递于前台数据
																					url: 'SYS/SYS0201.php',
																					method:'get',
																					success:function(response, opts){
																							var obj= Ext.decode(response.responseText);//obj储存响应的数据
																							store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																							store.load({params:{start:0,limit:10}});//按5条记录分布
																					},
																					failure: function(){Ext.Msg.alert("failure");}
																			});
																			grid.store.reload();
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
													}
											}]
									}
							],
							stripeRows: true,
							autoExpandColumn: 'ma01',
							height:320,
							width:500,
							frame:true,

							tbar:new Ext.PagingToolbar({//工具栏
									pageSize:10,
									store:store,
									displayInfo:true,
									displayMsg:'From {0} To {1} Records, All Records Are {2} ',
									//displayMsg:'從 第{0}筆 到 第{1}筆, 總計 {2} 筆資料 ',
									emptyMsg:"no records",
									refreshText : "重新整理",
									doRefresh : function() {
											Ext.Ajax.request({                            //读取后台传递于前台数据
													url: 'SYS/SYS0201.php',
													method:'get',
													success:function(response, opts){
															var obj= Ext.decode(response.responseText);//obj储存响应的数据
															store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
															store.load({params:{start:0,limit:10}});//按5条记录分布
													},
													failure: function(){Ext.Msg.alert("failure");}
											});
											grid.store.reload();
									},
									handler : function() {
											Ext.getCmp('grid').getStore().reload(); 
									}
							})
					});

					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('SYS0201');
					if(!win){
							win = desktop.createWindow({
									id: 'SYS0201',
									title:src.text,
									width:510,
									//height:480,
									//html : '<p>尚未完成</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									items:grid
							});
					}

					win.show();
					//############################# 1.5. 管理員維護	SYS0201 End   #############################
			}

	});
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //************************************************************************************** ?>

<?php //*********************************新聞管理相關函數********************************* ?>
<?php
function ExtJsNewInfoPanle() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	MyDesktop.NewInfoMenuModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '最新消息',
							iconCls: 'bogus',
							handler: function() {return false;},
							menu: {
									items:[
											{
													text: '最新消息管理',
													iconCls:'bogus',
													handler : this.NEW0101,
													scope: this,
													windowId: 'NEW0101'
											}
									]
							}
					}
			},

			NEW0101 : function(src){
					var formPanel = new Ext.form.FormPanel({
							region: 'center',
							labelWidth: 75, // label settings here cascade unless overridden
							url:'index.php',
							tag: 'winlogin',
							fileUpload: true,
							frame:true,
							bodyStyle:'padding:5px 5px 0',
							defaults: {width: 290},
							defaultType: 'textfield',

							items: [{
											fieldLabel: '標題',
											name: 'ne02',
											allowBlank:true
									},{
											fieldLabel: '內容',
											name: 'ne03',
											xtype:'htmleditor',
											height:100,
											anchor:'98%',
											allowBlank:true
									},{
											fieldLabel: '上傳圖檔',
											name: 'ne04',
											inputType: 'file',
											allowBlank:true
									},{
											fieldLabel: '上架時間',
											name: 'ne05',
											format: 'Y-m-d',
											xtype: 'datefield',
											allowBlank:true
									},{
											fieldLabel: '下架時間',
											name: 'ne06',
											format: 'Y-m-d',
											xtype: 'datefield',
											allowBlank:true
									},{
											name: 'ne01',
											inputType: 'hidden',
											allowBlank: true
									}
							],

							buttons: [{
									text: '新增',
									name: 'InsertNews',
									id: 'InsertNews',
									handler: function(){
											if (Trim(formPanel.getForm().findField("ne02").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '標題請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ne03").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '內容請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ne05").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '上架時間請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ne06").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '下架時間請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}

											formPanel.getForm().submit({
													url:'SYS/SYS0301.php', 
													waitMsg:'資料寫入中...', 
													success: function(form, action){
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入成功！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-info"
															});
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'SYS/SYS0301_Sel.php',
																	method:'get',
																	success:function(response, opts){
																			var obj= Ext.decode(response.responseText);//obj储存响应的数据
																			store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																			store.load({params:{start:0,limit:10}});//按5条记录分布
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
															formPanel.getForm().setValues({
																	'ne02': '',
																	'ne03': '',
																	'ne04': '',
																	'ne05': '',
																	'ne06': ''
															});

															return false;
													},
													failure: function(form, action){
															//Ext.Msg.alert('failure','err');
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入失敗！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-error"
															});
															return false;
													}
											});

											//formPanel.form.submit();
											//win.hide();
									}
							},{
									text: '更新',
									name: 'UpdateNews',
									id: 'UpdateNews',
									disabled: true,
									handler: function(){
											//alert("new");
											if (Trim(formPanel.getForm().findField("ne02").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '標題請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ne03").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '內容請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ne05").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '上架時間請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ne06").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '下架時間請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											formPanel.getForm().submit({
													url:'SYS/SYS0301_Update.php', 
													waitMsg:'資料寫入中...', 
													success: function(form, action){
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料更新成功！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-info"
															});
															formPanel.getForm().setValues({
																	'ne01': '', 
																	'ne02': '', 
																	'ne03': '', 
																	'ne04': '', 
																	'ne05': '', 
																	'ne06': '' 
															});
															Ext.getCmp('InsertNews').enable();
															Ext.getCmp('UpdateNews').disable();
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'SYS/SYS0301_Sel.php',
																	method:'get',
																	success:function(response, opts){
																			var obj= Ext.decode(response.responseText);//obj储存响应的数据
																			store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																			store.load({params:{start:0,limit:10}});//按5条记录分布
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});

															return false;
													},
													failure: function(form, action){
															//Ext.Msg.alert('failure','err');
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入失敗！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-error"
															});
															return false;
													}
											});

											//formPanel.form.submit();
											//win.hide();
									}
							},{
									text: '取消',
									handler: function(){
											win.close();
									}
							}]
					})

					Ext.override(Ext.PagingToolbar, {
							doRefresh: function(){
									delete this.store.lastParams;
									this.doLoad(this.cursor);    
							}
					});

					var store = new Ext.data.Store({
							autoLoad:true,
							proxy: new Ext.ux.data.PagingMemoryProxy([]),
							reader:new Ext.data.ArrayReader({},[        //读数组到一个元数据对象
									{name : 'ne01'}, 
									{name : 'ne02'}, 
									{name : 'ne03'}, 
									{name : 'ne04'}, 
									{name : 'ne05'}, 
									{name : 'ne06'}, 
									{name : 'ma01'}, 
									{name : 'lasttime'}
							])
					});

					Ext.Ajax.request({                            //读取后台传递于前台数据
							url: 'SYS/SYS0301_Sel.php',
							method:'get',
							success:function(response, opts){
									var obj= Ext.decode(response.responseText);//obj储存响应的数据
									store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
									store.load({params:{start:0,limit:10}});//按5条记录分布
							},
							failure: function(){Ext.Msg.alert("failure");}
					});

					// create the Grid
					//var grid = new Ext.grid.GridPanel({
					var grid = new Ext.grid.EditorGridPanel({
							region: 'south',
							store: store,
							trackMouseOver: true,
							//表示单击一次可以编辑，默认是2次
							clicksToEdit : 1,

							columns: [
									{id:'ne01', header: "編號", width: 100, sortable: true, dataIndex: 'ne01'},
									{header: "標題", width: 100, sortable: true, dataIndex: 'ne02'},
									{header: "內容", width: 100, sortable: true, dataIndex: 'ne03'},
									{header: "圖片", width: 100, sortable: true, dataIndex: 'ne04'},
									{header: "上架時間", width: 100, sortable: true, dataIndex: 'ne05'},
									{header: "下架時間", width: 100, sortable: true, dataIndex: 'ne06'},
									{header: "帳號", width: 100, sortable: true, dataIndex: 'ma01'},
									{header: "最後更新時間", width: 150, sortable: true, dataIndex: 'lasttime'},
									{
											xtype: 'actioncolumn',
											width: 50,
											items: [{
													icon   : '../LibExt/examples/shared/icons/fam/delete.gif',  // Use a URL in the icon config
													tooltip: '刪除此筆資料',
													handler: function(grid, rowIndex, colIndex) {
															var rec = store.getAt(rowIndex);
															//alert("Sell " + rec.get('ma01'));
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'SYS/SYS0301_Delete.php?ne01=' + rec.get('ne01'),
																	method:'get',
																	success:function(response, opts){
																			Ext.Msg.alert("警告", "資料已刪除成功！", function(){
																			});
																			Ext.Ajax.request({                            //读取后台传递于前台数据
																					url: 'SYS/SYS0301_Sel.php',
																					method:'get',
																					success:function(response, opts){
																							var obj= Ext.decode(response.responseText);//obj储存响应的数据
																							store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																							store.load({params:{start:0,limit:10}});//按5条记录分布
																					},
																					failure: function(){Ext.Msg.alert("failure");}
																			});
																			grid.store.reload();
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
													}
											}]
									},
									{
											header: "更新", 
											xtype: 'actioncolumn',
											width: 50,
											items: [{
													icon   : '../LibExt/examples/shared/icons/fam/application_go.png',  // Use a URL in the icon config
													tooltip: '更新此筆資料',
													handler: function(grid, rowIndex, colIndex) {
															var rec = store.getAt(rowIndex);
															//alert("Sell " + rec.get('ma01'));
															formPanel.getForm().setValues({
																	'ne01': rec.get('ne01'), 
																	'ne02': rec.get('ne02'), 
																	'ne03': rec.get('ne03'), 
																	//'ne04': rec.get('ne04'), 
																	'ne05': Left(rec.get('ne05'),10), 
																	'ne06': Left(rec.get('ne06'),10)
															});
															Ext.getCmp('UpdateNews').enable();
															Ext.getCmp('InsertNews').disable();
															/*
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'SYS/SYS0201_Delete.php?ma01=' + rec.get('ma01'),
																	method:'get',
																	success:function(response, opts){
																			Ext.Msg.alert("警告", "資料已刪除成功！", function(){
																			});
																			Ext.Ajax.request({                            //读取后台传递于前台数据
																					url: 'SYS/SYS0201.php',
																					method:'get',
																					success:function(response, opts){
																							var obj= Ext.decode(response.responseText);//obj储存响应的数据
																							store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																							store.load({params:{start:0,limit:10}});//按5条记录分布
																					},
																					failure: function(){Ext.Msg.alert("failure");}
																			});
																			grid.store.reload();
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
															*/
													}
											}]
									}
							],
							stripeRows: true,
							autoExpandColumn: 'ne01',
							height:320,
							width:800,
							frame:true,

							tbar:new Ext.PagingToolbar({//工具栏
									pageSize:10,
									store:store,
									displayInfo:true,
									displayMsg:'From {0} To {1} Records, All Records Are {2} ',
									//displayMsg:'從 第{0}筆 到 第{1}筆, 總計 {2} 筆資料 ',
									emptyMsg:"no records",
									refreshText : "重新整理",
									doRefresh : function() {
											Ext.Ajax.request({                            //读取后台传递于前台数据
													url: 'SYS/SYS0301_Sel.php',
													method:'get',
													success:function(response, opts){
															var obj= Ext.decode(response.responseText);//obj储存响应的数据
															store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
															store.load({params:{start:0,limit:10}});//按5条记录分布
													},
													failure: function(){Ext.Msg.alert("failure");}
											});
											grid.store.reload();
									},
									handler : function() {
											Ext.getCmp('grid').getStore().reload(); 
									}
							})
					});

					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('SYS0301');
					if(!win){
							win = desktop.createWindow({
									id: 'SYS0301',
									title:src.text,
									width:810,
									//height:480,
									//html : '<p>尚未完成</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									items:[formPanel, grid]
							});
					}
					win.show();
			}

	});
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //********************************************************************************** ?>

<?php //*********************************活動訊息相關函數********************************* ?>
<?php
function ExtJsEveInfoPanle() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	MyDesktop.EveInfoMenuModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '活動訊息',
							iconCls: 'bogus',
							handler: function() {return false;},
							menu: {
									items:[
											{
													text: '活動訊息新增',
													iconCls:'bogus',
													handler : this.EVE0101,
													scope: this,
													windowId: 'EVE0101'
											},{
													text: '活動訊息維護',
													iconCls:'bogus',
													handler : this.EVE0201,
													scope: this,
													windowId: 'EVE0201'
											},{
													text: '報名管理',
													iconCls:'bogus',
													handler : this.EVE0301,
													scope: this,
													windowId: 'EVE0301'
											}
									]
							}
					}
			},

			EVE0101 : function(src){
					var combo_ev13=new Ext.form.ComboBox({
							id:'ev13_id',
							xtype: 'combo',
							width: 120,
							name: 'ev13',
							hiddenName: 'ev13',  
							allowBlank: false,
							value:          '0',
							blankText: '是否開放線上報名',
							store: [["0", "是否開放線上報名"], ["是", "是"], ["否", "否"]], //数据源为一数组[[value,text],[value,text],...]
							//fieldLabel: "線上報名",
							editable: false, //false则不可编辑，默认为true
							triggerAction: "all" //请设置为"all",否则默认为"query"的情况下，你选择某个值后，再此下拉时，只出现匹配选项，如果设为"all"的话，每次下拉均显示全部选项
					});

					var formPanel = new Ext.form.FormPanel({
							region: 'center',
							labelWidth: 100, // label settings here cascade unless overridden
							url:'index.php',
							tag: 'winlogin',
							fileUpload: true,
							frame:true,
							bodyStyle:'padding:5px 5px 0',
							defaults: {width: 550},
							defaultType: 'textfield',

							items: [
									{
											xtype : 'compositefield',
											fieldLabel: '標題',
											items: [{
															xtype: 'textfield',
															width: 100,
															name: 'ev02',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '交通'
													},{
															xtype: 'textfield',
															width: 100,
															name: 'ev08',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '名額'
													},{
															xtype: 'textfield',
															width: 100,
															name: 'ev09',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '費用'
													},{
															xtype: 'textfield',
															width: 100,
															name: 'ev10',
															allowBlank:true
													}
											]						
									},/*{
											fieldLabel: '標題',
											name: 'ev02',
											allowBlank:true
									},*/{
											fieldLabel: '景點介紹',
											name: 'ev03',
											xtype:'htmleditor',
											height:100,
											anchor:'98%',
											allowBlank:true
									},{
											xtype : 'compositefield',
											fieldLabel: '上傳圖檔1',
											items: [{
															xtype: 'textfield', 
															width: 140,
															name: 'ev04',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '上傳圖檔2'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ev05',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '上傳圖檔3'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ev06',
															inputType: 'file',
															allowBlank:true
													}
											]						
									}/*,{
											fieldLabel: '上傳圖檔1',
											width: 150,
											name: 'ev04',
											inputType: 'file',
											allowBlank:true
									},{
											fieldLabel: '上傳圖檔2',
											name: 'ev05',
											inputType: 'file',
											allowBlank:true
									},{
											fieldLabel: '上傳圖檔3',
											name: 'ev06',
											inputType: 'file',
											allowBlank:true
									},{
											fieldLabel: '活動日期',
											name: 'ev07',
											format: 'Y-m-d',
											xtype: 'datefield',
											allowBlank:true
									}*//*,{
											fieldLabel: '交通',
											name: 'ev08',
											allowBlank:true
									},{
											fieldLabel: '名額',
											name: 'ev09',
											allowBlank:true
									},{
											fieldLabel: '費用',
											name: 'ev10',
											allowBlank:true
									}*/,{
											fieldLabel: '行程及路線說明',
											name: 'ev11',
											xtype:'htmleditor',
											height:100,
											anchor:'98%',
											allowBlank:true
									},{
											fieldLabel: '報名方式',
											name: 'ev12',
											xtype:'htmleditor',
											height:100,
											anchor:'98%',
											allowBlank:true
									},{
											xtype : 'compositefield',
											fieldLabel: '活動日期',
											items: [{
															name: 'ev07',
															width: 100,
															format: 'Y-m-d',
															xtype: 'datefield',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '上架時間'
													},{
															name: 'ev17',
															width: 100,
															format: 'Y-m-d',
															xtype: 'datefield',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '下架時間'
													},{
															xtype: 'textfield', 
															name: 'ev18',
															width: 100,
															format: 'Y-m-d',
															xtype: 'datefield',
															allowBlank:true
													},combo_ev13
											]						
									},/*combo_ev13,*/{
											xtype : 'compositefield',
											fieldLabel: '銀行代號',
											items: [{
															xtype: 'textfield',
															width: 100,
															name: 'ev14',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '匯款帳號'
													},{
															xtype: 'textfield',
															width: 100,
															name: 'ev15',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '戶名'
													},{
															xtype: 'textfield',
															width: 100,
															name: 'ev16',
															allowBlank:true
													}
											]						
									}/*,{
											fieldLabel: '銀行代號',
											name: 'ev14',
											allowBlank:true
									},{
											fieldLabel: '匯款帳號',
											name: 'ev15',
											allowBlank:true
									},{
											fieldLabel: '戶名',
											name: 'ev16',
											allowBlank:true
									}*//*,{
											fieldLabel: '上架時間',
											name: 'ev17',
											format: 'Y-m-d',
											xtype: 'datefield',
											allowBlank:true
									},{
											fieldLabel: '下架時間',
											name: 'ev18',
											format: 'Y-m-d',
											xtype: 'datefield',
											allowBlank:true
									}*/
							],

							buttons: [{
									text: '新增',
									handler: function(){
											if (Trim(formPanel.getForm().findField("ev02").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '標題請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ev03").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '景點介紹請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ev07").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '活動日期請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ev08").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '交通請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ev09").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '名額請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ev10").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '費用請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ev11").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '行程及路線說明請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ev12").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '報名方式請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ev13").getValue())=="0")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '請選擇是否開放線上報名，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ev17").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '上架時間請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ev18").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '下架時間請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}

											formPanel.getForm().submit({
													url:'EVE/EVE0101.php', 
													waitMsg:'資料寫入中...', 
													success: function(form, action){
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入成功！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-info"
															});
															/*
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'EVE/EVE0101_Sel.php',
																	method:'get',
																	success:function(response, opts){
																			var obj= Ext.decode(response.responseText);//obj储存响应的数据
																			store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																			store.load({params:{start:0,limit:10}});//按5条记录分布
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
															*/
															formPanel.getForm().setValues({
																	'ev02': '',
																	'ev03': '',
																	'ev04': '',
																	'ev05': '',
																	'ev06': '',
																	'ev07': '',
																	'ev08': '',
																	'ev09': '',
																	'ev10': '',
																	'ev11': '',
																	'ev12': '',
																	'ev13': '0',
																	'ev14': '',
																	'ev15': '',
																	'ev16': '',
																	'ev17': '',
																	'ev18': ''
															});

															return false;
													},
													failure: function(form, action){
															//Ext.Msg.alert('failure','err');
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入失敗！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-error"
															});
															return false;
													}
											});

											//formPanel.form.submit();
											//win.hide();
									}
							},{
									text: '取消',
									handler: function(){
											win.close();
									}
							}]
					})
					
					/*
					Ext.override(Ext.PagingToolbar, {
							doRefresh: function(){
									delete this.store.lastParams;
									this.doLoad(this.cursor);    
							}
					});

					var store = new Ext.data.Store({
							autoLoad:true,
							proxy: new Ext.ux.data.PagingMemoryProxy([]),
							reader:new Ext.data.ArrayReader({},[        //读数组到一个元数据对象
									{name : 'ne01'}, 
									{name : 'ne02'}, 
									{name : 'ne03'}, 
									{name : 'ne04'}, 
									{name : 'ne05'}, 
									{name : 'ne06'}, 
									{name : 'ma01'}, 
									{name : 'lasttime'}
							])
					});

					Ext.Ajax.request({                            //读取后台传递于前台数据
							url: 'SYS/SYS0301_Sel.php',
							method:'get',
							success:function(response, opts){
									var obj= Ext.decode(response.responseText);//obj储存响应的数据
									store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
									store.load({params:{start:0,limit:10}});//按5条记录分布
							},
							failure: function(){Ext.Msg.alert("failure");}
					});

					// create the Grid
					//var grid = new Ext.grid.GridPanel({
					var grid = new Ext.grid.EditorGridPanel({
							region: 'south',
							store: store,
							trackMouseOver: true,
							//表示单击一次可以编辑，默认是2次
							clicksToEdit : 1,

							columns: [
									{id:'ne01', header: "編號", width: 100, sortable: true, dataIndex: 'ne01'},
									{header: "標題", width: 100, sortable: true, dataIndex: 'ne02'},
									{header: "內容", width: 100, sortable: true, dataIndex: 'ne03'},
									{header: "圖片", width: 100, sortable: true, dataIndex: 'ne04'},
									{header: "上架時間", width: 100, sortable: true, dataIndex: 'ne05'},
									{header: "下架時間", width: 100, sortable: true, dataIndex: 'ne06'},
									{header: "帳號", width: 100, sortable: true, dataIndex: 'ma01'},
									{header: "最後更新時間", width: 150, sortable: true, dataIndex: 'lasttime'},
									{
											xtype: 'actioncolumn',
											width: 50,
											items: [{
													icon   : '../LibExt/examples/shared/icons/fam/delete.gif',  // Use a URL in the icon config
													tooltip: '刪除此筆資料',
													handler: function(grid, rowIndex, colIndex) {
															var rec = store.getAt(rowIndex);
															//alert("Sell " + rec.get('ma01'));
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'SYS/SYS0301_Delete.php?ne01=' + rec.get('ne01'),
																	method:'get',
																	success:function(response, opts){
																			Ext.Msg.alert("警告", "資料已刪除成功！", function(){
																			});
																			Ext.Ajax.request({                            //读取后台传递于前台数据
																					url: 'SYS/SYS0301_Sel.php',
																					method:'get',
																					success:function(response, opts){
																							var obj= Ext.decode(response.responseText);//obj储存响应的数据
																							store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																							store.load({params:{start:0,limit:10}});//按5条记录分布
																					},
																					failure: function(){Ext.Msg.alert("failure");}
																			});
																			grid.store.reload();
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
													}
											}]
									}
							],
							stripeRows: true,
							autoExpandColumn: 'ne01',
							height:320,
							width:800,
							frame:true,

							tbar:new Ext.PagingToolbar({//工具栏
									pageSize:10,
									store:store,
									displayInfo:true,
									displayMsg:'From {0} To {1} Records, All Records Are {2} ',
									//displayMsg:'從 第{0}筆 到 第{1}筆, 總計 {2} 筆資料 ',
									emptyMsg:"no records",
									refreshText : "重新整理",
									doRefresh : function() {
											Ext.Ajax.request({                            //读取后台传递于前台数据
													url: 'SYS/SYS0301_Sel.php',
													method:'get',
													success:function(response, opts){
															var obj= Ext.decode(response.responseText);//obj储存响应的数据
															store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
															store.load({params:{start:0,limit:10}});//按5条记录分布
													},
													failure: function(){Ext.Msg.alert("failure");}
											});
											grid.store.reload();
									},
									handler : function() {
											Ext.getCmp('grid').getStore().reload(); 
									}
							})
					});
					*/

					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('EVE0101');
					if(!win){
							win = desktop.createWindow({
									id: 'EVE0101',
									title:src.text,
									width:700,
									//height:480,
									//html : '<p>尚未完成</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									//items:[formPanel, grid]
									items:formPanel
							});
					}
					win.show();
			},
			// ################### MODIFY BY DAVID ###################
			EVE0201 : function(src){					

					Ext.override(Ext.PagingToolbar, {
							doRefresh: function(){
									delete this.store.lastParams;
									this.doLoad(this.cursor);    
							}
					});

					var store = new Ext.data.Store({
							autoLoad:true,
							proxy: new Ext.ux.data.PagingMemoryProxy([]),
							reader:new Ext.data.ArrayReader({},[        //读数组到一个元数据对象
									{name : 'ev01'}, 
									{name : 'ev02'}, 
									{name : 'ev03'}, 
									{name : 'ev04'}, 
									{name : 'ev05'}, 
									{name : 'ev06'}, 
									{name : 'ev07'}, 
									{name : 'ev08'}, 
									{name : 'ev09'}, 
									{name : 'ev10'}, 
									{name : 'ev11'}, 
									{name : 'ev12'}, 
									{name : 'ev13'}, 
									{name : 'ev14'}, 
									{name : 'ev15'}, 
									{name : 'ev16'}, 
									{name : 'ev17'}, 
									{name : 'ev18'}, 
									{name : 'ma01'}, 
									{name : 'lasttime'}
							])
					});

					Ext.Ajax.request({                            //读取后台传递于前台数据
							url: 'EVE/EVE0201_Sel.php',
							method:'get',
							success:function(response, opts){
									var obj= Ext.decode(response.responseText);//obj储存响应的数据
									store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
									store.load({params:{start:0,limit:10}});//按5条记录分布
							},
							failure: function(){Ext.Msg.alert("failure");}
					});

					var grid = new Ext.grid.EditorGridPanel({
							region: 'south',
							store: store,
							trackMouseOver: true,
							//表示单击一次可以编辑，默认是2次
							clicksToEdit : 1,

							columns: [
									{id:'ev01', header: "編號", width: 100, sortable: true, dataIndex: 'ev01'},
									{header: "標題", width: 100, sortable: true, dataIndex: 'ev02'},
									{header: "景點介紹", width: 100, sortable: true, dataIndex: 'ev03'},
									{header: "上傳圖片1", width: 100, sortable: true, dataIndex: 'ev04'},
									{header: "上傳圖片2", width: 100, sortable: true, dataIndex: 'ev05'},
									{header: "上傳圖片3", width: 100, sortable: true, dataIndex: 'ev06'},
									{header: "活動日期        ", width: 100, sortable: true, dataIndex: 'ev07'},
									{header: "交通            ", width: 100, sortable: true, dataIndex: 'ev08'},
									{header: "名額            ", width: 100, sortable: true, dataIndex: 'ev09'},
									{header: "費用            ", width: 100, sortable: true, dataIndex: 'ev10'},
									{header: "行程及路線說明  ", width: 100, sortable: true, dataIndex: 'ev11'},
									{header: "報名方式        ", width: 100, sortable: true, dataIndex: 'ev12'},
									{header: "是否開放線上報名", width: 100, sortable: true, dataIndex: 'ev13'},
									{header: "銀行代號        ", width: 100, sortable: true, dataIndex: 'ev14'},
									{header: "匯款帳號        ", width: 100, sortable: true, dataIndex: 'ev15'},
									{header: "戶名            ", width: 100, sortable: true, dataIndex: 'ev16'},
									{header: "上架時間        ", width: 100, sortable: true, dataIndex: 'ev17'},
									{header: "下架時間        ", width: 100, sortable: true, dataIndex: 'ev18'},
									{header: "帳號", width: 100, sortable: true, dataIndex: 'ma01'},
									{header: "最後更新時間", width: 150, sortable: true, dataIndex: 'lasttime'},
									{
											xtype: 'actioncolumn',
											width: 50,
											items: [{
													icon   : '../LibExt/examples/shared/icons/fam/delete.gif',  // Use a URL in the icon config
													tooltip: '刪除此筆資料',
													handler: function(grid, rowIndex, colIndex) {
															var rec = store.getAt(rowIndex);
															//alert("Sell " + rec.get('ma01'));
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'EVE/EVE0201_Delete.php?ev01=' + rec.get('ev01'),
																	method:'get',
																	success:function(response, opts){
																			Ext.Msg.alert("警告", "資料已刪除成功！", function(){
																			});
																			Ext.Ajax.request({                            //读取后台传递于前台数据
																					url: 'EVE/EVE0201_Sel.php',
																					method:'get',
																					success:function(response, opts){
																							var obj= Ext.decode(response.responseText);//obj储存响应的数据
																							store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																							store.load({params:{start:0,limit:10}});//按5条记录分布
																					},
																					failure: function(){Ext.Msg.alert("failure");}
																			});
																			grid.store.reload();
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
													}
											}]
									},{
										header: "更新",
										xtype: 'actioncolumn',
										width: 30,
										items: [{
											icon: '../LibExt/examples/shared/icons/fam/application_go.png',  // Use a URL in the icon config
											tooltip: '更新此筆資料',
											handler: function(grid, rowIndex, colIndex) {

												var combo_ev13=new Ext.form.ComboBox({
														id:'ev13_id',
														xtype: 'combo',
														width: 120,
														name: 'ev13',
														hiddenName: 'ev13',  
														allowBlank: false,
														value:          '0',
														blankText: '是否開放線上報名',
														store: [["0", "是否開放線上報名"], ["是", "是"], ["否", "否"]], //数据源为一数组[[value,text],[value,text],...]
														//fieldLabel: "線上報名",
														editable: false, //false则不可编辑，默认为true
														triggerAction: "all" //请设置为"all",否则默认为"query"的情况下，你选择某个值后，再此下拉时，只出现匹配选项，如果设为"all"的话，每次下拉均显示全部选项
												});
													
												var rec = store.getAt(rowIndex);
												//alert(rec.get('Name'));

												Ext.Ajax.request({                            //读取后台传递于前台数据
													//url: 'SYS/SYS0101_GetData.aspx',
													url: 'EVE/EVE0101_GetData.php?ev01=' + escape(rec.get('ev01')),
													method: 'get',
													success: function(result, action) {
														/*if (Ext.util.JSON.decode(result.responseText).Status == "T") {
														statu.check = true;
														} else {
														statu.check = false;
														}*/
														formPanel.getForm().setValues({
															'ev01': Ext.util.JSON.decode(result.responseText).ev01,
															'ev02': Ext.util.JSON.decode(result.responseText).ev02,
															'ev03': Ext.util.JSON.decode(result.responseText).ev03,
															'ev07': Ext.util.JSON.decode(result.responseText).ev07,
															'ev08': Ext.util.JSON.decode(result.responseText).ev08,
															'ev09': Ext.util.JSON.decode(result.responseText).ev09,
															'ev10': Ext.util.JSON.decode(result.responseText).ev10,
															'ev11': Ext.util.JSON.decode(result.responseText).ev11,
															'ev12': Ext.util.JSON.decode(result.responseText).ev12,
															'ev13': Ext.util.JSON.decode(result.responseText).ev13,
															'ev14': Ext.util.JSON.decode(result.responseText).ev14,
															'ev15': Ext.util.JSON.decode(result.responseText).ev15,
															'ev16': Ext.util.JSON.decode(result.responseText).ev16,
															'ev17': Ext.util.JSON.decode(result.responseText).ev17,
															'ev18': Ext.util.JSON.decode(result.responseText).ev18
															
														});
													},
													failure: function() { Ext.Msg.alert("failure"); }
												});

												var formPanel = new Ext.form.FormPanel({
													labelWidth: 100, // label settings here cascade unless overridden
													url: 'index.php',
													tag: 'winlogin',
													frame: true,
													fileUpload: true,
													bodyStyle: 'padding:5px 5px 0',
													defaults: { width: 700 },
													defaultType: 'textfield',

													items: [
															{
																	xtype : 'compositefield',
																	fieldLabel: '標題',
																	items: [{
																					xtype: 'textfield',
																					width: 100,
																					name: 'ev02',
																					allowBlank:true
																			},{
																					xtype: 'displayfield',
																					value: '交通'
																			},{
																					xtype: 'textfield',
																					width: 100,
																					name: 'ev08',
																					allowBlank:true
																			},{
																					xtype: 'displayfield',
																					value: '名額'
																			},{
																					xtype: 'textfield',
																					width: 100,
																					name: 'ev09',
																					allowBlank:true
																			},{
																					xtype: 'displayfield',
																					value: '費用'
																			},{
																					xtype: 'textfield',
																					width: 100,
																					name: 'ev10',
																					allowBlank:true
																			}
																	]						
															},/*{
																	fieldLabel: '標題',
																	name: 'ev02',
																	allowBlank:true
															},*/{
																	fieldLabel: '景點介紹',
																	name: 'ev03',
																	xtype:'htmleditor',
																	height:100,
																	anchor:'98%',
																	allowBlank:true
															},{
																	xtype : 'compositefield',
																	fieldLabel: '上傳圖檔1',
																	items: [{
																					xtype: 'textfield', 
																					width: 140,
																					name: 'ev04',
																					inputType: 'file',
																					allowBlank:true
																			},{
																					xtype: 'displayfield',
																					value: '上傳圖檔2'
																			},{
																					xtype: 'textfield', 
																					width: 140,
																					name: 'ev05',
																					inputType: 'file',
																					allowBlank:true
																			},{
																					xtype: 'displayfield',
																					value: '上傳圖檔3'
																			},{
																					xtype: 'textfield', 
																					width: 140,
																					name: 'ev06',
																					inputType: 'file',
																					allowBlank:true
																			}
																	]						
															}/*,{
																	fieldLabel: '上傳圖檔1',
																	width: 150,
																	name: 'ev04',
																	inputType: 'file',
																	allowBlank:true
															},{
																	fieldLabel: '上傳圖檔2',
																	name: 'ev05',
																	inputType: 'file',
																	allowBlank:true
															},{
																	fieldLabel: '上傳圖檔3',
																	name: 'ev06',
																	inputType: 'file',
																	allowBlank:true
															},{
																	fieldLabel: '活動日期',
																	name: 'ev07',
																	format: 'Y-m-d',
																	xtype: 'datefield',
																	allowBlank:true
															}*//*,{
																	fieldLabel: '交通',
																	name: 'ev08',
																	allowBlank:true
															},{
																	fieldLabel: '名額',
																	name: 'ev09',
																	allowBlank:true
															},{
																	fieldLabel: '費用',
																	name: 'ev10',
																	allowBlank:true
															}*/,{
																	fieldLabel: '行程及路線說明',
																	name: 'ev11',
																	xtype:'htmleditor',
																	height:100,
																	anchor:'98%',
																	allowBlank:true
															},{
																	fieldLabel: '報名方式',
																	name: 'ev12',
																	xtype:'htmleditor',
																	height:100,
																	anchor:'98%',
																	allowBlank:true
															},{
																	name: 'ev01',
																	inputType: 'hidden',
																	allowBlank: true
															},{
																	xtype : 'compositefield',
																	fieldLabel: '活動日期',
																	items: [{
																					name: 'ev07',
																					width: 100,
																					format: 'Y-m-d',
																					xtype: 'datefield',
																					allowBlank:true
																			},{
																					xtype: 'displayfield',
																					value: '上架時間'
																			},{
																					name: 'ev17',
																					width: 100,
																					format: 'Y-m-d',
																					xtype: 'datefield',
																					allowBlank:true
																			},{
																					xtype: 'displayfield',
																					value: '下架時間'
																			},{
																					xtype: 'textfield', 
																					name: 'ev18',
																					width: 100,
																					format: 'Y-m-d',
																					xtype: 'datefield',
																					allowBlank:true
																			},combo_ev13
																	]						
															},/*combo_ev13,*/{
																	xtype : 'compositefield',
																	fieldLabel: '銀行代號',
																	items: [{
																					xtype: 'textfield',
																					width: 100,
																					name: 'ev14',
																					allowBlank:true
																			},{
																					xtype: 'displayfield',
																					value: '匯款帳號'
																			},{
																					xtype: 'textfield',
																					width: 100,
																					name: 'ev15',
																					allowBlank:true
																			},{
																					xtype: 'displayfield',
																					value: '戶名'
																			},{
																					xtype: 'textfield',
																					width: 100,
																					name: 'ev16',
																					allowBlank:true
																			}
																	]						
															}/*,{
																	fieldLabel: '銀行代號',
																	name: 'ev14',
																	allowBlank:true
															},{
																	fieldLabel: '匯款帳號',
																	name: 'ev15',
																	allowBlank:true
															},{
																	fieldLabel: '戶名',
																	name: 'ev16',
																	allowBlank:true
															}*//*,{
																	fieldLabel: '上架時間',
																	name: 'ev17',
																	format: 'Y-m-d',
																	xtype: 'datefield',
																	allowBlank:true
															},{
																	fieldLabel: '下架時間',
																	name: 'ev18',
																	format: 'Y-m-d',
																	xtype: 'datefield',
																	allowBlank:true
															}*/
													],

													buttons: [{
														text: '更新',
														handler: function() {
															if (Trim(formPanel.getForm().findField("ev02").getValue())=="")
															{
																	Ext.MessageBox.show({
																			title: '警告',
																			msg: '標題請勿空白，謝謝您！',
																			buttons: Ext.MessageBox.OK,
																			icon: "ext-mb-warning"
																	});
																	return false;
															}
															if (Trim(formPanel.getForm().findField("ev03").getValue())=="")
															{
																	Ext.MessageBox.show({
																			title: '警告',
																			msg: '景點介紹請勿空白，謝謝您！',
																			buttons: Ext.MessageBox.OK,
																			icon: "ext-mb-warning"
																	});
																	return false;
															}
															if (Trim(formPanel.getForm().findField("ev07").getValue())=="")
															{
																	Ext.MessageBox.show({
																			title: '警告',
																			msg: '活動日期請勿空白，謝謝您！',
																			buttons: Ext.MessageBox.OK,
																			icon: "ext-mb-warning"
																	});
																	return false;
															}
															if (Trim(formPanel.getForm().findField("ev08").getValue())=="")
															{
																	Ext.MessageBox.show({
																			title: '警告',
																			msg: '交通請勿空白，謝謝您！',
																			buttons: Ext.MessageBox.OK,
																			icon: "ext-mb-warning"
																	});
																	return false;
															}
															if (Trim(formPanel.getForm().findField("ev09").getValue())=="")
															{
																	Ext.MessageBox.show({
																			title: '警告',
																			msg: '名額請勿空白，謝謝您！',
																			buttons: Ext.MessageBox.OK,
																			icon: "ext-mb-warning"
																	});
																	return false;
															}
															if (Trim(formPanel.getForm().findField("ev10").getValue())=="")
															{
																	Ext.MessageBox.show({
																			title: '警告',
																			msg: '費用請勿空白，謝謝您！',
																			buttons: Ext.MessageBox.OK,
																			icon: "ext-mb-warning"
																	});
																	return false;
															}
															if (Trim(formPanel.getForm().findField("ev11").getValue())=="")
															{
																	Ext.MessageBox.show({
																			title: '警告',
																			msg: '行程及路線說明請勿空白，謝謝您！',
																			buttons: Ext.MessageBox.OK,
																			icon: "ext-mb-warning"
																	});
																	return false;
															}
															if (Trim(formPanel.getForm().findField("ev12").getValue())=="")
															{
																	Ext.MessageBox.show({
																			title: '警告',
																			msg: '報名方式請勿空白，謝謝您！',
																			buttons: Ext.MessageBox.OK,
																			icon: "ext-mb-warning"
																	});
																	return false;
															}
															if (Trim(formPanel.getForm().findField("ev13").getValue())=="0")
															{
																	Ext.MessageBox.show({
																			title: '警告',
																			msg: '請選擇是否開放線上報名，謝謝您！',
																			buttons: Ext.MessageBox.OK,
																			icon: "ext-mb-warning"
																	});
																	return false;
															}
															if (Trim(formPanel.getForm().findField("ev17").getValue())=="")
															{
																	Ext.MessageBox.show({
																			title: '警告',
																			msg: '上架時間請勿空白，謝謝您！',
																			buttons: Ext.MessageBox.OK,
																			icon: "ext-mb-warning"
																	});
																	return false;
															}
															if (Trim(formPanel.getForm().findField("ev18").getValue())=="")
															{
																	Ext.MessageBox.show({
																			title: '警告',
																			msg: '下架時間請勿空白，謝謝您！',
																			buttons: Ext.MessageBox.OK,
																			icon: "ext-mb-warning"
																	});
																	return false;
															}
															formPanel.getForm().submit({
																//url:'test.php', 
																url: 'EVE/EVE0101_Update.php',
																waitMsg: '資料寫入中...',
																success: function(form, action) {
																	//form.responseText; //返回的结果
																	Ext.MessageBox.show({
																		title: '執行狀態',
																		msg: '資料寫入成功！',
																		buttons: Ext.MessageBox.OK,
																		icon: "ext-mb-info"
																	});
																	Ext.Ajax.request({                            //读取后台传递于前台数据
																		url: 'EVE/EVE0201_Sel.php',
																		method: 'get',
																		success: function(response, opts) {
																			var obj = Ext.decode(response.responseText); //obj储存响应的数据
																			store.proxy = new Ext.ux.data.PagingMemoryProxy(obj); //PagingMemoryProxy() 一次性读取数据
																			store.load({ params: { start: 0, limit: 10} }); //按5条记录分布
																			win.close();
																		},
																		failure: function() { Ext.Msg.alert("failure"); }
																	});
																	
																},
																failure: function(form, action) {
																	Ext.MessageBox.show({
																		title: '執行狀態',
																		msg: '資料寫入失敗!地號重複!請輸入其他地號!',
																		buttons: Ext.MessageBox.OK,
																		icon: "ext-mb-error"
																	});
																	return false;
																}
															});
														}
													}, {
														text: '取消',
														handler: function() {
															win.close();
														}
											}]
													})
													var win = desktop.getWindow('ALB0102');
													if (!win) {
														win = desktop.createWindow({
															id: 'ALB0102',
															title: "更新活動訊息",
															width: 700,
															iconCls: 'bogus',
															shim: false,
															animCollapse: false,
															constrainHeader: true,
															items: formPanel
														});
													}
													win.show();
													//#########################################################################################################################              								      
												}
										}]
									}

							],
							stripeRows: true,
							autoExpandColumn: 'ev01',
							height:320,
							width:800,
							frame:true,

							tbar:new Ext.PagingToolbar({//工具栏
									pageSize:10,
									store:store,
									displayInfo:true,
									displayMsg:'From {0} To {1} Records, All Records Are {2} ',
									//displayMsg:'從 第{0}筆 到 第{1}筆, 總計 {2} 筆資料 ',
									emptyMsg:"no records",
									refreshText : "重新整理",
									doRefresh : function() {
											Ext.Ajax.request({                            //读取后台传递于前台数据
													url: 'EVE/EVE0201_Sel.php',
													method:'get',
													success:function(response, opts){
															var obj= Ext.decode(response.responseText);//obj储存响应的数据
															store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
															store.load({params:{start:0,limit:10}});//按5条记录分布
													},
													failure: function(){Ext.Msg.alert("failure");}
											});
											grid.store.reload();
									},
									handler : function() {
											Ext.getCmp('grid').getStore().reload(); 
									}
							})
					});

					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('EVE0201');
					if(!win){
							win = desktop.createWindow({
									id: 'EVE0201',
									title:src.text,
									width:810,
									//height:480,
									//html : '<p>尚未完成</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									//items:[formPanel, grid]
									items:grid
							});
					}
					win.show();
			},
			// #######################################################

			EVE0301 : function(src){					

					Ext.override(Ext.PagingToolbar, {
							doRefresh: function(){
									delete this.store.lastParams;
									this.doLoad(this.cursor);    
							}
					});

					var store = new Ext.data.Store({
							autoLoad:true,
							proxy: new Ext.ux.data.PagingMemoryProxy([]),
							reader:new Ext.data.ArrayReader({},[        //读数组到一个元数据对象
									{name : 'ev02'}, 
									{name : 'ev10'}, 
									{name : 'er02'}, 
									{name : 'er03'}, 
									{name : 'er04'}, 
									{name : 'er05'}
							])
					});

					Ext.Ajax.request({                            //读取后台传递于前台数据
							url: 'EVE/EVE0301_Sel.php',
							method:'get',
							success:function(response, opts){
									var obj= Ext.decode(response.responseText);//obj储存响应的数据
									store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
									store.load({params:{start:0,limit:10}});//按5条记录分布
							},
							failure: function(){Ext.Msg.alert("failure");}
					});

					var grid = new Ext.grid.EditorGridPanel({
							region: 'south',
							store: store,
							trackMouseOver: true,
							//表示单击一次可以编辑，默认是2次
							clicksToEdit : 1,

							columns: [
									{id:'ev02', header: "活動名稱", width: 100, sortable: true, dataIndex: 'ev02'},
									{header: "活動金額", width: 100, sortable: true, dataIndex: 'ev10'},
									{header: "姓名", width: 100, sortable: true, dataIndex: 'er02'},
									{header: "信箱", width: 100, sortable: true, dataIndex: 'er03'},
									{header: "手機", width: 100, sortable: true, dataIndex: 'er04'},
									{header: "帳號後五碼", width: 100, sortable: true, dataIndex: 'er05'}
							],
							stripeRows: true,
							autoExpandColumn: 'ev02',
							height:320,
							width:800,
							frame:true,

							tbar:new Ext.PagingToolbar({//工具栏
									pageSize:10,
									store:store,
									displayInfo:true,
									displayMsg:'From {0} To {1} Records, All Records Are {2} ',
									//displayMsg:'從 第{0}筆 到 第{1}筆, 總計 {2} 筆資料 ',
									emptyMsg:"no records",
									refreshText : "重新整理",
									doRefresh : function() {
											Ext.Ajax.request({                            //读取后台传递于前台数据
													url: 'EVE/EVE0301_Sel.php',
													method:'get',
													success:function(response, opts){
															var obj= Ext.decode(response.responseText);//obj储存响应的数据
															store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
															store.load({params:{start:0,limit:10}});//按5条记录分布
													},
													failure: function(){Ext.Msg.alert("failure");}
											});
											grid.store.reload();
									},
									handler : function() {
											Ext.getCmp('grid').getStore().reload(); 
									}
							})
					});

					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('EVE0301');
					if(!win){
							win = desktop.createWindow({
									id: 'EVE0301',
									title:src.text,
									width:810,
									//height:480,
									//html : '<p>尚未完成</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									//items:[formPanel, grid]
									items:grid
							});
					}
					win.show();
			}


	});
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //********************************************************************************** ?>

<?php //*********************************活動訊息相關函數********************************* ?>
<?php
function ExtJsPspInfoPanle() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	MyDesktop.PspInfoMenuModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '野遊勝地',
							iconCls: 'bogus',
							handler: function() {return false;},
							menu: {
									items:[
											{
													text: '野遊勝地管理',
													iconCls:'bogus',
													handler : this.PSP0101,
													scope: this,
													windowId: 'PSP0101'
											},{
													text: '野遊勝地討論管理',
													iconCls:'bogus',
													handler : this.PSP0201,
													scope: this,
													windowId: 'PSP0201'
											}
									]
							}
					}
			},

			PSP0101 : function(src){
					var formPanel = new Ext.form.FormPanel({
							region: 'center',
							labelWidth: 100, // label settings here cascade unless overridden
							url:'index.php',
							tag: 'winlogin',
							fileUpload: true,
							frame:true,
							bodyStyle:'padding:5px 5px 0',
							defaults: {width: 770},
							defaultType: 'textfield',

							items: [
									{
											fieldLabel: '標題',
											name: 'ps02',
											allowBlank:true
									},{
											fieldLabel: '景點介紹',
											name: 'ps03',
											xtype:'htmleditor',
											height:100,
											anchor:'98%',
											allowBlank:true
									},{
											xtype : 'compositefield',
											fieldLabel: '照片01',
											items: [{
															xtype: 'textfield', 
															width: 140,
															name: 'ps14',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片說明01'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps04',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片02'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps15',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片說明02'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps05',
															allowBlank:true
													}
											]						
									}/*,{
											xtype : 'compositefield',
											fieldLabel: '照片02',
											items: [{
															xtype: 'textfield', 
															width: 140,
															name: 'ps15',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片說明02'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps05',
															allowBlank:true
													}
											]						
									}*/,{
											xtype : 'compositefield',
											fieldLabel: '照片03',
											items: [{
															xtype: 'textfield', 
															width: 140,
															name: 'ps16',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片說明03'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps06',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片04'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps17',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片說明04'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps07',
															allowBlank:true
													}
											]						
									}/*,{
											xtype : 'compositefield',
											fieldLabel: '照片04',
											items: [{
															xtype: 'textfield', 
															width: 140,
															name: 'ps17',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片說明04'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps07',
															allowBlank:true
													}
											]						
									}*/,{
											xtype : 'compositefield',
											fieldLabel: '照片05',
											items: [{
															xtype: 'textfield', 
															width: 140,
															name: 'ps18',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片說明05'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps08',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片06'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps19',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片說明06'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps09',
															allowBlank:true
													}
											]						
									}/*,{
											xtype : 'compositefield',
											fieldLabel: '照片06',
											items: [{
															xtype: 'textfield', 
															width: 140,
															name: 'ps19',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片說明06'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps09',
															allowBlank:true
													}
											]						
									}*/,{
											xtype : 'compositefield',
											fieldLabel: '照片07',
											items: [{
															xtype: 'textfield', 
															width: 140,
															name: 'ps20',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片說明07'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps10',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片08'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps21',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片說明08'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps11',
															allowBlank:true
													}
											]						
									}/*,{
											xtype : 'compositefield',
											fieldLabel: '照片08',
											items: [{
															xtype: 'textfield', 
															width: 140,
															name: 'ps21',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片說明08'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps11',
															allowBlank:true
													}
											]						
									}*/,{
											xtype : 'compositefield',
											fieldLabel: '照片09',
											items: [{
															xtype: 'textfield', 
															width: 140,
															name: 'ps22',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片說明09'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps12',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片10'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps23',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片說明10'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps13',
															allowBlank:true
													}
											]						
									}/*,{
											xtype : 'compositefield',
											fieldLabel: '照片10',
											items: [{
															xtype: 'textfield', 
															width: 140,
															name: 'ps23',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '照片說明10'
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'ps13',
															allowBlank:true
													}
											]						
									}*/
							],

							buttons: [{
									text: '新增',
									handler: function(){
											if (Trim(formPanel.getForm().findField("ps02").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '標題請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("ps03").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '景點介紹請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}

											formPanel.getForm().submit({
													url:'PSP/PSP0101.php', 
													waitMsg:'資料寫入中...', 
													success: function(form, action){
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入成功！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-info"
															});
															
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'PSP/PSP0101_Sel.php',
																	method:'get',
																	success:function(response, opts){
																			var obj= Ext.decode(response.responseText);//obj储存响应的数据
																			store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																			store.load({params:{start:0,limit:10}});//按5条记录分布
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
															
															formPanel.getForm().setValues({
																	'ps02': '',
																	'ps03': '',
																	'ps04': '',
																	'ps05': '',
																	'ps06': '',
																	'ps07': '',
																	'ps08': '',
																	'ps09': '',
																	'ps10': '',
																	'ps11': '',
																	'ps12': '',
																	'ps13': '',
																	'ps14': '',
																	'ps15': '',
																	'ps16': '',
																	'ps17': '',
																	'ps18': '',
																	'ps19': '',
																	'ps20': '',
																	'ps21': '',
																	'ps22': '',
																	'ps23': ''
															});

															return false;
													},
													failure: function(form, action){
															//Ext.Msg.alert('failure','err');
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入失敗！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-error"
															});
															return false;
													}
											});

											//formPanel.form.submit();
											//win.hide();
									}
							},{
									text: '取消',
									handler: function(){
											win.close();
									}
							}]
					})
					
					
					Ext.override(Ext.PagingToolbar, {
							doRefresh: function(){
									delete this.store.lastParams;
									this.doLoad(this.cursor);    
							}
					});

					var store = new Ext.data.Store({
							autoLoad:true,
							proxy: new Ext.ux.data.PagingMemoryProxy([]),
							reader:new Ext.data.ArrayReader({},[        //读数组到一个元数据对象
									{name : 'ps01'}, 
									{name : 'ps02'}, 
									{name : 'ps03'}, 
									{name : 'ps04'}, 
									{name : 'ps05'}, 
									{name : 'ps06'}, 
									{name : 'ps07'}, 
									{name : 'ps08'}, 
									{name : 'ps09'}, 
									{name : 'ps10'}, 
									{name : 'ps11'}, 
									{name : 'ps12'}, 
									{name : 'ps13'}, 
									{name : 'ps14'}, 
									{name : 'ps15'}, 
									{name : 'ps16'}, 
									{name : 'ps17'}, 
									{name : 'ps18'}, 
									{name : 'ps19'}, 
									{name : 'ps20'}, 
									{name : 'ps21'}, 
									{name : 'ps22'}, 
									{name : 'ps23'}, 
									{name : 'ps24'}, 
									{name : 'ma01'}, 
									{name : 'lasttime'}
							])
					});

					Ext.Ajax.request({                            //读取后台传递于前台数据
							url: 'PSP/PSP0101_Sel.php',
							method:'get',
							success:function(response, opts){
									var obj= Ext.decode(response.responseText);//obj储存响应的数据
									store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
									store.load({params:{start:0,limit:10}});//按5条记录分布
							},
							failure: function(){Ext.Msg.alert("failure");}
					});

					// create the Grid
					//var grid = new Ext.grid.GridPanel({
					var grid = new Ext.grid.EditorGridPanel({
							region: 'south',
							store: store,
							trackMouseOver: true,
							//表示单击一次可以编辑，默认是2次
							clicksToEdit : 1,

							columns: [
									{id:'ps01', header: "編號", width: 100, sortable: true, dataIndex: 'ps01'},
									{header: "標題", width: 100, sortable: true, dataIndex: 'ps02'},
									{header: "景點介紹", width: 100, sortable: true, dataIndex: 'ps03'},
									{header: "照片說明01", width: 100, sortable: true, dataIndex: 'ps04'},
									{header: "照片說明02", width: 100, sortable: true, dataIndex: 'ps05'},
									{header: "照片說明03", width: 100, sortable: true, dataIndex: 'ps06'},
									{header: "照片說明04", width: 100, sortable: true, dataIndex: 'ps07'},
									{header: "照片說明05", width: 100, sortable: true, dataIndex: 'ps08'},
									{header: "照片說明06", width: 100, sortable: true, dataIndex: 'ps09'},
									{header: "照片說明07", width: 100, sortable: true, dataIndex: 'ps10'},
									{header: "照片說明08", width: 100, sortable: true, dataIndex: 'ps11'},
									{header: "照片說明09", width: 100, sortable: true, dataIndex: 'ps12'},
									{header: "照片說明10", width: 100, sortable: true, dataIndex: 'ps13'},
									{header: "照片01", width: 100, sortable: true, dataIndex: 'ps14'},
									{header: "照片02", width: 100, sortable: true, dataIndex: 'ps15'},
									{header: "照片03", width: 100, sortable: true, dataIndex: 'ps16'},
									{header: "照片04", width: 100, sortable: true, dataIndex: 'ps17'},
									{header: "照片05", width: 100, sortable: true, dataIndex: 'ps18'},
									{header: "照片06", width: 100, sortable: true, dataIndex: 'ps19'},
									{header: "照片07", width: 100, sortable: true, dataIndex: 'ps20'},
									{header: "照片08", width: 100, sortable: true, dataIndex: 'ps21'},
									{header: "照片09", width: 100, sortable: true, dataIndex: 'ps22'},
									{header: "照片10", width: 100, sortable: true, dataIndex: 'ps23'},
									{header: "觀看次數", width: 100, sortable: true, dataIndex: 'ps24'},
									{header: "帳號", width: 100, sortable: true, dataIndex: 'ma01'},
									{header: "最後更新時間", width: 150, sortable: true, dataIndex: 'lasttime'},
									{
											xtype: 'actioncolumn',
											width: 50,
											items: [{
													icon   : '../LibExt/examples/shared/icons/fam/delete.gif',  // Use a URL in the icon config
													tooltip: '刪除此筆資料',
													handler: function(grid, rowIndex, colIndex) {
															var rec = store.getAt(rowIndex);
															//alert("Sell " + rec.get('ma01'));
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'PSP/PSP0101_Delete.php?ps01=' + rec.get('ps01'),
																	method:'get',
																	success:function(response, opts){
																			Ext.Msg.alert("警告", "資料已刪除成功！", function(){
																			});
																			Ext.Ajax.request({                            //读取后台传递于前台数据
																					url: 'PSP/PSP0101_Sel.php',
																					method:'get',
																					success:function(response, opts){
																							var obj= Ext.decode(response.responseText);//obj储存响应的数据
																							store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																							store.load({params:{start:0,limit:10}});//按5条记录分布
																					},
																					failure: function(){Ext.Msg.alert("failure");}
																			});
																			grid.store.reload();
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
													}
											}]
									}
							],
							stripeRows: true,
							autoExpandColumn: 'ps01',
							height:320,
							width:900,
							frame:true,

							tbar:new Ext.PagingToolbar({//工具栏
									pageSize:10,
									store:store,
									displayInfo:true,
									displayMsg:'From {0} To {1} Records, All Records Are {2} ',
									//displayMsg:'從 第{0}筆 到 第{1}筆, 總計 {2} 筆資料 ',
									emptyMsg:"no records",
									refreshText : "重新整理",
									doRefresh : function() {
											Ext.Ajax.request({                            //读取后台传递于前台数据
													url: 'PSP/PSP0101_Sel.php',
													method:'get',
													success:function(response, opts){
															var obj= Ext.decode(response.responseText);//obj储存响应的数据
															store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
															store.load({params:{start:0,limit:10}});//按5条记录分布
													},
													failure: function(){Ext.Msg.alert("failure");}
											});
											grid.store.reload();
									},
									handler : function() {
											Ext.getCmp('grid').getStore().reload(); 
									}
							})
					});
					

					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('PSP0101');
					if(!win){
							win = desktop.createWindow({
									id: 'PSP0101',
									title:src.text,
									width:920,
									//height:480,
									//html : '<p>尚未完成</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									items:[formPanel, grid]
									//items:formPanel
							});
					}
					win.show();
			},

			PSP0201 : function(src){					

					Ext.override(Ext.PagingToolbar, {
							doRefresh: function(){
									delete this.store.lastParams;
									this.doLoad(this.cursor);    
							}
					});

					var store = new Ext.data.Store({
							autoLoad:true,
							proxy: new Ext.ux.data.PagingMemoryProxy([]),
							reader:new Ext.data.ArrayReader({},[        //读数组到一个元数据对象
									{name : 'psm01'}, 
									{name : 'ps02'}, 
									{name : 'psm02'}, 
									{name : 'psm03'}, 
									{name : 'me03'}, 
									{name : 'lasttime'}
							])
					});

					Ext.Ajax.request({                            //读取后台传递于前台数据
							url: 'PSP/PSP0201_Sel.php',
							method:'get',
							success:function(response, opts){
									var obj= Ext.decode(response.responseText);//obj储存响应的数据
									store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
									store.load({params:{start:0,limit:10}});//按5条记录分布
							},
							failure: function(){Ext.Msg.alert("failure");}
					});

					var grid = new Ext.grid.EditorGridPanel({
							region: 'south',
							store: store,
							trackMouseOver: true,
							//表示单击一次可以编辑，默认是2次
							clicksToEdit : 1,

							columns: [
									{id:'psm01', header: "編號", width: 100, sortable: true, dataIndex: 'psm01'},
									{header: "標題", width: 100, sortable: true, dataIndex: 'ps02'},
									{header: "留言主旨", width: 100, sortable: true, dataIndex: 'psm02'},
									{header: "留言內容", width: 100, sortable: true, dataIndex: 'psm03'},
									{header: "會員全名", width: 100, sortable: true, dataIndex: 'me03'},
									{header: "最後更新時間", width: 150, sortable: true, dataIndex: 'lasttime'},
									{
											xtype: 'actioncolumn',
											width: 50,
											items: [{
													icon   : '../LibExt/examples/shared/icons/fam/delete.gif',  // Use a URL in the icon config
													tooltip: '刪除此筆資料',
													handler: function(grid, rowIndex, colIndex) {
															var rec = store.getAt(rowIndex);
															//alert("Sell " + rec.get('ma01'));
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'PSP/PSP0201_Delete.php?psm01=' + rec.get('psm01'),
																	method:'get',
																	success:function(response, opts){
																			Ext.Msg.alert("警告", "資料已刪除成功！", function(){
																			});
																			Ext.Ajax.request({                            //读取后台传递于前台数据
																					url: 'PSP/PSP0201_Sel.php',
																					method:'get',
																					success:function(response, opts){
																							var obj= Ext.decode(response.responseText);//obj储存响应的数据
																							store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																							store.load({params:{start:0,limit:10}});//按5条记录分布
																					},
																					failure: function(){Ext.Msg.alert("failure");}
																			});
																			grid.store.reload();
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
													}
											}]
									}
							],
							stripeRows: true,
							autoExpandColumn: 'psm01',
							height:320,
							width:800,
							frame:true,

							tbar:new Ext.PagingToolbar({//工具栏
									pageSize:10,
									store:store,
									displayInfo:true,
									displayMsg:'From {0} To {1} Records, All Records Are {2} ',
									//displayMsg:'從 第{0}筆 到 第{1}筆, 總計 {2} 筆資料 ',
									emptyMsg:"no records",
									refreshText : "重新整理",
									doRefresh : function() {
											Ext.Ajax.request({                            //读取后台传递于前台数据
													url: 'PSP/PSP0201_Sel.php',
													method:'get',
													success:function(response, opts){
															var obj= Ext.decode(response.responseText);//obj储存响应的数据
															store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
															store.load({params:{start:0,limit:10}});//按5条记录分布
													},
													failure: function(){Ext.Msg.alert("failure");}
											});
											grid.store.reload();
									},
									handler : function() {
											Ext.getCmp('grid').getStore().reload(); 
									}
							})
					});

					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('PSP0201');
					if(!win){
							win = desktop.createWindow({
									id: 'PSP0201',
									title:src.text,
									width:810,
									//height:480,
									//html : '<p>尚未完成</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									//items:[formPanel, grid]
									items:grid
							});
					}
					win.show();
			},

			EVE0301 : function(src){					

					Ext.override(Ext.PagingToolbar, {
							doRefresh: function(){
									delete this.store.lastParams;
									this.doLoad(this.cursor);    
							}
					});

					var store = new Ext.data.Store({
							autoLoad:true,
							proxy: new Ext.ux.data.PagingMemoryProxy([]),
							reader:new Ext.data.ArrayReader({},[        //读数组到一个元数据对象
									{name : 'ev02'}, 
									{name : 'ev10'}, 
									{name : 'er02'}, 
									{name : 'er03'}, 
									{name : 'er04'}, 
									{name : 'er05'}
							])
					});

					Ext.Ajax.request({                            //读取后台传递于前台数据
							url: 'EVE/EVE0301_Sel.php',
							method:'get',
							success:function(response, opts){
									var obj= Ext.decode(response.responseText);//obj储存响应的数据
									store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
									store.load({params:{start:0,limit:10}});//按5条记录分布
							},
							failure: function(){Ext.Msg.alert("failure");}
					});

					var grid = new Ext.grid.EditorGridPanel({
							region: 'south',
							store: store,
							trackMouseOver: true,
							//表示单击一次可以编辑，默认是2次
							clicksToEdit : 1,

							columns: [
									{id:'ev02', header: "活動名稱", width: 100, sortable: true, dataIndex: 'ev02'},
									{header: "活動金額", width: 100, sortable: true, dataIndex: 'ev10'},
									{header: "姓名", width: 100, sortable: true, dataIndex: 'er02'},
									{header: "信箱", width: 100, sortable: true, dataIndex: 'er03'},
									{header: "手機", width: 100, sortable: true, dataIndex: 'er04'},
									{header: "帳號後五碼", width: 100, sortable: true, dataIndex: 'er05'}
							],
							stripeRows: true,
							autoExpandColumn: 'ev02',
							height:320,
							width:800,
							frame:true,

							tbar:new Ext.PagingToolbar({//工具栏
									pageSize:10,
									store:store,
									displayInfo:true,
									displayMsg:'From {0} To {1} Records, All Records Are {2} ',
									//displayMsg:'從 第{0}筆 到 第{1}筆, 總計 {2} 筆資料 ',
									emptyMsg:"no records",
									refreshText : "重新整理",
									doRefresh : function() {
											Ext.Ajax.request({                            //读取后台传递于前台数据
													url: 'EVE/EVE0301_Sel.php',
													method:'get',
													success:function(response, opts){
															var obj= Ext.decode(response.responseText);//obj储存响应的数据
															store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
															store.load({params:{start:0,limit:10}});//按5条记录分布
													},
													failure: function(){Ext.Msg.alert("failure");}
											});
											grid.store.reload();
									},
									handler : function() {
											Ext.getCmp('grid').getStore().reload(); 
									}
							})
					});

					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('EVE0301');
					if(!win){
							win = desktop.createWindow({
									id: 'EVE0301',
									title:src.text,
									width:810,
									//height:480,
									//html : '<p>尚未完成</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									//items:[formPanel, grid]
									items:grid
							});
					}
					win.show();
			}


	});
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //********************************************************************************** ?>

<?php //*********************************活動訊息相關函數********************************* ?>
<?php
function ExtJsBanInfoPanle() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	MyDesktop.BanInfoMenuModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '廣告管理',
							iconCls: 'bogus',
							handler: function() {return false;},
							menu: {
									items:[
											{
													text: '廣告管理',
													iconCls:'bogus',
													handler : this.BAN0101,
													scope: this,
													windowId: 'BAN0101'
											}
									]
							}
					}
			},

			BAN0101 : function(src){
					var combo_wb07=new Ext.form.ComboBox({
							id:'wb07_id',
							xtype: 'combo',
							name: 'wb07',
							hiddenName: 'wb07',  
							allowBlank: false,
							value:          '0',
							blankText: '請選擇位置',
							store: [["0", "請選擇位置"], ["首頁上方廣告", "首頁上方廣告"], ["左邊廣告", "左邊廣告"], ["野遊勝地上方廣告", "野遊勝地上方廣告"], ["熱門商品下方廣告", "熱門商品下方廣告"], ["最新商品下方廣告", "最新商品下方廣告"], ["會員中心下方廣告", "會員中心下方廣告"], ["客服中心下方廣告", "客服中心下方廣告"]], //数据源为一数组[[value,text],[value,text],...]
							fieldLabel: "加值功能",
							editable: false, //false则不可编辑，默认为true
							triggerAction: "all" //请设置为"all",否则默认为"query"的情况下，你选择某个值后，再此下拉时，只出现匹配选项，如果设为"all"的话，每次下拉均显示全部选项
					});

					var formPanel = new Ext.form.FormPanel({
							region: 'center',
							labelWidth: 100, // label settings here cascade unless overridden
							url:'index.php',
							tag: 'winlogin',
							fileUpload: true,
							frame:true,
							bodyStyle:'padding:5px 5px 0',
							defaults: {width: 770},
							defaultType: 'textfield',

							items: [
									{
											fieldLabel: '名稱',
											name: 'wb02',
											allowBlank:true
									},{
											fieldLabel: '圖檔',
											name: 'wb03',
											inputType: 'file',
											allowBlank:true
									},{
											fieldLabel: '連結網址',
											name: 'wb04',
											allowBlank:true
									},{
											fieldLabel: '上架時間',
											name: 'wb05',
											format: 'Y-m-d',
											xtype: 'datefield',
											allowBlank:true
									},{
											fieldLabel: '下架時間',
											name: 'wb06',
											format: 'Y-m-d',
											xtype: 'datefield',
											allowBlank:true
									},combo_wb07
							],

							buttons: [{
									text: '新增',
									handler: function(){
											if (Trim(formPanel.getForm().findField("wb02").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '名稱請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("wb03").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '圖檔請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("wb04").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '連結網址請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("wb05").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '上架時間請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("wb06").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '下架時間請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(combo_wb07.getValue())=="0")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '位置請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}

											formPanel.getForm().submit({
													url:'BAN/BAN0101.php', 
													waitMsg:'資料寫入中...', 
													success: function(form, action){
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入成功！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-info"
															});
															
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'BAN/BAN0101_Sel.php',
																	method:'get',
																	success:function(response, opts){
																			var obj= Ext.decode(response.responseText);//obj储存响应的数据
																			store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																			store.load({params:{start:0,limit:10}});//按5条记录分布
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
															
															formPanel.getForm().setValues({
																	'wb02': '',
																	'wb03': '',
																	'wb04': '',
																	'wb05': '',
																	'wb06': '',
																	'wb07': '0'
															});

															return false;
													},
													failure: function(form, action){
															//Ext.Msg.alert('failure','err');
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入失敗！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-error"
															});
															return false;
													}
											});

											//formPanel.form.submit();
											//win.hide();
									}
							},{
									text: '取消',
									handler: function(){
											win.close();
									}
							}]
					})
					
					
					Ext.override(Ext.PagingToolbar, {
							doRefresh: function(){
									delete this.store.lastParams;
									this.doLoad(this.cursor);    
							}
					});

					var store = new Ext.data.Store({
							autoLoad:true,
							proxy: new Ext.ux.data.PagingMemoryProxy([]),
							reader:new Ext.data.ArrayReader({},[        //读数组到一个元数据对象
									{name : 'wb01'}, 
									{name : 'wb02'}, 
									{name : 'wb03'}, 
									{name : 'wb04'}, 
									{name : 'wb05'}, 
									{name : 'wb06'}, 
									{name : 'wb07'}, 
									{name : 'ma01'}, 
									{name : 'lasttime'}
							])
					});

					Ext.Ajax.request({                            //读取后台传递于前台数据
							url: 'BAN/BAN0101_Sel.php',
							method:'get',
							success:function(response, opts){
									var obj= Ext.decode(response.responseText);//obj储存响应的数据
									store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
									store.load({params:{start:0,limit:10}});//按5条记录分布
							},
							failure: function(){Ext.Msg.alert("failure");}
					});

					// create the Grid
					//var grid = new Ext.grid.GridPanel({
					var grid = new Ext.grid.EditorGridPanel({
							region: 'south',
							store: store,
							trackMouseOver: true,
							//表示单击一次可以编辑，默认是2次
							clicksToEdit : 1,

							columns: [
									{id:'wb01', header: "編號", width: 100, sortable: true, dataIndex: 'wb01'},
									{header: "名稱", width: 100, sortable: true, dataIndex: 'wb02'},
									{header: "圖檔", width: 100, sortable: true, dataIndex: 'wb03'},
									{header: "連結網址", width: 100, sortable: true, dataIndex: 'wb04'},
									{header: "上架時間", width: 100, sortable: true, dataIndex: 'wb05'},
									{header: "下架時間", width: 100, sortable: true, dataIndex: 'wb06'},
									{header: "位置", width: 100, sortable: true, dataIndex: 'wb07'},
									{header: "帳號", width: 100, sortable: true, dataIndex: 'ma01'},
									{header: "最後更新時間", width: 150, sortable: true, dataIndex: 'lasttime'},
									{
											xtype: 'actioncolumn',
											width: 50,
											items: [{
													icon   : '../LibExt/examples/shared/icons/fam/delete.gif',  // Use a URL in the icon config
													tooltip: '刪除此筆資料',
													handler: function(grid, rowIndex, colIndex) {
															var rec = store.getAt(rowIndex);
															//alert("Sell " + rec.get('ma01'));
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'BAN/BAN0101_Delete.php?wb01=' + rec.get('wb01'),
																	method:'get',
																	success:function(response, opts){
																			Ext.Msg.alert("警告", "資料已刪除成功！", function(){
																			});
																			Ext.Ajax.request({                            //读取后台传递于前台数据
																					url: 'BAN/BAN0101_Sel.php',
																					method:'get',
																					success:function(response, opts){
																							var obj= Ext.decode(response.responseText);//obj储存响应的数据
																							store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																							store.load({params:{start:0,limit:10}});//按5条记录分布
																					},
																					failure: function(){Ext.Msg.alert("failure");}
																			});
																			grid.store.reload();
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
													}
											}]
									}
							],
							stripeRows: true,
							autoExpandColumn: 'wb01',
							height:320,
							width:900,
							frame:true,

							tbar:new Ext.PagingToolbar({//工具栏
									pageSize:10,
									store:store,
									displayInfo:true,
									displayMsg:'From {0} To {1} Records, All Records Are {2} ',
									//displayMsg:'從 第{0}筆 到 第{1}筆, 總計 {2} 筆資料 ',
									emptyMsg:"no records",
									refreshText : "重新整理",
									doRefresh : function() {
											Ext.Ajax.request({                            //读取后台传递于前台数据
													url: 'BAN/BAN0101_Sel.php',
													method:'get',
													success:function(response, opts){
															var obj= Ext.decode(response.responseText);//obj储存响应的数据
															store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
															store.load({params:{start:0,limit:10}});//按5条记录分布
													},
													failure: function(){Ext.Msg.alert("failure");}
											});
											grid.store.reload();
									},
									handler : function() {
											Ext.getCmp('grid').getStore().reload(); 
									}
							})
					});
					

					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('BAN0101');
					if(!win){
							win = desktop.createWindow({
									id: 'BAN0101',
									title:src.text,
									width:920,
									//height:480,
									//html : '<p>尚未完成</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									items:[formPanel, grid]
									//items:formPanel
							});
					}
					win.show();
			}

	});
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //********************************************************************************** ?>

<?php //*********************************活動訊息相關函數********************************* ?>
<?php
function ExtJsBuyInfoPanle() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	MyDesktop.BuyInfoMenuModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '購物中心',
							iconCls: 'bogus',
							handler: function() {return false;},
							menu: {
									items:[
											{
													text: '購物說明類別管理',
													iconCls:'bogus',
													handler : this.BUY0101,
													scope: this,
													windowId: 'BUY0101'
											},{
													text: '購物說明管理',
													iconCls:'bogus',
													handler : this.BUY0201,
													scope: this,
													windowId: 'BUY0201'
											}
									]
							}
					}
			},
			// #################### MODIFY BY DAVID ####################
			BUY0101 : function(src){
					var formPanel = new Ext.form.FormPanel({
							region: 'center',
							labelWidth: 100, // label settings here cascade unless overridden
							url:'index.php',
							tag: 'winlogin',
							fileUpload: true,
							frame:true,
							bodyStyle:'padding:5px 5px 0',
							defaults: {width: 770},
							defaultType: 'textfield',

							items: [
									{
											fieldLabel: '類別名稱',
											name: 'sdc02',
											allowBlank:true
									},{
											name: 'sdc01',
											inputType: 'hidden',
											allowBlank: true
									}
							],

							buttons: [{
									text: '新增',
									name: 'InsertBuy',
									id: 'InsertBuy',
									handler: function(){
											if (Trim(formPanel.getForm().findField("sdc02").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '類別名稱請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}

											formPanel.getForm().submit({
													url:'BUY/BUY0101.php', 
													waitMsg:'資料寫入中...', 
													success: function(form, action){
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入成功！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-info"
															});
															
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'BUY/BUY0101_Sel.php',
																	method:'get',
																	success:function(response, opts){
																			var obj= Ext.decode(response.responseText);//obj储存响应的数据
																			store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																			store.load({params:{start:0,limit:10}});//按5条记录分布
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
															
															formPanel.getForm().setValues({
																	'sdc02': ''
															});

															return false;
													},
													failure: function(form, action){
															//Ext.Msg.alert('failure','err');
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入失敗！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-error"
															});
															return false;
													}
											});

											//formPanel.form.submit();
											//win.hide();
									}
							},{
									text: '更新',
									name: 'UpdateBuy',
									id: 'UpdateBuy',
									disabled: true,
									handler: function(){
											//alert("new");
											if (Trim(formPanel.getForm().findField("sdc02").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '類別名稱請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											formPanel.getForm().submit({
													url:'BUY/BUY0101_Update.php', 
													waitMsg:'資料寫入中...', 
													success: function(form, action){
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料更新成功！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-info"
															});
															formPanel.getForm().setValues({
																	'sdc02': '', 
																	'sdc02': ''
															});
															Ext.getCmp('InsertBuy').enable();
															Ext.getCmp('UpdateBuy').disable();
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'BUY/BUY0101_Sel.php',
																	method:'get',
																	success:function(response, opts){
																			var obj= Ext.decode(response.responseText);//obj储存响应的数据
																			store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																			store.load({params:{start:0,limit:10}});//按5条记录分布
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});

															return false;
													},
													failure: function(form, action){
															//Ext.Msg.alert('failure','err');
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入失敗！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-error"
															});
															return false;
													}
											});

											//formPanel.form.submit();
											//win.hide();
									}
							},{
									text: '取消',
									handler: function(){
											win.close();
									}
							}]
					})
					
					
					Ext.override(Ext.PagingToolbar, {
							doRefresh: function(){
									delete this.store.lastParams;
									this.doLoad(this.cursor);    
							}
					});

					var store = new Ext.data.Store({
							autoLoad:true,
							proxy: new Ext.ux.data.PagingMemoryProxy([]),
							reader:new Ext.data.ArrayReader({},[        //读数组到一个元数据对象
									{name : 'sdc01'}, 
									{name : 'sdc02'}, 
									{name : 'ma01'}, 
									{name : 'lasttime'}
							])
					});

					Ext.Ajax.request({                            //读取后台传递于前台数据
							url: 'BUY/BUY0101_Sel.php',
							method:'get',
							success:function(response, opts){
									var obj= Ext.decode(response.responseText);//obj储存响应的数据
									store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
									store.load({params:{start:0,limit:10}});//按5条记录分布
							},
							failure: function(){Ext.Msg.alert("failure");}
					});

					// create the Grid
					//var grid = new Ext.grid.GridPanel({
					var grid = new Ext.grid.EditorGridPanel({
							region: 'south',
							store: store,
							trackMouseOver: true,
							//表示单击一次可以编辑，默认是2次
							clicksToEdit : 1,

							columns: [
									{id:'sdc01', header: "編號", width: 100, sortable: true, dataIndex: 'sdc01'},
									{header: "類別名稱", width: 100, sortable: true, dataIndex: 'sdc02'},
									{header: "帳號", width: 100, sortable: true, dataIndex: 'ma01'},
									{header: "最後更新時間", width: 150, sortable: true, dataIndex: 'lasttime'},
									{
											xtype: 'actioncolumn',
											width: 50,
											items: [{
													icon   : '../LibExt/examples/shared/icons/fam/delete.gif',  // Use a URL in the icon config
													tooltip: '刪除此筆資料',
													handler: function(grid, rowIndex, colIndex) {
															var rec = store.getAt(rowIndex);
															//alert("Sell " + rec.get('ma01'));
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'BUY/BUY0101_Delete.php?sdc01=' + rec.get('sdc01'),
																	method:'get',
																	success:function(response, opts){
																			Ext.Msg.alert("警告", "資料已刪除成功！", function(){
																			});
																			Ext.Ajax.request({                            //读取后台传递于前台数据
																					url: 'BUY/BUY0101_Sel.php',
																					method:'get',
																					success:function(response, opts){
																							var obj= Ext.decode(response.responseText);//obj储存响应的数据
																							store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																							store.load({params:{start:0,limit:10}});//按5条记录分布
																					},
																					failure: function(){Ext.Msg.alert("failure");}
																			});
																			grid.store.reload();
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
													}
											}]
									},
									{
											header: "更新", 
											xtype: 'actioncolumn',
											width: 50,
											items: [{
													icon   : '../LibExt/examples/shared/icons/fam/application_go.png',  // Use a URL in the icon config
													tooltip: '更新此筆資料',
													handler: function(grid, rowIndex, colIndex) {
															var rec = store.getAt(rowIndex);
															//alert("Sell " + rec.get('ma01'));
															formPanel.getForm().setValues({
																	'sdc01': rec.get('sdc01'), 
																	'sdc02': rec.get('sdc02')
															});
															Ext.getCmp('UpdateBuy').enable();
															Ext.getCmp('InsertBuy').disable();
															/*
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'SYS/SYS0201_Delete.php?ma01=' + rec.get('ma01'),
																	method:'get',
																	success:function(response, opts){
																			Ext.Msg.alert("警告", "資料已刪除成功！", function(){
																			});
																			Ext.Ajax.request({                            //读取后台传递于前台数据
																					url: 'SYS/SYS0201.php',
																					method:'get',
																					success:function(response, opts){
																							var obj= Ext.decode(response.responseText);//obj储存响应的数据
																							store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																							store.load({params:{start:0,limit:10}});//按5条记录分布
																					},
																					failure: function(){Ext.Msg.alert("failure");}
																			});
																			grid.store.reload();
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
															*/
													}
											}]
									}
							],
							stripeRows: true,
							autoExpandColumn: 'sdc01',
							height:320,
							width:900,
							frame:true,

							tbar:new Ext.PagingToolbar({//工具栏
									pageSize:10,
									store:store,
									displayInfo:true,
									displayMsg:'From {0} To {1} Records, All Records Are {2} ',
									//displayMsg:'從 第{0}筆 到 第{1}筆, 總計 {2} 筆資料 ',
									emptyMsg:"no records",
									refreshText : "重新整理",
									doRefresh : function() {
											Ext.Ajax.request({                            //读取后台传递于前台数据
													url: 'BUY/BUY0101_Sel.php',
													method:'get',
													success:function(response, opts){
															var obj= Ext.decode(response.responseText);//obj储存响应的数据
															store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
															store.load({params:{start:0,limit:10}});//按5条记录分布
													},
													failure: function(){Ext.Msg.alert("failure");}
											});
											grid.store.reload();
									},
									handler : function() {
											Ext.getCmp('grid').getStore().reload(); 
									}
							})
					});
					

					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('BUY0101');
					if(!win){
							win = desktop.createWindow({
									id: 'BUY0101',
									title:src.text,
									width:920,
									//height:480,
									//html : '<p>尚未完成</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									items:[formPanel, grid]
									//items:formPanel
							});
					}
					win.show();
			},
			// #########################################################

			// #################### MODIFY BY DAVID ####################
			BUY0201 : function(src){
					var Class_Buy = new Ext.data.Store({
						proxy: new Ext.data.HttpProxy({ url: 'BUY/BUY0201_Class.php' }),
						reader: new Ext.data.JsonReader({
							totalProperty: 'recordCount',
							root: 'rows'
						}, [{ name: 'text' }, { name: 'value'}])
					});

					var Combo_sdc01 = new Ext.form.ComboBox({
						id: 'sdc01_id',
						xtype: 'combo',
						name: 'sdc01_h',
						hiddenName: 'sdc01',
						allowBlank: false,
						value: '請選擇類別',
						blankText: '請選擇類別',
						displayField: 'text',
						valueField: 'value',
						store: Class_Buy,
						editable: false, //false则不可编辑，默认为true
						fieldLabel: "選擇類別",
						width: 120,
						triggerAction: "all",
						listeners: {
							select: function(combo, record, index) {
								formPanel.getForm().findField("sdc01_hh").setValue(combo.getValue());
							}
						}

					});
					
					/*
					var combo_wb07=new Ext.form.ComboBox({
							id:'wb07_id',
							xtype: 'combo',
							name: 'wb07',
							hiddenName: 'wb07',  
							allowBlank: false,
							value:          '0',
							blankText: '請選擇位置',
							store: [["0", "請選擇位置"], ["首頁上方廣告", "首頁上方廣告"], ["左邊廣告", "左邊廣告"], ["野遊勝地上方廣告", "野遊勝地上方廣告"], ["熱門商品下方廣告", "熱門商品下方廣告"], ["最新商品下方廣告", "最新商品下方廣告"], ["會員中心下方廣告", "會員中心下方廣告"], ["客服中心下方廣告", "客服中心下方廣告"]], //数据源为一数组[[value,text],[value,text],...]
							fieldLabel: "加值功能",
							editable: false, //false则不可编辑，默认为true
							triggerAction: "all" //请设置为"all",否则默认为"query"的情况下，你选择某个值后，再此下拉时，只出现匹配选项，如果设为"all"的话，每次下拉均显示全部选项
					});
					*/

					var formPanel = new Ext.form.FormPanel({
							region: 'center',
							labelWidth: 100, // label settings here cascade unless overridden
							url:'index.php',
							tag: 'winlogin',
							fileUpload: true,
							frame:true,
							bodyStyle:'padding:5px 5px 0',
							defaults: {width: 770},
							defaultType: 'textfield',

							items: [
									{
											fieldLabel: '標題',
											name: 'sd02',
											allowBlank:true
									},{
											fieldLabel: '內容',
											name: 'sd03',
											xtype:'htmleditor',
											height:100,
											anchor:'98%',
											allowBlank:true
									},Combo_sdc01,{
											name: 'sd01',
											inputType: 'hidden',
											allowBlank: true
									},{
											name: 'sdc01_hh',
											inputType: 'hidden',
											allowBlank: true
									}
							],

							buttons: [{
									text: '新增',
									name: 'InsertBuy2',
									id: 'InsertBuy2',
									handler: function(){
											if (Trim(formPanel.getForm().findField("sd02").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '標題請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("sd03").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '內容請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(Combo_sdc01.getValue())=="0")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '類別請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}

											formPanel.getForm().submit({
													url:'BUY/BUY0201.php', 
													waitMsg:'資料寫入中...', 
													success: function(form, action){
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入成功！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-info"
															});
															
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'BUY/BUY0201_Sel.php',
																	method:'get',
																	success:function(response, opts){
																			var obj= Ext.decode(response.responseText);//obj储存响应的数据
																			store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																			store.load({params:{start:0,limit:10}});//按5条记录分布
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
															
															formPanel.getForm().setValues({
																	'sd02': '',
																	'sd03': '',
																	'sdc01': '0'
															});

															return false;
													},
													failure: function(form, action){
															//Ext.Msg.alert('failure','err');
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入失敗！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-error"
															});
															return false;
													}
											});

											//formPanel.form.submit();
											//win.hide();
									}
							},{
									text: '更新',
									name: 'UpdateBuy2',
									id: 'UpdateBuy2',
									disabled: true,
									handler: function(){
											//alert("new");
											if (Trim(formPanel.getForm().findField("sd02").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '標題請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("sd03").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '內容請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(Combo_sdc01.getValue())=="0")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '類別請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											formPanel.getForm().submit({
													url:'BUY/BUY0201_Update.php', 
													waitMsg:'資料寫入中...', 
													success: function(form, action){
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料更新成功！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-info"
															});
															formPanel.getForm().setValues({
																	'sd01': '', 
																	'sd02': '', 
																	'sd03': ''
															});
															Ext.getCmp('InsertBuy2').enable();
															Ext.getCmp('UpdateBuy2').disable();
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'BUY/BUY0201_Sel.php',
																	method:'get',
																	success:function(response, opts){
																			var obj= Ext.decode(response.responseText);//obj储存响应的数据
																			store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																			store.load({params:{start:0,limit:10}});//按5条记录分布
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});

															return false;
													},
													failure: function(form, action){
															//Ext.Msg.alert('failure','err');
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入失敗！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-error"
															});
															return false;
													}
											});

											//formPanel.form.submit();
											//win.hide();
									}
							},{
									text: '取消',
									handler: function(){
											win.close();
									}
							}]
					})
					
					
					Ext.override(Ext.PagingToolbar, {
							doRefresh: function(){
									delete this.store.lastParams;
									this.doLoad(this.cursor);    
							}
					});

					var store = new Ext.data.Store({
							autoLoad:true,
							proxy: new Ext.ux.data.PagingMemoryProxy([]),
							reader:new Ext.data.ArrayReader({},[        //读数组到一个元数据对象
									{name : 'sd01'}, 
									{name : 'sd02'}, 
									{name : 'sd03'}, 
									{name : 'sdc02'}, 
									{name : 'ma01'}, 
									{name : 'lasttime'}
							])
					});
					

					Ext.Ajax.request({                            //读取后台传递于前台数据
							url: 'BUY/BUY0201_Sel.php',
							method:'get',
							success:function(response, opts){
									var obj= Ext.decode(response.responseText);//obj储存响应的数据
									store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
									store.load({params:{start:0,limit:10}});//按5条记录分布
							},
							failure: function(){Ext.Msg.alert("failure");}
					});

					// create the Grid
					//var grid = new Ext.grid.GridPanel({
					var grid = new Ext.grid.EditorGridPanel({
							region: 'south',
							store: store,
							trackMouseOver: true,
							//表示单击一次可以编辑，默认是2次
							clicksToEdit : 1,

							columns: [
									{id:'sd01', header: "編號", width: 100, sortable: true, dataIndex: 'sd01'},
									{header: "標題", width: 100, sortable: true, dataIndex: 'sd02'},
									{header: "內容", width: 100, sortable: true, dataIndex: 'sd03'},
									{header: "類別名稱", width: 100, sortable: true, dataIndex: 'sdc02'},
									{header: "帳號", width: 100, sortable: true, dataIndex: 'ma01'},
									{header: "最後更新時間", width: 150, sortable: true, dataIndex: 'lasttime'},
									{
											xtype: 'actioncolumn',
											width: 50,
											items: [{
													icon   : '../LibExt/examples/shared/icons/fam/delete.gif',  // Use a URL in the icon config
													tooltip: '刪除此筆資料',
													handler: function(grid, rowIndex, colIndex) {
															var rec = store.getAt(rowIndex);
															//alert("Sell " + rec.get('ma01'));
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'BUY/BUY0201_Delete.php?sd01=' + rec.get('sd01'),
																	method:'get',
																	success:function(response, opts){
																			Ext.Msg.alert("警告", "資料已刪除成功！", function(){
																			});
																			Ext.Ajax.request({                            //读取后台传递于前台数据
																					url: 'BUY/BUY0201_Sel.php',
																					method:'get',
																					success:function(response, opts){
																							var obj= Ext.decode(response.responseText);//obj储存响应的数据
																							store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																							store.load({params:{start:0,limit:10}});//按5条记录分布
																					},
																					failure: function(){Ext.Msg.alert("failure");}
																			});
																			grid.store.reload();
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
													}
											}]
									},
									{
											header: "更新", 
											xtype: 'actioncolumn',
											width: 50,
											items: [{
													icon   : '../LibExt/examples/shared/icons/fam/application_go.png',  // Use a URL in the icon config
													tooltip: '更新此筆資料',
													handler: function(grid, rowIndex, colIndex) {
															var rec = store.getAt(rowIndex);
															//alert("Sell " + rec.get('ma01'));
															formPanel.getForm().setValues({
																	'sd01': rec.get('sd01'), 
																	'sd02': rec.get('sd02'),
																	'sd03': rec.get('sd03')
															});
															formPanel.getForm().setValues({
																	'sdc01_id':rec.get('sdc02')
															});
															Ext.getCmp('UpdateBuy2').enable();
															Ext.getCmp('InsertBuy2').disable();
															/*
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'SYS/SYS0201_Delete.php?ma01=' + rec.get('ma01'),
																	method:'get',
																	success:function(response, opts){
																			Ext.Msg.alert("警告", "資料已刪除成功！", function(){
																			});
																			Ext.Ajax.request({                            //读取后台传递于前台数据
																					url: 'SYS/SYS0201.php',
																					method:'get',
																					success:function(response, opts){
																							var obj= Ext.decode(response.responseText);//obj储存响应的数据
																							store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																							store.load({params:{start:0,limit:10}});//按5条记录分布
																					},
																					failure: function(){Ext.Msg.alert("failure");}
																			});
																			grid.store.reload();
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
															*/
													}
											}]
									}
							],
							stripeRows: true,
							autoExpandColumn: 'sd01',
							height:320,
							width:900,
							frame:true,

							tbar:new Ext.PagingToolbar({//工具栏
									pageSize:10,
									store:store,
									displayInfo:true,
									displayMsg:'From {0} To {1} Records, All Records Are {2} ',
									//displayMsg:'從 第{0}筆 到 第{1}筆, 總計 {2} 筆資料 ',
									emptyMsg:"no records",
									refreshText : "重新整理",
									doRefresh : function() {
											Ext.Ajax.request({                            //读取后台传递于前台数据
													url: 'BUY/BUY0201_Sel.php',
													method:'get',
													success:function(response, opts){
															var obj= Ext.decode(response.responseText);//obj储存响应的数据
															store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
															store.load({params:{start:0,limit:10}});//按5条记录分布
													},
													failure: function(){Ext.Msg.alert("failure");}
											});
											grid.store.reload();
									},
									handler : function() {
											Ext.getCmp('grid').getStore().reload(); 
									}
							})
					});
					

					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('BUY0201');
					if(!win){
							win = desktop.createWindow({
									id: 'BUY0201',
									title:src.text,
									width:920,
									//height:480,
									//html : '<p>尚未完成</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									items:[formPanel, grid]
									//items:formPanel
							});
					}
					win.show();
			}
			// #########################################################
	});
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //********************************************************************************** ?>

<?php //*********************************活動訊息相關函數********************************* ?>
<?php
function ExtJsProInfoPanle() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	MyDesktop.ProInfoMenuModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '商品管理',
							iconCls: 'bogus',
							handler: function() {return false;},
							menu: {
									items:[
											{
													text: '商品資料新增',
													iconCls:'bogus',
													handler : this.PRO0101,
													scope: this,
													windowId: 'PRO0101'
											},{
													text: '代碼資料管理',
													iconCls:'bogus',
													handler : this.PRO0201,
													scope: this,
													windowId: 'PRO0201'
											},{
													text: '商品屬性類別管理',
													iconCls:'bogus',
													handler : this.PRO0301,
													scope: this,
													windowId: 'PRO0301'
											},{
													text: '商品資料維護',
													iconCls:'bogus',
													handler : this.PRO0401,
													scope: this,
													windowId: 'PRO0401'
											}
									]
							}
					}
			},

			PRO0101 : function(src){
					var combo_pi06=new Ext.form.ComboBox({
							id:'pi06_id',
							xtype: 'combo',
							width: 120,
							name: 'pi06',
							hiddenName: 'pi06',  
							allowBlank: false,
							value:          '0',
							blankText: '是否為促銷商品',
							store: [["0", "是否為促銷商品"], ["是", "是"], ["否", "否"]], //数据源为一数组[[value,text],[value,text],...]
							//fieldLabel: "線上報名",
							editable: false, //false则不可编辑，默认为true
							triggerAction: "all" //请设置为"all",否则默认为"query"的情况下，你选择某个值后，再此下拉时，只出现匹配选项，如果设为"all"的话，每次下拉均显示全部选项
					});

					var combo_pi07=new Ext.form.ComboBox({
							id:'pi07_id',
							xtype: 'combo',
							width: 120,
							name: 'pi07',
							hiddenName: 'pi07',  
							allowBlank: false,
							value:          '0',
							blankText: '是否為推薦商品',
							store: [["0", "是否為推薦商品"], ["是", "是"], ["否", "否"]], //数据源为一数组[[value,text],[value,text],...]
							//fieldLabel: "線上報名",
							editable: false, //false则不可编辑，默认为true
							triggerAction: "all" //请设置为"all",否则默认为"query"的情况下，你选择某个值后，再此下拉时，只出现匹配选项，如果设为"all"的话，每次下拉均显示全部选项
					});

					var Class_Prod_L01 = new Ext.data.Store({
							proxy: new Ext.data.HttpProxy({ url: 'PRO/PRO0101_Class.php' }),
							reader: new Ext.data.JsonReader({
									totalProperty: 'recordCount',
									root: 'rows'
							}, [{ name: 'text' }, { name: 'value'}])
					});

					var Combo_pr01_L01 = new Ext.form.ComboBox({
							id: 'pr01L01_id',
							xtype: 'combo',
							name: 'pr01L01_h',
							hiddenName: 'pr01L01_h',
							allowBlank: false,
							value: '請選擇產品類別',
							blankText: '請選擇產品類別',
							displayField: 'text',
							valueField: 'value',
							store: Class_Prod_L01,
							editable: false, //false则不可编辑，默认为true
							//fieldLabel: "選擇類別",
							width: 120,
							triggerAction: "all",
							listeners:{
									select:function(combo, record, index){
											/*
											alert("combo == ["+combo+"]");
											alert("record == ["+record+"]");
											alert("index == ["+index+"]");
											console.log("======================== combo start ========================");
											console.log(combo);
											console.log(combo.getValue());
											console.log("======================== combo end   ========================");
											*/

											Ext.getCmp('pr01L02_id').store.removeAll();
											Ext.getCmp('pr01L02_id').store.proxy.conn.url='PRO/PRO0101_Class_L02.php?pr01='+combo.getValue();
											Ext.getCmp('pr01L02_id').store.reload();
									}
							}
					});

					var Class_Prod_L02 = new Ext.data.Store({
							proxy: new Ext.data.HttpProxy({ url: 'PRO/PRO0101_Class_L02.php' }),
							reader: new Ext.data.JsonReader({
									totalProperty: 'recordCount',
									root: 'rows'
							}, [{ name: 'text' }, { name: 'value'}])
					});

					var Combo_pr01_L02 = new Ext.form.ComboBox({
							id: 'pr01L02_id',
							xtype: 'combo',
							name: 'pr01L02_h',
							hiddenName: 'pr01L02_h',
							allowBlank: false,
							value: '請選擇產品次類別',
							blankText: '請選擇產品次類別',
							displayField: 'text',
							valueField: 'value',
							store: Class_Prod_L02,
							editable: false, //false则不可编辑，默认为true
							//fieldLabel: "選擇類別",
							width: 120,
							triggerAction: "all",
							listeners:{
									select:function(combo, record, index){
											Ext.getCmp('pr01L03_id').store.removeAll();
											Ext.getCmp('pr01L03_id').store.proxy.conn.url='PRO/PRO0101_Class_L03.php?pr01='+combo.getValue();
											Ext.getCmp('pr01L03_id').store.reload();
									}
							}
					});

					var Class_Prod_L03 = new Ext.data.Store({
							proxy: new Ext.data.HttpProxy({ url: 'PRO/PRO0101_Class_L03.php' }),
							reader: new Ext.data.JsonReader({
									totalProperty: 'recordCount',
									root: 'rows'
							}, [{ name: 'text' }, { name: 'value'}])
					});

					var Combo_pr01_L03 = new Ext.form.ComboBox({
							id: 'pr01L03_id',
							xtype: 'combo',
							name: 'pr01L03_h',
							hiddenName: 'pr01L03_h',
							allowBlank: false,
							value: '請選擇產品次次類別',
							blankText: '請選擇產品次次類別',
							displayField: 'text',
							valueField: 'value',
							store: Class_Prod_L03,
							editable: false, //false则不可编辑，默认为true
							//fieldLabel: "選擇類別",
							width: 120,
							triggerAction: "all"
					});

					//####################### CheckBox Start #######################
					//var sCheckBoxData="";
					/*
					Ext.Ajax.request({                            //读取后台传递于前台数据
							url: 'PRO/PRO0101_GetData.php',
							method:'get',
							success:function(result, action){
									console.log("################# PRO0101_GetData.php start #################");
									//console.log("################# PRO0101_GetData.php end   #################");
									//sCheckBoxData=Ext.util.JSON.decode(result.responseText).CheckBoxData;
									
									sCheckBoxData=result.responseText;
									console.log(sCheckBoxData);

									//alert(sCheckBoxData);
									console.log("################# PRO0101_GetData.php end   #################");
							},
							failure: function(){Ext.Msg.alert("failure");}
					});
					*/

					

					//var
					/*
					function getCombData() { 
							//var data=<%=dataStr %>
							var data="";
							Ext.Ajax.request({                            //读取后台传递于前台数据
									url: 'PRO/PRO0101_GetData.php',
									method:'get',
									success:function(result, action){
											console.log("################# getCombData function start #################");
											//console.log("################# PRO0101_GetData.php end   #################");
											//sCheckBoxData=Ext.util.JSON.decode(result.responseText).CheckBoxData;
											
											data=result.responseText;
											console.log(data);

											formPanel_South.getForm().setValues({
													'pr04': Ext.util.JSON.decode(result.responseText).pr04,
													'pr05': Ext.util.JSON.decode(result.responseText).pr05
											});

											//alert(sCheckBoxData);
											console.log("################# getCombData function end   #################");
									},
									failure: function(){Ext.Msg.alert("failure");}
							});
							return data;
					}
					*/
					/*
					var comData=getCombData(); //取数据

					console.log("################# PRO0101_GetData.php out 1 start #################");
					console.log(comData);
					console.log("################# PRO0101_GetData.php out 1 end   #################");
					*/
					/*
					var comData=getCombData(); //取数据
					//var comData=sCheckBoxData; //取数据
					var columNum=3; //设置checkbox的列数,默认是3
					if(columNum<3)   //如果checkbox个数小于3时，列的长度设成checkbox个数
							 columNum=comData.length; 
					//体验范围数据
					//console.log(comData);
					//console.log(columNum);
					*/
					var itemsGroup = new Ext.form.CheckboxGroup({ 
							xtype:'checkboxgroup',
							fieldLabel:'顏色',
							name:'pi13',
							width:360,
							columns:5,
							//items:comData
							items:[
									<?php
									$sDataColor="";
									$sSQL="select * from datacode where dc03='顏色' and (1=1);";
									$rRs=GetRs($sSQL);

									while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
										$sDataColor=$sDataColor."{boxLabel: '".$row["dc02"]."', name: 'pi13[]',inputValue:'".$row["dc01"]."',anchor:'100%'},";
									}
									mysql_free_result($rRs);
									if ($sDataColor!="") {
										$sDataColor=Left($sDataColor, Len($sDataColor)-1);
										echo $sDataColor;
									}
									?>
							]
					});

					var itemsGroup2 = new Ext.form.CheckboxGroup({ 
							xtype:'checkboxgroup',
							fieldLabel:'尺寸',
							name:'pi14',
							width:360,
							columns:5,
							//items:comData
							items:[
									<?php
									$sDataColor="";
									$sSQL="select * from datacode where dc03='尺寸' and (1=1);";
									$rRs=GetRs($sSQL);

									while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
										$sDataColor=$sDataColor."{boxLabel: '".$row["dc02"]."', name: 'pi14[]',inputValue:'".$row["dc01"]."',anchor:'100%'},";
									}
									mysql_free_result($rRs);
									if ($sDataColor!="") {
										$sDataColor=Left($sDataColor, Len($sDataColor)-1);
										echo $sDataColor;
									}
									?>
							]
					});
					
					//####################### CheckBox End   #######################

					var formPanel = new Ext.form.FormPanel({
							region: 'center',
							labelWidth: 100, // label settings here cascade unless overridden
							url:'index.php',
							tag: 'winlogin',
							fileUpload: true,
							frame:true,
							bodyStyle:'padding:5px 5px 0',
							defaults: {width: 770},
							defaultType: 'textfield',

							items: [
									{
											xtype : 'compositefield',
											fieldLabel: '商品名稱',
											items: [{
															xtype: 'textfield',
															width: 100,
															name: 'pi02',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '原價'
													},{
															xtype: 'textfield',
															width: 100,
															name: 'pi03',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '優惠價'
													},{
															xtype: 'textfield',
															width: 100,
															name: 'pi04',
															allowBlank:true
													},combo_pi06,combo_pi07
											]						
									},{
											fieldLabel: '商品說明',
											name: 'pi05',
											xtype:'htmleditor',
											height:100,
											anchor:'98%',
											allowBlank:true
									},{
											xtype : 'compositefield',
											fieldLabel: '上架時間',
											items: [{
															name: 'pi08',
															format: 'Y-m-d',
															xtype: 'datefield',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '下架時間'
													},{
															name: 'pi09',
															format: 'Y-m-d',
															xtype: 'datefield',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '材質'
													},{
															xtype: 'textfield',
															width: 100,
															name: 'pi10',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '填充物'
													},{
															xtype: 'textfield',
															width: 100,
															name: 'pi11',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '重量'
													},{
															xtype: 'textfield',
															width: 100,
															name: 'pi12',
															allowBlank:true
													}
											]						
									},{
											fieldLabel: '注意事項',
											name: 'pi15',
											xtype:'htmleditor',
											height:100,
											anchor:'98%',
											allowBlank:true
									},{
											xtype : 'compositefield',
											fieldLabel: '照片01～05',
											items: [{
															xtype: 'textfield', 
															width: 140,
															name: 'pi16',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'pi17',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'pi18',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'pi19',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'pi20',
															inputType: 'file',
															allowBlank:true
													}
											]						
									},{
											xtype : 'compositefield',
											fieldLabel: '照片06～10',
											items: [{
															xtype: 'textfield', 
															width: 140,
															name: 'pi21',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'pi22',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'pi23',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'pi24',
															inputType: 'file',
															allowBlank:true
													},{
															xtype: 'textfield', 
															width: 140,
															name: 'pi25',
															inputType: 'file',
															allowBlank:true
													}
											]						
									},{
											xtype : 'compositefield',
											fieldLabel: '補貨底數',
											items: [{
															xtype: 'textfield',
															width: 100,
															name: 'pi26',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '庫存量'
													},{
															xtype: 'textfield',
															width: 100,
															name: 'pi27',
															allowBlank:true
													},{
															xtype: 'displayfield',
															value: '商品類別'
													},Combo_pr01_L01,Combo_pr01_L02,Combo_pr01_L03
											]						
									},itemsGroup,itemsGroup2
							],

							buttons: [{
									text: '新增',
									handler: function(){
											if (Trim(formPanel.getForm().findField("pi02").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '商品名稱請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("pi03").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '原價請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("pi04").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '優惠價請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("pi05").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '商品說明請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(combo_pi06.getValue())=="0")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '請選擇是否為促銷商品，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(combo_pi07.getValue())=="0")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '請選擇是否為推薦商品，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("pi08").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '上架時間請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("pi09").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '下架時間請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("pi10").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '材質請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("pi11").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '填充物請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("pi12").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '重量請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("pi15").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '注意事項請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}


											formPanel.getForm().submit({
													url:'PRO/PRO0101.php', 
													waitMsg:'資料寫入中...', 
													success: function(form, action){
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入成功！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-info"
															});
															
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'PRO/PRO0201_Sel.php',
																	method:'get',
																	success:function(response, opts){
																			var obj= Ext.decode(response.responseText);//obj储存响应的数据
																			store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																			store.load({params:{start:0,limit:10}});//按5条记录分布
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
															
															formPanel.getForm().setValues({
																	'dc02': '',
																	'dc03': '0'
															});

															return false;
													},
													failure: function(form, action){
															//Ext.Msg.alert('failure','err');
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入失敗！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-error"
															});
															return false;
													}
											});

											//formPanel.form.submit();
											//win.hide();
									}
							},{
									text: '取消',
									handler: function(){
											win.close();
									}
							}]
					});

					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('PRO0101');
					if(!win){
							win = desktop.createWindow({
									id: 'PRO0101',
									title:src.text,
									width:920,
									//height:480,
									//html : '<p>尚未完成</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									//items:[formPanel, grid]
									items:formPanel
							});
					}
					win.show();

					//console.log("################# PRO0101_GetData.php out start #################");
					//console.log(comData);
					//console.log("################# PRO0101_GetData.php out end   #################");
			},

			PRO0201 : function(src){
					var combo_dc03=new Ext.form.ComboBox({
							id:'dc03_id',
							xtype: 'combo',
							name: 'dc03',
							hiddenName: 'dc03',  
							allowBlank: false,
							value:          '0',
							blankText: '請選擇代碼',
							store: [["0", "請選擇代碼"], ["顏色", "顏色"], ["尺寸", "尺寸"]], //数据源为一数组[[value,text],[value,text],...]
							fieldLabel: "選擇代碼",
							editable: false, //false则不可编辑，默认为true
							triggerAction: "all" //请设置为"all",否则默认为"query"的情况下，你选择某个值后，再此下拉时，只出现匹配选项，如果设为"all"的话，每次下拉均显示全部选项
					});

					var formPanel = new Ext.form.FormPanel({
							region: 'center',
							labelWidth: 100, // label settings here cascade unless overridden
							url:'index.php',
							tag: 'winlogin',
							fileUpload: true,
							frame:true,
							bodyStyle:'padding:5px 5px 0',
							defaults: {width: 770},
							defaultType: 'textfield',

							items: [
									{
											fieldLabel: '代碼名稱',
											name: 'dc02',
											allowBlank:true
									},combo_dc03
							],

							buttons: [{
									text: '新增',
									handler: function(){
											if (Trim(formPanel.getForm().findField("dc02").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '代碼名稱請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(combo_dc03.getValue())=="0")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '類別請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}

											formPanel.getForm().submit({
													url:'PRO/PRO0201.php', 
													waitMsg:'資料寫入中...', 
													success: function(form, action){
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入成功！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-info"
															});
															
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'PRO/PRO0201_Sel.php',
																	method:'get',
																	success:function(response, opts){
																			var obj= Ext.decode(response.responseText);//obj储存响应的数据
																			store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																			store.load({params:{start:0,limit:10}});//按5条记录分布
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
															
															formPanel.getForm().setValues({
																	'dc02': '',
																	'dc03': '0'
															});

															return false;
													},
													failure: function(form, action){
															//Ext.Msg.alert('failure','err');
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入失敗！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-error"
															});
															return false;
													}
											});

											//formPanel.form.submit();
											//win.hide();
									}
							},{
									text: '取消',
									handler: function(){
											win.close();
									}
							}]
					})
					
					
					Ext.override(Ext.PagingToolbar, {
							doRefresh: function(){
									delete this.store.lastParams;
									this.doLoad(this.cursor);    
							}
					});

					var store = new Ext.data.Store({
							autoLoad:true,
							proxy: new Ext.ux.data.PagingMemoryProxy([]),
							reader:new Ext.data.ArrayReader({},[        //读数组到一个元数据对象
									{name : 'dc01'}, 
									{name : 'dc02'}, 
									{name : 'dc03'}, 
									{name : 'ma01'}, 
									{name : 'lasttime'}
							])
					});

					Ext.Ajax.request({                            //读取后台传递于前台数据
							url: 'PRO/PRO0201_Sel.php',
							method:'get',
							success:function(response, opts){
									var obj= Ext.decode(response.responseText);//obj储存响应的数据
									store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
									store.load({params:{start:0,limit:10}});//按5条记录分布
							},
							failure: function(){Ext.Msg.alert("failure");}
					});

					// create the Grid
					//var grid = new Ext.grid.GridPanel({
					var grid = new Ext.grid.EditorGridPanel({
							region: 'south',
							store: store,
							trackMouseOver: true,
							//表示单击一次可以编辑，默认是2次
							clicksToEdit : 1,

							columns: [
									{id:'dc01', header: "編號", width: 100, sortable: true, dataIndex: 'dc01'},
									{header: "代碼名稱", width: 100, sortable: true, dataIndex: 'dc02'},
									{header: "代碼類別", width: 100, sortable: true, dataIndex: 'dc03'},
									{header: "帳號", width: 100, sortable: true, dataIndex: 'ma01'},
									{header: "最後更新時間", width: 150, sortable: true, dataIndex: 'lasttime'},
									{
											xtype: 'actioncolumn',
											width: 50,
											items: [{
													icon   : '../LibExt/examples/shared/icons/fam/delete.gif',  // Use a URL in the icon config
													tooltip: '刪除此筆資料',
													handler: function(grid, rowIndex, colIndex) {
															var rec = store.getAt(rowIndex);
															//alert("Sell " + rec.get('ma01'));
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'PRO/PRO0201_Delete.php?dc01=' + rec.get('dc01'),
																	method:'get',
																	success:function(response, opts){
																			Ext.Msg.alert("警告", "資料已刪除成功！", function(){
																			});
																			Ext.Ajax.request({                            //读取后台传递于前台数据
																					url: 'PRO/PRO0201_Sel.php',
																					method:'get',
																					success:function(response, opts){
																							var obj= Ext.decode(response.responseText);//obj储存响应的数据
																							store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																							store.load({params:{start:0,limit:10}});//按5条记录分布
																					},
																					failure: function(){Ext.Msg.alert("failure");}
																			});
																			grid.store.reload();
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
													}
											}]
									}
							],
							stripeRows: true,
							autoExpandColumn: 'dc01',
							height:320,
							width:900,
							frame:true,

							tbar:new Ext.PagingToolbar({//工具栏
									pageSize:10,
									store:store,
									displayInfo:true,
									displayMsg:'From {0} To {1} Records, All Records Are {2} ',
									//displayMsg:'從 第{0}筆 到 第{1}筆, 總計 {2} 筆資料 ',
									emptyMsg:"no records",
									refreshText : "重新整理",
									doRefresh : function() {
											Ext.Ajax.request({                            //读取后台传递于前台数据
													url: 'PRO/PRO0201_Sel.php',
													method:'get',
													success:function(response, opts){
															var obj= Ext.decode(response.responseText);//obj储存响应的数据
															store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
															store.load({params:{start:0,limit:10}});//按5条记录分布
													},
													failure: function(){Ext.Msg.alert("failure");}
											});
											grid.store.reload();
									},
									handler : function() {
											Ext.getCmp('grid').getStore().reload(); 
									}
							})
					});
					

					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('PRO0201');
					if(!win){
							win = desktop.createWindow({
									id: 'PRO0201',
									title:src.text,
									width:920,
									//height:480,
									//html : '<p>尚未完成</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									items:[formPanel, grid]
									//items:formPanel
							});
					}
					win.show();
			},

			PRO0301 : function(src){
					//############################# 2.3. 產業別管理	PRO0301 Start #############################
					//############# 建立表單 Start #############
					var ds_level_01 = new Ext.data.ArrayStore({
							url:'PRO/PRO0301.php?pr03=1',
							autoLoad:true,
							fields: ['value','text']
					});
					var ds_level_02 = new Ext.data.ArrayStore({
							url:'PRO/PRO0301.php?pr03=2',
							autoLoad:true,
							fields: ['value','text']
					});
					var ds_level_03 = new Ext.data.ArrayStore({
							url:'PRO/PRO0301.php?pr03=3',
							autoLoad:true,
							fields: ['value','text']
					});
					var ds_level_04 = new Ext.data.ArrayStore({
							url:'PRO/PRO0301.php?pr03=4',
							autoLoad:true,
							fields: ['value','text']
					});
					var ds_level_05 = new Ext.data.ArrayStore({
							url:'PRO/PRO0301.php?pr03=5',
							autoLoad:true,
							fields: ['value','text']
					});

					var formPanel_North = new Ext.form.FormPanel({
							labelWidth: 0, // label settings here cascade unless overridden
							hideLabels : true,
							height: 350,
							url:'index.php',
							tag: 'winlogin',
							frame:true,
							region: 'center',
							collapsible: true,
							title: '商品類別五階資料',
							bodyStyle:'padding:5px 5px 0',
							defaults: {width: 230},
							defaultType: 'textfield',

							items: [{
									xtype : 'compositefield',
									width: 1050,
									height: 350,
									items : [{
													legend: '第一階',
													xtype: 'multiselect',
													name: 'multiselect01',
													id: 'multiselect01',
													valueField : 'value',
													displayField : 'text',
													width: 200,
													height: 300,
													allowBlank:false,
													store: ds_level_01,
													listeners:{
															change:function(combo, record, index){
																	Ext.getCmp('multiselect02').store.removeAll();
																	Ext.getCmp('multiselect02').store.proxy.conn.url='PRO/PRO0301.php?pr03=2&pr04='+record;
																	Ext.getCmp('multiselect02').store.reload();

																	Ext.getCmp('multiselect03').store.removeAll();
																	Ext.getCmp('multiselect03').store.proxy.conn.url='PRO/PRO0301.php?pr03=3&pr04='+record;
																	Ext.getCmp('multiselect03').store.reload();

																	Ext.getCmp('multiselect04').store.removeAll();
																	Ext.getCmp('multiselect04').store.proxy.conn.url='PRO/PRO0301.php?pr03=4&pr04='+record;
																	Ext.getCmp('multiselect04').store.reload();

																	Ext.getCmp('multiselect05').store.removeAll();
																	Ext.getCmp('multiselect05').store.proxy.conn.url='PRO/PRO0301.php?pr03=5&pr04='+record;
																	Ext.getCmp('multiselect05').store.reload();

																	Ext.Ajax.request({                            //读取后台传递于前台数据
																			url: 'PRO/PRO0301_GetData.php?pr01='+record,
																			method:'get',
																			success:function(result, action){
																					formPanel_South.getForm().setValues({
																							'pr04': Ext.util.JSON.decode(result.responseText).pr04,
																							'pr05': Ext.util.JSON.decode(result.responseText).pr05
																					});
																			},
																			failure: function(){Ext.Msg.alert("failure");}
																	});

																	formPanel_South.getForm().setValues({
																			'pr01': record, 
																			'pr02': this.getText(),
																			'pr03': '1'
																	});

																	Ext.getCmp('NewChild').enable();
																	Ext.getCmp('UpdateData').enable();
																	Ext.getCmp('DeleteData').enable();
																	Ext.getCmp('MoveData').enable();
																	Ext.getCmp('NewData').disable();

															}
													}
											},{
													legend: '第二階',
													xtype: 'multiselect',
													name: 'multiselect02',
													id: 'multiselect02',
													valueField : 'value',
													displayField : 'text',
													width: 200,
													height: 300,
													allowBlank:false,
													store: ds_level_02,
													listeners:{
															change:function(combo, record, index){
																	Ext.getCmp('multiselect03').store.removeAll();
																	Ext.getCmp('multiselect03').store.proxy.conn.url='PRO/PRO0301_L02.php?pr03=3&pr04='+record;
																	Ext.getCmp('multiselect03').store.reload();

																	Ext.getCmp('multiselect04').store.removeAll();
																	Ext.getCmp('multiselect04').store.proxy.conn.url='PRO/PRO0301_L02.php?pr03=4&pr04='+record;
																	Ext.getCmp('multiselect04').store.reload();

																	Ext.getCmp('multiselect05').store.removeAll();
																	Ext.getCmp('multiselect05').store.proxy.conn.url='PRO/PRO0301_L02.php?pr03=5&pr04='+record;
																	Ext.getCmp('multiselect05').store.reload();

																	Ext.Ajax.request({                            //读取后台传递于前台数据
																			url: 'PRO/PRO0301_GetData.php?pr01='+record,
																			method:'get',
																			success:function(result, action){
																					formPanel_South.getForm().setValues({
																							'pr04': Ext.util.JSON.decode(result.responseText).pr04,
																							'pr05': Ext.util.JSON.decode(result.responseText).pr05
																					});
																			},
																			failure: function(){Ext.Msg.alert("failure");}
																	});

																	formPanel_South.getForm().setValues({
																			'pr01': record, 
																			'pr02': this.getText(),
																			'pr03': '2'
																	});

																	Ext.getCmp('NewChild').enable();
																	Ext.getCmp('UpdateData').enable();
																	Ext.getCmp('DeleteData').enable();
																	Ext.getCmp('MoveData').enable();
																	Ext.getCmp('NewData').disable();

															}
													}
											},{
													legend: '第三階',
													xtype: 'multiselect',
													name: 'multiselect03',
													id: 'multiselect03',
													valueField : 'value',
													displayField : 'text',
													width: 200,
													height: 300,
													allowBlank:false,
													store: ds_level_03,
													listeners:{
															change:function(combo, record, index){
																	Ext.getCmp('multiselect04').store.removeAll();
																	Ext.getCmp('multiselect04').store.proxy.conn.url='PRO/PRO0301_L03.php?pr03=4&pr04='+record;
																	Ext.getCmp('multiselect04').store.reload();

																	Ext.getCmp('multiselect05').store.removeAll();
																	Ext.getCmp('multiselect05').store.proxy.conn.url='PRO/PRO0301_L03.php?pr03=5&pr04='+record;
																	Ext.getCmp('multiselect05').store.reload();

																	Ext.Ajax.request({                            //读取后台传递于前台数据
																			url: 'PRO/PRO0301_GetData.php?pr01='+record,
																			method:'get',
																			success:function(result, action){
																					formPanel_South.getForm().setValues({
																							'pr04': Ext.util.JSON.decode(result.responseText).pr04,
																							'pr05': Ext.util.JSON.decode(result.responseText).pr05
																					});
																			},
																			failure: function(){Ext.Msg.alert("failure");}
																	});

																	formPanel_South.getForm().setValues({
																			'pr01': record, 
																			'pr02': this.getText(),
																			'pr03': '3'
																	});

																	Ext.getCmp('NewChild').enable();
																	Ext.getCmp('UpdateData').enable();
																	Ext.getCmp('DeleteData').enable();
																	Ext.getCmp('MoveData').enable();
																	Ext.getCmp('NewData').disable();
															}
													}
											},{
													legend: '第四階',
													xtype: 'multiselect',
													name: 'multiselect04',
													id: 'multiselect04',
													valueField : 'value',
													displayField : 'text',
													width: 200,
													height: 300,
													allowBlank:false,
													store: ds_level_04,
													listeners:{
															change:function(combo, record, index){
																	Ext.getCmp('multiselect05').store.removeAll();
																	Ext.getCmp('multiselect05').store.proxy.conn.url='PRO/PRO0301_L04.php?pr03=5&pr04='+record;
																	Ext.getCmp('multiselect05').store.reload();

																	Ext.Ajax.request({                            //读取后台传递于前台数据
																			url: 'PRO/PRO0301_GetData.php?pr01='+record,
																			method:'get',
																			success:function(result, action){
																					formPanel_South.getForm().setValues({
																							'pr04': Ext.util.JSON.decode(result.responseText).pr04,
																							'pr05': Ext.util.JSON.decode(result.responseText).pr05
																					});
																			},
																			failure: function(){Ext.Msg.alert("failure");}
																	});

																	formPanel_South.getForm().setValues({
																			'pr01': record, 
																			'pr02': this.getText(),
																			'pr03': '4'
																	});

																	Ext.getCmp('NewChild').enable();
																	Ext.getCmp('UpdateData').enable();
																	Ext.getCmp('DeleteData').enable();
																	Ext.getCmp('MoveData').enable();
																	Ext.getCmp('NewData').disable();
															}
													}
											},{
													legend: '第五階',
													xtype: 'multiselect',
													name: 'multiselect05',
													id: 'multiselect05',
													valueField : 'value',
													displayField : 'text',
													width: 200,
													height: 300,
													allowBlank:false,
													store: ds_level_05,
													listeners:{
															change:function(combo, record, index){
																	Ext.Ajax.request({                            //读取后台传递于前台数据
																			url: 'PRO/PRO0301_GetData.php?pr01='+record,
																			method:'get',
																			success:function(result, action){
																					formPanel_South.getForm().setValues({
																							'pr04': Ext.util.JSON.decode(result.responseText).pr04,
																							'pr05': Ext.util.JSON.decode(result.responseText).pr05
																					});
																			},
																			failure: function(){Ext.Msg.alert("failure");}
																	});

																	formPanel_South.getForm().setValues({
																			'pr01': record, 
																			'pr02': this.getText(),
																			'pr03': '5'
																	});

																	Ext.getCmp('NewChild').disable();
																	Ext.getCmp('UpdateData').enable();
																	Ext.getCmp('DeleteData').enable();
																	Ext.getCmp('MoveData').enable();
																	Ext.getCmp('NewData').disable();

															}
													}
											},{
													xtype: 'displayfield',
													value: '&nbsp;',
													height: 320
											}
									]								
							
							}],

							buttons: [{
									text: '新增根階',
									name: 'NewRoot',
									id: 'NewRoot',

									handler: function(){
											Ext.getCmp('NewData').enable();
											now=new Date;
											formPanel_South.getForm().setValues({
													'pr01': GetDateTime()+Right(now.getTime(), 3), 
													'pr02': '',
													'pr03': '1',
													'pr04': '',
													'pr05': '1'
											});
											Ext.getCmp('UpdateData').disable();
											Ext.getCmp('DeleteData').disable();
											Ext.getCmp('MoveData').disable();
									}
							},{
									text: '新增子階',
									disabled: true,
									name: 'NewChild',
									id: 'NewChild',
									handler: function(){
											Ext.getCmp('NewData').enable();
											now=new Date;
											formPanel_South.getForm().setValues({
													'pr01': GetDateTime()+Right(now.getTime(), 3), 
													'pr02': '',
													'pr03': SafeInt(formPanel_South.getForm().findField("pr03").getValue())+1,
													'pr04': formPanel_South.getForm().findField("pr01").getValue(),
													'pr05': '1'
											});
											Ext.getCmp('UpdateData').disable();
											Ext.getCmp('DeleteData').disable();
											Ext.getCmp('MoveData').disable();
									}
							}]
					})

					var formPanel_South = new Ext.form.FormPanel({
							labelWidth: 75, // label settings here cascade unless overridden
							url:'index.php',
							tag: 'winlogin',
							frame:true,
							region: 'south',
							split: true,
							collapsible: true,
							bodyStyle:'padding:5px 5px 0',
							defaults: {width: 900},
							defaultType: 'textfield',
							height: 210,
							title: '商品類別資料編輯',

							items: [{
											fieldLabel: '階層',
											name: 'pr03',
											readOnly:true, 
											allowBlank:true
									},{
											fieldLabel: '上層代號',
											name: 'pr04',
											readOnly:true, 
											allowBlank:true
									},{
											fieldLabel: '類別代號',
											name: 'pr01',
											readOnly:true, 
											allowBlank:true
									},{
											fieldLabel: '名稱',
											name: 'pr02',
											allowBlank:true
									},{
											fieldLabel: '排序',
											name: 'pr05',
											allowBlank:true
									}
							],

							buttons: [{
									text: '新增',
									name: 'NewData',
									id: 'NewData',
									disabled: true,
									handler: function(){
											if (Trim(formPanel_South.getForm().findField("pr02").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '類別名稱請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}

											formPanel_South.getForm().submit({
													url:'PRO/PRO0301_Add.php', 
													waitMsg:'資料寫入中...', 
													success: function(form, action){
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入成功！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-info"
															});
															formPanel_South.getForm().setValues({
																	'pr01': '', 
																	'pr02': '',
																	'pr03': '',
																	'pr04': '',
																	'pr05': ''
															});
															Ext.getCmp('NewData').disable();
															Ext.getCmp('NewChild').disable();
															Ext.getCmp('UpdateData').disable();
															Ext.getCmp('DeleteData').disable();
															Ext.getCmp('MoveData').disable();

															return false;
													},
													failure: function(form, action){
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入失敗！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-error"
															});
															return false;
													}
											});

									}
							},{
									text: '修改',
									name: 'UpdateData',
									id: 'UpdateData',
									disabled: true,
									handler: function(){
											if (Trim(formPanel_South.getForm().findField("pr02").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '類別名稱請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}

											formPanel_South.getForm().submit({
													url:'PRO/PRO0301_Upd.php', 
													waitMsg:'資料寫入中...', 
													success: function(form, action){
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料修改成功！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-info"
															});
															formPanel_South.getForm().setValues({
																	'pr01': '', 
																	'pr02': '',
																	'pr03': '',
																	'pr04': '',
																	'pr05': ''
															});
															Ext.getCmp('NewData').disable();
															Ext.getCmp('NewChild').disable();
															Ext.getCmp('UpdateData').disable();
															Ext.getCmp('DeleteData').disable();
															Ext.getCmp('MoveData').disable();

															return false;
													},
													failure: function(form, action){
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入失敗！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-error"
															});
															return false;
													}
											});
									}
							},{
									text: '刪除',
									name: 'DeleteData',
									id: 'DeleteData',
									disabled: true,
									handler: function(){
											if (Trim(formPanel_South.getForm().findField("pr02").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '類別名稱請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}

											formPanel_South.getForm().submit({
													url:'PRO/PRO0301_Del.php', 
													waitMsg:'資料刪除中...', 
													success: function(form, action){
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料刪除成功！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-info"
															});
															formPanel_South.getForm().setValues({
																	'pr01': '', 
																	'pr02': '',
																	'pr03': '',
																	'pr04': '',
																	'pr05': ''
															});
															Ext.getCmp('NewData').disable();
															Ext.getCmp('NewChild').disable();
															Ext.getCmp('UpdateData').disable();
															Ext.getCmp('DeleteData').disable();
															Ext.getCmp('MoveData').disable();

															Ext.getCmp('multiselect01').store.reload();
															Ext.getCmp('multiselect02').store.reload();
															Ext.getCmp('multiselect03').store.reload();
															Ext.getCmp('multiselect04').store.reload();
															Ext.getCmp('multiselect05').store.reload();

															return false;
													},
													failure: function(form, action){
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料刪除失敗！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-error"
															});
															return false;
													}
											});
									}
							},{
									text: '搬移',
									name: 'MoveData',
									id: 'MoveData',
									disabled: true,
									handler: function(){
											//################################# 整體搬移開始 #################################
											var ds_level_01_in = new Ext.data.ArrayStore({
													url:'PRO/PRO0301.php?pr03=1',
													autoLoad:true,
													fields: ['value','text']
											});
											var ds_level_02_in = new Ext.data.ArrayStore({
													url:'PRO/PRO0301.php?pr03=2',
													autoLoad:true,
													fields: ['value','text']
											});
											var ds_level_03_in = new Ext.data.ArrayStore({
													url:'PRO/PRO0301.php?pr03=3',
													autoLoad:true,
													fields: ['value','text']
											});
											var ds_level_04_in = new Ext.data.ArrayStore({
													url:'PRO/PRO0301.php?pr03=4',
													autoLoad:true,
													fields: ['value','text']
											});
											var ds_level_05_in = new Ext.data.ArrayStore({
													url:'PRO/PRO0301.php?pr03=5',
													autoLoad:true,
													fields: ['value','text']
											});

											var formPanel_in = new Ext.form.FormPanel({
													labelWidth: 0, // label settings here cascade unless overridden
													hideLabels : true,
													height: 300,
													url:'index.php',
													tag: 'winlogin',
													frame:true,
													region: 'center',
													collapsible: true,
													title: '來源：【第'+Trim(formPanel_South.getForm().findField("pr03").getValue())+'階-'+Trim(formPanel_South.getForm().findField("pr02").getValue())+'】｜請選擇搬移目的',
													bodyStyle:'padding:5px 5px 0',
													defaults: {width: 230},
													defaultType: 'textfield',

													items: [{
															xtype : 'compositefield',
															width: 1050,
															height: 250,
															items : [{
																			legend: '第一階',
																			xtype: 'multiselect',
																			name: 'multiselect01_in',
																			id: 'multiselect01_in',
																			valueField : 'value',
																			displayField : 'text',
																			width: 200,
																			height: 200,
																			allowBlank:true,
																			store: ds_level_01_in,
																			listeners:{
																					change:function(combo, record, index){
																							Ext.getCmp('multiselect02_in').store.removeAll();
																							Ext.getCmp('multiselect02_in').store.proxy.conn.url='PRO/PRO0301.php?pr03=2&pr04='+record;
																							Ext.getCmp('multiselect02_in').store.reload();

																							Ext.getCmp('multiselect03_in').store.removeAll();
																							Ext.getCmp('multiselect03_in').store.proxy.conn.url='PRO/PRO0301.php?pr03=3&pr04='+record;
																							Ext.getCmp('multiselect03_in').store.reload();

																							Ext.getCmp('multiselect04_in').store.removeAll();
																							Ext.getCmp('multiselect04_in').store.proxy.conn.url='PRO/PRO0301.php?pr03=4&pr04='+record;
																							Ext.getCmp('multiselect04_in').store.reload();

																							Ext.getCmp('multiselect05_in').store.removeAll();
																							Ext.getCmp('multiselect05_in').store.proxy.conn.url='PRO/PRO0301.php?pr03=5&pr04='+record;
																							Ext.getCmp('multiselect05_in').store.reload();

																							formPanel_in.getForm().setValues({
																									'TargetId': record
																							});
																					}
																			}
																	},{
																			legend: '第二階',
																			xtype: 'multiselect',
																			name: 'multiselect02_in',
																			id: 'multiselect02_in',
																			valueField : 'value',
																			displayField : 'text',
																			width: 200,
																			height: 200,
																			allowBlank:true,
																			store: ds_level_02_in,
																			listeners:{
																					change:function(combo, record, index){
																							Ext.getCmp('multiselect03_in').store.removeAll();
																							Ext.getCmp('multiselect03_in').store.proxy.conn.url='PRO/PRO0301_L02.php?pr03=3&pr04='+record;
																							Ext.getCmp('multiselect03_in').store.reload();

																							Ext.getCmp('multiselect04_in').store.removeAll();
																							Ext.getCmp('multiselect04_in').store.proxy.conn.url='PRO/PRO0301_L02.php?pr03=4&pr04='+record;
																							Ext.getCmp('multiselect04_in').store.reload();

																							Ext.getCmp('multiselect05_in').store.removeAll();
																							Ext.getCmp('multiselect05_in').store.proxy.conn.url='PRO/PRO0301_L02.php?pr03=5&pr04='+record;
																							Ext.getCmp('multiselect05_in').store.reload();

																							formPanel_in.getForm().setValues({
																									'TargetId': record
																							});
																					}
																			}
																	},{
																			legend: '第三階',
																			xtype: 'multiselect',
																			name: 'multiselect03_in',
																			id: 'multiselect03_in',
																			valueField : 'value',
																			displayField : 'text',
																			width: 200,
																			height: 200,
																			allowBlank:true,
																			store: ds_level_03_in,
																			listeners:{
																					change:function(combo, record, index){
																							Ext.getCmp('multiselect04_in').store.removeAll();
																							Ext.getCmp('multiselect04_in').store.proxy.conn.url='PRO/PRO0301_L03.php?pr03=4&pr04='+record;
																							Ext.getCmp('multiselect04_in').store.reload();

																							Ext.getCmp('multiselect05_in').store.removeAll();
																							Ext.getCmp('multiselect05_in').store.proxy.conn.url='PRO/PRO0301_L03.php?pr03=5&pr04='+record;
																							Ext.getCmp('multiselect05_in').store.reload();

																							formPanel_in.getForm().setValues({
																									'TargetId': record
																							});
																					}
																			}
																	},{
																			legend: '第四階',
																			xtype: 'multiselect',
																			name: 'multiselect04_in',
																			id: 'multiselect04_in',
																			valueField : 'value',
																			displayField : 'text',
																			width: 200,
																			height: 200,
																			allowBlank:true,
																			store: ds_level_04_in,
																			listeners:{
																					change:function(combo, record, index){
																							Ext.getCmp('multiselect05_in').store.removeAll();
																							Ext.getCmp('multiselect05_in').store.proxy.conn.url='PRO/PRO0301_L04.php?pr03=5&pr04='+record;
																							Ext.getCmp('multiselect05_in').store.reload();

																							formPanel_in.getForm().setValues({
																									'TargetId': record
																							});
																					}
																			}
																	},{
																			legend: '第五階',
																			xtype: 'multiselect',
																			name: 'multiselect05_in',
																			id: 'multiselect05_in',
																			valueField : 'value',
																			displayField : 'text',
																			width: 200,
																			height: 200,
																			allowBlank:true,
																			store: ds_level_05_in,
																			listeners:{
																					change:function(combo, record, index){
																							formPanel_in.getForm().setValues({
																									'TargetId': record
																							});
																					}
																			}
																	},{
																			xtype: 'displayfield',
																			value: '&nbsp;',
																			height: 220
																	}
															]								
													
													},{
															fieldLabel: '目的編號',
															name: 'TargetId',
															inputType: 'hidden',
															value: '',
															allowBlank:true
													}],

													buttons: [{
															text: '開始搬移',
															name: 'StartMoveData',
															id: 'StartMoveData',
															handler: function(){
																	formPanel_in.getForm().submit({
																			url:'PRO/PRO0301_Move.php?SourceId=' + Trim(formPanel_South.getForm().findField("pr01").getValue()) + '&TargetId=' + Trim(formPanel_in.getForm().findField("TargetId").getValue()), 
																			waitMsg:'資料搬移中...', 
																			success: function(form, action){
																					Ext.MessageBox.show({
																							title: '執行狀態',
																							msg: '資料寫入成功！',
																							buttons: Ext.MessageBox.OK,
																							icon: "ext-mb-info"
																					});

																					win_in.close();

																					return false;
																			},
																			failure: function(form, action){
																					var resultMessage = action.result.errorMessage;
																					Ext.MessageBox.show({
																							title: '執行狀態',
																							msg: '資料搬移失敗：'+resultMessage+'！',
																							buttons: Ext.MessageBox.OK,
																							icon: "ext-mb-error"
																					});

																					win_in.close();

																					return false;
																			}
																	});

															}
													},{
															text: '取消',
															handler: function(){
																	win_in.close();
															}
													}]
											})

											win_in = desktop.createWindow({
													id: 'PRO0301_MoveRoot',
													title:'階層搬移',
													width:1060,
													height:330,
													modal:        true,
													iconCls: 'bogus',
													shim:false,
													animCollapse:false,
													constrainHeader:true,
													items:formPanel_in
											});

											win_in.show();
											//################################# 整體搬移結束 #################################
									}
							},{
									text: '取消',
									handler: function(){
											win.close();
									}
							}]
					})
					//############# 建立表單 End   #############
					//############# 建立桌面視窗 Start #############
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('PRO0301');
					if(!win){
							win = desktop.createWindow({
									id: 'PRO0301',
									title:src.text,
									width:1060,
									height:650,
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true, 

									plain:true,
									layout: 'border',
									items: [formPanel_North, formPanel_South]
							});
					}
					win.show();
					//############# 建立桌面視窗 End   #############
					//############################# 2.3. 產業別管理	PRO0301 End   #############################
			},

			PRO0401 : function(src){
					//############################# 7.4. 商品資料維護	PRO0401	Start #############################
					//############# 建立桌面視窗 Start #############
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('PRO0401');
					if(!win){
							win = desktop.createWindow({
									id: 'PRO0401',
									title:src.text,
									width:1040,
									//height:650,
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true, 
									html:'<iframe title="商品資料維護" width="1024" height="400" src="PRO/PRO0401.php" frameborder="0" allowfullscreen scrolling="auto"></iframe>'
							});
					}
					win.show();
					//############# 建立桌面視窗 End   #############
					//############################# 7.4. 商品資料維護	PRO0401	End   #############################
			}

	});
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //********************************************************************************** ?>

<?php //*********************************活動訊息相關函數********************************* ?>
<?php
function ExtJsSerInfoPanle() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	MyDesktop.SerInfoMenuModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '客服中心',
							iconCls: 'bogus',
							handler: function() {return false;},
							menu: {
									items:[
											{
													text: '客服記錄管理',
													iconCls:'bogus',
													handler : this.SER0101,
													scope: this,
													windowId: 'SER0101'
											}
									]
							}
					}
			},

			SER0101 : function(src){					

					Ext.override(Ext.PagingToolbar, {
							doRefresh: function(){
									delete this.store.lastParams;
									this.doLoad(this.cursor);    
							}
					});

					var store = new Ext.data.Store({
							autoLoad:true,
							proxy: new Ext.ux.data.PagingMemoryProxy([]),
							reader:new Ext.data.ArrayReader({},[        //读数组到一个元数据对象
									{name : 'sr01'}, 
									{name : 'sr02'}, 
									{name : 'sr03'}, 
									{name : 'sr04'}, 
									{name : 'sr05'}, 
									{name : 'sr06'}, 
									//{name : 'sr07'}, 
									{name : 'me01'}, 
									{name : 'lasttime'}
							])
					});

					Ext.Ajax.request({                            //读取后台传递于前台数据
							url: 'SER/SER0101_Sel.php',
							method:'get',
							success:function(response, opts){
									var obj= Ext.decode(response.responseText);//obj储存响应的数据
									store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
									store.load({params:{start:0,limit:10}});//按5条记录分布
							},
							failure: function(){Ext.Msg.alert("failure");}
					});

					var grid = new Ext.grid.EditorGridPanel({
							region: 'south',
							store: store,
							trackMouseOver: true,
							//表示单击一次可以编辑，默认是2次
							clicksToEdit : 1,

							columns: [
									{id:'sr01', header: "編號", width: 100, sortable: true, dataIndex: 'sr01'},
									{header: "留言主旨", width: 100, sortable: true, dataIndex: 'sr02'},
									{header: "留言內容", width: 100, sortable: true, dataIndex: 'sr03'},
									{header: "是否刪除", width: 100, sortable: true, dataIndex: 'sr04'},
									{header: "留言類型", width: 100, sortable: true, dataIndex: 'sr05'},
									{header: "電子信箱", width: 100, sortable: true, dataIndex: 'sr06'},
									//{header: "姓名", width: 100, sortable: true, dataIndex: 'sr07'},
									{header: "會員帳號", width: 100, sortable: true, dataIndex: 'me01'},
									{header: "最後更新時間", width: 150, sortable: true, dataIndex: 'lasttime'},
									{
											xtype: 'actioncolumn',
											width: 50,
											items: [{
													icon   : '../LibExt/examples/shared/icons/fam/delete.gif',  // Use a URL in the icon config
													tooltip: '刪除此筆資料',
													handler: function(grid, rowIndex, colIndex) {
															var rec = store.getAt(rowIndex);
															//alert("Sell " + rec.get('ma01'));
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'SER/SER0101_Delete.php?sr01=' + rec.get('sr01'),
																	method:'get',
																	success:function(response, opts){
																			Ext.Msg.alert("警告", "資料已刪除成功！", function(){
																			});
																			Ext.Ajax.request({                            //读取后台传递于前台数据
																					url: 'SER/SER0101_Sel.php',
																					method:'get',
																					success:function(response, opts){
																							var obj= Ext.decode(response.responseText);//obj储存响应的数据
																							store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																							store.load({params:{start:0,limit:10}});//按5条记录分布
																					},
																					failure: function(){Ext.Msg.alert("failure");}
																			});
																			grid.store.reload();
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
													}
											}]
									}
							],
							stripeRows: true,
							autoExpandColumn: 'sr01',
							height:320,
							width:800,
							frame:true,

							tbar:new Ext.PagingToolbar({//工具栏
									pageSize:10,
									store:store,
									displayInfo:true,
									displayMsg:'From {0} To {1} Records, All Records Are {2} ',
									//displayMsg:'從 第{0}筆 到 第{1}筆, 總計 {2} 筆資料 ',
									emptyMsg:"no records",
									refreshText : "重新整理",
									doRefresh : function() {
											Ext.Ajax.request({                            //读取后台传递于前台数据
													url: 'SER/SER0101_Sel.php',
													method:'get',
													success:function(response, opts){
															var obj= Ext.decode(response.responseText);//obj储存响应的数据
															store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
															store.load({params:{start:0,limit:10}});//按5条记录分布
													},
													failure: function(){Ext.Msg.alert("failure");}
											});
											grid.store.reload();
									},
									handler : function() {
											Ext.getCmp('grid').getStore().reload(); 
									}
							})
					});

					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('SER0101');
					if(!win){
							win = desktop.createWindow({
									id: 'SER0101',
									title:src.text,
									width:810,
									//height:480,
									//html : '<p>尚未完成</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									//items:[formPanel, grid]
									items:grid
							});
					}
					win.show();
			}

	});
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //********************************************************************************** ?>

<?php //*********************************活動訊息相關函數********************************* ?>
<?php
function ExtJsGooInfoPanle() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	MyDesktop.GooInfoMenuModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '網友好評',
							iconCls: 'bogus',
							handler: function() {return false;},
							menu: {
									items:[
											{
													text: '網友好評管理',
													iconCls:'bogus',
													handler : this.GOO0101,
													scope: this,
													windowId: 'GOO0101'
											}
									]
							}
					}
			},

			GOO0101 : function(src){					

					Ext.override(Ext.PagingToolbar, {
							doRefresh: function(){
									delete this.store.lastParams;
									this.doLoad(this.cursor);    
							}
					});

					var store = new Ext.data.Store({
							autoLoad:true,
							proxy: new Ext.ux.data.PagingMemoryProxy([]),
							reader:new Ext.data.ArrayReader({},[        //读数组到一个元数据对象
									{name : 'mee01'}, 
									{name : 'mee02'}, 
									{name : 'mee03'}, 
									{name : 'mee04'}, 
									{name : 'mee05'}, 
									{name : 'me01'}, 
									{name : 'lasttime'}
							])
					});

					Ext.Ajax.request({                            //读取后台传递于前台数据
							url: 'GOO/GOO0101_Sel.php',
							method:'get',
							success:function(response, opts){
									var obj= Ext.decode(response.responseText);//obj储存响应的数据
									store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
									store.load({params:{start:0,limit:10}});//按5条记录分布
							},
							failure: function(){Ext.Msg.alert("failure");}
					});

					var grid = new Ext.grid.EditorGridPanel({
							region: 'south',
							store: store,
							trackMouseOver: true,
							//表示单击一次可以编辑，默认是2次
							clicksToEdit : 1,

							columns: [
									{id:'mee01', header: "編號", width: 100, sortable: true, dataIndex: 'mee01'},
									{header: "好評主旨", width: 100, sortable: true, dataIndex: 'mee02'},
									{header: "好評內容", width: 100, sortable: true, dataIndex: 'mee03'},
									{header: "是否刪除", width: 100, sortable: true, dataIndex: 'mee04'},
									{header: "是否可登好評", width: 100, sortable: true, dataIndex: 'mee05'},
									{header: "會員帳號", width: 100, sortable: true, dataIndex: 'me01'},
									{header: "最後更新時間", width: 150, sortable: true, dataIndex: 'lasttime'},
									{
											xtype: 'actioncolumn',
											width: 50,
											items: [{
													icon   : '../LibExt/examples/shared/icons/fam/delete.gif',  // Use a URL in the icon config
													tooltip: '刪除此筆資料',
													handler: function(grid, rowIndex, colIndex) {
															var rec = store.getAt(rowIndex);
															//alert("Sell " + rec.get('ma01'));
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'GOO/GOO0101_Delete.php?mee01=' + rec.get('mee01'),
																	method:'get',
																	success:function(response, opts){
																			Ext.Msg.alert("警告", "資料已刪除成功！", function(){
																			});
																			Ext.Ajax.request({                            //读取后台传递于前台数据
																					url: 'GOO/GOO0101_Sel.php',
																					method:'get',
																					success:function(response, opts){
																							var obj= Ext.decode(response.responseText);//obj储存响应的数据
																							store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																							store.load({params:{start:0,limit:10}});//按5条记录分布
																					},
																					failure: function(){Ext.Msg.alert("failure");}
																			});
																			grid.store.reload();
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
													}
											}]
									}
							],
							stripeRows: true,
							autoExpandColumn: 'mee01',
							height:320,
							width:800,
							frame:true,

							tbar:new Ext.PagingToolbar({//工具栏
									pageSize:10,
									store:store,
									displayInfo:true,
									displayMsg:'From {0} To {1} Records, All Records Are {2} ',
									//displayMsg:'從 第{0}筆 到 第{1}筆, 總計 {2} 筆資料 ',
									emptyMsg:"no records",
									refreshText : "重新整理",
									doRefresh : function() {
											Ext.Ajax.request({                            //读取后台传递于前台数据
													url: 'GOO/GOO0101_Sel.php',
													method:'get',
													success:function(response, opts){
															var obj= Ext.decode(response.responseText);//obj储存响应的数据
															store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
															store.load({params:{start:0,limit:10}});//按5条记录分布
													},
													failure: function(){Ext.Msg.alert("failure");}
											});
											grid.store.reload();
									},
									handler : function() {
											Ext.getCmp('grid').getStore().reload(); 
									}
							})
					});

					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('GOO0101');
					if(!win){
							win = desktop.createWindow({
									id: 'GOO0101',
									title:src.text,
									width:810,
									//height:480,
									//html : '<p>尚未完成</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									//items:[formPanel, grid]
									items:grid
							});
					}
					win.show();
			}

	});
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //********************************************************************************** ?>

<?php //*********************************活動訊息相關函數********************************* ?>
<?php
function ExtJsLocInfoPanle() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	MyDesktop.LocInfoMenuModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '門市據點',
							iconCls: 'bogus',
							handler: function() {return false;},
							menu: {
									items:[
											{
													text: '門市據點管理',
													iconCls:'bogus',
													handler : this.LOC0101,
													scope: this,
													windowId: 'LOC0101'
											}
									]
							}
					}
			},
			// ############################# modify by david #############################
			LOC0101 : function(src){
					var formPanel = new Ext.form.FormPanel({
							region: 'center',
							labelWidth: 100, // label settings here cascade unless overridden
							url:'index.php',
							tag: 'winlogin',
							fileUpload: true,
							frame:true,
							bodyStyle:'padding:5px 5px 0',
							defaults: {width: 770},
							defaultType: 'textfield',

							items: [
									{
											fieldLabel: '店名',
											name: 'sl02',
											allowBlank:true
									},{
											fieldLabel: '內容',
											name: 'sl03',
											xtype:'htmleditor',
											height:100,
											anchor:'98%',
											allowBlank:true
									},{
											fieldLabel: '圖檔',
											name: 'sl04',
											inputType: 'file',
											allowBlank:true
									},{
											name: 'sl01',
											inputType: 'hidden',
											allowBlank: true
									}
							],

							buttons: [{
									text: '新增',
									name: 'InsertStore',
									id: 'InsertStore',
									handler: function(){
											if (Trim(formPanel.getForm().findField("sl02").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '店名請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("sl03").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '內容請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("sl04").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '圖檔請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}

											formPanel.getForm().submit({
													url:'LOC/LOC0101.php', 
													waitMsg:'資料寫入中...', 
													success: function(form, action){
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入成功！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-info"
															});
															
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'LOC/LOC0101_Sel.php',
																	method:'get',
																	success:function(response, opts){
																			var obj= Ext.decode(response.responseText);//obj储存响应的数据
																			store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																			store.load({params:{start:0,limit:10}});//按5条记录分布
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
															
															formPanel.getForm().setValues({
																	'sl02': '',
																	'sl03': '',
																	'sl04': ''
															});

															return false;
													},
													failure: function(form, action){
															//Ext.Msg.alert('failure','err');
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入失敗！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-error"
															});
															return false;
													}
											});

											//formPanel.form.submit();
											//win.hide();
									}
							},{
									text: '更新',
									name: 'UpdateStore',
									id: 'UpdateStore',
									disabled: true,
									handler: function(){
											//alert("new");
											if (Trim(formPanel.getForm().findField("sl02").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '店名請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											if (Trim(formPanel.getForm().findField("sl03").getValue())=="")
											{
													Ext.MessageBox.show({
															title: '警告',
															msg: '內容請勿空白，謝謝您！',
															buttons: Ext.MessageBox.OK,
															icon: "ext-mb-warning"
													});
													return false;
											}
											formPanel.getForm().submit({
													url:'LOC/LOC0101_Update.php', 
													waitMsg:'資料寫入中...', 
													success: function(form, action){
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料更新成功！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-info"
															});
															formPanel.getForm().setValues({
																	'sl01': '', 
																	'sl02': '', 
																	'sl03': '', 
																	'sl04': ''
															});
															Ext.getCmp('InsertStore').enable();
															Ext.getCmp('UpdateStore').disable();
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'LOC/LOC0101_Sel.php',
																	method:'get',
																	success:function(response, opts){
																			var obj= Ext.decode(response.responseText);//obj储存响应的数据
																			store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																			store.load({params:{start:0,limit:10}});//按5条记录分布
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});

															return false;
													},
													failure: function(form, action){
															//Ext.Msg.alert('failure','err');
															//form.responseText; //返回的结果
															Ext.MessageBox.show({
																	title: '執行狀態',
																	msg: '資料寫入失敗！',
																	buttons: Ext.MessageBox.OK,
																	icon: "ext-mb-error"
															});
															return false;
													}
											});

											//formPanel.form.submit();
											//win.hide();
									}
							},{
									text: '取消',
									handler: function(){
											win.close();
									}
							}]
					})
					
					
					Ext.override(Ext.PagingToolbar, {
							doRefresh: function(){
									delete this.store.lastParams;
									this.doLoad(this.cursor);    
							}
					});

					var store = new Ext.data.Store({
							autoLoad:true,
							proxy: new Ext.ux.data.PagingMemoryProxy([]),
							reader:new Ext.data.ArrayReader({},[        //读数组到一个元数据对象
									{name : 'sl01'}, 
									{name : 'sl02'}, 
									{name : 'sl03'}, 
									{name : 'sl04'}, 
									{name : 'ma01'}, 
									{name : 'lasttime'}
							])
					});

					Ext.Ajax.request({                            //读取后台传递于前台数据
							url: 'LOC/LOC0101_Sel.php',
							method:'get',
							success:function(response, opts){
									var obj= Ext.decode(response.responseText);//obj储存响应的数据
									store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
									store.load({params:{start:0,limit:10}});//按5条记录分布
							},
							failure: function(){Ext.Msg.alert("failure");}
					});

					// create the Grid
					//var grid = new Ext.grid.GridPanel({
					var grid = new Ext.grid.EditorGridPanel({
							region: 'south',
							store: store,
							trackMouseOver: true,
							//表示单击一次可以编辑，默认是2次
							clicksToEdit : 1,

							columns: [
									{id:'sl01', header: "編號", width: 100, sortable: true, dataIndex: 'sl01'},
									{header: "店名", width: 100, sortable: true, dataIndex: 'sl02'},
									{header: "內容", width: 100, sortable: true, dataIndex: 'sl03'},
									{header: "照片", width: 100, sortable: true, dataIndex: 'sl04'},
									{header: "帳號", width: 100, sortable: true, dataIndex: 'ma01'},
									{header: "最後更新時間", width: 150, sortable: true, dataIndex: 'lasttime'},
									{		header: "刪除",
											xtype: 'actioncolumn',
											width: 50,
											items: [{
													icon   : '../LibExt/examples/shared/icons/fam/delete.gif',  // Use a URL in the icon config
													tooltip: '刪除此筆資料',
													handler: function(grid, rowIndex, colIndex) {
															var rec = store.getAt(rowIndex);
															//alert("Sell " + rec.get('ma01'));
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'LOC/LOC0101_Delete.php?sl01=' + rec.get('sl01'),
																	method:'get',
																	success:function(response, opts){
																			Ext.Msg.alert("警告", "資料已刪除成功！", function(){
																			});
																			Ext.Ajax.request({                            //读取后台传递于前台数据
																					url: 'LOC/LOC0101_Sel.php',
																					method:'get',
																					success:function(response, opts){
																							var obj= Ext.decode(response.responseText);//obj储存响应的数据
																							store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																							store.load({params:{start:0,limit:10}});//按5条记录分布
																					},
																					failure: function(){Ext.Msg.alert("failure");}
																			});
																			grid.store.reload();
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
													}
											}]
									},{
											header: "更新", 
											xtype: 'actioncolumn',
											width: 50,
											items: [{
													icon   : '../LibExt/examples/shared/icons/fam/application_go.png',  // Use a URL in the icon config
													tooltip: '更新此筆資料',
													handler: function(grid, rowIndex, colIndex) {
															var rec = store.getAt(rowIndex);
															//alert("Sell " + rec.get('ma01'));
															formPanel.getForm().setValues({
																	'sl01': rec.get('sl01'), 
																	'sl02': rec.get('sl02'), 
																	'sl03': rec.get('sl03')
																	//'sl04': rec.get('sl04')
															});
															Ext.getCmp('UpdateStore').enable();
															Ext.getCmp('InsertStore').disable();
															/*
															Ext.Ajax.request({                            //读取后台传递于前台数据
																	url: 'SYS/SYS0201_Delete.php?ma01=' + rec.get('ma01'),
																	method:'get',
																	success:function(response, opts){
																			Ext.Msg.alert("警告", "資料已刪除成功！", function(){
																			});
																			Ext.Ajax.request({                            //读取后台传递于前台数据
																					url: 'SYS/SYS0201.php',
																					method:'get',
																					success:function(response, opts){
																							var obj= Ext.decode(response.responseText);//obj储存响应的数据
																							store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
																							store.load({params:{start:0,limit:10}});//按5条记录分布
																					},
																					failure: function(){Ext.Msg.alert("failure");}
																			});
																			grid.store.reload();
																	},
																	failure: function(){Ext.Msg.alert("failure");}
															});
															*/
													}
											}]
									}
							],
							stripeRows: true,
							autoExpandColumn: 'sl01',
							height:320,
							width:900,
							frame:true,

							tbar:new Ext.PagingToolbar({//工具栏
									pageSize:10,
									store:store,
									displayInfo:true,
									displayMsg:'From {0} To {1} Records, All Records Are {2} ',
									//displayMsg:'從 第{0}筆 到 第{1}筆, 總計 {2} 筆資料 ',
									emptyMsg:"no records",
									refreshText : "重新整理",
									doRefresh : function() {
											Ext.Ajax.request({                            //读取后台传递于前台数据
													url: 'LOC/LOC0101_Sel.php',
													method:'get',
													success:function(response, opts){
															var obj= Ext.decode(response.responseText);//obj储存响应的数据
															store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
															store.load({params:{start:0,limit:10}});//按5条记录分布
													},
													failure: function(){Ext.Msg.alert("failure");}
											});
											grid.store.reload();
									},
									handler : function() {
											Ext.getCmp('grid').getStore().reload(); 
									}
							})
					});
					

					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('LOC0101');
					if(!win){
							win = desktop.createWindow({
									id: 'LOC0101',
									title:src.text,
									width:920,
									//height:480,
									//html : '<p>尚未完成</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									items:[formPanel, grid]
									//items:formPanel
							});
					}
					win.show();
			}
			// ###########################################################################
	});
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //********************************************************************************** ?>

<?php //*********************************網頁相關函數********************************* ?>
<?php
function HtmlManTopII() {
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo GetTitle()?></title>
		<meta http-equiv='content-type' content='text/html; charset=utf-8'>

		<link rel="stylesheet" type="text/css" href="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>css/jscal2.css" />
		<link rel="stylesheet" type="text/css" href="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>css/border-radius.css" />
		<link rel="stylesheet" type="text/css" href="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>css/gold/gold.css" />
		<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>jscript/jscal2.js"></script>
		<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>jscript/lang/cn.js"></script>

		<link rel=stylesheet href='http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>css/admin.css'>
		<link rel=stylesheet href='http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>css/style2.css'>
		<link rel=stylesheet href='http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>css/toolbar.css'>
		<style type='text/css'>
		<!--
			body
			{
				scrollbar-face-color:#FFFFFF;
				scrollbar-highlight-color:White;
				scrollbar-3dlight-color:black;
				scrollbar-darkshadow-color:white ;
				scrollbar-shadow-color:black;
				scrollbar-arrow-color:black;
				scrollbar-track-color:#EEEEEE;
			}
		//-->
		</style>

		<script language='javascript' src='http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>jscript/toolbar.js'></script>
		<script language='javascript' src='http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>jscript/uUtil.js'></script>
		<SCRIPT LANGUAGE="JavaScript">
		<!--
		var imgPlus		= new Image();
		var imgMinus	= new Image();
		
		imgPlus.src		= 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/ManageTheme/plus.gif';
		imgMinus.src	= 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/ManageTheme/minus.gif';

		function Detail(imgObj, divObj)
		{
			if(divObj.style.display == 'block')
			{
				divObj.style.display = 'none';
				imgObj.src = imgPlus.src;
			}
			else
			{
				divObj.style.display = 'block';
				imgObj.src = imgMinus.src;
			}
		}		
		//-->
		</SCRIPT>

	<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>jscript/ajax.js"></script>

	<script type="text/javascript">
	/************************************************************************************************************
	Ajax chained select
	Copyright (C) 2006  DTHMLGoodies.com, Alf Magne Kalleland

	This library is free software; you can redistribute it and/or
	modify it under the terms of the GNU Lesser General Public
	License as published by the Free Software Foundation; either
	version 2.1 of the License, or (at your option) any later version.

	This library is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
	Lesser General Public License for more details.

	You should have received a copy of the GNU Lesser General Public
	License along with this library; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA

	Dhtmlgoodies.com., hereby disclaims all copyright interest in this script
	written by Alf Magne Kalleland.

	Alf Magne Kalleland, 2006
	Owner of DHTMLgoodies.com


	************************************************************************************************************/	
	var ajax = new Array();

	function GetBoardLevelL01For(sel)
	{
		var countryCode = sel.options[sel.selectedIndex].value;
		document.getElementById('bo04').options.length = 0;	// Empty city select box
		if(countryCode.length>0){
			var index = ajax.length;
			ajax[index] = new sack();
			
			ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/FOR/FOR0301_Level01.php?bo0401='+countryCode;	// Specifying which file to get
			ajax[index].onCompletion = function(){ CreateBoardLevelL01For(index) };	// Specify function that will be executed after file has been found
			ajax[index].runAJAX();		// Execute AJAX function
		}
	}

	function CreateBoardLevelL01For(index)
	{
		var obj = document.getElementById('bo04');
		eval(ajax[index].response);	// Executing the response from Ajax as Javascript code	
	}

	function GetBoardLevelL01(sel)
	{
		var countryCode = sel.options[sel.selectedIndex].value;
		document.getElementById('owsm01').options.length = 0;	// Empty city select box
		if(countryCode.length>0){
			var index = ajax.length;
			ajax[index] = new sack();
			
			ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/TOP/TOP0201_Level01.php?owsm03='+countryCode;	// Specifying which file to get
			ajax[index].onCompletion = function(){ CreateBoardLevelL01(index) };	// Specify function that will be executed after file has been found
			ajax[index].runAJAX();		// Execute AJAX function
		}
	}

	function CreateBoardLevelL01(index)
	{
		var obj = document.getElementById('owsm01');
		eval(ajax[index].response);	// Executing the response from Ajax as Javascript code	
	}

	function GetBoardLevelL01Move(sel)
	{
		var countryCode = sel.options[sel.selectedIndex].value;
		document.getElementById('bo01To').options.length = 0;	// Empty city select box
		if(countryCode.length>0){
			var index = ajax.length;
			ajax[index] = new sack();
			
			ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/FOR/FOR0301_Level01.php?bo0401='+countryCode;	// Specifying which file to get
			ajax[index].onCompletion = function(){ CreateBoardLevelL01Move(index) };	// Specify function that will be executed after file has been found
			ajax[index].runAJAX();		// Execute AJAX function
		}
	}

	function CreateBoardLevelL01Move(index)
	{
		var obj = document.getElementById('bo01To');
		eval(ajax[index].response);	// Executing the response from Ajax as Javascript code	
	}

	function GetBoardLevelL01MoveII(sel)
	{
		var countryCode = sel.options[sel.selectedIndex].value;
		document.getElementById('bo01From02').options.length = 0;	// Empty city select box
		if(countryCode.length>0){
			var index = ajax.length;
			ajax[index] = new sack();
			
			ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/FOR/FOR0301_Level01.php?bo0401='+countryCode;	// Specifying which file to get
			ajax[index].onCompletion = function(){ CreateBoardLevelL01MoveII(index) };	// Specify function that will be executed after file has been found
			ajax[index].runAJAX();		// Execute AJAX function
		}
	}

	function CreateBoardLevelL01MoveII(index)
	{
		var obj = document.getElementById('bo01From02');
		eval(ajax[index].response);	// Executing the response from Ajax as Javascript code	
	}

	//####################### casper add 2011/08/14 #######################
	function GetSTA1701_Board(sel)
	{
		var countryCode = sel.options[sel.selectedIndex].value;
		document.getElementById('bo01From02').options.length = 0;	// Empty city select box

		var index = ajax.length;
		ajax[index] = new sack();
		
		ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA1701_Board.php?Area='+countryCode;	// Specifying which file to get
		ajax[index].onCompletion = function(){ CreateSTA1701_Board(index) };	// Specify function that will be executed after file has been found
		ajax[index].runAJAX();		// Execute AJAX function
	}

	function CreateSTA1701_Board(index)
	{
		var obj = document.getElementById('bo01From02');
		eval(ajax[index].response);	// Executing the response from Ajax as Javascript code	
	}

	function GetSTA1701_Web(sel)
	{
		var countryCode = sel.options[sel.selectedIndex].value;
		document.getElementById('owsm01From02').options.length = 0;	// Empty city select box

		var index = ajax.length;
		ajax[index] = new sack();
		
		ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA1701_Web.php?Area='+countryCode;	// Specifying which file to get
		ajax[index].onCompletion = function(){ CreateSTA1701_Web(index) };	// Specify function that will be executed after file has been found
		ajax[index].runAJAX();		// Execute AJAX function
	}

	function CreateSTA1701_Web(index)
	{
		var obj = document.getElementById('owsm01From02');
		eval(ajax[index].response);	// Executing the response from Ajax as Javascript code	
	}
	//#####################################################################

	//####################### casper add 2011/08/03 #######################
	function GetBoardLevelL01MoveIII(sel)
	{
		var countryCode = sel.options[sel.selectedIndex].value;
		document.getElementById('owsm01From02').options.length = 0;	// Empty city select box
		if(countryCode.length>0){
			var index = ajax.length;
			ajax[index] = new sack();
			
			ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA0501_Level01.php?owsm03='+countryCode;	// Specifying which file to get
			ajax[index].onCompletion = function(){ CreateBoardLevelL01MoveIII(index) };	// Specify function that will be executed after file has been found
			ajax[index].runAJAX();		// Execute AJAX function
		}
	}

	function CreateBoardLevelL01MoveIII(index)
	{
		var obj = document.getElementById('owsm01From02');
		eval(ajax[index].response);	// Executing the response from Ajax as Javascript code	
	}
	//#####################################################################

	function GetBoardLevelL02MoveII(sel)
	{
		var countryCode = sel.options[sel.selectedIndex].value;
		document.getElementById('bo01From').options.length = 0;	// Empty city select box
		if(countryCode.length>0){
			var index = ajax.length;
			ajax[index] = new sack();
			
			ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/FOR/FOR0301_Level01.php?bo0401='+countryCode;	// Specifying which file to get
			ajax[index].onCompletion = function(){ CreateBoardLevelL02MoveII(index) };	// Specify function that will be executed after file has been found
			ajax[index].runAJAX();		// Execute AJAX function
		}
	}

	function CreateBoardLevelL02MoveII(index)
	{
		var obj = document.getElementById('bo01From');
		eval(ajax[index].response);	// Executing the response from Ajax as Javascript code	
	}

	function GetDownloadTitleL01(sel)
	{
		var countryCode = sel.options[sel.selectedIndex].value;
		document.getElementById('dt01').options.length = 0;	// Empty city select box
		if(countryCode.length>0){
			var index = ajax.length;
			ajax[index] = new sack();
			
			ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/DOW/DOW0401_Level01.php?db01='+countryCode;	// Specifying which file to get
			ajax[index].onCompletion = function(){ CreateDownloadTitleL01(index) };	// Specify function that will be executed after file has been found
			ajax[index].runAJAX();		// Execute AJAX function
		}
	}

	function CreateDownloadTitleL01(index)
	{
		var obj = document.getElementById('dt01');
		eval(ajax[index].response);	// Executing the response from Ajax as Javascript code	
	}

	function GetCarBrandL01(sel)
	{
		var countryCode = sel.options[sel.selectedIndex].value;
		document.getElementById('cb01').options.length = 0;	// Empty city select box
		if(countryCode.length>0){
			var index = ajax.length;
			ajax[index] = new sack();
			
			ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/CAR/CAR0301_Level01.php?cl01='+countryCode;	// Specifying which file to get
			ajax[index].onCompletion = function(){ CreateCarBrandL01(index) };	// Specify function that will be executed after file has been found
			ajax[index].runAJAX();		// Execute AJAX function
		}
	}

	function CreateCarBrandL01(index)
	{
		var obj = document.getElementById('cb01');
		eval(ajax[index].response);	// Executing the response from Ajax as Javascript code	
	}

	function GetCarKindL01(sel)
	{
		var countryCode = sel.options[sel.selectedIndex].value;
		document.getElementById('ck01').options.length = 0;	// Empty city select box
		if(countryCode.length>0){
			var index = ajax.length;
			ajax[index] = new sack();
			
			ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/CAR/CAR0401_Level01.php?cb01='+countryCode;	// Specifying which file to get
			ajax[index].onCompletion = function(){ CreateCarKindL01(index) };	// Specify function that will be executed after file has been found
			ajax[index].runAJAX();		// Execute AJAX function
		}
	}

	function CreateCarKindL01(index)
	{
		var obj = document.getElementById('ck01');
		eval(ajax[index].response);	// Executing the response from Ajax as Javascript code	
	}

	function SetSpecAlbum(sel)
	{
		var index = ajax.length;
		ajax[index] = new sack();
		
		ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/ALB/ALB0301_Level01.php?ua01='+sel;	// Specifying which file to get
		ajax[index].onCompletion = function(){ 
			alert("已完成設定");
			window.location.reload();
		};	// Specify function that will be executed after file has been found
		ajax[index].runAJAX();		// Execute AJAX function

	}

	function SetSpecTopic(sel)
	{
		var index = ajax.length;
		ajax[index] = new sack();
		
		ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/SPE/SPE0101_Level01.php?to01='+sel;	// Specifying which file to get
		ajax[index].onCompletion = function(){ 
			alert("已完成設定");
			window.location.reload();
		};	// Specify function that will be executed after file has been found
		ajax[index].runAJAX();		// Execute AJAX function

	}

	function CancelSpecTopic(sel)
	{
		var index = ajax.length;
		ajax[index] = new sack();
		
		ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/SPE/SPE0101_Level02.php?to01='+sel;	// Specifying which file to get
		ajax[index].onCompletion = function(){ 
			alert("已完成設定");
			window.location.reload();
		};	// Specify function that will be executed after file has been found
		ajax[index].runAJAX();		// Execute AJAX function

	}

	function addstopright(sObj, sSubID, sStopMemberID) {
		var index = ajax.length;
		ajax[index] = new sack();
		
		ajax[index].requestFile = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>ajax_addstopright.php?to01='+sObj+'&tr01='+sSubID+'&me01='+sStopMemberID;	// Specifying which file to get

		ajax[index].onCompletion = function(){ 
			alert(Trim(ajax[index].response));
			window.location.href="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/MEM/MEM0101.php";
		};	// Specify function that will be executed after file has been found
		ajax[index].runAJAX();		// Execute AJAX function
	}
	</script>

	<!-- Step 1: Loading CKEditor -->
	<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>ckeditor/ckeditor.js"></script>

	<SCRIPT LANGUAGE="JavaScript">
	<!--
	function fucCheckLength(strTemp) {   
		/*
		var i,sum;   
		sum=0;   
		for(i=0;i<strTemp.length;i++)   
		{   
		if ((strTemp.charCodeAt(i)>=0) && (strTemp.charCodeAt(i)<=255))
			sum=sum+1;
		else  
			sum=sum+2;
		}
		
		return sum;   
		*/
		return Len(strTemp);
	}

	function CheckNumber(sValue) {
		var valid = "0123456789"
		var ok = "yes";
		var temp;
		for (var i=0; i<sValue.length; i++) {
			temp = "" + sValue.substring(i, i+1);
			if (valid.indexOf(temp) == "-1") ok = "no";
		}
		if (ok == "no") {
			return false;
		} else {
			return true;
		}
	}

	//-->
	</SCRIPT>

<script language="javascript">
  Date.prototype.dateDiff = function(interval,objDate){
    //若參數不足或 objDate 不是日期物件則回傳 undefined
    if(arguments.length<2||objDate.constructor!=Date) return undefined;
    switch (interval) {
      //計算秒差
      case "s":return parseInt((objDate-this)/1000);
      //計算分差
      case "n":return parseInt((objDate-this)/60000);
      //計算時差
      case "h":return parseInt((objDate-this)/3600000);
      //計算日差
      case "d":return parseInt((objDate-this)/86400000);
      //計算週差
      case "w":return parseInt((objDate-this)/(86400000*7));
      //計算月差
      case "m":return (objDate.getMonth()+1)+((objDate.getFullYear()-this.getFullYear())*12)-(this.getMonth()+1);
      //計算年差
      case "y":return objDate.getFullYear()-this.getFullYear();
      //輸入有誤
      default:return undefined;
    }
  }
</script>

	</head>
	<body topmargin=0>
		<link rel=stylesheet href='http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>css/theme.css'>
		<script language='javascript' src='http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>jscript/JSCookMenu.js'></script>
		<SCRIPT LANGUAGE="JavaScript">
		<!--
		var cmThemeOfficeBase = 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/ThemeOffice/';
		//-->
		</SCRIPT>
		<script language='javascript' src='http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>jscript/theme.js'></script>
	<?php
}

function HtmlManMenuII() {
	?>
		<script language='JavaScript' type='text/javascript'>
		<!--
			function F(FileName)
			{
				return '<img src=http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/ThemeOffice/' + FileName + ' border=0 />';
			}
		
			var myMenu =
			[
				[null, '討論版管理', null, null, '討論版管理',
					[F('about.png'), '首頁管理', null, null, '首頁管理',
						[F('book_edit.png'), '品牌快捷列管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/FOR/FOR0401.php', null, '品牌快捷列管理'],
						[F('book_edit.png'), '精選文章Banner', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/FOR/FOR0501.php', null, '精選文章Banner'],
					],
					[F('about.png'), '相簿管理', null, null, '相簿管理',
						[F('users.png'), '分類１管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/ALB/ALB0101.php', null, '分類１管理'],
						[F('manage_area.png'), '分類２管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/ALB/ALB0201.php', null, '分類２管理'],
						[F('manage_area.png'), '精選相簿管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/ALB/ALB0301.php', null, '精選相簿管理'],
						[F('manage_area.png'), '相簿管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/ALB/ALB0401.php', null, '相簿管理'],
					],
					[F('about.png'), '文章管理', null, null, '文章管理',
						[F('book_add.png'), '類別１管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/FOR/FOR0101.php', null, '類別１管理'],
						[F('add_items.png'), '類別２管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/FOR/FOR0201.php', null, '類別２管理'],
						[F('book_edit.png'), '類別３管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/FOR/FOR0301.php', null, '類別３管理'],
						[F('book_edit.png'), '類別搬移管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/FOR/FOR0601.php', null, '類別搬移管理'],
					],
					[F('book_edit.png'), '活動管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/ACT/ACT0101.php', null, '活動管理'],
					[F('book_edit.png'), 'FAQ管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/MEM/MEM0501.php', null, 'FAQ管理'],
					[F('about.png'), '電子報管理', null, null, '電子報管理',
						[F('config.png'), '電子報類型管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/EPA/EPA0101.php', null, '電子報類型管理'],
						[F('edit.png'), '電子報發送管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/EPA/EPA0201.php', null, '電子報發送管理'],
						[F('edit.png'), '電子報名單匯入', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/EPA/EPA0301.php', null, '電子報名單匯入'],
					],
					[F('book_edit.png'), 'Meta設定', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/MET/MET0101.php', null, 'Meta設定'],
					[F('book_edit.png'), '精選文章', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/SPE/SPE0101.php', null, '精選文章'],
					[F('book_edit.png'), '精選投票', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/SPE/SPE0201.php', null, '精選投票'],
					[F('book_edit.png'), '精選活動', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/SPE/SPE0301.php', null, '精選活動'],
				],
				[null, '官網管理', null, null, '官網管理',
					[F('manage.png'), '首頁CoverFlow管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/TOP/TOP0301.php', null, '首頁CoverFlow管理'],
					[F('mainmenu.png'), '文章層級管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/TOP/TOP0101.php', null, '文章層級管理'],
					[F('note_s_pencil.png'), '文章管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/TOP/TOP0201.php', null, '文章管理'],
					//[F('content.png'), '文章延伸閱讀管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/TOP/TOP0401.php', null, '文章延伸閱讀管理'],
					[F('content.png'), '文章複制', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/TOP/TOP0501.php', null, '文章複制'],
					[F('sysinfo.png'), '銷售排行管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/RAN/RAN0101.php', null, '銷售排行管理'],
					[F('sysinfo.png'), '汽車搜尋管理', null, null, '汽車搜尋管理',
						[F('area.png'), '區域管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/CAR/CAR0101.php', null, '區域管理'],
						[F('briefcase.png'), '品牌管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/CAR/CAR0201.php', null, '品牌管理'],
						[F('search_produc.png'), '車款管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/CAR/CAR0301.php', null, '車款管理'],
						[F('databases.png'), '規格管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/CAR/CAR0401.php', null, '規格管理'],
					],
					[F('sysinfo.png'), '下載專區管理', null, null, '下載專區管理',
						[F('briefcase.png'), '品牌管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/DOW/DOW0101.php', null, '品牌管理'],
						[F('puzzle.png'), '下載類型管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/DOW/DOW0201.php', null, '下載類型管理'],
						[F('note_s_pencil.png'), '下載標題管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/DOW/DOW0301.php', null, '下載標題管理'],
						[F('template.png'), '下載內容管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/DOW/DOW0401.php', null, '下載內容管理'],
					],
					[F('book_edit.png'), 'Meta設定', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/MET/MET0201.php', null, 'Meta設定'],
				],
				
				[null, '市集管理', null, null, '市集管理',
					[F('sysinfo.png'), '商品分類管理', null, null, '商品分類管理',
						[F('note_s_pencil.png'), '主分類', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/product_class.php', null, '主分類'],
						[F('note_s_pencil.png'), '次分類', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/product_sub.php', null, '次分類'],
						[F('note_s_pencil.png'), '子分類', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/product_ssub.php', null, '子分類'],
					],
					[F('sysinfo.png'), '首頁管理', null, null, '首頁管理',
					   [F('sysinfo.png'), '首頁中間左方區塊1', null, null, '首頁中間左方區塊1',
						[F('book_edit.png'), '標題管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/index_title_edit.php?id=1&cid=1', null, '標題管理'],
						[F('book_edit.png'), '內容管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/index_content.php?cid=1', null, '內容管理'],
					],
					   [F('sysinfo.png'), '首頁中間左方區塊2', null, null, '首頁中間左方區塊2',
						[F('book_edit.png'), '標題管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/index_title_edit.php?id=2&cid=2', null, '標題管理'],
						[F('book_edit.png'), '內容管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/index_content.php?cid=2', null, '內容管理'],
					],
					   [F('sysinfo.png'), '首頁中間右方區塊1', null, null, '首頁中間右方區塊1',
						[F('book_edit.png'), '標題管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/index_title_edit.php?id=3&cid=3', null, '標題管理'],
						[F('book_edit.png'), '內容管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/index_content.php?cid=3', null, '內容管理'],
					],
					   [F('sysinfo.png'), '首頁中間右方區塊2', null, null, '首頁中間右方區塊2',
						[F('book_edit.png'), '標題管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/index_title_edit.php?id=4&cid=4', null, '標題管理'],
						[F('book_edit.png'), '內容管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/index_content.php?cid=4', null, '內容管理'],
					],
					   [F('sysinfo.png'), '首頁中間右方區塊3', null, null, '首頁中間右方區塊3',
						[F('book_edit.png'), '標題管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/index_title_edit.php?id=5&cid=5', null, '標題管理'],
						[F('book_edit.png'), '內容管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/index_content.php?cid=5', null, '內容管理'],
					],
					   [F('sysinfo.png'), '首頁中間右方區塊4', null, null, '首頁中間右方區塊4',
						[F('book_edit.png'), '標題管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/index_title_edit.php?id=6&cid=6', null, '標題管理'],
						[F('book_edit.png'), '內容管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/index_content_edit.php?ic_index=4&cid=6', null, '內容管理'],
					],
					   
					   [F('sysinfo.png'), '首頁中間右方區塊5', null, null, '首頁中間右方區塊5',
						[F('book_edit.png'), '內容管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/index_content.php?cid=7', null, '內容管理'],
					],
					   
					],
					[F('sysinfo.png'), '最新消息管理', null, null, '最新消息管理',
						[F('book_edit.png'), '分類管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/news_class.php?cid=1', null, '內容'],
						[F('book_edit.png'), '內容管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/news_list.php?cid=1', null, '內容'],
					],
					
					[F('sysinfo.png'), '站務公告管理', null, null, '最新消息管理',
						[F('book_edit.png'), '分類管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/news_class.php?cid=2', null, '內容'],
						[F('book_edit.png'), '內容管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/news_list.php?cid=2', null, '內容'],
					],
					
					[F('sysinfo.png'), '相關知識管理', null, null, '最新消息管理',
						[F('book_edit.png'), '分類管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/news_class.php?cid=3', null, '內容'],
						[F('book_edit.png'), '內容管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/news_list.php?cid=3', null, '內容'],
					],
					
					[F('sysinfo.png'), '常見問題管理', null, null, '最新消息管理',
						[F('book_edit.png'), '分類管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/news_class.php?cid=4', null, '內容'],
						[F('book_edit.png'), '內容管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/news_list.php?cid=4', null, '內容'],
					],
					
					[F('sysinfo.png'), '廠商新聞管理', null, null, '最新消息管理',
						[F('book_edit.png'), '分類管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/news_class.php?cid=5', null, '內容'],
						[F('book_edit.png'), '內容管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/news_list.php?cid=5', null, '內容'],
					],
					[F('sysinfo.png'), '酷金管理', null, null, '酷金管理',
						[F('book_edit.png'), '訂購資料管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/cool_list.php', null, '內容'],
					],
					
				],
				
				[null, '會員管理', null, null, '會員管理',
					[F('book_add.png'), '會員管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/MEM/MEM0101.php', null, '會員管理'],
					//[F('add_items.png'), '廠商管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/MEM/MEM0201.php', null, '廠商管理'],
					//[F('book_edit.png'), '版主管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/MEM/MEM0301.php', null, '版主管理'],
					//[F('book_edit.png'), '寫手管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/MEM/MEM0401.php', null, '寫手管理'],
					
				],
				/*
				[null, '版主管理', null, null, '版主管理',

				],
				[null, '寫手管理', null, null, '寫手管理',

				],
				[null, '統計報表管理', null, null, '統計報表管理',

				],
				*/
				[null, '統計報表管理', null, null, '統計報表管理',
					[F('report.png'), '會員數統計', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA0101.php', null, '會員數統計'],
					//[F('report.png'), '廠商數統計', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA0201.php', null, '廠商數統計'],
					//[F('report.png'), '會員停留時間統計', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA0301.php', null, '會員停留時間統計'],
					//[F('report.png'), '流量統計', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA0401.php', null, '流量統計'],
					[F('report.png'), '文章點閱數統計', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA0501.php', null, '文章點閱數統計'],
					[F('report.png'), '每月瀏覽人數統計', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA0601.php', null, '每月瀏覽人數統計'],
					[F('report.png'), '每日瀏覽人數統計', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA0701.php', null, '每日瀏覽人數統計'],
					//[F('report.png'), '每小時瀏覽人數統計', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA0801.php', null, '每小時瀏覽人數統計'],
					//[F('report.png'), '進站人數統計', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA0901.php', null, '進站人數統計'],
					//[F('report.png'), '文章數統計', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA1001.php', null, '文章數統計'],
					[F('report.png'), '推薦數統計', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA1101.php', null, '推薦數統計'],
					[F('report.png'), 'Follow數統計', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA1201.php', null, 'Follow數統計'],
					//[F('report.png'), '商品數統計', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA1301.php', null, '商品數統計'],
					//[F('report.png'), '成交數統計', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA1401.php', null, '成交數統計'],
					//[F('report.png'), '交易金額統計', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA1501.php', null, '交易金額統計'],
					[F('report.png'), 'eDM統計', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA1601.php', null, 'eDM統計'],
					[F('report.png'), '廣告點閱數統計', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/STA/STA1701.php', null, '廣告點閱數統計'],
				],
				[null, '廣告管理', null, null, '廣告管理',
					[F('users.png'), '討論版廣告管理', null, null, '討論版廣告管理',
						[F('users.png'), '共同管理區', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/BAN/forum_common.php', null, '共同管理區'],
						[F('users.png'), '獨立管理區', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/BAN/forum_divide.php', null, '獨立管理區'],
						//[F('users.png'), '上方廣告管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/BAN/BAN0101.php', null, '上方廣告管理'],
						//[F('manage_area.png'), '右方廣告管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/BAN/BAN0201.php', null, '右方廣告管理'],
						//[F('manage_area.png'), '下方廣告管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/BAN/BAN0301.php', null, '下方廣告管理'],
						//[F('manage_area.png'), '中間廣告管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/BAN/BAN0401.php', null, '中間廣告管理'],
						//[F('manage_area.png'), '會員中間廣告管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/BAN/BAN0501.php', null, '會員中間廣告管理'],
						//[F('manage_area.png'), '文章頁廣告管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/BAN/BAN0601.php', null, '文章頁廣告管理'],
						//[F('manage_area.png'), '影像簿廣告管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/BAN/BAN0701.php', null, '影像簿廣告管理'],
					],
					[F('users.png'), '官網廣告管理', null, null, '官網廣告管理',
						[F('users.png'), '共同管理區', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/WSB/official_common.php', null, '共同管理區'],
						[F('users.png'), '獨立管理區', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/WSB/official_divide.php', null, '獨立管理區'],
						//[F('users.png'), '上方廣告管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/WSB/WSB0101.php', null, '上方廣告管理'],
						//[F('manage_area.png'), '右方廣告管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/WSB/WSB0201.php', null, '右方廣告管理'],
						//[F('manage_area.png'), '下方廣告管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/WSB/WSB0301.php', null, '下方廣告管理'],
						//[F('manage_area.png'), '中間廣告管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/WSB/WSB0401.php', null, '中間廣告管理'],
					],
					[F('users.png'), '酷市集廣告管理', null, null, '酷市集廣告管理',
						[F('users.png'), '共同管理區', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/ad_common.php', null, '共同管理區'],
						[F('users.png'), '獨立管理區', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/market/ad_divide.php', null, '獨立管理區'],
					],
					[F('add_items.png'), '外部廣告管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/WSB/WSB0501.php', null, '外部廣告管理'],
				],
				[null, '權限管理', null, null, '權限管理',
					[F('users.png'), '登入帳號管理', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/SYS/SYS0101.php', null, '登入帳號管理'],
				],
				[null, '登出', 'http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>manage/logout.php', null, '系統登出'],

















			];
		//-->
		</script>
		
		<table width='100%' class='menudottedline' cellpadding='0' cellspacing='0' border='0'>
		  <tr>
		    <td class='menubackgr'><div id='myMenuID'></div>
		      <script language='JavaScript' type='text/javascript'>
				cmDraw ('myMenuID', myMenu, 'hbr', cmThemeOffice, 'ThemeOffice');
			  </script>
		    </td>
		  </tr>
		</table>
	<?php
}

function HtmlManAPNameII($sAPName) {
	?>
		<table width=100% border=0 cellspacing=0 cellpadding=1 align=center>
			<tr>
			    <!-- <td class='position_bar' style='vertical-align: middle'> <img src='../images/place.png' border=0 valign=middle> 當前位置: <a href='/PHPFramework/admins/index.php'>管理首頁</a> </td> -->
			    <td class='position_bar' style='vertical-align: middle'> <img src='http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/ManageTheme/place.png' border=0 valign=middle><?php echo $sAPName?></td>
			</tr>
		</table>
		<br>
	<?php
}

function HtmlManContentTopII() {
	?>
		<table width="100%" align="center" cellpadding="0" cellspacing="0">
		    <tr>
		        <td width="10" height="10" background="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/ManageTheme/top_left_corner.png"></td>
		        <td background="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/ManageTheme/top_line.png"></td>
		        <td width="10" background="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/ManageTheme/top_right_corner.png"></td>
		    </tr>
		    <tr>
		        <td background="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/ManageTheme/left_line.png"></td>
		        <td valign="middle" align="center">
					<style type="text/css">
<!--
.UnDispose {color: #FF0000}
.Today {color: blue}
.StartTime {color: #828282}
-->
</style>
	<?php
}

function HtmlManContentDownII() {
	?>
		        </td>
		        <td background="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/ManageTheme/right_line.png"></td>
		    </tr>
		    <tr>
		        <td width="10" height="10" background="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/ManageTheme/bottom_left_corner.png"></td>
		        <td background="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/ManageTheme/bottom_line.png"></td>
		        <td width="10" background="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/ManageTheme/bottom_right_corner.png"></td>
		    </tr>
		</table>
	<?php
}

function HtmlManDownII() {
	?></BODY></HTML><?php
}

?>
<?php //**************************************************************************** ?>

<?php //*********************************動態網頁輔助函數********************************* ?>
<?php
function HtmlEmptyProcess($sVal) {
	$sResult="";
	if (Trim(SafeStr($sVal))=="") {
		$sResult="&nbsp;";
	} else {
		$sResult=$sVal;
	}
	return $sResult;
}

function DataNum($sSQL) {
	$iResult=0;

	if (Trim($sSQL)!="") {
		$rRsNum=GetRs($sSQL);
		//uLog("DataNum sSQL == [".$sSQL."]");
		$iRsRowsNum=mysql_num_rows($rRsNum);
		//uLog("DataNum iRsRowsNum == [".$iRsRowsNum."]");
		$iResult=$iRsRowsNum;
	}

	return $iResult;
}

function CalculateList($sCode, $aVal, $sUrl) {
	$sResult="";
	switch ($sCode) {
	case 'Edit':
		/*
		uLog("##### aVal start #####");
		uLog($aVal);
		uLog("##### aVal end #####");
		*/
		$iVaLen=GetUnidimensionalArrayLength($aVal);
		for ($i = 0; $i < $iVaLen; $i++) {
			$sResult=$sResult.$aVal[$i]."/";
		}
		$sResult=Left($sResult, (Len($sResult)-1));
		$sResult=$sUrl."?PKey=".$sResult;
		//$sResult="<A HREF=".StrAddQuote($sResult).">編輯資料</A>";
		$sResult="<A HREF=".StrAddQuote($sResult).">編輯</A>";
		break;
	case 'Edit_PRO0401':
		$iVaLen=GetUnidimensionalArrayLength($aVal);
		for ($i = 0; $i < $iVaLen; $i++) {
			$sResult=$sResult.$aVal[$i]."/";
		}
		$sResult=Left($sResult, (Len($sResult)-1));
		$sResult="http://".GetServerHostName()."/".GetPathProjectV()."manage/PRO/PRO0401_Edit.php?PKey=".$sResult;
		$sResult="<A HREF=".StrAddQuote($sResult).">編輯資料</A><p>";

		break;
	case 'ProductClass':
		$sPr01=$aVal[0];
		$sPr02=$aVal[1];
		$sPr03=$aVal[2];
		$sPr04=$aVal[3];

		if (SafeInt($sPr03)==1) {


			$sResult=$sPr02;
		} else if (SafeInt($sPr03)==2) {
			$sNewPr02="";

			$aParme=Array($sPr04);
			$sSQL=SQLQuryI("PRO/PRO0401.sql", "qury02", $aParme);
			$rRs=GetRs($sSQL);

			while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
				$sNewPr02=$row["pr02"];
			}
			mysql_free_result($rRs);

			$sResult=$sNewPr02." &gt; ".$sPr02;
		} else if (SafeInt($sPr03)==3) {
			$sNewPr02_01="";
			$sNewPr04_01="";
			$sNewPr02_02="";

			$aParme=Array($sPr04);
			$sSQL=SQLQuryI("PRO/PRO0401.sql", "qury02", $aParme);
			$rRs=GetRs($sSQL);

			while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
				$sNewPr02_01=$row["pr02"];
				$sNewPr04_01=$row["pr04"];
			}
			mysql_free_result($rRs);

			$aParme=Array($sNewPr04_01);
			$sSQL=SQLQuryI("PRO/PRO0401.sql", "qury02", $aParme);
			$rRs=GetRs($sSQL);

			while ($row = mysql_fetch_array($rRs, MYSQL_ASSOC)) {
				$sNewPr02_02=$row["pr02"];
			}
			mysql_free_result($rRs);

			$sResult=$sNewPr02_02." &gt; ".$sNewPr02_01." &gt; ".$sPr02;
		} else {
			$sResult="&nbsp;";
		}

		break;
	case 'OrderView':
		$sOh01=$aVal[0];

		$sResult="<A HREF=\"http://".GetServerHostName()."/".GetPathProjectV()."manage/PAY/PAY0101_View.php?oh01=".$sOh01."\">".$sOh01."</A>";

		break;
	case 'Edit_PAY0101':
		$iVaLen=GetUnidimensionalArrayLength($aVal);
		for ($i = 0; $i < $iVaLen; $i++) {
			$sResult=$sResult.$aVal[$i]."/";
		}
		$sResult=Left($sResult, (Len($sResult)-1));
		$sResult="http://".GetServerHostName()."/".GetPathProjectV()."manage/PAY/PAY0101_Edit.php?oh01=".$sResult;
		$sResult="<A HREF=".StrAddQuote($sResult).">狀態編輯</A><p>";

		break;
	case 'Edit_MEM0101':
		$iVaLen=GetUnidimensionalArrayLength($aVal);
		for ($i = 0; $i < $iVaLen; $i++) {
			$sResult=$sResult.$aVal[$i]."/";
		}
		$sResult=Left($sResult, (Len($sResult)-1));
		$sResult="http://".GetServerHostName()."/".GetPathProjectV()."manage/MEM/MEM0101_Edit.php?PKey=".$sResult;
		$sResult="<A HREF=".StrAddQuote($sResult).">編輯資料</A><p>";

		break;
	case 'WSB0501_Url':
		$sOwob01=$aVal[0];

		$sResult="http://".GetServerHostName()."/".GetPathProjectV()."official_banner_count.php?owbc01=".$sOwob01."&owbc02=5";
		break;
	case 'StopRightStatus':
		$sTotalCount=$aVal[0];

		if (SafeInt($sTotalCount)>0) {
			$sResult="已停權";
		} else {
			$sResult="未停權";
		}
		
		break;
	case 'StopRightMan':
		$sTotalCount=$aVal[0];
		$sSr03=$aVal[1];

		if (SafeInt($sTotalCount)>0) {
			$sResult=$sSr03;
		} else {
			$sResult="&nbsp;";
		}
		
		break;
	case 'ALB0401_AlbumName':
		$ua02=$aVal[0];
		$up03=$aVal[1];
		$up04=$aVal[2];
		$up05=$aVal[3];
		$me01=$aVal[4];

		if ($up03=="相片") {
			$sResult="<IMG SRC=\"http://".GetServerHostName()."/".GetPathProjectV()."upload/".Replace(Replace($me01, "@", ""), ".", "")."/".$up04."\" WIDTH=\"190\" HEIGHT=\"135\" BORDER=\"0\"><br>".$ua02;
		} else if ($up03=="影片") {
			$sResult=$sResult."<object width=\"190\" height=\"135\">";
			$sResult=$sResult."<param name=\"movie\" value=\"".Replace($up05, "watch?v=", "v/")."\"></param>";
			$sResult=$sResult."<param name=\"allowFullScreen\" value=\"true\"></param>";
			$sResult=$sResult."<param name=\"allowscriptaccess\" value=\"always\"></param>";
			$sResult=$sResult."<embed src=\"".Replace($up05, "watch?v=", "v/")."\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"190\" height=\"135\" wmode=\"transparent\"></embed>";
			$sResult=$sResult."</object><br>".$ua02;
		} else {
			$sResult="<IMG SRC=\"../../images/190x135.jpg\" WIDTH=\"190\" HEIGHT=\"135\" BORDER=\"0\"><br>".$ua02;
		}
		break;
	case 'ALB0401_Detail_AlbumName':
		$up02=$aVal[0];
		$up03=$aVal[1];
		$up04=$aVal[2];
		$up05=$aVal[3];
		$me01=$aVal[4];

		if ($up03=="相片") {
			$sResult="<IMG SRC=\"http://".GetServerHostName()."/".GetPathProjectV()."upload/".Replace(Replace($me01, "@", ""), ".", "")."/".$up04."\" WIDTH=\"190\" HEIGHT=\"135\" BORDER=\"0\"><br>".$up02;
		} else if ($up03=="影片") {
			$sResult=$sResult."<object width=\"190\" height=\"135\">";
			$sResult=$sResult."<param name=\"movie\" value=\"".Replace($up05, "watch?v=", "v/")."\"></param>";
			$sResult=$sResult."<param name=\"allowFullScreen\" value=\"true\"></param>";
			$sResult=$sResult."<param name=\"allowscriptaccess\" value=\"always\"></param>";
			$sResult=$sResult."<embed src=\"".Replace($up05, "watch?v=", "v/")."\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"190\" height=\"135\" wmode=\"transparent\"></embed>";
			$sResult=$sResult."</object><br>".$up02;
		} else {
			$sResult="<IMG SRC=\"../../images/190x135.jpg\" WIDTH=\"190\" HEIGHT=\"135\" BORDER=\"0\"><br>".$up02;
		}
		break;
	case 'ALB0401_SpecAlbum':
		$ua04=$aVal[0];

		if ($ua04=="") {
			$sResult="否";
		} else {
			$sResult=$ua04;
		}
		break;
	case 'ALB0401_Edit':
		$ua01=$aVal[0];

		$sResult="<A HREF=\"#\" onclick=\"DoSubmitII('Delete', '".$ua01."');\">刪除本影像簿</A><br>";
		$sResult=$sResult."<A HREF=\"ALB0401_Detail.php?ua01=".$ua01."\">觀看影像簿</A><br>";

		break;
	case 'ALB0401_Detail_Edit':
		$up01=$aVal[0];

		$sResult="<A HREF=\"ALB0401_Detail.php?up01=".$up01."\">刪除本影像</A>";

		break;
	case 'TOP0401_Choose':
		/*
		uLog("##### aVal start #####");
		uLog($aVal);
		uLog("##### aVal end #####");
		*/
		$sOwt01=$aVal[0];
		$sOwt02=$aVal[1];

		$sResult=Left($sResult, (Len($sResult)-1));
		$sResult=$sUrl."?PKey=".$sResult;
		$sResult="<A HREF=\"#\" onclick=\"PickupTopic('".$sOwt01."', '".$sOwt02."');\">選擇此文章</A>";
		break;
	default:
		echo "&nbsp;";
		break;
	}
	return $sResult;
}

?>
<?php //********************************************************************************** ?>

<?php //*********************************動態網頁相關函數********************************* ?>
<?php
function FormList($sTitleBar, $aTitle, $aWidth, $aItemCode, $aItemParameter, $aDescription, $aButton, $aVisable) {
	?>
	<table width="100%" border="0" cellspacing="0" cellpadding="5" class="adminlist">
  <tr align="center" class='info_bottom'>
    <td colspan="3">
		<?php
		$iButtonLen=GetUnidimensionalArrayLength($aButton);
		for ($i = 0; $i < $iButtonLen; $i++) {
			ItemList("B", $aButton[$i]);
			?>　　<?php
		}
		?>
		</td>
  </tr>
	</table>
	<table width="100%" border="0" cellspacing="0" cellpadding="5" class="adminlist">
  <tr class='info_title'>
  	<td colspan="3"><strong><?php echo $sTitleBar?></strong></td>
  </tr>
	<?php
	$iVisableLen=GetUnidimensionalArrayLength($aVisable);
	for ($i = 0; $i < $iVisableLen; $i++) {
		if ($aVisable[$i]) {
			?>
			<tr class='info_content'>
				<td Width="<?php echo $aWidth[0]?>"><?php echo $aTitle[$i]?></td>
				<td Width="<?php echo $aWidth[1]?>"><?php ItemList($aItemCode[$i], $aItemParameter[$i])?></td>
				<td Width="<?php echo $aWidth[2]?>"><?php echo HtmlEmptyProcess($aDescription[$i])?></td>
			</tr>
			<?php
		}
	}
	?>
  <tr align="center" class='info_bottom'>
    <td colspan="3">
		<?php
		$iButtonLen=GetUnidimensionalArrayLength($aButton);
		for ($i = 0; $i < $iButtonLen; $i++) {
			ItemList("B", $aButton[$i]);
			?>　　<?php
		}
		?>
		</td>
  </tr>
	</table><p>
	<?php
	RwHidden("hdnOp", "");
	$iVisableLen=GetUnidimensionalArrayLength($aVisable);
	for ($i = 0; $i < $iVisableLen; $i++) {
		if ($aVisable[$i]==false) {
			ItemList($aItemCode[$i], $aItemParameter[$i]);
		}
	}
}

function DataList($sFileName, $sFlagName, $aParme, $sOrderFieldName, $sOrderSequence, $sDefOrderFieldName, $bChangeSQL, $iPageNum, $iNowPage, $aTitle, $aWidth, $aAlign, $aField, $aCalCode, $aCalField, $bOpenDetail, $sDetailTitle, $aDetailTitleList, $aDetailFieldList) {
	$sNowUrl="http://".GetServerHostName().GetCurrFileNameV(); //目前程式執行路徑
	//$sDefOrderFieldName=urldecode($sDefOrderFieldName);
	//uLog("WmDataList sNowUrl == ".$sNowUrl);
	//uLog("WmDataList sOrderSequence == ".$sOrderSequence);
	///*
	uLog("WmDataList iPageNum == ".$iPageNum);
	uLog("WmDataList iNowPage == ".$iNowPage);
	uLog("WmDataList sOrderFieldName == ".$sOrderFieldName);
	uLog("WmDataList sOrderSequence == ".$sOrderSequence);
	uLog("################ WmDataList aParme ################");
	uLog($aParme);
	uLog("################ WmDataList aParme ################");
	//*/

	if ($bChangeSQL) { //重組SQL
		//uLog("WmDataList 重組SQL");
		if (Trim($iPageNum)=="") {
			//$iPageNum=5;
			$iPageNum=20;
		}
		$_SESSION["sDLUrl"]=$sNowUrl;
		//$_SESSION["sDLSQL"]=SQLQuryIII($sFileName, $sFlagName, $aParme, 0, 5, $sDefOrderFieldName, "desc"); //casper cancel 2005/9/15

		//$_SESSION["sDLSQL"]=SQLQuryIII($sFileName, $sFlagName, $aParme, 0, $iPageNum, $sDefOrderFieldName, "desc"); //casper add 2005/9/15 //casper cancel 2006/1/30
		//$_SESSION["sDLTAL"]=SQLQuryIII($sFileName, $sFlagName, $aParme, 0, "999999999", $sDefOrderFieldName, "desc"); //casper cancel 2006/1/30

		//casper add 2006/1/30 增加 WmDataList 執行效能
		if (Trim($sOrderSequence)=="") {
			$_SESSION["sDLSOS"]="desc"; //保持與SQL排序相同
		} else {
			$_SESSION["sDLSOS"]=$sOrderSequence; //保持與SQL排序相同
		}
		//$_SESSION["sDLTAL"]=SQLQuryIII($sFileName, $sFlagName, $aParme, 0, "999999999", $sDefOrderFieldName, "desc");
		$_SESSION["sDLTAL"]=SQLQuryIII($sFileName, $sFlagName, $aParme, 0, "999999999", $sDefOrderFieldName, $_SESSION["sDLSOS"]);
		$_SESSION["sDLSQL"]=Replace($_SESSION["sDLTAL"], "999999999", $iPageNum);

		$_SESSION["sDLOFN"]=$sDefOrderFieldName;
		//uLog("sOrderSequence == ".$sOrderSequence);
		if (Trim($sOrderSequence)=="") {
			$_SESSION["sDLSOS"]="desc"; //保持與SQL排序相同
		} else {
			$_SESSION["sDLSOS"]=$sOrderSequence; //保持與SQL排序相同
		}
		//$_SESSION["sDLSOS"]="desc"; //保持與SQL排序相同
		$_SESSION["sDLINP"]="1";
		$_SESSION["sDLPar"]=$aParme;
		$_SESSION["sDLIPN"]=$iPageNum;
	} else { //看情況繼續運作
		//uLog("WmDataList _SESSION['sDLUrl'] == " . $_SESSION["sDLUrl"]);
		//uLog("WmDataList sNowUrl == " . $sNowUrl);

		if (Trim($_SESSION["sDLUrl"])==$sNowUrl) { //還在同一隻程式，可能為跳頁或排序或指定每頁數量或重設、重讀等非跳頁程序所造成
			//uLog("WmDataList 還在同一隻程式，可能為跳頁或排序或指定每頁數量或重設、重讀等非跳頁程序所造成");
			if (Trim($iPageNum)!="" || Trim($iNowPage)!="" || Trim($sOrderFieldName)!="") { //可能為跳頁排序指定每頁數量造成
				//uLog("WmDataList 可能為跳頁排序指定每頁數量造成，重組SQL");
				//uLog("WmDataList iPageNum == [".$iPageNum."]");
				if (Trim($iPageNum)=="") {
					$iPageNum=5;
				}
				$iStartRow=($iNowPage*$iPageNum)-$iPageNum;
				if ($iStartRow<0) {
					$iStartRow=0;
				}
				$_SESSION["sDLUrl"]=$sNowUrl;
				//uLog("WmDataList iStartRow == ".$iStartRow);
				//uLog("WmDataList iPageNum == ".$iPageNum);

				//$_SESSION["sDLSQL"]=SQLQuryIII($sFileName, $sFlagName, $_SESSION["sDLPar"], $iStartRow, $iPageNum, $sOrderFieldName, $sOrderSequence); //casper cancel 2006/1/30
				//$_SESSION["sDLTAL"]=SQLQuryIII($sFileName, $sFlagName, $_SESSION["sDLPar"], 0, "999999999", $sOrderFieldName, $sOrderSequence); //casper cancel 2006/1/30

				//casper add 2006/1/30 增加 WmDataList 執行效能
				$_SESSION["sDLTAL"]=SQLQuryIII($sFileName, $sFlagName, $_SESSION["sDLPar"], 0, "999999999", $sOrderFieldName, $sOrderSequence);
				//uLog("WmDataList sDLTAL 1 == [".$_SESSION["sDLTAL"]."]");
				
				$_SESSION["sDLSQL"]=Replace($_SESSION["sDLTAL"], "999999999", $iPageNum);
				//uLog("WmDataList sDLTAL 2 == [".$_SESSION["sDLSQL"]."]");
				//$_SESSION["sDLSQL"]=Replace($_SESSION["sDLTAL"], "limit 0", "limit ".$iStartRow);
				$_SESSION["sDLSQL"]=Replace($_SESSION["sDLSQL"], "limit 0", "limit ".$iStartRow);
				//uLog("WmDataList sDLTAL 3 == [".$_SESSION["sDLSQL"]."]");

				$_SESSION["sDLOFN"]=$sOrderFieldName;
				$_SESSION["sDLSOS"]=$sOrderSequence; //保持與SQL排序相同
				$_SESSION["sDLINP"]=$iNowPage;
				$_SESSION["sDLIPN"]=$iPageNum;
			} else { //可能為非跳頁排序指定每頁數量造成，保持原SQL
				//uLog("WmDataList 可能為非跳頁排序指定每頁數量造成，保持原SQL");
			}
		} else { //可能為第一次執行此程式或換到其它程式頁面或Session時間已到造成
			if (Trim($_SESSION["sDLUrl"])=="") { //可能為第一次執行此程式或Session時間已到造成
				//uLog("WmDataList 可能為第一次執行此程式或Session時間已到造成，清掉SQL");
				$_SESSION["sDLUrl"]="";
				$_SESSION["sDLSQL"]="";
				$_SESSION["sDLTAL"]="";
				$_SESSION["sDLOFN"]="";
				$_SESSION["sDLSOS"]="";
				$_SESSION["sDLINP"]="";
				$_SESSION["sDLPar"]="";
				$_SESSION["sDLIPN"]="";
			} else { //可能為換到其它程式頁面造成
				//uLog("WmDataList 可能為換到其它程式頁面造成，清掉SQL");
				$_SESSION["sDLUrl"]="";
				$_SESSION["sDLSQL"]="";
				$_SESSION["sDLTAL"]="";
				$_SESSION["sDLOFN"]="";
				$_SESSION["sDLSOS"]="";
				$_SESSION["sDLINP"]="";
				$_SESSION["sDLPar"]="";
				$_SESSION["sDLIPN"]="";
			}
		}
	}
	//uLog("WmDataList sDLSQL == ".$_SESSION["sDLSQL"]);

	if (Trim($_SESSION["sDLSQL"])!="" && DataNum($_SESSION["sDLSQL"])>0) {
		$iTitleLen=GetUnidimensionalArrayLength($aTitle);
		//設定每頁筆數可包含幾個寬格
		?>
		<table width="100%" border="0" cellspacing="0" cellpadding="5" class='adminlist'>
			<tr class='list_pagesize'>
				<td align="right" >每頁筆數：
					<select name="select" onChange='window.location="<?php echo $sNowUrl?>?OFN=<?php echo $_SESSION["sDLOFN"]?>&SOS=<?php echo $_SESSION["sDLSOS"]?>&INP=1&IPN=" + this.options[this.selectedIndex].value;'>
						<option selected>選擇每頁筆數</option>
						<!-- <option value="1">1 筆</option> -->
						<option value="5">5 筆</option>
						<option value="10">10 筆</option>
						<option value="20">20 筆</option>
						<option value="50">50 筆</option>
						<option value="100">100 筆</option>
						<option value="999999999">全部</option>
					</select></td>
			</tr>
		</table>
		<?php
		//設定內容開始
		?>
		<table width="100%"  border="0" cellspacing=0 cellpadding=5 class='adminlist' style="table-layout:fixed;word-wrap: break-word;">
		<?php
		//設定標題
		?>
		<tr class='list_title'>
		<?php
		if ($bOpenDetail) {
			?><th width="5%">詳細</th><?php
		}
		for ($i = 0; $i < $iTitleLen; $i++) {
			if (Trim($aField[$i])=="") { //此欄位並非從資料庫裏捉取，則不可排序
				?>
				<th width="<?php echo $aWidth[$i]?>" align="<?php echo $aAlign[$i]?>"><?php echo $aTitle[$i]?></th>
				<?php
			} else { //此欄位從資料庫裏捉取，則可排序
				if (Trim($_SESSION["sDLOFN"])==Trim($aField[$i])) { //該欄位與目前排序欄位名相同，可出現排序箭頭
					if (Trim($_SESSION["sDLSOS"])=="desc") {
						?>
						<th width="<?php echo $aWidth[$i]?>" align="<?php echo $aAlign[$i]?>"><!-- <A HREF="<?php echo $sNowUrl?>?OFN=<?php echo Trim($aField[$i])?>&SOS=asc&INP=<?php echo $_SESSION["sDLINP"]?>&IPN=<?php echo $iPageNum?>"> --><?php echo $aTitle[$i]?><!-- </A> --><img src='http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/ManageTheme/arrow1.gif' border=0></th>
						<?php
					} else {
						?>
						<th width="<?php echo $aWidth[$i]?>" align="<?php echo $aAlign[$i]?>"><!-- <A HREF="<?php echo $sNowUrl?>?OFN=<?php echo Trim($aField[$i])?>&SOS=desc&INP=<?php echo $_SESSION["sDLINP"]?>&IPN=<?php echo $iPageNum?>"> --><?php echo $aTitle[$i]?><!-- </A> --><img src='http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/ManageTheme/arrow0.gif' border=0></th>
						<?php
					}
				} else { //該欄位與目前排序欄位名不相同，不可出現排序箭頭
					?>
					<th width="<?php echo $aWidth[$i]?>" align="<?php echo $aAlign[$i]?>"><!-- <A HREF="<?php echo $sNowUrl?>?OFN=<?php echo Trim($aField[$i])?>&SOS=desc&INP=<?php echo $_SESSION["sDLINP"]?>&IPN=<?php echo $iPageNum?>"> --><?php echo $aTitle[$i]?><!-- </A> --></th>
					<?php
				}
			}
		}
		?></tr>
		<?php
		//設定欄位值
		$rRsDL=GetRs($_SESSION["sDLSQL"]);
		$iCountDL=1;
		while ($aRowsDL=mysql_fetch_array($rRsDL, MYSQL_ASSOC)) {
			//$aFieldValueArray=Array();
			?>
			<tr align="center" class='list_content'>
			<?php
			if ($bOpenDetail) {
				?><td><img onClick='Detail(this, subDiv_<?php echo $iCountDL?>);' border="0" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/ManageTheme/plus.gif" style='cursor:hand'></td><?php
			}
			for ($i = 0; $i < $iTitleLen; $i++) {
				if (Trim($aField[$i])=="") { //此欄位並非從資料庫裏捉取，則使用 WmCalculateList
					$aFieldValueArray=Array();
					$iCalFieldLen=GetUnidimensionalArrayLength($aCalField[$i]);
					for ($k = 0; $k < $iCalFieldLen; $k++) {
						$aFieldValueArray=UnidimensionalArrayAppend($aFieldValueArray, $aRowsDL[$aCalField[$i][$k]]);
					}
					?>
					<td align="<?php echo $aAlign[$i]?>"><?php echo CalculateList($aCalCode[$i], $aFieldValueArray, $sNowUrl)?></td>
					<?php
				} else { //此欄位從資料庫裏捉取，則不使用 WmCalculateList
					?>
					<td align="<?php echo $aAlign[$i]?>"><?php echo HtmlEmptyProcess($aRowsDL[$aField[$i]])?></td>
					<?php
				}

			}
			?>
			</tr>
			<?php
			if ($bOpenDetail) {
				$iColspan=1+$iTitleLen;
				?>
				<tr  class='list_content'>
					<td colspan="<?php echo $iColspan?>">
					<div style='display:none' id='subDiv_<?php echo $iCountDL?>'>
					<table width="98%" border=0 align="right" cellpadding=3 cellspacing=0>
						<tr class='list_title'>
							<td colspan="2"><strong><?php echo $sDetailTitle?></strong></td>
							</tr>
				<?php
				$iDetailTitleListLen=GetUnidimensionalArrayLength($aDetailTitleList);
				for ($j = 0; $j < $iDetailTitleListLen; $j++) {
					?>
					<tr class='list_content'>
						<td width=100><?php echo $aDetailTitleList[$j]?></td>
						<td><?php echo HtmlEmptyProcess($aRowsDL[$aDetailFieldList[$j]])?></td>
					</tr>
					<?php
				}
				?>
							</table>
					</div>
				</td>
				</tr>
				<?php
			}

			$iCountDL++;
		}

		?>
		</table>
		<?php
		//uLog("WmDataList sDLTAL == ".$_SESSION["sDLTAL"]);
		$rRsTal=GetRs($_SESSION["sDLTAL"]);
		$iRsRowsTal=mysql_num_rows($rRsTal);
		/*
		uLog("WmDataList iRsRowsTal == ".$iRsRowsTal);
		uLog("WmDataList iRsRowsTal/2 == ".($iRsRowsTal/2));
		uLog("WmDataList iRsRowsTal/2 == ".SafeInt($iRsRowsTal/2));
		uLog("WmDataList iRsRowsTal%2 == ".($iRsRowsTal%2));
		uLog("WmDataList iPageNum == ".$iPageNum);
		*/
		if (($iRsRowsTal%$_SESSION["sDLIPN"])==0) { //取出總頁數
			$iTotalPage=SafeInt($iRsRowsTal/$_SESSION["sDLIPN"]);
		} else {
			$iTotalPage=SafeInt($iRsRowsTal/$_SESSION["sDLIPN"])+1;
		}
		if (($_SESSION["sDLINP"]-1)>0) {
			$iPrevious=$_SESSION["sDLINP"]-1;
		} else {
			$iPrevious=1;
		}
		if (($_SESSION["sDLINP"]+1)<=$iTotalPage) {
			$iNext=$_SESSION["sDLINP"]+1;
		} else {
			$iNext=$iTotalPage;
		}
		?>
		<table width="100%"  border="0" cellspacing=0 cellpadding=5 class='adminlist'>
			<tr align="right" class='list_bottom'>
				<!-- <td colspan="8">( <font color=red><?php echo $_SESSION["sDLINP"]?></font> / <?php echo $iTotalPage?> )&nbsp;&nbsp;<a title='First page' style='text-decoration:none;color:black' href="<?php echo $sNowUrl?>?OFN=<?php echo $_SESSION["sDLOFN"]?>&SOS=<?php echo $_SESSION["sDLSOS"]?>&INP=1&IPN=<?php echo $_SESSION["sDLIPN"]?>"><b>First</b></a> -->
				<td colspan="8">( <font color=red><?php echo $_SESSION["sDLINP"]?></font> / <?php echo $iTotalPage?> )&nbsp;&nbsp;<a title='First page' style='text-decoration:none;color:black' href="<?php echo $sNowUrl?>?OFN=<?php echo $_SESSION["sDLOFN"]?>&SOS=<?php echo $_SESSION["sDLSOS"]?>&INP=1&IPN=<?php echo $_SESSION["sDLIPN"]?>"><b>第一頁</b></a>
				<!-- <a title='Previous page' style='text-decoration:none;color:black' href="<?php echo $sNowUrl?>?OFN=<?php echo $_SESSION["sDLOFN"]?>&SOS=<?php echo $_SESSION["sDLSOS"]?>&INP=<?php echo $iPrevious?>&IPN=<?php echo $_SESSION["sDLIPN"]?>"><b>Previous</b></a> -->
				<a title='Previous page' style='text-decoration:none;color:black' href="<?php echo $sNowUrl?>?OFN=<?php echo $_SESSION["sDLOFN"]?>&SOS=<?php echo $_SESSION["sDLSOS"]?>&INP=<?php echo $iPrevious?>&IPN=<?php echo $_SESSION["sDLIPN"]?>"><b>前一頁</b></a>
				<!-- <a title='Next page' style='text-decoration:none;color:black' href="<?php echo $sNowUrl?>?OFN=<?php echo $_SESSION["sDLOFN"]?>&SOS=<?php echo $_SESSION["sDLSOS"]?>&INP=<?php echo $iNext?>&IPN=<?php echo $_SESSION["sDLIPN"]?>"><b>Next</b></a> -->
				<a title='Next page' style='text-decoration:none;color:black' href="<?php echo $sNowUrl?>?OFN=<?php echo $_SESSION["sDLOFN"]?>&SOS=<?php echo $_SESSION["sDLSOS"]?>&INP=<?php echo $iNext?>&IPN=<?php echo $_SESSION["sDLIPN"]?>"><b>下一頁</b></a>
				<!-- <a title='Last page' style='text-decoration:none;color:black' href="<?php echo $sNowUrl?>?OFN=<?php echo $_SESSION["sDLOFN"]?>&SOS=<?php echo $_SESSION["sDLSOS"]?>&INP=<?php echo $iTotalPage?>&IPN=<?php echo $_SESSION["sDLIPN"]?>"><b>Last</b></a>&nbsp;<select name=Pages onchange='window.location="<?php echo $sNowUrl?>?OFN=<?php echo $_SESSION["sDLOFN"]?>&SOS=<?php echo $_SESSION["sDLSOS"]?>&INP=" + this.options[this.selectedIndex].value + "&IPN=<?php echo $_SESSION["sDLIPN"]?>";'> -->
				<a title='Last page' style='text-decoration:none;color:black' href="<?php echo $sNowUrl?>?OFN=<?php echo $_SESSION["sDLOFN"]?>&SOS=<?php echo $_SESSION["sDLSOS"]?>&INP=<?php echo $iTotalPage?>&IPN=<?php echo $_SESSION["sDLIPN"]?>"><b>最後頁</b></a>&nbsp;<select name=Pages onchange='window.location="<?php echo $sNowUrl?>?OFN=<?php echo $_SESSION["sDLOFN"]?>&SOS=<?php echo $_SESSION["sDLSOS"]?>&INP=" + this.options[this.selectedIndex].value + "&IPN=<?php echo $_SESSION["sDLIPN"]?>";'>
				<?php
				for ($y = 1; $y <= $iTotalPage; $y++) {
					if ($y==$_SESSION["sDLINP"]) {
						?><option value='<?php echo $y?>' selected><?php echo $y?></option><?php
					} else {
						?><option value='<?php echo $y?>'><?php echo $y?></option><?php
					}
				}
				?>
				</select></td>
			</tr>
		</table>

		<?php
	} else {
		?>目前查無資料或尚未進行查詢動作。<?php
	}

}

function UploadPic( $FILE, $NowPhysicalPath) {
	uLog("#################### upload start #######################");
	$_SESSION["NowPhysicalPath"]=$NowPhysicalPath;
	//$_SESSION["NowPhysicalPath"]="upload/member/";
	$sRndName=GetDateTimeCE().GetMicroTime();
//	$sUserfileName=$sRndName.iconv("UTF-8", "big5", $FILE['name']);
	uLog("sUserfileName == [".$sUserfileName."]");
	
	$aUserfileName=StringToArray($FILE['name'],".");
	$fileName=".".$aUserfileName[sizeof($aUserfileName)-1];
	$sUserfileName=$sRndName.$fileName;
	uLog($sUserfileName);
	$sUserfileName=LCase($sUserfileName);
	$sCo04="";

	if (Trim($sUserfileName)!="") {
		if (FileExist($_SESSION["NowPhysicalPath"].$sUserfileName)){ //假如檔案重覆，則更新失敗
			$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]重覆，請重新命名後再上傳！\\r\\n";
		} else { //假如檔名不重覆，上傳新檔
			if (move_uploaded_file($FILE['tmp_name'], $_SESSION["NowPhysicalPath"].iconv("UTF-8", "big5", LCase(iconv("BIG5", "UTF-8", $sUserfileName))))) {
				$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳成功！\\r\\n";
				$sCo04=$sRndName.LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")));
			} else {
				$sMsg=$sMsg."檔案[".LCase(Trim(Replace(iconv("BIG5", "UTF-8", $sUserfileName), GetLinking(), "")))."]上傳失敗，發生不明原因，請告知系統管理員！\\r\\n";
			}
		}
	}
	uLog($sUserfileName);
	return $sUserfileName;
		uLog("######################################################");
}

?>
<?php //********************************************************************************** ?>