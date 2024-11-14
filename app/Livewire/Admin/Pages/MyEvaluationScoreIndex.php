<?php

namespace App\Livewire\Admin\Pages;

use App\Models\EvaluationRating;
use App\Models\PerformanceReportRating;
use App\Models\User;
use Illuminate\Support\Carbon;
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
            ->where('end_date', '>=', Carbon::now()->subMonths(6))
            ->select('start_date', 'end_date')
            ->groupBy('start_date', 'end_date')
            ->orderBy('end_date', 'desc')
            ->paginate(5, ['*'], 'performancePage');

        $groupedPerformanceReportsArchive = PerformanceReportRating::where('user_id', $userId)
            ->where('end_date', '<', Carbon::now()->subMonths(6))
            ->select('start_date', 'end_date')
            ->groupBy('start_date', 'end_date')
            ->orderBy('end_date', 'desc')
            ->paginate(5, ['*'], 'performancePageArchive');

        $groupedEvaluations = EvaluationRating::where('user_id', $userId)
            ->where('created_at', '>=', Carbon::now()->subYear())
            ->selectRaw('YEAR(created_at) as year')
            ->selectRaw('created_at as processed_at')
            ->selectRaw('CASE WHEN MONTH(created_at) BETWEEN 1 AND 6 THEN "January - June" ELSE "July - December" END as period')
            ->selectRaw('MAX(created_at) as last_rating')
            ->groupBy('year', 'period', 'processed_at')
            ->orderBy('processed_at', 'desc')
            ->paginate(5, ['*'], 'evaluationPage');

        $groupedEvaluationsArchive = EvaluationRating::where('user_id', $userId)
            ->where('created_at', '<', Carbon::now()->subYear())
            ->selectRaw('YEAR(created_at) as year')
            ->selectRaw('created_at as processed_at')
            ->selectRaw('CASE WHEN MONTH(created_at) BETWEEN 1 AND 6 THEN "January - June" ELSE "July - December" END as period')
            ->selectRaw('MAX(created_at) as last_rating')
            ->groupBy('year', 'period', 'processed_at')
            ->orderBy('processed_at', 'desc')
            ->paginate(5, ['*'], 'evaluationPageArchive');

        return compact('user', 'groupedPerformanceReports', 'groupedEvaluations', 'groupedPerformanceReportsArchive', 'groupedEvaluationsArchive');
    }
    public function render()
    {
        return view('livewire.admin.pages.my-evaluation-score-index', $this->listing());
    }
}
