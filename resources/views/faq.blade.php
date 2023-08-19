@extends('layout')

@section('title', __('pages.title.faq'))

@section('content')
    <div class="content faq">
        <div data-wow-duration="1s" class="wow fadeIn">
            <div class="container">
                <div data-wow-duration="1.1s" class="wow slideInDown">
                    <div class="how-order-package">

                        <h1>@lang('pages.faq.order.packages')</h1>

                        <div class="how-order-package-steps">
                            <div class="how-order-package-step">
                                <div class="how-order-package-step-icon">
                                    <img src="{{ asset('/assets/images/svg/vk.svg') }}" alt="VK">
                                </div>
                                <div class="how-order-package-step-text">@lang('pages.faq.authorisation')</div>
                            </div>
                            <div class="how-order-package-arrow">
                                <div class="how-order-package-arrow-icon">
                                    <img src="{{ asset('/assets/images/svg/arrow.svg') }}" alt="Arrow">
                                </div>
                            </div>

                            <div class="how-order-package-step">
                                <div class="how-order-package-step-icon">
                                    <img src="{{ asset('/assets/images/svg/box.svg') }}" alt="Box">
                                </div>
                                <div class="how-order-package-step-text">@lang('pages.faq.select.packages')</div>
                            </div>
                            <div class="how-order-package-arrow">
                                <div class="how-order-package-arrow-icon">
                                    <img src="{{ asset('/assets/images/svg/arrow.svg') }}" alt="Arrow">
                                </div>
                            </div>

                            <div class="how-order-package-step">
                                <div class="how-order-package-step-icon">
                                    <img src="{{ asset('/assets/images/svg/wallet.svg') }}" alt="Wallet">
                                </div>
                                <div class="how-order-package-step-text">@lang('pages.faq.payment')</div>
                            </div>
                            <div class="how-order-package-arrow">
                                <div class="how-order-package-arrow-icon">
                                    <img src="{{ asset('/assets/images/svg/arrow.svg') }}" alt="Arrow">
                                </div>
                            </div>

                            <div class="how-order-package-step">
                                <div class="how-order-package-step-icon">
                                    <img src="{{ asset('/assets/images/svg/money.svg') }}" alt="Money">
                                </div>
                                <div class="how-order-package-step-text">@lang('pages.faq.pay')</div>
                            </div>
                            <div class="how-order-package-arrow">
                                <div class="how-order-package-arrow-icon">
                                    <img src="{{ asset('/assets/images/svg/arrow.svg') }}" alt="Arrow">
                                </div>
                            </div>

                            <div class="how-order-package-step">
                                <div class="how-order-package-step-icon">
                                    <img src="{{ asset('/assets/images/svg/support.svg') }}" alt="Support">
                                </div>
                                <div class="how-order-package-step-text">@lang('pages.faq.support')</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="answer-question">
                    <div data-wow-duration="1.1s" class="wow slideInDown">
                        <h2>F.A.Q</h2>
                    </div>
                    <div class="answer-question-list">
                        <div data-wow-duration="1.3s" class="wow slideInDown package-item">
                            <div class="answer-question-item">
                                <div class="answer-question-item-icon">
                                    <img src="{{ asset('/assets/images/svg/question.svg') }}" alt="Question"></div>
                                <div class="answer-question-item-question">@lang('pages.faq.replenish.balance')</div>
                                <div class="answer-question-item-answer">@lang('pages.faq.replenish.balance.description')</div>
                            </div>
                        </div>

                        <div data-wow-duration="1.3s" class="wow slideInDown package-item">
                            <div class="answer-question-item">
                                <div class="answer-question-item-icon">
                                    <img src="{{ asset('/assets/images/svg/question.svg') }}" alt="Question"></div>
                                <div class="answer-question-item-question">@lang('pages.faq.not.credited.balance')</div>
                                <div class="answer-question-item-answer">@lang('pages.faq.not.credited.balance.description')</div>
                            </div>
                        </div>

                        <div data-wow-duration="1.3s" class="wow slideInDown package-item">
                            <div class="answer-question-item">
                                <div class="answer-question-item-icon">
                                    <img src="{{ asset('/assets/images/svg/question.svg') }}" alt="Question"></div>
                                <div class="answer-question-item-question">@lang('pages.faq.after.purchasing.package')</div>
                                <div class="answer-question-item-answer">@lang('pages.faq.after.purchasing.package.description')</div>
                            </div>
                        </div>

                        <div data-wow-duration="1.3s" class="wow slideInDown package-item">
                            <div class="answer-question-item">
                                <div class="answer-question-item-icon">
                                    <img src="{{ asset('/assets/images/svg/question.svg') }}" alt="Question"></div>
                                <div class="answer-question-item-question">@lang('pages.faq.account.boost')</div>
                                <div class="answer-question-item-answer">@lang('pages.faq.account.boost.description')</div>
                            </div>
                        </div>

                        <div data-wow-duration="1.3s" class="wow slideInDown package-item">
                            <div class="answer-question-item">
                                <div class="answer-question-item-icon">
                                    <img src="{{ asset('/assets/images/svg/question.svg') }}" alt="Question"></div>
                                <div class="answer-question-item-question">@lang('pages.faq.manager.answers')</div>
                                <div class="answer-question-item-answer">@lang('pages.faq.manager.answers.description')</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
