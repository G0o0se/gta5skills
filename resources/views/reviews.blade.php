@extends('layout')

@section('title', __('pages.title.reviews'))

@section('content')
    <div class="reviews">
        <div data-wow-duration="1.1s" class="wow fadeIn">
            <div class="container">
                <div data-wow-duration="1.1s" class="wow slideInDown">
                    <div class="reviews-title">
                        <h2>@lang('pages.reviews.reviews')</h2>
                    </div>
                    <div class="reviews-description">
                        <h2>@lang('pages.reviews.descriptions')</h2>
                        <h2>@lang('pages.reviews.gratitude')</h2>
                    </div>
                </div>
                <div data-wow-duration="1.1s" class="wow slideInUp">
                    <a href="/">
                        <div class="banner-vk">
                            <h2>@lang('pages.reviews.vk')</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
