<?php

namespace App\Livewire\SuperAdmin\Evaluation;

use Livewire\Attributes\Title;
use Livewire\Component;

class RatingIndicator extends Component
{

    #[Title('Super Admin | Rating Indicator')]
    public function render()
    {
        return view('livewire.super-admin.evaluation.rating-indicator');
    }
}
