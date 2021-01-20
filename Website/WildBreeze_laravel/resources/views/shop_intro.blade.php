@extends('layouts.app')
@section('content')
<tr>
    <td align="center" valign="top"><!-- InstanceBeginEditable name="content" -->
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="220" align="left" valign="top">
                    <table width="220" border="0" align="left" cellpadding="0" cellspacing="0">
                        <tr>
                            <td height="10">
                                <img src="{{{ asset( 'images/li.png') }}}') }}}" alt="" width="1" height="1" />
                            </td>
                        </tr>
                        @include('layouts.categories')
{{--                            <tr>--}}
{{--                                <td align="center" valign="top"><table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--                                        <tr>--}}
{{--                                            <td colspan="3" align="center" valign="bottom"><img src="{{{ asset( 'images/catalog.png') }}}" alt="" width="220" height="35" /></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td align="right" style="background:url({{{ asset( 'images/ad-13.png') }}}) repeat-y right">&nbsp;</td>--}}
{{--                                            <td width="200" align="left" bgcolor="#C9BDA2"><table width="100%" border="0" cellspacing="5" cellpadding="0">--}}
{{--                                                    <tr>--}}
{{--                                                        <td align="left" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">服飾區</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td align="left" valign="middle" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--                                                                <tr>--}}
{{--                                                                    <td height="25" align="left" valign="middle"><a href="shop_catalog.html" class="item_name">男款 Men</a></td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">女款 Women</a></td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">兒童款 Kid</a></td>--}}
{{--                                                                </tr>--}}
{{--                                                            </table></td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td align="left" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">裝備區</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td align="left" valign="middle" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--                                                                <tr>--}}
{{--                                                                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">水類</a></td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">攀岩類</a></td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">自行車類</a></td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">RV 裝備類</a></td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">旅遊類</a></td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">登山露營類</a></td>--}}
{{--                                                                </tr>--}}
{{--                                                            </table></td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td align="left" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">鞋襪區</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--                                                                <tr>--}}
{{--                                                                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">鞋子類</a></td>--}}
{{--                                                                </tr>--}}
{{--                                                                <tr>--}}
{{--                                                                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">襪子類</a></td>--}}
{{--                                                                </tr>--}}
{{--                                                            </table></td>--}}
{{--                                                    </tr>--}}
{{--                                                </table></td>--}}
{{--                                            <td align="left" style="background:url({{{ asset( 'images/ad-15.png') }}}) repeat-y left">&nbsp;</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td align="right" valign="top"><img src="{{{ asset( 'images/ad-16.png') }}}" alt="" width="10" height="9" /></td>--}}
{{--                                            <td valign="top" style="background:url({{{ asset( 'images/ad-17.png') }}}) repeat-x top">&nbsp;</td>--}}
{{--                                            <td align="left" valign="top"><img src="{{{ asset( 'images/ad-18.png') }}}" alt="" width="10" height="9" /></td>--}}
{{--                                        </tr>--}}
{{--                                    </table></td>--}}
{{--                            </tr>--}}
                        @include('layouts.recommended_products')
{{--                            <tr>--}}
{{--                                <td height="10">--}}
{{--                                    <img src="{{{ asset( 'images/li.png') }}}') }}}" alt="" width="1" height="1" />--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td align="center" valign="middle">--}}
{{--                                    <table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--                                        <tr>--}}
{{--                                            <td colspan="3" align="center" valign="bottom">--}}
{{--                                                <img src="{{{ asset( 'images/mustbuy.png') }}}" alt="" width="220" height="35" />--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td rowspan="3" align="right" style="background:url({{{ asset( 'images/ad-13.png') }}}) repeat-y right">&nbsp;</td>--}}
{{--                                            <td width="200" align="center" bgcolor="#e2e2e2" style="border-bottom:#97866d 1px dotted">--}}
{{--                                                <table width="190" border="0" cellspacing="5" cellpadding="0">--}}
{{--                                                    <tr>--}}
{{--                                                        <td colspan="2" align="left" valign="top" class="txtB_5a4f3f">--}}
{{--                                                            <a href="shop_intro.html" class="txtB_5a4f3f">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a>--}}
{{--                                                        </td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td align="center" valign="middle">--}}
{{--                                                            <div style="border:1px solid #5a4f3f">--}}
{{--                                                                <a href="shop_intro.html">--}}
{{--                                                                    <img src="{{{ asset( 'images/item_pic01.jpg') }}}" alt="" width="89" height="89" border="0" align="absmiddle" />--}}
{{--                                                                </a>--}}
{{--                                                            </div>--}}
{{--                                                        </td>--}}
{{--                                                        <td align="left" valign="top" class="top_txt5a4f3f">--}}
{{--                                                            ◆最高規格防風防水透氣GORE-TEX Paclite Shell布料 ...--}}
{{--                                                        </td>--}}
{{--                                                    </tr>--}}
{{--            <tr>--}}
{{--            <td height="25" colspan="2" align="center" valign="bottom">--}}
{{--                <table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--            <tr valign="middle">--}}
{{--            <td align="left">--}}
{{--                <img src="{{{ asset( 'images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" />--}}
{{--                <a href="shop_intro.html" class="top_txt5a4f3f_a">詳細說明</a>--}}
{{--            </td>--}}
{{--                                                        <td align="right">--}}
{{--                                                            <img src="{{{ asset( 'images/cart_01.png') }}}" alt="" width="17" height="16" />--}}
{{--                                                            <a href="cart_01.html" class="top_txt5a4f3f_a">放入購物車</a>--}}
{{--                                                        </td>--}}
{{--                                                    </tr>--}}
{{--                                                </table>--}}
{{--            </td>--}}
{{--                                        </tr>--}}
{{--                                    </table>--}}
{{--                                            </td>--}}
{{--                                <td rowspan="3" align="left" style="background:url({{{ asset( 'images/ad-15.png') }}}) repeat-y left">&nbsp;</td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td align="center" bgcolor="#e2e2e2" style="border-bottom:#97866d 1px dotted"><table width="190" border="0" cellspacing="5" cellpadding="0">--}}
{{--                                        <tr>--}}
{{--                                            <td colspan="2" align="left" valign="top" class="txtB_5a4f3f"><a href="#" class="txtB_5a4f3f">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td align="center" valign="middle"><div style="border:1px solid #5a4f3f"><a href="#"><img src="{{{ asset( 'images/item_pic01.jpg') }}}" alt="" width="89" height="89" border="0" align="absmiddle" /></a></div></td>--}}
{{--            <td align="left" valign="top" class="top_txt5a4f3f">◆最高規格防風防水透氣GORE-TEX Paclite Shell布料 ...</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--            <td height="25" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--            <tr valign="middle">--}}
{{--            <td align="left">--}}
{{--                <img src="{{{ asset( 'images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--                                            <td align="right"><img src="{{{ asset( 'images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--                                        </tr>--}}
{{--                                    </table>--}}
{{--            </td>--}}
{{--                            </tr>--}}
{{--                        </table>--}}
{{--                                </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td align="center" bgcolor="#e2e2e2" style="border-bottom:#97866d 1px dotted"><table width="190" border="0" cellspacing="5" cellpadding="0">--}}
{{--                            <tr>--}}
{{--                                <td colspan="2" align="left" valign="top" class="txtB_5a4f3f"><a href="#" class="txtB_5a4f3f">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td align="center" valign="middle"><div style="border:1px solid #5a4f3f"><a href="#"><img src="{{{ asset( 'images/item_pic01.jpg') }}}" alt="" width="89" height="89" border="0" align="absmiddle" /></a></div></td>--}}
{{--            <td align="left" valign="top" class="top_txt5a4f3f">◆最高規格防風防水透氣GORE-TEX Paclite Shell布料 ...</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--            <td height="25" colspan="2" align="center" valign="bottom">--}}
{{--                <table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--            <tr valign="middle">--}}
{{--            <td align="left"><img src="{{{ asset( 'images/more_01.png') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--                                <td align="right"><img src="{{{ asset( 'images/cart_01.png') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        </table>--}}
{{--            </td>--}}
{{--                </tr>--}}
{{--            </table>--}}
{{--                    </td>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td align="right" valign="top"><img src="{{{ asset( 'images/ad-16.png') }}}" alt="" width="10" height="9" /></td>--}}
{{--        <td valign="top" style="background:url({{{ asset( 'images/ad-17.png') }}}) repeat-x top">&nbsp;</td>--}}
{{--        <td align="left" valign="top">--}}
{{--            <img src="{{{ asset( 'images/ad-18.png') }}}" alt="" width="10" height="9" />--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--    </table>--}}
{{--                                </td>--}}
{{--    </tr>--}}
        <tr>
            <td height="10">
                <img src="{{{ asset( 'images/li.png') }}}') }}}" alt="" width="1" height="1" />
            </td>
        </tr>
    </table>
</td>
    <td align="right" valign="top">
        <table width="660" border="0" cellspacing="0" cellpadding="0">
            <tr valign="bottom">
                <td height="10" colspan="3" align="right">
                    <img src="{{{ asset( 'images/li.png') }}}') }}}" alt="" width="1" height="1" />
                </td>
            </tr>
            <tr valign="bottom">
                <td width="15" height="15" align="right">
                    <img src="{{{ asset( 'images/log_bg_01.png') }}}" alt="" width="15" height="15" />
                </td>
                <td style="background:url({{{ asset( 'images/log_bg_02.png') }}}) repeat-x bottom">&nbsp;</td>
                <td width="15" align="left">
                    <img src="{{{ asset( 'images/log_bg_03.png') }}}" alt="" width="15" height="15" />
                </td>
            </tr>
            <tr>
                <td align="right" bgcolor="#FFFFFF" style="background:url({{{ asset( 'images/log_bg_04.png') }}}) repeat-y right top">&nbsp;</td>
                <td align="center" valign="top" bgcolor="#FFFFFF" style="background:url({{{ asset( 'images/log_bg_05.png') }}}) repeat-x">
                    <table width="100%" border="0" cellspacing="0" cellpadding="10">
                        <tr>
                            <td rowspan="6" align="center" valign="middle">
                                <img src="upload/item_pic02_2.jpg') }}}" alt="" width="280" height="280" />
                            </td>
                            <td colspan="2" align="left" class="item_title">THE NORTH FACE
                                DIEZ JACKET 800FP 男羽絨外套
                            </td>
                        </tr>
                        <tr>
                            <td width="70" align="right" class="title_5a4f3f">立即購買 :</td>
                            <td width="200" align="left" class="price_redB">$8330</td>
                        </tr>
                        <tr>
                            <td align="right" class="title_5a4f3f">庫存狀況 :</td>
                            <td width="200" align="left" class="top_txt5a4f3f">補貨中</td>
                        </tr>
                        <tr>
                            <td align="right" class="title_5a4f3f">顏色尺寸 :</td>
                            <td width="200" align="left" class="top_txt5a4f3f">
                                <label for="select2"></label>
                                <select name="select3" class="top_txtc9bc9c" id="select2" style="background:#5a4f3f">
                                    <option>瀝灰-S</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" class="title_5a4f3f">購買數量 :</td>
                            <td width="200" align="left" class="top_txt5a4f3f">
                                <select name="select3" class="top_txtc9bc9c" id="select3" style="background:#5a4f3f">
                                    <option>缺貨中</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right" valign="top" class="title_5a4f3f" style="border-top:#97866d 1px dotted">
                                <table border="0" cellspacing="5" cellpadding="0">
                                    <tr>
                                        <td bgcolor="#4D4234"><a href="cart_01.html" class="btn_bg">立即結帳</a></td>
                                        <td bgcolor="#4D4234"><a href="cart_01.html" class="btn_bg">放入購物車</a></td>
                                        <td width="105" align="right" valign="top" class="top_txt60412F">分享：
                                            <a href="#" target="_blank">
                                                <img src="{{{ asset( 'images/icon_fb.png') }}}" alt="" width="14" height="14" border="0" align="middle" />
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center" valign="middle">
                                <img src="upload/item_pic004.jpg') }}}" width="600" height="720" />
                                <br /><br />
                                <img src="upload/item_pic005.jpg') }}}" width="600" height="864" />
                                <br /><br />
                                <img src="upload/item_pic002.jpg') }}}" width="600" height="363" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center" valign="middle">
                                <table width="600" border="0" cellspacing="10" cellpadding="0">
                                    <tr valign="top">
                                        <td width="50%" align="left">
                                            <img src="{{{ asset( 'images/more_01.png') }}}" alt="" width="11" height="11" align="middle" />
                                            <span class="member_name"> 商品規格</span>
                                            <br /><br />
                                            <span class="title_5a4f3f">材質：</span>
                                            <span class="top_txt5a4f3f">10D 25g/m ²PERTEX SYNCRO-100%尼龍布</span>
                                            <br />
                                            <span class="title_5a4f3f">填充物：</span>
                                            <span class="top_txt5a4f3f">800 FP 天然鵝絨 </span>
                                            <br />
                                            <span class="title_5a4f3f">重量：</span>
                                            <span class="top_txt5a4f3f">308g</span><br />
                                            <span class="title_5a4f3f">顏色：</span>
                                            <span class="top_txt5a4f3f">瀝灰、黑色</span>
                                        </td>
                                        <td width="50%" align="left" class="top_txt5a4f3f">
                                            <img src="{{{ asset( 'images/more_01.png') }}}" alt="" width="11" height="11" align="middle" />
                                            <span class="member_name"> 注意事項</span>
                                            <br/><br />
                                            ‧深淺色請分開洗滌。<br />
                                            ‧建議反面洗滌以保色彩亮麗如新。<br />
                                            ‧純棉材質不可烘乾，以免衣物縮水。<br />
                                            ‧ 避免使用添加螢光增白劑之洗潔劑<br />
                                            ‧請包覆洗衣袋洗滌，以免衣物變形。</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="left" bgcolor="#FFFFFF" style="background:url({{{ asset( 'images/log_bg_06.png') }}}) repeat-y left top">&nbsp;
                </td>
            </tr>
            <tr valign="top">
                <td height="15" align="right">
                    <img src="{{{ asset( 'images/log_bg_07.png') }}}" alt="" width="15" height="15" />
                </td>
                <td style="background:url({{{ asset( 'images/log_bg_08.png') }}}) top repeat-x">&nbsp;</td>
                <td align="left">
                    <img src="{{{ asset( 'images/log_bg_09.png') }}}" alt="" width="15" height="15" />
                </td>
            </tr>
        </table>
                <table width="660" border="0" align="right" cellpadding="0" cellspacing="0">
                    <tr>                  </tr>
                </table>
             </td>
        </tr>
    </table>
<!-- InstanceEndEditable -->
</td>
</tr>
@endsection


