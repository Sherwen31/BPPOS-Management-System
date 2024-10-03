<?php

namespace App\Livewire\Admin\Evaluation;

use App\Models\Evaluation;
use App\Models\EvaluationItem;
use App\Models\EvaluationRating;
use App\Models\Position;
use App\Models\Unit;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Title('Admin | User Evaluation Management')]

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
    public $title;
    public $sub_title;
    public $evaluation_id;
    public $performance_indications;
    public $point_allocation;
    public $weight_score = 0;
    public $total_score;
    public $evaluation_item_id;
    public $evaluations = [];
    public $evaluation_items = [];
    public $hasEvaluationRating;
    public $search = '';

    public function listings()
    {
        $users = User::with(['position', 'unit', 'roles', 'evaluationRatings'])
            ->where(function ($query) {
                $query->where('police_id', 'like', '%' . $this->search . '%')
                    ->orWhere('rank', 'like', '%' . $this->search . '%')
                    ->orWhereHas('position', function ($query) {
                        $query->where('position_name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('unit', function ($query) {
                        $query->where('unit_assignment', 'like', '%' . $this->search . '%');
                    });
            })
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', 'super_admin')->orWhere('name', 'admin');
            })
            ->where('id', '!=', auth()->user()->id)
            ->orderBy('id', 'asc')->paginate(10);

        $this->positions = Position::all();

        $this->units = Unit::all();

        $this->evaluations = Evaluation::all();

        $this->evaluation_items = EvaluationItem::all();

        return compact('users');
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

        $user->assignRole('admin');

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
        $this->rank = '';
        $this->police_id = '';
        $this->year_attended = '';
        $this->username = '';
        $this->password = '';
        $this->email = '';
        $this->userData = '';
    }

    public function createEvaluation()
    {
        $this->validate([
            'title'                       =>                  ['required', 'max:255', 'min:1'],
            'sub_title'                   =>                  ['required', 'max:255', 'min:1'],
        ]);

        Evaluation::create([
            'title'                       =>                  $this->title,
            'sub_title'                   =>                  $this->sub_title,
        ]);

        $this->reset();

        $this->dispatch('toastr', [
            'type'              =>          'success',
            'message'           =>          'Evaluation created successfully',
        ]);
    }

    public function createEvaluationItem()
    {
        $this->validate([
            'evaluation_id'                 =>                  ['required', 'exists:evaluations,id'],
            'performance_indications'       =>                  ['required', 'max:255', 'min:1'],
            'point_allocation'              =>                  ['required', 'max:255', 'min:1'],
        ]);

        $exists = EvaluationItem::where('evaluation_id', $this->evaluation_id)->where('performance_indications', $this->performance_indications)->exists();

        if ($exists) {
            $this->validate([
                'performance_indications'       =>                  ['required', 'max:255', 'min:1', 'unique:evaluation_items,performance_indications'],
            ]);
        }

        EvaluationItem::create([
            'evaluation_id'                 =>                  $this->evaluation_id,
            'performance_indications'       =>                  $this->performance_indications,
            'point_allocation'              =>                  $this->point_allocation,
        ]);

        $this->reset(['performance_indications', 'point_allocation']);

        $this->dispatch('toastr', [
            'type'              =>          'success',
            'message'           =>          'Evaluation Item created successfully',
        ]);
    }

    public function userHasEvaluation($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            $this->dispatch('toastr', [
                'type'          =>              'error',
                'message'       =>              'No user found or deleted',
            ]);

            return;
        } else {

            $this->hasEvaluationRating = EvaluationRating::with('user')->where('user_id', $user->id)
                ->whereDate('created_at', today())
                ->exists();

            if ($this->hasEvaluationRating) {
                $this->dispatch('toastr', [
                    'type'          =>          'error',
                    'message'       =>          'Evaluation already submitted. You can evaluate another tomorrow',
                ]);
            }
        }
    }

    public function cantPrint()
    {
        $this->dispatch('toastr', [
            'type'          =>          'error',
            'message'       =>          'Sorry print is unavailable because this user is no evaluation yet',
        ]);
    }

    public function messages()
    {
        return [
            'position_id.required'         =>              'The Position is required',
            'unit_id.required'             =>              'The Unit Assigned is required',
            'evaluation_id.required'       =>              'The Evaluation Title is required',
        ];
    }
    public function render()
    {
        return view(
            'livewire.admin.evaluation.index',
            $this->listings()
        );
    }
}
