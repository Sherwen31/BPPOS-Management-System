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
    public function passwordChange()
    {
        $user = auth()->user();

        $this->validate([
            'new_password'                  =>                  ['required', 'min:6', 'confirmed']
        ]);

        $user->update([
            'password'          =>              $this->new_password
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
        $this->resetErrorBag(); // Clears validation errors
    }

    public function render()
    {
        return view('livewire.user.pages.account-management');
    }
}
