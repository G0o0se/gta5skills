<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refill extends Model
{
    use HasFactory;

    const STATUS_UNPAID = 0;
    const STATUS_PAID = 1;

    protected $table = 'refills';

    protected $fillable = [ 'user_id', 'amount', 'status' ];

    public static function calsStatus( $status )
    {
        $array = [
            0 => [ 'btn-danger', 'Unpaid' ], 1 => [ 'btn-success', 'Paid' ]
        ];

        return '<div class="btn ' . $array[$status][0] . ' mr-2 my-1">' . $array[$status][1] . '</div>';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
