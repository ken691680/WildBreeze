<tr>
    <td align="center">
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="300" rowspan="2" align="left" valign="bottom">
                    <a href="/">
                        <img src="{{{ asset('images/index.png') }}}" alt="" width="300" height="70" border="0" />
                    </a>
                </td>
                <td align="right" valign="middle" class="top_txt5a4f3f">
                    @if(empty($user['name']))
                        <a href="{{ route('loginForm') }}" class="top_txt5a4f3f_a">登入</a>
                        │<a href="{{ route('registrationForm') }}" class="top_txt5a4f3f_a">加入會員</a>
                    @else
                        <a href="javascript:void(0)" class="top_txt5a4f3f_a" id="logout">登出</a>
                        │<a href="{{ route('member.log') }}" class="top_txt5a4f3f_a">會員資料修改</a>
                    @endif
                    │<a href="qa.html" class="top_txt5a4f3f_a">購物說明</a>
                    │<a href="member_01_1.html" class="top_txt5a4f3f_a">訂單查詢</a>
                    │<a href="http://www.facebook.com/pages/野遊風-戶外休閒用品館/114711665231623" target="_blank">
                        <img src="{{{ asset('images/icon_fb.png') }}}" width="14" height="14" border="0" align="middle" />
                    </a>
                </td>
            </tr>
            <tr>
                <td align="right" valign="middle">
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td class="top_txtc9bc9c">
                                <div style="margin-right:5px; float:none">
                                    <div class="top_txt5a4f3f" style=" margin:auto; margin-right:10px; float:left"> @if(!empty($user['name'])) {{ $user['name'] }} @else guest @endif</div>
                                    您好，歡迎來到野遊風。</div>
                            </td>
                            <td align="right" valign="middle">
                                <table width="185" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td rowspan="3" align="right" valign="middle">
                                            <img src="{{{ asset('images/index-03.jpg') }}}" width="5" height="25" />
                                        </td>
                                        <td colspan="2" valign="bottom" style="border-top:1px solid #5a4f3f"><div style="height:1px"></div></td>
                                        <td rowspan="3" align="left" valign="middle">
                                            <img src="{{{ asset('images/index-05.jpg') }}}" width="5" height="25" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="55" align="center" bgcolor="#FFFFFF">
                                            <img src="{{{ asset('images/cart.jpg') }}}" width="21" height="18" />
                                        </td>
                                        <td align="left" bgcolor="#FFFFFF" class="top_txt5a4f3f">購物清單：0個商品</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" valign="top" style="border-bottom:1px solid #5a4f3f"><div style="height:1px"></div></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table></td>
            </tr>
            <tr>
                <td colspan="2" align="center" valign="bottom">
                    <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="900" height="55">
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
                                <p>
                                    <a href="http://www.adobe.com/go/getflashplayer">
                                        <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="取得 Adobe Flash Player" width="112" height="33" />
                                    </a>
                                </p>
                            </div>
                            <!--[if !IE]>-->
                        </object>
                        <!--<![endif]-->
                    </object>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td align="center" valign="top"><!-- InstanceBeginEditable name="content" -->
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">

@section('script')
                <script>
                    $('#logout').click(function (){

                        $.ajax({
                            url: "{{ route('logout') }}",
                            type: 'get',

                            success: function (r) {
                                swal.fire('', '你已登出', 'success')
                                    .then(function (){
                                        location.href="/";
                                    })
                            },
                            err: function (e) {
                                console.log(e);
                            }
                        })
                    })
                </script>
@endsection
