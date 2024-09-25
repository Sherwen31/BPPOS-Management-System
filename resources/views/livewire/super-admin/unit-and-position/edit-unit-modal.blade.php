<div wire:ignore.self class="modal fade" id="editUnit" tabindex="-1" aria-labelledby="editUnitLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form action="#" id='addUnit' wire:submit.prevent="updateUnit" wire:confirm='Are you sure you want to update this unit assignment?'>
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editUnitLabel">Update Unit Assignment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($unit)
                    <div class="mb-3 form-floating">
                        <input wire:model='unit_assignment' type="text" style="min-width: 400px;" class="form-control"
                            id="unit_assignment" name="unit_assignment" placeholder="Middle Name">
                        @error('unit_assignment')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <label for="unit_assignment" class="form-label">Enter Unit Assignment</label>
                    </div>
                    @else
                    <p class="placeholder-glow" style="min-width: 400px;">
                        <span class="placeholder col-12" style="height: 55px;"></span>
                    </p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm" id="updateUnitBtn">
                        <span wire:loading.remove wire:target='updateUnit'>Update Unit Assignment</span>
                        <span wire:loading wire:target='updateUnit'>Updating...</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
