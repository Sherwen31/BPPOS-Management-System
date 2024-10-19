<?php

namespace App\Livewire\SuperAdmin\UnitAndPosition;

use App\Models\Position;
use App\Models\Unit;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UnitAndPosition extends Component
{
    use WithPagination;

    public $position_name;
    public $unit_assignment;
    public $position;
    public $unit;

    public function listings()
    {
        $positions = Position::orderBy('created_at', 'asc')->paginate(10, ['*'], 'positionPage');
        $units = Unit::orderBy('created_at', 'asc')->paginate(10, ['*'], 'unitPage');

        return compact('positions', 'units');
    }

    public function createPosition()
    {
        $this->validate([
            'position_name'             =>              ['required', 'max:255'],
        ]);


        Position::create([
            'position_name'             =>              $this->position_name,
        ]);

        $this->dispatch('toastr', [
            'type'                  =>                  'success',
            'message'               =>                  'Position created successfully.',
        ]);

        $this->dispatch('closeModal');

        $this->reset();
    }

    public function createUnit()
    {
        $this->validate([
            'unit_assignment'           =>              ['required', 'max:255'],
        ]);


        Unit::create([
            'unit_assignment'           =>              $this->unit_assignment,
        ]);

        $this->dispatch('toastr', [
            'type'              =>              'success',
            'message'           =>              'Unit assignment created successfully.',
        ]);

        $this->dispatch('closeModal');

        $this->reset();
    }

    public function deleteUnit($id)
    {
        $unit = Unit::find($id);
        if (!$unit) {
            $this->dispatch('toastr', [
                'type'                  =>                      'error',
                'message'               =>                      'No unit assignment found or deleted',
            ]);
        } else {
            $unit->delete();
            $this->dispatch('toastr', [
                'type'                  =>                      'success',
                'message'               =>                      'Unit assignment deleted successfully',
            ]);
        }
    }

    public function deletePosition($id)
    {
        $position = Position::find($id);
        if (!$position) {
            $this->dispatch('toastr', [
                'type'                  =>                      'error',
                'message'               =>                      'No position name found or deleted',
            ]);
        } else {
            $position->delete();
            $this->dispatch('toastr', [
                'type'                  =>                      'success',
                'message'               =>                      'Position name deleted successfully',
            ]);
        }
    }

    public function editPosition($id)
    {

        $position = Position::find($id);

        if (!$position) {
            $this->dispatch('toastr', [
                'type'                  =>                      'error',
                'message'               =>                      'No position name found or deleted',
            ]);
        } else {
            $this->position = $position;

            $this->position_name = $position->position_name;
        }
    }

    public function updatePosition()
    {
        $this->validate([
            'position_name'           =>              ['required', 'max:255'],
        ]);

        $this->position->update([
            'position_name'           =>              $this->position_name,
        ]);

        $this->dispatch('toastr', [
            'type'              =>              'success',
            'message'           =>              'Position name updated successfully.',
        ]);

        $this->dispatch('closeModal');
    }

    public function editUnit($id)
    {
        $unit = Unit::find($id);

        if (!$unit) {
            $this->dispatch('toastr', [
                'type'                  =>                      'error',
                'message'               =>                      'No unit assignment found or deleted',
            ]);
        } else {
            $this->unit = $unit;

            $this->unit_assignment = $unit->unit_assignment;
        }
    }

    public function updateUnit()
    {
        $this->validate([
            'unit_assignment'           =>              ['required', 'max:255'],
        ]);

        $this->unit->update([
            'unit_assignment'           =>              $this->unit_assignment,
        ]);

        $this->dispatch('toastr', [
            'type'              =>              'success',
            'message'           =>              'Unit assignment updated successfully.',
        ]);

        $this->dispatch('closeModal');
    }

    #[On('resetData')]
    public function resetData()
    {
        $this->position = null;
        $this->unit = null;
        $this->position_name = '';
        $this->unit_assignment = '';
    }

    public function render()
    {
        return view('livewire.super-admin.unit-and-position.unit-and-position', $this->listings());
    }
}