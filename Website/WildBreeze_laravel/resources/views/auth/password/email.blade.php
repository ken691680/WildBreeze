@extends('layouts.app')

@section('page_head')
    <link href="{{{ asset('css/login.css') }}}?{{ config('cache.static_file_version') }}" rel="stylesheet" media="all">
@endsection

@section('content')
    <div class="col-login">
        <div class="container">
            <h2 class="title">忘記密碼</h2>
        </div>
        <div class="container">
            <div class="forgot_pas_block">
                <p>填寫您註冊時使用的電子郵件，重設密碼的連結會寄送到您的信箱</p>
                <input type="email" placeholder="Email" id="email">
                <a class="send" href="javascript:void(0);" onclick="sendResetEmail();">送出</a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function sendResetEmail() {
            var email = $("#email").val();

            if (!email || email === '') {
                sweetAlert('', '請輸入信箱', 'error');
                return;
            }

            ajaxPost("{{ route('password.email') }}", {email: email})
                .then(function(res) {
                    if (res.code === 200) {
                        sweetAlert('', res.msg, 'success')
                            .then(
                                function () {
                                    // location.href="/";
                                },
                                // handling the promise rejection
                                function (dismiss) {}
                            );
                    }
                })
                .catch(function(error) {
                    if (error.hasOwnProperty('errors')) {
                        showValidateError(error.errors);
                    } else {
                        sweetAlert('', error.msg, 'error')
                    }
                });
        }
    </script>
@endsection
