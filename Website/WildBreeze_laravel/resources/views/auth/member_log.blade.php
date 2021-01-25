<?php $code = null ;?>
@extends('layouts.app')
@section('content')
    @csrf

<tr>
    <td align="center" valign="top"><!-- InstanceBeginEditable name="content" -->
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="top">
                        <table width="900" border="0" align="center" cellpadding="5" cellspacing="0">
                            <tr>
                                <td height="5" colspan="2">
                                    <img src="{{ asset('images/li.png') }}" alt="" width="1" height="1" />
                                </td>
                            </tr>
                            <tr>
                                <td width="220" align="left" valign="top">
                                    <table width="220" border="0" cellspacing="0" cellpadding="0">
                                        <tr valign="bottom">
                                            <td width="15" height="15" align="right">
                                                <img src="{{ asset('images/log_bg_01.png') }}" alt="" width="15" height="15" />
                                            </td>
                                            <td style="background:url({{ asset('images/log_bg_02.png') }}) repeat-x bottom">&nbsp;</td>
                                            <td width="15" align="left">
                                                <img src="{{ asset('images/log_bg_03.png') }}" alt="" width="15" height="15" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" style="background:url({{ asset('images/log_bg_04.png') }}) no-repeat right top">&nbsp;</td>
                                            <td width="190" style="background:url({{ asset('images/log_bg_05.png') }}) repeat-x">
                                                <table width="190" border="0" align="left" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td height="30" align="left" valign="top" style="border-bottom:#97866d 1px solid">
                                                            <img src="{{ asset('images/title-06.png') }}" alt="" width="140" height="21" vspace="2" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="10">
                                                            <img src="{{ asset('images/li.png') }}" alt="" width="1" height="1" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="middle">
                                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td height="30" align="left" valign="middle">
                                                                        <a href="member_01_1.html" class="title_5a4f3f_a">訂單查詢</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="30" align="left" valign="middle">
                                                                        <a href="member_03_1.html" class="title_5a4f3f_a">活動查詢</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                <td height="30" align="left" valign="middle" class="title_5a4f3f">修改資料</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="10">
                                                            <img src="{{ asset('images/li.png') }}" alt="" width="1" height="1" />
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td align="left" style="background:url({{ asset('images/log_bg_06.png') }}) no-repeat left top">&nbsp;</td>
                                        </tr>
                                        <tr valign="top">
                                            <td height="15" align="right"><img src="{{ asset('images/log_bg_07.png') }}" alt="" width="15" height="15" /></td>
                                            <td style="background:url({{ asset('images/log_bg_08.png') }}) top repeat-x">&nbsp;</td>
                                            <td align="left"><img src="{{ asset('images/log_bg_09.png') }}" alt="" width="15" height="15" /></td>
                                        </tr>
                                    </table>
                                </td>
                                <td align="right" valign="top">
                                    <table width="660" border="0" align="right" cellpadding="0" cellspacing="0">
                                        <tr valign="bottom">
                                            <td height="5" colspan="3" align="right">
                                                <img src="{{ asset('images/li.png') }}" width="1" height="1" />
                                            </td>
                                        </tr>
                                        <tr valign="bottom">
                                            <td width="9" align="right">
                                                <img src="{{ asset('images/line-02.png') }}" alt="" width="9" height="40" />
                                            </td>
                                            <td width="640" align="left" valign="middle" class="titleB" style="background:url({{ asset('images/line.png') }}) bottom repeat-x">
                                                <img src="{{ asset('images/titlebar.png') }}" alt="" width="10" height="15" align="absmiddle" />修改資料
                                            </td>
                                            <td width="11" align="left"><img src="{{ asset('images/line-03.png') }}" alt="" width="11" height="40" /></td>
                                        </tr>
                                        <tr>
                                            <td align="right" style="background:url({{ asset('images/line-04.png') }}) repeat-y right">&nbsp;</td>
                                            <td align="left" valign="top" bgcolor="#CDBFA2" class="txt13_313131">
                                                <table width="640" border="0" cellpadding="0" cellspacing="5">
                                                    <tr>
                                                        <td width="100" align="center" valign="middle" class="title_5a4f3f">中文全名</td>
                                                        <td align="left" valign="middle" class="top_txt5a4f3f">
                                                            <input name="textfield" type="text" class="top_txt5a4f3f" id="name"  style="width:120px" value="{{ $data['name'] }}"/>
                                                        </td>
                                                        <td width="370" align="left" valign="middle" class="top_txt5a4f3f">

                                                            <input type="radio" name="radio" id="radio"  value="man"
                                                                @if($data['gender'] == 'man') checked @endif/>
                                                            <label for="radio"></label>
                                                                先生
                                                            <input type="radio" name="radio2" id="radio2" value="woman"
                                                               @if($data['gender'] == 'woman') checked @endif/>
                                                            <label for="radio2"></label>
                                                        小姐
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                            <td width="100" align="center" valign="middle" class="title_5a4f3f">電子郵件</td>
                                                            <td align="left" valign="middle"  class="top_txt5a4f3f">{{ $data['email'] }}</td>
                                                            <td align="left" valign="middle" class="top_txt5a4f3f">如需更改請洽客服人員</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="100" align="center" valign="middle" class="title_5a4f3f">設定密碼</td>
                                                        <td align="left" valign="middle" class="top_txt5a4f3f">
                                                            <input name="textfield3" type="password" class="top_txt5a4f3f" id="password"  style="width:120px"/>
                                                        </td>
                                                        <td align="left" valign="middle" class="top_txt5a4f3f">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="100" align="center" valign="middle" class="title_5a4f3f">確認密碼</td>
                                                        <td align="left" valign="middle" class="top_txt5a4f3f">
                                                            <input name="textfield4" type="password" class="top_txt5a4f3f" id="confirm_password"  style="width:120px"/>
                                                        </td>
                                                        <td align="left" valign="middle" class="top_txt5a4f3f">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="100" align="center" valign="middle" class="title_5a4f3f">手機號碼</td>
                                                        <td align="left" valign="middle" class="top_txt5a4f3f">
                                                            <input name="textfield2" value="{{ $data['phone'] }}" type="text" class="top_txt5a4f3f" id="phone"  style="width:120px"/>
                                                        </td>
                                                        <td align="left" valign="middle" class="top_txt5a4f3f">如：0912345678</td>
                                                    </tr>
                                                    <tr>
                                                    <td align="center" valign="middle" class="title_5a4f3f">聯絡地址</td>
                                                    <td colspan="2" align="left" valign="middle" class="top_txt5a4f3f">
                                                        <label for="select"></label>
                                                        <select name="select" class="top_txt5a4f3f" id="select_city" style="width:100px; height:20px">
                                                            @foreach($citys as $city)
                                                                @if(empty($data['city']))
                                                                    <option value="" disabled selected hidden>請選擇城市</option>
                                                                @endif
                                                                <option value="{{ $city }}" @if($city == $data['city'])  selected @endif>
                                                                    {{ $city }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <select name="select" class="top_txt5a4f3f" id="select_area" style="width:100px; height:20px">
                                                            @foreach($areas as $area):
                                                                <option value="{{ $area['ci02'] }}" ci03="{{ $area['ci03'] }}" @if($area['ci02'] ==  $data['township'])  selected  <?php $code = $area['ci03'];?> @endif>
                                                                    {{ $area['ci02'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <input name="textfield5" type="text" class="top_txt5a4f3f" value="{{ $code }}" id="address_code"  style="width:100px"/>
                                                        <input name="textfield5" type="text" class="top_txt5a4f3f" value="{{ $data['address'] }}" id="address"  style="width:250px"/>
                                                    </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" valign="middle" class="title_5a4f3f">電 子 報</td>
                                                        <td colspan="2" align="left" valign="middle" class="top_txt5a4f3f">
                                                            <input type="checkbox" name="checkbox" @if($data['new_latter'] == true) checked @endif id="new_latter" />
                                                            <label for="checkbox">我願意收到野遊風電子報</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="10" colspan="3" align="center" valign="middle" class="title_5a4f3f" style="border-bottom:#97866d 1px solid">
                                                            <img src="{{ asset('images/li.png') }}" alt="" width="1" height="1" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="30" colspan="3" align="center" valign="bottom">
                                                            <table width="100" border="0" cellpadding="0" cellspacing="0" class="btn_bg">
                                                                <tr>
                                                                    <td align="center" valign="middle" class="btn_bg">
                                                                        <a href="javascript:void(0) " class="btn_bg" id="button" >確認送出</a>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td align="left" style="background:url({{ asset('images/line-05.png') }}) left repeat-y">&nbsp;</td>
                                        </tr>
                                        <tr valign="top">
                                            <td align="right">
                                                <img src="{{ asset('images/line-06.png') }}" alt="" width="9" height="10" align="right" />
                                            </td>
                                            <td style="background:url({{ asset('images/line-07.png') }}) repeat-x top">&nbsp;</td>
                                            <td align="left">
                                                <img src="{{ asset('images/line-08.png') }}" alt="" width="11" height="10" />
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <td height="20" colspan="3" align="right">
                                                <img src="{{ asset('images/li.png') }}" alt="" width="1" height="1" />
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="15" colspan="2">
                                    <img src="{{ asset('images/li.png') }}" alt="" width="1" height="1" />
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
        $('#select_city').change(function () {
            $('#select_area option').remove();

            var city = $('#select_city').val();

            $.ajax({
                url: "/area",
                type: 'POST',
                data:{ 'city':city, '_token': $("input[name='_token']").val()},

                success: function(r) {
                    console.log(r.data);
                    r.data.forEach(function(area) {
                        console.log(area);
                        $("#select_area").append("<option value='"+area.ci02+"' ci03 ='"+ area.ci03+"' >"+area.ci02+"</option>");
                    });
                    $("#address_code").val(r.data[0].ci03);
                },
                error: function(e) {

                }
            })

        })

        $("#select_area").on('change',function(){
            $("#address_code value").remove();
            $("#select_area option:selected").attr('ci03');
            var code = $("#select_area option:selected").attr('ci03');
            $("#address_code").val(code);
        });

         $('#button').click(function (){

             var data = {
                 '_token': $("input[name='_token']").val(),
                 'name' : $('#name').val(),
                 'gender' : $('input:radio:checked').val(),
                 'phone' : $('#phone').val(),
                 'city' : $('#select_city').val(),
                 'township' : $('#select_area').val(),
                 'address' : $('#address').val(),
                 'new_latter' : $("#new_latter").prop('checked') == true ? true :false
             };

             if ($('#confirm_password').val() != $('#password').val())
             {
                 alert('請確認你的密碼');
                 return;
             }

             if ($('#password').val().length <= 7) {
                alert('密碼長度不足8碼');
                return;
             }


             if ($('#password').val() != "") {

                 data.password = $('#password').val();
                 data.password_confirmation = $('#confirm_password').val();
             }



             $.ajax({
                 url: "/member_data_modify",
                 type: 'POST',
                 data: data,

                 success: function(r) {

                     if (r.code == 200) {
                         alert(r.msg);
                         location.reload();
                     } else {
                         alert(r.msg);
                     }
                 },
                 error: function(e) {
                     console.log(e.responseText);
                 }
             })
         })

    </script>
@endsection
