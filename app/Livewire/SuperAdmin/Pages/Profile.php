<?php

namespace App\Livewire\SuperAdmin\Pages;

use App\Models\Position;
use App\Models\Unit;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;

class Profile extends Component
{
    #[Title('Super Admin | Account Management')]

    public $first_name;
    public $last_name;
    public $middle_name;
    public $username;
    public $date_of_birth;
    public $gender;
    public $police_id;
    public $contact_number;
    public $rank;
    public $position_id;
    public $unit_id;
    public $address;
    public $year_attended;
    public $email;
    public $new_password;
    public $new_password_confirmation;
    public $current_password;
    public $units = [];
    public $positions = [];

    public function profile()
    {
        $user = auth()->user();
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->middle_name = $user->middle_name;
        $this->username = $user->username;
        $this->date_of_birth = $user->date_of_birth;
        $this->gender = $user->gender;
        $this->police_id = $user->police_id;
        $this->contact_number = $user->contact_number;
        $this->rank = $user->rank;
        $this->position_id = $user->position_id;
        $this->unit_id = $user->unit_id;
        $this->address = $user->address;
        $this->year_attended = $user->year_attended;
        $this->email = $user->email;

        $this->positions = Position::all();

        $this->units = Unit::all();
    }


    public function updateProfile()
    {
        $user = auth()->user();

        $this->validate([
            'first_name'                      =>              ['required', 'min:4', 'max:30'],
            'last_name'                       =>              ['required', 'min:4', 'max:30'],
            'username'                        =>              ['required', 'min:4', 'max:20', 'regex:/^[a-zA-Z0-9_]+$/', 'unique:users,username,' . $user->id],
            'date_of_birth'                   =>              ['required', 'date', 'before_or_equal:2024-12-31'],
            'gender'                          =>              ['required', 'in:Male,Female,Not selected'],
            'police_id'                       =>              ['required', 'min:1', 'max:99'],
            'contact_number'                  =>              ['required', 'numeric', 'digits:11'],
            'rank'                            =>              ['required', 'in:Constable,Police Executive Master Sergeant,Police Executive Major,Director-General,Police Officer,Sergeant,Lieutenant,Captain,Major,Colonel,Assistant Chief,Deputy Chief,Chief,Commissioner,Superintendent,Inspector,Chief Superintendent,Director,Assistant Commissioner,Deputy Commissioner,Chief Commissioner,Chief Constable,Chief of Police'],
            'email'                           =>              ['required', 'email', 'regex:/^\S+@\S+\.\S+$/', 'unique:users,email,' . $user->id],
            'position_id'                     =>              ['required', 'exists:positions,id'],
            'unit_id'                         =>              ['required', 'exists:units,id'],
            'address'                         =>              ['min:1', 'max:100'],
            'year_attended'                   =>              ['required', 'date', 'before_or_equal:today'],
        ]);

        $updateData = [
            'first_name'                          =>              $this->first_name,
            'last_name'                           =>              $this->last_name,
            'middle_name'                         =>              $this->middle_name,
            'username'                            =>              $this->username,
            'date_of_birth'                       =>              $this->date_of_birth,
            'gender'                              =>              $this->gender,
            'police_id'                           =>              $this->police_id,
            'contact_number'                      =>              $this->contact_number,
            'rank'                                =>              $this->rank,
            'email'                               =>              $this->email,
            'position_id'                         =>              $this->position_id,
            'unit_id'                             =>              $this->unit_id,
            'address'                             =>              $this->address,
            'year_attended'                       =>              $this->year_attended,
        ];


        $user->update($updateData);

        $user->save();

        $this->dispatch('toastr', [
            'type'          =>          'success',
            'message'       =>          'Profile updated successfully',
        ]);
    }

    public function messages()
    {
        return [
            'date_of_birth.before_or_equal'         =>              'The date of birth must be on or before 2024',
            'position_id.required'                  =>              'The Position is required',
            'unit_id.required'                      =>              'The Unit Assigned is required',
        ];
    }

    public function passwordChange()
    {
        $user = auth()->user();

        $this->validate([
            'current_password'              =>                  ['required', 'required_with:new_password'],
            'new_password'                  =>                  ['required', 'required-with:current_passowrd', 'different:current_password', 'min:6', 'confirmed']
        ]);

        if (!Hash::check($this->current_password, $user->password)) {
            $this->addError('current_password', 'Your current password is incorrect');

            return;
        } else {

            $user->update([
                'password'          =>              $this->new_password
            ]);

            $this->dispatch('toastr', [
                'type'              =>              'success',
                'message'           =>              'Password change successfully'
            ]);

            $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        }
    }

    public function render()
    {
        return view('livewire.super-admin.pages.profile', [
            $this->profile()
        ]);
    }
}
