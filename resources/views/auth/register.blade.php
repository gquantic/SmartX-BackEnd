<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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
<body class="theme-red ls-closed">

<div class="bgmask"></div>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <h2>Регистрация в проекте</h2>

    <input type="text" name="referral_id" value="@php if (isset($_COOKIE['referral_id'])) echo $_COOKIE['referral_id']; else echo ''; @endphp" autocomplete="name" autofocus readonly hidden>

    <div class="row mb-3">
        <label for="name" class="col-md-12 col-form-label text-md-end">Ф.И.О.</label>

        <div class="col-md-12">
            <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-12 col-form-label text-md-end">E-mail</label>

        <div class="col-md-12">
            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="phone" class="col-md-12 col-form-label text-md-end">Номер телефона</label>

        <div class="col-md-12">
            <input id="phone" type="text" class="@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="+7(900)000-00-00" autofocus>

            @error('phone')
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="promo" class="col-md-12 col-form-label text-md-end">Промокод (если есть)</label>

        <div class="col-md-12">
            <input id="promo" type="text" class="@error('phone') is-invalid @enderror" name="promo" value="{{ old('promo') }}" autocomplete="promo" placeholder="" autofocus>

            @error('promo')
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-md-12 col-form-label text-md-end">Пароль</label>

        <div class="col-md-12">
            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password-confirm" class="col-md-12 col-form-label text-md-end">Повторите пароль</label>

        <div class="col-md-12">
            <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-12 offset-md-12 form__group">
            <input type="submit" class="" value="Зарегистрироваться">
        </div>
        <div class="col-md-12">
            <div class="links">
                <div class="link"><a href="{{ route('login') }}">Уже есть аккаунт?</a></div>
            </div>
        </div>
    </div>
</form>

<div class="content">
    <h3>Добро пожаловать в Smart <span style="color:#73bdab;margin: 0px 2px;text-shadow: 0px 0px 10px #73bdab;">X</span>-Investment</h3>
    <p>ДЛЯ НАЧАЛА ЗАРЕГИСТРИРУЙТЕСЬ. <br> Пройдите регистрацию используя свои реальные данные.</p>
    <a href="">Связататься с нами</a><a href="">О нас</a>


</div>
<img src="/template/img/steps.svg" class="steps" alt="">

<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');


    @media (max-width: 550px) {
        form {
            width: 100% !important;
        }
    }

    form {
        overflow-y: scroll !important;
    }

    body{
        font-family: PT Sans;
        background: url(/template/img/regbg.jpg);
    }

    .form__group p{
        position: absolute;
        width: 340px;
        text-align: right;
        color: red;
        font-size: 13px;
    }


    .content h3{
        font-size: 34px;
    }
    .content p{
        font-size: 17px;
        margin: 25px 0px;
    }
    .content a{
        color: #73bdab;
        font-size: 17px;
        margin-right: 15px;
    }

    .content{
        text-align: left;
        color: #fff;
        margin-left: 80px;
        margin-top: 105px;
    }

    .steps{
        margin-left: 80px;
        margin-top: 50px;
    }


    form{
        width: 450px; height: 100%;
        background: #fff;
        z-index: 1;
        margin: 0 auto;
        margin-top: 0px;
        top: 0;
        padding: 35px 50px;
        position: fixed;
        right: 0;
    }
    .bgmask{
        background: linear-gradient(rgba(0,0,0,.8) 50%, rgba(0,0,0,1));
        height: 100%; width: 100%;
        position: absolute;
        top: 0;
        z-index: -1;
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
