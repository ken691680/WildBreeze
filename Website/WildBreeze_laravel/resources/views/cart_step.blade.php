@extends('layouts.app')
@section('content')
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>無標題文件</title>
    <style type="text/css">
        body {
            margin-left: 0px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
        }
    </style>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" valign="middle"><img src="{{{ asset('images/creditcard.jpg') }}}" width="778" height="801" border="0" usemap="#Map" /></td>
    </tr>
</table>

<map name="Map" id="Map">
    <area shape="rect" coords="316,504,422,528" href="cart_04.html" />
</map>
</body>
</html>

@endsection
