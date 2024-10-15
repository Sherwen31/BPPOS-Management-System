<?php

namespace App\Livewire\SuperAdmin\ScoreCard;

use App\Models\PerformanceReportItem;
use App\Models\PerformanceReportRating;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserScorecard extends Component
{
    public $user;
    public $performanceItems = [];
    public $dateCovered;
    #[Title('Super Admin | User Scorecard')]

    public function mount($userId, $policeId, $startDate, $endDate)
    {
        $user = User::with('performanceReportRatings')->where('id', $userId)->where('police_id', $policeId)->first();

        $this->user = $user;

        $this->dateCovered = PerformanceReportRating::where('user_id', $user->id)
            ->whereStartDate($startDate)
            ->whereEndDate($endDate)
            ->first();

        $this->performanceItems = PerformanceReportItem::with([
            'performanceReportRatings' => function ($query) use ($startDate, $endDate, $userId) {
                $query->where('user_id', $userId)
                    ->whereStartDate($startDate)
                    ->whereEndDate($endDate);
            }
        ])->orderBy('activity', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.super-admin.score-card.user-scorecard');
    }
}
