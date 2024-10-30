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

    public function userRater()
    {
        return $this->belongsTo(User::class, 'user_rater_id');
    }

    public function userReviewer()
    {
        return $this->belongsTo(User::class, 'user_reviewer_id');
    }
}
