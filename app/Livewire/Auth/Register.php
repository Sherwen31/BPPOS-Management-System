<?php

namespace App\Livewire\Auth;

use App\Events\NewUserRegister;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
{

    #[Title('Register')]

    public $first_name;
    public $last_name;
    public $middle_name;
    public $username;
    public $police_id;
    public $contact_number;
    public $address;
    public $email;
    public $password;
    public $password_confirmation;

    public function register()
    {
        $this->validate([
            'first_name'                =>              ['required', 'min:1', 'max:50'],
            'last_name'                 =>              ['required', 'min:1', 'max:50'],
            'middle_name'               =>              ['required', 'min:1', 'max:50'],
            'username'                  =>              ['required', 'min:1', 'max:20', 'regex:/^[a-zA-Z0-9_]+$/', 'unique:users,username'],
            'police_id'                 =>              ['required', 'min:1', 'max:100', 'unique:users,police_id'],
            'contact_number'            =>              ['required', 'numeric', 'digits:11'],
            'address'                   =>              ['required', 'min:4', 'max:100'],
            'email'                     =>              ['required', 'email', 'unique:users,email', 'regex:/^\S+@\S+\.\S+$/'],
            'password'                  =>              ['required', 'min:6', 'confirmed']
        ]);

        $user = User::create([
            'first_name'                =>              $this->first_name,
            'last_name'                 =>              $this->last_name,
            'middle_name'               =>              $this->middle_name,
            'username'                  =>              $this->username,
            'police_id'                 =>              $this->police_id,
            'contact_number'            =>              $this->contact_number,
            'address'                   =>              $this->address,
            'email'                     =>              $this->email,
            'password'                  =>              bcrypt($this->password),
        ]);

        $user->assignRole('user');

        $this->reset();

        $this->dispatch('swal', [
            'title'       =>          'Registered',
            'text'        =>          $user->email . ' registered successfully.',
            'icon'        =>          'success'
        ]);

        return;
    }

    public function render()
    {
        if (auth()->check()) {
            $this->redirect('/home', navigate: true);
        }
        return view('livewire.auth.register');
    }
}
