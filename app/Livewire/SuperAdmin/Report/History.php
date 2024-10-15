<?php

namespace App\Livewire\SuperAdmin\Report;

use App\Models\PerformanceReportRating;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class History extends Component
{

    public $user;
    public $groupedPerformanceReports;

    #[Title('Super Admin | View History')]

    public function mount($userId, $policeId)
    {
        $user = User::with('performanceReportRatings')->where('id', $userId)->where('police_id', $policeId)->first();

        $this->user = $user;

        $this->groupedPerformanceReports = PerformanceReportRating::where('user_id', $userId)
            ->select('start_date', 'end_date')
            ->groupBy('start_date', 'end_date')
            ->get();
    }
    public function render()
    {
        return view('livewire.super-admin.report.history');
    }
}
