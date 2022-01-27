<!doctype html>
<html lang="ru">
<head>
    <title>GTA5Skills - @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/animate.min.css') }}">
</head>

<body>

<header>
    <div class="container">
        <div class="header">
            <nav class="header__menu" id="navbar">
                <div class="logo">
                    <a href="/">
                        <span>GTA5Skills</span>
                        <img src="{{ asset('/assets/images/svg/logo-icon.svg') }}" width="39px" height="39px" alt="">
                    </a>
                </div>

                <div class="hamburger">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>

                <div class="header__menu-items">
                    <ul class="menu-item">
                        <li><a href="{{ route('faq') }}">@lang('pages.header.faq')</a></li>
                        <li><a href="{{ route('index') }}#boost">@lang('pages.header.boost')</a></li>
                        <li><a href="{{ route('warranty') }}">@lang('pages.header.warranty')</a></li>
                        <li><a href="{{ route('reviews') }}">@lang('pages.header.reviews')</a></li>
                    </ul>

                    <div class="header-lang-switcher">
                        @if(App::isLocale('ru'))
                            <a href="{{ route('locale', ['en']) }}">
                                <img src="{{ asset('/assets/images/svg/flag_en.svg') }}" alt="UA Language">
                            </a>
                        @else
                            <a href="{{ route('locale', ['ru']) }}">
                                <img src="{{ asset('/assets/images/svg/flag_ua.svg') }}" alt="EN Language">
                            </a>
                        @endif
                    </div>

                    @guest
                        <div class="header-menu-login">
                            <a href="{{ route('login', ['vkontakte']) }}" rel="nofollow">
                                <div class="login-title">@lang('pages.header.login.vk')</div>
                                <div class="login-icon"></div>
                            </a>
                        </div>
                    @endguest

                    @auth
                        <div class="header-menu-profile">
                            <a href="{{ route('profile') }}"><img src="{{ asset($user->avatar) }}" alt="Profile Photo"></a>
                            <div class="header-menu-profile-info">
                                <a class="header-menu-profile-name" href="{{ route('profile') }}">{{ $user->name }}</a>
                                <a class="header-menu-profile-balance" href="{{ route('profile') }}">@lang('pages.header.balance', ['amount' => App\Models\User::calcExchangeValue(App::isLocale('ru'), $user->balance)])</a>
                            </div>
                        </div>
                    @endauth
                </div>
            </nav>
        </div>
    </div>
</header>

@yield('content')

<footer>
    <div class="container-footer">
        <div class="footer-links">
            <a href="{{ route('agreement') }}">@lang('pages.footer.user_agreement')</a>
        </div>

        <div class="footer-social-links">
            <a href="https://vk.com/gta5skillscom" target="_blank" class="footer-social-link-vk" rel="nofollow"></a>
            <a href="https://t.me/gta5skills" target="_blank" class="footer-social-link-telegram" rel="nofollow"></a>
        </div>
    </div>
</footer>
<script src="{{ asset('/assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('/assets/js/noty.min.js') }}"></script>
<script src="{{ asset('/assets/js/script.js') }}"></script>
</body>
</html>
