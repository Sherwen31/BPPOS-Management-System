<?php

namespace App\Livewire\User\Pages;

use App\Models\EvaluationRating;
use App\Models\PerformanceReportRating;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ScorecardHistory extends Component
{

    use WithPagination;
    #[Title('User | View History')]

    public function listing()
    {
        $userId = auth()->user()->id;
        $policeId = auth()->user()->police_id;
        $user = User::with('performanceReportRatings')->where('id', $userId)->where('police_id', $policeId)->first();

        $groupedPerformanceReports = PerformanceReportRating::where('user_id', $userId)
            ->select('start_date', 'end_date')
            ->groupBy('start_date', 'end_date')
            ->paginate(5);

        $groupedEvaluations = EvaluationRating::where('user_id', $userId)
            ->selectRaw('YEAR(created_at) as year')
            ->selectRaw('CASE WHEN MONTH(created_at) BETWEEN 1 AND 6 THEN "Jan-June" ELSE "July-Dec" END as period')
            ->selectRaw('MAX(created_at) as last_rating')
            ->groupBy('year', 'period')
            ->orderBy('year', 'desc')
            ->paginate(5);

            return compact('user', 'groupedPerformanceReports', 'groupedEvaluations');
    }
    public function render()
    {
        return view('livewire.user.pages.scorecard-history', $this->listing());
    }
}
