@extends('layout')

@section('title', __('pages.title.packages', ['name' => $package->name]))

@section('content')
    <div class="package">
        <div data-wow-duration="1s" class="wow fadeIn">
            <div class="container">
                <div class="package-about">
                    <div class="package-images">
                        <div class="wow slideInLeft package-item">
                            <img src="{{ $package->image }}" alt="Package photo">
                        </div>
                    </div>
                    <div class="package-data">
                        <div class="wow slideInRight package-item">
                            <h1>@lang('pages.packages.name.boost', ['package' => $package->name])</h1>
                            <div class="package-description">
                                <div class="package-menu">
                                    <div class="description active">@lang('pages.packages.reviews')</div>
                                    <div class="boost-info">@lang('pages.packages.how.boost')</div>
                                </div>

                                <div class="package-info">
                                    @foreach(explode("\r\n", App::isLocale('ru') ? $package->description : $package->en_description) as $key => $value)
                                        <div class="package-info-description active">
                                            <div class="number-circle">
                                                <div class="number">{{ $key + 1 }}</div>
                                            </div>
                                            <div class="info">{{ $value }}</div>
                                        </div>
                                    @endforeach
                                    <div class="package-info-item">
                                        <div class="number-circle">
                                            <div class="number">1</div>
                                        </div>
                                        <div class="info">@lang('pages.packages.how.pay')</div>
                                    </div>
                                    <div class="package-info-item">
                                        <div class="number-circle">
                                            <div class="number">2</div>
                                        </div>
                                        <div class="info">@lang('pages.packages.how.accept')</div>
                                    </div>
                                    <div class="package-info-item">
                                        <div class="number-circle">
                                            <div class="number">3</div>
                                        </div>
                                        <div class="info">@lang('pages.packages.how.transfer')</div>
                                    </div>
                                    <div class="package-info-item">
                                        <div class="number-circle">
                                            <div class="number">4</div>
                                        </div>
                                        <div class="info">@lang('pages.packages.how.boosting')</div>
                                    </div>
                                    <div class="package-info-item">
                                        <div class="number-circle">
                                            <div class="number">5</div>
                                        </div>
                                        <div class="info">@lang('pages.packages.how.something')</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form class="package-order" action="{{ route('packages.order', [$package->url]) }}" method="POST"
                      id="order-package">
                    <div class="wow slideInUp package-item">
                        <div class="boost">
                            <div class="boost-platforms">
                                <div class="boost-platforms-title">@lang('pages.packages.service')</div>
                                <div class="boost-platforms-title">@lang('pages.packages.platforms')</div>
                            </div>
                            <div class="boost-service">
                                <div class="boost-service-description">PC</div>
                                <div class="boost-service-description">Social Club<br>Steam<br>EpicGames<br></div>
                            </div>
                        </div>
                    </div>
                    <div class="wow slideInUp package-item">
                        <div class="package-price">
                            <div
                                class="price">@lang('pages.packages.new.price', ['price' => App\Models\User::calcExchangeValue(App::isLocale('ru'), $package->price)])</div>
                            <div
                                class="old-price">@lang('pages.packages.old.price', ['price' => App\Models\User::calcExchangeValue(App::isLocale('ru'), $package->old_price)])</div>
                            <button class="buy" type="submit">@lang('pages.packages.buy')</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
