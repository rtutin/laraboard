<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_count',
        'route',
        'name',
        'description',
        'hidden',
        'owner_id',
        'bump_limit',
        'thread_limit'
    ];
}
