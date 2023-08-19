@extends('layout')

@section('title', __('pages.title.profile'))

@section('content')
    <div class="content profile">
        <div class="container">
            <div data-wow-duration="1.1s" class="wow fadeIn">
                <div class="profile-wrapper">
                    <div class="profile-wrapper-control">
                        <div class="profile-info">
                            <img class="profile-photo" src="{{ asset($user->avatar) }}" alt="Profile photo">
                            <div class="profile-name">{{ $user->name }}
                                <a href="{{ route('logout') }}">
                                    <img src="{{ asset('/assets/images/svg/logout.svg') }}" alt="Logout Icon">
                                </a>
                            </div>
                            <div class="profile-balance">@lang('pages.profile.balance', ['amount' => App\Models\User::calcExchangeValue(App::isLocale('ru'), $user->balance)])</div>
                            <div class="profile-refill-button">@lang('pages.profile.top.up')</div>

                            @if ($user->is_admin)
                                <a class="profile-admin" href="{{ route('admin.index') }}" target="_blank" style="margin-top: 15px;">@lang("pages.profile.admin.panel")</a>
                            @endif
                        </div>
                        <div class="profile-tabs">
                            <div class="profile-tab">
                                <a class="profile-tab-orders active" id="orders" data-target="profile-wrapper-info-orders">
                                    <img src="{{ asset('/assets/images/svg/box-2.svg') }}" alt="Box Icon">@lang('pages.profile.orders')
                                </a>
                            </div>

                            <div class="profile-tab">
                                <a class="profile-tab-replenishment" id="replenishment" data-target="profile-wrapper-info-replenishment">
                                    <img src="{{ asset('/assets/images/svg/dollar.svg') }}" alt="Dollar Icon">@lang('pages.profile.replenishment')
                                </a>
                            </div>

                            <div class="profile-tab">
                                <a class="profile-tab-promoCode" id="promoCode" data-target="profile-wrapper-info-promoCode">
                                    <img src="{{ asset('/assets/images/svg/gift.svg') }}" alt="Gift Icon">@lang('pages.profile.promoCode')
                                </a>
                            </div>
                        </div>
                        <div class="profile-vkontakte">
                            <a href="#">@lang('pages.profile.group')</a>
                        </div>
                    </div>
                    <div class="profile-wrapper-info" id="items">
                        @if (session('error'))
                            <div class="alert alert-error">{{ session('error') }}</div>
                        @elseif(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif


                        <div class="profile-wrapper-info-orders active">@lang('pages.profile.order.history')</div>
                        <div class="profile-wrapper-info-replenishment">@lang('pages.profile.order.replenishment')</div>
                        <div class="profile-wrapper-info-promoCode">@lang('pages.profile.order.promoCode')</div>

                        <div class="profile-orders active">
                            <div class="profile-orders-list">
                                @forelse($user->orders as $order)
                                    <div class="profile-orders-item">
                                        <a href="{{ route('packages.show', ['url' => $order->url]) }}">
                                            <img class="profile-orders-item-image" src="{{ asset($order->image) }}" alt="{{ $order->name }} Package">
                                        </a>
                                        <div class="profile-orders-item-info">
                                            <a href="{{ route('packages.show', ['url' => $order->url]) }}" class="profile-orders-item-name">@lang('pages.profile.packages.name', ['name' => $order->name])</a>
                                            <div class="profile-orders-item-order_id">@lang('pages.profile.packages.order_id', ['id' => $order->pivot->id])</div>
                                            <div class="profile-orders-item-price">@lang('pages.profile.packages.price', ['price' => App\Models\User::calcExchangeValue(App::isLocale('ru'), $order->price)])</div>
                                            <div class="profile-orders-item-date">{{ $order->pivot->created_at }}</div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="profile-orders-item-empty">@lang('pages.profile.packages.empty')</div>
                                @endforelse
                            </div>
                        </div>

                        <div class="profile-replenishment">
                            <div class="table-wrap">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>@lang('pages.profile.replenish.date')</th>
                                        <th>@lang('pages.profile.replenish.amount')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($user->refills as $refill)
                                        <tr>
                                            <td data-label="№">{{ $refill->id }}</td>
                                            <td data-label="@lang('pages.profile.replenish.date')">{{ $refill->updated_at }}</td>
                                            <td data-label="@lang('pages.profile.replenish.amount')">@lang('pages.profile.replenish.value', ['amount' => App\Models\User::calcExchangeValue(App::isLocale('ru'),$refill->amount )])</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">@lang('pages.profile.replenish.empty')</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="profile-promoCode">
                            <div class="deficient-money">
                                <form id="profileUsePromocode" action="{{ route('profile.use_promocode') }}" method="POST">
                                    <label>
                                        <input class="money" type="text" placeholder="@lang('pages.profile.promo')" name="promocode" minlength="1" maxlength="8" required>
                                    </label>
                                    <input type="submit" name="accept-promocode" value="@lang('pages.profile.accept.promo')">
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
