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
        'always_delivery_flg',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    // リレーション
    public function deliverySchedules()
    {
        return $this->hasMany(DeliverySchedule::class);
    }
}