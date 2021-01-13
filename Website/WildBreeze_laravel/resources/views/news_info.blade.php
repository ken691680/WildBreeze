@extends('layouts.app')
@section('content')
<tr>
    <td align="center" valign="top"><!-- InstanceBeginEditable name="content" -->
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="middle">
                    <table width="900" border="0" align="center" cellpadding="5" cellspacing="0">
                        <tr>
                            <td height="5">
                                <img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" />
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="middle" bgcolor="#FFFFFF">
                                <img src="{{{ asset('images/banner_news.jpg') }}}" alt="" width="890" height="130" />
                            </td>
                        </tr>
                        <tr>
                            <td height="15">
                                <img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" valign="top">
                    <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="220" align="left" valign="top">
                                <table width="220" border="0" align="left" cellpadding="0" cellspacing="0">
                                    @include('layouts.netizens_praise')
                                    @include('layouts.advertising')
                                    @include('layouts.advertising')
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
                                            <span class="root_red">最新消息</span>
                                        </td>
                                    </tr>
                                    <tr valign="bottom">
                                        <td width="9" align="right">
                                            <img src="{{{ asset('images/line-02.png') }}}" alt="" width="9" height="40" />
                                        </td>
                                        <td align="left" valign="middle" class="titleB" style="background:url({{ asset('images/line.png') }}) bottom repeat-x">
                                            <img src="{{{ asset('images/titlebar.png') }}}" width="10" height="15" align="absmiddle" /> 慶祝Wild Breeze網站正式上線，凡加入會員即可享受獨享好禮！
                                        </td>
                                        <td width="11" align="left">
                                            <img src="{{{ asset('images/line-03.png') }}}" alt="" width="11" height="40" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" style="background:url({{ asset('images/line-04.png') }}) repeat-y right">&nbsp;
                                        </td>
                                        <td align="left" valign="top" bgcolor="#CDBFA2" class="txt13_313131">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                                                <tr>
                                                    <td align="left" valign="top">
                                                        <img src="{{ asset('images/news_pic01.jpg') }}" width="300" height="200" />
                                                    </td>
                                                    <td align="left" valign="top">
                                                        台北的亞馬遜--哈盆古道原住民文化體驗
                                                    ~~登山新手絕佳的山野體驗！
                                                    <br />
                                                    爬山老手新鮮的獵人嘗試！
                                                    一個不容錯過的難得經驗，想要、就趕快來！
                                                    <br />
                                                    < 獵人體驗真有趣 >
                                                    一趟豐富充實的原住民傳統文化之旅，搭配簡短的行程規劃，還有獵人嚮導一路與您說說笑笑，從動植物生態講解到原住民傳統器具使用，都有詳盡且有趣的介紹。中午獵人還會教您如何烹煮山產野菜，在溪邊享用一頓豐盛的原住民風味佳餚。
                                                    獵人的幽默，獵人的智慧，獵人的談笑風生，更能引領您融入大自然，進而忘卻行走的辛勞。讓登山健行不再只是埋頭苦行，而是一場生態與人文的饗宴。
                                                    野遊風戶外休閒專業團隊將帶您遠離塵囂，走入山林，投向大自然的懷抱。為喜愛戶外活動的您量身打造一趟原始卻易親近的台北亞馬遜之旅—哈盆古道原住民文化體驗一日健行。
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="left" valign="top">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td height="25" align="right" valign="bottom" style="border-top:1px solid #97866d">
                                                                    <a href="/news/list" class="top_txt5a4f3f_a">回列表</a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                        </table>
                                        </td>
                                        <td align="left" style="background:url({{ asset('images/line-05.png') }}) left repeat-y">&nbsp;
                                        </td>
                                    </tr>
                                    <tr valign="top">
                                        <td align="right">
                                            <img src="{{{ asset('images/line-06.png') }}}" alt="" width="9" height="10" align="right" />
                                        </td>
                                        <td style="background:url({{ asset('images/line-07.png') }}) repeat-x top">&nbsp;
                                        </td>
                                        <td align="left">
                                            <img src="{{{ asset('images/line-08.png') }}}" alt="" width="11" height="10" />
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
