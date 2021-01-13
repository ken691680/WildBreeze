@extends('layouts.app')
@section('content')
<tr>
    <td align="center" valign="top"><!-- InstanceBeginEditable name="content" -->
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td height="15" align="center" valign="middle">
                    <img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" />
                </td>
            </tr>
            <tr>
                <td align="center" valign="top">
                    <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="220" align="left" valign="top">
                                <table width="220" border="0" align="left" cellpadding="0" cellspacing="0">
                                    @include('layouts.netizens_praise')
                                {{--                                    <tr>--}}
                                {{--                                        <td align="center" valign="top"><a href="message.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','images/btn_good_001.png',1)"><img src="images/btn_good_01.png" alt="" name="Image8" width="220" height="60" border="0" id="Image8" /></a></td>--}}
                                {{--                                    </tr>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>--}}
                                {{--                                    </tr>--}}
                                    @include('layouts.advertising')
                                {{--                                    <tr>--}}
                                {{--                                        <td align="center" valign="middle"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" valign="bottom"><img src="images/ad.png" alt="" width="10" height="10" /></td>--}}
                                {{--                                                    <td valign="bottom" style="background:url(images/ad-10.png) repeat-x bottom">&nbsp;</td>--}}
                                {{--                                                    <td align="left" valign="bottom"><img src="images/ad-11.png" alt="" width="10" height="10" /></td>--}}
                                {{--                                                </tr>--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>--}}
                                {{--                                                    <td width="200" bgcolor="#cabda1"><a href="#" target="_blank"><img src="images/ad_pic01.jpg" alt="" width="200" height="135" border="0" /></a></td>--}}
                                {{--                                                    <td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>--}}
                                {{--                                                </tr>--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>--}}
                                {{--                                                    <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>--}}
                                {{--                                                    <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>--}}
                                {{--                                                </tr>--}}
                                {{--                                            </table></td>--}}
                                {{--                                    </tr>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>--}}
                                {{--                                    </tr>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <td align="center" valign="middle"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" valign="bottom"><img src="images/ad.png" alt="" width="10" height="10" /></td>--}}
                                {{--                                                    <td valign="bottom" style="background:url(images/ad-10.png) repeat-x bottom">&nbsp;</td>--}}
                                {{--                                                    <td align="left" valign="bottom"><img src="images/ad-11.png" alt="" width="10" height="10" /></td>--}}
                                {{--                                                </tr>--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>--}}
                                {{--                                                    <td width="200" bgcolor="#cabda1"><a href="#" target="_blank"><img src="images/ad_pic01.jpg" alt="" width="200" height="135" border="0" /></a></td>--}}
                                {{--                                                    <td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>--}}
                                {{--                                                </tr>--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>--}}
                                {{--                                                    <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>--}}
                                {{--                                                    <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>--}}
                                {{--                                                </tr>--}}
                                {{--                                            </table></td>--}}
                                {{--                                    </tr>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>--}}
                                {{--                                    </tr>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <td align="center" valign="middle"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" valign="bottom"><img src="images/ad.png" alt="" width="10" height="10" /></td>--}}
                                {{--                                                    <td valign="bottom" style="background:url(images/ad-10.png) repeat-x bottom">&nbsp;</td>--}}
                                {{--                                                    <td align="left" valign="bottom"><img src="images/ad-11.png" alt="" width="10" height="10" /></td>--}}
                                {{--                                                </tr>--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>--}}
                                {{--                                                    <td width="200" bgcolor="#cabda1"><a href="#" target="_blank"><img src="images/ad_pic01.jpg" alt="" width="200" height="135" border="0" /></a></td>--}}
                                {{--                                                    <td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>--}}
                                {{--                                                </tr>--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>--}}
                                {{--                                                    <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>--}}
                                {{--                                                    <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>--}}
                                {{--                                                </tr>--}}
                                {{--                                            </table></td>--}}
                                {{--                                    </tr>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>--}}
                                {{--                                    </tr>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <td align="center" valign="middle"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" valign="bottom"><img src="images/ad.png" alt="" width="10" height="10" /></td>--}}
                                {{--                                                    <td valign="bottom" style="background:url(images/ad-10.png) repeat-x bottom">&nbsp;</td>--}}
                                {{--                                                    <td align="left" valign="bottom"><img src="images/ad-11.png" alt="" width="10" height="10" /></td>--}}
                                {{--                                                </tr>--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>--}}
                                {{--                                                    <td width="200" bgcolor="#cabda1"><a href="#" target="_blank"><img src="images/ad_pic01.jpg" alt="" width="200" height="135" border="0" /></a></td>--}}
                                {{--                                                    <td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>--}}
                                {{--                                                </tr>--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>--}}
                                {{--                                                    <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>--}}
                                {{--                                                    <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>--}}
                                {{--                                                </tr>--}}
                                {{--                                            </table></td>--}}
                                {{--                                    </tr>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>--}}
                                {{--                                    </tr>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <td align="center" valign="middle"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" valign="bottom"><img src="images/ad.png" alt="" width="10" height="10" /></td>--}}
                                {{--                                                    <td valign="bottom" style="background:url(images/ad-10.png) repeat-x bottom">&nbsp;</td>--}}
                                {{--                                                    <td align="left" valign="bottom"><img src="images/ad-11.png" alt="" width="10" height="10" /></td>--}}
                                {{--                                                </tr>--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>--}}
                                {{--                                                    <td width="200" bgcolor="#cabda1"><a href="#" target="_blank"><img src="images/ad_pic01.jpg" alt="" width="200" height="135" border="0" /></a></td>--}}
                                {{--                                                    <td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>--}}
                                {{--                                                </tr>--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>--}}
                                {{--                                                    <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>--}}
                                {{--                                                    <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>--}}
                                {{--                                                </tr>--}}
                                {{--                                            </table></td>--}}
                                {{--                                    </tr>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>--}}
                                {{--                                    </tr>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <td align="center" valign="middle"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" valign="bottom"><img src="images/ad.png" alt="" width="10" height="10" /></td>--}}
                                {{--                                                    <td valign="bottom" style="background:url(images/ad-10.png) repeat-x bottom">&nbsp;</td>--}}
                                {{--                                                    <td align="left" valign="bottom"><img src="images/ad-11.png" alt="" width="10" height="10" /></td>--}}
                                {{--                                                </tr>--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>--}}
                                {{--                                                    <td width="200" bgcolor="#cabda1"><a href="#" target="_blank"><img src="images/ad_pic01.jpg" alt="" width="200" height="135" border="0" /></a></td>--}}
                                {{--                                                    <td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>--}}
                                {{--                                                </tr>--}}
                                {{--                                                <tr>--}}
                                {{--                                                    <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>--}}
                                {{--                                                    <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>--}}
                                {{--                                                    <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>--}}
                                {{--                                                </tr>--}}
                                {{--                                            </table></td>--}}
                                {{--                                    </tr>--}}
                                    <tr>
                                        <td height="10">
                                            <img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" />
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        <td align="right" valign="top">
                            <table width="660" border="0" align="right" cellpadding="0" cellspacing="0">
                                <tr valign="bottom">
                                    <td height="25" colspan="3" align="left" valign="top">
                                        <span class="top_txt5a4f3f">
                                            <a href="/" class="top_txt5a4f3f_a">首頁</a> &gt;
                                        </span>
                                    <span class="root_red">活動訊息</span>
                                    </td>
                                </tr>
                                <tr valign="bottom">
                                    <td width="9" align="right">
                                        <img src="{{{ asset('images/line-02.png') }}}" alt="" width="9" height="40" />
                                    </td>
                                    <td align="left" valign="middle" class="titleB" style="background:url({{ asset('images/line.png') }}) bottom repeat-x">
                                        <img src="{{{ asset('images/titlebar.png') }}}" alt="" width="10" height="15" align="absmiddle" />2010年11、12月份野遊風活動　泰雅勇士的姻親路－巴福越嶺
                                    </td>
                                    <td width="11" align="left">
                                        <img src="{{{ asset('images/line-03.png') }}}" alt="" width="11" height="40" />
                                    </td>
                                </tr>
                            <tr>
                                <td rowspan="2" align="right" style="background:url({{ asset('images/line-04.png') }}) repeat-y right">&nbsp;</td>
                                <td align="center" valign="top" bgcolor="#CDBFA2">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="5">
                                        <tr>
                                            <td align="center" valign="top" class="top_txt5a4f3f">
                                                <table width="500" border="0" cellspacing="2" cellpadding="0">
                                                    <tr>
                                                        <td width="110" height="26" align="center" valign="middle" bgcolor="#60412F" class="title_white">活動日期</td>
                                                        <td align="left" valign="middle" bgcolor="#CDBFA2" class="top_txt60412F">　99年11月20日 </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="26" align="center" valign="middle" bgcolor="#60412F" class="title_white">交　　通</td>
                                                        <td align="left" valign="middle" bgcolor="#CDBFA2" class="top_txt60412F"> 　中巴 </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="26" align="center" valign="middle" bgcolor="#60412F" class="title_white">名　　額</td>
                                                        <td align="left" valign="middle" bgcolor="#CDBFA2" class="top_txt60412F">　 18人</td>
                                                    </tr>
                                                    <tr>
                                                        <td height="26" align="center" valign="middle" bgcolor="#60412F" class="title_white">費　　用</td>
                                                        <td align="left" valign="middle" bgcolor="#CDBFA2" class="top_txt60412F"> 　850（含車資、嚮導、保險；不含拉拉山門票100元） </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" valign="top">
                                                <table width="500" border="0" cellspacing="0" cellpadding="5">
                                                    <tr>
                                                        <td align="center" valign="bottom" style="border-top:1px dotted #97866d">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td align="left">
                                                                        <img src="{{{ asset('upload/event01_01.jpg') }}}" alt="" width="150" height="113" border="0" />
                                                                    </td>
                                                                {{--                                                                            <td>--}}
                                                                {{--                                                                                <img src="upload/event01_02.jpg" alt="" width="150" height="113" border="0" />--}}
                                                                {{--                                                                            </td>--}}
                                                                {{--                                                                            <td align="right">--}}
                                                                {{--                                                                                <img src="upload/event01_03.jpg" alt="" width="150" height="113" border="0" />--}}
                                                                {{--                                                                            </td>--}}
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left">
                                                            <span class="title_5a4f3f">景點介紹 ：</span>
                                                            <span class="top_txt5a4f3f">
                                                        巴福越嶺古道的「巴」指桃園復興鄉巴陵村，「福」指烏來福山村。二、三百年前由泰雅族的大嵙崁群所踏踩出來的，泰雅族人由由巴陵西南方翻越過2,000多公尺的達觀山區，遷移至福山、烏來一帶，為泰雅族人因交流及通婚需要所開發的社路，故又稱姻親路古道。直至1913年日軍佔領巴壟(今上巴陵)，為連繫桃園廳與台北廳的山區，及為製造樟腦開採木材的經濟考量和控制此間泰雅族群的軍事考量，乃於民國初年依循原始山徑，修築由福山到巴陵的山地警備道路，並命名為「拉拉山角板山越嶺道」，即福巴越嶺古道（或稱巴福越嶺古道）。而步道上現存的人文遺址包括有比亞桑日警駐在所、拉拉山日警駐在所、檜山日警駐在所、扎孔日警駐在所等。<br />
                                                        經開墾後現長約17公里，由上巴陵約1,700公尺下降至烏來福山村400公尺，費時約莫8小時。沿途林木蓊鬱，雲霧瀰漫、煙雨濛濛，步道旁有100多棵巨木群，樹幹上長滿碩大的菇類，因是天然原始林，無法接近巨木群，只能遠觀。森林涵養了豐富的野生動植物，紅檜、扁柏、藍崁馬蘭、蕈類、地衣、地錢等形成了森林的高低層次。在「巴福越嶺」古道的開端，有一個小小的指示牌標明著「往福山17公里」。此處海拔約1500公尺，整齊平坦沿緩坡而下，林蔭大樹紛立兩旁、紅檜林延綿不斷，更深遠處則有闊葉林、雜木林、冷杉、鐵杉、臺灣杉等的原始林相；林間輕裝行走十分舒服。<br />
                                                        <br />
                                                            </span>
                                                            <span class="title_5a4f3f">行程及路線說明：</span><br />
                                                            <span class="top_txt5a4f3f">05:50古亭野遊風集合出發 <br />
                                                                06:20三重野遊風集合出發
                                                                <br />
                                                                09:30抵上巴陵停車場，整裝步行3K柏油路
                                                                <br />
                                                                10:40拉拉山生態教育館，休息10分鐘
                                                                <br />
                                                                11:20進入拉拉山神木區至廣場，用餐40分鐘
                                                                <br />
                                                                12:05福巴越嶺古道17K
                                                                <br />
                                                                12:10 叉路口，取左續行往福巴越嶺國家步道入口 <br />
                                                                12:25 叉路口，左轉為舊路已崩坍，取右上續行<br />
                                                                12:45 福巴越嶺古道15K<br />
                                                                12:50 叉路口，取直續行
                                                                <br />
                                                                13:05 叉路口，左上往拉拉山約60分鐘，取直續行
                                                                <br />
                                                                13:30 福巴越嶺古道13K
                                                                <br />
                                                                15:35 福巴越嶺古道9K
                                                                <br />
                                                                15:40 叉路口，左上往檜木基石，取直續行
                                                                <br />
                                                                15:55 福巴越嶺古道6K
                                                                <br />
                                                                17:15 叉路口，右下往茶墾山及模故山
                                                                <br />
                                                                17:30 福巴越嶺古道1K
                                                                <br />
                                                                17:50福山吊橋
                                                                <br />
                                                                19:10捷運古亭站3號出口
                                                                <br />
                                                                19:40野遊風三重店
                                                                <br />
                                                                以上時程包含每個景點休息、拍照及午餐時間，全程暫估9小時，實際狀況則以考量全體山友體能狀況而定。
                                                            </span>
                                                        </td>
                                                    </tr>
                                                <tr>
                                                    <td height="50" align="center" class="top_txt5a4f3f" style="border-top:1px dotted #97866d">
                                                        <a name="app" id="app"></a>
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr valign="bottom">
                                                                <td width="15" height="15" align="right">
                                                                    <img src="{{{ asset('images/log_bg_01.png') }}}" alt="" width="15" height="15" />
                                                                </td>
                                                                <td style="background:url({{ asset('images/log_bg_02.png') }}) repeat-x bottom">&nbsp;</td>
                                                                <td width="15" align="left">
                                                                    <img src="{{{ asset('images/log_bg_03.png') }}}" alt="" width="15" height="15" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right" style="background:url({{ asset('images/log_bg_04.png') }}) no-repeat right top">&nbsp;
                                                                </td>
                                                                <td height="105" style="background:url({{ asset('images/log_bg_05.png') }}) repeat-x">
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td height="30" align="left" valign="top">
                                                                                <img src="{{{ asset('images/title-11.png') }}}" alt="" width="153" height="21" />
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="75" align="center" valign="middle">
                                                                                <table width="98%" border="0" cellspacing="0" cellpadding="0">
                                                                                    <tr>
                                                                                        <td height="50" align="left" valign="middle" class="item_title">請與我們聯繫報名。</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height="30" align="left" valign="middle">報名電話：02-8512-1882</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height="30" align="left" valign="middle">營業時間：週一至週五 9:30~18:30（例假日及中午12:00~13:30暫不提供電話服務）
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height="30" align="left" valign="middle">官方網站：www.wildbreeze.com.tw
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td height="30" align="left" valign="middle" class="root_red">請於活動時間一週前與我們聯繫報名。
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                    <td align="left" style="background:url({{ asset('images/log_bg_06.png') }}) no-repeat left top">&nbsp;</td>
                                                            </tr>
                                                                <tr valign="top">
                                                                    <td height="15" align="right">
                                                                        <img src="{{{ asset('images/log_bg_07.png') }}}" alt="" width="15" height="15" />
                                                                    </td>
                                                                    <td style="background:url({{ asset('images/log_bg_08.png') }}) top repeat-x">&nbsp;</td>
                                                                    <td align="left">
                                                                        <img src="{{{ asset('images/log_bg_09.png') }}}" alt="" width="15" height="15" />
                                                                    </td>
                                                                </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td rowspan="2" align="left" style="background:url({{ asset('images/line-05.png') }}) left repeat-y">&nbsp;</td>
                            </tr>
                            <tr valign="top">
                            <td height="10" bgcolor="#CDBFA2">
                                <img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" />
                            </td>
                            </tr>
                            <tr valign="top">
                                <td width="9" align="right">
                                    <img src="{{{ asset('images/line_2.png') }}}" alt="" width="9" height="35" align="right" />
                                </td>
                                <td align="right" valign="middle" style="background:url({{ asset('images/line_2-02.png') }}) repeat-x top">
                                    <a href="/event/list" class="top_txtc9bc9c">回列表</a>
                                </td>
                                <td align="left">
                                    <img src="{{{ asset('images/line_2-03.png') }}}" alt="" width="11" height="35" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <td height="20" colspan="3" align="right">
                                    <img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" />
                                </td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <!-- InstanceEndEditable -->
    </td>
</tr>
@endsection
