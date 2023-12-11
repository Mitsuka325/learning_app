<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverySchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_date',
        'start_time',
        'end_date',
        'end_time',
    ];

    // 日付の属性をミューテータで設定する
    protected $dates = [
        'start_date',
        'end_date',
        'start_time',
        'end_time',
    ];

    // 開始日時と終了日時を結合したアクセサを定義する
    public function getStartDateAttribute($value)
    {
        return $this->attributes['start_date'] . ' ' . $this->attributes['start_time'];
    }

    public function getEndDateAttribute($value)
    {
        return $this->attributes['end_date'] . ' ' . $this->attributes['end_time'];
    }
    // リレーション
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
