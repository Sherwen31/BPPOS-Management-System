<?php

namespace App\Livewire\Admin\Pages;

use App\Models\PerformanceReportItem;
use App\Models\PerformanceReportRating;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class IndividualScorecard extends Component
{
    #[Title('Admin | Individual Scorecard')]

    public function listing()
    {
        $userId = auth()->user()->id;
        $policeId = auth()->user()->police_id;

        $dateCovered = PerformanceReportRating::where('user_id', $userId)
            ->orderBy('start_date', 'desc')
            ->first();

        $performanceItems = PerformanceReportItem::with([
            'performanceReportRatings' => function ($query) use ($userId, $dateCovered) {
                $query->where('user_id', $userId)
                    ->whereStartDate($dateCovered?->start_date)
                    ->whereEndDate($dateCovered?->end_date);
            }
        ])->orderBy('activity', 'asc')->get();

        return compact('dateCovered', 'performanceItems');
    }

    public function render()
    {
        return view('livewire.admin.pages.individual-scorecard', $this->listing());
    }
}