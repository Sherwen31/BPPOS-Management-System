<div>
    <div wire:ignore.self class="modal fade" id="choosePersonnel" tabindex="-1" aria-labelledby="choosePersonnelLabel" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="choosePersonnelLabel">Choose Personnel</h1>
                    @if($units->count() === 0)

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    @endif
                </div>
                <div class="modal-body">
                    <div class="card bg-transparent">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mt-3">Admins ({{ $users->count() }})</h4>
                            </div>
                            <div class="d-flex gap-2">
                                <select class="form-select" wire:model.live.debounce.200ms='filterAdmin'>
                                    <option value="asc">Filter by ascending</option>
                                    <option value="desc">Filter by descending</option>
                                </select>
                                <input type="search" wire:model.live.200ms="searchAdmin" placeholder="Search admin..." class="form-control">
                            </div>
                        </div>
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
                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->unit->unit_assignment }}</td>
                                    <td>
                                        @forelse ($user->roles as $role)
                                        {{ $role->name }}
                                        @empty
                                        No roles selected
                                        @endforelse
                                    </td>
                                    <td><input type="checkbox" wire:loading.attr='disabled' checked wire:click='moveToUser({{ $user->id }})'></td>
                                </tr>
                                @empty
                                <tr class="text-center">
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
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mt-3">Personnels ({{ $personnels->count() }})</h4>
                            </div>
                            <div class="d-flex gap-2">
                                <select class="form-select" wire:model.live.debounce.200ms='filterPersonnel'>
                                    <option value="asc">Filter by ascending</option>
                                    <option value="desc">Filter by descending</option>
                                </select>
                                <input type="search" wire:model.live.200ms="searchPersonnel" placeholder="Search personnel..." class="form-control">
                            </div>
                        </div>
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
                                    <td>{{ $personnel->first_name }} {{ $personnel->last_name }}</td>
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
                                            <input type="checkbox" wire:model.live='selected' wire:loading.attr='disabled' wire:target='selected' value="{{ $personnel->id }}">
                                            <div>
                                                <select wire:model.live='selected_unit.{{ $personnel->id }}' class="form-select">
                                                    <option selected hidden>Select Unit</option>
                                                    <option disabled>Select Unit</option>
                                                    @forelse ($units as $unit)
                                                    <option wire:key='{{ $unit->id }}' @if(in_array($unit->id, $selected_unit) )
                                                        disabled
                                                        hidden
                                                        @else
                                                        value="{{ $unit->id }}"
                                                        @endif
                                                        wire:loading.attr='disabled'
                                                        wire:target='selected_unit.{{ $personnel->id }}'
                                                        >{{ $unit->unit_assignment }}
                                                    </option>
                                                    @empty
                                                    <option disabled>No units available</option>
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

                                <tr class="text-center">
                                    <td colspan="4">No personnels available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary btn-sm" wire:click='loadMorePage'><span wire:loading.remove wire:target='loadMorePage'>Load More (20)</span><span wire:loading wire:target='loadMorePage' class="spinner-border spinner-border-sm"></span></button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    @if($units->count() === 0)
                    <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    @endif
                    <button type="button" class="btn btn-primary btn-sm" @if (count($selected)> 0)
                        wire:click='confirmChanges'
                        @else disabled @endif wire:loading.attr='disabled'>
                        <span wire:loading.remove wire:target='confirmChanges'>Confirm
                            changes</span>
                        <span wire:loading wire:target='confirmChanges'><span class="spinner-border spinner-border-sm"></span> Confirming...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
