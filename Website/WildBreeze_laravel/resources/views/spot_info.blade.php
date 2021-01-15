@extends('layouts.app')
@section('content')
    <tr>
        <td align="center" valign="top"><!-- InstanceBeginEditable name="content" -->
            <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
                @include('layouts.banner')
{{--                <tr>--}}
{{--                    <td colspan="2" align="center" valign="middle"><table width="900" border="0" align="center" cellpadding="5" cellspacing="0">--}}
{{--                            <tr>--}}
{{--                                <td height="5"><img src="images/li.png" alt="" width="1" height="1" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td bgcolor="#FFFFFF"><img src="images/banner_spot.jpg" alt="" width="890" height="130" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td height="15"><img src="images/li.png" width="1" height="1" /></td>--}}
{{--                            </tr>--}}
{{--                        </table></td>--}}
{{--                </tr>--}}
                <tr>
                    <td width="220" align="left" valign="top">
                        <table width="220" border="0" align="left" cellpadding="0" cellspacing="0">
                            @include('layouts.netizens_praise')
{{--                            <tr>--}}
{{--                                <td height="10"><a href="message.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','images/btn_good_001.png',1)"><img src="images/btn_good_01.png" alt="" name="Image8" width="220" height="60" border="0" id="Image" /></a></td>--}}
{{--                            </tr>--}}
                            <tr>
                                <td height="10">
                                    <img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" />
                                </td>
                            </tr>
                            @include('layouts.spot_article')
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
                                        <a href="#" class="top_txt5a4f3f_a">首頁</a> &gt; </span>
                                    <span class="root_red">野遊勝地</span>
                                </td>
                            </tr>
                            <tr valign="bottom">
                                <td width="9" align="right">
                                    <img src="{{{ asset('images/line-02.png') }}}" alt="" width="9" height="40" />
                                </td>
                                <td align="left" valign="middle" style="background:url({{{ asset('images/line.png') }}}) bottom repeat-x">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr valign="middle">
                                            <td align="left" class="titleB">
                                                <img src="{{{ asset('images/titlebar.png') }}}" alt="" width="10" height="15" align="middle" />
                                                <a href="#" class="titleB">巴福越嶺</a>
                                            </td>
                                            <td align="right">
                                                <span class="top_txt5a4f3f">
                                                    <span class="top_txtc9bc9c">觀看次數：99999 │ </span>
                                                    <a href="#message" class="top_txtc9bc9c">我要留言</a></span></td>
                                        </tr>
                                    </table></td>
                                <td width="11" align="left">
                                    <img src="{{{ asset('images/line-03.png') }}}" alt="" width="11" height="40" />
                                </td>
                            </tr>
                            <tr>
                                <td align="right" style="background:url({{ asset('images/line-04.png') }}) repeat-y right">&nbsp;
                                </td>
                                <td align="center" valign="top" bgcolor="#CDBFA2">
                                    <table width="500" border="0" cellspacing="0" cellpadding="5">
                                        <tr>
                                            <td align="left">
                                                <span class="title_5a4f3f">                        景點介紹 ：
                                                </span> <br />
                                                <br />
                                                <img src="{{{ asset('upload/event01_01.jpg') }}}" width="480" height="360" />
                                                <br />
                                                <br />
                                                <span class="top_txt5a4f3f">巴福越嶺古道的「巴」指桃園復興鄉巴陵村，「福」指烏來福山村。二、三百年前由泰雅族的大嵙崁群所踏踩出來的，泰雅族人由由巴陵西南方翻越過2,000多公尺的達觀山區，遷移至福山、烏來一帶，為泰雅族人因交流及通婚需要所開發的社路，故又稱姻親路古道。直至1913年日軍佔領巴壟(今上巴陵)，為連繫桃園廳與台北廳的山區，及為製造樟腦開採木材的經濟考量和控制此間泰雅族群的軍事考量，乃於民國初年依循原始山徑，修築由福山到巴陵的山地警備道路，並命名為「拉拉山角板山越嶺道」，即福巴越嶺古道（或稱巴福越嶺古道）。而步道上現存的人文遺址包括有比亞桑日警駐在所、拉拉山日警駐在所、檜山日警駐在所、扎孔日警駐在所等。<br />
                        <br />
                        <img src="{{{ asset('upload/event01_02.jpg') }}}" width="480" height="360" /><br />
  <br />
                        經開墾後現長約17公里，由上巴陵約1,700公尺下降至烏來福山村400公尺，費時約莫8小時。沿途林木蓊鬱，雲霧瀰漫、煙雨濛濛，步道旁有100多棵巨木群，樹幹上長滿碩大的菇類，因是天然原始林，無法接近巨木群，只能遠觀。森林涵養了豐富的野生動植物，紅檜、扁柏、藍崁馬蘭、蕈類、地衣、地錢等形成了森林的高低層次。在「巴福越嶺」古道的開端，有一個小小的指示牌標明著「往福山17公里」。此處海拔約1500公尺，整齊平坦沿緩坡而下，林蔭大樹紛立兩旁、紅檜林延綿不斷，更深遠處則有闊葉林、雜木林、冷杉、鐵杉、臺灣杉等的原始林相；林間輕裝行走十分舒服。</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <table width="500" border="0" cellspacing="0" cellpadding="0">
                                                    <tr valign="bottom">
                                                        <td width="15" height="15" align="right">
                                                            <img src="{{{ asset('images/log_bg_01.png') }}}" alt="" width="15" height="15" />
                                                        </td>
                                                        <td style="background:url({{ asset('images/log_bg_02.png') }}) repeat-x bottom">&nbsp;
                                                        </td>
                                                        <td width="15" align="left">
                                                            <img src="{{{ asset('images/log_bg_03.png') }}}" alt="" width="15" height="15" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" style="background:url({{ asset('images/log_bg_04.png') }}) no-repeat right top">&nbsp;
                                                        </td>
                                                        <td valign="top" bgcolor="#FFFFFF" style="background:url({{ asset('images/log_bg_05.png') }}) repeat-x">
                                                            <table width="440" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td height="30" align="left" valign="top">
                                                                        <span class="title_5a4f3f">景點精彩照片</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="middle">
                                                                        <table width="440" border="0" cellpadding="5" cellspacing="0">
                                                                            <tr>
                                                                                <td align="center" valign="middle">
                                                                                    <a href="#">
                                                                                        <img src="{{{ asset('images/btn_prev.png') }}}" width="17" height="15" border="0" />
                                                                                    </a>
                                                                                </td>
                                                                                <td width="85" height="85" align="center" valign="middle">
                                                                                    <a href="{{{ asset('upload/event01_01.jpg') }}}" class="lightwindow" rel="subject[巴福越嶺]" title="巴福越嶺" caption="巴福越嶺古道的「巴」指桃園復興鄉巴陵村，「福」指烏來福山村。">
                                                                                        <img src="{{{ asset('upload/event01_01.jpg') }}}" alt="" width="85" height="64" border="0" />
                                                                                    </a>
                                                                                </td>
{{--                                                                                <td width="85" height="85" align="center" valign="middle">--}}
{{--                                                                                    <a href="upload/event01_02.jpg" class="lightwindow" rel="subject[巴福越嶺]" title="巴福越嶺" caption="開墾後現長約17公里，由上巴陵約1,700公尺下降至烏來福山村400公尺，費時約莫8小時。"><img src="upload/event01_02.jpg" alt="" width="85" height="64" border="0" />--}}
{{--                                                                                    </a>--}}
{{--                                                                                </td>--}}
{{--                                                                                <td width="85" height="85" align="center" valign="middle">--}}
{{--                                                                                    <a href="upload/event01_03.jpg" class="lightwindow" rel="subject[巴福越嶺]" title="巴福越嶺" caption="此處海拔約1500公尺，整齊平坦沿緩坡而下，林蔭大樹紛立兩旁、紅檜林延綿不斷，更深遠處則有闊葉林、雜木林、冷杉、鐵杉、臺灣杉等的原始林相；林間輕裝行走十分舒服。">--}}
{{--                                                                                        <img src="{{{ asset('upload/event01_03.jpg') }}}" alt="" width="85" height="64" border="0" />--}}
{{--                                                                                    </a>--}}
{{--                                                                                </td>--}}
{{--                                                                                <td width="85" height="85" align="center" valign="middle">--}}
{{--                                                                                    <a href="{{{ asset('upload/event02_01.jpg') }}}" class="lightwindow" rel="subject[巴福越嶺]" title="巴福越嶺" caption="此處海拔約1500公尺，整齊平坦沿緩坡而下，林蔭大樹紛立兩旁、紅檜林延綿不斷，更深遠處則有闊葉林、雜木林、冷杉、鐵杉、臺灣杉等的原始林相；林間輕裝行走十分舒服。"><img src="upload/event02_01.jpg" alt="" width="48" height="64" border="0" /></a>--}}
{{--                                                                                </td>--}}
{{--                                                                                <td width="85" height="85" align="center" valign="middle">--}}
{{--                                                                                    <a href="{{{ asset('upload/event03_01.jpg') }}}" class="lightwindow" rel="subject[巴福越嶺]" title="巴福越嶺" caption="此處海拔約1500公尺，整齊平坦沿緩坡而下，林蔭大樹紛立兩旁、紅檜林延綿不斷，更深遠處則有闊葉林、雜木林、冷杉、鐵杉、臺灣杉等的原始林相；林間輕裝行走十分舒服。"><img src="upload/event03_01.jpg" alt="" width="85" height="64" border="0" />--}}
{{--                                                                                    </a>--}}
{{--                                                                                </td>--}}
                                                                                <td align="center" valign="middle">
                                                                                    <a href="">
                                                                                        <img src="{{{ asset('images/btn_next.png') }}}" width="18" height="15" border="0" />
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table></td>
                                                        <td align="left" style="background:url({{ asset('images/log_bg_06.png') }}) no-repeat left top">&nbsp;</td>
                                                    </tr>
                                                    <tr valign="top">
                                                        <td height="15" align="right">
                                                            <img src="{{{ asset('images/log_bg_07.png') }}}" alt="" width="15" height="15" />
                                                        </td>
                                                        <td style="background:url({{ asset('images/log_bg_08.png') }}) top repeat-x">&nbsp;
                                                        </td>
                                                        <td align="left"><img src="{{{ asset('images/log_bg_09.png') }}}" alt="" width="15" height="15" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">&nbsp;</td>
                                        </tr>
                                    </table>                    <img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" />
                                </td>
                                <td align="left" style="background:url({{ asset('images/line-05.png') }}) left repeat-y">&nbsp;
                                </td>
                            </tr>
                            <tr valign="top">
                                <td align="right" style="background:url({{ asset('images/line-04.png') }}) repeat-y right">
                                    <img src="{{{ asset('images/line003.png') }}}" alt="" width="9" height="6" align="right" />
                                </td>
                                <td align="center" valign="middle" style="background:url({{ asset('images/line004.png') }}) repeat-x top">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td height="6" align="left" valign="bottom">
                                                <img src="{{{ asset('images/li.png') }}}" width="1" height="1" />
                                                <a name="message" id="message"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="50" align="left" valign="bottom" bgcolor="#CDBFA2">
                                                <img src="{{{ asset('images/title-08.png') }}}" width="144" height="21" hspace="30" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="150" align="center" valign="middle" bgcolor="#CDBFA2" style="border-bottom:#97866d 1px dotted">
                                                <table width="520" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="120" align="left" valign="top">
                                                            <span class="member_name">會員名稱</span><br />
                                                            <span class="top_txt5a4f3f">
                                                                發表於 2011/02/25
                                                            </span>
                                                        </td>
                                                        <td align="left" valign="top" class="txt13_313131">
                                                            有同事掛病號…因為穿了一般的球鞋，腳踝扭傷，<br />
                                                            還好我們帶了壯丁數名，大家一路護送她下山，<br />
                                                            其實還滿配服我們這位同事的，雖然腳再痛，她還是忍下來了，超勇敢。
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="150" align="center" valign="middle" bgcolor="#CDBFA2">
                                                <table border="0" cellpadding="0" cellspacing="5">
                                                    <tr>
                                                        <td width="100" align="center" valign="middle" class="title_5a4f3f">留言主旨
                                                        </td>
                                                        <td align="left" valign="middle" class="top_txt5a4f3f">
                                                            <input name="textfield" type="text" class="top_txt5a4f3f" id="textfield"  style="width:200px"/>
                                                        </td>
                                                        <td align="left" valign="middle" class="top_txt5a4f3f">&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="100" align="center" valign="top" class="title_5a4f3f">留言內容
                                                        </td>
                                                        <td align="left" valign="top" class="top_txt5a4f3f">
                                                            <label for="textarea"></label>
                                                            <textarea name="textarea" cols="45" rows="5" class="top_txt5a4f3f" id="textarea" style="width:350px">

                                                            </textarea>
                                                        </td>
                                                        <td align="left" valign="bottom" class="top_txt5a4f3f">
                                                            <table width="100" border="0" cellpadding="0" cellspacing="0" class="btn_bg">
                                                                <tr>
                                                                    <td align="center" valign="middle" class="btn_bg">
                                                                        <a href="service_01.html" class="btn_bg">確認送出</a>
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
                                <td align="left" style="background:url({{{ asset('images/line-05.png') }}}) left repeat-y">
                                    <img src="{{{ asset('images/line002.png') }}}" alt="" width="11" height="6" />
                                </td>
                            </tr>
                            <tr valign="top">
                                <td height="20" align="right" >
                                    <img src="{{{ asset('images/line003.png') }}}" alt="" width="9" height="6" align="right" />
                                </td>
                                <td height="20" align="right" style="background:url({{{ asset('images/line004.png') }}}) repeat-x top">&nbsp;
                                </td>
                                <td height="20" align="left">
                                    <img src="{{{ asset('images/line002.png') }}}" alt="" width="11" height="6" />
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
            <!-- InstanceEndEditable --></td>
    </tr>
@endsection
