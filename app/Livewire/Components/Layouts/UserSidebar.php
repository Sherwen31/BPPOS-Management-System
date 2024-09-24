<?php

namespace App\Livewire\Components\Layouts;

use Livewire\Component;

class UserSidebar extends Component
{

    public function logout()
    {
        auth()->logout();

        $this->redirect('/login', navigate: true);
    }

    public function render()
    {
        return view('livewire.components.layouts.user-sidebar');
    }
}
