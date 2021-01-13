@extends('layouts.app')
@section('content')
<tr>
    <td align="center" valign="top"><!-- InstanceBeginEditable name="content" -->
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
            @include('layouts.banner')
{{--            <tr>--}}
{{--                <td align="center" valign="middle">--}}
{{--                    <table width="900" border="0" align="center" cellpadding="5" cellspacing="0">--}}
{{--                <tr>--}}
{{--                    <td height="5">--}}
{{--                        <img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" />--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td align="center" valign="middle" bgcolor="#FFFFFF">--}}
{{--                        <img src="images/banner_about.jpg" alt="" width="890" height="130" />--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td height="15"><img src="images/li.png" alt="" width="1" height="1" /></td>--}}
{{--                </tr>--}}
{{--                </table>--}}
{{--                </td>--}}
{{--            </tr>--}}
            <tr>
                <td align="center" valign="top">
                        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="220" align="left" valign="top">
                                    <table width="220" border="0" align="left" cellpadding="0" cellspacing="0">
                                        @include('layouts.netizens_praise')
                                        @include('layouts.advertising')
                                        @include('layouts.advertising')
                                        @include('layouts.advertising')
{{--                            <tr>--}}
{{--                            <td align="center" valign="middle"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--                            <tr>--}}
{{--                            <td align="right" valign="bottom"><img src="images/ad.png" alt="" width="10" height="10" /></td>--}}
{{--                            <td valign="bottom" style="background:url(images/ad-10.png) repeat-x bottom">&nbsp;</td>--}}
{{--                            <td align="left" valign="bottom"><img src="images/ad-11.png" alt="" width="10" height="10" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                            <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>--}}
{{--                            <td width="200" bgcolor="#cabda1"><a href="#" target="_blank"><img src="images/ad_pic01.jpg" alt="" width="200" height="135" border="0" /></a></td>--}}
{{--                            <td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                            <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>--}}
{{--                            <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>--}}
{{--                            <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>--}}
{{--                            </tr>--}}
{{--                            </table></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                            <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                            <td align="center" valign="middle"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--                            <tr>--}}
{{--                            <td align="right" valign="bottom"><img src="images/ad.png" alt="" width="10" height="10" /></td>--}}
{{--                            <td valign="bottom" style="background:url(images/ad-10.png) repeat-x bottom">&nbsp;</td>--}}
{{--                            <td align="left" valign="bottom"><img src="images/ad-11.png" alt="" width="10" height="10" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                            <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>--}}
{{--                            <td width="200" bgcolor="#cabda1"><a href="#" target="_blank"><img src="images/ad_pic01.jpg" alt="" width="200" height="135" border="0" /></a></td>--}}
{{--                            <td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                            <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>--}}
{{--                            <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>--}}
{{--                            <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>--}}
{{--                            </tr>--}}
{{--                            </table></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                            <td height="10"><img src="images/li.png" alt="" width="1" height="1" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                            <td align="center" valign="middle"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--                            <tr>--}}
{{--                            <td align="right" valign="bottom"><img src="images/ad.png" alt="" width="10" height="10" /></td>--}}
{{--                            <td valign="bottom" style="background:url(images/ad-10.png) repeat-x bottom">&nbsp;</td>--}}
{{--                            <td align="left" valign="bottom"><img src="images/ad-11.png" alt="" width="10" height="10" /></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                            <td align="right" style="background:url(images/ad-13.png) repeat-y right">&nbsp;</td>--}}
{{--                            <td width="200" bgcolor="#cabda1"><a href="#" target="_blank"><img src="images/ad_pic01.jpg" alt="" width="200" height="135" border="0" /></a></td>--}}
{{--                            <td align="left" style="background:url(images/ad-15.png) repeat-y left">&nbsp;</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                            <td align="right" valign="top"><img src="images/ad-16.png" alt="" width="10" height="9" /></td>--}}
{{--                            <td valign="top" style="background:url(images/ad-17.png) repeat-x top">&nbsp;</td>--}}
{{--                            <td align="left" valign="top"><img src="images/ad-18.png" alt="" width="10" height="9" /></td>--}}
{{--                            </tr>--}}
{{--                            </table></td>--}}
{{--                            </tr>--}}
                            </table>
                            </td>
                        <td align="right" valign="top">
                        <table width="660" border="0" align="right" cellpadding="0" cellspacing="0">
                        <tr valign="bottom">
                        <td height="25" colspan="3" align="left" valign="top"><span class="top_txt5a4f3f"><a href="#" class="top_txt5a4f3f_a">首頁</a> &gt; </span><span class="root_red">關於我們</span></td>
                        </tr>
                        <tr valign="bottom">
                        <td width="9" align="right"><img src="images/line-02.png" alt="" width="9" height="40" /></td>
                        <td width="640" align="left" valign="middle" class="titleB" style="background:url(images/line.png) bottom repeat-x"><img src="images/titlebar.png" width="10" height="15" align="absmiddle" /> 關於我們</td>
                        <td width="11" align="left"><img src="images/line-03.png" alt="" width="11" height="40" /></td>
                        </tr>
                        <tr>
                        <td align="right" style="background:url(images/line-04.png) repeat-y right">&nbsp;</td>
                        <td align="center" valign="top" bgcolor="#CDBFA2" class="txt13_313131"><table width="630" border="0" cellspacing="0" cellpadding="5">
                        <tr>
                        <td align="left" valign="top">1966年，兩位熱愛登山的年輕登山家在美西舊金山北部的濱水區創立了一家小型的登山用品專賣店，並且為它取名為Wild Breeze，開始設計生產專業的登山服裝與裝備；由於品質精良與傑出的產品設計，Wild Breeze很快的成為知名的戶外服裝領導品牌。<br />
                        <br />
                        Wild Breeze名字的由來是緣起於在北半球，山脊的北壁往往日照時間最短，是最寒冷、最多冰雪，對於登山者而言也是最具危險與挑戰性的區域，需要更好的技巧與最佳的裝備來克服；許多登山家皆以攀登山峰的北壁作為他們挑戰的終極目標。<br />
                        1968年起Wild Breeze開始設計並生產高功能性的專業登山服裝與器材，到了1980年初期，極限運動中的滑雪板也開始加入Wild Breeze的設計商品線；而在80年代末期，Wild Breeze已成為全美唯一供應最完備高功能性戶外服裝、滑雪服、睡袋、背包與帳棚的品牌。<br />
                        <br />
                        1996年春季，Wild Breeze率先以全系列高科技材質與創新結構的Tekware投入休閒運動服飾市場，帶給喜愛攀岩、健行、郊山、慢跑等戶外運動人仕最佳的功能性、舒適性選擇。<br />
                        <br />
                        Wild Breeze創立至40餘年，始終以最高的技術、設計專業戶外服裝、背包、裝備與鞋子，在全球市場上，Wild Breeze永遠都是成功登頂者、世界性探險隊、極限運動選手、極地探險家的最愛。Wild Breeze不斷的追求設計與性能的極限，讓每一位生命中充滿理想、熱血的探險家與戶外愛好者，盡情的挑戰自我的極限；同時在廿一世紀一開始的今天，肯定也將帶給這一個充滿生機的台灣戶外運動市場無窮的希望與未來!</td>
                        </tr>
                        </table></td>
                        <td align="left" style="background:url(images/line-05.png) left repeat-y">&nbsp;</td>
                        </tr>
                        <tr valign="top">
                        <td align="right">
                        <img src="images/line-06.png" alt="" width="9" height="10" align="right" />
                        </td>
                        <td style="background:url(images/line-07.png) repeat-x top">&nbsp;</td>
                        <td align="left">
                        <img src="images/line-08.png" alt="" width="11" height="10" />
                        </td>
                        </tr>
                        <tr valign="top">
                        <td height="5" colspan="3"><img src="images/li.png" alt="" width="1" height="1" /></td>
                        </tr>
                        <tr valign="top">
                        <td colspan="3" align="left"><a href="#">
                        <img src="images/ad_pic02.jpg" width="660" height="110" border="0" /></a>
                        </td>
                        </tr>
                        <tr valign="top">
                        <td height="5" colspan="3"><img src="images/li.png" alt="" width="1" height="1" /></td>
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

