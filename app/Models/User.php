<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'temporary_password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'temporary_password' => 'hashed',
        ];
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function evaluationRatings()
    {
        return $this->hasMany(EvaluationRating::class)->chaperone();
    }

    public function evaluationAttachments()
    {
        return $this->hasMany(EvaluationAttachment::class)->chaperone();
    }

    public function performanceReportRatings()
    {
        return $this->hasMany(PerformanceReportRating::class);
    }

    public function userOldUnits()
    {
        return $this->belongsToMany(Unit::class, 'old_user_units')->withTimestamps();
    }
}
