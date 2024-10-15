<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceReportRating extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function performanceReportItem()
    {
        return $this->belongsTo(PerformanceReportItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
