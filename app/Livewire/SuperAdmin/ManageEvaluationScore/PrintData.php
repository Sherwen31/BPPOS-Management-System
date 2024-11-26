<?php

namespace App\Livewire\SuperAdmin\ManageEvaluationScore;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Carbon;

class PrintData extends Component
{
    #[Title('Print Data')]

    public $users;

    public function mount($dateRange, $year)
    {
        $this->users = User::with(['evaluationRatings'])
            ->whereHas('evaluationRatings', function ($query) use ($dateRange, $year) {
                if ($dateRange !== null && $year !== null) {

                    $query->whereYear('created_at', $year);

                    if ($dateRange == 'first_half') {
                        $query->whereMonth('created_at', '>=', 1)
                            ->whereMonth('created_at', '<=', 6);
                    } elseif ($dateRange == 'second_half') {
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
            ->withSum(['evaluationRatings as total_weight_score' => function ($query)  use ($dateRange, $year) {
                if ($dateRange !== null && $year !== null) {
                    $query->whereYear('created_at', $year);

                    if ($dateRange == 'first_half') {
                        $query->whereMonth('created_at', '>=', 1)
                            ->whereMonth('created_at', '<=', 6);
                    } elseif ($dateRange == 'second_half') {
                        $query->whereMonth('created_at', '>=', 7)
                            ->whereMonth('created_at', '<=', 12);
                    }
                }
            }], 'weight_score')
            ->orderByDesc('total_weight_score')
            ->get();
    }
    public function render()
    {
        return view('livewire.super-admin.manage-evaluation-score.print-data');
    }
}
