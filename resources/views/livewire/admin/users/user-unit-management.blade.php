<div>
    <div wire:ignore.self class="modal fade" id="userUnitManagement" tabindex="-1" aria-labelledby="userUnitManagementLabel" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="userUnitManagementLabel">Choose Personnel</h1>
                    @if($personnels->count() === 0)

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    @endif
                </div>
                <div class="modal-body">
                    <div class="card bg-transparent">
                        <h4 class="mt-3">Personnels ({{ $personnels->count() }})</h4>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Unit Assignment</th>
                                    <th scope="col">Role</th>
                                    <th scope="col" style="width: 10%;" class="text-center">Action</th>
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
                                        <div class="d-flex justify-content-center">
                                            <input type="checkbox" wire:model.live='selected' wire:loading.attr='disabled' wire:target='selected' value="{{ $personnel->id }}">

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
                    @if($personnels->count() === 0)
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
