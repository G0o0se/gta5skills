<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivatedPromocodeHistory extends Model
{
    use HasFactory;

    protected $table = 'activated_promocodes_history';

    protected $fillable = [ 'user_id', 'promocode_id', 'amount' ];
}
