<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/tp.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    @include('layouts.head')
</head>
<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" valign="top" style="background:url(images/bg.jpg) repeat-x top center">
                <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
                    @include('layouts.header')

                    @yield('content')

                    @include('layouts.footer')
                </table>
            </td>
        </tr>
    </table>
    <script type="text/javascript">
        swfobject.registerObject("FlashID");
    </script>
</body>
@yield('script')
</html>


