<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'SmartX') }}</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="/template/css/blocks/main.css">
    <link rel="stylesheet" href="/template/css/blocks/authentication.css">
    <link rel="stylesheet" href="/template/css/blocks/all-themes.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
        *:focus{
            outline: none !important;
            box-shadow: none !important;
        }
        @keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}@-moz-keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}@-webkit-keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}#zCK51DW-1589738274268{outline:none!important;visibility:visible!important;resize:none!important;box-shadow:none!important;overflow:visible!important;background:none!important;opacity:1!important;filter:alpha(opacity=100)!important;-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity1)!important;-moz-opacity:1!important;-khtml-opacity:1!important;top:auto!important;right:10px!important;bottom:0px!important;left:auto!important;position:fixed!important;border:0!important;min-height:0!important;min-width:0!important;max-height:none!important;max-width:none!important;padding:0!important;margin:0!important;-moz-transition-property:none!important;-webkit-transition-property:none!important;-o-transition-property:none!important;transition-property:none!important;transform:none!important;-webkit-transform:none!important;-ms-transform:none!important;width:auto!important;height:auto!important;display:none!important;z-index:2000000000!important;background-color:transparent!important;cursor:auto!important;float:none!important;border-radius:unset!important;pointer-events:auto!important}#Gj3AQ2v-1589738274270.open{animation : tawkMaxOpen .25s ease!important;}</style>

</head>
<body class="theme-red ls-closed op0">
<div class="mask">
</div>
<h1>Smart<span>X</span>Invest</h1>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="row mb-3">
        <label for="email" class="col-md-12 col-form-label text-md-end">{{ __('Email Address') }}</label>

        <div class="col-md-12 form__group">
            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

        <div class="col-md-12 form__group">
            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    Запомнить меня
                </label>
            </div>
        </div>
    </div>

    <div class="row mb-0 mt-0">
        <div class="col-md-12 form__group">
            <input type="submit" class="" value="{{ __('Login') }}" style="margin-top: 7px;margin-bottom: 0px;">
        </div>
    </div>
    <div class="row links">
        <div class="col-md-12 mb-0">
            @if (Route::has('password.request'))
                <a class="link" href="{{ route('password.request') }}">
                    Забыли пароль?
                </a>
            @endif
        </div>
        <div class="col-md-12">
            <a class="link" href="{{ route('register') }}">
                Регистрация
            </a>
        </div>
    </div>
</form>

<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');

    @media (max-width: 700px){
        h1{
            margin-top:-25px !important;
        }
        form{
            position: fixed !important;
            margin-top: -200px !important;
            width:100% !important;

        }
    }

    /*.op0{
        opacity: 0;
        transition: 0s;
    }

    .op1{
        opacity: 1 !important;
        transition: 1s;
    }*/

    body{
        font-family: PT Sans;
    }

    .form__group p{
        position: absolute;
        width: 340px;
        text-align: right;
        color: red;
        font-size: 13px;
    }

    .content h3{
        font-size: 25px;
    }
    .content p{
        font-size: 16px;
    }
    .content a{
        color: #73bdab;
        font-size: 17px;
        margin-right: 15px;
    }

    .content{
        text-align: center;
        width: 90%; margin: 40px auto;
    }

    .footer{
        position: absolute;
        bottom: 0; left: 0;
        width: 100%; height: 150px;
        background: url('');
        background-repeat: no-repeat;
        background-position: 820px -20px;
        text-align: right;
    }
    .footer img{
        position: absolute;
        bottom: 0; right: 0;
        z-index: -1;
    }
    .footer p{
        margin-right: 90px;
        margin-top: 115px;
    }
    .footer a{
        color: #73bdab;
        transition: .2s ease;
    }
    .footer a:hover{
        color: #5ba996;
    }

    h1{
        text-align: center;
        position: absolute;
        color: #fff;
        width: 100%;
        z-index: 1000;
        margin-top: -61px;
    }
    h1 span{
        color: #92E4D0;
        font-size: 45px;
        margin: 0px 5px 0px 5px;
        text-shadow: 0px 0px 14px #92E4D0;
    }
    .mask{
        height: 55%; width: 100%;
        background: url('{{ asset('/template/img/regbg.jpg') }}') center -100px;
        position: absolute;
        top: 0;
        left: 0;
    }
    .mask:after{
        content: " ";
        background: rgba(0,0,0,.8);
        position: absolute;
        height: 100%; width: 100%;
        top: 0; left: 0;
    }
    form{
        width: 400px; height: 375px;
        background: #fff;
        position: relative;
        z-index: 1;
        margin: 0 auto;
        margin-top: 200px;
        padding: 5px 30px;
        border-radius: 30px;
    }
    form h2{
        font-size: 25px;
    }
    form label{
        color: #000;
        font-size: 17px;
        font-weight: 100;
        display: block;
        margin-top: 17px;
        margin-bottom: 5px;
    }
    form input{
        width: 100%;
        height: 37px;
        background: rgba(196,196,196,.2);
        padding-left: 10px;
        border: 1px solid rgba(0,0,0,.2);
        border-radius: 4px;
        transition: .2s ease;
    }
    form input:focus{
        border: 1px solid rgba(146,228,208, .7);
    }

    form input[type="submit"]{
        background: rgba(117,240,211,.4);
        border: 1px solid rgba(57,241,197,.4);
        height: 40px;
        font-size: 16px;
        margin-top: 25px;
    }
    form input[type="submit"]:hover{
        background: rgba(110,231,202,.4);
    }
    form input[type="submit"]:active{
        background: rgba(117,240,211,.8);
        border: 1px solid rgba(117,240,211,0);
    }
    form a{

    }

    .links{
        margin-top: 13px;
    }
    .links a{
        color: #000;
        display: block;
        margin-left: 10px;
        position: relative;
        z-index: 10;
        margin-bottom: 5px;
        width: fit-content;
    }
    .links a:hover{
        text-decoration: none;
    }
    .links a:before{
        content: "";
        background: #B0F9E8;
        height: 18px; width: 4px;
        position: absolute;
        border-radius: 14px;
        left: -10px; margin-top: 2px;
        transition: .4s ease;
        z-index: -1;
    }
    .links a:hover:before{
        width: 120px;
    }
</style>
</body>
</html>
