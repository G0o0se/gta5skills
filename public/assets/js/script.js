function notifyNoty (object)
{
    return new Noty(object).show();
}

$(document).ready(function ()
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    Noty.overrideDefaults({
        layout: 'bottomLeft',
        theme: 'metroui',
        closeWith: ['click'],
        timeout: 5000,
        progressBar: false,
        animation: {
            open: 'animated bounceInLeft',
            close: 'animated bounceOutLeft'
        }
    });

    let wow = new WOW({
        mobile: false,
        live: true,
    });
    wow.init();

    /**
     * Adaptive menu
     */
    $('.hamburger').click(function ()
    {
        $('.header__menu-items').toggleClass('open');
        $('body').toggleClass('ActiveMenu');
        $('.menu-item').toggleClass('ActiveMenu');
        $('.menu-item li').toggleClass('fade');

        $('.menu-item li:nth-child(2)').click(function ()
        {
            $('.header__menu-items').removeClass('open');
            $('body').removeClass('ActiveMenu');
            $('.menu-item').removeClass('ActiveMenu');
            $('.menu-item li').removeClass('fade');
        });


    });


    /**
     * Faq answers
     */
    $('.answer-question-item').click(function ()
    {
        if ( $(this).hasClass('active') ) return $(this).removeClass('active').find('.answer-question-item-answer').slideUp();

        $('.answer-question-item').removeClass('active').find('.answer-question-item-answer').slideUp().find($(this).toggleClass('active').find('.answer-question-item-answer').slideDown());

    });

    let packageDescription = $('.package-menu .description'),
        packageBoostInfo = $('.package-menu .boost-info'),
        packageInfoItem = $('.package-info .package-info-item'),
        packageInfoDescription = $('.package-info .package-info-description');

    /**
     * Package menu (Описание)
     */
    packageDescription.click(function ()
    {
        if ( $(this).hasClass('active') ) return;
        $(this).toggleClass('active');
        packageBoostInfo.removeClass('active');
        packageInfoItem.removeClass('active');
        packageInfoDescription.toggleClass('active');
    })

    /**
     * Package menu (Как происходит прокачка)
     */
    packageBoostInfo.click(function ()
    {
        if ( $(this).hasClass('active') ) return;
        $(this).toggleClass('active');
        packageDescription.removeClass('active');
        packageInfoItem.toggleClass('active');
        packageInfoDescription.removeClass('active');
    })


    let profileTabA = $('.profile-tabs .profile-tab a');

    /**
     * Profile items
     */
    profileTabA.click(function ()
    {
        profileTabA.removeClass('active');
        $(this).addClass('active');

        let dataTarget = $(this).data('target'),
            profileWrapperInfo = $('.profile-wrapper-info');


        profileWrapperInfo.children().removeClass('active');
        $('.' + dataTarget).addClass('active');
        $('.' + dataTarget.replace('-wrapper-info', '')).addClass('active');

        $('html, body').animate({
            scrollTop: profileWrapperInfo.offset().top - (profileWrapperInfo.height() + 50)
        }, 700);
    });

    /**
     * Order package
     */
    $('#order-package').on('submit', function (e)
    {
        e.preventDefault();
        let form = $(this),
            action = form.attr('action');

        $.post(action, function (data)
        {

        })
            .done(function (success)
            {
                notifyNoty({
                    type: 'success',
                    text: success.message + '<br><br><b>' + success.order_id + '</b>',
                    modal: true,
                    timeout: 8500,
                    progressBar: true
                });
                let balance = success.locale === 'ru' ? 'Баланс ' + success.balance + ' ₴' : 'Balance ' + success.balance + ' $';

                $('.profile-balance').text(balance);
                $('.header-menu-profile-balance').text(balance);
            })
            .fail(function (error)
            {
                notifyNoty({type: 'error', text: error.responseJSON.message})
            });

    });

    /**
     * Use promocode
     */
    $('#profileUsePromocode').on('submit', function (e)
    {
        e.preventDefault();
        let form = $(this),
            action = form.attr('action'),
            promocode = form.find('input[name=promocode]').val();

        $.post(action, {promocode}, function (data)
        {

        })
            .done(function (success)
            {
                notifyNoty({type: 'success', text: success.message});

                let balance = success.locale == 'ru' ? 'Баланс ' + success.balance + ' ₴' : 'Balance ' + success.balance + ' $';

                $('.profile-balance').text(balance);
                $('.header-menu-profile-balance').text(balance);
            })
            .fail(function (error)
            {
                notifyNoty({type: 'error', text: error.responseJSON.message})
            });


    });
});


