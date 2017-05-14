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
	ExtJsSerInfoPanle(); //10.客服中心
	ExtJsGooInfoPanle(); //11.網友好評
	ExtJsLocInfoPanle(); //14.門市據點
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
							new MyDesktop.SerInfoMenuModule(),  //10.客服中心
							new MyDesktop.GooInfoMenuModule(),  //11.網友好評
							new MyDesktop.LocInfoMenuModule(),  //14.門市據點
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
							height: 400,
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
						title: '黑金系統訊息',
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

<?php //*********************************會員管理相關函數********************************* ?>
<?php
function ExtJsMemInfoPanle() {
	?>
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	MyDesktop.MemInfoMenuModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '會員管理',
							iconCls: 'bogus',
							handler: function() {return false;},
							menu: {
									items:[{
											text: '異常帳戶列表',
											iconCls:'bogus',
											handler : this.MEM0101,
											scope: this,
											windowId: 'MEM0101'
											},{
											text: '會員列表',
											iconCls:'bogus',
											handler : this.MEM0201,
											scope: this,
											windowId: 'MEM0201'
									}]
							}
					}
			},

			MEM0101 : function(src){
					//############################# 2.1. 異常帳戶列表	MEM0101 Start #############################
					//############# 建立表單 Start #############
					//############# 建立表單 End   #############
					//############# 建立桌面視窗 Start #############
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('MEM0101');
					if(!win){
							win = desktop.createWindow({
									id: 'MEM0101',
									title:src.text,
									width:640,
									//height:480,
									html : '<p>1黑金股份有限公司成立目的，專注於創新的網路模式，虛擬與實體空間結合的最大效能，透過創新規劃的網路服務，提供人們更平易近人的生活美感、更方便有趣的數位學習以及更新奇特別的創意產品，在工作也能夠服務到大眾，成立知識學系、消費獲利、在家工作、公益互動的整合平台，給網路世界的人們一個全新的服務理念，我們將創造更多更人性話的加值商品給社會讓社會更加和諧有秩序。</p><p>期望透過我們的努力，一方面將傳統文化轉化為創意商品和網路內容，建立品牌，向國際推廣行銷。另一方面也把我們的耕耘成果，以各種數位學習、創意商品、實用的程式網站內容與國人分享。</p><p>執行網站設計，是我們的基礎專業，隨著時間的增長我們的經驗與服務能力也更加優越，現在與我們合作的客戶都能親切的感受到我們不只是做網站設計，平面設計，更能懂得去了解客戶的產業，給予行銷、經營上的建議與規劃，黑金(股)公司希望能讓每一個客戶都帶著信任與快樂的合作心態經營產業，所以在專業上不只是專業，更能互信互相與互愛，這就是黑金(股)公司的專業特色與客戶絡繹不絕的關鍵。</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true
							});
					}
					win.show();
					//############# 建立桌面視窗 End   #############
					//############################# 2.1. 異常帳戶列表	MEM0101 End   #############################
			},

			MEM0201 : function(src){
					//############################# 2.2. 會員列表	MEM0201 Start #############################
					//############# 建立表單 Start #############
					var store = new Ext.data.Store({
							autoLoad:true,
							proxy: new Ext.ux.data.PagingMemoryProxy([]),
							reader:new Ext.data.ArrayReader({},[        //读数组到一个元数据对象
									{name : 'me01'}, 
									{name : 'me02'}, 
									{name : 'me03'}, 
									{name : 'me04'}, 
									{name : 'me05'}, 
									{name : 'me06'}, 
									{name : 'me07'}, 
									{name : 'me08'}, 
									{name : 'me09'}, 
									{name : 'me10'}, 
									{name : 'me11'}, 
									{name : 'me12'}, 
									{name : 'me13'}, 
									{name : 'me14'}, 
									{name : 'me15'}, 
									{name : 'me16'}, 
									{name : 'me17'}, 
									{name : 'me18'}, 
									{name : 'me19'}, 
									{name : 'lasttime'}
							])
					});

					Ext.Ajax.request({                            //读取后台传递于前台数据
							url: 'MEM/MEM0201.php',
							method:'get',
							success:function(response, opts){
									var obj= Ext.decode(response.responseText);//obj储存响应的数据
									store.proxy = new Ext.ux.data.PagingMemoryProxy(obj);//PagingMemoryProxy() 一次性读取数据
									store.load({params:{start:0,limit:10}});//按5条记录分布
							},
							failure: function(){Ext.Msg.alert("failure");}
					});

					// create the Grid
					var grid = new Ext.grid.GridPanel({
							store: store,
							trackMouseOver: true,

							columns: [
									{id:'me01', header: "E-Mail帳號", width: 60, sortable: true, dataIndex: 'me01'},
									{header: "安全密碼1", width: 60, sortable: true, dataIndex: 'me02'},
									{header: "安全密碼2", width: 60, sortable: true, dataIndex: 'me03'},
									{header: "姓氏", width: 60, sortable: true, dataIndex: 'me04'},
									{header: "本名", width: 60, sortable: true, dataIndex: 'me05'},
									{header: "性別", width: 60, sortable: true, dataIndex: 'me06'},
									{header: "出生年月日", width: 60, sortable: true, dataIndex: 'me07'},
									{header: "城市", width: 60, sortable: true, dataIndex: 'me08'},
									{header: "推薦人帳號", width: 60, sortable: true, dataIndex: 'me09'},
									{header: "帳號狀態", width: 60, sortable: true, dataIndex: 'me10'},
									{header: "通關密語", width: 60, sortable: true, dataIndex: 'me11'},
									{header: "身份證號碼", width: 60, sortable: true, dataIndex: 'me12'},
									{header: "護照號碼", width: 60, sortable: true, dataIndex: 'me13'},
									{header: "聯絡電話", width: 60, sortable: true, dataIndex: 'me14'},
									{header: "聯絡地址", width: 60, sortable: true, dataIndex: 'me15'},
									{header: "自我介紹", width: 60, sortable: true, dataIndex: 'me16'},
									{header: "座右銘", width: 60, sortable: true, dataIndex: 'me17'},
									{header: "會員編號", width: 60, sortable: true, dataIndex: 'me18'},
									{header: "暱稱", width: 60, sortable: true, dataIndex: 'me19'},
									{header: "加入時間", width: 60, sortable: true, dataIndex: 'lasttime'}
							],
							stripeRows: true,
							//autoExpandColumn: 'ml01',
							height:320,
							width:1200,
							frame:true,
							
							tbar:new Ext.PagingToolbar({//工具栏
									pageSize:10,
									store:store,
									displayInfo:true,
									displayMsg:'From {0} To {1} records,all records are {2} ',
									emptyMsg:"no records",
									refreshText : "重新整理",
									doRefresh : function() {
										Ext.Ajax.request({                            //读取后台传递于前台数据
												url: 'MEM/MEM0201.php',
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
					//############# 建立表單 End   #############
					//############# 建立桌面視窗 Start #############
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('MEM0201');
					if(!win){
							win = desktop.createWindow({
									id: 'MEM0201',
									title:src.text,
									width:1210,
									//height:480,
									//html : '<p>1黑金股份有限公司成立目的，專注於創新的網路模式，虛擬與實體空間結合的最大效能，透過創新規劃的網路服務，提供人們更平易近人的生活美感、更方便有趣的數位學習以及更新奇特別的創意產品，在工作也能夠服務到大眾，成立知識學系、消費獲利、在家工作、公益互動的整合平台，給網路世界的人們一個全新的服務理念，我們將創造更多更人性話的加值商品給社會讓社會更加和諧有秩序。</p><p>期望透過我們的努力，一方面將傳統文化轉化為創意商品和網路內容，建立品牌，向國際推廣行銷。另一方面也把我們的耕耘成果，以各種數位學習、創意商品、實用的程式網站內容與國人分享。</p><p>執行網站設計，是我們的基礎專業，隨著時間的增長我們的經驗與服務能力也更加優越，現在與我們合作的客戶都能親切的感受到我們不只是做網站設計，平面設計，更能懂得去了解客戶的產業，給予行銷、經營上的建議與規劃，黑金(股)公司希望能讓每一個客戶都帶著信任與快樂的合作心態經營產業，所以在專業上不只是專業，更能互信互相與互愛，這就是黑金(股)公司的專業特色與客戶絡繹不絕的關鍵。</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true,
									items:grid
							});
					}
					win.show();
					//############# 建立桌面視窗 End   #############
					//############################# 2.2. 會員列表	MEM0201 End   #############################
			}

	});
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //********************************************************************************** ?>

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
									}
							],

							buttons: [{
									text: '新增',
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
									}
							],

							buttons: [{
									text: '新增',
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
						triggerAction: "all"
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
									},Combo_sdc01
							],

							buttons: [{
									text: '新增',
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
													text: '商品管理',
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
							hiddenName: 'pr01L01',
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
							hiddenName: 'pr01L02',
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
							hiddenName: 'pr01L03',
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
					/*
					function getCombData(){ 
							var data=<%=dataStr %>
							return data;
					}

					var comData=getCombData(); //取数据
					var columNum=3; //设置checkbox的列数,默认是3
					if(columNum<3)   //如果checkbox个数小于3时，列的长度设成checkbox个数
							 columNum=comData.length; 
					//体验范围数据
					var itemsGroup = new Ext.form.CheckboxGroup({ 
							xtype:'checkboxgroup',
							fieldLabel:'体验范围',
							name:'items',
							width:360,
							columns:columNum,
							items:comData
					});
					*/
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
									}
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
									items:[formPanel, grid]
									//items:formPanel
							});
					}
					win.show();
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
									}
							],

							buttons: [{
									text: '新增',
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

	});
	//-->
	</SCRIPT>
	<?php
}

?>
<?php //********************************************************************************** ?>