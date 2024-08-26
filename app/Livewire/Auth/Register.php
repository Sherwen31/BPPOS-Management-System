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

    public $name;
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
            'name'                      =>              ['required', 'min:4', 'max:50'],
            'username'                  =>              ['required', 'min:4', 'max:50', 'unique:users,username'],
            'police_id'                 =>              ['required', 'min:1', 'max:100', 'unique:users,police_id'],
            'contact_number'            =>              ['required', 'numeric', 'digits:11'],
            'address'                   =>              ['required', 'min:4', 'max:100'],
            'email'                     =>              ['required', 'email', 'unique:users,email', 'regex:/^\S+@\S+\.\S+$/'],
            'password'                  =>              ['required', 'min:6', 'confirmed']
        ]);

        $user = User::create([
            'name'                      =>              $this->name,
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
            'text'        =>          $user->name . 'registered successfully.',
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
