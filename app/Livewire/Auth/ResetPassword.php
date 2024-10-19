<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;

class ResetPassword extends Component
{
    public $email;
    public $token;
    public $password;
    public $password_confirmation;
    public $errorMessage = '';
    public $successMessage = '';

    #[Title('Reset Password')]

    public function mount()
    {
        $this->token = request()->query('token');
        $this->email = request()->query('email');
    }

    public function resetPassword()
    {
        $this->validate([
            'password'          =>          ['required', 'min:6', 'confirmed'],
        ]);

        $status = Password::reset(
            [
                'email'                         =>                  $this->email,
                'password'                      =>                  $this->password,
                'password_confirmation'         =>                  $this->password_confirmation,
                'token'                         =>                  $this->token,
            ],
            function ($user) {
                $user->forceFill([
                    'password'                  =>              Hash::make($this->password),
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            $this->successMessage = 'Your password has been successfully reset!';
            $this->errorMessage = '';
            $this->dispatch('swal', [
                'title'       =>          'Success',
                'text'        =>          'Your password has been successfully reset!',
                'icon'        =>          'success'
            ]);
        } elseif ($status === Password::INVALID_TOKEN) {
            $this->errorMessage = 'The password reset token is invalid or has expired.';
            $this->successMessage = '';
        } elseif ($status === Password::INVALID_USER) {
            $this->errorMessage = 'No user found with the provided email address.';
            $this->successMessage = '';
        } else {
            $this->errorMessage = 'An unexpected error occurred. Please try again.';
            $this->successMessage = '';
        }
    }

    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}