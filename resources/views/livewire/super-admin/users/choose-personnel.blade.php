<div>
    <div wire:ignore.self class="modal fade" id="choosePersonnel" tabindex="-1" aria-labelledby="choosePersonnelLabel"
        data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="choosePersonnelLabel">Choose Personnel</h1>
                </div>
                <div class="modal-body">
                    <div class="card bg-transparent">
                        <h4 class="mt-3">Admins</h4>
                        <hr>
                        <table class="table">
                            <thead></thead>
                            <tr>
                                <th scope="col">Full Name</th>
                                <th scope="col">Unit Assignment</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr wire:key='{{ $user->id }}'>
                                    <td>{{ $user->fist_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->unit->unit_assignment }}</td>
                                    <td>
                                        @forelse ($user->roles as $role)
                                        {{ $role->name }}
                                        @empty
                                        No roles selected
                                        @endforelse
                                    </td>
                                    <td><input type="checkbox" checked wire:click='moveToUser({{ $user->id }})'></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">No admins available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card bg-transparent">
                        @if($units->count() > 0)
                        <h5>Total units not assigned: {{ $units->count() }}</h5>
                        @endif
                        <h4 class="mt-3">Personnels</h4>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Unit Assignment</th>
                                    <th scope="col">Role</th>
                                    <th scope="col" style="width: 30%;" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($personnels as $personnel)
                                <tr wire:key='{{ $personnel->id }}'>
                                    <td>{{ $personnel->fist_name }} {{ $personnel->last_name }}</td>
                                    <td>{{ $personnel->unit->unit_assignment }}</td>
                                    <td>
                                        @forelse ($personnel->roles as $role)
                                        {{ $role->name }}
                                        @empty
                                        No roles selected
                                        @endforelse
                                    </td>
                                    <td align="center">
                                        <div class="d-flex gap-3">
                                            <input type="checkbox" wire:model.live='selected'
                                                value="{{ $personnel->id }}">
                                            <div>
                                                <select wire:model='selected_unit.{{ $personnel->id }}'
                                                    class="form-select">
                                                    <option selected hidden>Select Unit</option>
                                                    <option disabled>Select Unit</option>
                                                    @forelse ($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->unit_assignment }}
                                                    </option>
                                                    @empty
                                                    No units available
                                                    @endforelse
                                                </select>
                                                @error('selected_unit.' . $personnel->id)
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty

                                <tr>
                                    <td colspan="3">No personnels available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" @if (count($selected)> 0)
                        wire:click='confirmChanges'
                        @else disabled @endif>Confirm
                        changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
