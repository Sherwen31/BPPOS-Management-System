<?php

namespace App\Livewire\SuperAdmin\Users;

use App\Models\Position;
use App\Models\Rank;
use App\Models\Unit;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    #[Title('Super Admin | User and Personnel Profile')]

    public $positions = [];
    public $roles = [];
    public $units = [];
    public $ranks = [];
    public $first_name;
    public $last_name;
    public $middle_name;
    public $position_id;
    public $unit_id;
    public $rank_id;
    public $police_id;
    public $year_attended;
    public $contact_number;
    public $age;
    public $nationality;
    public $religion;
    public $address;
    public $date_of_birth;
    public $civil_status;
    public $gender;
    public $username;
    public $password;
    public $email;
    public $userData;
    public $search = '';
    public $viewUserData;

    public function listings()
    {
        $users = User::with(['position', 'rank', 'unit', 'roles'])->whereDoesntHave('roles', function ($query) {
            $query->where('name', 'super_admin');
        })
            ->where(function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                    ->orWhere('username', 'like', '%' . $this->search . '%')
                    ->orWhereHas('position', function ($query) {
                        $query->where('position_name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('rank', function ($query) {
                        $query->where('rank_name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('unit', function ($query) {
                        $query->where('unit_assignment', 'like', '%' . $this->search . '%');
                    });
            })
            ->where('id', '!=', auth()->user()->id)
            ->orderBy('id', 'asc')->paginate(10);

        $this->positions = Position::all();

        $this->ranks = Rank::all();

        $this->units = Unit::all();

        $this->password = 'default_pass';

        return compact('users');
    }

    public function createUser()
    {
        $this->validate([
            'first_name'                =>                  ['required'],
            'last_name'                 =>                  ['required'],
            'position_id'               =>                  ['required', 'exists:positions,id'],
            'unit_id'                   =>                  ['required', 'exists:units,id'],
            'rank_id'                   =>                  ['required', 'exists:ranks,id'],
            'police_id'                 =>                  ['required', 'unique:users,police_id'],
            'year_attended'             =>                  ['date', 'required', 'before_or_equal:today'],
            'username'                  =>                  ['required', 'unique:users,username'],
            'password'                  =>                  ['required', 'min:6', 'max:50'],
            'email'                     =>                  ['email', 'unique:users,email', 'required'],
            'civil_status'              =>                  ['required', 'in:Single,Married,Separated,Divorced,Engaged,Widowed,Not selected'],
            'gender'                    =>                  ['required', 'in:Male,Female,Not selected'],
        ]);

        $user = User::create([
            'first_name'                =>                  $this->first_name,
            'last_name'                 =>                  $this->last_name,
            'middle_name'               =>                  $this->middle_name,
            'position_id'               =>                  $this->position_id,
            'unit_id'                   =>                  $this->unit_id,
            'rank_id'                   =>                  $this->rank_id,
            'police_id'                 =>                  $this->police_id,
            'year_attended'             =>                  $this->year_attended,
            'username'                  =>                  $this->username,
            'password'                  =>                  bcrypt($this->password),
            'email'                     =>                  $this->email,
            'contact_number'            =>                  $this->contact_number,
            'age'                       =>                  $this->age,
            'nationality'               =>                  $this->nationality,
            'religion'                  =>                  $this->religion,
            'address'                   =>                  $this->address,
            'date_of_birth'             =>                  $this->date_of_birth,
            'civil_status'              =>                  $this->civil_status,
            'gender'                    =>                  $this->gender,
            'email_verified_at'         =>                  now(),
        ]);

        $user->assignRole('admin');

        $this->dispatch('toastr', [
            'type'              =>          'success',
            'message'           =>          'User added successfully',
        ]);

        $this->dispatch('closeModal');

        $this->resetData();
    }

    public function viewUser($id)
    {
        $user = User::with(['position', 'rank', 'unit', 'roles'])->find($id);

        if (!$user) {
            $this->dispatch('toastr', [
                'type'          =>              'error',
                'message'       =>              'No user found or deleted',
            ]);

            return;
        } else {
            $this->viewUserData = $user;
        }
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
            $this->rank_id = $user->rank_id;
            $this->police_id = $user->police_id;
            $this->email = $user->email;
            $this->username = $user->username;
            $this->year_attended = $user->year_attended;
            $this->age = $user->age;
            $this->nationality = $user->nationality;
            $this->religion = $user->religion;
            $this->address = $user->address;
            $this->date_of_birth = $user->date_of_birth;
            $this->civil_status = $user->civil_status;
            $this->gender = $user->gender;
            $this->contact_number = $user->contact_number;
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
            'rank_id'                   =>                  ['required', 'exists:ranks,id'],
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

        $oldUnit = $this->userData->unit->id;

        $this->userData->update([
            'first_name'                =>                  $this->first_name,
            'last_name'                 =>                  $this->last_name,
            'middle_name'               =>                  $this->middle_name,
            'position_id'               =>                  $this->position_id,
            'unit_id'                   =>                  $this->unit_id,
            'rank_id'                   =>                  $this->rank_id,
            'police_id'                 =>                  $this->police_id,
            'year_attended'             =>                  $this->year_attended,
            'username'                  =>                  $this->username,
            'email'                     =>                  $this->email,
            'contact_number'            =>                  $this->contact_number,
            'age'                       =>                  $this->age,
            'nationality'               =>                  $this->nationality,
            'religion'                  =>                  $this->religion,
            'address'                   =>                  $this->address,
            'date_of_birth'             =>                  $this->date_of_birth,
            'civil_status'              =>                  $this->civil_status,
            'gender'                    =>                  $this->gender,
        ]);


        $this->userData->userOldUnits()->attach($oldUnit);

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
        if (!$user) {
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
        $this->rank_id = '';
        $this->police_id = '';
        $this->year_attended = '';
        $this->username = '';
        $this->password = '';
        $this->email = '';
        $this->userData = '';
        $this->contact_number = '';
        $this->age = '';
        $this->nationality = '';
        $this->religion = '';
        $this->address = '';
        $this->date_of_birth = '';
        $this->civil_status = '';
        $this->gender = '';
    }

    public function messages()
    {
        return [
            'position_id.required'         =>              'The Position is required',
            'unit_id.required'             =>              'The Unit Assigned is required',
            'rank_id.required'             =>              'The Rank is required',
        ];
    }

    public function render()
    {
        return view('livewire.super-admin.users.index', $this->listings());
    }
}
