<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_time',
        'title',
        'description',
    ];
    protected $casts = [
        'post_time' => 'datetime',
    ];
}
