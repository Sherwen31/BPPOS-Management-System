<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Component;

class ForgotPassword extends Component
{

    public $email;
    public $errorMessage = "";
    public $successMessage = "";

    #[Title('Forgot Password')]

    public function forgotPassword()
    {
        $this->validate([
            'email'             =>              ['required', 'email', 'regex:/^\S+@\S+\.\S+$/'],
        ]);

        $status = Password::sendResetLink([
            'email'         =>          $this->email
        ]);

        if ($status === Password::RESET_LINK_SENT) {
            $this->successMessage = 'Password reset link has been sent to your email.';
            $this->errorMessage = '';
        } elseif ($status === Password::INVALID_USER) {
            $this->errorMessage = 'No user found with the provided email address.';
            $this->successMessage = '';
        } elseif ($status === Password::RESET_THROTTLED) {
            $this->errorMessage = 'Too many reset attempts. Please try again later.';
            $this->successMessage = '';
        } else {
            $this->errorMessage = 'There was an error processing your request. Please try again later.';
            $this->successMessage = '';
        }
    }
    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}