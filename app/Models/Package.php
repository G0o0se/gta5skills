<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';

    protected $fillable = [
        'name', 'en_name', 'url', 'image', 'description', 'en_description', 'price', 'en_price', 'old_price',
        'en_old_price', 'count_buys',

    ];


    protected $hidden = [
        'count_buys',
    ];

    public function orders()
    {
        return $this->belongsToMany(Package::class, 'orders');
    }
}
