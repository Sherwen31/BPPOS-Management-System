<?php

namespace App\Livewire\Admin\Evaluation;

use App\Models\Evaluation;
use App\Models\EvaluationRating;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Component;

class UserEvaluation extends Component
{

    public $police_id;
    public $last_name;
    public $first_name;
    public $evaluations;
    public $numerical_rating = [];
    public $user_reviewer_id;
    public $user;
    public $activeTab = 1;
    public $hasEvaluationRating;
    public $reviewers;

    public function listEvaluations()
    {
        $user = $this->user;

        $this->evaluations = Evaluation::with(['evaluationItems' => function ($query) use ($user) {
            $query->with(['evaluationAttachments' => function ($query) use ($user) {
                $query->where('user_id', $user->id);
            }]);
        }])->get();
    }

    public function mount($userId, $policeId)
    {
        $user = User::where('id', $userId)->where('police_id', $policeId)->first();

        $this->reviewers = User::where('id', '!=', auth()->user()->id)->where('id', '!=', $userId)->whereDoesntHave('roles', function ($query) {
            $query->where('name', 'user');
        })->get();

        $this->police_id = $user->police_id;
        $this->last_name = $user->last_name;
        $this->first_name = $user->first_name;

        $this->user = $user;

        $this->hasEvaluationRating = EvaluationRating::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$user || $this->hasEvaluationRating) {
            $currentMonth = Carbon::now()->month;

            if ($this->hasEvaluationRating) {
                $lastEvaluationMonth = $this->hasEvaluationRating?->created_at->month;

                if ($lastEvaluationMonth >= 1 && $lastEvaluationMonth <= 6) {
                    if ($currentMonth >= 1 && $currentMonth <= 6) {
                        $this->redirect('/admin/evaluation/user-evaluation', navigate: true);
                        return;
                    }
                }

                if ($lastEvaluationMonth >= 7 && $lastEvaluationMonth <= 12) {
                    if ($currentMonth >= 7 && $currentMonth <= 12) {
                        $this->redirect('/admin/evaluation/user-evaluation', navigate: true);
                        return;
                    }
                }
            }
        }
    }

    public function setActiveTab($tabIndex)
    {
        $this->activeTab = $tabIndex;
    }

    public function submitEvaluation()
    {
        $this->validate([
            'numerical_rating.*'        =>      ['required', 'numeric', 'min:1', 'max:5'],
            'user_reviewer_id'          =>      ['required'],
        ]);

        foreach ($this->evaluations as $evaluation) {
            foreach ($evaluation->evaluationItems as $evaluationItem) {
                if (!isset($this->numerical_rating[$evaluationItem->id]) || $this->numerical_rating[$evaluationItem->id] === null) {
                    $this->dispatch('toastr', [
                        'type'          =>          'error',
                        'message'       =>          'Please fill in all fields first before submitting evaluation',
                    ]);
                    return;
                } else {
                    EvaluationRating::create([
                        'user_id'                       =>      $this->user->id,
                        'user_reviewer_id'              =>      $this->user_reviewer_id,
                        'user_rater_id'                 =>      auth()->user()->id,
                        'evaluation_item_id'            =>      $evaluationItem->id,
                        'numerical_rating'              =>      $this->numerical_rating[$evaluationItem->id],
                        'weight_score'                  =>      $evaluationItem->point_allocation * $this->numerical_rating[$evaluationItem->id],
                    ]);
                }
            }
        }

        $this->dispatch('toastr', [
            'type'          =>          'success',
            'message'       =>          'Evaluation submitted successfully',
        ]);

        $this->reset();

        $this->redirect('/admin/evaluation/user-evaluation', navigate: true);
    }

    public function message()
    {
        return [
            'user_reviewer_id.required'  =>      'Please select reviewer first',
        ];
    }

    public function render()
    {
        return view('livewire.admin.evaluation.user-evaluation', [
            $this->listEvaluations()
        ]);
    }
}
