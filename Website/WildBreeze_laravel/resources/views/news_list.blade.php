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
                                                <table width="100%" border="0" cellspacing="0" cellpadding="5">
                                                    <tr>
                                                        <td width="520" class="titleB">
                                                            <img src="{{{ asset('images/titlebar.png') }}}" alt="" width="10" height="15" align="absmiddle" /> 消息標題
                                                        </td>
                                                        <td width="120" align="center" class="titleB">發佈日期</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="11" align="left">
                                                <img src="{{{ asset('images/line-03.png') }}}" alt="" width="11" height="40" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" align="right" style="background:url({{ asset('images/line-04.png') }}) repeat-y right">&nbsp;</td>
                                            <td align="center" valign="top" bgcolor="#CDBFA2">
                                                <table width="98%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="20" height="40" align="center" valign="middle" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid">‧
                                                        </td>
                                                        <td align="left" valign="middle"style="border-bottom:#97866d 1px solid">
                                                            <a href="news_01.html" class="list_5a4f3f_a">慶祝Wild Breeze網站正式上線，凡加入會員即可享受獨享好禮！</a></td>
                                                        <td width="120" align="center" valign="middle" class="top_txt5a4f3f"style="border-bottom:#97866d 1px solid"> 2010.12.31</td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td rowspan="2" align="left" style="background:url({{ asset('images/line-05.png') }}) left repeat-y">&nbsp;</td>
                                        </tr>
                                        @include('layouts.pagination')
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!-- InstanceEndEditable --></td>
    </tr>
@endsection
