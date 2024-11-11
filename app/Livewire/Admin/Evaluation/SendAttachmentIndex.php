<?php

namespace App\Livewire\Admin\Evaluation;

use Livewire\Component;

class SendAttachmentIndex extends Component
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
        return view('livewire.admin.evaluation.send-attachment-index');
    }
}
