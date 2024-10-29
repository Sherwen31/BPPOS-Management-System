<?php

namespace App\Livewire\User\Pages;

use App\Models\PerformanceReportItem;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Index extends Component
{
    public function mount()
    {
        $userId = auth()->user()->id;

        $currentWeekStart = Carbon::now()->startOfWeek(); // Start of the week (e.g., Monday)
        $currentWeekEnd = Carbon::now()->endOfWeek(); // End of the week (e.g., Sunday)

        $performanceItems = PerformanceReportItem::with([
            'performanceReportRatings' => function ($query) use ($userId, $currentWeekStart, $currentWeekEnd) {
                $query->where('user_id', $userId)
                    ->where('start_date', '>=', $currentWeekStart)
                    ->where('end_date', '<=', $currentWeekEnd);
            }
        ])->orderBy('activity', 'asc')->get();

        return compact('performanceItems');
    }
    public function render()
    {
        return view('livewire.user.pages.index');
    }
}
