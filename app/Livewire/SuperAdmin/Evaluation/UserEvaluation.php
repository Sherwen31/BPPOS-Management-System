<?php

namespace App\Livewire\SuperAdmin\Evaluation;

use App\Models\Evaluation;
use App\Models\EvaluationRating;
use App\Models\User;
use Livewire\Component;

class UserEvaluation extends Component
{

    public $police_id;
    public $evaluations;
    public $numerical_rating = [];
    public $user;
    public $activeTab = 1;
    public $hasEvaluationRating;

    public function listEvaluations()
    {
        $this->evaluations = Evaluation::with('evaluationItems')->get();
    }

    public function mount($userId, $policeId)
    {
        $user = User::where('id', $userId)->where('police_id', $policeId)->first();

        $this->police_id = $user->police_id;

        $this->user = $user;

        $this->hasEvaluationRating = EvaluationRating::where('user_id', $user->id)
            ->whereDate('created_at', today())
            ->exists();

        if (!$user || $this->hasEvaluationRating) {
            $this->redirect('/super-admin/evaluation/user-evaluation', navigate: true);
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
        ]);


        $evalutionData = [];

        foreach ($this->evaluations as $evaluation) {
            foreach ($evaluation->evaluationItems as $evaluationItem) {
                if (!isset($this->numerical_rating[$evaluationItem->id]) || $this->numerical_rating[$evaluationItem->id] === null) {
                    $this->dispatch('toastr', [
                        'type'          =>          'error',
                        'message'       =>          'Please fill in all fields first before submitting evaluation',
                    ]);
                    return;
                } else {
                    $evalutionData[] = [
                        'user_id'                       =>      $this->user->id,
                        'evaluation_item_id'            =>      $evaluationItem->id,
                        'numerical_rating'              =>      $this->numerical_rating[$evaluationItem->id],
                        'weight_score'                  =>      $evaluationItem->point_allocation * $this->numerical_rating[$evaluationItem->id],
                    ];
                }
            }
        }

        foreach ($evalutionData as $data) {
            EvaluationRating::create($data);
        }

        $this->dispatch('toastr', [
            'type'          =>          'success',
            'message'       =>          'Evaluation submitted successfully',
        ]);

        $this->reset();

        $this->redirect('/super-admin/evaluation/user-evaluation', navigate: true);
    }

    public function render()
    {
        return view('livewire.super-admin.evaluation.user-evaluation', [
            $this->listEvaluations()
        ]);
    }
}
