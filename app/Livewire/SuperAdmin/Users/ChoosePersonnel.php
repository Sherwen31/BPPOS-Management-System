<?php

namespace App\Livewire\SuperAdmin\Users;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ChoosePersonnel extends Component
{

    public $selected = [];
    public $selected_unit = [];
    public $loadMore = 20;
    public $loadTotal = 50;
    public $searchAdmin = '';
    public $searchPersonnel = '';
    public $filterAdmin = 'asc';
    public $filterPersonnel = 'asc';

    public function listings()
    {

        $users = User::query()
            ->with(['roles', 'position', 'unit', 'rank'])
            ->whereHas('roles', function ($query) {
                $query->where('name', 'admin');
            })
            ->where('id', '!=', auth()->user()->id)
            ->where(function ($query) {
                $query->where('first_name', 'like', '%' . $this->searchAdmin . '%')
                    ->orWhere('last_name', 'like', '%' . $this->searchAdmin . '%')
                    ->orWhereHas('unit', function ($subQuery) {
                        $subQuery->where('unit_assignment', 'like', '%' . $this->searchAdmin . '%');
                    })
                    ->orWhereHas('roles', function ($subQuery) {
                        $subQuery->where('name', 'like', '%' . $this->searchAdmin . '%');
                    });
            })
            ->orderBy('first_name', $this->filterAdmin)
            ->get();

        $personnels = User::query()
            ->with(['roles', 'position', 'unit', 'rank'])
            ->whereHas('roles', function ($query) {
                $query->where('name', 'user');
            })
            ->where('id', '!=', auth()->user()->id)
            ->orderBy('first_name', $this->filterPersonnel)
            ->where(function ($query) {
                $query->where('first_name', 'like', '%' . $this->searchPersonnel . '%')
                    ->orWhere('last_name', 'like', '%' . $this->searchPersonnel . '%')
                    ->orWhereHas('unit', function ($subQuery) {
                        $subQuery->where('unit_assignment', 'like', '%' . $this->searchPersonnel . '%');
                    })
                    ->orWhereHas('roles', function ($subQuery) {
                        $subQuery->where('name', 'like', '%' . $this->searchPersonnel . '%');
                    });
            })
            ->take($this->loadTotal)
            ->get();

        $units = Unit::query()
            ->with(['users'])
            ->whereDoesntHave('users', function ($query) {
                $query->whereHas('roles', function ($subQuery) {
                    $subQuery->where('name', 'admin');
                });
            })
            ->get();

        return compact('users', 'personnels', 'units');
    }

    public function loadMorePage()
    {
        $this->loadTotal += $this->loadMore;
    }

    public function moveToUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            $this->dispatch('toastr', [
                'type'          =>              'error',
                'message'       =>              'No user found or already deleted',
            ]);
            return;
        }

        $user->syncRoles('user');

        $this->dispatch('toastr', [
            'type'          =>              'success',
            'message'       =>              'This user is successfully converted to a personnel',
        ]);
    }

    public function confirmChanges()
    {
        $users = User::with(['roles'])->whereIn('id', $this->selected)->get();

        foreach ($users as $user) {
            $userOldUnit = $user->unit->id;
            if (!$user->hasRole('admin')) {
                $this->validate([
                    'selected_unit.' . $user->id => [
                        'required_with:selected'
                    ],
                ], [
                    'selected_unit.' . $user->id . '.required_with' => 'Please select a unit first.',
                ]);
            }

            $user->update([
                'unit_id' => $this->selected_unit[$user->id],
            ]);

            $user->syncRoles('admin');

            $user->userOldUnits()->attach($userOldUnit);

            $user->save();
        }


        $this->dispatch('toastr', [
            'type'          =>              'success',
            'message'       =>              'Selected users are successfully converted to a admin personnel and assigned to the selected unit',
        ]);

        $this->dispatch('closeModal');
        $this->dispatch('refreshData');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.super-admin.users.choose-personnel', $this->listings());
    }
}
