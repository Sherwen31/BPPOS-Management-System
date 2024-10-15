<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceReportItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function performanceReportRatings()
    {
        return $this->hasMany(PerformanceReportRating::class);
    }
}
