<?php

namespace App\Livewire\User\Pages;

use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;

class AccountManagement extends Component
{
    #[Title('User | Account Management')]

    public $new_password;
    public $new_password_confirmation;
    public $first_name;
    public $last_name;
    public $middle_name;
    public function passwordChange()
    {
        $user = auth()->user();

        $this->validate([
            'new_password'                  =>                  ['required', 'min:6', 'confirmed'],
            'first_name'                    =>                  ['required'],
            'last_name'                     =>                  ['required'],
            'middle_name'                   =>                  ['required'],
        ]);

        $user->update([
            'password'          =>              $this->new_password,
            'first_name'        =>              $this->first_name,
            'last_name'         =>              $this->last_name,
            'middle_name'       =>              $this->middle_name
        ]);

        $this->dispatch('toastr', [
            'type'              =>              'success',
            'message'           =>              'Password change successfully'
        ]);

        $this->reset(['new_password', 'new_password_confirmation']);
    }

    public function resetForm()
    {
        $this->reset(['new_password', 'new_password_confirmation']);
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.user.pages.account-management');
    }
}
