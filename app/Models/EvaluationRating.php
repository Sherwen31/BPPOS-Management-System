<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationRating extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function evaluationItem()
    {
        return $this->belongsTo(EvaluationItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
