<?php

namespace App\Http\Controllers;

use App\Models\ActivatedPromocodeHistory;
use App\Models\Order;
use App\Models\Package;
use App\Models\Promocode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        $packages = Package::all();

        return view('app', compact('packages'));
    }

    public function faq()
    {
        return view('faq');
    }

    public function warranty()
    {
        return view('warranty');
    }

    public function agreement()
    {
        return view('agreement');
    }

    public function reviews()
    {
        return view('reviews');
    }

    public function packages( $url )
    {
        $package = Package::whereUrl($url)->firstOrFail();

        return view('packages', compact('package'));
    }

    public function orderPackages( $url )
    {
        $package = Package::whereUrl($url)->firstOrFail();

        $user = Auth::user();

        if ( !$this->isAuthorized() ) return response()->json([ 'message' => __('requests.package.order.authorize'), ], 401);

        if ( $user->balance < $package->price ) return response()->json([
            'message' => __('requests.package.order.not_enough', [ 'price' => User::calcExchangeValue(App::isLocale('ru'), ( $package->price - $user->balance )) ]),
        ], 400);

        $order = Order::create([
            'user_id' => $user->id, 'package_id' => $package->id
        ]);

        $user->decrement('balance', $package->price);
        $package->increment('count_buys');

        return response()->json([
            'message'  => __('requests.package.order.success'),
            'order_id' => __('requests.package.order.order_id', [ 'id' => $order->id ]),
            'balance'  => User::calcExchangeValue(App::isLocale('ru'), $user->balance), 'locale' => App::getLocale()
        ]);

    }

    public function profile()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    public function profileUsePromocode( Request $request )
    {
        if ( $request->promocode === NULL ) return response()->json([ 'message' => __('requests.profile.promocode_empty') ], 400);

        $promocode = Promocode::where([
            'name' => $request->get('promocode'), 'status' => Promocode::STATUS_ON
        ])->first();

        if ( $promocode === NULL ) return response()->json([ 'message' => __('requests.profile.promocode_undefined') ], 404);
        if ( ActivatedPromocodeHistory::where([
                'user_id' => Auth::id(), 'promocode_id' => $promocode->id
            ])->first() !== NULL ) return response()->json([ 'message' => __('requests.profile.promocode_activated') ], 400);
        if ( $promocode->expiration_date < now() ) return response()->json([ 'message' => __('requests.profile.promocode_expired') ], 400);
        if ( $promocode->count_uses <= $promocode->count_used ) return response()->json([ 'message' => __('requests.profile.promocode_limit') ], 400);

        $user = Auth::user();

        ActivatedPromocodeHistory::create([
            'user_id' => Auth::id(), 'promocode_id' => $promocode->id, 'amount' => $promocode->amount
        ]);

        $user->increment('balance', $promocode->amount);
        $promocode->increment('count_used');

        return response()->json([
            'message' => __('requests.profile.promocode_success'),
            'balance' => User::calcExchangeValue(App::isLocale('ru'), $user->balance), 'locale' => App::getLocale()
        ]);
    }
}
