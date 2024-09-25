<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function evaluationRatings()
    {
        return $this->hasMany(EvaluationRating::class)->chaperone();
    }
}
