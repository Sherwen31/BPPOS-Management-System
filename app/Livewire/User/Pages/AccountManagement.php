<?php

namespace App\Livewire\User\Pages;

use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class AccountManagement extends Component
{
    use WithFileUploads;

    #[Title('User | Account Management')]

    public $new_password;
    public $new_password_confirmation;
    public $first_name;
    public $last_name;
    public $middle_name;
    public $profile_picture;
    public $username;
    public $nationality;
    public $religion;
    public $contact_number;
    public $age;
    public $civil_status;
    public $gender;
    public $email;
    public $address;
    public $date_of_birth;
    public function passwordChange()
    {
        $user = auth()->user();

        if ($this->new_password) {
            $this->validate([
                'new_password'                  =>                  ['required', 'min:6', 'confirmed'],
            ]);
        }

        if ($this->profile_picture) {
            $this->validate([
                'profile_picture'               =>                  ['image', 'mimes:jpg,jpeg,png,webp,ico,gif', 'max:2048']
            ]);
        }

        $this->validate([
            'first_name'                    =>                  ['required'],
            'last_name'                     =>                  ['required'],
            'username'                      =>                  ['required'],
            'nationality'                   =>                  ['required'],
            'religion'                      =>                  ['required'],
            'contact_number'                =>                  ['required', 'numeric'],
            'age'                           =>                  ['required', 'numeric'],
            'civil_status'                  =>                  ['required', 'in:Single,Married,Separated,Divorced,Engaged,Widowed,Not selected'],
            'gender'                        =>                  ['required', 'in:Male,Female,Not selected'],
            'email'                         =>                  ['required', 'unique:users,email,' . $user->id, 'regex:/^\S+@\S+\.\S+$/', 'email'],
            'address'                       =>                  ['required'],
            'date_of_birth'                 =>                  ['required']
        ]);

        $profileImage = $this->profile_picture ? $this->profile_picture->store('profile_attachments', 'public') : null;

        $dataToUpdate = [
            'first_name'        =>              $this->first_name,
            'last_name'         =>              $this->last_name,
            'middle_name'       =>              $this->middle_name,
            'username'          =>              $this->username,
            'nationality'       =>              $this->nationality,
            'religion'          =>              $this->religion,
            'contact_number'    =>              $this->contact_number,
            'age'               =>              $this->age,
            'civil_status'      =>              $this->civil_status,
            'gender'            =>              $this->gender,
            'email'             =>              $this->email,
            'address'           =>              $this->address,
            'date_of_birth'     =>              $this->date_of_birth,
        ];

        if ($this->new_password) {
            $dataToUpdate['password'] = bcrypt($this->new_password);
        }

        if ($profileImage) {
            $dataToUpdate['profile_picture'] = $profileImage;
        }

        $user->update($dataToUpdate);


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
        $user = auth()->user();
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->middle_name = $user->middle_name;
        $this->username = $user->username;
        $this->nationality = $user->nationality;
        $this->religion = $user->religion;
        $this->contact_number = $user->contact_number;
        $this->age = $user->age;
        $this->civil_status = $user->civil_status;
        $this->gender = $user->gender;
        $this->email = $user->email;
        $this->address = $user->address;

        return view('livewire.user.pages.account-management');
    }
}
