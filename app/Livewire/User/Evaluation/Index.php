<?php

namespace App\Livewire\User\Evaluation;

use Livewire\Component;

class Index extends Component
{
    public function alreadyHaveEvaluation()
    {
        $this->dispatch('toastr', [
            'type'          =>          'error',
            'message'       =>          'Sorry, the admin has already evaluated you. You can submit attachments again after January–June or July–December.',
        ]);
    }
    public function render()
    {
        return view('livewire.user.evaluation.index');
    }
}
