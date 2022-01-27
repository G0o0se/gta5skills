<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const ORDER_NOT_EXECUTED = 0;
    const ORDER_IN_PROGRESS = 1;
    const ORDER_COMPLETED = 2;

    protected $table = 'orders';

    protected $fillable = [ 'user_id', 'package_id', 'status' ];

    public static function calsStatus( $status )
    {
        $array = [
            0 => [ 'btn-danger', 'Not executed' ], 1 => [ 'btn-warning', 'In progress' ],
            2 => [ 'btn-success', 'Completed' ]
        ];

        return '<div class="btn ' . $array[$status][0] . ' mr-2 my-1">' . $array[$status][1] . '</div>';
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
