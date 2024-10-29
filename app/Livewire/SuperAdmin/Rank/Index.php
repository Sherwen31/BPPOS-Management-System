<?php

namespace App\Livewire\SuperAdmin\Rank;

use App\Models\Rank;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $rank_name;
    public $rank;

    public function listings()
    {
        $ranks = Rank::orderBy('created_at', 'asc')->paginate(10);

        return compact('ranks', 'ranks');
    }

    public function createRank()
    {
        $this->validate([
            'rank_name'             =>              ['required', 'max:255'],
        ]);


        Rank::create([
            'rank_name'             =>              $this->rank_name,
        ]);

        $this->dispatch('toastr', [
            'type'                  =>                  'success',
            'message'               =>                  'Rank created successfully.',
        ]);

        $this->dispatch('closeModal');

        $this->reset();
    }

    public function editRank($id)
    {
        $rank = Rank::find($id);

        if (!$rank) {
            $this->dispatch('toastr', [
                'type'                  =>                      'error',
                'message'               =>                      'No rank name found or deleted',
            ]);
        } else {
            $this->rank = $rank;

            $this->rank_name = $rank->rank_name;
        }
    }

    public function updateRank()
    {
        $this->validate([
            'rank_name'           =>              ['required', 'max:255'],
        ]);

        $this->rank->update([
            'rank_name'           =>              $this->rank_name,
        ]);

        $this->dispatch('toastr', [
            'type'              =>              'success',
            'message'           =>              'Rank name updated successfully.',
        ]);

        $this->dispatch('closeModal');
    }

    public function deleteRank($id)
    {
        $rank = Rank::find($id);
        if (!$rank) {
            $this->dispatch('toastr', [
                'type'                  =>                      'error',
                'message'               =>                      'No rank name found or deleted',
            ]);
        } else {
            $rank->delete();
            $this->dispatch('toastr', [
                'type'                  =>                      'success',
                'message'               =>                      'Rank name deleted successfully',
            ]);
        }
    }


    #[On('resetData')]
    public function resetData()
    {
        $this->rank = null;
        $this->rank_name = '';
    }

    public function render()
    {
        return view('livewire.super-admin.rank.index', $this->listings());
    }
}
