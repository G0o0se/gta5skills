<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const DOLLAR_EXCHANGE_RATE = 27.7;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'avatar', 'email', 'ip', 'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'ip', 'is_admin', 'remember_token',
    ];

    public static function calcExchangeValue( $is_ru, $amount )
    {
        return $is_ru ? $amount : round($amount / self::DOLLAR_EXCHANGE_RATE, 2, PHP_ROUND_HALF_DOWN);
    }

    public static function getLatestUsers( $int )
    {
        return self::latest()->limit($int)->get();
    }

    public function orders()
    {
        return $this->belongsToMany(Package::class, 'orders')->withPivot('id', 'created_at');
    }

    public function refills()
    {
        return $this->hasMany(Refill::class)->where('status', Refill::STATUS_PAID);
    }
}
