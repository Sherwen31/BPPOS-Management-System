<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvaluationAttachment extends Model
{
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
