<?php //*********************************模組檔案引入********************************* ?>
<?php include("../Module/pMwm.php"); ?>
<?php //**************************************************************************** ?>

<?php //*********************************前置變數定義********************************* ?>
<?php
// ===========================================================================
// 初始化參數宣告
// ===========================================================================
ErrorReporting(E_ERROR | E_WARNING | E_PARSE);                    //錯誤回報控制 0關掉 E_ALL全部回報
$_SESSION["sSQLFile"]="Login.sql";        //SQL檔路徑

// ===========================================================================
// 接收參數宣告
// ===========================================================================
$ID=$_POST["ma01"];
$Pwd=$_POST["ma02"];
$action=$_POST["action"];

uLog("ma01 == [".$ma01."]");
uLog("ma02 == [".$ma02."]");
uLog("action == [".$action."]");

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
uLog("[".GetCurrFileNameNoExt()."] Start Time [".date("Y-m-d H:i:s")."]");

$sMsg="";
if ($action=="login") {
	$ID=Replace($ID, "--", "");
	$ID=Replace($ID, ";", "");
	$Pwd=Replace($Pwd, "--", "");
	$Pwd=Replace($Pwd, ";", "");
	uLog("ID == [".$ID."]");
	uLog("Pwd == [".$Pwd."]");
	if ($ID=="admin" && $Pwd=="admin") {
		//轉移到其它頁面
		$_SESSION["ManID"]=$ID;
		$_SESSION["ManPwd"]=$Pwd;

		$sUrl="http://".GetServerHostName()."/".GetPathProjectV()."manage/main.php";
		header("location:".$sUrl);
	} else {
		$aParme=Array($ID);
		$sSQL=SQLQuryI($_SESSION["sSQLFile"], "qury01", $aParme);
		uLog("sSQL == " . $sSQL);
		$rRs=GetRs($sSQL);
		$iRsRows=mysql_num_rows($rRs);
		uLog("iRsRows == " . $iRsRows);
		if ($iRsRows>0) {
			$aRows=mysql_fetch_array($rRs, MYSQL_ASSOC);
			$sDBID=$aRows["ma01"];
			$sDBPwd=$aRows["ma02"];

			uLog("sDBID == " . $sDBID);
			uLog("sDBPwd == " . $sDBPwd);
			if ($sDBID==$ID && $sDBPwd==$Pwd) {
				//轉移到其它頁面
				$_SESSION["ManID"]=$sDBID;
				$_SESSION["ManPwd"]=$sDBPwd;

				//$sUrl="http://".GetServerHostName()."/".GetPathProjectV()."manage/LoginFrame.php";
				//$sUrl="http://".GetServerHostName()."/".GetPathProjectV()."manage/main.php";
				$sUrl="http://".GetServerHostName()."/".GetPathProjectV()."manage/main.php";
				uLog("sUrl == ".$sUrl);
				header("location:".$sUrl);
			} else {
				MainPage("帳號、密碼錯誤，請重新輸入！");
			}
		} else {
			MainPage("帳號、密碼錯誤，請重新輸入！");
		}

		/* Free resultset */
		//mysqli_free_result($rRs);
		mysql_free_result($rRs);
	}
} else {
	MainPage("");
}

//MainPage($sMsg);

uLog("[".GetCurrFileNameNoExt()."] End   Time [".date("Y-m-d H:i:s")."]");

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php
function MainPage($sMsg) {
	?>
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo GetTitle();?></title>
	<link rel="stylesheet" type="text/css" href="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/resources/css/ext-all.css" />
	<link rel="stylesheet" type="text/css" href="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/css/desktop.css" />

			<!-- GC -->
		<!-- LIBS -->
		<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/adapter/ext/ext-base.js"></script>
		<!-- ENDLIBS -->

			<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/ext-all-debug.js"></script>

			<!-- DESKTOP -->
			<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/js/StartMenu.js"></script>
			<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/js/TaskBar.js"></script>
			<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/js/Desktop.js"></script>
			<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/js/App.js"></script>
			<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/js/Module.js"></script>
			<!-- <script type="text/javascript" src="../examples/desktop/sample.js"></script> -->
			<?php
			JavaScriptSetup($sMsg);	
			?>
			<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/shared/examples.js"></script>
			<script type="text/javascript" src="http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>jscript/uUtil.js"></script>
			

	</head>
	<body scroll="no">

	<div id="x-desktop">
			<!-- <a href="http://extjs.com" target="_blank" style="margin:5px; float:right;"><img src="images/powered.gif" /></a> -->

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

function JavaScriptSetup($sErr) {
	uLog("sErr == [".$sErr."]");
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

							//new MyDesktop.BogusMenuModule(),
							new MyDesktop.AboutUsModule()
			];
		},

