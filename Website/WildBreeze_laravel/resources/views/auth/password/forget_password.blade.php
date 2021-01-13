@extends('layouts.app')
@section('content')
    @csrf
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td height="30" align="left" valign="top"><img src="{{ asset('images/title-07.png') }}" alt="" width="146" height="21" /></td>
        </tr>
        <tr>
            <td height="30" align="left" valign="middle" class="top_txt5a4f3f">　請輸入您原先的電子郵件信箱，<br />
                我們會寄一封信給您，裡面含有可重設密碼的連結。
            </td>
        </tr>
        <tr>
            <td height="180" align="center" valign="middle">
                <table border="0" cellspacing="5" cellpadding="0">
                    <tr>
                        <td width="100" align="center" valign="middle" class="title_5a4f3f">電子郵件</td>
                        <td width="250" align="left" valign="middle" class="top_txt5a4f3f">
                            <input name="textfield2" type="text" class="top_txt5a4f3f" id="email"  style="width:220px"/>
                        </td>
                    </tr>
                    <tr>
                        <td width="100" align="center" valign="middle" class="title_5a4f3f">認 證 碼</td>
                        <td align="left" valign="middle" class="top_txt5a4f3f">
                            <img src="{{ asset('images/code.jpg') }}" alt="" width="64" height="25" align="absmiddle" />　
                            <input name="textfield5" type="text" class="top_txt5a4f3f" id="textfield5"  style="width:100px"/>
                        </td>
                    </tr>
                    <tr>
                        <td height="10" colspan="2" align="center" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">
                            <img src="{{ asset('images/li.png') }}" alt="" width="1" height="1" />
                        </td>
                    </tr>
                    <tr>
                        <td height="30" colspan="2" align="center" valign="bottom">
                            <table width="100" border="0" cellpadding="0" cellspacing="0" class="btn_bg">
                                <tr>
                                    <td align="center" valign="middle" class="btn_bg">
                                        <a href="javascript:void(0)" id="btn_bg" class="btn_bg">確認送出</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table></td>
@endsection
@section('script')
    <script>
        $('#btn_bg').click(function (){

            if ($('#email').val() == "") {
                alert('帳號不得為空');
                return;
            }

            var data = {
                '_token': $("input[name='_token']").val(),
                'email': $('#email').val()
            }

            $.ajax({
                url: '',
                type: 'POST',
                data: data,

                success: function(r) {

                    if (r.code == 200 ) {
                        alert(r.msg)
                    } else {
                        alert(r.msg);
                    }
                },
                error: function(e) {
                    console.log('error', e);
                }
            })
        })
    </script>
@endsection
