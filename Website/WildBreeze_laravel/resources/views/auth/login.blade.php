@extends('layouts.app')
@section('content')
@CSRF
    <tr>
        <td align="center" valign="top"><!-- InstanceBeginEditable name="content" -->
            <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center" valign="top">
                        <table width="900" border="0" align="center" cellpadding="5" cellspacing="0">
                            <tr>
                                <td height="5"><img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" /></td>
                            </tr>
                            <tr valign="middle">
                                <td height="200" align="center">
                                    <table width="350" border="0" cellspacing="0" cellpadding="0">
                                        <tr valign="bottom">
                                            <td width="15" height="15" align="right">
                                                <img src="{{{ asset('images/log_bg_01.png') }}}" width="15" height="15" />
                                            </td>
                                            <td style="background:url({{ asset('images/log_bg_02.png') }}) repeat-x bottom">&nbsp;</td>
                                            <td width="15" align="left">
                                                <img src="{{{ asset('images/log_bg_03.png') }}}" width="15" height="15" /></td>
                                        </tr>
                                        <tr>
                                            <td align="right" style="background:url({{ asset('images/log_bg_04.png') }}) no-repeat right top">&nbsp;</td>
                                            <td height="105" style="background:url(images/log_bg_05.png) repeat-x">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td height="30" align="left" valign="top">
                                                            <img src="{{{ asset('images/title-04.png') }}}" width="124" height="21" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="75" align="center" valign="bottom">
                                                            <table border="0" cellpadding="0" cellspacing="3">
                                                                <tr>
                                                                    <td width="50" align="center"  class="title_5a4f3f">帳號</td>
                                                                    <td align="left">
                                                                        <label for="textfield"></label>
                                                                        <input name="textfield" type="text" @if (!empty( $_COOKIE['email'])) value="{{ $_COOKIE['email'] }}" @endif class="top_txt5a4f3f" id="email"  style="width:120px"/>
                                                                    </td>
                                                                    <td width="65" rowspan="2" align="right"   valign="middle">
                                                                        <a href="javascript:void(0)" id="login_btn" >
                                                                            <img src="{{{ asset('images/log.jpg') }}}" alt="" width="54" height="40" border="0" />
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" class="title_5a4f3f">密碼</td>
                                                                    <td align="left">
                                                                        <input name="textfield2" type="password" class="top_txt5a4f3f" id="password"  style="width:120px"/>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right" class="title_5a4f3f">&nbsp;</td>
                                                                    <td height="23" align="left" valign="bottom">
                                                                        <a href="/forget_password" id="forgot_password_btn" class="top_txt5a4f3f_a">忘記密碼</a>　
                                                                        <input name="checkbox" type="checkbox" class="top_txt5a4f3f" id="remember_me" />
                                                                        <span class="top_txt5a4f3f">記住我</span></td>
                                                                    <td align="right" valign="middle">&nbsp;</td>
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
                                                <img src="{{{ asset('images/log_bg_07.png') }}}" width="15" height="15" /></td>
                                            <td style="background:url({{ asset('images/log_bg_08.png') }}) top repeat-x">&nbsp;</td>
                                            <td align="left">
                                                <img src="{{{ asset('images/log_bg_09.png') }}}" width="15" height="15" />
                                            </td>
                                        </tr>
                                    </table>
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
            </table>
            <!-- InstanceEndEditable -->
        </td>
    </tr>
@endsection

@section('script')
    <script>
        var rememberMe = false;

        $('#login_btn').click(function (){


            if($('#email').val() == "") {
                alert('email error');
                return;
            }

            if($('#password').val() == "") {
                alert('password error');
                return;
            }

            var data = {
                '_token': $("input[name='_token']").val(),
                'email': $('#email').val(),
                'password': $('#password').val(),
                'remember_me': $("#remember_me").prop('checked') === true ? 1 : 0
            };

            $.ajax({
                url: "{{ route('login') }}",
                type: 'POST',
                data: data,

                success: function (r) {
                    if (r.code == 200) {
                        alert(r.msg);
                        location.href="/";
                    } else {
                        alert(r.msg);
                    }
                },
                err: function (e) {
                    console.log(e);
                }
            })
        });

    </script>
@endsection
