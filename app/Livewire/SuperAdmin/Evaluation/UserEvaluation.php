<?php

namespace App\Livewire\SuperAdmin\Evaluation;

use App\Models\User;
use Livewire\Component;

class UserEvaluation extends Component
{

    public $police_id;

    public function mount($userId, $policeId)
    {
        $user = User::where('id', $userId)->where('police_id', $policeId)->first();

        $this->police_id = $user->police_id;

        if(!$user)
        {
            $this->redirect('/super-admin/evaluation/user-evaluation', navigate: true);
        }
    }
    public function render()
    {
        return view('livewire.super-admin.evaluation.user-evaluation');
    }
}
