<?php

namespace App\Livewire\SuperAdmin\ManageEvaluationScore;

use App\Models\Evaluation;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{

    #[Title('Manage Evaluation Score')]

    public $year = null;
    public $date_range = null;
    public $usersFiltered = [];
    public $selected_year;

    public function listing()
    {
        $currentYear = Carbon::now()->year;

        $years = range($currentYear, 1900);

        $users =  $this->usersFiltered;

        return compact('years', 'users');
    }

    public function filter()
    {
        $this->validate([
            'year'          =>          'required',
            'date_range'    =>          'required',
        ]);


        $this->usersFiltered = User::with(['evaluationRatings'])
            ->whereHas('evaluationRatings', function ($query) {
                if ($this->date_range !== null && $this->year !== null) {

                    $query->whereYear('created_at', $this->year);

                    if ($this->date_range == 'first_half') {
                        $query->whereMonth('created_at', '>=', 1)
                            ->whereMonth('created_at', '<=', 6);
                    } elseif ($this->date_range == 'second_half') {
                        $query->whereMonth('created_at', '>=', 7)
                            ->whereMonth('created_at', '<=', 12);
                    }
                }
            })
            ->where(function ($query) {
                if (auth()->user()->hasRole('super_admin')) {
                    $query->whereDoesntHave('roles', function ($query) {
                        $query->where('name', 'super_admin')->orWhere('name', 'user');
                    });
                } else {
                    $query->whereDoesntHave('roles', function ($query) {
                        $query->where('name', 'super_admin')->orWhere('name', 'admin');
                    });
                }
            })
            ->where('id', '!=', auth()->user()->id)
            ->withSum(['evaluationRatings as total_weight_score' => function ($query) {
                if ($this->date_range !== null && $this->year !== null) {
                    $query->whereYear('created_at', $this->year);

                    if ($this->date_range == 'first_half') {
                        $query->whereMonth('created_at', '>=', 1)
                            ->whereMonth('created_at', '<=', 6);
                    } elseif ($this->date_range == 'second_half') {
                        $query->whereMonth('created_at', '>=', 7)
                            ->whereMonth('created_at', '<=', 12);
                    }
                }
            }], 'weight_score')
            ->orderByDesc('total_weight_score')
            ->get();

        $this->selected_year = $this->year;
    }

    public function resetDateRange()
    {
        $this->reset();
    }
    public function render()
    {
        return view('livewire.super-admin.manage-evaluation-score.index', $this->listing());
    }
}
