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
              <td align="center" valign="middle"><table width="900" border="0" align="center" cellpadding="5" cellspacing="0">
                <tr>
                  <td height="5"><img src="images/li.png" alt="" width="1" height="1" /></td>
                </tr>
                <tr>
                  <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr valign="bottom">
                      <td width="15" height="15" align="right"><img src="images/log_bg_01.png" alt="" width="15" height="15" /></td>
                      <td style="background:url(images/log_bg_02.png) repeat-x bottom">&nbsp;</td>
                      <td width="15" align="left"><img src="images/log_bg_03.png" alt="" width="15" height="15" /></td>
                      </tr>
                    <tr>
                      <td align="right" style="background:url(images/log_bg_04.png) no-repeat right top">&nbsp;</td>
                      <td height="200" valign="top" bgcolor="#FFFFFF" style="background:url(images/log_bg_05.png) repeat-x"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="30" align="left" valign="top"><img src="images/title-13.png" alt="" width="123" height="21" /></td>
                          </tr>
                        <tr>
                          <td height="30" align="center" valign="middle">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="center" valign="middle"><label for="textarea"></label>
                            <textarea name="textarea" cols="45" rows="5" class="txt13_313131" id="textarea" style="width:700px; height:500px">野遊風戶外玩家（以下簡稱「本公司」）係野遊風服務條款(以下簡稱本服務條款)，提供野遊風網站(http://www.wildbreeze.com.tw，以下簡稱「本站」)服務。

　　為了保障您的權益，在註冊本站會員前，請先詳細閱讀本服務條款之所有內容，當您在點選「同意」後，即視為您已閱讀本服務條款，並同意遵守以下所有本服務條款之規範。若您不同意以下本服務條款所述之內容，請暫時不要註冊本站會員及參與本站的活動。

壹、同意條款
　　（一）您如提出申請使用本站服務，即表示您已閱讀、瞭解並同意本服務條款之所有內容，您如有違反本服務條款時，本公司得隨時依據相關規則暫停或終止您使用本站服務。

　　（二）當您使用本站的各項服務，即表示同意接受本服務條款之規範及所有注意事項之約束。

　　（三）本公司有權修改、變更或暫停及終止本站服務及本站服務條款之各項相關內容，且毋須另行通知。本站服務及本站服務條款一旦發生變動，本公司將在本站之網頁上公佈修改內容，建議您隨時注意該等修改或變更。而本公司修改後之本站服務及本站服務條款一旦於本站網頁上公佈，即有效取代先前與您之服務條款或協議。您於本服務條款之任何修改或變更後繼續使用本站服務，即視為您已閱讀、瞭解並同意接受該等修改或變更。

　　（四）您同意本公司對於前項本站服務及本站服務條款所作的任何修改、暫停或終止，本公司對您和任何第三人均無需承擔任何責任。

貳、使用服務
　　（一）本公司於本站上提供予之服務可分為無償(即免費) 及有償(即需付費)二種方式。

　　（二）無償及有償服務之種類及相關規定等，本公司將依本服務條款、本站另行之公告或其他於本站上所公佈之使用指南等規定來規範權利與義務。

叁、申請與個人資料之保護
　　如您欲申請本站服務，則須以網路連接等方式，自本公司所定之申請加入格式中填入相關資料後，始完成使用申請。且您需同意以下事項：

　　（一）依本站服務申請之提示提供您本人真實、正確、最新及完整的資料（以下簡稱「註冊資料」）。

　　（二）隨時更新註冊資料，確保其為真實、正確、最新及完整的資料。

　　（三）若您提供任何錯誤、不實、過時或不完整或具誤導性的資料；或者本站有理由懷疑前述資料為錯誤、不實、過時或不完整或具誤導性的，本站有權暫停或終止您的帳號，並拒絕您於現在和未來使用本站服務之全部或任何部分。

　　對於會員所登錄或留存之個人資料，本站在未獲得會員同意以前，決不對外揭露會員之姓名、地址、電子郵件地址及其他依法受保護之個人資料。下述幾種特殊情況不受此限：
　　（一）基於法律之規定
　　（二）受司法機關或其他有權機關基於法定程序之要求
　　（三）為保障本公司與本站之財產及權益
　　（四）在緊急情況下為維護其他會員或第三人之人身安全

肆、個人資料之運用
　　對於會員所登錄或留存之個人資料，本公司得於合理之範圍內運用該等資料，以提供使用者其他資訊或服務，或作成會員統計資料以進行關於網路行為之調查或研究。

伍、會員的義務與責任
　　本站服務僅為平台之提供，您任何經由本站服務所傳送、展示之資料或檔案(以下簡稱「內容」)，無論係公開還是私下傳送、展示，若該內容有違反任何相關法律，由您自行承擔責任。

　　您於使用本站服務時，承諾絕不為任何非法目的或以任何非法方式使用本服務，並承諾遵守中華民國相關法規及一切使用網際網路之國際慣例。

　　您並保證不得利用本站服務從事任何侵害他人權益或違法之行為，且應遵守下列規定(包括但不限於)；若有違反情事，本公司得單方終止您使用本服務或限制您使用本服務之全部或一部。又若因您違反下列規定遭至政府機關或第三人之追究，概由您自行負責，而與本站無涉：

　　（一）倘您是使用有償(付費)服務，須於本公司訂定之期日前，以本公司指定之方式繳付相關費用。

　　（二）不得代理他人申請帳號使用本站服務，您僅得以自己名義申請帳號，亦不得未經授權使用其他用戶之帳號。

　　（三）不得侵害他人名譽、隱私權、營業秘密、商標權、著作權、專利權、其他智慧財產權及其他權利。

　　（四）不得違反依法律或契約所應負之保密義務，以及將依據任何法律或合約或法定關係（例如由於雇傭關係和依據保密合約所得知或揭露之內部資料、專屬及機密資料）知悉但無權傳送之任何內容公布於本站服務中。

　　（五）不得使用程式或其他方法干擾本站服務系統之運作或傳輸以及散佈電腦病毒。

　　（六）不得將本服務用作商業或營利用途。

　　（七）同一使用者不得使用多組分身帳號騷擾並影響其他會員的使用，或是以分身帳號從事嚴重影響本站使用環境及公平性的行為，一經舉報並查證屬實，本公司將對被檢舉人所有帳號進行停權處理。

　　（八）請勿於與任何本站之使用者有金錢上的交易往來，若因此蒙受損失或產生法律爭議，請自負相關責任。

　　（九）不得將自己或他人之全名、地址、電話號碼、可識別之個人資訊（包括但不限於身份證、車號等）等隱私資料公布於本站服務中。

　　（十）不得以電子郵件傳送等方式，持續或大量寄送廣告性資料予其他使用者。

　　（十一）您有責任維持密碼及帳號的機密安全。您必須完全負起因利用該密碼及帳號所進行之一切行動之責任。

　　（十二）當您的會員帳號或密碼遭到未經授權之使用，或發生其他任何安全問題時，您必須立即通知本站。

　　（十三）每次您連線完畢，均要結束您的帳號使用。因您未遵守本項約定所生之任何損失或損害，我們將無法亦不予負責。


陸、會員個人空間服務
　　（一）本站提供免費個人空間讓會員做資料的上傳、使用與發表，但本站不對任何傳送上的延遲、儲存的故障以及資料的刪除負任何責任。

　　（二）本站就提供給會員之個人空間於數量與容量上設有限制，其上限本站有權隨時調整。

　　（三），會員經由本站提供之個人空間所製作或傳輸之資料，均視為會員之個人所有，除下列情況外，本站不審閱其內容、亦不對外提供或揭露其內容：
　　　（１）基於法律之規定
　　　（２）受司法機關或其他有權機關基於法定程序之要求
　　　（３）為保障本公司之財產及權益

柒、服務之維護與變更
　　本站可能因公司與ISP業者間網路系統軟硬體設備之故障、失靈或人為操作上之疏失而造成全部或部份中斷、暫時無法使用、延遲或造成資料傳輸或儲存上之錯誤、或遭第三人侵入本站系統篡改或偽造變造資料等不得歸責於本站之問題發生，若有下列情形（包括但不限於）時，本站有權停止或中斷提供服務，會員不得因此而要求任何補償：
　　（一）對本站之設備進行必要之保養及施工時
　　（二）發生突發性之設備故障時
　　（三）由於本站所申請之ISP業者無法提供服務時
　　（四）因天災等不可抗力之因素致使本站無法提供服務時

　　

捌、商品銷售
　　對於透過本站銷售之商品，非由本站提供者，本站對其交易過程及商品本身均不負任何擔保責任。會員透過本站所購得之商品或服務，完全由供應商負完全責任，若有任何瑕疵或擔保責任，均與本站無關。

玖、廣告或促銷行為
　　本站上有關商業廣告及各種商品之促銷資訊，該等內容均係由廣告商或商品服務提供人所為，本站係提供刊登內容之平台媒介。會員透過本站上所提供之商品、服務資訊，所購買之任何商品或服務，其間交易關係均存在於會員與商品或服務提供人間，與本站無關。

拾、智慧財產權
　　本站所使用之系統、平台模組、軟體及其所有相關之內容與資料（例如文章、圖片等），其著作權、專利權、商標權、營業秘密及其他智慧財產權，皆為本公司或該內容之提供者所有，且受中華民國著作權法令及國際著作權法律的保障。本站資料之選擇、編排之版權為本公司所有，且受中華民國著作權法令及國際著作權法律的保障。非經本公司書面授權同意，不得以任何形式轉載、傳輸、傳播、散布、展示、出版、再製或利用本站內容的局部、全部的內容，以免觸犯相關法律規定。未經本公司書面同意，您不得擅自複製、進行還原工程（reverse engineering）、解編（de-compile）或反向組譯（disassemble）本站之任何功能或程式。

拾壹、連結
　　在本站或相關網頁上所提供之所有連結，可能連結到其他個人、公司或組織之網站，提供該連結之目的，僅為便利本站會員搜集或資訊取得，本站對於被連結之該等個人、公司或組織之網站上所提供之產品、服務或資訊，既不擔保其真實性、完整性、即時性或可信度，該等個人、公司或組織亦不因此而當然與本站有任何僱佣、委任、代理、合夥或其他類似之關係。

拾貳、禁止商業行為
　　本站禁止會員使用本站服務之任何部分或因本站服務之使用而獲得的相關資訊，進行重製、公開傳輸、出售、轉售、散佈，達到商業或其他營利目的。

拾叁、授權
　　（一）您明瞭您若無合法權利得授權他人使用、修改、重製、公開傳輸、公開播送、改作、散佈、發行、公開發表某資料，並將前述權利轉授權第三人時，您將不會為擅自將該資料上載、傳送、輸入或提供至本站之行為。

　　（二）任何資料一經您上載、傳送、輸入或提供至本站時，視為您已授權本站可以基於推廣或行銷本站服務或相關活動等私益或其他公益目的，無條件使用(包括但不限於公開傳輸、重製、公開播送、改作、散佈、發行、公開發表)該等資料，您對此絕無異議。您並應保證本站使用該資料時，不致侵害任何第三人之智慧財產權。

拾肆、損害賠償
　　因會員違反相關法令或違背本服務條款中之任一條款，致使本站或其關係企業、受僱人、受託人、代理人及其他相關履行輔助人因而受有損害或支出費用（包括且不限於因進行民事、刑事及行政程序所支出之律師費用）時，會員應負擔損害賠償責任或填補其費用。

拾伍、個別條款之效力
（一）	本同意書所定之任何會員條款之全部或一部分無效時，不影響其他條款之效力。

（二）	本公司未行使或執行本服務條款任何權利或規定，不被視為構成對前述權利喪失或權利之放棄。

拾陸、準據法及管轄法院
　　本服務條款之解釋及適用以及會員因使用本站服務與本站服務條款而與本公司與本站間所生之權利義務關係，應依中華民國法令解釋適用之。其因此所生之爭議，以台灣台北地方法院為第一審管轄法院。
                
                            </textarea></td>
                        </tr>
                        <tr>
                          <td height="50" align="center" valign="middle"><table width="100" border="0" cellpadding="0" cellspacing="0" class="btn_bg">
                            <tr>
                              <td height="30" align="center" valign="middle" class="btn_bg"><a href="#" class="btn_bg">詳閱完畢</a></td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="30" align="center" valign="middle">&nbsp;</td>
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
                  <td height="15"><img src="images/li.png" alt="" width="1" height="1" /></td>
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
</body>
<!-- InstanceEnd --></html>
	<?php
}

?>
<?php //**************************************************************************** ?>