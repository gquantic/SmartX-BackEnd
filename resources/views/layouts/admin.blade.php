<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SmartX') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>

    <!-- Custom Css -->
    <link rel="stylesheet" href="/assets/css/style.min.css">

    <!-- Bootstrap Select Css -->
    <link rel="stylesheet" href="/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <!-- Multi Select Css -->
    <link rel="stylesheet" href="/assets/plugins/multi-select/css/multi-select.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/assets/plugins/select2/select2.css" />
</head>
<body class="theme-cyan">
    <div id="app">
        <!-- Page Loader -->
        <div class="page-loader-wrapper" id="page-loader">
            <div class="loader">
                <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('assets/images/loader.svg') }}" width="48" height="48" alt="Smart X-Investment"></div>
                <p>Загрузка страницы...</p>
            </div>
        </div>

        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>

        <!-- Left Navbar -->
        <aside id="leftsidebar" class="sidebar">
            <div class="navbar-brand">
                <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
                <a href="{{ route('home') }}"><img width="150px" src="{{ asset('/template/img/black_flogo.svg') }}" alt="SmartX"><!--span class="m-l-10">Aero</span--></a>
            </div>
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <a class="image" href="{{ route('profile') }}"><img src="{{ asset('/assets/images/profilde_av.jpg') }}" alt="User"></a>
                            <div class="detail">
                                <h4>[{{ \Illuminate\Support\Facades\Auth::id() }}] {{ \Illuminate\Support\Facades\Auth::user()->name }}</h4>
                                <small>{{ \Illuminate\Support\Facades\Auth::user()->email }}</small>
                            </div>
                        </div>
                    </li>

                    <li><a href="{{ route('users.index') }}"><i class="zmdi zmdi-account"></i><span>Пользователи</span></a></li>

                    <li><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i><span>Главная</span></a></li>

                    <li><a href="{{ route('products-admin.index') }}"><i class="zmdi zmdi-shopping-cart"></i><span>Проекты</span></a></li>

                    <li><a href="{{ route('files.index') }}"><i class="zmdi zmdi-file"></i><span>Файлы</span></a></li>

                    <li><a href="{{ route('parts.products') }}"><i class="zmdi zmdi-view-dashboard"></i><span>Мои доли</span></a></li>

                    <l><a href="{{ route('invests.index') }}"><i class="zmdi zmdi-file"></i><span>История инвестиций</span></a></l>

                    <!--  <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Статистика</span></a>
                         <ul class="ml-menu">
                             <li><a href="conversions-dashboard.php">Конверсии</a></li>
                             <li><a href="dashboard">Общая статистика</a></li>
                             <li><a href="offers">Доходы</a></li>
                         </ul>
                     </li> -->

                    <!--  <li><a href="dashboard"><i class="zmdi zmdi-view-dashboard"></i><span>Общая статистика</span></a></li> -->


                    <li><a href="{{ route('referrals') }}"><i class="zmdi zmdi-accounts"></i><span>Рефералы</span></a></li>

                    <li><a href="{{ route('finances-admin.index') }}"><i class="zmdi zmdi-balance-wallet"></i><span>Финансы</span></a></li>

                    <!--li><a href="documentation"><i class="zmdi zmdi-book"></i><span>Полезная информация</span></a></li-->

                    <!--li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Сервисы</span></a>
                        <ul class="ml-menu">
                            <li><a href="mail-inbox.php">Почта / Рассылка</a></li>
                            <li><a href="urls.php">Ссылки</a></li>
                        </ul>
                    </li-->

                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="zmdi zmdi-minus-circle"></i><span>Выход</span></a></li><br>

                    <!--li>
                        <div class="progress-container progress-primary m-t-10">
                            <span class="progress-badge">CTR</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%;">
                                    <span class="progress-value">67%</span>
                                </div>
                            </div>
                        </div>
                        <div class="progress-container progress-info">
                            <span class="progress-badge">Принято лидов</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 73%;">
                                    <span class="progress-value">73%</span>
                                </div>
                            </div>
                        </div>
                    </li-->
                </ul>
            </div>
        </aside>

        <!-- Right Navbar -->
        <div class="navbar-right">
            <ul class="navbar-nav">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" title="App" data-toggle="dropdown" role="button"><i class="zmdi zmdi-apps"></i></a>
                    <ul class="dropdown-menu slideUp2">
                        <li class="header">Быстрая навигация</li>
                        <li class="body">
                            <ul class="menu app_sortcut list-unstyled">
                                <li>
                                    <a href="/">
                                        <div class="icon-circle mb-2 bg-pink"><i class="zmdi zmdi-home"></i></div>
                                        <p class="mb-0">Главная</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="profile">
                                        <div class="icon-circle mb-2 bg-blue"><i class="zmdi zmdi-account"></i></div>
                                        <p class="mb-0">Мой профиль</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="offers">
                                        <div class="icon-circle mb-2 bg-amber"><i class="zmdi zmdi-shopping-cart"></i></div>
                                        <p class="mb-0">Продукты</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="portfolio">
                                        <div class="icon-circle mb-2 bg-purple"><i class="zmdi zmdi-case"></i></div>
                                        <p class="mb-0">Инвестиции</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="referals">
                                        <div class="icon-circle mb-2 bg-green"><i class="zmdi zmdi-accounts"></i></div>
                                        <p class="mb-0">Рефералы</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="financial">
                                        <div class="icon-circle mb-2 bg-purple"><i class="zmdi zmdi-balance-wallet"></i></div>
                                        <p class="mb-0">Финансы</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" title="Notifications" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                        <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                    </a>
                    <ul class="dropdown-menu slideUp2">
                        <li class="header">Уведомления</li>
                        <li class="body">
                            <ul class="menu list-unstyled">
                            </ul>
                        </li>
                        <li class="footer"> <a href="javascript:void(0);">Все уведомления</a> </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-balance-wallet"></i>
                    </a>
                    <ul class="dropdown-menu slideUp2" style="height: 200px !important;">
                        <li class="header">Ваш баланс <small class="float-right"><a href="wallet.php">Подробнее</a></small></li>
                        <li class="body">
                            <ul class="menu tasks list-unstyled">
                                <li>
                                    <div class="progress-container progress-primary">
                                        <span class="progress-badge">Готовы к выводу</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                <span class="progress-value" style="font-size: 13px;"><?#echo $userData['balance'] + $userData['referal_balance'];?>₽</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="progress-container progress-primary">
                                        <span class="progress-badge">Холд</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                <span class="progress-value" style="font-size: 13px;"><?#echo $userData['hold'] + $userData['referal_hold'];?>₽</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
                <li>
                    <a class="mega-menu" title="Sign Out" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="zmdi zmdi-power"></i>
                    </a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>

        <main class="py-4">
            @yield('before-content')
            <section class="content">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-sm-12">
                            <h2>@yield('page-title', 'Главная')</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="zmdi zmdi-home"></i> Smart X-Investment</a></li>
                                <li class="breadcrumb-item active">@yield('page-title', 'Главная')</li>
                            </ul>
                            <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-12 d-flex justify-content-end">
                            <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                @yield('content')
            </section>
            @yield('after-content')
        </main>
    </div>

    <script src="{{ asset('template/js/bundle/libscript.bundle.js') }}"></script>
    <script src="{{ asset('template/js/bundle/vendorscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/jvectormap.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>
    <script src="{{ asset('template/js/bundle/mainscript.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/index.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>

    <style>
        section.content {
            /*transform: translateY(100px);*/
            opacity: 0;
            transition: .3s;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            setTimeout(function () {
                document.getElementById('page-loader').remove();
            }, 300)

            $('.mobile_menu').on('click', function() {
                $('#leftsidebar').toggleClass('open');
            });

            setTimeout(function () {
                $('section.content').css({
                    'transform': 'translateY(0px)',
                    'opacity': '1'
                });
            }, 500);
        });
    </script>
</body>
</html>
