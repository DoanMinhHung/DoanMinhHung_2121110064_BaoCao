<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = '2121110064_order';

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'phone',
        'email',
        'address',
        'note',
        'updated_by',
    ];
}
