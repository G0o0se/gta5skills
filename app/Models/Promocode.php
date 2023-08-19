<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;

    const STATUS_OFF = 0;
    const STATUS_ON = 1;

    protected $table = 'promocodes';

    protected $fillable = [ 'name', 'amount', 'count_uses', 'count_used', 'expiration_date', 'status' ];

    protected $dates = [ 'expiration_date', 'created_at', 'updated_at' ];

    public static function calsStatus( $status )
    {
        $array = [
            0 => [ 'btn-danger', 'Inactive' ], 1 => [ 'btn-success', 'Active' ]
        ];

        return '<div class="btn ' . $array[$status][0] . ' mr-2 my-1">' . $array[$status][1] . '</div>';
    }
}
