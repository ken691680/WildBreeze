@extends('layouts.app')
@section('content')
<tr>
    <td align="center" valign="top"><!-- InstanceBeginEditable name="content" -->
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="middle">
                    <table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
                        <tr valign="bottom">
                            <td height="5" colspan="3" align="right">
                                <img src="{{{ asset( 'images/li.png') }}}" alt="" width="1" height="1" />
                            </td>
                        </tr>
                        <tr valign="bottom">
                            <td width="9" align="right">
                                <img src="{{{ asset( 'images/line-02.png') }}}" alt="" width="9" height="40" />
                            </td>
                            <td width="640" align="left" valign="middle" class="titleB" style="background:url({{{ asset( 'images/line.png') }}}) bottom repeat-x">
                                <img src="{{{ asset( 'images/titlebar.png') }}}" alt="" width="10" height="15" align="absmiddle" />購物車
                            </td>
                            <td width="11" align="left">
                                <img src="{{{ asset( 'images/line-03.png') }}}" alt="" width="11" height="40" />
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="4" align="right" style="background:url({{{ asset( 'images/line-04.png') }}}) repeat-y right">&nbsp;
                            </td>
                            <td align="left" valign="top" bgcolor="#CDBFA2" class="txt13_313131">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr valign="bottom">
                                        <td width="15" height="15" align="right">
                                            <img src="{{{ asset( 'images/log_bg_01.png') }}}" alt="" width="15" height="15" />
                                        </td>
                                        <td style="background:url({{{ asset( 'images/log_bg_02.png') }}}) repeat-x bottom">&nbsp;
                                        </td>
                                        <td width="15" align="left">
                                            <img src="{{{ asset( 'images/log_bg_03.png') }}}" alt="" width="15" height="15" />
                                        </td>
                                    </tr>
                                    <tr>
                                    <td align="right" style="background:url({{{ asset( 'images/log_bg_04.png') }}}) no-repeat right top">&nbsp;</td>
                                    <td height="200" valign="top" bgcolor="#FFFFFF" style="background:url({{{ asset( 'images/log_bg_05.png') }}}) repeat-x">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td height="30" align="left" valign="top">
                                            <img src="{{{ asset( 'images/title-09.png') }}}" alt="" width="149" height="21" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="220" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                                        <tr class="title_5a4f3f">
                                        <td align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 商品名稱</td>
                                        <td width="12%" align="center" valign="middle" style="border-bottom:#97866d 1px solid">&nbsp;</td>
                                        <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 數量</td>
                                        <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid">金額</td>
                                        <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 樣式 </td>
                                        <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid">尺寸</td>
                                        <td width="10%" align="center" valign="middle" style="border-bottom:#97866d 1px solid"> 小計 </td>
                                    </tr>
                                    <tr class="txt13_313131">
                                        <td height="100" align="center" valign="middle" style="border-bottom:#97866d 1px dotted">
                                            <table border="0" align="center" cellpadding="5" cellspacing="0">
                                                <tr>
                                                    <td align="center" valign="middle" bgcolor="#C9BC9C">
                                                        <a href="#">
                                                            <img src="{{{ asset( 'images/item_pic01.jpg ') }}}" alt="" width="80" height="80" border="0" align="middle" />
                                                        </a>
                                                    </td>
                                                    <td width="180" align="left" valign="middle">
                                                        <a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted">
                                            <a href="shop.html" class="btn_bg">下次再買</a>
                                        </td>
                                        <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted">
                                            <label for="select2"></label>
                                            <select name="select2" class="top_txt5a4f3f" id="select2">
                                                <option>1</option>
                                            </select>
                                        </td>
                                        <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted">1999</td>
                                        <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted">瀝灰</td>
                                        <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted">
                                            <select name="select" class="top_txt5a4f3f" id="select3">
                                                <option>s</option>
                                            </select>
                                        </td>
                                        <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted">1999</td>
                                    </tr>
{{--                                    <tr class="txt13_313131">--}}
{{--                                    <td height="100" align="center" valign="middle"><table border="0" align="center" cellpadding="5" cellspacing="0">--}}
{{--                                    <tr>--}}
{{--                                    <td align="center" valign="middle" bgcolor="#C9BC9C"><a href="#"><img src="{{{ asset( 'images/item_pic01.jpg ') }}}" alt="" width="80" height="80" border="0" align="middle" /></a></td>--}}
{{--                                    <td width="180" align="left" valign="middle"><a href="#" class="item_txt_a">OR M's TRANSCENDENT SWEATER™ 輕量羽絨外套</a></td>--}}
{{--                                    </tr>--}}
{{--                                    </table></td>--}}
{{--                                    <td align="center" valign="middle" style="border-bottom:#97866d 1px dotted"><a href="shop.html" class="btn_bg">下次再買</a></td>--}}
{{--                                    <td align="center" valign="middle"><span style="border-bottom:#97866d 1px dotted">--}}
{{--                                    <select name="select6" class="top_txt5a4f3f" id="select5">--}}
{{--                                    <option>1</option>--}}
{{--                                    </select>--}}
{{--                                    </span></td>--}}
{{--                                    <td align="center" valign="middle">1999</td>--}}
{{--                                    <td align="center" valign="middle">瀝灰</td>--}}
{{--                                    <td align="center" valign="middle"><span style="border-bottom:#97866d 1px dotted">--}}
{{--                                    <select name="select5" class="top_txt5a4f3f" id="select4">--}}
{{--                                    <option>s</option>--}}
{{--                                    </select>--}}
{{--                                    </span></td>--}}
{{--                                    <td align="center" valign="middle">1999</td>--}}
{{--                                    </tr>--}}
                                    <tr>
                                    <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">&nbsp;</td>
                                    <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">&nbsp;</td>
                                    <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">&nbsp;</td>
                                    <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">&nbsp;</td>
                                    <td colspan="2" align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">商品金額總計</td>
                                    <td align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-top:#97866d 1px solid">1999</td>
                                    </tr>
                                    <tr>
                                    <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f">&nbsp;</td>
                                    <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f">&nbsp;</td>
                                    <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f">&nbsp;</td>
                                    <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f">&nbsp;</td>
                                    <td colspan="2" align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f">物流費</td>
                                    <td align="right" valign="bottom" bgcolor="#D3C1A9" class="top_txt5a4f3f">0</td>
                                    </tr>
                                    <tr>
                                    <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid">&nbsp;</td>
                                    <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid">&nbsp;</td>
                                    <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid">&nbsp;</td>
                                    <td align="right" valign="middle" bgcolor="#D3C1A9" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid">&nbsp;</td>
                                    <td colspan="2" align="right" valign="bottom" bgcolor="#D3C1A9" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">訂單金額總計</td>
                                    <td align="right" valign="bottom" bgcolor="#D3C1A9" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">1999</td>
                                    </tr>
                                    </table></td>
                                    </tr>
                                    </table></td>
                                    <td align="left" style="background:url({{{ asset( 'images/log_bg_06.png') }}}) no-repeat left top">&nbsp;</td>
                                    </tr>
                            <tr valign="top">
                            <td height="15" align="right"><img src="{{{ asset( 'images/log_bg_07.png') }}}" alt="" width="15" height="15" /></td>
                            <td style="background:url({{{ asset( 'images/log_bg_08.png') }}}) top repeat-x">&nbsp;</td>
                            <td align="left"><img src="{{{ asset( 'images/log_bg_09.png') }}}" alt="" width="15" height="15" /></td>
                            </tr>
                            </table></td>
                        <td rowspan="4" align="left" style="background:url({{{ asset( 'images/line-05.png') }}}) left repeat-y">&nbsp;</td>
                        </tr>
                <tr>
                <td align="left" valign="top" bgcolor="#CDBFA2" class="txt13_313131"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr valign="bottom">
                <td width="15" height="15" align="right"><img src="{{{ asset( 'images/log_bg_01.png') }}}" alt="" width="15" height="15" /></td>
                <td style="background:url({{{ asset( 'images/log_bg_02.png') }}}) repeat-x bottom">&nbsp;</td>
                <td width="15" align="left"><img src="{{{ asset( 'images/log_bg_03.png') }}}" alt="" width="15" height="15" /></td>
                </tr>
                <tr>
                <td align="right" style="background:url({{{ asset( 'images/log_bg_04.png') }}}) no-repeat right top">&nbsp;</td>
                <td valign="top" bgcolor="#FFFFFF" style="background:url({{{ asset( 'images/log_bg_05.png') }}}) repeat-x"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td height="30" align="left" valign="top" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid"><img src="{{{ asset( 'images/title_cart01.png') }}}" alt="" width="110" height="22" />　填寫以下資料即可成為會員</td>
                </tr>
                <tr>
                <td height="220" align="center" valign="middle"><table border="0" cellspacing="5" cellpadding="0">
                <tr>
                <td width="100" align="center" valign="middle" class="title_5a4f3f">中文全名</td>
                <td width="400" align="left" valign="middle" class="top_txt5a4f3f"><input name="textfield11" type="text" class="top_txt5a4f3f" id="textfield11"  style="width:120px"/>
                <input type="radio" name="radio" id="radio5" value="radio" />
                <label for="radio5"></label>
                先生
                <input type="radio" name="radio2" id="radio6" value="radio2" />
                <label for="radio6"></label>
                小姐</td>
                </tr>
                <tr>
                <td align="center" valign="middle" class="title_5a4f3f">會員暱稱</td>
                <td align="left" valign="middle" class="top_txt5a4f3f"><input name="textfield11" type="text" class="top_txt5a4f3f" id="textfield12"  style="width:120px"/></td>
                </tr>
                <tr>
                <td width="100" align="center" valign="middle" class="title_5a4f3f">電子郵件</td>
                <td align="left" valign="middle" class="top_txt5a4f3f"><input name="textfield11" type="text" class="top_txt5a4f3f" id="textfield13"  style="width:220px"/>
                ※此為會員帳號，請牢記</td>
                </tr>
                <tr>
                <td width="100" align="center" valign="middle" class="title_5a4f3f">設定密碼</td>
                <td align="left" valign="middle" class="top_txt5a4f3f"><input name="textfield11" type="text" class="top_txt5a4f3f" id="textfield14"  style="width:120px"/></td>
                </tr>
                <tr>
                <td width="100" align="center" valign="middle" class="title_5a4f3f">確認密碼</td>
                <td align="left" valign="middle" class="top_txt5a4f3f"><input name="textfield11" type="text" class="top_txt5a4f3f" id="textfield17"  style="width:120px"/></td>
                </tr>
                <tr>
                <td align="center" valign="middle" class="title_5a4f3f">手機號碼</td>
                <td align="left" valign="middle" class="top_txt5a4f3f"><input name="textfield11" type="text" class="top_txt5a4f3f" id="textfield18"  style="width:120px"/>
                如：0912345678</td>
                </tr>
                <tr>
                <td align="center" valign="middle" class="title_5a4f3f">聯絡地址</td>
                <td align="left" valign="middle" class="top_txt5a4f3f"><label for="select"></label>
                <select name="select3" class="top_txt5a4f3f" id="select" style="width:100px; height:20px">
                <option>郵遞區號</option>
                </select>
                <input name="textfield11" type="text" class="top_txt5a4f3f" id="textfield19"  style="width:250px"/></td>
                </tr>
                <tr>
                <td width="100" align="center" valign="middle" class="title_5a4f3f">發票資料</td>
                <td align="left" valign="middle" class="top_txt5a4f3f"> 統一編號
                <input name="textfield11" type="text" class="top_txt5a4f3f" id="textfield20"  style="width:100px"/>
                發票抬頭
                <input name="textfield11" type="text" class="top_txt5a4f3f" id="textfield21"  style="width:100px"/></td>
                </tr>
                <tr>
                <td align="center" valign="middle" class="title_5a4f3f">&nbsp;</td>
                <td height="40" align="left" valign="middle" class="txt13_313131"><input type="checkbox" name="checkbox" id="checkbox" />
                <label for="checkbox">我同意<a href="member_term.html" target="_blank" class="item_name">會員條款</a></label></td>
                </tr>
                </table></td>
                </tr>
                </table></td>
                <td align="left" style="background:url({{{ asset( 'images/log_bg_06.png') }}}) no-repeat left top">&nbsp;</td>
                </tr>
                <tr valign="top">
                <td height="15" align="right"><img src="{{{ asset( 'images/log_bg_07.png') }}}" alt="" width="15" height="15" /></td>
                <td style="background:url({{{ asset( 'images/log_bg_08.png') }}}) top repeat-x">&nbsp;</td>
                <td align="left"><img src="{{{ asset( 'images/log_bg_09.png') }}}" alt="" width="15" height="15" /></td>
                </tr>
                </table></td>
                </tr>
                <tr>
                <td align="left" valign="top" bgcolor="#CDBFA2" class="txt13_313131"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr valign="bottom">
                <td width="15" height="15" align="right"><img src="{{{ asset( 'images/log_bg_01.png') }}}" alt="" width="15" height="15" /></td>
                <td style="background:url({{{ asset( 'images/log_bg_02.png') }}}) repeat-x bottom">&nbsp;</td>
                <td width="15" align="left"><img src="{{{ asset( 'images/log_bg_03.png') }}}" alt="" width="15" height="15" /></td>
                </tr>
                <tr>
                <td align="right" style="background:url({{{ asset( 'images/log_bg_04.png') }}}) no-repeat right top">&nbsp;</td>
                <td valign="top" bgcolor="#FFFFFF" style="background:url({{{ asset( 'images/log_bg_05.png') }}}) repeat-x"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td height="30" align="left" valign="top" class="top_txt5a4f3f" style="border-bottom:#97866d 1px solid"><img src="{{{ asset( 'images/title_cart02.png') }}}" alt="" width="110" height="22" />　
                <input name="checkbox2" type="checkbox" class="top_txt5a4f3f" id="checkbox2" />
                <label for="checkbox2"></label>
                同訂購人資訊</td>
                </tr>
                <tr>
                <td height="120" align="center" valign="middle"><table border="0" cellspacing="5" cellpadding="0">
                <tr>
                <td width="100" align="center" valign="middle" class="title_5a4f3f">中文全名</td>
                <td width="400" align="left" valign="middle" class="top_txt5a4f3f"><input name="textfield12" type="text" class="top_txt5a4f3f" id="textfield22"  style="width:120px"/>
                <input type="radio" name="radio" id="radio7" value="radio" />
                <label for="radio7"></label>
                先生
                <input type="radio" name="radio2" id="radio8" value="radio2" />
                <label for="radio8"></label>
                小姐</td>
                </tr>
                <tr>
                <td align="center" valign="middle" class="title_5a4f3f">手機號碼</td>
                <td align="left" valign="middle" class="top_txt5a4f3f"><input name="textfield12" type="text" class="top_txt5a4f3f" id="textfield23"  style="width:120px"/>
                如：0912345678</td>
                </tr>
                <tr>
                <td align="center" valign="middle" class="title_5a4f3f">送貨地址</td>
                <td align="left" valign="middle" class="top_txt5a4f3f"><label for="select"></label>
                <select name="select4" class="top_txt5a4f3f" id="select" style="width:100px; height:20px">
                <option>郵遞區號</option>
                </select>
                <input name="textfield12" type="text" class="top_txt5a4f3f" id="textfield24"  style="width:250px"/></td>
                </tr>
                </table></td>
                </tr>
                </table></td>
                <td align="left" style="background:url({{{ asset( 'images/log_bg_06.png') }}}) no-repeat left top">&nbsp;</td>
                </tr>
                <tr valign="top">
                <td height="15" align="right"><img src="{{{ asset( 'images/log_bg_07.png') }}}" alt="" width="15" height="15" /></td>
                <td style="background:url({{{ asset( 'images/log_bg_08.png') }}}) top repeat-x">&nbsp;</td>
                <td align="left"><img src="{{{ asset( 'images/log_bg_09.png') }}}" alt="" width="15" height="15" /></td>
                </tr>
                </table></td>
                </tr>
                <tr>
                <td align="left" valign="top" bgcolor="#CDBFA2" class="txt13_313131">&nbsp;</td>
                </tr>
                <tr valign="top">
                <td align="right"><img src="{{{ asset( 'images/line-06.png') }}}" alt="" width="9" height="10" align="right" /></td>
                <td style="background:url({{{ asset( 'images/line-07.png') }}}) repeat-x top">&nbsp;</td>
                <td align="left"><img src="{{{ asset( 'images/line-08.png') }}}" alt="" width="11" height="10" /></td>
                </tr>
                <tr valign="top">
                <td height="40" colspan="3" align="left" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="btn_bg">
                <tr valign="top">
                <td width="150" align="left" class="btn_bg"><a href="cart_01.html" class="btn_bg">重新選擇付款方式</a></td>
                <td height="30" align="center" class="btn_bg"><a href="cart_03.html"><img src="{{{ asset( 'images/pay_sent.jpg ') }}}" width="100" height="30" border="0" /></a></td>
                <td width="150" align="right" class="btn_bg">&nbsp;</td>
                </tr>
                </table></td>
                </tr>
                <tr valign="top">
                <td height="20" colspan="3" align="right"><img src="{{{ asset( 'images/li.png') }}}" alt="" width="1" height="1" /></td>
                </tr>
                </table></td>
            </tr>
        </table>
    <!-- InstanceEndEditable --></td>
</tr>
@endsection
