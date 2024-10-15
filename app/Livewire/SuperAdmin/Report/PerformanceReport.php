<?php

namespace App\Livewire\SuperAdmin\Report;

use App\Models\PerformanceReportItem;
use App\Models\PerformanceReportRating;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Title;
use Livewire\Component;

class PerformanceReport extends Component
{
    public $police_id;
    public $user;
    public $performance_report_item_id;
    public $user_id;
    public $start_date;
    public $end_date;
    public $monday = [];
    public $tuesday = [];
    public $wednesday = [];
    public $thursday = [];
    public $friday = [];
    public $saturday = [];
    public $sunday = [];
    public $total = [];
    public $cost = [];
    public $performance_report_items = [];
    public $hasPerformanceReport;

    #[Title('Super Admin | Performance Rating')]

    public function listings()
    {
        $this->performance_report_items = PerformanceReportItem::orderBy('activity', 'asc')->get();

    }

    public function mount($userId, $policeId)
    {
        $user = User::where('id', $userId)->where('police_id', $policeId)->first();

        $this->police_id = $user->police_id;

        $this->user = $user;

        $this->hasPerformanceReport = PerformanceReportRating::where('user_id', $user->id)
            ->whereBetween('created_at', [now()->startOfWeek(Carbon::MONDAY), now()->endOfWeek(Carbon::SUNDAY)])
            ->exists();

        if (!$user || $this->hasPerformanceReport) {
            $this->redirect('/super-admin/performance-report', navigate: true);
        }
    }

    public function save()
    {
        $this->validate([
            'start_date'          =>          ['required'],
            'end_date'            =>          ['required'],
            'monday.*'            =>          ['required', 'numeric'],
            'tuesday.*'           =>          ['required', 'numeric'],
            'wednesday.*'         =>          ['required', 'numeric'],
            'thursday.*'          =>          ['required', 'numeric'],
            'friday.*'            =>          ['required', 'numeric'],
            'saturday.*'          =>          ['required', 'numeric'],
            'sunday.*'            =>          ['required', 'numeric'],
            'cost.*'              =>          ['required'],
        ]);

        $allFieldsFilled = true;
        $performanceReportsToCreate = [];

        foreach ($this->performance_report_items as $performance_report_item) {
            $itemId = $performance_report_item->id;

            $monday    = $this->monday[$itemId] ?? null;
            $tuesday   = $this->tuesday[$itemId] ?? null;
            $wednesday = $this->wednesday[$itemId] ?? null;
            $thursday  = $this->thursday[$itemId] ?? null;
            $friday    = $this->friday[$itemId] ?? null;
            $saturday  = $this->saturday[$itemId] ?? null;
            $sunday    = $this->sunday[$itemId] ?? null;
            if (
                empty($monday) || empty($tuesday) || empty($wednesday) ||
                empty($thursday) || empty($friday) || empty($saturday) ||
                empty($sunday)
            ) {
                $allFieldsFilled = false;
                break;
            }

            $duplicate = PerformanceReportRating::where('user_id', $this->user->id)
                ->where('performance_report_item_id', $itemId)
                ->whereDate('start_date', $this->start_date)
                ->whereDate('end_date', $this->end_date)
                ->exists();

            if ($duplicate) {
                $this->dispatch('toastr', [
                    'type'          =>              'error',
                    'message'       =>              'Performance Report already submitted. You can submit another performance report next week',
                ]);
                return;
            }

            $performanceReportsToCreate[] = [
                'start_date'                            =>                  $this->start_date,
                'end_date'                              =>                  $this->end_date,
                'user_id'                               =>                  $this->user->id,
                'performance_report_item_id'            =>                  $itemId,
                'monday'                                =>                  $monday,
                'tuesday'                               =>                  $tuesday,
                'wednesday'                             =>                  $wednesday,
                'thursday'                              =>                  $thursday,
                'friday'                                =>                  $friday,
                'saturday'                              =>                  $saturday,
                'sunday'                                =>                  $sunday,
                'cost'                                  =>                  $this->cost[$itemId] ?? null,
                'total'                                 =>                  $monday + $tuesday + $wednesday + $thursday + $friday + $saturday + $sunday,
            ];
        }

        if (!$allFieldsFilled) {
            $this->dispatch('toastr', [
                'type'          =>              'error',
                'message'       =>              'Please fill in all fields first before submitting performance report',
            ]);
            return;
        }

        foreach ($performanceReportsToCreate as $reportData) {
            PerformanceReportRating::create($reportData);
        }


        $this->dispatch('toastr', [
            'type'          =>          'success',
            'message'       =>          'Performance Report submitted successfully',
        ]);

        $this->reset();

        $this->redirect('/super-admin/performance-report', navigate: true);
    }

    public function render()
    {
        return view('livewire.super-admin.report.performance-report', [
            $this->listings()
        ]);
    }
}
