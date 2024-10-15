<?php

namespace App\Livewire\Admin\Report;

use App\Models\PerformanceReportItem;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class PerformanceReportList extends Component
{
    use WithPagination;

    public $search;
    public $activity;
    public $measures;
    public $targets;
    public $remarks;
    public $hasPerformanceReport;

    #[Title('Admin | Performance Report')]

    public function save()
    {

        $this->validate([
            'activity'              =>               ['required', 'unique:performance_report_items,activity'],
            'measures'              =>               ['required'],
            // 'targets'               =>               ['required', 'numeric'],
            'remarks'               =>               ['required'],
        ]);

        PerformanceReportItem::create([
            'activity'              =>               $this->activity,
            'measures'              =>               $this->measures,
            'targets'               =>               $this->targets,
            'remarks'               =>               $this->remarks
        ]);

        $this->dispatch('toastr', [
            'type'              =>          'success',
            'message'           =>          'Performance Report Item created successfully',
        ]);

        $this->reset();
    }

    public function listings()
    {
        $users = User::with(['position', 'unit', 'roles'])
            ->where(function ($query) {
                $query->where('police_id', 'like', '%' . $this->search . '%')
                    ->orWhere('rank', 'like', '%' . $this->search . '%')
                    ->orWhere('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('position', function ($query) {
                        $query->where('position_name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('unit', function ($query) {
                        $query->where('unit_assignment', 'like', '%' . $this->search . '%');
                    });
            })
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'admin')->orWhere('name', 'super_admin');
            })
            ->where('id', '!=', auth()->user()->id)
            ->orderBy('id', 'asc')->paginate(10);

        return compact('users');
    }


    public function hasPerformanceReportData()
    {
        $this->dispatch('toastr', [
            'type'          =>              'error',
            'message'       =>              'This user is already submitted a performance report today. You can submit another performance report next week',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.report.performance-report-list', $this->listings());
    }
}
