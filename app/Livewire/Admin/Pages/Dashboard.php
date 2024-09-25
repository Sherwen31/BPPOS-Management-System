<?php

namespace App\Livewire\Admin\Pages;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Carbon\Carbon;

class Dashboard extends Component
{

    #[Title('Admin | Dashboard')]

    public $total_users_count, $total_evaluated_users, $total_not_evaluated_users, $evaluated_monthly_percentage, $not_evaluated_monthly_percentage;

    public function counts()
    {
        $currentMonth = Carbon::now()->month;

        $this->total_users_count = User::where('id', '!=', auth()->user()->id)->count();

        $this->total_evaluated_users = User::where('id', '!=', auth()->user()->id)
            ->whereHas('evaluationRatings', function ($query) use ($currentMonth) {
                $query->whereMonth('created_at', $currentMonth);
            })
            ->count();

        $this->total_not_evaluated_users = User::where('id', '!=', auth()->user()->id)
            ->whereDoesntHave('evaluationRatings', function ($query) use ($currentMonth) {
                $query->whereMonth('created_at', $currentMonth);
            })
            ->count();

        $this->evaluated_monthly_percentage = $this->total_users_count > 0
            ? ($this->total_evaluated_users / $this->total_users_count) * 100
            : 0;

        $this->not_evaluated_monthly_percentage = $this->total_users_count > 0
            ? ($this->total_not_evaluated_users / $this->total_users_count) * 100
            : 0;
    }

    public function render()
    {
        return view('livewire.admin.pages.dashboard', [
            $this->counts()
        ]);
    }
}
