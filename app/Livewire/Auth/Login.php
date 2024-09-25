<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Title('Login')]

    public $username_or_email_or_police_id;
    public $password;

    public function login()
    {
        $this->validate([
            'username_or_email_or_police_id'            =>                ['required', 'min:4'],
            'password'                                  =>                ['required', 'min:6']
        ]);

        $user = User::where('email', $this->username_or_email_or_police_id)
            ->orWhere('username', $this->username_or_email_or_police_id)
            ->orWhere('police_id', $this->username_or_email_or_police_id)
            ->first();

        if (!$user || $user->email_verified_at === null) {

            $this->dispatch('toastr', [
                'type'          =>          'error',
                'message'       =>          'The username or email is either not verified yet or does not exist',
            ]);

            return;
        }

        $login = auth()->attempt([
            'email'         =>          filter_var($this->username_or_email_or_police_id, FILTER_VALIDATE_EMAIL) ? $this->username_or_email_or_police_id : $user->email,
            'password'      =>          $this->password
        ]);

        if ($login) {
            if ($user->hasRole('super_admin')) {
                $this->redirect('/super-admin/dashboard', navigate: true);
            } elseif ($user->hasRole('admin')) {
                $this->redirect('/admin/dashboard', navigate: true);
            } else {
                $this->redirect('/users/home', navigate: true);
            }
        } else {
            $this->dispatch('toastr', [
                'type'          =>          'error',
                'message'       =>          'Invalid Credentials',
            ]);

            return;
        }
    }

    public function render()
    {
        if (auth()->check()) {
            if(auth()->user()->hasRole('super_admin')) {
                $this->redirect('/super-admin/dashboard', navigate: true);
            } elseif(auth()->user()->hasRole('admin')) {
                $this->redirect('/admin/dashboard', navigate: true);
            } else {
                $this->redirect('/users/home', navigate: true);
            }
        }
        return view('livewire.auth.login');
    }
}
