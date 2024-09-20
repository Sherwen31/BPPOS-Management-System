<?php

namespace App\Livewire\SuperAdmin\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{

    #[Title('Super Admin | Dashboard')]
    public function render()
    {
        return view('livewire.super-admin.pages.dashboard');
    }
}
