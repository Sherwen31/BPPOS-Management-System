<?php

namespace App\Livewire\User\Pages;

use App\Models\PerformanceReportItem;
use App\Models\PerformanceReportRating;
use Livewire\Attributes\Title;
use Livewire\Component;

class IndividualScorecard extends Component
{
    #[Title('User | Individual Scorecard')]

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
                    ->whereStartDate($dateCovered->start_date)
                    ->whereEndDate($dateCovered->end_date);
            }
        ])->orderBy('activity', 'asc')->get();

        return compact('dateCovered', 'performanceItems');
    }
    public function render()
    {
        return view('livewire.user.pages.individual-scorecard', $this->listing());
    }
}
