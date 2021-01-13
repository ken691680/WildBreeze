@extends('layouts.app')
@section('content')
        @include('layouts.banner')
        <tr>
            <td width="220" align="left" valign="top">
                <table width="220" border="0" align="left" cellpadding="0" cellspacing="0">
                    @include('layouts.netizens_praise')
                    @include('layouts.advertising')
                    @include('layouts.new_events')
                    @include('layouts.index_news')
                    @include('layouts.brand')
                </table>
            </td>
            <td align="right" valign="top"><table width="660" border="0" align="right" cellpadding="0" cellspacing="0">
                    @include('layouts.popular_product')
                    @include('layouts.promotional_goods')
                    @include('layouts.new_products')
                    @include('layouts.picnic_spot')
                </table>
            </td>
        </tr>
@endsection
