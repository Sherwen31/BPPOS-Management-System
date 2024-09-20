<?php

namespace App\Livewire\Components\Layouts;

use Livewire\Component;

class Sidebar extends Component
{

    public function logout()
    {
        auth()->logout();

        $this->redirect('/login', navigate: true);
    }

    public function render()
    {
        return view('livewire.components.layouts.sidebar');
    }
}
