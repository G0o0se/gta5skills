@extends('layout')

@section('title', __('pages.title.app'))

@section('content')
    <div class="content">
        <div data-wow-duration="1s" class="wow fadeIn">
            <div class="banner">
                <div class="container">
                    <div class="banner-image">
                        <img src="{{ asset('/assets/images/preview.png') }}" alt="Франклин, Майкл и Тревор">
                        <h1 class="banner-title">@lang('pages.banner.title')</h1>
                    </div>
                </div>
                <div class="banner-description">
                    <p>@lang('pages.banner.description')</p>
                </div>

                <div class="scroll-down">
                    <a href="#boost">
                        <img src="{{ asset('/assets/images/svg/scroll_down.svg') }}" alt="">
                    </a>
                </div>
            </div>

        </div>
        <div class="packages-list">
            <div data-wow-duration="1.1s" class="wow slideInUp">
                <h2 class="package-title" id="boost">@lang('pages.packages.title')</h2>
            </div>
            <div class="container">
                <div class="package-container">
                    @foreach($packages as $package)
                        <div class="wow slideInUp package-item">
                            <img src="{{ asset($package->image) }}" alt="{{ $package->name }} package">
                            <div class="package-item-info">
                                <div class="package-item-info-name">@lang('pages.packages.name', ['packages' => $package->name])</div>
                                <div class="package-item-info-price">@lang('pages.packages.price', ['price' => App\Models\User::calcExchangeValue(App::isLocale('ru'), $package->price)])</div>
                                <a class="package-item-info-button" href="{{ route('packages.show', [$package->url]) }}">@lang('pages.packages.button')</a>
                            </div>
                        </div>
                    @endforeach
                    <div class="wow slideInUp package-item">
                        @if(App::isLocale('ru'))
                            <img src="{{ asset('/assets/images/packages/Сustom_Package_ua.jpg') }}" alt="">
                        @else
                            <img src="{{ asset('/assets/images/packages/Сustom_Package_en.jpg') }}" alt="">
                        @endif
                        <div class="package-item-info">
                            <div class="package-item-info-name">@lang('pages.packages.in.development')</div>
                        </div>
                        <div class="dog">
                            <img src="{{ asset('/assets/images/packages/dog.png') }}" class="dog-body" alt="Dog">
                            <img src="{{ asset('/assets/images/packages/dog-head.png') }}" class="dog-head" alt="Dog Head">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
