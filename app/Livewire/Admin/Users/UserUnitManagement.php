<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class UserUnitManagement extends Component
{
    public $selected = [];
    public $loadTotal = 50;
    public $loadMore = 20;
    public $searchPersonnel = '';
    public $filterPersonnel = 'asc';

    public function listings()
    {
        $user = auth()->user();
        $personnels = User::with(['roles', 'unit', 'position', 'rank'])
            ->where('id', '!=', $user->id)
            ->whereHas('roles', function ($query) {
                $query->where('name', 'user');
            })
            ->where('unit_id', '!=', $user->unit_id)
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
            ->orderBy('first_name', $this->filterPersonnel)
            ->take($this->loadTotal)
            ->get();

        return compact('personnels');
    }

    public function confirmChanges()
    {
        $myUnitId = auth()->user()->unit->id;

        $users = User::with('unit')->whereIn('id', $this->selected)->get();

        foreach ($users as $user) {
            $userOldUnitsSaved = $user->unit?->id;

            $user->update([
                'unit_id'       =>          $myUnitId
            ]);

            if ($userOldUnitsSaved) {
                $user->userOldUnits()->attach($userOldUnitsSaved);
            }
        }

        $this->reset();

        $this->dispatch('toastr', [
            'type'              =>              'success',
            'message'           =>              'Selected personnel assigned to your unit'
        ]);

        $this->dispatch('closeModal');

        $this->dispatch('refreshDataUnit');
    }

    public function loadMorePage()
    {
        $this->loadTotal += $this->loadMore;
    }


    public function render()
    {
        return view('livewire.admin.users.user-unit-management', $this->listings());
    }
}
