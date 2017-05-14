<?php //*********************************模組檔案引入********************************* ?>
<?php include("../../../../Module/pUwm.php"); ?>
<?php //**************************************************************************** ?>

<?php //*********************************前置變數定義********************************* ?>
<?php
// ===========================================================================
// 初始化參數宣告
// ===========================================================================
ErrorReporting(E_ERROR | E_WARNING | E_PARSE);     //錯誤回報控制 0關掉 E_ALL全部回報

// ===========================================================================
// 接收參數宣告
// ===========================================================================

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
MainPage();

?>
<?php //**************************************************************************** ?>

<?php //*********************************其它模組專區********************************* ?>
<?php
function MainPage() {
	?>
	<style type="text/css">
	html, body {
		background:#3d71b8 url(http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/wallpapers/desktop.jpg) no-repeat left top;
			font: normal 12px tahoma, arial, verdana, sans-serif;
		margin: 0;
		padding: 0;
		border: 0 none;
		overflow: hidden;
		height: 100%;
	}

	.start {
		background-image: url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/startbutton-icon.gif ) !important;
	}

	.bogus {
		background-image: url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/bogus.png ) !important;
	}

	.logout {
		background-image: url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/logout.gif ) !important;
	}

	.settings {
		background-image: url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/gears.gif ) !important;
	}

	#dpanels {
		width: 250px;
		float: right;
	}

	#dpanels .x-panel {
		margin: 15px;
	}

	#dpanels .x-date-picker {
		border: 0 none;
		border-top: 0 none;
		background: transparent;
	}

	#dpanels .x-date-picker td.x-date-active {
		background: #ffffff;
	}

	#dpanels .x-date-picker {
		width: 100% !important;
	}

	#x-desktop {
		width: 100%;
		height: 100%;
		border: 0 none;
		position: relative;
			overflow:hidden;
			zoom:1;
	}

	#ux-taskbar .x-btn {
		margin: 1px 0 0 1px;
	}

	#ux-taskbar-start .x-btn {
		margin: 0;
	}

	#ux-taskbar button {
		/* width: 150px;
		overflow: hidden; */
		text-align: left;
		color: #ffffff;
	}
	#title-bar-wrapper {
		height:35px;
	}

	#title-bar {
		color: #225599;
		padding: 9px 7px;
		font: bold 16px tahoma,arial,verdana,sans-serif;
		float:left;
	}

	#x-logout {
		float:right;
		padding:6px 7px;
	}

	.x-btn-text-icon .x-btn-center .logout {
		background-position:0pt 3px;
		background-repeat:no-repeat;
		padding:3px 0pt 3px 18px;
	}

	#ux-taskbar {
		background:transparent none;
		height:30px;
		margin:0;
		padding:0;
		position:relative;
		z-index:12001;
	}

	.x-btn-icon .ux-taskbutton-center .x-btn-text{
		background-position: center;
		background-repeat: no-repeat;
		height: 16px;
		width: 16px;
		cursor:pointer;
		white-space: nowrap;
			padding:0;
	}
	.x-btn-icon .ux-taskbutton-center{
		padding:1px;
	}

	.x-btn-text-icon .ux-taskbutton-center .x-btn-text{
		background-position: 0 6px;
		background-repeat: no-repeat;
		padding:7px 0px 7px 20px;
	}

	.x-btn-text-icon .ux-startbutton-center .x-btn-text{
		background-position: 0 4px;
		background-repeat: no-repeat;
		color:#000000 !important;
		font-weight:bold;
		padding:7px 0px 7px 28px;
	}

	.ux-taskbutton-left, .ux-taskbutton-right{
		font-size:1px;
			line-height:1px;
	}
	.ux-taskbutton-left{
		width:4px;
		height:28px;
		background:url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/taskbutton.gif ) no-repeat 0 0;
	}
	.ux-taskbutton-right{
		width:4px;
		height:28px;
		background:url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/taskbutton.gif ) no-repeat 0 -28px;
	}
	.ux-taskbutton-left i, .ux-taskbutton-right i{
		display:block;
			width:4px;
			overflow:hidden;
			font-size:1px;
			line-height:1px;
	}
	.ux-taskbutton-center{
		background:url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/taskbutton.gif ) repeat-x 0 -56px;
		vertical-align: middle;
		text-align:center;
		padding:0 5px;
		cursor:pointer;
		white-space:nowrap;
	}

	#ux-taskbar .ux-taskbutton-left{
		background-position:0 0;
	}
	#ux-taskbar .ux-taskbutton-right{
		background-position:0 -28px;
	}
	#ux-taskbar .ux-taskbutton-center{
		background-position:0 -56px;
	}

	#ux-taskbar .x-btn-over .ux-taskbutton-left{
		background-position:0 -252px;
	}
	#ux-taskbar .x-btn-over  .ux-taskbutton-right{
		background-position:0 -280px;
	}
	#ux-taskbar .x-btn-over .ux-taskbutton-center{
		background-position:0 -308px;
	}

	#ux-taskbar .x-btn-click .ux-taskbutton-left{
		background-position:0 -168px;
	}
	#ux-taskbar .x-btn-click  .ux-taskbutton-right{
		background-position:0 -196px;
	}
	#ux-taskbar .x-btn-click .ux-taskbutton-center{
		background-position:0 -224px;
	}

	#ux-taskbar .active-win .ux-taskbutton-left{
		background-position:0 -84px;
	}
	#ux-taskbar .active-win  .ux-taskbutton-right{
		background:url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/taskbutton.gif ) no-repeat 0 -112px;
	}
	#ux-taskbar .active-win .ux-taskbutton-center{
		background:url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/taskbutton.gif ) repeat-x 0 -140px;
	}
	#ux-taskbar .active-win .ux-taskbutton-center button {
			color:#fff;
	}

	#spacer {
		height: 25px;
		float: left;
		width: 0;
		overflow: hidden;
		margin-top: 2px;
	}

	.x-window-body p,.x-panel-body p {
		padding: 10px;
		margin: 0;
	}

	.x-window-maximized .x-window-bc {
		height:0;
	}

	.icon-about {
			background-image:url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/Preview-icon.png) !important;
	}

	.icon-grid {
			background-image:url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/grid.png ) !important;
	}
	.add {
			background-image:url(http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/shared/icons/fam/add.gif) !important;
	}
	.option {
			background-image:url(http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/shared/icons/fam/plugin.gif) !important;
	}
	.remove {
			background-image:url(http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/shared/icons/fam/delete.gif) !important;
	}
	.save {
			background-image:url(http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/shared/icons/save.gif) !important;
	}
	.accordion {
			background-image:url(http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/accordian.gif) !important;
	}
	.tabs {
			background-image:url(http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/tabs.gif) !important;
	}

	/* IM window icons */

	.user {
			background-image:url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/shared/icons/fam/user.gif ) !important;
	}

	.user-add {
			background-image:url(http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/shared/icons/fam/user_add.gif) !important;
	}

	.user-delete {
			background-image:url(http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/shared/icons/fam/user_delete.gif) !important;
	}

	.connect {
			background-image:url(http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/shared/icons/fam/connect.gif) !important;
	}

	.user-girl {
			background-image:url(http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/shared/icons/fam/user_female.gif) !important;
	}

	.user-kid {
			background-image:url(http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/shared/icons/fam/user_green.gif) !important;
	}

	.user-suit {
			background-image:url(http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/shared/icons/fam/user_suit.gif) !important;
	}

	.ux-start-menu {
		background:transparent none;
		border:0px none;
		padding:0;
	}

	.ux-start-menu-tl .x-window-header {
		color:#f1f1f1;
		font:bold 11px tahoma,arial,verdana,sans-serif;
			padding:5px 0 4px 0;
	}

	.x-panel-tl .x-panel-icon, .ux-start-menu-tl .x-panel-icon {
		background-position:0pt 4px;
		background-repeat:no-repeat;
		padding-left:20px !important;
	}

	.ux-start-menu-tl {
		background: transparent url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/start-menu-left-corners.png ) no-repeat 0 0;
		padding-left:6px;
			zoom:1;
			z-index:1;
			position:relative;
	}

	.ux-start-menu-tr {
		background: transparent url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/start-menu-right-corners.png ) no-repeat right 0;
		padding-right:6px;
	}

	.ux-start-menu-tc {
		background: transparent url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/start-menu-top-bottom.png ) repeat-x 0 0;
		overflow:hidden;
			zoom:1;
	}

	.ux-start-menu-ml {
		background: transparent url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/start-menu-left-right.png ) repeat-y 0 0;
		padding-left:6px;
			zoom:1;
	}

	.ux-start-menu-bc {
		background: transparent url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/start-menu-top-bottom.png ) repeat-x 0 bottom;
			zoom:1;
	}

	.ux-start-menu-bc .x-window-footer {
			padding-bottom:6px;
			zoom:1;
			font-size:0;
			line-height:0;
	}

	.ux-start-menu-bl {
		background: transparent url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/start-menu-left-corners.png ) no-repeat 0 bottom;
		padding-left:6px;
			zoom:1;
	}

	.ux-start-menu-br {
		background: transparent url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/start-menu-right-corners.png ) no-repeat right bottom;
		padding-right:6px;
			zoom:1;
	}

	.x-panel-nofooter .ux-start-menu-bc {
		height:6px;
	}

	.ux-start-menu-splitbar-h {
		background-color:#d0d0d0;
	}


	.ux-start-menu-bwrap {
		background:transparent none;
		border:0px none;
	}

	.ux-start-menu-body {
		background:transparent none;
		border:0px none;
	}

	.ux-start-menu-apps-panel {
		background:#ffffff none;
		border:1px solid #1e2124;
	}

	.ux-start-menu-tools-panel {
		border:0px none;
		background:transparent url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/start-menu-right.png ) repeat-y scroll right 0pt;
	}

	#ux-taskbar-start {
		background:#000000 url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/taskbar-start-panel-bg.gif ) repeat-x left top;
		left:0px;
		padding:0;
		position:absolute;
	}

	#ux-taskbar-start .x-toolbar {
		background: none;
		padding:0px;
		border:0px none;
	}

	#ux-taskbuttons-panel {
		background:#000000 url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/taskbuttons-panel-bg.gif ) repeat-x left top;
		padding-top:0;
		position:relative;
	}

	.ux-taskbuttons-strip-wrap {
		/* overflow:hidden;
		position:relative;
		width:100%; */

		width:100%;
			overflow:hidden;
			position:relative;
			zoom:1;
	}

	ul.ux-taskbuttons-strip {
		display:block;
		width:5000px;
			zoom:1;
	}

	ul.ux-taskbuttons-strip li {
			float:left;
			margin-left:2px;
	}


	ul.ux-taskbuttons-strip li.ux-taskbuttons-edge {
			float:left;
			margin:0 !important;
			padding:0 !important;
			border:0 none !important;
			font-size:1px !important;
			line-height:1px !important;
			overflow:hidden;
			zoom:1;
			background:transparent !important;
			width:1px;
	}

	.x-clear {
			clear:both;
			height:0;
			overflow:hidden;
			line-height:0;
			font-size:0;
	}

	.x-taskbuttons-scrolling {
		position:relative;
	}

	.x-taskbuttons-scrolling .ux-taskbuttons-strip-wrap {
		margin-left:18px;
		margin-right:18px;
	}

	td.ux-taskButtons-edge {
			/*float:left;*/
			margin:0 !important;
			padding:0 !important;
			border:0 none !important;
			font-size:1px !important;
			line-height:1px !important;
			overflow:hidden;
			zoom:1;
			background:transparent !important;
			width:1px;
	}

	.ux-taskbuttons-scroller-left {
			background: transparent url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/scroll-left.gif ) no-repeat -18px 0;
			width:18px;
			position:absolute;
			left:1px;
			top:0px;
			z-index:10;
			cursor:pointer;
	}
	.ux-taskbuttons-scroller-left-over {
			background-position: 0 0;
	}
	.ux-taskbuttons-scroller-left-disabled {
			background-position: -18px 0;
			opacity:.5;
			-moz-opacity:.5;
			filter:alpha(opacity=50);
			cursor:default;
	}
	.ux-taskbuttons-scroller-right {
			background: transparent url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/scroll-right.gif ) no-repeat 0 0;
			width:18px;
			position:absolute;
			right:0;
			top:0px;
			z-index:10;
			cursor:pointer;
	}
	.ux-taskbuttons-scroller-right-over {
			background-position: -18px 0;
	}
	.ux-taskbuttons-scroller-right-disabled {
			background-position: 0 0;
			opacity:.5;
			-moz-opacity:.5;
			filter:alpha(opacity=50);
			cursor:default;
	}

	.ux-toolmenu-sep {
		background-color:#18191a;
		border-bottom:1px solid #858789;
		display:block;
		font-size:1px;
		line-height:1px;
		margin:2px 3px;
	}

	.ux-start-menu-tools-panel ul.x-menu-list li.x-menu-list-item a.x-menu-item {
		color:#ffffff;
	}

	.ux-start-menu-tools-panel ul.x-menu-list li.x-menu-list-item .x-menu-item-active a.x-menu-item {
		color:#000000;
	}

	.ux-start-menu-tools-panel .x-menu-item-active {
		background: #525456 url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/item-over.gif ) repeat-x left bottom;
		border:1px solid #000000;
		padding: 0;
	}

	#ux-taskbar .x-splitbar-h {
		background:#000000 url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/taskbar-split-h.gif ) no-repeat 0 0;
		width:8px;
	}

	.x-window-header-text {
		cursor:default;
	}

	/*
	 * Begin Start button
	 */
	.ux-startbutton-left, .ux-startbutton-right{
		font-size:1px;
			line-height:1px;
	}
	.ux-startbutton-left{
		width:10px;
		height:28px;
		background:url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/startbutton.gif ) no-repeat 0 0;
	}
	.ux-startbutton-right{
		width:10px;
		height:30px;
		background:url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/startbutton.gif ) no-repeat 0 -28px;
	}
	.ux-startbutton-left i, .ux-startbutton-right i{
		display:block;
			width:10px;
			overflow:hidden;
			font-size:1px;
			line-height:1px;
	}
	.ux-startbutton-center{
		background:url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/startbutton.gif ) repeat-x 0 -56px;
		vertical-align: middle;
		text-align:center;
		padding:0;
		cursor:pointer;
		white-space:nowrap;
	}

	#ux-taskbar .ux-startbutton-left{
		background-position:0 0;
	}
	#ux-taskbar .ux-startbutton-right{
		background-position:0 -30px;
	}
	#ux-taskbar .ux-startbutton-center{
		background-position:0 -60px;
	}

	#ux-taskbar .x-btn-over .ux-startbutton-left{
		background-position:0 -270px;
	}
	#ux-taskbar .x-btn-over  .ux-startbutton-right{
		background-position:0 -300px;
	}
	#ux-taskbar .x-btn-over .ux-startbutton-center{
		background-position:0 -330px;
	}

	#ux-taskbar .x-btn-click .ux-startbutton-left{
		background-position:0 -180px;
	}
	#ux-taskbar .x-btn-click  .ux-startbutton-right{
		background-position:0 -210px;
	}
	#ux-taskbar .x-btn-click .ux-startbutton-center{
		background-position:0 -240px;
	}

	#ux-taskbar .active-win .ux-startbutton-left{
		background-position:0 -90px;
	}
	#ux-taskbar .active-win  .ux-startbutton-right{
		background:url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/startbutton.gif ) no-repeat 0 -120px;
	}
	#ux-taskbar .active-win .ux-startbutton-center{
		background:url( http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/taskbar/black/startbutton.gif ) repeat-x 0 -150px;
	}
	#ux-taskbar .active-win .ux-startbutton-center button {
			color:#fff;
	}
	/*
	 * End Start button
	 */

	.x-resizable-proxy{
			background:#C7DFFC;
			opacity:.5;
			-moz-opacity:.5;
			filter:alpha(opacity=50);
			border: 1px solid #3b5a82;
	}

	/* Desktop Shortcuts */
	#x-shortcuts dt {
			float:left;
			margin:15px 0 0 15px;
			clear:left;
			width:64px;
			font:normal 10px tahoma,arial,verdana,sans-serif;
			text-align:center;
			zoom:1;
			display:block;
	}
	#x-shortcuts dt a {
			width:64px;
			display:block;
			color:white;
			text-decoration:none;
	}
	#x-shortcuts dt div {
			width:100%;
			color:white;
			overflow:hidden;
			text-overflow:ellipsis;
			cursor:pointer;
	}
	.ext-ie #x-shortcuts dt img {
			background:transparent !important;
	}
	#x-shortcuts dt a:hover {
			text-decoration:underline;
	}
	/* shortcuts */
	#grid-win-shortcut img {
			width:48px;
			height:48px;
			/* background-image: url(http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/grid48x48.png); */
			background-image: url(http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/distributor-report-icon.png);
			/* filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/grid48x48.png', sizingMethod='scale'); */
			filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>images/distributor-report-icon.png', sizingMethod='scale');
	}
	#acc-win-shortcut img {
			width:48px;
			height:48px;
			/* background-image: url(http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/im48x48.png); */
			background-image: url(http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/im48x48.png);
			/* filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='images/im48x48.png', sizingMethod='scale'); */
			filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='http://<?php echo GetServerHostName()?>/<?php echo GetPathProjectV()?>LibExt/examples/desktop/images/im48x48.png', sizingMethod='scale');
	}
	</style>
	<?php
}

?>
<?php //**************************************************************************** ?>