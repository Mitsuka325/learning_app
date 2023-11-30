<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'grade_id',
        'lesson_name',
        'video_url',
        'description',
        'image',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}
