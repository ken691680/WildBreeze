@extends('layouts.app')
@section('content')
<tr>
    <td align="center" valign="top"><!-- InstanceBeginEditable name="content" -->
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="220" align="left" valign="top">
                    <table width="220" border="0" align="left" cellpadding="0" cellspacing="0">
                        @include('layouts.advertising')
{{--                        <tr>--}}
{{--                            <td align="center" valign="top">--}}
{{--                                <table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--                                    <tr>--}}
{{--                                        <td align="right" valign="bottom">--}}
{{--                                            <img src="{{{ asset( 'images/ad.png ') }}}" alt="" width="10" height="10" />--}}
{{--                                        </td>--}}
{{--                                        <td height="21" valign="bottom" style="background:url({{{ asset( 'images/ad-10.png ') }}}) repeat-x bottom">&nbsp;--}}
{{--                                        </td>--}}
{{--                                        <td align="left" valign="bottom">--}}
{{--                                            <img src="{{{ asset( 'images/ad-11.png ') }}}" alt="" width="10" height="10" />--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td align="right" style="background:url({{{ asset( 'images/ad-13.png ') }}}) repeat-y right">&nbsp;</td>--}}
{{--                                        <td width="200" bgcolor="#cabda1">--}}
{{--                                            <a href="#" target="_blank">--}}
{{--                                                <img src="{{{ asset( 'images/ad_pic01.jpg ') }}}" alt="" width="200" height="135" border="0" />--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                        <td align="left" style="background:url({{{ asset( 'images/ad-15.png ') }}}) repeat-y left">&nbsp;</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td align="right" valign="top">--}}
{{--                                            <img src="{{{ asset( 'images/ad-16.png ') }}}" alt="" width="10" height="9" />--}}
{{--                                        </td>--}}
{{--                                        <td valign="top" style="background:url({{{ asset( 'images/ad-17.png ') }}}) repeat-x top">&nbsp;</td>--}}
{{--                                        <td align="left" valign="top">--}}
{{--                                            <img src="{{{ asset( 'images/ad-18.png ') }}}" alt="" width="10" height="9" />--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                </table>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
                        @include('layouts.categories')
{{--                <tr>--}}
{{--                    <td height="10">--}}
{{--                        <img src="{{{ asset( 'images/li.png ') }}}" alt="" width="1" height="1" />--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td align="center" valign="top">--}}
{{--                        <table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--                    <tr>--}}
{{--                        <td colspan="3" align="center" valign="bottom">--}}
{{--                            <img src="{{{ asset( 'images/catalog.png ') }}}" alt="" width="220" height="35" />--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td align="right" style="background:url({{{ asset( 'images/ad-13.png ') }}}) repeat-y right">&nbsp;</td>--}}
{{--                        <td width="200" align="center" bgcolor="#C9BDA2">--}}
{{--                            <table width="100%" border="0" cellspacing="5" cellpadding="0">--}}
{{--                                <tr>--}}
{{--                                    <td align="left" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">服飾區</td>--}}
{{--                                </tr>--}}
{{--                        <tr>--}}
{{--                            <td align="left" valign="middle" style="border-bottom:#97866d 1px dotted">--}}
{{--                                <table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--                                    <tr>--}}
{{--                                        <td height="25" align="left" valign="middle">--}}
{{--                                            <a href="shop_catalog.html" class="item_name">男款 Men</a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td height="25" align="left" valign="middle">--}}
{{--                                            <a href="#" class="item_name">女款 Women</a></td>--}}
{{--                                    </tr>--}}
{{--                                <tr>--}}
{{--                                <td height="25" align="left" valign="middle"><a href="#" class="item_name">兒童款 Kid</a></td>--}}
{{--                                </tr>--}}
{{--                                </table>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    <tr>--}}
{{--                    <td align="left" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">裝備區</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                    <td align="left" valign="middle" style="border-bottom:#97866d 1px dotted"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--                    <tr>--}}
{{--                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">水類</a></td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">攀岩類</a></td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">自行車類</a></td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">RV 裝備類</a></td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">旅遊類</a></td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">登山露營類</a></td>--}}
{{--                    </tr>--}}
{{--                    </table>--}}
{{--                    </td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                    <td align="left" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">鞋襪區</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                    <td align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--                    <tr>--}}
{{--                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">鞋子類</a></td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                    <td height="25" align="left" valign="middle"><a href="#" class="item_name">襪子類</a></td>--}}
{{--                    </tr>--}}
{{--                    </table></td>--}}
{{--                    </tr>--}}
{{--                    </table>--}}
{{--                    </td>--}}
{{--                    <td align="left" style="background:url({{{ asset( 'images/ad-15.png ') }}}) repeat-y left">&nbsp;</td>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                    <td align="right" valign="top"><img src="{{{ asset( 'images/ad-16.png ') }}}" alt="" width="10" height="9" /></td>--}}
{{--                    <td valign="top" style="background:url({{{ asset( 'images/ad-17.png ') }}}) repeat-x top">&nbsp;</td>--}}
{{--                    <td align="left" valign="top"><img src="{{{ asset( 'images/ad-18.png ') }}}" alt="" width="10" height="9" /></td>--}}
{{--                    </tr>--}}
{{--                    </table>--}}
{{--                    </td>--}}
{{--                </tr>--}}
                        @include('layouts.recommended_products')
{{--                <tr>--}}
{{--                <td height="10"><img src="{{{ asset( 'images/li.png ') }}}" alt="" width="1" height="1" /></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="center" valign="middle">--}}
{{--                <table width="220" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--                <tr>--}}
{{--                <td colspan="3" align="center" valign="bottom"><img src="{{{ asset( 'images/mustbuy.png ') }}}" alt="" width="220" height="35" /></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td rowspan="3" align="right" style="background:url({{{ asset( 'images/ad-13.png ') }}}) repeat-y right">&nbsp;</td>--}}
{{--                <td width="200" align="center" bgcolor="#e2e2e2" style="border-bottom:#97866d 1px dotted"><table width="190" border="0" cellspacing="5" cellpadding="0">--}}
{{--                <tr>--}}
{{--                <td colspan="2" align="left" valign="top" class="txtB_5a4f3f"><a href="shop_intro.html" class="txtB_5a4f3f">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="center" valign="middle"><div style="border:1px solid #5a4f3f"><a href="shop_intro.html"><img src="{{{ asset( 'images/item_pic01.jpg ') }}}" alt="" width="89" height="89" border="0" align="absmiddle" /></a></div></td>--}}
{{--                <td align="left" valign="top" class="top_txt5a4f3f">◆最高規格防風防水透氣GORE-TEX Paclite Shell布料 ...</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td height="25" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--                <tr valign="middle">--}}
{{--                <td align="left"><img src="{{{ asset( 'images/more_01.png ') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="shop_intro.html" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--                <td align="right"><img src="{{{ asset( 'images/cart_01.png ') }}}" alt="" width="17" height="16" /> <a href="cart_01.html" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--                </tr>--}}
{{--                </table></td>--}}
{{--                </tr>--}}
{{--                </table></td>--}}
{{--                <td rowspan="3" align="left" style="background:url({{{ asset( 'images/ad-15.png ') }}}) repeat-y left">&nbsp;</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="center" bgcolor="#e2e2e2" style="border-bottom:#97866d 1px dotted"><table width="190" border="0" cellspacing="5" cellpadding="0">--}}
{{--                <tr>--}}
{{--                <td colspan="2" align="left" valign="top" class="txtB_5a4f3f"><a href="#" class="txtB_5a4f3f">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="center" valign="middle"><div style="border:1px solid #5a4f3f"><a href="#"><img src="{{{ asset( 'images/item_pic01.jpg ') }}}" alt="" width="89" height="89" border="0" align="absmiddle" /></a></div></td>--}}
{{--                <td align="left" valign="top" class="top_txt5a4f3f">◆最高規格防風防水透氣GORE-TEX Paclite Shell布料 ...</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td height="25" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--                <tr valign="middle">--}}
{{--                <td align="left"><img src="{{{ asset( 'images/more_01.png ') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--                <td align="right"><img src="{{{ asset( 'images/cart_01.png ') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--                </tr>--}}
{{--                </table></td>--}}
{{--                </tr>--}}
{{--                </table></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="center" bgcolor="#e2e2e2" style="border-bottom:#97866d 1px dotted"><table width="190" border="0" cellspacing="5" cellpadding="0">--}}
{{--                <tr>--}}
{{--                <td colspan="2" align="left" valign="top" class="txtB_5a4f3f"><a href="#" class="txtB_5a4f3f">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="center" valign="middle"><div style="border:1px solid #5a4f3f"><a href="#"><img src="{{{ asset( 'images/item_pic01.jpg ') }}}" alt="" width="89" height="89" border="0" align="absmiddle" /></a></div></td>--}}
{{--                <td align="left" valign="top" class="top_txt5a4f3f">◆最高規格防風防水透氣GORE-TEX Paclite Shell布料 ...</td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td height="25" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">--}}
{{--                <tr valign="middle">--}}
{{--                <td align="left"><img src="{{{ asset( 'images/more_01.png ') }}}" alt="" width="11" height="11" border="0" align="absmiddle" /> <a href="#" class="top_txt5a4f3f_a">詳細說明</a></td>--}}
{{--                <td align="right"><img src="{{{ asset( 'images/cart_01.png ') }}}" alt="" width="17" height="16" /> <a href="#" class="top_txt5a4f3f_a">放入購物車</a></td>--}}
{{--                </tr>--}}
{{--                </table></td>--}}
{{--                </tr>--}}
{{--                </table></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                <td align="right" valign="top"><img src="{{{ asset( 'images/ad-16.png ') }}}" alt="" width="10" height="9" /></td>--}}
{{--                <td valign="top" style="background:url({{{ asset( 'images/ad-17.png ') }}}) repeat-x top">&nbsp;</td>--}}
{{--                <td align="left" valign="top"><img src="{{{ asset( 'images/ad-18.png ') }}}" alt="" width="10" height="9" /></td>--}}
{{--                </tr>--}}
{{--                </table>--}}
{{--                </td>--}}
{{--                </tr>--}}
                        <tr>
                            <td height="10">
                                <img src="{{{ asset( 'images/li.png ') }}}" alt="" width="1" height="1" />
                            </td>
                        </tr>
                    </table>
                </td>
            <td align="right" valign="top">
                <table width="660" border="0" align="right" cellpadding="0" cellspacing="0">
            <tr>
            <td height="10"><img src="{{{ asset( 'images/li.png ') }}}" width="1" height="1" /></td>
            </tr>
            <tr>
                <td>
                    <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="660" height="230">
                        <param name="movie" value="swf/ad.swf" />
                        <param name="quality" value="high" />
                        <param name="wmode" value="transparent" />
                        <param name="swfversion" value="8.0.35.0" />
                        <!-- 此 param 標籤會提示使用 Flash Player 6.0 r65 和更新版本的使用者下載最新版本的 Flash Player。如果您不想讓使用者看到這項提示，請將其刪除。 -->
                        <param name="expressinstall" value="Scripts/expressInstall.swf" />
                        <!-- 下一個物件標籤僅供非 IE 瀏覽器使用。因此，請使用 IECC 將其自 IE 隱藏。 -->
                        <!--[if !IE]>-->
                        <object type="application/x-shockwave-flash" data="swf/ad.swf" width="660" height="230">
                            <!--<![endif]-->
                            <param name="quality" value="high" />
                            <param name="wmode" value="transparent" />
                            <param name="swfversion" value="8.0.35.0" />
                            <param name="expressinstall" value="Scripts/expressInstall.swf" />
                            <!-- 瀏覽器會為使用 Flash Player 6.0 和更早版本的使用者顯示下列替代內容。 -->
                            <div>
                                <h4>這個頁面上的內容需要較新版本的 Adobe Flash Player。</h4>
                                <p>
                                    <a href="http://www.adobe.com/go/getflashplayer">
                                        <img src="http://www.adobe.com/ 'images/shared/download_buttons/get_flash_player.gif" alt="取得 Adobe Flash Player" width="112" height="33" />
                                    </a>
                                </p>
                            </div>
                <!--[if !IE]>-->
                        </object>
                <!--<![endif]-->
                    </object>
                </td>
            </tr>
                <tr>
                    <td height="20">
                        <img src="{{{ asset( 'images/li.png ') }}}" alt="" width="1" height="1" />
                    </td>
                </tr>
            <tr>
            <td>
                <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                    @include('layouts.popular_product')
{{--                    <tr>--}}
{{--                        <td height="30" align="right" valign="bottom" style="background:url({{{ asset( 'images/title.png ') }}}) no-repeat left bottom">--}}
{{--                            <a href="shop_hot.html" class="top_txt5a4f3f_a">更多熱門商品&gt;&gt;</a>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--            <tr>--}}
{{--            <td height="190" align="center" valign="bottom" bgcolor="#F1ECE6"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--            <tr>--}}
{{--            <td width="180" align="center" valign="middle"><img src="{{{ asset( 'images/image.jpg ') }}}" alt="" width="160" height="180" /></td>--}}
{{--            <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">--}}
{{--            <tr>--}}
{{--            <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="shop_intro.html"><img src="{{{ asset( 'images/item_pic01.jpg ') }}}" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--            <td height="30" align="center" valign="bottom"><a href="shop_intro.html" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--            </tr>--}}
{{--            </table></td>--}}
{{--            <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">--}}
{{--            <tr>--}}
{{--            <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset( 'images/item_pic01.jpg ') }}}" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--            <td height="30" align="center" valign="bottom"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--            </tr>--}}
{{--            </table></td>--}}
{{--            <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">--}}
{{--            <tr>--}}
{{--            <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset( 'images/item_pic01.jpg ') }}}" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--            <td height="30" align="center" valign="bottom"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--            </tr>--}}
{{--            </table></td>--}}
{{--            </tr>--}}
{{--            </table></td>--}}
{{--            </tr>--}}
                        <tr>
                            <td align="center" valign="top" bgcolor="#FFFFFF">
                                <img src="{{{ asset( 'images/item_bg.jpg ') }}}" alt="" width="660" height="10" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td height="15">
                    <img src="{{{ asset( 'images/li.png ') }}}" alt="" width="1" height="1" />
                </td>
            </tr>
            <tr>
                <td>
                    <a href="" target="_blank">
                        <img src="upload/websitebanner/" alt="" width="660" height="110" border="0" />
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
                        @include('layouts.promotional_goods')
    {{--                    <tr>--}}
{{--                        <td height="50" align="right" valign="bottom" style="background:url({{{ asset( 'images/title-02.png ') }}}) no-repeat left bottom"><a href="#" class="top_txt5a4f3f_a">更多促銷商品&gt;&gt;</a></td>--}}
{{--                    </tr>--}}
{{--            <tr>--}}
{{--            <td height="190" align="center" valign="bottom" bgcolor="#F1ECE6"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--            <tr>--}}
{{--            <td width="180" align="center" valign="middle"><img src="{{{ asset( 'images/image.jpg ') }}}" alt="" width="160" height="180" /></td>--}}
{{--            <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">--}}
{{--            <tr>--}}
{{--            <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset( 'images/item_pic01.jpg ') }}}" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--            <td height="30" align="center" valign="bottom"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--            </tr>--}}
{{--            </table></td>--}}
{{--            <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">--}}
{{--            <tr>--}}
{{--            <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset( 'images/item_pic01.jpg ') }}}" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--            <td height="30" align="center" valign="bottom"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--            </tr>--}}
{{--            </table></td>--}}
{{--            <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">--}}
{{--            <tr>--}}
{{--            <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset( 'images/item_pic01.jpg ') }}}" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--            <td height="30" align="center" valign="bottom"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--            </tr>--}}
{{--            </table></td>--}}
{{--            </tr>--}}
{{--            </table></td>--}}
{{--            </tr>--}}
                        <tr>
                            <td align="center" valign="top" bgcolor="#FFFFFF">
                                <img src="{{{ asset( 'images/item_bg.jpg ') }}}" alt="" width="660" height="10" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            @include('layouts.new_products')
{{--            <tr>--}}
{{--            <td>--}}
{{--            <table width="660" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--            <tr>--}}
{{--            <td height="50" align="right" valign="bottom" style="background:url({{{ asset( 'images/title-03.png ') }}}) no-repeat left bottom"><a href="#" class="top_txt5a4f3f_a">更多最新商品&gt;&gt;</a></td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--            <td height="190" align="center" valign="bottom" bgcolor="#F1ECE6"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">--}}
{{--            <tr>--}}
{{--            <td width="180" align="center" valign="middle"><img src="{{{ asset( 'images/image.jpg ') }}}" alt="" width="160" height="180" /></td>--}}
{{--            <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">--}}
{{--            <tr>--}}
{{--            <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset( 'images/item_pic01.jpg ') }}}" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--            <td height="30" align="center" valign="bottom"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--            </tr>--}}
{{--            </table></td>--}}
{{--            <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">--}}
{{--            <tr>--}}
{{--            <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset( 'images/item_pic01.jpg ') }}}" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--            <td height="30" align="center" valign="bottom"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--            </tr>--}}
{{--            </table></td>--}}
{{--            <td align="left" valign="bottom"><table width="150" border="0" align="left" cellpadding="0" cellspacing="0">--}}
{{--            <tr>--}}
{{--            <td width="150" height="150" align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset( 'images/item_pic01.jpg ') }}}" alt="" width="140" height="140" border="0" align="absmiddle" /></a></td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--            <td height="30" align="center" valign="bottom"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--            </tr>--}}
{{--            </table></td>--}}
{{--            </tr>--}}
{{--            </table></td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--            <td align="center" valign="top" bgcolor="#FFFFFF"><img src="{{{ asset( 'images/item_bg.jpg ') }}}" alt="" width="660" height="10" /></td>--}}
{{--            </tr>--}}
{{--            </table>--}}
{{--            </td>--}}
{{--            </tr>--}}
                        <tr>
                            <td height="15">
                                <img src="{{{ asset( 'images/li.png ') }}}" alt="" width="1" height="1" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="" target="_blank" >
                                    <img src="upload/websitebanner/" alt="" width="660" height="110" border="0" />
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td height="15">
                                <img src="{{{ asset( 'images/li.png ') }}}" alt="" width="1" height="1" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <script type="text/javascript">
        swfobject.registerObject("FlashID2");
        </script>
    <!-- InstanceEndEditable -->
    </td>
</tr>


@endsection
