<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class UserUnitManagement extends Component
{
    public $selected = [];

    public function listings()
    {
        $user = auth()->user();
        $personnels = User::with(['roles', 'unit', 'position', 'rank'])
            ->where('id', '!=', $user->id)
            ->whereHas('roles', function ($query) {
                $query->where('name', 'user');
            })
            ->where('unit_id', '!=', $user->unit_id)
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


    public function render()
    {
        return view('livewire.admin.users.user-unit-management', $this->listings());
    }
}
