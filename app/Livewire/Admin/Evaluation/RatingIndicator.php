<?php

namespace App\Livewire\Admin\Evaluation;

use Livewire\Attributes\Title;
use Livewire\Component;

class RatingIndicator extends Component
{
    #[Title('Admin | Rating Indicator')]
    public function render()
    {
        return view('livewire.admin.evaluation.rating-indicator');
    }
}
