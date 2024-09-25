<?php

namespace App\Livewire\Admin\Users;

use App\Models\Position;
use App\Models\Unit;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Title('Admin | User Account Management')]

    public $users = [];
    public $positions = [];
    public $roles = [];
    public $units = [];
    public $first_name;
    public $last_name;
    public $middle_name;
    public $position_id;
    public $unit_id;
    public $rank;
    public $police_id;
    public $year_attended;
    public $username;
    public $password;
    public $email;
    public $userData;

    public function listings()
    {
        $this->users = User::with(['position', 'unit', 'roles'])->whereDoesntHave('roles', function ($query) {
            $query->where('name', 'super_admin')->orWhere('name', 'admin');
        })
            ->where('id', '!=', auth()->user()->id)
            ->orderBy('id', 'asc')->get();

        $this->positions = Position::all();

        $this->units = Unit::all();
    }

    public function createUser()
    {
        $this->validate([
            'first_name'                =>                  ['required'],
            'last_name'                 =>                  ['required'],
            'position_id'               =>                  ['required', 'exists:positions,id'],
            'unit_id'                   =>                  ['required', 'exists:units,id'],
            'rank'                      =>                  ['required'],
            'police_id'                 =>                  ['required', 'unique:users,police_id'],
            'year_attended'             =>                  ['date', 'required', 'before_or_equal:today'],
            'username'                  =>                  ['required', 'unique:users,username'],
            'password'                  =>                  ['required', 'min:6', 'max:50'],
            'email'                     =>                  ['email', 'unique:users,email', 'required']
        ]);

        $user = User::create([
            'first_name'                =>                  $this->first_name,
            'last_name'                 =>                  $this->last_name,
            'middle_name'               =>                  $this->middle_name,
            'position_id'               =>                  $this->position_id,
            'unit_id'                   =>                  $this->unit_id,
            'rank'                      =>                  $this->rank,
            'police_id'                 =>                  $this->police_id,
            'year_attended'             =>                  $this->year_attended,
            'username'                  =>                  $this->username,
            'password'                  =>                  bcrypt($this->password),
            'email'                     =>                  $this->email
        ]);

        $user->assignRole('user');

        $this->dispatch('toastr', [
            'type'              =>          'success',
            'message'           =>          'User added successfully',
        ]);

        $this->dispatch('closeModal');

        $this->resetData();
    }

    public function manageUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            $this->dispatch('toastr', [
                'type'          =>              'error',
                'message'       =>              'No user found or deleted',
            ]);

            return;
        } else {
            $this->userData = $user;
            $this->first_name = $user->first_name;
            $this->last_name = $user->last_name;
            $this->middle_name = $user->middle_name;
            $this->position_id = $user->position_id;
            $this->unit_id = $user->unit_id;
            $this->rank = $user->rank;
            $this->police_id = $user->police_id;
            $this->email = $user->email;
            $this->username = $user->username;
            $this->year_attended = $user->year_attended;
        }
    }

    public function verified($id)
    {
        $user = User::find($id);

        if (!$user) {
            $this->dispatch('toastr', [
                'type'          =>              'error',
                'message'       =>              'No user found or deleted',
            ]);

            return;
        } else {
            $user->update([
                'email_verified_at' => now(),
            ]);

            $this->dispatch('toastr', [
                'type'          =>              'success',
                'message'       =>              'Successfully verified the user',
            ]);
        }
    }

    public function updateUser()
    {
        $this->validate([
            'first_name'                =>                  ['required'],
            'last_name'                 =>                  ['required'],
            'position_id'               =>                  ['required', 'exists:positions,id'],
            'unit_id'                   =>                  ['required', 'exists:units,id'],
            'rank'                      =>                  ['required'],
            'police_id'                 =>                  ['required', 'unique:users,police_id,' . $this->userData->id],
            'year_attended'             =>                  ['date', 'required', 'before_or_equal:today'],
            'username'                  =>                  ['required', 'unique:users,username,' . $this->userData->id],
            'email'                     =>                  ['email', 'unique:users,email,' . $this->userData->id, 'required']
        ]);

        if ($this->password) {
            $this->validate([
                'password'                  =>                  ['min:6', 'max:50'],
            ]);

            $this->userData->update([
                'password'                  =>                  bcrypt($this->password),
            ]);
        }

        $this->userData->update([
            'first_name'                =>                  $this->first_name,
            'last_name'                 =>                  $this->last_name,
            'middle_name'               =>                  $this->middle_name,
            'position_id'               =>                  $this->position_id,
            'unit_id'                   =>                  $this->unit_id,
            'rank'                      =>                  $this->rank,
            'police_id'                 =>                  $this->police_id,
            'year_attended'             =>                  $this->year_attended,
            'username'                  =>                  $this->username,
            'email'                     =>                  $this->email
        ]);

        $this->dispatch('toastr', [
            'type'              =>              'success',
            'message'           =>              'User updated successfully',
        ]);

        $this->dispatch('closeModal', ['userId' => $this->userData->id]);

        $this->resetData();
    }


    public function deleteUser($id)
    {

        $user = User::find($id);
        if(!$user)
        {
            $this->dispatch('toastr', [
                'type'          =>              'error',
                'message'       =>              'No user found or deleted',
            ]);

            return;
        } else {
            $user->delete();
            $this->dispatch('toastr', [
                'type'          =>              'success',
                'message'       =>              'User deleted successfully',
            ]);
        }
    }

    public function resetData()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->middle_name = '';
        $this->position_id = '';
        $this->unit_id = '';
        $this->rank = '';
        $this->police_id = '';
        $this->year_attended = '';
        $this->username = '';
        $this->password = '';
        $this->email = '';
        $this->userData = '';
    }

    public function messages()
    {
        return [
            'position_id.required'         =>              'The Position is required',
            'unit_id.required'             =>              'The Unit Assigned is required',
        ];
    }
    public function render()
    {
        return view('livewire.admin.users.index', [
            $this->listings()
        ]);
    }
}