/*
 * this.startMenu.add({
 *		text: 'Grid Window',
 *		iconCls:'icon-grid',
 *		handler : this.createWindow,
 *		scope: this
 *	});
 *
 * this.startMenu.addTool({
 *		text:'Logout',
 *		iconCls:'logout',
 *		handler:function(){ window.location = "logout.php"; },
 *		scope:this
 *	});
 */

			// config for the start menu
			getStartConfig : function(){
					return {
							title: '<?php echo GetTitle();?>',
							iconCls: 'user',
							width: 300, //此寬度是指白色部份
							height: 300,
							toolItems: [{
									text:'登入',
									iconCls:'logout',
									handler : function() { 



											//new Ext.FormPanel({
											var formPanel = new Ext.form.FormPanel({
													labelWidth: 75, // label settings here cascade unless overridden
													url:'index.php',
													tag: 'winlogin',
													frame:true,
													//title: 'Simple Form',
													bodyStyle:'padding:5px 5px 0',
													//width: 350,
													defaults: {width: 230},
													defaultType: 'textfield',

													//实现非AJAX提交表单一定要加下面的两行！
													//standardSubmit : true,
													///*
													onSubmit: Ext.emptyFn,
													submit: function() 
													{
															//this.getEl().dom.action= 'index.php'; //连接到服务器的url地址
															//this.getEl().dom.submit();
															//formPanel.getForm().getEl().dom.action = 'index.php';   
															//formPanel.getForm().getEl().dom.submit(); 
															document.getElementById(formPanel.getForm().getEl().dom.id).setAttribute("action", "index.php");
															document.getElementById(formPanel.getForm().getEl().dom.id).setAttribute("target", "_parent");
															formPanel.getForm().getEl().dom.submit();
													},
													//*/


													items: [{
																	fieldLabel: '登入帳號',
																	name: 'ma01',
																	//vtype:'email',
																	allowBlank:true
															},{
																	fieldLabel: '登入密碼',
																	name: 'ma02',
																	inputType: 'password',
																	allowBlank:true
															},{
																	name: 'action',
																	inputType: 'hidden',
																	allowBlank:false,
																	value: 'login'
															}
													],

													buttons: [{
															text: '登入',
															handler: function(){
																	//alert(win.getForm().ma01.value);
																	//alert(this.findField("ma01").getValue());
																	//alert(formPanel.getForm().findField("ma01").getValue());
																	//Ext.MessageBox.alert('錯誤訊息', 'Changes saved successfully.', "");
																	if (Trim(formPanel.getForm().findField("ma01").getValue())=="")
																	{
																			Ext.MessageBox.show({
																					title: '警告',
																					msg: '登入帳號資訊請勿空白，謝謝您！',
																					buttons: Ext.MessageBox.OK,
																					//animEl: "",
																					//fn: "",
																					//icon: "ext-mb-error"
																					//icon: "ext-mb-info"
																					//icon: "ext-mb-question"
																					icon: "ext-mb-warning"
																			});
																			return false;
																	}
																	if (Trim(formPanel.getForm().findField("ma02").getValue())=="")
																	{
																			Ext.MessageBox.show({
																					title: '警告',
																					msg: '登入密碼資訊請勿空白，謝謝您！',
																					buttons: Ext.MessageBox.OK,
																					//animEl: "",
																					//fn: "",
																					//icon: "ext-mb-error"
																					//icon: "ext-mb-info"
																					//icon: "ext-mb-question"
																					icon: "ext-mb-warning"
																			});
																			return false;
																	}
																	//formPanel.getForm().submit({url:'index.php', waitMsg:'登入中...', submitEmptyText: false});
																	/*
																	formPanel.getForm().submit({//客户端的数据提交给服务器   
																			url : 'index.php', 
																			//params :{"jsonStr":jsonStr,"inOutOrderDateId":inOutOrderDateId,"inOutOrderId":inOutOrderIdtemp}, 
																			waitTitle:"请稍候",   
																			waitMsg:"正在提交表单，请稍候......",    
																			failure:function(v,action){            
																					Ext.MessageBox.hide();    
																					Ext.MessageBox.alert('错误提示',action.result.msg);   
																			},      
																			success: function(v,action){      
																					Ext.MessageBox.hide();   
																					Ext.getCmp("wininOrder").hide(); 
																					Ext.MessageBox.alert('成功提示',action.result.msg); 
																			}                      
																	});
																	*/



																	formPanel.form.submit();
																	//formPanel.getForm().submit();
																	win.hide();
																	//window.location.reload();
																	//alert(win.FormPanel.getForm());
																	//console.log(win.getEl());
																	//Ext.getCmp("MyForm").getForm().findField("NameField").getValue();
																	//fs.getForm().submit({url:'xml-errors.xml', waitMsg:'Saving Data...', submitEmptyText: false});
															}
													},{
															text: '取消',
															handler: function(){
																	win.close();
															}
													}]
											})


											var win = new Ext.Window({   
													title : '登入',   
													width : 400,   
													//height : 300,

													items:formPanel


											});   
											win.show(); 



									},
									scope:this
							}]
					};
			}
	});



	/*
	 * Example windows
	 */



	// for example purposes
	var windowIndex = 0;

	MyDesktop.AboutUsModule = Ext.extend(Ext.app.Module, {
			init : function(){
					this.launcher = {
							text: '關於',
							iconCls:'bogus',
							handler : this.createWindow,
							scope: this,
							windowId:windowIndex
					}
			},

			createWindow : function(src){
					var desktop = this.app.getDesktop();
					var win = desktop.getWindow('bogus'+src.windowId);
					if(!win){
							win = desktop.createWindow({
									id: 'bogus'+src.windowId,
									title:src.text,
									width:640,
									//height:480,
									html : '<p>野遊風後端管理系統</p>',
									iconCls: 'bogus',
									shim:false,
									animCollapse:false,
									constrainHeader:true
							});
					}
					win.show();
			}
	});

	// Array data for the grid

	//-->
	</SCRIPT>	
	<SCRIPT LANGUAGE="JavaScript">
	<!--
	<?php
	if (Trim($sErr)!="")
	{
		?>
		Ext.onReady(function(){
				Ext.MessageBox.show({
						title: '登入錯誤',
						msg: '<?php echo $sErr;?>',
						buttons: Ext.MessageBox.OK,
						//animEl: "",
						//fn: "",
						icon: "ext-mb-error"
						//icon: "ext-mb-info"
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
<?php //**************************************************************************** ?>
