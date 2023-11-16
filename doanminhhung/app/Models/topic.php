<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = '2121110064_topic';

    protected $fillable = [
        'name',
        'slug',
        'parent_id',    
        'metakey',
        'metadesc',
        'created_by',
        'updated_by',
        'updated_at',
        'updated_by',
    ];
}
