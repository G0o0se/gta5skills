@extends('layout')

@section('title', __('pages.title.warranty'))

@section('content')
    <div class="warranty about">
        <div data-wow-duration="1.1s" class="wow slideInDown">
            <div class="container">
                <div class="about-description">
                    <h1>@lang('pages.about.warranty')</h1>
                    <h3>@lang('pages.about.title')</h3>
                </div>

                <div class="info-warranty">
                    <div class="info">
                        <div class="title">
                            <div class="icon" id="price"></div>
                            <h3>@lang('pages.about.low.price.title')</h3>
                        </div>
                        <div class="description">
                            @lang('pages.about.low.price.description')
                        </div>
                    </div>
                    <div class="info">
                        <div class="title">
                            <div class="icon" id="bonus"></div>
                            <h3>@lang('pages.about.bonus.title')</h3>
                        </div>
                        <div class="description">
                            @lang('pages.about.bonus.description')
                        </div>
                    </div>
                    <div class="info">
                        <div class="title">
                            <div class="icon" id="stability"></div>
                            <h3>@lang('pages.about.stability.title')</h3>
                        </div>
                        <div class="description">
                            @lang('pages.about.stability.description')
                        </div>
                    </div>
                    <div class="info">
                        <div class="title">
                            <div class="icon" id="choice"></div>
                            <h3>@lang('pages.about.big.choice.title')</h3>
                        </div>
                        <div class="description">
                            @lang('pages.about.big.choice.description')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-wow-duration="1.1s" class="wow slideInLeft">
            <div class="personality">
                <div class="container">
                    <div class="personality-discount">
                        <div class="price-icon"></div>
                        <div class="personality-discount-title">
                            <h2>@lang('pages.about.personality.discount.title')</h2>
                        </div>
                        <div class="personality-discount-description">
                            <h3>@lang('pages.about.personality.discount.description')</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-wow-duration="1.1s" class="wow slideInUp">
            <div class="payment">
                <div class="container">
                    <div class="payment-title">
                        <h2>@lang('pages.about.payment.methods.title')</h2>
                    </div>
                    <div class="payment-method">
                        <div class="payment-item">
                            <div class="payment-icon" id="webmoney"></div>
                        </div>

                        <div class="line"></div>
                        <div class="payment-item">
                            <div class="payment-icon" id="qiwi"></div>
                        </div>
                        <div class="line"></div>
                        <div class="payment-item">
                            <div class="payment-icon" id="yandexmoney"></div>
                        </div>
                        <div class="line"></div>
                        <div class="payment-item">
                            <div class="payment-icon" id="bitcoin"></div>
                        </div>
                        <div class="line" id="line"></div>
                        <div class="payment-item">
                            <div class="payment-icon" id="visa"></div>
                        </div>
                        <div class="line"></div>
                        <div class="payment-item">
                            <div class="payment-icon" id="mastercard"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
