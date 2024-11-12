<?php

namespace App\Livewire\Admin\Pages;

use App\Models\EvaluationRating;
use App\Models\PerformanceReportRating;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class MyEvaluationScoreIndex extends Component
{
    use WithPagination;
    #[Title('Admin | View History')]

    public function listing()
    {
        $userId = auth()->user()->id;
        $policeId = auth()->user()->police_id;
        $user = User::with('performanceReportRatings')->where('id', $userId)->where('police_id', $policeId)->first();

        $groupedPerformanceReports = PerformanceReportRating::where('user_id', $userId)
            ->select('start_date', 'end_date')
            ->groupBy('start_date', 'end_date')
            ->paginate(5, ['*'], 'performancePage');

        $groupedEvaluations = EvaluationRating::where('user_id', $userId)
            ->selectRaw('YEAR(created_at) as year')
            ->selectRaw('created_at as processed_at')
            ->selectRaw('CASE WHEN MONTH(created_at) BETWEEN 1 AND 6 THEN "January - June" ELSE "July - December" END as period')
            ->selectRaw('MAX(created_at) as last_rating')
            ->groupBy('year', 'period', 'processed_at')
            ->orderBy('processed_at', 'desc')
            ->paginate(5, ['*'], 'evaluationPage');

        return compact('user', 'groupedPerformanceReports', 'groupedEvaluations');
    }
    public function render()
    {
        return view('livewire.admin.pages.my-evaluation-score-index', $this->listing());
    }
}
