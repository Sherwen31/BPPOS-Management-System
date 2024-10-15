<?php

namespace App\Livewire\SuperAdmin\Report;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class UsersHistory extends Component
{
    use WithPagination;

    public $search;

    #[Title('Super Admin | History')]

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
                $query->where('name', 'super_admin')->orWhere('name', 'user');
            })
            ->whereHas('performanceReportRatings')
            ->where('id', '!=', auth()->user()->id)
            ->orderBy('id', 'asc')->paginate(10);

        return compact('users');
    }

    public function render()
    {
        return view('livewire.super-admin.report.users-history', $this->listings());
    }
}
