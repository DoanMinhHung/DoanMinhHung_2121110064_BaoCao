<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = '2121110064_post';

    protected $fillable = [
        'topic_id',
        'title',
        'detail',
        'slug',
        'image',
        'type',
        'metakey',
        'metadesc',
        'updated_by',
    ];
}
