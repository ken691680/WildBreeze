@extends('layouts.app')
@section('content')
    @csrf
    <tr>
        <td align="center" valign="top"><!-- InstanceBeginEditable name="content" -->
            <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center" valign="middle"><table width="900" border="0" align="center" cellpadding="5" cellspacing="0">
                            <tr>
                                <td height="5">
                                    <img src="{{{ asset('images/li.png') }}}" alt="" width="1" height="1" />
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="middle">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr valign="bottom">
                                            <td width="15" height="15" align="right">
                                                <img src="{{{ asset('images/log_bg_01.png') }}}" alt="" width="15" height="15" />
                                            </td>
                                            <td style="background:url(images/log_bg_02.png) repeat-x bottom">&nbsp;</td>
                                            <td width="15" align="left">
                                                <img src="{{{ asset('images/log_bg_03.png') }}}" alt="" width="15" height="15" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" style="background:url(images/log_bg_04.png) no-repeat right top">&nbsp;</td>
                                            <td height="200" valign="top" bgcolor="#FFFFFF" style="background:url(images/log_bg_05.png) repeat-x">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td height="30" align="left" valign="top">
                                                            <img src="{{{ asset('images/title-05.png') }}}" alt="" width="117" height="21" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="30" align="left" valign="middle" class="top_txt5a4f3f">　請填寫以下資料，即可成為野遊風會員！</td>
                                                    </tr>
                                                    <tr>
                                                        <td height="220" align="center" valign="middle">
                                                            <table border="0" cellspacing="5" cellpadding="0">
                                                                <tr>
                                                                    <td width="100" align="center" valign="middle" class="title_5a4f3f">中文全名</td>
                                                                    <td width="400" align="left" valign="middle" class="top_txt5a4f3f">
                                                                        <input name="textfield" type="text" class="top_txt5a4f3f" id="name"  style="width:120px"/>
                                                                        <input type="radio" name="radio" id="radio" value="man" />
                                                                        <label for="radio"></label>
                                                                        先生
                                                                        <input type="radio" name="radio2" id="radio2" value="woman" />
                                                                        <label for="radio2"></label>
                                                                        小姐</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="100" align="center" valign="middle" class="title_5a4f3f">電子郵件</td>
                                                                    <td align="left" valign="middle" class="top_txt5a4f3f">
                                                                        <input name="textfield2" type="text" class="top_txt5a4f3f" id="email"  style="width:220px"/>
                                                                        ※此為會員帳號，請牢記
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="100" align="center" valign="middle" class="title_5a4f3f">設定密碼</td>
                                                                    <td align="left" valign="middle" class="top_txt5a4f3f">
                                                                        <input name="password" type="password" class="top_txt5a4f3f" id="password"  style="width:120px"/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="100" align="center" valign="middle" class="title_5a4f3f">確認密碼</td>
                                                                    <td align="left" valign="middle" class="top_txt5a4f3f">
                                                                        <input name="confirm_password" type="password" class="top_txt5a4f3f" id="confirm_password"  style="width:120px"/>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="100" align="center" valign="middle" class="title_5a4f3f">認 證 碼</td>
                                                                    <td align="left" valign="middle" class="top_txt5a4f3f">
                                                                        <img src="{{{ asset('images/code.jpg') }}}" width="64" height="25" align="absmiddle" />　                                <input name="textfield5" type="text" class="top_txt5a4f3f" id="textfield5"  style="width:100px"/>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="40" align="center" valign="bottom" class="txt13_313131">&nbsp;</td>
                                                                    <td height="40" align="left" valign="middle" class="txt13_313131"><input type="checkbox" name="checkbox" id="checkbox" />
                                                                        <label for="checkbox">我同意<a href="javascript:void(0) " target="_blank" class="item_name">會員條款</a>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" align="center" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">
                                                                        <img src="{{{ asset('images/li.png') }}}" width="1" height="1" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="30" colspan="2" align="center" valign="bottom">
                                                                        <table width="100" border="0" cellpadding="0" cellspacing="0" class="btn_bg">
                                                                            <tr>
                                                                                <td height="30" align="center" valign="middle" class="btn_bg">
                                                                                    <a href="javascript:void(0)" id="btn" class="btn_bg">確認送出</a>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td align="left" style="background:url(images/log_bg_06.png) no-repeat left top">&nbsp</td>
                                        </tr>
                                        <tr valign="top">
                                            <td height="15" align="right">
                                                <img src="{{{ asset('images/log_bg_07.png') }}}" alt="" width="15" height="15" />
                                            </td>
                                            <td style="background:url(images/log_bg_08.png) top repeat-x">&nbsp;</td>
                                            <td align="left">
                                                <img src="{{{ asset('images/log_bg_09.png') }}}" alt="" width="15" height="15" />
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
            <!-- InstanceEndEditable --></td>
    </tr>
@endsection
@section('script')
  <script>
      $('#btn').click(function (){

          if ($('#name').val() == "") {
              alert('please enter name');
              return;
          }

          if ($('input:radio:checked').val() == null) {
                alert('please enter gender');
                return;
          }

          if ($('#email').val() == "") {
              alert('please enter email');
              return;
          }

          if ($('#password').val() == "" ) {
              alert('please enter password');
              return;
          }

          if ($('#confirm_password').val() != $('#password').val()) {
              alert('please confirm password');
              return;
          }

          if (!$('#checkbox').prop('checked', true)) {
              alert('please enter checkbox');
              return;
          }

          var data = {
              '_token': $("input[name='_token']").val(),
              'name': $('#name').val(),
              'gender': $('input[name=radio]:checked').val(),
              'email': $('#email').val(),
              'password': $('#password').val(),
              'password_confirmation': $('#confirm_password').val(),
          };

          $.ajax({
              url: "{{ route('register') }}",
              type: 'POST',
              data: data,

              success: function (r){

              },

              error: function (e){

              }
          })
      })
  </script>
@endsection
