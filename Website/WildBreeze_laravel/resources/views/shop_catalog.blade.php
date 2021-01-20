@extends('layouts.app')
@section('content')
<tr>
    <td align="center" valign="top"><!-- InstanceBeginEditable name="content" -->
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="220" align="left" valign="top">
                    <table width="220" border="0" align="left" cellpadding="0" cellspacing="0">
                        @include('layouts.categories')
{{--                <tr>--}}
{{--                <td height="10"><img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" /></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="center" valign="top"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--                <tr>--}}
{{--                <td colspan="3" align="center" valign="bottom"><img src="{{{ asset('images/catalog.png') }}}" alt="" width="220" height="35" /></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="right" style="background:url({{{ asset('images/ad-13.png') }}}) repeat-y right">&nbsp;</td>--}}
{{--                <td width="200" align="center" bgcolor="#C9BDA2"><table width="100%" border="0" cellspacing="5" cellpadding="0">--}}
{{--                <tr>--}}
{{--                <td align="left" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">服飾區</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="left" valign="middle" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--                <tr>--}}
{{--                <td height="25" align="left" valign="middle"><a href="shop_catalog.html" class="item_name">男款 Men</a></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td height="25" align="left" valign="middle"><a href="#" class="item_name">女款 Women</a></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td height="25" align="left" valign="middle"><a href="#" class="item_name">兒童款 Kid</a></td>--}}
{{--                </tr>--}}
{{--                </table></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="left" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">裝備區</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="left" valign="middle" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--                <tr>--}}
{{--                <td height="25" align="left" valign="middle"><a href="#" class="item_name">水類</a></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td height="25" align="left" valign="middle"><a href="#" class="item_name">攀岩類</a></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td height="25" align="left" valign="middle"><a href="#" class="item_name">自行車類</a></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td height="25" align="left" valign="middle"><a href="#" class="item_name">RV 裝備類</a></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td height="25" align="left" valign="middle"><a href="#" class="item_name">旅遊類</a></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td height="25" align="left" valign="middle"><a href="#" class="item_name">登山露營類</a></td>--}}
{{--                </tr>--}}
{{--                </table></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="left" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">鞋襪區</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--                <tr>--}}
{{--                <td height="25" align="left" valign="middle"><a href="#" class="item_name">鞋子類</a></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td height="25" align="left" valign="middle"><a href="#" class="item_name">襪子類</a></td>--}}
{{--                </tr>--}}
{{--                </table></td>--}}
{{--                </tr>--}}
{{--                </table></td>--}}
{{--                <td align="left" style="background:url({{{ asset('images/ad-15.png') }}}) repeat-y left">&nbsp;</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="right" valign="top"><img src="{{{ asset('images/ad-16.png') }}}" alt="" width="10" height="9" /></td>--}}
{{--                <td valign="top" style="background:url({{{ asset('images/ad-17.png') }}}) repeat-x top">&nbsp;</td>--}}
{{--                <td align="left" valign="top"><img src="{{{ asset('images/ad-18.png') }}}" alt="" width="10" height="9" /></td>--}}
{{--                </tr>--}}
{{--                </table></td>--}}
{{--                </tr>--}}
                        @include('layouts.recommended_products')
{{--                <tr>--}}
{{--                <td height="10"><img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" /></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="center" valign="middle"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--                <tr>--}}
{{--                <td colspan="3" align="center" valign="bottom"><img src="{{{ asset('images/mustbuy.png') }}}" alt="" width="220" height="35" /></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td rowspan="3" align="right" style="background:url({{{ asset('images/ad-13.png') }}}) repeat-y right">&nbsp;</td>--}}
{{--                <td width="200" align="center" bgcolor="#e2e2e2" style="border-bottom:#97866d 1px dotted"><table width="190" border="0" cellspacing="5" cellpadding="0">--}}
{{--                <tr>--}}
{{--                <td colspan="2" align="left" valign="top" class="txtB_5a4f3f"><a href="#" class="txtB_5a4f3f">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="center" valign="middle"><div style="border:1px solid #5a4f3f"><a href="#">--}}
{{--                            <img src="{{{ asset('images/item_pic01.jpg') }}}g') }}}" alt="" width="89" height="89" border="0" align="absmiddle" /></a></div></td>--}}
{{--                <td align="left" valign="top" class="top_txt5a4f3f">◆最高規格防風防水透氣GORE-TEX Paclite Shell布料 ...</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td height="25" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--                <tr valign="middle">--}}
{{--                <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--                <td align="right"><img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--                </tr>--}}
{{--                </table></td>--}}
{{--                </tr>--}}
{{--                </table>--}}
{{--                </td>--}}
{{--                <td rowspan="3" align="left" style="background:url({{{ asset('images/ad-15.png') }}}) repeat-y left">&nbsp;</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="center" bgcolor="#e2e2e2" style="border-bottom:#97866d 1px dotted"><table width="190" border="0" cellspacing="5" cellpadding="0">--}}
{{--                <tr>--}}
{{--                <td colspan="2" align="left" valign="top" class="txtB_5a4f3f"><a href="#" class="txtB_5a4f3f">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="center" valign="middle"><div style="border:1px solid #5a4f3f"><a href="#"><img src="{{{ asset('images/item_pic01.jpg') }}}g') }}}" alt="" width="89" height="89" border="0" align="absmiddle" /></a></div></td>--}}
{{--                <td align="left" valign="top" class="top_txt5a4f3f">◆最高規格防風防水透氣GORE-TEX Paclite Shell布料 ...</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td height="25" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--                <tr valign="middle">--}}
{{--                <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--                <td align="right"><img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--                </tr>--}}
{{--                </table></td>--}}
{{--                </tr>--}}
{{--                </table>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" bgcolor="#e2e2e2" style="border-bottom:#97866d 1px dotted"><table width="190" border="0" cellspacing="5" cellpadding="0">--}}
{{--        <tr>--}}
{{--        <td colspan="2" align="left" valign="top" class="txtB_5a4f3f"><a href="#" class="txtB_5a4f3f">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" valign="middle"><div style="border:1px solid #5a4f3f"><a href="#"><img src="{{{ asset('images/item_pic01.jpg') }}}g" alt="" width="89" height="89" border="0" align="absmiddle" /></a></div></td>--}}
{{--        <td align="left" valign="top" class="top_txt5a4f3f">◆最高規格防風防水透氣GORE-TEX Paclite Shell布料 ...</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="25" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--        <tr valign="middle">--}}
{{--        <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--        <td align="right"><img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="right" valign="top"><img src="{{{ asset('images/ad-16.png') }}}" alt="" width="10" height="9" /></td>--}}
{{--        <td valign="top" style="background:url({{{ asset('images/ad-17.png') }}}) repeat-x top">&nbsp;</td>--}}
{{--        <td align="left" valign="top"><img src="{{{ asset('images/ad-18.png') }}}" alt="" width="10" height="9" /></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
                        @include('layouts.advertising')
{{--        <tr>--}}
{{--        <td height="10"><img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" /></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" valign="middle"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--        <tr>--}}
{{--        <td align="right" valign="bottom"><img src="{{{ asset('images/ad.png') }}}" alt="" width="10" height="10" /></td>--}}
{{--        <td valign="bottom" style="background:url({{{ asset('images/ad-10.png') }}}) repeat-x bottom">&nbsp;</td>--}}
{{--        <td align="left" valign="bottom"><img src="{{{ asset('images/ad-11.png') }}}" alt="" width="10" height="10" /></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="right" style="background:url({{{ asset('images/ad-13.png') }}}) repeat-y right">&nbsp;</td>--}}
{{--        <td width="200" bgcolor="#cabda1"><a href="#" target="_blank"><img src="{{{ asset('images/ad_pic01.jpg') }}}g" alt="" width="200" height="135" border="0" /></a></td>--}}
{{--        <td align="left" style="background:url({{{ asset('images/ad-15.png') }}}) repeat-y left">&nbsp;</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="right" valign="top"><img src="{{{ asset('images/ad-16.png') }}}" alt="" width="10" height="9" /></td>--}}
{{--        <td valign="top" style="background:url({{{ asset('images/ad-17.png') }}}) repeat-x top">&nbsp;</td>--}}
{{--        <td align="left" valign="top"><img src="{{{ asset('images/ad-18.png') }}}" alt="" width="10" height="9" /></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
                        @include('layouts.advertising')
{{--        <tr>--}}
{{--        <td height="10"><img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" /></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" valign="middle"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--        <tr>--}}
{{--        <td align="right" valign="bottom"><img src="{{{ asset('images/ad.png') }}}" alt="" width="10" height="10" /></td>--}}
{{--        <td valign="bottom" style="background:url({{{ asset('images/ad-10.png') }}}) repeat-x bottom">&nbsp;</td>--}}
{{--        <td align="left" valign="bottom"><img src="{{{ asset('images/ad-11.png') }}}" alt="" width="10" height="10" /></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="right" style="background:url({{{ asset('images/ad-13.png') }}}) repeat-y right">&nbsp;</td>--}}
{{--        <td width="200" bgcolor="#cabda1"><a href="#" target="_blank"><img src="{{{ asset('images/ad_pic01.jpg') }}}g" alt="" width="200" height="135" border="0" /></a></td>--}}
{{--        <td align="left" style="background:url({{{ asset('images/ad-15.png') }}}) repeat-y left">&nbsp;</td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="right" valign="top"><img src="{{{ asset('images/ad-16.png') }}}" alt="" width="10" height="9" /></td>--}}
{{--        <td valign="top" style="background:url({{{ asset('images/ad-17.png') }}}) repeat-x top">&nbsp;</td>--}}
{{--        <td align="left" valign="top"><img src="{{{ asset('images/ad-18.png') }}}" alt="" width="10" height="9" /></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
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
                    <td height="10" colspan="3" align="right">
                        <img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" />
                    </td>
                </tr>
                <tr valign="bottom">
                    <td width="9" align="right">
                        <img src="{{{ asset('images/line-02.png') }}}" alt="" width="9" height="40" />
                    </td>
                    <td align="left" valign="middle" class="titleB" style="background:url({{{ asset('images/line.png') }}}) bottom repeat-x">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="left" valign="middle">
                                    <img src="{{{ asset('images/titlebar.png') }}}" alt="" width="10" height="15" align="absmiddle" /> 男款Men 服飾區
                                </td>
                                <td align="right" valign="middle" class="member_name"><label for="select"></label>
                                    <select name="select" class="top_txtc9bc9c" id="select" style="background:#5a4f3f">
                                    <option selected="selected">防水透氣外套類</option>
                                    <option>外套類</option>
                                    <option>上衣類</option>
                                    <option>背心類</option>
                                    <option>褲子類</option>
                                    <option>服飾配件類</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="11" align="left">
                        <img src="{{{ asset('images/line-03.png') }}}" alt="" width="11" height="40" />
                    </td>
                </tr>
        <tr>
            <td rowspan="2" align="right" style="background:url({{{ asset('images/line-04.png') }}}) repeat-y right">&nbsp;
            </td>
        <td align="center" valign="top" bgcolor="#CDBFA2">
            <table width="640" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
        <td align="center" valign="middle" bgcolor="#F1ECE6">
            <table width="600" border="0" align="center" cellpadding="10" cellspacing="0">
                <tr valign="middle">
                    <td height="270" align="center" style="border-bottom:#97866d 1px solid">
                        <table width="150" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C">
                                    <a href="shop_intro.html">
                                        <img src="{{{ asset('images/item_pic01.jpg') }}}g" alt="" width="140" height="140" border="0" align="absmiddle" />
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td height="40" align="center" valign="middle">
                                    <a href="shop_intro.html" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a>
                                </td>
                            </tr>
                            <tr>
                                <td height="30" align="center" valign="top">
                                    <span class="title_5a4f3f">心動價：</span>
                                    <span class="price_redB">8330</span>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="middle">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr valign="middle">
                                            <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" />
                                                <a href="shop_intro.html" class="top_txt5a4f3f_a">詳細說明</a>
                                            </td>
                                            <td align="right">
                                                <img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" />
                                                <a href="#" class="top_txt5a4f3f_a">放入購物車</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
{{--        <td align="center" style="border-bottom:#97866d 1px solid"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--        <tr>--}}
{{--        <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset('images/item_pic01.jpg') }}}g" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="40" align="center" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="30" align="center" valign="top"><span class="title_5a4f3f">心動價：</span><span class="price_redB">8330</span></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--        <tr valign="middle">--}}
{{--        <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--        <td align="right"><img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        <td align="center" style="border-bottom:#97866d 1px solid"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--        <tr>--}}
{{--        <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset('images/item_pic01.jpg') }}}g" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="40" align="center" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="30" align="center" valign="top"><span class="title_5a4f3f">心動價：</span><span class="price_redB">8330</span></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--        <tr valign="middle">--}}
{{--        <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--        <td align="right"><img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        </table>--}}
{{--        </td>--}}
                </tr>
{{--        <tr valign="middle">--}}
{{--        <td height="270" align="center" style="border-bottom:#97866d 1px solid"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--        <tr>--}}
{{--        <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset('images/item_pic01.jpg') }}}g" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="40" align="center" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="30" align="center" valign="top"><span class="title_5a4f3f">心動價：</span><span class="price_redB">8330</span></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--        <tr valign="middle">--}}
{{--        <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--        <td align="right"><img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        <td align="center" style="border-bottom:#97866d 1px solid"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--        <tr>--}}
{{--        <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset('images/item_pic01.jpg') }}}g" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="40" align="center" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="30" align="center" valign="top"><span class="title_5a4f3f">心動價：</span><span class="price_redB">8330</span></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--        <tr valign="middle">--}}
{{--        <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--        <td align="right"><img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        <td align="center" style="border-bottom:#97866d 1px solid"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--        <tr>--}}
{{--        <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset('images/item_pic01.jpg') }}}g" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="40" align="center" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="30" align="center" valign="top"><span class="title_5a4f3f">心動價：</span><span class="price_redB">8330</span></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--        <tr valign="middle">--}}
{{--        <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--        <td align="right"><img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        <tr valign="middle">--}}
{{--        <td height="270" align="center" style="border-bottom:#97866d 1px solid"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--        <tr>--}}
{{--        <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset('images/item_pic01.jpg') }}}g" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="40" align="center" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="30" align="center" valign="top"><span class="title_5a4f3f">心動價：</span><span class="price_redB">8330</span></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--        <tr valign="middle">--}}
{{--        <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--        <td align="right"><img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        <td align="center" style="border-bottom:#97866d 1px solid"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--        <tr>--}}
{{--        <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset('images/item_pic01.jpg') }}}g" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="40" align="center" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="30" align="center" valign="top"><span class="title_5a4f3f">心動價：</span><span class="price_redB">8330</span></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--        <tr valign="middle">--}}
{{--        <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--        <td align="right"><img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        <td align="center" style="border-bottom:#97866d 1px solid"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--        <tr>--}}
{{--        <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset('images/item_pic01.jpg') }}}g" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="40" align="center" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="30" align="center" valign="top"><span class="title_5a4f3f">心動價：</span><span class="price_redB">8330</span></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--        <tr valign="middle">--}}
{{--        <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--        <td align="right"><img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        <tr valign="middle">--}}
{{--        <td height="270" align="center" style="border-bottom:#97866d 1px solid"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--        <tr>--}}
{{--        <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset('images/item_pic01.jpg') }}}g" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="40" align="center" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="30" align="center" valign="top"><span class="title_5a4f3f">心動價：</span><span class="price_redB">8330</span></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--        <tr valign="middle">--}}
{{--        <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--        <td align="right"><img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        <td align="center" style="border-bottom:#97866d 1px solid"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--        <tr>--}}
{{--        <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset('images/item_pic01.jpg') }}}g" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="40" align="center" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="30" align="center" valign="top"><span class="title_5a4f3f">心動價：</span><span class="price_redB">8330</span></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--        <tr valign="middle">--}}
{{--        <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--        <td align="right"><img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        <td align="center" style="border-bottom:#97866d 1px solid"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--        <tr>--}}
{{--        <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset('images/item_pic01.jpg') }}}g" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="40" align="center" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="30" align="center" valign="top"><span class="title_5a4f3f">心動價：</span><span class="price_redB">8330</span></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--        <tr valign="middle">--}}
{{--        <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--        <td align="right"><img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        <tr valign="middle">--}}
{{--        <td height="270" align="center" style="border-bottom:#97866d 1px solid"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--        <tr>--}}
{{--        <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset('images/item_pic01.jpg') }}}g" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="40" align="center" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="30" align="center" valign="top"><span class="title_5a4f3f">心動價：</span><span class="price_redB">8330</span></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--        <tr valign="middle">--}}
{{--        <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--        <td align="right"><img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        <td align="center" style="border-bottom:#97866d 1px solid"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--        <tr>--}}
{{--        <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset('images/item_pic01.jpg') }}}g" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="40" align="center" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="30" align="center" valign="top"><span class="title_5a4f3f">心動價：</span><span class="price_redB">8330</span></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--        <tr valign="middle">--}}
{{--        <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--        <td align="right"><img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        <td align="center" style="border-bottom:#97866d 1px solid"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--        <tr>--}}
{{--        <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset('images/item_pic01.jpg') }}}g" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="40" align="center" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td height="30" align="center" valign="top"><span class="title_5a4f3f">心動價：</span><span class="price_redB">8330</span></td>--}}
{{--        </tr>--}}
{{--        <tr>--}}
{{--        <td align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--        <tr valign="middle">--}}
{{--        <td align="left"><img src="{{{ asset('images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--        <td align="right"><img src="{{{ asset('images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
{{--        </table></td>--}}
{{--        </tr>--}}
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
            <td rowspan="2" align="left" style="background:url({{{ asset('images/line-05.png') }}}) left repeat-y">&nbsp;</td>
        </tr>
        <tr valign="top">
        <td height="10" bgcolor="#CDBFA2">
            <img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" /></td>
        </tr>
        @include('layouts.pagination')
{{--        <tr valign="top">--}}
{{--            <td align="right">--}}
{{--                <img src="{{{ asset('images/line_2.png') }}}" alt="" width="9" height="35" align="right" />--}}
{{--            </td>--}}
{{--            <td align="center" valign="middle" style="background:url({{{ asset('images/line_2-02.png') }}}) repeat-x top">--}}
{{--                <table border="0" cellspacing="0" cellpadding="0">--}}
{{--                    <tr>--}}
{{--                        <td height="5" colspan="3" align="right">--}}
{{--                            <img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" />--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td align="right">--}}
{{--                            <a href="#">--}}
{{--                                <img src="{{{ asset('images/btn_prev.png') }}}" alt="" width="17" height="15" hspace="10" border="0" />--}}
{{--                            </a>--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            <table border="0" cellpadding="0" cellspacing="0">--}}
{{--                                <tr>--}}
{{--                                    <td width="30" height="20" align="center" valign="middle" class="pages_txt4c4c4c">1</td>--}}
{{--                                    <td width="30" height="20" align="center" valign="middle">--}}
{{--                                        <div class="bg_pages" style="height:20px; width:30px; background:url({{{ asset('images/btn_bg01.png') }}}) no-repeat center">--}}
{{--                                            <a href="#" class="pages_4c4c4c_a">2</a>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td width="30" height="20" align="center" valign="middle">--}}
{{--                                        <div class="bg_pages" style="height:20px; width:30px; background:url({{{ asset('images/btn_bg01.png') }}}) no-repeat center">--}}
{{--                                            <a href="#" class="pages_4c4c4c_a">3</a>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td width="30" height="20" align="center" valign="middle">--}}
{{--                                        <div class="bg_pages" style="height:20px; width:30px; background:url({{{ asset('images/btn_bg01.png') }}}) no-repeat center">--}}
{{--                                            <a href="#" class="pages_4c4c4c_a">4</a>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td width="30" height="20" align="center" valign="middle">--}}
{{--                                        <div class="bg_pages" style="height:20px; width:30px; background:url({{{ asset('images/btn_bg01.png') }}}) no-repeat center">--}}
{{--                                            <a href="#" class="pages_4c4c4c_a">5</a>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            </table>--}}
{{--                        </td>--}}
{{--                        <td align="left">--}}
{{--                            <a href="#">--}}
{{--                                <img src="{{{ asset('images/btn_next.png') }}}" alt="" width="18" height="15" hspace="10" border="0" />--}}
{{--                            </a>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                </table>--}}
{{--            </td>--}}
{{--            <td align="left">--}}
{{--                <img src="{{{ asset('images/line_2-03.png') }}}" alt="" width="11" height="35" />--}}
{{--            </td>--}}
{{--        </tr>--}}
                        <tr valign="top">
                            <td height="20" colspan="3" align="right">
                                <img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" />
                            </td>
                        </tr>
                    </table>
                    <table width="660" border="0" align="right" cellpadding="0" cellspacing="0">
                        <tr>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    <!-- InstanceEndEditable -->
    </td>
</tr>
@endsection

