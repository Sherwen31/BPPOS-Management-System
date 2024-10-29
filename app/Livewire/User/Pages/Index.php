<?php

namespace App\Livewire\User\Pages;

use App\Models\PerformanceReportItem;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Index extends Component
{
    public $hasRating = false;
    public function mount()
    {
        $user = auth()->user();
        $this->hasRating = $this->user->performanceReportRatings()->exists();

        $currentWeekStart = Carbon::now()->startOfWeek(); // Start of the week (e.g., Monday)
        $currentWeekEnd = Carbon::now()->endOfWeek(); // End of the week (e.g., Sunday)

        $performanceItems = PerformanceReportItem::with([
            'performanceReportRatings' => function ($query) use ($user, $currentWeekStart, $currentWeekEnd) {
                $query->where('user_id', $user->id)
                    ->where('start_date', '>=', $currentWeekStart)
                    ->where('end_date', '<=', $currentWeekEnd);
            }
        ])->orderBy('activity', 'asc')->get();

// Check if there are any performance items with ratings in the current week
$hasEvaluationsThisWeek = $performanceItems->isNotEmpty();
    }
    public function render()
    {
        return view('livewire.user.pages.index');
    }
}
