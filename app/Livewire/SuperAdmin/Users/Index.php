<?php

namespace App\Livewire\SuperAdmin\Users;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{

    public $users = [];

    public function usersList()
    {
        $this->users = User::where('role', 'super_admin')->orWhere('id', auth()->user()->id)->orderBy('id', 'desc')->get();
    }
    public function render()
    {
        return view('livewire.super-admin.users.index');
    }
}
